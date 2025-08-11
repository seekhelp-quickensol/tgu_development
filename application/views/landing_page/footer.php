

    <footer class="bg_p2 text-white text-center">

        <div class="row">




BIR TIKENDRAJIT UNIVERSITY


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

<a class="float" href="tel:+91-9354665694" onclick="ga('send', 'event', { eventCategory: 'Contact', eventAction: 'Call', eventLabel: 'Mobile Button'});">

    <img class="image-responsive" src="<?=base_url();?>landing_assets/images/callnow.gif" alt="call now" style="height: 56px;width: 58px;">

</a>



</div>

<div class="whats_app"><a target="_blank" href="https://api.whatsapp.com/send?phone=+919354665694&amp;text=Hi BTU I am looking for B Tech!"><i class="fa fa-whatsapp"></i></a></div>



    </footer>

	

	<script src="<?=base_url();?>back_panel/js/jquery.validate.min.js"></script>

    <script>

	

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

			required: true,

			validate_email: true,

			noHTMLtags: true,

		},

		mobile: {

			required: true,

			number: true,

			minlength: 10,

			maxlength: 10,

			noHTMLtags: true,

		},

		state: {

			required: true,

			noHTMLtags: true,

		},

		city: {

			required: true,

			noHTMLtags: true,

		}, 

		course_type: {

			required: true,

			noHTMLtags: true,

		},

		course: {

			required: true,

			noHTMLtags: true,

		},

		stream: {

			required: true,

			noHTMLtags: true,

		},

		agree: {

			required: true, 

		},

	},

	messages: {

		name: {

			required: "Please enter your name",

			noHTMLtags:"HTML tags not allowed!",

		},

		email: {

			required: "Please enter your email",

			validate_email: "Please enter your valid email",

			noHTMLtags:"HTML tags not allowed!",

		},

		mobile: {

			required: "Please enter mobile number",

			number: "Please enter valid number",

			minlength: "Please enter 10 gigit mobile number",

			maxlength: "Please enter 10 gigit mobile number",

			noHTMLtags:"HTML tags not allowed!",

		},

		state: {

			required: "Please select state",

			noHTMLtags:"HTML tags not allowed!",

		},

		city: {

			required: "Please select city",

			noHTMLtags:"HTML tags not allowed!",

		},

		course_type: {

			required: "Please select program level",

			noHTMLtags:"HTML tags not allowed!",

		},

		course: {

			required: "Please enter course",

			noHTMLtags:"HTML tags not allowed!",

		},

		stream: {

			required: "Please select stream",

			noHTMLtags:"HTML tags not allowed!",

		}, 

		agree: {

			required: "Please accept", 

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