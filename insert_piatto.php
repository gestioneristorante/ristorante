<?php

include 'database_connection.php';

if (isset($_GET["nome_piatto"]) && isset($_GET["prezzo_piatto"])) {
    if ($_GET["prezzo_piatto"] >= 0) {
        $sql = 'insert into piatto(nome_piatto, prezzo_piatto, id_categoria) values(\'' . $_GET["nome_piatto"] . '\', \'' . $_GET["prezzo_piatto"] . '\', \'' . $_GET["id_categoria"] . '\');';
    } else {
        $sql = 'insert into piatto(nome_piatto, prezzo_piatto, id_categoria) values(\'' . $_GET["nome_piatto"] . '\', \'' . 0 . '\', \'' . $_GET["id_categoria"] . '\');';
    }
    if ($conn->query($sql) === true) {
        echo 'inserted';
        echo '<script>location.replace(document.referrer)</script>';
    } else {
        echo 'error' . mysqli_error($conn);
    }
}
?>