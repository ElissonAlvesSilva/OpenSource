<?php @ob_start();session_start();require "config/config.php";?>
<?php
    $aluno = new \Frequencia\Models\Aluno;
    $aluno = $aluno->findByType('RA',$_SESSION['idRA']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php header('Content-type: text/html; charset=ISO-8859-1');?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESMAM</title>

    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="js/jquery.js"></script>
</head>
<body>

<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- My SideBar-->
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top"  id="side-menu">
            <h1 class="hidden-xs hidden-sm">BFE</h1>
            <ul>
                <li class="link active">
                    <a href="frmAlunoPrincipal.php" >
                        <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                        <span class="hidden-sm hidden-xs">Principal</span>
                    </a>
                </li>
                <li class="link">
                    <a href="#collapse-aluno" data-toggle="collapse" aria-controls="collapse-post">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <span class="hidden-sm hidden-xs">Mat�rias</span>
                        <span class="pull-right glyphicon glyphicon-menu-down"></span>
                    </a>
                    <ul class="collapse collapseable" id="collapse-aluno">
                        <li><a href="frmListMateriasAluno.php">Listar Mat�rias</a></li>
                    </ul>
                </li>
                <?php
                    if($aluno->Matricula == 2){
                    echo
                    '
                     <li class="link">
                        <a href="#collapse-matricula" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-globe"></span>
                            <span class="hidden-sm hidden-xs">Matr�cula Online</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-matricula">
                            <li><a href="frmMatriculaAluno.php">Matricular</a></li>
                        </ul>
                    </li>
                    ';
                    }


                ?>


            </ul>
        </div>
        <!-- My Content Area-->
        <div class="col-md-10 col-sm-11 display-table-cell valign-top box">
            <div class="row">
                <header id="nav-header" class="clearfix">
                    <div class="col-md-5">
                        <nav class="navbar-default pull-left">
                            <button type="button" class="navbar-toggle collapsed " data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </nav>
                    </div>
                    <div class="col-md-7">
                        <ul class="pull-left">
                            <li id="welcome" class="hidden-sm hidden-xs pull-left">Seja Bem Vindo <b><?php echo $_SESSION['Usuario'];?></b></li>
                        </ul>
                        <ul class="pull-right">
                            <li>
                                <a href="logout.php" class="logout">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </header>

            </div>
            <div class="row">
                <footer id="admin-footer" class="clearfix">
                    <div class="pull-left"><b>Copyright </b>&copy; 2016</div>
                    <div class="pull-right">OpenSource</div>
                </footer>

            </div>
        </div>
    </div>

</div>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/default.js"></script>
</body>
</html>