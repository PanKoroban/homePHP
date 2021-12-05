<?php
function translit($str){
	$alfavit = ['а' => 'a','б' => 'b','в' => 'v','г' => 'g','д' => 'd','е' => 'e','ё' => 'e','ж' => 'zh','з' => 'z',
	'и' => 'i','й' => 'y','к' => 'k','л' => 'l','м' => 'm','н' => 'n','о' => 'o','п' => 'p','р' => 'r','с' => 's','т' => 't','у' => 'u',
	'ф' => 'f','х' => 'kh','ц' => 'ts','ч' => 'ch','ш' => 'sh','щ' => 'shch','ъ' => '',
	'ы' => 'y', 'ь' => '','э' => 'e','ю' => 'yu','я' => 'ya'];
	$str = mb_strtolower($str);
	$arr = mb_str_split($str, 1);  //преобразую строку в массив.
	//заменяю кириллицу на латинские буквы
	for($i=0;$i<count($arr);++$i){ 
		foreach($alfavit as $k => $v){
			if ($arr[$i] == $k){
				$arr[$i] = $v;
				break;
			}
		}
	}
	return implode("",$arr);
}

function unspace($str){
	$arr = mb_str_split($str, 1);
	for($i=0;$i<count($arr);++$i){
		if ($arr[$i] == " "){
			$arr[$i] = "_";
		}
	}
	return implode("",$arr);
}

function transform($str){
	return translit(unspace($str));	
}

function add_new(){
	$url = transform($_POST['name']).".".substr($_FILES['new_img']['type'], 6);
	include('../connect.php');
	$query = "INSERT INTO catalog(name, url, short_disc, disc, price, author) VALUES ('".$_POST['name']."', '".$url."', '".$_POST['short_disc']."', '".$_POST['disc']."', '".$_POST['price']."', '".$_POST['author']."')";
	mysqli_query($link, $query);

	if($_FILES['new_img']['error']){
		echo "Ошибка загрузки {$_FILES['new_img']['error']}";
	} elseif($_FILES['new_img']['error'] > 1000000){
		echo "Файл слишком большой";
	} elseif($_FILES['new_img']['type'] == 'image/jpeg' or $_FILES['new_img']['type'] == 'image/png' or $_FILES['new_img']['type'] == 'image/gif'){
		//уменьшаем картинку
		list($width, $height) = getimagesize($_FILES['new_img']['tmp_name']);
		$thumb = imagecreatetruecolor(200, 300);
		//сохраняем в нужном формате
		switch($_FILES['new_img']['type']){
			case 'image/jpeg':
				$source = imagecreatefromjpeg($_FILES['new_img']['tmp_name']);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, 200, 300, $width, $height);
				imagejpeg($thumb , "../short_img/".$url);
				break;
			case 'image/png':
				$source = imagecreatefrompng($_FILES['new_img']['tmp_name']);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, 200, 300, $width, $height);
				imagepng($thumb , "../short_img/".$url);
				break;
			case 'image/gif':
				$source = imagecreatefromgif($_FILES['new_img']['tmp_name']);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, 200, 300, $width, $height);
				imagegif($thumb , "../short_img/".$url);
				break;
		}

		list($width, $height) = getimagesize($_FILES['new_img']['tmp_name']);
		$thumb = imagecreatetruecolor(533, 800);
		switch($_FILES['new_img']['type']){
			case 'image/jpeg':
				$source = imagecreatefromjpeg($_FILES['new_img']['tmp_name']);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, 533, 800, $width, $height);
				imagejpeg($thumb , "../full_img/".$url);
				break;
			case 'image/png':
				$source = imagecreatefrompng($_FILES['new_img']['tmp_name']);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, 533, 800, $width, $height);
				imagepng($thumb , "../full_img/".$url);
				break;
			case 'image/gif':
				$source = imagecreatefromgif($_FILES['new_img']['tmp_name']);
				imagecopyresized($thumb, $source, 0, 0, 0, 0, 533, 800, $width, $height);
				imagegif($thumb , "../full_img/".$url);
				break;
		}
		
		header('Location:admin.php');	
	}
}

function del_old (){
	include('../connect.php');
	$query = "SELECT * FROM catalog WHERE id=".$_POST['id'];
	$res=mysqli_query($link, $query);
	$res=mysqli_fetch_assoc($res);
	$path="../full_img/".$res['url'];
	unlink ($path);
	$path="../short_img/".$res['url'];
	unlink ($path);
	$query = "DELETE FROM catalog WHERE id=".$_POST['id'];
	mysqli_query($link, $query);
	header('Location:admin.php');
}


function update_old(){
		include('../connect.php');
		$query = "UPDATE catalog SET name='".$_POST['name']."', short_disc='".$_POST['short_disc']."',disc='".$_POST['disc']."', price='".$_POST['price']."', author='".$_POST['author']."' WHERE id=".$_POST['id'];
		mysqli_query($link, $query);
		header('Location:admin.php');
}

function update($str){
	switch ($str){
		case 'add_new':
			add_new();
			break;
		case 'del_old':
			del_old();
			break;
		case 'update_old':
			update_old();
			break;
		default:
			echo 'ошибка';
			break;
	}
}

?>