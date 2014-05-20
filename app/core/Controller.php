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
     * Render a view
     *
     * @param string $view The name of the view to include
     * @param array $data Any data that needs to be available within the view
     *
     * @return void
     */
    public function view($view, $data)
    {
        // $data passed into method is now available in this view
        require_once '../app/views/' . $view . '.php';
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
}