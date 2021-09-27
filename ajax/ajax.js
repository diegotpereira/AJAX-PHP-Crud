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
    });
});

// Atualizar Usuario
$(document).on('click', '.atualizar', function(e) {
    var id = $(this).attr("data-id");
    var nome = $(this).attr("data-nome");
    var email = $(this).attr("data-email");
    var telefone = $(this).attr("data-telefone");
    var cidade = $(this).attr("data-cidade");

    $('#id_u').val(id);
    $('#nome_u').val(nome);
    $('#email_u').val(email);
    $('#telefone_u').val(telefone);
    $('#cidade_u').val(cidade);
});

$(document).on('click', '#atualizar', function(e) {
    var data = $("#atualizar_form").serialize();
    $.ajax({
        data: data,
        type: "POST",
        url: "backend/operacoes.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#editFuncModal').modal('hide');
                alert('Dados atualizados com sucesso!');
                location.reload();
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});

// Deletar Usuário
$(document).on("click", ".delete", function() {
    var id = $(this).attr("data-id");
    $('#id_d').val(id);
});
$(document).on("click", "#deletar", function() {
    $.ajax({
        url: "backend/operacoes.php",
        type: "POST",
        cache: false,
        data: {
            type: 3,
            id: $("#id_d").val()
        },
        success: function(dataResult) {
            $('#deletarFuncModal').modal('hide');
            $("#" + dataResult).remove();
            location.reload();
        }
    });
});
$(document).on("click", "#deletar_multiplos", function() {
    var usuario = [];
    $(".usuario_checkbox:checked").each(function() {
        usuario.push($(this).data('usuario-id'));
    });
    if (usuario.length <= 0) {
        alert("Por Favor Selecione um Usuário..!");
    } else {
        EXCLUIR_PERFIL = "Tem certeza de que deseja excluir " + (usuario.length > 1 ? "esses" : "this") + " row?";
        var checked = confirm(EXCLUIR_PERFIL);
        if (checked == true) {
            var selecione_valores = usuario.join(",");
            console.log(selecione_valores);
            $.ajax({
                type: "POST",
                url: "backend/operacoes.php",
                cache: false,
                data: {
                    type: 4,
                    id: selecione_valores
                },
                success: function(response) {
                    var ids = response.split(",");
                    for (var i = 0; i < ids.length; i++) {
                        $("#" + ids[i]).remove();
                        location.reload();
                    }
                }
            });
        }
    }
})
$(document).ready(function() {
    $('[data-toggle = "tooltip"]').tooltip();
    var checkbox = $('table tbody input[type = "checkbox"]');
    $("#selecionarTodos").click(function() {
        if (this.ckecked) {
            checkbox.each(function() {
                this.checked = true;
            });
        } else {
            checkbox.each(function() {
                this.checked = false;
            });
        }
    });
    checkbox.click(function() {
        if (!this.checked) {
            $("#selecionarTodos").prop("checked", false);
        }
    });
});