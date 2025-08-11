<?php include('header.php') ?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <section class="pt-5 pb-3" >
         <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                  <h4 class="font-weight-bold pb-3 heading_box">Connect with our Expert</h4>
                  <div class="d-flex align-items-center py-3 mb-2 bg-white rounded shadow-sm">
                     
                     <span class="icon-color display-4 ml-2"><i class="fa fa-book fa-fw" aria-hidden="true"></i></span>
                     
                     <div class="col-sm-10">
                        <p class="h6 mb-1">Technical Issues</p>
                        <p class="text-muted m-0">Clearly describe any technical problems you're encountering with the online platform or tools.</p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center mb-2 bg-white rounded shadow-sm py-3">
                     
                        <span class="icon-color display-4 ml-2"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i></span>
                     
                     <div class="col-sm-10">
                        <p class="h6 mb-1">Content or Course-related Queries</p>
                        <p class="text-muted m-0">Ask questions about specific course content or assignments for clarification.</p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center mb-2 bg-white rounded shadow-sm py-3">
                     
                        <span class="icon-color display-4 ml-2"><i class="fa fa-building fa-fw" aria-hidden="true"></i></span>
                     
                     <div class="col-sm-10">
                        <p class="h6 mb-1">Account and Access Troubles</p>
                        <p class="text-muted m-0">Report any login or account-related issues, such as forgotten passwords or difficulties accessing your student account.</p>
                     </div>
                  </div>
                 
               </div>
               <div class="col-md-6">
			   <h4 class="font-weight-bold pb-3 heading_box">Fill the details to get clearance</h4>
                  <div>
						<div class="shadow-sm rounded bg-white mb-3">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Enter your details</h6>
                        <p class="mb-0 mt-0 small">
                        </p>
                     </div>
						 <div class="box-body p-3">
							<form id="feedback_form" method="post" class="js-validate">
							   <div class="row">
								  <!-- Input -->
								  <div class="col-sm-12 mb-2">
									 <div class="js-form-message">
										<label id="full_name" class="form-label">
										Enter your query/feedback
										<span class="text-danger">*</span>
										</label>
										<div class="form-group">
										   <textarea rows="5" class="form-control" name="feedback" id="feedback" placeholder="Enter your name" aria-label="Enter your name" aria-describedby="nameLabel" data-msg="Please enter details." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
										</div>
									 </div>
								  </div> 
								</div> 
								<div class="button py-3 d-flex justify-content-end">
									<button type="submit"  class="btn btn-success btn-lg py-2 px-3"><a class="text-white h6">Submit </a></button>
								</div>
							</form>
						</div>
					</div>
				   </div>
               </div>
			   
			    <div class="col-md-12">
			   <h4 class="font-weight-bold pb-3 heading_box">My Query/Feedback List</h4>
                  <div>
						<div class="shadow-sm rounded bg-white mb-3">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">All query/feedback list</h6>
                        <p class="mb-0 mt-0 small">
                        </p>
                     </div>
						 <div class="box-body p-3">
							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Sr. No.</th>  
										<th>Date</th> 
										<th>Feedback</th>  
										<th>Response</th>  
									</tr>
								</thead>
								<tbody>
									<?php $i=1;if(!empty($feedback)){ foreach($feedback as $feedback_result){?>
									<tr>
										<td><?=$i++?></td>
										<td><?=date("d/m/Y",strtotime($feedback_result->created_on))?></td>
										<td><?=$feedback_result->feedback?></td>
										<td><?=$feedback_result->reply?></td>
									</tr>
									<?php }}?>
								</tbody>
							</table>
						</div>
					</div>
				   </div>
               </div>
            </div>
         </div>
      </section>
<?php include('footer.php') ?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
// $(document).ready(function(){
   $('#feedback_form').validate({
      rules:{
			feedback:{
				required:true,
			}, 
		},
		messages:{
			feedback:{
				required:"Please enter your query",
			}, 
		} 
   }); 
</script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
  $(function(){
    $( "#birth_date" ).datepicker();
  });
</script>
