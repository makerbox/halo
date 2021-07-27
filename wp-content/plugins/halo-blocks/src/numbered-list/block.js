/**
 * BLOCK: numbered-list
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

const {RichText} = wp.blockEditor;
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
registerBlockType( 'cgb/block-numbered-list', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'numbered-list' ), // Block title.
	icon: 'shield', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'numbered-list' ),
	],
	attributes: {
		headline: {
			type: "string",
			default: "headline.."
		},
		text1: {
			type: "string",
			default: "input text.."
		},
		text2: {
			type: "string",
			default: "input text.."
		},
		text3: {
			type: "string",
			default: "input text.."
		},
		text4: {
			type: "string",
			default: "input text.."
		},
		text5: {
			type: "string",
			default: "input text.."
		},
		text6: {
			type: "string",
			default: "input text.."
		},
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
		
		
		const changeHeadline = (newHeadline) => {
			setAttributes({
		        headline: newHeadline
		    })
		};
		const text1 = (newText) => {
			setAttributes({
		        text1: newText
		    })
		};
		const text2 = (newText) => {
			setAttributes({
		        text2: newText
		    })
		};
		const text3 = (newText) => {
			setAttributes({
		        text3: newText
		    })
		};
		const text4 = (newText) => {
			setAttributes({
		        text4: newText
		    })
		};
		const text5 = (newText) => {
			setAttributes({
		        text5: newText
		    })
		};
		const text6 = (newText) => {
			setAttributes({
		        text6: newText
		    })
		};
		return (
			<div className="c-numbered-list">
				<div className="c-numbered-list__inner">
					<div className="c-numbered-list__headline">
						<RichText
							className="c-numbered-list__headline--richtext"
							onChange={ changeHeadline }
							value={ attributes.headline }
						/>
					</div>
					<div className="c-numbered-list__list">
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								1
							</div>
							<div className="c-numbered-list__text">
								<RichText
									className="c-numbered-list__item--richtext"
									onChange={ text1 }
									value={ attributes.text1 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								2
							</div>
							<div className="c-numbered-list__text">
								<RichText
									className="c-numbered-list__item--richtext"
									onChange={ text2 }
									value={ attributes.text2 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								3
							</div>
							<div className="c-numbered-list__text">
								<RichText
									className="c-numbered-list__item--richtext"
									onChange={ text3 }
									value={ attributes.text3 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								4
							</div>
							<div className="c-numbered-list__text">
								<RichText
									className="c-numbered-list__item--richtext"
									onChange={ text4 }
									value={ attributes.text4 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								5
							</div>
							<div className="c-numbered-list__text">
								<RichText
									className="c-numbered-list__item--richtext"
									onChange={ text5 }
									value={ attributes.text5 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								6
							</div>
							<div className="c-numbered-list__text">
								<RichText
									className="c-numbered-list__item--richtext"
									onChange={ text6 }
									value={ attributes.text6 }
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
			<div className="c-numbered-list">
				<div className="c-numbered-list__inner">
					<div className="c-numbered-list__headline">
						<RichText.Content
							className="c-numbered-list__headline--richtext"							
							value={ attributes.headline }
						/>
					</div>
					<div className="c-numbered-list__list">
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								1
							</div>
							<div className="c-numbered-list__text">
								<RichText.Content
									className="c-numbered-list__item--richtext"
									value={ attributes.text1 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								2
							</div>
							<div className="c-numbered-list__text">
								<RichText.Content
									className="c-numbered-list__item--richtext"
									value={ attributes.text2 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								3
							</div>
							<div className="c-numbered-list__text">
								<RichText.Content
									className="c-numbered-list__item--richtext"
									value={ attributes.text3 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								4
							</div>
							<div className="c-numbered-list__text">
								<RichText.Content
									className="c-numbered-list__item--richtext"
									value={ attributes.text4 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								5
							</div>
							<div className="c-numbered-list__text">
								<RichText.Content
									className="c-numbered-list__item--richtext"
									value={ attributes.text5 }
								/>
							</div>
						</div>
						<div className="c-numbered-list__item">
							<div className="c-numbered-list__number">
								6
							</div>
							<div className="c-numbered-list__text">
								<RichText.Content
									className="c-numbered-list__item--richtext"
									value={ attributes.text6 }
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		);
	},
} );
