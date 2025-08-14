<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*===================MAIN WEBSITE===================*/
$route['default_controller'] = "Welcome/index";


$route['home'] = "Welcome/index";
$route['about-us'] = "web/Web_controller/about_us";
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
$route['chancellor-message'] = "web/Web_controller/chancler_message";
$route['vice-chancellor-message'] = "web/Web_controller/vice_chancler_message";
$route['disaster-management'] = "web/Web_controller/disaster_management";
$route['chairman-desk'] = "web/Web_controller/chairman_desk";
$route['former-president-letter'] = "web/Web_controller/former_president_letter";
$route['campus'] = "web/Web_controller/campus";
$route['enquiry'] = "web/Web_controller/enquiry";
$route['career'] = "web/Web_controller/career";
$route['contact-us'] = "web/Web_controller/contact_us";
$route['resend_otp'] = "web/Web_controller/resend_otp";
$route['resend_e_otp'] = "web/Web_controller/resend_e_otp";
$route['print_challan/(:any)/(:any)'] = "web/Web_controller/print_challan/$1";
$route['print_cash_boucher/(:any)/(:any)'] = "web/Web_controller/print_cash_boucher/$1"; 

require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();

 
$faculty = $db->get('tbl_faculty');
$faculty = $faculty->result();
if(!empty($faculty)){
	foreach($faculty as $faculty_result){
		$route[str_replace(" ","-",$faculty_result->faculty_name)] =  "web/web_controller/all_courses";
		$route[str_replace(" ","-",$faculty_result->faculty_name).'/(:any)'] =  "web/web_controller/all_courses/$1";
	}
}

$route['all-courses'] = "web/Web_controller/all_courses";

$route['view_course'] = "web/Web_controller/view_course";
$route['e-libraries'] = "web/Web_controller/e_libraries";
$route['collaboration-enquiry'] = "web/Web_controller/collaboration_enquiry";
//$route['collaborations-with-apll'] = "web/Web_controller/collaborations_with_apll";
$route['admission-enquiry'] = "web/Web_controller/admission_enquiry";
$route['examination-form'] = "web/Web_controller/examination_form";
$route['resend_exam_otp'] = "web/Web_controller/resend_exam_otp";
$route['reset_exam_form'] = "web/Web_controller/reset_exam_form";
$route['make_exam_payment/(:any)'] = "web/Payment_controller/make_exam_payment/$1";
$route['examination_freecharge'] = "web/Payment_controller/examination_freecharge";
$route['print_exam_cash_boucher/(:any)'] = "web/Web_controller/print_exam_cash_boucher/$1";
$route['result_view'] = "web/Web_controller/result_view";

$route['demo_payment_form'] = "web/Web_controller/demo_form";

$route["enrollment-verification"] = "web/web_controller/enrollment_verification";
$route["document-verification"] = "web/web_controller/document_verification";
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


$route['student-login'] = "student/Student_login/login";
$route['student-forgot'] = "student/Student_login/student_forgot";
$route['student-dashboard'] = "student/Student_controller/student_dashboard";
$route['student_logout'] = "student/Student_controller/student_logout";
$route['student-password'] = "student/Student_controller/student_password";
$route['asmission-form-print'] = "student/Student_controller/asmission_form_print";
$route['e_library'] = "student/Student_controller/e_library";
$route['id-card-print'] = "student/Student_controller/id_card_print";
$route['student-qualification-details'] = "student/Student_controller/student_qualification_details";
$route['student_feedback'] = "student/Student_controller/student_feedback";
$route['my_results'] = "student/Student_controller/my_results";
$route['show_my_result/(:any)'] = "student/Student_controller/show_my_result/$1";
$route['upload_assessment'] = "student/Student_controller/upload_assessment";
$route['video_list'] = "student/Student_controller/video_list";
$route['video/(:any)'] = "student/Student_controller/video/$1";

$route['provisional_registration_letter'] = "student/Student_controller/provisional_registration_letter";
$route['transcript_application'] = "student/Student_controller/transcript_application";
$route["print_transcript"] = "student/Student_controller/print_transcript";
$route['thesis_submission'] = "student/Student_controller/thesis_submission";

$route['synopsis_submission'] = "student/Student_controller/synopsis_submission";



$route['exam-login'] = "student/Student_login/exam_login";
$route['exam-dashboard'] = "student/Exam_controller/exam_dashboard";
$route['exam_student_logout'] = "student/Exam_controller/exam_student_logout";
$route['start_exam/(:any)'] = "student/Exam_controller/start_exam/$1";



$route['successfull_phd_registration'] = "admin/Student_controller/successfull_phd_registration";
$route['failed_phd_registration'] = "admin/Student_controller/failed_phd_registration";
$route['edit_phd_registration_payment/(:any)'] = "admin/Student_controller/edit_phd_registration_payment/$1";
$route['view_phd_registration_payment/(:any)'] = "admin/Student_controller/view_phd_registration_payment/$1";
$route['manage_student_account/(:any)'] = "admin/Student_controller/manage_student_account/$1";
$route['manage_student_account/(:any)/(:any)'] = "admin/Student_controller/manage_student_account/$1";
$route['phd_exams_student'] = "admin/Student_controller/phd_exams_student";
$route['student_feedback_list'] = "admin/Student_controller/student_feedback_list";



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

$route['add_examination'] = "admin/Exam_controller/add_examination"; 
$route['add_examination/(:any)'] = "admin/Exam_controller/add_examination/$1"; 
$route['manage_examination_question/(:any)'] = "admin/Exam_controller/manage_examination_question/$1"; 
$route['manage_examination_question/(:any)/(:any)'] = "admin/Exam_controller/manage_examination_question/$1"; 
$route['examination_list'] = "admin/Exam_controller/examination_list"; 
$route['appeared_examination_list'] = "admin/Exam_controller/appeared_examination_list"; 
$route['manage_admin_result'] = "admin/Exam_controller/manage_admin_result"; 
$route['search_admin_result'] = "admin/Exam_controller/search_admin_result"; 
$route['inactivate_results/(:any)'] = "admin/Exam_controller/inactivate_results/$1"; 
$route['activate_results/(:any)'] = "admin/Exam_controller/activate_results/$1"; 
$route['delete_result/(:any)'] = "admin/Exam_controller/delete_result/$1"; 
$route['update_result/(:any)'] = "admin/Exam_controller/update_result/$1"; 
$route['generate_marksheet/(:any)/(:any)/(:any)'] = "admin/Exam_controller/generate_marksheet/$1"; 
$route['search_marksheet'] = "admin/Exam_controller/search_marksheet"; 
$route['delete_marksheet/(:any)'] = "admin/Exam_controller/delete_marksheet/$1"; 
$route['edit_marksheet/(:any)'] = "admin/Exam_controller/edit_marksheet/$1"; 
$route['print_inner_marksheet/(:any)'] = "admin/Exam_controller/print_inner_marksheet/$1"; 
$route['examination_form_list'] = "admin/Exam_controller/examination_form_list"; 
$route['examination_form_list_failed'] = "admin/Exam_controller/examination_form_list_failed"; 
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
// $route["upload-exam-papper"] = "admin/Admin_controller/upload_exam_papper";
// $route["upload-exam-papper/(:any)"] = "admin/Admin_controller/upload_exam_papper/$1";
$route["amount-filter"] = "admin/Admin_controller/ammount_filter";

$route["employee_left/(:any)"] = "admin/Admin_controller/employee_left/$1";


$route['profile-setting'] = "admin/Admin_controller/profile_setting";
$route['seo_registration'] = "admin/Admin_controller/seo_registration";
$route['seo_registration/(:any)'] = "admin/Admin_controller/seo_registration/$1";

//$route['seo_setup_list'] = "admin/Admin_controller/seo_setup_list";

$route['designation_management'] = "admin/Setting_controller/designation_management";
$route['designation_management/(:any)'] = "admin/Setting_controller/designation_management/$1";
$route['inactive/(:any)/(:any)'] = "admin/Admin_login/inactive/$1";
$route['active/(:any)/(:any)'] = "admin/Admin_login/active/$1";
$route['delete/(:any)/(:any)'] = "admin/Admin_login/delete/$1";

$route['website_setting'] = "admin/Setting_controller/website_setting";
$route['id_management'] = "admin/Setting_controller/id_management";
$route['id_management/(:any)'] = "admin/Setting_controller/id_management/$1";
$route['employee_list'] = "admin/Setting_controller/employee_list";
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


$route['manage_course'] = "admin/Course_controller/manage_course";
$route['manage_course/(:any)'] = "admin/Course_controller/manage_course/$1";
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

$route['manage_center'] = "admin/Center_controller/manage_center";
$route['manage_center/(:any)'] = "admin/Center_controller/manage_center/$1";
$route['list_manage_center'] = "admin/Center_controller/list_manage_center";
$route['pending_center'] = "admin/Center_controller/pending_center";
$route['center_mou/(:any)'] = "admin/Center_controller/center_mou/$1";
$route['center_finance/(:any)'] = "admin/Center_controller/center_finance/$1";
$route['center_finance/(:any)/(:any)'] = "admin/Center_controller/center_finance/$1";
$route['pending_center_subject'] = "admin/Center_controller/pending_center_subject";
$route['center_reset_password/(:any)'] = "admin/Center_controller/center_reset_password/$1";
$route['manage_center_enquiry'] = "admin/Center_controller/manage_center_enquiry";
$route['assign_course/(:any)'] = "admin/Center_controller/assign_course/$1";
$route['center_send_login/(:any)'] = "admin/Center_controller/center_send_login/$1";

$route['manage_head'] = "admin/Document_controller/manage_head";
$route['manage_head/(:any)'] = "admin/Document_controller/manage_head/$1";
$route['upload_documents'] = "admin/Document_controller/upload_documents";
$route['upload_documents/(:any)'] = "admin/Document_controller/upload_documents/$1";

$route['new_pending_student'] = "admin/Student_controller/new_pending_student";
$route['admission_list'] = "admin/Student_controller/admission_list";
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
$route["pending_reregistration_student_list"] = "admin/Student_controller/pendding_reregistration_student_list";
$route["update_thesis/(:any)"] = "admin/Student_controller/update_thesis/$1";

$route['marquee_news'] = "admin/News_controller/marquee_news";
$route['marquee_news/(:any)'] = "admin/News_controller/marquee_news/$1";
$route['manage_news'] = "admin/News_controller/manage_news";
$route['manage_news/(:any)'] = "admin/News_controller/manage_news/$1";
$route['manage_conference'] = "admin/News_controller/manage_conference";
$route['manage_conference/(:any)'] = "admin/News_controller/manage_conference/$1";

$route['guide_application_list'] = "admin/Research_controller/guide_application_list";
$route['guide_application_update'] = "admin/Research_controller/guide_application_update";
$route['guide_application_update/(:any)'] = "admin/Research_controller/guide_application_update/$1";
$route['guide_documents/(:any)'] = "admin/Research_controller/guide_documents/$1";
$route['print_phd_registration_form/(:any)'] = "admin/Research_controller/print_phd_registration_form/$1";

$route['print_course_work_marksheet/(:any)'] = "admin/Exam_controller/print_course_work_marksheet/$1";


$route['render_quiz/(:any)'] = "admin/QuizController/render_quiz/$1";
$route['show_quiz/(:any)'] = "admin/QuizController/show_quiz/$1";

$route['bulk_attendance_list'] = "admin/Faculty_controller/bulk_attendance_list";
$route['staff_faculty'] = "admin/Faculty_controller/staff_faculty";
$route['left_staff_faculty'] = "admin/Faculty_controller/left_staff_faculty";
$route['faculty_left/(:any)'] = "admin/Faculty_controller/faculty_left/$1";
$route['faculty_not_left/(:any)'] = "admin/Faculty_controller/faculty_not_left/$1";

$route['admin_staff_attendance'] = "admin/Faculty_controller/admin_staff_attendance";


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


$route['delete_faculty_document/(:any)'] = "admin/Faculty_controller/delete_faculty_document/$1";

$route['delete_faculty_document_image/(:any)'] = "admin/Faculty_controller/delete_faculty_document_image/$1";


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
$route['upload_student_qualification/(:any)/(:any)'] = "center/Center_controller/upload_student_qualification/$1";
$route['print_student_challan/(:any)/(:any)'] = "center/Center_controller/print_student_challan/$1";
$route['print_student_cash_boucher/(:any)/(:any)'] = "center/Center_controller/print_student_cash_boucher/$1";
$route['center_admission_payment/(:any)/(:any)'] = "center/Center_controller/center_admission_payment/$1";
$route['center_admission_freecharge'] = "center/Center_controller/center_admission_freecharge";

$route['center_admission_ccavRequestHandler'] = "center/Center_controller/center_admission_ccavRequestHandler";
$route['center_admission_ccavResponseHandler'] = "center/Center_controller/center_admission_ccavResponseHandler";

$route['center_pending_admission_list'] = "center/Center_controller/center_pending_admission_list";
$route['center_active_admisison'] = "center/Center_controller/center_active_admisison";
$route['center_print_admission_form/(:any)'] = "center/Center_controller/center_print_admission_form/$1";
$route['center_student_qualification/(:any)'] = "center/Center_controller/center_student_qualification/$1";

$route['center__print_id/(:any)'] = "center/Center_controller/center__print_id/$1";
$route['center-subject-list'] = "center/Center_controller/center_subject_list";
$route['my_list_subject'] = "center/Center_controller/my_list_subject";
$route['center_search_result'] = "center/Center_controller/center_search_result";
$route['center_manage_result'] = "center/Center_controller/center_manage_result";


$route['center_inactive/(:any)/(:any)'] = "admin/Admin_login/center_inactive/$1";
$route['center_active/(:any)/(:any)'] = "admin/Admin_login/center_active/$1";


// 8/3/2021 to 8/4/2021
$route['upload_assignments'] = "student/Student_controller/upload_assignments";
$route['challan-payment'] = "student/Student_controller/challan_payment";
$route['balance_tution_fee'] = "student/Student_controller/balance_tution_fee";
$route['student_ledger'] = "student/Student_controller/student_ledger";

// 8/5/2021

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


$route["get_stu_payment_information"] = "api/Api_controller/get_stu_payment_information";
$route["set_stu_payment_information"] = "api/Api_controller/set_stu_payment_information";

$route["generated_results"] = "admin/Exam_controller/generated_results";
$route["generated_results_excel"] = "admin/Exam_controller/generated_results_excel";

$route["center_student_reregistration/(:any)"] = "center/Center_controller/center_student_reregistration/$1";

$route["student_re_registration_freecharge"] = "center/Center_controller/student_re_registration_freecharge";

$route["student_re_registration_freecharge_process_done"] = "web/web_controller/student_re_registration_freecharge_process_done";

$route["re-registered-student-success"] = "admin/Student_controller/re_registered_student_success";
$route["re-registered-student-fail"] = "admin/Student_controller/re_registered_student_fail";

$route["student_re_registration_edit/(:any)/(:any)"]  = "admin/Student_controller/student_re_registration_edit/$1";

$route["new_thesis_list"] = "admin/Student_controller/new_thesis_list";
$route["complete_thesis_list"] = "admin/Student_controller/complete_thesis_list";
$route['delete_thesis_data/(:any)/(:any)'] = "admin/Admin_controller/delete_thesis_data/$1";

$route["complete_thesis_list"] = "admin/Student_controller/complete_thesis_list";

$route["new_synopsis_list"] = "admin/Student_controller/new_synopsis_list";
$route["complete_synopsis_list"] = "admin/Student_controller/complete_synopsis_list";
$route["update_synopsis/(:any)"] = "admin/Student_controller/update_synopsis/$1";

//9/7/2021

$route["student_addmission_form"] = "admin/Separate_student_controller/addmission_form";
$route["student_addmission_form/(:any)"] = "admin/Separate_student_controller/addmission_form/$1";
$route["enrolled_student_list"] = "admin/Separate_student_controller/enrolled_student_list";

$route["manage_separate_student_result"] = "admin/Separate_student_controller/manage_separate_student_result";
$route["search_separate_student_result"] = "admin/Separate_student_controller/search_separate_student_result";

$route['inactivate_separate_student_results/(:any)'] = "admin/Separate_student_controller/inactivate_results/$1"; 
$route['activate_separate_student_results/(:any)'] = "admin/Separate_student_controller/activate_results/$1"; 

$route['generate_separate_student_marksheet/(:any)/(:any)/(:any)'] = "admin/Separate_student_controller/generate_marksheet/$1"; 

$route['update_separate_student_result/(:any)'] = "admin/Separate_student_controller/update_result/$1"; 

$route['delete_separate_student_result/(:any)'] = "admin/Separate_student_controller/delete_result/$1"; 
$route["activate_all_separate_student_results"] = "admin/Separate_student_controller/activate_all_separate_student_results";
$route["deactivate_all_separate_student_results"] = "admin/Separate_student_controller/deactivate_all_separate_student_results";

$route["all_document_verification_data"] = "admin/Exam_controller/all_document_verification_data";
$route["all_document_verification_detail_data/(:any)"] = "admin/Exam_controller/all_document_verification_detail_data/$1";


$route["separate_student_results"] = "admin/Separate_student_controller/separate_student_generated_results";

$route["manage_separate_student_account/(:any)"] = "admin/Separate_student_controller/manage_separate_student_account/$1";

$route["manage_separate_student_account/(:any)/(:any)"] = "admin/Separate_student_controller/manage_separate_student_account/$1/$1";
$route["separate_student_re_registration/(:any)"] = "admin/Separate_student_controller/separate_student_re_registration/$1";

$route["student_migration_certificate_requests"] = "admin/Student_certificate_controller/student_migration_certificate_requests";
$route["verify_student_migration_requests/(:any)"] = "admin/Student_certificate_controller/verify_student_migration_requests/$1";
$route["student_migration_certificates"] = "admin/Student_certificate_controller/student_migration_certificates";

$route["student_migration_certificate/(:any)"] = "admin/Student_certificate_controller/student_migration_certificate/$1";

$route["unverify_student_migration_certificate/(:any)"] = "admin/Student_certificate_controller/unverify_student_migration_certificate/$1";

$route["approved_student_transfer_certificate"] = "admin/Student_certificate_controller/approved_student_transfer_certificate";

$route["student_transfer_certificate_requests"] = "admin/Student_certificate_controller/student_transfer_certificate_requests";

//$route["approved_student_transfer_certificate/(:any)"] = "admin/Student_certificate_controller/approved_student_transfer_certificate/$1";

$route["approved_student_transfer_certificate"] = "admin/Student_certificate_controller/approved_student_transfer_certificate";

$route["approved_student_certificate/(:any)"] = "admin/Student_certificate_controller/approved_student_certificate/$1";
$route["unapproved_student_transfer_certificate/(:any)"] = "admin/Student_certificate_controller/unapproved_student_transfer_certificate/$1";

$route["student_reccomendation_letter_requests"] = "admin/Student_certificate_controller/student_reccomendation_letter_requests";
$route["approve_student_recommendation_letter/(:any)"] = "admin/Student_certificate_controller/approve_student_recommendation_letter/(:any)";
$route["approved_student_recommendation_letters"] = "admin/Student_certificate_controller/approved_student_recommendation_letters";
$route["unapproved_student_recommendation_letter/(:any)"] ="admin/Student_certificate_controller/unapproved_student_recommendation_letter/$1";



$route["student_degree_requests"] = "admin/Student_certificate_controller/student_degree_requests";
$route["approved_student_degree_request/(:any)"] = "admin/Student_certificate_controller/approved_student_degree_request/$1";
$route["unapproved_student_degree/(:any)"] = "admin/Student_certificate_controller/unapproved_student_degree/$1";
$route["approved_student_degrees"] = "admin/Student_certificate_controller/approved_student_degrees";


$route["student_provisional_degree_requests"] = "admin/Student_certificate_controller/student_provisional_degree_requests";
$route["approved_student_degrees"] = "admin/Student_certificate_controller/approved_student_degrees";

$route["approved_student_provisional_degrees/(:any)"] = "admin/Student_certificate_controller/approved_student_provisional_degrees/$1";

$route["student_transcript_certificate_failed"] = "admin/Student_certificate_controller/student_transcript_certificate_failed";
$route["student_transcript_certificate_success"] = "admin/Student_certificate_controller/student_transcript_certificate_success";
$route["student_transcript_certificate_approved"] = "admin/Student_certificate_controller/student_transcript_certificate_approved";
$route["edit_transcript/(:any)"] = "admin/Student_certificate_controller/edit_transcript/$1";
$route["update_transcript_payment/(:any)"] = "admin/Student_certificate_controller/update_transcript_payment/$1";
$route["approve_transcript/(:any)"] = "admin/Student_certificate_controller/approve_transcript/$1";
$route["disapprove_transcript/(:any)"] = "admin/Student_certificate_controller/disapprove_transcript/$1";



//student panel routes

$route["s_student_dashboard"] = "separate_student/Separate_student_controller/student_dashboard";
$route["s_id_card_print"] = "separate_student/Separate_student_controller/id_card_print";
$route["s_admission_form_print"] = "separate_student/Separate_student_controller/s_admission_form_print";
$route["s_student_logout"]  = "separate_student/Separate_student_controller/s_logout";
$route["s_e_library"] = "separate_student/Separate_student_controller/e_library";

$route["s_student_password"] = "separate_student/Separate_student_controller/student_password";
$route["s_my_results"] = "separate_student/Separate_student_controller/my_results";

$route["s-student-provisional-registration-letter"] = "separate_student/Separate_student_controller/provisional_registration_letter";

$route["s_show_my_result/(:any)"] = "separate_student/Separate_student_controller/show_my_result/$1";

$route['s-student-qualification-details'] = "separate_student/Separate_student_controller/student_qualification_details";
$route["s-upload_old_migration_certificate"] = "separate_student/Separate_student_controller/upload_old_migration_certificate";

$route["s-thesis_submission"] = "separate_student/Separate_student_controller/s_thesis_submission";

$route["s-synopsis_submission"] = "separate_student/Separate_student_controller/s_synopsis_submission";


// Certificate related

// student 

$route["migration-certificate"] = "student/Student_controller/migration_certificate";
$route["upload_old_migration_certificate"] = "student/Student_controller/upload_old_migration_certificate";
$route["pay_migration_certificate_fees"] = "student/Student_payment_controller/pay_migration_certificate_fees";
$route["migration_certificate_freecharge"] = "student/Student_payment_controller/migration_certificate_freecharge";

$route["transfer-certificate"] = "student/Student_controller/transfer_certificate";
$route["pay_transfer_certificate_fees"] = "student/Student_payment_controller/pay_transfer_certificate_fees";
$route["transfer_certificate_freecharge"] = "student/Student_payment_controller/transfer_certificate_freecharge";


$route["latter-of-recommendation"] = "student/Student_controller/latter_of_recommendation";
$route["pay_recommendation_letter_fees"] = "student/Student_payment_controller/pay_recommendation_letter_fees";
$route["recommendation_letter_freecharge"] = "student/Student_payment_controller/recommendation_letter_freecharge";

$route["student-degree"] = "student/Student_controller/student_degree";
$route["pay_degree_fees"] = "student/Student_payment_controller/pay_degree_fees";
$route["degree_freecharge"] = "student/Student_payment_controller/degree_freecharge";



$route["student-provisional-degree"] = "student/Student_controller/student_provisional_degree";
$route["pay_provisional_degree_fees"] = "student/Student_payment_controller/pay_provisional_degree_fees";
$route["provisional_degree_freecharge"] = "student/Student_payment_controller/provisional_degree_freecharge";



// for separate student certificate work

$route["separate_student_migration_certificate_requests"] = "admin/Separate_student_certificate_controller/separate_student_migration_certificate_requests";
$route["verify_separate_student_migration_requests/(:any)"] = "admin/Separate_student_certificate_controller/verify_separate_student_migration_requests/$1";
$route["separate_student_migration_certificates"] = "admin/Separate_student_certificate_controller/separate_student_migration_certificates";
$route["unverify_separate_student_migration_certificate/(:any)"] = "admin/Separate_student_certificate_controller/unverify_separate_student_migration_certificate/$1";
$route["approved_separate_student_transfer_certificate"] = "admin/Separate_student_certificate_controller/approved_separate_student_transfer_certificate";
$route["separate_student_transfer_certificate_requests"] = "admin/Separate_student_certificate_controller/separate_student_transfer_certificate_requests";

$route["separate_student_transfer_certificate/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_transfer_certificate/$1";

$route["unapproved_separate_student_transfer_certificate/(:any)"] = "admin/Separate_student_certificate_controller/unapproved_separate_student_transfer_certificate/$1";
$route["separate_student_reccomendation_letter_requests"] = "admin/Separate_student_certificate_controller/separate_student_reccomendation_letter_requests";
$route["approve_separate_student_recommendation_letter/(:any)"] = "admin/Separate_student_certificate_controller/approve_separate_student_recommendation_letter/(:any)";
$route["approved_separate_student_recommendation_letters"] = "admin/Separate_student_certificate_controller/approved_separate_student_recommendation_letters";
$route["unapproved_separate_student_recommendation_letter/(:any)"] ="admin/Separate_student_certificate_controller/unapproved_separate_student_recommendation_letter/$1";
$route["separate_student_degree_requests"] = "admin/Separate_student_certificate_controller/separate_student_degree_requests";
$route["approved_separate_student_degree_request/(:any)"] = "admin/Separate_student_certificate_controller/approved_separate_student_degree_request/$1";
$route["unapproved_separate_student_degree/(:any)"] = "admin/Separate_student_certificate_controller/unapproved_separate_student_degree/$1";
$route["approved_separate_student_degrees"] = "admin/Separate_student_certificate_controller/approved_separate_student_degrees";
$route["separate_student_provisional_degree_requests"] = "admin/Separate_student_certificate_controller/separate_student_provisional_degree_requests";

$route["separate_student_provisional_degrees/(:any)"] = "admin/Separate_student_certificate_controller/separate_student_provisional_degrees/$1";

$route["approved_separate_student_provisional_degrees"] = "admin/Separate_student_certificate_controller/approved_separate_student_provisional_degrees";
$route["s_student_transcript_certificate_failed"] = "admin/Separate_student_certificate_controller/student_transcript_certificate_failed";
$route["s_student_transcript_certificate_success"] = "admin/Separate_student_certificate_controller/student_transcript_certificate_success";
$route["s_student_transcript_certificate_approved"] = "admin/Separate_student_certificate_controller/student_transcript_certificate_approved";
$route["s_edit_transcript/(:any)"] = "admin/Separate_student_certificate_controller/edit_transcript/$1";
$route["s_update_transcript_payment/(:any)"] = "admin/Separate_student_certificate_controller/update_transcript_payment/$1";
$route["s_approve_transcript/(:any)"] = "admin/Separate_student_certificate_controller/approve_transcript/$1";
$route["s_disapprove_transcript/(:any)"] = "admin/Separate_student_certificate_controller/disapprove_transcript/$1";

$route["new_separate_thesis_list"] = "admin/Separate_student_certificate_controller/new_separate_thesis_list";

$route["update_separate_thesis/(:any)"] = "admin/Separate_student_certificate_controller/update_separate_thesis/$1";

$route["separate_complete_thesis_list"] = "admin/Separate_student_certificate_controller/separate_complete_thesis_list";

$route["new_separate_synopsis_list"] = "admin/Separate_student_certificate_controller/new_separate_synopsis_list";

$route["separate_complete_synopsis_list"] = "admin/Separate_student_certificate_controller/separate_complete_synopsis_list";

$route["update_separate_synopsis/(:any)"] = "admin/Separate_student_certificate_controller/update_separate_synopsis/$1";

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



// 26-10-2021


$route['separate_student_search_marksheet'] = "admin/Separate_student_controller/search_marksheet"; 

$route['print_separate_student_inner_marksheet/(:any)'] = "admin/Separate_student_controller/print_inner_marksheet/$1"; 

$route['edit_separate_student_marksheet/(:any)'] = "admin/Separate_student_controller/edit_marksheet/$1";

$route['delete_separate_student_marksheet/(:any)'] = "admin/Separate_student_controller/delete_marksheet/$1"; 

$route["generated_separate_student_results_excel"] = "admin/Separate_student_controller/generated_results_excel";



$route["marksheets"] = "student/Student_controller/marksheets";
$route["show_my_marksheet/(:any)"] = "student/Student_controller/show_my_marksheet/$1";


$route["s_marksheets"] = "separate_student/Separate_student_controller/marksheets";
$route["s_show_my_marksheet/(:any)"] = "separate_student/Separate_student_controller/show_my_marksheet/$1";


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



/*=============== ADMIN ===============*/
$route['manage_center_course'] = "admin/Center_controller/manage_center_course";
$route['manage_center_course/(:any)'] = "admin/Center_controller/manage_center_course/$1";
$route['admin_employee_documents/(:any)'] = "admin/Setting_controller/admin_employee_documents/$1";
$route['view_report_comments/(:any)'] = "admin/Faculty_staff_controller/view_report_comments/$1";
$route['cbd_complaint_list'] = "admin/Admin_controller/cbd_complaint_list";
$route['cancel_admission_list'] = "admin/Student_controller/cancel_admission_list";
$route['direct_payment_success_list'] = "admin/Admin_controller/direct_payment_success_list";
$route['direct_payment_failed_list'] = "admin/Admin_controller/direct_payment_failed_list";
$route['approve_guide_application/(:num)'] = "admin/Research_controller/approve_guide_application/$1";
$route['approve_guide_application_list'] = "admin/Research_controller/approve_guide_application_list";
$route['view-supervisors-appointment-letter/(:num)'] = "admin/Research_controller/view_supervisors_appointment_letter/$1";

$route['create_subject_quiz/(:any)'] = "admin/Exam_controller/create_subject_quiz/$1"; 
$route['update_phd_subject_question/(:num)'] = "admin/Exam_controller/update_phd_subject_question/$1";

$route['left_employee_list'] = "admin/Setting_controller/left_employee_list";
$route['employee_not_left/(:num)'] = "admin/Setting_controller/employee_not_left/$1";



/*=============== CENTER ===============*/
$route['center_examination_form'] = "center/Center_controller/examination_form";
$route['center_make_exam_payment/(:any)/(:any)'] = "center/Center_controller/make_exam_payment/$1";

$route['center_exam_ccavRequestHandler'] = "center/Center_controller/center_exam_ccavRequestHandler";
$route['center_exam_ccavResponseHandler'] = "center/Center_controller/center_exam_ccavResponseHandler";

$route['center_re_registration_ccavRequestHandler'] = "center/Center_controller/re_registration_ccavRequestHandler";
$route['center_re_registration_ccavResponseHandler'] = "center/Center_controller/re_registration_ccavResponseHandler";

$route['center_student_reregistration_payment/(:any)/(:any)/(:any)'] = "center/Center_controller/student_reregistration_payment/$1";

$route['center_active_hall_ticket_list'] = "center/Center_controller/center_active_hall_ticket_list";


/*=============== STUDENT ===============*/
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
$route['student_transcript_ccavRequestHandler'] = "student/Student_payment_controller/student_transcript_ccavRequestHandler";
$route['student_transcript_ccavResponseHandler'] = "student/Student_payment_controller/student_transcript_ccavResponseHandler";



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


