<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'Welcome/index';
$route['about'] = 'Welcome/about';
$route['contact'] = 'Welcome/contact';
$route['admissions'] = 'Welcome/admissions';

$route['membership'] = 'Welcome/membership';
$route['membership-inner'] = 'Welcome/membership_inner';
$route['accreditation'] = "Welcome/accreditation";
$route['rehabilitation'] = 'Welcome/rehabilitation';
$route['mba'] = 'Welcome/online_mba';
$route['diploma-in-electrical-engineering-air-conditioner'] = 'Welcome/diploma_in_electrical_engineering_air_conditioner';
$route['diploma-in-mechanical-engineering-nanotechnology'] = 'Welcome/diploma_in_mechanical_engineering_nanotechnology';
$route['diploma-in-electrical-electronics-engineering-instrumentation'] = 'Welcome/diploma_in_electrical_electronics_engineering_instrumentation';
$route['diploma-in-computer-science'] = 'Welcome/diploma_in_computer_science';
$route['diploma-in-civil-engineering'] = 'Welcome/diploma_in_civil_engineering';
$route['diploma-in-electronics-communication'] = 'Welcome/diploma_in_electronics_communication';
$route['diploma-in-automobile-engineering'] = 'Welcome/diploma_in_automobile_engineering';
$route['mca'] = 'Welcome/mca';
$route['remote-sensing'] = 'Welcome/remote_sensing';
$route['m-tech-in-environmental-engineering'] = 'Welcome/m_tech_in_environmental_engineering';
$route['construction-engineering-management'] = 'Welcome/construction_engineering_management';
$route['power-system'] = 'Welcome/power_system';
$route['VLSI'] = 'Welcome/VLSI';
$route['structural-engineering'] = 'Welcome/structural_engineering';
$route['transportation-engineering'] = 'Welcome/transportation_engineering';
$route['industrial-engineering-management'] = 'Welcome/industrial_engineering_management';
$route['thermal-engineering'] = 'Welcome/thermal_engineering';
$route['civil-engineering'] = 'Welcome/civil_engineering';
$route['computer-science'] = 'Welcome/computer_science';
$route['electrical-engineering'] = 'Welcome/electrical_engineering';
$route['mechanical-engineering'] = 'Welcome/mechanical_engineering';
$route['electronics-communication'] = 'Welcome/electronics_communication';
$route['environmental-engineering'] = 'Welcome/environmental_engineering';
$route['b-tech-in-automobile'] = 'Welcome/b_tech_in_automobile';
$route['b-tech-in-electrical-electronics-engineering'] = 'Welcome/b_tech_in_electrical_electronics_engineering';
$route['b-tech-in-civil-engineering'] = 'Welcome/b_tech_in_civil_engineering';
$route['b-tech-in-computer-science'] = 'Welcome/b_tech_in_computer_science';
$route['b-tech-in-electrical-engineering'] = 'Welcome/b_tech_in_electrical_engineering';
$route['b-tech-in-mechanical-engineering'] = 'Welcome/b_tech_in_mechanical_engineering';
$route['b-tech-in-information-technology'] = 'Welcome/b_tech_in_information_technology';
$route['b-tech-in-electronics-communication-telecommunication'] = 'Welcome/b_tech_in_electronics_communication_telecommunication';$route['diploma-in-mechanical-engineering'] = 'Welcome/diploma_in_mechanical_engineering';
$route['submit_enquiry'] = 'Welcome/submit_enquiry';
$route['thankyou-for-enq'] = 'Welcome/thankyou_for_enq';


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



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

