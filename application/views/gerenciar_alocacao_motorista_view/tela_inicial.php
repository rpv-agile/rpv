<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Alocações</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row pb-1">
    <div class="col-md-9 row">
        <div class="col-md-3">
            <label for=""> </label>
            <select id="" class="form-control custom-select ">
            </select>
        </div>
        <div class="col-md-3 mt-auto">
            <button disabled id="filter_filter" type="button" class=" btn btn-secondary">Filtrar</button>
        </div>

    </div>
    <div class="col-md-3 mt-auto">
        <button type="button" class="btn btn-success float-right mr-2" data-toggle="modal"
            data-target="#id_modal_create_alocacao" title="Adicione uma nova locação.">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom"> </i> Adicionar uma nova locação
        </button>
    </div>
</div>

<!-- Table init (Ao abrir a tela) -->
<div class="table-responsive w-100">

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Placa do Veículo</th>
                <th scope="col">Trajeto</th>
                <th scope="col">Tempo Trajeto</th>
                <th scope="col">Cidade</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_alocacao">
            <tr>
                <th scope="row">1</th>
                <td>IQU1240</td>
                <td>Favila-Terminal</td>
                <td>8h</td>
                <td>Alegrete</td>
                <td>Urbano</td>

                <td>
                    <button type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal"
                        data-placement="top" title="Editar Alocação" data-target="#id_modal_edit_alocacao">
                        <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" title="Mais informações sobre a alocação."
                        data-toggle="modal" id="id_opcao_visualizar" data-placement="top"
                        data-target="#id_modal_info_alocacao">
                        <span class="hvr-icon fa fa-info mr-1"></span>Info
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

</div>

<!-- Modal create alocação -->
<div class="modal fade" id="id_modal_create_alocacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Nova Alocação</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation container" novalidate>
                    <div class="form-row mx-2">
                        <div class="form-group col-md-6">
                            <label for="modal_create_onibus">Ônibus:</label>
                            <i class="fa fa-search"></i>
                            <input name="onibus_placa" type="text" maxlength="7" class="form-control alphanumeric-only"
                                id="modal_create_placa" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_create_trajeto fa ">Trajeto:</label>
                            <i class="fa fa-search"></i>
                            <input name="" type="text" class="form-control numbers-only" id="modal_create_onibus"
                                required>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="modal_create_motorista">Motorista:</label>
                                    <i class="fa fa-search"></i>
                                    <input name="" type="text" maxlength="7" class="form-control alphanumeric-only"
                                        id="modal_create_placa" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_create_cobrador fa ">Cobrador:</label>
                                    <i class="fa fa-search"></i>
                                    <input name="" type="text" class="form-control numbers-only"
                                        id="modal_create_nro_onibus" required>
                                </div>
                            </div>
                            <div id="id_dados_alocacao">
                                <div class="col-auto">
                                    <label for="exampleFormControlInput1">Ônibus Alocado:</label>
                                </div>
                                <div class="col-auto">
                                    <label for="exampleFormControlInput1">Trajeto Alocado:</label>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group" id="id_mais_motorista">
                                        <div class="my-2 justify-content-between d-flex">
                                            <label for="exampleFormControlInput1">Motorista Alocado:</label>
                                            <button id="id_add_motorista" type="button" class="btn text-dark mb-2">
                                                <i class="fa fa-plus-square my-auto ml-2 fa-2x input-group-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group" id="id_mais_cobrador">
                                        <div class="my-2 justify-content-between d-flex">
                                            <label for="exampleFormControlInput1">Cobrador Alocado:</label>
                                            <button id="id_add_cobrador" type="button" class="btn text-dark mb-2">
                                                <i class="fa fa-plus-square my-auto ml-2 fa-2x input-group-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
<script>
var lastInsert = 0;
$('#id_add_motorista').click(function() {
    ++lastInsert
    $('#id_mais_motorista').append(
        '<div id="mot' + lastInsert +
        '"class="d-flex flex-row align-center my-1 justify-content-center">' +
        '<input required maxlength="255" type="text" name="" class="form-control" id="exampleFormControlInput1">' +
        '<button onclick="deletarCampo(\'mot' + lastInsert +
        '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
        '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
        '</button>' +
        '</div>');
});

$('#id_add_cobrador').click(function() {
    ++lastInsert
    $('#id_mais_cobrador').append(
        '<div id="mot' + lastInsert +
        '"class="d-flex flex-row align-center my-1 justify-content-center">' +
        '<input required maxlength="255" type="text" name="" class="form-control" id="exampleFormControlInput1">' +
        '<button onclick="deletarCampo(\'mot' + lastInsert +
        '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
        '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
        '</button>' +
        '</div>');
});
function deletarCampo(campo) {
    $('#' + campo + '').remove();
}
</script>