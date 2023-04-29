<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data = $this->api_model->fetch_all();
        print_r($data->result_array());
        exit();
        echo json_encode($data->result_array());
    }
}

    ?>