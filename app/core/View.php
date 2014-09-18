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
     * Initialize a new View
     *
     * @param $file
     */
    public function __construct($file, $data = null)
    {
        $this->file = $file;
        $this->data = $data;

        $twigLoader = new Twig_Loader_Filesystem();
        $twigLoader->addPath(INC_ROOT . '/app/views', '__main__');
        $this->twig = new Twig_Environment($twigLoader,
            [
                'cache' => INC_ROOT . '/app/cache'
            ]);
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
        $file = $this->file . '.html';

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
            echo "Loader error!";
            return $e->getMessage();
        }

        catch(Twig_Error_Runtime $e)
        {
            echo "Runtime error!";
            return $e->getMessage();
        }

        catch(Twig_Error_Syntax $e)
        {
            echo 'Syntax error!';
            return $e->getMessage();
        }
    }
} 