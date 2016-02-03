<?php

include 'database_connection.php';

if (isset($_GET["nome_menu"]) && isset($_GET["prezzo_menu"])) {
    if($_GET["prezzo_menu"] >= 0){
        $sql = 'insert into menu(nome_menu, prezzo_menu) values(\'' . $_GET["nome_menu"] . '\', ' . $_GET["prezzo_menu"] . ');';
    }else{
        $sql = 'insert into menu(nome_menu, prezzo_menu) values(\'' . $_GET["nome_menu"] . '\', ' . 0 . ');';
    }
    if ($conn->query($sql) === true) {
        echo 'inserted';
        echo '<script>location.replace(document.referrer)</script>';
    } else {
        echo 'error' . mysqli_error($conn);
    }
}
?>