<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
/*===================MAIN WEBSITE===================*/ 
$route['default_controller'] = "Welcome/index"; 
$route['404_override'] 		= 'Welcome/page_not_found'; 
$route['send_birthday_wishes'] = "Welcome/send_birthday_wishes";
$route['home'] = "Welcome/index"; 
$route['visitor_form'] = "web/Web_controller/visitor_form"; 
$route['print_payment_receipt/(:any)/(:any)'] = "web/Web_controller/print_payment_receipt/$1"; 
$route['about-us'] = "web/Web_controller/about_us";  
$route['university-activities'] = "web/Web_controller/university_activities"; 
$route['all-rti'] = "web/Web_controller/all_rti"; 
$route['apply-now'] = "web/Web_controller/apply_now"; 
$route['admission-form'] = "web/Web_controller/admission_form"; 
$route['admission-form/(:any)'] = "web/Web_controller/admission_form/$1"; 
$route['re-registration-form'] = "web/Web_controller/re_registration_form"; 
$route['admission-procedure'] = "web/Web_controller/admission_procedure"; 
$route['phd_registration_form'] = "web/Web_controller/phd_registration_form"; 
$route['phd_registration_cash/(:any)'] = "web/Web_controller/phd_registration_cash/$1"; 
$route['hallticket'] = "web/Web_controller/hallticket"; 
$route['hallticket/(:any)'] = "web/Web_controller/hallticket/$1"; 
$route['syllabus-list'] = "web/Web_controller/syllabus_list"; 
$route['university-accouts'] = "web/Web_controller/university_accouts"; 
$route['vision-and-mission'] = "web/Web_controller/vision_and_mission"; 
$route['guide-application-form'] = "web/Web_controller/guide_application_form"; 
$route['press-release'] = "web/Web_controller/press_release"; 
$route['notice-board'] = "web/Web_controller/notice_board"; 
$route['extension-activities'] = "web/Web_controller/extension_activities"; 
$route['jivan-hospital'] = "web/Web_controller/jivan_hospital"; 
$route['advertisement'] = "web/Web_controller/advertisement"; 
$route['upload_my_qualification/(:any)/(:any)'] = "web/Web_controller/upload_my_qualification"; 
$route['university-approvals'] = "web/Web_controller/approvals"; 
$route['university-ugc'] = "web/Web_controller/university_ugc"; 
$route['indian-council-of-agricultural-research-approval'] = "web/Web_controller/indian_council_of_agricultural_research_approval"; 
$route['directorate-of-health-services-ap-notification'] = "web/Web_controller/directorate_of_health_services_ap_notification"; 
$route['directorate-of-medical-education-training-and-research-ap-notification'] = "web/Web_controller/directorate_of_medical_education_training_and_research_ap_notification";  
$route['bar-council-of-india'] = "web/Web_controller/bar_council_of_india"; 
$route['aiu'] = "web/Web_controller/aiu"; 
$route['grants-commission'] = "web/Web_controller/grants_commission"; 
//$route['information-center'] = "web/Web_controller/information_center"; 
$route['offices'] = "web/Web_controller/gurgaon_office"; 
$route['pharmacy-council-of-india-approval'] = "web/Web_controller/pharmacy_council_of_india_approval"; 
$route['chancellor-message'] = "web/Web_controller/chancler_message"; 
$route['university-ugc'] = "web/Web_controller/university_ugc"; 
$route['pro-chancellor-message'] = "web/Web_controller/pro_chancler_message"; 
$route['phd_entrance_details/(:any)'] = "web/Web_controller/phd_entrance_details/$1"; 
$route['chancellor-message'] = "web/Web_controller/chancler_message"; 
$route['vice-chancellor-message'] = "web/Web_controller/vice_chancler_message"; 
$route['registrar-message'] = "web/Web_controller/registrar_message"; 
$route['phd-registration-form'] = "web/Web_controller/phd_registration_form"; 
// $route['phd-exam-login'] = "web/Web_controller/phd_exam_login";  
$route['exam-timetable'] = "web/Web_controller/exam_timetable"; 
$route['hallticket-re-appear'] = "web/Web_controller/hallticket_re_appear";  
$route['hallticket_re_appear'] = "web/Web_controller/hallenquticket_re_appear";  
$route['result-view'] = "web/Web_controller/result_view"; 
$route['generate_cash_receipt'] = "web/Web_controller/generate_cash_receipt"; 
$route['print_inner_receipt/(:any)/(:any)'] = "web/Web_controller/print_inner_receipt/$1"; 
$route['print_cash_receipt/(:any)'] = "web/Web_controller/print_cash_receipt/$1"; 
$route['submit_enquiry'] = "web/Web_controller/submit_enquiry"; 
$route['direct_submit_enquiry'] = "web/Web_controller/direct_submit_enquiry"; 
$route['thank-you-for-enquiry'] = "web/Web_controller/thank_you_for_enquiry";  
$route["phd-course-work"] = "web/Web_controller/phd_course_work"; 
// $route["course-work-login"] = "web/Web_controller/course_work_login"; 
$route["phd_course_work/enrollment"] = "web/Web_controller/phd_course_work/$1"; 
// $route["phd_course_work_form"] = "web/Web_controller/phd_course_work"; 


$route["public-self-disclosure"] = "web/Web_controller/public_self_disclosure"; 


$route["phd_course_work_schedule"] = "admin/Research_controller/phd_course_work_schedule";

$route["phd_course_work_schedule/(:any)"] = "admin/Research_controller/phd_course_work_schedule/$1";



$route['awards'] = "web/Web_controller/awards";

$route['disaster-management'] = "web/Web_controller/disaster_management";

$route['chairman-desk'] = "web/Web_controller/chairman_desk";

$route['former-president-letter'] = "web/Web_controller/former_president_letter";

$route['campus'] = "web/Web_controller/campus";

$route['enquiry'] = "web/Web_controller/enquiry";

$route['thanks-for-enquiry'] = "web/Web_controller/thanks_for_enquiry";

$route['career'] = "web/Web_controller/career";

$route['contact-us'] = "web/Web_controller/contact_us";

$route['resend_otp'] = "web/Web_controller/resend_otp";

$route['resend_e_otp'] = "web/Web_controller/resend_e_otp";

$route['print_challan/(:any)/(:any)'] = "web/Web_controller/print_challan/$1";

$route['print_cash_boucher/(:any)/(:any)'] = "web/Web_controller/print_cash_boucher/$1";

//$route['faculty-of-commerce-and-management'] = "web/Web_controller/all_courses"; 

require_once(BASEPATH . 'database/DB' . EXT);

$db = &DB();

$faculty_rs = $db->get('tbl_faculty');

$faculty_rs = $faculty_rs->result();

//print_r($faculty_rs);

if (!empty($faculty_rs)) {

	foreach ($faculty_rs as $faculty_result) {

		//	echo strtolower($faculty_result->faculty_name);

		$route[str_replace(" ", "-", strtolower($faculty_result->faculty_name))] =  "web/Web_controller/all_courses";

		$route[str_replace(" ", "-", strtolower($faculty_result->faculty_name)) . '/(:any)'] =  "web/Web_controller/all_courses/$1";

	}

}



$course = $db->get('tbl_course');

$course = $course->result();

if (!empty($course)) {

	foreach ($course as $course_result) {

		$route[$course_result->course_link] =  "web/Web_controller/course_details";

		$route[$course_result->course_link . '/(:any)'] =  "web/Web_controller/course_details/$1";

	}

}

/*



$stream_link = $db->get('tbl_course_stream_relation');

$stream_link = $stream_link->result();

if (!empty($stream_link)) {

	foreach ($stream_link as $stream_link_result) {

		$route[$stream_link_result->course_link] =  "web/Web_controller/read_course_link";

		$route[$stream_link_result->course_link . '/(:any)'] =  "web/Web_controller/read_course_link/$1";

	}

}*/

$route['all-courses'] = "web/Web_controller/all_courses";

$route['thank_you'] = "web/Web_controller/thank_you";

$route['thank-you-for-re-registration'] = "web/Web_controller/thank_you_for_re_registration";



$route['view_course'] = "web/Web_controller/view_course";

$route['e-libraries'] = "web/Web_controller/e_libraries";



$route['read-news'] = "web/Web_controller/event_details";

$route['read-news/(:any)'] = "web/Web_controller/event_details/$1";



$route['read-blogs'] = "web/Web_controller/blog_details";

$route['read-blogs/(:any)'] = "web/Web_controller/blog_details/$1";





$route['re-appear-form-second'] = "web/Web_controller/re_appear_form_second";
$route['re-appear-form'] = "web/Web_controller/re_appear_form";
$route['student_re_evaluation_payment/(:any)'] = "web/web_controller/student_re_evaluation_payment/$1";
$route['re_evaluation'] = "web/Web_controller/re_evaluation";
$route['re_evaluation_payment_ccavRequestHandler'] = "web/Payment_controller/re_evaluation_payment_ccavRequestHandler";
$route['re_evaluation_payment_ccavResponseHandler'] = "web/Payment_controller/re_evaluation_payment_ccavResponseHandler"; 



$route['terms-conditions'] = "web/Web_controller/terms_conditions";

$route['privacy-policy'] = "web/Web_controller/privacy_policy";



$route['phd-rules-and-regulations'] = "web/Web_controller/phd_rules_and_regulations";



$route['all-news'] = "web/Web_controller/all_news";

$route['all-news/(:any)'] = "web/Web_controller/all_news/$1";



$route['blog'] = "web/Web_controller/blog";







$route['collaboration-enquiry'] = "web/Web_controller/collaboration_enquiry";

$route['collaboration-enquiry-foreign'] = "web/Web_controller/collaboration_enquiry_foreign";

$route['collaborations-with-apll'] = "web/Web_controller/collaborations_with_apll";

$route['admission-enquiry'] = "web/Web_controller/admission_enquiry";

$route['examination-form'] = "web/Web_controller/examination_form";

$route['resend_exam_otp'] = "web/Web_controller/resend_exam_otp";

$route['reset_exam_form'] = "web/Web_controller/reset_exam_form";

$route['make_exam_payment/(:any)/(:any)'] = "web/Payment_controller/make_exam_payment/$1";



$route['pay_re_appear/(:any)'] = "web/Payment_controller/pay_re_appear/$1";



$route['examination_freecharge'] = "web/Payment_controller/examination_freecharge";

$route['print_exam_cash_boucher/(:any)'] = "web/Web_controller/print_exam_cash_boucher/$1";

// $route['result_view'] = "web/Web_controller/result_view"; 

$route['demo_payment_form'] = "web/Web_controller/demo_form";

$route["enrollment-verification"] = "web/web_controller/enrollment_verification";

$route["document-verification"] = "web/web_controller/document_verification";



$route["rti-grievance"] = "web/web_controller/rti_grievance";



$route["document_verification_payment/(:any)"] = "web/Payment_controller/document_verification_payment/$1";

$route["document_verification_freecharge"] = "web/Payment_controller/document_verification_freecharge";

$route['direct_pay'] = "web/Payment_controller/direct_pay";

$route['direct_payment/(:any)'] = "web/Payment_controller/direct_payment/$1";

$route['success_freecharge'] = "web/Payment_controller/success_freecharge";

$route['failed_freecharge'] = "web/Payment_controller/failed_freecharge";

$route['direct_ccavRequestHandler'] = "web/Payment_controller/direct_ccavRequestHandler";

$route['direct_ccavResponseHandler'] = "web/Payment_controller/direct_ccavResponseHandler";

$route['admission_payment/(:any)/(:any)'] = "web/Payment_controller/admission_payment/$1";

$route['admission_ccavRequestHandler'] = "web/Payment_controller/admission_ccavRequestHandler";

$route['admission_ccavResponseHandler'] = "web/Payment_controller/admission_ccavResponseHandler";

$route['phd_registration_payment/(:any)'] = "web/Payment_controller/phd_registration_payment/$1";

$route['direct_ccavRequestHandler_phd'] = "web/Payment_controller/direct_ccavRequestHandler_phd";

$route['direct_ccavResponseHandler_phd'] = "web/Payment_controller/direct_ccavResponseHandler_phd";

$route['phd_registration_freecharge'] = "web/Payment_controller/phd_registration_freecharge";

$route['admission_freecharge'] = "web/Payment_controller/admission_freecharge";

$route['phd_registration_payment_freecharge/(:any)'] = "web/Payment_controller/phd_registration_payment_freecharge/$1";

$route["phd_course_work_payment/(:any)"] = "web/Payment_controller/phd_course_work_payment/$1";

$route["phd_course_work_freecharge"] = "web/Payment_controller/phd_course_work_freecharge";

$route['document_verification_ccavRequestHandler'] = "web/Payment_controller/document_verification_ccavRequestHandler";

$route['document_verification_ccavResponseHandler'] = "web/Payment_controller/document_verification_ccavResponseHandler";



$route['re_appear_exam_payment_ccavRequestHandler'] = "web/Payment_controller/re_appear_exam_payment_ccavRequestHandler";

$route['re_appear_exam_payment_ccavResponseHandler'] = "web/Payment_controller/re_appear_exam_payment_ccavResponseHandler";



$route['make_center_payment/(:any)/(:any)'] = "web/Payment_controller/make_center_payment/$1";

$route['make_center_payment_foreegin/(:any)/(:any)'] = "web/Payment_controller/make_center_payment_foreegin/$1";

$route['center_payment_ccavRequestHandler'] = "web/Payment_controller/center_payment_ccavRequestHandler";

$route['center_payment_ccavResponseHandler'] = "web/Payment_controller/center_payment_ccavResponseHandler";

$route['center_payment_ccavRequestHandler_foregin'] = "web/Payment_controller/center_payment_ccavRequestHandler_foregin";

$route['center_payment_ccavResponseHandler_foregin'] = "web/Payment_controller/center_payment_ccavResponseHandler_foregin";



$route['placement_record_form'] = "web/Web_controller/placement_record_form";

$route['placement_record_form_list'] = "admin/Admin_controller/placement_record_form_list";
$route['visitor_list'] = "admin/Admin_controller/visitor_list";



$route['help_setup_questions'] = "admin/Setting_controller/help_setup_questions";

$route['help_setup_questions/(:any)'] = "admin/Setting_controller/help_setup_questions/$1";



$route['search_help_setup'] = "admin/Setting_controller/search_help_setup";



// replace------------------------------from 

$route['student-login'] = "student/Student_login/login";

$route['student-forgot'] = "student/Student_login/student_forgot";

$route['student-dashboard'] = "student/Student_controller/student_dashboard";

$route['student_logout'] = "student/Student_controller/student_logout";

$route['student-password'] = "student/Student_controller/student_password";

$route['asmission-form-print'] = "student/Student_controller/asmission_form_print";

$route['my-noc'] = "student/Student_controller/my_noc";

$route['e_library'] = "student/Student_controller/e_library";

$route['id-card-print'] = "student/Student_controller/id_card_print";

$route['student-qualification-details'] = "student/Student_controller/student_qualification_details";

$route['student_feedback'] = "student/Student_controller/student_feedback";

$route['my_results'] = "student/Student_controller/my_results";

$route['show_my_result/(:any)'] = "student/Student_controller/show_my_result/$1";

$route['upload_assessment'] = "student/Student_controller/upload_assessment";

$route['video_list'] = "student/Student_controller/video_list";

$route['video/(:any)'] = "student/Student_controller/video/$1";

$route['e_book_list'] = "student/Student_controller/e_book_list";

$route['provisional_registration_letter'] = "student/Student_controller/provisional_registration_letter";

$route['transcript_application'] = "student/Student_controller/transcript_application";

$route["print_transcript"] = "student/Student_controller/print_transcript";

$route['thesis_submission'] = "student/Student_controller/thesis_submission";

$route['synopsis_submission'] = "student/Student_controller/synopsis_submission";

$route['print_student_course_work_marksheet'] = "student/Student_controller/print_course_work_marksheet";

$route['abstract'] = "student/Student_controller/abstract";

$route['progress_report'] = "student/Student_controller/progress_report";

$route['exam-login'] = "student/Student_login/exam_login";

$route['exam-dashboard'] = "student/Exam_controller/exam_dashboard";

$route['exam_student_logout'] = "student/Exam_controller/exam_student_logout";

$route['start_exam/(:any)'] = "student/Exam_controller/start_exam/$1";

$route['update_document'] = "student/Student_controller/update_document/";

$route['successfull_phd_registration'] = "admin/Student_controller/successfull_phd_registration";

$route['failed_phd_registration'] = "admin/Student_controller/failed_phd_registration";

$route['edit_phd_registration_payment/(:any)'] = "admin/Student_controller/edit_phd_registration_payment/$1";

$route['view_phd_registration_payment/(:any)'] = "admin/Student_controller/view_phd_registration_payment/$1";

$route['manage_student_account/(:any)'] = "admin/Student_controller/manage_student_account/$1";

$route['manage_student_account/(:any)/(:any)'] = "admin/Student_controller/manage_student_account/$1";





$route['print_admission_receipt/(:any)/(:any)'] = "web/Web_controller/print_admission_receipt/$1";





$route['phd_exams_student'] = "admin/Student_controller/phd_exams_student";

$route['student_feedback_list'] = "admin/Student_controller/student_feedback_list";

$route['replied_student_feedback_list'] = "admin/Student_controller/replied_student_feedback_list";

$route['phd_exam_student_ans_book/(:any)/(:any)'] = "admin/Student_controller/phd_exam_student_ans_book/$1";

$route['send_phd_result_mail/(:any)'] = "admin/Student_controller/send_phd_result_mail/$1";



$route['passout_student_list'] = "admin/Student_controller/passout_student_list";

$route['print_id/(:any)'] = "admin/Student_controller/print_id/$1";

$route['passout_student_qualification/(:any)'] = "admin/Student_controller/passout_student_qualification/$1";







$route['create_tests'] = "admin/Exam_controller/create_tests";

$route['create_tests/(:any)'] = "admin/Exam_controller/create_tests/$1";

$route['create_quiz/(:any)'] = "admin/Exam_controller/create_quiz/$1";

$route['clear_exam/(:any)/(:any)'] = "admin/Exam_controller/clear_exam/$1";

$route['send_single_password/(:any)'] = "admin/Exam_controller/send_single_password/$1";

$route['upload_question_via_csv/(:any)'] = "admin/Exam_controller/upload_question_via_csv/$1";

$route['mcq_question_data'] = "admin/Exam_controller/mcq_question_data";

$route['mcq_report'] = "admin/Exam_controller/mcq_report";

$route['theoretical_question_data'] = "admin/Exam_controller/theoretical_question_data";

$route['course_work_exam'] = "admin/Exam_controller/course_work_exam";

$route['course_work_exam/(:any)'] = "admin/Exam_controller/course_work_exam/$1";

$route['add_course_work_exam_question/(:any)'] = "admin/Exam_controller/add_course_work_exam_question/$1";

$route['update_course_work_question/(:any)'] = "admin/Exam_controller/update_course_work_question/$1";

$route['add_single_course_question/(:any)'] = "admin/Exam_controller/add_single_course_question/$1";

$route['course_work_exam_appeared_list'] = "admin/Exam_controller/course_work_exam_appeared_list";

$route['course_work_answer_book/(:any)'] = "admin/Exam_controller/course_work_answer_book/$1";

$route['generate_course_work_result/(:any)'] = "admin/Exam_controller/generate_course_work_result/$1";

$route['generate_course_work_result'] = "admin/Exam_controller/generate_course_work_result";

$route['course_work_result_list'] = "admin/Exam_controller/course_work_result_list";

$route['edit_course_work_marksheet/(:any)'] = "admin/Exam_controller/edit_course_work_marksheet/$1";

$route['create_my_report'] = "admin/Emp_reporting/create_my_report";

$route['create_my_report/(:any)'] = "admin/Emp_reporting/create_my_report/$1";

$route['view_emp_reports_today'] = "admin/Emp_reporting/view_emp_reports_today";

$route['view_emp_reports_all'] = "admin/Emp_reporting/view_emp_reports_all";

$route['search_global_student'] = "admin/Emp_reporting/search_global_student";

$route['search_global_blended_student'] = "admin/Emp_reporting/search_global_blended_student";

$route['search_student_payment'] = "admin/Emp_reporting/search_student_payment";

$route['add_examination'] = "admin/Exam_controller/add_examination";

$route['add_examination/(:any)'] = "admin/Exam_controller/add_examination/$1";

$route['manage_examination_question/(:any)'] = "admin/Exam_controller/manage_examination_question/$1";

$route['manage_examination_question/(:any)/(:any)'] = "admin/Exam_controller/manage_examination_question/$1";

$route['examination_list'] = "admin/Exam_controller/examination_list";

$route['appeared_examination_list'] = "admin/Exam_controller/appeared_examination_list";
$route['success_re_evaluation_list'] = "admin/Student_controller/success_re_evaluation_list";
$route['failed_re_evaluation_list'] = "admin/Student_controller/failed_re_evaluation_list";
$route['complete_re_evaluation_list'] = "admin/Student_controller/complete_re_evaluation_list";
$route['approve_re_evaluation/(:any)/(:any)/(:any)/(:any)'] = "admin/Student_controller/approve_re_evaluation/$1";
$route['edit_re_evaluation/(:any)'] = "admin/Student_controller/edit_re_evaluation/$1";

$route['create_time_table'] = "admin/Exam_controller/create_time_table";

$route['time_sheet_list'] = "admin/Exam_controller/time_sheet_list";

$route['manage_admin_result'] = "admin/Exam_controller/manage_admin_result";

$route['search_admin_result'] = "admin/Exam_controller/search_admin_result";

$route['search_admin_result_subject_count'] = "admin/Exam_controller/search_admin_result_subject_count";

$route['inactivate_results/(:any)'] = "admin/Exam_controller/inactivate_results/$1";

$route['activate_results/(:any)'] = "admin/Exam_controller/activate_results/$1";

$route['delete_result/(:any)'] = "admin/Exam_controller/delete_result/$1";

$route['update_result/(:any)'] = "admin/Exam_controller/update_result/$1";

$route['generate_marksheet/(:any)/(:any)/(:any)'] = "admin/Exam_controller/generate_marksheet/$1";

$route['search_marksheet'] = "admin/Exam_controller/search_marksheet";

$route['bulk_activate_marksheet'] = "admin/Exam_controller/bulk_activate_marksheet";

$route['duplicate_marksheet'] = "admin/Exam_controller/duplicate_marksheet";

$route['create_duplicate_marksheet/(:any)'] = "admin/Exam_controller/create_duplicate_marksheet/$1";

$route['delete_marksheet/(:any)'] = "admin/Exam_controller/delete_marksheet/$1";

$route['edit_marksheet/(:any)'] = "admin/Exam_controller/edit_marksheet/$1";

$route['print_inner_marksheet/(:any)'] = "admin/Exam_controller/print_inner_marksheet/$1";

$route['print_duplicate_inner_marksheet/(:any)'] = "admin/Exam_controller/print_duplicate_inner_marksheet/$1";

$route['examination_form_list'] = "admin/Exam_controller/examination_form_list";

$route['examination_form_list_failed'] = "admin/Exam_controller/examination_form_list_failed";

$route['re_appear_examination_form_list_failed'] = "admin/Exam_controller/re_appear_examination_form_list_failed";

$route['re_appear_examination_form_list'] = "admin/Exam_controller/re_appear_examination_form_list";

$route['inactive_re_appear_hallticket/(:any)'] = "admin/Exam_controller/inactive_re_appear_hallticket/$1";

$route['active_re_appear_hallticket/(:any)'] = "admin/Exam_controller/active_re_appear_hallticket/$1";

$route['update_re_appear_exam_payment/(:any)'] = "admin/Exam_controller/update_re_appear_exam_payment/$1";
$route['view_re_appear_subjects/(:any)'] = "admin/Exam_controller/view_re_appear_subjects/$1";

$route['inactive_hallticket/(:any)'] = "admin/Exam_controller/inactive_hallticket/$1";

$route['active_hallticket/(:any)'] = "admin/Exam_controller/active_hallticket/$1";

$route['update_exam_payment/(:any)'] = "admin/Exam_controller/update_exam_payment/$1";

$route["activate_all_results"] = "admin/Exam_controller/activate_all_results";

$route['today_assignment_list'] = "admin/Exam_controller/today_assignment_list";

$route['all_assignment_list'] = "admin/Exam_controller/all_assignment_list";

$route['view_assignment_question_mcq/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = "admin/Exam_controller/view_assignment_question_mcq/$1";

$route['view_assignment_question_theory/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = "admin/Exam_controller/view_assignment_question_theory/$1";

$route['render_quiz/(:any)'] = "admin/Quiz_controller/render_quiz/$1";

$route['phd_exam_login'] = "admin/Quiz_controller/quiz_login";

$route['exam_dashboard'] = "admin/Quiz_controller/exam_dashboard";

$route['show_exam/(:any)'] = "admin/Quiz_controller/show_exam/$1";

$route['welcome_to_test/(:any)'] = "admin/Quiz_controller/welcome_to_test/$1";

$route['show_exam_score'] = "admin/Quiz_controller/show_exam_score";

$route['thankyou'] = "admin/Quiz_controller/thankyou";

$route['create_account_team'] = "admin/External_account_controller/create_account_team";

$route['create_account_team/(:any)'] = "admin/External_account_controller/create_account_team/$1";

$route['list_account_team'] = "admin/External_account_controller/list_account_team";

$route['verified_transaction_list'] = "admin/External_account_controller/verified_transaction_list";

$route['view_verified_transactions/(:any)'] = "admin/External_account_controller/view_verified_transactions/$1";

$route['exam_logout'] = "admin/Quiz_controller/exam_logout";

// ********************* shubham code Course work start *******

$route['course_work_login'] = "admin/Course_work_controller/course_work_login";

$route['course_work_dashboard'] = "admin/Course_work_controller/course_work_dashboard";

$route['course_work_logout'] = "admin/Course_work_controller/course_work_logout";

$route['my_course_work_exam/(:any)'] = "admin/Course_work_controller/my_course_work_exam/$1";

$route['thankyou-submission'] = "admin/Course_work_controller/thankyou_submission";

// ********************* shubham code Course work end ******* 

$route['erp-access'] = "admin/Admin_login/login";

$route['erp-logout'] = "admin/Admin_login/erp_logout";

$route['erp-forgot'] = "admin/Admin_login/forgot_password";

$route['lead_cron'] = "admin/Admin_login/lead_cron";

$route['erp-dashboard'] = "admin/Admin_controller/dashboard";

$route['erp-dashboard/(:any)'] = "admin/Admin_controller/dashboard/$1";

$route['all_logs_view'] = "admin/Admin_controller/all_logs_view";

$route['student_assessments'] = "admin/Admin_controller/student_assessments";

$route['student_assessments/(:any)'] = "admin/Admin_controller/student_assessments/$1";

$route['student_assessments/(:any)/(:any)'] = "admin/Admin_controller/student_assessments/$1";


$route['student_appointments'] = "admin/Admin_controller/student_appointments"; 
$route['student_appointments_completed'] = "admin/Admin_controller/student_appointments_completed"; 
$route['complete_student_visit/(:any)'] = "admin/Admin_controller/complete_student_visit/$1"; 
$route['reschedule_student_appointments/(:any)'] = "admin/Admin_controller/reschedule_student_appointments/$1";  

$route['pending_assignment_list'] = "admin/Admin_controller/pending_assignment_list";

$route['rejected_assignment_list'] = "admin/Admin_controller/rejected_assignment_list";

$route['approved_assignment_list'] = "admin/Admin_controller/approved_assignment_list";



$route['admin_assignement_reject_remrak'] = "admin/Admin_controller/admin_assignement_reject_remrak";

$route['admin_assignement_approval/(:any)'] = "admin/Admin_controller/admin_assignement_approval/$1";

$route['admin_assignement_pending/(:any)'] = "admin/Admin_controller/admin_assignement_pending/$1";





$route['student_assessment'] = "admin/Admin_controller/student_assessment";

$route['teacher_assessment'] = "admin/Admin_controller/teacher_assessment";

$route['student_assignment'] = "admin/Admin_controller/student_assignment";

$route['student_industry_assessment'] = "admin/Admin_controller/student_industry_assessment";

$route['student_guardian_assessment'] = "admin/Admin_controller/student_guardian_assessment";

$route['reject_assesment/(:any)/(:any)'] = "admin/Admin_controller/reject_assesment/$1/$1";

$route['approve_assesment/(:any)/(:any)'] = "admin/Admin_controller/approve_assesment/$1/$1";

$route['student_assessment/(:any)'] = "admin/Admin_controller/student_assessment/$1";

$route['rejected_assessment'] = "admin/Admin_controller/rejected_assessment";

$route['approved_assessment'] = "admin/Admin_controller/approved_assessment";

$route['rejected_teacher_assessment'] = "admin/Admin_controller/rejected_teacher_assessment";

$route['approved_teacher_assessment'] = "admin/Admin_controller/approved_teacher_assessment";

// $route["upload-exam-papper"] = "admin/Admin_controller/upload_exam_papper";

// $route["upload-exam-papper/(:any)"] = "admin/Admin_controller/upload_exam_papper/$1"; 

$route['kyc_list'] = "admin/Admin_controller/kyc_list";

$route['create_blended_kyc'] = "admin/Admin_controller/create_blended_kyc";

$route['blended_kyc_list'] = "admin/Admin_controller/blended_kyc_list";

$route['rejected_blended_kyc_list'] = "admin/Admin_controller/rejected_blended_kyc_list";

$route['approve_blended_kyc_list'] = "admin/Admin_controller/approve_blended_kyc_list";

$route['approve_blen_kyc/(:any)'] = "admin/Admin_controller/approve_blen_kyc/$1";

$route['reject_blen_kyc/(:any)'] = "admin/Admin_controller/reject_blen_kyc/$1";

$route['send_new_blen_kyc/(:any)'] = "admin/Admin_controller/send_new_blen_kyc/$1";



$route['create_regular_kyc'] = "admin/Admin_controller/create_regular_kyc";

$route['regular_kyc_list'] = "admin/Admin_controller/regular_kyc_list";

$route['rejected_regullar_kyc_list'] = "admin/Admin_controller/rejected_regullar_kyc_list";

$route['approve_regular_kyc_list'] = "admin/Admin_controller/approve_regular_kyc_list";



$route['approve_regular_kyc/(:any)'] = "admin/Admin_controller/approve_regular_kyc/$1";

$route['reject_regular_kyc/(:any)'] = "admin/Admin_controller/reject_regular_kyc/$1";

$route['send_new_regular_kyc/(:any)'] = "admin/Admin_controller/send_new_regular_kyc/$1";



$route['approve_direct_kyc/(:any)'] = "admin/Admin_controller/approve_direct_kyc/$1";

$route['reject_direct_kyc/(:any)'] = "admin/Admin_controller/reject_direct_kyc/$1";

$route['rejected_direct_kyc_list'] = "admin/Admin_controller/rejected_direct_kyc_list";

$route['approve_direct_kyc_list'] = "admin/Admin_controller/approve_direct_kyc_list";



$route['direct_kyc_list'] = "admin/Admin_controller/direct_kyc_list";

$route['add_paper'] = "admin/Admin_controller/add_paper";

$route['add_paper/(:any)'] = "admin/Admin_controller/add_paper/$1";

$route['center_paper_list'] = "admin/Admin_controller/center_paper_list";



$route["amount-filter"] = "admin/Admin_controller/ammount_filter";



$route["employee_left/(:any)"] = "admin/Admin_controller/employee_left/$1";





$route['profile-setting'] = "admin/Admin_controller/profile_setting";

$route['seo_registration'] = "admin/Admin_controller/seo_registration";

$route['seo_registration/(:any)'] = "admin/Admin_controller/seo_registration/$1";



$route['seo_setup_list'] = "admin/Admin_controller/seo_setup_list";



$route['print_assessment_pdf/(:any)'] = "admin/Admin_controller/print_assessment_pdf/$1";





$route['admin_self_Assessment_pending_list'] = "admin/Admin_controller/admin_self_Assessment_pending_list";

$route['admin_self_Assessment_rejected_list'] = "admin/Admin_controller/admin_self_Assessment_rejected_list";

$route['admin_self_Assessment_approved_list'] = "admin/Admin_controller/admin_self_Assessment_approved_list";

$route['admin_center_approve_self_assessment/(:any)'] = "admin/Admin_controller/admin_center_approve_self_assessment/$1";

$route['admin_center_self_reject_remark'] = "admin/Admin_controller/admin_center_self_reject_remark";



$route['admin_teacher_Assessment_pending_list'] = "admin/Admin_controller/admin_teacher_Assessment_pending_list";

$route['admin_teacher_Assessment_rejected_list'] = "admin/Admin_controller/admin_teacher_Assessment_rejected_list";

$route['admin_teacher_Assessment_approved_list'] = "admin/Admin_controller/admin_teacher_Assessment_approved_list";

$route['admin_center_approve_teacher_assessment/(:any)'] = "admin/Admin_controller/admin_center_approve_teacher_assessment/$1";

$route['admin_center_teacher_reject_remark'] = "admin/Admin_controller/admin_center_teacher_reject_remark";



$route['admin_industry_Assessment_pending_list'] = "admin/Admin_controller/admin_industry_Assessment_pending_list";

$route['admin_industry_Assessment_rejected_list'] = "admin/Admin_controller/admin_industry_Assessment_rejected_list";

$route['admin_industry_Assessment_approved_list'] = "admin/Admin_controller/admin_industry_Assessment_approved_list";

$route['admin_center_approve_industry_assessment/(:any)'] = "admin/Admin_controller/admin_center_approve_industry_assessment/$1";

$route['admin_center_industry_reject_remark'] = "admin/Admin_controller/admin_center_industry_reject_remark";



$route['admin_parent_Assessment_pending_list'] = "admin/Admin_controller/admin_parent_Assessment_pending_list";

$route['admin_parent_Assessment_rejected_list'] = "admin/Admin_controller/admin_parent_Assessment_rejected_list";

$route['admin_parent_Assessment_approved_list'] = "admin/Admin_controller/admin_parent_Assessment_approved_list";

$route['admin_center_approve_parent_assessment/(:any)'] = "admin/Admin_controller/admin_center_approve_parent_assessment/$1";

$route['admin_center_parent_reject_remark'] = "admin/Admin_controller/admin_center_parent_reject_remark";



$route['designation_management'] = "admin/Setting_controller/designation_management";

$route['designation_management/(:any)'] = "admin/Setting_controller/designation_management/$1";

$route['inactive/(:any)/(:any)'] = "admin/Admin_login/inactive/$1";

$route['active/(:any)/(:any)'] = "admin/Admin_login/active/$1";

$route['delete/(:any)/(:any)'] = "admin/Admin_login/delete/$1";



$route['coupon_setting'] = "admin/Setting_controller/coupon_setting";

$route['coupon_setting/(:any)'] = "admin/Setting_controller/coupon_setting/$1";

$route['website_setting'] = "admin/Setting_controller/website_setting";

$route['signature_management'] = "admin/Setting_controller/signature_management";

$route['signature_management/(:any)'] = "admin/Setting_controller/signature_management/$1";



$route['certificate_fees_management'] = "admin/Setting_controller/certificate_fees_management";

$route['certificate_fees_management/(:any)'] = "admin/Setting_controller/certificate_fees_management/$1";



$route['delete_certificate_fees/(:any)'] = "admin/Setting_controller/delete_certificate_fees/$1";

$route['inactive_certificate_fees/(:any)'] = "admin/Setting_controller/inactive_certificate_fees/$1";

$route['active_certificate_fees/(:any)'] = "admin/Setting_controller/active_certificate_fees/$1";



$route['list_manage_exam_fees'] = "admin/Setting_controller/list_manage_exam_fees";



$route['terms_and_conditions'] = "admin/Setting_controller/terms_and_conditions";

$route['terms_and_conditions/(:any)'] = "admin/Setting_controller/terms_and_conditions/$1";





$route['privacy_policy'] = "admin/Setting_controller/privacy_policy";

$route['privacy_policy/(:any)'] = "admin/Setting_controller/privacy_policy/$1";





$route['center_session'] = "admin/Setting_controller/center_session";

$route['center_session/(:any)'] = "admin/Setting_controller/center_session/$1";

$route['center_session_list'] = "admin/Setting_controller/center_session_list";





$route['id_management'] = "admin/Setting_controller/id_management";

$route['id_management/(:any)'] = "admin/Setting_controller/id_management/$1";

$route['employee_list'] = "admin/Setting_controller/employee_list";

$route['employee_progress_report/(:any)'] = "admin/Setting_controller/employee_progress_report/$1";

$route['employee_progress_report/(:any)/(:any)'] = "admin/Setting_controller/employee_progress_report/$1";

$route['add_employee'] = "admin/Setting_controller/add_employee";

$route['add_employee/(:any)'] = "admin/Setting_controller/add_employee/$1";

$route['bank_management'] = "admin/Setting_controller/bank_management";

$route['bank_management/(:any)'] = "admin/Setting_controller/bank_management/$1";

$route['password_setting'] = "admin/Setting_controller/password_setting";

$route['user_privilege'] = "admin/Setting_controller/user_privilege";

$route['user_privilege/(:any)'] = "admin/Setting_controller/user_privilege/$1";

$route['user_sub_privilege'] = "admin/Setting_controller/user_sub_privilege";

$route['user_sub_privilege/(:any)'] = "admin/Setting_controller/user_sub_privilege/$1";

$route['assign_user_privilege'] = "admin/Setting_controller/assign_user_privilege";

$route['assign_user_privilege/(:any)'] = "admin/Setting_controller/assign_user_privilege/$1";

$route['job_applications'] = "admin/Setting_controller/job_applications";

$route['edit_job_application/(:any)'] = "admin/Setting_controller/edit_job_application/$1";





$route['exam_setup'] = "admin/Setting_controller/exam_setup";

$route['exam_setup/(:any)'] = "admin/Setting_controller/exam_setup/$1";

$route['delete_exam_setup/(:any)'] = "admin/Setting_controller/delete_exam_setup/$1";

$route['inactive_exam_setup/(:any)'] = "admin/Setting_controller/inactive_exam_setup/$1";

$route['active_exam_setup/(:any)'] = "admin/Setting_controller/active_exam_setup/$1";



$route['manage_course'] = "admin/Course_controller/manage_course";

$route['manage_course/(:any)'] = "admin/Course_controller/manage_course/$1";

$route['manage_course_faq/(:any)'] = "admin/Course_controller/manage_course_faq/$1";

$route['manage_course_faq/(:any)/(:any)'] = "admin/Course_controller/manage_course_faq/$1";

$route['manage_stream'] = "admin/Course_controller/manage_stream";

$route['manage_stream/(:any)'] = "admin/Course_controller/manage_stream/$1";

$route['manage_faculty'] = "admin/Course_controller/manage_faculty";

$route['manage_faculty/(:any)'] = "admin/Course_controller/manage_faculty/$1";

$route['manage_session'] = "admin/Course_controller/manage_session";

$route['manage_session/(:any)'] = "admin/Course_controller/manage_session/$1";

$route['manage_course_type'] = "admin/Course_controller/manage_course_type";

$route['manage_course_type/(:any)'] = "admin/Course_controller/manage_course_type/$1";



$route['list_course_stream_relation'] = "admin/Course_controller/list_course_stream_relation";

$route['course_stream_relation'] = "admin/Course_controller/course_stream_relation";

$route['course_stream_relation/(:any)'] = "admin/Course_controller/course_stream_relation/$1";

$route['list_manage_fees'] = "admin/Course_controller/list_manage_fees";

$route['manage_fees'] = "admin/Course_controller/manage_fees";

$route['manage_fees/(:any)'] = "admin/Course_controller/manage_fees/$1";

$route['lateral_manage_fees'] = "admin/Course_controller/lateral_manage_fees";

$route['lateral_manage_fees/(:any)'] = "admin/Course_controller/lateral_manage_fees/$1";

$route['list_subject'] = "admin/Course_controller/list_subject";

$route['manage_subject'] = "admin/Course_controller/manage_subject";

$route['manage_subject/(:any)'] = "admin/Course_controller/manage_subject/$1";

$route['edit_subject'] = "admin/Course_controller/edit_subject";

$route['emp_syllabus_list'] = "admin/Course_controller/emp_syllabus_list";





$route['add_course_syllabus'] = "admin/Course_controller/add_course_syllabus";

$route['add_course_syllabus/(:any)'] = "admin/Course_controller/add_course_syllabus/$1";

$route['course_syllabus_list'] = "admin/Course_controller/course_syllabus_list";







$route['regular_student_missing_document'] = "admin/Missing_document/regular_student_missing_document";



$route['regular_enrolled_student_missing_document'] = "admin/Missing_document/regular_enrolled_student_missing_document";



$route['blended_enrolled_student_missing_document_qualification'] = "admin/Missing_document/blended_enrolled_student_missing_document_qualification";



$route['blended_enrolled_student_missing_document'] = "admin/Missing_document/blended_enrolled_student_missing_document";



$route['regular_student_missing_qualification_docs'] = "admin/Missing_document/regular_student_missing_qualification_docs";



$route['regular_student_missing_qualification_docs_pending'] = "admin/Missing_document/regular_student_missing_qualification_docs_pending";





$route['view_documents/(:any)'] = "admin/Center_controller/view_documents/$1";

$route['view_enquiry_documents/(:any)'] = "admin/Center_controller/view_enquiry_documents/$1";



$route['manage_center'] = "admin/Center_controller/manage_center";

$route['manage_center/(:any)'] = "admin/Center_controller/manage_center/$1";

$route['list_manage_center'] = "admin/Center_controller/list_manage_center";

$route['pending_center'] = "admin/Center_controller/pending_center";

$route['deactive_center'] = "admin/Center_controller/deactive_center";

$route['hold_center'] = "admin/Center_controller/hold_center";

$route['center_mou/(:any)'] = "admin/Center_controller/center_mou/$1";

$route['center_finance/(:any)'] = "admin/Center_controller/center_finance/$1";

$route['center_finance/(:any)/(:any)'] = "admin/Center_controller/center_finance/$1";

$route['print_center_receipt/(:any)'] = "web/Web_controller/print_center_receipt/$1";



$route['pending_center_subject'] = "admin/Center_controller/pending_center_subject";

$route['center_reset_password/(:any)'] = "admin/Center_controller/center_reset_password/$1";

$route['center_wallet_payment_details'] = "admin/Center_controller/center_wallet_payment_details";



$route['add_center_wallet_payment_details'] = "admin/Center_controller/add_center_wallet_payment_details";





$route['update_wallet_details/(:any)'] = "admin/Center_controller/update_wallet_details/$1";

$route['manage_center_enquiry'] = "admin/Center_controller/manage_center_enquiry";

$route['assign_course/(:any)'] = "admin/Center_controller/assign_course/$1";

$route['center_send_login/(:any)'] = "admin/Center_controller/center_send_login/$1";

$route['add_center_login'] = "admin/Center_controller/add_center_login";

$route['add_center_login/(:any)'] = "admin/Center_controller/add_center_login/$1";

$route['add_center_private_account'] = "admin/Center_controller/add_center_private_account";

$route['add_center_private_account/(:any)'] = "admin/Center_controller/add_center_private_account/$1";

$route['center_login_list'] = "admin/Center_controller/center_login_list";

$route['information_center_success_list'] = "admin/Center_controller/information_center_success_list";

$route['update_information_center_payment/(:any)'] = "admin/Center_controller/update_information_center_payment/$1";

$route['information_center_failed_list'] = "admin/Center_controller/information_center_failed_list";

$route['information_center_list'] = "admin/Center_controller/information_center_list";



$route['manage_head'] = "admin/Document_controller/manage_head";

$route['manage_head/(:any)'] = "admin/Document_controller/manage_head/$1";

$route['manage_sub_head'] = "admin/Document_controller/manage_sub_head";

$route['manage_sub_head/(:any)'] = "admin/Document_controller/manage_sub_head/$1";

$route['upload_documents'] = "admin/Document_controller/upload_documents";

$route['upload_documents/(:any)'] = "admin/Document_controller/upload_documents/$1";


$route['view_uploaded_documents/(:any)'] = "admin/Document_controller/view_uploaded_documents/$1";



$route['new_pending_student'] = "admin/Student_controller/new_pending_student";

$route['admission_list'] = "admin/Student_controller/admission_list";

$route['student_activity/(:any)'] = "admin/Student_controller/student_activity/$1";

$route['hold_admission_list'] = "admin/Student_controller/hold_admission_list";

$route['new_admission'] = "admin/Student_controller/new_admission";

$route['today_admission'] = "admin/Student_controller/today_admission";

$route['approved_admission/(:any)'] = "admin/Student_controller/approved_admission/$1";

$route['update_student/(:any)'] = "admin/Student_controller/update_student/$1";

$route['enrolled_new_student/(:any)'] = "admin/Student_controller/enrolled_new_student/$1";

$route['print_admission_form/(:any)'] = "admin/Student_controller/print_admission_form/$1";

$route['admin_print_id/(:any)'] = "admin/Student_controller/admin_print_id/$1";

$route['student_qualification/(:any)'] = "admin/Student_controller/student_qualification/$1";

$route['otp_lead'] = "admin/Student_controller/otp_lead";

$route['enquiry_list'] = "admin/Student_controller/enquiry_list";

$route['pulp_enquiry_list'] = "admin/Student_controller/pulp_enquiry_list";

$route['admin_campus_enquiry'] = "admin/Student_controller/admin_campus_enquiry";

$route['enquiry_head'] = "admin/Student_controller/enquiry_head";

$route['enquiry_head/(:any)'] = "admin/Student_controller/enquiry_head/$1";



$route['search_student'] = "admin/Student_controller/search_student";



$route['pulp_enquiry_list'] = "admin/Student_controller/pulp_enquiry_list";





$route["pending_reregistration_student_list"] = "admin/Student_controller/pendding_reregistration_student_list";
$route["pulp_pending_reregistration_student_list"] = "admin/Student_controller/pendding_reregistration_student_list";

$route["update_thesis/(:any)"] = "admin/Student_controller/update_thesis/$1";



$route['marquee_news'] = "admin/News_controller/marquee_news";

$route['marquee_news/(:any)'] = "admin/News_controller/marquee_news/$1";

$route['manage_news'] = "admin/News_controller/manage_news";

$route['manage_news/(:any)'] = "admin/News_controller/manage_news/$1";

$route['manage_blogs'] = "admin/News_controller/manage_blogs";

$route['manage_blogs/(:any)'] = "admin/News_controller/manage_blogs/$1";

$route['manage_conference'] = "admin/News_controller/manage_conference";

$route['manage_conference/(:any)'] = "admin/News_controller/manage_conference/$1";

$route['university_acticity'] = "admin/News_controller/university_acticity";





$route['approve_research_cocument/(:any)/(:any)/(:any)/(:any)'] = "admin/Research_controller/approve_research_cocument/$1";

$route['guide_application_list'] = "admin/Research_controller/guide_application_list";

$route['guide_application_update'] = "admin/Research_controller/guide_application_update";

$route['guide_application_update/(:any)'] = "admin/Research_controller/guide_application_update/$1";

$route['guide_documents/(:any)'] = "admin/Research_controller/guide_documents/$1";

$route['print_phd_registration_form/(:any)'] = "admin/Research_controller/print_phd_registration_form/$1";

$route['assigned_guide_to_scholar'] = "admin/Research_controller/assigned_guide_to_scholar";

$route['assigned_guide_to_scholar/(:any)'] = "admin/Research_controller/assigned_guide_to_scholar/$1";

$route['guide_payments/(:any)'] = "admin/Research_controller/guide_payments/$1";

$route['guide_payments/(:any)/(:any)'] = "admin/Research_controller/guide_payments/$1";

$route['co_guide_payments/(:any)'] = "admin/Research_controller/co_guide_payments/$1";

$route['co_guide_payments/(:any)/(:any)'] = "admin/Research_controller/co_guide_payments/$1";



$route['print_course_work_marksheet/(:any)'] = "admin/Exam_controller/print_course_work_marksheet/$1";





$route['set-scholar-details/(:any)'] = "admin/Research_controller/set_scholar_details/$1";



$route['render_quiz/(:any)'] = "admin/QuizController/render_quiz/$1";

$route['show_quiz/(:any)'] = "admin/QuizController/show_quiz/$1";



$route['bulk_attendance_list'] = "admin/Faculty_controller/bulk_attendance_list";

$route['staff_faculty'] = "admin/Faculty_controller/staff_faculty";

$route['left_staff_faculty'] = "admin/Faculty_controller/left_staff_faculty";

$route['faculty_left/(:any)'] = "admin/Faculty_controller/faculty_left/$1";

$route['faculty_not_left/(:any)'] = "admin/Faculty_controller/faculty_not_left/$1";



$route['admin_staff_attendance'] = "admin/Faculty_controller/admin_staff_attendance";

$route['all_online_classes'] = "admin/Faculty_controller/all_online_classes";



$route['add_staff_faculty'] = "admin/Faculty_controller/add_staff_faculty";

$route['add_staff_faculty/(:any)'] = "admin/Faculty_controller/add_staff_faculty/$1";

$route['today_staff_faculty'] = "admin/Faculty_controller/today_staff_faculty";

$route['all_staff_faculty'] = "admin/Faculty_controller/all_staff_faculty";

$route['feedback_list'] = "admin/Faculty_controller/feedback_list";

$route['admin_view_register'] = "admin/Faculty_controller/admin_view_register";

$route['admin_view_attendance/(:any)'] = "admin/Faculty_controller/admin_view_attendance/$1";

$route['admin_view_attendance/(:any)/(:any)'] = "admin/Faculty_controller/admin_view_attendance/$1";

$route['waiting_list_for_report'] = "admin/Faculty_controller/waiting_list_for_report";

$route['send_report_reminder/(:any)'] = "admin/Faculty_controller/send_report_reminder/$1";

$route['admin_faculty_documents/(:any)'] = "admin/Faculty_controller/admin_faculty_documents/$1";

$route['cron_db'] = "Welcome/cron_db";



$route['delete_faculty_document/(:any)'] = "admin/Faculty_controller/delete_faculty_document/$1";



$route['delete_faculty_document_image/(:any)'] = "admin/Faculty_controller/delete_faculty_document_image/$1";



$route['delete_faculty_cv_document/(:any)'] = "admin/Faculty_controller/delete_faculty_cv_document/$1";



$route['delete_faculty_eligible_document/(:any)'] = "admin/Faculty_controller/delete_faculty_eligible_document/$1";







$route['faculty_login'] = "admin/Admin_login/faculty_login";

$route['faculty_forgot'] = "admin/Admin_login/faculty_forgot";

$route['faculty_dashboard'] = "admin/Faculty_staff_controller/faculty_dashboard";

$route['faculty_logout'] = "admin/Faculty_staff_controller/faculty_logout";

$route['faculty_profile'] = "admin/Faculty_staff_controller/faculty_profile";

$route['faculty_profile_setting'] = "admin/Faculty_staff_controller/faculty_profile_setting";

$route['add_daily_report'] = "admin/Faculty_staff_controller/add_daily_report";

$route['my_daily_report'] = "admin/Faculty_staff_controller/my_daily_report";

$route['new_daily_report'] = "admin/Faculty_staff_controller/new_daily_report";

$route['all_daily_report'] = "admin/Faculty_staff_controller/all_daily_report";

$route['staff_attendance'] = "admin/Faculty_staff_controller/staff_attendance";

$route['staff_added_mcq_report'] = "admin/Faculty_staff_controller/staff_added_mcq_report";

$route['update_daily_report/(:any)'] = "admin/Faculty_staff_controller/update_daily_report/$1";

$route['manage_attendance'] = "admin/Faculty_staff_controller/manage_attendance";

$route['add_register'] = "admin/Faculty_staff_controller/add_register";

$route['add_register/(:any)'] = "admin/Faculty_staff_controller/add_register/$1";

$route['view_register_student/(:any)'] = "admin/Faculty_staff_controller/view_register_student/$1";

$route['view_register_student/(:any)/(:any)'] = "admin/Faculty_staff_controller/view_register_student/$1";

$route['add_student_attendance/(:any)'] = "admin/Faculty_staff_controller/add_student_attendance/$1";

$route['add_student_attendance/(:any)/(:any)'] = "admin/Faculty_staff_controller/add_student_attendance/$1";

$route['add_syllabus'] = "admin/Faculty_staff_controller/add_syllabus";

$route['add_syllabus/(:any)'] = "admin/Faculty_staff_controller/add_syllabus/$1";

$route['give_feedbak'] = "admin/Faculty_staff_controller/give_feedbak";

$route['faculty_documents'] = "admin/Faculty_staff_controller/faculty_documents";

$route['assignments_mcq'] = "admin/Faculty_staff_controller/assignments_mcq";

$route['view_mcq_list/(:any)/(:any)/(:any)/(:any)'] = "admin/Faculty_staff_controller/view_mcq_list/$1";

$route['add_theoretical_questions'] = "admin/Faculty_staff_controller/add_theoretical_questions";

$route['view_theoretical_questions/(:any)/(:any)/(:any)/(:any)'] = "admin/Faculty_staff_controller/view_theoretical_questions/$1";

$route['faculty_online_class_meet'] = "admin/Faculty_staff_controller/faculty_online_class_meet";

$route['faculty_online_class_meet/(:any)'] = "admin/Faculty_staff_controller/faculty_online_class_meet/$1";

$route['course_video_add'] = "admin/Faculty_staff_controller/course_video_add";

$route['course_video_add/(:any)'] = "admin/Faculty_staff_controller/course_video_add/$1";

$route['course_video_list'] = "admin/Faculty_staff_controller/course_video_list";



$route['center-access'] = "center/Center_login/login";

$route['center-forgot'] = "center/Center_login/center_forgot";

$route['center-dashboard'] = "center/Center_controller/center_dashboard";

$route['center_logout'] = "center/Center_controller/center_logout";

$route['center-profile'] = "center/Center_controller/center_profile";

$route['center-password'] = "center/Center_controller/center_password";

$route['setting'] = "center/Center_controller/setting";

$route['center_new_admisison'] = "center/Center_controller/center_new_admisison";

$route['add_credit_student_subject/(:any)/(:any)'] = "center/Center_controller/add_credit_student_subject/$1";

$route['upload_student_qualification/(:any)/(:any)'] = "center/Center_controller/upload_student_qualification/$1";

$route['print_student_challan/(:any)/(:any)'] = "center/Center_controller/print_student_challan/$1";

$route['print_student_cash_boucher/(:any)/(:any)'] = "center/Center_controller/print_student_cash_boucher/$1";

$route['center_admission_payment/(:any)/(:any)'] = "center/Center_controller/center_admission_payment/$1";

$route['pay_admission_via_wallet/(:any)/(:any)'] = "center/Center_controller/pay_admission_via_wallet/$1";

$route['center_admission_freecharge'] = "center/Center_controller/center_admission_freecharge";

$route['center_admission_ccavRequestHandler'] = "center/Center_controller/center_admission_ccavRequestHandler";

$route['upload-answer-book-center'] = "center/Center_controller/upload_answer_book_center";



$route['center-guide'] = "center/Center_controller/center_guide";

$route['how-to-onboard'] = "Welcome/how_to_onboard";
$route['delete-document/(:any)/(:any)/(:any)'] = "Welcome/delete_document/$1";



$route['erp_video_manual'] = "Welcome/erp_video_manual";
$route['send_custom_mail_via_erp'] = "admin/Admin_controller/send_custom_mail_via_erp";



$route['center_admission_ccavResponseHandler'] = "Welcome/center_admission_ccavResponseHandler";



$route['center_pending_admission_list'] = "center/Center_controller/center_pending_admission_list";

$route['pending_center_student_verification_remark'] = "center/Center_controller/pending_center_student_verification_remark";







$route['center_active_admisison'] = "center/Center_controller/center_active_admisison";



$route['center_pending_re_registration'] = "center/Center_controller/center_pending_re_registration";





$route['center_print_admission_form/(:any)'] = "center/Center_controller/center_print_admission_form/$1";

$route['center_student_qualification/(:any)'] = "center/Center_controller/center_student_qualification/$1";

$route['center_payment_failed_admisison'] = "center/Center_controller/center_payment_failed_admisison";

$route['center_passout_admisison'] = "center/Center_controller/center_passout_admisison";

$route['center_apply_degree'] = "center/Center_controller/center_apply_degree";

$route['apply_degree_by_center/(:any)'] = "center/Center_controller/apply_degree_by_center/$1";

$route['apply_degree_by_center/(:any)'] = "center/Center_controller/apply_degree_by_center/$1";

$route['make_center_degree_payment/(:any)'] = "center/Center_controller/make_center_degree_payment/$1";

$route['center_degree_ccavRequestHandler'] = "center/Center_controller/center_degree_ccavRequestHandler";

$route['center_degree_ccavResponseHandler'] = "Welcome/center_degree_ccavResponseHandler";



$route['center__print_id/(:any)'] = "center/Center_controller/center__print_id/$1";

$route['center-subject-list'] = "center/Center_controller/center_subject_list";

$route['center_add_paper'] = "center/Center_controller/center_add_paper";

$route['center_add_paper/(:any)'] = "center/Center_controller/center_add_paper/$1";

$route['center_view_all_paper/(:any)'] = "center/Center_controller/center_view_all_paper/$1";

$route['center_view_all_paper/(:any)/(:any)'] = "center/Center_controller/center_view_all_paper/$1";

$route['my_list_subject'] = "center/Center_controller/my_list_subject";

$route['update_center_subject/(:any)'] = "center/Center_controller/update_center_subject/$1";

$route['center_search_result'] = "center/Center_controller/center_search_result";

$route['center_manage_result'] = "center/Center_controller/center_manage_result";

$route['center_syllabus_list'] = "center/Center_controller/center_syllabus_list";

$route['add-consolidate-center-marksheet'] = "center/Center_controller/add_consolidate_center_marksheet";

$route['add-consolidate-center-marksheet/(:any)'] = "center/Center_controller/add_consolidate_center_marksheet/$1";

$route['consolidate-center-marksheet-list'] = "center/Center_controller/consolidate_center_marksheet_list";

$route['consolidate-marksheet-print-center/(:any)'] = "center/Center_controller/consolidate_marksheet_print_center/$1";

$route['edit-consolidate-marksheet-center/(:any)'] = "center/Center_controller/edit_consolidate_marksheet_center/$1";

$route['apply_transcript'] = "center/Center_controller/apply_transcript";

$route['center_transcript_application/(:any)'] = "center/Center_controller/transcript_application/$1";

$route["center_print_transcript/(:any)"] = "center/Center_controller/print_transcript/$1";

$route["center_pay_transcrip_certificate_fees/(:any)"] = "center/Center_controller/pay_transcrip_certificate_fees/$1";

$route['center-set-scholar-details/(:any)'] = "center/Center_controller/set_scholar_details/$1";

$route['recharge-wallet'] = "center/Center_controller/recharge_wallet";

$route['make_recharge_payment/(:any)'] = "center/Center_controller/make_recharge_payment/$1";

$route['recharge_ccavResponseHandler'] = "center/Center_controller/recharge_ccavResponseHandler";

$route['wallet-recharge-history'] = "center/Center_controller/wallet_recharge_history";





$route['add_cluster_center'] = "admin/Center_controller/add_cluster_center";

$route['add_cluster_center/(:any)'] = "admin/Center_controller/add_cluster_center/$1";

$route['cluster_center_list'] = "admin/Center_controller/cluster_center_list";

$route['delete_center/(:any)/(:any)'] = "admin/Setting_controller/delete_center/$1";



//letters center



$route['student_bonafide_ccavResponseHandler'] = "center/Center_payment_controller/student_bonafide_ccavResponseHandler";

$route['student_medium_inst_ccavResponseHandler'] = "center/Center_payment_controller/student_medium_inst_ccavResponseHandler";

$route['student_no_backlog_ccavResponseHandler'] = "center/Center_payment_controller/student_no_backlog_ccavResponseHandler";

$route['student_no_split_ccavResponseHandler'] = "center/Center_payment_controller/student_no_split_ccavResponseHandler";

$route['student_migration_ccavResponseHandler'] = "center/Center_payment_controller/student_migration_ccavResponseHandler";

$route['student_provisional_degree_ccavResponseHandler'] = "center/Center_payment_controller/student_provisional_degree_ccavResponseHandler";

$route['student_recomm_ccavResponseHandler'] = "center/Center_payment_controller/student_recomm_ccavResponseHandler";

$route['student_transfer_certificate_ccavResponseHandler'] = "center/Center_payment_controller/student_transfer_certificate_ccavResponseHandler";

$route['student_recomm_second_ccavResponseHandler'] = "center/Center_payment_controller/student_recomm_second_ccavResponseHandler";

$route['student_character_ccavResponseHandler'] = "center/Center_payment_controller/student_character_ccavResponseHandler";





$route['apply_student_bonafide/(:any)'] = "center/Center_controller/apply_student_bonafide/$1";

$route['student_bonafide_ccavRequestHandler'] = "center/Center_controller/student_bonafide_ccavRequestHandler";

//$route['student_bonafide_ccavResponseHandler'] = "Welcome/student_bonafide_ccavResponseHandler";

$route['pay_student_bonafide'] = "center/Center_controller/pay_student_bonafide";

$route['pay_student_bonafide/(:any)'] = "center/Center_controller/pay_student_bonafide/$1";

$route['print_student_bonafide/(:any)'] = "center/Center_controller/print_student_bonafide/$1";



$route['apply_student_medium_inst/(:any)'] = "center/Center_controller/apply_student_medium_inst/$1";

$route['student_medium_inst_ccavRequestHandler'] = "center/Center_controller/student_medium_inst_ccavRequestHandler";

//$route['student_medium_inst_ccavResponseHandler'] = "Welcome/student_medium_inst_ccavResponseHandler";

$route['pay_student_medium_inst'] = "center/Center_controller/pay_student_medium_inst";

$route['pay_student_medium_inst/(:any)'] = "center/Center_controller/pay_student_medium_inst/$1";

$route['print_student_med_inst/(:any)'] = "center/Center_controller/print_student_medium_inst/$1";



$route['apply_student_no_backlog/(:any)'] = "center/Center_controller/apply_student_no_backlog/$1";

$route['student_no_backlog_ccavRequestHandler'] = "center/Center_controller/student_no_backlog_ccavRequestHandler";

//$route['student_no_backlog_ccavResponseHandler'] = "Welcome/student_no_backlog_ccavResponseHandler";

$route['pay_student_no_backlog'] = "center/Center_controller/pay_student_no_backlog";

$route['pay_student_no_backlog/(:any)'] = "center/Center_controller/pay_student_no_backlog/$1";

$route['print_student_no_backlog/(:any)'] = "center/Center_controller/print_student_no_backlog/$1";



$route['apply_student_no_split/(:any)'] = "center/Center_controller/apply_student_no_split/$1";

$route['student_no_split_ccavRequestHandler'] = "center/Center_controller/student_no_split_ccavRequestHandler";

//$route['student_no_split_ccavResponseHandler'] = "Welcome/student_no_split_ccavResponseHandler";

$route['pay_student_no_split'] = "center/Center_controller/pay_student_no_split";

$route['pay_student_no_split/(:any)'] = "center/Center_controller/pay_student_no_split/$1";

$route['print_student_no_split/(:any)'] = "center/Center_controller/print_student_no_split/$1";



$route['apply_student_migration/(:any)'] = "center/Center_controller/apply_student_migration/$1";

$route['student_migration_ccavRequestHandler'] = "center/Center_controller/student_migration_ccavRequestHandler";

$route['pay_student_migration'] = "center/Center_controller/pay_student_migration";

$route['pay_student_migration/(:any)'] = "center/Center_controller/pay_student_migration/$1";

$route['print_student_migration/(:any)'] = "center/Center_controller/print_student_migration/$1";



$route['apply_student_provisional_degree/(:any)'] = "center/Center_controller/apply_student_provisional_degree/$1";

$route['student_provisional_degree_ccavRequestHandler'] = "center/Center_controller/student_provisional_degree_ccavRequestHandler";

$route['pay_student_provisional_degree'] = "center/Center_controller/pay_student_provisional_degree";

$route['pay_student_provisional_degree/(:any)'] = "center/Center_controller/pay_student_provisional_degree/$1";

$route['print_student_provisional_degree/(:any)'] = "center/Center_controller/print_student_provisional_degree/$1";





$route['apply_student_transfer_certificate/(:any)'] = "center/Center_controller/apply_student_transfer_certificate/$1";

$route['student_transfer_certificate_ccavRequestHandler'] = "center/Center_controller/student_transfer_certificate_ccavRequestHandler";

$route['pay_student_transfer_certificate'] = "center/Center_controller/pay_student_transfer_certificate";

$route['pay_student_transfer_certificate/(:any)'] = "center/Center_controller/pay_student_transfer_certificate/$1";

$route['print_student_transfer_certificate/(:any)'] = "center/Center_controller/print_student_transfer_certificate/$1";





$route['apply_student_recomm/(:any)'] = "center/Center_controller/apply_student_recomm/$1";

$route['student_recomm_ccavRequestHandler'] = "center/Center_controller/student_recomm_ccavRequestHandler";

//$route['student_recomm_ccavResponseHandler'] = "Welcome/student_recomm_ccavResponseHandler";

$route['pay_student_recomm'] = "center/Center_controller/pay_student_recomm";

$route['pay_student_recomm/(:any)'] = "center/Center_controller/pay_student_recomm/$1";

$route['print_student_recomm/(:any)'] = "center/Center_controller/print_student_recomm/$1";





$route['apply_student_recomm_second/(:any)'] = "center/Center_controller/apply_student_recomm_second/$1";

$route['student_recomm_second_ccavRequestHandler'] = "center/Center_controller/student_recomm_second_ccavRequestHandler";

//$route['student_recomm_ccavResponseHandler'] = "Welcome/student_recomm_ccavResponseHandler";

$route['pay_student_recomm_second'] = "center/Center_controller/pay_student_recomm_second";

$route['pay_student_recomm_second/(:any)'] = "center/Center_controller/pay_student_recomm_second/$1";

$route['print_student_recomm_second/(:any)'] = "center/Center_controller/print_student_recomm_second/$1";





$route['apply_student_character_certificate/(:any)'] = "center/Center_controller/apply_student_character_certificate/$1";

$route['student_character_certificate_ccavRequestHandler'] = "center/Center_controller/student_character_certificate_ccavRequestHandler";

$route['pay_student_character_certificate'] = "center/Center_controller/pay_student_character_certificate";

$route['pay_student_character_certificate/(:any)'] = "center/Center_controller/pay_student_character_certificate/$1";

$route['print_student_character_certificate/(:any)'] = "center/Center_controller/print_student_character_certificate/$1";





$route['center_guide_application_list'] = "center/Center_controller/center_guide_application_list";

$route['center_approve_guide_application_list'] = "center/Center_controller/center_approve_guide_application_list";

$route['center_guide_documents/(:any)'] = "center/Center_controller/center_guide_documents/$1";

$route['center_approve_guide_application/(:any)'] = "center/Center_controller/center_approve_guide_application/$1";

$route['center_view_supervisors_appointment_letter/(:any)'] = "center/Center_controller/center_view_supervisors_appointment_letter/$1";

$route['center_guide_application_update/(:any)'] = "center/Center_controller/center_guide_application_update/$1";







$route['center_inactive/(:any)/(:any)'] = "admin/Admin_login/center_inactive/$1";

$route['center_active/(:any)/(:any)'] = "admin/Admin_login/center_active/$1";





$route['upload_assignments'] = "student/Student_controller/upload_assignments";

$route['challan-payment'] = "student/Student_controller/challan_payment";

$route['balance_tution_fee'] = "student/Student_controller/balance_tution_fee";

$route['student_ledger'] = "student/Student_controller/student_ledger";





$route["phd_course_work"] = "web/Web_controller/phd_course_work";

$route["phd_course_work/enrollment"] = "web/Web_controller/phd_course_work/$1";

// $route["phd_course_work_form"] = "web/Web_controller/phd_course_work";



$route["phd_course_work_schedule"] = "admin/Research_controller/phd_course_work_schedule";

$route["phd_course_work_schedule/(:any)"] = "admin/Research_controller/phd_course_work_schedule/$1";



// $route["phd_course_work_data"] = "admin/Research_controller/phd_course_work_data";

$route["phd_course_work_data_success"] = "admin/Research_controller/phd_course_work_data_success";

$route["phd_course_work_data_fail"] = "admin/Research_controller/phd_course_work_data_fail";

$route["approve_course_work_registration/(:any)"] = "admin/Research_controller/approve_course_work_registration/$1";

$route["disapprove_course_work_registration/(:any)"] = "admin/Research_controller/disapprove_course_work_registration/$1";

$route["course_work_update_payment/(:any)"] = "admin/Research_controller/course_work_update_payment/$1";

$route["phd_course_work_approved_list"] = "admin/Research_controller/phd_course_work_approved_list";





$route["admin_answer_book"] = "admin/Exam_controller/admin_answer_book";

$route["generated_results"] = "admin/Exam_controller/generated_results";

$route["generated_results_excel"] = "admin/Exam_controller/generated_results_excel";

$route["generated_results_excel_pre"] = "admin/Exam_controller/generated_results_excel_pre";






$route["student_re_registration_freecharge"] = "center/Center_controller/student_re_registration_freecharge";



$route["student_re_registration_freecharge_process_done"] = "web/web_controller/student_re_registration_freecharge_process_done";



$route["re-registered-student-success"] = "admin/Student_controller/re_registered_student_success";
$route["pulp-re-registered-student-success"] = "admin/Student_controller/re_registered_student_success";

$route["re-registered-student-fail"] = "admin/Student_controller/re_registered_student_fail";
$route["pulp-re-registered-student-fail"] = "admin/Student_controller/re_registered_student_fail";



$route["student_re_registration_edit/(:any)/(:any)"]  = "admin/Student_controller/student_re_registration_edit/$1";



$route["new_thesis_list"] = "admin/Student_controller/new_thesis_list";

$route["complete_thesis_list"] = "admin/Student_controller/complete_thesis_list";

$route["rejected_thesis_list"] = "admin/Student_controller/rejected_thesis_list";

$route['delete_thesis_data/(:any)/(:any)'] = "admin/Admin_controller/delete_thesis_data/$1";



$route["complete_thesis_list"] = "admin/Student_controller/complete_thesis_list";



$route["new_synopsis_list"] = "admin/Student_controller/new_synopsis_list";

$route["complete_synopsis_list"] = "admin/Student_controller/complete_synopsis_list";



$route["print_synopsis_letter/(:any)"] = "admin/Student_controller/print_synopsis_letter/$1";

$route["rejected_synopsis_list"] = "admin/Student_controller/rejected_synopsis_list";

$route["update_synopsis/(:any)"] = "admin/Student_controller/update_synopsis/$1";



$route["abstract_report_list"] = "admin/Student_controller/abstract_report_list";

$route["approved_abstract_report_list"] = "admin/Student_controller/approved_abstract_report_list";

$route["rejected_abstract_report_list"] = "admin/Student_controller/rejected_abstract_report_list";

$route["update_abstract_report/(:any)"] = "admin/Student_controller/update_abstract_report/$1";

$route["progress_report_list"] = "admin/Student_controller/progress_report_list";

$route["progress_report_list_research"] = "admin/Research_controller/progress_report_list_research";

$route["add_progress_report"] = "admin/Research_controller/add_progress_report";

$route["add_progress_report/(:any)"] = "admin/Research_controller/add_progress_report/$1";



$route["activate-login"] = "admin/Student_controller/activate_login";

$route["hold-login"] = "admin/Student_controller/hold_login";

$route["hold-login-single"] = "admin/Student_controller/hold_login_single";

$route["activate-login-single"] = "admin/Student_controller/activate_login_single";

$route["pending_student_remark"] = "admin/Student_controller/pending_student_remark";







$route["separate_progress_report_list"] = "admin/Separate_student_controller/separate_progress_report_list";

$route["separate_abstract_report_list"] = "admin/Separate_student_controller/separate_abstract_report_list";

$route["student_addmission_form"] = "admin/Separate_student_controller/addmission_form";

$route["student_addmission_form/(:any)"] = "admin/Separate_student_controller/addmission_form/$1";

$route["enrolled_student_list"] = "admin/Separate_student_controller/enrolled_student_list";

$route["print_sep_id/(:any)"] = "admin/Separate_student_controller/print_sep_id/$1";

$route["blended_student_activity/(:any)"] = "admin/Separate_student_controller/blended_student_activity/$1";



$route["cancel_blended_student_list"] = "admin/Separate_student_controller/cancel_blended_student_list";

$route["hold-separate-login"] = "admin/Separate_student_controller/hold_separate_login";

$route["activate-separate-login"] = "admin/Separate_student_controller/activate_separate_login";

$route["hold-separate-login-single/(:any)"] = "admin/Separate_student_controller/hold_separate_login_single/$1";

$route["activate-separate-login-single/(:any)"] = "admin/Separate_student_controller/activate_separate_login_single/$1";



$route["activate-separate-hallticket/(:any)"] = "admin/Separate_student_controller/activate_separate_hallticket/$1";

$route["manage_separate_student_result"] = "admin/Separate_student_controller/manage_separate_student_result";

$route["search_separate_student_result"] = "admin/Separate_student_controller/search_separate_student_result";



$route['inactivate_separate_student_results/(:any)'] = "admin/Separate_student_controller/inactivate_results/$1";

$route['activate_separate_student_results/(:any)'] = "admin/Separate_student_controller/activate_results/$1";



$route['generate_separate_student_marksheet/(:any)/(:any)/(:any)'] = "admin/Separate_student_controller/generate_marksheet/$1";



$route['update_separate_student_result/(:any)'] = "admin/Separate_student_controller/update_result/$1";



$route['delete_separate_student_result/(:any)'] = "admin/Separate_student_controller/delete_result/$1";

$route["activate_all_separate_student_results"] = "admin/Separate_student_controller/activate_all_separate_student_results";

$route["deactivate_all_separate_student_results"] = "admin/Separate_student_controller/deactivate_all_separate_student_results";



$route["document_verification_success"] = "admin/Exam_controller/document_verification_success";

$route["document_verification_pending"] = "admin/Exam_controller/document_verification_pending";

$route["all_document_verification_detail_data/(:any)"] = "admin/Exam_controller/all_document_verification_detail_data/$1";

$route["offline_document_verification_add"] = "admin/Exam_controller/offline_document_verification_add";

$route["offline_document_verification_add/(:any)"] = "admin/Exam_controller/offline_document_verification_add/$1";

$route["offline_document_verification_list"] = "admin/Exam_controller/offline_document_verification_list";





$route["separate_student_results"] = "admin/Separate_student_controller/separate_student_generated_results";



$route["manage_separate_student_account/(:any)"] = "admin/Separate_student_controller/manage_separate_student_account/$1";



$route["manage_separate_student_account/(:any)/(:any)"] = "admin/Separate_student_controller/manage_separate_student_account/$1/$1";

$route["separate_student_re_registration/(:any)"] = "admin/Separate_student_controller/separate_student_re_registration/$1";



$route["consolidated_student_certificate_requests"] = "admin/Student_certificate_controller/consolidated_student_certificate_requests";



$route['student_certificate_history'] = "admin/Student_certificate_controller/student_certificate_history";

$route['student_certificate_history_activity/(:any)'] = "admin/Student_certificate_controller/student_certificate_history_activity/$1";



$route['student_examination_history'] = "admin/Exam_controller/student_examination_history";

$route['student_examination_history_activity/(:any)'] = "admin/Exam_controller/student_examination_history_activity/$1";





$route["student_migration_certificate_requests"] = "admin/Student_certificate_controller/student_migration_certificate_requests";

$route["student_migration_certificate_add_requests"] = "admin/Student_certificate_controller/student_migration_certificate_add_requests";

$route["student_migration_certificate_add_requests/(:any)"] = "admin/Student_certificate_controller/student_migration_certificate_add_requests/$1";

$route["verify_student_migration_requests/(:any)"] = "admin/Student_certificate_controller/verify_student_migration_requests/$1";

$route["student_migration_certificates"] = "admin/Student_certificate_controller/student_migration_certificates";

$route["print_student_migration_certificate/(:any)"] = "admin/Student_certificate_controller/print_student_migration_certificate/$1";

$route["student_migration_send_to_print"] = "admin/Student_certificate_controller/student_migration_send_to_print";

$route["student_transfer_cer_send_to_print"] = "admin/Student_certificate_controller/student_transfer_cer_send_to_print";

$route["student_consolidated_send_to_print"] = "admin/Student_certificate_controller/student_consolidated_send_to_print";

$route["student_transcript_send_to_print"] = "admin/Student_certificate_controller/student_transcript_send_to_print";

$route["student_degree_send_to_print"] = "admin/Student_certificate_controller/student_degree_send_to_print";

$route["student_prov_degree_send_to_print"] = "admin/Student_certificate_controller/student_prov_degree_send_to_print";



$route["student_migration_certificate/(:any)"] = "admin/Student_certificate_controller/student_migration_certificate/$1";



$route["unverify_student_migration_certificate/(:any)"] = "admin/Student_certificate_controller/unverify_student_migration_certificate/$1";





$route["add_student_transfer_requests"] = "admin/Student_certificate_controller/add_student_transfer_requests";



$route["add_student_character_requests"] = "admin/Student_certificate_controller/add_student_character_requests";



$route["add_student_degree_requests"] = "admin/Student_certificate_controller/add_student_degree_requests";











$route["approved_student_transfer_certificate"] = "admin/Student_certificate_controller/approved_student_transfer_certificate";

$route["print_transfer_certificate/(:any)"] = "admin/Student_certificate_controller/print_transfer_certificate/$1";



$route["student_transfer_certificate_requests"] = "admin/Student_certificate_controller/student_transfer_certificate_requests";



//$route["approved_student_transfer_certificate/(:any)"] = "admin/Student_certificate_controller/approved_student_transfer_certificate/$1";



$route["approved_student_transfer_certificate"] = "admin/Student_certificate_controller/approved_student_transfer_certificate";



$route["approved_student_certificate/(:any)"] = "admin/Student_certificate_controller/approved_student_certificate/$1";

$route["unapproved_student_transfer_certificate/(:any)"] = "admin/Student_certificate_controller/unapproved_student_transfer_certificate/$1";



$route["student_reccomendation_letter_requests"] = "admin/Student_certificate_controller/student_reccomendation_letter_requests";

$route["approve_student_recommendation_letter/(:any)"] = "admin/Student_certificate_controller/approve_student_recommendation_letter/(:any)";

$route["approved_student_recommendation_letters"] = "admin/Student_certificate_controller/approved_student_recommendation_letters";

$route["unapproved_student_recommendation_letter/(:any)"] = "admin/Student_certificate_controller/unapproved_student_recommendation_letter/$1";
$route["student_degree_failed_payment"] = "admin/Student_certificate_controller/student_degree_failed_payment";
$route["student_degree_requests"] = "admin/Student_certificate_controller/student_degree_requests";
$route["approved_student_degree_request/(:any)"] = "admin/Student_certificate_controller/approved_student_degree_request/$1";
$route["unapproved_student_degree/(:any)"] = "admin/Student_certificate_controller/unapproved_student_degree/$1";
// $route["approved_student_degrees"] = "admin/Student_certificate_controller/approved_student_degrees";
$route["print_student_degree/(:any)"] = "admin/Student_certificate_controller/print_student_degree/$1";
$route["student_provisional_degree_requests"] = "admin/Student_certificate_controller/student_provisional_degree_requests";
$route["apply_student_provisional_degrees"] = "admin/Student_certificate_controller/apply_student_provisional_degrees";
$route["apply_student_provisional_degrees/(:any)"] = "admin/Student_certificate_controller/apply_student_provisional_degrees/$1";
$route["approved_student_degrees"] = "admin/Student_certificate_controller/approved_student_degrees";
$route["print_degree/(:any)"] = "admin/Student_certificate_controller/print_degree/$1";
$route["student_approved_provisional_degrees"] = "admin/Student_certificate_controller/student_approved_provisional_degrees";
$route["print_provisional_degree_certificate_regular/(:any)"] = "admin/Student_certificate_controller/print_provisional_degree_certificate_regular/$1";
$route["approved_student_provisional_degrees/(:any)"] = "admin/Student_certificate_controller/approved_student_provisional_degrees/$1";
$route["student_transcript_certificate_failed"] = "admin/Student_certificate_controller/student_transcript_certificate_failed";
$route["student_transcript_certificate_success"] = "admin/Student_certificate_controller/student_transcript_certificate_success";
$route["student_transcript_certificate_approved"] = "admin/Student_certificate_controller/student_transcript_certificate_approved";
$route["print_admin_transcript/(:any)"] = "admin/Student_certificate_controller/print_admin_transcript/$1";
$route["add_student_transcript_certificate"] = "admin/Student_certificate_controller/add_student_transcript_certificate";
$route["add_student_transcript_certificate/(:any)"] = "admin/Student_certificate_controller/add_student_transcript_certificate/$1";
$route["edit_transcript/(:any)"] = "admin/Student_certificate_controller/edit_transcript/$1";
$route["update_transcript_payment/(:any)"] = "admin/Student_certificate_controller/update_transcript_payment/$1";
$route["approve_transcript/(:any)"] = "admin/Student_certificate_controller/approve_transcript/$1";
$route["disapprove_transcript/(:any)"] = "admin/Student_certificate_controller/disapprove_transcript/$1";
$route["student_character_certificate_requests"] = "admin/Student_certificate_controller/student_character_certificate_requests";
$route["student_character_certificate_approved"] = "admin/Student_certificate_controller/student_character_certificate_approved";
$route["student_character_certificate_update/(:any)"] = "admin/Student_certificate_controller/student_character_certificate_update/$1";
$route["print_character_certificate/(:any)"] = "admin/Student_certificate_controller/print_character_certificate/$1";
//student panel routes
$route["s_student_dashboard"] = "separate_student/Separate_student_controller/student_dashboard";
$route["s_id_card_print"] = "separate_student/Separate_student_controller/id_card_print";
$route["s_admission_form_print"] = "separate_student/Separate_student_controller/s_admission_form_print";
$route["s_student_logout"]  = "separate_student/Separate_student_controller/s_logout";
$route["s_e_library"] = "separate_student/Separate_student_controller/e_library";
$route["upload_assessment_seperate_student"] = "separate_student/Separate_student_controller/upload_assessment_seperate_student";
$route["s_student_password"] = "separate_student/Separate_student_controller/student_password";
$route["s_my_results"] = "separate_student/Separate_student_controller/my_results";
$route["s_e_book_list"] = "separate_student/Separate_student_controller/e_book_list";
$route["s-student-provisional-registration-letter"] = "separate_student/Separate_student_controller/provisional_registration_letter";
$route["s_show_my_result/(:any)"] = "separate_student/Separate_student_controller/show_my_result/$1";
$route['s-student-qualification-details'] = "separate_student/Separate_student_controller/student_qualification_details";
$route["s-upload_old_migration_certificate"] = "separate_student/Separate_student_controller/upload_old_migration_certificate";
$route["s-thesis_submission"] = "separate_student/Separate_student_controller/s_thesis_submission";
$route["s-synopsis_submission"] = "separate_student/Separate_student_controller/s_synopsis_submission";
$route["s_update_document"] = "separate_student/Separate_student_controller/update_document";
$route["s-abstract_report"] = "separate_student/Separate_student_controller/s_abstract_report";
$route["s-progress_report"] = "separate_student/Separate_student_controller/s_progress_report";
$route["migration-certificate"] = "student/Student_controller/migration_certificate";
$route["upload_old_migration_certificate"] = "student/Student_controller/upload_old_migration_certificate";
$route["pay_migration_certificate_fees"] = "student/Student_payment_controller/pay_migration_certificate_fees";
// Added by vishal for payment gatway
$route['initiate_payment'] = 'payment/Payment_controller/initiate_payment';
$route["accept_migration_undertaking"] = "student/Student_controller/accept_migration_undertaking";
$route["migration_certificate_freecharge"] = "student/Student_payment_controller/migration_certificate_freecharge";
$route["accept_transfer_undertaking"] = "student/Student_controller/accept_transfer_undertaking";
$route["transfer-certificate"] = "student/Student_controller/transfer_certificate";
$route["pay_transfer_certificate_fees"] = "student/Student_payment_controller/pay_transfer_certificate_fees";
$route["transfer_certificate_freecharge"] = "student/Student_payment_controller/transfer_certificate_freecharge";
$route["latter-of-recommendation"] = "student/Student_controller/latter_of_recommendation";
$route["pay_recommendation_letter_fees"] = "student/Student_payment_controller/pay_recommendation_letter_fees";
$route["recommendation_letter_freecharge"] = "student/Student_payment_controller/recommendation_letter_freecharge";
$route["student-degree"] = "student/Student_controller/student_degree";
$route["pay_degree_fees"] = "student/Student_payment_controller/pay_degree_fees";
$route["degree_freecharge"] = "student/Student_payment_controller/degree_freecharge";
$route["accept_provisional_undertaking"] = "student/Student_controller/accept_provisional_undertaking";
$route["student-provisional-degree"] = "student/Student_controller/student_provisional_degree";
$route["pay_provisional_degree_fees"] = "student/Student_payment_controller/pay_provisional_degree_fees";
$route["provisional_degree_freecharge"] = "student/Student_payment_controller/provisional_degree_freecharge";
$route["apply_for_migration"] = "admin/Separate_student_certificate_controller/apply_for_migration";
$route["apply_for_migration/(:any)"] = "admin/Separate_student_certificate_controller/apply_for_migration/$1";
$route["separate_student_migration_certificate_requests"] = "admin/Separate_student_certificate_controller/separate_student_migration_certificate_requests";
$route["verify_separate_student_migration_requests/(:any)"] = "admin/Separate_student_certificate_controller/verify_separate_student_migration_requests/$1";
$route["separate_student_migration_certificates"] = "admin/Separate_student_certificate_controller/separate_student_migration_certificates";
$route["print_separate_student_migration_certificate/(:any)"] = "admin/Separate_student_certificate_controller/print_separate_student_migration_certificate/$1";
$route["unverify_separate_student_migration_certificate/(:any)"] = "admin/Separate_student_certificate_controller/unverify_separate_student_migration_certificate/$1";
$route["apply_for_transfer"] = "admin/Separate_student_certificate_controller/apply_for_transfer";
$route["apply_for_transfer/(:any)"] = "admin/Separate_student_certificate_controller/apply_for_transfer/$1";
$route["separate_student_print_transfer_certificate/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_print_transfer_certificate/$1";
$route["separate_student_apply_transfer_certificate/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_apply_transfer_certificate/$1";
$route["approved_separate_student_transfer_certificate"] = "admin/Separate_student_certificate_controller/approved_separate_student_transfer_certificate";
$route["separate_student_transfer_certificate_requests"] = "admin/Separate_student_certificate_controller/separate_student_transfer_certificate_requests";
$route["separate_student_transfer_certificate/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_transfer_certificate/$1";
$route["unapproved_separate_student_transfer_certificate/(:any)"] = "admin/Separate_student_certificate_controller/unapproved_separate_student_transfer_certificate/$1";
// $route["separate_student_print_bonafide_certificate/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_print_bonafide_certificate/$1";
$route["apply_for_recommendation_letter"] = "admin/Separate_student_certificate_controller/apply_for_recommendation_letter";
$route["apply_for_recommendation_letter/(:any)"] = "admin/Separate_student_certificate_controller/apply_for_recommendation_letter/$1";
$route["separate_student_print_recommendation_letter/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_print_recommendation_letter/$1";
$route["separate_student_reccomendation_letter_requests"] = "admin/Separate_student_certificate_controller/separate_student_reccomendation_letter_requests";
$route["approve_separate_student_recommendation_letter/(:any)"] = "admin/Separate_student_certificate_controller/approve_separate_student_recommendation_letter/(:any)";
$route["approved_separate_student_recommendation_letters"] = "admin/Separate_student_certificate_controller/approved_separate_student_recommendation_letters";
$route["unapproved_separate_student_recommendation_letter/(:any)"] = "admin/Separate_student_certificate_controller/unapproved_separate_student_recommendation_letter/$1";
$route["separate_student_degree_apply"] = "admin/Separate_student_certificate_controller/separate_student_degree_apply";
$route["separate_student_degree_apply/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_degree_apply/$1";
$route["separate_student_print_degree/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_print_degree/$1";
$route["separate_student_degree_requests"] = "admin/Separate_student_certificate_controller/separate_student_degree_requests";
$route["approved_separate_student_degree_request/(:any)"] = "admin/Separate_student_certificate_controller/approved_separate_student_degree_request/$1";
$route["unapproved_separate_student_degree/(:any)"] = "admin/Separate_student_certificate_controller/unapproved_separate_student_degree/$1";
$route["approved_separate_student_degrees"] = "admin/Separate_student_certificate_controller/approved_separate_student_degrees";
$route["separate_student_provisional_degree_requests"] = "admin/Separate_student_certificate_controller/separate_student_provisional_degree_requests";
$route["separate_student_print_provisional_degree/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_print_provisional_degree/$1";
$route["separate_student_provisional_degrees/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_provisional_degrees/$1";
$route["approved_separate_student_provisional_degrees"] = "admin/Separate_student_certificate_controller/approved_separate_student_provisional_degrees";
$route["s_student_transcript_certificate_add"] = "admin/Separate_student_certificate_controller/s_student_transcript_certificate_add";
$route["s_student_transcript_certificate_add/(:any)"] = "admin/Separate_student_certificate_controller/s_student_transcript_certificate_add/$1";
$route["s_student_transcript_certificate_failed"] = "admin/Separate_student_certificate_controller/student_transcript_certificate_failed";
$route["s_student_transcript_certificate_success"] = "admin/Separate_student_certificate_controller/student_transcript_certificate_success";
$route["s_student_transcript_certificate_approved"] = "admin/Separate_student_certificate_controller/student_transcript_certificate_approved";
$route["s_edit_transcript/(:any)"] = "admin/Separate_student_certificate_controller/edit_transcript/$1";
$route["s_update_transcript_payment/(:any)"] = "admin/Separate_student_certificate_controller/update_transcript_payment/$1";
$route["s_approve_transcript/(:any)"] = "admin/Separate_student_certificate_controller/approve_transcript/$1";
$route["s_disapprove_transcript/(:any)"] = "admin/Separate_student_certificate_controller/disapprove_transcript/$1";
$route["s_print_admin_transcript/(:any)"] = "admin/Separate_student_certificate_controller/s_print_admin_transcript/$1";
$route["add_thesis"] = "admin/Separate_student_certificate_controller/add_thesis";
$route["new_separate_thesis_list"] = "admin/Separate_student_certificate_controller/new_separate_thesis_list";
$route["update_separate_thesis/(:any)"] = "admin/Separate_student_certificate_controller/update_separate_thesis/$1";
$route["separate_complete_thesis_list"] = "admin/Separate_student_certificate_controller/separate_complete_thesis_list";
$route["apply_separate_synopsis_list"] = "admin/Separate_student_certificate_controller/apply_separate_synopsis_list";
$route["apply_separate_synopsis_list/(:any)"] = "admin/Separate_student_certificate_controller/apply_separate_synopsis_list/$1";
$route["print_separate_synopsis/(:any)"] = "admin/Separate_student_certificate_controller/print_separate_synopsis/$1";
$route["new_separate_synopsis_list"] = "admin/Separate_student_certificate_controller/new_separate_synopsis_list";
$route["separate_complete_synopsis_list"] = "admin/Separate_student_certificate_controller/separate_complete_synopsis_list";
$route["update_separate_synopsis/(:any)"] = "admin/Separate_student_certificate_controller/update_separate_synopsis/$1";
$route["apply_separate_student_provisional_degrees"] = "admin/Separate_student_certificate_controller/apply_separate_student_provisional_degrees";
$route["apply_separate_student_provisional_degrees/(:any)"] = "admin/Separate_student_certificate_controller/apply_separate_student_provisional_degrees/$1";
//separate student certificate related routes
$route["s-migration-certificate"] = "separate_student/Separate_student_controller/s_migration_certificate";
$route["s_pay_migration_certificate_fees"] = "separate_student/Separate_student_payment_controller/s_pay_migration_certificate_fees";
$route["s_migration_certificate_freecharge"] = "separate_student/Separate_student_payment_controller/s_migration_certificate_freecharge";
$route["s-transfer-certificate"] = "separate_student/Separate_student_controller/s_transfer_certificate";
$route["s_pay_transfer_certificate_fees"] = "separate_student/Separate_student_payment_controller/s_pay_transfer_certificate_fees";
$route["s_transfer_certificate_freecharge"] = "separate_student/Separate_student_payment_controller/s_transfer_certificate_freecharge";
$route["s-latter-of-recommendation"] = "separate_student/Separate_student_controller/s_latter_of_recommendation";
$route["s_pay_recommendation_letter_fees"] = "separate_student/Separate_student_payment_controller/s_pay_recommendation_letter_fees";
$route["s_recommendation_letter_freecharge"] = "separate_student/Separate_student_payment_controller/s_recommendation_letter_freecharge";
$route["s-student-degree"] = "separate_student/Separate_student_controller/s_student_degree";
$route["s_pay_degree_fees"] = "separate_student/Separate_student_payment_controller/s_pay_degree_fees";
$route["s_degree_freecharge"] = "separate_student/Separate_student_payment_controller/s_degree_freecharge";
$route["s-student-provisional-degree"] = "separate_student/Separate_student_controller/s_student_provisional_degree";
$route["s_pay_provisional_degree_fees"] = "separate_student/Separate_student_payment_controller/s_pay_provisional_degree_fees";
$route["s_provisional_degree_freecharge"] = "separate_student/Separate_student_payment_controller/s_provisional_degree_freecharge";
$route['separate_student_search_marksheet'] = "admin/Separate_student_controller/search_marksheet";
$route['duplicate_marksheet_blended'] = "admin/Separate_student_controller/duplicate_marksheet_blended";
$route['create_duplicate_marksheet_blended/(:any)'] = "admin/Separate_student_controller/create_duplicate_marksheet_blended/$1";
$route['print_duplicate_inner_marksheet_blended/(:any)'] = "admin/Separate_student_controller/print_duplicate_inner_marksheet_blended/$1";
$route['print_separate_student_inner_marksheet/(:any)'] = "admin/Separate_student_controller/print_inner_marksheet/$1";
$route['edit_separate_student_marksheet/(:any)'] = "admin/Separate_student_controller/edit_marksheet/$1";
$route['delete_separate_student_marksheet/(:any)'] = "admin/Separate_student_controller/delete_marksheet/$1";
$route["generated_separate_student_results_excel"] = "admin/Separate_student_controller/generated_results_excel";
$route["separate_marksheet_print_dispatch_list"] = "admin/Separate_student_controller/separate_marksheet_print_dispatch_list";
$route["generated_pre_student_results_excel"] = "admin/Separate_student_controller/generated_pre_student_results_excel";
$route["add_external_verification_user"] = "admin/External_controller/add_external_verification_user";
$route["add_external_verification_user/(:any)"] = "admin/External_controller/add_external_verification_user/$1";
$route["external_verification_user"] = "admin/External_controller/external_verification_user";
$route["external_verification_student_list"] = "admin/External_controller/external_verification_student_list";
$route["external_verification_student_rejected_list"] = "admin/External_controller/external_verification_student_rejected_list";
$route["view_verify_details/(:any)"] = "admin/External_controller/view_verify_details/$1";
$route["external_blended_verification_student_list"] = "admin/External_controller/external_blended_verification_student_list";
$route["external_blended_verification_student_rejected_list"] = "admin/External_controller/external_blended_verification_student_rejected_list";
$route["view_blended_verify_details/(:any)"] = "admin/External_controller/view_blended_verify_details/$1";
$route["marksheets"] = "student/Student_controller/marksheets";
$route["show_my_marksheet/(:any)"] = "student/Student_controller/show_my_marksheet/$1";
$route["show_my_course_marksheet/(:any)"] = "student/Student_controller/show_my_course_marksheet/$1";
$route["s_marksheets"] = "separate_student/Separate_student_controller/marksheets";
$route["s_show_my_marksheet/(:any)"] = "separate_student/Separate_student_controller/show_my_marksheet/$1";
$route["s_show_my_course_marksheet/(:any)"] = "separate_student/Separate_student_controller/s_show_my_course_marksheet/$1";
/*================================================ Routing By Pradeep ============================================*/
/*=============== FRONT ===============*/
$route['caste-based-discrimination'] = "web/Web_controller/caste_based_discrimination";
$route['student_reregistration_payment/(:any)/(:any)/(:any)'] = "web/web_controller/student_reregistration_payment/$1";
$route['re_registration_ccavResponseHandler'] = "web/Payment_controller/re_registration_ccavResponseHandler";
$route['appointment-letter-for-supervisors'] = "web/Web_controller/appointment_letter_for_supervisors";
$route['appointment-letter-for-supervisors/(:any)'] = "web/Web_controller/appointment_letter_for_supervisors/$1";
$route['course_work_ccavRequestHandler'] = "web/Payment_controller/course_work_ccavRequestHandler";
$route['course_work_ccavResponseHandler'] = "web/Payment_controller/course_work_ccavResponseHandler";
$route['exam_payment_ccavRequestHandler'] = "web/Payment_controller/exam_payment_ccavRequestHandler";
$route['exam_payment_ccavResponseHandler'] = "web/Payment_controller/exam_payment_ccavResponseHandler";
$route['collaboration-form'] = "web/Web_controller/collaboration_form";
$route['collaboration-form/(:any)'] = "web/Web_controller/collaboration_form/$1";
$route['collaboration-form-foreign'] = "web/Web_controller/collaboration_form_foreign";
/*=============== ADMIN ===============*/
$route['university_activity'] = "admin/News_controller/university_activity";
$route['university_activity/(:any)'] = "admin/News_controller/university_activity/$1";
$route['university_activity/(:any)/(:any)'] = "admin/News_controller/university_activity/$1";
$route['manage_center_course'] = "admin/Center_controller/manage_center_course";
$route['manage_center_course/(:any)'] = "admin/Center_controller/manage_center_course/$1";
$route['copy_center_fees'] = "admin/Center_controller/copy_center_fees";
$route['admin_employee_documents/(:any)'] = "admin/Setting_controller/admin_employee_documents/$1";
$route['view_report_comments/(:any)'] = "admin/Faculty_staff_controller/view_report_comments/$1";
$route['cbd_complaint_list'] = "admin/Admin_controller/cbd_complaint_list";
$route['rti_grievance_list'] = "admin/Admin_controller/rti_grievance_list";
$route['edit_rti_grievance/(:any)'] = "admin/Admin_controller/edit_rti_grievance/$1";
$route['delete_cbd_files'] = "admin/Admin_controller/delete_cbd_files";
$route['delete_cbd_rtis'] = "admin/Admin_controller/delete_cbd_rtis";
$route['admin_edit_cdb_form/(:any)'] = "admin/Admin_controller/admin_edit_cdb_form/$1";
$route['cancel_admission_list'] = "admin/Student_controller/cancel_admission_list";
$route['direct_payment_success_list'] = "admin/Admin_controller/direct_payment_success_list";
$route['direct_payment_failed_list'] = "admin/Admin_controller/direct_payment_failed_list";
$route['approve_guide_application/(:num)'] = "admin/Research_controller/approve_guide_application/$1";
$route['approve_guide_application_list'] = "admin/Research_controller/approve_guide_application_list";
$route['guide_payment_details/(:any)'] = "admin/Research_controller/guide_payment_details/$1";
$route['co_guide_payment_details/(:any)'] = "admin/Research_controller/co_guide_payment_details/$1";
$route['view-supervisors-appointment-letter/(:num)'] = "admin/Research_controller/view_supervisors_appointment_letter/$1";
$route['account_monthly_collection'] = "admin/Account_controller/account_monthly_collection";
$route['monthly_account_statement'] = "admin/Account_controller/monthly_account_statement";
$route['account_vendor'] = "admin/Account_controller/account_vendor";
$route['account_vendor/(:any)'] = "admin/Account_controller/account_vendor/$1";
$route['account_bill_list'] = "admin/Account_controller/account_bill_list";
$route['account_bill_list/(:any)'] = "admin/Account_controller/account_bill_list/$1";
$route['all_payment_list'] = "admin/Account_controller/all_payment_list";
$route['pr_list'] = "admin/Admin_controller/pr_list";
$route['add_enquiry_lead'] = "admin/Admin_controller/add_enquiry_lead";
$route['add_enquiry_lead/(:any)'] = "admin/Admin_controller/add_enquiry_lead/$1";
$route['enquiry_lead_list'] = "admin/Admin_controller/enquiry_lead_list";
$route['seperate_student_assessment'] = "admin/Admin_controller/seperate_student_assessment";
$route['student_payment_account_pending'] = "admin/Account_controller/student_payment_account_pending/";
$route['filter_instollment'] = "admin/Account_controller/student_payment_account_pending";
$route['add_library'] = "admin/Library_controller/add_library";
$route['add_library/(:any)'] = "admin/Library_controller/add_library/$1";
// $route['library_list'] = "admin/Library_controller/library_list";
$route['course_library_list'] = "admin/Library_controller/course_library_list";
$route['library_list'] = "admin/Library_controller/library_list";
$route['count_library_list'] = "admin/Library_controller/count_library_list";
$route['stream_library_list'] = "admin/Library_controller/stream_library_list";
$route['year_sem_library_list'] = "admin/Library_controller/year_sem_library_list";
$route['subject_library_list'] = "admin/Library_controller/subject_library_list";
$route['book_library_list'] = "admin/Library_controller/book_library_list";
$route['create_subject_quiz/(:any)'] = "admin/Exam_controller/create_subject_quiz/$1";
$route['update_phd_subject_question/(:num)'] = "admin/Exam_controller/update_phd_subject_question/$1";
$route['left_employee_list'] = "admin/Setting_controller/left_employee_list";
$route['employee_not_left/(:num)'] = "admin/Setting_controller/employee_not_left/$1";
//letters on 18 july 2023
$route['student_apply_bonafide_cer'] = "admin/Student_certificate_controller/student_apply_bonafide_cer";
$route['student_apply_bonafide_cer/(:any)'] = "admin/Student_certificate_controller/student_apply_bonafide_cer/$1";
$route['student_req_bonafide_cer'] = "admin/Student_certificate_controller/student_req_bonafide_cer";
$route['update_payment_bonafide/(:any)'] = "admin/Student_certificate_controller/update_payment_bonafide/$1";
$route['approve_bona_application/(:any)'] = "admin/Student_certificate_controller/approve_bona_application/$1";
$route['disapprove_bona_application/(:any)'] = "admin/Student_certificate_controller/disapprove_bona_application/$1";
$route['student_approved_bonafide_cer'] = "admin/Student_certificate_controller/student_approved_bonafide_cer";
$route['print_bonafide_cer/(:any)'] = "admin/Student_certificate_controller/print_bonafide_cer/$1";
$route['student_apply_bonafide_scholarship_cer'] = "admin/Student_certificate_controller/student_apply_bonafide_scholarship_cer";
$route['student_apply_bonafide_scholarship_cer/(:any)'] = "admin/Student_certificate_controller/student_apply_bonafide_scholarship_cer/$1";
$route['student_req_bonafide_scholarship_cer'] = "admin/Student_certificate_controller/student_req_bonafide_scholarship_cer";
$route['update_payment_bonafide_scholarship/(:any)'] = "admin/Student_certificate_controller/update_payment_bonafide_scholarship/$1";
$route['approve_bona_scholarship_application/(:any)'] = "admin/Student_certificate_controller/approve_bona_scholarship_application/$1";
$route['disapprove_bona_scholarship_application/(:any)'] = "admin/Student_certificate_controller/disapprove_bona_scholarship_application/$1";
$route['student_approved_bonafide_scholarship_cer'] = "admin/Student_certificate_controller/student_approved_bonafide_scholarship_cer";
$route['print_bonafide_scholarship_cer/(:any)'] = "admin/Student_certificate_controller/print_bonafide_scholarship_cer/$1";
$route['student_apply_inst_medium_letter'] = "admin/Student_certificate_controller/student_apply_inst_medium_letter";
$route['student_apply_inst_medium_letter/(:any)'] = "admin/Student_certificate_controller/student_apply_inst_medium_letter/$1";
$route['student_req_inst_medium_letter'] = "admin/Student_certificate_controller/student_req_inst_medium_letter";
$route['update_payment_inst_medium/(:any)'] = "admin/Student_certificate_controller/update_payment_inst_medium/$1";
$route['approve_inst_medium_application/(:any)'] = "admin/Student_certificate_controller/approve_inst_medium_application/$1";
$route['disapprove_inst_medium_application/(:any)'] = "admin/Student_certificate_controller/disapprove_inst_medium_application/$1";
$route['student_approved_inst_medium_letter'] = "admin/Student_certificate_controller/student_approved_inst_medium_letter";
$route['print_inst_medium_letter/(:any)'] = "admin/Student_certificate_controller/print_inst_medium_letter/$1";
$route['student_apply_no_backlog_letter'] = "admin/Student_certificate_controller/student_apply_no_backlog_letter";
$route['student_apply_no_backlog_letter/(:any)'] = "admin/Student_certificate_controller/student_apply_no_backlog_letter/$1";
$route['student_req_no_backlog_letter'] = "admin/Student_certificate_controller/student_req_no_backlog_letter";
$route['update_payment_no_backlog/(:any)'] = "admin/Student_certificate_controller/update_payment_no_backlog/$1";
$route['approve_no_backlog_application/(:any)'] = "admin/Student_certificate_controller/approve_no_backlog_application/$1";
$route['disapprove_no_backlog_application/(:any)'] = "admin/Student_certificate_controller/disapprove_no_backlog_application/$1";
$route['student_approved_no_backlog_letter'] = "admin/Student_certificate_controller/student_approved_no_backlog_letter";
$route['print_no_backlog_letter/(:any)'] = "admin/Student_certificate_controller/print_no_backlog_letter/$1";
$route['student_apply_no_split_letter'] = "admin/Student_certificate_controller/student_apply_no_split_letter";
$route['student_apply_no_split_letter/(:any)'] = "admin/Student_certificate_controller/student_apply_no_split_letter/$1";
$route['student_req_no_split_letter'] = "admin/Student_certificate_controller/student_req_no_split_letter";
$route['update_payment_no_split/(:any)'] = "admin/Student_certificate_controller/update_payment_no_split/$1";
$route['approve_no_split_application/(:any)'] = "admin/Student_certificate_controller/approve_no_split_application/$1";
$route['disapprove_no_split_application/(:any)'] = "admin/Student_certificate_controller/disapprove_no_split_application/$1";
$route['student_approved_no_split_letter'] = "admin/Student_certificate_controller/student_approved_no_split_letter";
$route['print_no_split_letter/(:any)'] = "admin/Student_certificate_controller/print_no_split_letter/$1";
$route['student_apply_reccom_letter'] = "admin/Student_certificate_controller/student_apply_reccom_letter";
$route['student_apply_reccom_letter/(:any)'] = "admin/Student_certificate_controller/student_apply_reccom_letter/$1";
$route['student_req_reccom_letter'] = "admin/Student_certificate_controller/student_req_reccom_letter";
$route['update_payment_reccom/(:any)'] = "admin/Student_certificate_controller/update_payment_reccom/$1";
$route['approve_reccom_application/(:any)'] = "admin/Student_certificate_controller/approve_reccom_application/$1";
$route['disapprove_reccom_application/(:any)'] = "admin/Student_certificate_controller/disapprove_reccom_application/$1";
$route['student_approved_reccom_letter'] = "admin/Student_certificate_controller/student_approved_reccom_letter";
$route['print_reccom_letter/(:any)'] = "admin/Student_certificate_controller/print_reccom_letter/$1";
$route['second_student_apply_reccom_letter'] = "admin/Student_certificate_controller/second_student_apply_reccom_letter";
$route['second_student_apply_reccom_letter/(:any)'] = "admin/Student_certificate_controller/second_student_apply_reccom_letter/$1";
$route['second_student_req_reccom_letter'] = "admin/Student_certificate_controller/second_student_req_reccom_letter";
$route['second_update_payment_reccom/(:any)'] = "admin/Student_certificate_controller/second_update_payment_reccom/$1";
$route['second_approve_reccom_application/(:any)'] = "admin/Student_certificate_controller/second_approve_reccom_application/$1";
$route['second_disapprove_reccom_application/(:any)'] = "admin/Student_certificate_controller/second_disapprove_reccom_application/$1";
$route['second_student_approved_reccom_letter'] = "admin/Student_certificate_controller/second_student_approved_reccom_letter";
$route['second_print_reccom_letter/(:any)'] = "admin/Student_certificate_controller/second_print_reccom_letter/$1";
//SEPERATE STUDENT LETTER 25 JULY
$route['blended_student_apply_bonafide_cer'] = "admin/Separate_student_certificate_controller/student_apply_bonafide_cer";
$route['blended_student_apply_bonafide_cer/(:any)'] = "admin/Separate_student_certificate_controller/student_apply_bonafide_cer/$1";
$route['blended_student_req_bonafide_cer'] = "admin/Separate_student_certificate_controller/student_req_bonafide_cer";
$route['blended_update_payment_bonafide/(:any)'] = "admin/Separate_student_certificate_controller/update_payment_bonafide/$1";
$route['blended_approve_bona_application/(:any)'] = "admin/Separate_student_certificate_controller/approve_bona_application/$1";
$route['blended_disapprove_bona_application/(:any)'] = "admin/Separate_student_certificate_controller/disapprove_bona_application/$1";
$route['blended_student_approved_bonafide_cer'] = "admin/Separate_student_certificate_controller/student_approved_bonafide_cer";
$route['blended_print_bonafide_cer/(:any)'] = "admin/Separate_student_certificate_controller/print_bonafide_cer/$1";
$route['blended_student_apply_inst_medium_letter'] = "admin/Separate_student_certificate_controller/student_apply_inst_medium_letter";
$route['blended_student_apply_inst_medium_letter/(:any)'] = "admin/Separate_student_certificate_controller/student_apply_inst_medium_letter/$1";
$route['blended_student_req_inst_medium_letter'] = "admin/Separate_student_certificate_controller/student_req_inst_medium_letter";
$route['blended_update_payment_inst_medium/(:any)'] = "admin/Separate_student_certificate_controller/update_payment_inst_medium/$1";
$route['blended_approve_inst_medium_application/(:any)'] = "admin/Separate_student_certificate_controller/approve_inst_medium_application/$1";
$route['blended_disapprove_inst_medium_application/(:any)'] = "admin/Separate_student_certificate_controller/disapprove_inst_medium_application/$1";
$route['blended_student_approved_inst_medium_letter'] = "admin/Separate_student_certificate_controller/student_approved_inst_medium_letter";
$route['blended_print_inst_medium_letter/(:any)'] = "admin/Separate_student_certificate_controller/print_inst_medium_letter/$1";
$route['blended_student_apply_no_backlog_letter'] = "admin/Separate_student_certificate_controller/student_apply_no_backlog_letter";
$route['blended_student_apply_no_backlog_letter/(:any)'] = "admin/Separate_student_certificate_controller/student_apply_no_backlog_letter/$1";
$route['blended_student_req_no_backlog_letter'] = "admin/Separate_student_certificate_controller/student_req_no_backlog_letter";
$route['blended_update_payment_no_backlog/(:any)'] = "admin/Separate_student_certificate_controller/update_payment_no_backlog/$1";
$route['blended_approve_no_backlog_application/(:any)'] = "admin/Separate_student_certificate_controller/approve_no_backlog_application/$1";
$route['blended_disapprove_no_backlog_application/(:any)'] = "admin/Separate_student_certificate_controller/disapprove_no_backlog_application/$1";
$route['blended_student_approved_no_backlog_letter'] = "admin/Separate_student_certificate_controller/student_approved_no_backlog_letter";
$route['blended_print_no_backlog_letter/(:any)'] = "admin/Separate_student_certificate_controller/print_no_backlog_letter/$1";
$route['blended_student_apply_no_split_letter'] = "admin/Separate_student_certificate_controller/student_apply_no_split_letter";
$route['blended_student_apply_no_split_letter/(:any)'] = "admin/Separate_student_certificate_controller/student_apply_no_split_letter/$1";
$route['blended_student_req_no_split_letter'] = "admin/Separate_student_certificate_controller/student_req_no_split_letter";
$route['blended_update_payment_no_split/(:any)'] = "admin/Separate_student_certificate_controller/update_payment_no_split/$1";
$route['blended_approve_no_split_application/(:any)'] = "admin/Separate_student_certificate_controller/approve_no_split_application/$1";
$route['blended_disapprove_no_split_application/(:any)'] = "admin/Separate_student_certificate_controller/disapprove_no_split_application/$1";
$route['blended_student_approved_no_split_letter'] = "admin/Separate_student_certificate_controller/student_approved_no_split_letter";
$route['blended_print_no_split_letter/(:any)'] = "admin/Separate_student_certificate_controller/print_no_split_letter/$1";
$route['blended_student_apply_reccom_letter'] = "admin/Separate_student_certificate_controller/student_apply_reccom_letter";
$route['blended_student_apply_reccom_letter/(:any)'] = "admin/Separate_student_certificate_controller/student_apply_reccom_letter/$1";
$route['blended_student_req_reccom_letter'] = "admin/Separate_student_certificate_controller/student_req_reccom_letter";
$route['blended_update_payment_reccom/(:any)'] = "admin/Separate_student_certificate_controller/update_payment_reccom/$1";
$route['blended_approve_reccom_application/(:any)'] = "admin/Separate_student_certificate_controller/approve_reccom_application/$1";
$route['blended_disapprove_reccom_application/(:any)'] = "admin/Separate_student_certificate_controller/disapprove_reccom_application/$1";
$route['blended_student_approved_reccom_letter'] = "admin/Separate_student_certificate_controller/student_approved_reccom_letter";
$route['blended_print_reccom_letter/(:any)'] = "admin/Separate_student_certificate_controller/print_reccom_letter/$1";
//character certificate
$route['blended_student_apply_character_certificate'] = "admin/Separate_student_certificate_controller/student_apply_character_certificate";
$route['blended_student_apply_character_certificate/(:any)'] = "admin/Separate_student_certificate_controller/student_apply_character_certificate/$1";
$route['blended_student_req_character_certificate'] = "admin/Separate_student_certificate_controller/student_req_character_certificate";
$route['blended_update_payment_character_certificate/(:any)'] = "admin/Separate_student_certificate_controller/update_payment_character_certificate/$1";
$route['blended_student_approved_character_certificate/(:any)'] = "admin/Separate_student_certificate_controller/student_approved_character_certificate/$1";
$route['blended_disapprove_character_certificate/(:any)'] = "admin/Separate_student_certificate_controller/disapprove_character_certificate/$1";
$route['blended_student_approved_character_certificate'] = "admin/Separate_student_certificate_controller/student_approved_character_certificate";
$route['blended_print_character_certificate/(:any)'] = "admin/Separate_student_certificate_controller/print_character_certificate/$1";
/*=============== CENTER ===============*/
$route['center_examination_form'] = "center/Center_controller/examination_form";
$route['center_examination_form/(:any)'] = "center/Center_controller/examination_form/$1";
$route['center_examination_form_list'] = "center/Center_controller/center_examination_form_list";
$route['center_student_reregistration_form'] = "center/Center_controller/center_student_reregistration_form";
$route['center_student_reregistration_form/(:any)'] = "center/Center_controller/center_student_reregistration_form/$1";
$route["center_student_reregistration/(:any)"] = "center/Center_controller/center_student_reregistration/$1";
$route['center_student_reregistration_form_list'] = "center/Center_controller/center_student_reregistration_form_list";
$route['center_make_exam_payment/(:any)/(:any)'] = "center/Center_controller/make_exam_payment/$1";
$route['center_exam_ccavRequestHandler'] = "center/Center_controller/center_exam_ccavRequestHandler";
$route['center_exam_ccavResponseHandler'] = "center/Center_controller/center_exam_ccavResponseHandler";
$route['center_re_registration_ccavRequestHandler'] = "center/Center_controller/re_registration_ccavRequestHandler";
$route['center_re_registration_ccavResponseHandler'] = "center/Center_controller/re_registration_ccavResponseHandler";
$route['center_student_reregistration_payment/(:any)/(:any)/(:any)'] = "center/Center_controller/student_reregistration_payment/$1";
$route['center_active_hall_ticket_list'] = "center/Center_controller/center_active_hall_ticket_list";
$route['make-consolidate-center-payment/(:any)'] = "center/Center_controller/make_consolidate_center_payment/$1";
$route['consolidated_payment_ccavRequestHandler'] = "center/Center_controller/consolidated_payment_ccavRequestHandler";
$route['consolidated_payment_ccavResponseHandler'] = "center/Center_controller/consolidated_payment_ccavResponseHandler";
$route['center_student_transcript_ccavRequestHandler'] = "center/Center_controller/center_student_transcript_ccavRequestHandler";
$route['center_student_transcript_ccavResponseHandler'] = "center/Center_controller/center_student_transcript_ccavResponseHandler";
$route['student_assignment_form'] = "center/Center_controller/student_assignment_form";
$route['student_assignment_form/(:any)'] = "center/Center_controller/student_assignment_form/$1";
$route['student_assignment_pending_list'] = "center/Center_controller/student_assignment_pending_list";
$route['student_assignment_rejected_list'] = "center/Center_controller/student_assignment_rejected_list";
$route['student_assignment_approved_list'] = "center/Center_controller/student_assignment_approved_list";
$route['student_self_Assessment_form'] = "center/Center_controller/student_self_Assessment_form";
$route['student_self_Assessment_form/(:any)'] = "center/Center_controller/student_self_Assessment_form/$1";
$route['self_Assessment_pending_list'] = "center/Center_controller/self_Assessment_pending_list";
$route['self_Assessment_rejected_list'] = "center/Center_controller/self_Assessment_rejected_list";
$route['self_Assessment_approved_list'] = "center/Center_controller/self_Assessment_approved_list";
$route['center_approve_self_assessment/(:any)'] = "center/Center_controller/center_approve_self_assessment/$1";
$route['center_self_reject_remark'] = "center/Center_controller/center_self_reject_remark";
$route['student_teacher_Assessment_form'] = "center/Center_controller/student_teacher_Assessment_form";
$route['student_teacher_Assessment_form/(:any)'] = "center/Center_controller/student_teacher_Assessment_form/$1";
$route['teacher_Assessment_pending_list'] = "center/Center_controller/teacher_Assessment_pending_list";
$route['teacher_Assessment_rejected_list'] = "center/Center_controller/teacher_Assessment_rejected_list";
$route['teacher_Assessment_approved_list'] = "center/Center_controller/teacher_Assessment_approved_list";
$route['center_approve_teacher_assessment/(:any)'] = "center/Center_controller/center_approve_teacher_assessment/$1";
$route['center_teacher_reject_remark'] = "center/Center_controller/center_teacher_reject_remark";
$route['student_industry_Assessment_form'] = "center/Center_controller/student_industry_Assessment_form";
$route['student_industry_Assessment_form/(:any)'] = "center/Center_controller/student_industry_Assessment_form/$1";
$route['industry_Assessment_pending_list'] = "center/Center_controller/industry_Assessment_pending_list";
$route['industry_Assessment_rejected_list'] = "center/Center_controller/industry_Assessment_rejected_list";
$route['industry_Assessment_approved_list'] = "center/Center_controller/industry_Assessment_approved_list";
$route['center_approve_industry_assessment/(:any)'] = "center/Center_controller/center_approve_industry_assessment/$1";
$route['center_industry_reject_remark'] = "center/Center_controller/center_industry_reject_remark";
$route['student_parent_Assessment_form'] = "center/Center_controller/student_parent_Assessment_form";
$route['student_parent_Assessment_form/(:any)'] = "center/Center_controller/student_parent_Assessment_form/$1";
$route['parent_Assessment_pending_list'] = "center/Center_controller/parent_Assessment_pending_list";
$route['parent_Assessment_rejected_list'] = "center/Center_controller/parent_Assessment_rejected_list";
$route['parent_Assessment_approved_list'] = "center/Center_controller/parent_Assessment_approved_list";
$route['center_approve_parent_assessment/(:any)'] = "center/Center_controller/center_approve_parent_assessment/$1";
$route['center_parent_reject_remark'] = "center/Center_controller/center_parent_reject_remark";
/*=============== STUDENT ===============
$route['student_degree_ccavRequestHandler'] = "student/Student_payment_controller/student_degree_ccavRequestHandler";
$route['student_degree_ccavResponseHandler'] = "student/Student_payment_controller/student_degree_ccavResponseHandler";
$route['student_migration_ccavRequestHandler'] = "student/Student_payment_controller/student_migration_ccavRequestHandler";
$route['student_migration_ccavResponseHandler'] = "student/Student_payment_controller/student_migration_ccavResponseHandler";
$route['student_transfer_ccavRequestHandler'] = "student/Student_payment_controller/student_transfer_ccavRequestHandler";
$route['student_transfer_ccavResponseHandler'] = "student/Student_payment_controller/student_transfer_ccavResponseHandler";
$route['student_recommendation_ccavRequestHandler'] = "student/Student_payment_controller/student_recommendation_ccavRequestHandler";
$route['student_recommendation_ccavResponseHandler'] = "student/Student_payment_controller/student_recommendation_ccavResponseHandler";
$route['student_provisional_ccavRequestHandler'] = "student/Student_payment_controller/student_provisional_ccavRequestHandler";
$route['student_provisional_ccavResponseHandler'] = "student/Student_payment_controller/student_provisional_ccavResponseHandler";
$route["pay_transcrip_certificate_fees"] = "student/Student_payment_controller/pay_transcrip_certificate_fees";
$route["accept_transcript_undertaking"] = "student/Student_controller/accept_transcript_undertaking";
$route['student_transcript_ccavRequestHandler'] = "student/Student_payment_controller/student_transcript_ccavRequestHandler";
$route['student_transcript_ccavResponseHandler'] = "student/Student_payment_controller/student_transcript_ccavResponseHandler";
$route['student_consolidate_student_marksheet'] = "student/Student_controller/student_consolidate_student_marksheet";
$route['print_consolidate_student_marksheet/(:any)'] = "student/Student_controller/consolidate_student_marksheet/$1";
/*=============== SEPARATE STUDENT ===============*/
$route['s_student_provisional_ccavRequestHandler'] = "separate_student/Separate_student_payment_controller/student_provisional_ccavRequestHandler";
$route['s_student_provisional_ccavResponseHandler'] = "separate_student/Separate_student_payment_controller/student_provisional_ccavResponseHandler";
$route['s_student_degree_ccavRequestHandler'] = "separate_student/Separate_student_payment_controller/student_degree_ccavRequestHandler";
$route['s_student_degree_ccavResponseHandler'] = "separate_student/Separate_student_payment_controller/student_degree_ccavResponseHandler";
$route['s_student_migration_ccavRequestHandler'] = "separate_student/Separate_student_payment_controller/student_migration_ccavRequestHandler";
$route['s_student_migration_ccavResponseHandler'] = "separate_student/Separate_student_payment_controller/student_migration_ccavResponseHandler";
$route['s_student_transfer_ccavRequestHandler'] = "separate_student/Separate_student_payment_controller/student_transfer_ccavRequestHandler";
$route['s_student_transfer_ccavResponseHandler'] = "separate_student/Separate_student_payment_controller/student_transfer_ccavResponseHandler";
$route['s_student_recommendation_ccavRequestHandler'] = "separate_student/Separate_student_payment_controller/student_recommendation_ccavRequestHandler";
$route['s_student_recommendation_ccavResponseHandler'] = "separate_student/Separate_student_payment_controller/student_recommendation_ccavResponseHandler";
$route["s_transcript_application"] = "separate_student/Separate_student_controller/s_transcript_application";
$route["s_print_transcript"] = "separate_student/Separate_student_controller/s_print_transcript";
$route["pay_s_transcrip_certificate_fees"] = "separate_student/Separate_student_payment_controller/pay_transcrip_certificate_fees";
$route['s_student_transcript_ccavRequestHandler'] = "separate_student/Separate_student_payment_controller/student_transcript_ccavRequestHandler";
$route['s_student_transcript_ccavResponseHandler'] = "separate_student/Separate_student_payment_controller/student_transcript_ccavResponseHandler";
$route['assigned_guide_seperate_student'] = "admin/Research_controller/assigned_guide_seperate_student";
$route['assigned_guide_seperate_student/(:any)'] = "admin/Research_controller/assigned_guide_seperate_student/$1";
$route['guide_payments_blended/(:any)'] = "admin/Research_controller/guide_payments_blended/$1";
$route['guide_payments_blended/(:any)/(:any)'] = "admin/Research_controller/guide_payments_blended/$1";
$route['co_guide_payments_blended/(:any)'] = "admin/Research_controller/co_guide_payments_blended/$1";
$route['co_guide_payments_blended/(:any)/(:any)'] = "admin/Research_controller/co_guide_payments_blended/$1";
$route['account_monthly_collection'] = "admin/Account_controller/account_monthly_collection/";
$route['student_account_statement/(:any)'] = "admin/Account_controller/student_account_statement/$1";
$route['center_account_details/(:any)'] = "admin/Account_controller/center_account_details/$1";
$route['seperate_student_account_statement/(:any)'] = "admin/Account_controller/seperate_student_account_statement/$1";
$route['account_yearly_collection'] = "admin/Account_controller/account_yearly_collection";
$route['center_account_details_all/(:any)'] = "admin/Account_controller/center_account_details_all/$1";
$route['student_account_statement_yearly/(:any)'] = "admin/Account_controller/student_account_statement_yearly/$1";
$route['separate_student_account_statement_yearly/(:any)'] = "admin/Account_controller/separate_student_account_statement_yearly/$1";
$route['total_collection'] = "admin/Account_controller/total_collection";
$route['student_payment_pending'] = "admin/Account_controller/student_payment_pending";
$route['center_payment_pending'] = "admin/Account_controller/center_payment_pending";
$route['center_account_details_pending/(:any)'] = "admin/Account_controller/center_account_details_pending/$1";
$route['separate_student_payment_pending'] = "admin/Account_controller/separate_student_payment_pending";
$route['add_consolidated'] = "admin/Consolidated_controller/add_consolidated";
$route['add_consolidated/(:any)'] = "admin/Consolidated_controller/add_consolidated/$1";
$route['add_other_university_subject/(:any)'] = "admin/Consolidated_controller/add_other_university_subject/$1";
$route['consolidated_request'] = "admin/Consolidated_controller/consolidated_request";
$route['consolidated_list'] = "admin/Consolidated_controller/consolidated_list";
$route['delete_consolidate/(:any)'] = "admin/Consolidated_controller/delete_consolidate/$1";
$route['edit_consolidate/(:any)'] = "admin/Consolidated_controller/edit_consolidate/$1";
$route['add_consolidated_separate_student'] = "admin/Consolidated_controller/add_consolidated_separate_student";
$route['add_consolidated_separate_student/(:any)'] = "admin/Consolidated_controller/add_consolidated_separate_student/$1";
$route['consolidated_list_separate_student'] = "admin/Consolidated_controller/consolidated_list_separate_student";
$route['consolidated_separate_request'] = "admin/Consolidated_controller/consolidated_separate_request";
$route['edit_consolidate_separate_student/(:any)'] = "admin/Consolidated_controller/edit_consolidate_separate_student/$1";
$route['consolidate_student_marksheet/(:any)'] = "admin/Consolidated_controller/consolidate_student_marksheet/$1";
$route['consol_marksheet_print_separate_student/(:any)'] = "admin/Consolidated_controller/consol_marksheet_print_separate_student/$1";
$route['all_document_verification_detail_update/(:any)'] = "admin/Exam_controller/all_document_verification_detail_update/$1";
$route['document_verifynow_online/(:any)'] = "admin/Exam_controller/document_verifynow_online/$1";
$route['view_all_paper/(:any)'] = "admin/Exam_controller/view_all_paper/$1";
$route['view_all_paper/(:any)/(:any)'] = "admin/Exam_controller/view_all_paper/$1";
$route['admin_fill_exam_form'] = "admin/Exam_controller/admin_fill_exam_form";
$route['admin_fill_exam_form/(:any)'] = "admin/Exam_controller/admin_fill_exam_form/$1";
$route['pulp_admission_list'] = "admin/Student_controller/pulp_admission_list/";
$route['add_refund/(:any)'] = "admin/Student_controller/add_refund/$1";
$route['refunded_student_list'] = "admin/Student_controller/refunded_student_list";
$route['add_refund_research/(:any)'] = "admin/Student_controller/add_refund_research/$1";
$route['refunded_phd_registration'] = "admin/Student_controller/refunded_phd_registration";
$route['admin_set_reregistration_form'] = "admin/Student_controller/admin_set_reregistration_form";
$route['admin_set_reregistration_form/(:any)'] = "admin/Student_controller/admin_set_reregistration_form/$1";
$route['create_topic'] = "admin/Online_controller/create_topic";
$route['create_topic/(:any)'] = "admin/Online_controller/create_topic/$1";
$route['topic_list'] = "admin/Online_controller/topic_list";
$route['topic_files/(:any)'] = "admin/Online_controller/topic_files/$1";
$route['topic_files/(:any)/(:any)'] = "admin/Online_controller/topic_files/$1";
$route['topic_video/(:any)'] = "admin/Online_controller/topic_video/$1";
$route['topic_video/(:any)/(:any)'] = "admin/Online_controller/topic_video/$1";
$route['create_exam'] = "admin/Online_controller/create_exam";
$route['create_exam/(:any)'] = "admin/Online_controller/create_exam/$1";
$route['created_exam_list'] = "admin/Online_controller/created_exam_list";
$route['created_exam_question/(:any)'] = "admin/Online_controller/created_exam_question/$1";
$route['created_exam_question/(:any)/(:any)'] = "admin/Online_controller/created_exam_question/$1";
$route['created_exam_question_banks/(:any)'] = "admin/Online_controller/created_exam_question_banks/$1";
$route['add_mcq_question/(:any)'] = "admin/Online_controller/add_mcq_question/$1";
$route['add_mcq_question/(:any)/(:any)'] = "admin/Online_controller/add_mcq_question/$1";
$route['update_mcq_question/(:any)'] = "admin/Online_controller/update_mcq_question/$1";
$route['mcq_question_list'] = "admin/Online_controller/mcq_question_list";
$route['add_fill_in_blanks_question/(:any)'] = "admin/Online_controller/add_fill_in_blanks_question/$1";
$route['add_fill_in_blanks_question/(:any)/(:any)'] = "admin/Online_controller/add_fill_in_blanks_question/$1";
$route['update_fill_in_blank_question/(:any)'] = "admin/Online_controller/update_fill_in_blank_question/$1";
$route['fill_in_blanks_question_list'] = "admin/Online_controller/fill_in_blanks_question_list";
$route['add_one_word_ans_question/(:any)'] = "admin/Online_controller/add_one_word_ans_question/$1";
$route['add_one_word_ans_question/(:any)/(:any)'] = "admin/Online_controller/add_one_word_ans_question/$1";
$route['update_one_word_ans_question/(:any)'] = "admin/Online_controller/update_one_word_ans_question/$1";
$route['one_word_ans_question_list'] = "admin/Online_controller/one_word_ans_question_list";
$route['add_picture_question/(:any)'] = "admin/Online_controller/add_picture_question/$1";
$route['add_picture_question/(:any)/(:any)'] = "admin/Online_controller/add_picture_question/$1";
$route['update_picture_question/(:any)'] = "admin/Online_controller/update_picture_question/$1";
$route['picture_question_list'] = "admin/Online_controller/picture_question_list";
$route['add_tick_mark_question/(:any)'] = "admin/Online_controller/add_tick_mark_question/$1";
$route['add_tick_mark_question/(:any)/(:any)'] = "admin/Online_controller/add_tick_mark_question/$1";
$route['update_tick_mark_question/(:any)'] = "admin/Online_controller/update_tick_mark_question/$1";
$route['tick_mark_question_list'] = "admin/Online_controller/tick_mark_question_list";
$route['add_passage_reading_question/(:any)'] = "admin/Online_controller/add_passage_reading_question/$1";
$route['add_passage_reading_question/(:any)/(:any)'] = "admin/Online_controller/add_passage_reading_question/$1";
$route['update_passage_reading_question/(:any)'] = "admin/Online_controller/update_passage_reading_question/$1";
$route['passage_reading_question_list'] = "admin/Online_controller/passage_reading_question_list";
$route['add_match_the_following_question/(:any)'] = "admin/Online_controller/add_match_the_following_question/$1";
$route['add_match_the_following_question/(:any)/(:any)'] = "admin/Online_controller/add_match_the_following_question/$1";
$route['update_match_the_following_question/(:any)'] = "admin/Online_controller/update_match_the_following_question/$1";
$route['match_the_following_question_list'] = "admin/Online_controller/match_the_following_question_list";
$route['yearly_exam_questions_list/(:any)'] = "admin/Online_controller/yearly_exam_questions_list/$1";
$route['edit-question/(:any)'] = "admin/Online_controller/edit_question/$1";
$route['edit-picture-question/(:any)'] = "admin/Online_controller/edit_picture_question/$1";
$route['edit-passage-question/(:any)'] = "admin/Online_controller/edit_passage_question/$1";
$route['create_mail'] = "admin/Mail_link_controller/create_mail";
$route['create_mail/(:any)'] = "admin/Mail_link_controller/create_mail/$1";
$route['created_mail_list'] = "admin/Mail_link_controller/create_mail_list";
$route['read_mail/(:any)'] =  "web/Mail_read_controller/read_mail/$1";
$route['membership-accreditation'] = "web/Web_controller/membership_accreditation";
$route['index-new'] = "web/Web_controller/index_new";
$route['header-demo'] = "web/Web_controller/header_demo";
$route['membership'] = "web/Web_controller/membership";
$route["add_phd_course_work_application"] = "admin/Separate_student_certificate_controller/apply_for_course_work";
$route["add_phd_course_work_application/(:any)"] = "admin/Separate_student_certificate_controller/apply_for_course_work/$1";
$route["phd_course_work_application_success_list"] = "admin/Separate_student_certificate_controller/course_work_data_success";
$route["phd_course_work_application_failed_list"] = "admin/Separate_student_certificate_controller/course_work_data_fail";
$route["phd_course_work_application_approved_list"] = "admin/Separate_student_certificate_controller/course_work_data_approved";
$route["course_work_update_payment_separate_student/(:any)"] = "admin/Research_controller/course_work_update_payment_separate_student/$1";
$route["approve_course_work_registration_separate_student/(:any)"] = "admin/Research_controller/approve_course_work_registration_separate_student/$1";
$route["disapprove_course_work_registration_seperate_student/(:any)"] = "admin/Research_controller/disapprove_course_work_registration_seperate_student/$1";
$route['generate_course_work_result_separate_student/(:any)'] = "admin/Exam_controller/generate_course_work_result_separate_student/$1";
$route['generate_course_work_result_separate_student'] = "admin/Exam_controller/generate_course_work_result_separate_student";
$route['course_work_separate_student_result_list'] = "admin/Exam_controller/course_work_separate_student_result_list";
$route['phd_course_work_approved_application_result_list'] = "admin/Exam_controller/course_work_result_list_separate_student";
$route['edit_blended_course_work_marksheet/(:any)'] = "admin/Exam_controller/edit_blended_course_work_marksheet/$1";
$route['print_course_work_marksheet_separate_student/(:any)'] = "admin/Exam_controller/print_course_work_marksheet_separate_student/$1";
$route['course_work_result'] = "student/Student_controller/course_work_result";
$route["course_work_result_separate_student"] = "separate_student/Separate_student_controller/course_work_result_separate_student";
$route["get_verification_user_login"] = "api/Api_controller/get_verification_user_login";
$route["get_verification_user_profile"] = "api/Api_controller/get_verification_user_profile";
$route["get_update_profile_verification"] = "api/Api_controller/get_update_profile_verification";
$route["set_password_update"] = "api/Api_controller/set_password_update";
$route["get_new_verification_list"] = "api/Api_controller/get_new_verification_list";
$route["get_new_pending_list"] = "api/Api_controller/get_new_pending_list";
$route["get_new_document_pending_list"] = "api/Api_controller/get_new_document_pending_list";
$route["get_my_verified_student"] = "api/Api_controller/get_my_verified_student";
$route["get_rejected_student_list"] = "api/Api_controller/get_rejected_student_list";
$route["get_single_verification_student"] = "api/Api_controller/get_single_verification_student";
$route["get_single_verification_student_qualification"] = "api/Api_controller/get_single_verification_student_qualification";
$route["set_verification_student"] = "api/Api_controller/set_verification_student";
$route["get_single_verified_date"] = "api/Api_controller/get_single_verified_date";
$route["get_session_list"] = "api/Api_controller/get_session_list";
$route["blended_student_list"] = "api/Api_controller/blended_student_list";
$route["get_single_blended_verification_student"] = "api/Api_controller/get_single_blended_verification_student";
$route["set_blended_erification_student"] = "api/Api_controller/set_blended_erification_student";
$route["get_blended_single_verified_remark"] = "api/Api_controller/get_blended_single_verified_remark";
$route["verified_blended_student_list"] = "api/Api_controller/verified_blended_student_list";
$route["rejected_blended_student_list"] = "api/Api_controller/rejected_blended_student_list";
$route["get_stu_payment_information"] = "api/Api_controller/get_stu_payment_information";
$route["set_stu_payment_information"] = "api/Api_controller/set_stu_payment_information";
$route["get_alumni_login"] = "api/Alumni_api/get_alumni_login";
$route["set_without_enroll_video_kyc"] = "api/Alumni_api/set_without_enroll_video_kyc";
$route["get_alumni_video_kyc"] = "api/Alumni_api/get_alumni_video_kyc";
$route["get_my_alumni_profile"] = "api/Alumni_api/get_my_alumni_profile";
$route["set_alumni_password_update"] = "api/Alumni_api/set_alumni_password_update";
$route["get_alumni_admission_form"] = "api/Alumni_api/get_alumni_admission_form";
$route["get_alumni_id_card"] = "api/Alumni_api/get_alumni_id_card";
$route["get_alumni_provisional_registration_letter"] = "api/Alumni_api/get_alumni_provisional_registration_letter";
$route["get_alumni_my_result"] = "api/Alumni_api/get_alumni_my_result";
$route["get_alumni_show_my_result"] = "api/Alumni_api/get_alumni_show_my_result";
$route["get_alumni_selected_subject_for_result"] = "api/Alumni_api/get_alumni_selected_subject_for_result";
$route["get_alumni_marksheet"] = "api/Alumni_api/get_alumni_marksheet";
$route["get_almni_single_marksheet_result"] = "api/Alumni_api/get_almni_single_marksheet_result";
$route["get_almni_selected_subject_for_result"] = "api/Alumni_api/get_almni_selected_subject_for_result";
$route["get_direct_image_path"] = "api/Alumni_api/get_direct_image_path";
$route["get_alumni_university_details"] = "api/Alumni_api/get_alumni_university_details";
$route["get_almni_coursework_single_marksheet_result"] = "api/Alumni_api/get_almni_coursework_single_marksheet_result";
$route["get_course_work_marksheet_details_separate_student"] = "api/Alumni_api/get_course_work_marksheet_details_separate_student";
$route["get_my_alumni_password"] = "api/Alumni_api/get_my_alumni_password";
$route["get_alumni_provisional_degree"] = "api/Alumni_api/get_alumni_provisional_degree";
$route["get_student_division_for_degree"] = "api/Alumni_api/get_student_division_for_degree";
$route["get_transfer_certificate"] = "api/Alumni_api/get_transfer_certificate";
$route["get_alumni_degree"] = "api/Alumni_api/get_alumni_degree";
$route["get_alumni_transcript_application"] = "api/Alumni_api/get_alumni_transcript_application";
$route["get_this_transcript_subject"] = "api/Alumni_api/get_this_transcript_subject";
$route["get_this_transcript_total"] = "api/Alumni_api/get_this_transcript_total";
$route["get_migration_certificate"] = "api/Alumni_api/get_migration_certificate";
$route["get_migration_certificate_print"] = "api/Alumni_api/get_migration_certificate_print";
$route["get_alumni_kyc_link"] = "api/Alumni_api/get_alumni_kyc_link";
$route["get_alumni_regular_kyc_link"] = "api/Alumni_api/get_alumni_regular_kyc_link";
$route["get_save_regular_video_kyc"] = "api/Alumni_api/get_save_regular_video_kyc";
$route["get_ext_account_login"] = "api/Ext_account_api/get_ext_account_login";
$route["get_ext_update_password"] = "api/Ext_account_api/get_ext_update_password";
$route["get_ext_student_list"] = "api/Ext_account_api/get_ext_student_list";
$route["get_ext_single_student_account"] = "api/Ext_account_api/get_ext_single_student_account";
$route["get_ext_single_student_account_migration"] = "api/Ext_account_api/get_ext_single_student_account_migration";
$route["get_ext_single_account"] = "api/Ext_account_api/get_ext_single_account";
$route["get_ext_bank_account"] = "api/Ext_account_api/get_ext_bank_account";
$route["get_ext_get_unique_transaction"] = "api/Ext_account_api/get_ext_get_unique_transaction";
$route["set_ext_payment_details"] = "api/Ext_account_api/set_ext_payment_details";
$route["get_ext_get_my_verified_list"] = "api/Ext_account_api/get_ext_get_my_verified_list";
$route["get_ext_delete_transaction"] = "api/Ext_account_api/get_ext_delete_transaction";
$route["get_ext_confrom_all_verified"] = "api/Ext_account_api/get_ext_confrom_all_verified";
$route["get_ext_single_student_account_ledger"] = "api/Ext_account_api/get_ext_single_student_account_ledger";
$route["get_ext_student_paid_addmission_fees"] = "api/Ext_account_api/get_ext_student_paid_addmission_fees";
$route["get_ext_student_paid_exam_fees"] = "api/Ext_account_api/get_ext_student_paid_exam_fees";
$route["get_ext_delete_migration_fees"] = "api/Ext_account_api/get_ext_delete_migration_fees";
$route["get_ext_single_student_account_migration_details"] = "api/Ext_account_api/get_ext_single_student_account_migration_details";
$route["set_ext_migration_payment"] = "api/Ext_account_api/set_ext_migration_payment";
$route["get_ext_single_student_account_provisional"] = "api/Ext_account_api/get_ext_single_student_account_provisional";
$route["get_ext_delete_provisional_degree"] = "api/Ext_account_api/get_ext_delete_provisional_degree";
$route["get_ext_single_student_account_provisional_degree_details"] = "api/Ext_account_api/get_ext_single_student_account_provisional_degree_details";
$route["set_ext_provisional_degree_payment"] = "api/Ext_account_api/set_ext_provisional_degree_payment";
$route["get_printing_login"] = "api/Printing_api/get_printing_login";
$route["get_printing_profile"] = "api/Printing_api/get_printing_profile";
$route["get_new_printing_marksheet"] = "api/Printing_api/get_new_printing_marksheet";
$route["get_print_new_marksheet"] = "api/Printing_api/get_print_new_marksheet";
$route["get_print_new_marksheet_student_login"] = "api/Printing_api/get_print_new_marksheet_student_login";
$route["get_print_credit_tranfer_certificate_student_login"] = "api/Printing_api/get_print_credit_tranfer_certificate_student_login";
$route["get_print_synopsis_student"] = "api/Printing_api/get_print_synopsis_student";
$route["get_new_selected_subject_for_marksheet"] = "api/Printing_api/get_new_selected_subject_for_marksheet";
$route["get_printing_marksheet"] = "api/Printing_api/get_printing_marksheet";
$route["get_printing_course_work_regular_marksheet"] = "api/Printing_api/get_printing_course_work_regular_marksheet";
$route["get_printing_course_work_marksheet"] = "api/Printing_api/get_printing_course_work_marksheet";
$route["get_print_marksheet"] = "api/Printing_api/get_print_marksheet";
$route["get_print_coursework_marksheet"] = "api/Printing_api/get_print_coursework_marksheet";
$route["print_regular_coursework_marksheet"] = "api/Printing_api/print_regular_coursework_marksheet";
$route["get_print_duplicate_marksheet"] = "api/Printing_api/get_print_duplicate_marksheet";
$route["get_print_duplicate_marksheet_regular"] = "api/Printing_api/get_print_duplicate_marksheet_regular";
$route["get_duplicate_printing_marksheet"] = "api/Printing_api/get_duplicate_printing_marksheet";
$route["get_duplicate_printing_marksheet_regular"] = "api/Printing_api/get_duplicate_printing_marksheet_regular";
$route["get_print_get_selected_subject_for_result"] = "api/Printing_api/get_print_get_selected_subject_for_result";
$route["get_selected_subject_for_result_regular"] = "api/Printing_api/get_selected_subject_for_result_regular";
$route["get_printing_migration_certificate"] = "api/Printing_api/get_printing_migration_certificate";
$route["get_printing_migration_certificate_regular"] = "api/Printing_api/get_printing_migration_certificate_regular";
$route["get_print_migration_certificate"] = "api/Printing_api/get_print_migration_certificate";
$route["print_migration_certificate_regular"] = "api/Printing_api/print_migration_certificate_regular";
$route["print_migration_certificate_regular_student_login"] = "api/Printing_api/print_migration_certificate_regular_student_login";
$route["get_print_character_certificate"] = "api/Printing_api/get_print_character_certificate";
$route["get_printing_transfer_certificate"] = "api/Printing_api/get_printing_transfer_certificate";
$route["get_printing_transfer_certificate_student_login"] = "api/Printing_api/get_printing_transfer_certificate_student_login";
$route["get_printing_transfer_certificate_regular"] = "api/Printing_api/get_printing_transfer_certificate_regular";
$route["get_print_transfer_certificate"] = "api/Printing_api/get_print_transfer_certificate";
$route["get_print_transfer_regular_certificate"] = "api/Printing_api/get_print_transfer_regular_certificate";
$route["get_printing_character_certificate"] = "api/Printing_api/get_printing_character_certificate";
$route["get_printing_charector_certificate"] = "api/Printing_api/get_printing_charector_certificate";
$route["get_printing_degree_certificate"] = "api/Printing_api/get_printing_degree_certificate";
$route["get_get_year_duration_printing"] = "api/Printing_api/get_get_year_duration_printing";
$route["get_student_division_for_degree_new_degree"] = "api/Printing_api/get_student_division_for_degree_new_degree";
$route["get_printing_degree_certificate_regular"] = "api/Printing_api/get_printing_degree_certificate_regular";
$route["get_print_degree_certificate"] = "api/Printing_api/get_print_degree_certificate";
$route["get_print_degree_certificate_regular"] = "api/Printing_api/get_print_degree_certificate_regular";
$route["get_print_degree_certificate_regular_studnet_login"] = "api/Printing_api/get_print_degree_certificate_regular_studnet_login";
$route["get_print_division_for_degree"] = "api/Printing_api/get_print_division_for_degree";
$route["get_print_division_for_degree_regular"] = "api/Printing_api/get_print_division_for_degree_regular";
$route["get_printing_provisional_degree_certificate"] = "api/Printing_api/get_printing_provisional_degree_certificate";
$route["get_printing_provisional_degree_certificate_regular"] = "api/Printing_api/get_printing_provisional_degree_certificate_regular";
$route["get_print_provisional_degree_certificate"] = "api/Printing_api/get_print_provisional_degree_certificate";
$route["get_print_provisional_degree_certificate_regular"] = "api/Printing_api/get_print_provisional_degree_certificate_regular";
$route["get_print_provisional_degree_certificate_regular_student_login"] = "api/Printing_api/get_print_provisional_degree_certificate_regular_student_login";
$route["get_printing_transcript_list"] = "api/Printing_api/get_printing_transcript_list";
$route["get_printing_transcript_list_regular"] = "api/Printing_api/get_printing_transcript_list_regular";
$route["get_print_transcript_list"] = "api/Printing_api/get_print_transcript_list";
$route["get_print_transcript_list_student_login"] = "api/Printing_api/get_print_transcript_list_student_login";
$route["get_print_transcript_regular"] = "api/Printing_api/get_print_transcript_regular";
$route["get_print_transcript_regular_student_login"] = "api/Printing_api/get_print_transcript_regular_student_login";
$route["get_print_this_transcript_subject"] = "api/Printing_api/get_print_this_transcript_subject";
$route["get_print_this_transcript_subject_regular"] = "api/Printing_api/get_print_this_transcript_subject_regular";
$route["get_print_get_this_transcript_total"] = "api/Printing_api/get_print_get_this_transcript_total";
$route["get_this_transcript_total_regular"] = "api/Printing_api/get_this_transcript_total_regular";
$route["get_print_get_print_consolidate_list"] = "api/Printing_api/get_print_get_print_consolidate_list";
$route["get_selected_semester_subject_for_result_year_sem"] = "api/Printing_api/get_selected_semester_subject_for_result_year_sem";
$route["get_print_consolidate_list_regular"] = "api/Printing_api/get_print_consolidate_list_regular";
$route["get_single_print_consolidate_sep"] = "api/Printing_api/get_single_print_consolidate_sep";
$route["get_single_print_consolidate_regular"] = "api/Printing_api/get_single_print_consolidate_regular";
$route["get_single_print_consolidate_regular_student_login"] = "api/Printing_api/get_single_print_consolidate_regular_student_login";
$route["get_single_print_bonafied_regular_student_login"] = "api/Printing_api/get_single_print_bonafied_regular_student_login";
$route["get_single_print_bonafied_scholarship_regular_student_login"] = "api/Printing_api/get_single_print_bonafied_scholarship_regular_student_login";
$route["get_single_print_recom_regular_student_login"] = "api/Printing_api/get_single_print_recom_regular_student_login";
$route["get_second_recommendation_letter_print_student_login"] = "api/Printing_api/get_second_recommendation_letter_print_student_login";
$route["get_print_medium_inst_student_login"] = "api/Printing_api/get_print_medium_inst_student_login";
$route["get_single_no_backlog_application_print_student_login"] = "api/Printing_api/get_single_no_backlog_application_print_student_login";
$route["get_single_no_split_application_print_student_login"] = "api/Printing_api/get_single_no_split_application_print_student_login";
$route["get_single_character_application_print_student_login"] = "api/Printing_api/get_single_character_application_print_student_login";
$route["get_single_print_consolidate_id"] = "api/Printing_api/get_single_print_consolidate_id";
$route["get_single_print_consolidate_id_regular"] = "api/Printing_api/get_single_print_consolidate_id_regular";
$route["get_prin_selected_marksheet_course_stream_details"] = "api/Printing_api/get_prin_selected_marksheet_course_stream_details";
$route["get_selected_marksheet_course_stream_details_regular"] = "api/Printing_api/get_selected_marksheet_course_stream_details_regular";
$route["get_prin_get_last_exam_year_separate"] = "api/Printing_api/get_prin_get_last_exam_year_separate";
$route["get_last_exam_year_regular"] = "api/Printing_api/get_last_exam_year_regular";
$route["get_prin_get_selected_subject_for_result_conso"] = "api/Printing_api/get_prin_get_selected_subject_for_result_conso";
$route["get_prin_get_selected_semester_subject_for_result_separate"] = "api/Printing_api/get_prin_get_selected_semester_subject_for_result_separate";
$route["get_selected_semester_subject_for_result_regular"] = "api/Printing_api/get_selected_semester_subject_for_result_regular";
$route["get_print_total_obt_marks_cons"] = "api/Printing_api/get_print_total_obt_marks_cons";
$route["get_print_total_obt_marks_cons_regular"] = "api/Printing_api/get_print_total_obt_marks_cons_regular";
$route["get_print_total_marks_cons"] = "api/Printing_api/get_print_total_marks_cons";
$route["get_print_total_marks_cons_regular"] = "api/Printing_api/get_print_total_marks_cons_regular";
$route["get_print_get_all_bonafied"] = "api/Printing_api/get_print_get_all_bonafied";
$route["get_print_get_print_bonafied"] = "api/Printing_api/get_print_get_print_bonafied";
$route["get_all_inst_medium_letter"] = "api/Printing_api/get_all_inst_medium_letter";
$route["get_print_get_print_inst_medium_letter"] = "api/Printing_api/get_print_get_print_inst_medium_letter";
$route["get_all_no_backlog_letter"] = "api/Printing_api/get_all_no_backlog_letter";
$route["print_no_backlog_letter"] = "api/Printing_api/print_no_backlog_letter";
$route["get_all_no_split_letter"] = "api/Printing_api/get_all_no_split_letter";
$route["print_no_split_letter"] = "api/Printing_api/print_no_split_letter";
$route["get_all_reccom_letter"] = "api/Printing_api/get_all_reccom_letter";
$route["print_reccom_letter"] = "api/Printing_api/print_reccom_letter";
$route["get_all_second_reccom_letter"] = "api/Printing_api/get_all_second_reccom_letter";
$route["print_second_reccom_letter"] = "api/Printing_api/print_second_reccom_letter";
$route["get_all_credit_transfer_certificate"] = "api/Printing_api/get_all_credit_transfer_certificate";
$route["print_credit_transfer_certificate"] = "api/Printing_api/print_credit_transfer_certificate";
$route["get_api_all_synopsis_separate"] = "api/Printing_api/get_api_all_synopsis_separate";
$route["get_api_all_synopsis_regular"] = "api/Printing_api/get_api_all_synopsis_regular";
$route["get_api_synopsis_letter_regular"] = "api/Printing_api/get_api_synopsis_letter_regular";
$route["get_api_synopsis_letter_sep"] = "api/Printing_api/get_api_synopsis_letter_sep";
$route["get_center_login"] = "api/Center_api/get_center_login";
$route["get_center_profile"] = "api/Center_api/get_center_profile";
$route["get_center_students"] = "api/Center_api/get_center_students";
$route["get_center_ledger"] = "api/Center_api/get_center_ledger";
$route["get_center_ledger_all"] = "api/Center_api/get_center_ledger_all";
$route["get_center_submit_amount"] = "api/Center_api/get_center_submit_amount";
$route["get_center_students_payable_fees"] = "api/Center_api/get_center_students_payable_fees";
$route["get_student_paid_addmission_fees"] = "api/Center_api/get_student_paid_addmission_fees";
$route["set_alumni_center_password_update"] = "api/Center_api/set_alumni_center_password_update";
$route['hold_blended_login'] = "Welcome/hold_blended_login";
//center cluster 
$route["validate_hidden_access"] = "admin/Common_controller/validate_hidden_access";
$route["logout_blend"] = "admin/Common_controller/logout_blend";
$route['cluster-center-access'] = "cluster_center/Cluster_center_login/login";
$route['cluster-center-dashboard'] = "cluster_center/Cluster_center_controller/center_dashboard";
$route['cluster-center-logout'] = "cluster_center/Cluster_center_controller/center_logout";
$route['notice_board'] = "web/Web_controller/notice_board";
// vocational api
$route["get_all_bvoc_courses"] = "api/Bvoc_api/get_all_bvoc_courses";
$route["get_all_bvoc_streams"] = "api/Bvoc_api/get_all_bvoc_streams";
$route["get_course_faq"] = "api/Bvoc_api/get_course_faq";
$route["get_bvoc_course_details"] = "api/Bvoc_api/get_bvoc_course_details";
$route["get_all_bvoc_stream_details"] = "api/Bvoc_api/get_all_bvoc_stream_details";
$route["get_bvoc_india_cities"] = "api/Bvoc_api/get_bvoc_india_cities";
/* ===================================== 12/02/2025 ========================================*/
$route['pan_india_new_pending_student'] = "admin/Student_controller/pan_india_new_pending_student";
$route['pan_india_admission_list'] = "admin/Student_controller/pan_india_admission_list";


$route['ccavRequestHandler'] = "web/CCavenue/ccavRequestHandler";
$route['ccavResponseHandler'] = "web/CCavenue/ccavResponseHandler";



$route['complete_balance_fees'] = "center/Center_controller/complete_balance_fees"; 
$route['pay_balance_fees/(:any)'] = "Welcome/pay_balance_fees/$1";




$route['marksheet_back_sample'] = "admin/Exam_controller/marksheet_back_sample";

$route['edit_cash_receipt/(:any)'] = "admin/Admin_controller/edit_cash_receipt/$1";

$route['direct_examination_form/(:any)'] = "web/Web_controller/direct_examination_form/$1";
$route['global_search'] = "admin/Search_controller/global_search";
$route['get_global_search_result'] = "admin/Search_controller/get_global_search_result";


$route['direct_cc_login'] = "web/Web_controller/direct_cc_login";

$route['update_examination_form_fees'] = "web/Web_controller/update_examination_form_fees";
$route['close_web_temp'] = "Welcome/close_web_temp"; 


$route['admin-upload-answer-book'] = "admin/Admin_controller/upload_answer_book_center";
$route['admin-upload-answer-book/(:any)'] = "admin/Admin_controller/upload_answer_book_center/$1";

$route['center_document_status_list'] = "admin/Admin_controller/center_document_status_list";


$route['pending_course_list'] = "admin/Course_controller/pending_course_list";
$route['approve_course/(:any)'] = "admin/Course_controller/approve_course/$1";
$route['reject_course/(:any)'] = "admin/Course_controller/reject_course/$1";
$route['pending_stream_list'] = "admin/Course_controller/pending_stream_list";
$route['approve_stream/(:any)'] = "admin/Course_controller/approve_stream/$1";
$route['reject_stream/(:any)'] = "admin/Course_controller/reject_stream/$1";