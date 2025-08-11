<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/


define('api_url', 'https://www.tgu.ac.in/beta_site/');

define('no_reply_mail', 'no-reply@tgu.ac.in');
define('no_reply_name', 'The Global University');


defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

define('smtp_host', 'smtp-relay.sendinblue.com');
define('smtp_user', 'globaluniversity08@gmail.com');
define('smtp_pass', '1UcXsIOGR6tPBV20');


defined('SMSKEY')      OR define('SMSKEY', "04962e8b811eed1e197a228bd1442d12"); 
defined('SENDERID')      OR define('SENDERID', "BTUNIV"); 
defined('ROUTE')      OR define('ROUTE', "4"); 

defined('ACCESSCOM')      OR define('ACCESSCOM', "AVSQ93HG69BT49QSTB"); 
defined('WORKINGCOM')      OR define('WORKINGCOM', "9448A0E5E29395346033E5720997C224"); 

defined('WORKINGAC')      OR define('WORKINGAC', "84A35AC39FED05C04E650FE70CA12C9A"); 
defined('ACCESSAC')      OR define('ACCESSAC', "AVKG93HG74BW00GKWB"); 

defined('CCMERCHANT')      OR define('CCMERCHANT', "4031839"); 
defined('CCACCESSCODE')      OR define('CCACCESSCODE', "AVDC42LL09BY15CDYB"); 
defined('CCWORKINGCODE')      OR define('CCWORKINGCODE', "68B707E0A704B2867C0BCE35F606ED10"); 


// payment creds
 /*defined('CLIENT_CODE')      OR define('CLIENT_CODE', "DEMO1"); 
 defined('USER_NAME')      OR define('USER_NAME', "spuser_2211"); 
 defined('PASS')      OR define('PASS', "DEMO1_SP2211"); 
 defined('AUTH_KEY')      OR define('AUTH_KEY', "QL0EARobZPabc8s7"); 
 defined('AUTH_IV')      OR define('AUTH_IV', "EtjZsnCjXDwUIicC");
 defined('AUTH_IV')      OR define('AUTH_IV', "EtjZsnCjXDwUIicC");
 defined('subpay_link')      OR define('subpay_link', "https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1");*/

defined('CLIENT_CODE')      OR define('CLIENT_CODE', "TGBUA"); 
defined('USER_NAME')      OR define('USER_NAME', "rohittiwarirr111_12749"); 
defined('PASS')      OR define('PASS', "TGBUA_SP12749"); 
defined('AUTH_KEY')      OR define('AUTH_KEY', "TNBR2qUtYAhJaLcL"); 
defined('AUTH_IV')      OR define('AUTH_IV', "mr9cQomyMUFb8Mky");
defined('subpay_link')      OR define('subpay_link', "https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1");

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
