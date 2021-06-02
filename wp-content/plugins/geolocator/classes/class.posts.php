<?php

/**
 * Posts class handles all functionality related to posts.
 *
 * @package Geolocator
 */
class Geolocator_Posts {

	// Plugin related variables
	public $vars;

	// Location class injection
	public $location;

	// Posts to hide
	public $posts_to_hide = array();

	/**
	 * Constructor.
	 */
	public function __construct( $vars = array(), $location = array() ) {

		$this->vars = $vars;
		$this->location = $location->location;

	}

	/**
	 * Init tasks.
	 *
	 * @return mixed
	 */
	function initTasks() {

		// Get posts to hide
		$this->posts_to_hide = $this->getPostsToHide();

		// Actions
		add_action( 'pre_get_posts', array( $this, 'excludePosts' ), 9999 );
		add_action( 'wp', array( $this, 'restrictDirectAccess' ) );

		if( is_admin() ) {

			add_action( 'add_meta_boxes', function() {

				add_meta_box( 'geolocator-main-metabox', __( 'Geolocator', 'geolocator' ), array( $this, 'mainMetaBox' ), 'post', 'side' );

			} );
			add_action( 'save_post', array( $this, 'savePost' ) );

		}

		// Filters
		add_filter( 'get_previous_post_join', array( $this, 'adjacentPostJoinFilter' ) );
		add_filter( 'get_next_post_join', array( $this, 'adjacentPostJoinFilter' )) ;
		add_filter( 'get_previous_post_where', array( $this, 'adjacentPostWhereFilter' ) );
		add_filter( 'get_next_post_where', array( $this, 'adjacentPostWhereFilter' ) );

	}

	/**
	 * Get posts to hide.
	 *
	 * @return array
	 */
	function getPostsToHide() {

		$posts_to_hide = array();

		if( isset( $this->location['country'] ) && ! empty( $this->location['country'] ) ) {

			$posts_list = get_posts( array(
				'post_type' => 'post',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => '_geolocator_hide_for',
						'value' => $this->location['country'],
					),
				),
			) );

			if( ! empty( $posts_list ) ) {

				$posts_to_hide = wp_list_pluck( $posts_list, 'ID' );

			}

		}

		return $posts_to_hide;

	}

	/**
	 * Exclude posts.
	 *
	 * @return void
	 */
	function excludePosts( $query ) {

		if( ! is_admin() ) {

			if( ! empty( $this->posts_to_hide ) ) {

				$query->set( 'post__not_in', $this->posts_to_hide );

			}

		}

	}

	/**
	 * Restrict direct access.
	 *
	 * @return void
	 */
	function restrictDirectAccess() {

		if( is_single() && is_singular( 'post' ) && ! is_admin() ) {

			$hide_for = get_post_meta( get_the_ID(), '_geolocator_hide_for', true );

			if( ! empty( $hide_for ) && $hide_for == $this->location['country'] ) {

				$user = wp_get_current_user();
				$allowed_roles = array( 'author', 'editor', 'administrator' );

				if( ! array_intersect( $allowed_roles, $user->roles ) ) {

					$redirect_to = get_post_meta( get_the_ID(), '_geolocator_redirect_to', true );

					if( ! empty( $redirect_to ) ) {

						wp_redirect( $redirect_to );
						exit;

					} else {

						wp_redirect( home_url() );
						exit;

					}

				}

			}

		}

	}

	/**
	 * Main meta box.
	 *
	 * @param array $post
	 *
	 * @return html
	 */
	function mainMetaBox( $post ) {

		$hide_for = get_post_meta( $post->ID, '_geolocator_hide_for', true );
		$redirect_to = get_post_meta( $post->ID, '_geolocator_redirect_to', true );

		?>
		<div>
			<label class="screen-reader-text" for="geolocator_hide_for">Hide for</label>
			<strong><?php _e( 'Hide post for this country:', 'geolocator' ); ?></strong>
			<input name="geolocator_hide_for" type="text" size="3" id="geolocator_hide_for" value="<?php echo esc_attr( $hide_for ); ?>" placeholder="DE" />
			<p class="howto"><?php _e( '2-letter ISO code of the country', 'geolocator' ); ?></p>
		</div>
		<div>
			<label class="screen-reader-text" for="geolocator_redirect_to">Redirect to</label>
			<strong><?php _e( 'Fallback redirect:', 'geolocator' ); ?></strong>
			<br><br>
			<input name="geolocator_redirect_to" type="text" size="30" id="geolocator_redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" placeholder="https://yoursite.com/some-post" />
			<p class="howto"><?php _e( 'Where to redirect if hidden page is accessed directly?', 'geolocator' ); ?></p>
		</div>
		<?php

	}

	/**
	 * Save post.
	 *
	 * @param int $post_id
	 *
	 * @return void
	 */
	function savePost( $post_id ) {

		// Hide for
		if( isset( $_POST['geolocator_hide_for'] ) ) {

			$hide_for = trim( strip_tags( $_POST['geolocator_hide_for'] ) );

			update_post_meta( $post_id, '_geolocator_hide_for', $hide_for );

		}

		// Redirect to
		if( isset( $_POST['geolocator_redirect_to'] ) ) {

			$hide_for = trim( strip_tags( $_POST['geolocator_redirect_to'] ) );

			update_post_meta( $post_id, '_geolocator_redirect_to', $hide_for );

		}

	}

	/**
	 * Add meta data to adjacent post.
	 *
	 * @param string $join
	 *
	 * @return string
	 */
	function adjacentPostJoinFilter( $join ) {

		if( is_single() && is_singular( 'post' ) ) {

			global $wpdb;

			$join .= "INNER JOIN $wpdb->postmeta AS m ON p.ID = m.post_id ";

		}

		return $join;

	}

	/**
	 * Adjust where of adjacent post.
	 *
	 * @param string $where
	 *
	 * @return string
	 */
	function adjacentPostWhereFilter( $where ) {

		if( geolocator_country() && is_single() && is_singular( 'post' ) ) {

			$where .= " AND (m.meta_key = '_geolocator_hide_for' AND m.meta_value != '" . geolocator_country() . "')";

		}

		return $where;

	}

}

/* End of file class.posts.php */