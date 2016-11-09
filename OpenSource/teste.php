<?php @ob_start();session_start();require "config/config.php";?>
<?php

$frequencia = new \Frequencia\Models\Frequencia;
$materia = new \Frequencia\Models\Materia;


$frequencia = $frequencia->findByCountFault('idAluno','Status',11,2);
$materia = $materia->findByType('idMateria',3);

$calc_falta = (($frequencia->total*2)*100)/$materia->Carga_Horaria;


dump($calc_falta);

$frequencia = $frequencia->findByCountFault('idAluno','Status',$id,$turma->Materia_idMateria);

if($frequencia->Status == 2 ){
    $calc_falta = (($frequencia->total*2)*100)/$materia->Carga_Horaria;
}else{
    $calc_falta = 0;
}
