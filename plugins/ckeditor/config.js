/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
	//var url = document.URL;
	//var full_url = url.split("//");
	//var url = full_url[1];
	//var parts = url.split("/");
	//
	//if(parts.indexOf("localhost") === 0){
	//	localhost_position = parts.indexOf("localhost");
	//	var part_count_to_save = localhost_position + 2;
	//	var part_count_to_delete = parts.length - part_count_to_save;
	//
	//	var up_folder = '';
	//	for (i = 1; i < part_count_to_delete; i++) {
	//		up_folder = up_folder.concat("../");
	//	}
	//}else{
	//	// Server
	//}
	pathArray = location.href.split( '/' );
	protocol = pathArray[0];
	host = pathArray[2];

	if(host == 'localhost'){
		site = pathArray[3];
		url = protocol + '//' + host + '/' + site + '/public/backend';
	}

	else if(host == 'localhost:8000'){
		url = protocol + '//' + host;
	}


	else {
		url = protocol + '//' + host + '/backend/' ;
	}



	//http://localhost:8000/admin/foods
	config.filebrowserBrowseUrl = url+'/plugins/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = url+'/plugins/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = url+'/plugins/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = url+'/plugins/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = url+'/plugins/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = url+'/plugins/kcfinder/upload.php?opener=ckeditor&type=flash';

	//The toolbar groups arrangement, optimized for two toolbar rows.
	//config.toolbarGroups = [
	//	{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
	//	{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
	//	{ name: 'links' },
	//	{ name: 'insert' },
	//	{ name: 'forms' },
	//	{ name: 'tools' },
	//	{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
	//	{ name: 'others' },
	//	'/',
	//	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	//	{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
	//	{ name: 'styles' },
	//	{ name: 'colors' },
	//	{ name: 'about' }
	//];
	//CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },

		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },

		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];
	config.removeButtons = 'Save,Subscript,Superscript,Remove Format,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Italic,Strike,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,HorizontalRule,Smiley,PageBreak,SpecialChar,Iframe,Font,FontSize,Styles,TextColor,BGColor,ShowBlocks,About';
	//};

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	//config.removeButtons = 'Underline,Subscript,Superscript';
	//
	//// Se the most common block elements.
	//config.format_tags = 'p;h1;h2;h3;pre';
	//
	//// Make dialogs simpler.
	//config.removeDialogTabs = 'image:advanced;link:advanced';
};
