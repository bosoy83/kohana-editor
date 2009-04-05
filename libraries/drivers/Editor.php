<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Editor driver library
 *
 * @package    Editor
 * @author     Brotkin Ivan (BIakaVeron) <BIakaVeron@gmail.com>
 * @copyright  Copyright (c) 2009 Brotkin Ivan
 *
 */
abstract class Editor_Driver {

	// Configuration
	protected $config;

	/**
	 * Changing editor width
	 *
	 * @param  int  new width value
	 * @return void
	 */
	public function setWidth($width = NULL) {
		is_null($width) OR $this->config['width'] = intval($width);
	}

	/**
	 * Changing editor height
	 *
	 * @param  int  new height value
	 * @return void
	 */
	public function setHeight($height = NULL) {
		is_null($height) OR $this->config['height'] = intval($height);
	}

	/**
	 * Changing text field name
	 *
	 * @param  string new field (textarea) name
	 * @return void
	 */
	public function setFieldName($fname = NULL) {
		is_null($fname) OR $this->config['fieldName'] = $fname;
	}

	/**
	 * Display text redactor or returns redactor code
	 *
	 * @param   bool   outputs code directly if TRUE
	 * @param   bool   creates textarea field if TRUE
	 * @return  mixed  returns output code if $print==FALSE
	 */
	abstract function render($print = FALSE, $create_field = FALSE);
}