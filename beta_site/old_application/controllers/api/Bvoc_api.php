<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Bvoc_api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_bvoc_courses()
    {
        $this->Bvoc_model->get_all_bvoc_courses();
    }
    public function get_all_bvoc_streams()
    {
        $this->Bvoc_model->get_all_bvoc_streams();
    }
    public function get_course_faq()
    {
        $this->Bvoc_model->get_course_faq();
    }

    public function get_bvoc_course_details()
    {
        $this->Bvoc_model->get_bvoc_course_details();
    }
    public function get_all_bvoc_stream_details()
    {
        $this->Bvoc_model->get_all_bvoc_stream_details();
    }

    public function get_bvoc_india_cities()
    {
        $this->Bvoc_model->get_bvoc_india_cities();
    }
}
