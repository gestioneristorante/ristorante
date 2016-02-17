<?php

include '../database_connection.php';
$id_piatto = (int) explode(',', $_GET['id_piatto'])[0];
$id_menu = (int) explode(',', $_GET['id_piatto'])[1];
$sql = 'delete from menu_ha_piatto where id_piatto = ' . $id_piatto . ';';
if ($conn->query($sql) === true) {
    echo 'deleted successfully';
    $prezzo_totale = 0;
    $sql = 'select * from menu_ha_piatto inner join piatto on menu_ha_piatto.id_piatto = piatto.id_piatto where menu_ha_piatto.id_menu = ' . $id_menu . ';';
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $prezzo_totale += $row['prezzo_piatto'];
    }
    $sql = "update menu set prezzo_menu = $prezzo_totale where id_menu = $id_menu";
    if ($conn->query($sql) === true) {
        echo $prezzo_totale;
    } else {
        echo mysqli_error($conn);
    }
    echo '<script>location.replace(document.referrer)</script>';
} else {
    echo 'error'.  mysqli_error($conn);
}
?>