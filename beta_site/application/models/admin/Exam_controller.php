<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged();
		//$this->check_access();
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
	public function create_quiz(){
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			$data['test_data'] = $this->Exam_model->get_quiz_by_test_id(); 
			$data['test_title'] = $this->Exam_model->get_test_title();
			$this->load->view('admin/create_quiz',$data);
		}else{
			$this->Exam_model->set_quiz_question();
			redirect("create_quiz/".$this->uri->segment(2));
		}
	}
	public function create_tests(){
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			$data['all_tests'] = $this->Exam_model->get_all_test_titles();
			$data['single'] = $this->Exam_model->get_single_test();
			$this->load->view('admin/create_test', $data);
		}else{
			$id = $this->Exam_model->set_test_title();
			$test_url = 'create_quiz/'.$id;
			redirect($test_url);
		}
	}
	
	
	public function upload_question_via_csv(){
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			$data['test_title'] = $this->Exam_model->get_test_title();
			$this->load->view('exam/upload_question_via_csv', $data);
		}else{
			$photo ='';
			if($_FILES['userfile']['name'] !=""){
				$photo = $this->Digitalocean_model->upload_photo($filename="userfile",$path="uploads/csv/");
				/*$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "uploads/csv/",
					'allowed_types' => "csv",
					'encrypt_name' 	=> TRUE,
				);
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();
					$photo = $data['file_name'];
				}else{
					$error = array('error' => $this->upload->display_errors());
					$this->upload->display_errors();
					$this->session->set_flashdata('message','Please upload only .csv file');
					redirect($_SERVER['HTTP_REFERER']);
				}*/
			}
			$this->Exam_model->save_questions_from_csv($photo);
			redirect('create_quiz/'.$this->uri->segment(2));
		}
	}
	public function clear_exam(){
		$this->Exam_model->clear_exam();
		$this->session->set_flashdata('success','Exam cleared successfully!');
		redirect('phd_exams_student');
	}
	public function send_single_password(){
		$this->Exam_model->send_single_password();
		$this->session->set_flashdata('success','Message send successfully!');
		redirect('successfull_phd_registration');
	}
	public function add_examination(){
		$this->form_validation->set_rules('exam_name','exam name','required');
		if($this->form_validation->run() === FALSE){
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$data['single'] = $this->Exam_model->get_single_examination();
			$this->load->view('admin/add_examination',$data);
		}else{
			$result = $this->Exam_model->set_examination();
			if($result == "0"){
				$this->session->set_flashdata('success','Exam added successfully');
			}else{
				$this->session->set_flashdata('success','Exam updated successfully');
			}
			redirect('examination_list');
		}
	}
	public function manage_examination_question(){
		 
		$this->form_validation->set_rules('exam_id','details','required');
		if($this->form_validation->run() === FALSE){ 
			$data['questions'] = $this->Exam_model->get_all_exam_question();
			$data['single_question'] = $this->Exam_model->get_single_exam_question();
			$data['exam'] = $this->Exam_model->get_single_examination();
			$this->load->view('admin/manage_examination_question',$data);
		}else{ 
			if($this->input->post('upload_type') == "Form"){
				$result = $this->Exam_model->set_examination_question();
			}else{
				$store_data = array();
				error_reporting('e_all');
				$this->load->library('excel');
				if(isset($_FILES["userfile"]["name"])){
					$path = $_FILES["userfile"]["tmp_name"];
					$object = PHPExcel_IOFactory::load($path);
					foreach($object->getWorksheetIterator() as $worksheet){
						// print_r($store_data); exit;
						$highestRow = $worksheet->getHighestRow();

						$highestColumn = $worksheet->getHighestColumn();
						for($row=2; $row<=$highestRow; $row++){
							if($worksheet->getCellByColumnAndRow(1, $row)->getValue() != ''){
								$question 			= $worksheet->getCellByColumnAndRow(1,$row)->getValue();
								$option_a 			= $worksheet->getCellByColumnAndRow(2,$row)->getValue();
								$option_b 			= $worksheet->getCellByColumnAndRow(3,$row)->getValue();
								$option_c		 	= $worksheet->getCellByColumnAndRow(4,$row)->getValue();
								$option_d 			= $worksheet->getCellByColumnAndRow(5,$row)->getValue();
								$correct_answer 	= $worksheet->getCellByColumnAndRow(6,$row)->getValue();
								
								if (trim($correct_answer) == 'A') {
									$correct_answer = '1';
								}else if(trim($correct_answer) == 'B'){
									$correct_answer = '2';
								}else if(trim($correct_answer) == 'C'){
									$correct_answer = '3';
								}else if(trim($correct_answer) == 'D'){
									$correct_answer = '4';
								}

								$store_data[] = array(
									'exam_id' 			=> $this->input->post('exam_id'),
									'question' 			=> $question,
									'option_a' 			=> $option_a,
									'option_b' 			=> $option_b,
									'option_c' 			=> $option_c,
									'option_d' 			=> $option_d,
									'correct_answer' 	=> $correct_answer,
									'created_on' 		=> date("Y-m-d H:i:s"),
								);

							}
						}
					} 

					if(!empty($store_data)){
						$this->Exam_model->insert_batch_question($store_data);
						$this->session->set_flashdata('success','Subject added successfully');
					}  
				} 
			}
			$this->session->set_flashdata('success','Questions updated successfully');
			redirect('manage_examination_question/'.$this->input->post('exam_id'));
		}	
	}
	public function examination_list(){
		$this->load->view('admin/examination_list');
	}
	public function appeared_examination_list(){
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$data['exam'] = $this->Exam_model->get_appeared_exam_list();
		//echo "<pre>";print_r($data['exam']);exit;
		$this->load->view('admin/appeared_examination_list',$data);
	} 
	public function mcq_question_data(){ 
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$data['questions'] = $this->Exam_model->get_all_mcq_data_course_wise();
		$data['file_name'] = $this->Faculty_model->get_course_stream_subject_name_theoretical();
		$this->load->view('admin/mcq_question_data',$data);
	}

	public function view_assignment_question_theory(){
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$data['questions'] = $this->Exam_model->get_all_mcq_data_course_wise();
		$data['file_name'] = $this->Faculty_model->get_course_stream_subject_name_theoretical();
		$this->load->view('admin/view_assignment_question_theory', $data);
	}

	public function theoretical_question_data(){ 
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$data['questions'] = $this->Exam_model->get_all_theoretical_data_course_wise();
		$data['file_name'] = $this->Faculty_model->get_course_stream_subject_name_theoretical();
		$this->load->view('admin/theoretical_question_data',$data);
	}

	public function all_assignment_list(){ 
		$this->load->view('admin/all_assignment_list');
	}

	public function today_assignment_list(){ 
		$this->load->view('admin/today_assignment_list');
	}

	public function view_assignment_question_mcq(){ 
		$data['file_name'] = $this->Exam_model->get_file_name();
		$this->load->view('admin/view_assignment_question_mcq',$data);
	}
	public function manage_admin_result(){ 
		$data['subject'] = array();
		if($this->input->post('show_subject') == "Show Subject"){
			$data['subject'] = $this->Exam_model->get_result_subject();
			$data['course_stream'] = $this->Exam_model->get_result_student();
			$data['exam_form'] = $this->Exam_model->get_student_exam_form_status();
		}
		if($this->input->post('add_result') == "Add Result"){ 
			$result = $this->Exam_model->set_result();
			if($result){
				$this->session->set_flashdata('success','Result added successfull');
			}else{
				$this->session->set_flashdata('message','Result already created');
			} 
			redirect('manage_admin_result');
		}
		$this->load->view('admin/manage_admin_result',$data);
	}
	public function search_admin_result(){
		$data['result'] = array();
		if($this->input->post('search') == "Search"){
			$data['result'] = $this->Exam_model->get_search_result(); 
		}
		if($this->input->post('activate_separate_marksheet_bulk') == "Activate Marksheet"){
			$this->Exam_model->bulk_marksheet_activation(); 
			$this->session->set_flashdata('success','Marksheet activated successfull');
			redirect('search_admin_result');
		}
		if($this->input->post('hold_separate_marksheet_bulk') == "Hold Marksheet"){
			$this->Exam_model->bulk_marksheet_hold(); 
			$this->session->set_flashdata('success','Marksheet inactivate successfull');
			redirect('search_admin_result');
		}
		if($this->input->post('activate_result') == "Activate Results"){
			$this->Exam_model->activate_selected_result(); 
			$this->session->set_flashdata('success','Result activated successfull');
			redirect('search_admin_result');
		}
		if($this->input->post('hold_result') == "Hold Results"){
			$this->Exam_model->hold_selected_result(); 
			$this->session->set_flashdata('success','Result inativated successfull');
			redirect('search_admin_result');
		}
		if($this->input->post('delete_result') == "Delete Results"){
			$this->Exam_model->delete_selected_result(); 
			$this->session->set_flashdata('success','Result deleted successfull');
			redirect('search_admin_result');
		}
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$data['center'] = $this->Exam_model->get_active_center_list();
		$this->load->view('admin/search_result',$data);
	} 
	public function inactivate_results(){
		$this->Exam_model->inactivate_results();
		$this->session->set_flashdata('success','Result inactivated successfull');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function activate_results(){
		$this->Exam_model->activate_results();
		$this->session->set_flashdata('success','Result activated successfull');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete_result(){
		$this->Exam_model->delete_result();
		$this->session->set_flashdata('success','Result deleted successfull');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function update_result(){
		$data['result'] = $this->Exam_model->get_single_result(); 
		$this->form_validation->set_rules('comboMonth','month','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/update_result',$data);
		}else{
			$result = $this->Exam_model->update_result();
			$this->session->set_flashdata('success','Result updated successfull');
			redirect('search_admin_result');
		}
	}
	public function generate_marksheet(){
		$data['single_result'] = $this->Exam_model->get_single_result();
		$data['course_stream'] = $this->Exam_model->get_marksheet_student();
		$this->form_validation->set_rules('result_declare_date','result date','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/generate_marksheet',$data);
		}else{
			$result = $this->Exam_model->generate_marksheet();
			if($result == "0"){
				$this->session->set_flashdata('success','Marksheet generated successfull!');
			}else{
				$this->session->set_flashdata('success','Marksheet updated successfull!');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function search_marksheet(){
		$data['marksheet'] = array();
		if($this->input->post('search') == "Search"){
			$data['marksheet'] = $this->Exam_model->get_search_markheet(); 
		}
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('admin/search_marksheet',$data);
	}
	public function create_duplicate_marksheet(){
		$this->form_validation->set_rules('student_name','student name','required');
		if($this->form_validation->run() === FALSE){
			$data['student'] = $this->Exam_model->get_single_marksheet_for_duplicate();
			$this->load->view('admin/create_duplicate_marksheet',$data);
		}else{
			$document ='';
			if($_FILES['document']['name'] !=""){
				$document = $this->Digitalocean_model->upload_photo($filename="document",$path="images/duplicate_marksheet_document/");
				/*$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "uploads/csv/",
					'allowed_types' => "csv",
					'encrypt_name' 	=> TRUE,
				);
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();
					$photo = $data['file_name'];
				}else{
					$error = array('error' => $this->upload->display_errors());
					$this->upload->display_errors();
					$this->session->set_flashdata('message','Please upload only .csv file');
					redirect($_SERVER['HTTP_REFERER']);
				}*/
			}
			$this->Exam_model->set_duplicate_marksheet($document);
			$this->session->set_flashdata('success','Duplicate marksheet created successfully!');
			redirect('duplicate_marksheet');
		}
	}
	public function duplicate_marksheet(){
		$data['marksheet'] = array();
		if($this->input->post('search') == "Search"){
			$data['marksheet'] = $this->Exam_model->get_all_duplicate_marksheet();
		}
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('admin/search_marksheet_duplicate',$data);
	}
	public function delete_marksheet(){
		$this->Exam_model->delete_marksheet();
		$this->session->set_flashdata('success','Marksheet deleted successfull!');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function edit_marksheet(){
		$data['marksheet'] = $this->Exam_model->get_single_marksheet();
		$this->form_validation->set_rules('result_declare_date','result date','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/edit_marksheet',$data);
		}else{
			$result = $this->Exam_model->edit_marksheet();
			$this->session->set_flashdata('success','Marksheet updated successfull!');
			redirect('search_marksheet');
		}
	}
	public function print_inner_marksheet(){
		$data['marksheet'] = $this->Exam_model->get_single_marksheet(); 
		// echo "<pre>";
		// print_r($data);exit;
		$this->load->view('marksheet/SimpleFunctions');
		$this->load->view('marksheet/marksheet',$data);
	}
	public function print_duplicate_inner_marksheet(){
		$data['marksheet'] = $this->Exam_model->get_single_marksheet();  
		$this->load->view('marksheet/SimpleFunctions');
		$this->load->view('marksheet/duplicate_marksheet',$data);
	}
	public function examination_form_list(){
		if($this->input->post('activate_hall_ticket') == "Activate"){
			$this->Exam_model->get_bulk_hallticket_activate(); 
			$this->session->set_flashdata('success','Hallticket activated successfull!');
			redirect('examination_form_list');
		}
		$this->load->view('admin/examination_form_list');
	}
	public function examination_form_list_failed(){
		$this->load->view('admin/examination_form_list_failed');
	}
	public function inactive_hallticket(){
		$result = $this->Exam_model->inactive_hallticket();
		$this->session->set_flashdata('success','Hallticket inactivated successfull!');
		redirect('examination_form_list');
	}
	public function active_hallticket(){
		$result = $this->Exam_model->active_hallticket();
		$this->session->set_flashdata('success','Hallticket inactivated successfull!');
		redirect('examination_form_list');
	}
	public function re_appear_examination_form_list(){
		if($this->input->post('activate_hall_ticket') == "Activate"){
			$this->Exam_model->get_bulk_hallticket_activate(); 
			$this->session->set_flashdata('success','Hallticket activated successfull!');
			redirect('re_appear_examination_form_list');
		}
		$data['form'] = $this->Exam_model->get_re_appear_exam_form();
		$this->load->view('admin/re_appear_examination_form_list',$data);
	}
	public function update_re_appear_exam_payment(){
		$this->form_validation->set_rules('id','name','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Exam_model->get_re_appear_exam_form_single();
			$this->load->view('admin/update_re_appear_exam_payment',$data);
		}else{
			$this->Exam_model->update_re_appear_exam();	
			$this->session->set_flashdata('success','Details updated successfull!');
			redirect('re_appear_examination_form_list');
		}
	}
	public function inactive_re_appear_hallticket(){
		$this->Exam_model->inactive_re_appear_hallticket();
		$this->session->set_flashdata('success','Record inactivated successfull!');
		redirect('re_appear_examination_form_list');
	}
	public function active_re_appear_hallticket(){
		$this->Exam_model->active_re_appear_hallticket();
		$this->session->set_flashdata('success','Record activated successfull!');
		redirect('re_appear_examination_form_list');
	}
	public function re_appear_examination_form_list_failed(){
		$data['form'] = $this->Exam_model->get_re_appear_exam_form_failed();
		$this->load->view('admin/re_appear_examination_form_list_failed',$data);
	}
	
	public function update_exam_payment(){
		$data['single'] = $this->Exam_model->get_single_exam_payment_details();
		$data['bank'] = $this->Student_model->get_active_bank();
		$this->form_validation->set_rules('total_fees','total fees','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/update_exam_payment',$data);
		}else{
			$result = $this->Exam_model->update_exam_payment();
			$this->session->set_flashdata('success','Marksheet updated successfull!');
			redirect('examination_form_list');
		}
	}
	public function mcq_report(){
		$data['course'] = $this->Exam_model->get_mcq_repost_course();
		$this->load->view('admin/mcq_report',$data);
	}

	public function generated_results(){
		$this->load->view("admin/generated_results");
	}
	
// 	public function generated_results_excel(){
// 		$data = array();
// 		if(!empty($_POST)){
// 			$data["name"] = $this->Exam_model->generated_results_excel();
// 		}
// 		$this->load->view("admin/generated_results_excel",$data);
// 	}
	   
	public function generated_results_excel(){
		$data["all_data"] = array();
		//if(!empty($_POST)){
			$data["all_data"] = $this->Exam_model->generated_results_excel();
		//}
		$this->load->view("admin/generated_results_excel",$data);
	}
	public function generated_results_excel_pre(){
		$data["all_data"] = array();
		//if(!empty($_POST)){
			$data["all_data"] = $this->Exam_model->generated_results_excel_pre();
		//}
		$this->load->view("admin/generated_results_excel_pre",$data);
	}
	
	
	public function activate_all_results(){
		$this->Exam_model->activate_all_results();
		$this->session->set_flashdata('success','Results Activated successfull!');
		redirect("search_admin_result");
	}
	   
	public function document_verification_success(){
		$this->load->view("admin/document_verification_success");
	}
	public function document_verification_pending(){
		$this->load->view("admin/document_verification_pending");
	} 
	public function all_document_verification_detail_data(){
		$this->load->view("admin/all_document_verification_detail_data");
	}
	public function offline_document_verification_add(){
		$this->form_validation->set_rules("name","name","required");
		$data['single'] = $this->Exam_model->get_single_offline_document_verification();
		if($this->form_validation->run()===FALSE){
			$this->load->view("admin/offline_document_verification_add",$data);
		}else{
			$fileName = ""; 
			$fileName = $this->Digitalocean_model->upload_photo_multiple($filename="files",$path="uploads/document_verification/");
			$this->Exam_model->set_offline_document_verification($fileName);
			redirect("document-verification");
		}
	}
	public function offline_document_verification_list(){
		$this->load->view("admin/offline_document_verification_list");
	}
	
	
	
	public function create_subject_quiz(){
		if($this->input->post('save_single') == "save_single"){ 
			$options = [$this->input->post('option_1'),$this->input->post('option_2'),$this->input->post('option_3'),$this->input->post('option_4')];
			$text_data = array(
				"question" 		=> $this->input->post('question'),
				"selected_ans" 	=> $this->input->post('corrent_answer'),
				"options" 		=> $options,
				"img_data" 		=> '',
			);
			$data = array(
				"course_id" 	=> $this->input->post('single_course'),
				"stream_id" 	=> $this->input->post('single_stream'), 
				"question_type" => '2',
				"created_by" 	=> $this->session->userdata('admin_id'),
				"test_id" 		=> $this->input->post('exam_id'),
				"text_data" 	=> json_encode(['options' => $text_data]),
				"correct_ans" 	=> $this->input->post('corrent_answer'),
				"created_on" 	=> date("Y-m-d H:i:s"),
			);
			$this->Exam_model->insert_single_phd_questions($data);
			$this->session->set_flashdata('success','Questions added successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->form_validation->set_rules('course','course','required');
		if($this->form_validation->run() === FALSE){
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$this->load->view("admin/create_subject_quiz",$data);
		}else{
			if($this->input->post('upload') == "Upload"){
				$store_data = array();
				$stream = $this->input->post('stream');
				$exp = explode("@@@",$stream);
				$this->load->library('excel');
				if(isset($_FILES["userfile"]["name"])){
					$path = $_FILES["userfile"]["tmp_name"];
					$object = PHPExcel_IOFactory::load($path);
					foreach($object->getWorksheetIterator() as $worksheet){
						$highestRow = $worksheet->getHighestRow();
						$highestColumn = $worksheet->getHighestColumn();
						for($row=2; $row<=$highestRow; $row++){
							if($worksheet->getCellByColumnAndRow(1, $row)->getValue() != ''){
								$question 				= $worksheet->getCellByColumnAndRow(1,$row)->getValue();
								$option_1 				= $worksheet->getCellByColumnAndRow(2,$row)->getValue();
								$option_2 				= $worksheet->getCellByColumnAndRow(3,$row)->getValue();
								$option_3		 		= $worksheet->getCellByColumnAndRow(4,$row)->getValue();
								$option_4 				= $worksheet->getCellByColumnAndRow(5,$row)->getValue();
								$currect_answer 		= $worksheet->getCellByColumnAndRow(6,$row)->getValue();
								
								$options = [$option_1,$option_2,$option_3,$option_4];
								$text_data = array(
									"question" 		=> $question,
									"selected_ans" 	=> $currect_answer,
									"options" 		=> $options,
									"img_data" 		=> '',
								);
								$data[] = array(
									"course_id" 	=> $this->input->post('course'),
									"stream_id" 	=> $this->input->post('stream'),
									// "subject_id" 	=> $this->input->post('subject'),
									"question_type" => '2',
									"created_by" 	=> $this->session->userdata('admin_id'),
									"test_id" 		=> $this->uri->segment(2),
									"text_data" 	=> json_encode(['options' => $text_data]),
									"correct_ans" 	=> $currect_answer,
									"created_on" 	=> date("Y-m-d H:i:s"),
								);
							}
							//echo "<pre>";print_r($store_data);exit;
						}
					} 
					//echo "<pre>";print_r($data);exit;
					if(!empty($data)){
						$this->Exam_model->insert_batch_phd_questions($data);
						$this->session->set_flashdata('success','Questions added successfully');
					} 
				}
			}
			redirect('create_subject_quiz/'.$this->uri->segment(2));
		}
	}
	// ***************  shubham code *****************
	public function update_phd_subject_question(){
		$this->form_validation->set_rules('question','exam name','required');
		if($this->form_validation->run() === FALSE){
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$data['question'] = $this->Exam_model->get_phd_subject_question();
			$this->load->view("admin/update_phd_subject_question",$data);
		}else{
			$result = $this->Exam_model->update_phd_subject_question();
			if(!empty($result)){
				redirect('create_subject_quiz/'.$result);
				$this->session->set_flashdata('success','Question Updated successfull!');
			}else{
				$this->session->set_flashdata('message','Error In  Updated!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	public function course_work_exam(){
		$this->form_validation->set_rules('course','course name','required');
		if($this->form_validation->run() === FALSE){
			$data['course'] = $this->Exam_model->get_all_course_stream_relation();
			$data['question'] = $this->Exam_model->get_phd_subject_question();
			$data['single'] = $this->Exam_model->get_single_course_work_exam();
			$this->load->view("admin/course_work_exam",$data);
		}else{
			$result = $this->Exam_model->add_course_work_exam();
			if(!empty($result)){
				redirect($_SERVER['HTTP_REFERER']);
				$this->session->set_flashdata('success','Course Work Exam Added successfull!');
			}else{
				$this->session->set_flashdata('success','Course Work Exam Updated successfull!');
				redirect('course_work_exam');
			}
		}
	}
	public function add_course_work_exam_question(){
		$this->form_validation->set_rules('course_work_id','course work id','required');
		if($this->form_validation->run() === FALSE){
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$this->load->view("admin/add_course_work_exam_question",$data);
		}else{
			if($this->input->post('upload') == "Upload"){
				$store_data = array();
				$exp = explode("@@@",$stream);
				$this->load->library('excel');
				if(isset($_FILES["userfile"]["name"])){
					$path = $_FILES["userfile"]["tmp_name"];
					$object = PHPExcel_IOFactory::load($path);
					foreach($object->getWorksheetIterator() as $worksheet){
						$highestRow = $worksheet->getHighestRow();
						$highestColumn = $worksheet->getHighestColumn();
						for($row=2; $row<=$highestRow; $row++){
							if($worksheet->getCellByColumnAndRow(1, $row)->getValue() != ''){
								$question 				= $worksheet->getCellByColumnAndRow(1,$row)->getValue();
								$option_1 				= $worksheet->getCellByColumnAndRow(2,$row)->getValue();
								$option_2 				= $worksheet->getCellByColumnAndRow(3,$row)->getValue();
								$option_3		 		= $worksheet->getCellByColumnAndRow(4,$row)->getValue();
								$option_4 				= $worksheet->getCellByColumnAndRow(5,$row)->getValue();
								$currect_answer 		= $worksheet->getCellByColumnAndRow(6,$row)->getValue();
								
								$options = [$option_1,$option_2,$option_3,$option_4];
								$text_data = array(
									"question" 		=> $question,
									"selected_ans" 	=> $currect_answer,
									"options" 		=> $options,
									"img_data" 		=> '',
								);
								$this->db->where('is_deleted','0');
								$this->db->where('text_data',json_encode(['options' => $text_data]));
								$exist = $this->db->get('tbl_course_work_question');
								$exist = $exist->row();
								//print_r($exist);exit;
								$data[] = array(
									// "subject_id" 	=> $this->input->post('subject'),
									"course_work_data_id" => $this->uri->segment(2),
									"created_by" 	=> $this->session->userdata('admin_id'),
									"text_data" 	=> json_encode(['options' => $text_data]),
									"correct_ans" 	=> $currect_answer,
									"created_on" 	=> date("Y-m-d H:i:s"),
								);
							}
							//echo "<pre>";print_r($store_data);exit;
						}
					} 
					// echo "<pre>";print_r($data);exit;
					if(!empty($data)){
						$this->Exam_model->insert_batch_course_work_question($data);
						$this->session->set_flashdata('success','Questions added successfully');
					} 
				}
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	// public function create_tests(){
	// 	if($this->input->server('REQUEST_METHOD') == 'GET'){
	// 		$data['all_tests'] = $this->Exam_model->get_all_test_titles();
	// 		$data['single'] = $this->Exam_model->get_single_test();
	// 		$this->load->view('admin/create_test', $data);
	// 	}else{
	// 		$id = $this->Exam_model->set_test_title();
	// 		$test_url = 'create_quiz/'.$id;
	// 		redirect($test_url);
	// 	}
	// }
	public function update_course_work_question(){
		$this->form_validation->set_rules('question','question','required');
		if($this->form_validation->run() === FALSE){
			// $data['course'] = $this->Web_model->get_all_course_stream_relation();
			$data['question'] = $this->Exam_model->get_single_course_work_exam_question();
			$this->load->view("admin/update_course_work_question",$data);
		}else{
			$result = $this->Exam_model->update_course_work_question();
			if(!empty($result)){
				redirect('add_course_work_exam_question/'.$result);
				$this->session->set_flashdata('success','Question Updated successfull!');
			}else{
				$this->session->set_flashdata('message','Error In  Updated!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	public function add_single_course_question(){
		$this->form_validation->set_rules('question','question','required');
		if($this->form_validation->run() === FALSE){
			// $data['course'] = $this->Web_model->get_all_course_stream_relation();
			// $data['question'] = $this->Exam_model->get_single_course_work_exam_question();
			$this->load->view("admin/add_single_course_question");
		}else{
			$result = $this->Exam_model->add_single_course_work_question();
			if(!empty($result)){
				redirect('add_course_work_exam_question/'.$result);
				$this->session->set_flashdata('success','Question Updated successfull!');
			}else{
				$this->session->set_flashdata('message','Error In  Updated!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	public function course_work_exam_appeared_list(){
		$this->load->view('admin/course_work_exam_appeared_list');

	}
	public function course_work_answer_book(){
	    $data['exam'] = $this->Exam_model->get_course_work_answer_book_name();
		// echo "<pre>";print_r($data['exam']);exit;
	    $data['answerbook'] = array();
	    if(!empty($data['exam'])){
	        $data['answerbook'] = $this->Exam_model->get_course_work_answer_book($data['exam']->exam_id,$data['exam']->student_id);
	    }
	     
		$this->load->view('admin/course_work_answer_book',$data);

	}
	
	public function generate_course_work_result(){
		$this->form_validation->set_rules("attending_status","attending status","required");
		if($this->form_validation->run()===FALSE){
			$data['single'] = $this->Exam_model->get_single_course_data();
			$this->load->view('admin/manage_course_work_result',$data);	
		}else{
			$file1 ='';
			/*
			$config = array(
				'upload_path' 	=> "images/course",
				'allowed_types' => "*",
				'encrypt_name'	=> true,
			);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile')){
				$data = $this->upload->data();	
				$file1 = $data['file_name'];
			}else{
				$error = array('error' => $this->upload->display_errors());	
				$this->upload->display_errors();
			}*/
			if($_FILES['userfile']['name'] !=""){
				$file1 = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/course/");
			}else{
				$file1 = "";
			}
			
			$res = $this->Exam_model->set_course_work_result($file1);
			if($res == 1){
				$this->session->set_flashdata("success","data added successfully!");
			}
			else{
			      $this->session->set_flashdata('sucess','Data updated successfully!!');
			}	
			redirect ('course_work_result_list');

		}
	}
	public function update_course_work_result(){
		$this->form_validation->set_rules("attending_status","attending status","required");
		if($this->form_validation->run()===FALSE){
			$data['single'] = $this->Exam_model->get_single_course_work_result_data();
			$this->load->view('admin/update_course_work_result',$data);	
		}else{
			$file1 ='';
			/*
				$config = array(
					'upload_path' 	=> "images/course",
					'allowed_types' => "*",
					'encrypt_name'	=> true,
				);
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();	
					$file1 = $data['file_name'];
				}else{
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
				*/
		    $file1 = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/course/");
			
			$res = $this->Exam_model->update_course_work_result($file1);
			$this->session->set_flashdata('sucess','Data updated successfully!!');
			redirect ('course_work_result_list');
		}
	}
	public function course_work_result_list(){
		$this->load->view('admin/course_work_result_list'); 
	}
	public function edit_course_work_marksheet(){
		$this->form_validation->set_rules('enrollment_number','enrollment number','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Exam_model->get_single_course_work();
			$this->load->view('admin/edit_course_work_marksheet',$data); 
		}else{
			$result = $this->Exam_model->update_course_work_result_issue_date();
			$this->session->set_flashdata('success','date has been updated successfully!');
			redirect('course_work_result_list');
		}
	}
	public function print_course_work_marksheet(){
		$data['marksheet_result'] = $this->Exam_model->get_single_marksheet_result($this->uri->segment(2));
		$data['subject_details'] = $this->Exam_model->get_course_work_marksheet_details();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('admin/print_course_work_marksheet',$data);

	} 
	public function all_document_verification_detail_update(){ 
		$this->form_validation->set_rules("transaction_id","transaction id","required");
		if($this->form_validation->run()===FALSE){
			$data['single'] = $this->Exam_model->get_single_document_vefification_deatails();
			$this->load->view('admin/all_document_verification_detail_update',$data);	
		}else{ 
			$res = $this->Exam_model->update_document_verification();
			$this->session->set_flashdata('sucess','Data updated successfully!!');
			redirect ('document_verification_success');
		} 
	}
	public function document_verifynow_online(){ 
		$this->form_validation->set_rules("hidden_id","id","required");
		if($this->form_validation->run()===FALSE){
			$data['single'] = $this->Exam_model->get_single_document_vefification_deatails();
			$data['verified_documents'] = $this->Exam_model->get_verified_documents();
			$this->load->view('admin/document_verifynow_online',$data);	
		}else{ 
			$res = $this->Exam_model->set_online_verification();
			$this->session->set_flashdata('sucess','Data updated successfully!!');
			redirect($_SERVER['HTTP_REFERER']);
		} 
	}
	public function view_all_paper(){
		$this->form_validation->set_rules('course','course','required');
		if($this->form_validation->run() === FALSE){
		$data['course'] = $this->Admin_model->get_active_course();
		$data['stream'] = $this->Admin_model->get_active_stream();
		$data['subject'] = $this->Admin_model->get_active_subject();
		$data['single'] = $this->Admin_model->get_single_paper_stream_wise();
		$data['session'] = $this->Admin_model->get_active_session();
		//$data['single'] = $this->Admin_model->get_single_stream_name();
		$this->load->view('admin/view_all_paper',$data);	
	}else{
		$photo ='';
		if($_FILES['file']['name'] !=""){
			$photo = $this->Digitalocean_model->upload_photo($filename="file",$path="uploads/papers/");
			/*
			$tmp = explode('.', $_FILES['file']['name']);
			$ext = end($tmp);
			$config = array(
				'upload_path' 	=> "uploads/papers/",
				'allowed_types' => "*",
				'encrypt_name' 	=> TRUE,
			);
			$this->upload->initialize($config);
			if($this->upload->do_upload('file')){
				
				$data = $this->upload->data();
				$photo = $data['file_name'];
			}else{
				
				print_r($error = array('error' => $this->upload->display_errors()));
				$this->upload->display_errors();
				redirect($_SERVER['HTTP_REFERER']);
			}*/
		}
		
		$res = $this->Admin_model->insert_paper_data($photo);
		if($res == 0){
			$this->session->set_flashdata("success","Papers added successfully!");
		}
		else{
			  $this->session->set_flashdata('sucess', 'Papers updated successfully!!');
		}	
		redirect ('add_paper');
	}
				
	
}
public function generate_course_work_result_separate_student(){
	$this->form_validation->set_rules("attending_status","attending status","required");
	if($this->form_validation->run()===FALSE){
		$data['single'] = $this->Exam_model->get_single_course_data_Separate_student();
		$this->load->view('admin/generate_course_work_result_separate_student',$data);	
	}else{
		$file1 ='';
		/*
			$config = array(
				'upload_path' 	=> "images/course",
				'allowed_types' => "*",
				'encrypt_name'	=> true,
			);
			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile')){
				$data = $this->upload->data();	
				$file1 = $data['file_name'];
			}else{
				$error = array('error' => $this->upload->display_errors());	
				$this->upload->display_errors();
			}
			*/
		if($_FILES['userfile']['name'] !=""){
			$file1 = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/course/");
		}
		$res = $this->Exam_model->set_course_work_result_seperate_student($file1);
		if($res == 1){
			$this->session->set_flashdata("success","data added successfully!");
		}
		else{
			  $this->session->set_flashdata('sucess','Data updated successfully!!');
		}	
		redirect ('course_work_separate_student_result_list');

	}
}
	public function course_work_separate_student_result_list(){
		$this->load->view('admin/course_work_separate_student_result_list');

	}
	public function course_work_result_list_separate_student(){
		if($this->input->post('send_btn') == "send_btn"){
			$this->Exam_model->set_for_print_course_work_result(); 
			$this->session->set_flashdata('success','Marksheet successfully send for print');
			redirect('phd_course_work_approved_application_result_list');
		}
		$this->load->view('admin/course_work_result_list_separate_student');
	}
	public function edit_blended_course_work_marksheet(){
		$this->form_validation->set_rules('enrollment_number','enrollment number','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Exam_model->get_single_blended_course_work();
			$this->load->view('admin/edit_course_work_marksheet',$data); 
		}else{
			$result = $this->Exam_model->update_blended_course_work_result_issue_date();
			$this->session->set_flashdata('success','date has been updated successfully!');
			redirect('phd_course_work_approved_application_result_list');
		}
	}
	public function print_course_work_marksheet_separate_student(){
		$data['marksheet_result'] = $this->Exam_model->get_single_marksheet_result_seprate_student($this->uri->segment(2));
		$data['subject_details'] = $this->Exam_model->get_course_work_marksheet_details_separate_student();
		 $this->load->view('admin/SimpleFunctions');
		// $this->load->view('admin/print_course_work_marksheet',$data);
//$data['subject_details'] = $this->Students_model->get_course_work_marksheet_details();
		
		$this->load->view('admin/print_course_work_marksheet_separate_student',$data);
	} 
	public function admin_fill_exam_form(){
		if($this->input->post('next') == "next"){
			$this->Exam_model->get_verified_student();
		}
		$this->form_validation->set_rules("id","student","required");
		$this->form_validation->set_rules("exam_month","exam month","required");
		$this->form_validation->set_rules("exam_year","exam year","required");
		$this->form_validation->set_rules("exam_mode_type","exam mode","required");
		$this->form_validation->set_rules("year_sem","year/sem","required");
		if($this->form_validation->run()===FALSE){
		    $data['student'] = $this->Student_model->get_student_for_rr();
		    $this->load->view("admin/admin_fill_exam_form",$data);
		}else{ 
			$this->Exam_model->set_examination_form();  
			$this->session->set_flashdata('success','Examination form submitted successfull!');
			redirect('admin_fill_exam_form'); 
		}
	}
	public function admin_answer_book(){
		$this->load->view('admin/admin_answer_book');
	}
}