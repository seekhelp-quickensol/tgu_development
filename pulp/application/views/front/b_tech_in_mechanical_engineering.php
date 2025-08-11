<?php include('header.php');?>

<div class="breakcrumb-wrapper">

    <div class="card text-white">

      <!-- <img src="https://via.placeholder.com/1200x250.png" class="card-img" alt=""> -->

      <img src="<?=base_url();?>assets/img/btech_banner.jpg" height="250px" width="100%" class="card-img" alt="">

      <div class="card-img-overlay d-flex justify-content-center flex-column container">

        <h5 class="card-title">B. Tech in Mechanical Engineering</h5>

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
Mechanical engineering is considered one of the top branches of engineering. Every year thousands of students take admission in mechanical engineering courses. The course objectives for Diploma in Mechanical Engineering are to provide students with the knowledge and skills that are necessary for the futurist engineering industry. Also, the course aims for developing the competencies of the students to make them employable with core competencies of creating innovative, entrepreneurial, efficient engineers of high professional standards with a broad perspective of the discipline.
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
 

        <li>Electrical Engineering</li>

        <li>Computer Science</li>

        <li>Civil Engineering</li>

        <li>Electrical & Electronics Engineering</li>

        <li>Automobile</li>

        <li>Environmental Engineering</li>

    </ul>





<!--

    <h2 class="mt-5 mb-2">

    Duration & Fees Structure

    </h2>

    <ul>

        <li>3 Years/6 Semester</li>

        <li>Fees- 25000/Semester</li>

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

<!--

    <h2 class="mt-5 mb-2">Top Job profiles After Engineering</h2>

    <p>Over the years, technologies including machine learning, cloud computing, data analytics, and artificial intelligence have expanded quickly. They have become crucial in today's society with the spread of the pandemic and the global health problem.

    <img src="<?=base_url();?>assets/img/profiles-After-Engineering.png" alt="" class="mt-4 ">



</p>
-->


</section>



<?php include('contact_form.php');?>

<?php include('footer.php');?>

<script>
      $(document).ready(function () {
		$('.main-dropdown').addClass('active');
			$('.diploma-main-link2').addClass('active');
			$('.btech3').addClass('active');
		});
</script>