<?php

if (isset($_POST['id_piatto'])) {
    if (!empty($_POST["nome_piatto"]) && !empty($_POST["prezzo_piatto"])) {
        if ($_POST["prezzo_piatto"] > 0) {
            include '../database_connection.php';

            $sql = 'update piatto set nome_piatto = \'' . $_POST['nome_piatto'] . '\', id_categoria = \'' . $_POST['id_categoria'] . '\', prezzo_piatto = ' . $_POST['prezzo_piatto'] . ' where id_piatto = ' . $_POST['id_piatto'] . ';';

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