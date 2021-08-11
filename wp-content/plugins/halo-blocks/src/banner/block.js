/**
 * BLOCK: banner
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
registerBlockType( 'cgb/block-banner', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'banner' ), // Block title.
	icon: 'shield', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'banner' ),
	],
	attributes: {
		imgUrl: {
			type: "string"
		},
		imgId: {
			type: "string"
		},
		headline: {
			type: "string",
			default: "headline"
		},
		bodyText: {
			type: "string",
			default: "body text"
		},
		buttonText: {
			type: "string",
			default: "Enter"
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
	edit: ( { attributes, setAttributes } ) => {
		
		const changeImage = (newImg) => {
			setAttributes({
		        imgUrl: newImg.sizes.full.url,
		        imgId: newImg.id.toString()
		    })
		};
		const changeHeadline = (newHeadline) => {
			setAttributes({
		        headline: newHeadline
		    })
		};
		const changeBodyText = (newBodyText) => {
			setAttributes({
		        bodyText: newBodyText
		    })
		};
		const changeButtonText = (newButtonText) => {
			setAttributes({
		        buttonText: newButtonText
		    })
		};
		return (
			<div className="c-banner">
				
				<div className="c-banner__background">
					<MediaUpload 
            onSelect={changeImage}
            render={
            	({open}) => {
              	if(typeof attributes.imgUrl == 'undefined'){
              		return <button className="c-banner__background--button" onClick={ open }>
              				Choose background image..
              			</button>;
              	}else{
                	return <button className="c-banner__background--button" onClick={open}>
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
				<div className="c-banner__foreground">
					<div className="c-banner__foreground--inner">
						<div className="c-banner__headline">
							<RichText
									className="c-banner__headline--richtext"
									onChange={ changeHeadline }
									value={ attributes.headline }
								/>
						</div>
						<div className="c-banner__bodytext">
							<RichText
									className="c-banner__bodytext--richtext"
									onChange={ changeBodyText }
									value={ attributes.bodyText }
								/>
						</div>
						<div className="c-banner__button">
							<div className="c-banner__button--icon">
								<svg data-name="Group 36" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 36">
								  <g data-name="Ellipse 2" fill="none" stroke="#fff">
								    <ellipse cx="18.5" cy="18" rx="18.5" ry="18" stroke="none"/>
								    <ellipse cx="18.5" cy="18" rx="18" ry="17.5"/>
								  </g>
								  <g fill="#fff" fill-rule="evenodd">
								    <path data-name="Path 16" d="M18.349 25.141a.794.794 0 00.794-.794V10.056a.794.794 0 00-1.588 0v14.291a.794.794 0 00.794.794z"/>
								    <path data-name="Path 17" d="M17.787 26.496a.794.794 0 001.124 0l4.764-4.764a.795.795 0 10-1.124-1.124l-4.2 4.2-4.2-4.2a.795.795 0 10-1.124 1.124l4.764 4.764z"/>
								  </g>
								</svg>
							</div>
							<div className="c-banner__button--text">
								<RichText
									className="c-banner__button--text__richtext"
									onChange={ changeButtonText }
									value={ attributes.buttonText }
								/>
							</div>
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
	save: ( { attributes } ) => {
		return (
			<div className="c-banner" id="home">
				
				<div className="c-banner__background">
					<img
						className={ `wp-image-${attributes.imgId}` }
			    	src={attributes.imgUrl}
			    />
				</div>
				<div className="c-banner__foreground">
					<div className="c-banner__foreground--inner">
						<div className="c-banner__headline">
							<RichText.Content
									className="c-banner__headline--richtext"
									value={ attributes.headline }
								/>
						</div>
						<div className="c-banner__bodytext">
							<RichText.Content
									className="c-banner__bodytext--richtext"
									value={ attributes.bodyText }
								/>
						</div>
						<div className="c-banner__button" data-next-button>
							<div className="c-banner__button--icon">
								<svg data-name="Group 36" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 36">
								  <g data-name="Ellipse 2" fill="none" stroke="#fff">
								    <ellipse cx="18.5" cy="18" rx="18.5" ry="18" stroke="none"/>
								    <ellipse cx="18.5" cy="18" rx="18" ry="17.5"/>
								  </g>
								  <g fill="#fff" fill-rule="evenodd">
								    <path data-name="Path 16" d="M18.349 25.141a.794.794 0 00.794-.794V10.056a.794.794 0 00-1.588 0v14.291a.794.794 0 00.794.794z"/>
								    <path data-name="Path 17" d="M17.787 26.496a.794.794 0 001.124 0l4.764-4.764a.795.795 0 10-1.124-1.124l-4.2 4.2-4.2-4.2a.795.795 0 10-1.124 1.124l4.764 4.764z"/>
								  </g>
								</svg>
							</div>
							<div className="c-banner__button--text">
								<RichText.Content
									className="c-banner__button--text__richtext"
									value={ attributes.buttonText }
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		);
	},
} );
