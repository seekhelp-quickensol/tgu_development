<?php include('header.php');?>
<style>
	.row-btns{
		height:48px !important;
		line-height:25px;
		color:#fff !important;
	}
</style>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Appeared Exam List</h4>

                  <p class="card-description">

                    <!-- All list of Examination -->

                  </p>

				   <form class="mb-3" method="get">

				  <div class="row">

					

					<div class="col-md-3">

						<select name="course" id="course" class="form-control js-example-basic-single select2_single">

							<option value="">Select Course</option>

							<?php if(!empty($course)){ foreach($course as $course_result){?>

							<option value="<?=$course_result->id?>"><?=$course_result->course_name?></option>

							<?php }}?>

						</select>

					</div>

					<div class="col-md-3">

						<select name="stream" id="stream" class="form-control js-example-basic-single select2_single">

							<option value="">Select Stream</option>

						</select>

					</div>

					<div class="col-md-3">

						<select name="year_sem" id="year_sem" class="form-control js-example-basic-single select2_single">

							<option value="">Select Year/Sem</option>

						</select>

					</div>

				   

				  

					<div class="col-md-3">

						<button type="submit" class="btn btn-primary search_button row-btns">Search</button>

					</div>

				  </div>

				  </form>

				   <div class="row">

				   <div class="col-lg-12">

                 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

				<thead>

					<tr>

						<th>Sr. No.</th>

						<th>Student Name</th>

						<th>Enrollment</th>

						<th>Exam Date</th>

						<th>Exam Name</th>

						<th>Course</th>

						<th>Subject</th>

						<th>Score</th>

						 

						<th>Action</th>

					</tr>

				</thead>

				<tbody>

					<?php $sr=1;if(!empty($exam)){ foreach($exam as $exam_result){?>

					<tr>

						<td><?=$sr++?></td>

						<td><?=$exam_result->student_name?></td>

						<td><?=$exam_result->enrollment_number?></td>

						<td><?=$exam_result->exam_date?></td>

						<td><?=$exam_result->exam_name?></td>

						<td><?=$exam_result->course_name?> - <?=$exam_result->stream_name?> - <?=$exam_result->year_sem?></td>

						<td><?=$exam_result->subject_code?> - <?=$exam_result->subject_name?></td>

						<td><?=$exam_result->correct_answer?>/<?=$exam_result->number_of_question?></td>

						<td>

							<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" title='Permanently Delete' href="<?=base_url()?>delete/<?=$exam_result->id?>/tbl_student_exam" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>

						</td>

					</tr>

					<?php }}?>

				</tbody>

			</table>

                </div>

                </div>

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

 <script>   

$("#course").change(function(){  

	if($(this).val() == "23"){

		$("#payment_option").show();

	}else{

		$("#payment_option").hide();

	}

	$("#year_sem").html("<option value=''>Select Year/Sem</option>");

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>web/Web_controller/get_course_stream",

		data:{'course':$("#course").val()},

		success: function(data){

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

$("#stream").change(function(){  

	$("#year_sem").html("<option value=''>Select Year/Sem</option>");

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",

		data:{'course':$("#course").val(),'stream':$("#stream").val()},

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

	$('#example').DataTable({

		// responsive: true,

		//  dom: 'Bfrtip',

		// buttons: [ 

		// 	'excel', 

		// ],

		
            dom: 'Bfrtip',
            responsive: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
             
                buttons: [
                    
                    {
                        extend: 'excel',
                        filename: 'Appeared Exam List',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7] 
                        }
                    },
                    
                    
                ], 
        

		

    }); 

});





</script>

 