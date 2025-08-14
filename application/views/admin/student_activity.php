<?php include('header.php');?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans">
<style> 
 .para_class{
	padding: 10px;
    font-size: 15px;
 }
 
.btn-info{ 
    position: relative;
    z-index: 99;
}
	
 .timeline { 
	list-style: none;
	padding: 20px 0 20px;
	position: relative;
}
	.timeline:before {
		top: 2px;
		bottom: 15px;
		position: absolute;
		content: " ";
		width: 1px;
		background-color: #ccc;
		left: 50%;
		margin-left: -1px;
	}
		.arrowhead{
			width: 0;
			position: absolute;
			top: 0;
			left: 50%;
			margin-left: -15px;
			
			border-top: 0 solid transparent;
			border-left: 15px solid transparent;
			border-right: 15px solid transparent;
			border-bottom: 15px solid #ccc;
		}
	.timeline > li {
		min-height: 300px;
		width: 50%;
		padding-left: 42px;
		padding-right: 42px;		
		position: relative;		
		float: left;
		clear: left;
	}

/*Panel*/
	.timeline > li > .timeline-panel {
		width: 92%;
		float: left;
		border: 1px solid #d4d4d4;
		/*border-radius: 2px;*/
		/*padding: 20px;*/
		position: relative;
		-webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
		box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
	}
		.timeline > li > .timeline-panel:before {
			position: absolute;
			top: 26px;
			right: -15px;
			display: inline-block;
			border-top: 15px solid transparent;
			border-left: 15px solid #ccc;
			border-right: 0 solid #ccc;
			border-bottom: 15px solid transparent;
			content: " ";
		}
		.timeline > li > .timeline-panel:after {
			position: absolute;
			top: 27px;
			right: -14px;
			display: inline-block;
			border-top: 14px solid transparent;
			border-left: 14px solid #fff;
			border-right: 0 solid #fff;
			border-bottom: 14px solid transparent;
			content: " ";		
		}

		.timeline-panel img {
			width: 100%;
			padding: 10px 10px 0 10px;
		}


/*Inverted panel*/
	.timeline > li.timeline-inverted > .timeline-panel {
		float: right;
	}
		.timeline > li.timeline-inverted > .timeline-panel:before {
			border-left-width: 0;
			border-right-width: 15px;
			left: -15px;
			right: auto;
		}
		.timeline > li.timeline-inverted > .timeline-panel:after {
			border-left-width: 0;
			border-right-width: 14px;
			left: -14px;
			right: auto;
		}

	.timeline > li.timeline-inverted{
		float: right; 
		clear: right;
		margin-top: 0px;
		margin-bottom: 30px;
	}
		.timeline > li:nth-child(3) {
			margin-top: 100px;
		}


	/*Last panel*/
	@media (min-width: 850px) {
		.timeline .last{
			margin-top: -40px;
		}
			.timeline .last .timeline-panel{
          margin-top: 75px;
          left: calc(50% + 60px);
			}
			.timeline .last .timeline-panel:before{
				top: -15px;
				right: calc(50% - 7px);
				border-top: 0 solid transparent;
				border-left: 15px solid transparent;
				border-right: 15px solid transparent;
				border-bottom: 15px solid #ccc;
			}
			.timeline .last .timeline-panel:after{
				top: -14px;
				right: calc(50% - 6.5px);
				border-top: 0 solid transparent;
				border-left: 14px solid transparent;
				border-right: 14px solid transparent;
				border-bottom: 14px solid #fff;
			}
	}


/*Badge*/
	.timeline > li > .timeline-badge {   
		width: 50px;
		height: 50px;
		line-height: 50px;
		font-size: 1.2em;
		text-align: center;
		position: absolute;
		top: 16px;
		right: 5px;
		z-index: 100; 
		border-top-right-radius: 50%;
		border-top-left-radius: 50%;
		border-bottom-right-radius: 50%;
		border-bottom-left-radius: 50%; 
		cursor: default;
	}
		.timeline > li.timeline-inverted > .timeline-badge{
			left: 5px;
		}

	.timeline > li > .timeline-badge:before{
		position: absolute;
		top: 58%;
		right: -11px;
		content: ' ';
		display: block;
		width: 12px;
		height: 12px;
		margin-top: -10px;
		background: #fff;
		border-radius: 10px;
		border: 4px solid rgb(255,80,80);
		z-index: 10;
	}
		.timeline > li.timeline-inverted > .timeline-badge:before{
			left: -11px;
		}




/*Content*/
	.timeline-title {
		margin-top: 0;
		padding: 4px 5px;
		background: #d5d5d5;
		margin-bottom: 0;
		color: inherit;
	}
	.timeline-title p{
		font-size: 15px;
		margin: 0;
	}
	.timeline-body > p,
	.timeline-body > ul {
		padding:0 20px 20px 20px;
		margin-bottom: 0;
	}
		.timeline-body > p + p {
		  margin-top: 5px;
		}

	.timeline-footer{
		background-color:#f4f4f4;
		padding: 10px;
		text-align: center;		
	}
		.timeline-footer > a{
			padding:20px;
			cursor: pointer;
			text-decoration: none;
		}

/*Placement small devices*/
@media (max-width: 850px) {
     ul.timeline:before { 
 		    bottom: -15px;
  }
    ul.timeline:before, .arrowhead {
        left: 10px;    
    }
  
    ul.timeline > li {
	  min-height: 50px;
      margin-bottom: 20px;
      padding-right: 5px;
      position: relative;
      width:100%;
      float: left;
      clear: left;
    }
    ul.timeline > li > .timeline-panel {
        width: calc(100% - 40px);
        width: -moz-calc(100% - 40px);
        width: -webkit-calc(100% - 40px);
    }


    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
    
	.timeline > li.timeline-inverted{
		float: left; 
		clear: left;
		margin-top: 0;
		margin-bottom: 20px;
	}

  ul.timeline > li > .timeline-badge, ul.timeline > li.timeline-inverted > .timeline-badge{
    left: 15.5px;
  }   
	ul.timeline > li > .timeline-badge:before, ul.timeline > li.timeline-inverted > .timeline-badge:before{
    left: -11.5px;
	}
}

.timeline-verted{
	border-right: 1px solid #ccc;
}


</style>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="uni_mainWrapper syllabus-section" style="min-height:500px;"> 
								<div class="container"> 
									<div class="row">  
										<div class="col-md-12">
											<button type="button" style="float:right" class="btn btn-info btn-sm" data-toggle="modal" id="modal_button" data-target="#myModal">Add Remarks</button>
							
											 <section class="page">    
														<ul id="timeline" class="timeline">
															<div class="arrowhead"></div>
															<?php 
															$i=1;
															//echo "<pre>";print_r($activity);
															if(!empty($activity)){
																foreach($activity as $activity_result){
															?>
															<li class="<?php if($i%2 == 0){?>timeline-inverted<?php }else{?>timeline-verted<?php }?> ">
																<div class="timeline-badge"><?=date("Y",strtotime($activity_result['created_on']))?> </div>
																<div class="timeline-panel">   
																	<div class="timeline-heading">
																		<h3 class="timeline-title"><p><?=$activity_result['title']?> <span style="float:right"><?=date("d M,Y H:i A",strtotime($activity_result['created_on']))?></span></p></h3> 
																		<p class="para_class"><?=$activity_result['description']?></p>
																		<?php if($activity_result['remark'] != ""){?>
																		<span class="text para_class"><?=$activity_result['remark']?></span><br>
																		<?php }?>
																		<?php if($activity_result['single_file'] != ""){?>
																		<small class="text para_class"><a href="<?=$activity_result['single_file']?>" target="_blank">Click to View</a></small><br>
																		<?php }?>
																		<?php if($activity_result['multiple_files'] != ""){
																			$exp = explode("@@@",$activity_result['multiple_files']);
																		if(!empty($exp)){
																			for($i=0;$i<count($exp)-1;$i++){
																		?>
																		<small class="text para_class"><a href="<?=$exp[$i]?>" target="_blank">Click to View</a></small>
																		<?php }?>
																		<br>
																		
																		<br>
																		<?php }}?>
																		<?php if($activity_result['link'] != ""){?>
																		<small class="text para_class"><a href="<?=$activity_result['link']?>" target="_blank">Click to View Video</a></small><br>
																		<?php }?>
																		<!--<small class="para_class"><a href="javascript:void(0)"><?=date("d/m/Y H:i:s",strtotime($activity_result['created_on']))?></a></small>-->
																	</div> 
																	<div class="timeline-body"> 
																	</div> 
																</div>
															</li> 
															<?php $i++;}}?>
														</ul>
													</div>   
												</section>
												 
											</ul>
										</div>  
									</div> 
								</div>  
    						</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	  <form method="post" enctype="multipart/form-data" name="remark_form" id="remark_form"> 
      <div class="modal-body">
	  <div class="form-group">
	  <label>Remark*</label>
	  <textarea name="remark" id="remark" rows="5" class="form-control"></textarea>
	  </div>
	  <div class="form-group"> 
	  <label>Files</label>
	  <input type="file" name="userfile[]" multiple class="form-control"> 
	  </div>
       <input type="hidden" name="student_id" value="<?=$this->uri->segment(2)?>">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>
<?php include('footer.php');?>
<script> 
$('#remark_form').validate({
		rules: {
			remark: {
				required: true,
			}, 
		},
		messages: {
			remark: {
				required: "Please enter remark",
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
</script>
