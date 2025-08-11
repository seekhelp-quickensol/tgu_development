<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class my_json_library {
	private $json_model;

    public function __construct() {
        $this->json_model = get_instance()->load->model('json_model');
    }
	public function create_attendance_report_json(){
		// Read the JSON file
        $jsonData = json_decode(file_get_contents('json_files/employee_attendance.json'), true);
        // Remove all data
        $jsonData = [];
        // Save the empty array back to the file
        file_put_contents('json_files/employee_attendance.json', json_encode($jsonData));
		
		
		$from_date = '01-12-2023';
		$to_date = date('d-m-Y');
		$from_date_obj = new DateTime($from_date);
		$to_date_obj = new DateTime($to_date);
		$interval = $from_date_obj->diff($to_date_obj);
		$days_difference = $interval->days;
		
		
		$employee = $this->json_model->get_active_employee_list();
		if(!empty($employee)){
			foreach($employee as $employee_result){
				
				$employee_id = $employee_result->id;
				$employee_code = $employee_result->emp_id;
				$employee_image = $employee_result->emp_photo;
				$employee_name = $employee_result->first_name.' '.$employee_result->last_name;
				$employee_designation = $employee_result->designation;
				$employee_type = $employee_result->emp_type;
				$employee_department = $employee_result->department_name;
				$employee_designation_name = $employee_result->designation_name;
				
				$emp_all_data = [];
				
				for($i=0;$i<=$days_difference;$i++){
					$current_date = clone $from_date_obj;
					$current_date->add(new DateInterval('P' . $i . 'D'));
					$formatted_date = $current_date->format('d M, y');
					
					$date = $current_date->format('j');
					$month = $current_date->format('n'); 
					$year = $current_date->format('Y');
					
					$full_date = $year.'/'.$month.'/'.$date; //format date
					$get_name = date('l', strtotime($full_date)); //get week day
					$day_name = substr($get_name, 0, 3);
					
					$weekOfMonth = $this->json_model->weekOfMonth($date,$month,$year);
					$previous_one_day_date = $date.'-'.$month.'-'.$year;
					
					$emp_all_data[] = $this->json_model->get_employee_attandance_all_array_data($date,$month,$year,$employee_result->id,$weekOfMonth,$previous_one_day_date,$day_name);
					
				}
				
				//$emp_present_day = $this->hr_model->get_employee_total_present_days_date_wise($from_date,$to_date,$employee_result->id,$weekOfMonth=null);
												
				
				$data = array(
					'employee_id' 					=> $employee_id,
					'employee_code' 				=> $employee_code,
					'employee_image' 				=> $employee_image,
					'employee_name' 				=> $employee_name,
					'employee_designation' 			=> $employee_designation,
					'employee_designation_name' 	=> $employee_designation_name,
					'employee_type' 				=> $employee_type,
					'employee_department' 			=> $employee_department,
					'employee_attendance' 			=> json_encode($emp_all_data),
				);
				$json = $this->insert_row_json($data,'employee_attendance.json');
			}
		}
	}
	
	public function insert_row_json($newData,$filepath){	
		$data = $this->read_json($filepath);
		$data[] = $newData;
		$updatedJson = json_encode($data);
		file_put_contents('json_files/'.$filepath, $updatedJson);
		return true;
	}
	public function read_json($filepath){
		$json = file_get_contents('json_files/'.$filepath);
		$data = json_decode($json, true);
		return $data;
	}

	public function create_site_attendance_report_json(){
		// Read the JSON file
        $jsonData = json_decode(file_get_contents('json_files/site_employee_attendance.json'), true);
        // Remove all data
        $jsonData = [];
        // Save the empty array back to the file
        file_put_contents('json_files/site_employee_attendance.json', json_encode($jsonData));
		
		$from_date = '01-12-2023';
		$to_date = date('d-m-Y');
		$from_date_obj = new DateTime($from_date);
		$to_date_obj = new DateTime($to_date);
		$interval = $from_date_obj->diff($to_date_obj);
		$days_difference = $interval->days;
		
		$employee = $this->json_model->get_active_site_employee_list();

		if(!empty($employee)){
			foreach($employee as $employee_result){
				
				$employee_id = $employee_result->id;
				$employee_code = $employee_result->emp_id;
				$employee_image = $employee_result->emp_photo;
				$employee_name = $employee_result->first_name.' '.$employee_result->last_name;
				$employee_designation = $employee_result->designation;
				$employee_type = $employee_result->emp_type;
				$employee_department = $employee_result->department_name;
				$employee_designation_name = $employee_result->designation_name;
				
				$emp_all_data = [];
				
				for($i=0;$i<=$days_difference;$i++){
					$current_date = clone $from_date_obj;
					$current_date->add(new DateInterval('P' . $i . 'D'));
					$formatted_date = $current_date->format('d M, y');
					
					$date = $current_date->format('j');
					$month = $current_date->format('n'); 
					$year = $current_date->format('Y');
					
					$full_date = $year.'/'.$month.'/'.$date; //format date
					$get_name = date('l', strtotime($full_date)); //get week day
					$day_name = substr($get_name, 0, 3);
					
					$weekOfMonth = $this->json_model->weekOfMonth($date,$month,$year);
					$previous_one_day_date = $date.'-'.$month.'-'.$year;
					
					$emp_all_data[] = $this->json_model->get_site_employee_attandance_all_array_data($date,$month,$year,$employee_result->id,$weekOfMonth,$previous_one_day_date,$day_name);
					
				}
				
				//$emp_present_day = $this->hr_model->get_employee_total_present_days_date_wise($from_date,$to_date,$employee_result->id,$weekOfMonth=null);
												
				
				$data = array(
					'employee_id' 					=> $employee_id,
					'employee_code' 				=> $employee_code,
					'employee_image' 				=> $employee_image,
					'employee_name' 				=> $employee_name,
					'employee_designation' 			=> $employee_designation,
					'employee_designation_name' 	=> $employee_designation_name,
					'employee_type' 				=> $employee_type,
					'employee_department' 			=> $employee_department,
					'employee_attendance' 			=> json_encode($emp_all_data),
				);
				$json = $this->insert_row_json($data,'site_employee_attendance.json');
			}
		}
	}
	
}