<?php
$mycards = array();
$db = new PDO('mysql:host=localhost;dbname=cards_cakes', 'root', 'want./1007');
function All_database_data($db)
{
	$mycards = array();
	try 
	{
		$i=0;
		$data = $db->query("SELECT * FROM cards")->fetchAll(PDO::FETCH_ASSOC);
		foreach ($data as $v)
		{
			$mycards[$i]=array('card_id' =>$v['id'],'card_name' =>$v['name'],'card_image' =>$v['img'],'card_price' =>$v['price'],'card_weight' =>$v['weight'],'card_height' =>$v['height'],'card_base' =>$v['base'],'card_filling' =>$v['filling']);
			$i++;	
		}
		return $mycards;
	} 
	catch (PDOException $e) 
	{
		print "Error!: " . $e->getMessage();
		die();
	}
}

function Selected_database_data()
{
	try 
	{
		$i=0;
		$db=func_get_arg(0);
		$request=func_get_arg(1);
		$params=func_get_arg(2);
		$stmt = $db->prepare($request);
		$stmt->execute($params);
		while ($row = $stmt->fetch(PDO::FETCH_LAZY)) 
		{
			$res[$i]=array('card_id' =>$row->id,'card_name' =>$row->name,'card_image' =>$row->img,'card_price' =>$row->price);
			$i++;
		}
		if (isset($res)){return $res;}	
		else {return null;}
	}
	catch (PDOException $e) 
	{
		print "Error!: " . $e->getMessage();
		die();
	}
}


function Request_in_database(){
	try{
		$db=func_get_arg(0);
		$request=func_get_arg(1);
		$params=func_get_arg(2);
		$sth = $db->prepare($request);
		$sth->execute($params);
		$insert_id = $db->lastInsertId();
		return $insert_id;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage();
		die();
	}
}