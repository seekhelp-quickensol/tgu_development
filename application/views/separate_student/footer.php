			<footer class="footer">
				<div class="footer-wrap">
					<div class="w-100 clearfix">
						<span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © <?=date("Y")?> <?php if(!empty($university_details)){ echo $university_details->copyright;}?></span>
						<?php /*<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><i class="mdi mdi-heart-outline"></i></span>*/?>
					</div>
				</div>
			</footer>
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
    <script src="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.js"></script> 
    <script src="<?=base_url();?>back_panel/js/template.js"></script> 
    <script src="<?=base_url();?>back_panel/vendors/chart.js/Chart.min.js"></script> 
    <script src="<?=base_url();?>back_panel/vendors/progressbar.js/progressbar.min.js"></script> 
	<script src="<?=base_url();?>back_panel/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script> 
	<script src="<?=base_url();?>back_panel/vendors/justgage/raphael-2.1.4.min.js"></script> 
	<script src="<?=base_url();?>back_panel/vendors/justgage/justgage.js"></script> 
    <script src="<?=base_url();?>back_panel/js/dashboard.js"></script> 
	<script src="<?=base_url();?>back_panel/vendors/typeahead.js/typeahead.bundle.min.js"></script> 
	<script src="<?=base_url();?>back_panel/vendors/select2/select2.min.js"></script> 
	<script src="<?=base_url();?>back_panel/js/file-upload.js"></script> 
	<script src="<?=base_url();?>back_panel/js/typeahead.js"></script> 
	<script src="<?=base_url();?>back_panel/js/select2.js"></script> 
	<script src="<?=base_url();?>back_panel/js/jquery.validate.min.js"></script> 
	<script src="<?=base_url();?>back_panel/js/jquery.dataTables.min.js"></script>  
	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script> 
	<script src="<?=base_url();?>back_panel/js/dataTables.bootstrap.min.js"></script> 
	<script src="<?=base_url();?>back_panel/js/dataTables.buttons.min.js"></script> 
	<script src="<?=base_url();?>back_panel/js/jszip.min.js"></script>
	<script src="<?=base_url();?>back_panel/js/pdfmake.min.js"></script>
	<script src="<?=base_url();?>back_panel/js/vfs_fonts.js"></script>
	<script src="<?=base_url();?>back_panel/js/buttons.html5.min.js"></script> 
	<script src="<?=base_url();?>back_panel/js/dataTables.rowReorder.min.js"></script>
	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script>
	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script>
	<script src="<?=base_url();?>back_panel/js/responsive.bootstrap4.min.js"></script>
	<?php if($this->uri->segment(1) !="manage_news" && $this->uri->segment(1) !="manage_conference"){?>
	<script src="<?=base_url();?>back_panel/js/jquery-ui.js"></script>
	<?php }?>
	<script>document.addEventListener('keydown', function() {  if (event.keyCode == 123) {    alert("Sorry! you can not do this.");    return false;  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {    alert("Sorry! you can not do this.");    return false;  } else if (event.ctrlKey && event.keyCode == 85) {    alert("Sorry! you can not do this.");    return false;  }}, false);if (document.addEventListener) {  document.addEventListener('contextmenu', function(e) {    alert("Sorry! you can not do this.");    e.preventDefault();  }, false);} else {  document.attachEvent('oncontextmenu', function() {    alert("Sorry! you can not do this.");    window.event.returnValue = false;  });}$(document).keydown(function(e){    if(e.which === 123){       return false;    }});document.addEventListener('keydown', function() {  if (event.keyCode == 123) {    alert("Sorry! you can not do this.");    return false;  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {    alert("Sorry! you can not do this.");    return false;  } else if (event.ctrlKey && event.keyCode == 85) {    alert("Sorry! you can not do this.");    return false;  }}, false);if (document.addEventListener) {  document.addEventListener('contextmenu', function(e) {    alert("Sorry! you can not do this.");    e.preventDefault();  }, false);} else {  document.attachEvent('oncontextmenu', function() {    alert("Sorry! you can not do this.");    window.event.returnValue = false;  });}$(document).keydown(function(e){    if(e.which === 123){       return false;    }});$('input').on('keypress', function (event) {    var regex = new RegExp("^[a-zA-Z0-9 @ & .]+$");    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);    if (!regex.test(key)) {       event.preventDefault();       return false;    }});$(document).on('keydown', function(e) {    if((e.ctrlKey || e.metaKey) && (e.key == "p" || e.charCode == 16 || e.charCode == 112 || e.keyCode == 80) ){        alert("Please use the Print PDF button below for a better rendering on the document");        e.cancelBubble = true;        e.preventDefault();        e.stopImmediatePropagation();    }  });  $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {  if (!$(this).next().hasClass('show')) {    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");  }  var $subMenu = $(this).next(".dropdown-menu");  $subMenu.toggleClass('show');  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {    $('.dropdown-submenu .show').removeClass("show");  });  return false;});
	$(".alert").fadeTo(5000, 500).slideUp(500, function(){
		$(".alert").slideUp(500);
	});
	</script>
  </body>
</html>