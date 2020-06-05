<?php
require_once 'SendMail.php';

session_start();
if (isset($_POST['firstname'])&&isset($_POST['e_mail'])&&isset($_POST['teleph'])){
$_SESSION['name'] = $_POST['firstname'];
$_SESSION['email'] = $_POST['e_mail'];
$_SESSION['phone'] = $_POST['teleph'];
}


$data=array('name' => $_SESSION['name'], 'phone' => $_SESSION['phone'], 'email'=> $_SESSION['email']);

SendMessage($_SESSION['email'],FormMailMessage($_SESSION));
echo "Ваш заказ успешно отправлен";