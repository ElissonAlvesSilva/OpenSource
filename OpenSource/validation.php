<?php @ob_start();session_start();?>
<?php require "config/config.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$usuario = trim($_POST['usuario']);
$senha = trim($_POST['senha']);

if(is_numeric($usuario)){
    $db = new \Frequencia\Models\Usuario;
    $registro = new \Frequencia\Models\Registro_Academico;
    $ra = $registro->findByType('RA',$usuario);
    $log = $db->validationRA($ra->idRegistro,$senha);

    if($log == 1)
    {
        if($_SESSION['Nivel'] == 1)
            header("location: frmPrincipal.php");
        else if($_SESSION['Nivel'] == 2)
            header("location: frmAlunoPrincipal.php");
        else if($_SESSION['Nivel'] == 3)
            header("location: frmProfessorPrincipal.php");

    }else if($log == 2)
    {
        echo "USUARIO INATIVO, POR FAVOR FALE COM ADMINISTRADOR DO SISTEMA <p><a href='Login.php'>Voltar</p>";
    }else if($log == 3)
    {
        header("location: forms/alterationPassword.php?id=".$_SESSION['idUsuario']);
    }else if($log == 4 )
    {
        echo "Login or Password is invalid <p><a href='Login.php'>Voltar</p>";
    }

}else if(!is_numeric($usuario)){

    $db = new \Frequencia\Models\Usuario;
    $log = $db->validationUsuario($usuario,$senha);

    if($log == 1)
    {
        if($_SESSION['Nivel'] == 1)
            header("location: frmPrincipal.php");
        else if($_SESSION['Nivel'] == 2)
            header("location: frmAlunoPrincipal.php");
        else if($_SESSION['Nivel'] == 3)
            header("location: frmProfessorPrincipal.php");

    }else if($log == 2)
    {

        echo "USUARIO INATIVO, POR FAVOR FALE COM ADMINISTRADOR DO SISTEMA <p><a href='Login.php'>Voltar</p>";

    }else if($log == 3)

    {

        header("location: forms/alterationPassword.php?id=".$_SESSION['idUsuario']);

    }else if($log == 4 )

    {

        echo "Login or Password is invalid <p><a href='Login.php'>Voltar</p>";

    }

}




?>


</body>
</html>