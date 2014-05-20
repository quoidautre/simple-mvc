<?php

require_once 'core/App.php';
require_once 'core/Controller.php';

/*
 * Root path for inclusion.
 */
define('INC_ROOT', dirname(__DIR__));

/*
 * Root path for assets
 */
define('ASSET_ROOT',
    'http://'.$_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', dirname(__DIR__)).'/public'
    )
);