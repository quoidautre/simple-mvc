<?php

class ConfigIni implements Config {
	
	private $config;
	private $configFile;
	/**
	 * [__construct]
	 * @param [type] $config_file [description]
	 */
	public function __construct($config_file) {
		$this->configFile = $config_file;
		$this->config = parse_ini_file($config_file);

		if (!$this->config) {
			throw new Exception('Configuration file corrupted.');
		}
	}

	/**
	 * [getValue Read a value in the config file]
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function getValue($key) {
		return $this->config[$key];
	}

	/**
	 * [add Add a value  like "key=value" in in ifile for example]
	 * @param [type] $key   [description]
	 * @param [type] $value [description]
	 */
	public function add($key, $value) {
		$this->config[$key] = $value;
		return true;
	}

	/**
	 * [save save on harddrive or whatever]
	 * @return [type] [description]
	 */
	public function save() {

		$data = '; '.date('d.m.Y - H:i:s')."\n";
		
		foreach ($this->config AS $key => $value) {
			$data .= $key.' = "'.$value."\"\n";
		}
		
		return file_put_contents($this->configFile, $data);
	}
}
?>
