<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Common_model extends CI_Model { 

	public function set_previous_url(){
		$this->load->library('session');

		if ($this->session->userdata('previous_urls')) {
			$previous_urls = $this->session->userdata('previous_urls');
		} else {
			$previous_urls = array();
		}

		$current_url = current_url();

		if (!isset($previous_urls[0]) || $previous_urls[0] !== $current_url) {
			array_unshift($previous_urls, $current_url);
			$previous_urls = array_slice($previous_urls, 0, 3);
        
			$this->session->set_userdata('previous_urls', $previous_urls);
		}
	}

	public function generate_qrcode($name, $data, $path) {
		// QR Code File Directory
		$dir = FCPATH . $path;
	
		// Check if the directory exists, if not create it
		if (!is_dir($dir)) {
			mkdir($dir, 0777, true);
		}
	
		// Check if QR code for the given name already exists
		$existing_file = $dir . $name . '.png';
		if (file_exists($existing_file)) {
			// QR code already exists, return its URL
			$final_file_name = base_url() . $path . $name . '.png';
			return $final_file_name;
		}
	
		// Load the library
		$this->load->library('ciqrcode');
	
		// QR Configuration
		$config['cacheable'] = true;
		$config['imagedir'] = $dir;
		$config['quality'] = true;
		$config['size'] = '130';
		$config['black'] = array(255, 255, 255);
		$config['white'] = array(0, 0, 0);
		$this->ciqrcode->initialize($config);
	
		// QR Data
		$params['data'] = $data;
		$params['level'] = 'L';
		$params['size'] = 10;
		$params['savename'] = $dir . $name . '.png';
		// Generate and Save QR Code
		$this->ciqrcode->generate($params);
	
		$final_file_name = base_url() . $path . $name . '.png';
	
		return $final_file_name;
	}
	public function generate_qrcode_data($data) {
		// Load the library
		$this->load->library('ciqrcode');
		// QR Configuration
		$config['cacheable'] = true;
		$config['quality'] = true;
		$config['size'] = '150';
		$config['black'] = array(255, 255, 255);
		$config['white'] = array(0, 0, 0);
		$this->ciqrcode->initialize($config);

		// QR Data
		$params['data'] = $data;
		$params['level'] = 'L';
		$params['size'] = 10;
		
		// Generate QR Code and return data URI
		ob_start();
		$this->ciqrcode->generate($params);
		$image_data = ob_get_contents();
		ob_end_clean();
		
		$final_image_data = "data:image/png;base64," . base64_encode($image_data);

		return $final_image_data;
	}
	public function generate_qrcode_data_web($data) {
		// Load the library
		$this->load->library('ciqrcode');
		// QR Configuration
		$config['cacheable'] = true;
		$config['quality'] = true;
		$config['size'] = '150';
		$config['black'] = array(255, 255, 255);
		$config['white'] = array(0, 0, 0);
		$this->ciqrcode->initialize($config);
		
		// QR Data
		$params['data'] = "https://tgu.ac.in/";
		$params['level'] = 'L';
		$params['size'] = 10;
		
		// Generate QR Code and return data URI
		ob_start();
		$this->ciqrcode->generate($params);
		$image_data = ob_get_contents();
		ob_end_clean();
		
		$final_image_data = "data:image/png;base64," . base64_encode($image_data);
		
		return $final_image_data;
	}
}