<?php

include 'database_connection.php';
$id_piatto = (int)explode(',', $_GET['id_piatto'])[0];
$id_menu = (int)explode(',', $_GET['id_piatto'])[1];
$sql = 'insert into menu_ha_piatto(id_piatto, id_menu) values(' . $id_piatto . ', ' . $id_menu . ');';
if ($conn->query($sql) === true) {
    echo 'inserted';
    echo '<script>location.replace(document.referrer)</script>';
} else {
    echo 'error'.  mysqli_error($conn);
    echo $id_piatto.'<br>';
    echo $id_menu;
}
?>