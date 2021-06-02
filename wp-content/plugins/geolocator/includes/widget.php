<?php

/**
 * Main widget of the plugin.
 *
 * @package Geolocator
 */
class Geolocator_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'geolocator_widget',
			esc_html__( 'Geolocator', 'geolocator' ),
			array( 'description' => esc_html__( 'Display a country-specific greeting.', 'geolocator' ), )
		);

	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args
	 * @param array $instance
	 *
	 * @return html
	 */
	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo do_shortcode( $instance['text'] );

		echo $args['after_widget'];

	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance
	 *
	 * @return html
	 */
	public function form( $instance ) {

		// Title
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php

		// Text
		$text = ! empty( $instance['text'] ) ? $instance['text'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_attr_e( 'Text:', 'geolocator' ); ?></label> 
		<textarea class="widefat" rows="8" cols="20" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"><?php if( empty( $text ) ): ?>Hey, how's it going there in <strong>[geolocator]</strong>?<?php else: ?><?php echo esc_attr( $text ); ?><?php endif; ?></textarea>
		</p>
		<?php

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? trim( $new_instance['text'] ) : '';

		return $instance;

	}

}

/* End of file widget.php */