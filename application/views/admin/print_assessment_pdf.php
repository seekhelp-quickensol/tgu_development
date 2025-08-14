<?php if(isset($_GET['type']) && $_GET['type'] == "self_Assessmen"){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Assessment & Parent Assessment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            width: 80%;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
        }
        h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        .checkbox-group {
            margin-top: 10px;
        }
        .checkbox-group label {
            display: inline-block;
            margin-right: 20px;
        }
        .checkbox-group input {
            margin-right: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-row .form-group {
            flex: 1;
            margin-right: 10px;
        }
        .form-row .form-group:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>SELF ASSESSMENT</h1> 
        <div class="form-group">
            <label for="student-name">Student Name: <?php if(!empty($assessment)){ echo $assessment->student_name;}?></label> 
        </div> 
        <div class="form-group">
            <label for="enrollment-no">Enrollment No.: <?php if(!empty($assessment)){ echo $assessment->enrollment_number;}?></label> 
        </div> 
        <div class="form-group">
            <label>Mode of Study (Please Tick):</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->study_mode == "0"){?>checked="checked"<?php }?>> Assisted Self Study</label>
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->study_mode == "1"){?>checked="checked"<?php }?> value="blended"> Blended Learning</label>
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->study_mode == "2"){?>checked="checked"<?php }?> value="conventional"> Conventional Classroom Learning</label>
            </div>
        </div> 
        <div class="form-row">
            <div class="form-group">
                <label for="course-stream">Course & Stream: <?php if(!empty($assessment)){ echo $assessment->print_name;}?> (<?php if(!empty($assessment)){ echo $assessment->stream_name;}?>)</label> 
            </div>
            <div class="form-group">
                <label for="semester-year">Semester / Year: <?php if(!empty($assessment)){ echo $assessment->year_sem;}?></label> 
            </div>
        </div> 
        <table>
            <thead>
                <tr>
                    <th>SUBJECT(S) NAME</th>
                    <th>NO. OF HOURS OF STUDY/RESEARCH</th>
                    <th>NO. OF HOURS OF APPLICATION OF SUBJECT KNOWLEDGE / SKILLS</th>
                    <th>GRADE YOUR KNOWLEDGE / SKILL (Between 1 to 10)</th>
                </tr>
            </thead>
            <tbody>
				<?php 
				if(!empty($assessment)){				
					$subject = $this->Admin_model->get_assement_subject_details('tbl_center_self_assessment_form_data','self_assessment_id',$assessment->id);
					if(!empty($subject)){
						foreach($subject as $subject_result){
				?>
                <tr>
                    <td><?=$subject_result->subject_name?></td>
                    <td><?=$subject_result->no_of_hours_study?></td>
                    <td><?=$subject_result->no_of_hours_subject?></td>
                    <td><?=$subject_result->grade?></td>
                </tr>
				<?php }}}?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
	
	
	 <div class="form-container">
		<h2 style="font-size: 16px;">DECLARATION BY THE STUDENT:</h2>
		<p>I hereby declare that the above information provided by me is true to my knowledge and i feel very
happy and satisfied in continuing my further studies in the University.
</p>
<p><br></p>
<p><img style="height:50px" src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$assessment->signature)?>"><br>Signature of Student</p>
</div>
  
</body>
</html>
<?php }?>
<?php if(isset($_GET['type']) && $_GET['type'] == "teacher_Assessmen"){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEACHER ASSESSMENT FORM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            width: 80%;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
        }
        h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        .checkbox-group {
            margin-top: 10px;
        }
        .checkbox-group label {
            display: inline-block;
            margin-right: 20px;
        }
        .checkbox-group input {
            margin-right: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-row .form-group {
            flex: 1;
            margin-right: 10px;
        }
        .form-row .form-group:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>TEACHER ASSESSMENT</h1> 
        <div class="form-group">
            <label for="student-name">Student Name: <?php if(!empty($assessment)){ echo $assessment->student_name;}?></label> 
        </div> 
        <div class="form-group">
            <label for="enrollment-no">Enrollment No.: <?php if(!empty($assessment)){ echo $assessment->enrollment_number;}?></label> 
        </div> 
        
        <div class="form-row">
            <div class="form-group">
                <label for="course-stream">Course & Stream: <?php if(!empty($assessment)){ echo $assessment->print_name;}?> (<?php if(!empty($assessment)){ echo $assessment->stream_name;}?>)</label> 
            </div>
           </div>
		    <div class="form-row">
            <div class="form-group">
                <label for="semester-year">Semester / Year: <?php if(!empty($assessment)){ echo $assessment->year_sem;}?></label> 
            </div>
        </div> 
        <table>
            <thead>
                <tr>
                    <th>SUBJECT(S) NAME</th>
                    <th>ASSESSMENT OF KNOWLEDGE (Grade between 1 to 10)</th>
                    <th>ASSESSMENT OF APPLICATION OF KNOWLEDGE (Grade between 1 to 10)</th> 
                </tr>
            </thead>
            <tbody>
				<?php 
				if(!empty($assessment)){				
					$subject = $this->Admin_model->get_assement_subject_details('tbl_center_teacher_assessment_form_data','teacher_assessment_id',$assessment->id);
					if(!empty($subject)){
						foreach($subject as $subject_result){
				?>
                <tr>
                    <td><?=$subject_result->subject_name?></td>
                    <td><?=$subject_result->assessment_knowledge?></td>
                    <td><?=$subject_result->assessment_application?></td> 
                </tr>
				<?php }}}?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
	
	
	 <div class="form-container" style="height: 150px;">
		 
<p><br></p>
	<div>
    <p style="float: left;">
        <?php if (!empty($assessment)) : ?>
            <?= htmlspecialchars($assessment->assessor_name) ?>
        <?php endif; ?>
        <br>Name of Assessor
    </p>
    <p style="float: right; text-align: center;">
        <img 
            style="height: 50px;" 
            src="<?= htmlspecialchars($this->Digitalocean_model->get_photo('images/signature/' . $assessment->assessor_signature)) ?>" 
            alt="Assessor Signature">
        <br>Signature of Assessor
    </p>
</div>
</div>
  
</body>
</html>
<?php }?>
<?php if(isset($_GET['type']) && $_GET['type'] == "industry_Assessmen"){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDUSTRY ASSESSMENT FORM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            width: 80%;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
        }
        h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        .checkbox-group {
            margin-top: 10px;
        }
        .checkbox-group label {
            display: inline-block;
            margin-right: 20px;
        }
        .checkbox-group input {
            margin-right: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-row .form-group {
            flex: 1;
            margin-right: 10px;
        }
        .form-row .form-group:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>POTENTIAL EMPLOYER ASSESSMENT</h1> 
        <div class="form-group">
            <label for="student-name">Student Name: <?php if(!empty($assessment)){ echo $assessment->student_name;}?></label> 
        </div> 
        <div class="form-group">
            <label for="enrollment-no">Enrollment No.: <?php if(!empty($assessment)){ echo $assessment->enrollment_number;}?></label> 
        </div> 
        
        <div class="form-row">
            <div class="form-group">
                <label for="course-stream">Course & Stream: <?php if(!empty($assessment)){ echo $assessment->print_name;}?> (<?php if(!empty($assessment)){ echo $assessment->stream_name;}?>)</label> 
            </div>
           </div>
		    <div class="form-row">
            <div class="form-group">
                <label for="semester-year">Semester / Year: <?php if(!empty($assessment)){ echo $assessment->year_sem;}?></label> 
            </div>
        </div> 
        <table>
            <thead>
                <tr>
                    <th>SUBJECT(S) NAME</th>
                    <th>ASSESSMENT OF KNOWLEDGE (Grade between 1 to 10)</th>
                    <th>ASSESSMENT OF SKILL (Grade between 1 to 10)</th> 
                    <th>SUGGESTIONS FOR IMPROVEMENT OF EMPLOYABILITY SKILLS</th> 
                </tr>
            </thead>
            <tbody>
				<?php 
				if(!empty($assessment)){				
					$subject = $this->Admin_model->get_assement_subject_details('tbl_center_industry_assessment_form_data','industry_assessment_id',$assessment->id);
					if(!empty($subject)){
						foreach($subject as $subject_result){
				?>
                <tr>
                    <td><?=$subject_result->subject_name?></td>
                    <td><?=$subject_result->assessment_knowledge?></td>
                    <td><?=$subject_result->assessment_skill?></td> 
                    <td><?=$subject_result->suggestions?></td> 
                </tr>
				<?php }}}?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
	
	
	 <div class="form-container" style="height: 450px;">
		<div class="form-group">
            <label>I HAVE A VACANCY FOR THE CANDIDATE:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->vaccancy == "1"){?>checked="checked"<?php }?>> Yes</label>
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->vaccancy == "0"){?>checked="checked"<?php }?> value="conventional"> No</label>
            </div>
        </div> 
		<div class="form-group">
            <label>I CAN PROVIDE JOB OPPORTUNITY TO THE CANDIDATE AFTER SLIGHT IMPROVEMENTS:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->job_opportunity == "1"){?>checked="checked"<?php }?>> Yes</label>
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->job_opportunity == "0"){?>checked="checked"<?php }?> value="conventional"> No</label>
            </div>
        </div> 
		
		<div class="form-group">
            <label for="student-name">NAME OF ASSESSOR: <?php if(!empty($assessment)){ echo $assessment->assessor_name;}?></label> 
        </div> 
        <div class="form-group">
            <label for="enrollment-no">DESIGNATION: <?php if(!empty($assessment)){ echo $assessment->designation;}?></label> 
        </div> 
        
		<div class="form-group">
            <label for="student-name">COMPANY NAME: <?php if(!empty($assessment)){ echo $assessment->company_name;}?></label> 
        </div> 
        <div class="form-group">
            <label for="enrollment-no">CONTACT NO: <?php if(!empty($assessment)){ echo $assessment->contact_no;}?></label> 
        </div> 
        <div class="form-group">
            <label for="enrollment-no">EMAIL ID: <?php if(!empty($assessment)){ echo $assessment->email;}?></label> 
        </div> 
        <div class="form-group">
            <label for="enrollment-no">COMPANY ADDRESS:: <?php if(!empty($assessment)){ echo $assessment->company_address;}?></label> 
        </div> 
        
		 
<p><br></p>
	<div>
    <p style="float: left;">
        <img 
            style="height: 50px;" 
            src="<?= htmlspecialchars($this->Digitalocean_model->get_photo('images/signature/' . $assessment->assessor_signature)) ?>" 
            alt="Assessor Signature">
        <br>Signature of Assessor
    </p>
    <p style="float: right; text-align: center;">
        <img 
            style="height: 50px;" 
            src="<?= htmlspecialchars($this->Digitalocean_model->get_photo('images/logo/' . $assessment->company_seal)) ?>" 
            alt="Assessor Signature">
        <br>Company Seal
    </p>
</div>
</div>
  
</body>
</html>
<?php }?>
<?php if(isset($_GET['type']) && $_GET['type'] == "parent_Assessmen"){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Assessment </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            width: 80%;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
        }
        h1 {
            text-align: center;
            text-decoration: underline;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        .checkbox-group {
            margin-top: 10px;
        }
        .checkbox-group label {
            display: inline-block;
            margin-right: 20px;
        }
        .checkbox-group input {
            margin-right: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-row .form-group {
            flex: 1;
            margin-right: 10px;
        }
        .form-row .form-group:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>PARENT ASSESSMENT</h1> 
        <div class="form-group">
            <label for="student-name">Name of Father/Mother/Guardian : <?php if(!empty($assessment)){ echo $assessment->father_name;}?></label> 
        </div> 
        <div class="form-group">
            <label>Relation with the student:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->relation == "0"){?>checked="checked"<?php }?>> Father</label>
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->relation == "1"){?>checked="checked"<?php }?> value="blended"> Mother</label>
                <label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->relation == "2"){?>checked="checked"<?php }?> value="conventional"> Guardian</label>
            </div>
        </div> 
        <div class="form-row">
            <div class="form-group">
                <label for="course-stream">Mobile No.: <?php if(!empty($assessment)){ echo $assessment->contact_no;}?> </label> 
            </div>
             
        </div> 
        <table>
            <thead>
                <tr>
                    <th>GRADE YOUR WARD’S PERFORMANCE (Between 1 to 10)</th>
                    <td><?php if(!empty($assessment)){ echo $assessment->word;}?></td> 
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <th>SATISFACTION</th>
                    <td>
					<label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->satisfaction == "1"){?>checked="checked"<?php }?>> I am satisfied</label>
					<label><input type="checkbox" name="mode_of_study" <?php if(!empty($assessment) && $assessment->satisfaction == "0"){?>checked="checked"<?php }?> value="blended"> I am not satisfied</label>
                
					</td> 
                </tr>  
            </tbody>
        </table>
    </div>
	
	
	 <div class="form-container">
		<h2 style="font-size: 16px;">DECLARATION BY THE GUARDIAN/PARENT:</h2>
		<p>I declare that the above information provided by my ward is true to my knowledge.
</p>
<p><br></p>
<p><img style="height:50px" src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$assessment->father_signature)?>"><br>Signature of Father/Mother/Guardian</p>
</div>
  
</body>
</html>
<?php }?>
