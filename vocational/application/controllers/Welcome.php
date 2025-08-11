<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Digitalocean_model');
	}
	public function index()
	{
		$data['course'] = $this->Web_model->get_all_courses();
		$data['course_streams'] = $this->Web_model->get_all_course_streams();
		$data['city'] = $this->Web_model->get_all_city();
		$this->load->view('front/index', $data);
	}
	public function all_courses()
	{
		$data['course'] = $this->Web_model->get_all_courses();
		$data['course_streams'] = $this->Web_model->get_all_course_streams();
		// $data['course_list'] = $this->Web_model->get_all_courses_result($this->uri->segment(2));	
		$data['course_list'] = $this->Web_model->get_course_stream_details($this->uri->segment(2));
		if (!empty($data['course_list'])) {
			$data['faq'] = $this->Web_model->get_course_faq($data['course_list']->id);
		}
		// echo '<pre>'; print_r($data['course_list']); exit();	
		$this->load->view('front/all_courses', $data);
	}
	public function thankyou()
	{
		$this->load->view('front/thankyou');
	}
	public function our_program()
	{
		$this->load->view('front/our_program');
	}
	public function contact_details()
	{
		$this->load->view('front/contact_details');
	}
	public function email_details()
	{
		$this->load->view('front/email_details');
	}
	public function form()
	{
		$this->load->view('front/form');
	}
	public function university_ugc()
	{
		$this->load->view('front/ugc');
	}
	public function approvals()
	{
		$this->load->view('front/approval');
	}
	public function aicte()
	{
		$this->load->view('front/aicte');
	}
	public function bci()
	{
		$this->load->view('front/bci');
	}
	public function pci()
	{
		$this->load->view('front/pci');
	}
	public function aiu()
	{
		$this->load->view('front/aiu');
	}
	public function bpedvi()
	{
		$this->load->view('front/bpedvi');
	}
	public function dedidd()
	{
		$this->load->view('front/dedidd');
	}
	public function bpedhi()
	{
		$this->load->view('front/bpedhi');
	}
	public function dedhi()
	{
		$this->load->view('front/dedhi');
	}
	public function dedvi()
	{
		$this->load->view('front/dedvi');
	}
	public function bedidd()
	{
		$this->load->view('front/bedidd');
	}
	public function all_courses_error()
	{
		$this->load->view('front/coming_sson');
	}
	public function membership()
	{
		$this->load->view('front/members_and_certification');
	}
	public function accreditation()
	{
		$this->load->view('front/accreditation');
	}
	public function membership_inner()
	{
		$this->load->view('front/membership_inner');
	}
	public function rehabilitation()
	{
		$this->load->view('front/rehabilitation_new');
	}

	public function indian_council_of_agricultural_research_approval()
	{
		$this->load->view('front/agricultural_research_approval');
	}

	public function pharmacy_council_of_india_approval()
	{
		$this->load->view('front/pharmacy_council_of_india_approval');
	}

	public function bar_council_of_india()
	{
		$this->load->view('front/bar_council_of_india');
	}
}
