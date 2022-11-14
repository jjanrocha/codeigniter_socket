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

                //Handshake.
                $request = socket_read($newc, 5000);
                preg_match('#Sec-WebSocket-Key: (.*)\r\n#', $request, $matches);
                $key = base64_encode(pack(
                    'H*',
                    sha1($matches[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')
                ));
                $headers = "HTTP/1.1 101 Switching Protocols\r\n";
                $headers .= "Upgrade: websocket\r\n";
                $headers .= "Connection: Upgrade\r\n";
                $headers .= "Sec-WebSocket-Version: 13\r\n";
                $headers .= "Sec-WebSocket-Accept: $key\r\n\r\n";
                socket_write($newc, $headers, strlen($headers));

                socket_set_nonblock($newc);
                echo "Client $newc has connected\n";
                $clients[] = $newc;

                /** Teste de envio de mensagem ao client side */
                $content = 'Now: ' . time();
                $response = chr(129) . chr(strlen($content)) . $content;
                socket_write($newc, $response);
            }
        }
    }
}
