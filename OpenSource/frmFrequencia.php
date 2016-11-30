<?php @ob_start();session_start();require "config/config.php"?>
<?php

    $id = isset($_GET['idTurma'])?$_GET['idTurma']:"";
    $turma = new \Frequencia\Models\Turma;
    $turma = $turma->findByType('idTurma',$id);


?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <?php date_default_timezone_set('America/Manaus'); header('Content-type: text/html; charset=ISO-8859-1');?>
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
        <link href="fileInput/css/fileinput.css" rel="stylesheet">
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/datepicker-pt-BR.js"></script>
        <script src="js/mask.js"></script>
        <script src="js/back_button.js"></script>
        <script>
            $(function(){
                $("#data_freq").datepicker({
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
                        <a href="frmProfessorPrincipal.php" >
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs">Principal</span>
                        </a>
                    </li>
                    <li class="link">
                        <a href="#collapse-aluno" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <span class="hidden-sm hidden-xs">Frequência</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-aluno">
                            <li><a href="frmFrequenciaTurmaProfessor.php">Gerar Frequência</a></li>
                        </ul>
                    </li>
                    <li class="link">
                        <a href="#collapse-Turmas" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-education"></span>
                            <span class="hidden-sm hidden-xs">Turmas</span>
                            <span class="pull-right glyphicon glyphicon-menu-down"></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-Turmas">
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
                        <h2 class="page_title">Carregar Frequência</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form form-wrapper">
                            <form class="form form-horizontal" method="post" name="form" enctype="multipart/form-data">
                                <input type="hidden" id="idTurma" value="<?php echo $id;?>">
                                <div class="form-group col-xs-3 col-md-3" style="margin-right: 1000px">
                                    <label for="date_freq" class="label label-message">Turma</label>
                                    <input type="text"  class="form-control" id="date_freq" required name="date_criacao" value="<?php echo $turma->Codigo;?>">
                                </div>
                                <div class="form-group col-xs-2 col-md-2" style="margin-right: 1000px">
                                    <label for="date_freq" class="label label-message">Data da Frequência</label>
                                    <input type="text"  class="form-control" id="data_freq" required name="data_criacao" value="<?php echo date('d/m/Y');?>">
                                </div>

                                <div class="form-group col-xs-4 col-md-4">
                                    <label for="descricao" class="label label-message">Arquivo Texto</label>
                                    <input type="file" class="file" name="arquivo">
                                </div>

                                <div class="clearfix">
                                    <button type="submit" style="margin-top: 20px" class="btn btn-primary pull-right"> <span class="glyphicon glyphicon-plus"></span> Gerar Frequência</button>
                                </div>
                                <input type="hidden" name="cadastrar">
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
    <script src="fileInput/js/fileinput.js"></script>
    <script src="fileInput/js/fileinput.min.js"></script>
    </body>
    </html>

<?php
if(isset($_POST['cadastrar'])){

    $uploaddir = 'upload/';

    $uploadfile = $uploaddir . $_FILES['arquivo']['name'];

    $data = $_POST['data_criacao'];
    $date = str_replace('/', '-', $data);
    $data_frequencia = date('Y-m-d', strtotime($date));
    echo '<input type="hidden" value='.$data.' id="frequencia_data"/>';

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){
        $arquivo_texto = file_get_contents($uploadfile);



        $ids = explode(';', $arquivo_texto);

        foreach ($ids as $value) {
            if($value == ''){}
                else if($value != ''){
            
            gerarFrequenciaPresenca($value,$id,$data_frequencia);
            }
        }
        gerarFalta($data_frequencia,$id);
        unlink($uploadfile);
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
                    <p>Frequência da data <i>'.$data.'</i> da turma <b><i>'.$turma->Codigo.'</i></b> gerada com sucesso</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="button_frequencia_turma">Fechar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        ';

    }
    else {
        dump('Nao foi Gerada Frequencia');
    }
}

function gerarFrequenciaPresenca($value,$id,$data_frequencia){
    $frequencia = new \Frequencia\Models\Frequencia;
    $al = new \Frequencia\Models\Aluno;
    $turma = new \Frequencia\Models\Turma_Aluno;
    $aluno = $al->findByType('idBiometria',$value);

    $turma = $turma->findByAndTypeAll('idAluno','idTurma',$aluno->idAluno,$id);

    foreach ($turma as $item){
            $frequencia = $frequencia->create(
                [
                    'idTurma' => $id,
                    'idAluno' => $item->idAluno,
                    'Data_Frequencia' =>$data_frequencia,
                    'Status' => 1
                ]);
    }
}

function gerarFalta($data_frequencia,$id){
    $freq = new \Frequencia\Models\Frequencia;
    $turma = new \Frequencia\Models\Turma_Aluno;
    $turma = $turma->findByTypeAll('idTurma',$id);
    foreach ($turma as $item){

        $verify_aluno = $freq->findByAnd('idAluno','Data_Frequencia',$item->idAluno,"'".$data_frequencia."'");
        if($verify_aluno->Status != 1){
            $freq->create(
                [
                    'idTurma' => $id,
                    'idAluno' => $item->idAluno,
                    'Data_Frequencia' =>$data_frequencia,
                    'Status' => 2
                ]);
        }




    }
}






?>