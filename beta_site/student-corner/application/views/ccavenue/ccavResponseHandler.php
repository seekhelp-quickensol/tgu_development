<?php include('Crypto.php');
$university_details = $this->Front_model->get_university_details();  
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

if($table == "tbl_character_certificate"){ 
	$data = array( 
		'transaction_id' 	=> $tracking_id, 
		'reference_number' 	=> $bank_ref_no, 
		'payment_date' 	    => date("Y-m-d"), 
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
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_character_certificate.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
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
		'student_id' => $result->student_id
	); 
	$this->session->set_userdata($data);	

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
 }else if($table == "tbl_student_provisional_degree"){
	$data = array(
		'transaction_id' 	=> $tracking_id,
		'reference_number' => $bank_ref_no,
		'payment_date' 		=> date("Y-m-d"),
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
	if($order_status==="Success" && $real_fees->amount == $amount){
		$data = array(
			'transaction_id' 	=> $tracking_id,
			'reference_number' 	=> $bank_ref_no,
			'amount' 			=> $amount,
			'payment_status' 	=> '1', 
		);
		$this->db->where('id',$order_id);
		$this->db->update('tbl_student_provisional_degree',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_student_provisional_degree.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student_provisional_degree.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_provisional_degree.student_id');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_student_provisional_degree');
	$result = $result->row();

	$data = array(
		'student_id' => $result->student_id
	);
	$this->session->set_userdata($data); 
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "PRO-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "PRO-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "PRO-0".$result->id;     
	}else{
	    $receipt_no = "PRO-".$result->id;
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
	$pay_for="Provisional Degree";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
 }else if($table == "tbl_student_degree"){
	 $data = array(
		'transaction_id' 		=> $tracking_id,
		'reference_number' => $bank_ref_no,
	);
	$this->db->where('id',$order_id);
	$this->db->update('tbl_student_degree',$data);
	
	$this->db->where('transaction_id',$tracking_id);
	$this->db->where('id !=',$order_id);
	$exist = $this->db->get('tbl_student_degree');
	$exist = $exist->row();
	if(!empty($exist)){
	    //echo "exist";
		$order_status = "Failure";
	}
	$this->db->where('id',$order_id);
	$real_fees =$this->db->get('tbl_student_degree');
	$real_fees =$real_fees->row();
	if($order_status==="Success" && $real_fees->amount == $amount){
			$data = array(
				'transaction_id' 	=> $tracking_id,
				'reference_number' 	=> $bank_ref_no,
				'amount' 			=> $amount,
				'payment_status' 	=> '1',
			);
			$this->db->where('id',$order_id);
			$this->db->update('tbl_student_degree',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_student_degree.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student_degree.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_degree.student_id');
    $this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
    $this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_student_degree');
	$result = $result->row();

	$data = array(
		'student_id' => $result->student_id
	);
	$this->session->set_userdata($data);
	
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "DEG-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "DEG-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "DEG-0".$result->id;     
	}else{
	    $receipt_no = "DEG-".$result->id;
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
	$pay_for="Degree Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
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

	// echo "<pre>";print_r($exist);exit;
	if(!empty($exist)){ 
		$order_status = "Failure";
	} 
	$this->db->where('id',$order_id);
	$real_fees =$this->db->get('tbl_student_transfer');
	$real_fees =$real_fees->row();
	if($order_status==="Success" && $real_fees->amount == $amount){
			$data = array(
				'transaction_id' 	=> $tracking_id,
				'reference_number' 	=> $bank_ref_no,
				'amount' 			=> $amount,
				'payment_status' 	=> '1',
			);
			$this->db->where('id',$order_id);
			$this->db->update('tbl_student_transfer',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_student_transfer.*,tbl_student.enrollment_number,tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode,tbl_student.email,countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student_transfer.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_transfer.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_student_transfer');
	$result = $result->row();

	$data = array(
		'student_id' => $result->student_id
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "TRA-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "TRA-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "TRA-0".$result->id;     
	}else{
	    $receipt_no = "TRA-".$result->id;
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
 }else if($table == "tbl_transcript"){
	 $data = array(
		'transaction_id' 	=> $tracking_id,
		'reference_number' 	=> $bank_ref_no,
		'amount' 			=> $amount,
	);
	$this->db->where('registration_id',$order_id);
	$this->db->update('tbl_transcript',$data); 
	$this->db->where('transaction_id',$tracking_id);
	$this->db->where('registration_id !=',$order_id);
	$exist = $this->db->get('tbl_transcript');
	$exist = $exist->row();
	if(!empty($exist)){ 
		$order_status = "Failure";
	} 
	$this->db->where('registration_id',$order_id);
	$real_fees = $this->db->get('tbl_transcript');
	$real_fees =$real_fees->row(); 
	if($order_status==="Success" && $real_fees->amount == $amount){
			$data = array(
				'transaction_id' 	=> $tracking_id,
				'reference_number' 	=> $bank_ref_no,
				'amount' 			=> $amount,
				'payment_status' 	=> '1',
				'payment_mode' 	=> '1',
				'bank_id'       => '2',
				'payment_date'  => date("Y-m-d"),
			);
			$this->db->where('registration_id',$order_id);
			$this->db->update('tbl_transcript',$data); 
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_transcript.*,tbl_student.enrollment_number,tbl_student.center_id, tbl_student.student_name, tbl_student.mobile,tbl_student.email,tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_transcript.registration_id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_transcript.registration_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_transcript');
	$result = $result->row(); 
	$data = array(
		'center_id' => $result->center_id
	);
	$this->session->set_userdata($data); 
	
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "TRA-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "TRA-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "TRA-0".$result->id;     
	}else{
	    $receipt_no = "TRA-".$result->id;
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
	$pay_for="Transcript Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
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
	if($order_status==="Success" && $real_fees->amount == $amount){
		$data = array(
			'transaction_id' 	=> $tracking_id,
			'reference_number' 	=> $bank_ref_no,
			'amount' 			=> $amount,
			'payment_status' 	=> '1',
		);
		$this->db->where('id',$order_id);
		$this->db->update('tbl_student_migration',$data);
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_student_migration.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_student.email,tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_student_migration.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_student_migration.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id'); 
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_student_migration');
	$result = $result->row();

	$data = array(
		'student_id' => $result->student_id
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
 }else if($table == "tbl_consolidated_marksheet"){
	 $data = array(
		'payment_id' 		=> $tracking_id,
		'reference_number' => $bank_ref_no,
	);
	$this->db->where('id',$order_id);
	$this->db->update('tbl_consolidated_marksheet',$data); 
	$this->db->where('payment_id',$tracking_id);
	$this->db->where('id !=',$order_id);
	$exist = $this->db->get('tbl_consolidated_marksheet');
	$exist = $exist->row();
	if(!empty($exist)){ 
		$order_status = "Failure";
	} 
	$this->db->where('id',$order_id);
	$real_fees =$this->db->get('tbl_consolidated_marksheet');
	$real_fees =$real_fees->row();
	if($order_status==="Success" && $real_fees->amount == $amount){
		$data = array( 
			'payment_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_consolidated_marksheet',$data);  
	}else if($order_status==="Aborted"){
	}else if($order_status==="Failure"){
	}else{
	}   
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_consolidated_marksheet.*,tbl_student.id as student_id,tbl_student.enrollment_number,tbl_student.id as student_id,tbl_student.student_name,tbl_student.email,tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_consolidated_marksheet.id',$order_id);
	$this->db->join('tbl_student','tbl_student.enrollment_number = tbl_consolidated_marksheet.enrollment');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country','left');
	$this->db->join('states','states.id = tbl_student.state','left');
	$this->db->join('cities','cities.id = tbl_student.city','left');
	$result = $this->db->get('tbl_consolidated_marksheet'); 
	$result = $result->row();   
	$data = array( 
		'student_id' => $result->student_id 
	);
	$this->session->set_userdata($data);
	$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "CON-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "CON-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "CON-0".$result->id;     
	}else{
	    $receipt_no = "CON-".$result->id;
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
	$pay_for="Consolidate Marksheet Fees";
	$transaction_id = $result->payment_id;
	$print_amount = $result->amount;
 }else if($table == "tbl_bonafide_cer_application"){
	 $data = array( 
		'transaction_id' 	=> $tracking_id, 
		'reference_number' 	=> $bank_ref_no, 
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
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_bonafide_cer_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
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
		'student_id' => $result->student_id
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
	$pay_for="Bonafide Certificate Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
 }else if($table == "tbl_reccom_letter_application"){
	 $data = array( 
		'transaction_id' 	=> $tracking_id, 
		'reference_number' 	=> $bank_ref_no, 
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
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_reccom_letter_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
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
		'student_id' => $result->student_id
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
 }else if($table == "tbl_reccom_letter_application_second"){
	 $data = array( 
		'transaction_id' 	=> $tracking_id, 
		'reference_number' 	=> $bank_ref_no, 
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
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_reccom_letter_application_second.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
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
	'student_id' => $result->student_id
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
	$pay_for="II Recommendation Letter Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
 }else if($table == "tbl_medium_instruction_application"){
	 $data = array( 
		'transaction_id' 	=> $tracking_id, 
		'reference_number' 	=> $bank_ref_no, 
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
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_medium_instruction_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
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
	'student_id' => $result->student_id
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
 }else if($table == "tbl_no_backlog_application"){
	 $data = array( 
		'transaction_id' 	=> $tracking_id, 
		'reference_number' 	=> $bank_ref_no, 
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
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_no_backlog_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
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
 }else if($table == "tbl_no_split_application"){
	 $data = array( 
		'transaction_id' 	=> $tracking_id, 
		'reference_number' 	=> $bank_ref_no, 
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
	$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_no_split_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
	$this->db->where('tbl_no_split_application.id',$order_id);
	$this->db->join('tbl_student','tbl_student.id = tbl_no_split_application.student_id');
	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	$this->db->join('countries','countries.id = tbl_student.country');
	$this->db->join('states','states.id = tbl_student.state');
	$this->db->join('cities','cities.id = tbl_student.city');
	$result = $this->db->get('tbl_no_split_application');
	$result = $result->row();
	$data = array(
		'student_id' => $result->student_id
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
 } 
include('final_receipt.php'); 
?>
