/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {

	config.filebrowserBrowseUrl = '/assets/js/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = '/assets/js/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = '/assets/js/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = '/assets/js/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = '/assets/js/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '/assets/js/kcfinder/upload.php?type=flash';

    // The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

 
    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    // config.removeButtons = 'NewPage,Save,ExportPdf,Print,Templates,PasteText,PasteFromWord,Undo,Redo,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,NumberedList,BulletedList,Indent,Outdent,Blockquote,BidiLtr,BidiRtl,Language,Anchor,Flash,HorizontalRule,Smiley,PageBreak,ShowBlocks,About,BGColor';
	config.extraPlugins = 'table';
	   config.removeButtons = 'ImageButton';
	   config.extraPlugins = 'tableresize';
    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';
	config.extraPlugins = 'pastefromgdocs';
	config.extraPlugins = 'horizontalrule';
	config.extraPlugins = 'lineheight';


	config.line_height = "1px;1.1px;1.2px;1.3px;1.4px;1.5px" ;
	config.extraPlugins = 'simple-ruler';
	config.extraPlugins = 'ruler';
	config.filebrowserUploadMethod = 'form';
    // Simplify the dialog windows.
    // config.removeDialogTabs = 'image:advanced;link:advanced';
	config.font_names =
            'Arial/Arial, Helvetica, sans-serif;' +
            'Times New Roman/Times New Roman, Times, serif;' +
            'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
            'Calibri/Calibri, Verdana, Geneva, sans-serif;'  


			
};
