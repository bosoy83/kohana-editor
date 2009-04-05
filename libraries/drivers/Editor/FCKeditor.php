<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * FCKeditor driver library
 *
 * @package    Editor
 * @author     Brotkin Ivan (BIakaVeron) <BIakaVeron@gmail.com>
 * @copyright  Copyright (c) 2009 Brotkin Ivan
 *
 */
class Editor_FCKeditor_Driver extends Editor_Driver {

	// editor field name
	protected $InstanceName;

	// Configuration params that must be save on FCKeditor object as properties
	protected $params = array
	(
		'Width', 'Height', 'ToolbarSet', 'BasePath', 'Value',
	);

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
			$name = $config;
			// Try to load config array with this profile name
			if (($config = Kohana::config('editors/FCKeditor.'.$config)) == NULL) {
				throw new Kohana_Exception('editor.undefined_profile', $name);
			}
		}

		// Saving configuration
		$this->config = $config;

		if (!isset($this->config['BasePath'])) {
			// Use config param if there is no BasePath value in profile
			$this->config['BasePath'] = Kohana::config('editors/FCKeditor.path');
		}

		if (!isset($this->config['scriptName'])) {
			// Use config param if there is no scriptName value in profile
			$this->config['scriptName'] = Kohana::config('editors/FCKeditor.scriptName');
		}

		$this->InstanceName = $this->config['fieldName'];

		Kohana::log('debug', 'FCKeditor Driver Initialized');
	}

	/**
	 * Display text redactor or returns redactor code
	 *
	 * @param   bool   outputs code directly if TRUE
	 * @param   bool   creates textarea field if TRUE
	 * @return  mixed  returns output code if $print==FALSE
	 */
	public function render($print = FALSE, $create_field = FALSE) {
		// Loading FCKeditor library
		require_once('.'.$this->config['BasePath'].$this->config['scriptName']);

		// Create editor object with fieldName param
		$FCKeditor = new FCKeditor($this->InstanceName);

		// Setting object properties
		foreach($this->params as $param) {
		  if (is_array($this->config[$param])) {
				// Join array params into string
				$FCKeditor->$param = '['.implode(",", $this->config[$param]).']';
			}
			else $FCKeditor->$param = $this->config[$param];
		}

		if ($print===TRUE) {
			// Output generated code directly
			$FCKeditor->Create();
		}
		else {
			// Generate code and return as result
			return $FCKeditor->CreateHtml();
		}
		
		return NULL;
	}

	/**
	 * Redefine basic driver methods bacause of capitalized property names
	 */
	public function setWidth($width = NULL) {
		is_null($width) OR $this->config['Width'] = intval($width);
	}

	public function setHeight($height = NULL) {
		is_null($height) OR $this->config['Height'] = intval($height);
	}

	public function setFieldName($fname = NULL) {
		is_null($fname) OR $this->InstanceName = $fname;
	}

}