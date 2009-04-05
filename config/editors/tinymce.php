<?php defined('SYSPATH') OR die('No direct access allowed.');

// editor path
$config['path'] = 'media/js/tinymce/';
// editor scriptname (usually 'tiny_mce.php')
$config['scriptName'] = 'tiny_mce.js';

// default profile
$config['default'] = array
(
	'fieldName' => 'text',
	'width' => 600,
	'height' => 200,
	'theme' => 'advanced',
	'mode' => 'exact',
	'toolbar_location' => 'top',
	'toolbar_align' => 'left',
	'plugins' => array
	(
	),
	'buttons1' => array
		(
			'bold', 'italic', 'underline', 'strikethrough', '|',
			'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'formatselect',
			'bullist', 'numlist', 'outdent', 'indent',
		),
	'buttons2' => array
	(
		'link', 'unlink', 'anchor', 'image', '|',
		'undo', 'redo', 'cleanup', 'code', '|',
		'sub', 'sup', 'charmap',
	),
	'buttons3' => array
	(
	),
	'value' => '',
);

// another example of text editor configuration
$config['rich'] = array
(
	'fieldName' => 'text',
	'width' => 600,
	'height' => 200,
	'theme' => 'advanced',
	'mode' => 'exact',
	'toolbar_location' => 'top',
	'toolbar_align' => 'left',
	'plugins' => array
	(
		'emotions',
	),
	'buttons1' => array
		(
			'bold', 'italic', 'underline', 'strikethrough', '|',
			'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'formatselect',
			'bullist', 'numlist', 'outdent', 'indent', '|',
			'fontselect', 'fontsizeselect',
		),
	'buttons2' => array
	(
		'link', 'unlink', 'anchor', 'image', 'blockquote', '|',
		'undo', 'redo', 'cleanup', 'code', '|',
		'sub', 'sup', 'charmap', '|', 'emotions',
	),
	'buttons3' => array
	(
	),
	'value' => '',
);