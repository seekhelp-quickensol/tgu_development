<?php 
// echo "<pre>";print_r($single);exit;
include('header.php');?>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-6 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Reporting Management</h4>

                  <p class="card-description">

                    Please enter Reporting Management details

                  </p>

                  <form class="forms-sample" name="report_form" id="report_form" method="post" enctype="multipart/form-data">

                    <div class="form-group">

                      <label for="exampleInputUsername1">Title *</label>

                      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php if(!empty($single)){ echo $single->title;}?>">

					  <div class="error" id="session_error"></div>

                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">

                    </div>

                    <div class="form-group">

                      <label for="exampleInputUsername1">Report*</label>

                      <textarea class="form-control" id="report" name="report" placeholder="Please describe your reporting" value="<?php if(!empty($single)){ echo $single->report;}?>"></textarea>

					</div>

                    <div class="form-group">

                      <label for="exampleInputUsername1">Files <small>(if any you can upload multiple files)</small></label>

					  <?php if(!empty($single) && $single->files != ""){
						
							$files = explode(',',$single->files);

							// echo "<pre>";print_r($files);exit;

							for($i = 0; $i < count($files)-1; $i++){

							?>
							<span>
								<a href="<?=$this->Digitalocean_model->get_photo('emp_reporting/'.$files[$i])?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>
							</span>

					<?php }}?>
                      <input type="file" class="form-control" id="userfile" name="userfile[]" multiple>

					</div> 

                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>

                  </form>

                </div>

              </div>

            </div>

            <div class="col-md-6 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Report List</h4>

                  <p class="card-description">

                    All list of Report

                  </p>

               
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">


				<thead>

					<tr>
						<th>Sr. No.</th>

						<th>Title</th>

						<th>Date</th>

						<th>Status</th> 

						<th>Files</th> 

						<th>Action</th> 

						<!-- <th style="display:none">Report</th> 

						<th style="display:none">Remark</th>  -->

					</tr>

				</thead>

				<tbody>

					<?php 

					$i=1;

					if(!empty($report)){ foreach($report as $report_result){

					?>

					<tr class="table_tr" id="<?= $report_result->id ?>">

						<td><?=$i++?></td>

						<td><?=$report_result->title?></td>

						<td><?=date("d/m/Y",strtotime($report_result->report_date))?></td>

						<td>

							<?php 

								if($report_result->report_status == "0"){ ?>

								<span style="color:blue">Pending<span> 

							<?php }else if($report_result->report_status == "1"){ ?>

									<span style="color:green">Approved</span> 

							<?php }else{ ?>

									<span style="color:red">Rejected</span>

							<?php 

							}

							?>

						</td> 

						<td>

							<?php 

							$exp = explode(",",$report_result->files);

							if($report_result->files != "" && !empty($exp)){

								for($e=0;$e<count($exp)-1;$e++){

							?>

							<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('emp_reporting/'.$exp[$e]);?>">Click to View</a><br>

							<?php }}else{ echo "-";}?>

						</td>

						<td>
							
							<button class="btn-primary btn btn-sm single_btn" data-toggle="modal" data-target="#modalCategory_<?=$report_result->id;?>" id="editCategory">View</button>

							<!-- <a type="button" title="Edit" data-toggle="tooltip" href="<?=base_url()?>create_my_report/<?=$report_result->id?>"  class="btn btn-success btn-sm"><i class="mdi mdi-table-edit"></i></a> -->

							<a class="btn btn-success" href="<?=base_url()?>create_my_report/<?=$report_result->id?>">Edit</a> 

						</td>

						<!-- <td style="display:none;">

							<?=$report_result->report?>

						</td>

						<td style="display:none;">

							<?=$report_result->remark?>

						</td>	 -->

					</tr>

					<div class="modal fade" id="modalCategory_<?=$report_result->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_<?=$report_result->id;?>" aria-hidden="true">

						<div class="modal-dialog modal-sm" role="document">

							<form role="form" method="POST" action="php/add_category.php">

								<div class="modal-content">

									<div class="modal-header">

										<h5 class="modal-title" id="exampleModalLabel_<?=$report_result->id;?>">Report</h5>

										<button type="button" class="close" data-dismiss="modal" aria-label="Close">

										<span aria-hidden="true">&times;</span>

										</button>

									</div>

									<div class="modal-body">

										<div class="form-group">

											<strong>Report:</strong><br>

											<p id="report_details_value"><?=$report_result->report;?></p> 

											<hr>

											<strong>Remark:</strong><br>

											<p id="remark_view"><?=$report_result->remark;?></p>

											<hr>

											<strong>Files:</strong><br>

											<p id="files_view"><?=$report_result->files;?></p>

										</div>

									</div>
									<div class="modal-footer">

										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

									</div>

								</div>

							</form>

						</div>

						</div>

					<?php }}?>

				</tbody>

			</table>

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/tinymce.min.js"></script>

<script>

// $(".table_tr").click(function(){

// 	$(this).each(function(i, row){
// 		// console.log('yes');

// 		var $row = $(row); 

// 		var files = $row.find('td:nth-child(5)').text();

// 		var report = $row.find('td:nth-child(7)').text();
	
// 		var remark = $row.find('td:nth-child(8)').text();

// 		$('#report_details_value').html(report);
// 		$('#remark_view').html(remark);
// 		$('#files_view').html(files);

// 	});   

// });


tinymce.init({

	selector: "textarea#report",

	theme: "modern",

	height: 250,

	plugins: [

		 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

		 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

		 "save table contextmenu directionality emoticons template paste textcolor"

   ],

   content_css: "css/content.css",

   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 

    font_formats: "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Oswald=oswald; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",

  content_style: "@import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500&display=swap'); body { font-family: 'Barlow', sans-serif;font-size:15px }.small7{font-size:7px}.small8{font-size:8px}.small9{font-size:9px}.small95{font-size:9.5px}.small10{font-size:10px}.small105{font-size:10.5px}.small11{font-size:11px}.small12{font-size:12px}.small13{font-size:13px}.small14{font-size:14px}.small15{font-size:15px}.small16{font-size:16px}.small16{font-size:16px}.small17{font-size:17px}.small18{font-size:18px}.small19{font-size:19px}.small20{font-size:20px}",

   style_formats: [

	

		{title: '9.5', inline: 'span', classes: 'small95'},

		{title: '10', inline: 'span', classes: 'small10'},

		{title: '10.5', inline: 'span', classes: 'small105'},

		{title: '11', inline: 'span', classes: 'small11'},

		{title: '12', inline: 'span', classes: 'small12'},

		{title: '13', inline: 'span', classes: 'small13'},

		{title: '14', inline: 'span', classes: 'small14'},

		{title: '15', inline: 'span', classes: 'small15'},

		{title: '16', inline: 'span', classes: 'small16'},

		{title: '17', inline: 'span', classes: 'small17'},

		{title: '18', inline: 'span', classes: 'small18'},

		{title: '19', inline: 'span', classes: 'small19'},

		{title: '20', inline: 'span', classes: 'small20'},

	

	]

}); 



 $(document).ready(function () {		

	jQuery.validator.addMethod("validate_email", function(value, element) {

		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

			return true;

		}else {

			return false;

		}

	}, "Please enter a valid Email.");	

	$('#report_form').validate({
		ignore: ":hidden:not(#report),.note-editable.panel-body",

		rules: {

			title: {

				required: true,

			}, 
			report:{
				required: true,
			}
			
		},

		messages: {

			title: {

				required: "Please enter title",

			}, 
			
			report:{
				required: "Please describe report",
			}
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




	$('#report_form').validate({

		rules: {

			title: {

				required: true,

			}, 
			
		},

		messages: {

			title: {

				required: "Please enter title",

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

// $('#example').DataTable({

// 	dom: 'Bfrtip',
	
// 	buttons: [
// 	 'excel' 

// 	]

// });  

   
$('#example').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: "Report Management List",
			exportOptions: {
                columns: [0, 1, 2, 3], 
            },
        }
    ],
});



</script>

 