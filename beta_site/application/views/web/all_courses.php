<?php include('header.php'); ?>
<section>

	<div class="header_cc_area slide-bg">
	<div class="container  overlay-about" style="width: 100%;">

			<p>Home / All Cources</p>
			<!-- <div class="row">
						<h1>All Cources</h1>
						<p>Home / All Cources</p>
					</div> -->

			<div class=" container-fluid text-center inner-heading-content">
				<h2 class="main-heading-inner-pages border-b border">All Cources</h2>
				<p> We believe in providing education that cultivates creative understanding </p>

			</div>

		</div>
	</div>
</section>

<!-- <div class = "container">

  
  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
		Bachelor of Business Management (BBM)
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">

	  <table class="table table-striped">
    <thead>
      <tr>
        <th>Course Name </th>
        <th>Duration </th>
        <th>Available Streams</th>
		<th>Apply Now</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> Bachelor of Business Management (BBM)</td>
        <td>3 Years </td>
        <td>BBM</td>
		<td> <button> Apply </button></td>
      </tr>

    </tbody>
  </table>


	</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        Bachelor of Commerce (B.Com)
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
		Bachelor of Media Management (BMM)
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
		DIPLOMA IN ACCOUNTING & TAXTATION (DAT)
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

</div>
  
  
</div> -->
<section class="c-padding inner-bg-2">
	<div class="uni_mainWrapper container box-shadow-global">
		<div class="top-header">
			<div class="all-top-header">
				<span>Course Name</span>
				<span>Duration</span>
				<span>Available Streams</span>
				<span>Apply Now</span>
			</div>
		</div>
		<div class="courses_wrapper">
			<div class="container">
				<div class="row">
					<?php /*
                        <div class="col-md-3">
                           <div class="all_list">
							<h4>All Cources</h4>
							<ul class="all_list_ul">
								<?php if(!empty($course)){ foreach($course as $course_result){?>
								<li> <a href="#<?=$course_result->relation_id?>" id=""><?=$course_result->course_name?></a></li>
								<?php }}?>
								<!--<li class="active_menu" id=""><a href="#">Bachelor in Physiotherapy	</a></li>
								<li><a href="#Arts" id="">Bachelor of Arts </a></li>
								<li><a href="#" id="Business">Bachelor of Business Administration </a></li>
								<li><a href="#">Bachelor of Business Management </a></li>
								<li><a href="#">Bachelor of Commerce </a></li>
								<li><a href="#">Bachelor of Computer Application </a></li>
								<li><a href="#">Bachelor of Computer Application Lateral entry to III Semester </a></li>-->
							</ul>
						   </div>
                        </div>*/ ?>
					<!--<div class="col-md-4">
						<input type="text" name="filter" id="filter" class="form-control" placeholder="Type here to search course">
						</div>
						<div class="col-md-2">
						<button name="search" id="search" class="btn btn-primary">Search</button>
						</div>-->
					<div class="col-md-12">

						<?php if (!empty($course)) {
							$c = 1;
							foreach ($course as $course_result) {
								$stream = $this->Web_model->get_selected_course_stream($course_result->course_id, $course_result->faculty_id);
						?>
								<div class="col-md-12">
									<div class="list_strure results" id="<?= $course_result->relation_id ?>" <?php if ($c <= 6) { ?>style="display:block" <?php } else { ?>style="display:block" <?php }
																																														$c++; ?>>
										<h2><i class="fa fa-flag-checkered" aria-hidden="true"></i> <?= $course_result->course_name ?> (<?= $course_result->sort_name ?>)</h2>
										<p></p>
										<div class="width_Box first-width-box">
											<span><?php if ($course_result->course_mode == "1") { ?>Year<?php } else {
																										echo "Semester";
																									} ?></span>
											<h5>Course Mode </h5>

										</div>
										<div class="width_Box second-width-box">
											<span><?php if ($course_result->course_mode == "1") {
														echo $course_result->year_duration;
													} else {
														echo $course_result->sem_duration;
													} ?></span>
											<h5>Course Duration</h5>

										</div>
										<div class="width_Box third-width-box">
											<span></span>
											<h5>Available Streams</h5>
											<ul class="avaible-stream-ul">
												<?php if (!empty($stream)) {
													foreach ($stream as $stream_result) { ?>
														<li><?= $stream_result->stream_name ?></li>
												<?php }
												} ?>
											</ul>
<hr>
											<div class="button_Area">

<a href="<?= base_url(); ?>admission-form/<?= base64_encode($course_result->id); ?>" class="univer_button orange_btn">Apply for Admission</a>
<!--<a href="#" class="univer_button">View Course Details</a>-->

</div>
										</div>
										<!--<div class="width_Box">
									<span><?= $course_result->fees ?>/Year</span>
									<h5>Course Fees</h5>
								</div>-->


										<div class="clearfix"></div>
									</div>
								</div>
						<?php }
						} ?>
					</div>
				</div>
			</div>

		</div>

		<div class="clearfix"></div>


	</div>
					</section>
	<?php include('footer.php'); ?>
	<script>
		/*$("#search").click(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $("#filter").val(),
        count = 0;

      // Loop through the comment list
      $('.results').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }

      });

    });*/
	</script>