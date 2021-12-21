<?php
include('../connect.php');
$queryAdmin = "select b.*, c.name from basket b inner join catalog c on c.id=b.goods_id";
$resultAdmin = mysqli_query($link, $queryAdmin);
?>
<a href="admin.php">К редактированию</a>
<h3>Необработанные заказы:</h3> 
<?php
while($row = mysqli_fetch_assoc($resultAdmin)){
	if ($row['basket_status'] == 2): ?>
    <div class="work">
	<p>login получателя: <?= $row['user_login']; ?></p>
	<p>Оплаченная книга: <?= $row['name']; ?></p>
	<p>Кол-во: <?= $row['goods_count']; ?></p>
    <form action="complet.php" method='POST'>
        <input type="submit" value='Выполнен'>
        <input type="hidden" name='id' value='<?= $row['id']; ?>'>
    </form>
    </div>
    <?php endif ?>
    <?php
}
?>
<h3>Выполненные заказы:</h3> 
<?php

$resultAdmin = mysqli_query($link, $queryAdmin);
while($row = mysqli_fetch_assoc($resultAdmin)){
	if ($row['basket_status'] == 3): ?>
    <div class="work">
	<p>login получателя: <?= $row['user_login']; ?></p>
	<p>Оплаченная книга: <?= $row['name']; ?></p>
	<p>Кол-во: <?= $row['goods_count']; ?></p>
    </div>
    <?php endif ?>
    <?php
}
?>

<h3>Брошенные корзины:</h3> 
<?php

$resultAdmin = mysqli_query($link, $queryAdmin);
while($row = mysqli_fetch_assoc($resultAdmin)){
	if ($row['basket_status'] == 1): ?>
    <div class="work">
	<p>login получателя: <?= $row['user_login']; ?></p>
	<p>Оплаченная книга: <?= $row['name']; ?></p>
	<p>Кол-во: <?= $row['goods_count']; ?></p>
    </div>
    <?php endif ?>
    <?php
}
?>
