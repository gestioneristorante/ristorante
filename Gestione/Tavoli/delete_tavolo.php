<?php

include '../database_connection.php';
$sql = 'delete from tavolo where num_tavolo = ' . $_GET['num_tavolo'] . ';';
if ($conn->query($sql) === true) {
    echo 'deleted successfully';
    echo '<script>location.replace(document.referrer)</script>';
} else {
    echo 'error';
}
?>