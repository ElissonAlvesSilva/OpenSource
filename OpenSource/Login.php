<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BFE | Login</title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link href="css/style_login.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

</head>
<body>
    <div class="content box animated zoomIn">
        <form method="post" action="validation.php">
            <header>
                <h5 class="header-h5">Boletim de Frequência Eletrônico <span style="margin-left: 50px">|</span>  <span style="margin-left: 45px">Login</span></h5>
            </header>
            <div class="panel-login">
                <label>Usuário</label>
                <input type="text" name="usuario" id="usuario" class="form-control"/>
                <label>Senha</label>
                <input type="password" name="senha" class="form-control"/>
                <input type="submit" class="btn btn-success" value="Logar">
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>