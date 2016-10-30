<?php @ob_start();session_start();require "config/config.php";?>
<?php
date_default_timezone_set('UTC');
$id = isset($_GET['id'])?$_GET['id']:"";
$t = new \Frequencia\Models\Turma;
$turma = $t->findByType('idTurma',$id);
$prof = new \Frequencia\Models\Professor;
$mat = new \Frequencia\Models\Materia;

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
        <link href="css/detalhes.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="DataTables/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="DataTables/js/jquery.dataTables.js"></script>

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
                            <span class="hidden-sm hidden-xs">Frequência</span>
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
                            <span class="hidden-sm hidden-xs">Relatórios</span>
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
                        <h2 class="page_title">Detalhes Turma</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form form-wrapper">
                            <form class="form form-horizontal" method="post" name="form">
                                <div class="form-group col-xs-3 col-md-3">
                                    <label class="label-detail">Código da Turma</label>
                                    <?php
                                    if(empty($turma->Codigo))
                                        echo '<p class="data">SEM Código</p>';
                                    else
                                        echo '<p class="data">'.$turma->Codigo.'</p>';
                                    ?>
                                </div>
                                <div class="form-group col-xs-4 col-md-4">
                                    <label class="label-detail">Matéria</label>
                                    <?php
                                    if(empty($turma->Materia_idMateria))
                                        echo '<p class="data">Sem Matéria Cadastrada</p>';
                                    else{
                                        $mat = $mat->findByType('idMateria',$turma->Materia_idMateria);
                                        echo '<p class="data">'.$mat->Nome.'</p>';
                                    }

                                    ?>
                                </div>
                                <div class="form-group col-xs-6 col-md-6">
                                    <label class="label-detail">Professor</label>
                                    <?php
                                    if(empty($turma->Professor_idProfessor))
                                        echo '<p class="data">Sem Professsor Cadastrado</p>';
                                    else{
                                        $prof = $prof->findByType('idProfessor',$turma->Professor_idProfessor);
                                        echo '<p class="data">'.$prof->Nome.'</p>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group col-xs-12 col-md-12">
                                    <label class="label-detail">Descrição da Turma</label>
                                    <?php
                                    if(empty($turma->Descricao))
                                        echo '<p class="data">Sem Professsor Cadastrado</p>';
                                    else{
                                        echo '<p class="data">'.$turma->Descricao.'</p>';
                                    }
                                    ?>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>

                    </div>
                </div>
                <div id="content">
                    <header>
                        <h2 class="page_title">Turma</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form form-wrapper">
                            <table id="tableTurma" class="display-table">
                                <thead>
                                <tr>
                                    <th>Alunos</th>
                                    <th>Detalhes do Aluno</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $aluno = new \Frequencia\Models\Turma_Aluno;
                                    $aluno = $aluno->findByTypeAll('idTurma',$id);

                                    foreach ($aluno as $item){

                                        $student = new \Frequencia\Models\Aluno;
                                        $student = $student->findByType('idAluno',$item->idAluno);
                                        $detalhes  = "frmDetalhesAluno.php?id=".$item->idAluno;
                                        echo
                                        '
                                            <tr>
                                                <td>'.$student->Nome.'</td>
                                                <td><a href="'.$detalhes.'"><span class="label label-warning">Detalhes</span></a></td>
                                            </tr>
                                        ';
                                    }


                                ?>

                                </tbody>
                            </table>
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
    <script>
        $(document).ready(function(){
            $('#tableTurma').dataTable({
                "oLanguage": {
                    "sProcessing": "Aguarde enquanto os dados são carregados ...",
                    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                    "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                    "sInfoEmpty": "Exibindo 0 a 0 de 0 registros",
                    "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                    "sInfoFiltered": "",
                    "sSearch": "Procurar",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Próximo",
                        "sLast":     "Último"
                    }
                }
            });
        });
    </script>
    </body>
    </html>
