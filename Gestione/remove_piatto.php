<?php

include 'database_connection.php';
$sql = 'delete from menu_ha_piatto where id_piatto = ' . $_GET['id_piatto'] . ';';
if ($conn->query($sql) === true) {
    echo 'deleted successfully';
    echo '<script>location.replace(document.referrer)</script>';
} else {
    echo 'error'.  mysqli_error($conn);
}
?>