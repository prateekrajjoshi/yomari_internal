<?php

class Yomari_model extends CI_Model 
{

public function fun_total_left($value)
{
	$this->load->database();
	$query= $this->db->query("SELECT COUNT(*) as num_leaving FROM staff_personal_information WHERE YEAR(spi_date_of_leaving) =$value ");
	return ($query->row_array());
}

public function fun_total_added($value)
{
	$this->load->database();
	$query = $this->db->query("SELECT COUNT(*) as num_joined FROM staff_personal_information WHERE YEAR(spi_date_of_joining) = $value ");
	return ($query->row_array());
}


public function fun_at_beginning($value)
{
	$this->load->database();
	$query = $this->db->query("SELECT COUNT(*) as num_at_beginning FROM staff_personal_information WHERE YEAR(spi_date_of_joining) < $value ");
	return ($query->row_array());
}

public function fun_left_at_beginning($value)
{
	$this->load->database();
	$query = $this->db->query("SELECT COUNT(*) as num_left_at_beginning FROM staff_personal_information WHERE YEAR(spi_date_of_leaving) < $value AND YEAR(spi_date_of_leaving) !=0000 ");
	return ($query->row_array());
}

}