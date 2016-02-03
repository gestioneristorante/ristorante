<?php

include 'database_connection.php';
$sql = 'delete from cameriere where id_cameriere = ' . $_GET['id_cameriere'] . '';
if ($conn->query($sql) === true) {
    echo 'deleted successfully';
    echo '<script>location.replace(document.referrer)</script>';
} else {
    echo 'error';
}