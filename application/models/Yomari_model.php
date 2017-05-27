<?php

class Yomari_model extends CI_Model 
{

public function fun_total_added($value) {
	$this->load->database();

	$query = $this->db->query("
		SELECT
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 01, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 02, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 03, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 04, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 05, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 06, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 07, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 08, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 09, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 10, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 11, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)= 12, 1, 0))
		FROM staff_personal_information"); 
		
	return $query->row_array();	
}

public function fun_total_left($value)
{
	$this->load->database();
	$query = $this->db->query("
		SELECT
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 01, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 02, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 03, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 04, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 05, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 06, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 07, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 08, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 09, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 10, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 11, 1, 0)),
   	 	SUM(IF(YEAR(spi_date_of_leaving)= $value AND MONTH(spi_date_of_leaving)= 12, 1, 0))
		FROM staff_personal_information");
	
	return ($query->row_array());
}

public function fun_total_at_beginning($value)
{
	$this->load->database();
	$query = $this->db->query("
		SELECT 
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<01)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=01)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<02)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=02)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<03)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=03)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<04)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=04)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<05)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=05)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<06)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=06)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<07)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=07)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<08)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=08)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<09)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=09)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<10)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=10)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<11)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=11)OR YEAR(spi_date_of_leaving)=0000),1,0)),
		SUM(IF(((YEAR(spi_date_of_joining)= $value AND MONTH(spi_date_of_joining)<12)OR (YEAR(spi_date_of_joining)<$value))AND((YEAR(spi_date_of_leaving)>$value)OR(YEAR(spi_date_of_leaving)=$value AND MONTH(spi_date_of_leaving)>=12)OR YEAR(spi_date_of_leaving)=0000),1,0))
		FROM staff_personal_information");


	return ($query->row_array());
}




}