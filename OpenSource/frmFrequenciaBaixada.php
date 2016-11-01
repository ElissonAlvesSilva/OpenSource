<?php @ob_start();session_start();require "config/config.php";?>
<?php
date_default_timezone_set('UTC');
$idTurma = isset($_GET['idTurma'])?$_GET['idTurma']:"";
$data = isset($_GET['data'])?$_GET['data']:"";
$date = str_replace('/', '-', $data);
$data_frequencia = "'".date('Y-m-d', strtotime($date))."'";

$fre = new \Frequencia\Models\Frequencia;
$mat = new \Frequencia\Models\Materia;
$turma = new \Frequencia\Models\Turma;
$turma = $turma->findByType('idTurma',$idTurma);
$materia = $mat->findByType('idMateria',$turma->Materia_idMateria);
$frequencia = $fre->findByAnd('idTurma','Data_Frequencia',$idTurma,$data_frequencia);
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
    <link rel="stylesheet" type="text/css" href="DataTables/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/js/jquery.dataTables.js"></script>
    <link href="css/inputs.css" rel="stylesheet"/>
    <link href="css/detalhes.css" rel="stylesheet"/>
    <link href="css/image.css" rel="stylesheet"/>

</head>
<body>

<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- My SideBar-->
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top"  id="side-menu">
            <h1 class="hidden-xs hidden-sm">BFE</h1>
            <ul>
                <li class="link active">
                    <a href="frmProfessorPrincipal.php" >
                        <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                        <span class="hidden-sm hidden-xs">Principal</span>
                    </a>
                </li>
                <li class="link">
                    <a href="#collapse-frequencia" data-toggle="collapse" aria-controls="collapse-post">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <span class="hidden-sm hidden-xs">Frequência</span>
                        <span class="pull-right glyphicon glyphicon-menu-down"></span>
                    </a>
                    <ul class="collapse collapseable" id="collapse-frequencia">
                        <li><a href="frmFrequenciaTurmaProfessor.php">Gerar Frequência</a></li>
                    </ul>
                </li>
                <li class="link">
                    <a href="#collapse-turmas" data-toggle="collapse" aria-controls="collapse-post">
                        <span class="glyphicon glyphicon-education"></span>
                        <span class="hidden-sm hidden-xs">Turmas</span>
                        <span class="pull-right glyphicon glyphicon-menu-down"></span>
                    </a>
                    <ul class="collapse collapseable" id="collapse-turmas">
                        <li><a href="frmTurmasProf.php">Turmas</a></li>
                    </ul>
                </li>
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
                    <h2 class="page_title">Detalhes da Turma</h2>
                </header>
                <div class="content-inner">
                    <div class="form form-wrapper">
                        <form class="form form-horizontal">
                            <div class="form-group col-md-3 col-xs-3">
                                <label class="label-detail">Código</label>
                                <?php
                                if(!empty($turma->Codigo))
                                    echo '<p class="data">'.$turma->Codigo.'</p>';
                                ?>
                            </div>
                            <div class="form-group col-md-5 col-xs-5">
                                <label class="label-detail">Matéria</label>
                                <?php
                                if(!empty($materia->Nome))
                                    echo '<p class="data">'.$materia->Nome.'</p>';
                                ?>
                            </div>

                            <div class="form-group col-xs-4 col-md-4">
                                <label class="label-detail">Data da Frequência</label>
                                <?php
                                    if(!empty($frequencia->Data_Frequencia))
                                        echo '<p class="data">'.date('d/m/Y',strtotime($frequencia->Data_Frequencia)).'</p>';
                                ?>
                            </div>
                            <div class="form-group col-xs-4 col-md-4">
                                <label class="label-detail">Carga Horária</label>
                                <?php
                                    if(!empty($materia->Carga_Horaria))
                                        echo '<p class="data">'.$materia->Carga_Horaria.'</p>';
                                ?>
                            </div>




                            <div class="clearfix"></div>
                        </form>
                    </div>

                </div>
            </div>
            <div id="content">
                <header>
                    <h2 class="page_title">Frequência</h2>
                </header>
                <div class="content-inner">
                    <div class="form form-wrapper">
                        <table id="tableFrequencia" class="display-table">
                            <thead>
                            <tr>
                                <th>Aluno</th>
                                <th>Data da Frequência</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $freq = new \Frequencia\Models\Frequencia;
                            $frequencia = $freq->findByAndAll('idTurma','Data_Frequencia',$idTurma,$data_frequencia);
                            foreach ($frequencia as $item){
                                $aluno = new \Frequencia\Models\Aluno;
                                $aluno = $aluno->findByType('idAluno',$item->idAluno);

                                if($item->Status == 1)
                                    $status = '<img class="img-table" src="img/blue.png">';
                                else if($item->Status == 2)
                                    $status = '<img class="img-table" src="img/red.png">';


                                echo
                                    '
                                                    <tr>
                                                        <td>'.$aluno->Nome.'</td>
                                                        <td>'.$data.'</td>
                                                        <td>'.$status.'</td>
                                                       
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
        $('#tableFrequencia').dataTable({
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
                    "sLast":     "?ltimo"
                }
            }
        });
    });
</script>
</body>
</html>