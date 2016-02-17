<?php

if (isset($_POST['id_bevanda'])) {
    if (!empty($_POST["nome_bevanda"]) && !empty($_POST["prezzo_bevanda"])) {
        if ($_POST["prezzo_bevanda"] > 0) {
            include '../database_connection.php';

            $sql = 'update bevanda set nome_bevanda = \'' . $_POST['nome_bevanda'] . '\', id_categoria = \'' . $_POST['id_categoria'] . '\', prezzo_bevanda = ' . $_POST['prezzo_bevanda'] . ' where id_bevanda = ' . $_POST['id_bevanda'] . ';';

            if ($result = $conn->query($sql) === true) {
                echo 'done successfully';
                echo '<script>location.replace(document.referrer)</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">C\'è stato un errore nel sistema, riprova più tardi.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Hai inserito dei dati errati in uno o più campi.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Hai dimenticato di riempire uno o più campi.</div>';
    }
}
?>