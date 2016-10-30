<?php require "config/config.php";?>
<?php
    echo '
        <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="arquivo">
        <input type="submit"/>
        <input type="hidden" name="c"/>
        </form>
    ';
if(isset($_POST['c'])){

    $uploaddir = 'upload/';

    $uploadfile = $uploaddir . $_FILES['arquivo']['name'];

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){
        $arquivo_texto = file_get_contents($uploadfile);


        $emails = explode(';', $arquivo_texto);

        foreach ($emails as $value) {
            echo $value.'<br/>';
        }
        unlink($uploadfile);

    }
    else {echo "Arquivo não enviado";}






}


