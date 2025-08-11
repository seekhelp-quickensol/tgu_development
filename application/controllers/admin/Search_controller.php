<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Search_model');
        $this->load->library('session');  
		$this->load->database();		
    }  
    public function global_search() { 
        $this->load->view('admin/search_results');
    }
    public function get_global_search_result(){
		$keyword = $this->input->post('search_keyword');
        $results = []; 
        $tables = $this->db->list_tables(); 
		//print_r($tables);exit;
        foreach ($tables as $table) { 
            $fields = $this->db->field_data($table); 
            $this->db->from($table);
            $this->db->group_start();
            foreach ($fields as $field) {
                if (in_array($field->type, ['varchar', 'text', 'int'])) {
                    $this->db->or_like($field->name, $keyword);
                }
            }
            $this->db->group_end(); 
            $query = $this->db->get(); 
            if($query->num_rows() > 0){
                $results[$table] = $query->result_array();
            }
        }
		$this->load->view('admin/get_global_search_result', ['results' => $results, 'keyword' => $keyword]);	
	} 
}