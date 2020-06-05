<?php

require_once 'vendor/autoload.php';
require_once 'PDO_database.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('About.twig');
echo $template->render(array());