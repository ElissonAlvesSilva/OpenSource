<?php @ob_start();session_start();require "config/config.php";date_default_timezone_set('UTC');?>
<?php
    $reg = new \Frequencia\Models\Registro_Academico;
    $registro = $reg->lastId('idRegistro');
    $RA = $registro->RA+1;
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

    <script src="js/mask.js"></script>
    <script src="js/back_button.js"></script>
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
                    <h2 class="page_title">Novo Aluno</h2>
                </header>
                <div class="content-inner">
                    <div class="form form-wrapper">
                        <form class="form form-horizontal" method="post" name="form">
                            <div class="form-group col-xs-2 col-md-2"  style="margin-right: 20px">
                                <label for="ra_aluno" class="label label-message">Registro Academico</label>
                                <input type="text"  class="form-control" id="ra_aluno" required name="ra" placeholder="Registro Academico" value="<?php echo $RA;?>">
                            </div>
                            <div class="form-group col-xs-2 col-md-2"  style="margin-right: 150px">
                                <label for="id_biometria" class="label label-message">Identificação Biometrica</label>
                                <input type="text"  class="form-control" id="id_biometria" required name="id_biometria" placeholder="Identifição Biometrica">
                            </div>
                            <div class="form-group col-xs-8 col-md-8" style="margin-right: 200px">
                                <label for="nome_aluno" class="label label-message">Nome Completo</label>
                                <input type="text"  class="form-control" id="nome_aluno" required name="nome" placeholder="Nome Completo">
                            </div>
                            <div class="form-group col-xs-8 col-md-8" style="margin-right: 200px">
                                <label for="nome_mae" class="label label-message">Nome da Mãe</label>
                                <input type="text"  class="form-control" id="nome_mae" required name="nome_mae" placeholder="Nome Completo">
                            </div>
                            <div class="form-group col-xs-3 col-xs-3" >
                                <label for="date" class="label label-message">Data de Nascimento</label>
                                <input type="text" class="form-control"  id="date_nascimento" maxlength="10" OnKeyPress="formatar('##/##/####', this)" name="data_nascimento" placeholder="dd/mm/aaaa">
                            </div>
                            <div class="form-group col-xs-2 col-md-2" style="margin-right: 30px;margin-left: 30px" >
                                <label for="rg" class="label label-message">RG</label>
                                <input type="text"  class="form-control" name="rg" placeholder="Somente Numeros">
                            </div>
                            <div class="form-group col-xs-4 col-md-4" >
                                <label class="label label-message">CPF</label>
                                <input type="text"  class="form-control" id="contato" maxlength="13"  name="cpf" placeholder="somente numeros">
                            </div>
                            <br/>
                            <div class="form-group col-xs-8 col-md-8" style="margin-right: 200px">
                                <label for="nome_aluno" class="label label-message">Endereço</label>
                                <input type="text"  class="form-control" id="nome_aluno" required name="endereco" placeholder="Endere?o Completo">
                            </div>
                            <div class="form-group col-md-3 col-xs-3" >
                                <label class="label label-message">Telefone</label>
                                <input type="text" class="form-control"  name="telefone" placeholder="Telefone de contato">
                            </div>
                            <div class="form-group col-md-10 col-xs-10" >
                                <label class="label label-message">E-mail</label>
                                <input type="text" class="form-control"  name="email" placeholder="yourEmail@me.com">
                            </div>

                            <br/>
                            <div id="date"></div>

                            <div class="clearfix">
                                <button type="submit" style="margin-top: 20px" class="btn btn-primary pull-right"> <span class="glyphicon glyphicon-plus"></span> Cadastrar</button>
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
</body>
</html>

<?php
    if(isset($_POST['cadastrar'])){
        $aluno = new \Frequencia\Models\Aluno;
        $user = new \Frequencia\Models\Usuario_RM;

        $verify = $aluno->verify('Nome',$_POST['nome']);
        if($verify == ''){

            $data_n = $_POST['data_nascimento'];
            $date = str_replace('/', '-', $data_n);
            $data_nascimento = date('Y-m-d', strtotime($date));

            $registro = $reg->create(['RA'=>$_POST['ra']]);
            $registro_aluno = $reg->findByType('idRegistro',$registro);


            $aluno->create(
                [
                    'RA' => $registro,
                    'idBiometria' => $_POST['id_biometria'],
                    'Nome' => $_POST['nome'],
                    'Nome_Mae' => $_POST['nome_mae'],
                    'Data_Nascimento' => $data_nascimento,
                    'RG' => $_POST['rg'],
                    'CPF' => $_POST['cpf'],
                    'Endereco' => $_POST['endereco'],
                    'Telefone' => $_POST['telefone'],
                    'Email' => $_POST['email'],
                    'Matricula' => 2
                ]);

            $user->create(
                [
                    'RA' => $registro,
                    'Senha' => '123456',
                    'Status' => 3,
                    'Nivel' => 2
                ]
            );



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
                    <p>Aluno <b><i>'.$_POST['nome'].'</i></b> Cadastrado com sucesso</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="button_cad_aluno">Fechar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        ';
        }else{
            echo '<script>
            $(document).ready(function(){
                $("#messagemErr").modal("show");
            });
        </script>

        <div class="modal fade" id="messagemErr" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content modal-window">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Mensagem BFE</h4>
                  </div>
                  <div class="modal-body">
                    <p>Aluno <b><i>'.$_POST['nome'].'</i></b> j? est? cadastrado no sistema.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        ';
        }
    }



?>