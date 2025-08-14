<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Path to Success with MBA and B.Tech Admissions</title>
    <link rel="icon" href="https://www.theglobaluniversity.edu.in/favicon.ico">
    <link href="landing_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing_assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .home_banner {
            min-height: 450px !important;
            background: url(landing_assets/images/btech_banner.jpg);
        }

        .hero_content {
            margin-top: 70px;
        }
        .targetDiv{
            padding-top: 50px;
        }
        .hero_tabs{
            padding: 40px 0px !important;
        }
        .heading_main{
            font-weight: 700;
            
        }
        .container_main{
            padding-top: 90px;
        }
        @media (max-width:767px) {
            .heading_main{
            font-weight: 800;
            text-align: center;
            }
            .course_applay{
                margin-left: 0px;
            }
            .applay_now{
                text-align: center;
            }
            .form-control{
                margin-top: 10px;
            }
            .hero_tabs p{
                margin: 0px;
                padding-top: 15px;
            }
            .targetDiv ul li{
                text-align: justify;
                padding-right: 10px;
            }
            .targetDiv p{
                text-align: justify;
            }
        }
    </style>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '154256421081411');
fbq('track', 'SubmitApplication');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=154256421081411&ev=SubmitApplication&noscript=1"
/></noscript>
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-595335465/02wPCKCD5OYYEKmy8JsC',
      'event_callback': callback
  });
  return false;
}
</script>
 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-595335465"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-595335465');
</script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg_p1 shadow mob_bg">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>"> <img
                    src="<?= $this->Digitalocean_model->get_photo('landing_assets/logo/btu_new.png') ?>" class="logo"></a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-content">
                <div class="hamburger-toggle">
                    <div class="hamburger">
                        <img src="<?= $this->Digitalocean_model->get_photo('landing_assets/images/menu-button-of-three-horizontal-lines.png')?>" width="16" height="16">
                    </div>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <h1 class="heading_1">BIR TIKENDRAJIT UNIVERSITY<br><span
                        class="heading_inner_text">Complete Learning Management Solution Process</span> </h1>
                <form class="d-flex ms-auto">
                    <a class="hreftext" href="mailto:info@theglobaluniversity.edu.in"> <i
                            class="fa fa-envelope" style="font-size:18px"></i> info@theglobaluniversity.edu.in</a>
                </form>
            </div>
        </div>
    </nav>
    <section class="home_banner"
        style="background: url(<?=base_url();?>landing_assets/images/students.jpg);background-size: cover;background-repeat: no-repeat;">
        <div class="container-fluid overlay container_main">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-8">
                        <div class="hero_content">
                            <h1 class="herotext">Discover Your Future with MBA and B.Tech Admissions at Bir
                                Tikendrajit University</h1>
                            <div class="herotext_2">Unlock Your Potential with Our MBA and B.Tech Programs</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="enquir_form" id="enquir_form">
                            <form method="post" name="course_form" id="course_form">
                                <div class="form-group">
                                    <input type="text" class="form-control input_lbl typo" name="name" id="name"
                                        placeholder="Full Name*">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input_lbl" name="email" id="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input_lbl typo" name="mobile" id="mobile"
                                        placeholder="Mobile Number*">
                                </div>
                                 
                                <div class="form-group">
                                    <input type="text" name="course" id="course" placeholder="Course Name*"
                                        class="form-control select-arrow-cust widget_input typo"
                                        value="<?= $course->print_name ?>">
                                </div>
                                <div class="checkbox">
                                    <label><input type="hidden" name="Agree" value="0">
                                        <input type="checkbox" class="chkbox_size" checked="checked" name="agree"
                                            value="1" id="agree" class="widget_input">
                                        <span class="agree-condition">I agree to receive information regarding my
                                            submitted application.</span>
                                    </label>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <button class="submit_btn" id="send_enquiry" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero_tabs">
        <div class="container">
            <center>
                <div class="row mx-auto">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="tabs">
                            <img
                                src="<?= $this->Digitalocean_model->get_photo('landing_assets/images/1.png') ?>"
                                class="three_img">
                            <p>Accorded Institution of Eminence by UGC, AICTE Govt. of India</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="tabs">
                            <img
                                src="<?= $this->Digitalocean_model->get_photo('landing_assets/images/2.png') ?>"
                                class="three_img">
                            <p>No. 1 Private University in India by Education World Ranking <?= date("Y") ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="tabs">
                            <img
                                src="<?= $this->Digitalocean_model->get_photo('landing_assets/images/3.png') ?>"
                                class="three_img">
                            <p>A legacy of the field of Higher Education</p>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
    <div class="container">
        <div id="div1" class="targetDiv">
            <h2 class="heading_main">Why Choose Us?</h2>
            <ul>
                <li>Unrivaled Academic Excellence: Our institution stands as a beacon of academic excellence. Our graduates consistently shine in their chosen fields, a testament to our commitment to quality education.</li>
                <li>Exceptional Faculty: Our faculty members are luminaries in their domains, possessing a treasure trove of knowledge and industry experience that enriches every classroom experience.</li>
                <li>Cutting-Edge Facilities: Dive into the future with access to our state-of-the-art facilities, laboratories, and resources, ensuring you stay at the forefront of technology and innovation.</li>
                <li>Powerful Industry Connections: Our extensive network of industry partners and accomplished alumni opens doors to exclusive internships and career placements that set you on the fast track to success.</li>
                <li>Holistic Growth: We foster well-rounded individuals. Our programs not only foster academic brilliance but also nurture personal and professional development.</li>
            </ul>

            <h2 class="heading_main">Our Programs</h2>
            <ul>
                <li><strong>Master of Business Administration (MBA):</strong> Aspire to be a trailblazing business leader? Our MBA program is tailored to equip you with the skills and knowledge needed to shine in the corporate world. Specialize in Finance, Marketing, Human Resources, or Entrepreneurship, with a range of concentrations to match your career aspirations.</li>
                <li><strong>Bachelor of Technology (B.Tech):</strong> If your heart beats for technology and innovation, our B.Tech program is your ideal choice. Here, you'll gain hands-on experience and theoretical mastery in fields like Computer Science, Electrical Engineering, Mechanical Engineering, and more.</li>
            </ul>

            <h2 class="heading_main">Admissions Open Now!</h2>
            <p>Don't let this golden opportunity slip through your fingers. Admissions for the MBA and B.Tech programs are now open for the upcoming academic year. Here's your roadmap:</p>
            <ul>
                <li>Explore Programs: Dive deep into our MBA and B.Tech programs to find the one that aligns perfectly with your career aspirations.</li>
                <li>Admission Requirements: Ensure you check and meet the admission criteria for your chosen program.</li>
                <li>Application Process: Kickstart your application online. Our user-friendly portal will seamlessly guide you through each step.</li>
                <li>Scholarships: Uncover scholarship opportunities to fuel your educational journey and ease the financial burden.</li>
                <li>Contact Us: Got questions or need assistance? Our dedicated admissions team is at your service. Reach out to us today!</li>
            </ul>

            <p>Your future is poised to take off right here! Enroll in our MBA and B.Tech programs, unlocking a world of endless possibilities on your path to boundless success.</p>
           
        </div>
                <div class="applay_now" style="margin-top:10px;">
            <a href="#enquir_form"><button class="course_applay" type="button">Apply Now</button></a>
        </div>
    </div>
</body>

</html>


    <footer class="bg_p2 text-white text-center">

        <div class="row">







            <div class="col-lg-6 ">

                <a class="navbar-brand" href="#"> <img src="landing_assets/logo/btu_new.png" class="logo_f">

                    <span class="footer_pipe">|</span>

                    <a class="footer_line"> 	&#169;THE GLOBAL UNIVERSITY</a>

            </div>

            <div class="col-lg-6">

                <div class="icons">



                    <img alt="Image" src="landing_assets/images/internet.png" title="Image" style="width:24px; height:24px">

                    <a class="contact_no" href="<?=base_url();?>" target="_blank" rel="noopener">www.theglobaluniversity.edu.in</a>

                    <span class="second_icon_footer"> 

    <img alt="Image" src="landing_assets/images/phone-call.png" title="Image" style="width:24px; height:24px">



    <strong><a class="contact_no" href="tel:+919111939980"> 91 911193 9980</a> </strong>

</span>



                </div>



            </div>

        </div>

<div class="call-icon">

<a class="float" href="tel:+91-9111939980" onclick="ga('send', 'event', { eventCategory: 'Contact', eventAction: 'Call', eventLabel: 'Mobile Button'});">

    <img class="image-responsive" src="<?=base_url();?>landing_assets/images/callnow.gif" alt="call now" style="height: 56px;width: 58px;">

</a>



</div>

<div class="whats_app"><a target="_blank" href="https://api.whatsapp.com/send?phone=+919111939980&amp;text=Hi BTU I am looking for B Tech!"><i class="fa fa-whatsapp"></i></a></div>



    </footer>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="<?=base_url();?>back_panel/js/jquery.validate.min.js"></script>

    <script>

		$(".typo").keyup(function(){
		if($("#information_center_name").val() != "" && $("#information_person_name").val() != "" && $("#information_email").val() != "" && $("#information_mobile").val() != "" && $("#information_pincode").val() != ""){
			$("#send_enquiry").prop("disabled", false);
		}
	});

jQuery.validator.addMethod("validate_email", function(value, element) {

	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

		return true;

	}else {

		return false;

	}

}, "Please enter a valid Email.");	



jQuery.validator.addMethod("noHTMLtags", function(value, element){

	if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){

		if(value == ""){

			return true;

		}else{

			return false;

		}

	} else {

		return true;

	}

}, "HTML tags are Not allowed.");





$('#course_form').validate({

	rules: { 
		name: { 
			required: true, 
			noHTMLtags: true, 
		}, 
		email: {  
			email: true, 
			noHTMLtags: true, 
		}, 
		mobile: { 
			required: true, 
			number: true, 
			minlength: 10, 
			maxlength: 10, 
			noHTMLtags: true, 
		},  
		course: { 
			required: true, 
			noHTMLtags: true, 
		},    
	}, 
	messages: { 
		name: { 
			required: "Please enter your name", 
			noHTMLtags:"HTML tags not allowed!", 
		}, 
		email: {  
			email: "Please enter your valid email", 
			noHTMLtags:"HTML tags not allowed!", 
		}, 
		mobile: { 
			required: "Please enter mobile number", 
			number: "Please enter valid number", 
			minlength: "Please enter 10 gigit mobile number", 
			maxlength: "Please enter 10 gigit mobile number", 
			noHTMLtags:"HTML tags not allowed!", 
		},     
		course: { 
			required: "Please enter course", 
			noHTMLtags:"HTML tags not allowed!", 
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



	$("#state").change(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>web/Landing_controller/get_city_ajax",

		data:{'state':$("#state").val()},

		success: function(data){

			$("#city").empty();

			$('#city').append('<option value="">City*</option>');

			var opts = $.parseJSON(data);

			$.each(opts, function(i, d) {

			   $('#city').append('<option value="' + d.name + '">' + d.name + '</option>');

			});

			$('#city').trigger('change');

		},

		 error: function(jqXHR, textStatus, errorThrown) {

		   console.log(textStatus, errorThrown);

		}

	});	

});

$("#course_type").change(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>web/Landing_controller/get_course_list",

		data:{'course_type':$("#course_type").val()},

		success: function(data){

			$("#course").empty();

			$('#course').append('<option value="">Course*</option>');

			var opts = $.parseJSON(data);

			$.each(opts, function(i, d) {

			   $('#course').append('<option value="' + d.print_name + '">' + d.print_name + '</option>');

			});

			$('#stream').trigger('change');

		},

		 error: function(jqXHR, textStatus, errorThrown) {

		   console.log(textStatus, errorThrown);

		}

	});	

});



$("#course").change(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>web/Landing_controller/get_course_stream",

		data:{'course':$("#course").val()},

		success: function(data){

			$("#stream").empty();

			$('#stream').append('<option value="">Stream*</option>');

			var opts = $.parseJSON(data);

			$.each(opts, function(i, d) {

			   $('#stream').append('<option value="' + d.stream_name + '">' + d.stream_name + '</option>');

			});

			$('#stream').trigger('change');

		},

		 error: function(jqXHR, textStatus, errorThrown) {

		   console.log(textStatus, errorThrown);

		}

	});	

});  

jQuery(function() {

	jQuery('.showSingle').click(function() {

		var target = jQuery(this).attr('target');

		var targetDiv = jQuery("#div" + target);

		jQuery(this).parents('.container').find('.targetDiv').hide();

		jQuery(this).parents('.container').find(targetDiv).show();

	});

}); 

$('.targetDiv:not(#div1)').hide();

	$('.show').click(function() {

		$('.targetDiv').hide();

		$('#div' + $(this).attr('target')).show();

});

    </script>

</body>



<script type="text/javascript">

  if(window.location.pathname=="/thankyou-enquire"){

    gtag('event', 'conversion', {'send_to': 'AW-595335465/FFIzCIG0v7wDEKmy8JsC'});

  }
   
</script>



</html>