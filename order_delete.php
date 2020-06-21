<?php
    require_once('db_connect.php');

    if(isset($_POST['order-id'])){
        $query = $db -> prepare('DELETE FROM zlecenia WHERE id_zlecenia = ?');
        $state = $query -> execute([$_POST['order-id']]);
        header("Location: index.php");
    }
    else{
        header("Location: index.php");
    }

?>