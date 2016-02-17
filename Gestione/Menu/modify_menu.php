<?php

if (isset($_POST['id_menu'])) {
    include '../database_connection.php';
    if (!empty($_POST["nome_menu"]) && !empty($_POST["prezzo_menu"])) {
        if ($_POST["prezzo_menu"] >= 0) {
            $sql = 'update menu set nome_menu = \'' . $_POST['nome_menu'] . '\', prezzo_menu = ' . $_POST['prezzo_menu'] . ' where id_menu = ' . $_POST['id_menu'] . ';';
            if ($result = $conn->query($sql) === true) {
                echo 'done successfully';
                echo '<script>location.replace(document.referrer)</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">C\'è stato un errore nel sistema, riprovare più tardi</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Hai inserito dei dati errati in uno o più campi.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Hai dimenticato di riempire uno o più campi.</div>';
    }
}
?>