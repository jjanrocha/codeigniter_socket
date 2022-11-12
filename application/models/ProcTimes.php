<?php

class ProcTimes extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_csv()
    {
        $row = 0;
        $total_cadastrados = 0;

        if (($handle = fopen("/var/www/html/codeigniter_socket/uploads/teste.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $quantidade_colunas = count($data);
                for ($i = 0; $i <= $quantidade_colunas; $i++) {
                    $this->db->set('proc1', $data[$i]);
                    $this->db->insert('test');
                    $total_cadastrados++;
                }
                $row++;
            }

            fclose($handle);
        }
    }
}
