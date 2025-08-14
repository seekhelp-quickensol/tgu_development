<?php include('header.php');?>
<style>
	.error{
		color:red;
	}
</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Create Topic details
							<a href="<?=base_url();?>topic_list" class="btn btn-primary mr-2 float-right">View List</a>
							</h4>
							<!-- <p class="card-description"> Please enter details </p> -->
							<form id="topic" method="post" enctype="multipart/form-data">
								<hr>
								<div class="row">
									<div class="form-group col-lg-4 col-md-3">
										<label class="col-form-label">Course Name<span style="color:red;">*</span></label>
										<select  style="height:34px;" name="course_name" id="course_name" class="form-control js-example-basic-single select2_single">
											<option value="">Select Course</option>
											<?php if(!empty($course)){ foreach ($course as $course_result){?>
											<option value="<?=$course_result->id?>" <?php if(!empty($single) && $single->course_id == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
											<?php } } ?>
										</select> 
										<label for="course_name" generated="true" class="error" style="display:none;">Please select course</label>
									</div>
									<div class="form-group col-lg-4 col-md-3">
										<label class="col-form-label">Stream Name<span style="color:red;">*</span></label>
										<select name="stream" id="stream" style="height:34px;" class="form-control js-example-basic-single select2_single" >
											<option value="">Select Stream</option>
											<?php if(!empty($stream)){ foreach ($stream as $stream_result){?>
											<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream_id == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
											<?php } } ?>
										</select> 
										<label for="stream" generated="true" class="error" style="display:none;">Please select stream*</label>
									</div>
									<div class="form-group col-lg-4 col-md-3">
										<label class="col-form-label">Year/Sem<span style="color:red;">*</span></label>
										<select name="year_sem" id="year_sem" style="height:34px;" class="form-control username js-example-basic-single select2_single" >
											<option value="">Select Year/Sem</option> 
											<?php for($y=1;$y<=12;$y++){?>
											<option value="<?=$y?>" <?php if(!empty($single) && $single->year_sem == $y){?>selected="selected"<?php }?>><?=$y?></option> 
											<?php }?>
										</select> 
										<label for="year_sem" generated="true" class="error" style="display:none;">Please select year/sem*</label>
									</div>
									<div class="form-group col-lg-4 col-md-3">
										<label class="col-form-label">Topic Name<span style="color:red;">*</span></label>
										<input name="topic_name_show" id="topic_name_show" type="text" placeholder="" class="form-control username" value="<?php if(!empty($single)){ echo $single->topic_name_show;}?>"> 
										<input name="id" id="id" type="hidden"class="" value="<?php if(!empty($single)){ echo $single->id;}?>"> 
									</div>
									<div class="form-group col-lg-4 col-md-3">
										<label class="col-form-label">Topic Slug Name(English Only)<span style="color:red;">*</span></label>
										<input name="topic_name" id="topic_name" type="text" placeholder="" class="form-control username" value="<?php if(!empty($single)){ echo $single->topic_name;}?>"> 
									</div> 
								</div>
								<div class="user_error" id="user_error" style="color:red" ></div>
								<div class="row">
									<div class="form-group col-lg-12 col-md-3">
										<label class="col-form-label">Topic information<span style="color:red;">*</span></label>
										<textarea name="topic_info" id="summernote"  placeholder="" class="form-control username"><?php if(!empty($single)){ echo $single->topic_info;}?></textarea> 
										<label style="display:none;" for="summernote" generated="true" class="error">Please enter topic details*</label>
									</div>
								</div> 
								<br><br>
								<button class="btn btn-sm btn-primary submit-btn single_btn" type="submit">Submit</button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
$("#course_name").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course_name").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="'+ d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});

$(document).ready(function(){
	$("#topic").validate({
		ignore: ":hidden:not(#summernote),.note-editable.panel-body",
		rules:{
			course_name:{
				required:true,
			},
			stream:{
				required:true,
			},
			year_sem:{
				required:true,
			},
			topic_name_show:{
				required:true,
			},
			topic_name:{
				required:true,
			},
			// topic_info:{
			// 	required:true,
			// },   
		},
		messages:{
			course_name:{
				required:"Please select course",
			},
			stream:{
				required:"Please select stream*",
			},
			year_sem:{
				required:"Please select year/sem*",
			},
			topic_name_show:{
				required:"Please enter topic name*",
			},
			topic_name:{
				required:"Please enter topic name*",
			},
			// topic_info:{
			// 	required:"Please enter topic details*",
			// }, 
		}
	});
}); 


$('#course_name').on('change', function() {
			$('#course_name').valid();
		});

		$('#stream').on('change', function() {
			$('#stream').valid();
		});

		$('#year_sem').on('change', function() {
			$('#year_sem').valid();
		});

</script> 
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

$(document).ready(function () {
     $('#summernote').summernote({
           height: 200,
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
                $('#summernote').summernote("insertImage", image);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
});

</script>