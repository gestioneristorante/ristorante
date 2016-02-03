<html>
    <?php include 'header.php' ?>
        <div id="camerieri">
            <h1>Modifica tavolo</h1>
            <table class="table" style="width: 100%;">
                <tr>
                    <th>Numero tavolo</th>
                    <th>Posti</th>
                </tr>
                <?php
                include 'database_connection.php';
                $sql = 'select * from tavolo where num_tavolo = ' . $_GET['num_tavolo'] . '';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr><form action="modify_tavolo.php">';
                    echo '<td><input type="number" name="num_tavolo" value="' . $row['num_tavolo'] . '"></td>';
                    echo '<td><input type="number" name="num_posti" value="' . $row['num_posti'] . '"></td>';
                    echo '<td style="text-align:center;"><button type="submit" name="num_tavolo" value="' . $row["num_tavolo"] . '" class="btn">modifica</button></td>';
                    echo '</form></tr>';
                }
                ?>
            </table>
        </div>
    </body>
</html>