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

$senhapadrao = trim($_POST['antiga']);
$senha = trim($_POST['nova']);

$db = new \Frequencia\Models\Usuario();
$log = $db->UpdatePassword($senhapadrao,$senha);
if($log == 1)
{
header("location: Login.php");
}else if($log == 2) {
    echo "USUARIO INATIVO, POR FAVOR FALE COM ADMINISTRADOR DO SISTEMA";
}
?>
</body>
</html>