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

    $this->load->view('Yomari_view');
	}   



     public function excel(){   

		$value = $this->input->post('from_year'); 
     	$value1 = $this->input->post('to_year');
     	$noyr= $value1-$value;

     	if($noyr<=15 && $noyr>=0){

     	require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
     	require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

     	$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load("yom_temp.xls");

     	$objPHPExcel->getProperties()->setCreator("");
     	$objPHPExcel->getProperties()->setLastModifiedBy("");
     	$objPHPExcel->getProperties()->setTitle("");
     	$objPHPExcel->getProperties()->setSubject("");
     	$objPHPExcel->getProperties()->setDescription("");

     	for ($y=0; $y<=$noyr; $y++)
     	{

    	$data= $this->ym->fun_total_at_beginning($value);
    	$data1['total_at_beginning']= $data; 

    	$data= $this->ym->fun_total_added($value);
    	$data1['total_added']= $data;

		$data= $this->ym->fun_total_left($value);
    	$data1['total_left']= $data;

		
		$objPHPExcel->setActiveSheetIndex($y);
		$objPHPExcel->getActiveSheet()->setTitle('Year '.$value);

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

		$value++;
		}

		for($j=14; $j>=($noyr+1); $j--)
		{

			$objPHPExcel->removeSheetByIndex($j);

		}


		$filename= "Tasks-Exported-on-".date("Y-m-d-H-i-s").' Yomari_Attrition_Rate.xlsx';


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');



		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$writer->save('php://output');
		exit; 
	}

    else if ($noyr>15){
    echo '<script>alert("Difference in years should be less than or equals to 15 years!!");</script>';
               redirect('Yomari_controller/', 'refresh');
    }
        else if ($noyr<0){
    echo '<script>alert("Invalid Year Input!!");</script>';
               redirect('Yomari_controller/', 'refresh');
    }
 
 }
}