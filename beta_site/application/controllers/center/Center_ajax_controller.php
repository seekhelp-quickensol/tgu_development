<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Center_ajax_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->activate = '<span class="btn btn-success btn-sm" title="Activated" data-toggle="tooltip"><i class="fa fa-check-circle"></i></span>';
		$this->deactivate = '<span class="btn btn-danger btn-sm" title="Deactivated" data-toggle="tooltip"><i class="fa fa-times-circle"></i></span>';
	}
	public function get_student_name_ajax()
	{
		$this->Center_details_model->get_student_name_ajax();
	}
	public function get_center_unique_contact_number()
	{
		$this->Center_details_model->get_center_unique_contact_number();
	}
	public function get_center_unique_email()
	{
		$this->Center_details_model->get_center_unique_email();
	}
	public function get_old_password()
	{
		$this->Center_details_model->get_old_password();
	}
	public function get_all_pending_re_registration_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_student');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_pending_re_registration_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment_number;
				// $sub_array[] = $print->center_name;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] =  $print->mother_name;
				$sub_array[] =  $print->mobile;
				$sub_array[] =  $print->email;
				$sub_array[] = $print->course_mode == 1 ? "Year" : "Sem";
				// $sub_array[] = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_print_admission_form/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Admission Form</a>
				// <a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "center__print_id/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>ID Card</a>
				// <a data-toggle='tooltip' title='Upload/View Qualifications Document' href=" . base_url() . "center_student_qualification/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Documents</a>
				// <a data-toggle='tooltip' title='Re-registration' href=" . base_url() . "center_student_reregistration/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Re-Registration</i></a>
				// <a data-toggle='tooltip' title='Account' href='javascript:void(0)' onclick='return view_fees(".$print->id.")' class='btn btn-success btn-sm'>Account</a>
				// <a data-toggle='tooltip' title='Fees' href='javascript:void(0)' onclick='return view_exam_fees(".$print->id.")' class='btn btn-success btn-sm'>Exam Fees</a>
				// ";
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_pending_re_registration_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_pending_admission_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_student');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_new_admission_pending_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->id;
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->abc_apaar_id;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->course_mode == "1") {
					$sub_array[] = "Year";
					$mode = "Year";
				} else {
					$sub_array[] = "Semester";
					$mode = "Semester";
				}
				if ($print->admission_type == "0") {
					$sub_array[] = "Regular Entry";
				} else if ($print->admission_type == "1") {
					$sub_array[] = "Lateral Entry";
				} else {
					$sub_array[] = "Credit Transfer";
				}
				$sub_array[] = $print->year_sem . " " . $mode;
				$sub_array[] = $print->pending_remark; 
				/*"
				<form method='post' action='pending_center_student_verification_remark'>
				<input type='hidden' name='id' value='" . $print->id . "'>
				<textarea name='pending_remark' placeholder='Please enter remark' value='" . $print->pending_remark . "' class='form-control'>" . $print->pending_remark . "</textarea> 
				<input type='submit' name='hold_submit' value='Save Remark'  class='btn btn-primary'>
				</form>";*/
				$sub_array[] = "<a data-toggle='tooltip' title='Upload/View Qualifications Document' href=" . base_url() . "center_student_qualification/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Document</a>
				";
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_new_admission_pending_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_active_admission_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_student');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_admission_ajax($length, $start, $search);
		// echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				
				$duration = $this->Center_details_model->get_last_year_sem_of_student($print->course_id,$print->stream_id);
				if($print->course_mode == "1"){
					if($duration->year_duration <= $print->year_sem){
						$rr_btn = "";
					}else{
						$rr_btn = "<a data-toggle='tooltip' title='Re-registration' href=" . base_url() . "center_student_reregistration/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Re-Registration</i></a>";
					}
				}else if($print->course_mode == "2"){
					if($duration->sem_duration <= $print->year_sem){
						$rr_btn = ""; 
					}else{
						$rr_btn = "<a data-toggle='tooltip' title='Re-registration' href=" . base_url() . "center_student_reregistration/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Re-Registration</i></a>";
					}
				}else{
					if($duration->month_duration <= $print->year_sem){
						$rr_btn = ""; 
					}else{
						$rr_btn = "<a data-toggle='tooltip' title='Re-registration' href=" . base_url() . "center_student_reregistration/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Re-Registration</i></a>";
					}
				}

				$sub_array[] = $zz++;
				$sub_array[] = $print->id;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = date("d-m-Y", strtotime($print->enrollment_date));
				if ($print->admission_status == "1") {
					$sub_array[] = "Active";
				} else if ($print->admission_status == "2") {
					$sub_array[] = "Cancel";
				} else if ($print->admission_status == "3") {
					$sub_array[] = "Hold";
				} else if ($print->admission_status == "4") {
					$sub_array[] = "Passout";
				} else {
					$sub_array[] = "Pending";
				}
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->abc_apaar_id;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->course_mode == "1") {
					$sub_array[] = "Year";
					$mode = "Year";
				} else if ($print->course_mode == "2") {
					$sub_array[] = "Semester";
					$mode = "Semester";
				} else if ($print->course_mode == "4") {
					$sub_array[] = "Month";
					$mode = "Month";
				}
				if ($print->admission_type == "0") {
					$sub_array[] = "Regular Entry";
				} else if ($print->admission_type == "1") {
					$sub_array[] = "Lateral Entry";
				} else {
					$sub_array[] = "Credit Transfer";
				}
				if ($print->study_mode == "1") {
					$sub_array[] = "Regular";
				} else if ($print->study_mode == "2") {
					$sub_array[] = "Online";
				} else {
					$sub_array[] = "Part-Time";
				}
				$sub_array[] = $print->year_sem . " " . $mode;
				$collaboration_undertaking = $this->Digitalocean_model->get_photo('images/student_identity_softcopy/' . $print->ohter_files);
				$undertaking = $this->Digitalocean_model->get_photo('images/permission_letter/' . $print->undertaking);
				if ($print->course_id == "23") {
							$scholar_details_button = '<a href="' . base_url() . 'center-set-scholar-details/' . $print->id . '" class="btn btn-primary btn-sm refund_btn" title="Set Scholar Details">Scholar Details</a>';
							$sub_array[] = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_print_admission_form/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Admission Form</a>
							<a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "center__print_id/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>ID Card</a>
							<a data-toggle='tooltip' title='Upload/View Qualifications Document' href=" . base_url() . "center_student_qualification/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Documents</a>
							<a data-toggle='tooltip' title='Account' href='javascript:void(0)' onclick='return view_fees(" . $print->id . ")' class='btn btn-success btn-sm'>Account</a>
							<a data-toggle='tooltip' title='View File' href='$collaboration_undertaking' target='_blank' class='btn btn-success btn-sm'>View File</a>
							" . $scholar_details_button; 
				} else {
					$scholar_details_button = '';
					if (!empty($student_print)) {
							$sub_array[] = "
							<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_print_admission_form/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Admission Form</a>
							<a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "center__print_id/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>ID Card</a>
							<a data-toggle='tooltip' title='Upload/View Qualifications Document' href=" . base_url() . "center_student_qualification/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Documents</a>
							<a data-toggle='tooltip' title='Account' href='javascript:void(0)' onclick='return view_fees(" . $print->id . ")' class='btn btn-success btn-sm'>Account</a>
							<a data-toggle='tooltip' title='Fees' href='javascript:void(0)' onclick='return view_exam_fees(" . $print->id . ")' class='btn btn-success btn-sm'>Exam Fees</a>
							<a data-toggle='tooltip' title='View File' href='$collaboration_undertaking' target='_blank' class='btn btn-success btn-sm'>View Collaboration Undertaking File</a>
							" . $scholar_details_button.$rr_btn;
						}else{
							$sub_array[] = "
							<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_print_admission_form/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Admission Form</a>
							<a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "center__print_id/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>ID Card</a>
							<a data-toggle='tooltip' title='Upload/View Qualifications Document' href=" . base_url() . "center_student_qualification/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Documents</a>
							<a data-toggle='tooltip' title='Account' href='javascript:void(0)' onclick='return view_fees(" . $print->id . ")' class='btn btn-success btn-sm'>Account</a>
							<a data-toggle='tooltip' title='Fees' href='javascript:void(0)' onclick='return view_exam_fees(" . $print->id . ")' class='btn btn-success btn-sm'>Exam Fees</a>
							<a data-toggle='tooltip' title='View File' href='$collaboration_undertaking' target='_blank' class='btn btn-success btn-sm'>View Collaboration Undertaking File</a>
							" . $scholar_details_button.$rr_btn;
						}  
						 
				} 
				$bonafide_old = $this->Center_details_model->get_old_bonafide($print->id);
				if (!empty($bonafide_old)) {
					if ($bonafide_old->payment_status == '1') {
						if ($bonafide_old->approve_status == '1') {
							$html = "<a data-toggle='tooltip' target='_blank' title='Print' href=" . base_url() . "print_student_bonafide/" . base64_encode($bonafide_old->id) . " class='btn btn-info btn-sm'>Bonafide Certificate - Print</a>";
						} elseif ($bonafide_old->approve_status == '2') {
							$html = "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>Bonafide Certificate - Rejected</a>";
						} elseif ($bonafide_old->approve_status == '0') {
							$html = "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>Bonafide Certificate - In Process</a>";
						}
					} else {
						$html = "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_bonafide/" . ($print->id) . " class='btn btn-danger btn-sm'>Bonafide Certificate - Payment Pending</a>";
					}
				} else {
					$html = "<a data-toggle='tooltip' title='Bonafide Certificate' href=" . base_url() . "apply_student_bonafide/" . ($print->id) . " class='btn btn-success btn-sm'> Apply Bonafide Certificate</a>";
				}
				$reccom_old = $this->Center_details_model->get_old_reccom($print->id);
				if (!empty($reccom_old)) {
					if ($reccom_old->payment_status == '1') {
						if ($reccom_old->approve_status == '1') {
							$html .= "<a data-toggle='tooltip' target='_blank' title='Print' href=" . base_url() . "print_student_recomm/" . base64_encode($reccom_old->id) . " class='btn btn-info btn-sm'>Letter Of Recommendation - Print</a>";
						} elseif ($reccom_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>Letter Of Recommendation - Rejected</a>";
						} elseif ($reccom_old->approve_status == '0') {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>Letter Of Recommendation - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_recomm/" . ($print->id) . " class='btn btn-danger btn-sm'>Letter Of Recommendation - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='Letter Of Recommendation' href=" . base_url() . "apply_student_recomm/" . ($print->id) . " class='btn btn-success btn-sm'> Apply Letter Of Recommendation</a>";
				}
				$second_reccom_old = $this->Center_details_model->get_old_reccom_second_letter($print->id);
				if (!empty($second_reccom_old)) {
					if ($second_reccom_old->payment_status == '1') {
						if ($second_reccom_old->approve_status == '1') {
							$html .= "<a data-toggle='tooltip' target='_blank' title='Print' href=" . base_url() . "print_student_recomm_second/" . base64_encode($second_reccom_old->id) . " class='btn btn-info btn-sm'>Letter Of Recommendation II - Print</a>";
						} elseif ($second_reccom_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>Letter Of Recommendation II - Rejected</a>";
						} elseif ($second_reccom_old->approve_status == '0') {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>Letter Of Recommendation II - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_recomm_second/" . ($print->id) . " class='btn btn-danger btn-sm'>Letter Of Recommendation II - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='Letter Of Recommendation II' href=" . base_url() . "apply_student_recomm_second/" . ($print->id) . " class='btn btn-success btn-sm'> Apply Letter Of Recommendation II</a>";
				}
				$med_inst_old = $this->Center_details_model->get_old_med_inst($print->id);
				if (!empty($med_inst_old)) {
					if ($med_inst_old->payment_status == '1') {
						if ($med_inst_old->approve_status == '1') {
							$html .= "<a target='_blank' data-toggle='tooltip' title='Print' href=" . base_url() . "print_student_med_inst/" . base64_encode($med_inst_old->id) . " class='btn btn-info btn-sm'>Medium of Instruction - Print</a>";
						} elseif ($med_inst_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>Medium of Instruction - Rejected</a>";
						} else {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>Medium of Instruction - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_medium_inst/" . ($print->id) . " class='btn btn-danger btn-sm'>Medium of Instruction - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='Medium of Instruction' href=" . base_url() . "apply_student_medium_inst/" . ($print->id) . " class='btn btn-success btn-sm'>Apply Medium of Instruction</a>";
				}
				$html .= "<br>";
				$no_backlog_old = $this->Center_details_model->get_old_no_backlog($print->id);
				if (!empty($no_backlog_old)) {
					if ($no_backlog_old->payment_status == '1') {
						if ($no_backlog_old->approve_status == '1') {
							$html .= "<a target='_blank' data-toggle='tooltip' title='Print' href=" . base_url() . "print_student_no_backlog/" . base64_encode($no_backlog_old->id) . " class='btn btn-info btn-sm'>No Backlog Summary - Print</a>";
						} elseif ($no_backlog_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>No Backlog Summary - Rejected</a>";
						} else {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>No Backlog Summary - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_no_backlog/" . ($print->id) . " class='btn btn-danger btn-sm'>No Backlog Summary - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='No Backlog Summary' href=" . base_url() . "apply_student_no_backlog/" . ($print->id) . " class='btn btn-success btn-sm'>Apply No Backlog Summary</i></a>";
				}
				$no_split_old = $this->Center_details_model->get_old_no_split($print->id);
				if (!empty($no_split_old)) {
					if ($no_split_old->payment_status == '1') {
						if ($no_split_old->approve_status == '1') {
							$html .= "<a target='_blank' data-toggle='tooltip' title='Print' href=" . base_url() . "print_student_no_split/" . base64_encode($no_split_old->id) . " class='btn btn-info btn-sm'>No Split Issue Letter - Print</a>";
						} elseif ($no_split_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>No Split Issue Letter - Rejected</a>";
						} else {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>No Split Issue Letter - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_no_split/" . ($print->id) . " class='btn btn-danger btn-sm'>No Split Issue Letter - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='No Split Issue' href=" . base_url() . "apply_student_no_split/" . ($print->id) . " class='btn btn-success btn-sm'> Apply No Split Issue Letter</i></a>";
				}
				$migration_old = $this->Center_details_model->get_old_migration($print->id);
				// echo "<pre>";print_r($migration_old);exit;
				if (!empty($migration_old)) {
					if ($migration_old->payment_status == '1') {
						if ($migration_old->approve_status == '1') {
							$html .= "<a target='_blank' data-toggle='tooltip' title='Print' href=" . base_url() . "print_student_migration/" . base64_encode($migration_old->id) . " class='btn btn-info btn-sm class-migration'>Migration - Print</a>";
						} elseif ($migration_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm class-migration'>Migration - Rejected</a>";
						} else {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm class-migration'>Migration - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_migration/" . ($print->id) . " class='btn btn-danger btn-sm class-migration'>Migration - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='Migration' href=" . base_url() . "apply_student_migration/" . ($print->id) . " class='btn btn-success btn-sm class-migration'>Apply Migration</i></a>";
				}
				$provisional_old = $this->Center_details_model->get_old_provisional($print->id);
				if (!empty($provisional_old)) {
					if ($provisional_old->payment_status == '1') {
						if ($provisional_old->approve_status == '1') {
							$html .= "<a target='_blank' data-toggle='tooltip' title='Print' href=" . base_url() . "print_student_provisional_degree/" . base64_encode($provisional_old->id) . " class='btn btn-info btn-sm'>Provisional Degree - Print</a>";
						} elseif ($provisional_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>Provisional Degree - Rejected</a>";
						} else {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>Provisional Degree - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_provisional_degree/" . ($print->id) . " class='btn btn-danger btn-sm'>Provisional Degree - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='Provisional Degree' href=" . base_url() . "apply_student_provisional_degree/" . ($print->id) . " class='btn btn-success btn-sm'>Apply Provisional Degree</i></a>";
				}
				$transfer_old = $this->Center_details_model->get_old_transfer($print->id);
				if (!empty($transfer_old)) {
					if ($transfer_old->payment_status == '1') {
						if ($transfer_old->approve_status == '1') {
							$html .= "<a target='_blank' data-toggle='tooltip' title='Print' href=" . base_url() . "print_student_transfer_certificate/" . base64_encode($transfer_old->id) . " class='btn btn-info btn-sm'>Transfer Certificate - Print</a>";
						} elseif ($transfer_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>Transfer Certificate - Rejected</a>";
						} else {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>Transfer Certificate - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_transfer_certificate/" . ($print->id) . " class='btn btn-danger btn-sm'>Transfer Certificate - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='Transfer Certificate' href=" . base_url() . "apply_student_transfer_certificate/" . ($print->id) . " class='btn btn-success btn-sm'>Apply Transfer Certificate</i></a>";
				}
				$character_old = $this->Center_details_model->get_old_character($print->id);
				if (!empty($character_old)) {
					if ($character_old->payment_status == '1') {
						if ($character_old->approve_status == '1') {
							$html .= "<a target='_blank' data-toggle='tooltip' title='Print' href=" . base_url() . "print_student_character_certificate/" . base64_encode($character_old->id) . " class='btn btn-info btn-sm'>Character Certificate - Print</a>";
						} elseif ($character_old->approve_status == '2') {
							$html .= "<a data-toggle='tooltip' title='Application Rejected' class='btn btn-danger btn-sm'>Character Certificate - Rejected</a>";
						} else {
							$html .= "<a data-toggle='tooltip' title='Application In Process' class='btn btn-warning btn-sm'>Character Certificate - In Process</a>";
						}
					} else {
						$html .= "<a data-toggle='tooltip' title='Retry Payment' href=" . base_url() . "pay_student_character_certificate/" . ($print->id) . " class='btn btn-danger btn-sm'>Character Certificate - Payment Pending</a>";
					}
				} else {
					$html .= "<a data-toggle='tooltip' title='Character Certificate' href=" . base_url() . "apply_student_character_certificate/" . ($print->id) . " class='btn btn-success btn-sm'>Apply Character Certificate</i></a>";
				}
				if ($print->course_id == "23") {
					$sub_array[] = "";
				} else {
					$sub_array[] = $html;
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_admission_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_payment_failed_admission_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_student');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_payment_failed_admission_list_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$this->db->where('is_deleted', '0');
        		$this->db->where('status', '1');
        		$this->db->where('session_id', $print->session_id);
        		$this->db->where('center_id',$this->session->userdata('center_id'));
        		$center_mode = $this->db->get('tbl_center_active_session');
        		$center_mode = $center_mode->row(); 
				$pay_button = "";
				if(!empty($center_mode)){
					if($center_mode->course_mode == "7"){  
						if ($print->course_mode == "1") {
							 $pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						} else if ($print->course_mode == "2") {
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						} else if ($print->course_mode == "4") {
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						} else if ($print->course_mode == "3") {
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						} 
					}else if($print->course_mode == "1"){
						if ($print->course_mode == "1") {
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						}
					}else if($print->course_mode == "2"){
						if ($print->course_mode == "1") {
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						} 
					}else if($center_mode->course_mode == "3"){
						if ($print->course_mode == "3") {
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						}else if($print->course_mode == "1"){
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						}else if($print->course_mode == "2"){
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						}
					}else if($center_mode->course_mode == "4"){
						$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
					}else if($center_mode->course_mode == "5"){
						if($print->course_mode == "1"){
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						}else if($print->course_mode == "4"){
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						}
					}else if($center_mode->course_mode == "6"){
						if($print->course_mode == "2"){
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						}else if($print->course_mode == "4"){
							$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
						}
					} 
				}else{
					$pay_button = "";
				}
				if($this->session->userdata('center_id') == "31"){
					$pay_button = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "center_admission_payment/" . base64_encode($print->id) . "/" . base64_encode($print->fees_id) . " target='_blank' class='btn btn-success btn-sm'>Pay Now</a>";
				}
				$sub_array[] = $pay_button."
				<a data-toggle='tooltip' title='Upload/View Qualifications Document' href=" . base_url() . "center_student_qualification/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Documents</a>
				
				";
				$sub_array[] = $print->id;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->abc_apaar_id;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->course_mode == "1") {
					$sub_array[] = "Year";
					$mode = "Year";
				} else if ($print->course_mode == "2") {
					$sub_array[] = "Semester";
					$mode = "Semester";
				} else if ($print->course_mode == "4") {
					$sub_array[] = "Month";
					$mode = "Month";
				}
				if ($print->admission_type == "0") {
					$sub_array[] = "Regular Entry";
				} else if ($print->admission_type == "1") {
					$sub_array[] = "Lateral Entry";
				} else {
					$sub_array[] = "Credit Transfer";
				}
				if ($print->study_mode == "1") {
					$sub_array[] = "Regular";
				} else if ($print->study_mode == "2") {
					$sub_array[] = "Online";
				} else {
					$sub_array[] = "Part-Time";
				}
				$sub_array[] = $print->year_sem . " " . $mode;
				$sub_array[] = $print->pending_remark;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_payment_failed_admission_list_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_passout_admission_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_student');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_passout_admission_list_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->id;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->course_mode == "1") {
					$sub_array[] = "Year";
					$mode = "Year";
				} else if ($print->course_mode == "2") {
					$sub_array[] = "Semester";
					$mode = "Semester";
				} else if ($print->course_mode == "4") {
					$sub_array[] = "Month";
					$mode = "Month";
				}
				if ($print->admission_type == "0") {
					$sub_array[] = "Regular Entry";
				} else if ($print->admission_type == "1") {
					$sub_array[] = "Lateral Entry";
				} else {
					$sub_array[] = "Credit Transfer";
				}
				if ($print->study_mode == "1") {
					$sub_array[] = "Regular";
				} else if ($print->study_mode == "2") {
					$sub_array[] = "Online";
				} else {
					$sub_array[] = "Part-Time";
				}
				$sub_array[] = $print->year_sem . " " . $mode;
				$sub_array[] = "
				<a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "center__print_id/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>ID Card</a>
				<a data-toggle='tooltip' title='Upload/View Qualifications Document' href=" . base_url() . "center_student_qualification/" . base64_encode($print->id) . " target='_blank' class='btn btn-success btn-sm'>Documents</a>
				";
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_passout_admission_list_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_course_stream_fees()
	{
		$this->Center_details_model->get_course_stream_fees();
	}
	public function get_all_added_subject()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_subject');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_added_subject($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->subject_code;
				$sub_array[] = $print->subject_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->subject_type == "1") {
					$sub_array[] = "Practical";
				} else {
					$sub_array[] = "Theory";
				}
				if ($print->mode == "1") {
					$sub_array[] = "Year";
					$mode = "Year";
				} else if ($print->mode == "2") {
					$sub_array[] = "Semester";
					$mode = "Semester";
				} else {
					$sub_array[] = "Month";
					$mode = "Month";
				}
				$sub_array[] = $print->year_sem;
				if ($print->status == "1") {
					$sub_array[] = "Approved";
				} else {
					$sub_array[] = "Pending";
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_added_subject_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_course_stream_ajax()
	{
		$this->Center_details_model->get_course_stream_ajax();
	}
	public function get_active_hall_ticket_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_subject');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_active_hall_ticket_list($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = date("d-m-Y", strtotime($print->date_of_birth));
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->exam_type == "0") {
					$sub_array[] = "Main Exam";
				} else {
					$sub_array[] = "Re-Exam";
				}
				$sub_array[] = "<a data-toggle='tooltip' title='Download Hall Ticket' href=" . base_url() . "hallticket/" . $print->enrollment_number . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_active_hall_ticket_list_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_consolidate_center_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$document = $this->Center_details_model->get_consolidate_center_list($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				if ($print->issue_status == "1") {
					$issue = "Issued";
				} else {
					$issue = "Pending";
				}
				if ($print->payment_status == "1") {
					$payment = "Success";
				} else {
					$payment = "Failed";
				}
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment;
				$sub_array[] = $print->student_name;
				$sub_array[] = $issue;
				$sub_array[] = $payment;
				$sub_array[] = $print->payment_id;
				$sub_array[] = date("d/m/Y", strtotime($print->created_on));
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$print_btn = '';
				$edit  = '';
				if ($print->issue_status == 1) {
					$print_btn = "<a type='button' title='Marksheet Print' data-toggle='tooltip' href=" . base_url() . "consolidate-marksheet-print-center/" . base64_encode($print->id) . "  class='btn btn-success btn-sm'><i class='mdi mdi-printer'></i></a>";
				}
				//	if($print->issue_status == 0){
				$edit = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit-consolidate-marksheet-center/" . $print->id . "  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				//	}
				$sub_array[] = $print_btn . $edit;
				if ($print->status == "1") {
					$sub_array[] = " ";
					/*<a type='button' title='Marksheet Print' data-toggle='tooltip' href=" . base_url() . "consolidate-marksheet-print-center/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-printer'></i></a>
								<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit-consolidate-marksheet-center/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";*/
				} else {
					$sub_array[] = "";
					/*<a type='button' title='Marksheet Print' data-toggle='tooltip' href=" . base_url() . "consolidate-marksheet-print-center/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-printer'></i></a>
								<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit-consolidate-marksheet-center/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";*/
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_consolidate_center_list_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_answer_book_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_student');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_answer_book_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->subject_name;
				// $sub_array[] = $print->course_mode; 
				if ($print->course_mode == "1") {
					$sub_array[] = "Year";
				} else if ($print->course_mode == "2") {
					$sub_array[] = "Semester";
				} else if ($print->course_mode == "3") {
					$sub_array[] = "Year/Semester";
				} else {
					$sub_array[] = "Month";
				}
				$sub_array[] = $print->year_sem;
				if ($print->file_name != "") {
					$files = $this->Digitalocean_model->get_photo('images/answer_sheet/' . $print->file_name);
					$sub_array[] = "<a href=" . $files . " class='btn btn-primary'>View Sheet</a>";
				} else {
					$sub_array[] = "Not Uploaded";
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_answer_book_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_applied_degree()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_student');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_applied_degree($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = date("d-m-Y", strtotime($print->created_date));
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_applied_degree_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_student_fees_ajax()
	{
		$this->Center_details_model->get_student_fees_ajax();
	}
	public function get_unique_answer_book_relation()
	{
		$this->Center_details_model->get_unique_answer_book_relation();
	}
	public function get_all_filled_exam_form_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_student');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_filled_exam_form_list_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
			    $exam_payment = $this->Center_details_model->get_exam_form_fees($print->id);
			    
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = "<a href=".base_url()."center_make_exam_payment/".base64_encode($exam_payment->id)."/".base64_encode($exam_payment->student_id)." class='btn btn-info'>Pay Now</a>";  
									
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				// $sub_array[] = $print->mobile_number;
				// $sub_array[] = $print->email_id;
				$sub_array[] = $print->session_name;
				// $sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				// $sub_array[] = $print->exam_month." ".$print->exam_year;
				$sub_array[] = $print->year_sem;
				if ($print->exam_type == '0') {
					$sub_array[] = 'Main Exam';
				} else {
					$sub_array[] = 'Re-Exam';
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_filled_exam_form_list_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_guide_application()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_guide_application');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_new_guide_list($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->registration_number;
				$sub_array[] = $print->reference;
				$sub_array[] = $print->name;
				$sub_array[] = date("d/m/Y", strtotime($print->date_of_birth));
				$sub_array[] = date("d/m/Y", strtotime($print->created_on));
				$sub_array[] = $print->phone_number;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->gender;
				$sub_array[] = $print->address;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->pincode;
				$sub_array[] = $print->specilisation;
				$sub_array[] = $print->remark;
				$sub_array[] = $print->designation;
				$sub_array[] = $print->research_area;
				$sub_array[] = $print->employement_type;
				$sub_array[] = $print->work_experience;
				$sub_array[] = $print->present_working;
				$photo = $this->Digitalocean_model->get_photo('images/guide_pic/' . $print->photo);
				$sub_array[] = "<img src='" . $photo . "' height='100' width='100'> ";
				if ($print->status == "1") {
					$sub_array[] = "<a data-toggle='tooltip' title='Documents' href=" . base_url() . "center_guide_documents/" . $print->id . " class='btn btn-success btn-sm guide_document'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "guide_application_update/" . $print->id . "  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to approve this record?')\"' type='button' title='Approve Now' data-toggle='tooltip' href=" . base_url() . "center_approve_guide_application/" . $print->id . "  class='btn btn-success btn-sm approve_guide'>Approve Now</a>
									";
				} else {
					$sub_array[] = "<a data-toggle='tooltip' title='Documents' href=" . base_url() . "center_guide_documents/" . $print->id . " class='btn btn-success btn-sm guide_document'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "guide_application_update/" . $print->id . "  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to approve this record?')\"' type='button' title='Approve Now' data-toggle='tooltip' href=" . base_url() . "center_approve_guide_application/" . $print->id . "  class='btn btn-success btn-sm approve_guide'>Approve Now</a>
									";
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_new_guide_list_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_approve_guide_application()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_guide_application');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Research_model->get_all_approve_guide_application($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->registration_number;
				$sub_array[] = $print->reference;
				$sub_array[] = $print->name;
				$sub_array[] = date("d/m/Y", strtotime($print->date_of_birth));
				$sub_array[] = date("d/m/Y", strtotime($print->created_on));
				$sub_array[] = $print->phone_number;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->password;
				$sub_array[] = $print->gender;
				$sub_array[] = $print->address;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->pincode;
				$sub_array[] = $print->specilisation;
				$sub_array[] = $print->remark;
				$sub_array[] = $print->designation;
				$sub_array[] = $print->research_area;
				$sub_array[] = $print->employement_type;
				$sub_array[] = $print->work_experience;
				$sub_array[] = $print->present_working;
				$files = $this->Digitalocean_model->get_photo('images/guide_pic/' . $print->photo);
				$sub_array[] = "<img src='" . $files . "' height='100' width='100'> ";
				if ($print->aadhar_card != "") {
					$aadhar_files = $this->Digitalocean_model->get_photo('images/guide_pic/guide_document/' . $print->aadhar_card);
				} else {
					$aadhar_files = "Not Uploaded";
				}
				$sub_array[] = "<a class='btn btn-primary' title='View Aadharcard' href='" . $aadhar_files . "'><i class='mdi mdi mdi-eye'></i></a>";
				if ($print->biodata != "") {
					$biodata_files = $this->Digitalocean_model->get_photo('images/guide_pic/guide_document/' . $print->biodata);
				} else {
					$biodata_files = "Not Uploaded";
				}
				$sub_array[] = "<a class='btn btn-primary' title='View Biodata' href='" . $biodata_files . "'><i class='mdi mdi mdi-eye'></i></a>";
				if ($print->status == "1") {
					$sub_array[] = "<a data-toggle='tooltip' title='Documents' href=" . base_url() . "center_guide_documents/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "center_guide_application_update/" . $print->id . "  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='View Appointment Letter' data-toggle='tooltip' href=" . base_url() . "center_view_supervisors_appointment_letter/" . $print->id . "  class='btn btn-success btn-sm'><i class='mdi mdi-certificate'></i></a>
									";
				} else {
					$sub_array[] = "<a data-toggle='tooltip' title='Documents' href=" . base_url() . "center_guide_documents/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "center_guide_application_update/" . $print->id . "  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='View Appointment Letter' data-toggle='tooltip' href=" . base_url() . "center_view_supervisors_appointment_letter/" . $print->id . "  class='btn btn-success btn-sm'><i class='mdi mdi-certificate'></i></a>
									";
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Research_model->get_all_approve_guide_application_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_my_recharge_history()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_guide_application');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_my_recharge_history($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d/m/Y", strtotime($print->payment_date));
				$sub_array[] = $print->transaction_id;
				if ($print->payment_status == "1") {
					$sub_array[] = "Success";
				} else {
					$sub_array[] = "Failed";
				}
				$sub_array[] = $print->amount;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_my_recharge_history_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_self_assessment_pending_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_self_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_self_assessment_pending_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				if ($print->study_mode == '0') {
					$sub_array[] = "Assisted Self Study";
				} else if ($print->study_mode == '1') {
					$sub_array[] = "Blended Learning";
				} else {
					$sub_array[] = "Conventional Classroom Learning";
				}
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				// $sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_self_Assessment_form/".$print->id."  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>
				// 					<a onclick=\"return confirm('Are you sure, you want to approve this record?')\"' type='button' title='Approve Now' data-toggle='tooltip' href=" . base_url() . "center_approve_self_assessment/".$print->id."  class='btn btn-success btn-sm approve_guide'>Approve</a>
				// 				";
				// $sub_array[] = "
				// 	<form method='post' action='center_self_reject_remark'>
				// 	<input type='hidden' name='id' value='" . $print->id . "'>
				// 	<textarea name='reject_remark' placeholder='Please enter reject remark' value='" . $print->reject_remark . "' class='form-control'>" . $print->reject_remark . "</textarea> 
				// 	<input type='submit' name='hold_submit' value='Save Remark'  class='btn btn-primary'>
				// 	</form>";
				$self_Details_table = '
				<button type="button" onclick="showselfTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#selfNoteModal" class="btn btn-primary">
					View
				</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_self_assessment_pending_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_self_assessment_rejected_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_self_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_self_assessment_rejected_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				if ($print->study_mode == '0') {
					$sub_array[] = "Assisted Self Study";
				} else if ($print->study_mode == '1') {
					$sub_array[] = "Blended Learning";
				} else {
					$sub_array[] = "Conventional Classroom Learning";
				}
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				$sub_array[] = $print->reject_remark;
				$sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_self_Assessment_form/" . $print->id . "  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>";
				$self_Details_table = '
				<button type="button" onclick="showselfTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#selfNoteModal" class="btn btn-primary">
					View
				</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_self_assessment_rejected_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_self_assessment_approved_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_self_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_self_assessment_approved_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				if ($print->study_mode == '0') {
					$sub_array[] = "Assisted Self Study";
				} else if ($print->study_mode == '1') {
					$sub_array[] = "Blended Learning";
				} else {
					$sub_array[] = "Conventional Classroom Learning";
				}
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				$self_Details_table = '
				<button type="button" onclick="showselfTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#selfNoteModal" class="btn btn-primary">
					View
				</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_self_assessment_approved_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	//teacher
	public function get_teacher_assessment_pending_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_teacher_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_teacher_assessment_pending_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->assessor_name;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->assessor_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				// $sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_teacher_Assessment_form/".$print->id."  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>
				// 					<a onclick=\"return confirm('Are you sure, you want to approve this record?')\"' type='button' title='Approve Now' data-toggle='tooltip' href=" . base_url() . "center_approve_teacher_assessment/".$print->id."  class='btn btn-success btn-sm approve_guide'>Approve</a>
				// 				";
				// $sub_array[] = "
				// 	<form method='post' action='center_teacher_reject_remark'>
				// 	<input type='hidden' name='id' value='" . $print->id . "'>
				// 	<textarea name='reject_remark' placeholder='Please enter reject remark' value='" . $print->reject_remark . "' class='form-control'>" . $print->reject_remark . "</textarea> 
				// 	<input type='submit' name='hold_submit' value='Save Remark'  class='btn btn-primary'>
				// 	</form>";
				$self_Details_table = '
				<button type="button" onclick="showteacherTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#teacherNoteModal" class="btn btn-primary">
					View
				</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_teacher_assessment_pending_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_teacher_assessment_rejected_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_teacher_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_teacher_assessment_rejected_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->assessor_name;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->assessor_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				$sub_array[] = $print->reject_remark;
				$sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_teacher_Assessment_form/" . $print->id . "  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>";
				$self_Details_table = '
				<button type="button" onclick="showteacherTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#teacherNoteModal" class="btn btn-primary">
					View
				</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_teacher_assessment_rejected_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_teacher_assessment_approved_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_teacher_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_teacher_assessment_approved_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->assessor_name;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->assessor_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				$self_Details_table = '
				<button type="button" onclick="showteacherTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#teacherNoteModal" class="btn btn-primary">
					View
				</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_teacher_assessment_approved_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	//industry
	public function get_industry_assessment_pending_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_industry_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_industry_assessment_pending_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->course_mode == '0') {
					$sub_array[] = "Year";
				} else if ($print->course_mode == '1') {
					$sub_array[] = "Sem";
				} else if ($print->course_mode == '2') {
					$sub_array[] = "Both";
				} else {
					$sub_array[] = "Month";
				}
				$sub_array[] = $print->designation;
				$sub_array[] = $print->company_name;
				$sub_array[] = $print->contact_no;
				$sub_array[] = $print->email;
				$sub_array[] = $print->company_address;
				$sub_array[] = $print->assessor_name;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->assessor_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				// $sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_industry_Assessment_form/".$print->id."  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>
				// 					<a onclick=\"return confirm('Are you sure, you want to approve this record?')\"' type='button' title='Approve Now' data-toggle='tooltip' href=" . base_url() . "center_approve_industry_assessment/".$print->id."  class='btn btn-success btn-sm approve_guide'>Approve</a>
				// 				";
				// $sub_array[] = "
				// 	<form method='post' action='center_industry_reject_remark'>
				// 	<input type='hidden' name='id' value='" . $print->id . "'>
				// 	<textarea name='reject_remark' placeholder='Please enter reject remark' value='" . $print->reject_remark . "' class='form-control'>" . $print->reject_remark . "</textarea> 
				// 	<input type='submit' name='hold_submit' value='Save Remark'  class='btn btn-primary'>
				// 	</form>";
				$self_Details_table = '
						<button type="button" onclick="showindustryTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#industryNoteModal" class="btn btn-primary">
							View
						</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_industry_assessment_pending_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_industry_assessment_rejected_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_teacher_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_industry_assessment_rejected_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->course_mode == '0') {
					$sub_array[] = "Year";
				} else if ($print->course_mode == '1') {
					$sub_array[] = "Sem";
				} else if ($print->course_mode == '2') {
					$sub_array[] = "Both";
				} else {
					$sub_array[] = "Month";
				}
				$sub_array[] = $print->designation;
				$sub_array[] = $print->company_name;
				$sub_array[] = $print->contact_no;
				$sub_array[] = $print->email;
				$sub_array[] = $print->company_address;
				$sub_array[] = $print->assessor_name;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->assessor_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				$sub_array[] = $print->reject_remark;
				$sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_industry_Assessment_form/" . $print->id . "  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>";
				$self_Details_table = '
					<button type="button" onclick="showindustryTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#industryNoteModal" class="btn btn-primary">
						View
					</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_industry_assessment_rejected_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_industry_assessment_approved_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_teacher_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_industry_assessment_approved_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if ($print->course_mode == '0') {
					$sub_array[] = "Year";
				} else if ($print->course_mode == '1') {
					$sub_array[] = "Sem";
				} else if ($print->course_mode == '2') {
					$sub_array[] = "Both";
				} else {
					$sub_array[] = "Month";
				}
				$sub_array[] = $print->designation;
				$sub_array[] = $print->company_name;
				$sub_array[] = $print->contact_no;
				$sub_array[] = $print->email;
				$sub_array[] = $print->company_address;
				$sub_array[] = $print->assessor_name;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->assessor_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				$self_Details_table = '
						<button type="button" onclick="showindustryTableDiv(' . $print->id . ')" data-toggle="modal" data-target="#industryNoteModal" class="btn btn-primary">
							View
						</button>';
				$sub_array[] = $self_Details_table;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_industry_assessment_approved_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	//parent
	public function get_parent_assessment_pending_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_parent_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_parent_assessment_pending_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->contact_no;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->father_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				if ($print->relation == '0') {
					$sub_array[] = "Father";
				} else if ($print->relation == '1') {
					$sub_array[] = "Mother";
				} else {
					$sub_array[] = "Guardian";
				}
				if ($print->satisfaction == '0') {
					$sub_array[] = "Not Satisfied";
				} else if ($print->satisfaction == '1') {
					$sub_array[] = "Satisfied";
				}
				// $sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_parent_Assessment_form/".$print->id."  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>
				// 					<a onclick=\"return confirm('Are you sure, you want to approve this record?')\"' type='button' title='Approve Now' data-toggle='tooltip' href=" . base_url() . "center_approve_parent_assessment/".$print->id."  class='btn btn-success btn-sm approve_guide'>Approve</a>
				// 				";
				// $sub_array[] = "
				// 	<form method='post' action='center_parent_reject_remark'>
				// 	<input type='hidden' name='id' value='" . $print->id . "'>
				// 	<textarea name='reject_remark' placeholder='Please enter reject remark' value='" . $print->reject_remark . "' class='form-control'>" . $print->reject_remark . "</textarea> 
				// 	<input type='submit' name='hold_submit' value='Save Remark'  class='btn btn-primary'>
				// 	</form>";
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_parent_assessment_pending_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_parent_assessment_rejected_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_parent_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_parent_assessment_rejected_ajax($length, $start, $search);
		//    echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->contact_no;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->father_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				if ($print->relation == '0') {
					$sub_array[] = "Father";
				} else if ($print->relation == '1') {
					$sub_array[] = "Mother";
				} else {
					$sub_array[] = "Guardian";
				}
				if ($print->satisfaction == '0') {
					$sub_array[] = "Not Satisfied";
				} else if ($print->satisfaction == '1') {
					$sub_array[] = "Satisfied";
				}
				$sub_array[] = $print->reject_remark;
				$sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_parent_Assessment_form/" . $print->id . "  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>";
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_parent_assessment_rejected_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_parent_assessment_approved_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_parent_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_parent_assessment_approved_ajax($length, $start, $search);
		// echo "<pre>";print_r($document);exit;
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->contact_no;
				$signature = $this->Digitalocean_model->get_photo('images/signature/' . $print->father_signature);
				$sub_array[] = "<img src='" . $signature . "' height='100' width='100'> ";
				if ($print->relation == '0') {
					$sub_array[] = "Father";
				} else if ($print->relation == '1') {
					$sub_array[] = "Mother";
				} else {
					$sub_array[] = "Guardian";
				}
				if ($print->satisfaction == '0') {
					$sub_array[] = "Not Satisfied";
				} else if ($print->satisfaction == '1') {
					$sub_array[] = "Satisfied";
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_parent_assessment_approved_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_pending_assignment()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_self_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_all_pending_assignment($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$signature = $this->Digitalocean_model->get_photo('uploads/assesment_form/assignment/' . $print->file);
				$sub_array[] = "<a href='" . $signature . "' target='_blank'>Click to View </a>";
				$sub_array[] = $print->rejection_remark;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_pending_assignment_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_rejected_assignment()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_self_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_all_rejected_assignment($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$signature = $this->Digitalocean_model->get_photo('uploads/assesment_form/assignment/' . $print->file);
				$sub_array[] = "<a href='" . $signature . "' target='_blank'>Click to View </a>";
				$sub_array[] = $print->rejection_remark;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_rejected_assignment_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function get_all_approved_assignment()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_center_self_assessment_form');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
		}
		if (!empty($search)) {
			$x = 0;
		}
		$document = $this->Center_details_model->get_all_approved_assignment($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$signature = $this->Digitalocean_model->get_photo('uploads/assesment_form/assignment/' . $print->file);
				$sub_array[] = "<a href='" . $signature . "' target='_blank'>Click to View </a>";
				$sub_array[] = $print->rejection_remark;
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_approved_assignment_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	
}