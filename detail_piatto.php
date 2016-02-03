<html>
    <?php include 'header.php' ?>
    <div id="camerieri">
        <h1>Modifica piatto</h1>
        <table class="table" style="width: 100%;">
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Prezzo</th>
            </tr>
            <?php
            include 'database_connection.php';
            $sql = 'select * from piatto where id_piatto = ' . $_GET['id_piatto'] . ';';
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sqlCat = "select * from categoria";
                $resultCat = $conn->query($sqlCat);

                echo '<tr><form action="modify_piatto.php">';
                echo '<td><input type="text" name="nome_piatto" value="' . $row['nome_piatto'] . '"></td>';
                echo '<td><select name="id_categoria">';
                while ($rowCat = $resultCat->fetch_assoc()) {
                    echo '<option value="' . $rowCat['id_categoria'] . '">' . $rowCat['nome_categoria'] . '</option>';
                }
                echo '</select></td>';
                echo '<td><input type="text" name="prezzo_piatto" value="' . $row['prezzo_piatto'] . '"></td>';
                echo '<td style="text-align:center;"><button type="submit" name="id_piatto" value="' . $row["id_piatto"] . '" class="btn">modifica</button></td>';
                echo '</form></tr>';
            }
            ?>
        </table>
    </div>
</body>
</html>