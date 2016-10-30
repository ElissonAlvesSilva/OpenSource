$(document).ready(function() {
    $('.modalWindow').on('click', function(){
        var nome = $(this).data('nome');
        var id = $(this).data('id');
        $('span.message').text(nome);

        $('#myModal').modal('show');
        valores(id);
    });
});
function valores(id) {
    $(document).ready(function () {
        $('#success').on('click', function () {
            var idMag = $("#idMag");
            var idMagistrado = idMag.val();
            $.post("insertAjax.php", {idMag: idMagistrado, idEvento: id},
                function(){
                    $("#resposta").modal('show');
                }
                , "html");
            $('#inserir').on('click', function () {
                window.location.href = "frmCertificado.php?idMag="+idMagistrado+"&idEvento="+id;
            })
        });
    });
}
