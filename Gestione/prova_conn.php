<?php

include 'http://www.samtinfo.ch/i13giogia/test_app/database_connection.php';

$sql = 'select * from utente';

if ($result = $conn->query($sql) === true) {
    while ($row = $result->fetch_assoc()) {
        echo $row['email'];
    }
}else{
    echo mysqli_error($conn);
}
?>