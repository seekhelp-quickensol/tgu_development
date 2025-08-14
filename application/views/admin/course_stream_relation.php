<?php include('header.php');?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
	.error{
		color:red !important;
	}
	/* .course-relation .select2-dropdown{
  		z-index: 10 !important;
	} */

</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Course stream Setting <a href="<?=base_url();?>list_course_stream_relation" class="btn btn-primary mr-2 float-right">View List</a></h4><p class="card-description">
                    Please enter course stream details
                  </p>
                  <form class="forms-sample course-relation" name="relation_form" id="relation_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-6">
						<div class="form-group">
                      <label for="exampleInputUsername1">Course Code *</label>
                      <input type="text" class="form-control" id="course_code" name="course_code" placeholder="Course Code" value="<?php if(!empty($single)){ echo $single->course_code;}?>">
                    </div>
					
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputUsername1">Faculty Name *</label>
						  <select class="form-control js-example-basic-single course_relation" id="faculty" name="faculty">
							<option value="">Select Faculty</option>
							<?php if(!empty($faculty)){ foreach($faculty as $faculty_result){?>
							<option value="<?=$faculty_result->id?>" <?php if(!empty($single) && $single->faculty == $faculty_result->id){?>selected="selected"<?php }?>><?=$faculty_result->faculty_name?></option>
							<?php }}?>
						  </select>
						  <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">			
						 
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputUsername1">Course Type Name *</label>
						  <select class="form-control js-example-basic-single" id="course_type" name="course_type">
							<option value="">Select Course Type</option>
							<?php if(!empty($course_type)){ foreach($course_type as $course_type_result){?>
							<option value="<?=$course_type_result->id?>" <?php if(!empty($single) && $single->course_type == $course_type_result->id){?>selected="selected"<?php }?>><?=$course_type_result->course_type?></option>
							<?php }}?>
						  </select>
						  
						</div>
					</div>
					<div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course Name *</label>
                      <select class="form-control js-example-basic-single course_relation" id="course" name="course">
						<option value="">Select Course</option>
						<?php if(!empty($course)){ foreach($course as $course_result){?>
						<option value="<?=$course_result->id?>"  <?php if(!empty($single) && $single->course == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?> (<?php if($course_result->course_type==0){?>Regular<?php }else if($course_result->course_type==2){?>B.Voc<?php }else{?>Pulp<?php }?>)</option>
						<?php }}?>
					  </select>
					  
                    </div>
                    </div>
					
					</div>
					<div class="row">
					<div class="col-md-6">
					
                    <div class="form-group">
                      <label for="exampleInputUsername1">Stream Name *</label>
                      <select class="form-control js-example-basic-single course_relation" id="stream" name="stream">
						<option value="">Select Stream</option>
						<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
						<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
						<?php }}?>
					  </select>
					  <div class="error" id="relation_error"></div>
                    </div>
					</div>
					<div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course Mode *</label>
                      <select class="form-control js-example-basic-single" id="course_mode" name="course_mode">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($single) && $single->course_mode == '1'){?>selected="selected"<?php }?>>Year</option>
						<option value="2" <?php if(!empty($single) && $single->course_mode == '2'){?>selected="selected"<?php }?>>Semester</option>
						 <option value="3" <?php if(!empty($single) && $single->course_mode == '3'){?>selected="selected"<?php }?>>Both (Year & Semester)</option> 
						<option value="4" <?php if(!empty($single) && $single->course_mode == '4'){?>selected="selected"<?php }?>>Month</option>
					  </select>
                    </div>
					</div>
					</div>
					<div class="row">
						<div class="col-md-6 year_duration"  style="<?php if(!empty($single)){ if($single->course_mode == "1" || $single->course_mode == "3"){?>display:block<?php }else{?>display:none<?php }}else{?>display:none<?php }?>">
							<div class="form-group " >
								<label for="exampleInputUsername1">Year Duration*</label>
								<select class="form-control" id="year_duration" name="year_duration">
									<option value="">Select Duration</option>
									<?php for($d=1;$d<=12;$d++){?>
										<option value="<?=$d?>" <?php if(!empty($single) && $single->year_duration == $d){?>selected="selected"<?php }?>><?=$d?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-md-6 sem_duration" style="<?php if(!empty($single)){ if($single->course_mode == "2" || $single->course_mode == "3"){?>display:block<?php }else{?>display:none<?php }}else{?>display:none<?php }?>">
							<div class="form-group " >
								<label for="exampleInputUsername1">Semester Duration*</label>
								<select class="form-control" id="sem_duration" name="sem_duration">
									<option value="">Select Duration</option>
									<?php for($d=1;$d<=12;$d++){?>
										<option value="<?=$d?>"<?php if(!empty($single) && $single->sem_duration == $d){?>selected="selected"<?php }?>><?=$d?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-md-6 month_duration" style="<?php if(!empty($single)){ if($single->course_mode == "4"){?>display:block<?php }else{?>display:none<?php }}else{?>display:none<?php }?>">
							<div class="form-group " >
								<label for="exampleInputUsername1">Month Duration*</label>
								<select class="form-control" id="month_duration" name="month_duration">
									<option value="">Select Duration</option>
									<?php for($d=1;$d<=12;$d++){?>
										<option value="<?=$d?>"<?php if(!empty($single) && $single->month_duration == $d){?>selected="selected"<?php }?>><?=$d?></option>
									<?php }?>
								</select>
							</div>
						</div>
						
					
						
					 
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputUsername1">Image</label>
								<input type="file" class="form-control" id="userfile" name="userfile"> 
								<input type="hidden" name="old_file" id="old_file" value="<?php if(!empty($single)){ echo $single->course_image;}?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputUsername1">Slider Image</label>
								<input type="file" class="form-control" id="slider_image" name="slider_image"> 
								<input type="hidden" name="old_slider_image" id="old_slider_image" value="<?php if(!empty($single)){ echo $single->slider_image;}?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Link *</label>
							  <input type="text" class="form-control" id="course_link" name="course_link" placeholder="Course Link" value="<?php if(!empty($single)){ echo $single->course_link;}?>">
							</div>
							</div>
					</div>
				<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="exampleInputUsername1">Short Description</label>
						<textarea class="form-control" id="content" name="content" placeholder="Description"><?php if(!empty($single)){ echo $single->course_description;}?></textarea>
					</div> 
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
						<label for="exampleInputUsername1">Description</label>
						<textarea class="form-control" id="description" name="description" placeholder="Description"><?php if(!empty($single)){ echo $single->description;}?></textarea>
					</div>
					</div>
					</div>
					
					 
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#relation_form').validate({
		ignore: ":hidden",
		rules: {
			course_code: {
				required: true,
			},
			faculty: {
				required: true,
			},
			course_type: {
				required: true,
			},
			course: {
				required: true,
			},
			course_link: {
				required: true,
			},
			stream: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_duration: {
				required: true,
			},
			sem_duration: {
				required: true,
			},
			month_duration: {
				required: true,
			},
			is_lateral: {
				required: true,
			},
			lateral_entry_duration: {
				required: true,
			},
		},
		messages: {
			course_code: {
				required: "Please enter course code",
			},
			faculty: {
				required: "Please select faculty",
			},
			course_type: {
				required: "Please select course type",
			},
			course: {
				required: "Please select course",
			},
			course_link: {
				required: "Please enter course link",
			},
			stream: {
				required: "Please select stream",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_duration: {
				required: "Please select year duration",
			},
			sem_duration: {
				required: "Please select semester duration",
			},
			month_duration: {
				required: "Please select month duration",
			},
			is_lateral: {
				required: "Please select lateral entry",
			},
			lateral_entry_duration: {
				required: "Please select lateral entry duration",
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
		}
	});
});
$(".course_relation").change(function(){  
	if($("#faculty").val() != '' && $("#course").val() != '' && $("#stream").val() != ''){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_course_stream_relation",
		data:{'faculty':$("#faculty").val(),'course':$("#course").val(),'stream':$("#stream").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "1"){
				$("#relation_error").html("This relation is already added");
				$("#save_btn").hide();
			}else{
			    $("#relation_error").html("");
				$("#save_btn").show();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
});

$("#course_mode").change(function(){
    if($(this).val() == "3"){
        $(".year_duration").css("display", "block");
        $(".sem_duration").css("display", "block");
        $(".month_duration").css("display", "none");
    } else if($(this).val() == "2"){
        $(".year_duration").css("display", "none");
        $(".sem_duration").css("display", "block");
        $(".month_duration").css("display", "none");
    } else if($(this).val() == "1"){
        $(".year_duration").css("display", "block");
        $(".sem_duration").css("display", "none");
        $(".month_duration").css("display", "none");
    } else if($(this).val() == "4"){
        $(".year_duration").css("display", "none");
        $(".sem_duration").css("display", "none");
        $(".month_duration").css("display", "block");
    }
});
$("#is_lateral").change(function(){
	if($(this).val() == "1"){
		$("#lateral_entry").show();
	}else{
		$("#lateral_entry").hide();
	}
});
$(document).ready(function () {
     $('#description').summernote({
         height: 400,
         callbacks: {
            onImageUpload: function (image) {
                 sendFile(image[0]);
             }
         }

     }); 
    function sendFile(image) {
        var data = new FormData();
        data.append("image", image);
        //if you are using CI 3 CSRF
        data.append("<?= $this->security->get_csrf_token_name() ?>", "<?= $this->security->get_csrf_hash() ?>");
        $.ajax({
            data: data,
            type: "POST",
            url: "<?=base_url()?>admin/Ajax_controller/upload_news_image",
            cache: false,
            contentType: false,
            processData: false,
            success: function (url) {
                var image = url;
                $('#description').summernote("insertImage", image);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
});



$('#faculty').on('change', function() {
			$('#faculty').valid();
		});

		$('#course_type').on('change', function() {
			$('#course_type').valid();
		});

		$('#course').on('change', function() {
			$('#course').valid();
		});

		$('#stream').on('change', function() {
			$('#stream').valid();
		});

		$('#course_mode').on('change', function() {
			$('#course_mode').valid();
		});
		
		
		
</script>
 