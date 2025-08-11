<?php class Admin_model extends CI_model{
	public function __construct(){
		parent::__construct();
	}
	public function login(){
		$api_url = api_url."get_verification_user_login"; 
		$form_data = array(
			'email'  => $this->input->post('email'),
			'password'  => $this->input->post('password'),
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		$response = json_decode($response);
		if(!empty($response)){
			$data = array(
				'user_id' => $response->id
			);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		} 
	}
    public function forgot_password(){
        $this->db->where('email',$this->input->post("email"));
        $result=$this->db->get('tbl_employee');
        $temp=$result->row();
        if($result->num_rows() > 0){
			$new_pass=mt_rand(1111,9999);;
			$data=array('password'=>md5($new_pass));        
			$this->db->where('id',$temp->id);
			$this->db->update('tbl_employee',$data);        
			$this->load->library('email');
			$this->email->from('noreply@gmail.com');
			$this->email->to($this->input->post('email')); 
			$this->email->subject('Reset Password.');
			$this->email->set_mailtype("html");
			$message = "Dear $temp->name,<br>Your password has been reset. Now you can login with new password.<br>Your new login password is  $new_pass";
			$this->email->to($this->input->post('email'));
			$this->email->message($message); 
			if($this->email->send()){  
			}else{ 
			}	 
			return 1; 
		}else{
			return 0; 
		}
    }
    public function get_profile_details(){     
		$api_url = api_url."get_verification_user_profile"; 
		$form_data = array(
			'id'  => $this->session->userdata("user_id"), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		
		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
    }
    public function update_profile(){
		$api_url = api_url."get_update_profile_verification"; 
		$cfile = "";
		if($_FILES['file']['name']){
           $cfile = curl_file_create($_FILES['file']['tmp_name'],$_FILES['file']['type'],$_FILES['file']['name']);
		}   
		$form_data = array(
			'id'  				=> $this->session->userdata("user_id"), 
			'name'  			=> $this->input->post("name"), 
			'email'  			=> $this->input->post("email"), 
			'mobile_number'  	=> $this->input->post("mobile_number"), 
			'file'  			=> $cfile,  
			'old_file'  		=> $this->input->post('old_img'),  
		);   
		$client = curl_init($api_url);  
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);  
		curl_setopt($client, CURLOPT_SAFE_UPLOAD, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client);  
		 
		return $response = json_decode($response);
	} 
	public function update_password(){
		$api_url = api_url."set_password_update"; 
		$form_data = array(
			'id'  => $this->session->userdata("user_id"), 
			'new_password'  => $this->input->post("new_password"), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function get_new_verification_list(){
		$api_url = api_url."get_new_verification_list";
		if(isset($_GET['month'])){
			$month = base64_decode($_GET['month']);
		}else{
			$month = "";
		}
		$form_data = array(
			'id'  => $this->session->userdata("user_id"), 
			'session'  => $month, 
		); 
		$client = curl_init($api_url); 
	
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt( $client, CURLOPT_HTTPAUTH, CURLAUTH_NTLM ); 
		
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client); 
		//echo "<pre>";print_r($response);echo "yes";exit;
		curl_close($client);  
		return $response = json_decode($response);
	}
	public function get_new_pending_list(){
		$api_url = api_url."get_new_pending_list";
		if(isset($_GET['month'])){
			$month = base64_decode($_GET['month']);
		}else{
			$month = "";
		}
		$form_data = array(
			'id'  => $this->session->userdata("user_id"), 
			'session'  => $month, 
		); 
		$client = curl_init($api_url); 
	
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt( $client, CURLOPT_HTTPAUTH, CURLAUTH_NTLM ); 
		
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client); 
		//echo "<pre>";print_r($response);echo "yes";exit;
		curl_close($client);  
		return $response = json_decode($response);
	}
	public function get_new_document_pending_list(){
		$api_url = api_url."get_new_document_pending_list";
		if(isset($_GET['month'])){
			$month = base64_decode($_GET['month']);
		}else{
			$month = "";
		}
		$form_data = array(
			'id'  => $this->session->userdata("user_id"), 
			'session'  => $month, 
		); 
		$client = curl_init($api_url); 
	
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt( $client, CURLOPT_HTTPAUTH, CURLAUTH_NTLM ); 
		
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client); 
		//echo "<pre>";print_r($response);echo "yes";exit;
		curl_close($client);  
		return $response = json_decode($response);
	}
	public function blended_student_list(){
		$api_url = api_url."blended_student_list";
		if(isset($_GET['month'])){
			$month = base64_decode($_GET['month']);
		}else{
			$month = "";
		}
		$form_data = array(
			'id'  => $this->session->userdata("user_id"), 
			'session'  => $month, 
		); 
		$client = curl_init($api_url); 
	
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt( $client, CURLOPT_HTTPAUTH, CURLAUTH_NTLM ); 
		
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client); 
		//echo "<pre>";print_r($response);echo "yes";exit;
		curl_close($client);  
		return $response = json_decode($response);
	}
	public function rejected_student_list(){
		$api_url = api_url."get_rejected_student_list"; 
		$form_data = array(
			'id'  => $this->session->userdata("user_id"), 
		); 
		$client = curl_init($api_url); 
	
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt( $client, CURLOPT_HTTPAUTH, CURLAUTH_NTLM ); 
		
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		$response = curl_exec($client); 
		//echo "<pre>";print_r($response);echo "yes";exit;
		curl_close($client);  
		return $response = json_decode($response);
	}
	public function get_my_verified_student(){
		$api_url = api_url."get_my_verified_student"; 
		$form_data = array(
			'id'  => $this->session->userdata("user_id"), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client);  
		return $response = json_decode($response);
	}
	public function get_single_verification_student(){
		$api_url = api_url."get_single_verification_student"; 
		$form_data = array(
			'id'  			=> $this->session->userdata("user_id"), 
			'student_id'  	=> base64_decode($this->uri->segment(2)), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function get_blended_single_verified_remark(){
		$api_url = api_url."get_blended_single_verified_remark"; 
		$form_data = array(
			'id'  			=> $this->session->userdata("user_id"), 
			'student_id'  	=> base64_decode($this->uri->segment(2)), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function verified_blended_student_list(){
		$api_url = api_url."verified_blended_student_list"; 
		$form_data = array(
			'id'  			=> $this->session->userdata("user_id"),  
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function rejected_blended_student_list(){
		$api_url = api_url."rejected_blended_student_list"; 
		$form_data = array(
			'id'  			=> $this->session->userdata("user_id"),  
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function get_single_blended_verification_student(){
		$api_url = api_url."get_single_blended_verification_student"; 
		$form_data = array(
			'id'  			=> $this->session->userdata("user_id"), 
			'student_id'  	=> base64_decode($this->uri->segment(2)), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function get_single_verification_student_qualification(){
		$api_url = api_url."get_single_verification_student_qualification"; 
		$form_data = array(
			'id'  			=> $this->session->userdata("user_id"), 
			'student_id'  	=> base64_decode($this->uri->segment(2)), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
		
		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function get_single_verified_date(){
		$api_url = api_url."get_single_verified_date"; 
		$form_data = array(
			'id'  			=> $this->session->userdata("user_id"), 
			'student_id'  	=> base64_decode($this->uri->segment(2)), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function set_verification_student(){
		$api_url = api_url."set_verification_student";
		$form_data = array(
			'user_id'  				=> $this->session->userdata("user_id"), 
			'student_id'  			=> base64_decode($this->uri->segment(2)), 
			'student_type'  		=> $this->input->post('student_type'), 
			'name_verified'  		=> $this->input->post('name_verified'), 
			'name_remark'  			=> $this->input->post('name_remark'), 
			'father_verified'  		=> $this->input->post('father_verified'), 
			'father_remark'  		=> $this->input->post('father_remark'), 
			'mother_verified'  		=> $this->input->post('mother_verified'), 
			'mother_remark'  		=> $this->input->post('mother_remark'), 
			'birth_verified'  		=> $this->input->post('birth_verified'), 
			'birth_remark'  		=> $this->input->post('birth_remark'), 
			'nationality_verified'  => $this->input->post('nationality_verified'), 
			'nationality_remark'  	=> $this->input->post('nationality_remark'), 
			'address_verified'  	=> $this->input->post('address_verified'), 
			'address_remark'  		=> $this->input->post('address_remark'), 
			'city_verified'  		=> $this->input->post('city_verified'), 
			'city_remark'  			=> $this->input->post('city_remark'), 
			'pin_verified'  		=> $this->input->post('pin_verified'), 
			'pin_remark'  			=> $this->input->post('pin_remark'), 
			'state_verified'  		=> $this->input->post('state_verified'), 
			'state_remark'  		=> $this->input->post('state_remark'), 
			'country_verified'  	=> $this->input->post('country_verified'), 
			'country_remark'  		=> $this->input->post('country_remark'), 
			'mobile_verified'  		=> $this->input->post('mobile_verified'), 
			'mobile_remark'  		=> $this->input->post('mobile_remark'), 
			'email_verified'  		=> $this->input->post('email_verified'), 
			'category_verified'  	=> $this->input->post('category_verified'), 
			'cauntry_remark'  		=> $this->input->post('cauntry_remark'), 
			'gender_verified'  		=> $this->input->post('gender_verified'), 
			'gender_remark'  		=> $this->input->post('gender_remark'), 
			'year_verified'  		=> $this->input->post('year_verified'), 
			'year_remark'  			=> $this->input->post('year_remark'), 
			'secondary_verified' 	=> $this->input->post('secondary_verified'), 
			'secondary_remark'  	=> $this->input->post('secondary_remark'),
			'sr_secondary_verified' => $this->input->post('sr_secondary_verified'), 
			'sr_secondary_remark'  	=> $this->input->post('sr_secondary_remark'),
			'graduation_verified'  	=> $this->input->post('graduation_verified'), 
			'graduation_remark'  	=> $this->input->post('graduation_remark'),
			'graduation_verified'  	=> $this->input->post('graduation_verified'), 
			'graduation_remark'  	=> $this->input->post('graduation_remark'),
			'post_gratuation_verified' => $this->input->post('post_gratuation_verified'), 
			'post_gratuation_remark' => $this->input->post('post_gratuation_remark'),
			'other_verified'  		=> $this->input->post('other_verified'), 
			'other_remark'  		=> $this->input->post('other_remark'),
			'facebook_url'  		=> $this->input->post('facebook_url'), 
			'facebook_verified'  	=> $this->input->post('facebook_verified'), 
			'facebook_remark'  		=> $this->input->post('facebook_remark'), 
			'instagram_url'  		=> $this->input->post('instagram_url'), 
			'instagram_verified'  	=> $this->input->post('instagram_verified'), 
			'instagram_remark'  	=> $this->input->post('instagram_remark'), 
			'linkedin_url'  		=> $this->input->post('linkedin_url'), 
			'linkedin_verified'  	=> $this->input->post('linkedin_verified'), 
			'linkedin_remark'  		=> $this->input->post('linkedin_remark'), 
			'remark'  				=> $this->input->post('remark'), 
			'photo_verified'  		=> $this->input->post('photo_verified'), 
			'id_verified'  			=> $this->input->post('id_verified'), 
			'id_remark'  			=> $this->input->post('id_remark'), 
			'final_verification'  	=> $this->input->post('final_verification'), 
			'reject_verification'  	=> $this->input->post('reject_verification'), 
		);  
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
	public function get_session_list(){
		$api_url = api_url."get_session_list"; 
		$form_data = array(
			'id'  			=> $this->session->userdata("user_id"), 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client);  
		curl_close($client);  
		return $response = json_decode($response);
	}
	public function set_blended_erification_student(){
		$api_url = api_url."set_blended_erification_student";
		$form_data = array(
			'user_id'  				=> $this->session->userdata("user_id"), 
			'student_id'  			=> base64_decode($this->uri->segment(2)), 
			'student_type'  		=> $this->input->post('student_type'), 
			'name_verified'  		=> $this->input->post('name_verified'), 
			'name_remark'  			=> $this->input->post('name_remark'), 
			'father_verified'  		=> $this->input->post('father_verified'), 
			'father_remark'  		=> $this->input->post('father_remark'), 
			'mother_verified'  		=> $this->input->post('mother_verified'), 
			'mother_remark'  		=> $this->input->post('mother_remark'), 
			'birth_verified'  		=> $this->input->post('birth_verified'), 
			'birth_remark'  		=> $this->input->post('birth_remark'), 
			'address_verified'  	=> $this->input->post('address_verified'), 
			'address_remark'  		=> $this->input->post('address_remark'), 
			'mobile_verified'  		=> $this->input->post('mobile_verified'), 
			'mobile_remark'  		=> $this->input->post('mobile_remark'), 
			'email_verified'  		=> $this->input->post('email_verified'), 
			'gender_verified'  		=> $this->input->post('gender_verified'), 
			'gender_remark'  		=> $this->input->post('gender_remark'), 
			'year_verified'  		=> $this->input->post('year_verified'), 
			'year_remark'  			=> $this->input->post('year_remark'), 
			'document_verified'  	=> $this->input->post('document_verified'), 
			'documents_remark'  	=> $this->input->post('documents_remark'), 
			'facebook_url'  		=> $this->input->post('facebook_url'), 
			'facebook_verified'  	=> $this->input->post('facebook_verified'), 
			'facebook_remark'  		=> $this->input->post('facebook_remark'), 
			'instagram_url'  		=> $this->input->post('instagram_url'), 
			'instagram_verified'  	=> $this->input->post('instagram_verified'), 
			'instagram_remark'  	=> $this->input->post('instagram_remark'), 
			'linkedin_url'  		=> $this->input->post('linkedin_url'), 
			'linkedin_verified'  	=> $this->input->post('linkedin_verified'), 
			'linkedin_remark'  		=> $this->input->post('linkedin_remark'), 
			'remark'  				=> $this->input->post('remark'), 
			'id_verified'  			=> $this->input->post('id_verified'), 
			'id_remark'  			=> $this->input->post('id_remark'), 
			'photo_verified'  		=> $this->input->post('photo_verified'), 
			'final_verification'  	=> $this->input->post('final_verification'), 
			'reject_verification'  	=> $this->input->post('reject_verification'), 
		);  
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($client); 
		curl_close($client); 
		return $response = json_decode($response);
	}
} 

