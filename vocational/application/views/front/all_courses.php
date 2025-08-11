 <?php include('header.php');?>
  
	<section class="courses_sec">
	<div class="container">
		<?php 
	  
		  if(!empty($course_list)){
			echo $course_list->description;
		  }
		?>
		</div>
	</section>
    <section class="py-4">
      <?php include('our_program.php'); ?>
    </section>
   
   <?php include('footer.php');?>