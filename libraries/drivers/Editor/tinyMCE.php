<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Tiny_MCE driver library
 *
 * @package    Editor
 * @author     Brotkin Ivan (BIakaVeron) <BIakaVeron@gmail.com>
 * @copyright  Copyright (c) 2009 Brotkin Ivan
 *
 */
class Editor_TinyMCE_Driver extends Editor_Driver {

	/**
	 * Constructor
	 *
	 * Create and set basic properties
	 *
	 * @param  mixed  config array or profile name
	 * @return void
	 */
	public function __construct($config) {
		if (is_null($config)) {
			// Use default profile name
			$config = 'default';
		}
		
		if (!is_array($config)) {
			// Try to load config array with this profile name
			if (($config = Kohana::config('editors/TinyMCE.'.$config)) == NULL) {
				throw new Kohana_Exception('editor.undefined_profile', $name);
			}
		}

		// Saving configuration
		$this->config = $config;

		if (!isset($this->config['path'])) {
			// Use config param if there is no path value in profile
			$this->config['path'] = Kohana::config('editors/TinyMCE.path');
		}
		
		if (!isset($this->config['scriptName'])) {
			// Use config param if there is no scriptName value in profile
			$this->config['scriptName'] = Kohana::config('editors/TinyMCE.scriptName');
		}

		Kohana::log('debug', 'TinyMCE Driver Initialized');
	}

	/**
	 * Display text redactor or returns redactor code
	 *
	 * @param   bool   outputs code directly if TRUE
	 * @param   bool   creates textarea field if TRUE
	 * @return  mixed  returns output code if $print==FALSE
	 */
	public function render($print = FALSE, $create_field = FALSE) {

		// Include JS-file with editor code
		$result = html::script($this->config['path'].$this->config['scriptName']);

		if (TRUE == $create_field) {
			// Create textarea with some config values
			$result.= form::textarea(array('name'=>$this->config['fieldName'], 'width'=>$this->config['width'], 'height'=>$this->config['height'], 'value'=>$this->config['value']))."\r\n";
		}

		// Init redactor object
		// Array settings should be joined into a string
		$result .= '<script language="javascript" type="text/javascript">
	tinyMCE.init({
		theme : "'.$this->config['theme'].'",
		mode: "'.$this->config['mode'].'",
		elements : "'.$this->config['fieldName'].'",
		plugins : "'.implode(",", $this->config['plugins']).'",
		theme_advanced_toolbar_location : "'.$this->config['toolbar_location'].'",
		theme_advanced_toolbar_align : "'.$this->config['toolbar_align'].'",
		theme_advanced_buttons1 : "'.implode(",", $this->config['buttons1']).'",
		theme_advanced_buttons2 : "'.implode(",", $this->config['buttons2']).'",
		theme_advanced_buttons3 : "'.implode(",", $this->config['buttons3']).'",
		height:"'.$this->config['height'].'px",
		width:"'.$this->config['width'].'px"
  });
</script>';

		if ($print===TRUE) {
			// Echo code
			echo $result;
		}

		// return generated code
		return $result;
	}

}