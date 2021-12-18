<?php
include('func.php');
if ($_POST['del']==1){
    update('del_old');
} else if($_POST['new']==1){
    update('add_new');
} else update('update_old');
?>