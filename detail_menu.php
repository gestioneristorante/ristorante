<html>
    <?php include 'header.php' ?>
        <div id="camerieri">
            <h1>Modifica menu</h1>
            <table class="table" style="width: 100%;">
                <tr>
                    <th>Nome</th>
                    <th>Prezzo CHF</th>
                </tr>
                <?php
                include 'database_connection.php';
                $sql = 'select * from menu where id_menu = ' . $_GET['id_menu'] . ';';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr><form action="modify_menu.php">';
                    echo '<td><input type="text" name="nome_menu" value="' . $row['nome_menu'] . '"></td>';
                    echo '<td><input type="text" name="prezzo_menu" value="' . $row['prezzo_menu'] . '"></td>';
                    echo '<td style="text-align:center;"><button type="submit" name="id_menu" value="' . $row["id_menu"] . '" class="btn">modifica</button></td>';
                    echo '</form></tr>';
                }
                ?>

                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Prezzo CHF</th>
                </tr>
                <?php
                //$sql = 'select * from menu_ha_piatto left join(piatto, menu, categoria) on (menu_ha_piatto.id_menu = menu.id_menu, menu_ha_piatto.id_piatto = piatto.id_piatto, piatto.id_categoria = categoria.id_categoria);';
                $sql = 'select * from menu_ha_piatto inner join piatto on menu_ha_piatto.id_piatto = piatto.id_piatto left join categoria on piatto.id_categoria = categoria.id_categoria where menu_ha_piatto.id_menu = ' . $_GET['id_menu'] . ' order by piatto.id_categoria;';
                $result = $conn->query($sql);
                echo mysqli_error($conn);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['nome_piatto'] . '</td>';
                    echo '<td>' . $row['nome_categoria'] . '</td>';
                    echo '<td>' . $row['prezzo_piatto'] . '</td>';
                    echo '<td><form action="remove_piatto.php"><button type="submit" name="id_piatto" value="' . $row["id_piatto"] . '" class="btn btn-danger">rimuovi</button></form></td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                <form action="add_piatto.php">
                    <td>
                        <select name="id_piatto">
                            <?php
                            $sql = "select * from piatto left join(categoria) on (piatto.id_categoria = categoria.id_categoria);";
                            $result = $conn->query($sql);
                            $categoria;
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id_piatto'] . ','.$_GET['id_menu'].'">' . $row['nome_piatto'] . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td><button type="submit" class="btn btn-success">aggiungi</button></td>
                </form>
                </tr>
            </table>
        </div>
    </body>
</html>