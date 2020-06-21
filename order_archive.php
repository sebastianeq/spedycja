<?php
    require_once('db_connect.php');

    if(isset($_POST['order-id'])){
        $query = $db -> prepare('UPDATE zlecenia SET realizacja = ? WHERE id_zlecenia = ?');
        $state = $query -> execute(['1', $_POST['order-id']]);
        header("Location: index.php");
    }
    else{
        header("Location: index.php");
    }

?>