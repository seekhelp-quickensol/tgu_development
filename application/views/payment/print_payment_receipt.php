<?php
$university_details = $this->Setting_model->get_university_details(); 
$receipt_no = "";  
$date_of_receipt = ""; 
$enrollment_number = ""; 
$student_name = ""; 
$print_name = ""; 
$stream_name = ""; 
$address = ""; 
$mobile = ""; 
$email = ""; 
$ref_level = "Enrollment No"; 
$pay_for=""; 
$transaction_id = ""; 
$print_amount = "";
$payment_by = ""; 
$order_status = "Failed"; 
if($this->uri->segment(3) == "tbl_examination_form"){
	$this->db->select('tbl_student_fees.*,tbl_examination_form.payment_status as form_payment_status, tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_student_fees.id',$this->uri->segment(2)); 
	$this->db->join('tbl_examination_form','tbl_examination_form.id = tbl_student_fees.examination_id'); 
	$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id'); 
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id'); 
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id'); 
	$this->db->join('countries','countries.id = tbl_student.country','left'); 
	$this->db->join('states','states.id = tbl_student.state','left'); 
	$this->db->join('cities','cities.id = tbl_student.city','left');  
	$result = $this->db->get('tbl_student_fees'); 
	$result = $result->row();	
// 	echo '<pre>'; print_r($result); exit;
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
	$date_of_receipt = date("d/m/Y",strtotime($result->payment_date)); 
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
	$payment_by = $result->student_name;
	$print_amount = $result->total_fees;
	if($result->form_payment_status == "1"){
		$order_status = "Success";
	}else if($result->form_payment_status == "0"){
		$order_status = "Failed";
	}else if($result->form_payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_re_appear"){
	$this->db->select('tbl_re_appear.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');  
	$this->db->where('tbl_re_appear.id',$this->uri->segment(2)); 
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
	$date_of_receipt = date("d/m/Y",strtotime($result->payment_date)); 
	$enrollment_number = $result->enrollment_number; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Enrollment No"; 
	$pay_for="Re Appear Exam Fees"; 
	$payment_by = $result->student_name;
	$transaction_id = $result->payment_id; 
	$print_amount = $result->amount;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_student"){ 
	$this->db->select('tbl_student_fees.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_student_fees.id', $this->uri->segment(2));
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
	$date_of_receipt = date("d/m/Y",strtotime($result->payment_date)); 
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_re_registered_student"){ 
	$this->db->select('tbl_student_fees.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_student_fees.id', $this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id'); 
	//$this->db->join('tbl_re_registered_student','tbl_re_registered_student.student_id = tbl_student_fees.student_id'); 
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id'); 
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id'); 
	$this->db->join('countries','countries.id = tbl_student.country','left'); 
	$this->db->join('states','states.id = tbl_student.state','left'); 
	$this->db->join('cities','cities.id = tbl_student.city','left');  
	$result = $this->db->get('tbl_student_fees'); 
	$result = $result->row();    
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
	$date_of_receipt = date("d/m/Y",strtotime($result->payment_date)); 
	$enrollment_number = $result->student_id; 
	$student_name = $result->student_name; 
	$print_name = $result->print_name; 
	$stream_name = $result->stream_name; 
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode; 
	$mobile = $result->mobile; 
	$email = $result->email; 
	$ref_level = "Registration No"; 
	$pay_for="Re Registration Fees"; 
	$transaction_id = $result->transaction_id; 
	$print_amount = $result->total_fees;
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_student_migration"){  
	$this->db->select('tbl_student_migration.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');  
	$this->db->where('tbl_student_migration.id',$this->uri->segment(2));  
	$this->db->join('tbl_student','tbl_student.id = tbl_student_migration.student_id','left'); 
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id','left'); 
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left'); 
	$this->db->join('countries','countries.id = tbl_student.country','left'); 
	$this->db->join('states','states.id = tbl_student.state','left'); 
	$this->db->join('cities','cities.id = tbl_student.city','left'); 
	$result = $this->db->get('tbl_student_migration'); 
	$result = $result->row();   
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_student_transfer"){
	$this->db->select('tbl_student_transfer.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name'); 
	$this->db->where('tbl_student_transfer.id',$this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_student_transfer.student_id','left');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id','left');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left');
	$result = $this->db->get('tbl_student_transfer');
	$result = $result->row();    
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_student_degree"){
	$receipt_no = "";  
	$date_of_receipt = ""; 
	$enrollment_number = ""; 
	$student_name = ""; 
	$print_name = ""; 
	$stream_name = ""; 
	$address = ""; 
	$mobile = ""; 
	$email = ""; 
	$ref_level = "Enrollment No"; 
	$pay_for=""; 
	$transaction_id = ""; 
	$print_amount = "";
	$payment_by = ""; 
	$order_status = "Failed"; 
}else if($this->uri->segment(3) == "tbl_student_provisional_degree"){
	$this->db->select('tbl_student_provisional_degree.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');  
	$this->db->where('tbl_student_provisional_degree.id',$this->uri->segment(2));  
	$this->db->join('tbl_student','tbl_student.id = tbl_student_provisional_degree.student_id','left');  
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id','left'); 
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left'); 
	$this->db->join('countries','countries.id = tbl_student.country','left'); 
	$this->db->join('states','states.id = tbl_student.state','left'); 
	$this->db->join('cities','cities.id = tbl_student.city','left'); 
	$result = $this->db->get('tbl_student_provisional_degree'); 
	$result = $result->row();    
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_bonafide_cer_application"){
	$this->db->select('tbl_bonafide_cer_application.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_bonafide_cer_application.id',$this->uri->segment(2)); 
	$this->db->join('tbl_student','tbl_student.id = tbl_bonafide_cer_application.student_id'); 
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id'); 
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id'); 
	$this->db->join('countries','countries.id = tbl_student.country'); 
	$this->db->join('states','states.id = tbl_student.state'); 
	$this->db->join('cities','cities.id = tbl_student.city'); 
	$result = $this->db->get('tbl_bonafide_cer_application'); 
	$result = $result->row();    
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_bonafide_cer_application_scholarship"){ 
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_bonafide_cer_application_scholarship.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_bonafide_cer_application_scholarship.id',$this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_bonafide_cer_application_scholarship.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_bonafide_cer_application_scholarship');
	$result = $result->row();
	$receipt_no = "";
	if(strlen($result->id) == "1"){
		$receipt_no = "SBON-000".$result->id;    
	}else if(strlen($result->id) == "2"){
		$receipt_no = "SBON-00".$result->id;     
	}else if(strlen($result->id) == "3"){
		$receipt_no = "SBON-0".$result->id;     
	}else{
		$receipt_no = "SBON-".$result->id;
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
	$pay_for="Scholarship Bonafide Certificate Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_medium_instruction_application"){ 
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_medium_instruction_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_medium_instruction_application.id',$this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_medium_instruction_application.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_medium_instruction_application');
	$result = $result->row();
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_no_backlog_application"){ 
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_no_backlog_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_no_backlog_application.id',$this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_no_backlog_application.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_no_backlog_application');
	$result = $result->row();
	$data = array(
		'student_id' => $result->student_id
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_no_split_application"){ 
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_no_split_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_no_split_application.id',$this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_no_split_application.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_no_split_application');
	$result = $result->row();
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_reccom_letter_application"){ 
	$this->db->select('tbl_reccom_letter_application.*,tbl_course.print_name,tbl_stream.stream_name,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_reccom_letter_application.id',$this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_reccom_letter_application.student_id'); 
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id'); 
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id'); 
	$this->db->join('countries','countries.id = tbl_student.country'); 
	$this->db->join('states','states.id = tbl_student.state'); 
	$this->db->join('cities','cities.id = tbl_student.city'); 
	$result = $this->db->get('tbl_reccom_letter_application'); 
	$result = $result->row();  
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_reccom_letter_application_second"){ 
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_reccom_letter_application_second.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_reccom_letter_application_second.id',$this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_reccom_letter_application_second.student_id'); 
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_reccom_letter_application_second');
	$result = $result->row(); 
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
	$pay_for="II Recommendation Letter Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}else if($this->uri->segment(3) == "tbl_character_certificate"){ 
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_character_certificate.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_character_certificate.id',$this->uri->segment(2));
	$this->db->join('tbl_student','tbl_student.id = tbl_character_certificate.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_character_certificate');
	$result = $result->row();
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "CHC-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "CHC-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "CHC-0".$result->id;     
	}else{
	    $receipt_no = "CHC-".$result->id;
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
	$payment_by = $result->student_name;
	if($result->payment_status == "1"){
		$order_status = "Success";
	}else if($result->payment_status == "0"){
		$order_status = "Failed";
	}else if($result->payment_status == "2"){
		$order_status = "Aborted";
	}
}
include('final_receipt.php');

?> 



