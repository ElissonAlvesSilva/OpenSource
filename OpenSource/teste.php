<?php require "config/config.php";?>
<?php
    $loac = new \DB\Database\LoadCheckBox;
    $loac->loadcheck('Turma','Materia','Materia_idMateria','idMateria');


