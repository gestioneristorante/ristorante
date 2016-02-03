<!DOCTYPE html>
<html>
    <?php
    session_start();
    ?>
    <head>
        <meta charset="UTF-8">
        <title>iRistorante</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"/>
        <script src="bootstrap/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
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
                    <ul class="nav navbar-nav">
                        <?php
                        if (isset($_SESSION['nome_utente']) && $_SESSION['tipo'] == 'gestore') {
                            echo '
                            <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false">Gestione Ristorante <span class = "caret"></span></a>
                            <ul class = "dropdown-menu">
                            <li><a href = "gestione_personale.php">Gestione personale</a></li>
                            <li><a href = "gestione_menu.php">Gestione menu</a></li>
                            <li><a href = "gestione_piatti.php">Gestione piatti</a></li>
                            <li><a href = "gestione_tavoli.php">Gestione tavoli</a></li>
                            </ul>
                            </li>';
                        }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div id="login" style="width: 100%; text-align: center; margin-top: 200px;">
            <h1>Login</h1>
            <form action="control.php" method="POST">
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
                            <input type="submit" value="Login" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
