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

    public function index($value='200')
	{

    $data= $this->ym->getdata($value);
    $data1['result']= $data->result_array();

     $this->load->view('Yomari_view', $data1);    
    }

    public function add(){
    	//$this->load->model('Yomari_model','ym');
        $value = $this->input->post('add-list');
       
      
     // $data= $this->Yomari_model->getdata($value);
         // $data= $this->ym->getdata();
    //$data1['result']= $data->result_array();

     //$this->load->view('Yomari_view', $data1); 
     echo "<script type='text/javascript'>alert('$value'); window.location.href='".site_url('Yomari_controller/index/'.$value)."'</script>";

     }
   
}
