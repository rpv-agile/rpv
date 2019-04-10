<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<div class="container-fluid d-flex justify-content-center flex-column">


    <div class="mx-auto">
        <i class="fa fa-group fa-5x mt-3 text-logo-color"></i>
    </div>
    <div class="mx-auto my-3">
        <h4 class="text-center"><b>Cadastrar Categoria</b></h4>
    </div>
    <div class="col-sm-6 mx-auto justify-content-center ">
<?= $this->session->flashdata('error') ?>
        <div class="card">
            <!-- form aqui -->


            <?= form_open('categorias/passageiros/create') ?>
            <div class="card-body">
                <div class="form-group">
                    <div class="col-auto">
                        <label for="exampleFormControlInput1">Nome Categoria:</label>
                        <input name="nome" type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>
                <div class="col-auto">
                    <label for="exampleFormControlInput1">Valor Desconto:</label>
                    <input name="desconto" type="text" class="form-control" id="exampleFormControlInput1">
                </div>

                <div class="col-auto">
                    <div class="form-group" id="camposCriterios">
                        <div class="my-2 justify-content-between d-flex   ">
                            <label for="exampleFormControlInput1 mb-5">Critérios:</label>

                            <button id="add" type="button" class="btn text-dark mb-2">
                                <i class="fa fa-plus-square my-auto ml-2 fa-2x input-group-icon"></i>
                            </button>
                        </div>


                        <div class="d-flex flex-row align-center my-1 justify-content-center">
                            <input type="text" name="criterios[]" class="form-control" id="exampleFormControlInput1">
                            <a href="" id="add" class="btn text-dark invisible">
                                <i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
            <div class="card-footer text-center">

                <button type="submit" class="btn btn-success h-100-left">Salvar
                </button>
                <a href="<?= site_url('gerenciar_categoria_passageiros_controller') ?>"
                    class="btn btn-danger h-100-right">Cancelar
                </a>

            </div>
            </form>
            <!-- fim do form aqui -->

        </div>
    </div>

</div>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
<script>
var lastInsert = 0;
$('#add').click(function() {
    ++lastInsert
    $('#camposCriterios').append(
        '<div id="crit' + lastInsert +
        '"class="d-flex flex-row align-center my-1 justify-content-center">' +
        '<input type="text" name="criterios[]" class="form-control" id="exampleFormControlInput1">' +
        '<button onclick="deletarCampo(\'crit'+lastInsert+'\')"type="button" id="add" class=" btn btn-hover text-dark">' +
        '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
        '</button>' +
        '</div>');

});

function deletarCampo(campo) {
    $('#' + campo + '').remove();
}
</script>