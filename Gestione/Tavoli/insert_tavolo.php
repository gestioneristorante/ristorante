<?php

if (isset($_POST['submit'])) {
    include '../database_connection.php';

    if (!empty($_POST["num_tavolo"]) && !empty($_POST["num_posti"])) {
        if ($_POST["num_tavolo"] > 0 && $_POST["num_posti"] > 0) {
            $sql = 'insert into tavolo(num_tavolo, num_posti) values(' . $_POST["num_tavolo"] . ', ' . $_POST["num_posti"] . ');';
            if ($conn->query($sql) === true) {
                echo 'inserted';
                echo '<script>location.replace(document.referrer)</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">C\'è stato un errore nel sistema, riprova più tardi.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Hai inserito dei dati sbagliati in uno o più campi.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Non hai riempito uno o più campi.</div>';
    }
}
?>