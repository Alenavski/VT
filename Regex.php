<?php
$name = $_POST['name'];
$email = $_POST['email'];
$theme = $_POST['theme'];
$tel = $_POST['tel'];
$msg = $_POST['msg'];
$regexp='/^[a-zA-Z0-9_.]+@[a-zA-Z_.]+\.[a-zA-Z]+$/u';
$matches=array();
function Check_User_Data($data,$regexp,&$matches){
		try{
			$input=htmlspecialchars($data);
			if (preg_match($regexp,$input,$matches))
				return 1;
			else 
				return 0;
		} 
		catch (Exception $e) {
			echo "Ошибка обработки";
		}
}
function Write_Data_to_File($filename,$data){
	$fd = fopen($filename, 'a') or die("не удалось создать файл");
	fwrite($fd, $data);
	fclose($fd);
}
if (isset($name)&&isset($email)&&isset($msg)){
	if (Check_User_Data($email,$regexp,$matches)){
		$data="{$name}:{$email}:{$theme}:{$tel}:{$msg}\n";
		Write_Data_to_File("Data.txt",$data);
		echo "Почта принята и сохраненена";
	}
	else
		echo "Проверьте введенные данные email";
}