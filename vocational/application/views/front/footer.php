  <footer class="bg-dark py-3 text-center text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="m-0">© THE GLOBAL UNIVERSITY | All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script> -->
  </body>

  </html>
  <!-- <script>
$(document).ready(function(){
	// Load the form.html file into a designated container
	$("#form_reposne").load("form.html");
	$(".contact_details").load("contact_details.html");
	$("#our_program").load("our_program.html");
});
</script> -->

  <!-- <script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script> -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
  <!-- Chosen JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#reg_form').validate({
        ignore: ":hidden:not(select)",

        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          phone: {
            required: true,
          },
          city: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "Please enter your name",
          },
          email: {
            required: "Please enter your email",
            email: "Please enter a valid email",
          },
          phone: {
            required: "Please enter your phone number",
          },
          city: {
            required: "Please select your city",
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });


    $(document).ready(function() {
      $('.chosen-select').chosen();
    });


    $('#city').on('change', function() {
      $('#city').valid();
    });
  </script>
  <script>
    $(document).ready(function() {
      $(".navbar-toggler").click(function() {
        $("#bg-blue").slideToggle();
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      function toggleSubnav() {
        if ($(window).width() < 767) {
          $(".subnavbtn").click(function() {
            $(this).siblings(".subnav-content").slideToggle();
          });
        } else {
          // Ensure subnav is visible on wider screens
          $(".bg-blue .subnav").hover(function() {
            $(this).find(".subnav-content").css("display", "block");
          }, function() {
            $(this).find(".subnav-content").css("display", "none");
          });
        }
      }

      // Call toggleSubnav initially
      toggleSubnav();

      // Call toggleSubnav on window resize
      $(window).resize(function() {
        toggleSubnav();
      });
    });
  </script>