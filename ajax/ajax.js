$(document).on('click', '#btn-add', function(e) {
    var data = $("#user_form").serialize();
    $.ajax({
        data: data,
        type: "POST",
        url: "backend/operacoes.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#addFuncModal').modal('hide');
                alert('Dados Adicionados com Sucesso..!');
                location.reload();
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    })
});