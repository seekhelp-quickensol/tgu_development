<?php
$course_streams = $this->Web_model->get_all_course_streams();
//$course_streams = $this->Web_model->get_all_courses();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BVOC Program | The Global University</title>
  <link rel="shortcut icon" href="<?= base_url(); ?>images/images/logo_1709272897.png" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/new_style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />
  <style>
    .bg-blue .navbar {
      overflow: hidden;
      justify-content: end;
    }

    .bg-blue .navbar a {

      font-size: 16px;
      color: black;
      padding: 14px 16px;
      text-decoration: none;
    }

    .bg-blue .subnav {
      float: left;
      overflow: hidden;
      position: relative
    }

    .bg-blue .subnav .subnavbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: black;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .bg-blue .navbar a:hover,
    .subnav:hover .subnavbtn {
      background-color: #0062cc;
      background-color: #4c0000;
    }

    .bg-blue .subnav-content {
      display: none;
      position: absolute;
      left: 0;
      background-color: #0062cc;
      background-color: #4c0000;
      width: 200px;
      z-index: 1;
      width: 400px;
      max-height: 470px;
      overflow: auto;
      border-top: 5px solid #ffc107;
    }

    /* width */
    .bg-blue .subnav-content::-webkit-scrollbar {
      width: 8px;
    }

    /* Track */
    .bg-blue .subnav-content::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    .bg-blue .subnav-content::-webkit-scrollbar-thumb {
      background: #afafaf;
      /* border-radius: 50px; */
    }

    /* Handle on hover */
    .bg-blue .subnav-content::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    .bg-blue .subnav-content a {
      display: block;
      color: white;
      text-decoration: none;
    }

    .bg-blue .subnav-content a:hover {
      background-color: #eee;
      color: black;
    }

    .bg-blue .subnav:hover .subnav-content {
      display: block;
    }

    .bg-blue {
      background: #172f41;
    }

    .bg-violet {
      background-color: #172f41;
    }

    .para_area_frame {
      text-align: center;
    }
  </style>
  <style>
    .navbar-nav .nav-link {
      font-weight: 500;
      padding: 14px 16px;
      color: #fff;
    }


    .navbar-nav .nav-link:hover {
      background-color: #8B0000;
    }

    .btn-custom {
      background-color: #8B0000;
      color: white;
      font-weight: 600;
      border-radius: 0 !important;
    }

    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link.show {
      color: #fff;
    }

    .btn-custom:hover {
      background-color: #a00000;
    }

    .navbar-nav .nav-item a:focus,
    .navbar .navbar-nav .nav-item a.active,
    .nav-item .dropdown a.active,
    .nav-item .dropdown a:focus {
      color: #fff;
    }



    .dropdown-menu .nav-item,
    .nav-item a.active,
    .dropdown-menu a:focus {
      color: black !important;
    }

    .dropdown-item.active,
    .dropdown-item:active {
      color: black;
      text-decoration: none;
      background-color: #fff;
    }

    .nav-item.dropdown:hover .dropdown-menu {
      display: block;


    }

    .tick::marker {
      content: "\2713";
      color: #ffc107;
      position: absolute;
      margin-left: -10px;
      font-weight: 700;
    }

    .heading-divider:after {
      display: block;
      content: "";
      height: 2px;
      width: 200px;
      background: #ffc107;
      margin: 15px auto;
      position: relative;
    }

    .tick a {
      margin-left: 5px;
    }

    .chosen-container {
      width: 100% !important;

    }

    form a.chosen-single {
      padding: 6px 10px !important;
      height: 38px !important;
      background: white !important;

    }

    .header_cc_area {
      padding: 10px;
    }

    .para_area {
      padding: 30px;
    }


    .dropdown-menu {
      border-radius: 0px !important;
      border-top: 5px solid #e1b143;
      background-color: #172f41;
    }

    .dropdown-menu li {
      padding: 5px;
    }

    .dropdown-menu li:hover {
      background-color: #fff;

    }

    .dropdown-menu li:hover a {
      color: #111;
    }

    .dropdown-menu li a {
      color: #fff;
    }


    .para_area_frame {
      margin: 0 auto;
      width: 75%;
    }

    .para_area_frame img {
      width: 100%;
      height: auto;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand py-0 d-flex" href="<?= base_url(); ?>">
          <img
            src="<?= base_url(); ?>images/images/logo_1709272897.png"
            alt="Logo"
            width="75"
            height="75"
            class="d-inline-block align-text-top" />
          <div class="brand-text ms-2 py-2">
            <h1 class="fw-bold fs-4 m-0">THE GLOBAL UNIVERSITY</h1>
            <span class="fw-semibold fs-6">
              Complete Learning Management Solution Process
            </span>
          </div>
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div style="margin-left:21%;">
            <a href="http://127.0.0.1/btu_new/collaboration-form?bvoc" class="helpline rounded-pill ms-auto me-1 fw-medium fs-6 text-decoration-none text-white">Collaborate Now </a>
            <a href="hhttps://www.tgu.ac.in/collaboration-form?bvoc" class="helpline rounded-pill ms-auto me-1 fw-medium fs-6 text-decoration-none text-white">Collaborate Now </a>
          </div>
          <div>
            <a href="http://127.0.0.1/btu_new/admission-form?bvoc=bvoc" class="helpline rounded-pill ms-auto me-1 fw-medium fs-6 text-decoration-none text-white"> Admission </a>
            <a href="hhttps://www.tgu.ac.in/admission-form?bvoc=bvoc" class="helpline rounded-pill ms-auto me-1 fw-medium fs-6 text-decoration-none text-white"> Admission </a>
          </div> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
          //  include('email_details.php'); 
          ?>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
          //  include('contact_details.php'); 
          ?>
        </div>
      </div>
    </nav>
  </header>
  <!-- <section id="bg-blue" class="bg-white">
    <div class="container">
      <div class="p-3">
        <div class="navbar">
          <a href="<?= base_url(); ?>">Home</a>
          <div class="subnav">
            <button class="subnavbtn">Programs <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content" style="width: 400px;">
              <?php if (!empty($course_streams)) {
                foreach ($course_streams as $course_result) {
              ?>
                  <a href="<?= base_url(); ?>all_courses/<?= $course_result->course_link ?>"><?= $course_result->course_name ?> <?= $course_result->stream_name ?></a>
              <?php }
              } ?>
            </div>
          </div>
          <div class="subnav">
            <button class="subnavbtn">Recognitions <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
              <a href="<?= base_url(); ?>university-ugc">UGC Approval</a>
              <a href="<?= base_url(); ?>university-approvals">University Gazette</a>
              <a href="<?= base_url(); ?>aicte">AICTE</a>
              <a href="<?= base_url(); ?>aiu">AIU</a>
              <a href="<?= base_url(); ?>bci">BAR Council of India (BCI)</a>
              <a href="<?= base_url(); ?>pci">Pharmacy Council of India (PCI)</a>
              <a href="<?= base_url(); ?>membership">Membership & Accreditation</a>
              <a href="<?= base_url(); ?>rehabilitation">Rehabilitation Council of India (RCI)</a>


              <a href="<?= base_url(); ?>university-approvals">University Gazette</a>
              <a href="<?= base_url() ?>agricultural-research-approval">Indian Council of Agricultural Research(ICAR)</a>
              <a href="<?= base_url() ?>pharmacy-council-of-india-approval">Pharmacy Council of India (PCI)</a>
              <a href="<?= base_url() ?>bar-council-of-india">Bar Council of India (BCI)</a>
            </div>
          </div>
          <a href="https://www.tgu.ac.in/collaboration-form?bvoc=bvoc" target="_blank">Collaborations</a>
          <a href="https://www.tgu.ac.in/admission-form?bvoc=bvoc" target="_blank">Admission</a>
          <a href="https://www.tgu.ac.in/student-corner/" target="_blank">Student Login</a>

        </div>
      </div>
    </div>
  </section> -->


  <nav class="navbar navbar-expand-lg bg-violet p-3">
    <div class="container">

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link " href="<?= base_url() ?>">
              Home
            </a>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link " href="<?= base_url() ?>all_courses">
              Programs
            </a>

          </li>
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="coursesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Programs
            </a>
            <ul class="dropdown-menu" aria-labelledby="coursesDropdown">
              <?php if (!empty($course_streams)) {
                foreach ($course_streams as $course_result) {
              ?>
                  <a class="dropdown-item" href="<?= base_url(); ?>all_courses/<?= $course_result->course_link ?>"><?= $course_result->course_name ?></a>
              <?php }
              } ?>
            </ul>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="admissionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Recognitions
            </a>
            <ul class="dropdown-menu" aria-labelledby="admissionDropdown">
              <!-- <li><a class="dropdown-item" href="<?= base_url(); ?>university-ugc">UGC Approval</a></li>
              <li><a class="dropdown-item" href="<?= base_url(); ?>university-approvals">University Gazette</a></li>
              <li><a class="dropdown-item" href="<?= base_url(); ?>aicte">AICTE</a></li>
              <li><a class="dropdown-item" href="<?= base_url(); ?>aiu">AIU</a></li>
              <li><a class="dropdown-item" href="<?= base_url(); ?>bci">BAR Council of India (BCI)</a></li>
              <li><a class="dropdown-item" href="<?= base_url(); ?>pci">Pharmacy Council of India (PCI)</a></li>
              <li><a class="dropdown-item" href="<?= base_url(); ?>membership">Membership & Accreditation</a></li>
              <li><a class="dropdown-item" href="<?= base_url(); ?>rehabilitation">Rehabilitation Council of India (RCI)</a></li> -->


              <li><a class="dropdown-item" href="<?= base_url(); ?>university-approvals">University Gazette</a></li>
              <li><a class="dropdown-item" href="<?= base_url() ?>agricultural-research-approval">Indian Council of Agricultural Research(ICAR)</a></li>
              <li><a class="dropdown-item" href="<?= base_url() ?>pharmacy-council-of-india-approval">Pharmacy Council of India (PCI)</a></li>
              <li><a class="dropdown-item" href="<?= base_url() ?>bar-council-of-india">Bar Council of India (BCI)</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="https://www.tgu.ac.in/collaboration-form?bvoc=bvoc">
              Collaborations
            </a>

          </li>
          <li class="nav-item dropdown">
            <a href="https://www.tgu.ac.in/admission-form?bvoc=bvoc" class="nav-link" target="_blank">
              Admission
            </a>

          </li>
          <li class="nav-item dropdown">
            <a href="https://www.tgu.ac.in/student-corner/" target="_blank" class="nav-link">
              Student Login
            </a>

          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="collaborationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Collaboration
            </a>
            <ul class="dropdown-menu" aria-labelledby="collaborationDropdown">
              <li><a class="dropdown-item" href="#">Partners</a></li>
              <li><a class="dropdown-item" href="#">MoUs</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="researchDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Research
            </a>
            <ul class="dropdown-menu" aria-labelledby="researchDropdown">
              <li><a class="dropdown-item" href="#">Projects</a></li>
              <li><a class="dropdown-item" href="#">Publications</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul> -->

      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>