<?php class Web_model extends CI_model{	
    public function get_all_courses(){  
		$api_url = api_url."get_all_bvoc_courses"; 
		$form_data = array( 
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
    public function get_all_course_streams(){  
		$api_url = api_url."get_all_bvoc_streams"; 
		$form_data = array( 
		); 
		$client = curl_init($api_url); 
		curl_setopt($client, CURLOPT_POST, true); 
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data); 
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false); 
		$response = curl_exec($client);  
		//print_r($response);exit;
		curl_close($client); 
		return $response = json_decode($response); 		 
    }

	public function get_all_courses_result($id){
		$api_url = api_url."get_bvoc_course_details"; 
		$form_data = array( 
			'id'	=>	$id,
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
	
	public function get_course_stream_details($id){
		$api_url = api_url."get_all_bvoc_stream_details"; 
		$form_data = array( 
			'id'	=>	$id,
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
	
	public function get_course_faq($id){
		$api_url = api_url."get_course_faq"; 
		$form_data = array( 
			'id'	=>	$id,
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

	public function get_all_city() {
		$api_url = api_url."get_bvoc_india_cities"; 
		$form_data = array( 
			
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

