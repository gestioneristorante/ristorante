<?php

if (isset($_POST['submit'])) {
    include '../database_connection.php';

    if (!empty($_POST['nome_cameriere']) && !empty($_POST['cognome_cameriere']) && !empty($_POST['data_nascita']) && !empty($_POST['num_tel'])) {
        $sql = 'insert into cameriere(nome_cameriere, cognome_cameriere, data_nascita_cameriere, num_tel_cameriere) values(\'' . $_POST["nome_cameriere"] . '\', \'' . $_POST["cognome_cameriere"] . '\', \'' . $_POST["data_nascita"] . '\', \'' . $_POST["num_tel"] . '\');';
        if ($conn->query($sql) === true) {
            echo 'inserted';
            echo '<script>location.replace(document.referrer)</script>';
        } else {
            echo '<div class="alert alert-danger" role="alert">C\è stato un errore nel sitema, riprova più tardi.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Non hai riempito uno o più campi.</div>';
    }
}
?>