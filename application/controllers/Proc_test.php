<?php

class Proc_test extends CI_Controller
{
	public function index()
    {
        $param = 'zzzzz';
        $command = "php ".FCPATH."index.php tools proc1 $param > /dev/null &";
        exec($command);

        echo json_encode($command);
    }
}