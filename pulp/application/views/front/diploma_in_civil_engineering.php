 <?php include('header.php');?>

<div class="breakcrumb-wrapper">

    <div class="card text-white">

      <!-- <img src="https://via.placeholder.com/1200x250.png" class="card-img" alt=""> -->

      <img src="<?=base_url();?>assets/img/btech_banner.jpg" height="250px" width="100%" class="card-img" alt="">

      <div class="card-img-overlay d-flex justify-content-center flex-column container">

        <h5 class="card-title">Diploma In Civil Engineering</h5>

        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->

        <p class="card-text">Home / Program </p>

      </div>

    </div>

  </div>







<main class="container">



<section class="container diploma-sec">

    <h1 class="mb-2">

    Diploma Engineering Admissions (Professional Unified Learning Programs) <?=$date = date("Y-") . date("y", strtotime("+1 year")); ?>  at TGU

    </h1>

    <p>

   Civil engineering is the professional engineering branch. Under this branch of engineering, work is done on the design, construction and maintenance projects of building, house, road, dam, canal, airport and other physical and naturally built things. On the basis of the design, all the required materials like brick, cement, sand, corrugation etc. are called and its construction work is done. Civil engineers have the most important role in accomplishing all these.
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

        <li>Computer Science</li>


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









</main>



<?php include('contact_form.php');?>

<?php include('footer.php');?>

<script>
      $(document).ready(function () {
		$('.main-dropdown').addClass('active');
			$('.diploma-main-link1').addClass('active');
			$('.diploma5').addClass('active');
		});
</script>

