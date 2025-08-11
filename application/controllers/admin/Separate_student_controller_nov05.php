<?php

if(!defined('BASEPATH')) exit("direct access not allowed");


class Separate_student_controller extends CI_Controller{
    
    public function __construct(){
		parent::__construct();
		$this->is_logged();
		$this->check_access();
	}
	public function is_logged(){
		if($this->session->userdata('admin_id') == ""){
			redirect('erp-access');
		}
	}
	public function check_access(){
		if($this->session->userdata('admin_id') != "1"){
			$access = $this->Setting_model->get_user_privilege_link();
			if(!in_array($this->uri->segment(1),$access)){
				$this->session->set_flashdata('message','Sorry! You dont have access to this module!');
				redirect(base_url());
			}
		}
	}

    public function addmission_form(){
        $this->form_validation->set_rules("student_name","name","required");
        if($this->form_validation->run()==FALSE){
           if(!empty($this->uri->segment(2))){
            $data['student'] = $this->Separate_student_model->get_student_addmission_data();
           }
			$data['course'] = $this->Course_model->get_all_course_stream_relation();
			$data['session'] = $this->Student_model->get_all_session();
			$data["centers"] = $this->Separate_student_model->get_all_centers();
            $this->load->view("admin/separate_student_addmission_form",$data);
        }else{
        	$document ='';
			if($_FILES['document']['name'] !=""){
				
				$config = array(
					'upload_path' 	=> "images/separate_student",
					'allowed_types' => "*",
					'encrypt_name' => TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('document')){
					$data = $this->upload->data();				
					$document = $data['file_name'];	
				}
			}else{
				$document = $this->input->post("old_document");
			}
        	$identity_file ='';
			if($_FILES['document']['name'] !=""){
				
				$config = array(
					'upload_path' 	=> "images/separate_student",
					'allowed_types' => "*",
					'encrypt_name' => TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('identity_file')){
					$data = $this->upload->data();				
					$identity_file = $data['file_name'];	
				}
			}else{
				$identity_file = $this->input->post("old_identity_file");
			}
			$multiple_document = array();
			if(isset($_FILES['other_document']) && $_FILES['other_document']['name'] != ""){
				$files = $_FILES;
				$cpt = count($_FILES['other_document']['name']);
				for($i=0; $i<$cpt; $i++){
					$_FILES['userfile']['name']= $files['other_document']['name'][$i];
					$_FILES['userfile']['type']= $files['other_document']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['other_document']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['other_document']['error'][$i];
					$_FILES['userfile']['size']= $files['other_document']['size'][$i];
					$this->load->library('upload');
					$this->upload->initialize($this->set_upload_other_documents_multiple_options());
					if(!$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
						echo $this->upload->display_errors();
					}else{
						$all_file = $this->upload->data();
						$multiple_document[] = $all_file['file_name'];	
					}	
				}
			}
			$multiple_document=implode(',',$multiple_document);
			
            $responce = $this->Separate_student_model->set_addmission_form($document,$identity_file,$multiple_document);
            if($responce){
                $this->session->set_flashdata('success','Addmission done successfully');
            }else{
                $this->session->set_flashdata('success','updation done successfully');
            }
			redirect("student_addmission_form");
        }
    }
    public function set_upload_other_documents_multiple_options() {
		$config = array();
		$config ['upload_path'] = 'images/separate_student';
		$config ['allowed_types'] = '*';
		$config ['encrypt_name'] = true;
		return $config;
	}

    public function enrolled_student_list(){
        $this->load->view("admin/enrolled_student_list");
    }

	public function manage_separate_student_result(){
		$data['subject'] = array();
		if($this->input->post('show_subject') == "Show Subject"){
			$data['subject'] = $this->Separate_student_model->get_result_subject();
			$data['course_stream'] = $this->Separate_student_model->get_result_student();
		}
		if($this->input->post('add_result') == "Add Result"){ 
			$result = $this->Separate_student_model->set_result();
			if($result){
				$this->session->set_flashdata('success','Result added successfull');
			}else{
				$this->session->set_flashdata('message','Result already created');
			} 
			redirect('manage_separate_student_result');
		}
		$this->load->view('admin/manage_admin_result',$data);
	}

	public function search_separate_student_result(){
		$data['result'] = array();
		if($this->input->post('search') == "Search"){
			$data['result'] = $this->Separate_student_model->get_search_result(); 
		}
		if($this->input->post('activate_separate_marksheet_bulk') == "Activate Marksheet"){
			$this->Separate_student_model->seprate_bulk_marksheet_activation(); 
			$this->session->set_flashdata('success','Marksheet activated successfull');
			redirect('search_separate_student_result');
		}
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('admin/separate_student_search_result',$data);
	}

	public function inactivate_results(){
		$this->Separate_student_model->inactivate_results();
		$this->session->set_flashdata('success','Result inactivated successfull');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function activate_results(){
		$this->Separate_student_model->activate_results();
		$this->session->set_flashdata('success','Result activated successfull');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function generate_marksheet(){
		$data['single_result'] = $this->Separate_student_model->get_single_result();
		$data['course_stream'] = $this->Separate_student_model->get_marksheet_student();
		// print_r($data['course_stream']);exit;
		$this->form_validation->set_rules('result_declare_date','result date','required');
		if($this->form_validation->run() === FALSE){
		    
			$this->load->view('admin/generate_separate_studentmarksheet',$data);
		}else{
			$result = $this->Separate_student_model->generate_marksheet();
			if($result == "0"){
				$this->session->set_flashdata('success','Marksheet generated successfull!');
			}else{
				$this->session->set_flashdata('success','Marksheet updated successfull!');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}


	public function update_result(){
		$data['result'] = $this->Separate_student_model->get_single_result(); 
		$this->form_validation->set_rules('comboMonth','month','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/update_separate_student_result',$data);
		}else{
			$result = $this->Separate_student_model->update_result();
			$this->session->set_flashdata('success','Result updated successfull');
			redirect('search_separate_student_result');
		}
	}

	public function delete_result(){
		$this->Separate_student_model->delete_result();
		$this->session->set_flashdata('success','Result deleted successfull');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function activate_all_separate_student_results(){
		$this->Separate_student_model->activate_all_separate_student_results();
		$this->session->set_flashdata('success','All Results activated successfull');
		redirect($_SERVER["HTTP_REFERER"]);
	}

	public function deactivate_all_separate_student_results(){
		$this->Separate_student_model->deactivate_all_separate_student_results();
		$this->session->set_flashdata('success','All Results deactivated successfull');
		redirect($_SERVER["HTTP_REFERER"]);
	}
	
	public function separate_student_generated_results(){
		$this->load->view("admin/separate_student_generated_results");
	}
	
	public function manage_separate_student_account(){
		$this->form_validation->set_rules("separate_student_id","student","required");

		if($this->form_validation->run() === FALSE){
			$data["student"] = $this->Separate_student_model->get_student_addmission_data();
			$data["account"] = $this->Separate_student_model->get_separate_student_account_details();

			if(!empty($this->uri->segment(3))){
				$data["single"] = $this->Separate_student_model->get_separate_student_fees_for_edit();
			}
			$this->load->view("admin/manage_separate_student_account",$data);
		}else{
			$res = $this->Separate_student_model->set_separate_student_account();
			if($res == "saved"){
				$this->session->set_flashdata('success','Saved successfull');
			}else{
				$this->session->set_flashdata('success','Updated successfull');
			}
			redirect("manage_separate_student_account/".$this->input->post("separate_student_id"));
		}
	}
	
	public function separate_student_re_registration(){
		$this->form_validation->set_rules("year_sem","year sem","required");

		if($this->form_validation->run() === FALSE){
			$data["student"] = $this->Separate_student_model->get_student_addmission_data();
			$this->load->view("admin/separate_student_re_registration",$data);
		}else{
			$this->Separate_student_model->separate_student_re_registration();
			$this->session->set_flashdata('success','Re registration  successfull');
			redirect("enrolled_student_list");
		}
	}
	
	
	
	public function search_marksheet(){
		$data['marksheet'] = array();
		if($this->input->post('search') == "Search"){
			$data['marksheet'] = $this->Separate_student_model->get_search_markheet(); 
			//echo "<pre>";
			//print_r($data);exit;
		}
		
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('admin/separate_student_search_marksheet',$data);
	}

	public function print_inner_marksheet(){
		$data['marksheet'] = $this->Separate_student_model->get_single_marksheet(); 
	
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('marksheet/separate_student_marksheet',$data);
	}

	public function edit_marksheet(){
		$data['marksheet'] = $this->Separate_student_model->get_single_marksheet();
		$this->form_validation->set_rules('result_declare_date','result date','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/edit_separate_student_marksheet',$data);
		}else{
			$result = $this->Separate_student_model->edit_marksheet();
			$this->session->set_flashdata('success','Marksheet updated successfull!');
			redirect('separate_student_search_marksheet');
		}
	}

	public function delete_marksheet(){
		$this->Separate_student_model->delete_marksheet();
		$this->session->set_flashdata('success','Marksheet deleted successfull!');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	public function generated_results_excel(){
		$data["all_data"] = array();
		//if(!empty($_POST)){
			$data["all_data"] = $this->Separate_student_model->generated_results_excel();
		//}
	//	echo "<pre>";
		//print_r($data);exit;
		$this->load->view("admin/generated_results_excel",$data);
	}
	
	public function generated_pre_student_results_excel(){
		$data["all_data"] = array();
		$data["all_data"] = $this->Separate_student_model->generated_pre_results_excel();
		$this->load->view("admin/generated_pre_student_results_excel",$data);
		}
	public function separate_abstract_report_list(){
		$this->load->view("admin/separate_abstract_report_list");
	}
	public function separate_progress_report_list(){
		$this->load->view("admin/separate_progress_report_list");
	}
	public function hold_separate_login(){
		$this->Separate_student_model->hold_separate_login();
		$this->session->set_flashdata('success','Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function activate_separate_login(){
		$this->Separate_student_model->activate_separate_login();
		$this->session->set_flashdata('success','Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	} 
	public function hold_separate_login_single(){
		$this->Separate_student_model->hold_separate_login_single();
		$this->session->set_flashdata('success','Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function activate_separate_login_single(){
		$this->Separate_student_model->activate_separate_login_single();
		$this->session->set_flashdata('success','Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
}
?>
