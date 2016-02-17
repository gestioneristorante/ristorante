<?php
session_start();
if (isset($_POST['submit'])) {
    include 'database_connection.php';
    $nome_utente = $_POST['nome_utente'];
    $password = md5($_POST['password']);

    $sql = 'select * from utente where nome_utente = \'' . $nome_utente . '\'';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['nome_utente'] == $nome_utente && $row['password'] == $password) {
                $_SESSION['nome_utente'] = $row['nome_utente'];
                $_SESSION['tipo'] = $row['tipo'];
                if ($row['tipo'] == 'gestore') {
                    echo '<script>location.replace("Personale/gestione_personale.php")</script>';
                } else if ($row['tipo'] == 'cameriere') {
                    echo '<script>location.replace("Personale/gestione_personale.php")</script>';
                } else {
                    echo 'non hai i permessi per poter eseguire l\'accesso';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Password sbagliata.</div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Nome utente o password sbagliati.</div>';
    }
}
?>