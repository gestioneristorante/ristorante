<?php

if (isset($_POST['id_cameriere'])) {
    include '../database_connection.php';
    if (!empty($_POST['nome_cameriere']) && !empty($_POST['cognome_cameriere']) && !empty($_POST['data_nascita_cameriere']) && !empty($_POST['num_tel_cameriere']) && !empty($_POST['stipendio_cameriere'])) {
        echo '<script>console.log("sono qui")</script>';
        if ($_POST['stipendio_cameriere'] > 0) {
            $sql = 'update cameriere set nome_cameriere = \'' . $_POST['nome_cameriere'] . '\', cognome_cameriere = \'' . $_POST['cognome_cameriere'] . '\', data_nascita_cameriere = \'' . $_POST['data_nascita_cameriere'] . '\', num_tel_cameriere = \'' . $_POST['num_tel_cameriere'] . '\', stipendio_cameriere = ' . $_POST['stipendio_cameriere'] . ' where id_cameriere = ' . $_POST['id_cameriere'] . ';';
            if ($result = $conn->query($sql) === true) {
                echo 'done successfully';
                echo '<script>location.replace(document.referrer)</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">C\è stato un errore nel sistema, riprova più tardi.</div>';
            }
        }else{
            echo '<div class="alert alert-danger" role="alert">Hai inserito dei dati sbagliati in uno o più campi.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Hai dimenticato di riempire uno o più campi.</div>';
    }
}
?>