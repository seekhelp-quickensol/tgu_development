<?php include('faculty_header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profile Setting</h4>
                  
                  <p class="card-description">
                    Please enter your personal details
                  </p>
                  <form class="forms-sample" name="profile_form" id="profile_form" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputUsername1">First Name *</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php if(!empty($profile)){ echo $profile->first_name;}?>">
                      </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name *</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php if(!empty($profile)){ echo $profile->last_name;}?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Contact Number *</label>
                        <input type="text" readonly class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="<?php if(!empty($profile)){ echo $profile->mobile_number;}?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Alternate Number</label>
                        <input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Alternate Number" value="<?php if(!empty($profile)){ echo $profile->alternate_number;}?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Email *</label>
                        <input type="text" class="form-control" readonly id="email" name="email" placeholder="Email" value="<?php if(!empty($profile)){ echo $profile->email;}?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Address *</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($profile)){ echo $profile->address;}?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Family Contact Number *</label>
                        <input type="text" class="form-control" id="family_contact_number" name="family_contact_number" placeholder="Family Contact Number" value="<?php if(!empty($profile)){ echo $profile->family_contact_number;}?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Adharcard Number *</label>
                        <input type="text" class="form-control" id="adharcard_number" name="adharcard_number" placeholder="Adharcard Number" value="<?php if(!empty($profile)){ echo $profile->adharcard_number;}?>">
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload Adhar File *</label>
                        <input type="file" name="userfile1" class="form-control" id="userfile1">
                        <input type="hidden" name="adhar_file" class="form-control-file" id="adhar_file" value="<?php if(!empty($profile)){ echo $profile->adhar_file; } ?>">
                        <?php if(!empty($profile) && $profile->adhar_file != ""){?>
                         <div class="view_btn">
                          <a  title='view' target='_blank' href="<?php echo base_url('images/faculty_staff/document/'.$profile->adhar_file); ?>">View</a>
                      </div> 
                       <?php }?>  
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload Photo *</label>
                        <input type="file" name="userfile" class="form-control" id="userfile">
                        <input type="hidden" name="photo" class="form-control-file" id="photo" value="<?php if(!empty($profile)){ echo $profile->photo; } ?>">
                         <?php if(!empty($profile) && $profile->photo != ""){?>
                         <div class="view_btn">
                          <a  title='view' target='_blank' href="<?php echo base_url('images/faculty_staff/photo/'.$profile->photo); ?>">View</a>
                      </div>
                      <?php }?> 
                      </div>
                     
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">State *</label>
                          <select class="form-control" name="state" id="state">
                         <option value="">Please select State</option>
                          <?php 
                            if(!empty($state)){foreach ($state as $state_result){?>
                               <option value="<?=$state_result->id;?>" <?php if(!empty($profile) && $profile->state == $state_result->id){?>selected="selected"<?php }?>><?=$state_result->name;?></option>
                            <?php } } ?>
                          
                        </select>
                      </div>
                    </div>
                    <?php $city = $this->Faculty_model->get_selected_city($profile->state);?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">City *</label>
                       <select class="form-control" name="city" id="city">
                        <option value="">Please select City</option>
                         <?php 
                            if(!empty($city)){
                              foreach ($city as $city_result){
                          ?>
                        <option value="<?=$city_result->id?>" 
                          <?php if(!empty($profile) && $profile->city == $city_result->id){?>selected="selected"<?php }?>><?=$city_result->name;?>
                        </option>
                      <?php } } ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Pincode *</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php if(!empty($profile)){ echo $profile->pincode;}?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" id="profile_button" class="btn btn-primary mr-2">Submit</button>
                    </div>
                  </div>

                  </form>
                </div>
              </div>
            </div>
            
<?php include('footer.php');?>
 <script>

    jQuery.validator.addMethod("noHTMLtags", function(value, element){
    if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){
        return false;
    } else {
        return true;
    }
    }, "HTML tags are Not allowed.");

    jQuery.validator.addMethod("validate_email", function(value, element) {
    
  if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
    return true;
  } else {
    return false;
  }
}, "Please enter a valid Email.");

$(document).ready(function () {  
   $('#profile_form').validate({
      rules: {
        first_name: {
           required: true,
        },
        last_name: {
          required: true,
        },
        mobile_number: {
          required: true,
          number:true,
          minlength:10,
          maxlength:12,
        },
        alternate_number: {
          number:true,
          minlength:10,
          maxlength:12,
        },
        email: {
          required:true, 
        },
        address: {
          required:true,
          noHTMLtags:true,
        },
        family_contact_number: {
          required: true,
          number:true,
          minlength:10,
          maxlength:12,
        },
        state: {
          required:true,
          noHTMLtags:true,
        },
        city: {
          required:true,
          noHTMLtags:true,
        },
        pincode: {
          required:true,
          minlength:6,
          maxlength:6,
          noHTMLtags:true,
        },
        adharcard_number: {
          minlength:12,
          maxlength:12,
          required:true,
        },
       
       <?php if($profile->adhar_file == '') {?>
        userfile1 : {
            required:true,
            
        },
       <?php  }?>

       <?php if($profile->photo == '') {?>
        userfile : {
            required:true,
            
        },
        <?php  }?>
       
    },
    messages: {
      first_name: {
        required: "Please enter your first name",
      },
      last_name: {
        required: "Please enter your last name",
      },
      mobile_number: {
        required: "Please enter contact number",
        number: "Please enter valid contact number",
        minlength: "Please enter valid contact number",
        maxlength: "Please enter valid contact number",
      },
      alternate_number: {
        number: "Please enter valid alternate number",
        minlength: "Please enter valid alternate number",
        maxlength: "Please enter valid alternate number",
      },
      address: {
        required: "Please enter address", 
      },
     email: {
        required: "Please enter email", 
      },
      family_contact_number: {
        required: "Please enter family contact number",
        number: "Please enter valid contact number",
        minlength: "Please enter valid contact number",
        maxlength: "Please enter valid contact number",
      }, 
      adharcard_number: {
        required: "Please enter adharcard number",
      },
      state: {
        required: "Please select state",
      },
      city: {
        required: "Please select city",
      },
      pincode: {
        required: "Please enter pincode",
      },
     
      <?php if($profile->adhar_file == '') {?>
        userfile1 : {
            required:"Please Upload adhar pdf",
            
        },
       <?php  }?>

       <?php if($profile->photo == '') {?>
        userfile : {
            required:"Please upload photo",
            
        },
        <?php  }?>
      
     
      
        
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
   $(document).ready(function () {
    $('#state').on('change', function(){
       $.ajax({
        type: "POST",
        url: "<?=base_url();?>/admin/Ajax_controller/get_selected_state_city",
        data:{'state_id':$("#state").val()},
       success: function(data){
        $("#city").empty();
        $('#city').append('<option value="">Select City</option>');
        var opts = $.parseJSON(data);
        $.each(opts, function(i, d) {
           $('#city').append('<option value="'+ d.id + '">' + d.name + '</option>');
        });
        $('#city').trigger('change');
      },
       error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
      }
      }); 
       
    });
    });
 </script>
 