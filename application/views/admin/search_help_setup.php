<!-- <?php
// include('header.php');
 ?>
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Help</h4>
                  <p class="card-description">
                  
                  </p>
				  <div class="card-body card-block form-body">

                  <form name="help_form" id="help_form" method="get" enctype="multipart/form-data" class="form-horizontal">
						<div class="row">
							<div class="col-sm-3">
								<input type="text" autocomplete="off" name="search" id="search" class="form-control" placeholder="Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
							</div>
							<div class="col-sm-3">
								<button type="submit" class="btn btn-primary x1_button" name="submit">Search</button>
								<button type="reset" class="btn btn-primary x1_button" onclick="resetForm()">Reset</button>
								
							</div>
						</div>
					</form>
                    </div>

                    <div id="collapseOne1" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                    <br>
                        
                    <?php	
                        if(!empty($help)){ 
                            foreach($help as $help_result){
                    ?>
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne1"><?=$help_result->long_description?></h4></a>
                        </div> 
                      
                        <?php }} ?>
                    </div>
                    </div>

						</div>
                        </div>
						</div>
                        </div>
						</div>
                        </div>
						</div>




<script>
    function submitForm() {
       
        return true;
    }

    function resetForm() {
        document.getElementById("search").value = '';
        document.getElementById("collapseOne1").innerHTML = "";
        window.history.replaceState({}, document.title, window.location.pathname);
    }
</script> -->





<?php include('header.php');?>
<style>

 .panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #FAFAFA;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }

 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  /*background-color: #dddddd;*/
} 
 
.align_center{
	text-align: center;
}
.image_height{
	height: 30px;
	width: 30px;
}
</style>
		 <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
			  <div class="card-header custom-header">
			  <h4 class="card-title">Syllabus List</h4>
			  </div>
                <div class="card-body">
					<hr>
	
				<form method="get">
					<div class="row">
						
						<div class="col-md-3">

							<input type="text" placeholder="Search" name="search" id="search" class="form-control" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>">
						</div> 
						<div class="col-md-2">
							<button type="submit" class="btn btn-primary x1_button row-btns">Search</button>
							<a href="<?=base_url();?>search_help_setup" id="resetButton" class="btn btn-danger row-btns" onclick="resetForm()">Reset</a>
						</div>
					</div>
				</form>
			<hr>
			<div class="uni_mainWrapper syllabus-section" style="min-height:500px;">

				<div class="container">

					<div class="">

						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

							<div class="row">
								<div class="col-md-12"> 
								<?php if(!empty($help)){ 
                                        foreach($help as $help_result){
								?>
									<div class="panel panel-default"> 
							            <div class="panel-heading" role="tab" id="heading_<?=$help_result->id;?>"> 
							                <h4 class="panel-title"> 
							                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?=$help_result->id;?>" aria-expanded="true" aria-controls="collapse_<?=$help_result->id;?>"> 
							                        <i class="more-less glyphicon glyphicon-plus"></i> 
							                       <?= $help_result->question;?>
							                    </a> 
							                </h4> 
							            </div> 
       									 <div id="collapse_<?=$help_result->id;?>" class="panel-collapse collapse" role="tabpanel" style="width:100%;" aria-labelledby="heading_<?=$help_result->id;?>"> 
							                <div class="panel-body">         
                                                <?=$help_result->long_description;?> 
							                </div>
							            </div>
							        </div>
								     <?php }} ?>
									</div>
								</div>
								</div> 
    						</div>
						</div>
					</div>
				</div>
				<?php include('footer.php');?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Add this JavaScript code -->

<script>   
    $(document).ready(function() {
        $('#resetButton').click(function(event) {
            event.preventDefault(); 
            $('.panel-default').css('display', 'none');
        });
    });
</script>
<script>
    function resetForm() {
        document.getElementById("search").value = '';
        window.history.replaceState({}, document.title, window.location.pathname);
    }
</script>