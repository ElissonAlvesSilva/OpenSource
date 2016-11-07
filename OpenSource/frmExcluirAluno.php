<?php @ob_start();session_start();require "config/config.php";?>
<?php
date_default_timezone_set('America/Manaus');
$id = isset($_GET['id'])?$_GET['id']:"";
$al = new \Frequencia\Models\Aluno;
$reg = new \Frequencia\Models\Registro_Academico;
$aluno = $al->findByType('idAluno',$id);
$registro = $reg->findByType('idRegistro',$aluno->RA);

?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <?php header('Content-type: text/html; charset=ISO-8859-1');?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BFE | Cadastro</title>
        <script src="js/jquery.js"></script>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/default.css" rel="stylesheet">
        <link href="css/forms.css" rel="stylesheet">
        <link href="css/datepicker.css" rel="stylesheet">
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <script src="js/back.js"></script>
        <script src="js/mask.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/datepicker-pt-BR.js"></script>
        <script>
            $(function(){
                $("#date_nascimento").datepicker({
                    format: 'dd/mm/yyyy',
                    language:"pt-BR"
                });
            });

        </script>
        <link href="css/modal.css" rel="stylesheet"/>
        <link href="css/inputs.css" rel="stylesheet"/>

    </head>
    <body>

    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- My SideBar-->
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top"  id="side-menu">
                <h1 class="hidden-xs hidden-sm">BFE</h1>
                <ul>
                    <li class="link active">
                        <a href="frmPrincipal.php" >
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs">Principal</span>
                        </a>
                    </li>
                    <li class="link">
                        <a href="#collapse-aluno" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-user"></span>
                            <span class="hidden-sm hidden-xs">Alunos</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-aluno">
                            <li><a href="frmCadAluno.php">Cadastrar</a></li>
                            <li><a href="frmFindAluno.php">Alterar</a></li>
                            <li><a href="frmFindAluno.php">Pesquisar</a></li>
                        </ul>
                    </li>
                    <li class="link">
                        <a href="#collapse-professores" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-education"></span>
                            <span class="hidden-sm hidden-xs">Professores</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-professores">
                            <li><a href="frmCadProfessor.php">Cadastrar</a></li>
                            <li><a href="frmFindProfessor.php">Alterar</a></li>
                            <li><a href="frmFindProfessor.php">Pesquisar</a></li>
                        </ul>
                    </li>
                    <li class="link">
                        <a href="#collapse-materias" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-blackboard"></span>
                            <span class="hidden-sm hidden-xs">Matérias</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-materias">
                            <li><a href="frmCadMateria.php">Cadastrar</a></li>
                            <li><a href="frmFindMateria.php">Alterar</a></li>
                            <li><a href="frmFindMateria.php">Pesquisar</a></li>
                        </ul>
                    </li>
                    <li class="link">
                        <a href="#collapse-turmas" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-file"></span>
                            <span class="hidden-sm hidden-xs">Turmas</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-turmas">
                            <li><a href="frmCadTurma.php">Cadastrar</a></li>
                            <li><a href="frmFindTurma.php">Alterar</a></li>
                            <li><a href="frmFindTurma.php">Pesquisar</a></li>
                        </ul>
                    </li>
                    <!--
                    <li class="link">
                        <a href="#collapse-frequencia" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <span class="hidden-sm hidden-xs">Frequ?ncia</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-frequencia">
                            <li><a href="frmCadFrequencia.php">Cadastrar</a></li>
                            <li><a href="frmFindFrequencia.php">Alterar</a></li>
                            <li><a href="frmFindFrequencia.php">Pesquisar</a></li>
                        </ul>
                    </li>

                    <li class="link">
                        <a href="#collapse-report" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-list"></span>
                            <span class="hidden-sm hidden-xs">Relat?rios</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-report">
                            <li><a href="">Alunos</a></li>
                            <li><a href="">Professores</a></li>
                            <li><a href="">Materias</a></li>
                            <li><a href="">Turmas</a></li>
                        </ul>
                    </li>
                    -->

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

                <div id="content">
                    <header>
                        <h2 class="page_title">Remover Aluno</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form form-wrapper">
                            <form class="form form-horizontal" method="post" name="form">
                                <div class="form-group col-xs-2 col-md-2"  style="margin-right: 20px">
                                    <label for="ra_aluno" class="label label-message">Registro Academico</label>
                                    <?php
                                    if(empty($aluno->RA))
                                        echo '<input type="text"  class="form-control" id="ra_aluno" required name="ra" placeholder="Registro Academico">';
                                    else
                                        echo '<input type="text"  class="form-control" id="ra_aluno" required name="ra" value="'.$registro->RA.'">';
                                    ?>


                                </div>
                                <div class="form-group col-xs-2 col-md-2"  style="margin-right: 150px">
                                    <label for="id_biometria" class="label label-message">Identificão Biometrica</label>
                                    <?php
                                    if(empty($aluno->idBiometria))
                                        echo '<input type="text"  class="form-control" id="id_biometria" required name="id_biometria" placeholder="Registro Academico">';
                                    else
                                        echo '<input type="text"  class="form-control" id="id_biometria" required name="id_biometria" value="'.$aluno->idBiometria.'">';
                                    ?>
                                </div>
                                <div class="form-group col-xs-8 col-md-8" style="margin-right: 200px">
                                    <label for="nome_aluno" class="label label-message">Nome Completo</label>
                                    <?php
                                    if(empty($aluno->Nome))
                                        echo '<input type="text"  class="form-control" id="nome_aluno" required name="nome" placeholder="Nome Completo">';
                                    else
                                        echo '<input type="text"  class="form-control" id="nome_aluno" required name="nome" value="'.$aluno->Nome.'">';

                                    ?>

                                </div>


                                <br/>
                                <div class="clearfix">
                                    <button type="submit" style="margin-top: 20px" class="btn btn-primary pull-right"> <span class="glyphicon glyphicon-remove"></span> Remover</button>
                                </div>
                                <input type="hidden" name="delete">
                            </form>
                        </div>

                    </div>
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
<?php
if(isset($_POST['delete'])){
    $al = new \Frequencia\Models\Aluno;
    $registro = new \Frequencia\Models\Registro_Academico;
    $user = new \Frequencia\Models\Usuario_RM;

    $aluno = $al->findByType('idAluno',$id);

    $user->delete('RA',$aluno->RA);
    $registro->delete('idRegistro',$aluno->RA);
    $al->delete('idAluno',$id);



    echo '
        <script>
            $(document).ready(function(){
                $("#messagemSucess").modal("show");
            });
        </script>

        <div class="modal fade" id="messagemSucess" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content modal-window">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Mensagem BFE</h4>
                  </div>
                  <div class="modal-body">
                    <p>Aluno <b><i>'.$_POST['nome'].'</i></b> removido com sucesso</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="button_remove_aluno">Fechar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        ';
}
?>