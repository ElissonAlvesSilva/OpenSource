$(document).ready(function() {
    $('.modalremove').on('click', function(){
        var nome = $(this).data('nome');
        var id = $(this).data('id');
        $('span.message').text(nome);
        $('#remove').modal('show');
        remove(id);
    });
});
function remove(id) {
    $(document).ready(function () {
        $('#remove').on('click', function () {
            var idMag = $("#idMagRe");
            var idMagistrado = idMag.val();
            $.post("removerAjax.php", {idMag: idMagistrado, idEven: id},
                function(data){
                }
                , "html");
        });
    });
}