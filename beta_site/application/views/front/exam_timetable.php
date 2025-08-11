<!--
<div class="page-title-area bg-14">
			<div class="container">
				<div class="page-title-content">
					<h2>Time Table</h2>

					<ul>
						<li>
							<a href="javascript:void(0);">
                            Examination 
							</a>
						</li>

						<li class="active">Time Table</li>
					</ul>
				</div>
			</div>
		</div>
		

        <section class="costing-area pt-100 pb-70">
        <div class="container">
				<div class="candidates-resume-content">
					<form class="resume-info" id="timetable_form" name="timetable_form" enctype="multipart/form-data" method="post">
						<h3>View Time Table</h3>
						<p><Small>Please provide your details</Small></p>

						<div class="row">
							<div class="col-lg-4 col-md-4">
                                <div class="form-group">
									<label>Course Name<span class="req">*</span></label>
                                    <select class="form-control" id="course" name="course">
                                    <option value="">Select Course</option>
                                    <?php if(!empty($course)){ foreach($course as $course_result){?>
                                    <option value="<?=$course_result->id?>"  <?php if(!empty($single) && $single->course == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?> (<?php if($course_result->course_type==0){?>Regular<?php }else{?>Pulp<?php }?>)</option>
                                    <?php }}?>
                                </select>
								</div>
							</div>

                           
							<div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Stream <span class="req">*</span></label>
                                    <select class="form-control" id="stream" name="stream">
                                        <option value="">Select Stream</option>
                                        <?php if(!empty($stream)){ foreach($stream as $stream_result){?>
                                        <option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </div>

							<div class="col-lg-4 col-md-4">
                                <div class="form-group">
									<label>Year/Sem<span class="req">*</span></label>
									<select name="year_sem" id="year_sem" class="form-control">
										<option value="">Select</option>
										<?php for ($y = 1; $y <= 12; $y++) { ?>
											<option value="<?= $y ?>"><?= $y ?></option>
										<?php } ?>
									</select>
								</div>
							</div> 
						
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="default-btn" name="search" id="search" value="Search">Search</button>
                                    <div class="pull-right"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>



				
            </div>
        </section>
		
		

        <script>
            $("#course").change(function(){  
                $.ajax({
                    type: "POST",
                    url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
                    data:{'course':$("#course").val()},
                    success: function(data){
                        $("#stream").empty();
                        $('#stream').append('<option value="">Select Stream</option>');
                        var opts = $.parseJSON(data);
                        $.each(opts, function(i, d) {
                        $('#stream').append('<option value="' + d.id + '@@@' + d.stream + '">' + d.stream_name + '</option>');
                        });
                        $('#stream').trigger('change');	
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                });	
            });


            $('#timetable_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_sem: {
				required: true,
			},
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_sem: {
				required: "Please select year/sem",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function(form) {
			if(checkSubject()==false){
				return false;
			}else{
				form.submit();
			}
		}
	});
        </script> -->



<?php include('header.php');?>

<style>

#contentDiv{text-transform:uppercase};

 .panel-group .panel {

        border-radius: 0;

        box-shadow: none;

        border-color: #EEEEEE;

    }



    .panel-default > .panel-heading {

        padding: 0;

        border-radius: 0;

        color: #212121;

        background-color: #FAFAFA;

        border-color: #EEEEEE;

    }



    .panel-title {

        font-size: 14px;

    }



    .panel-title > a {

        display: block;

        padding: 15px;

        text-decoration: none;

    }



    .more-less {

        float: right;

        color: #212121;

    }



    .panel-default > .panel-heading + .panel-collapse > .panel-body {

        border-top-color: #EEEEEE;

    }



 

table {

  font-family: arial, sans-serif;

  border-collapse: collapse;

  width: 100%;

}



td, th {

  border: 1px solid #dddddd;

  text-align: left;

  padding: 8px;

}



tr:nth-child(even) {

  /*background-color: #dddddd;*/

} 

 

.align_center{

	text-align: center;

}

.image_height{

	height: 30px;

	width: 30px;

}

</style>

<div class="page-title-area bg-14">
			<div class="container">
				<div class="page-title-content">
					<h2>Time Table</h2>

					<ul>
						<li>
							<a href="javascript:void(0);">
                            Examination 
							</a>
						</li>

						<li class="active">Time Table</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

			<div class="uni_mainWrapper syllabus-section" style="min-height:500px;">

				<div class="container">

					<div class="row">

						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

							<div class="row">

								<div class="col-md-12"> 

									<form method="post" name="result_form" id="result_form" enctype="multipart/form-data">

								<div class="row">

									<div class="col-md-12">

										<div class="personal_details">
										<br><br>
											<h3>View Time Table</h3>

											<small>Please provide your details</small>

											<hr>

										</div>

									</div>

								</div>

								<div class="row">

									<div class="col-md-4">

										<div class="form-group">

											<label>Course<span class="req">*</span></label> 
											<select id="course" name="course" class="form-control mode_of_change">
													<option value="">Select Course</option>
													<?php 
													$not_course = array(24,120,267,26,227,25,42,155,33,158,260);
													if(!empty($course)){
														foreach($course as $course_result){
															if(!in_array($course_result->id,$not_course)){
													?>
													<option value="<?=$course_result->id;?>"><?=$course_result->course_name;?></option>
													<?php }}} ?>	
												</select>

										</div>

									</div> 
									<div class="col-sm-4">
											<div class="form-group">
												<label>Stream <span class="req">*</span></label>
												<select name="stream" id="stream" class="form-control">
													<option value="">Select Stream</option>
													 
												</select>
											</div>
										</div>
									<div class="col-md-4">

										<div class="form-group">

											<label>Year/Sem<span class="req">*</span></label>

											<select name="year_sem" id="year_sem" required class="form-control">

												<option value="">Select</option>

												<?php for($y=1;$y<=12;$y++){?>

												<option value="<?=$y?>"><?=$y?></option>

												<?php }?>

											</select>

										</div>

									</div>

								</div> 
								<br><br>
								<div class="row">

									<div class="col-md-12">

										<div class="form-group">

											<label></label>

											<button type="submit" class="default-btn" name="search" id="search" value="Search">Search</button>

											<div class="pull-right">

											</div>

										</div>

									</div>	

								</div> 
								<br><br>

							</form>

						</div> 

						
						<div style="margin-bottom:50px;">
						<div class="row">

							<div class="col-md-12">

								<?php if($this->input->post('search') == "Search" && !empty($timesheet)){  
										if(!empty($timesheet)){  
										$paper_details = $this->Web_model->get_timetable_papers($timesheet->id);
								?> 
							<table align="center" class="detailTable" style="width:70%" cellpadding="2"> 
								<tr> 
									<td width="180px" colspan="4" class="data"><b>Course: </b><?php echo $timesheet->print_name?></td>  
									<td width="180px" colspan="4" class="data"><b>Stream: </b><?php echo $timesheet->stream_name ?></td>  
									<td width="90px" colspan="4" class="data"><b>Year/Sem: </b><?php echo $timesheet->year_sem?></td> 
								</tr> 
								<tr> 
									<td width="180px" style="text-align:center" colspan="12" class="data"><b>Time: </b>TIMINGS  (10:00 AM To 1:00 PM)</td>   
								</tr> 
							</table>  
							<table align="center" border="1"  style="width:70%" class="detailTable"> 
								<tr>  
									<td class="data"   align="center">S.No</td>   
									<td class="data"  align="center">Subject(s)/Paper(s)</td> 
									<td class="data"  align="center">Date</td> 
									<td class="data"  align="center">Day</td>    
								</tr> 
							<?php 
								$sr=1;
							if(!empty($paper_details)){
									foreach($paper_details as $paper_details_result){
							?>
								<tr>
									<td><?=$sr++?></td>
									<td><?=$paper_details_result->subject?></td>
									<td><?=$paper_details_result->date?></td>
									<td><?=$paper_details_result->day?></td>
								</tr>
							<?php }}?> 
							</table> 
						<?php  
								} 	
							}          
						?>



  							</div>

								</div>
								</div>
						

							</div> 

						</div>

					</div>

				</div> 

<?php include('footer.php');?>

<script>

	jQuery.validator.addMethod("noHTMLtags", function(value, element){

		if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){

			if(value == ""){

				return true;

			}else{

				return false;

			}

		} else {

			return true;

		}

	}, "HTML tags are Not allowed.");





	$('#result_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			
			year_sem: {
				required: true,
			},
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			
			year_sem: {
				required: "Please select year/sem",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function(form) {
			if(checkSubject()==false){
				return false;
			}else{
				form.submit();
			}
		}
	});

$("#course").change(function(){  

	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			// alert();
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
</script>



