<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Document Verification & Mailing for the <?php if(!empty($single)){ echo $single->student_name;}?> <?php if(!empty($single)){ echo $single->enrollment_number;}?></h4>
                  <p class="card-description">
                    Please enter details
                  </p>
					<form class="forms-sample" name="paper_form" id="paper_form" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Name of Department <span class="req">*</span></label>
									<input class="form-control" type="text" name="name_of_department" id="name_of_department" value="<?php if(!empty($single)){ echo $single->name_of_department;}?>">
									<input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mail Id of The Department <span class="req">*</span></label>
									<input class="form-control" type="text" name="mail_ids" id="mail_ids" value="<?php if(!empty($single)){ echo $single->mail_ids;}?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mail Content<span class="req">*</span></label> 
									<textarea class="form-control" type="text" name="mail_content" id="mail_content"><?php if(!empty($single)){ echo $single->mail_content;}?></textarea> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mail Document <span class="req"></span></label>
									<input class="form-control" type="file" name="document" id="document">
									<input class="form-control" type="hidden" name="old_document" id="old_document" value="<?php if(!empty($single)){ echo $single->document;}?>">
								</div>
							</div>  
							<div class="row container count_loop coating-append-gap" id="appending_div_1"> 
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1"> Document Name </label>
										<input type="text" class="form-control" Placeholder="Other Document" accept="" id="other_document_name" name="other_document_name[]" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1"> Document File  </label>
										<input type="file" class="form-control" accept="" id="other_document_file" name="other_document_file[]"  >
										<input type="hidden" name="old_document" value="<?php if(!empty($student)){ echo $student->other_document;}?>">
									</div>
								</div>
							</div> 
							<div class="appending_div col-md-12 "></div> 
							<div class="col-md-12 p-2">  
								<span id="add_order" class="btn btn-primary p-2 mr-2" style="width:8%;"> Add More </span> 
							</div> 
							<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
							<button type="submit" id="save_btn" name="sendmail" value="sendmail" class="btn btn-primary mr-2" style="width:15%;">Submit & Send Mail</button>
						</div>    
					</form>

					<br><br>
					<?php
					$sr = 1;
					if(!empty($verified_documents)){?>
						<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<td>Sr.No.</td>
									<td>Document Name</td>
									<td>Document View</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
							<?php foreach($verified_documents as $verified_documents_result){?>
								<tr>
									<td><?=$sr++?></td>
									<td><?=$verified_documents_result->document_name?></td>
									<td><a href="<?=$this->Digitalocean_model->get_photo('uploads/document_verification/'.$verified_documents_result->document_file)?>"><i class="fa fa-eye"></i></a></td> 
									<td>
										<a onclick="return confirm('Are you sure, you want to delete this record permanently?')"  title='Permanently Delete' href="<?=base_url()?>delete/<?=$verified_documents_result->id?>/tbl_verification_documents_details" class='btn btn-danger btn-sm delete_class'><i class='mdi mdi-delete'></i></a> 
									</td> 
								</tr>
								
							<?php }?>
							</tbody>
						</table>
					<?php }?>

							
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
			name_of_department: {
				required: true,
			},
			mail_ids: {
				required: true,
				validate_email:true,
			},
			subject: {
				required: true,
			},
			mail_content:{
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
			<?php if(!empty($single) && $single->document !=""){  }else{ ?>
			file: {
				required: true,
			},
			<?php  } ?>
		},
		messages: {
			name_of_department: {
				required: "Please enter name of department",
			},
			mail_ids: {
				required: "Please enter mail id",
				validate_email:"Please enter valid email id",
			},
			subject: {
				required: "Please select subject",
			},
			mail_content:{
				required: "Please enter mail content",
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



$(".hide_delete").hide();
	 var i= $("#initiate").val();
    $("#add_order").click(function(){       	
		var field ='<div class="row" id="appending_div_'+i+'"> <div class="row container count_loop coating-append-gap"> <div class="col-md-6"><div class="form-group"><label for="exampleInputConfirmPassword1"> Document Name </label><input type="text" class="form-control" Placeholder="Other Document" accept="" id="other_document_name" name="other_document_name[]" multiple="multiple"></div>	</div><div class="col-md-6"><div class="form-group"><label for="exampleInputConfirmPassword1"> Document File  </label><input type="file" class="form-control" accept="" id="other_document_file" name="other_document_file[]" multiple="multiple"><input type="hidden" name="old_document" value=""></div></div>  <div class="col-lg-1 dlt-apend "><button class="btn btn-primary"><span class="fa fa-trash remove_margin" id="appending_div"   onclick="minus('+i+')"></span></button></div></div> </div>';
			 $(".appending_div").append(field);
             $(".hide_delete").show();
				i++;

    });

	function minus(obj) {
        
        if (confirm('Do you really want to delete these records?')) { 
        var i  = $('.count_loop').length;       
           
        if(i > 1){
            
            $('#appending_div_'+obj).remove();
            $('#appending_div'+obj).remove();

            $(".alert-delete").show();
            $(".alert-delete").text('Success ✅ Record Deleted Successfully.');
            $(".alert-delete").fadeTo(5000, 500).slideUp(500, function(){
        $(".alert-delete").slideUp(300);
    }); 
            $('.ratexqty').each(function() {
               
        if (!isNaN(this.value) && this.value.length != 0) {
            total += parseFloat(this.value);        
          }
          
        });
        

        } }{}
    }


	$('#example').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: "Document Verify List",
			exportOptions: {
                columns: [0, 1], 
            },
        }
    ],
	});
</script>
 