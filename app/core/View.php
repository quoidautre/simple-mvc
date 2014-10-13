<?php

class View
{
    /**
     * View file
     *
     * @var string
     */
    private $file;

    /**
     * The data of the view
     *
     * @var array
     */
    private $data;

    /**
     * The actual templater
     *
     * @var Twig_Environment
     */
    private $twig;

    /**
     * [$env Environment variables]
     * @var array
     */
    public $env = array('debug' => false);
    
    /**
     * Initialize a new View
     *
     * @param $file
     */
    public function __construct($file, $data = null, $env=array())
    {
        $this->file = $file;
        $this->data = $data;

        $twigLoader = new Twig_Loader_Filesystem(INC_ROOT . '/app/views', '__main__');
        $this->twig = new Twig_Environment($twigLoader, array_merge($this->env,$env));
    }
    
    /**
     * [initializeDatas Set the default values passed in the view (all views)]
     * @param  array  $datas [description]
     * @return [type]        [description]
     */
    public function initializeDatas(array $datas=array()) {        
        if ($datas) {
            $this->data = array_merge($this->data,$datas) ;
        }        
    }

    /**
     * Return the parsed view
     *
     * @return string
     */
    public function __toString()
    {
        return $this->parseView();
    }

    /**
     * Parse the view into a string using Twig
     *
     * @return string
     */
    public function parseView()
    {
        $file = $this->file . '.php';

        try
        {
            if(is_null($this->data))
            {
                return $this->twig->render($file);
            }

            return $this->twig->render($file, $this->data);
        }

        catch(Twig_Error_Loader $e)
        {
            return $this->getErrorMessage('loader', $e->getMessage());
        }

        catch(Twig_Error_Runtime $e)
        {
            return $this->getErrorMessage('runtime', $e->getMessage());
        }

        catch(Twig_Error_Syntax $e)
        {
            return $this->getErrorMessage('syntax', $e->getMessage());
        }
    }

    private function getErrorMessage($errorType, $errorMessage)
    {
        return sprintf("A %s error occured: %s", $errorType, $errorMessage);
    }
} 
