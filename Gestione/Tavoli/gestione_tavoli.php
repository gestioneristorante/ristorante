<!DOCTYPE html>
<html>
    <?php include '../header.php' ?>
    <div id="piatti">
        <h1>Tavoli</h1>
        <table class="table" style="width: 100%;">
            <tr>
                <th>Numero tavolo</th>
                <th>Posti</th>
            </tr>
            <?php
            include '../database_connection.php';
            $sql = "select * from tavolo;";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['num_tavolo'] . '</td>';
                echo '<td>' . $row['num_posti'] . '</td>';
                echo '<td style="text-align:center;"><form action="detail_tavolo.php"><button type="submit" name="num_tavolo" value="' . $row["num_tavolo"] . '" class="btn">modifica</button></form></td>';
                echo '<td><form action="delete_tavolo.php"><button type="submit" name="num_tavolo" value="' . $row["num_tavolo"] . '" class="btn btn-danger">elimina</button></form></td>';
                echo '</tr>';
            }
            ?>
            <tr>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <td><input type="number" name="num_tavolo"></td>
                <td><input type="number" name="num_posti"></td>
                <td><button name="submit" type="submit" class="btn btn-success">aggiungi</button></td>
            </form>
            <?php include 'insert_tavolo.php' ?>
            </tr>
        </table>
    </div>
</body>
</html>
