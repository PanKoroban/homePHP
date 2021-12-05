<?php
if($_FILES['new_img']['error']){
    echo "Ошибка загрузки {$_FILES['new_img']['error']}";
} elseif($_FILES['new_img']['error'] > 1000000){
    echo "Файл слишком большой";
} elseif($_FILES['new_img']['type'] == 'image/jpeg' or $_FILES['new_img']['type'] == 'image/png' or $_FILES['new_img']['type'] == 'image/gif'){
    //уменьшаем картинку
    list($width, $height) = getimagesize($_FILES['new_img']['tmp_name']);
    $thumb = imagecreatetruecolor(300, 300);
    //сохраняем в нужном формате
    switch($_FILES['new_img']['type']){
        case 'image/jpeg':
            $source = imagecreatefromjpeg($_FILES['new_img']['tmp_name']);
            imagecopyresized($thumb, $source, 0, 0, 0, 0, 300, 300, $width, $height);
            imagejpeg($thumb , "img_short/".$_FILES['new_img']['name']);
            break;
        case 'image/png':
            $source = imagecreatefrompng($_FILES['new_img']['tmp_name']);
            imagecopyresized($thumb, $source, 0, 0, 0, 0, 300, 300, $width, $height);
            imagepng($thumb , "img_short/".$_FILES['new_img']['name']);
            break;
        case 'image/gif':
            $source = imagecreatefromgif($_FILES['new_img']['tmp_name']);
            imagecopyresized($thumb, $source, 0, 0, 0, 0, 300, 300, $width, $height);
            imagegif($thumb , "img_short/".$_FILES['new_img']['name']);
            break;
    }
    // переношу исходный файл в нужную папку
    move_uploaded_file($_FILES['new_img']['tmp_name'], "img/".$_FILES['new_img']['name']);
    header('Location: '.$_SERVER['HTTP_REFERER']);
} 