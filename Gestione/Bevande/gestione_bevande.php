<!DOCTYPE html>
<html>
    <?php include '../header.php' ?>
    <div id="piatti">
        <h1>Bevande</h1>
        <table class="table" style="width: 100%;">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Prezzo CHF</th>
            </tr>
            <?php
            include '../database_connection.php';
            $sql = "select * from bevanda left join(categoria_bevanda) on (bevanda.id_categoria = categoria_bevanda.id_categoria) order by bevanda.id_categoria;";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id_bevanda'] . '</td>';
                echo '<td>' . $row['nome_bevanda'] . '</td>';
                echo '<td>' . $row['nome_categoria'] . '</td>';
                echo '<td>' . $row['prezzo_bevanda'] . '</td>';
                echo '<td style="text-align:center;"><form action="detail_bevanda.php"><button type="submit" name="id_bevanda" value="' . $row["id_bevanda"] . '" class="btn">modifica</button></form></td>';
                echo '<td><form action="delete_bevanda.php"><button type="submit" name="id_bevanda" value="' . $row["id_bevanda"] . '" class="btn btn-danger">elimina</button></form></td>';
                echo '</tr>';
            }
            ?>
            <tr>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <td></td>
                <td><input type="text" name="nome_bevanda"></td>
                <td>
                    <select name="id_categoria">
                        <?php
                        $sql = "select * from categoria_bevanda";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id_categoria'] . '">' . $row['nome_categoria'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td><input type="text" name="prezzo_bevanda"></td>
                <td><button name="submit" type="submit" class="btn btn-success">aggiungi</button></td>
            </form>
            <?php include 'insert_bevanda.php' ?>
            </tr>
        </table>
    </div>
</body>
</html>
