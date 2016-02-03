<?php

include 'database_connection.php';

$sql = 'update cameriere set nome_cameriere = \''.$_GET['nome_cameriere'].'\', cognome_cameriere = \''.$_GET['cognome_cameriere'].'\', data_nascita_cameriere = \''.$_GET['data_nascita_cameriere'].'\', num_tel_cameriere = \''.$_GET['num_tel_cameriere'].'\', stipendio_cameriere = '.$_GET['stipendio_cameriere'].' where id_cameriere = '.$_GET['id_cameriere'].';';
if($result = $conn->query($sql) === true){
    echo 'done successfully';
    echo '<script>location.replace(document.referrer)</script>';
}else{
    echo 'error'.  mysqli_error($conn);
}