<?php
class CCavenue extends CI_Controller{
	public function __construct(){
		parent::__construct(); 
	} 
	public function ccavRequestHandler(){
		$this->load->view('ccavenue/ccavRequestHandler');
	}
	public function ccavResponseHandler(){
		$this->load->view('ccavenue/ccavResponseHandler');
	}
}
