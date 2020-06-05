<?php

require_once 'vendor/autoload.php';
require_once 'PDO_database.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);


session_start();
$type=implode(",",$_REQUEST);
if ($type=="")
{
	$name="All items";
	$mycards=All_database_data($db);
}
else
{
	$name="$type";
	$mycards=Selected_database_data($db,"SELECT * FROM menuitems WHERE `type` = ?",array($type));	
}


$twig->addGlobal('link_contacts', "../Contacts.php");
$twig->addGlobal('link_assortiment', "../Assortiment.php");
$twig->addGlobal('link_about', "../About.php");
$twig->addGlobal('link_main', "../index.php");
$twig->addGlobal('cart_number', $_SESSION['total']);
$twig->addGlobal('Sum', $_SESSION['sum']);
echo $twig->render('assortiment.twig',array('mycards' => $mycards));