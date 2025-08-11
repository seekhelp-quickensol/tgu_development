<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//front 
$route['default_controller'] = 'Welcome/index';
$route['translate_uri_dashes'] = FALSE;
$route['login']='Welcome/index';
$route['forgot-password']='Welcome/forgot_password';
$route['reset_your_password/(:any)']='Welcome/reset_your_password/$1';
$route['student_logout']='front/User_controller/student_logout';
$route['dashboard']='front/User_controller/dashboard';
$route['upload_progress_report']='front/User_controller/upload_progress_report';
$route['upload_thesis']='front/User_controller/upload_thesis';
$route['upload_synopsis']='front/User_controller/upload_synopsis';
$route['print_synopsis']='front/User_controller/print_synopsis';
$route['upload_abstract_report']='front/User_controller/upload_abstract_report';
$route['student-password']='front/User_controller/student_password';
$route['undertaking_letter']='front/User_controller/undertaking_letter';
$route['admission_form']='front/User_controller/admission_form';
$route['id_card']='front/User_controller/id_card';
$route['e_library']='front/User_controller/e_library';
$route['student_qualification_details']='front/User_controller/student_qualification_details';
$route['upload_assessment']='front/User_controller/upload_assessment';
$route['upload_assessment/(:any)']='front/User_controller/upload_assessment/$1';
$route['my_results']='front/User_controller/my_results';
$route['show_my_result/(:any)']='front/User_controller/show_my_result/$1';
$route['update_document']='front/User_controller/update_document';
$route['marksheets']='front/User_controller/marksheets';
$route['print_marksheet/(:any)']='front/User_controller/print_marksheet/$1';
$route['print_course_work_marksheet/(:any)']='front/User_controller/print_course_work_marksheet/$1';
$route['want_help']='front/User_controller/want_help';
$route['upload-letter-of-recommendation']='front/User_controller/upload_letter_of_recommendation';
$route['letter-of-recommendation']='front/User_controller/latter_of_recommendation';
$route['pay_recommendation_letter_fees']='front/User_controller/pay_recommendation_letter_fees';
$route['print_recommendation_letter']='front/User_controller/print_recommendation_letter';

$route['second-letter-of-recommendation']='front/User_controller/second_latter_of_recommendation';
$route['second_pay_recommendation_letter_fees']='front/User_controller/second_pay_recommendation_letter_fees';
$route['second_print_recommendation_letter/(:any)']='front/User_controller/second_print_recommendation_letter/$1';

$route['second_student_recommendation_ccavRequestHandler']='front/User_controller/second_student_recommendation_ccavRequestHandler';
$route['second_student_recommendation_ccavResponseHandler']='front/User_controller/second_student_recommendation_ccavResponseHandler';

$route['student_recommendation_ccavRequestHandler']='front/User_controller/student_recommendation_ccavRequestHandler';
$route['student_recommendation_ccavResponseHandler']='front/User_controller/student_recommendation_ccavResponseHandler';
$route['student-provisional-degree']='front/User_controller/student_provisional_degree'; 
$route["accept_provisional_undertaking"] = "front/User_controller/accept_provisional_undertaking";
$route["accept_provisional_terms/(:any)"] = "Welcome/accept_provisional_terms/$1";
$route["accept_transcript_terms/(:any)"] = "Welcome/accept_transcript_terms/$1";

$route["pay_provisional_degree_fees"] = "front/User_controller/pay_provisional_degree_fees";
$route["student_provisional_ccavRequestHandler"] = "front/User_controller/student_provisional_ccavRequestHandler";
$route["student_provisional_ccavResponseHandler"] = "front/User_controller/student_provisional_ccavResponseHandler";
$route["print_provisional_degree/(:any)"] = "front/User_controller/print_provisional_degree/$1";

$route["apply_consolidate_student"] = "front/User_controller/apply_consolidate_student";
$route["pay_consolidate_student_fees/(:any)"] = "front/User_controller/pay_consolidate_student_fees/$1";
$route["student_consolidate_ccavRequestHandler"] = "front/User_controller/student_consolidate_ccavRequestHandler";
$route["student_consolidate_ccavResponseHandler"] = "front/User_controller/student_consolidate_ccavResponseHandler";
$route["online_payment_RequestHandler"] = "front/User_controller/online_payment_RequestHandler";

$route['student-degree']='front/User_controller/student_degree'; 
$route["accept_degree_undertaking"] = "front/User_controller/accept_degree_undertaking";
$route["accept_degree_terms/(:any)"] = "Welcome/accept_degree_terms/$1";
$route["pay_degree_fees"] = "front/User_controller/pay_degree_fees";
$route["student_degree_ccavRequestHandler"] = "front/User_controller/student_degree_ccavRequestHandler";
$route["student_degree_ccavResponseHandler"] = "front/User_controller/student_degree_ccavResponseHandler";
$route["print_degree/(:any)"] = "front/User_controller/print_degree/$1";


$route['scholar-extra-details']='front/User_controller/set_scholar_details';


$route["transfer-certificate"] = "front/User_controller/transfer_certificate";
$route["print_transfer_certificate/(:any)"] = "front/User_controller/print_transfer_certificate/$1";

$route["accept_transfer_terms/(:any)"] = "Welcome/accept_transfer_terms/$1";


$route["accept_transfer_undertaking"] = "front/User_controller/accept_transfer_undertaking";
$route["pay_transfer_certificate_fees"] = "front/User_controller/pay_transfer_certificate_fees";
$route["student_transfer_ccavRequestHandler"] = "front/User_controller/student_transfer_ccavRequestHandler";
$route["student_transfer_ccavResponseHandler"] = "front/User_controller/student_transfer_ccavResponseHandler";

$route["transcript_application"] = "front/User_controller/transcript_application";
$route["pay_transcrip_certificate_fees"] = "front/User_controller/pay_transcrip_certificate_fees";
$route["student_transcript_ccavRequestHandler"] = "front/User_controller/student_transcript_ccavRequestHandler";
$route["student_transcript_ccavResponseHandler"] = "front/User_controller/student_transcript_ccavResponseHandler";
$route["print_transcript/(:any)"] = "front/User_controller/print_transcript/$1";
$route["migration-certificate"] = "front/User_controller/migration_certificate"; 
$route["print_migration_certificate/(:any)"] = "front/User_controller/print_migration_certificate/$1";
$route["provisional_registration_letter"] = "front/User_controller/provisional_registration_letter";

$route["upload_old_migration_certificate"] = "front/User_controller/upload_old_migration_certificate";
$route["accept_migration_undertaking"] = "front/User_controller/accept_migration_undertaking";
$route["accept_migration_terms/(:any)"] = "Welcome/accept_migration_terms/$1";
$route["pay_migration_certificate_fees"] = "front/User_controller/pay_migration_certificate_fees";
$route['student_migration_ccavRequestHandler'] = "front/User_controller/student_migration_ccavRequestHandler";
$route['student_migration_ccavResponseHandler'] = "front/User_controller/student_migration_ccavResponseHandler";
$route['student_consolidate_student_marksheet'] = "front/User_controller/student_consolidate_student_marksheet";
$route['print_consolidate_student_marksheet/(:any)'] = "front/User_controller/print_consolidate_student_marksheet/$1";
$route['my-online-study'] = "front/User_controller/my_online_study";
$route['read-topic/(:any)'] = "front/User_controller/read_topic/$1";
$route['exams'] = "front/User_controller/exams";
$route['start-capture/(:any)'] = "front/User_controller/start_capture/$1";
$route['start-exam/(:any)'] = "front/User_controller/start_exam/$1";
$route['submit-exam/(:any)'] = "front/User_controller/submit_exam/$1";
 

$route['letter-of-recommendation']='front/User_controller/latter_of_recommendation';
$route['pay_recommendation_letter_fees']='front/User_controller/pay_recommendation_letter_fees';
$route['print_recommendation_letter/(:any)']='front/User_controller/print_recommendation_letter/$1';
$route['student_recommendation_ccavRequestHandler']='front/User_controller/student_recommendation_ccavRequestHandler';
// $route['student_recommendation_ccavResponseHandler']='front/User_controller/student_recommendation_ccavResponseHandler';
$route['student_recommendation_ccavResponseHandler']='Welcome/student_recommendation_ccavResponseHandler';

$route['student_bonafide']='front/User_controller/student_bonafide';
$route['pay_bonafide_fees']='front/User_controller/pay_bonafide_fees';
$route['print_bonafide/(:any)']='front/User_controller/print_bonafide/$1';
$route['student_bonafide_ccavRequestHandler']='front/User_controller/student_bonafide_ccavRequestHandler';
// $route['student_bonafide_ccavResponseHandler']='front/User_controller/student_bonafide_ccavResponseHandler';
$route['student_bonafide_ccavResponseHandler']='Welcome/student_bonafide_ccavResponseHandler';



$route['bonafide_certificate_for_scholarship']='front/User_controller/bonafide_certificate_for_scholarship';
$route['pay_bonafide_scholarship_fees']='front/User_controller/pay_bonafide_scholarship_fees'; 
$route['student_bonafide_scholarship_ccavResponseHandler']='Welcome/student_bonafide_scholarship_ccavResponseHandler';


$route['student_medium_inst']='front/User_controller/student_medium_inst';
$route['pay_medium_inst_fees']='front/User_controller/pay_medium_inst_fees';
$route['print_medium_inst/(:any)']='front/User_controller/print_medium_inst/$1';
$route['student_medium_inst_ccavRequestHandler']='front/User_controller/student_medium_inst_ccavRequestHandler';
// $route['student_medium_inst_ccavResponseHandler']='front/User_controller/student_medium_inst_ccavResponseHandler';
$route['student_medium_inst_ccavResponseHandler']='Welcome/student_medium_inst_ccavResponseHandler';

$route['student_no_backlog']='front/User_controller/student_no_backlog';
$route['pay_no_backlog_fees']='front/User_controller/pay_no_backlog_fees';
$route['print_no_backlog/(:any)']='front/User_controller/print_no_backlog/$1';
$route['student_no_backlog_ccavRequestHandler']='front/User_controller/student_no_backlog_ccavRequestHandler';
// $route['student_no_backlog_ccavResponseHandler']='front/User_controller/student_no_backlog_ccavResponseHandler';
$route['student_no_backlog_ccavResponseHandler']='Welcome/student_no_backlog_ccavResponseHandler';

$route['student_no_split']='front/User_controller/student_no_split';
$route['pay_no_split_fees']='front/User_controller/pay_no_split_fees';
$route['print_no_split/(:any)']='front/User_controller/print_no_split/$1';
$route['student_no_split_ccavRequestHandler']='front/User_controller/student_no_split_ccavRequestHandler';
// $route['student_no_split_ccavResponseHandler']='front/User_controller/student_no_split_ccavResponseHandler';
$route['student_no_split_ccavResponseHandler']='Welcome/student_no_split_ccavResponseHandler';


$route['student_character']='front/User_controller/student_character';
$route['pay_character_fees']='front/User_controller/pay_character_fees';
$route['print_character/(:any)']='front/User_controller/print_character/$1';
$route['student_character_ccavRequestHandler']='front/User_controller/student_character_ccavRequestHandler';
// $route['student_character_ccavResponseHandler']='front/User_controller/student_character_ccavResponseHandler';
$route['student_character_ccavResponseHandler']='Welcome/student_character_ccavResponseHandler';

$route['assesment']='front/User_controller/assesment';
$route['my_videos']='front/User_controller/my_videos';
$route['video_gallery/(:any)']='front/User_controller/video_gallery/$1';

$route['exam_main']='front/User_controller/exam_main';
$route['result_main']='front/User_controller/result_main';
$route['certificate_main']='front/User_controller/certificate_main';
$route['want_help']='front/User_controller/want_help';
$route['e_certificate']='front/User_controller/e_certificate';
$route['exam/(:any)']='front/User_controller/exam/$1';
$route['orders']='front/User_controller/orders';
$route['edit-account']='front/User_controller/edit_account';
$route['edit-security']='front/User_controller/edit_security';
$route['faq']='front/User_controller/faq';

$route['learn']='front/User_controller/learn';
$route['product-detail']='front/User_controller/product_detail';
$route['result']='front/User_controller/result';
$route['learn/(:any)']='front/User_controller/learn/$1';
$route['course/(:any)/(:any)/(:any)']='front/User_controller/course/$1';
$route['make_payment']='front/User_controller/make_payment';
$route['checkout_razorpay']='front/User_controller/checkout_razorpay';
$route['get_receipt/(:any)']='front/User_controller/get_receipt/$1';
$route['conversation']='front/User_controller/conversation';
$route['view_conversation/(:any)']='front/User_controller/view_conversation/$1';
$route['get_certificate/(:any)/(:any)'] = "front/User_controller/get_certificate/$1";
$route['download_certificate/(:any)/(:any)'] = "front/User_controller/download_certificate/$1";
$route['credit_transfer_certificate'] = "front/User_controller/credit_transfer_certificate";
$route['pay_credit_transfer_certificate'] = "front/User_controller/pay_credit_transfer_certificate";
$route['credit_transfer_certificate_ccavRequestHandler'] = "front/User_controller/credit_transfer_certificate_ccavRequestHandler";
$route['credit_transfer_certificate_ccavResponseHandler'] = "front/User_controller/credit_transfer_certificate_ccavResponseHandler";
$route['print_cerdit_transfer_certificate/(:any)'] = "front/User_controller/print_cerdit_transfer_certificate/$1";

$route['student_self_Assessment_form'] = "front/User_controller/student_self_Assessment_form";
$route['student_assignment_form'] = "front/User_controller/student_assignment_form";
$route['student_teacher_Assessment_form'] = "front/User_controller/student_teacher_Assessment_form";
$route['student_industry_Assessment_form'] = "front/User_controller/student_industry_Assessment_form";
$route['student_parent_Assessment_form'] = "front/User_controller/student_parent_Assessment_form";
$route['book_visit_appoinment'] = "front/User_controller/book_visit_appoinment";
$route['thank_you_for_visit_appoinment'] = "front/User_controller/thank_you_for_visit_appoinment";


$route['ccavRequestHandler'] = "front/CCavenue/ccavRequestHandler";
$route['ccavResponseHandler'] = "front/CCavenue/ccavResponseHandler";

