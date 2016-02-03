<?php

include 'database_connection.php';
$sql = 'delete from menu where id_menu = ' . $_GET['id_menu'] . ';';
if ($conn->query($sql) === true) {
    echo 'deleted successfully';
    $sql = 'delete from menu_ha_piatto where id_menu = ' . $_GET['id_menu'] . ';';
    if ($conn->query($sql) === true) {
        echo 'deleted successfully';
    } else {
        echo 'error';
    }
    echo '<script>location.replace(document.referrer)</script>';
} else {
    echo 'error';
}
?>