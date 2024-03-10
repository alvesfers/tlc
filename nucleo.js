$(document).ready(function () {
    $.ajax({
        url: 'buscar_todos_nucleos.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            var select = $('#outro-nucleo');
            select.empty();
            select.append('<option value="0">Selecione o outro Núcleo</option>');
            $.each(response, function (index, nucleo) {
                select.append('<option value="' + nucleo.id_nucleo + '">' + nucleo.nome_nucleo + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    $('#meu-nucleo').change(function () {
        if ($(this).val() == '1') {
            $('#div-outro-nucleo').show();
        } else {
            $('#div-outro-nucleo').hide();
        }
    });

    $("#pegar-nucleo").click(function () {
        var id_nucleo = $('#outro-nucleo').val() == 0 ? 0 : $('#outro-nucleo').val();
        var arr_dados = {
            id_nucleo: id_nucleo,
        }
        $.ajax({
            url: 'buscar_usuarios_nucleo.php',
            type: 'POST',
            data: arr_dados,
            success: function (response) {
                $('#modal-nucleo-label').text(response.nome_nucleo);
                var table = $('#table-dirigentes tbody');
                table.empty();
                $.each(response, function (index, usuario) {
                    table.append('<tr>' +
                        '<td>' + usuario.nome_usuario + '</td>' +
                        '<td>' + usuario.nome_tipo + '</td>' +
                        '<td>' + usuario.login_usuario + '</td>' +
                        '<td style=\'text-align:center;\'>' + '<i class=\'bx bxs-analyse text-primary ver-dirigente\' style=\'cursor: pointer;\' onclick=\'open_modal_dirigente(' + usuario.id_usuario + ')\'></i>' + '</td>' +
                        '</tr>');
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

});
function open_modal_dirigente(id_usuario) {
    var usuario_logado = $("#usuario_logado").val();
    $.ajax({
        url: 'buscar_dados_usuario.php',
        type: 'GET',
        data: { id_usuario: id_usuario, usuario_logado: usuario_logado },
        success: function (response) {
            var response = JSON.parse(response);
            var icon = '';

            if (response.ul.id_diocese == response.um.id_diocese) {
                if (response.ul.id_tipo_usuario == 1) {
                    console.log("Coordenador diocesano");
                    $('.desabilitar').prop('disabled', false);
                } else {
                    $('.desabilitar').prop('disabled', true);
                    if (response.ul.id_tipo_usuario == 2 && response.ul.id_nucleo == response.um.id_nucleo) {
                        console.log("Coordenador do núcleo");
                        $('.desabilitar').prop('disabled', false);
                    } else {
                        $('.desabilitar').prop('disabled', true);
                        if (response.ul.id_usuario == response.um.id_usuario) {
                            console.log("O mesmo usuário do modal");
                            $('.desabilitar').prop('disabled', false);
                        } else {
                            $('.desabilitar').prop('disabled', true);
                        }
                    }
                }
            } else {
                $('.desabilitar').prop('disabled', true);
            }

            $('#nome-dirigente').val(response.um.nome_usuario);
            $('#login-dirigente').val(response.um.login_usuario);
            $('#data-tlc').val(response.um.data_tlc);
            $('#usuario-ativo').prop('checked', response.um.usuario_ativo == 1 ? true : false);

            var table = $('#table-secretarias tbody');
            table.empty();
            $.each(response.secretarias, function (index, secretaria) {

                if (response.ul.id_diocese == response.um.id_diocese) {
                    if (response.ul.id_tipo_usuario == 1) {
                        
                    } else {
                        icon = '<i class="bx bxs-x-circle text-danger remover-coordenacao" data-bs-target="#modal-excluir-coordenador" data-bs-toggle="modal" data-id_usuario="'+secretaria.id_usuario_secretaria+'" style="cursor:pointer"></a>';
                        if (response.ul.id_tipo_usuario == 2 && response.ul.id_nucleo == response.um.id_nucleo) {
                        } else {
                            icon = '<i class="bx bxs-x-circle text-danger remover-coordenacao" data-bs-target="#modal-excluir-coordenador" data-bs-toggle="modal" data-id_usuario="'+secretaria.id_usuario_secretaria+'" style="cursor:pointer"></a>';
                            if (response.ul.id_usuario == response.um.id_usuario) {
                            
                            } else {
                                icon = '<i class="bx bxs-x-circle text-danger remover-coordenacao" data-bs-target="#modal-excluir-coordenador" data-bs-toggle="modal" data-id_usuario="'+secretaria.id_usuario_secretaria+'" style="cursor:pointer"></a>';
                            }
                        }
                    }
                } else {
                    icon = '<i class="bx bxs-x-circle text-danger remover-coordenacao" data-bs-target="#modal-excluir-coordenador" data-bs-toggle="modal" data-id_usuario="'+secretaria.id_usuario_secretaria+'" style="cursor:pointer"></a>';
                }

                table.append('<tr>' +
                    '<td>' +
                        secretaria.nome_secretaria +
                    '</td>' +
                    '<td>' + secretaria.tempo + '</td>' +
                    '<td style=\'text-align:center;\'>' +
                        '<i class=\'bx bxs-analyse text-primary ver-nucleo\' style=\'cursor: pointer;\' onclick=\'open_modal_nucleo(' + secretaria.id_secretaria + ')\'></i>' +icon+
                    '</td>' +
                    '</tr>');
            });

            // Exibir a modal
            $('#modal-dirigente').modal('show');
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });

}
