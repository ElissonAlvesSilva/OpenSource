<?php @ob_start();session_start();require "config/config.php";?>
<?php
date_default_timezone_set('UTC');
$id = $_SESSION['idRA'];
$prof = new \Frequencia\Models\Professor;
$reg = new \Frequencia\Models\Registro_Academico;
$professor = $prof->findByType('idProfessor',$id);
$registro = $reg->findByType('idRegistro',$professor->RA);
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
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <span class="hidden-sm hidden-xs">Frequ�ncia</span>
                        <span class="pull-right glyphicon glyphicon-menu-down"></span>
                    </a>
                    <ul class="collapse collapseable" id="collapse-aluno">
                        <li><a href="frmFrequenciaTurmaProfessor.php">Gerar Frequ�ncia</a></li>
                    </ul>
                </li>
                <li class="link">
                    <a href="#collapse-aluno" data-toggle="collapse" aria-controls="collapse-post">
                        <span class="glyphicon glyphicon-education"></span>
                        <span class="hidden-sm hidden-xs">Turmas</span>
                        <span class="pull-right glyphicon glyphicon-menu-down"></span>
                    </a>
                    <ul class="collapse collapseable" id="collapse-aluno">
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
                    <h2 class="page_title">Turmas</h2>
                </header>
                <div class="content-inner">
                    <div class="form form-wrapper">
                        <table id="tableProfessor" class="display-table">
                            <thead>
                            <tr>
                                <th>Turma</th>
                                <th>Mat�ria</th>
                                <th>Gerar Frequ�ncia</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $turma = new \Frequencia\Models\Turma;
                            $turma = $turma->findByTypeAll('Professor_idProfessor',$id);
                            if($turma != false){
                                foreach ($turma as $item){

                                    $materia = new \Frequencia\Models\Materia;
                                    $materia = $materia->findByType('idMateria',$item->Materia_idMateria);

                                    $frequencia = "frmFrequencia.php?idTurma=".$item->idTurma;

                                    echo
                                        '
                                                    <tr>
                                                        <td>'.$item->Codigo.'</td>
                                                        <td>'.$materia->Nome.'</td>
                                                        <td><a href="'.$frequencia.'" target="_blank"><span class="label label-warning">Gerar Frequ�ncia</span></a></td>
                                                       
                                                    </tr>
                                                ';


                                }
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
        $('#tableProfessor').dataTable({
            "oLanguage": {
                "sProcessing": "Aguarde enquanto os dados s�o carregados ...",
                "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                "sInfoEmpty": "Exibindo 0 a 0 de 0 registros",
                "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                "sInfoFiltered": "",
                "sSearch": "Procurar",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Pr�ximo",
                    "sLast":     "?ltimo"
                }
            }
        });
    });
</script>
</body>
</html>