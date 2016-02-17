<!DOCTYPE html>
<html>
    <?php
    session_start();
    ?>
    <head>
        <meta charset="UTF-8">
        <title>iRistorante</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"/>
        <script src="../bootstrap/jquery.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">iRistorante</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div id="login" style="width: 100%; text-align: center; margin-top: 200px;">
            <h1>Login</h1>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <table class="table" style="width: 100%; text-align: center;">
                    <tr>
                        <td>
                            <input type="text" name="nome_utente" placeholder="Nome utente">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="password" placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Login" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            include 'control.php';
            ?>
        </div>
    </body>
</html>
