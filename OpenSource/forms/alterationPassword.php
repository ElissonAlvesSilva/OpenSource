<!DOCTYPE html>
<html>
<head>
    <meta CHARSET="UTF-8"/>
    <title>Alteração de Senha</title>
</head>
<body>
    <h1>Alteração de Senha</h1>
    <?php
        $id = isset($_GET['id'])?$_GET['id']:"";
    ?>
    <form action="<?php echo "../updatepassword.php?id=".$id;?>" method="post">
        <p>Senha Antiga:<input type="text" name="antiga" placeholder="SENHA ANTIGA"></p>
        <p>Nova Senha:<input type="text" name="nova" placeholder="SENHA NOVA"></p>
        <input type="submit" value="Alterar">
    </form>
</body>
</html>
