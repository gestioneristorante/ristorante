<!DOCTYPE html>
<html>
    <?php session_start(); ?>
    <?php include '../header.php' ?>
    <div id="camerieri">
        <h1>Camerieri</h1>
        <table class="table" style="width: 100%;">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Data Nascita</th>
                <th>Num. telefono</th>
            </tr>
            <?php
            include '../database_connection.php';
            $sql = "select * from cameriere";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id_cameriere'] . '</td>';
                echo '<td>' . $row['nome_cameriere'] . '</td>';
                echo '<td>' . $row['cognome_cameriere'] . '</td>';
                echo '<td>' . $row['data_nascita_cameriere'] . '</td>';
                echo '<td>' . $row['num_tel_cameriere'] . '</td>';
                echo '<td style="text-align:center;"><form action="detail_cameriere.php"><button type="submit" name="id_cameriere" value="' . $row["id_cameriere"] . '" class="btn">modifica</button></form></td>';
                echo '<td><form action="delete_cameriere.php"><button type="submit" name="id_cameriere" value="' . $row["id_cameriere"] . '" class="btn btn-danger">elimina</button></form></td>';
                echo '</tr>';
            }
            ?>
            <tr>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <td></td>
                <td><input type="text" name="nome_cameriere"></td>
                <td><input type="text" name="cognome_cameriere"></td>
                <td><input type="date" name="data_nascita"></td>
                <td><input type="tel" name="num_tel"></td>
                <td><button name="submit" type="submit" class="btn btn-success">aggiungi</button></td>
            </form>
            <?php include 'insert_cameriere.php'; ?>
            </tr>
        </table>
    </div>
</body>
</html>
