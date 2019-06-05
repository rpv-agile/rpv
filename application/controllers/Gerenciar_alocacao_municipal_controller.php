<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/11/2019
 * Time: 3:59 PM
 */

class Gerenciar_alocacao_municipal_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alocacao_municipal_model', 'alocacao');
        $this->load->model('onibus_model', 'onibus');
        $this->load->model('funcionarios_model', 'funcionarios');
        $this->load->model('tipo_funcionario_model', 'tipofuncionario');
        $this->load->model('trajeto_urbano_model', 'trajetourbano');
        // $this->output->enable_profiler(true);
    }

    public function index()
    {
        $data['alocacaomunicipal'] = $this->alocacao->getAlocacoes()['result'];
        $data['onibus'] = $this->onibus->getOnibusMunicipalNaoAlocado()['result'];
        $data['motoristas'] = $this->funcionarios->getFuncionariosNaoAlocados(1)['result'];
        $data['cobradores'] = $this->funcionarios->getFuncionariosNaoAlocados(2)['result'];
        $data['trajetourbano'] = $this->trajetourbano->getTrajetos();
        // echo_r( $this->alocacao->getAlocacoes()['result']);
        // echo_r($this->alocacao->getAlocacao(1)['result']);
        // $data['funcionarios'] = $this->funcionarios->getFuncionarios()['result'];
        //print_r($data['alocacoes']);
        //echo_r($data);
        $this->load->view('gerenciar_alocacao_municipal_view/tela_inicial', $data);
    }
    public function ajax_db_getAlocacoes()
    {
        echo json_encode($this->alocacao->getAlocacoes()['result']);
    }
    public function ajax_db_getAlocacaoEspecifica()
    {
        $this->form_validation->set_rules('alocacaomunicipal_id', 'ID da Locação Municipal', 'trim|required|numeric');

        if ($this->form_validation->run() !== FALSE) {
            $retorno['success'] = true;
            $retorno['data'] = $this->alocacao->getAlocacao($this->input->post('alocacaomunicipal_id'))['result'];
            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }
    public function ajax_db_insertAlocacaoMunicipal()
    {

        $this->form_validation->set_rules('motorista_id[]', '', 'trim|required');
        $this->form_validation->set_rules('motorista_appt[]', '', 'trim|required');
        $this->form_validation->set_rules('cobrador_id[]', '', 'trim|required');
        $this->form_validation->set_rules('cobrador_appt[]', '', 'trim|required');
        $this->form_validation->set_rules('onibus_id', '', 'trim|required');
        $this->form_validation->set_rules('trajetourbano_id', '', 'trim|required');
        if ($this->form_validation->run() !== false) {
            echo json_encode(array(
                "result" => true,
                "message" => "Todos dados preenchidos corretamente.",
                "post_data" => $this->input->post()
            ));
        } else {
            echo json_encode(array(
                "result" => false,
                "message" => "Algum campo não foi preenchido corretamente.",
                "post_data" => $this->input->post()
            ));
        }

        if ($this->form_validation->run() !== false) {
            $alocacaomunicipal_motorista_funcionario_id = $this->input->post('motorista_id[0]');
            $alocacaomunicipal_motorista_expediente_hora_inicio = $this->input->post('motorista_appt[0]');
            $alocacaomunicipal_motorista_expediente_hora_final = $this->input->post('motorista_appt[1]');
            $alocacaomunicipal_data_inicio = $this->input->post('04/06/2019');
            $alocacaomunicipal_data_final = $this->input->post('');
            $alocacaomunicipal_onibus_id = $this->input->post('onibus_id');
            $alocacaomunicipal_trajetourbano_id = $this->input->post('trajetourbano_id');

            $result = $this->alocacao->insertAlocacao(
                $alocacaomunicipal_data_inicio,
                $alocacaomunicipal_data_final,
                $alocacaomunicipal_onibus_id,
                $alocacaomunicipal_trajetourbano_id,

                $alocacaomunicipal_motorista_funcionario_id,
                $alocacaomunicipal_motorista_expediente_hora_inicio,
                $alocacaomunicipal_motorista_expediente_hora_final
            );
            if ($result['success']) {
                $result['message'] = successAlert('Alocação cadastrada com sucesso');
            } else {
                //$result['message'] = errorAlert('Erro ao cadastrar a alocação: ' . $result['error'] . '');
                $result['message'] = errorAlert('Erro ao cadastrar a alocação');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a alocação: Algum campo não foi preenchido corretamente');
        }

        echo json_encode($result);
    }

    public function ajax_db_updateAlocacao()
    {
        $this->form_validation->set_rules('alocacaomunicipal_id', 'ID alocacao', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_cobrador_id', 'Cobrador ID', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_dataFinal', 'Data final', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_dataInicial', 'Data inicial', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_motorista_id', 'ID motorista', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_onibus_id', 'ID onibus', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_trajetourbano_id', 'ID trajeto', 'required');

        if ($this->form_validation->run() !== false) {
            $alocacaomunicipal_id = $this->input->post('alocacaomunicipal_id');
            $alocacaomunicipal_cobrador_id = $this->input->post('alocacaomunicipal_cobrador_id');
            $alocacaomunicipal_dataFinal = $this->input->post('alocacaomunicipal_dataFinal');
            $alocacaomunicipal_dataInicial = $this->input->post('alocacaomunicipal_dataInicial');
            $alocacaomunicipal_motorista_id = $this->input->post('alocacaomunicipal_motorista_id');
            $alocacaomunicipal_onibus_id = $this->input->post('alocacaomunicipal_onibus_id');
            $alocacaomunicipal_trajetourbano_id = $this->input->post('alocacaomunicipal_trajetourbano_id');

            $result = $this->alocacao->updateAlocacao(
                $alocacaomunicipal_id,
                $alocacaomunicipal_cobrador_id,
                $alocacaomunicipal_dataFinal,
                $alocacaomunicipal_dataInicial,
                $alocacaomunicipal_motorista_id,
                $alocacaomunicipal_onibus_id,
                $alocacaomunicipal_trajetourbano_id
            );

            if ($result['success']) {
                $result['message'] = successAlert('Alocação atualizada com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao atualizar a alocação: ' . $result['error'] . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao atualizar a alocação: Algum campo não foi preenchido corretamente');
        }

        echo json_encode($result);
    }
}