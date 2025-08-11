<?php include('header.php');?>



<div class="breakcrumb-wrapper">

    <div class="card text-white">

      <!-- <img src="https://via.placeholder.com/1200x250.png" class="card-img" alt=""> -->

      <img src="<?=base_url();?>assets/img/btech_banner.jpg" height="250px" width="100%" class="card-img" alt="">

      <div class="card-img-overlay d-flex justify-content-center flex-column container">

        <h5 class="card-title">Diploma in Computer Science</h5>

        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->

        <p class="card-text">Home / Program </p>

      </div>

    </div>

  </div>





<section class="container diploma-sec">

    <h1 class="mb-2">

    Diploma Engineering Admissions (Professional Unified Learning Programs) <?=$date = date("Y-") . date("y", strtotime("+1 year")); ?>  at TGU

    </h1>

    <p>
Computer science is also the study of processes that interact with data. Computer Science Engineering is the best for the students who wish to opt for computer science after class 10th. Computer science engineering is the most demanding profession in public as well as private sector. Engineering is a field that is constantly evolving and changing; therefore, TGU is starting ONLINE PROGRAMS for working professionals (Join the course with proper process and employers’ permission).
    </p>



    <h2 class="mt-5 mb-2">

    Below is a list of the requirements for enrolment in the Diploma engineering programs (PULP)

    </h2>

    <ul>

        <li>Candidates who have completed a relevant ITI program for government recognized centre.</li>

        <li>Students must have 1 yr work experience</li>

    </ul>



    <h2 class="mt-5 mb-2">Our Other Specializations in Diploma Engineering</h2>

    <ul>

        <li>Electrical Engineering/Air Conditioner</li>

        <li>Mechanical Engineering/Nanotechnology</li>

        <li>Electrical & Electronics Engineering/Instrumentation</li>


        <li>Civil Engineering</li>

        <li>Electronics & Communication</li>

        <li>Automobile Engineering</li>

    </ul>


<!--
    <h2 class="mt-5 mb-2">

    Duration & Fees Structure

    </h2>

    <ul>

        <li>2 Years/4 Semester</li>

        <li>Fees- 13500/Semester</li>

        <li>Registration Fees- 1000 One Time</li>

        <li>Examination fees- 1000/Semester</li>

    </ul>
-->


    <h3 class="mt-5 mb-2">Procedure for Admission:</h3>

    <p>Students can take the admission online on the university website with a prescribed fee. For all the courses the same admission form is applicable.</p>

    <p>Submit the duly filled application form to the admission department of the university with following documents along with the course fee.</p>

    <ol>

        <li>Copy of All Mark Sheets and Certificates.</li>

        <li>Id & Address Proof</li>

        <li>Passport Size Color Photographs</li>

    </ol>

</section>











<?php include('contact_form.php');?>

<?php include('footer.php');?>

<script>
      $(document).ready(function () {
		$('.main-dropdown').addClass('active');
			$('.diploma-main-link1').addClass('active');
			$('.diploma4').addClass('active');
		});
</script>


