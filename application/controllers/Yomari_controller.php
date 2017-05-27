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

    public function index($value='2012')
	{

	$data1['only_one']= $value;

	$data= $this->ym->fun_total_added($value);
    $data1['total_added']= $data;

	$data= $this->ym->fun_total_left($value);
    $data1['total_left']= $data;

    $data= $this->ym->fun_total_at_beginning($value);
    $data1['total_at_beginning']= $data;
	
	$this->load->view('Yomari_view', $data1);  

    }

    public function add(){

        $value = $this->input->post('any_number');      
     echo "<script type='text/javascript'>; window.location.href='".site_url('Yomari_controller/index/'.$value)."'</script>";

     }
   
}
