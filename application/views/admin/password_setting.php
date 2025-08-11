<?php include('header.php');?>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-6 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Password Setting</h4>

                  <p class="card-description">

                    Please enter Password details

                  </p>

                  <form class="forms-sample" name="password_form" id="password_form" method="post" enctype="multipart/form-data">

                    <div class="form-group">

                      <label for="exampleInputUsername1">Enrollment Password*</label>

                      <input type="text" class="form-control" id="enrollment" name="enrollment" placeholder="Enrollment Password" value="<?php if(!empty($single)){ echo $single->enrollment;}?>">

                    </div>

                    <div class="form-group">

                      <label for="exampleInputUsername1">Degree Password*</label>

                      <input type="text" class="form-control" id="degree" name="degree" placeholder="Degree Password" value="<?php if(!empty($single)){ echo $single->degree;}?>">

                    </div>

                    <div class="form-group">

                      <label for="exampleInputUsername1">Marksheet Password*</label>

                      <input type="text" class="form-control" id="marksheet" name="marksheet" placeholder="Marksheet Password" value="<?php if(!empty($single)){ echo $single->marksheet;}?>">

                    </div>   

                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>

                  </form>

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

	$('#password_form').validate({

		rules: {

			enrollment: {

				required: true,

			},

			degree: {

				required: true,

			},

			marksheet: {

				required: true,

			},

		},

		messages: {

			enrollment: {

				required: "Please enter enrollment password",

			},

			degree: {

				required: "Please enter degree password",

			},

			marksheet: {

				required: "Please enter marksheet password",

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

</script>

 