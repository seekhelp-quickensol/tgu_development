<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Re-registration form</h4>
                  <p class="card-description">
                
                  </p>
                  <form class="forms-sample" name="bank_form" id="bank_form" method="post" >
				  <div class="row">


				  
					 
				<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Student Name *</label>
                      <input type="text" class="form-control discount" value="<?php if(!empty($student)){ echo $student->student_name;}?>" readonly>
                      <input type="hidden" name="separate_student_id" value="<?php if(!empty($student)){ echo $student->id;}?>">

                     
					 </div>
				</div>

				<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Year/Sem *</label>

                      <select name="year_sem"  id="year_sem" class="form-control">
                      	<option value="">select year/sem</option>
                      	<option value="1">1</option>

                      	<option value="2">2</option>
                      	<option value="3">3</option>
                      	<option value="4">4</option>
                      	<option value="5">5</option>
                      	<option value="6">6</option>
                      	<option value="7">7</option>
                      	<option value="8">8</option>
                      	<option value="9">9</option>
                      	<option value="10">10</option>
                      	<option value="11">11</option>
                      	<option value="12">12</option>
                      </select>
					 </div>
				</div>

				



                    <div class="clearfix"></div>
					<div class="col-md-12">
					<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    </div>

                  </form>
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
 $(document).ready(function () {		
	
	$('#bank_form').validate({
		rules: {
			year_sem: {
				required: true,
				
			},
		},
		messages: {
			year_sem:{
				required: "Please select year/sem",
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
});



</script>
 