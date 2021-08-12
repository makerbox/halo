/**
 * BLOCK: member
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

// Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

const {RichText, MediaUpload} = wp.blockEditor;


// const { RichText, MediaUpload, InspectorControls } = wp.blockEditor;
// const { Panel, PanelBody, PanelRow, SelectControl, CheckboxControl } = wp.components;
// const { select } = wp.data; // get page data

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'cgb/block-member', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'member' ), // Block title.
	icon: 'shield', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'member' ),
	],
	attributes: {
		name: {
			type: 'string',
			default: 'Member Name'
		},
		title: {
			type: 'string',
			default: 'job title'
		},
		paragraph: {
			type: 'string',
			default: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores. ea rebum. Stet clita kasd gubergren.'
		},
		imgUrl: {
			type: 'string'
		},
		imgId: {
			type: 'string'
		}
	},
	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Component.
	 */
	edit: ( {attributes, setAttributes} ) => {
		const changeName = (newText) => {
			setAttributes({
				name: newText
			});
		};
		const changeTitle = (newText) => {
			setAttributes({
				title: newText
			});
		};
		const changeParagraph = (newText) => {
			setAttributes({
				paragraph: newText
			});
		};
		const changeImage = (newImg) => {
			setAttributes({
				imgUrl: newImg.sizes.full.url,
				imgId: newImg.id.toString()
			})
		};
		// Creates a <p class='wp-block-cgb-block-halo-blocks'></p>.
		return (
			<div className="c-member">
				<div className="c-member__inner">
					<div className="c-member__image">
						<MediaUpload 
				            onSelect={changeImage}
				            render={
				            	({open}) => {
				              		if(typeof attributes.imgUrl == 'undefined'){
					              		return <button className="c-overlay__background--image__button" onClick={ open }>
					              				Choose image..
					              			</button>;
					              	}else{
					                	return <button className="c-overlay__background--image__button" onClick={open}>
								        	<img
								        		className={ `wp-image-${attributes.imgId}` }
								        		src={attributes.imgUrl}
								        	/>
						     				</button>;
					                }
				            	}	
					        }
				        />
					</div>
					<div className="c-member__text">
						<div className="c-member__header">
							<div className="c-member__name">
								<RichText
									className="c-member__name--richtext"
									onChange={changeName}
									value={attributes.name}
								/>
							</div>
							<div className="c-member__title">
								<RichText
									className="c-member__title--richtext"
									onChange={changeTitle}
									value={attributes.title}
								/>
							</div>
						</div>
						<div className="c-member__paragraph">
							<RichText
								className="c-member__paragraph--richtext"
								onChange={changeParagraph}
								value={attributes.paragraph}
							/>
						</div>
					</div>
				</div>
			</div>
		);
	},

	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Frontend HTML.
	 */
	save: ( {attributes} ) => {
		return (
			<div className="c-member">
				<div className="c-member__inner">
					<div className="c-member__image">
						<img
							src={attributes.imgUrl}
				        	className={`wp-image-` + attributes.imgId}
				        />
					</div>
					<div className="c-member__text">
						<div className="c-member__header">
							<div className="c-member__name">
								<RichText.Content
									value={attributes.name}
								/>
							</div>
							<div className="c-member__title">
								<RichText.Content
									value={attributes.title}
								/>
							</div>
						</div>
						<div className="c-member__paragraph">
							<RichText.Content
								value={attributes.paragraph}
							/>
						</div>
					</div>
				</div>
			</div>
		);
	},
} );
