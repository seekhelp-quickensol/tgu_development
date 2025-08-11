/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,font,dialog,dialogadvtab,basicstyles,bidi,popup,htmlwriter,wysiwygarea,preview,specialchar,table,tabletools,tableselection,undo,widgetselection,widget,wsc,mathjax';
	config.skin = 'moono-lisa';
	//config.font_style = {
       // element		: 'span',
       // styles		: { 'font-family' : '#(family)' },
       // overrides	: [ { element : 'font', attributes : { 'face' : 'Arial' } } ]
    //};
	config.fontSize_sizes = '18';
	// %REMOVE_END%

	// Define changes to default configuration here. For example:
	// config.language = 'en';
	// config.uiColor = '#AADC6E';
};
