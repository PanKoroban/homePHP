<?php session_start();
include('../connect.php');
$query = "select login from users where login ='".$_POST['login']."'";
$result = mysqli_query($link, $query);
$result = mysqli_fetch_assoc($result);
if ($result['login'] != $_POST['login']){
    $salt = "asdasdapcmiir88wmmwj44AS";
    $pass = strrev($salt.md5($_POST['password']).$salt);
    $sid = session_id();
    $query = "INSERT INTO users(login, pass, name, sid) VALUES ('".$_POST['login']."', '".$pass."', '".$_POST['name']."', '".$sid."')";
    mysqli_query($link, $query);
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['auth'] = true;
    header('Location:../index.php');
    } else { ?>
     <p>Такой логин уже существует</p>
<?php
    } ?>