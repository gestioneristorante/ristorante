<html>
    <?php include '../header.php' ?>
    <div id="camerieri">
        <h1>Modifica tavolo</h1>
        <table class="table" style="width: 100%;">
            <tr>
                <th>Numero tavolo</th>
                <th>Posti</th>
            </tr>
            <?php
            include '../database_connection.php';
            $sql = 'select * from tavolo where num_tavolo = ' . $_GET['num_tavolo'] . '';
            $result = $conn->query($sql);

            $num_tavolo;
            $num_posti;

            while ($row = $result->fetch_assoc()) {
                $num_tavolo = $row['num_tavolo'];
                $num_posti = $row['num_posti'];
            }
            ?>
            <tr>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <td><input type="number" name="num_tavolo" value="<?php echo $num_tavolo ?>"></td>
                <td><input type="number" name="num_posti" value="<?php echo $num_posti ?>"></td>
                <td style="text-align:center;"><button type="submit" name="submit" class="btn">modifica</button></td>
            </form>
            <?php include 'modify_tavolo.php'; ?>
            </tr>
        </table>
    </div>
</body>
</html>