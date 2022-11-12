<?php

class Tools extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('procTimes');
    }

    public function proc1($param)
    {
        if (is_cli()) {
            /*
            for ($i = 0; $i <= 1000; $i++) {
                $tcpConnector = new React\Socket\TcpConnector();

                $tcpConnector->connect('127.0.0.1:5555')->then(function (React\Socket\ConnectionInterface $connection) {
                    $entryData = array(
                        'category' => 'PainelAgente',
                        'subcategory' => 'CSV',
                        'teste' => 'sillll',
                    );
                    $connection->write(json_encode($entryData));
                    $connection->end();
                });
            }
            */

            $this->procTimes->insert_csv();
        }
    }
}
