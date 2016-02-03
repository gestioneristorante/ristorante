<?php

include 'database_connection.php';

$sql = 'update menu set nome_menu = \''.$_GET['nome_menu'].'\', prezzo_menu = '.$_GET['prezzo_menu'].' where id_menu = '.$_GET['id_menu'].';';

if($result = $conn->query($sql) === true){
    echo 'done successfully';
    echo '<script>location.replace(document.referrer)</script>';
}else{
    echo 'error'.  mysqli_error($conn);
}