<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
    <!-- Body init -->
    <div class="row">
    <div class="trajetos_exist col-md-8">
        <div class="card">
            <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0 justify-content-center">Paradas Urbanas</h3>
            </div>
            <div class="card-body">
                <input id="id_form" name="name_form" type="text" class="form-control" placeholder="Filtrar"/>
                <div class="overflow-auto mt-2" style="max-height: 75vh">
                    <table class="table table-striped table-bordered table-hover align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>Bairro</th>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($paradas as $row) : ?>
                            <tr>
                                <td><?= $row['parada_rua'] ?></td>
                                <td><?= $row['parada_numero'] ?></td>
                                <td><?= $row['parada_bairro'] ?></td>
                                <td class="text-right">
                                    <a class="btn-icon-only text-dark d-flex  justify-content-center" href="#"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu  dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">Editar</a>
                                        <a class="dropdown-item" href="#">Excluir</a>
                                    </div></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Informações do Trajeto</h4>
            </div>
            <div class="card-body">
                <form>
                    <label for="bairro">Bairro:
                        <input id = "rua" name = "name_bairro" type=text class="form-control"></label><br>
                    <label for="rua">Rua:
                        <input id = "id_rua" name = "name_rua" type="text" class="form-control"></label><br>
                    <label for="numero">Número:
                        <input id="numero" name= "name_nmr" type="text" class="form-control"></label><br>
                </form>
                <div class="row d-flex justify-content-end mx-1">
                    <div>
                        <button id = "btn_add" name="name_btn_add" type = "button" class="btn btn-info ">Adicionar</button>

                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>

        <div class="row col-md-12 d-flex justify-content-end mt-3 mb-4">
            <div>
                <button type="button" class="btn btn-success ">Salvar</button>
                <button type="button" class="btn btn-danger ">Cancelar</button>

            </div>
        </div>


    </div>


    <!-- Body end -->
<?php
$this->load->view("footer2.php")
?>