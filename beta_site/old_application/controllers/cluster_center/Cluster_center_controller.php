<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Cluster_center_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged(); 
	}
	public function is_logged(){
		if($this->session->userdata('cluster_center_id') == ""){
			redirect('cluster-center-access');
		}
	}
    public function center_dashboard(){
		$data['cluster_centers'] = $this->Cluster_center_model->get_all_cluster_centers();
        // echo "<pre>"; print_r($data['cluster_centers']);exit();
		$this->load->view('cluster_center/index',$data);
	}
    public function center_logout(){
		$this->session->sess_destroy();
		redirect('cluster-center-access');
	}
}