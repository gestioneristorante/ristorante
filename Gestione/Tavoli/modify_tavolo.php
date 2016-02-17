<?php

if (isset($_POST['submit'])) {
    if (!empty($_POST["num_tavolo"]) && !empty($_POST["num_posti"])) {
        if ($_POST["num_tavolo"] > 0 && $_POST["num_posti"] > 0) {
            include '../database_connection.php';

            $sql = 'update tavolo set num_tavolo = \'' . $_POST['num_tavolo'] . '\', num_posti = \'' . $_POST['num_posti'] . '\' where num_tavolo = ' . $_POST['num_tavolo'] . ';';

            if ($result = $conn->query($sql) === true) {
                echo 'done successfully';
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