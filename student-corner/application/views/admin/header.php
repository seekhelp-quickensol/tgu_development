<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verification Portal</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url();?>admin_assets/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url();?>admin_assets/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url();?>admin_assets/images/favicon-16x16.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://fonts.cdnfonts.com/css/tt-commons" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url();?>admin_assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>admin_assets/css/style.css">
	<style type="text/css" media="print">
    * { display: none; }
</style>
</head>
<body id="test">
    <header class="" >
        <div class="container-fluid sticky_header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand logo_text" href="<?=base_url();?>"> <img class="my-window-logo" src="<?=base_url();?>admin_assets/images/dvlogo.png" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent_1"
                aria-controls="navbarSupportedContent_1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

           
            <div class="collapse navbar-collapse" id="navbarSupportedContent_1">
                <ul class="navbar-nav ml-auto rightside_icons">
                    <!-- <li><h2>Welcome To E-Verification</h2></li> -->
                     
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="<?=base_url();?>admin_assets/images/profile-user-primary.png" class="user_image">
                            <!-- <i class="fa fa-bell top_header_icons" aria-hidden="true"></i> -->
                        </a>
          
                        <!-- <h2>Welcome To E-Verification</h2>   -->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       
                        <a href="<?=base_url();?>update-profile" class="dropdown-item" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Profile Update</a>
                        <a href="<?=base_url();?>change-password" class="dropdown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i>Change Password</a>
                        <a href="<?=base_url();?>logout" class="dropdown-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>logout</a> 
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
         
</div>
    </header>
