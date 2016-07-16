/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	//config.uiColor = '#AADC6E';
	//config.baseFloatZIndex = 99999999999999999;
};var modal_this = this

$(document).on('focusin.modal', function (e) {
    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
    // add whatever conditions you need here:
    &&
    !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
        modal_this.$element.focus()
    }
});

CKEDITOR.config.allowedContent = true; 
CKEDITOR.config.extraPlugins = 'codemirror';
CKEDITOR.config.codemirror = {

    // Set this to the theme you wish to use (codemirror themes)
    theme: 'default',

    // Whether or not you want to show line numbers
    lineNumbers: true,

    // Whether or not you want to use line wrapping
    lineWrapping: true,

    // Whether or not you want to highlight matching braces
    matchBrackets: true,

    // Whether or not you want tags to automatically close themselves
    autoCloseTags: true,

    // Whether or not you want Brackets to automatically close themselves
    autoCloseBrackets: true,

    // Whether or not to enable search tools, CTRL+F (Find), CTRL+SHIFT+F (Replace), CTRL+SHIFT+R (Replace All), CTRL+G (Find Next), CTRL+SHIFT+G (Find Previous)
    enableSearchTools: true,

    // Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
    enableCodeFolding: true,

    // Whether or not to enable code formatting
    enableCodeFormatting: true,

    // Whether or not to automatically format code should be done when the editor is loaded
    autoFormatOnStart: true,

    // Whether or not to automatically format code should be done every time the source view is opened
    autoFormatOnModeChange: true,

    // Whether or not to automatically format code which has just been uncommented
    autoFormatOnUncomment: true,

    // Whether or not to highlight the currently active line
    highlightActiveLine: true,

    // Define the language specific mode 'htmlmixed' for html including (css, xml, javascript), 'application/x-httpd-php' for php mode including html, or 'text/javascript' for using java script only
    mode: 'htmlmixed',

    // Whether or not to show the search Code button on the toolbar
    showSearchButton: true,

    // Whether or not to show Trailing Spaces
    showTrailingSpace: true,

    // Whether or not to highlight all matches of current word/selection
    highlightMatches: true,

    // Whether or not to show the format button on the toolbar
    showFormatButton: true,

    // Whether or not to show the comment button on the toolbar
    showCommentButton: true,

    // Whether or not to show the uncomment button on the toolbar
    showUncommentButton: true,

        // Whether or not to show the showAutoCompleteButton button on the toolbar
        showAutoCompleteButton: true

};