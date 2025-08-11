<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Gurdeep singh osahan">
      <meta name="author" content="Gurdeep singh osahan">
      <title>Welcome to The Global Univerisity</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="images/fav.svg">
      <!-- Bootstrap core CSS -->
      <link href="<?=base_url();?>front_style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="<?=base_url();?>front_style/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- Material Design Icons -->
      <link href="<?=base_url();?>front_style/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">
      <!-- Slick -->
      <link href="<?=base_url();?>front_style/vendor/slick-master/slick/slick.css" rel="stylesheet" type="text/css">
      <!-- Lightgallery -->
      <link href="<?=base_url();?>front_style/vendor/lightgallery-master/dist/css/lightgallery.min.css" rel="stylesheet">
      <!-- Select2 CSS -->
      <link href="<?=base_url();?>front_style/vendor/select2/css/select2-bootstrap.css" />
      <link href="<?=base_url();?>front_style/vendor/select2/css/select2.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <link href="<?=base_url();?>front_style/css/style.css" rel="stylesheet">
      <link href="<?=base_url('assets/admin/css/animate.css');?>" rel="stylesheet">
   </head>
   <body class="layer_bl login-overlay"  style="background-image:url('<?=base_url();?>images/vr.jpg')">
    
      <!-- Login -->
      <div class="over_lay">
         <div class="container">
             <div class="row">
              <div class="col-lg-8">
                      <div class="box_layer">
                          <h2>Welcome to the forefront of innovation,Where innovation meets opportunity</h2>
                          <p></p>
                          <p>2023 Powered by | The Global University  </p>
                         <!-- <p>Our Examination Portal is designed to make our exam process Easy Steps. It is easy to Access, Convenient, Transparent, Secure, and more in Efficiency
                        </p>
                        <p>Here You can Access Your all information about Admission, ID, syllabus, Online Study, Exam Preparation Material, Exams Forms, Register for exams, exam schedules, exam patterns, exam fees, Take the exam online, Exam Results, Marksheet, and even Customer Support. 
                        </p>
                        <div class="layer_set">
                            <ul>
                                <li>Download Id card & Admission form</li>
                                <li>Access Exam Details </li>
                                <li>E-library-Study Online Material </li>
                                <li>Attend Exam and Get Result </li>
                                <li>Fill Exam Form</li>
                                <li> Get a Degree & Certificates</li>
                            </ul>
                        </div>
                        <div class="cleaffix"></div>
                       -->
                      </div>
                       <!-- <div class="supprot_box"><i class="fa fa-phone" aria-hidden="true"></i> Support: 1800 500 400</div> -->
             </div>
             <div class="col-lg-4">      
            <div class="justify-content-center align-items-center d-flex front-login-details animated fadeInDown">
               <div class="mx-auto">
                 
                  <div class="osahan-login py-4">
                     <div class="text-center mb-4">
                         <a href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/global_university_logo.png" alt=""></a>
                        <h5 class="font-weight-bold mt-3 company_name">The Global University</h5>
                        <p class="text-muted company_caption">Empowering Minds, Transforming Futures</p>
                     </div>
                     <form name="login_form" id="login_form" method="post">
                        <div class="form-group">
                           <label class="mb-1">Username</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-account position-absolute"></i>
                              <input type="text" name="username" id="username" class="form-control">
                           </div>
                        </div>
                        <div class="user_error" id="user_error" style="color:red" ></div>
                        <div class="form-group">
                           <label class="mb-1">Password</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-key-variant position-absolute"></i>
                              <input type="password" name="password" id="password" class="form-control">
                           </div>
                        </div>
                          
                         <span id="recaptch-error" style="color:red"></span>
                      </div> 
                        <button class="btn btn-success btn-block text-uppercase submit-btn" type="submit"> Sign in </button>
                        
                        <div class="py-3 d-flex align-item-center">
                           <a href="<?=base_url();?>forgot-password">Forgot password?</a>
                        </div>
                     </form>
                  </div>
                  </div>
               </div>
            </div>
             </div>
         </div>
      </div>
      <?php if($this->session->flashdata('success') !=""){?>
        <div class="alert alert-success animated fadeInUp">
            <strong>Success!</strong> <?=$this->session->flashdata('success')?>
        </div>
    <?php }else if($this->session->flashdata('message') !=""){?>
        <div class="alert alert-danger animated fadeInUp">
            <strong>Error!</strong> <?=$this->session->flashdata('message')?>
        </div>
    <?php }elseif(validation_errors()!=''){?>
        <div class="alert alert-danger animated fadeInUp">
            <strong>Error!</strong> <?=validation_errors()?>
        </div>
    <?php }?>
      <!-- End Login -->
      <!-- Bootstrap core JavaScript -->
      <script src="<?=base_url();?>front_style/vendor/jquery/jquery.min.js"></script>
      <script src="<?=base_url();?>front_style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Contact form JavaScript -->
      <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <script src="<?=base_url();?>front_style/js/jqBootstrapValidation.js"></script>
      <script src="<?=base_url();?>front_style/js/contact_me.js"></script>
      <!-- Slick -->
      <script src="<?=base_url();?>front_style/vendor/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>
      <!-- lightgallery -->
      <script src="<?=base_url();?>front_style/vendor/lightgallery-master/dist/js/lightgallery-all.min.js"></script>
      <!-- select2 Js -->
      <script src="<?=base_url();?>front_style/vendor/select2/js/select2.min.js"></script>
      <!-- Custom -->
      <script src="<?=base_url();?>front_style/js/custom.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     
   <script>
    jQuery.validator.addMethod("noHTMLtags", function(value, element){
    if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){
        return false;
    } else {
        return true;
    }
    }, "HTML tags are Not allowed.");


   $(document).ready(function(){
   $("#login_form").validate({
       errorElement:'div',
      rules:{
         username:{
         required:true,
         noHTMLtags:true,
         },
         password:{
         required:true,
         noHTMLtags:true,
         },
      },
      messages:{
         username:{
         required:"Please enter username*",
         noHTMLtags:"html not allowed.",

         },
         password:{
         required:"Please enter password*",
         noHTMLtags:"html not allowed.",
         },
      
      }

   });
});

   </script>
   <script type="text/javascript"> 
  $(".alert").fadeTo(5000, 500).slideUp(500, function(){
         $(".alert").slideUp(500);
     }); 
</script>

   </body>
</html>

<script>
 

