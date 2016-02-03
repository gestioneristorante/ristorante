<!DOCTYPE html>
<html>
    <?php include 'header.php' ?>
        <div id="piatti">
            <h1>Piatti</h1>
            <table class="table" style="width: 100%;">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Prezzo CHF</th>
                </tr>
                <?php
                include 'database_connection.php';
                $sql = "select * from piatto left join(categoria) on (piatto.id_categoria = categoria.id_categoria) order by piatto.id_categoria;";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id_piatto'] . '</td>';
                    echo '<td>' . $row['nome_piatto'] . '</td>';
                    echo '<td>' . $row['nome_categoria'] . '</td>';
                    echo '<td>' . $row['prezzo_piatto'] . '</td>';
                    echo '<td style="text-align:center;"><form action="detail_piatto.php"><button type="submit" name="id_piatto" value="' . $row["id_piatto"] . '" class="btn">modifica</button></form></td>';
                    echo '<td><form action="delete_piatto.php"><button type="submit" name="id_piatto" value="' . $row["id_piatto"] . '" class="btn btn-danger">elimina</button></form></td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                <form action="insert_piatto.php">
                    <td></td>
                    <td><input type="text" name="nome_piatto"></td>
                    <td>
                        <select name="id_categoria">
                            <?php
                            $sql = "select * from categoria";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                                echo '<option value="'.$row['id_categoria'].'">'.$row['nome_categoria'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="text" name="prezzo_piatto"></td>
                    <td><button type="submit" class="btn btn-success">aggiungi</button></td>
                </form>
                </tr>
            </table>
        </div>
    </body>
</html>
