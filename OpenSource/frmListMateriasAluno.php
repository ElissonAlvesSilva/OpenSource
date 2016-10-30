<?php @ob_start();session_start();require "config/config.php";date_default_timezone_set('UTC');?>
<?php
date_default_timezone_set('UTC');
$id = $_SESSION['idRA'];
$al = new \Frequencia\Models\Aluno;
$reg =new \Frequencia\Models\Registro_Academico;
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
                    <a href="frmAlunoPrincipal.php" >
                        <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                        <span class="hidden-sm hidden-xs">Principal</span>
                    </a>
                </li>
                <li class="link">
                    <a href="#collapse-aluno" data-toggle="collapse" aria-controls="collapse-post">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <span class="hidden-sm hidden-xs">Matérias</span>
                        <span class="pull-right glyphicon glyphicon-menu-down"></span>
                    </a>
                    <ul class="collapse collapseable" id="collapse-aluno">
                        <li><a href="frmListMateriasAluno.php">Listar Matérias</a></li>
                    </ul>
                </li>
                <?php
                if($aluno->Matricula == 2){
                    echo
                    '
                     <li class="link">
                        <a href="#collapse-matricula" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-globe"></span>
                            <span class="hidden-sm hidden-xs">Matrãcula Online</span>
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

            <div id="content">
                <header>
                    <h2 class="page_title">Detalhes Aluno</h2>
                </header>
                <div class="content-inner">
                    <div class="form form-wrapper">
                        <form class="form form-horizontal" method="post" name="form">
                            <div class="form-group col-xs-3 col-md-3">
                                <label class="label-detail">Registro Acad�mico</label>
                                <?php
                                if(empty($aluno->RA))
                                    echo '<p class="data">SEM R.A.</p>';
                                else
                                    echo '<p class="data">'.$registro->RA.'</p>';
                                ?>
                            </div>
                            <div class="form-group col-xs-3 col-md-3">
                                <label class="label-detail">Id Biometria</label>
                                <?php
                                if(empty($aluno->idBiometria))
                                    echo '<p class="data">Sem Id Biometrico</p>';
                                else
                                    echo '<p class="data">'.$aluno->idBiometria.'</p>';
                                ?>

                            </div>
                            <div class="form-group col-xs-6 col-md-6">
                                <label class="label-detail">Nome Completo</label>
                                <?php
                                if(empty($aluno->Nome))
                                    echo '<p class="data">SEM NOME</p>';
                                else
                                    echo '<p class="data">'.$aluno->Nome.'</p>';
                                ?>
                            </div>
                            <div class="line-detail"></div>
                            <div class="form-group col-xs-2 col-md-2">
                                <label class="label-detail">Data de Nascimento</label>
                                <?php
                                if(empty($aluno->Data_Nascimento))
                                    echo '<p class="data">Sem Data de Nascimento</p>';
                                else
                                    echo '<p class="data">'.(date('d/m/Y',strtotime($aluno->Data_Nascimento))).'</p>';
                                ?>
                            </div>
                            <div class="form-group col-xs-2 col-md-2">
                                <label class="label-detail">RG</label>
                                <?php
                                if(empty($aluno->RG))
                                    echo '<p class="data">RG N�o Informado</p>';
                                else
                                    echo '<p class="data">'.$aluno->RG.'</p>';
                                ?>

                            </div>
                            <div class="form-group col-xs-3 col-md-3">
                                <label class="label-detail">CPF</label>
                                <?php
                                if(empty($aluno->CPF))
                                    echo '<p class="data">CPF Não Informado</p>';
                                else
                                    echo '<p class="data">'.$aluno->CPF.'</p>';
                                ?>

                            </div>
                            <div class="form-group col-xs-6 col-md-6">
                                <label class="label-detail">Nome da M�e</label>
                                <?php
                                if(empty($aluno->Nome_Mae))
                                    echo '<p class="data">Nome Não Informado</p>';
                                else
                                    echo '<p class="data">'.$aluno->Nome_Mae.'</p>';
                                ?>

                            </div>
                            <div class="form-group col-xs-12 col-md-12">
                                <label class="label-detail">Endereço</label>
                                <?php
                                if(empty($aluno->Endereco))
                                    echo '<p class="data">Endereço não Informado</p>';
                                else
                                    echo '<p class="data">'.$aluno->Endereco.'</p>';
                                ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="line-detail-2"></div>
                            <div class="form-group col-xs-3 col-md-3">
                                <label class="label-detail">Telefone</label>
                                <?php
                                if(empty($aluno->Telefone))
                                    echo '<p class="data">Telefone Não Informado</p>';
                                else
                                    echo '<p class="data">'.$aluno->Telefone.'</p>';
                                ?>

                            </div>
                            <div class="form-group col-xs-8 col-md-8">
                                <label class="label-detail">E-mail</label>
                                <?php
                                if(empty($aluno->Email))
                                    echo '<p class="data">Email Não Informado</p>';
                                else
                                    echo '<p class="data">'.$aluno->Email.'</p>';
                                ?>

                            </div>


                            <div class="clearfix"></div>
                        </form>
                    </div>

                </div>
            </div>
            <div id="content">
                <header>
                    <h2 class="page_title">Turmas do Aluno</h2>
                </header>
                <div class="content-inner">
                    <div class="form form-wrapper">
                        <table id="tableAluno" class="display-table">
                            <thead>
                            <tr>
                                <th>Turma</th>
                                <th>Matéria</th>
                                <th>Professor</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $turma_Aluno = new \Frequencia\Models\Turma_Aluno;

                            $turma_Aluno = $turma_Aluno->findByTypeAll('idAluno',$id);
                            if($turma_Aluno !=null){
                                foreach ($turma_Aluno as $item){
                                    $turma = new \Frequencia\Models\Turma;
                                    $materia = new \Frequencia\Models\Materia;
                                    $professor = new \Frequencia\Models\Professor;

                                    $turma = $turma->findByType('idTurma',$item->idTurma);
                                    $materia = $materia->findByType('idMateria',$turma->Materia_idMateria);
                                    if($turma->Professor_idProfessor == null)
                                        $professor_turma = "Sem Professor";
                                    else if($turma->Professor_idProfessor != null){
                                        $professor = $professor->findByType('idProfessor',$turma->Professor_idProfessor);
                                        $professor_turma = $professor->Nome;
                                    }

                                    $detalhes = "frmDetalhesTurma.php?id=".$turma->idTurma;
                                    echo
                                        '
                                                    <tr>
                                                        <td>'.$turma->Codigo.'</td>
                                                        <td>'.$materia->Nome.'</td>
                                                        <td>'.$professor_turma.'</td>
                                                         
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
        $('#tableAluno').dataTable({
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
                    "sLast":     "último"
                }
            }
        });
    });
</script>
</body>
</html>

