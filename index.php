<?php

require_once 'vendor/autoload.php';
require_once 'PDO_database.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader,array(
    'cache'       => 'compilation_cache',
    'auto_reload' => true
));


session_start();
if (!isset($_SESSION['counter'])) 
{
    $_SESSION['counter'] = 0;
	$_SESSION['total'] = 0;
	$_SESSION['sum']=0;	
	$_SESSION['phone']="Введите ваш телефон";
	$_SESSION['name']="Введите ваш псевдоним";
	$_SESSION['email']="Введите ваш email";
}
$mycards=All_database_data($db);

$twig->addGlobal('link_contacts', "../Contacts.php");
$twig->addGlobal('link_assortiment', "../Assortiment.php");
$twig->addGlobal('link_about', "../About.php");
$twig->addGlobal('link_main', "../index.php");
$twig->addGlobal('cart_number', $_SESSION['total']);
$twig->addGlobal('Sum', $_SESSION['sum']);


$template = $twig->loadTemplate('index.twig');
echo $template->render(array());