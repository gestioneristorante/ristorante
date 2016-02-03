<?php

include 'database_connection.php';
$nome_utente = $_POST['nome_utente'];
$password = md5($_POST['password']);

$sql = 'select * from utente where nome_utente = \'' . $nome_utente . '\'';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    if ($row['nome_utente'] == $nome_utente && $row['password'] == $password) {
        session_start();
        $_SESSION['nome_utente'] = $row['nome_utente'];
        $_SESSION['tipo'] = $row['tipo'];
        if ($row['tipo'] == 'gestore') {
            echo '<script>location.replace("gestione_personale.php")</script>';
        }else if($row['tipo'] == 'cameriere'){
            echo '<script>location.replace("gestione_personale.php")</script>';
        }else{
            echo 'non hai i permessi per poter eseguire l\'accesso';
        }
    } else {
        echo '<script>location.replace(document.referrer)</script>';
    }
}
echo '<script>location.replace(document.referrer)</script>';
