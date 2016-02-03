<html>
    <?php include 'header.php' ?>
        <div id="camerieri">
            <h1>Modifica cameriere</h1>
            <table class="table" style="width: 100%;">
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data Nascita</th>
                    <th>Num. telefono</th>
                    <th>Stipendio</th>
                </tr>
                <?php
                include 'database_connection.php';
                $sql = 'select * from cameriere where id_cameriere = ' . $_GET['id_cameriere'] . '';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr><form action="modify_cameriere.php">';
                    echo '<td><input type="text" name="nome_cameriere" value="' . $row['nome_cameriere'] . '"></td>';
                    echo '<td><input type="text" name="cognome_cameriere" value="' . $row['cognome_cameriere'] . '"></td>';
                    echo '<td><input type="text" name="data_nascita_cameriere" value="' . $row['data_nascita_cameriere'] . '"></td>';
                    echo '<td><input type="text" name="num_tel_cameriere" value="' . $row['num_tel_cameriere'] . '"></td>';
                    echo '<td><input type="text" name="stipendio_cameriere" value="' . $row['stipendio_cameriere'] . '"></td>';
                    echo '<td style="text-align:center;"><button type="submit" name="id_cameriere" value="' . $row["id_cameriere"] . '" class="btn">modifica</button></td>';
                    echo '</form></tr>';
                }
                ?>
            </table>
        </div>
    </body>
</html>