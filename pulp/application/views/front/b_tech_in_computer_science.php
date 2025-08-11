<?php include('header.php');?>

<div class="breakcrumb-wrapper">

    <div class="card text-white">

      <!-- <img src="https://via.placeholder.com/1200x250.png" class="card-img" alt=""> -->

      <img src="<?=base_url();?>assets/img/btech_banner.jpg" height="250px" width="100%" class="card-img" alt="">

      <div class="card-img-overlay d-flex justify-content-center flex-column container">

        <h5 class="card-title">B. Tech in Computer Science</h5>

        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->

        <p class="card-text">Home / Program </p>

      </div>

    </div>

  </div>



<section class="container diploma-sec">

    <h1 class="mb-2">

    Why you should choose engineering as a career?

    </h1>

    <p>

   B.Tech in Computer Science teaches you about computers and technology. You learn how they work, how to write programs, and how to make websites and apps. You also learn about keeping data safe and making computers talk to each other over networks. B.Tech in Information Technology is similar but focuses more on how computers are used in businesses and managing computer systems.
    </p>



    <h2 class="mt-5 mb-2">

    Online B.Tech Admissions (Professional Unified Learning Programs) <?=$date = date("Y-") . date("y", strtotime("+1 year")); ?>  at TGU    </h2>

    <p>An ability-based course with a stronger focus on practical learning is the B Tech online program.

</p>

    <ul>

        <li>The distinction between a Bachelor of Technology and a BE programe is that a Bachelor of Technology programe places a greater interest in research than in practical application</li>

    </ul>



    <h2 class="mt-5 mb-2">Below is a list of the requirements for enrolment in the B.Tech programs (PULP)</h2>

    <ul>

        <li>Candidates who have completed Diploma/BSC holders in relevant stream.

</li>

        <li>Students must have 1 year work experience</li>

    </ul>



    <h2 class="mt-5 mb-2">Our Other Specializations in Bachelor of Technology</h2>

    <ul>

        <li>Electronics & Communication/Telecommunication</li>

        <li>Information Technology</li>

        <li>Mechanical Engineering</li>

        <li>Electrical Engineering</li>


        <li>Civil Engineering</li>

        <li>Electrical & Electronics Engineering</li>

        <li>Automobile</li>

        <li>Environmental Engineering</li>

    </ul>




 

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
			$('.diploma-main-link2').addClass('active');
			$('.btech5').addClass('active');
		});
</script>