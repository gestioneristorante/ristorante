<?php

if (isset($_POST['submit'])) {
    include '../database_connection.php';
    if (!empty($_POST["nome_menu"]) && !empty($_POST["prezzo_menu"])) {
        if ($_POST["prezzo_menu"] >= 0) {
            $sql = 'insert into menu(nome_menu, prezzo_menu) values(\'' . $_POST["nome_menu"] . '\', ' . $_POST["prezzo_menu"] . ');';
            if ($conn->query($sql) === true) {
                echo 'inserted';
                echo '<script>location.replace(document.referrer)</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">C\è stato un errore nel sistema, riprova più tardi.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Hai inserito un prezzo sbagliato</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Non hai riempito uno o più campi.</div>';
    }
}
?>