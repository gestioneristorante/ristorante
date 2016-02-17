<html>
    <?php include '../header.php' ?>
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
            include '../database_connection.php';

            $nome_cameriere;
            $cognome_cameriere;
            $data_nascita_cameriere;
            $num_tel_cameriere;
            $stipendio_cameriere;
            $id_cameriere;

            $sql = 'select * from cameriere where id_cameriere = ' . $_GET['id_cameriere'] . '';
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $nome_cameriere = $row['nome_cameriere'];
                $cognome_cameriere = $row['cognome_cameriere'];
                $data_nascita_cameriere = $row['data_nascita_cameriere'];
                $num_tel_cameriere = $row['num_tel_cameriere'];
                $stipendio_cameriere = $row['stipendio_cameriere'];
                $id_cameriere = $row['id_cameriere'];
            }
            ?>
            <tr>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <td><input type="text" name="nome_cameriere" value="<?php echo $nome_cameriere ?>"></td>
                <td><input type="text" name="cognome_cameriere" value="<?php echo $cognome_cameriere ?>"></td>
                <td><input type="text" name="data_nascita_cameriere" value="<?php echo $data_nascita_cameriere ?>"></td>
                <td><input type="text" name="num_tel_cameriere" value="<?php echo $num_tel_cameriere ?>"></td>
                <td><input type="text" name="stipendio_cameriere" value="<?php echo $stipendio_cameriere ?>"></td>
                <td style="text-align:center;"><button type="submit" name="id_cameriere" value="<?php echo $id_cameriere ?>" class="btn">modifica</button></td>
            </form>
            <?php include 'modify_cameriere.php'; ?>
            </tr>
        </table>
    </div>
</body>
</html>