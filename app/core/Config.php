<?php
Interface  Config {
	
	/**
	 * [getValue Get the value ]
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function getValue($key);

	/**
	 * [add Add a value in the config file]
	 * @param [type] $key   [description]
	 * @param [type] $value [description]
	 */
	public function add($key, $value);

	/**
	 * [save Saving on hard disc]
	 * @return [type] [description]
	 */
	public function save();
}
?>
