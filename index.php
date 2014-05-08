<?php
require_once 'app/init.php';

$app = new App();
$app->call('HomeController', 'index');