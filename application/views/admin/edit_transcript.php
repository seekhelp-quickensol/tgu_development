<?php 
// echo "<pre>";print_r($details);exit;
include('header.php');?>
<style>
.modal-dialog {
  min-width: 100%;
  min-height: 100%;
  padding: 0;
}

.modal-content {
  height: 100%;
  border-radius: 0;
}
	table, th, td, tr, tbody, thead {
  border: 1px solid;
}
.ui-datepicker-calendar{
	border:none !important;
}
.ui-datepicker-calendar tr, td{
	border:none !important;
}
.ui-datepicker-calendar thead{
	border:none !important;
}
.ui-datepicker-calendar tbody{
	border:none !important;
}


</style> 
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transcript Application</h4>
                  <p class="card-description">
                    
                  </p>
            
						<div class="col-lg-12" style="display:block;">
						<?php if(!empty($transcript)){?>
						<form onsubmit="return checkSubject();" class="form-horizontal" name="transcript_form" id="transcript_form" method="post">
		<div class="panel-body">
			<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="email">Name</label>
						<input id="name" required="" name="name" type="text" readonly="" placeholder="Name" class="form-control" value="<?php if(!empty($transcript)){ echo $transcript->student_name;}?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="message">Enrollment Number</label>
						<input type="text" required="" readonly="" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="<?php if(!empty($transcript)){ echo $transcript->enrollment_number;}?>">
						<input type="hidden" required="" readonly="" class="form-control" id="id" name="id" placeholder="" value="<?php if(!empty($transcript)){ echo $transcript->id;}?>">
					</div>			
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="message">Branch</label>
							<input type="text" required="" class="form-control" id="branch" name="branch" placeholder="Branch Name" readonly="" value="<?php if(!empty($transcript)){ echo $transcript->stream_name;}?>">
					</div>			
				</div>	
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="message">Degree Received</label>
						<input type="text" required="" class="form-control" id="degree_received" name="degree_received" placeholder="Degree Received" readonly="" value="<?php if(!empty($transcript)){ echo $transcript->print_name;}?>">
					</div>			
				</div>	
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="message">Course Duration</label>
						<select required="" class="form-control" id="duration_of_course" name="duration_of_course">
							<option value="">Select Duration</option>
							<option value="1" <?php if(!empty($transcript) && $transcript->course_duration == 1){ ?>selected="selected"<?php }?>>1</option>
							<option value="2" <?php if(!empty($transcript) && $transcript->course_duration == 2){ ?>selected="selected"<?php }?>>2</option>
							<option value="3" <?php if(!empty($transcript) && $transcript->course_duration == 3){ ?>selected="selected"<?php }?>>3</option>
							<option value="4" <?php if(!empty($transcript) && $transcript->course_duration == 4){ ?>selected="selected"<?php }?>>4</option>
							<option value="5" <?php if(!empty($transcript) && $transcript->course_duration == 5){ ?>selected="selected"<?php }?>>5</option>
						</select>
					</div>
				</div>			
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="message">Year of Passing</label>
						<input type="text" required="" class="form-control" id="year_of_passing" name="year_of_passing" placeholder="Year of Passing" value="<?php if(!empty($transcript)){ echo $transcript->year_of_passing;}?>">
					</div>			
				</div> 
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="message">Issue Date</label>
						<input type="text" class="form-control datepicker" autocomplete="off" id="issue_date" name="issue_date" placeholder="Issue Date" value="<?php if(!empty($transcript) && $transcript->issue_date != "1970-01-01" && $transcript->issue_date != "0000-00-00"){ echo date("d-m-Y",strtotime($transcript->issue_date));}?>">
					</div>			
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="message">Credit Note</label>
						<input type="text" class="form-control" id="credit_note" name="credit_note" placeholder="Credit Note" value="<?php if(!empty($transcript)){ echo $transcript->credit_note;}?>">
					</div>
				</div>	

				<div class="col-md-4">
					<div class="form-group">
						<a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Veiw Credit Calendar</a>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  					<div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Credit Chart</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<table class="table">
							  <thead>
								<tr>
								  <th>Sr.No</th>
								  <th>Course</th>
								  <th>1</th>
								  <th>2</th>
								  <th>3</th>
								  <th>4</th>
								  <th>5</th>
								  <th>6</th>
								  <th>7</th>
								  <th>8</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <th scope="row">1</th>
								  <th>MECHANICAL</th>
								  <td>25</td>
								  <td>28</td>
								  <td>25</td>
								  <td>29</td>
								  <td>28</td>
								  <td>25</td>
								  <td>30</td>
								  <td>18</td>
								</tr>
								<tr>
								  <th scope="row">2</th>
								  <th>CIVIL</th>
								  <td>25</td>
								  <td>28</td>
								  <td>29</td>
								  <td>30</td>
								  <td>27</td>
								  <td>29</td>
								  <td>30</td>
								  <td>24</td>
								</tr>
								<tr>
								  <th scope="row">3</th>
								  <th>COMPUTER SCIENCE</th>
								  <td>25</td>
								  <td>28</td>
								  <td>25</td>
								  <td>28</td>
								  <td>29</td>
								  <td>29</td>
								  <td>29</td>
								  <td>21</td>
								</tr>
								<tr>
								  <th scope="row">4</th>
								  <th>ELECTRONICS AND COMMUNICATION</th>
								  <td>25</td>
								  <td>28</td>
								  <td>25</td>
								  <td>30</td>
								  <td>26</td>
								  <td>25</td>
								  <td>24</td>
								  <td>18</td>
								</tr>
								<tr>
								  <th scope="row">5</th>
								  <th>ELECTRICAL AND ELECTRONICS</th>
								  <td>25</td>
								  <td>28</td>
								  <td>25</td>
								  <td>32</td>
								  <td>29</td>
								  <td>29</td>
								  <td>27</td>
								  <td>18</td>
								</tr>
								<tr>
								  <th scope="row">6</th>
								  <th>INFORMATION TECHNOLOGY</th>
								  <td>25</td>
								  <td>28</td>
								  <td>29</td>
								  <td>31</td>
								  <td>29</td>
								  <td>30</td>
								  <td>31</td>
								  <td>18</td>
								</tr>
								<tr>
								  <th scope="row">7</th>
								  <th>CHEMICAL ENGINEERING</th>
								  <td>25</td>
								  <td>28</td>
								  <td>27</td>
								  <td>27</td>
								  <td>29</td>
								  <td>27</td>
								  <td>28</td>
								  <td>15</td>
								</tr>
								<tr>
								  <th scope="row">8</th>
								  <th>AERONAUTICAL</th>
								  <td>25</td>
								  <td>28</td>
								  <td>28</td>
								  <td>28</td>
								  <td>28</td>
								  <td>28</td>
								  <td>28</td>
								  <td>21</td>
								</tr>
								<tr>
								  <th scope="row">9</th>
								  <th>APPLIED ELECTRONICS AND INSTRUMENTATION</th>
								  <td>25</td>
								  <td>28</td>
								  <td>27</td>
								  <td>28</td>
								  <td>29</td>
								  <td>29</td>
								  <td>26</td>
								  <td>24</td>
								</tr>
								<tr>
								  <th scope="row">10</th>
								  <th>AUTOMOBILE</th>
								  <td>25</td>
								  <td>28</td>
								  <td>25</td>
								  <td>30</td>
								  <td>28</td>
								  <td>28</td>
								  <td>26</td>
								  <td>18</td>
								</tr>
								<tr>
								  <th scope="row">11</th>
								  <th>BIOMEDICAL</th>
								  <td>25</td>
								  <td>28</td>
								  <td>28</td>
								  <td>31</td>
								  <td>28</td>
								  <td>26</td>
								  <td>26</td>
								  <td>18</td>
								</tr>
								<tr>
								  <th scope="row">12</th>
								  <th>BIOTECHNOLOGY</th>
								  <td>25</td>
								  <td>28</td>
								  <td>28</td>
								  <td>31</td>
								  <td>31</td>
								  <td>28</td>
								  <td>28</td>
								  <td>21</td>
								</tr>
								<tr>
								  <th scope="row">13</th>
								  <th>FIRE AND SAFETY</th>
								  <td>25</td>
								  <td>28</td>
								  <td>28</td>
								  <td>31</td>
								  <td>30</td>
								  <td>24</td>
								  <td>28</td>
								  <td>24</td>
								</tr>
								<tr>
								  <th scope="row">13</th>
								  <th>PETROLEUM</th>
								  <td>25</td>
								  <td>28</td>
								  <td>25</td>
								  <td>28</td>
								  <td>27</td>
								  <td>27</td>
								  <td>23</td>
								  <td>18</td>
								</tr>
								<tr>
								  <th scope="row">14</th>
								  <th>PRODUCTION</th>
								  <td>25</td>
								  <td>28</td>
								  <td>31</td>
								  <td>30</td>
								  <td>30</td>
								  <td>27</td>
								  <td>30</td>
								  <td>21</td>
								</tr> 
								<tr>
								  <th scope="row">15</th>
								  <th>MINING</th>
								  <td>25</td>
								  <td>28</td>
								  <td>24</td>
								  <td>29</td>
								  <td>21</td>
								  <td>29</td>
								  <td>27</td>
								  <td>21</td>
								</tr>
								<tr>
								  <th scope="row">16</th>
								  <th>INSTRUMENTATION AND CONTROL</th>
								  <td>25</td>
								  <td>28</td>
								  <td>29</td>
								  <td>29</td>
								  <td>29</td>
								  <td>29</td>
								  <td>29</td>
								  <td>21</td>
								</tr>
								<tr>
								  <th scope="row">17</th>
								  <th>FOOD TECHNOLOGY</th>
								  <td>25</td>
								  <td>28</td>
								  <td>25</td>
								  <td>25</td>
								  <td>24</td>
								  <td>27</td>
								  <td>26</td>
								  <td>21</td>
								</tr>
								<tr>
								  <th scope="row">18</th>
								  <th>MECHATRONICS</th>
								  <td>25</td>
								  <td>28</td>
								  <td>31</td>
								  <td>30</td>
								  <td>29</td>
								  <td>30</td>
								  <td>30</td>
								  <td>21</td>
								</tr>
								<tr>
								  <th scope="row">19</th>
								  <th>ELECTRONICS AND TELE COMMUNICATION</th>
								  <td>25</td>
								  <td>28</td>
								  <td>25</td>
								  <td>30</td>
								  <td>26</td>
								  <td>25</td>
								  <td>24</td>
								  <td>18</td>
								</tr>
								 
							  </tbody>
							</table>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  </div>
						</div>
					  </div>
					</div>
				</div>			
			</div>
			<?php if(!empty($transcript)){?>
			
			<div class="panel-body">
				<div class="col-md-12">
					<div class="row">
						<?php 
						$credit_sem=1;
						$xp_credit = explode(",",$transcript->sem_credit);
						$cc=0;
						for($d=1;$d<=$transcript->year_sem;$d++){?>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="email">Credit for <?=$credit_sem++?> Year/Sem</label>
								<input id="name" required="" name="credit_sem_wise[]" type="text" placeholder="" class="form-control" value="<?php if(!empty($xp_credit[$cc])){ echo $xp_credit[$cc];}?>">
							</div>
						</div>
						<?php $cc++;}?>
					</div>
				</div>
			</div>
			<?php }?>
			
			
				<hr style="border:1px solid #eee !important;margin:10px 0;">
				<div class="col-md-12">
					<div class="col-md-6 col-md-offset-5">
						<div class="form-group">
							<label class="control-label" for="message">Fill below details</label>
							
						</div>	
					</div>
				</div>
				<hr style="border:1px solid #eee !important;margin:10px 0;">
					<div class="optionBox">
					    <?php if(!empty($details)){ foreach($details as $details_result){?>
					    <div class="block">
							<div class="col-md-12">
				                <div class="row">
				                    <div class="col-md-2">
        								<label class="control-label" for="message">Sem/Year</label>
								        <input type="text" readonly class="form-control" id="sem1" name="sem[]" value="<?=$details_result->sem?>"> 
							        </div>
						            <div class="col-md-4">
							    	    <label class="control-label" for="message">Subject</label>
								        <input type="text" readonly class="form-control" id="subject1" name="subject[]" placeholder="Type only one Subject in one box" value="<?=$details_result->subject?>">
							        </div> 
						            <div class="col-md-2">
							        	<label class="control-label" for="message">Type</label>
								        <select class="form-control" id="type1" name="type[]">
									        <option value="Theory" <?php if($details_result->type == "Theory"){?>selected="selected"<?php }?>>Theory</option>
									        <option value="Practical" <?php if($details_result->type == "Practical"){?>selected="selected"<?php }?>>Practical</option>
								        </select>
							         </div> 
            						<div class="col-md-2"> 
            							<label class="control-label" for="message">Max Marks</label>
            							<input type="text"  class="form-control" id="max_mark1" name="max_mark[]" placeholder="Max Mark" value="<?=$details_result->max_mark?>">
							        </div> 
            						<div class="col-md-2"> 
        								<label class="control-label" for="message">Marks Obtained</label>
        								<input type="text"  class="form-control" id="obtained1" name="obtained[]" placeholder="Marks Obtained" value="<?=$details_result->obtained?>">
        							</div>
        							
        						</div>
        						<span class="remove"><i class="fa fa-minus btn btn-danger"></i></span>
        					</div>
        				</div>
        			 	<?php }}?>
						 
            		<div class="col-md-4 col-md-offset-4" style="margin-top:5%">
						<button type="submit" class="btn btn-primary">Update Transcript</button> 
					</div>
				</div>
				
		
				</div>
	
	</div>

<div class="row">
     	
    
</div>
 

</div></div></form>
						<?php }?>
						</div>
							<div class="container" id="container">
					 
      
	</div>



							 

                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>

<script>
var x=1;
$('.add').click(function() {
	x++;
    $('.block:last').before('<div class="block"><div class="col-md-12"><div class="row"><div class="col-md-2"> <div class="form-group"> 	<label class="control-label" for="message">Sem/Year</label> <select class="form-control" id="sem'+x+'" name="sem[]"> <option value="">Select Sem/Year</option>  <option value="1">1</option>  <option value="2">2</option>  <option value="3">3</option>  <option value="4">4</option>  <option value="5">5</option>  <option value="6">6</option>  <option value="7">7</option>  <option value="8">8</option>  <option value="9">9</option>  <option value="10">10</option>  <option value="11">11</option>  <option value="12">12</option>  </select> </div> </div><div class="col-md-4"> <div class="form-group"> <label class="control-label" for="message">Subject</label> <input type="text" class="form-control" id="subject'+x+'" name="subject[]" placeholder="Type only one Subject in one box" value=""> </div> </div> <div class="col-md-2"> <div class="form-group"> <label class="control-label" for="message">Type</label> 	<select class="form-control" id="type'+x+'" name="type[]"> <option value="Theory">Theory</option> <option value="Practical">Practical</option> </select> </div> </div>  <div class="col-md-2"> <div class="form-group"> <label class="control-label" for="message">Max Marks</label> <input type="text" class="form-control" id="max_mark'+x+'" name="max_mark[]" placeholder="Max Mark" value=""> </div> </div><div class="col-md-2"> <div class="form-group"> <label class="control-label" for="message">Marks Obtained</label> <input type="text" class="form-control" id="obtained'+x+'" name="obtained[]" placeholder="Marks Obtained" value=""> </div> </div>	</div><span class="remove"><i class="fa fa-minus btn btn-danger"></i></span></div></div>');
	
});
$('.optionBox').on('click','.remove',function() {
    $(this).parent().remove();
});

function checkSubject(){
	if (document.getElementById("sem1").value.length==0 || document.getElementById("subject1").value.length==0 || document.getElementById("type1").value.length==0 || document.getElementById("obtained1").value.length==0 || document.getElementById("max_mark1").value.length==0)
	{ 
		alert ("Please fill all fields for subject 1");
		return false;
		
	}
   for(i=2;i<=100;i++){
		if (document.getElementById("sem" + i).value.length!=0 || document.getElementById("subject" + i).value.length!=0 || document.getElementById("type" + i).value.length!=0 || document.getElementById("obtained" + i).value.length!=0 || document.getElementById("max_mark" + i).value.length!=0)
			if (document.getElementById("sem" + i).value.length==0 || document.getElementById("subject" + i).value.length==0 || document.getElementById("type" + i).value.length==0 || document.getElementById("obtained" + i).value.length==0 || document.getElementById("max_mark" + i).value.length==0)
			{
				alert ("Please fill all fields for subject " + i);
				return false;
				
			}   
	}
		
}
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate:0,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
  } );
</script>