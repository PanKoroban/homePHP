<?php
session_start();
include('../connect.php');
switch($_POST['oper']){
    case 'add':
        $count= (int)$_POST['count']+1;
        $query = "UPDATE basket SET goods_count = $count WHERE id=".$_POST['id'];
        $res = mysqli_query($link, $query); 
        header("Location:{$_SERVER['HTTP_REFERER']}"); 
        break;
    case 'sub':
        $count= (int)$_POST['count']-1;
        if($count == 0){
            $query = "DELETE FROM basket WHERE id={$_POST['id']}";
            $res = mysqli_query($link, $query); 
        } else{
        $query = "UPDATE basket SET goods_count = $count WHERE id=".$_POST['id'];
        $res = mysqli_query($link, $query); 
        }
        header("Location:{$_SERVER['HTTP_REFERER']}"); 
        break;
    case 'del':
        $query = "DELETE FROM basket WHERE id={$_POST['id']}";
        $res = mysqli_query($link, $query);
        header("Location:{$_SERVER['HTTP_REFERER']}"); 
        break;
    default:
        break;
}