<html>
    <?php include '../header.php' ?>
    <div id="camerieri">
        <h1>Modifica piatto</h1>
        <table class="table" style="width: 100%;">
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Prezzo</th>
            </tr>
            <?php
            include '../database_connection.php';

            $nome_piatto;
            $id_categoria = array();
            $nome_categoria = array();
            $prezzo_piatto;
            $id_piatto;
            $id_categoria_piatto;

            $sql = 'select * from piatto where id_piatto = ' . $_GET['id_piatto'] . ';';
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sqlCat = "select * from categoria";
                $resultCat = $conn->query($sqlCat);

                $nome_piatto = $row['nome_piatto'];
                $id_categoria_piatto = $row['id_categoria'];

                while ($rowCat = $resultCat->fetch_assoc()) {
                    array_push($id_categoria, $rowCat['id_categoria']);
                    array_push($nome_categoria, $rowCat['nome_categoria']);
                }

                $prezzo_piatto = $row['prezzo_piatto'];
                $id_piatto = $row["id_piatto"];
            }
            ?>
            <tr>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <td><input type="text" name="nome_piatto" value="<?php echo $nome_piatto ?>"></td>
                <td>
                    <select name="id_categoria">
                        <?php
                        for ($i = 0; $i < count($id_categoria); $i++) {
                            if ($id_categoria[$i] == $id_categoria_piatto) {
                                echo '<option value="' . $id_categoria[$i] . '" selected>' . $nome_categoria[$i] . '</option>';
                            }else{
                                echo '<option value="' . $id_categoria[$i] . '">' . $nome_categoria[$i] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
                <td><input type="text" name="prezzo_piatto" value="<?php echo $prezzo_piatto ?>"></td>
                <td style="text-align:center;"><button type="submit" name="id_piatto" value="<?php echo $id_piatto ?>" class="btn">modifica</button></td>
            </form>
            <?php include 'modify_piatto.php' ?>
            </tr>

        </table>
    </div>
</body>
</html>