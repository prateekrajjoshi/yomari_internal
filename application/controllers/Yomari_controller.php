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

    public function index($value='2008')
	{

	$data1['only_one']= $value;

    $data= $this->ym->fun_total_at_beginning($value);
    $data1['total_at_beginning']= $data;

	$data= $this->ym->fun_total_added($value);
    $data1['total_added']= $data;

	$data= $this->ym->fun_total_left($value);
    $data1['total_left']= $data;
	
    $this->load->view('Yomari_view',$data1);
	}   


    public function add(){

        $value = $this->input->post('any_number');      
     echo "<script type='text/javascript'>; window.location.href='".site_url('Yomari_controller/index/'.$value)."'</script>";

     }

     public function excel(){

    	
     	$value = $this->input->post('any_number'); 

    	$data= $this->ym->fun_total_at_beginning($value);
    	$data1['total_at_beginning']= $data; 

    	$data= $this->ym->fun_total_added($value);
    	$data1['total_added']= $data;

		$data= $this->ym->fun_total_left($value);
    	$data1['total_left']= $data;


    	$total_at_beginning_ind = array_values($data1['total_at_beginning']);
    	$total_added_ind = array_values($data1['total_added']);
		$total_left_ind = array_values($data1['total_left']);

	for ($i=0;$i<12;$i++)
    		{ 
       		 	for ($j=0;$j<12;$j++)
       		 	{
       		 		if($i==$j)
       		 		{
       		 		$ending_balance_ind[$i] = $total_at_beginning_ind[$i]+$total_added_ind[$i]-$total_left_ind[$i];
       		 		$attrition_ind[$i] = $total_left_ind[$i]*100/($total_at_beginning_ind[$i]+$total_added_ind[$i]);
       		  }}}


     	require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
     	require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');


     	$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("yom_temp.xls");

     	$objPHPExcel->getProperties()->setCreator("");
     	$objPHPExcel->getProperties()->setLastModifiedBy("");
     	$objPHPExcel->getProperties()->setTitle("");
     	$objPHPExcel->getProperties()->setSubject("");
     	$objPHPExcel->getProperties()->setDescription("");


     	$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1','ATTRITION HISTORY OF THE YEAR '.$value);
		$objPHPExcel->getActiveSheet()->SetCellValue('C3','Attrition Rate '.$value);


		$num1 = 6;
		$num2 = 6;
		$num3 = 6;
		$num4 = 6;
		$num5 = 6;

	
		foreach ($data1['total_at_beginning'] as $row)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$num1,$row);
			$num1++;
		} 

		foreach ($data1['total_added'] as $row)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$num2,$row);
			$num2++;
		} 

		foreach ($data1['total_left'] as $row)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$num3,$row);
			$num3++;
		} 
		for ($i=0;$i<12;$i++)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$num4,$ending_balance_ind[$i] );
			$num4++;
		} 
		for ($i=0;$i<12;$i++)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$num5,round($attrition_ind[$i],2)." %" );
			$num5++;
		} 



		$filename= "Tasks-Exported-on-".date("Y-m-d-H-i-s").' Yomari_Attrition_Rate.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle("Attrition Table");


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');



		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$writer->save('php://output');
		exit; 

    
 
 }
}