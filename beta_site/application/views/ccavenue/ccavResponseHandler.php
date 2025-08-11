<?php include('Crypto.php');
$university_details = $this->Setting_model->get_university_details();
//error_reporting(0);
$order_status = "";
$order_id = "";
$tracking_id = "";
$bank_ref_no = "";
$amount = "0";
$payment_by = "";
$table = "";
$date_of_receipt = "";
$enrollment_number = "";
$student_name = "";
$print_name = "";
$stream_name = "";
$address = "";
$mobile = "";
$email = "";
$ref_level = "";
$pay_for="";
$transaction_id = "";
$print_amount = ""; 


$workingKey=CCWORKINGCODE;		
$encResponse=$_POST["encResp"];			 
$rcvdString=decrypt($encResponse,$workingKey);		 
$order_status="";
$decryptValues=explode('&', $rcvdString);
$dataSize=sizeof($decryptValues);  
for($i = 0; $i < $dataSize; $i++) {
	$information=explode('=',$decryptValues[$i]); 
	if($i==3)	$order_status=$information[1];  
	if($i==0)	$order_id=$information[1];  
	if($i==1)	$tracking_id=$information[1];  
	if($i==2)	$bank_ref_no=$information[1];  
	if($i==10)	$amount=$information[1]; 
	if($i==27)  $table = $information[1];
}  
if($table == "tbl_student"){ 
	$data = array( 
		'transaction_id' => $tracking_id, 
	); 
	$this->db->where('id', $order_id); 
	$this->db->update('tbl_student_fees', $data);  
	$this->db->where('transaction_id', $tracking_id); 
	$this->db->where('id !=', $order_id); 
	$exist = $this->db->get('tbl_student_fees'); 
	$exist = $exist->row(); 
	if (!empty($exist)) { 
		$order_status = "Failure"; 
	} 
	$this->db->where('id', $order_id); 
	$real_fees = $this->db->get('tbl_student_fees'); 
	$real_fees = $real_fees->row();  
	if($order_status === "SUCCESS"){ 
		$data = array( 
			'transaction_id' 		=> $tracking_id, 
			'payment_status' 	=> '1', 
		); 
		$this->db->where('id', $order_id); 
		$this->db->update('tbl_student_fees', $data);  
		$this->db->where('id', $order_id); 
		$fees_data = $this->db->get('tbl_student_fees'); 
		$fees_data = $fees_data->row(); 
		$this->db->where('id', $fees_data->student_id); 
		$student_details = $this->db->get("tbl_student"); 
		$student_details = $student_details->row(); 
		$this->db->where('id', $fees_data->center_id); 
		$center_details = $this->db->get("tbl_center"); 
		$center_details = $center_details->row();  
		$this->db->where('id', $student_details->faculty_id); 
		$faculty = $this->db->get('tbl_faculty'); 
		$faculty = $faculty->row();   
		$this->db->where('faculty', $student_details->faculty_id); 
		$this->db->where('course', $student_details->course_id); 
		$this->db->where('stream', $student_details->stream_id); 
		$this->db->where('is_deleted', '0'); 
		$this->db->where('status', '1'); 
		$course_code = $this->db->get('tbl_course_stream_relation'); 
		$course_code = $course_code->row(); 
		$this->db->where('id', $student_details->center_id); 
		$center_details = $this->db->get("tbl_center"); 
		$center_details = $center_details->row(); 
		$this->db->where('id', $student_details->session_id); 
		$session_year = $this->db->get('tbl_session'); 
		$session_year = $session_year->row();  
		$session_date = $lastTwoDigits1 = substr($session_year->session_name, -2);  
		$enrollment = ""; 
		$enrollment .= $session_date; 
		if(!empty($center_details)){ 
			//$enrollment .= $center_details->center_code; 
		} 
		if(!empty($course_code)){ 
			$enrollment .= $course_code->course_code; 
		}  
		if(!empty($faculty)){  
			//$enrollment .= $faculty->faculty_code;  
		}   
		$last_digit = 10000; 
		if(strlen($student_details->id) == "1"){ 
				$last_digit = 10000; 
		} 
		if(strlen($student_details->id) == "2"){ 
				$last_digit = 1000; 
		} 
		if(strlen($student_details->id) == "3"){ 
				$last_digit = 100; 
		} 
		if(strlen($student_details->id) == "4"){ 
				$last_digit = 10; 
		} 
		if(strlen($student_details->id) == "5"){ 
				$last_digit = 1; 
		} 
		if(strlen($student_details->id) == "6"){ 
				$last_digit = ""; 
		} 
		$enrollment .=$last_digit.$student_details->id;  
		$enorlled_data = array( 
			'admission_status' 	=> '1', 
			'enrollment_number' => $enrollment, 
			'enrollment_date' 	=> date("Y-m-d"), 
		);   
		$this->db->where('id', $student_details->id); 
		$this->db->update("tbl_student", $enorlled_data);  
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}     
	$this->db->select('tbl_student_fees.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_student_fees.id', $order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left'); 
	$result = $this->db->get('tbl_student_fees');
	$result = $result->row();  
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "ADM-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "ADM-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "ADM-0".$result->id;     
	}else{
	    $receipt_no = "ADM-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->student_id;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Registration No";
	$pay_for="Admission Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->total_fees;
	$back_url = base_url()."center-dashboard";
 }else if($table == "tbl_re_registered_student"){ 
	$data = array( 
		'transaction_id' => $tracking_id, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_student_fees',$data);  
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_student_fees'); 
	$exist = $exist->row(); 
	if(!empty($exist)){  
		$order_status = "Failure"; 
	}  
	if($order_status==="Success"){   
		//$this->Web_model->update_payment_details($tracking_id,$order_id); 
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'payment_status' 	=> '1', 
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_student_fees',$data);  
		$this->db->where('id',$order_id); 
		$exist = $this->db->get('tbl_student_fees'); 
		$exist = $exist->row(); 
		if(!empty($exist)){  
			$data = array( 
				'year_sem' => $exist->year_sem 
			); 
			$this->db->where('id',$exist->student_id); 
			$this->db->update('tbl_student'); 
			$rr_data = array( 
				'payment_status' => '1', 
				'transaction_id' => $tracking_id, 
			); 
			$this->db->where('student_id',$exist->student_id); 
			$this->db->where('current_year_sem',$exist->year_sem); 
			$this->db->update('tbl_re_registered_student',$rr_data); 
		}   
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}     
	$this->db->where('id',$order_id); 
	$result = $this->db->get('tbl_student_fees'); 
	$result = $result->row();		  

    $this->db->select('tbl_student_fees.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student.id',$result->student_id); 
    $this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
    $this->db->join('countries','countries.id = tbl_student.country','left'); 
    $this->db->join('states','states.id = tbl_student.state','left'); 
    $this->db->join('cities','cities.id = tbl_student.city','left');  
	$result = $this->db->get("tbl_student_fees");  
	$result = $result->row();   
	$data = array(  
		'center_id' => $result->center_id  
	); 
	$this->session->set_userdata($data); 
	$receipt_no = ""; 
	if(strlen($result->id) == "1"){ 
	    $receipt_no = "RER-000".$result->id;     
	}else if(strlen($result->id) == "2"){ 
	    $receipt_no = "RER-00".$result->id;      
	}else if(strlen($result->id) == "3"){ 
	    $receipt_no = "RER-0".$result->id; 
	}else{ 
	    $receipt_no = "RER-".$result->id; 
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->student_id; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Re Registration Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->total_fees;
	$back_url = base_url()."center-dashboard";
 }else if($table == "tbl_bonafide_cer_application"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' 		=> $bank_ref_no, 
	);  
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_bonafide_cer_application',$data);   
	$this->db->where('transaction_id',$tracking_id);  
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_bonafide_cer_application'); 
	$exist = $exist->row(); 
	if(!empty($exist)){  
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id);   
	$real_fees =$this->db->get('tbl_bonafide_cer_application');  
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){ 
		$data = array(  
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1',  
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_bonafide_cer_application',$data);     
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}     
	$this->db->select('tbl_bonafide_cer_application.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_bonafide_cer_application.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_bonafide_cer_application.student_id');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_bonafide_cer_application');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "BON-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "BON-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "BON-0".$result->id;     
	}else{
	    $receipt_no = "BON-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Bonafide Letter Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard";
 }else if($table == "tbl_reccom_letter_application"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' 		=> $bank_ref_no, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_reccom_letter_application',$data); 
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_reccom_letter_application'); 
	$exist = $exist->row(); 
	if(!empty($exist)){ 
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id);  
	$real_fees =$this->db->get('tbl_reccom_letter_application'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){ 
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1', 
		);  
		$this->db->where('id',$order_id);  
		$this->db->update('tbl_reccom_letter_application',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}     
	$this->db->select('tbl_reccom_letter_application.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_reccom_letter_application.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_reccom_letter_application.student_id');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_reccom_letter_application');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = ""; 
	if(strlen($result->id) == "1"){ 
	    $receipt_no = "REC-000".$result->id;     
	}else if(strlen($result->id) == "2"){ 
	    $receipt_no = "REC-00".$result->id;      
	}else if(strlen($result->id) == "3"){ 
	    $receipt_no = "REC-0".$result->id; 
	}else{ 
	    $receipt_no = "REC-".$result->id; 
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Recommendation Letter Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard";
 }else if($table == "tbl_reccom_letter_application_second"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' 		=> $bank_ref_no, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_reccom_letter_application_second',$data);
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_reccom_letter_application_second'); 
	$exist = $exist->row(); 
	if(!empty($exist)){ 
		$order_status = "Failure"; 
	}  
	$this->db->where('id',$order_id); 
	$real_fees =$this->db->get('tbl_reccom_letter_application_second');  
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){  
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1', 
		);  
		$this->db->where('id',$order_id);  
		$this->db->update('tbl_reccom_letter_application_second',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}     
	$this->db->select('tbl_reccom_letter_application_second.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_reccom_letter_application_second.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_reccom_letter_application_second.student_id');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_reccom_letter_application_second');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "SRC-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "SRC-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "SRC-0".$result->id;     
	}else{
	    $receipt_no = "SRC-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Enrollment No";
	$pay_for="II Recommendation Letter Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard";
 }else if($table == "tbl_medium_instruction_application"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' => $bank_ref_no, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_medium_instruction_application',$data);   
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_medium_instruction_application'); 
	$exist = $exist->row(); 
	if(!empty($exist)){  
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id); 
	$real_fees =$this->db->get('tbl_medium_instruction_application'); 
	$real_fees =$real_fees->row();  
	if($order_status==="Success"){ 
		$data = array( 
			'transaction_id' 	=> $tracking_id,
			'reference_number' 	=> $bank_ref_no,
			'amount' 			=> $amount,
			'payment_status' 	=> '1',
			'application_status'=> '1',
		);
		$this->db->where('id',$order_id);
		$this->db->update('tbl_medium_instruction_application',$data);
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}     
	$this->db->select('tbl_medium_instruction_application.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_medium_instruction_application.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_medium_instruction_application.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_medium_instruction_application');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);	
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "MED-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "MED-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "MED-0".$result->id;     
	}else{
	    $receipt_no = "MED-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Enrollment No";
	$pay_for="Medium of Instruction Letter Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard";
 }else if($table == "tbl_no_backlog_application"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' => $bank_ref_no, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_no_backlog_application',$data);  
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_no_backlog_application'); 
	$exist = $exist->row(); 
	if(!empty($exist)){  
		$order_status = "Failure"; 
	}  
	$this->db->where('id',$order_id); 
	$real_fees =$this->db->get('tbl_no_backlog_application'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){ 
		$data = array(  
			'transaction_id' 	=> $tracking_id,  
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1', 
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_no_backlog_application',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}     
	$this->db->select('tbl_no_backlog_application.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_no_backlog_application.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_no_backlog_application.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_no_backlog_application');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "NOB-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "NOB-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "NOB-0".$result->id;     
	}else{
	    $receipt_no = "NOB-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Enrollment No";
	$pay_for="No Backlog Summary Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard";
 }else if($table == "tbl_no_split_application"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' => $bank_ref_no, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_no_split_application',$data);
	$this->db->where('transaction_id',$tracking_id);
	$this->db->where('id !=',$order_id);
	$exist = $this->db->get('tbl_no_split_application');
	$exist = $exist->row();
	if(!empty($exist)){
		$order_status = "Failure";
	}  
	$this->db->where('id',$order_id);  
	$real_fees =$this->db->get('tbl_no_split_application'); 
	$real_fees =$real_fees->row();  
	if($order_status==="Success"){ 
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1',  
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_no_split_application',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_no_split_application.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_no_split_application.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_no_split_application.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left');
	$result = $this->db->get('tbl_no_split_application');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "NOS-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "NOS-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "NOS-0".$result->id;     
	}else{
	    $receipt_no = "NOS-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Enrollment No";
	$pay_for="No Split Issue Letter Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard"; 
}else if($table == "tbl_student_migration"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' => $bank_ref_no, 
	);  
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_student_migration',$data); 
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_student_migration');  
	$exist = $exist->row(); 
	if(!empty($exist)){ 
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id); 
	$real_fees =$this->db->get('tbl_student_migration'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){ 
		$data = array(   
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1',  
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_student_migration',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_student_migration.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student_migration.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_migration.student_id','left');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id','left');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left');
	$result = $this->db->get('tbl_student_migration');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "MIG-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "MIG-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "MIG-0".$result->id;     
	}else{
	    $receipt_no = "MIG-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Enrollment No";
	$pay_for="Migration Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard"; 
}else if($table == "tbl_bonafide_cer_application"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' 		=> $bank_ref_no, 
	);  
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_bonafide_cer_application',$data);   
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_bonafide_cer_application'); 
	$exist = $exist->row(); 
	if(!empty($exist)){   
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id);  
	$real_fees =$this->db->get('tbl_bonafide_cer_application');
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){  
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1',  
		);  
		$this->db->where('id',$order_id);
		$this->db->update('tbl_bonafide_cer_application',$data);
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_bonafide_cer_application.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_bonafide_cer_application.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_bonafide_cer_application.student_id');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_bonafide_cer_application');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "BON-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "BON-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "BON-0".$result->id;     
	}else{
	    $receipt_no = "BON-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Enrollment No";
	$pay_for="Bonafide Letter Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard"; 
}else if($table == "tbl_student_provisional_degree"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' 		=> $bank_ref_no, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_student_provisional_degree',$data);   
	$this->db->where('transaction_id',$tracking_id);
	$this->db->where('id !=',$order_id);
	$exist = $this->db->get('tbl_student_provisional_degree');
	$exist = $exist->row();
	if(!empty($exist)){
		$order_status = "Failure";
	}
	$this->db->where('id',$order_id);
	$real_fees =$this->db->get('tbl_student_provisional_degree');
	$real_fees =$real_fees->row();
	if($order_status==="Success"){ 
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1',  
		);  
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_student_provisional_degree',$data);   
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_student_provisional_degree.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student_provisional_degree.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_provisional_degree.student_id','left');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id','left');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left');
	$result = $this->db->get('tbl_student_provisional_degree');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "PRD-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "PRD-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "PRD-0".$result->id;     
	}else{
	    $receipt_no = "PRD-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Provisional Degree Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard"; 
}else if($table == "tbl_student_transfer"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' 		=> $bank_ref_no,  
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_student_transfer',$data);   
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_student_transfer'); 
	$exist = $exist->row(); 
	if(!empty($exist)){ 
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id); 
	$real_fees =$this->db->get('tbl_student_transfer'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){  
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1',  
		);  
		$this->db->where('id',$order_id);   
		$this->db->update('tbl_student_transfer',$data);  
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_student_transfer.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student_transfer.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_transfer.student_id','left');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id','left');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left');
	$result = $this->db->get('tbl_student_transfer');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "TRC-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "TRC-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "TRC-0".$result->id;     
	}else{
	    $receipt_no = "TRC-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Transfer Certificate Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard"; 
}else if($table == "tbl_character_certificate"){ 
	$data = array( 
		'transaction_id' 		=> $tracking_id, 
		'reference_number' 		=> $bank_ref_no, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_character_certificate',$data);   
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_character_certificate'); 
	$exist = $exist->row(); 
	if(!empty($exist)){ 
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id);  
	$real_fees =$this->db->get('tbl_character_certificate'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){
			$data = array(
				'transaction_id' 	=> $tracking_id,
				'reference_number' 	=> $bank_ref_no,
				'amount' 			=> $amount,
				'payment_status' 	=> '1',
				'application_status'=> '1',
			);
			$this->db->where('id',$order_id);
			$this->db->update('tbl_character_certificate',$data);
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_character_certificate.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_character_certificate.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_character_certificate.student_id');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_character_certificate');
	$result = $result->row();
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "CEF-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "CEF-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "CEF-0".$result->id;     
	}else{
	    $receipt_no = "CEF-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Character Certificate Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard"; 
}else if($table == "tbl_examination_form"){ 
	 $data = array(		
		'transaction_id' => $tracking_id,	
	);	
	$this->db->where('id',$order_id);	
	$this->db->update('tbl_student_fees',$data);			
	$this->db->where('transaction_id',$tracking_id);	
	$this->db->where('id !=',$order_id);	
	$exist = $this->db->get('tbl_student_fees');	
	$exist = $exist->row();	
	if(!empty($exist)){	    
		$order_status = "Failure";	
	}	 
	if($order_status==="Success"){			
		$data = array(				
			'transaction_id' 		=> $tracking_id,				
			'payment_status' 		=> '1',			
		);			
		$this->db->where('id',$order_id);			
		$this->db->update('tbl_student_fees',$data); 						
		$this->db->where('id',$order_id);			
		$exam_id = $this->db->get('tbl_student_fees');			
		$exam_id = $exam_id->row();				
		$exam_data = array(				
			'payment_id' 		=> $tracking_id,				
			'payment_status' 		=> '1',			
		);				
		$this->db->where('id',$exam_id->examination_id);			
		$this->db->update('tbl_examination_form',$exam_data);			
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	 $this->db->select('tbl_student_fees.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email,tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student_fees.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_student_fees');
	$result = $result->row();		 		
	$data = array(		
		'center_id' => $result->center_id	
	);	
	$this->session->set_userdata($data);
	$receipt_no = "";	
	if(strlen($result->id) == "1"){	    
		$receipt_no = "EXA-000".$result->id;    	
	}else if(strlen($result->id) == "2"){	    
		$receipt_no = "EXA-00".$result->id;     	
	}else if(strlen($result->id) == "3"){	    
		$receipt_no = "EXA-0".$result->id;     	
	}else{	    
		$receipt_no = "EXA-".$result->id;	
	}	
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));	
	$enrollment_number = $result->enrollment_number;	
	$student_name = $result->student_name;	
	$print_name = $result->print_name;	
	$stream_name = $result->stream_name;	
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;	
	$mobile = $result->mobile;	
	$email = $result->email;	
	$ref_level = "Enrollment No";	
	$pay_for="Exam Fees";	
	$transaction_id = $result->transaction_id;	
	$print_amount = $result->amount;
	$back_url = base_url()."center-dashboard"; 
}else if($table == "tbl_new_admission"){ 
	 $data = array(
		'transaction_id' => $tracking_id,
	);
	$this->db->where('id', $order_id);
	$this->db->update('tbl_student_fees', $data);
	$this->db->where('transaction_id', $tracking_id);
	$this->db->where('id !=', $order_id);
	$exist = $this->db->get('tbl_student_fees');
	$exist = $exist->row();
	if (!empty($exist)) {
		$order_status = "Failure";
	}
	$this->db->where('id', $order_id);
	$real_fees = $this->db->get('tbl_student_fees');
	$real_fees = $real_fees->row(); 
	if ($order_status === "SUCCESS" && $real_fees->total_fees == $amount) {
		$data = array(
			'transaction_id' 	=> $tracking_id,
			'payment_status' 	=> '1',
		);
		$this->db->where('id', $order_id);
		$this->db->update('tbl_student_fees', $data);
		$this->db->where('id', $order_id);
		$fees_data = $this->db->get('tbl_student_fees');
		$fees_data = $fees_data->row(); 
		$this->db->where('id', $fees_data->student_id);
		$student_details = $this->db->get("tbl_student");
		$student_details = $student_details->row();
		$this->db->where('id', $student_details->faculty_id);
		$faculty = $this->db->get('tbl_faculty');
		$faculty = $faculty->row();
		$this->db->where('faculty', $student_details->faculty_id);
		$this->db->where('course', $student_details->course_id);
		$this->db->where('stream', $student_details->stream_id);
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$course_code = $this->db->get('tbl_course_stream_relation');
		$course_code = $course_code->row(); 
		$this->db->where('id', $student_details->center_id);
		$center_details = $this->db->get("tbl_center");
		$center_details = $center_details->row();
		$this->db->where('id', $student_details->session_id);
		$session_year = $this->db->get('tbl_session');
		$session_year = $session_year->row(); 
		$session_date = $lastTwoDigits1 = substr($session_year->session_name, -2); 
		$enrollment = "";
		$enrollment .= $session_date;
		if (!empty($center_details)) {
			//$enrollment .= $center_details->center_code;
		}
		if (!empty($course_code)) {
			$enrollment .= $course_code->course_code;
		}  
		if(!empty($faculty)){ 
			//$enrollment .= $faculty->faculty_code; 
		}  
		$last_digit = 10000;
		if(strlen($student_details->id) == "1"){
			$last_digit = 10000;
		}
		if(strlen($student_details->id) == "2"){
			$last_digit = 1000;
		}
		if(strlen($student_details->id) == "3"){
			$last_digit = 100;
		}
		if(strlen($student_details->id) == "4"){
			$last_digit = 10;
		}
		if(strlen($student_details->id) == "5"){
			$last_digit = 1;
		}
		if(strlen($student_details->id) == "6"){
			$last_digit = "";
		}
		$enrollment .=$last_digit.$student_details->id; 
		$enorlled_data = array(
			'admission_status' 	=> '1',
			'enrollment_number' => $enrollment,
			'enrollment_date' 	=> date("Y-m-d"),
		);
		$this->db->where('id', $student_details->id);
		$this->db->update("tbl_student", $enorlled_data);
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_student_fees.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_student_fees.id', $order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left'); 
	$result = $this->db->get('tbl_student_fees');
	$result = $result->row();  
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "ADM-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "ADM-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "ADM-0".$result->id;     
	}else{
	    $receipt_no = "ADM-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->student_id;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Registration No";
	$pay_for="Admission Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->total_fees;
	$back_url = base_url(); 
}else if($table == "new_tbl_re_registered_student"){ 
	 $data = array( 
		'transaction_id' => $tracking_id, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_student_fees',$data); 
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_student_fees'); 
	$exist = $exist->row(); 
	if(!empty($exist)){  
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id); 
	$real_fees = $this->db->get('tbl_student_fees'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success" && $real_fees->total_fees == $amount){ 
		$data = array(
			'transaction_id' 	=> $tracking_id,
			'payment_status' 	=> '1',
		);
		$this->db->where('id', $order_id);
		$this->db->update('tbl_student_fees', $data);
		$this->db->where('id', $this->session->userdata('re_reg_id'));
		$result = $this->db->get('tbl_re_registered_student');
		$result = $result->row();
		$previous_year_sem = 0;
		if(!empty($result)){
			$previous_year_sem = $result->previous_year_sem;
		}
		$current_year_sem = $previous_year_sem + 1;
		$data_two = array(
			'transaction_id' 	=> $tracking_id,
			'payment_status' 	=> '1',
			'current_year_sem' 	=> $current_year_sem,
		);
		$this->db->where('id', $this->session->userdata('re_reg_id'));
		$this->db->update('tbl_re_registered_student', $data_two);  
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_student_fees.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_student_fees.id', $order_id); 
	$this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id'); 
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id'); 
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id'); 
	$this->db->join('countries','countries.id = tbl_student.country','left'); 
	$this->db->join('states','states.id = tbl_student.state','left'); 
	$this->db->join('cities','cities.id = tbl_student.city','left');  
	$result = $this->db->get('tbl_student_fees'); 
	$result = $result->row();    
	$receipt_no = ""; 
	if(strlen($result->id) == "1"){ 
	    $receipt_no = "RRF-000".$result->id;     
	}else if(strlen($result->id) == "2"){ 
	    $receipt_no = "RRF-00".$result->id;      
	}else if(strlen($result->id) == "3"){ 
	    $receipt_no = "RRF-0".$result->id; 
	}else{ 
	    $receipt_no = "RRF-".$result->id; 
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Re Registration Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->total_fees;
	$back_url = base_url(); 
}else if($table == "tbl_new_exam"){ 
	 $data = array( 
		'transaction_id' => $tracking_id, 
	);
	$this->db->where('id',$order_id);
	$this->db->update('tbl_student_fees',$data);
	$this->db->where('transaction_id',$tracking_id);
	$this->db->where('id !=',$order_id);
	$exist = $this->db->get('tbl_student_fees');
	$exist = $exist->row();
	if(!empty($exist)){
		$order_status = "Failure";
	}
	$this->db->where('id',$order_id);
	$real_fees = $this->db->get('tbl_student_fees');
	$real_fees = $real_fees->row();
	if($order_status==="Success"){
		$data = array(
			'transaction_id' 		=> $tracking_id,
			'payment_status' 		=> '1',
			'total_fees' 			=> $amount,
		); 
		$this->db->where('id',$order_id);
		$this->db->update('tbl_student_fees',$data);
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_student_fees.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_student_fees.id',$order_id);
	$this->db->join('tbl_examination_form','tbl_examination_form.id = tbl_student_fees.examination_id');
	$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left'); 
	$result = $this->db->get('tbl_student_fees');
	$result = $result->row();		
	$receipt_no = "";
	if(strlen($result->id) == "1"){
		$receipt_no = "EXA-000".$result->id;    
	}else if(strlen($result->id) == "2"){
		$receipt_no = "EXA-00".$result->id;     
	}else if(strlen($result->id) == "3"){
		$receipt_no = "EXA-0".$result->id;     
	}else{
		$receipt_no = "EXA-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Enrollment No";
	$pay_for="Examination Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->total_fees;
	$back_url = base_url(); 
}else if($table == "new_tbl_re_appear"){ 
	$data = array( 
		'payment_id' => $tracking_id, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_re_appear',$data);  
	$this->db->where('payment_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_re_appear'); 
	$exist = $exist->row(); 
	if(!empty($exist)){ 
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id); 
	$real_fees = $this->db->get('tbl_re_appear'); 
	$real_fees =$real_fees->row();  
	if($order_status==="Success"){ 
		$data = array( 
			'payment_id' 		=> $tracking_id, 
			'payment_status' 	=> '1', 
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_re_appear',$data);   
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->select('tbl_re_appear.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');  
	$this->db->where('tbl_re_appear.id',$order_id);
	$this->db->join('tbl_student','tbl_student.enrollment_number = tbl_re_appear.enrollment_number');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left');  
	$result = $this->db->get('tbl_re_appear');
	$result = $result->row();	  
	$receipt_no = "";
	if(strlen($result->id) == "1"){
		$receipt_no = "RAE-000".$result->id;    
	}else if(strlen($result->id) == "2"){
		$receipt_no = "RAE-00".$result->id;     
	}else if(strlen($result->id) == "3"){
		$receipt_no = "RAE-0".$result->id;
	}else{
		$receipt_no = "RAE-".$result->id;
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Re Appear Exam Fees"; 
	$transaction_id = $result->payment_id; 
	$print_amount = $result->amount;
	$back_url = base_url(); 
}else if($table == "tbl_phd_registration_form"){ 
	$data = array(
		'payment_id' 		=> $tracking_id,
	); 
	$this->db->where('id', $order_id); 
	$this->db->update('tbl_phd_registration_form', $data);  
	$this->db->where('id', $order_id); 
	$exist = $this->db->get('tbl_phd_registration_form');
	$exist = $exist->row();
	if(!empty($exist)){ 
		$order_status = "Failure"; 
	} 
	$this->db->where('id', $order_id); 
	$real_fees = $this->db->get('tbl_phd_registration_form'); 
	$real_fees = $real_fees->row(); 
	if ($order_status === "SUCCESS" && $real_fees->amount == $amount) { 
		$data = array( 
			'payment_id' 		=> $tracking_id, 
			'amount' 			  => $amount, 
			'payment_status' 	=> '1', 
		); 
		$this->db->where('id', $order_id); 
		$this->db->update('tbl_phd_registration_form', $data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->select('tbl_phd_registration_form.*,tbl_course.print_name,tbl_stream.stream_name,countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_phd_registration_form.id', $order_id);
	$this->db->join('tbl_course','tbl_course.id = tbl_phd_registration_form.course');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_registration_form.stream');
	$this->db->join('countries','countries.id = tbl_phd_registration_form.country','left');
	$this->db->join('states','states.id = tbl_phd_registration_form.state','left');
	$this->db->join('cities','cities.id = tbl_phd_registration_form.city','left'); 
	$result = $this->db->get('tbl_phd_registration_form');
	$result = $result->row();  
	$receipt_no = "";
	if(strlen($result->id) == "1"){ 
	    $receipt_no = "PEF-000".$result->id;     
	}else if(strlen($result->id) == "2"){ 
	    $receipt_no = "PEF-00".$result->id;      
	}else if(strlen($result->id) == "3"){ 
	    $receipt_no = "PEF-0".$result->id; 
	}else{ 
	    $receipt_no = "PEF-".$result->id;
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->id; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = ''; 
	$address = $result->current_address; 
	$mobile = $result->mobile_number; 
	$email = $result->email_id; 
	$ref_level = "Registration No"; 
	$pay_for="Ph.D Entrance Fees"; 
	$transaction_id = $result->payment_id; 
	$print_amount = $result->amount;
	$back_url = base_url(); 
}else if($table == "tbl_phd_course_work"){ 
	$data = array(
		'transaction_id' 		=> $tracking_id, 
		'reference_number' 		=> $bank_ref_no,  
	);  
	$this->db->where('id',$order_id);  
	$this->db->update('tbl_phd_course_work',$data);  
	$this->db->where('transaction_id',$tracking_id); 
	$exist = $this->db->get('tbl_phd_course_work'); 
	$exist = $exist->row(); 
	if(empty($exist)){  
		$order_status = "Failure";  
	} 
	$this->db->where('id',$order_id);  
	$real_fees = $this->db->get('tbl_phd_course_work'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success" && $real_fees->payment_ammount == $amount){ 
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'payment_ammount' 	=> $amount, 
			'payment_status' 	=> '1', 
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_phd_course_work',$data);			 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->select('tbl_phd_course_work.*,tbl_course.print_name,tbl_stream.stream_name,countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_phd_course_work.id',$order_id);
	$this->db->join('countries','countries.id = tbl_phd_course_work.country_id');
	$this->db->join('states','states.id = tbl_phd_course_work.state_id');
	$this->db->join('cities','cities.id = tbl_phd_course_work.city_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_phd_course_work.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_course_work.stream_id');
	$result = $this->db->get('tbl_phd_course_work');
	$result = $result->row(); 
	$receipt_no = "";
	if(strlen($result->id) == "1"){ 
	    $receipt_no = "CWF-000".$result->id;     
	}else if(strlen($result->id) == "2"){ 
	    $receipt_no = "CWF-00".$result->id;      
	}else if(strlen($result->id) == "3"){ 
	    $receipt_no = "CWF-0".$result->id; 
	}else{ 
	    $receipt_no = "CWF-".$result->id;
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->id; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = ''; 
	$address = $result->address; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Registration No"; 
	$pay_for="Ph.D Course Work Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->payment_ammount;
	$back_url = base_url(); 
}else if($table == "new_tbl_re_evaluation_student"){ 
	$data = array( 
		'transaction_id' => $tracking_id, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_re_evaluation_student',$data);  
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_re_evaluation_student'); 
	$exist = $exist->row();  
	if(!empty($exist)){  
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id); 
	$real_fees = $this->db->get('tbl_re_evaluation_student'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success" && $real_fees->payment_amount == $amount){
		$data = array( 
			'payment_status' => '1', 
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_re_evaluation_student',$data);   
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->select('tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.center_id,tbl_student.address,tbl_student.pincode,tbl_student.id as registration_id,tbl_course.print_name,tbl_stream.stream_name,countries.name as country_name, states.name as state_name, cities.name as city_name,tbl_re_evaluation_student.*');
	$this->db->where('tbl_re_evaluation_student.id',$order_id);
	$this->db->join('tbl_student','tbl_student.enrollment_number = tbl_re_evaluation_student.enrollment_number');  
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id','left');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left');
	$result = $this->db->get("tbl_re_evaluation_student"); 
	$result = $result->row();  
	$receipt_no = ""; 
	if(strlen($result->id) == "1"){ 
		$receipt_no = "RRF-000".$result->id;     
	}else if(strlen($result->id) == "2"){ 
		$receipt_no = "RRF-00".$result->id;      
	}else if(strlen($result->id) == "3"){ 
		$receipt_no = "RRF-0".$result->id; 
	}else{ 
		$receipt_no = "RRF-".$result->id; 
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Re-evaluation Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->payment_amount;
	$back_url = base_url(); 
}else if($table == "tbl_document_verification"){ 
	$data = array( 
		'transaction_id' => $tracking_id, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_document_verification',$data); 
	$this->db->where('transaction_id',$tracking_id); 
	$exist = $this->db->get('tbl_document_verification'); 
	$exist = $exist->row(); 
	if(empty($exist)){  
		$order_status = "Failure"; 
	} 
	$this->db->where('id',$order_id); 
	$real_fees = $this->db->get('tbl_document_verification'); 
	$real_fees = $real_fees->row();  
	if($order_status==="Success" && $real_fees->amount == $amount){ 
		$data = array( 
			'transaction_id' 		=> $tracking_id, 
			'payment_ammount' 		=> $amount, 
			'payment_status' 		=> '1', 
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_document_verification',$data); 
		$this->db->where('id',$order_id); 
		$suc_pay = $this->db->get('tbl_document_verification'); 
		$suc_pay = $suc_pay->row();	   
		$exam_data = array( 
			'payment_id' 			=> $tracking_id, 
			'payment_status' 		=> '1', 
		); 
		$this->db->where('id',$suc_pay->examination_id); 
		$this->db->where('payment_status','0');  
		$this->db->update('tbl_document_verification',$exam_data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	$this->db->where('id',$order_id); 
	$result = $this->db->get('tbl_document_verification'); 
	$result = $result->row();	  
	$receipt_no = ""; 
	if(strlen($result->id) == "1"){ 
		$receipt_no = "DVF-000".$result->id;     
	}else if(strlen($result->id) == "2"){ 
		$receipt_no = "DVF-00".$result->id;      
	}else if(strlen($result->id) == "3"){ 
		$receipt_no = "DVF-0".$result->id; 
	}else{ 
		$receipt_no = "DVF-".$result->id; 
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on)); 
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->name; 
	$print_name = $result->course_name; 
	$stream_name = ""; 
	$address = $result->address; 
	$mobile = $result->mobile_number; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Document Verification Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->amount;
	$back_url = base_url(); 
}else if($table == "tbl_balance_student"){ 
	$this->db->where('id',$order_id); 
	$real_fees = $this->db->get('tbl_balance_student'); 
	$real_fees = $real_fees->row();  
	
	$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_balance_student.balance_fees,tbl_balance_student.id as balance_id');
	$this->db->where('tbl_balance_student.id',$order_id);
	$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_balance_student.enrollment_no');  
	$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id'); 
	$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id'); 
	$this->db->join('countries', 'countries.id = tbl_student.country'); 
	$this->db->join('states', 'states.id = tbl_student.state'); 
	$this->db->join('cities', 'cities.id = tbl_student.city');
	$result_student = $this->db->get('tbl_balance_student');
	$result_student = $result_student->row();
	if($order_status==="Success"){  
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'payment_status' 	=> '1', 
			'student_id'		=> $result_student->id,
			'payment_mode'		=> '1',
			'payment_date'		=> date("Y-m-d"),
			'payment_status'	=> '1',
			'bank_id'			=> '1',
			'late_fees'			=> '0',
			'lateral_entry_fees'=> '0',
			'bank_fees'			=> '0',
			'registration_fees'	=> '0',
			'original_amount'	=> '0',
			'amount'			=> $amount,
			'discount'			=> '0',
			'total_fees'		=> $amount,
			'year_sem'			=> $result_student->year_sem,
			'fees_type'			=> '1',
			'created_on'        => date("Y-m-d H:i:s")
		); 
		$this->db->insert('tbl_student_fees',$data); 
		$data_fee = array(
			'is_deleted' => "1"
		);
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_balance_student',$data_fee);  
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}  
	  
	$receipt_no = ""; 
	if(strlen($result_student->balance_id) == "1"){ 
		$receipt_no = "BLP-000".$result_student->balance_id;     
	}else if(strlen($result_student->balance_id) == "2"){ 
		$receipt_no = "BLP-00".$result_student->balance_id;      
	}else if(strlen($result_student->balance_id) == "3"){ 
		$receipt_no = "BLP-0".$result_student->balance_id; 
	}else{ 
		$receipt_no = "BLP-".$result_student->balance_id; 
	} 
	$date_of_receipt = date("d/m/Y",strtotime($result_student->created_on)); 
	$enrollment_number = $result_student->enrollment_number; 
	$student_name = $result_student->student_name; 
	$print_name = $result_student->course_name; 
	$stream_name = ""; 
	$address = $result_student->address; 
	$mobile = $result_student->mobile; 
	$email = $result_student->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Balance Admission Fees"; 
	$transaction_id = $tracking_id; 
	$print_amount = $amount;
	$back_url = base_url()."center-dashboard"; 
}else if($table == "tbl_direct_payment"){  
	
	if($order_status==="Success" && $real_fees->balance_fees == $amount){  
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'payment_status' 	=> '1', 
		); 
		$this->db->where('id', $order_id); 
		$this->db->update('tbl_center_wallet_history', $data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->where('id',$order_id); 
	$result = $this->db->get('tbl_center_wallet_history'); 
	$result = $result->row();		
	print_r($result);exit;
	$back_url = base_url()."center-dashboard"; 
	include('direct_receipt.php'); 
	exit;
}		
include('final_receipt.php'); 
?>
