<?php


class Ocupacao_cadeira_model extends CI_Model
{



    public function getCadeirasOcupadasPorAlocacao($idAlocacao)
    {
        $result =        $this->db->get_where('ocupacaocadeira', array('ocupacaocadeira_alocacaointermunicipal' => $idAlocacao, 'ocupacaocadeira_isOcupado' => true));
        if (!$result) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->result_array();
            return $retorno;
        } else {
            $retorno['success'] = false;
            return $retorno;
        }
    }

    public function getCadeiraPorAlocacaoENumero($alocacaoId, $numeroCadeira)
    {
        $this->db->where('ocupacaocadeira_alocacaointermunicipal', $alocacaoId);
        $this->db->where('ocupacaocadeira_numero', $numeroCadeira);
        $this->db->limit(1);
        $result = $this->db->get('ocupacaocadeira');
        if (!$result) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->row_array();
            return $retorno;
        } else {
            $retorno['success'] = false;
            return $retorno;
        }
    }
    public function getOcupacoesCadeiras()
    {

        $result = $this->db->get('ocupacaocadeira');
        if (!$result) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->result_array();
            return $retorno;
        } else {
            $retorno['success'] = false;
            return $retorno;
        }
    }


    public function insertOcupacaoCadeira(
        $quantidadeCadeiras,
        $ocupacaocadeira_alocacaointermunicipal

    ) {
        $acumulador = 0;
        for ($i = 0; $i < $quantidadeCadeiras; $i++) {
            $data = array(
                'ocupacaocadeira_numero' => ++$acumulador,
                'ocupacaocadeira_isOcupado' => false,
                'ocupacaocadeira_alocacaointermunicipal' => $ocupacaocadeira_alocacaointermunicipal
            );
            $this->db->insert('ocupacaocadeira', $data);
        }
    }

    public function venderCadeiraComUsuario($id_alocacao, $num_cadeira, $precocadeira)
    {
        $this->load->model('passagens_model', 'passagens');
        $idCadeira = $this->setCadeiraOcupada($id_alocacao, $num_cadeira);
        return $this->passagens->criarPassagemComUsuario($idCadeira, $precocadeira);
    }

    public function venderCadeiraSemUsuario($id_alocacao, $num_cadeira, $precocadeira, $tipopassagem)
    {
        $this->load->model('passagens_model', 'passagens');
        $idCadeira = $this->setCadeiraOcupada($id_alocacao, $num_cadeira);
        return $this->passagens->criarPassagemSemUsuario($idCadeira, $precocadeira, $tipopassagem);
    }
    public function setCadeiraOcupada($id_alocacao, $num_cadeira)
    {

        $cadeira = $this->getCadeiraPorAlocacaoENumero($id_alocacao, $num_cadeira);
        // echo_r($cadeira);
        $idcadeira = "";
        if ($cadeira['success'] === true) {
            $idcadeira = $cadeira['result']['ocupacaocadeira_id'];
            $this->db->set('ocupacaocadeira_isOcupado', true)
                ->where('ocupacaocadeira_id', $idcadeira)
                ->update('ocupacaocadeira');
                return $idcadeira;
        } else {
            // $idcadeira = $cadeira['ocupacaocadeira_id'];
            // $this->db->clearstatcache();
            $this->db->set('ocupacaocadeira_isOcupado', true);
            $this->db->set('ocupacaocadeira_numero', $num_cadeira);
            $this->db->set('ocupacaocadeira_alocacaointermunicipal', $id_alocacao);
            $this->db->insert('ocupacaocadeira');
            $insert_id = $this->db->insert_id();

            return  $insert_id;
            // echo $this->db->get_compiled_insert('ocupacaocadeira');
            // $this->db->insert('ocupacaocadeira');
        }
    }


    // public function venderCadeira($id_usuario, $valor_compra)
    // {
    //     $pontosAdicionais = 0;
    //     for ($i =  0; $i < sizeof($id_cadeira); $i++ ){
    //         $data = array(
    //             'ocupacaocadeira_isOcupado' => true,
    //         );
    //         $this->db->update('ocupacaocadeira', $data, array('ocupacaocadeira_id' => $id_cadeira));
    //         $pontos_gerados = $this->calcularPontos($valor_compra);
    //         $this->db->select('IFNULL(MAX(`parada_id`), 0) AS `maxid`', false);
    //         $num_ticket =  sprintf('%d', $this->db->get('comprapassagem', 1)->result_array()[0]['ma x id' ] +1);
    //         $compra = array(
    //             'comprapassagem_usuario' => $id_usuario,
    //             'comprapassagem_data' => date('Y-m-d H:i:s'),
    //             'comprapassagem_pontos_gerados' => $pontos_gerados,
    //             'comprapassagem_num_ticket' => $num_ticket,
    //             'comprapassagem_cadeira' => $id_cadeira
    //         );
    //         $pontosAdicionais += $pontos_gerados;
    //         $this->db->insert('comprapassagem_cadeira', $compra);
    //     }
    //     $this->db->select('user_pontosTotais');
    //     $this->db->where('user_id', $id_usuario);
    //     $pontos = $this->db->get('usuarios');
    //     $pontosTotais = $pontos + $pontosAdicionais;
    //     $this->db->where('user_id', $id_usuario);
    //     $this->db->update('usuarios', array('user_pontosTotais' => $pontosTotais));
    // }

    private function calcularPontos($valor_compra)
    {
        return 10 * $valor_compra;
    }
}
