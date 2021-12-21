<?php session_start();
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];


if($_SESSION['auth']){
   ?> <p> учетная запись: <?=$_SESSION['login']?></p>
    <form action="auth/logout.php" method='POST'>
    <input type="submit" value="Выйти">
    </form>
    <a href="orders.php">Мои заказы</a>
    <?php if($_SESSION['admin'] == true): ?>
        <a href="admin_panel/admin.php">Панель администратора</a>
    <?php endif ?>
<?php } 
else {
    //тут наверное больше подойдет if, но изначально планировал сделать иначе черех switch, потом передаелал и оставил switch в таком виде.
    switch ($_GET['page']){
        case ('reg'):
            ?>
            <p>Регистрация:</p>
            <form action="auth/registration.php" method="POST">
            <p>Логин:</p>
            <input type="login" name='login'>
            <p>Пароль:</p>
            <input type="password" name='password'>
            <p>Имя:</p>
            <input type="text" name='name'>
            <input type="submit">
            </form>
            <?php
            break;
        default:
        ?>
        <form action="auth/auth.php" method="POST">
                <p>Логин:</p>
                <input type="login" name='login'>
                <p>Пароль:</p>
                <input type="password" name='password'>
                <input type="submit">
        </form>
        
        <?php if($_GET['id']){
            $url=$_SERVER['REQUEST_URI'].'&page=reg';
            ?>
            <a href="<?= $url; ?>">Регистрация</a>
            <?php
        }
    else{?>
        <a href="<?= $url; ?>?page=reg">Регистрация</a>
    <?php    
    }}
}
?>