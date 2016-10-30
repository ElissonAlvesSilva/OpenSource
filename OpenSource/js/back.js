$(document).ready(function(){
    $('#button_cad_aluno').click(function (e) {
        window.location.href = "frmPrincipal.php";
    });
    $('#button_cad_materia').click(function (e) {
        window.location.href = "frmPrincipal.php";
    });
    $('#button_cad_professor').click(function (e) {
        window.location.href = "frmPrincipal.php";
    });
    $('#button_cad_turma').click(function (e) {
        window.location.href = "frmPrincipal.php";
    });

    $('#button_remove_aluno').click(function (e) {
        window.location.href = "frmFindAluno.php";
    });
    $('#button_remove_materia').click(function (e) {
        window.location.href = "frmFindMateria.php";
    });
    $('#button_remove_prof').click(function (e) {
        window.location.href = "frmFindProfessor.php";
    });
    $('#button_remove_turma').click(function (e) {
        window.location.href = "frmFindTurma.php";
    });


    $('#button_update_aluno').click(function (e) {
        window.location.href = "frmFindAluno.php";
    });
    $('#button_update_prof').click(function (e) {
        window.location.href = "frmFindProfessor.php";
    });
    $('#button_update_materia').click(function (e) {
        window.location.href = "frmFindMateria.php";
    });
    $('#button_update_turma').click(function (e) {
        window.location.href = "frmFindTurma.php";
    });


    $('#button_matricula').click(function (e) {
        window.location.href = "frmAlunoPrincipal.php";
    });
    $('#button_frequencia').click(function (e) {
        window.location.href = "frmProfessorPrincipal.php";
    });

});
