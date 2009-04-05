<?php defined('SYSPATH') OR die('No direct access allowed.');

// editor path
$config['path'] = '/media/js/fckeditor/';
// editor scriptname (usually 'fckeditor.php' or 'fckeditor_php5.php')
$config['scriptName'] = 'fckeditor_php5.php';

// default profile
$config['default'] = array
(
	'Width' => 700,
	'Height' => 200,
	'fieldName' => 'text',
	'ToolbarSet' => 'Default',
	'Value' => '',
	'Config' => array
	(
		'ToolbarCanCollapse' => TRUE,
		'ToolbarLocation' => 'In',
		'ToolbarSets' => array(
			'Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript',
		),
		'DefaultLanguage' => 'ru',
		'EnterMode' => 'p',
	),
);