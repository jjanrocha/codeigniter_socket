<?php
defined('BASEPATH') or exit('No direct script access allowed');

class alterar_status extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->output->set_content_type('application/json');
        $this->load->model('status');
        session_start();
    }

    public function index()
    {
        $id_agente = $_SESSION['usuario_id'];
        $novo_status_id = $this->input->post('status_id');
        $retorno = $this->status->alterar_status($id_agente, $novo_status_id);

        if ($retorno == '1') {
            $resposta['mensagem'] = 'O status foi alterado com sucesso.';
        } elseif ($retorno == '0') {
            $resposta['mensagem'] = 'O status selecionado é o mesmo que o anterior.';
        }

        echo json_encode($resposta);
    }
}
