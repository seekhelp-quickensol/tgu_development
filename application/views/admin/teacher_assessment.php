<?php include('header.php');?>

<style>

  /* table  a {

    color: #fff !important;

} */

/* ui-datepicker {

    color: #000000 ;

} */

.datatable_parent tbody td a {

    color: #fbfbfb;

}

</style>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

				  <div class="card">

					<div class="card-body">

					   <h4 class="card-title">Search Record</h4><p class="card-description">

						<div class="col-md-12">

							<form method="get">

							   <div class="row">

									<div class="col-md-3">

										<div class="form-group">

											<label>Session</label>

											<select class="form-control js-example-basic-single select2_single" name="session" id="session" style="color: #454545;"> 

												<option value="">Session</option>

												<?php if(!empty($session)){ foreach($session as $session_result){?>

												<option value="<?=$session_result->id?>" <?php if(isset($_GET['session']) && $_GET['session'] ==$session_result->id){?>selected="selected"<?php }?>><?=$session_result->session_name?></option>

												<?php }}?>

											</select>

										</div>

									</div>

									<div class="col-md-3"> 

										<div class="form-group">

											<label>Month</label>

											<select class="form-control js-example-basic-single select2_single" name="month" id="month" style="color: #454545;"> 

												<option value="">Month</option> 

												<option value="01" <?php if(isset($_GET['month']) && $_GET['month'] == "01"){?> selected="selected" <?php }?>>January</option>

												<option value="02" <?php if(isset($_GET['month']) && $_GET['month'] == "02"){?> selected="selected" <?php }?>>February</option>

												<option value="03" <?php if(isset($_GET['month']) && $_GET['month'] == '03'){?> selected="selected" <?php }?>>March</option>

												<option value="04" <?php if(isset($_GET['month']) && $_GET['month'] == '04'){?> selected="selected" <?php }?>>April</option>

												<option value="05" <?php if(isset($_GET['month']) && $_GET['month'] == '05'){?> selected="selected" <?php }?>>May</option>

												<option value="06" <?php if(isset($_GET['month']) && $_GET['month'] == '06'){?> selected="selected" <?php }?>>June</option>

												<option value="07" <?php if(isset($_GET['month']) && $_GET['month'] == '07'){?> selected="selected" <?php }?>>July</option>

												<option value="08" <?php if(isset($_GET['month']) && $_GET['month'] == '08'){?> selected="selected" <?php }?>>August</option>

												<option value="09" <?php if(isset($_GET['month']) && $_GET['month'] == '09'){?> selected="selected" <?php }?>>September</option>

												<option value="10" <?php if(isset($_GET['month']) && $_GET['month'] == '10'){?> selected="selected" <?php }?>>October</option>

												<option value="11" <?php if(isset($_GET['month']) && $_GET['month'] == '11'){?> selected="selected" <?php }?>>November</option>

												<option value="12" <?php if(isset($_GET['month']) && $_GET['month'] == '12'){?> selected="selected" <?php }?>>December</option>

											</select>

										</div>

									</div> 

									<div class="col-md-3">

											<div class="form-group"> 

											<label>Year</label>

											<select class="form-control js-example-basic-single select2_single" name="year" id="year" style="color: #454545;"> 

												<option value="">Year</option>

												<?php for($i="2020";$i<=date("Y");$i++){?>

												<option value="<?=$i?>" <?php if(isset($_GET['year']) && $_GET['year'] == $i){?> selected="selected" <?php }?>><?=$i?></option>

												<?php }?>

											</select>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Enrollment Number</label>

											<input type="text" placeholder="Enrollment Number" autocomplete="off" class="form-control" name="enrollment_number" id="enrollment_number" value="<?php if(isset($_GET['enrollment_number'])){ echo $_GET['enrollment_number'];}?>" style="color: #454545;"> 

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Name</label>

											<input type="text" placeholder="Name" autocomplete="off" class="form-control" name="name" id="name" value="<?php if(isset($_GET['name'])){ echo $_GET['name'];}?>" style="color: #454545;"> 

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Start Date</label>

											<input type="text" placeholder="Start Date" autocomplete="off" class="form-control datepicker" name="start_date" id="start_date" value="<?php if(isset($_GET['start_date'])){ echo $_GET['start_date'];}?>" style="color: #454545;"> 

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>End Date</label>

											<input type="text" placeholder="End Date" autocomplete="off" class="form-control datepicker" name="end_date" id="end_date" value="<?php if(isset($_GET['end_date'])){ echo $_GET['end_date'];}?>" style="color: #454545;"> 

										</div>

									</div>

									<div class="col-md-12">

										<button class="btn btn-primary search_button" type="submit" name="search" value="Search">Search</button> 
                                        <a href="<?=base_url();?>teacher_assessment" class="btn btn-danger">Reset</a>
									</div> 

							   </div>

						   </form>

						  

						  </div>

					</div>

				</div>		

				</div>		

			</div>	

             

           

	<div class="col-md-12 grid-margin stretch-card p-0">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Teacher Assements</h4><p class="card-description">

                 <!-- <p class="card-description">

                    All list of Teacher details 

                  </p>  -->

					<div class="clearfix"></div><br>

					<table id="student_table" style="width:100%" class="table table_account table-striped datatable_parent">

						<thead class="">

							<!-- <h4 class="statement_title title_padding">Teacher Assessment </h4> -->

							 

							<tr class="">

								<th>Sr No</th>

								<th>Center Name</th> 
								
								<th>Mode</th>

								<th>Year/Sem</th> 

								<th> Student Name</th>

								<th> Date</th>

								<th> File </th>

								<!-- <th> Updated By </th> -->

                                <th>Action</th>

                                <th>Reject</th>

							</tr>



							 

						</thead>

						<tbody>

                <?php 

             if(!empty($teacher_assement)){

                $i=1;

                foreach($teacher_assement as $teacher_assement_result){

					if($teacher_assement_result->file !=""){

                   ?>

                <tr>

                    <td class="center"><?=$i?></td>



                    <td><?=$teacher_assement_result->center_name?></td>
                    
                    <?php if($teacher_assement_result->course_mode == '1'){?>
					    <td>Year</td>
					<?php }else if($teacher_assement_result->course_mode == '2'){?>
					    <td>Sem</td>
				    <?php }else{?>
				        <td>-</td>
				    <?php }?>

                    <td><?=$teacher_assement_result->year_sem?></td>

                    <td><?=$teacher_assement_result->student_name?></td>

                    <td><?=date("d-m-Y",strtotime($teacher_assement_result->created_on))?></td>

                  

                    <td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/teacher_assement/'.$teacher_assement_result->file)?>" target="_blank" class="btn btn-primary">View</a>

                    </td>

					<!-- <td><?=$teacher_assement_result->first_name?> <?=$teacher_assement_result->last_name?></td> -->

                    <td>    

                    <a href="<?=base_url()?>approve_assesment/<?=$teacher_assement_result->id?>/tbl_teacher_assesments" onclick="return confirm('Do You Want To Approve This Assesment File?');" class="btn btn-primary">Approve</a>

                    </td>   

                    <td> 

                    <form name="rejection_remark_teacher_form" id="rejection_remark_teacher_form" method="post">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark_teacher" name="rejection_remark_teacher" width="100"></textarea>

                                            <input type="hidden" name="teacher_id" value="<?=$teacher_assement_result->id?>">

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                    <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                        <button type="submit" name="reject_teacher" value="reject_teacher" class="btn btn-primary">Reject</button>

                            </div>

                                    </div>

                                </div>                                

                                </div>

                                

                                </form>

                            </td>

                    



                </tr>

			 <?php $i++; }} }else{ ?>

                <tr>

                    <td class="text-center" colspan="9">No Data Available</td>

                </tr>

                <?php } ?>

               

            </tbody>

        </table>

</div>

</div>

</div>

 

</div>





 

</div>







 

</div>





<section>

</section>

<?php include('footer.php');

$id = 0;

if($this->uri->segment(2) !=""){

	$id = $this->uri->segment(2);

}

?>

<script

    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>



<script>

$(document).ready(function() {



$("#rejection_remark_form").validate({

    rules: {

        rejection_remark: {

            required: true,

        },    

    },

    messages: {

        rejection_remark: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#new_form").validate({

    rules: {

        abc: {

            required: true,

        },    

    },

    messages: {

        abc: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#rejection_remark_teacher_form").validate({

    rules: {

        rejection   _remark_teacher: {

            required: true,

        },    

    },

    messages: {

        rejection_remark_teacher: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#rejection_remark_assignment_form").validate({

    rules: {

        rejection_remark_assignment: {

            required: true,

        },    

    },

    messages: {

        rejection_remark_assignment: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#rejection_remark_form_industy").validate({

    rules: {

        rejection_remark_industry: {

            required: true,

        },    

    },

    messages: {

        rejection_remark_industry: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#rejection_remark_form_guardian").validate({

    rules: {

        rejection_remark_guardian: {

            required: true,

        },    

    },

    messages: {

        rejection_remark_guardian: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});

});

</script>



<script>

    $(document).ready(function () {



        var table = $('#student_table').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [
                {

                    extend: "excelHtml5",

                    title: 'Data in Table Format (Student)',

					filename: 'Teacher Assessment List',

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                           
                            6

                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",



            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

</script>

<script>

	function openCity(evt, cityName) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {

        tabcontent[i].style.display = "none";}

        

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {

        tablinks[i].className = tablinks[i].className.replace("active", "");}



document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += " active";}

$( function() {

	$( ".datepicker" ).datepicker({

		dateFormat:"dd-mm-yy",

		changeMonth:true,

		changeYear:true,

		/*maxDate: "-12Y",

		minDate: "-80Y",

		yearRange: "-100:-0"*/

	});

} );

</script>

