<!DOCTYPE html>
<html>
    <?php include 'header.php' ?>
        <div id="piatti">
            <h1>Menu</h1>
            <table class="table" style="width: 100%;">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Prezzo CHF</th>
                </tr>
                <?php
                include 'database_connection.php';
                $sql = "select * from menu;";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id_menu'] . '</td>';
                    echo '<td>' . $row['nome_menu'] . '</td>';
                    echo '<td>' . $row['prezzo_menu'] . '</td>';
                    echo '<td style="text-align:center;"><form action="detail_menu.php"><button type="submit" name="id_menu" value="' . $row["id_menu"] . '" class="btn">modifica</button></form></td>';
                    echo '<td><form action="delete_menu.php"><button type="submit" name="id_menu" value="' . $row["id_menu"] . '" class="btn btn-danger">elimina</button></form></td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                <form action="insert_menu.php">
                    <td></td>
                    <td><input type="text" name="nome_menu"></td>
                    <td><input type="text" name="prezzo_menu"></td>
                    <td><button type="submit" class="btn btn-success">aggiungi</button></td>
                </form>
                </tr>
            </table>
        </div>
    </body>
</html>
