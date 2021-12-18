<?php
include('connect.php');
//заполнение главной страницы
$query = "select * from catalog";
$result = mysqli_query($link, $query);

function createGallary($result) { 
    while($row = mysqli_fetch_assoc($result)):?>
    <div class="card">
        <p><?= $row['name'];?></p>
        <a href="full.php?id=<?= $row['id'];?>"> 
        <img src="short_img/<?= $row['url'];?>">
        </a>
    </div>
<?php endwhile; 
}

//заполнение комментариев
$queryComment = "SELECT * FROM comment WHERE book_id ={$_GET['id']} order by id desc limit 2";
$resComment = mysqli_query($link, $queryComment);
$queryCommentAll = "SELECT * FROM comment WHERE book_id ={$_GET['id']} order by id";
$resCommentAll = mysqli_query($link, $queryCommentAll);

function createComment($resComment){
    while($row = mysqli_fetch_assoc($resComment)):
    ?>
    <div class='inner_comment_text'>
    <p class='comment_author'><?= $row['author_name'] ?> оставил отзыв:</p>
    <p class= 'comment_text'><?= $row['comment'] ?></p>
    </div>
    <?php endwhile;
}

$queryCount = "select c.name, b.goods_count from basket b 
    inner join catalog c on b.goods_id = c.id
    where user_login='{$_SESSION['login']}' and basket_status = 1";
$resCount = mysqli_query($link, $queryCount);
function countBasket($resCount){
    while($row = mysqli_fetch_assoc($resCount)):?>
    <p><?= $row['name'] ;?> в корзине <?= $row['goods_count'];?> шт.</p> 
    <?php endwhile; 
} ?>

<?php
$queryCount = "select b.goods_count, b.id, c.name, c.price from basket b 
inner join catalog c on b.goods_id = c.id
where user_login='{$_SESSION['login']}' and basket_status = 1";
$resCount = mysqli_query($link, $queryCount);
function countBasketFull($resCount){
    while($row = mysqli_fetch_assoc($resCount)):?>
    <div class="basket_card">
    <p><?= $row['name'] ;?> в корзине <?= $row['goods_count'];?> шт.</p>
    <p>Сумма: <?= (int)$row['price']*(int)$row['goods_count']; ?> </p> 
        <?php $sum=$sum+(int)$row['price']*(int)$row['goods_count']; ?>
        <form action="basket/add.php" method="POST">
            <input type="submit" value='+'>
            <input type="hidden" name='id' value="<?=$row['id'];?>">  
            <input type="hidden" name='oper' value="add"> 
            <input type="hidden" name='count' value="<?= $row['goods_count'];?>"> 
        </form>
        <form action="basket/add.php" method="POST">
            <input type="submit" value='-'>
            <input type="hidden" name='id' value="<?=$row['id'];?>">  
            <input type="hidden" name='oper' value="sub"> 
            <input type="hidden" name='count' value="<?= $row['goods_count'];?>"> 
        </form>
        <form action="basket/add.php" method="POST">
            <input type="submit" value='Удалить'>
            <input type="hidden" name='id' value="<?=$row['id'];?>">  
            <input type="hidden" name='oper' value="del"> 
        </form>
    </div>
    <p>Итого: <?=  $sum; ?></p>
    <?php endwhile; 
    } ?>


