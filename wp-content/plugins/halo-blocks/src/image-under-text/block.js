/**
 * BLOCK: image-under-text
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
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
registerBlockType( 'cgb/block-image-under-text', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'image-under-text' ), // Block title.
	icon: 'shield', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'image-under-text' ),
	],
	attributes: {
		headline: {
			type: 'string',
			default: 'headline'
		},
		text: {
			type: 'string',
			default: 'text'
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
		const changeHeadline = (newHeadline) => {
			setAttributes({
				headline: newHeadline
			});
		};
		const changeImage = (newImg) => {
			setAttributes({
				imgUrl: newImg.sizes.full.url,
				imgId: newImg.id.toString()
			})
		};
		const changeText = (newText) => {
			setAttributes({
				text: newText
			});
		};
		// Creates a <p class='wp-block-cgb-block-halo-blocks'></p>.
		return (
			<div className="c-image-under-text">
				<div className="c-image-under-text__inner">
					<div className="c-image-under-text__image">
						<MediaUpload 
				            onSelect={changeImage}
				            render={
				            	({open}) => {
				              		if(typeof attributes.imgUrl == 'undefined'){
					              		return <button className="c-image-under-text__image--button" onClick={ open }>
					              				Choose background image..
					              			</button>;
					              	}else{
					                	return <button className="c-image-under-text__image--button" onClick={open}>
										        	<img
										        		classNames={ `wp-image-${attributes.imgId}` }
										        		src={attributes.imgUrl}
										        	/>
								     				</button>;
					                }
				            	}	
					        }
				        />
					</div>
					<div className="c-image-under-text__text">
						<div className="c-image-under-text__headline">
							<RichText
								className="c-image-under-text__headline--richtext"
								onChange={changeHeadline}
								value={attributes.headline}
							/>
						</div>
						<div className="c-image-under-text__text--text">
							<RichText
								className="c-image-under-text__text--text__richtext"
								onChange={changeText}
								value={attributes.text}
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
			<div className="c-image-under-text">
				<div className="c-image-under-text__inner">
					<div className="c-image-under-text__image">
						<img
							src={attributes.imgUrl}
				        	className={`wp-image-` + attributes.imgId}
				        />
					</div>
					<div className="c-image-under-text__text">
						<div className="c-image-under-text__headline">
							<RichText.Content
								className="c-image-under-text__headline--richtext"
								value={attributes.headline}
							/>
						</div>
						<div className="c-image-under-text__text--text">
							<RichText.Content
								className="c-image-under-text__text--text__richtext"
								value={attributes.text}
							/>
						</div>
					</div>
				</div>
			</div>
		);
	},
} );
