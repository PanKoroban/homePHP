<form action="calc.php" method="POST">
    <p>Число 1:</p>
    <input type="text" name="a">
    <p>Число 2:</p>
    <input type="text" name="b"> 
    <br>
    <input type="submit" value="+" name="oper[]">
    <input type="submit" value="-" name="oper[]">
    <input type="submit" value="*" name="oper[]">
    <input type="submit" value="/" name="oper[]">
    <br><br>
    <label><?= $_GET['res'] ?></label>
</form> 