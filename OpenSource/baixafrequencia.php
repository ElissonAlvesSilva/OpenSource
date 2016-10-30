<?php @ob_start();session_start();require "config/config.php";?>
<?php
$idMateria = isset($_POST['idMateria'])?$_POST['idMateria']:"";
$idTurma = isset($_POST['idTurma'])?$_POST['idTurma']:"";
$arquivo = isset($_POST['arquivo'])?$_POST['arquivo']:"";

$arquivo = explode(';', $arquivo);

foreach ($arquivo as $value) {
    gerar($value,$idMateria,$idTurma);
}

function gerar($value,$idMateria,$idTurma){
    $frequencia  = new \Frequencia\Models\Frequencia;
    $al = new \Frequencia\Models\Aluno;
    $aluno = $al->findByType('RA',$value);
    $t = new \Frequencia\Models\Turma;

    $turma = $t->findByAndTypeAll('Aluno_idAluno',$aluno->idAluno,'idTurma',$idTurma);
    foreach ($turma as $frequencia_turma){
        if(($frequencia_turma->idAluno == $value)){
            $frequencia ->create(
                [
                    'idMateria' => $idMateria,
                    'idTurma' => $idTurma,
                    'idAluno' => $frequencia_turma->Aluno_idAluno,
                    'Data_Frequencia' => $value,
                    'Status' => 1
                ]);
        }else{
            $frequencia ->create(
                [
                    'idMateria' => $idMateria,
                    'idTurma' => $idTurma,
                    'idAluno' => $frequencia_turma->Aluno_idAluno,
                    'Data_Frequencia' => $value,
                    'Status' => 0
                ]);
        }

    }


}
?>