<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/2/2019
 * Time: 5:53 PM
 */

class Onibus_model_test extends TestCase
{
    public function setUp(): void

    {
        $this->resetInstance();
        $this->CI->load->model('onibus_model');
        $this->onibus = $this->CI->onibus_model;
    }

    /**
     * Recebe o UF de uma rodoviaria. Compara o tamanho da uf com o valor esperado de 2.
     */
    public function testGetPlacaOnibusIntermunicipalTest()
    {
        $data = $this->onibus->getOnibusIntermunicipal();
        if ($data) {
            for ($i = 0; $i < sizeof($data['result']); $i++) {
                $this->assertRegExp('/[a-zA-Z]{3}\-\d{4}/', $data['result'][$i]['onibus_placa']);
            }
        } else {
            $this->assertFalse($data);
        }
    }

    public function testGetChassiOnibusIntermunicipalTest()
    {
        $data = $this->onibus->getOnibusIntermunicipal();

        if ($data) {
            for ($i = 0; $i < sizeof($data['result']); $i++) {
                $this->assertEquals(17, strlen($data['result'][$i]['onibus_num_chassis']));
            }

        } else {
            $this->assertFalse($data);
        }
    }


    public function testInsertionOnibusIntermunicipalError()
    {
        $data = $this->onibus->insertOnibusIntermunicipal("ABC-2314", 2930, "29390", 2019, "x123456DZ912T45K7", 30, "Mercedez Benz",
            30, "Matheus Marques", "Documento_Veiculo_URL", true, 300, true, null, 0, 1, 1000000000);
        $this->assertFalse($data['success']);

    }

    public function testUpdateOnibusIntermunicipalError()
    {
        $data = $this->onibus->insertOnibusIntermunicipal(-1, "CBA-414", 2930, "29390", 2019, "x123456DZ912T45K7", 30, "Mercedez Benz",
            30, "Matheus Marques", "Documento_Veiculo_URL", true, 300, true, null, 0, 1, 4);
        $this->assertFalse($data['success']);
    }

    public function testGetPlacaOnibusMunicipal()
    {
        $this->markTestIncomplete();
        $data = $this->onibus->getOnibusMunicipal();
        if ($data) {
            for ($i = 0; $i < sizeof($data['result']); $i++) {
                $this->assertRegExp('/[a-zA-Z]{3}\-\d{4}/', $data['result'][$i]['onibus_placa']);
            }
        } else {
            $this->assertFalse($data);
        }
    }

    public function testInsertionOnibusMunicipalError()
    {   $this->markTestIncomplete();
        $data = $this->onibus->insertOnibusMunicipal("CBA-414", 2930, "29390", 2019, "x123456DZ912T45K7", 30, "Mercedez Benz",
            30, "LCS Marques", "Documento_Veiculo_URL", false, 300, true, null, 0, 10000000000000000000);
        $this->assertFalse($data['success']);
    }

    public function updateOnibusMunicipalError(){
        $this->markTestIncomplete();
        $data = $this->onibus->updateOnibusMunicipal(-1, "CBA-414", 2930, "29390", 2019, "x123456DZ912T45K7", 30, "Mercedez Benz",
            30, "LCS Marques", "Documento_Veiculo_URL", false, 300, true, null, 0, 10000000000000000000);
        $this->assertFalse($data['success']);

    }
}