<section class="container d-flex flex-column align-items-center justify-content-center" id="mainform">

<div class="col-md-6">  

  <h2 class="mb-5 fs-1 contact-head">Contact Us</h2>

<form class="w-sm-50" name="contact_form" id="contact_form" action="<?=base_url();?>submit_enquiry" method="post">

  <!-- Name input -->

  <div class="form-outline mb-4">

      <!-- <label class="form-label" for="form4Example1">Name</label> -->

    <input type="text" id="name" name="name" required class="form-control" placeholder="Please enter name*"/>

  </div>



  <!-- Email input -->

  <div class="form-outline mb-4">

      <!-- <label class="form-label" for="form4Example2">Email address</label> -->

    <input type="text" id="email" name="email" required class="form-control" placeholder="Please enter email*"/>

  </div>

  <div class="form-outline mb-4">

      <!-- <label class="form-label" for="form4Example2">Email address</label> -->

    <input type="text" id="mobile" name="mobile" required class="form-control" placeholder="Please enter mobile number*"/>

  </div>



  <!-- Message input -->

  <div class="form-outline mb-4">

      <!-- <label class="form-label" for="form4Example3">Message</label> -->

	  <?php 

	  $arr = array("","about","membership","rehabilitation","admissions","contact");

	  ?>

    <input class="form-control" id="course" name="course" required placeholder="Please enter course*" value="<?php if(!in_array($this->uri->segment(1),$arr)){ echo str_replace("-"," ",$this->uri->segment(1));}?>">

  </div>

  <!-- Message input -->

  <div class="form-outline mb-4">

      <!-- <label class="form-label" for="form4Example3">Message</label> -->

    <textarea class="form-control" id="location" name="location" required rows="4" placeholder="Please enter Location*"></textarea>

  </div>

  <div class="form-outline mb-4">

  

  <div class="form-group">

<div class="g-recaptcha" data-sitekey="6LcwIJcoAAAAAHWA5hzVuHwZBU8Gmnb3yWs1NJR3"></div>

</div>

</div>

  <!-- Checkbox -->

  <div class="form-check d-flex justify-content-start ">

    <input class="form-check-input me-2" required type="checkbox" value="form4Example4" name="form4Example4" id="form4Example4"  />

    <label class="form-check-label small" for="form4Example4">

    By clicking on "Send", you agree to our <a href="https://www.tgu.ac.in/privacy-policy" target=_blank>Privacy Policy</a>, <a href="https://www.tgu.ac.in/terms-conditions" target="_blank">Terms of Use & Disclaimer</a>

    </label>
   

  </div>
  <label style="display:none;" for="form4Example4" generated="true" class="error">Please accept our terms &amp; conditions</label>



  <!-- Submit button -->

  <button type="submit" class="btn btn-block w-100 mb-4 mt-4">Send</button>

</form>

</div>

</section>