<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Setting_model extends CI_Model
{
	public function set_coupon_code()
	{
		$data = array(
			'coupon_code' 		=> $this->input->post('coupon_code'),
			'amount' 			=> $this->input->post('amount'),
			'start_date' 		=> date("Y-m-d", strtotime($this->input->post('start_date'))),
			'end_date' 			=> date("Y-m-d", strtotime($this->input->post('end_date'))),
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_coupon', $new_arr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_coupon', $data);
			return 1;
		}
	}
	public function get_single_coupon()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_coupon');
		return $result->row();
	}
	public function get_unique_coupon()
	{
		$this->db->where('coupon_code', $this->input->post('coupon_code'));
		$this->db->where('id !=', $this->input->post('id'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_coupon');
		echo $result->num_rows();
	}
	public function get_all_coupon_code($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('coupon_code', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_coupon');
		return $result->result();
	}
	public function get_all_coupon_code_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('coupon_code', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_coupon');
		return $result->num_rows();
	}
	public function get_all_designation($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		// $this->db->where('id', 'DESC');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('designation', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		// $this->db->order_by('designation', 'ASC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_designation');
		return $result->result();
	}
	public function get_all_designation_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('designation', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_designation');
		return $result->num_rows();
	}
	public function set_designation()
	{
		$data = array(
			'designation' => $this->input->post('designation')
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_designation', $new_arr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_designation', $data);
			return 1;
		}
	}
	public function get_single_designation()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_designation');
		return $result->row();
	}
	public function get_unique_designation()
	{
		$this->db->where('designation', $this->input->post('designation'));
		$this->db->where('id !=', $this->input->post('id'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_designation');
		echo $result->num_rows();
	}
	public function inactive()
	{
		$data = array(
			'status' => '0'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update($this->uri->segment(3), $data);
		return true;
	}
	public function active()
	{
		$data = array(
			'status' => '1'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update($this->uri->segment(3), $data);
		return true;
	}
	public function delete()
	{
		if ($this->uri->segment(3) == "tbl_student_exam") {
			$deleted = array(
				'is_deleted' => '1'
			);
			$this->db->where('id', $this->uri->segment(2));
			$this->db->update('tbl_student_exam', $deleted);
			$this->db->where('student_exam_id', $this->uri->segment(2));
			$this->db->delete('tbl_student_exam_completed', $deleted);
		} else {
			$data = array(
				'is_deleted' => '1'
			);
			$this->db->where('id', $this->uri->segment(2));
			$this->db->update($this->uri->segment(3), $data);
			if ($this->uri->segment(3) == "tbl_student") {
				$this->db->where('id', $this->uri->segment(2));
				$student_row = $this->db->get('tbl_student');
				$student_row = $student_row->row();
				$profile = $this->Admin_model->get_profile();
				$add_log = 1;
				$log_description = $profile->first_name . " " . $profile->last_name . " has deleted student of " . $student_row->student_name . " (" . $student_row->id . ")" . " on " . date("d/m/Y");
				$log = array(
					'user_id' 		=> $this->session->userdata('admin_id'),
					'student_id' 	=> $student_row->id,
					'description' 	=> $log_description,
					'date' 			=> date("Y-m-d"),
					'created_on' 	=> date("Y-m-d H:i:s"),
				);
				$this->set_log($log);
			}
			if ($this->uri->segment(3) == "tbl_separate_student") {
				$this->db->where('id', $this->uri->segment(2));
				$student_row = $this->db->get('tbl_separate_student');
				$student_row = $student_row->row();
				$profile = $this->Admin_model->get_profile();
				$add_log = 1;
				$log_description = $profile->first_name . " " . $profile->last_name . " has deleted student of " . $student_row->student_name . " (" . $student_row->id . ")" . " on " . date("d/m/Y");
				$log = array(
					'user_id' 		=> $this->session->userdata('admin_id'),
					'student_id' 	=> $student_row->id,
					'description' 	=> $log_description,
					'date' 			=> date("Y-m-d"),
					'student_type' => '1',
					'created_on' 	=> date("Y-m-d H:i:s"),
				);
				$this->set_log($log);
			}
		}
		return true;
	}
	public function set_employee($photo)
	{
		if ($photo == "") {
			$photo = $this->input->post('old_userfile');
		}
		$data = array(
			'name_prefix' 		=> $this->input->post('name_prefix'),
			'designation_id' 	=> $this->input->post('designation'),
			'first_name' 		=> $this->input->post('first_name'),
			'last_name' 		=> $this->input->post('last_name'),
			'contact_number' 	=> $this->input->post('contact_number'),
			'alternate_number' 	=> $this->input->post('alternate_number'),
			'email' 			=> $this->input->post('email'),
			'date_of_birth'     => $this->input->post("dob"),
			'address' 			=> $this->input->post('address'),
			'country' 			=> $this->input->post('country'),
			'state' 			=> $this->input->post('state'),
			'city' 				=> $this->input->post('city'),
			'pincode'	 		=> $this->input->post('pincode'),
			'join_date'	 		=> date("Y-m-d", strtotime($this->input->post('join_date'))),
			'profile_pic' 		=> $photo,
		);
		if (empty($this->uri->segment(2))) {
			$date = array(
				'password' 			=> md5($this->input->post('add_password')),
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_employees', $new_arr);
			$id = $this->db->insert_id();
			$password = $this->input->post('add_password');
			$update = array(
				'employee_code' => "EMPC0" . $id,
			);
			$this->db->where('id', $id);
			$this->db->update('tbl_employees', $update);
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);
			$this->email->from('info@theglobaluniversity.edu.in');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Registration | ' . no_reply_name);
			$this->email->set_mailtype('html');
			$message = "Dear " . $this->input->post('first_name') . "<br> You have successfully Registered, below are the login details to continue.<br>";
			$message .= "<br>URL: " . base_url() . "erp-access";
			$message .= "<br>Username: " . $this->input->post('email');
			$message .= "<br>Password: " . $password;
			$message .= "<br>Regards,<br>IT Team";
			$subject = 'Registration |' . no_reply_name;
			$to = array(
				"email" => $this->input->post('email'),
				"name" => $this->input->post('first_name'),
			);
			$this->Admin_model->send_send_blue($to, $subject, $message);
			return 0;
		} else {
			if ($this->input->post('add_password') != "") {
				$pass = array(
					'password' 			=> md5($this->input->post('add_password')),
				);
				$data_pass = array_merge($data, $pass);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_employees', $data_pass);
				return 1;
			} else {
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_employees', $data);
				return 1;
			}
		}
	}
	public function set_employee_progress_report($file)
	{
		if ($file == "") {
			$file = $this->input->post('old_upload_file');
		}
		$data = array(
			'emp_id' => $this->uri->segment(2),
			'month' => $this->input->post('month'),
			'year' => $this->input->post('year'),
			'file' => $file,
			'created_on' => date("Y-m-d H:i:s"),
		);
		if ($this->input->post('id') == "") {
			$date = array('created_on' => date("Y-m-d H:i:s"));
			$newArr = array_merge($date, $data);
			$this->db->insert('tbl_employee_progress_report', $newArr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_employee_progress_report', $data);
			return 1;
		}
		// $this->db->insert('tbl_employee_progress_report', $data);
		return true;
	}
	public function get_emp_unique_email()
	{
		if ($this->input->post('id') != "") {
			$this->db->where('id !=', $this->input->post('id'));
		}
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_employees');
		echo $result->num_rows();
	}
	public function get_emp_unique_contact_number()
	{
		if ($this->input->post('id') != "") {
			$this->db->where('id !=', $this->input->post('id'));
		}
		$this->db->where('contact_number', $this->input->post('contact_number'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_employees');
		echo $result->num_rows();
	}
	public function get_active_designation()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('designation');
		$result = $this->db->get('tbl_designation');
		return $result->result();
	}
	public function get_all_employees_ajax($length, $start, $search)
	{
		$this->db->select('tbl_employees.*,tbl_designation.designation,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_employees.is_deleted', '0');
		$this->db->where('tbl_employees.is_left', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_designation.designation', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_employees.name_prefix', $search);
			$this->db->or_like('tbl_employees.first_name', $search);
			$this->db->or_like('tbl_employees.last_name', $search);
			$this->db->or_like('tbl_employees.contact_number', $search);
			$this->db->or_like('tbl_employees.alternate_number', $search);
			$this->db->or_like('tbl_employees.email', $search);
			$this->db->or_like('tbl_employees.pincode', $search);
			$this->db->or_like('tbl_employees.address', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_designation', 'tbl_designation.id = tbl_employees.designation_id');
		$this->db->join('countries', 'countries.id = tbl_employees.country');
		$this->db->join('states', 'states.id = tbl_employees.state');
		$this->db->join('cities', 'cities.id = tbl_employees.city');
		// $this->db->order_by('tbl_employees.first_name', 'ASC');
		$this->db->order_by('tbl_employees.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_employees');
		// print_r($result);exit();
		return $result->result();
	}
	public function get_all_employee_count($search)
	{
		$this->db->where('tbl_employees.is_deleted', '0');
		$this->db->where('tbl_employees.is_left', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_designation.designation', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_employees.name_prefix', $search);
			$this->db->or_like('tbl_employees.first_name', $search);
			$this->db->or_like('tbl_employees.last_name', $search);
			$this->db->or_like('tbl_employees.contact_number', $search);
			$this->db->or_like('tbl_employees.alternate_number', $search);
			$this->db->or_like('tbl_employees.email', $search);
			$this->db->or_like('tbl_employees.pincode', $search);
			$this->db->or_like('tbl_employees.address', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_designation', 'tbl_designation.id = tbl_employees.designation_id');
		$this->db->join('countries', 'countries.id = tbl_employees.country');
		$this->db->join('states', 'states.id = tbl_employees.state');
		$this->db->join('cities', 'cities.id = tbl_employees.city');
		$this->db->order_by('tbl_employees.first_name', 'ASC');
		// $this->db->order_by('tbl_employees.first_name', 'ASC');
		$result = $this->db->get('tbl_employees');
		return $result->num_rows();
	}
	public function get_single_employee()
	{
		$this->db->where('tbl_employees.is_deleted', '0');
		$this->db->where('tbl_employees.id', $this->uri->segment(2));
		$result = $this->db->get('tbl_employees');
		return $result->row();
		// $result = $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_all_employee_progress_reports($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('emp_id', $this->input->post('id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('month', $search);
			$this->db->or_like('year', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_employee_progress_report');
		return $result->result();
	}
	public function get_all_employee_progress_reports_count($search)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('emp_id', $this->input->post('id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('month', $search);
			$this->db->or_like('year', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_employee_progress_report');
		return $result->num_rows();
	}
	public function get_single_employee_progress_report()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $this->uri->segment(3));
		$result = $this->db->get('tbl_employee_progress_report');
		return $result->row();
		// $result = $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	public function set_website_setting($logo, $stamp)
	{
		if ($logo == "") {
			$logo = $this->input->post('old_userfile');
		}
		if ($stamp == "") {
			$stamp = $this->input->post('old_userfile1');
		}
		$data = array(
			'university_name'	=> $this->input->post('university_name'),
			'slogan'			=> $this->input->post('slogan'),
			'website'			=> $this->input->post('website'),
			'contact_number'	=> $this->input->post('contact_number'),
			'email' 			=> $this->input->post('email'),
			'address' 			=> $this->input->post('address'),
			'copyright' 		=> $this->input->post('copyright'),
			'logo' 				=> $logo,
			'stamp' 			=> $stamp,
			'helpline_number'   => $this->input->post('helpline_number'),
			'mail_email'		=> $this->input->post('mail_email'),
		);
	
		if ($this->input->post('uni_id') == "") {
			if ($this->db->insert('tbl_university_details', $data)) {
				$this->session->set_flashdata('success', 'Record inserted successfully'); //
				return true;
			} else {
				return false;
			}
		} else {
			$this->db->where('id', $this->input->post('uni_id'));
			if ($this->db->update('tbl_university_details', $data)) {
				$this->session->set_flashdata('success', 'Record updated successfully');  //
				return true;
			} else {
				return false;
			}
		}
	}
	public function get_university_details()
	{
		$result = $this->db->get('tbl_university_details');
		return $result->row();
	}
	public function get_all_id_name_ajax($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('id_name', $search);
			$this->db->group_end();
		}
		// $this->db->order_by('id_name', 'ASC');
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_id_management');
		return $result->result();
	}
	public function get_all_id_name_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('id_name', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_id_management');
		return $result->num_rows();
	}
	public function set_id_name()
	{
		$data = array(
			'id_name' => $this->input->post('id_name')
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_id_management', $new_arr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_id_management', $data);
			return 1;
		}
	}
	public function get_single_id_name()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_id_management');
		return $result->row();
	}
	public function get_unique_id_name()
	{
		$this->db->where('id_name', $this->input->post('id_name'));
		$this->db->where('id !=', $this->input->post('id'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_id_management');
		echo $result->num_rows();
	}
	public function set_bank()
	{
		$data = array(
			'account_holder' 	=> $this->input->post('account_holder'),
			'account_number' 	=> $this->input->post('account_number'),
			'bank_name' 		=> $this->input->post('bank_name'),
			'branch' 			=> $this->input->post('branch'),
			'ifsc' 				=> $this->input->post('ifsc'),
			'show_for_challan' 	=> $this->input->post('show_for_challan'),
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_bank', $new_arr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_bank', $data);
			return 1;
		}
	}
	public function get_single_bank()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		// $this->db->where('id', 'ASC');
		$result = $this->db->get('tbl_bank');
		return $result->row();
	}
	public function get_unique_bank()
	{
		$this->db->where('account_number', $this->input->post('account_number'));
		$this->db->where('id !=', $this->input->post('id'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_bank');
		echo $result->num_rows();
	}
	public function get_all_bank_ajax($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('account_holder', $search);
			$this->db->or_like('account_number', $search);
			$this->db->or_like('bank_name', $search);
			$this->db->or_like('branch', $search);
			$this->db->or_like('ifsc', $search);
			$this->db->group_end();
		}
		// $this->db->order_by('bank_name', 'ASC');
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_bank');
		return $result->result();
	}
	public function get_all_bank_list()
	{
		$this->db->where('is_deleted', '0');
		$this->db->order_by('bank_name', 'ASC');
		$result = $this->db->get('tbl_bank');
		return $result->result();
	}
	public function get_all_bank_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('account_holder', $search);
			$this->db->or_like('account_number', $search);
			$this->db->or_like('bank_name', $search);
			$this->db->or_like('branch', $search);
			$this->db->or_like('ifsc', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_bank');
		return $result->num_rows();
	}
	public function get_single_password_setting()
	{
		$data = array(
			'enrollment' 	=> $this->input->post('enrollment'),
			'degree' 		=> $this->input->post('degree'),
			'marksheet' 	=> $this->input->post('marksheet'),
		);
		$exist = $this->get_password_setting();
		if (empty($exist)) {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_loked_password', $new_arr);
		} else {
			$this->db->update('tbl_loked_password', $data);
		}
		return true;
	}
	public function get_password_setting()
	{
		$result = $this->db->get('tbl_loked_password');
		return $result->row();
	}
	public function get_unique_privilege_label()
	{
		$this->db->where('is_deleted', '0');
		if ($this->input->post('id') != "0") {
			$this->db->where('id !=', $this->input->post('id'));
		}
		$this->db->where('name', $this->input->post('name'));
		$result = $this->db->get('tbl_privilege_level');
		echo $result->num_rows();
	}
	public function set_privilege()
	{
		$data = array(
			'name' 	=> $this->input->post('name'),
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s"),
			);
			$newArr = array_merge($data, $date);
			$this->db->insert('tbl_privilege_level', $newArr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_privilege_level', $data);
			return 1;
		}
	}
	public function get_all_privileges()
	{
		$this->db->where('is_deleted', '0');
		$this->db->order_by('name', 'ASC');
		$result = $this->db->get('tbl_privilege_level');
		return $result->result();
	}
	public function get_all_privilege_ajax($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('name', $search);
			$this->db->group_end();
		}
		// $this->db->order_by('name', 'ASC');
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_privilege_level');
		return $result->result();
	}
	public function get_all_privilege_ajax_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('name', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_privilege_level');
		return $result->num_rows();
	}
	public function get_active_privileges()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('name', 'ASC');
		$result = $this->db->get('tbl_privilege_level');
		return $result->result();
	}
	public function get_single_privileges()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_privilege_level');
		return $result->row();
	}
	public function get_unique_privilege_link()
	{
		$this->db->where('is_deleted', '0');
		if ($this->input->post('id') != "0") {
			$this->db->where('id !=', $this->input->post('id'));
		}
		$this->db->where('link', $this->input->post('link'));
		$result = $this->db->get('tbl_privilege_link');
		echo $result->num_rows();
	}
	public function set_privilege_link()
	{
		$data = array(
			'privilege' 	=> $this->input->post('privilege'),
			'level' 		=> $this->input->post('level'),
			'link' 			=> $this->input->post('link'),
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s"),
			);
			$newArr = array_merge($data, $date);
			$this->db->insert('tbl_privilege_link', $newArr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_privilege_link', $data);
			return 1;
		}
	}
	public function get_all_privileges_link()
	{
		$this->db->select('tbl_privilege_link.*,tbl_privilege_level.name');
		$this->db->where('tbl_privilege_link.is_deleted', '0');
		$this->db->join('tbl_privilege_level', 'tbl_privilege_level.id = tbl_privilege_link.privilege');
		$result = $this->db->get('tbl_privilege_link');
		return $result->result();
	}
	public function get_all_privilege_link_ajax($length, $start, $search)
	{
		$this->db->select('tbl_privilege_link.*,tbl_privilege_level.name');
		$this->db->where('tbl_privilege_link.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_privilege_link.level', $search);
			$this->db->or_like('tbl_privilege_level.name', $search);
			$this->db->group_end();
		}
		// $this->db->order_by('name', 'ASC');
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$this->db->join('tbl_privilege_level', 'tbl_privilege_level.id = tbl_privilege_link.privilege');
		$result = $this->db->get('tbl_privilege_link');
		return $result->result();
	}
	public function get_all_privilege_link_ajax_count($search)
	{
		$this->db->select('tbl_privilege_link.*,tbl_privilege_level.name');
		$this->db->where('tbl_privilege_link.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_privilege_link.level', $search);
			$this->db->or_like('tbl_privilege_level.name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_privilege_level', 'tbl_privilege_level.id = tbl_privilege_link.privilege');
		$result = $this->db->get('tbl_privilege_link');
		return $result->num_rows();
	}
	public function get_single_privileges_link()
	{
		if ($this->uri->segment(2) != "") {
			$this->db->where('is_deleted', '0');
			$this->db->where('id', $this->uri->segment(2));
			$result = $this->db->get('tbl_privilege_link');
			return $result->row();
		}
	}
	public function get_active_user()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		//$this->db->where('id !=','1');
		$result = $this->db->get('tbl_employees');
		return $result->result();
	}
	public function get_single_privileges_user()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $this->uri->segment(2));
		//$this->db->where('is_admin','0');
		$result = $this->db->get('tbl_employees');
		return $result->row();
	}
	public function get_selected_link($id)
	{
		$this->db->where('privilege', $id);
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_privilege_link');
		return $result->result();
	}
	// public function set_user_privileges()
	// {
	// 	$links = "";
	// 	$all_link = $this->input->post('link');
	// 	for ($i = 0; $i < count($all_link); $i++) {
	// 		$links .= $all_link[$i] . ",";
	// 	}
	// 	$this->db->where('user_id', $this->input->post('user'));
	// 	$result = $this->db->get('tbl_user_privilege');
	// 	$result = $result->row();
	// 	if (empty($result)) {
	// 		$data = array(
	// 			'user_id' 		=> $this->input->post('user'),
	// 			'privilege' 	=> $links,
	// 			'created_on' 	=> date("Y-m-d H:i:s"),
	// 		);
	// 		$this->db->insert('tbl_user_privilege', $data);
	// 	} else {
	// 		$data = array(
	// 			'user_id' 		=> $this->input->post('user'),
	// 			'privilege' 	=> $links,
	// 		);
	// 		$this->db->where('user_id', $this->input->post('user'));
	// 		$this->db->update('tbl_user_privilege', $data);
	// 	}
	// 	return true;
	// }
	public function set_user_privileges()
	{
		$links = "";
		$all_link = $this->input->post('link');
		for ($i = 0; $i < count($all_link); $i++) {
			$links .= $all_link[$i] . ",";
		}
		$this->db->where('user_id', $this->input->post('user'));
		$result = $this->db->get('tbl_user_privilege');
		$result = $result->row();
		if (empty($result)) {
			$data = array(
				'user_id' 		=> $this->input->post('user'),
				'privilege' 	=> $links,
				'created_on' 	=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_user_privilege', $data);
		} else {
			$data = array(
				'user_id' 		=> $this->input->post('user'),
				'privilege' 	=> $links,
			);
			$this->db->where('user_id', $this->input->post('user'));
			$this->db->update('tbl_user_privilege', $data);
		}
		$doc_heads = "";
		$doc_link = $this->input->post('doc_link');
		for ($i = 0; $i < count($doc_link); $i++) {
			$doc_heads .= $doc_link[$i] . ",";
		}
		$this->db->where('user_id', $this->input->post('user'));
		$result = $this->db->get('tbl_user_documentation_privilege');
		$result = $result->row();
		if (empty($result)) {
			$data = array(
				'user_id' 		=> $this->input->post('user'),
				'privilege' 	=> $doc_heads,
				'created_on' 	=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_user_documentation_privilege', $data);
		} else {
			$data = array(
				'user_id' 		=> $this->input->post('user'),
				'privilege' 	=> $doc_heads,
			);
			$this->db->where('user_id', $this->input->post('user'));
			$this->db->update('tbl_user_documentation_privilege', $data);
		}
		return true;
	}
	public function get_user_added_privilege()
	{
		$this->db->where('user_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_user_privilege');
		$result = $result->row();
		return $result;
	}
	public function get_user_privilege_link()
	{
		$arr = array();
		$this->db->where('user_id', $this->session->userdata('admin_id'));
		$result = $this->db->get('tbl_user_privilege');
		$result = $result->row();
		if (!empty($result)) {
			$ids = explode(",", $result->privilege);
			$this->db->where_in('id', $ids);
			$all_result = $this->db->get('tbl_privilege_link');
			$all_result = $all_result->result();
			if (!empty($all_result)) {
				foreach ($all_result as $all_result_arr) {
					$arr[] = $all_result_arr->link;
				}
			}
		}
		// if($this->session->userdata('admin_id')==2){
		// 	$this->db->where('access_id',$this->session->userdata('admin_id'));
		// 	$all_result = $this->db->get('tbl_privilege_link');
		// 	$all_result = $all_result->result();
		// 	if(!empty($all_result)){
		// 		foreach($all_result as $all_result_arr){
		// 			$arr[] = $all_result_arr->link;
		// 		}
		// 	} 
		// }else{
		// 	$this->db->where('user_id',$this->session->userdata('admin_id'));
		// 	$result = $this->db->get('tbl_user_privilege');
		// 	$result = $result->row();
		// 	if(!empty($result)){
		// 		$ids = explode(",",$result->privilege);
		// 		$this->db->where_in('id',$ids);
		// 		$all_result = $this->db->get('tbl_privilege_link');
		// 		$all_result = $all_result->result();
		// 		if(!empty($all_result)){
		// 			foreach($all_result as $all_result_arr){
		// 				$arr[] = $all_result_arr->link;
		// 			}
		// 		} 
		// 	}
		// }
		return $arr;
	}
	public function set_log($data)
	{
		$this->db->insert('tbl_log', $data);
		return true;
	}
	public function get_single_job_application()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_career');
		return $result->row();
	}
	public function set_update_job_application($files)
	{
		$data = array(
			'name' 					=> $this->input->post('name'),
			'mobile_number' 		=> $this->input->post('mobile_number'),
			'email' 				=> $this->input->post('email'),
			'position' 				=> $this->input->post('position'),
			'last_qualification' 	=> $this->input->post('last_qualification'),
			'work_experience' 		=> $this->input->post('work_experience'),
			'present_working' 		=> $this->input->post('present_working'),
			'full_address' 			=> $this->input->post('full_address'),
			'state' 				=> $this->input->post('state'),
			'userfile'				=> $files,
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_career', $data);
		return true;
	}
	public function get_all_job_application($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('name', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('position', $search);
			$this->db->or_like('last_qualification', $search);
			$this->db->or_like('work_experience', $search);
			$this->db->or_like('present_working', $search);
			$this->db->or_like('full_address', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_career');
		return $result->result();
	}
	public function get_all_job_application_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('name', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('position', $search);
			$this->db->or_like('last_qualification', $search);
			$this->db->or_like('work_experience', $search);
			$this->db->or_like('present_working', $search);
			$this->db->or_like('full_address', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_career');
		return $result->num_rows();
	}
	public function set_admin_employee_documents($file)
	{
		$data = array(
			'employee_id' 	=> $this->input->post('employee_id'),
			'head' 			=> $this->input->post('head'),
			'file' 			=> $file,
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_employee_documents', $data);
		return 0;
	}
	public function get_all_employee_documents($length, $start, $search)
	{
		$this->db->select('tbl_employee_documents.*,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->where('tbl_employee_documents.is_deleted', '0');
		$this->db->where('tbl_employee_documents.employee_id', $this->input->post('employee_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_employee_documents.head', $search);
			$this->db->or_like('tbl_employees.first_name', $search);
			$this->db->or_like('tbl_employees.last_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_employee_documents.employee_id');
		$result = $this->db->get('tbl_employee_documents');
		return $result->result();
	}
	public function get_all_employee_documents_count($search)
	{
		$this->db->select('tbl_employee_documents.*,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->where('tbl_employee_documents.is_deleted', '0');
		$this->db->where('tbl_employee_documents.employee_id', $this->input->post('employee_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_employee_documents.head', $search);
			$this->db->or_like('tbl_employees.first_name', $search);
			$this->db->or_like('tbl_employees.last_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_employee_documents.employee_id');
		$result = $this->db->get('tbl_employee_documents');
		return $result->num_rows();
	}
	public function employee_left()
	{
		$data = array(
			"is_left" => "1",
		);
		$this->db->where("is_deleted", "0");
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update("tbl_employees", $data);
	}
	public function employee_not_left()
	{
		$data = array(
			"is_left" => "0",
		);
		$this->db->where("is_deleted", "0");
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update("tbl_employees", $data);
	}
	public function get_all_left_employee_ajax($length, $start, $search)
	{
		$this->db->select('tbl_employees.*,tbl_designation.designation,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_employees.is_deleted', '0');
		$this->db->where('tbl_employees.is_left', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_designation.designation', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_employees.name_prefix', $search);
			$this->db->or_like('tbl_employees.first_name', $search);
			$this->db->or_like('tbl_employees.last_name', $search);
			$this->db->or_like('tbl_employees.contact_number', $search);
			$this->db->or_like('tbl_employees.alternate_number', $search);
			$this->db->or_like('tbl_employees.email', $search);
			$this->db->or_like('tbl_employees.pincode', $search);
			$this->db->or_like('tbl_employees.address', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_designation', 'tbl_designation.id = tbl_employees.designation_id');
		$this->db->join('countries', 'countries.id = tbl_employees.country');
		$this->db->join('states', 'states.id = tbl_employees.state');
		$this->db->join('cities', 'cities.id = tbl_employees.city');
		// $this->db->order_by('tbl_employees.first_name', 'ASC');
		$this->db->order_by('tbl_employees.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_employees');
		return $result->result();
	}
	public function get_all_left_employee_ajax_count($search)
	{
		$this->db->where('tbl_employees.is_deleted', '0');
		$this->db->where('tbl_employees.is_left', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_designation.designation', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_employees.name_prefix', $search);
			$this->db->or_like('tbl_employees.first_name', $search);
			$this->db->or_like('tbl_employees.last_name', $search);
			$this->db->or_like('tbl_employees.contact_number', $search);
			$this->db->or_like('tbl_employees.alternate_number', $search);
			$this->db->or_like('tbl_employees.email', $search);
			$this->db->or_like('tbl_employees.pincode', $search);
			$this->db->or_like('tbl_employees.address', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_designation', 'tbl_designation.id = tbl_employees.designation_id');
		$this->db->join('countries', 'countries.id = tbl_employees.country');
		$this->db->join('states', 'states.id = tbl_employees.state');
		$this->db->join('cities', 'cities.id = tbl_employees.city');
		$this->db->order_by('tbl_employees.first_name', 'ASC');
		$this->db->order_by('tbl_employees.first_name', 'ASC');
		$result = $this->db->get('tbl_employees');
		return $result->num_rows();
	}
	public function center_inactive()
	{
		$data = array(
			'status_for_center' => '0'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update($this->uri->segment(3), $data);
		return true;
	}
	public function center_active()
	{
		$data = array(
			'status_for_center' => '1'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update($this->uri->segment(3), $data);
		return true;
	}
	public function set_signature($signature)
	{
		// echo "<pre>";print_r($signature);exit;
		$data = array(
			'name' 					=> $this->input->post('name_of_signature'),
			'dispalay_signature' 	=> $this->input->post('dispalay_signature'),
			'signature_for' 		=> $this->input->post('signature_for'),
			'signature' 			=> $signature,
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_signature', $new_arr);
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_signature', $data);
		}
		return true;
	}
	public function get_single_signature()
	{
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_signature');
		return $result->row();
	}
	public function get_all_signature()
	{
		$this->db->where('signature_for', '0');
		$result = $this->db->get('tbl_signature');
		return $result->result();
	}
	public function get_all_signature_ajax($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('name', $search);
			$this->db->or_like('dispalay_signature', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_signature');
		return $result->result();
	}
	public function get_all_signature_ajax_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('name', $search);
			$this->db->or_like('dispalay_signature', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_signature');
		return $result->num_rows();
	}
	public function set_exam_setup()
	{
		if ($this->uri->segment(2) == '') {
			$indices = $this->input->post('indices');
			$data = array(
				'student_type'			=>	$this->input->post('student_type'),
				'month'					=>	$this->input->post('month'),
				'year'					=>	$this->input->post('year'),
				'result_declare_date'	=>	date('Y-m-d', strtotime($this->input->post('result_declare_date'))),
				'marksheet_issue_date'	=>	date('Y-m-d', strtotime($this->input->post('marksheet_issue_date'))),
				'signature'				=>	$this->input->post('signature'),
				'checked_signature_id'	=>	$this->input->post('checked_signature_id'),
				'prepared_signature_id'	=>	$this->input->post('prepared_signature_id'),
				'created_on'			=> 	date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_exam_setup', $data);
			$setup_id = $this->db->insert_id();
			if (!empty($indices)) {
				for ($i = 0; $i < count($indices); $i++) {
					$session = $this->input->post('session_' . $indices[$i]);
					$applicable_for = $this->input->post('applicable_for_' . $indices[$i]);
					if (is_array($applicable_for)) {
						$applicable_for = implode(',', $applicable_for);
					}
					if ($applicable_for != "" && $session != "") {
						$data = array(
							'setup_id'				=>	$setup_id,
							'student_type'			=>	$this->input->post('student_type'),
							'month'					=>	$this->input->post('month'),
							'year'					=>	$this->input->post('year'),
							'result_declare_date'	=>	date('Y-m-d', strtotime($this->input->post('result_declare_date'))),
							'marksheet_issue_date'	=>	date('Y-m-d', strtotime($this->input->post('marksheet_issue_date'))),
							'signature'				=>	$this->input->post('signature'),
							'checked_signature_id'	=>	$this->input->post('checked_signature_id'),
							'prepared_signature_id'	=>	$this->input->post('prepared_signature_id'),
							'session'				=>	$session,
							'applicable_for'		=>	$applicable_for,
							'created_on'			=>	date('Y-m-d H:i:s'),
						);
						$this->db->insert('tbl_exam_setup_details', $data);
					}
				}
			}
			$this->db->where('id !=', $setup_id);
			$this->db->update('tbl_exam_setup', array('status' => '0'));
			$this->db->where('setup_id !=', $setup_id);
			$this->db->update('tbl_exam_setup_details', array('status' => '0'));
			return 1;
		} else {
			$indices = $this->input->post('indices');
			$data = array(
				'student_type'			=>	$this->input->post('student_type'),
				'month'					=>	$this->input->post('month'),
				'year'					=>	$this->input->post('year'),
				'result_declare_date'	=>	date('Y-m-d', strtotime($this->input->post('result_declare_date'))),
				'marksheet_issue_date'	=>	date('Y-m-d', strtotime($this->input->post('marksheet_issue_date'))),
				'signature'				=>	$this->input->post('signature'),
				'checked_signature_id'	=>	$this->input->post('checked_signature_id'),
				'prepared_signature_id'	=>	$this->input->post('prepared_signature_id'),
			);
			$this->db->where('id', $this->uri->segment(2));
			$this->db->update('tbl_exam_setup', $data);
			$setup_id = $this->uri->segment(2);
			$this->db->where('setup_id', $setup_id);
			$this->db->delete('tbl_exam_setup_details');
			if (!empty($indices)) {
				for ($i = 0; $i < count($indices); $i++) {
					$session = $this->input->post('session_' . $indices[$i]);
					$applicable_for = $this->input->post('applicable_for_' . $indices[$i]);
					if (is_array($applicable_for)) {
						$applicable_for = implode(',', $applicable_for);
					}
					if ($applicable_for != "" && $session != "") {
						$data = array(
							'setup_id'				=>	$setup_id,
							'student_type'			=>	$this->input->post('student_type'),
							'month'					=>	$this->input->post('month'),
							'year'					=>	$this->input->post('year'),
							'result_declare_date'	=>	date('Y-m-d', strtotime($this->input->post('result_declare_date'))),
							'marksheet_issue_date'	=>	date('Y-m-d', strtotime($this->input->post('marksheet_issue_date'))),
							'signature'				=>	$this->input->post('signature'),
							'session'				=>	$session,
							'applicable_for'		=>	$applicable_for,
							'created_on'			=>	date('Y-m-d H:i:s'),
						);
						$this->db->insert('tbl_exam_setup_details', $data);
					}
				}
			}
			$this->db->where('id !=', $setup_id);
			$this->db->update('tbl_exam_setup', array('status' => '0'));
			$this->db->where('setup_id !=', $setup_id);
			$this->db->update('tbl_exam_setup_details', array('status' => '0'));
			return 0;
		}
	}
	public function get_all_exam_setup($length, $start, $search)
	{
		$this->db->select('tbl_exam_setup.*,tbl_signature.name,checked_signature.name as checked_sign,prepared_signature.name as prepared_sign');
		$this->db->where('tbl_exam_setup.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_exam_setup.month', $search);
			$this->db->or_like('tbl_exam_setup.year', $search);
			$this->db->or_like('tbl_exam_setup.result_declare_date', $search);
			$this->db->or_like('tbl_exam_setup.marksheet_issue_date', $search);
			$this->db->or_like('tbl_signature.name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_exam_setup.signature');
		$this->db->join('tbl_signature as checked_signature', 'checked_signature.id = tbl_exam_setup.checked_signature_id','left');
		$this->db->join('tbl_signature as prepared_signature', 'prepared_signature.id = tbl_exam_setup.prepared_signature_id','left');
		$this->db->order_by('tbl_exam_setup.id', 'desc');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_exam_setup');
		return $result->result();
	}
	public function get_all_exam_setup_count($search)
	{
		$this->db->select('tbl_exam_setup.*,tbl_signature.name,checked_signature.name as checked_sign,prepared_signature.name as prepared_sign');
		$this->db->where('tbl_exam_setup.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_exam_setup.month', $search);
			$this->db->or_like('tbl_exam_setup.year', $search);
			$this->db->or_like('tbl_exam_setup.result_declare_date', $search);
			$this->db->or_like('tbl_exam_setup.marksheet_issue_date', $search);
			$this->db->or_like('tbl_signature.name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_exam_setup.signature');
		$this->db->join('tbl_signature as checked_signature', 'checked_signature.id = tbl_exam_setup.checked_signature_id','left');
		$this->db->join('tbl_signature as prepared_signature', 'prepared_signature.id = tbl_exam_setup.prepared_signature_id','left');
		$this->db->order_by('tbl_exam_setup.id', 'desc');
		$result = $this->db->get('tbl_exam_setup');
		return $result->num_rows();
	}
	// public function active_exam_setup(){
	// 	$this->db->where('id',$this->uri->segment(2));
	// 	$this->db->update('tbl_exam_setup',array('status'=>'1'));
	// 	$this->db->where('setup_id',$this->uri->segment(2));
	// 	$this->db->update('tbl_exam_setup_details',array('status'=>'1'));
	// 	$this->db->where('id !=',$this->uri->segment(2));
	// 	$this->db->update('tbl_exam_setup',array('status'=>'0'));
	// 	$this->db->where('setup_id !=',$this->uri->segment(2));
	// 	$this->db->update('tbl_exam_setup_details',array('status'=>'0'));
	// 	return true;
	// }
	public function active_exam_setup()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_exam_setup', array('status' => '1'));
		$this->db->where('setup_id', $this->uri->segment(2));
		$this->db->update('tbl_exam_setup_details', array('status' => '1'));
		$this->db->where('id !=', $this->uri->segment(2));
		$this->db->update('tbl_exam_setup', array('status' => '0'));
		$this->db->where('setup_id !=', $this->uri->segment(2));
		$this->db->update('tbl_exam_setup_details', array('status' => '0'));
		return true;
	}
	public function inactive_exam_setup()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_exam_setup', array('status' => '0'));
		$this->db->where('setup_id', $this->uri->segment(2));
		$this->db->update('tbl_exam_setup_details', array('status' => '0'));
		return true;
	}
	public function delete_exam_setup()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_exam_setup', array('is_deleted' => '1'));
		$this->db->where('setup_id', $this->uri->segment(2));
		$this->db->update('tbl_exam_setup_details', array('is_deleted' => '1'));
		return true;
	}
	public function get_single_exam_setup($id)
	{
		$this->db->where('id', $id);
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_exam_setup');
		$result = $result->row();
		return $result;
	}
	public function get_single_exam_setup_details($id)
	{
		$this->db->where('setup_id', $id);
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_exam_setup_details');
		$result = $result->result();
		return $result;
	}
	public function remove_unused_setup_details()
	{
		$data = array(
			'is_deleted' => '1'
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_exam_setup_details', $data);
		return true;
	}
	public function get_setup_details_popup()
	{
		$this->db->select('tbl_exam_setup_details.*,tbl_session.session_name');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_exam_setup_details.session');
		$this->db->where('tbl_exam_setup_details.is_deleted', '0');
		$this->db->where('tbl_exam_setup_details.setup_id', $this->input->post('id'));
		$result = $this->db->get('tbl_exam_setup_details');
		$result = $result->result();
		if (!empty($result)) { ?>
			<div class="container">
				<table id="example_details" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Session</th>
							<th>Applicable For</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($result as $data) { ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $data->session_name; ?></td>
								<td>
									<?php
									if ($data->applicable_for == '1') {
										echo 'Year';
									} elseif ($data->applicable_for == '2') {
										echo 'Sem';
									} elseif ($data->applicable_for == '3') {
										echo 'Both';
									} else {
										echo '-';
									}
									?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<script>
				var table = $('#example').DataTable({
					"lengthChange": false,
					"processing": true,
					"serverSide": true,
					"responsive": true,
					"cache": false,
					"order": [
						[0, "desc"]
					],
					buttons: [
						{
							extend: "excelHtml5",
							title: "Exam Setup List",
							messageBottom: 'The information in this table is copyright to The global University.',
							exportOptions: {
								columns: [0, 1, 2],
								modifier: {
									search: 'applied',
									order: 'applied'
								},
							},
							action: newExportAction,
						}
					],
					dom: "Bfrtip",
					"complete": function() {
						$('[data-toggle="tooltip"]').tooltip();
					},
				});
			</script>
<?php }
	}
	public function check_unique_exam_setup()
	{
		$this->db->where('month', $this->input->post('month'));
		$this->db->where('year', $this->input->post('year'));
		$this->db->where('student_type', $this->input->post('student_type'));
		if ($this->input->post('id') != "") {
			$this->db->where('id !=', $this->input->post('id'));
		}
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_exam_setup');
		echo $result->num_rows();
	}
	public function get_declare_dates(){
		$this->db->where('is_deleted','0');
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_exam_setup');
		$result = $result->result();
		return $result;
	}
	public function get_selected_signatures($type)
	{
		$this->db->where('signature_for', $type);
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_signature');
		return $result->result();
	}
	public function get_studentwise_signature_ajax()
	{
		$this->db->where('signature_for', $this->input->post('student_type'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_signature');
		echo json_encode($result->result());
	}
	public function get_all_session()
	{
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_session');
		return $result->result();
	}
	public function delete_center()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_center', array('is_deleted' => '1'));
		return true;
	}
	public function get_all_document_heads()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_document_head');
		return $result->result();
	}
	public function get_user_added_document_privilege($id)
	{
		$this->db->where('user_id', $id);
		$result = $this->db->get('tbl_user_documentation_privilege');
		$result = $result->row();
		return $result;
	}
	public function get_single_terms_and_conditions()
	{
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_terms_and_conditions');
		return $result->row();
	}
	public function set_terms_and_conditions()
	{
		$existing_terms = $this->db->get('tbl_terms_and_conditions')->row();
		if ($existing_terms) {
			$data = array(
				'terms_and_conditions' => $this->input->post('terms_and_conditions')
			);
			$this->db->update('tbl_terms_and_conditions', $data);
		} else {
			$data = array(
				'terms_and_conditions' => $this->input->post('terms_and_conditions')
			);
			$this->db->insert('tbl_terms_and_conditions', $data);
		}
		return true;
	}
	public function get_single_privacy_policy()
	{
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_privacy_policy');
		return $result->row();
	}
	public function set_privacy_policy()
	{
		$existing_terms = $this->db->get('tbl_privacy_policy')->row();
		if ($existing_terms) {
			$data = array(
				'privacy_policy' => $this->input->post('privacy_policy')
			);
			$this->db->update('tbl_privacy_policy', $data);
		} else {
			$data = array(
				'privacy_policy' => $this->input->post('privacy_policy')
			);
			$this->db->insert('tbl_privacy_policy', $data);
		}
		return true;
	}
	public function get_single_certificate_fees()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_certificate_fees_relation');
		return $result->row();
	}
	public function get_all_fees_session()
	{
		$this->db->where('is_deleted', '0');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_session');
		return $result->result();
	}
	public function get_all_fees_course_stream_relation()
	{
		$this->db->select('tbl_course_stream_relation.*,tbl_course.course_name,tbl_course.course_type');
		$this->db->where('tbl_course_stream_relation.is_deleted', '0');
		$this->db->order_by('tbl_course.course_name', 'ASC');
		$this->db->group_by('tbl_course_stream_relation.course');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_course_stream_relation.course');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}
	public function set_course_stream_exam_fees()
	{
		$exp = explode("@@@", $this->input->post('stream'));
		$data = array(
			'course_id' 		=> $this->input->post('course'),
			'relation_id' 		=> $exp[0],
			'stream_id' 		=> $exp[1],
			'session_id' 		=> $this->input->post('session'),
			'admission_fees' 	=> $this->input->post('admission_fees'),
			'rr_fees' 			=> $this->input->post('rr_fees'),
			'exam_fees' 		=> $this->input->post('exam_fees'),
			'degree_fees' 		=> $this->input->post('degree_fees'),
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_exam_fees_relation', $new_arr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_exam_fees_relation', $data);
			return 1;
		}
	}
	public function set_certificate_fees()
	{
		$data = array(
			'certificate_type' 			=> $this->input->post('certificate_type'),
			'certificate_fees' 			=> $this->input->post('certificate_fees'),
		);
		if ($this->uri->segment(2) == "") {
			$date = array(
				'added_by'	 => $this->session->userdata('admin_id'),
				'created_on' => date("Y-m-d H:i:s"),
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_certificate_fees_relation', $new_arr);
		} else {
			$updated = array(
				'updated_by'	=> $this->session->userdata('admin_id'),
			);
			$this->db->where('id', $this->uri->segment(2));
			$new_arr = array_merge($data, $updated);
			$this->db->update('tbl_certificate_fees_relation', $new_arr);
		}
		return true;
	}
	public function get_all_course_stream_exam_fees_ajax($length, $start, $search)
	{
		$this->db->select('tbl_exam_fees_relation.*,tbl_course.course_name,tbl_course.course_type,tbl_stream.stream_name,tbl_session.session_name');
		$this->db->where('tbl_exam_fees_relation.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_exam_fees_relation.admission_fees', $search);
			$this->db->or_like('tbl_exam_fees_relation.rr_fees', $search);
			$this->db->or_like('tbl_exam_fees_relation.exam_fees', $search);
			$this->db->or_like('tbl_exam_fees_relation.center_fees', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_exam_fees_relation.id', 'DESC');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_exam_fees_relation.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_exam_fees_relation.stream_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_exam_fees_relation.session_id');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_exam_fees_relation');
		return $result->result();
	}
	public function get_all_course_stream_exam_fees_count($search)
	{
		$this->db->where('tbl_exam_fees_relation.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_exam_fees_relation.admission_fees', $search);
			$this->db->or_like('tbl_exam_fees_relation.rr_fees', $search);
			$this->db->or_like('tbl_exam_fees_relation.exam_fees', $search);
			$this->db->or_like('tbl_exam_fees_relation.center_fees', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course', 'tbl_course.id = tbl_exam_fees_relation.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_exam_fees_relation.stream_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_exam_fees_relation.session_id');
		$result = $this->db->get('tbl_exam_fees_relation');
		return $result->num_rows();
	}
	public function get_all_certificate_fees_ajax($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('certificate_type', $search);
			$this->db->or_like('certificate_fees', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_certificate_fees_relation');
		return $result->result();
	}
	public function get_all_certificate_fees_ajax_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('certificate_type', $search);
			$this->db->or_like('certificate_fees', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_certificate_fees_relation');
		return $result->num_rows();
	}
	public function active_certificate_fees()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_certificate_fees_relation', array('status' => '1'));
		$this->db->where('id !=', $this->uri->segment(2));
		$this->db->update('tbl_certificate_fees_relation', array('status' => '0'));
		return true;
	}
	public function inactive_certificate_fees()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_certificate_fees_relation', array('status' => '0'));
		return true;
	}
	public function delete_certificate_fees()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_certificate_fees_relation', array('is_deleted' => '1'));
		return true;
	}
	public function set_question()
	{
		// echo "<pre>";print_r($signature);exit;
		$data = array(
			'question' 				=> $this->input->post('question'),
			'short_description' 	=> $this->input->post('short_description'),
			'long_description' 		=> $this->input->post('long_description'),
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_help_setup', $new_arr);
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_help_setup', $data);
		}
		return true;
	}
	public function get_single_question()
	{
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_help_setup');
		return $result->row();
	}
	public function get_all_question()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_help_setup');
		return $result->result();
	}
	public function get_all_question_ajax($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('question', $search);
			$this->db->or_like('short_description', $search);
			$this->db->or_like('long_description', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_help_setup');
		return $result->result();
	}
	public function get_all_question_ajax_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('question', $search);
			$this->db->or_like('short_description', $search);
			$this->db->or_like('long_description', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_help_setup');
		return $result->num_rows();
	}
	public function get_help_setup_record()
	{
		// echo "<pre>" ;print_r($_GET['search']);exit;
		if (isset($_GET['search']) && ($_GET['search']) != "") {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->order_by('id', 'DESC');
			if (isset($_GET['search']) && $_GET['search']) {
				$searchTerm = $this->input->get('search', true);
				$this->db->like('question', $searchTerm);
			}
			$result = $this->db->get('tbl_help_setup');
			return $result->result();
		} else {
			return array();
		}
	}
	public function get_seo_meta_data()
	{						
		$this->db->where('url', $this->uri->segment(1));
		$result = $this->db->get('tbl_seo_title');
		return $result->row();
	}
	public function get_single_center_session_data()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_center_active_session');
		return $result->row();
	}
	public function set_center_session(){
		if($this->input->post('center_id') == "All"){
			$this->db->where('is_deleted','0');
			$this->db->where('operation','1');
			$this->db->where('status','1');
			$center = $this->db->get('tbl_center');
			$center = $center->result();
			if(!empty($center)){
				foreach($center as $center_result){
					$this->db->where('center_id',$center_result->id);
					$this->db->where('session_id',$this->input->post('session_id'));
					$this->db->where('is_deleted','0');
					$exist = $this->db->get('tbl_center_active_session');
					$exist = $exist->row();
					if(!empty($exist)){
						$update_data = array(
							'course_mode' 		=> $this->input->post('course_mode'),
							'year_late_fee' 	=> $this->input->post('year_late_fee'),
							'sem_late_fee'		=> $this->input->post('sem_late_fee'),
							'month_late_fee'  	=> $this->input->post('month_late_fee')
						);
						$this->db->where('id',$exist->id);
						$this->db->update('tbl_center_active_session',$update_data);
					}else{
						$update_data = array(
							'center_id' 		=> $center_result->id,
							'session_id' 		=> $this->input->post('session_id'),
							'course_mode' 		=> $this->input->post('course_mode'),
							'year_late_fee' 	=> $this->input->post('year_late_fee'),
							'sem_late_fee'		=> $this->input->post('sem_late_fee'),
							'month_late_fee'  	=> $this->input->post('month_late_fee'),
							'created_on'		=> date("Y-m-d H:i:s")
						); 
						$this->db->insert('tbl_center_active_session',$update_data);
					}
				}
			}			
		}else{
			$data = array(
				'center_id' 				=> $this->input->post('center_id'),
				'session_id' 				=> $this->input->post('session_id'),
				'course_mode' 				=> $this->input->post('course_mode'),
				'year_late_fee' 			=> $this->input->post('year_late_fee'),
				'sem_late_fee' 				=> $this->input->post('sem_late_fee'),
				'month_late_fee' 			=> $this->input->post('month_late_fee'),
			); 
			if ($this->input->post('id') == "") {
				$date = array(
					'created_on' => date("Y-m-d H:i:s")
				);
				$new_arr = array_merge($data, $date);
				$this->db->insert('tbl_center_active_session', $new_arr);
			} else {
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_center_active_session', $data);
			}
		}
		return true;
	}
	public function get_all_center_data()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_center');
		return $result->result();
	}
	public function get_all_courses()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_course');
		return $result->result();
	}
	public function get_center_session_list_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_active_session.*,tbl_session.session_name,tbl_center.center_name');
		$this->db->where('tbl_center_active_session.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			
			$this->db->or_like('tbl_center_active_session.course_mode', $search);
			$this->db->or_like('tbl_center_active_session.sem_late_fee', $search);
			$this->db->or_like('tbl_center_active_session.year_late_fee', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_session','tbl_session.id = tbl_center_active_session.session_id','left');
		$this->db->join('tbl_center','tbl_center.id = tbl_center_active_session.center_id','left');
		$this->db->order_by('tbl_center_active_session.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_active_session');
		return $result->result();
	}
	public function get_center_session_list_ajax_count($search)
	{
		$this->db->select('tbl_center_active_session.*,tbl_session.session_name,tbl_center.center_name');
		$this->db->where('tbl_center_active_session.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			
			$this->db->or_like('tbl_center_active_session.course_mode', $search);
			$this->db->or_like('tbl_center_active_session.sem_late_fee', $search);
			$this->db->or_like('tbl_center_active_session.year_late_fee', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_session','tbl_session.id = tbl_center_active_session.session_id','left');
		$this->db->join('tbl_center','tbl_center.id = tbl_center_active_session.center_id','left');
		$this->db->order_by('tbl_center_active_session.id', 'DESC');
		$result = $this->db->get('tbl_center_active_session');
		return $result->num_rows();
	}
}