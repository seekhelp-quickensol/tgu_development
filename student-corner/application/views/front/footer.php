<!--       footer -->
<?php if($this->session->flashdata('success') !=""){?>
        <div class="alert alert-success  animated fadeInUp">
            <strong>Success!</strong> <?=$this->session->flashdata('success')?>
        </div>
    <?php }else if($this->session->flashdata('message') !=""){?>
        <div class="alert alert-danger  animated fadeInUp">
            <strong>Error!</strong> <?=$this->session->flashdata('message')?>
        </div>
    <?php }elseif(validation_errors()!=''){?>
        <div class="alert alert-danger animated fadeInUp">
            <strong>Error!</strong> <?=validation_errors()?>
        </div>
    <?php }?>
<footer class="bg-white" style="position:static; bottom:0;">
    <div class="container">
       <?php /*<div class="d-flex justify-content-between">
          <div class="footer-list">
             <h2>Courses</h2>
             <ul class="list">
                <li><a href="<?=base_url('course_detail/english-grammar');?>">ENGLISH GRAMMAR</a></li>
                <li><a href="<?=base_url('course_detail/hindi-grammar');?>">HINDI GRAMMAR</a></li>
                <li><a href="<?=base_url('course_detail/phonetics');?>">PHONETICS</a></li>
             </ul>
          </div>
          <div class="footer-list">
             <h2>About</h2>
             <ul class="list">
                <li><a href="<?=base_url('contact')?>">Careers</a></li>
                <li><a href="<?=base_url('privacy_policy')?>">Privacy Policy</a></li>
                <li><a href="<?=base_url('terms_condition')?>">Terms of Service</a></li>
             </ul>
          </div>
          <div class="footer-list">
             <h2>Support</h2>
             <ul class="list">
              <li><a href="<?=base_url('contact');?>">Contact Us</a></li>
                <li><a href="<?=base_url('login');?>">SignIn</a></li>
                <li><a href="<?=base_url('register');?>">SignUp</a></li>
             </ul>
          </div>
        
          <div class="footer-list footer-address">
             <h2>Address</h2>
           
             <p>Alandi road pune 411015</p>
          </div>*/?>
       </div>
       <div class="copyright">
          
          <p>© Copyright <?=date("Y")?> The Global University. All Rights Reserved
          </p>
          <ul class="social">
            <!-- <li>
                <a href="https://www.facebook.com/golinguistics/?ref=pages_you_manage"><i class="fa fa-facebook" aria-hidden="true"></i></a>
             </li>
             <li>
                <a href="https://twitter.com/go_linguistics"><i class="fa fa-twitter" aria-hidden="true"></i></a>
             </li>
             <li>
                <a href="https://www.linkedin.com/in/golinguistics-learning-955022226/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
             </li>
             <li>
                <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
             </li>
             <li>
                <a href="https://www.instagram.com/golinguistics/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
             </li>-->
          </ul>
       </div>
    </div>
 </footer>

 <!--       footer-->
 <!-- Bootstrap core JavaScript -->
 <script src="<?=base_url();?>front_style/vendor/jquery/jquery.min.js"></script>

 <!-- <script src="<?=base_url();?>front_style/js/jquery-ui.js"></script> -->
 <script src="<?=base_url();?>front_style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Contact form JavaScript -->
 <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
 <script src="<?=base_url();?>front_style/js/jqBootstrapValidation.js"></script>
 <!--<script src="<?=base_url();?>front_style/js/contact_me.js"></script> -->
 <!-- Slick -->
 <script src="<?=base_url();?>front_style/vendor/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>
 <!-- lightgallery -->
 <script src="<?=base_url();?>front_style/vendor/lightgallery-master/dist/js/lightgallery-all.min.js"></script>
 <!-- select2 Js -->
 <script src="<?=base_url();?>front_style/vendor/select2/js/select2.min.js"></script>
<!--mobile_sortable -->
 <script src="<?=base_url();?>front_style/js/mobile_sortable.js"></script>
 <script src="<?=base_url();?>assets/js/jquery.validate.min.js"></script>
 <!-- <script src="<?=base_url();?>assets/js/bootstrap-datepicker.min.js"></script>   -->


 <script>
 
  setTimeout(function(){
      $('.loader').fadeOut(800);
     $('.layer_data').fadeIn(1500);
    
  });
   $(".alert").fadeTo(5000, 500).slideUp(500, function(){
         $(".alert").slideUp(500);
     }); 

/*
     document.addEventListener('keydown', function() {
  if (event.keyCode == 123) {
    alert("Sorry! you can not do this.");
    return false;
  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
    alert("Sorry! you can not do this.");
    return false;
  } else if (event.ctrlKey && event.keyCode == 85) {
    alert("Sorry! you can not do this.");
    return false;
  }
}, false);

if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    alert("Sorry! you can not do this.");
    e.preventDefault();
  }, false);
} else {
  document.attachEvent('oncontextmenu', function() {
    alert("Sorry! you can not do this.");
    window.event.returnValue = false;
  });
}
$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});


document.addEventListener('keydown', function() {
  if (event.keyCode == 123) {
    alert("Sorry! you can not do this.");
    return false;
  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
    alert("Sorry! you can not do this.");
    return false;
  } else if (event.ctrlKey && event.keyCode == 85) {
    alert("Sorry! you can not do this.");
    return false;
  }
}, false);



if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    alert("Sorry! you can not do this.");
    e.preventDefault();
  }, false);
} else {
  document.attachEvent('oncontextmenu', function() {
    alert("Sorry! you can not do this.");
    window.event.returnValue = false;
  });
}
$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});
$('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9 @ & .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
$(document).on('keydown', function(e) {
    if((e.ctrlKey || e.metaKey) && (e.key == "p" || e.charCode == 16 || e.charCode == 112 || e.keyCode == 80) ){
        alert("Please use the Print PDF button below for a better rendering on the document");
        e.cancelBubble = true;
        e.preventDefault();

        e.stopImmediatePropagation();
    }  
});
  $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});*/
    </script>
</body>
</html>