<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<h2 class="text-center">Editar tarifa</h2>

<div class="col-md-10 my-4 mx-auto">
    <div class="card">
        <div class="card-header">
            Novo valor da Tarifa
        </div>
        <?= form_open_multipart('tarifas/update') ?>

        <?= form_hidden('tarifa_id', $tarifaAtual['valores_id_tarifa']); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="valor">Valor da Tarifa</label>
                <input name="valor" id="valor" class=" form-control" type="text" step="0.01" value="<?= $tarifaAtual['valores_valor'] ?>" required>
            </div>
            <div class="form-group ">
                <label for="date">Data</label>
                <input name="date" type='date' id="date" class="form-control" type="text" disabled value="<?= date('Y-m-d') ?>" />
            </div>
            <div class="form-group">
                <label for="consessao">Consessão</label>
                <div class=" custom-file">
                    <input type="file" class="custom-file-input" id="consessao" name="concessao" required>
                    <label class="custom-file-label" for="consessao" id="fileLabel">Escolha um arquivo</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="text-right">
                <button class="btn btn-success">Confirmar</button>
            </div>
        </div>
        </form>
    </div>

</div>
<div class="card mb-3">
    <div class="card-header">
        Histórico dos valores da tarifa
    </div>
    <div class="card-body">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Valor</th>
                    <th scope="col">Data Homologação</th>
                    <th scope="col">Status</th>
                    <th scope="col">Anexo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($valores as $valor) : ?>
                                                                                                                <tr class="">
                                                                                                                    <td><?= $valor['valores_valor'] ?></td>
                                                                                                                <td><?= $valor['valores_data_homologacao'] ?></td>
                                                                                                                <td><?php if ($valor['valores_is_vigente'] == true)
                                                                                                                    echo "Vigente";
                                                                                                                else echo "Não Vigente";
                                                                                                                ?>
                                                                                                                </td>
                                                                                                                <td><a target="_blank" class="btn btn-link text-dark btn-hover" href="<?= $valor['valores_anexo'] ?>"><i class="fa fa-download"></i></a></td>
                                                                                                                </tr>
                                                                                                                                                                                                            <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Body end -->
    </div>
    <div class="card-footer"></div>
</div>

<?php
$this->load->view('footer2');
?>

<script>
    $("#consessao").change(function() {
        var fullPath = $(this).val();
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
        }
        $("#fileLabel").html(filename);
    });



    $("#valor").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

</script>                                                                                                            $this->load->view("footer2.php")
                                                                                                            ?>