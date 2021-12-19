<?php session_start();
include('../connect.php');

$salt = "asdasdapcmiir88wmmwj44AS";
$query = "select login, name, pass, is_admin from users where login ='".$_POST['login']."'";
$query = trim(strip_tags($query));
$result = mysqli_query($link, $query);
$result = mysqli_fetch_assoc($result);

if($result['login'] != $_POST['login']){
    echo 'Учетной записи не существует';
} elseif ($result['pass'] == strrev($salt.md5($_POST['password']).$salt)){
    $_SESSION['login'] = $result['login'];
    $_SESSION['auth'] = true;
    header('Location:../index.php');
} else{
    echo 'неверный пароль';
}

if($result['is_admin'] == 1){
    $_SESSION['admin'] = true;
}