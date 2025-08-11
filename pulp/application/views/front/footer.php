
   
<footer>
      <div class="wrapper container py-5">
        <div class="row">
          <div class="col-sm-6 about_bir">
            <h3>THE GLOBAL UNIVERSITY</h3>
            <p>
             Global University, Arunachal Pradesh is established by the Arunachal Pradesh Government as amended act no 12/2022 and University started first academic session by 2023.
            </p>
          </div>
          <div class="col">
            <h3>Official Links</h3>
            <ul>
              <li>
                <a href="<?=base_url();?>">Home</a>
              </li>
              <li>
                <a href="<?=base_url();?>about"
                  >About</a
                >
              </li>
              
              <li><a href="<?=base_url();?>admissions">Admissions</a></li>
              <li><a href="https://www.tgu.ac.in/student-corner">Student Login</a></li>
              <li>
                <a href="<?=base_url();?>contact"
                  >Contact</a
                >
              </li>
            </ul>
          </div>

          <div class="col address_uni">
            <h3>Reach Us</h3>
            <p>
              The Global University Administrative Office: Model Village Naharlagun, Itanagar, Arunachal Pradesh, 791110
            </p>
            <!-- <p><strong>Phone No:- </strong> +91 93546 65694</p> -->
            <a href="mailto:pulp@tgu.ac.in"><p><b>Email:-</b> pulp@tgu.ac.in</p></a>
            <ul class="footer_social d-flex mt-4">
              <li>
                <a
                  target="_blank"
                  href="https://www.facebook.com/theglobaluni/">
                  <i class="fa-brands fa-facebook-f"></i
                ></a>
              </li>
              <li>
                <a
                  target="_blank"
                  href="https://www.instagram.com/theglobaluniversity?igsh=ejMxaTc1bndudDlk">
                  <i class="fa-brands fa-instagram"></i
                ></a>
              </li>
              <li>
                <a target="_blank" href="https://x.com/theglobaluni?t=t4DU0MYYkGovmWlIhplEww&s=09"><i class="fa-brands fa-twitter"></i
                ></a>
              </li>
              <li>
                <a
                  target="_blank"
                  href="https://www.linkedin.com/in/the-global-university-427b12295/?originalSubdomain=in"><i class="fa-brands fa-linkedin-in"></i
                ></a>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
      <div class="uni_section_footer_btm">
        <a href="https://www.tgu.ac.in/">THE GLOBAL UNIVERSITY</a> | ALL RIGHTS RESERVED
        <a href="https://www.quickensol.com"></a>
      </div>
    </footer>
 
    </div>
   
  </body>

  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
 <script src="https://www.birtikendrajituniversity.ac.in/back_panel/js/jquery.validate.min.js"></script>
 <script src="https://www.birtikendrajituniversity.ac.in/back_panel/vendors/select2/select2.min.js"></script>
	
	<script src="https://www.birtikendrajituniversity.ac.in/back_panel/js/select2.min.js"></script>
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
	<script>
$.validator.setDefaults({ ignore: ":hidden:not(.school)" })			
jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#contact_form').validate({
	rules: {
		name: {
			required: true,
		},
		mobile: {
			required: true,
			number: true,
			minlength: 10,
			maxlength: 10,
		},
		email: {
			required: true,
			validate_email: true,
		},
		course: {
			required: true,
		},
		location: {
			required: true,
		},
		form4Example4: {
			required: true,
		},
	},
	messages: {
		name: {
			required: "Please enter your name",
		},
		mobile: {
			required: "Please enter mobile number",
			number: "Please enter valid mobile number",
			minlength: "Please enter 10 digit mobile number",
			maxlength: "Please enter 10 digit mobile number",
		},
		email: {
			required: "Please enter email",
			validate_email: "Please enter valid email",
		},
		course: {
			required: "Please enter course",
		},
		location: {
			required: "Please enter location",
		},
		form4Example4: {
			required: "Please accept our terms & conditions",
		},
	},
	
});
$(".close-overlay").click(function() {
            $(".popup-overlay").hide();
            
        });
$('#popup-form').validate({
   	rules: {
   		name: {
   			required: true,
   		},
   		mobile: {
   			required: true,
   			number: true,
   			minlength: 10,
   			maxlength: 10,
   		},
   		email: {
   			required: true,
   			validate_email: true,
   		},
   		course: {
   			required: true,
   		},
   		location: {
   			required: true,
   		},
   		form4Example4: {
   			required: true,
   		},
   	},
   	messages: {
   		name: {
   			required: "Please enter your name",
   		},
   		mobile: {
   			required: "Please enter mobile number",
   			number: "Please enter valid mobile number",
   			minlength: "Please enter 10 digit mobile number",
   			maxlength: "Please enter 10 digit mobile number",
   		},
   		email: {
   			required: "Please enter email",
   			validate_email: "Please enter valid email",
   		},
   		course: {
   			required: "Please select course",
   		},
   		location: {
   			required: "Please enter location",
   		},
   		form4Example4: {
   			required: "Please accept our terms & conditions",
   		},
   	},
       
   });
    $(document).ready(function () {
      $("#carousel-1").owlCarousel({
        items: 1,
        loop: false,
        margin: 0,
        nav: false,
        autoplay: false,
        autoplayTimeout: 0,
        // autoplaySpeed: 1000,
        autoplayHoverPause: false,
        mouseDrag: false,
    touchDrag: false
      });

      $("#carousel-2").owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 3,
            nav: false,
          },
          480: {
            items: 5,
            nav: false,
          },
          667: {
            items: 6,
            nav: false,
          },
          1000: {
            items: 6,
            nav: false,
          },
        },
      });
    });
  </script>

<script>
    $(document).ready(function() {
    var scrollingElement = $("#site-header");
    $(window).scroll(function() {
        // Check if the page has scrolled past a certain point (e.g., 100px)
    
        if ($(this).scrollTop() > 100) {
            scrollingElement.addClass("set-position");
           
        } else {
            scrollingElement.removeClass("set-position");
            
        }
    });
});
</script>

 
</html>
