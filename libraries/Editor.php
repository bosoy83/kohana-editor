<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Class for providing most knowns Text Editors like Tiny_MCE and FCKeditor
 *
 * @package    Editor
 * @author     Brotkin Ivan (BIakaVeron) <BIakaVeron@gmail.com>
 * @copyright  Copyright (c) 2009 Brotkin Ivan
 *
 */

class Editor_Core {

	// Configuration array
	protected $config = array();

	// Text Editor driver object
	protected $driver;

	/**
	 * Create an instance of Editor.
	 *
	 * @param   string  driver name
	 * @param   mixed   configuration array or profile name
	 * @return  __CLASS__
	 */
	public static function factory($driver = NULL, $config = NULL)
	{
		return new Editor($driver, $config);
	}

	/**
	 * Constructor
	 *
	 * @param   string  driver name
	 * @param   mixed   configuration array or profile name
	 * @return  void
	 */
	public function __construct($driver = NULL, $config = NULL)
	{
		if (is_null($driver)) {
			// Get default driver from config
			$driver = Kohana::config('Editor.default_driver');
		}
		// Set driver name
		$this->driver = 'Editor_'.$driver.'_Driver';

		if (! Kohana::auto_load ( $this->driver ))
			throw new Kohana_Exception('core.driver_not_found', $driver, get_class($this));
		// Load the driver
		$this->driver = new $this->driver($config);

		Kohana::log('debug', 'Editor Library loaded');
	}

	/**
	 * Changing editor width
	 *
	 * @param  int  new width value
	 * @return void
	 */
	public function setWidth($width = NULL) {
		$this->driver->setWidth($width);
	}

	/**
	 * Changing editor height
	 *
	 * @param  int  new height value
	 * @return void
	 */
	public function setHeight($height = NULL) {
		$this->driver->setHeight();
	}

	/**
	 * Changing text field name
	 *
	 * @param  string new field (textarea) name
	 * @return void
	 */
	public function setFieldName($fname = NULL) {
		$this->driver->setFieldName($fname);
	}

	/**
	 * Display text redactor or returns redactor code
	 *
	 * @param   bool   outputs code directly if TRUE
	 * @param   bool   creates textarea field if TRUE
	 * @return  mixed  returns output code if $print==FALSE
	 */
	public function render($print = FALSE, $create_field = FALSE)
	{
		return $this->driver->render($print, $create_field);
	}
}