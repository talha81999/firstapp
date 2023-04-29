<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_controller
{
    public function index()
    {
        $this->load->view('api_view');

    }

    function action()
    {
        if($this->input->post('data_action'))
        {
            $data_action = $this->input->post('data_action');

            if($data_action == "fetch_all" )
            {
                $api_url = "http://localhost/crudapi/api";

                $client = curl_init($api_url);
                curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                $response  = curl_exec($client);
                $result = json_decode($response);
                $output = '';
                // print_r($response);
                // exit();

                if($result>0)
                {
                    foreach($result as $row)
                {
                    $output .='
                    <tr>
                        <td>'.$row->name.'</td>
                        <td>'.$row->email.'</td>
                        <td><butto type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
       <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
      

                    </tr>
                    ';
                }
                }
                else
                {
                    $output .='
                        <tr>
                            <td colspan="4" align="center">No Data Found</td>
                        </tr>
                    ';
                }
                echo $output;
            }
        }
    }
}

?>