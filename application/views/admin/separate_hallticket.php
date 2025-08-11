<?php
if(isset($_GET['exam_month']) && $_GET['exam_month'] !=""){
?>
<!DOCTYPE html>

<html>

	<body onload="window.print()">

	<style type="text/css">

	#customers {

  font-family: Arial, Helvetica, sans-serif;

  border-collapse: collapse;

  width: 100%;

}



#customers td, #customers th {

 /* border: 1px solid #ddd;*/

  padding: 3px;

}

 



#customers th {

  padding-top: 12px;

  padding-bottom: 12px;

  text-align: left;

  background-color: #4CAF50;

  color: white;

}

		.Mystar

		{

			color: Red;

		}

		.card

		{

			box-shadow: 1px 4px 8px 1px rgba(0, 0, 0, 0.2);

			width: 650px;

			margin: auto;

			text-align: left;

			border: 2px solid;

		}

		button

		{

			border: none;

			outline: 0;

			display: inline-block;

			padding: 8px;

			color: #000;

			background-color: #3e9dff;

			text-align: center;

			cursor: pointer;

			width: 100%;

			font-size: 18px;

			font-weight: bold;

		}

	 

		.title

		{

			color: grey;

			font-size: 18px;

		}

		.subject_table tr td{ 

  border: 1px solid black; 

		} 

		 /* .mar{

             margin-top: 200px;

         } */

	</style>

	<script type="text/javascript">

		function printContent(el) {

			var restorepage = document.body.innerHTML;

			var printcontent = document.getElementById(el).innerHTML;

			document.body.innerHTML = printcontent;

			window.print();

			document.body.innerHTML = restorepage;

		}

	</script>

	<?php $university_details = $this->Setting_model->get_university_details();

		/*if(empty($students)){

			redirect(base_url());

		}*/

	?>

	<?php if(!empty($students)){ ?>

        <div id="div1" class="block">

                <div class="form-body">

                   

                    <div id="div-1" class="block">

                        <table class="card">

                            <tr>

                                <td colspan="3" style="border-bottom: 2px solid;">

                                    <table style="width:100%; text-align: center;">

                                        <tr>

                                            <td>

                                                <img src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" alt="Logo" style="width: 75px; height: 75px;">

                                            </td>

                                           

                                            <!--<td>

												<div>

													<p>Email: Test@gmail.com</p>

													<p>Contact: 0000000000</p>

													<p>Address: 209, Goodwill Square, Dhanori, Pune, Maharashtra - 411015</p>

												</div>

                                            </td>-->

                                        </tr>

                                        <tr>

											 <td>

                                                <div class="uni-details">

                                                    <span style="color: #101444d1; font-size: 30px; font-weight: bold;"><?php if(!empty($university_details)){ echo $university_details->university_name; }?></span>

													<p style="margin:2px 0px;">Complete Learning Management </p>	

													<p style="margin-top: 2px;margin-bottom: 5px;font-size: 18px;font-weight: 600;color: #3b3e66;"><?php if(!empty($university_details)){ echo $university_details->address; }?></p>

													

                                                    <span style="color: #000; font-size: 20px; font-weight: bold;">Hall Ticket</span>

                                                </div>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                                <td colspan="3" style="text-align: center;">

                                    <span style="color: #000; font-weight: bold;">(Information as furnished by the Candidate)</span><br />

                                    <span style="float: right; margin-right: 30px; font-size: 15px; font-weight: bold;">

                                        Enrollment NO</span><br />

                                    <br />

                                    <div style="float: right; border: 1px solid; width: 180px; height: 35px; margin-right: 7px;">

                                        <span style="float: right; margin-right: 30px; font-size: 15px; font-weight: bold;margin-top: 7px;">

                                            <label ID="lblIdno"><?=$students->enrollment_number?></label></span>

                                    </div>

                                    <br />

                                    <div style="float: right; border: 1px solid; margin: 30px -135px 0 0;">

                                        <img id="imgpo" width="100px" height="100px" Style="margin: 5px 5px 5px 5px;" src="<?=$this->Digitalocean_model->get_photo('images/separate_student/photo/'.$students->photo)?>" />

                                    </div>

                                    <br />

                                    <div style="float: right; border: 1px solid; width: 180px; height: 40px; margin: 135px -184px 0 0;">

                                        <img id="Imagesignature" width="100px" height="30px" style="margin: 5px 5px 5px 5px;" src="<?=$this->Digitalocean_model->get_photo('images/separate_student/signature/'.$students->signature)?>"/>

                                    </div>

                                </td>

                            </tr>

                            <tr>

                                <td colspan="3">

                                    <table style="border: 1px solid; margin: -209px 0 0 10px; width: 415px; height: 155px;

                                        font-weight: bold;">

                                        <tr> 
                                            <td style="padding-left: 10px;"> 
                                                Name 
                                            </td> 
                                            <td> 
                                                : 
                                            </td> 
                                            <td> 
                                                <label class="uppercase"><?=$students->student_name?></label> 
                                            </td> 
                                        </tr> 
										<tr> 
                                            <td style="padding-left: 10px;"> 
                                                Month 
                                            </td> 
                                            <td> 
                                                : 
                                            </td> 
                                            <td> 
                                                <label class="uppercase"><?=$_GET['exam_month']?></label> 
                                            </td> 
                                        </tr> 
										<tr> 
                                            <td style="padding-left: 10px;"> 
                                                Year 
                                            </td> 
                                            <td> 
                                                : 
                                            </td> 
                                            <td> 
                                                <label class="uppercase"><?=$_GET['exam_year']?></label> 
                                            </td> 
                                        </tr> 
                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Father name

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=$students->father_name?></label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Date of birth

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=date("d/m/Y",strtotime($students->date_of_birth))?></label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Course

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=$students->print_name?></label>

                                            </td>

                                        </tr>

										 <tr>

                                            <td style="padding-left: 10px;">

                                               Stream

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=$students->stream_name?></label>

                                            </td>

											

                                        </tr>

										<tr>

										<td style="padding-left: 10px;">

                                               Year/Sem

                                            </td>

                                            <td>

                                                :

                                            </td>

											 <td>

                                                <label class="uppercase"><?=$_GET['year_sem']?></label>

                                            </td>

										</tr>

                                       

                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Address

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label id="lbldoorno" ><?=$students->address?></label>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                                <!--<td>

                                    <table class="subject_table" id="customers" style="margin: 1px 0 0 10px;height: 100px;width: 65%;font-weight: bold;"> 

										<tr>

											<td style="font-size: 15px;">Subject Code</td>

											<td style="font-size: 15px;">Subject Name</td>

										</tr>

										<?php if(!empty($subject)){ foreach($subject as $subject_result){?>

										<tr>

											<td style="font-size: 15px;"><?=$subject_result->subject_code?></td>

											<td style="font-size: 15px;"><?=$subject_result->subject_name?></td>   

										</tr> 

										<?php }}?> 								

									</table>

                                </td>-->

                            </tr>

							<tr>

								<td>

									<p style="padding-left: 13px;">Declaration:-</p>

									<p style="padding-left: 13px;">I solemnly declare and confirm that I am duly qualified to take examination in the

course for which I have applied and all the certificates and testimonials attached

with my application are true and valid. I have also cleared all my University’s dues.</p>

								<p  style="padding-left: 13px;">I shall always follow the rules and regulations of the University and in case of any

breach thereto, I shall be liable to be penalized for the same which may include

expulsion from the University.</p>

								</td>

							</tr>

                            <tr>

                                <tr>

								<td>

									<ul style="list-style: none;padding-left:10px">

										<li  style="float:left">

										<!-- <img src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>" width="100px" height="50px"  style="float:left; margin: -35px 18px -90px 22px;" alt="sigen" /> -->

										<img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$exam_setup->signature)?>">   
			    						<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;text-align:center;"><?=$exam_setup->dispalay_signature;?></p>				
                                    <!--<span style="">Controller of Examination</span></li>-->
										</li>

									<!-- <li style="float:right"> 
										<span style="">Signature of Student</span>
									</li> -->

								<li style="float: right">
									<img style="visibility:hidden;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$exam_setup->signature)?>">  
									<p style="margin-right:15px;font-weight: 600;">Signature of Student</p>
								</li>

									</ul>

								 

									

                                </td>

								 

                            </tr>

                         

                        </table>

                    </div>

                </div>

            </div>



    <?php }  ?>

           

	</body>

</html>


<?php 
}else{
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Hallticket Details</h4>
                  <p class="card-description">
                    Please enter exam details
                  </p>
					<form class="forms-sample" name="paper_form" id="paper_form" method="get" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputUsername1">Exam Month*</label>  
							<div class="error" id="relation_error"></div>
							<input type="text" class="form-control" id="exam_month" name="exam_month" value="">
						</div> 
						<div class="form-group">
							<label for="exampleInputUsername1">Exam Year*</label>  
							<div class="error" id="relation_error"></div>
							<input type="text" class="form-control" id="exam_year" name="exam_year" value="">
						</div> 
						<div class="form-group">
							<label for="exampleInputUsername1">Year/Sem*</label>  
							<div class="error" id="relation_error"></div>
							<input type="text" class="form-control" id="year_sem" name="year_sem" value="">
						</div> 
						  
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
             
          </div>
        </div>
      
<?php include('footer.php');
}
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#paper_form').validate({
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			subject: {
				required: true,
			},
			session: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_sem: {
				required: true,
			},
			<?php if(!empty($single) && $single->file !=""){  }else{ ?>
			file: {
				required: true,
			},
			<?php  } ?>
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			subject: {
				required: "Please select subject",
			},
			session: {
				required: "Please select session",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_sem: {
				required: "Please select year sem",
			},
			file: {
				required: "Please select file to upload",
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

$("#course").change(function(){
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$("#course_mode").html("<option value=''>Select Course Mode</option>");
	  $.ajax({
		  type: "post",
		  url: "<?=base_url();?>admin/Ajax_controller/get_stream_name_course",
		  data:{'course':$("#course").val()},
		  success: function(data){    
			  console.log(data);
			  $('#stream').empty(); 
			  $('#stream').append('<option value="">Select Stream</option>');
			  var opts = $.parseJSON(data);
			  $.each(opts, function(i, d) {
				  $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			  });
			  $('#stream').trigger("chosen:updated");
		  },
		  error: function(jqXHR, textStatus, errorThrown) { 
			  console.log(textStatus, errorThrown);
		  }
	  });	
  });


  $("#stream").change(function(){
     $("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$("#course_mode").html("<option value=''>Select Course Mode</option>");
	 $.ajax({
		 type: "post",
		 url: "<?=base_url();?>admin/Ajax_controller/get_subject_name_stream",
		 data:{'stream':$("#stream").val()},
		 success: function(data){    
			 console.log(data);
			 $('#subject').empty(); 
			 $('#subject').append('<option value="">Select Subject</option>');
			 var opts = $.parseJSON(data);
			 $.each(opts, function(i, d) {
				 $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			 });
			 $('#subject').trigger("chosen:updated");
		 },
		 error: function(jqXHR, textStatus, errorThrown) { 
			 console.log(textStatus, errorThrown);
		 }
	 });

	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_course_mode",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#course_mode").html(data); 
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});		 
 });
 
 $("#course_mode").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'course_mode':$("#course_mode").val()},
		success: function(data){
			$("#year_sem").html(data);
			$.ajax({
				type: "POST",
				url: "<?=base_url();?>web/Web_controller/get_course_stream_fees",
				data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
				success: function(data){
					data =  data.split("@@@");
					$("#late_fees").val(data[1]);
					$("#admission_fees").val(data[0]);
					$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1]));
					late_cal();
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});


$(document).ready(function() { 
	var oldExportAction = function (self, e, dt, button, config) {
        if (button[0].className.indexOf('buttons-excel') >= 0) {
            if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
            }
            else {
                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            }
        } else if (button[0].className.indexOf('buttons-print') >= 0) {
            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
        }
    };
    
    var newExportAction = function (e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
    
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
    
            dt.one('preDraw', function (e, settings) {
                // Call the original action function 
                oldExportAction(self, e, dt, button, config);
    
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
    
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
    
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
    
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };
	
	var table = $('#example').DataTable({
	    "lengthChange": false,
		"processing": true,
		"serverSide": true,
		"responsive": true,
		"cache": false,
		"order": [[0, "desc" ]],
		buttons:[
			
			{
				extend: "excelHtml5",
				title: 'Paper List Excel -THE GLOBAL UNIVERSITY',
				messageBottom: 'The information in this table is copyright to The Global University.',
				exportOptions: {
                    columns: [0,1,2,3],
                    modifier: {
						search: 'applied',
						order: 'applied'
					},
                },
                action: newExportAction,
			}
		],
		dom:"Bfrtip",
		
		"ajax":{
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_paper_ajax",
			"type": "POST",
			
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	
</script>
 