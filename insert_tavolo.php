<?php

include 'database_connection.php';

if (isset($_GET["num_tavolo"]) && isset($_GET["num_posti"])) {
    if ($_GET["num_tavolo"] >= 0 || $_GET["num_posti"] >= 0) {
        $sql = 'insert into tavolo(num_tavolo, num_posti) values(' . $_GET["num_tavolo"] . ', ' . $_GET["num_posti"] . ');';
    }else{
        $sql = 'insert into tavolo(num_tavolo, num_posti) values(' . 0 . ', ' . 0 . ');';
    }
    if ($conn->query($sql) === true) {
        echo 'inserted';
        echo '<script>location.replace(document.referrer)</script>';
    } else {
        echo 'error' . mysqli_error($conn);
    }
}
?>