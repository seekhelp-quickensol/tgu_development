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
			<div class="uni_mainWrapper syllabus-section" style="min-height:500px;">

				<div class="container">

					<div class="row">

						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

							<div class="row">

								<div class="col-md-12"> 

								<?php 
									if(!empty($result)){ 
										for($i=0;$i<count($result);$i++){
								?>
									<div class="panel panel-default"> 
							            <div class="panel-heading" role="tab" id="heading_<?=$result[$i]['faculty_id'];?>"> 
							                <h4 class="panel-title"> 
							                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?=$result[$i]['faculty_id'];?>" aria-expanded="true" aria-controls="collapse_<?=$result[$i]['faculty_id'];?>"> 
							                        <i class="more-less glyphicon glyphicon-plus"></i> 
							                       <?=$result[$i]['faculty_name'].' ['.$result[$i]['faculty_code'].']';?>
							                    </a> 
							                </h4> 
							            </div> 
       									 <div id="collapse_<?=$result[$i]['faculty_id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?=$result[$i]['faculty_id'];?>"> 
							                <div class="panel-body">   
							                	<table> 
													<thead>
														<tr> 
															<th class="align_center">SR.NO</th> 
															<th class="align_center">NAME</th> 
															<th class="align_center">YEAR/SEM</th> 
															<th class="align_center">DOWNLOAD</th> 
														</tr> 
													</thead>
													<tbody>
														<?php 
															$j = 1; 
															if(!empty($result[$i]['result'])){
																foreach($result[$i]['result'] as $data){
														?>
														<tr> 
															<td class="align_center"><?=$j++;?></td> 
															<td><?=$data->course_name;?></td> 
															<td class="align_center"><?=$data->year_sem;?></td> 
															<td class="align_center"><a href="<?=$this->Digitalocean_model->get_photo('course_syllabus/'.$data->file)?>" target="_blank"><img src="<?=$this->Digitalocean_model->get_photo('images/pdf.png')?>" class="image_height"></a></td> 
														</tr> 
														<?php }} ?>
													</tbody> 
												</table>
							                </div>
							            </div>
							        </div>
								     <?php }}else{ ?>
									<div class="panel panel-default"> 
							                <h4 class="panel-title"> 
												Course Syllabus not available.
							                </h4> 
							        </div> 
									<?php } ?>
									</div>
								</div>

								</div> 

    						</div>

						</div>

					</div>
				</div>
				<?php include('footer.php');?>
