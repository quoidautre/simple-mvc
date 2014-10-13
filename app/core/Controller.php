<?php

/**
 * The controller class.
 *
 * The base controller for all other controllers. Extend this for each
 * created controller and get access to it's wonderful functionality.
 */
class Controller
{
	
     /**
     * [$configFilePath Path of the config file]
     * @var string
     */
    public $configFilePath = '../app/config/config.ini';
	
    /**
     * Render a view
     *
     * @param string $viewName The name of the view to include
     * @param array  $data Any data that needs to be available within the view
     *
     * @return void
     */
    public function view($viewName, $data)
    {
	// Create a new view and display the parsed contents
	$env = array('cache' => INC_ROOT . '/app/cache'); // use the config file maybe ?
        $view = new View($viewName, $data, $env);
 	
 	// the the "globals" values in the view
        $view->initializeDatas(array('ASSET_URL' => $this->getConfig()->getValue('assets_root')));
	
	// View makes use of the __toString magic method to do this
        echo $view;
    }

    /**
     * Load a model
     *
     * @param string $model The name of the model to load
     *
     * @return object
     */
    public function model($model)
    {
        require_once '../app/models/' . ucfirst($model) . '.php';

        return new $model();
    }
    
     /**
     * [getConfig description]
     * @param  [type] $path [description]
     * @return [type]       [description]
     */
    public function getConfig() 
    {
        require_once '../app/core/Config.php';
        require_once '../app/core/ConfigIni.php';
        
        if (!class_exists('ConfigIni')) throw new Exception("ConfigIni class not available", 1);        

        $config = new ConfigIni($this->configFilePath);

        return $config;
    
    }
}
