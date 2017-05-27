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

     	$objPHPExcel = new PHPExcel();

     	$objPHPExcel->getProperties()->setCreator("");
     	$objPHPExcel->getProperties()->setLastModifiedBy("");
     	$objPHPExcel->getProperties()->setTitle("");
     	$objPHPExcel->getProperties()->setSubject("");
     	$objPHPExcel->getProperties()->setDescription("");


     	$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1','Month');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1','No. of Employees at Beginning');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1','No. of Employees Joined');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1','No. of Employees Left Company');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1','Ending Balance');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1','Attrition %');

		

		$objPHPExcel->getActiveSheet()->SetCellValue('A2','January');
		$objPHPExcel->getActiveSheet()->SetCellValue('A3','February');
		$objPHPExcel->getActiveSheet()->SetCellValue('A4','March');
		$objPHPExcel->getActiveSheet()->SetCellValue('A5','April');
		$objPHPExcel->getActiveSheet()->SetCellValue('A6','May');
		$objPHPExcel->getActiveSheet()->SetCellValue('A7','June');
		$objPHPExcel->getActiveSheet()->SetCellValue('A8','July');
		$objPHPExcel->getActiveSheet()->SetCellValue('A9','August');
		$objPHPExcel->getActiveSheet()->SetCellValue('A10','September');
		$objPHPExcel->getActiveSheet()->SetCellValue('A11','October');
		$objPHPExcel->getActiveSheet()->SetCellValue('A12','November');
		$objPHPExcel->getActiveSheet()->SetCellValue('A13','December');


		$num1 = 2;
		$num2 = 2;
		$num3 = 2;
		$num4 = 2;
		$num5 = 2;

	
		foreach ($data1['total_at_beginning'] as $row)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$num1,$row);
			$num1++;
		} 

		foreach ($data1['total_added'] as $row)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$num2,$row);
			$num2++;
		} 

		foreach ($data1['total_left'] as $row)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$num3,$row);
			$num3++;
		} 
		for ($i=0;$i<12;$i++)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$num4,$ending_balance_ind[$i] );
			$num4++;
		} 
		for ($i=0;$i<12;$i++)
		{

			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$num5,round($attrition_ind[$i],2)." %" );
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