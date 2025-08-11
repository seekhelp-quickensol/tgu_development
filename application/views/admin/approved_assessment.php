<?php include('header.php');?>

<style>

  table  a {

    color: #fff !important;

}

</style>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

		<!-- <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

				  <div class="card">

					<div class="card-body">

					   <h4 class="card-title">Student Self Assements</h4><p class="card-description">

						<div class="col-md-12">

							<form method="get">

							   <div class="row">

									<div class="col-md-4">

										<label>Start Date</label>

										<input type="text" autocomplete="off" class="form-control datepicker" name="start_date" id="start_date"> 

									</div>

									<div class="col-md-4">

										<label>End Date</label>

										<input type="text" autocomplete="off" class="form-control datepicker" name="end_date" id="end_date"> 

									</div>

									<div class="col-md-4">

										<button class="btn btn-primary" type="submit" name="search" value="Search">Search</button> 

									</div> 

							   </div>

						   </form>

						  

						  </div>

					</div>

				</div>		

				</div>		

			</div>		 -->

            <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

				  <div class="card">

					<div class="card-body">

					   <h4 class="card-title">Search Record</h4><p class="card-description">

						<div class="col-md-12">

							<form method="get">

							   <div class="row">

                               <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Assessment *</label>
                                        <select class="form-control js-example-basic-single select2_single" name="assessment_name" id="assessment_name" style="color: #454545;"> 
                                            <option value="">Select Assessment</option> 
                                            <option value="0" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == "0"){?> selected="selected" <?php }?>>Student Assessment</option>
                                            <option value="1" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == "1"){?> selected="selected" <?php }?>>Teacher Assessment</option>
                                            <option value="2" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == '2'){?> selected="selected" <?php }?>>Student Assignment</option>
                                            <option value="3" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == '3'){?> selected="selected" <?php }?>>Industry Assessment</option>
                                            <option value="4" <?php if(isset($_GET['assessment_name']) && $_GET['assessment_name'] == '4'){?> selected="selected" <?php }?>>Guardian Assessment</option>
                                        
                                        </select>
                                    </div>
                                </div> 

									<!-- <div class="col-md-3">

											<div class="form-group"> 

											<label>Year</label>

											<select class="form-control js-example-basic-single select2_single" name="year" id="year" style="color: #454545;"> 

												<option value="">Year</option>

												<?php for($i="2024";$i<=date("Y");$i++){?>

												<option value="<?=$i?>" <?php if(isset($_GET['year']) && $_GET['year'] == $i){?> selected="selected" <?php }?>><?=$i?></option>

												<?php }?>

											</select>

										</div>

									</div> -->

									<div class="col-md-3">

										<div class="form-group">

											<label>Enrollment Number</label>

											<input type="text" autocomplete="off" class="form-control" name="enrollment_number" id="enrollment_number" value="<?php if(isset($_GET['enrollment_number'])){ echo $_GET['enrollment_number'];}?>" style="color: #454545;" placeholder="Enrollment Number"> 

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Course</label>

											<select class="form-control js-example-basic-single select2_single" name="course" id="course" style="color: #454545;"> 

												<option value="">Select Course</option>

												<?php if(!empty($course)){ foreach($course as $course_result){?>

												<option value="<?=$course_result->id?>" <?php if(isset($_GET['course']) && $_GET['course'] ==$course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>

												<?php }}?>

											</select>

										</div>

									</div>



                                    <div class="col-md-3">

										<div class="form-group">

											<label>Stream</label>

											<select class="form-control js-example-basic-single select2_single" name="stream" id="stream" style="color: #454545;"> 

												<option value="">Select Stream</option>

												<!-- <?php if(!empty($stream)){ foreach($stream as $stream_result){?>

												<option value="<?=$stream_result->id?>" <?php if(isset($_GET['stream']) && $_GET['stream'] ==$stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>

												<?php }}?> -->

											</select>

										</div>

									</div>


                                    <div class="col-md-3">

										<div class="form-group">

											<label>Year/Sem</label>

											<select class="form-control js-example-basic-single select2_single" name="year_sem" id="year_sem" style="color: #454545;"> 

												<option value="">Select Year/Sem</option>

												<?php for($i=1;$i<=12;$i++){?>

                                                <option value="<?=$i?>" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == $i){?> selected="selected" <?php }?>><?=$i?></option>

                                                <?php }?>


											</select>

										</div>

									</div>

        
									<div class="col-md-12">
                                        
										<button class="btn btn-primary search_button" type="submit" name="search"  value="Search">Search</button> 
                                        <a href="<?=base_url();?>approved_assessment" class="btn btn-danger">Reset</a>
									</div> 

							   </div>

						   </form>
						  </div>

					</div>

				</div>		

				</div>		

			</div>	




<div class="row">
<div class="col-md-12 grid-margin stretch-card">

<div class="card">

  <div class="card-body">

     <h4 class="card-title">
         Approved Assessments
    </h4>
    <p class="card-description">

   
      <div class="clearfix"></div><br>

      <table  style="width:100%" id="example" class="table table_account table-striped datatable_parent">

      <thead class="">
          <h4 class="statement_title title_padding">
          <?php if(isset($_GET['assessment_name'])) { ?>
            <?php if($_GET['assessment_name'] == "0"){ ?>  
                Approved Self Assessment Student
            <?php }else if($_GET['assessment_name'] == "1"){ ?>  
                Approved Teacher Assessments
            <?php }else if($_GET['assessment_name'] == "2"){ ?>  
                Approved Student Assignment
            <?php }else if($_GET['assessment_name'] == "3"){ ?>  
                Approved Industry Assessment
            <?php }else if($_GET['assessment_name'] == "4"){ ?>  
                Approved Guardian Assessment
            <?php } ?>
            <?php } ?>
                
         </h4>

          <tr class="">

              <th >Sr No</th>

              <th>Center Name</th> 
                
                <th>Mode</th> 
                
              <th>Year/Sem</th> 

              <th> Student Name</th>

              <th>Date</th>

              <th> File </th>

              <th> Updated By </th>

              <th> Updated On </th>

          </tr>

      </thead>

      <tbody>

          <?php 

       if(!empty($self_assement)){

          $i=1;

          foreach($self_assement as $self_assement){

              if($self_assement->file !=""){

             ?>

          <tr>

              <td class="center"><?=$i?></td>

              <td><?=$self_assement->center_name?></td>
              
                <?php if($self_assement->course_mode == '1'){?>
    			    <td>Year</td>
    			<?php }else if($self_assement->course_mode == '2'){?>
    			    <td>Sem</td>
    		    <?php }else{?>
    		        <td>-</td>
    		    <?php }?>

              <td><?=$self_assement->year_sem?></td>

              <td><?=$self_assement->student_name?></td>

              <td><?=date("d-m-Y",strtotime($self_assement->created_on))?></td>

            

              <td>
                <?php if($_GET['assessment_name'] == "0"){ ?>
                                    
                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/self_assement/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                <?php }else if($_GET['assessment_name'] == "1"){?>
                
                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/teacher_assement/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                <?php }else if($_GET['assessment_name'] == "2"){?>
                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/assignment/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                <?php }else if($_GET['assessment_name'] == "3"){?>
                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/industry_assesment/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                <?php }else if($_GET['assessment_name'] == "4"){?>
                    <a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/industry_assesment/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a></td>
                <?php }?>    
              
              </td>

              <td><?=$self_assement->first_name?> <?=$self_assement->last_name?></td>

              <td><?=date("d-m-Y",strtotime($self_assement->updated_on))?></td>

          </tr>

          <?php $i++; }}} else{ ?>

          <tr>

              <td class="text-center" colspan="8">No Data Available</td>

          </tr>

          <?php } ?>

         

      </tbody>

  </table>

</div> 

</div>
          </div>
          </div>





















          <!-- <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Approved Student Self Assements</h4><p class="card-description">

                 <p class="card-description">

                 List of all Approved Self assesment   

                  </p> 

					<div class="clearfix"></div><br>

					<table  style="width:100%" id="example" class="table table_account table-striped datatable_parent">

					<thead class="">

						<h4 class="statement_title title_padding">Approved Self Assessment Student</h4>

						<tr class="">

							<th >Sr No</th>

							<th>Center Name</th> 

							<th>Year/Sem</th> 

							<th> Student Name</th>

							<th>Date</th>

							<th> File </th>

							<th> Updated By </th>

							<th> Updated On </th> -->

                             <!-- <th>Action</th>

                            <th>Reject</th>  -->

						<!-- </tr>

					</thead>

					<tbody>

						<?php 

					 if(!empty($self_assement)){

						$i=1;

						foreach($self_assement as $self_assement){

							if($self_assement->file !=""){

						   ?>

						<tr>

							<td class="center"><?=$i?></td>

							<td><?=$self_assement->center_name?></td>

							<td><?=$self_assement->year_sem?></td>

							<td><?=$self_assement->student_name?></td>

							<td><?=date("d-m-Y",strtotime($self_assement->created_on))?></td>

						  

							<td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/self_assement/'.$self_assement->file)?>" target="_blank" class="btn btn-primary">View</a>

                            </td>

							<td><?=$self_assement->first_name?> <?=$self_assement->last_name?></td>

                    	

							<td><?=date("d-m-Y",strtotime($self_assement->updated_on))?></td> -->

                            <!-- <td>

                                <a href="<?base_url()?>approve_assesment/<?=$self_assement->id?>/tbl_self_assesments" onclick="return confirm('Do You Want To Approve This Assesment File?');" class="btn btn-primary">Approve</a>

                                </td>

                                <td>

                                <form name="rejection_remark_form" id="rejection_remark_form" action="<?base_url()?>reject_assesment/<?=$self_assement->id?>/tbl_self_assesments">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark" name="rejection_remark" width="100"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                    <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                        <button type="submit" class="btn btn-primary">Reject</button>

                            </div>

                                    </div>

                                </div>                                

                                </div>

                                

                                </form>

                            </td> -->

							

						<!-- </tr>

						<?php $i++; }}} else{ ?>

						<tr>

							<td class="text-center" colspan="8">No Data Available</td>

						</tr>

						<?php } ?>

					   

					</tbody>

				</table>

			</div> 

		</div>

	</div>

	<div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Approved Teacher Assements</h4><p class="card-description">

                 <p class="card-description">

                 List of all Approved Teacher   

                  </p> 

					<div class="clearfix"></div><br>

					<table id="student_table" style="width:100%" class="table table_account table-striped datatable_parent">

						<thead class="">

							<h4 class="statement_title title_padding">Approved Teacher Assessment </h4>

							<tr class="">

							<tr class="">

								<th>Sr No</th>

							<th>Center Name</th> 

								<th>Year/Sem</th>

								 

								<th> Student Name</th>

								<th> Date</th>

								<th> File </th>

								<th>Updated By</th>

								<th>Updated On</th> -->

                            <!-- <th>Action</th>

                            <th>Reject</th> -->

							<!-- </tr>



							</tr>

						</thead>

						<tbody>

                <?php 

             if(!empty($teacher_assement)){

                $i=1;

                foreach($teacher_assement as $teacher_assement_result){

					if($teacher_assement_result->file !=""){

                   ?>

                <tr>

                    <td class="center"><?=$i?></td>

					<td><?=$teacher_assement_result->center_name?></td>

                    <td><?=$teacher_assement_result->year_sem?></td>

                    <td><?=$teacher_assement_result->student_name?></td>

                    <td><?=date("d-m-Y",strtotime($teacher_assement_result->created_on))?></td>

                  

                    <td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/teacher_assement/'.$teacher_assement_result->file)?>" target="_blank" class="btn btn-primary">View</a>

                    <td><?=$teacher_assement_result->first_name?> <?=$teacher_assement_result->last_name?></td>

					<td><?=date("d-m-Y",strtotime($teacher_assement_result->updated_on))?></td> -->

					<!-- </td>

                    <td>    

                    <a href="<?base_url()?>approve_assesment/<?=$teacher_assement_result->id?>/tbl_teacher_assesments" onclick="return confirm('Do You Want To Approve This Assesment File?');" class="btn btn-primary">Approve</a>

                    </td>    -->

                    <!-- <td> 

                    <form name="rejection_remark_teacher_form" id="rejection_remark_teacher_form" action="<?base_url()?>reject_assesment/<?=$teacher_assement_result->id?>/tbl_teacher_assesments">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark_teacher" name="rejection_remark_teacher" width="100"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                    <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                        <button type="submit" class="btn btn-primary">Reject</button>

                            </div>

                                    </div>

                                </div>                                

                                </div>

                                

                                </form>

                            </td> -->

                    



                <!-- </tr>

			 <?php $i++; }} }else{ ?>

                <tr>

                    <td class="text-center" colspan="8">No Data Available</td>

                </tr>

                <?php } ?>

               

            </tbody>

        </table>

</div>

</div>

</div>

<div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Approved Student Assignment</h4><p class="card-description">

                 <p class="card-description">

                    List of all Approved Assignments 

                  </p> 

					<div class="clearfix"></div><br>	

 

			<table id="separate_student_table" class="table table_account table-striped datatable_parent"  style="width:100%">

            <thead class="">

            <h4 class="statement_title title_padding">Approved Student Assignment </h4>

              

            <tr class="">

                    <th>Sr No</th>

							<th>Center Name</th> 

                    <th>Year/Sem</th> 

                    <th> Title</th>

                    <th> Student Name</th>

                    <th> Date</th>

                    <th> File </th>

                    <th>Updated By</th>

                    <th>Updated On</th> -->

                    <!-- <th>Action</th>

                            <th>Reject</th> -->

                <!-- </tr>

            </thead>

            </tr>

            </thead>

            <tbody>

                <?php 

             if(!empty($assignment)){

                $i=1;

                foreach($assignment as $assignment_result){

					if($assignment_result->file !=""){

                   ?>

                <tr>

                    <td class="center"><?=$i?></td>

					 <td><?=$assignment_result->center_name?></td>

                    <td><?=$assignment_result->year_sem?></td>

                   <td><?=$assignment_result->assignment_title?></td>
                    <td><?=$assignment_result->student_name?></td>

					<td><?=date("d-m-Y",strtotime($assignment_result->created_on))?></td>

                    <td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/assignment/'.$assignment_result->file)?>" target="_blank" class="btn btn-primary">View</a>

                    </td>

					<td><?=$assignment_result->first_name?> <?=$assignment_result->last_name?></td>

					<td><?=date("d-m-Y",strtotime($assignment_result->updated_on))?></td> -->

                    <!-- <td>    

                    <a href="<?base_url()?>approve_assesment/<?=$assignment_result->id?>/tbl_assignment" onclick="return confirm('Do You Want To Approve This Assignment File?');" class="btn btn-primary">Approve</a>

                    </td> 

                    <td>   

                    <form name="rejection_remark_assignment_form" id="rejection_remark_assignment_form" action="<?base_url()?>reject_assesment/<?=$assignment_result->id?>/tbl_assignment">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark_assignment" name="rejection_remark_assignment" width="100"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                    <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                        <button type="submit" class="btn btn-primary">Reject</button>

                                    </div>

                                    </div>

                                </div>                                

                                </div>

                                

                                </form>

                            </td> -->

                    



                <!-- </tr>

				<?php $i++; }}} else{ ?>

                <tr>

                    <td class="text-center" colspan="9">No Data Available</td>

                </tr>

                <?php } ?>

               

            </tbody>

        </table>



</div>

</div>

</div>





<div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Approved Industry Assesment</h4><p class="card-description">

                 <p class="card-description">

                 List of all Approved Industry Assesment 

                  </p> 

					<div class="clearfix"></div><br>	

 

			<table id="industry_assmsnet" class="table table_account table-striped datatable_parent"  style="width:100%">

            <thead class="">

            <h4 class="statement_title title_padding">Approved Industry Assesment </h4>

              

            <tr class="">

                    <th>Sr No</th>

					<th>Center Name</th> 

                    <th>Year/Sem</th> 

                    <th> Title</th>

                    <th> Student Name</th>

                    <th> Date</th>

                    <th> File </th>

                    <th> Updated By </th>

                    <th> Updated On </th> -->

                    <!-- <th>Action</th>

                            <th>Reject</th> -->

                <!-- </tr>

            </thead>

            </tr>

            </thead>

            <tbody>

                <?php 

             if(!empty($industry_assesment)){

                $i=1;

                foreach($industry_assesment as $industry_assesment_result){

					if($industry_assesment_result->file !=""){

                   ?>

                <tr>

                    <td class="center"><?=$i?></td>



                    <td><?=$industry_assesment_result->center_name?></td>

                    <td><?=$industry_assesment_result->year_sem?></td>

                   <td><?=$industry_assesment_result->assignment_title?></td>

                 

                    <td><?=$industry_assesment_result->student_name?></td>

                  

					<td><?=date("d-m-Y",strtotime($industry_assesment_result->created_on))?></td>

                    <td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/industry_assesment/'.$industry_assesment_result->file)?>" target="_blank" class="btn btn-primary">View</a>

                    </td> 

					<td><?=$industry_assesment_result->first_name?> <?=$industry_assesment_result->last_name?></td>

					<td><?=date("d-m-Y",strtotime($industry_assesment_result->updated_on))?></td> -->

                    <!-- <td>   

                    <a href="<?base_url()?>approve_assesment/<?=$industry_assesment_result->id?>/tbl_industry_assesment" onclick="return confirm('Do You Want To Approve This Assesment File?');" class="btn btn-primary">Approve</a>

                    </td>

                    <td>    

                    <form name="rejection_remark_form_industy" id="rejection_remark_form_industy" action="<?base_url()?>reject_assesment/<?=$industry_assesment_result->id?>/tbl_industry_assesment">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark_industry" name="rejection_remark_industry" width="100"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                    <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                        <button type="submit" class="btn btn-primary">Reject</button>

                            </div>

                                    </div>

                                </div>                                

                                </div>

                                

                                </form>

                            </td> -->

                    



                <!-- </tr>

			 <?php $i++; }}} else{ ?>

                <tr>

                    <td class="text-center" colspan="9">No Data Available</td>

                </tr>

                <?php } ?>

               

            </tbody>

        </table>



</div>

</div>

</div> -->







<!-- <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Approved Guardian Assesment</h4><p class="card-description">

                 <p class="card-description">

                 List of all Approved Guardian Assesment 

                  </p> 

					<div class="clearfix"></div><br>	

 

			<table id="guardian_assement" class="table table_account table-striped datatable_parent"  style="width:100%">

            <thead class="">

            <h4 class="statement_title title_padding">Approved Guardian Assesment </h4>

              

            <tr class="">

                    <th>Sr No</th>

                    <th>Year/Sem</th> 

                    <th> Title</th>

                    <th> Student Name</th>

                    <th> Date</th>

                    <th> File </th>

                    <th> Updated By</th>

                    <th> Updated On</th> -->

                    <!-- <th>Action</th>

                            <th>Reject</th> -->

                <!-- </tr>

            </thead>

            </tr>

            </thead>

            <tbody>

                <?php  

             if(!empty($guardian_assesment)){

                $i=1;

                foreach($guardian_assesment as $guardian_assement_result){

					if($guardian_assement_result->file !=""){

                   ?>

                <tr>

                    <td class="center"><?=$i?></td>



                    <td><?=$guardian_assement_result->year_sem?></td>

                   <td><?=$guardian_assement_result->assignment_title?></td>

                 

                    <td><?=$guardian_assement_result->student_name?></td>

                  <td><?=date("d-m-Y",strtotime($guardian_assement_result->created_on))?></td>

                    <td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/industry_assesment/'.$guardian_assement_result->file)?>" target="_blank" class="btn btn-primary">View</a>

                    </td> 

					<td><?=$guardian_assement_result->first_name?> <?=$guardian_assement_result->last_name?></td>

					<td><?=date("d-m-Y",strtotime($guardian_assement_result->updated_on))?></td> -->

                    <!-- <td>   

                    <a href="<?base_url()?>approve_assesment/<?=$guardian_assement_result->id?>/tbl_guardian_assesment" onclick="return confirm('Do You Want To Approve This Assesment File?');" class="btn btn-primary">Approve</a>

                    </td>

                    <td>  

                    <form name="rejection_remark_form_guardian" id="rejection_remark_form_guardian" action="<?base_url()?>reject_assesment/<?=$guardian_assement_result->id?>/tbl_guardian_assesment">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <textarea style="width: 100%;" class="form-control" placeholder="Enter Rejection Remark" id="rejection_remark_guardian" name="rejection_remark_guardian" width="100"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                    <div class="form-group" style="margin-top: 10px;margin-left: 40%;">

                                        <button type="submit" class="btn btn-primary">Reject</button>

                            </div>

                                    </div>

                                </div>                                

                                </div>

                                

                                </form>

                            </td> -->

                    



                <!-- </tr>

			 <?php $i++; }}} else{ ?>

                <tr>

                    <td class="text-center" colspan="8">No Data Available</td>

                </tr>

                <?php } ?>
            </tbody>
        </table>
</div>
</div>
             </div>
</div> -->
             <!-- </div>
             </div>
             </div>
             </div> -->

<section>

</section>

<?php include('footer.php');

$id = 0;

if($this->uri->segment(2) !=""){

	$id = $this->uri->segment(2);

}

?>

<script

    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>



<script>

$(document).ready(function() {



$("#rejection_remark_form").validate({

    rules: {

        rejection_remark: {

            required: true,

        },    

    },

    messages: {

        rejection_remark: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#rejection_remark_teacher_form").validate({

    rules: {

        rejection_remark_teacher: {

            required: true,

        },    

    },

    messages: {

        rejection_remark_teacher: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#rejection_remark_assignment_form").validate({

    rules: {

        rejection_remark_assignment: {

            required: true,

        },    

    },

    messages: {

        rejection_remark_assignment: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#rejection_remark_form_industy").validate({

    rules: {

        rejection_remark_industry: {

            required: true,

        },    

    },

    messages: {

        rejection_remark_industry: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});



$("#rejection_remark_form_guardian").validate({

    rules: {

        rejection_remark_guardian: {

            required: true,

        },    

    },

    messages: {

        rejection_remark_guardian: {

            required: "Please Enter Rejection Remark",

        },

    },

    submitHandler: function(form) {

        form.submit();

    },

});

});

</script>

<script>

    $(document).ready(function () {

        var table = $('#example').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    //title: 'Data in Table Format (Center)',
                    title:"Approved Self Assessment Student List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [
                            0, 1, 2, 3, 4, 6, 7
                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",
            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

</script>

<script>

    $(document).ready(function () {



        var table = $('#student_table').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    // title: 'Data in Table Format (Student)',
                    title:"Approved Teacher Assessment List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                           
                            6,

                            7


                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",



            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

</script>

<script>

    $(document).ready(function () {

        var table = $('#separate_student_table').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    // title: 'Data in Table Format (Seperate Student)',
                    title:"Approved Student Assignment List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                         5,
                           
                            7,8
                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",



            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

	 $(document).ready(function () {

        var table = $('#industry_assmsnet').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    // title: 'Data in Table Format (Seperate Student)',
                    title:"Approved Industry Assesment List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                            5,

                            

                            7,

                            8

                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",



            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

	 $(document).ready(function () {

        var table = $('#guardian_assement').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    // title: 'Data in Table Format (Seperate Student)',
                    title:"Approved Guardian Assesment List",

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                           
                            6,

                            7


                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",



            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

</script>

<script>

	function openCity(evt, cityName) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {

        tabcontent[i].style.display = "none";}

        

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {

        tablinks[i].className = tablinks[i].className.replace("active", "");}



document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += " active";}

$( function() {

	$( ".datepicker" ).datepicker({

		dateFormat:"dd-mm-yy",

		changeMonth:true,

		changeYear:true,

		/*maxDate: "-12Y",

		minDate: "-80Y",

		yearRange: "-100:-0"*/

	});

} );

</script>

<script>
    $("#course").change(function(){  
        $("#year").html("<option value=''>Select Semester/Year</option>");
        $.ajax({
            type: "GET",
            url: "<?=base_url();?>admin/Admin_controller/get_course_stream",
            data:{'course':$("#course").val()},
            success: function(data){
                // alert(data);
                $("#stream").empty();
                $('#stream').append('<option value="">Select Stream</option>');
                var opts = $.parseJSON(data);
                $.each(opts, function(i, d) {
                $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
                });
                $('#stream').trigger('change');
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            }
        });	
    });
</script>