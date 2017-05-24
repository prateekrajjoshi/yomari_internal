<?php

class Yomari_model extends CI_Model 
{

public function getdata($value)//$value=array())
{
	$this->load->database();
	$query = $this->db->query("SELECT spi_first_name, spi_date_of_joining, spi_date_of_leaving, spi_mobile_number FROM staff_personal_information WHERE spi_id =$value ");
	return ($query);
}
}
//public function printit($value)
//{
	//getdata()
//}

