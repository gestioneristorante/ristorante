<?php
include 'database_connection.php';

if (isset($_GET['nome_cameriere']) && isset($_GET['cognome_cameriere']) && isset($_GET['data_nascita']) && isset($_GET['num_tel'])) {
    $sql = 'insert into cameriere(nome_cameriere, cognome_cameriere, data_nascita_cameriere, num_tel_cameriere) values(\'' . $_GET["nome_cameriere"] . '\', \'' . $_GET["cognome_cameriere"] . '\', \'' . $_GET["data_nascita"] . '\', \'' . $_GET["num_tel"] . '\');';
    if ($conn->query($sql) === true) {
        echo 'inserted';
        echo '<script>location.replace(document.referrer)</script>';
    } else {
        echo 'error';
    }
}
?>