<?php

class Websockets extends CI_Controller
{
    public function index()
    {
        $address = '0.0.0.0';
        $port = 12345;

        $clients = array();
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_bind($socket, $address, $port);
        socket_listen($socket);

        while (true) {
            if (($newc = socket_accept($socket)) !== false) {
                socket_set_nonblock($newc);
                echo "Client $newc has connected\n";
                $clients[] = $newc;
            }
        }
    }
}
