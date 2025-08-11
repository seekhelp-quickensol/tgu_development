<?php

class User_ajax_controller extends CI_Controller{
	
	public function check_unique_email(){
		$this->Front_model->check_unique_email();
	}
	public function check_unique_mobile_no(){
		$this->Front_model->check_unique_mobile_no();
	}
	public function check_student_mcq_answer(){
		$this->Front_model->check_student_mcq_answer();
	}
	public function check_student_picture_question_answer(){
		$this->Front_model->check_student_picture_question_answer();
	}
	public function get_fill_blank_question_assessment(){
		$this->Front_model->get_fill_blank_question_assessment();
	}
	public function get_one_word_answer_question_assessment(){
		$this->Front_model->get_one_word_answer_question_assessment();
	}
	public function get_tick_mark_question_for_assessment(){
		$this->Front_model->get_tick_mark_question_for_assessment();
	}
	public function check_tick_mark_question_answer(){
		$this->Front_model->check_tick_mark_question_answer();
	}
	public function check_student_passage_reading_answer(){
		$this->Front_model->check_student_passage_reading_answer();
	}
	public function get_audio_for_fill_blank_question_assessment(){
		$this->Front_model->get_audio_for_fill_blank_question_assessment();
	}
	public function get_audio_for_tick_mark_question_assessment(){
		$this->Front_model->get_audio_for_tick_mark_question_assessment();
	}
	public function get_audio_for_one_word_question_assessment(){
		$this->Front_model->get_audio_for_one_word_question_assessment();
	}	
	public function get_match_the_following_question_for_assessment(){
		$this->Front_model->get_match_the_following_question_for_assessment();
	}
	public function check_student_fill_blank_answer(){
		$this->Front_model->check_student_fill_blank_answer();
	}
	public function check_student_one_word_question_answer_assessment(){
		$this->Front_model->check_student_one_word_question_answer_assessment();
	}
	public function get_test_paper_question(){
		$this->Front_model->get_test_paper_question();
	}	
	public function submit_student_test_mcq_answer(){
		$this->Front_model->submit_student_test_mcq_answer();
	}
	public function submit_test(){
		$this->Front_model->submit_test();
		
	}
	public function submit_student_test_fill_blank_answer(){
		$this->Front_model->submit_student_test_fill_blank_answer();
	}
	public function submit_student_one_word_answer_test(){
		$this->Front_model->submit_student_one_word_answer_test();
	}
	public function submit_test_picture_answer(){
		$this->Front_model->submit_test_picture_answer();
	}
	public function submit_student_test_passage_answer(){
		$this->Front_model->submit_student_test_passage_answer();
	}
	public function submit_test_tick_mark_answer(){
		$this->Front_model->submit_test_tick_mark_answer();
	}
	public function submit_test_match_following_answer(){
		$this->Front_model->submit_test_match_following_answer();
	}
	public function get_exam_attempt(){
		$this->Front_model->get_exam_attempt();
	}
	public function get_result_attempt_1(){
		$this->Front_model->get_result_attempt_1();
	}
	public function prepair_student_result(){
		$this->Front_model->prepair_student_result();
	}
	public function mark_as_complete(){
		$this->Front_model->mark_as_complete();
	}
	public function get_selected_news_details(){
		$this->Front_model->get_selected_news_details();
	}

}

?>