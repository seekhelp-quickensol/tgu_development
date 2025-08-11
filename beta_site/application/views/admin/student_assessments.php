<?php include('header.php');?>

<style>

  table  a {

    color: #fff !important;

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

                <form method="get" name="search_assessment" id="search_assessment">

                   <div class="row">
                            <div class="col-md-3">
                            <div class="form-group">
                                <label>Assessment</label>
                                <select class="form-control js-example-basic-single select2_single" name="assessment_name" id="assessment_name" style="color: #454545;"> 
                                    <option value="">Select Assessment</option> 
                                    <option value="0" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == "0"){?> selected="selected" <?php }?>>Student Assessment</option>
                                    <option value="1" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == "1"){?> selected="selected" <?php }?>>Teacher Assessment</option>
                                    <option value="2" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == '2'){?> selected="selected" <?php }?>>Student Assignment</option>
                                    <option value="3" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == '3'){?> selected="selected" <?php }?>>Industry Assessment</option>
                                    <option value="4" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == '4'){?> selected="selected" <?php }?>>Parent Assessment</option>

                                </select>
                            </div>
                        </div> 

                        <div class="col-md-12">
                            <button class="btn btn-primary search_button" type="submit" name="search"  value="Search">Search</button> 
                            <a href="<?=base_url();?>student_assessments/" class="btn btn-danger">Reset</a>
                        </div> 

                   </div>

               </form>

              

              </div>

        </div>

    </div>		

    </div>		

</div>	
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Assessment</h4><p class="card-description">
					<table  style="width:100%" id="example" class="table table_account table-striped datatable_parent">

					<thead class="">
						<tr class="">

							<th >Sr No</th>

							<th>Center Name</th> 

							<th>Year/Sem</th> 

							<th> Student Name</th>

                            <th> Assignment Title</th>
                            
							<th>Date</th>

							<th> File </th>

							<th> Updated By </th>

							<th> Updated On </th>

                            <th>Action</th>

                            <th>Reject</th>

						</tr>

					</thead>

					<tbody>
						<?php 
                        // echo "<pre>";print_r($self_assement);exit;
                        
					 if(!empty($self_assement)){
						$i=1;
						foreach($self_assement as $self_assement){

							if($self_assement->file !=""){
                        ?>
						<tr>
                           <!-- <?= print_r($self_assement);?> -->
							<td class="center"><?=$i?></td>

							<td><?=$self_assement->center_name?></td>

							<td><?=$self_assement->year_sem?></td>

							<td><?=$self_assement->student_name?></td>
                            <td><?=isset($self_assement->assignment_title) ? $self_assement->assignment_title : '-' ?></td>
							<td><?=date("d-m-Y",strtotime($self_assement->created_on))?></td>
							<td>
                                <?php if($_GET['assessment_name'] == "0"){ ?>
                                    
                                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/self_assement/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                                <?php }else if($_GET['assessment_name'] == "1"){?>
                                   
                                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/teacher_assement/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                                <?php }else if($_GET['assessment_name'] == "2"){?>
                                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/assignment/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                                <?php }else if($_GET['assessment_name'] == "3"){?>
                                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/industry_assesment/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                                <?php }else if($_GET['assessment_name'] == "4"){?>
                                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/industry_assesment/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                                <?php }?>    
                            
                            <!-- <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/self_assement/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td> -->
							<td><?=$self_assement->first_name?> <?=$self_assement->last_name?></td>
							<td><?=date("d-m-Y",strtotime($self_assement->updated_on))?></td>
                            <td>
                                <?php if($_GET['assessment_name'] == "0"){ ?>                                  
                                    <a href="<?=base_url()?>approve_assesment/<?=$self_assement->id?>/tbl_self_assesments" onclick="return confirm('Do You Want To Approve This Assessment File?');" class="btn btn-primary">Approve</a>
                                <?php }else if($_GET['assessment_name'] == "1"){?>
                                    <a href="<?=base_url()?>approve_assesment/<?=$self_assement->id?>/tbl_teacher_assesments" onclick="return confirm('Do You Want To Approve This Assessment File?');" class="btn btn-primary">Approve</a>
                                <?php }else if($_GET['assessment_name'] == "2"){?>
                                    <a href="<?=base_url()?>approve_assesment/<?=$self_assement->id?>/tbl_assignment" onclick="return confirm('Do You Want To Approve This Assessment File?');" class="btn btn-primary">Approve</a>
                                <?php }else if($_GET['assessment_name'] == "3"){?>
                                    <a href="<?=base_url()?>approve_assesment/<?=$self_assement->id?>/tbl_industry_assesment" onclick="return confirm('Do You Want To Approve This Assessment File?');" class="btn btn-primary">Approve</a>
                                <?php }else if($_GET['assessment_name'] == "4"){?>
                                    <a href="<?=base_url()?>approve_assesment/<?=$self_assement->id?>/tbl_guardian_assesment" onclick="return confirm('Do You Want To Approve This Assessment File?');" class="btn btn-primary">Approve</a>
                                <?php }?>
                                <!-- <a href="<?=base_url()?>approve_assesment/<?=$self_assement->id?>/tbl_self_assesments" onclick="return confirm('Do You Want To Approve This Assessment File?');" class="btn btn-primary">Approve</a> -->
                            </td>
                            <td>
                                <?php if($_GET['assessment_name'] == "0"){ ?>
                                    <!-- <?=$self_assement->id?> -->
                                    <form method="post" name="rejection_remark_form" id="rejection_remark_form" action="<?=base_url()?>student_assessments/<?=$self_assement->id?>/tbl_self_assesments">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">

                                                <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark" name="rejection_remark" width="100"></textarea>
                                                <input type="hidden" name="id" value="<?=$self_assement->id?>">
                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                        <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                            <button type="submit" name="reject" value="reject" class="btn btn-primary" onclick="return confirm('Do You Want To Reject This Assesment?');">Reject</button>

                                        </div>

                                            </div>

                                        </div>                                

                                        </div>

                                    </form>
                                <?php }else if($_GET['assessment_name'] == "1"){?>
                                    <form method="post" name="rejection_remark_form" id="rejection_remark_form" action="<?=base_url()?>student_assessments/<?=$self_assement->id?>/tbl_teacher_assesments">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">

                                                <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark" name="rejection_remark" width="100"></textarea>
                                                <input type="hidden" name="id" value="<?=$self_assement->id?>">
                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                        <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                            <button type="submit" name="reject" value="reject" class="btn btn-primary" onclick="return confirm('Do You Want To Reject This Assesment?');">Reject</button>

                                        </div>

                                            </div>

                                        </div>                                

                                        </div>

                                    </form>
                                <?php }else if($_GET['assessment_name'] == "2"){?>
                                    <form name="rejection_remark_form" id="rejection_remark_form" action="<?base_url()?>student_assessments/<?=$self_assement->id?>/tbl_assignment">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">

                                                <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark" name="rejection_remark" width="100"></textarea>
                                                <input type="hidden" name="id" value="<?=$self_assement->id?>">
                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                        <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                            <button type="submit" name="reject" value="reject" class="btn btn-primary" onclick="return confirm('Do You Want To Reject This Assesment?');">Reject</button>

                                        </div>

                                            </div>

                                        </div>                                

                                        </div>

                                    </form>
                                <?php }else if($_GET['assessment_name'] == "3"){?>
                                    <form name="rejection_remark_form" id="rejection_remark_form" action="<?base_url()?>student_assessments/<?=$self_assement->id?>/tbl_industry_assesment">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark" name="rejection_remark" width="100"></textarea>
                                                <input type="hidden" name="id" value="<?=$self_assement->id?>">
                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                        <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                            <button type="submit" name="reject" value="reject" class="btn btn-primary" onclick="return confirm('Do You Want To Reject This Assesment?');">Reject</button>

                                        </div>

                                            </div>

                                        </div>                                

                                        </div>

                                    </form>

                                <?php }else if($_GET['assessment_name'] == "4"){?>
                                    <form name="rejection_remark_form" id="rejection_remark_form" action="<?base_url()?>student_assessments/<?=$self_assement->id?>/tbl_guardian_assesment">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark" name="rejection_remark" width="100"></textarea>
                                                <input type="hidden" name="id" value="<?=$self_assement->id?>">
                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                        <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                            <button type="submit" name="reject" value="reject" class="btn btn-primary" onclick="return confirm('Do You Want To Reject This Assesment?');">Reject</button>

                                        </div>

                                            </div>

                                        </div>                                

                                        </div>

                                    </form>
                                <?php }?>




                                <!-- <form name="rejection_remark_form" id="rejection_remark_form" action="<?base_url()?>reject_assesment/<?=$self_assement->id?>/tbl_self_assesments">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark" name="rejection_remark" width="100"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                    <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                        <button type="submit" class="btn btn-primary">Reject</button>

                                    </div>

                                        </div>

                                    </div>                                

                                    </div>

                                </form> -->

                            </td>
						</tr>

						<?php $i++; }}} else{ ?>

						<tr>

							<td class="text-center" colspan="11">No Data Available</td>

						</tr>

						<?php } ?>

					   

					</tbody>

				</table>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>

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



$("#rejection_remark_teacher_form").validate({

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



$("#rejection_remark_assignment_form").validate({

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



$("#rejection_remark_form_industy").validate({

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



$("#rejection_remark_form_guardian").validate({

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

});

</script>

<script>

    $(document).ready(function () {

        var table = $('#example').DataTable({

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

                    //title: 'Data in Table Format (Center)',
                    title:"Approved Self Assessment Student List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [
                            0, 1, 2, 3, 4, 6, 7
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

                    // title: 'Data in Table Format (Student)',
                    title:"Approved Teacher Assessment List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                           
                            6,

                            7


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

    $(document).ready(function () {

        var table = $('#separate_student_table').DataTable({

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

                    // title: 'Data in Table Format (Seperate Student)',
                    title:"Approved Student Assignment List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                         5,
                           
                            7,8
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

	 $(document).ready(function () {

        var table = $('#industry_assmsnet').DataTable({

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

                    // title: 'Data in Table Format (Seperate Student)',
                    title:"Approved Industry Assesment List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                            5,

                            

                            7,

                            8

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

	 $(document).ready(function () {

        var table = $('#guardian_assement').DataTable({

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

                    // title: 'Data in Table Format (Seperate Student)',
                    title:"Approved Guardian Assesment List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                           
                            6,

                            7


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

