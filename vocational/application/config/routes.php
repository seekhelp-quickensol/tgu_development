<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['index'] = 'Welcome/index';
$route['all_courses'] = 'Welcome/all_courses';
$route['all_courses/(:any)'] = 'Welcome/all_courses/$1';
$route['thank-you'] = 'Welcome/thankyou';
$route['our-program'] = 'Welcome/our_program';
$route['contact-details'] = 'Welcome/contact_details';
$route['contact-details'] = 'Welcome/email_details';
$route['form'] = 'Welcome/form';


$route['university-ugc'] = "Welcome/university_ugc";
$route['university-approvals'] = "Welcome/approvals";
$route['aicte'] = "Welcome/aicte";
$route['aiu'] = "Welcome/aiu";
$route['bci'] = "Welcome/bci";
$route['pci'] = "Welcome/pci";
$route['dedidd'] = "Welcome/dedidd";
$route['bpedvi'] = "Welcome/bpedvi";
$route['bpedhi'] = "Welcome/bpedhi";
$route['dedhi'] = "Welcome/dedhi";
$route['dedvi'] = "Welcome/dedvi";
$route['bedidd'] = "Welcome/bedidd";
$route['membership'] = 'Welcome/membership';
$route['accreditation'] = 'Welcome/accreditation';
$route['membership-inner'] = 'Welcome/membership_inner';
$route['rehabilitation'] = 'Welcome/rehabilitation';

$route['agricultural-research-approval'] = 'Welcome/indian_council_of_agricultural_research_approval';
$route['pharmacy-council-of-india-approval'] = 'Welcome/pharmacy_council_of_india_approval';
$route['bar-council-of-india'] = 'Welcome/bar_council_of_india';
