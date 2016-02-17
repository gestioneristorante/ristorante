<?php

include '../database_connection.php';
$sql = 'delete from bevanda where id_bevanda = ' . $_GET['id_bevanda'] . ';';
if ($conn->query($sql) === true) {
    echo 'deleted successfully';
    echo '<script>location.replace(document.referrer)</script>';
} else {
    echo 'error';
}
?>