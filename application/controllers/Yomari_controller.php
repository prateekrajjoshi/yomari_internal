<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Yomari_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Yomari_model','ym');
    }

    public function index($value='0')
	{

    $data= $this->ym->getdata($value);
    $data1['result']= $data->result_array();
     $this->load->view('Yomari_view', $data1);    
    }

    public function add(){

        $value = $this->input->post('any_number');      
     echo "<script type='text/javascript'>; window.location.href='".site_url('Yomari_controller/index/'.$value)."'</script>";

     }
   
}
