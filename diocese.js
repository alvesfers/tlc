$(document).ready(function () {
    $.ajax({
        url: 'buscar_todas_dioceses.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            var select = $('#outra-diocese');
            select.empty();
            select.append('<option value="0">Selecione a outra Diocese</option>');
            $.each(response, function (index, diocese) {
                select.append('<option value="' + diocese.id_diocese + '">' + diocese.nome_diocese + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    $('#minha-diocese').change(function () {
        if ($(this).val() == '1') {
            $('#div-outra-diocese').show();
        } else {
            $('#div-outra-diocese').hide();
        }
    });

    $("#pegar-nucleo").click(function () {
        var id_diocese = $('#outra-diocese').val() == 0 ? 0 : $('#outra-diocese').val();
        var arr_dados = {
            id_diocese: id_diocese,
        }
        $.ajax({
            url: 'buscar_nucleos_diocese.php',
            type: 'POST',
            data: arr_dados,
            success: function (response) {
                $('#modal-nucleo-label').text(response.nome_nucleo);
                var table = $('#table-dioceses tbody');
                table.empty();
                $.each(response, function (index, diocese) {
                    table.append('<tr>' +
                        '<td>' +
                        diocese.nome_nucleo +
                        '</td>' +
                        '<td>' + diocese.nome_setor + '</td>' +
                        '<td>' + diocese.nome_paroquia + '</td>' +
                        '<td style=\'text-align:center;\'>' +
                            '<i class=\'bx bxs-info-circle text-primary ver-nucleo\' style=\'cursor: pointer; font-size:25px\' onclick=\'open_modal_nucleo(' + diocese.id_nucleo + ')\'></i>' +
                        '</td>' +
                        '</tr>');
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


    $('#form-remover-coordenacao').submit(function(e) {
        e.preventDefault();
        var id_usuario = $('#modal-excluir-coordenador').attr('data-id_usuario');

        $.ajax({
            url: 'remover_coordenador.php',
            type: 'GET',
            data: {id_usuario},
            success: function (response) {
                alert(response);
                if(response == true){
                    alert("Usuario transferido para dirigente")
                }else{
                    alert("Não foi possível transferir o usuario para dirigente")
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

        $('#modal-excluir-coordenador').modal('hide');
    });

    $('#edit-nucleo').submit(function(e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: 'editar_nucleo.php',
            type: 'POST',
            data: form_data, // Remova as chaves adicionais aqui
            success: function (response) {
                alert(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    
        $('#modal-excluir-coordenador').modal('hide');
    });
    
});

function open_modal_nucleo(id_nucleo) {
    var usuario_logado = $("#usuario_logado").val();
    $.ajax({
        url: 'buscar_dados_nucleo.php',
        type: 'GET',
        data: { id_nucleo: id_nucleo, usuario_logado: usuario_logado },
        success: function (response) {
            var icon = '';
            if (response.tipo_usuario == 1 || response.tipo_usuario == 2 || response.tipo_usuario == 4) {
                if (response.id_diocese_usuario_session == response.id_diocese) {
                    if (response.id_nucleo_usuario_session == id_nucleo) {
                        $('.desabilitar').prop('disabled', false);
                    } else {
                        if (response.tipo_usuario == 2) {
                            $('.desabilitar').prop('disabled', true);
                        } else {
                            $('.desabilitar').prop('disabled', false);
                        }
                    }
                } else {
                    $('.desabilitar').prop('disabled', false);
                }
            } else {
                $('.desabilitar').prop('disabled', true);
            }
            $('#nome-nucleo').val(response.nome_nucleo);
            $('#paroquia-nucleo').val(response.nome_paroquia);
            $('#endereco-nucleo').val(response.endereco_paroquia);
            $('#id-nucleo').val(id_nucleo);
            $('#nucleo-ativo').prop('checked', response.nucleo_ativo == 1 ? true : false);

            var table = $('#table-coordenadores tbody');
            table.empty();
            $.each(response.coordenadores, function (index, coordinator) {
                if (response.tipo_usuario == 1 || response.tipo_usuario == 2 || response.tipo_usuario == 4) {
                    if (response.id_diocese_usuario_session == response.id_diocese) {
                        if (response.id_nucleo_usuario_session == id_nucleo) {
                            icon = '<td><i class="bx bxs-x-circle text-danger" onClick="remover_coordenacao('+response.id_usuario+')" style="cursor: pointer; font-size:25px"></a></td>';
                        } else {
                            if (response.tipo_usuario == 2) {
                            } else {
                                icon = '<td><i class="bx bxs-x-circle text-danger" onClick="remover_coordenacao('+response.id_usuario+')" style="cursor: pointer; font-size:25px"></a></td>';
                            }
                        }
                    } else {
                        icon = '<td><i class="bx bxs-x-circle text-danger" onClick="remover_coordenacao('+response.id_usuario+')" style="cursor: pointer; font-size:25px"></a></td>';
                    }
                }
                table.append('<tr>' +
                    '<td>' + coordinator.nome_usuario + '</td>' +
                    '<td>' + coordinator.tempo + '</td>' +
                    '<td>' +
                    '<i class="bx bxs-info-circle text-primary" style="cursor: pointer; font-size:25px"></i>' 
                    +icon+
                    '</tr>');
            });

            // Exibir a modal
            $('#modal-nucleo').modal('show');
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });

}

function remover_coordenacao(id_usuario) {
    // Fechar o modal-nucleo
    $("#modal-nucleo").modal('hide'); 
    
    // Abrir o modal-excluir-coordenador após o modal-nucleo ser fechado
    $("#modal-nucleo").on('hidden.bs.modal', function () {
        // Adicionar o atributo data-id_usuario ao modal-excluir-coordenador
        $("#modal-excluir-coordenador").attr('data-id_usuario', id_usuario);
        $("#modal-excluir-coordenador").modal('show');
    });
}