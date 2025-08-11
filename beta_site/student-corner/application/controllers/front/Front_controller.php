<?php 
class Front_controller extends CI_Controller{
	public function about(){
		$this->load->view('front/about');
	}
	public function terms_condition(){
		$this->load->view('front/terms_condition');
	}
	public function privacy_policy(){
		$this->load->view('front/privacy_policy');
	}
	public function contact(){
	$this->form_validation->set_rules('full_name','full name','required');
		if ($this->form_validation->run()=== FALSE){
		$this->load->view('front/contact');
		}else{
			$message = "Full Name : ". $this->input->post('full_name').'<br>'."Mobile No : ".$this->input->post('phone_number').'<br>'. "Email :".$this->input->post('email').'<br>'."Message :".$this->input->post('message').'<br>';
             
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; 
			$this->email->initialize($config);
			$this->email->from('no-reply@golinguistics.com');
			$this->email->to('golinguisticsvaishali@gmail.com');
			$this->email->cc('rohittiwarirr111@gmail.com');
			$this->email->subject('Received Enquiry | Going');
			$this->email->message($message);
			$this->email->set_mailtype('html'); 
			if($this->email->send()){
			$this->session->set_flashdata('success','Enquiry Send  successfull!');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('message','Something wrong!');
			redirect($_SERVER['HTTP_REFERER']); 
		}
		}

	}
  	public function course_detail(){
  		if($this->input->post('pay_button') == 'pay_now'){
  			$res=$this->Front_model->payment_data();
  			if ($res) {
  				// code...
  			} else {
  				// code...
  			}
  			
  		}else{
			$data['course']=$this->Front_model->get_course_list();
			$data['course_single']=$this->Front_model->get_single_course();
			$data['topic_beginner']=$this->Front_model->get_topic_beginner();
			$data['topic_intermediate']=$this->Front_model->get_topic_intermediate();
			$data['topic_advance']=$this->Front_model->get_topic_advance();
			$this->load->view('front/course_detail',$data);
		}
	}
	public function register(){
		$this->form_validation->set_rules("email","Email is required","required");
		if ($this->form_validation->run()===FALSE){
		$this->load->view('front/register');
		}else{
			$response=$this->Front_model->register();
			if($response==1){
				$this->session->set_flashdata("success","Please check your register mobile number!");
				redirect("registration_otp_verification");
			}elseif($response==2){
				$this->session->set_flashdata("message","Email Or mobile Already Exist!");
				redirect('register');
			}else{
				$this->session->set_flashdata("message","Something went wrong!");
				redirect('register');
			}
		}
	}
	public function forgot_password(){
		$this->form_validation->set_rules("email","Email is required","required");
		if ($this->form_validation->run()===FALSE){
		$this->load->view('front/forgot_password');
		}else{
			if($email=$this->Front_model->forgot_password()){
			$this->session->set_flashdata("success","Password send to your registered mobile number!");
				redirect("login");
			}else{
				$this->session->set_flashdata("message","Email/mobile number does not exist!");
				redirect("forgot-password");
			}
		}
	}
	public function registration_otp_verification(){
		$this->form_validation->set_rules("otp","otp","required");
		if($this->form_validation->run()===FALSE){
			$this->load->view('front/registration_otp_verification');
		}else{
			if($this->input->post("otp")==$this->session->userdata('reg_otp')){
				$result = $this->Front_model->verify_user_registration();
				if($result == 1){
					$this->session->set_flashdata("success"," Congratulations! Registration Successful.");
					redirect("login");
				}else{
					$this->session->set_flashdata("message","Please enter valid otp!");
					redirect("registration_otp_verification");
				}
			}else{
				$this->session->set_flashdata("message","Please enter valid otp!");
				redirect("registration_otp_verification");
			}
		}
	}
	public function resend_otp(){
		$result=$this->Front_model->get_register_user_info(); 
		if($this->session->userdata('reg_mobile_number')){
			// $this->session->userdata('aknowledge_number'); 
			$otp = mt_rand(100000, 999999);
			$this->session->set_userdata('reg_otp', $otp); 
			// $this->session->set_userdata('count', '1'); 
			$username = 'golinguistics';
		    $apiKey = 'A971B-61D48';
		    $apiRequest = 'Text';
		    // Message details
		    $numbers = $result->mobile_number; // Multiple numbers separated by comma
		    $sender = 'GOLING';
		    $message = 'Hello '.$result->first_name.' '. $result->last_name.',%0a%0aYour OTP for login is '.$otp.' Do not share with anyone.%0a%0aGOLING';
		    $templateid = "1507164087314050004";
		    // Route details
		    $apiRoute = 'TRANS';
		    // Prepare data for POST request
		    $data = 'username='.$username.'&apikey='.$apiKey.'&apirequest='.$apiRequest.'&route='.$apiRoute.'&mobile='.$numbers.'&sender='.$sender."&TemplateID=".$templateid."&message=".$message;
		    // Send the GET request with cURL
		    $url = 'http://login.webpayservices.in/sms-panel/api/http/index.php?'.$data;
		    $url = preg_replace("/ /", "%20", $url);
		    $response = file_get_contents($url);

			// $count = $this->session->userdata('count') + 1;
			// $this->session->set_userdata('count', $count);
			echo "OTP sent to register mobile no.";

		}
	}
	// public function update_login_time(){
	// 	$this->Front_model->update_login_time();

	// }
	public function check_login_otp(){
		$this->Front_model->check_login_otp();

	}
	public function book_free_demo(){
		$this->form_validation->set_rules("full_name","full name","required");
		if ($this->form_validation->run()===FALSE){
			$data['demo_course']=$this->Front_model->get_course_list_demo();
			$this->load->view('front/book_free_demo',$data);
		}else{
			$result = $this->Front_model->set_book_free_demo();
			$this->session->set_flashdata('success','Thanks for the submitting your information, we will get back to you soon!');
			redirect('book_free_demo');
		}
	}
	public function become_trainer(){
		$this->form_validation->set_rules("full_name","full name","required");
		if ($this->form_validation->run()===FALSE){
			$data['demo_course']=$this->Front_model->get_course_list_demo();
			$this->load->view('front/become_trainer',$data);
		}else{
			$result = $this->Front_model->set_become_trainer();
			$this->session->set_flashdata('success','Thanks for the submitting your information, we will get back to you soon!');
			redirect('become_trainer');
		}
	} 
 }
?>


