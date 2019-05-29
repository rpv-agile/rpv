<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<head>

</head>

<style>
    ol {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .seats {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: flex-start;
    }

    .seat {
        display: flex;
        flex: 0 0 25%;
        padding: 5px;
        position: relative;
    }

    .seat input[type=checkbox] {
        position: absolute;
        opacity: 0;
    }

    .seat input[type=checkbox]:checked+label {
        background: #bada55;
        -webkit-animation-name: rubberBand;
        animation-name: rubberBand;
        animation-duration: 300ms;
        animation-fill-mode: both;
    }

    .seat input[type=checkbox]:disabled+label {
        background: #dddddd;
        text-indent: -9999px;
        overflow: hidden;
    }

    .seat input[type=checkbox]:disabled+label:after {
        content: "X";
        text-indent: 0;
        position: absolute;
        top: 4px;
        left: 50%;
        transform: translate(-50%, 0%);
    }

    .seat input[type=checkbox]:disabled+label:hover {
        box-shadow: none;
        cursor: not-allowed;
    }

    .seat label {
        display: block;
        position: relative;
        width: 100%;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        line-height: 1.5rem;
        padding: 4px 0;
        background: #55aaff;
        border-radius: 5px;
    }

    .seat label:hover {
        cursor: pointer;
        box-shadow: 0 0 0px 2px #5C6AFF;
    }
</style>


<?php
$numColunas = 4;
$numPoltronas = 50;
?>
<?= "
<style>
.seat{
    flex: 0 0 " . 100 / $numColunas . "%;
}
</style>
"; ?>

<h2 class="text-center">Compra de Passagem</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>

<div class="row col-md-12">
    <div class="col-md-6 overflow-auto mr-3">

        <ol class="cabin fuselage">
            <li class="col bg-secondary p-2 rounded-top">
                <center>Frende do Onibus</center>
            </li>
            <?php for ($i = 0; $i < $numPoltronas; $i++) :
                ?>
                <script>
                    console.log("mod", <?= $i % $numColunas ?>)
                </script>
                <? if ($i % $numColunas === 0) echo '<li class="row col seats">' ?>

                <? if ($i % $numColunas == ceil($numColunas / 2) - 1) : ?>
                    <div class="col seat mr-4">
                        <input <? if (($i == 7 || $i == 14)) : ?>
                            disabled
                        <? endif; ?>
                        type="checkbox" id="Cadeira<?= $i + 1 ?>" />
                        <label for="Cadeira<?= $i + 1 ?>"><?= $i + 1 ?></label>
                    </div>
                <? else : ?>
                    <div class="col seat">
                        <input <? if (($i == 7 || $i == 14)) : ?>
                            disabled
                        <? endif; ?>
                        type="checkbox" id="Cadeira<?= $i + 1 ?>" />
                        <label for="Cadeira<?= $i + 1 ?>"><?= $i + 1 ?></label>
                    </div>
                <? endif; ?>
                <? if ($i % $numColunas === $numColunas - 1) echo '</li>' ?>


            <?php endfor; ?>

            <!--                     
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira2" />
                            <label for="Cadeira2">2</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira3" />
                            <label for="Cadeira3">3</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira4" />
                            <label for="Cadeira4">4</label>
                        </div>

                        </li>

                    <li class="row col seats">
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira5" />
                            <label for="Cadeira">5</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira6" />
                            <label for="Cadeira6">6</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira7" />
                            <label for="Cadeira7">2C</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="2D" />
                            <label for="2D">2D</label>
                        </div>
                    </li> -->
        </ol>
    </div>
    <div class="col-md-5 card">
        <div class="card-body">

            <div class="form-row">

                <label>
                    Quantidade Selecionada:
                </label>
                <input type="text" id="countSelected" class="form-control" disabled />
            </div>

            <div class="form-row">

                <label> Preço total:
                </label> <input type="text" id="totalValue" class="form-control" disabled />
            </div>
            <div class="form-row">

                <label> Preço por cadeira:
                </label> <input type="text" id="totalValue" class="form-control" disabled value=" R$92,27" />
            </div>

            <div class="credit-card-input no-js" id="skeuocard">
                <label for="cc_type">Bandeira</label>
                <select class="form-control" name="cc_type">
                    <option value="">...</option>
                    <option value="visa">Visa</option>
                    <option value="discover">Discover</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="maestro">Maestro</option>
                    <option value="jcb">JCB</option>
                    <option value="unionpay">China UnionPay</option>
                    <option value="amex">American Express</option>
                    <option value="dinersclubintl">Diners Club</option>
                </select>
                <label for="cc_number">Numero do Cartao</label>
                <input class="form-control" type="text" name="cc_number" id="cc_number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" size="19">
                <label for="cc_exp_month">Mes Expiracao</label>
                <input class="form-control" type="text" name="cc_exp_month" id="cc_exp_month" placeholder="00">
                <label for="cc_exp_year">Ano Expiracao</label>
                <input class="form-control" type="text" name="cc_exp_year" id="cc_exp_year" placeholder="00">
                <label for="cc_name">Nome no Cartao</label>
                <input class="form-control" type="text" name="cc_name" id="cc_name" placeholder="John Doe">
                <label for="cc_cvc">CVC</label>
                <input class="form-control" type="text" name="cc_cvc" id="cc_cvc" placeholder="123" maxlength="3" size="3">
            </div>

            <div class="form-row mt-2 float-right">
                <button class="btn btn-success" id="finishCompra"> Finalizar Compra</button>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view("footer2.php", array('js' => 'gerenciar_manutencao'))
?>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<script>
    $(document).ready(function() {
        card = new Skeuocard($("#skeuocard"));
    });
    $("#finishCompra").click(function() {
        showLoadingModal("Efetuando Compra");
        setTimeout(function() {
            closeLoadingModal();
            showSuccessModal("Parabéns", "A compra de suas passagens foi efetuada com sucesso",
                function() {
                    document.location.href = "/rpv";
                });
        }, 1200)
    })

    $(".seat input[type=checkbox]").change(function() {
        var countCheckedCheckboxes = $(".seat input[type=checkbox]").filter(':checked').length;

        $('#countSelected').val(countCheckedCheckboxes);
        $('#totalValue').val("R$" + (countCheckedCheckboxes * 92.27).toFixed(2));
    });
</script>