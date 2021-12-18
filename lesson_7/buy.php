<?php
session_start();
include('connect.php');
$queryBuy = "select * from basket where user_login='".$_SESSION['login']."' and goods_id =".$_POST['goods_id']." and basket_status = 1";
$resBuy = mysqli_query($link, $queryBuy);
$resBuy = mysqli_fetch_assoc($resBuy);


if (!$resBuy){
    $queryBuy = "INSERT INTO basket(goods_id, user_login, goods_count) VALUES (".$_POST['goods_id'].", '".$_SESSION['login']."', 1)";
    mysqli_query($link, $queryBuy);
    header("Location:{$_SERVER['HTTP_REFERER']}");
} else{
    $queryBuy = "select goods_count from basket where user_login='".$_SESSION['login']."' and goods_id =".$_POST['goods_id']." and basket_status = 1";
    $resBuy = mysqli_query($link, $queryBuy);
    $count = mysqli_fetch_assoc($resBuy);
    ++$count['goods_count'];
    $queryBuy = "UPDATE basket SET goods_count={$count['goods_count']} WHERE user_login='".$_SESSION['login']."' and goods_id =".$_POST['goods_id']." and basket_status = 1";
    $resBuy = mysqli_query($link, $queryBuy);
    header("Location:{$_SERVER['HTTP_REFERER']}");
}