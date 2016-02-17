<?php

if (isset($_POST['submit'])) {
    include '../database_connection.php';

    if (!empty($_POST["nome_bevanda"]) && !empty($_POST["prezzo_bevanda"])) {
        if ($_POST["prezzo_bevanda"] > 0) {
            $sql = 'insert into bevanda(nome_bevanda, prezzo_bevanda, id_categoria) values(\'' . $_POST["nome_bevanda"] . '\', \'' . $_POST["prezzo_bevanda"] . '\', \'' . $_POST["id_categoria"] . '\');';
            if ($conn->query($sql) === true) {
                echo 'inserted';
                echo '<script>location.replace(document.referrer)</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">C\'è stato un errore nel sistema, riprova più tardi.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Hai inserito un prezzo errato.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Non hai riempito uno o più campi.</div>';
    }
}
?>