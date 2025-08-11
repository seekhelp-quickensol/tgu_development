<?php include('header.php');?>

<style>
	.subheader{
		padding: 7px;
		display: block;
		border-bottom:1px solid #ccc;
	}
	#report_form button{
		height:36px !important;
	}
</style>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Report List</h4>

                  <p class="card-description">

                    <!-- All list of Report -->

                  </p>

                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

				<thead>

					<tr> 
						<th>Sr. No.</th> 
						<th>Emp Name</th> 
						<th>Title</th> 
						<th>Date</th> 
						<th>Status</th>  
						<th>Files</th>  
						<th>Remark</th> 
						<th>Action</th>  
					</tr>

				</thead>

				<tbody>

					<?php 

					$i=1;

					if(!empty($report)){ foreach($report as $report_result){

					?>

					<tr class="table_tr">

						<td><?=$i++?></td>

						<td><?=$report_result->first_name.' '.$report_result->last_name?></td>

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

							<a href="<?=$this->Digitalocean_model->get_photo('emp_reporting/'.$exp[$e]);?>">Click to View</a><br>

							<?php }}else{ echo "-";}?>

						</td>

						<td><?=$report_result->remark?></td>

						<td>

							<button class="btn-primary btn btn-sm single_btn"  onclick="return show_details('<?=$report_result->id?>')" data-toggle="modal" data-target="#modalCategory" id="editCategory">View</button>

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

      

	  

<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg" role="document" id="response_form">

		

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

function show_details(id){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_emp_report_details_ajax",
		data:{'id':id},
		success: function(data){
			// alert(data);
			$("#response_form").html(data);
			//$("#modalCategory").show();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	  
}

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

		rules: {

			report_status: {

				required: true,

			}, 
			remark: {
				required: true,
			},

		},

		messages: {

			report_status: {

				required: "Please select report status",

			}, 

			remark: {

				required: "Please enter remark",

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

// 	 'csv'

// 	]

// });  


$('#example').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: "Today Report List",
			exportOptions: {
                columns: [0, 1, 2, 3,4,6], 
            },
        }
    ],
});

</script>

 