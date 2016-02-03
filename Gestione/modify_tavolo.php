<?php

include 'database_connection.php';

$sql = 'update tavolo set num_tavolo = \''.$_GET['num_tavolo'].'\', num_posti = \''.$_GET['num_posti'].'\' where num_tavolo = '.$_GET['num_tavolo'].';';

if($result = $conn->query($sql) === true){
    echo 'done successfully';
    echo '<script>location.replace(document.referrer)</script>';
}else{
    echo 'error'.  mysqli_error($conn);
}