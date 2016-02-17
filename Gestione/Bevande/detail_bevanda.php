<html>
    <?php include '../header.php' ?>
    <div id="camerieri">
        <h1>Modifica bevanda</h1>
        <table class="table" style="width: 100%;">
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Prezzo</th>
            </tr>
            <?php
            include '../database_connection.php';

            $nome_bevanda;
            $id_categoria = array();
            $nome_categoria = array();
            $prezzo_bevanda;
            $id_bevanda;
            $id_categoria_bevanda;

            $sql = 'select * from bevanda where id_bevanda = ' . $_GET['id_bevanda'] . ';';
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $sqlCat = "select * from categoria_bevanda";
                $resultCat = $conn->query($sqlCat);

                $nome_bevanda = $row['nome_bevanda'];
                $id_categoria_bevanda = $row['id_categoria'];

                while ($rowCat = $resultCat->fetch_assoc()) {
                    array_push($id_categoria, $rowCat['id_categoria']);
                    array_push($nome_categoria, $rowCat['nome_categoria']);
                }

                $prezzo_bevanda = $row['prezzo_bevanda'];
                $id_bevanda = $row["id_bevanda"];
            }
            ?>
            <tr>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <td><input type="text" name="nome_bevanda" value="<?php echo $nome_bevanda ?>"></td>
                <td>
                    <select name="id_categoria">
                        <?php
                        for ($i = 0; $i < count($id_categoria); $i++) {
                            if ($id_categoria[$i] == $id_categoria_bevanda) {
                                echo '<option value="' . $id_categoria[$i] . '" selected>' . $nome_categoria[$i] . '</option>';
                            }else{
                                echo '<option value="' . $id_categoria[$i] . '">' . $nome_categoria[$i] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
                <td><input type="text" name="prezzo_bevanda" value="<?php echo $prezzo_bevanda ?>"></td>
                <td style="text-align:center;"><button type="submit" name="id_bevanda" value="<?php echo $id_bevanda ?>" class="btn">modifica</button></td>
            </form>
            <?php include 'modify_bevanda.php' ?>
            </tr>

        </table>
    </div>
</body>
</html>