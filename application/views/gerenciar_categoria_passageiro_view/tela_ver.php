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
        <h4 class="text-center"><b>Gerenciar Categorias</b><Br><b>de Passageiros</b></h4>

        <h4 class="text-center text-logo-color"><b><br><?= $categoria['categoriapassageiro_nome'] ?></b></h4>
    </div>


    <!-- <div class="form-group col-md-2">
        <label for="valorDesconto"><b>Valor Desconto:</b></label>
        <input type="text" class="form-control" id="idCampoDesconto"
            placeholder=<?= $categoria['categoriapassageiro_valordesconto']?>% readonly>
    </div> -->


    <ul class="list-group col-md-7 mx-auto">

        <li class="list-group-item active text-center bg-logo-color">
            <h5><b>Valor Desconto</b></h5>
        </li>

        <li class="list-group-item text-center">
            <?= $categoria['categoriapassageiro_valordesconto']?>%
        </li>

        <li class="list-group-item active text-center bg-logo-color">
            <h5><b>Critérios</b></h5>
        </li>


        <?php foreach($criterios as $umCriterio) : ?>
        <li class="list-group-item text-center"><?php echo $umCriterio['criterios_descricao'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>


<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>