<?php

include 'database_connection.php';

$sql = 'update piatto set nome_piatto = \''.$_GET['nome_piatto'].'\', id_categoria = \''.$_GET['id_categoria'].'\', prezzo_piatto = '.$_GET['prezzo_piatto'].' where id_piatto = '.$_GET['id_piatto'].';';

if($result = $conn->query($sql) === true){
    echo 'done successfully';
    echo '<script>location.replace(document.referrer)</script>';
}else{
    echo 'error'.  mysqli_error($conn);
}