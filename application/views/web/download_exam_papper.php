<?php include("header.php");?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<style>
	
</style>
<div class="header_cc_area" style="background-image:url('images/header_area.jpg')">
				<div class="container">
					<div class="row">
						<h1>Examination Pappers</h1>
						<p>Examination / Examination Pappers</p>
					</div>
				</div>
			</div>
<div class="uni_mainWrapper">
	<div class="container">
		<div class="row">	
			<div class="container">
				
                <?php if(empty($this->session->userdata("examination_papper_download_verification"))): ?>


                    <div class="online_wrapper">
					 
                     <div class="main_div">
                         <div class="col-md-12">
                             <form method="post" name="form_verification" id="form_verification" >
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="personal_details">
                                             <h3>Download Examination Papper</h3>
                                             <small>Please Enter ID and Password</small>
                                             <hr>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row edu">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label>Enter ID<span class="req">*</span></label>
                                             <input type="text" name="id" id="enrollment_number" required class="form-control" placeholder="Enter id here.">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row edu">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label>Enter Password<span class="req">*</span></label>
                                             <input type="password"  name="password" id="date_of_birth" required class="form-control " placeholder="Enter password here.">
                                         </div>
                                     </div>
                                 </div>
                                 
                                 <div class="row">
                                     <div class="col-md-12 edu">
                                         <div class="form-group">
                                             <label></label>
                                             <button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Submit</button>
                                             <div class="pull-right">
                                             </div>
                                         </div>
                                     </div>	
                                 </div> 
                             </form>
                         </div>
                         <div class="clearfix"></div>
                     </div>
                         
                      
                 </div>


                <?php else: ?>
                



                    <?php if(!empty($all_pappers)): ?>
                        <table id="example" class="table table-striped table-bordered" style="width:100%; margin-top:20px">
        <thead>
            <tr>
                <th>Course</th>
                <th>Stream</th>
                <th>Year / Sem</th>
                <th>Subject Code </th>
                <th>Subject</th>
                <th>Examination Papper</th>
            </tr>
        </thead>
        <tbody>
            
           <?php foreach($all_pappers as $papper): ?>
           <tr>
           <td><?=$papper->course_name;?></td>
           <td><?=$papper->stream_name; ?></td>
           <td><?=$papper->year_sem; ?></td>
           <td><?=$papper->subject_code;?></td>
           <td><?=$papper->subject_name?></td>
           <td> <a href="<?=base_url("back_panel/exam_papper/").$papper->file;?>" class="btn btn-success" download>Download Papper</a> </td>
           </tr>
           <?php endforeach;  ?>
         
        </tbody>
        
    </table>
    <?php else: ?>
    <h2 style="text-align: center;">No Data Available.</h2>
    <?php endif; ?>
                <?php endif; ?>
			
            </div>
		</div>
	</div>
</div>
 

<?php include("footer.php");?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>    
jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#form_verification').validate({
	rules: {
		enrollment_number: {
			required: true,
		},
		date_of_birth: {
			required: true,
		},
	},
	messages: {
		enrollment_number: {
			required: "Please enter your enrollment number",
		},
		date_of_birth: {
			required: "Please enter select date of birth",
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
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate: "-18Y",
		minDate: "-80Y",
		yearRange: "-100:-0"
	});
} ); 
  

    $('#example').DataTable();

</script>