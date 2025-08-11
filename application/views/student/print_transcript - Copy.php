<?php $university_details = $this->Setting_model->get_university_details(); 
$roman=array( 
	1	=>	"I", 
	2	=>	"II", 
	3	=>	"III", 
	4	=>	"IV", 
	5	=>	"V", 
	6	=>	"VI", 
	7	=>	"VII", 
	8	=>	"VIII", 
	9	=>	"IX", 
	10	=>	"X", 
	11	=>	"XI", 
	12	=>	"XII" 
); 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Transcript Design</title> 
    <style> 
        table { 
			font-family: arial, sans-serif; 
			border-collapse: collapse; 
			width: 100%; 
		} 
		.text-center{ 
			text-align: center; 
			font-size: 18px; 
			margin:0px 0 15px; 
			font-family: arial, sans-serif; 
		} 
		td,th{ 
			text-align: left; 
			padding: 0 8px; 
		} 
		table tr{ 
			vertical-align: top; 
		} 
		.border{ 
			border: 1px solid #333; 
			border-collapse: collapse; 
		} 
		.p-0{ 
			padding: 0; 
		} 
		.p-6{ 
			padding: 6px;  
		} 
		.p-10{ 
			padding: 10px;  
		} 
		.w-50{ 
			width: 50%; 
		} 
		.mb-10{ 
			margin-bottom: 10px; 
		} 
		.table_heading thead th{ 
			font-size: 14px; 
			text-align: center; 
		} 
		.bottom_table th{ 
			font-size: 15px; 
		} 
		.bottom_table td{ 
			font-size: 15px; 
		} 
		.table_heading tbody tr{ 
			font-size: 11px;
		} 
        .transcript_container{ 
			padding: 10px; 
            width: 100%; 
            margin-right: auto; 
            margin-left: auto; 
            max-width: 1000px; 
            margin-top: 40px; 
            margin-bottom: 40px; 
            box-shadow: 0px 2px 4px rgb(146 142 142 / 50%); 
        } 
        .logo_details{ 
            width: 100px; 
            position: absolute; 
            top: 0px; 
            padding: 10px 30px 0; 
            left: 0px; 
         } 
        .univercity_text{ 
           flex: 1; 
           text-align: center; 
        } 
        .univercity_text h2{ 
            font-size: 40px; 
            color: #255bab; 
            text-decoration: none; 
            text-align: center; 
            margin: 30px 0 0; 
            line-height: 30px; 
        } 
        .univercity_text p{ 
			font-family: sans-serif; 
			font-size: 18px; 
			color: #255bab; 
			text-align: center; 
        } 
        .header_details{ 
			position: relative; 
			display: flex;   
			align-items: center; 
			text-decoration: none; 
        } 
        .top_table tr td span{ 
			font-weight: 600; 
			font-size: 14px; 
			display: inline-block; 
        } 
        .top_table tr td{ 
			padding: 4px 0; 
            font-size: 14px; 
            line-height: 1.6; 
        } 
        .sem_heading{ 
            font-size: 16px; 
            font-weight: 600; 
            display: inline-block; 
            padding: 10px 0; 
        } 
        .bottom_table{ 
			margin: 20px 0; 
        } 
        .first_table td{ 
			height: 25px; 
        } 
        @page{ 
			size: 28cm 39cm; 
			margin: 0px auto; 
        } 
        @media print{ 
			html, body{ 
				border: 1px solid white; 
				height: 100%; 
				page-break-inside: avoid; 
				page-break-before: avoid; 
			} 
		} 
    </style> 
</head> 
<body> 
    <div class="transcript_container"> 
        <div class="header_details"> 
            <div class="logo_details"> 
                <img src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>"> 
            </div> 
            <div class="univercity_text"> 
				<h2>THE GLOBAL UNIVERSITY</h2> 
				<p>Established Under Section 2(f) UGC Act, 1956</p> 
            </div> 
        </div> 
        <h2 class="text-center">OFFICIAL TRANSCRIPT</h2> 
        <table class="border mb-10"> 
			<tbody> 
				<tr> 
					<td class="w-50"> 
						<table class="top_table"> 
							<tr> 
							  <td class="w-50"><span>NAME</span></td> 
							  <td class="w-50"><?php if(!empty($transcript)){ echo $transcript->student_name;}?></td> 
							</tr> 
							<tr> 
							  <td class="w-50"><span>ENROLMENT NUMBER</span></td> 
							  <td class="w-50"><?php if(!empty($transcript)){ echo $transcript->enrollment_number;}?></td> 
							</tr> 
							<tr> 
							  <td class="w-50"><span>YEAR OF PASSING</span></td> 
							  <td class="w-50"><?php if(!empty($transcript)){ echo $transcript->year_of_passing;}?></td> 
							</tr> 
						</table> 
					</td> 
					<td class="w-50"> 
						<table class="top_table"> 
							<tr> 
							  <td class="w-50"><span>DURATION OF COURSE</span></td> 
							  <td class="w-50"><?php if(!empty($transcript)){ echo $transcript->course_duration;}?> YEARS</td> 
							</tr> 
							<tr> 
							  <td class="w-50"><span>DEGREE</span></td> 
							  <td class="w-50"><?php if(!empty($transcript)){ echo $transcript->print_name;}?></td> 
							</tr> 
							<tr> 
							  <td class="w-50"><span>BRANCH</span></td> 
							  <td class="w-50"><?php if(!empty($transcript)){ echo $transcript->stream_name;}?></td> 
							</tr> 
						</table> 
					</td> 
				</tr> 
			</tbody> 
        </table>   
        <table class="border first_table"> 
            <tbody>  
				<?php  
					$i=1;
					$n =1; 
					for($l=1;$l<=$transcript->sem;$l++){ 
						$subject = $this->Students_model->get_this_transcript_subject($l,$transcript->id);  
						if($i==1){ 
				?> 
				<tr>  	
					<?php 
						} 
						if(!empty($subject)){?>  
					<td class="w-50"> 
						<table> 
							<tr> 
								<td class="text-center"><span class="sem_heading"><?=$roman[$l]?> SEM/YEAR</span></td> 
							</tr> 
						</table> 
						<table class="mb-10 table_heading"> 
							<thead> 
								<th class="border p-6 w-50" style="width: 85%;">SUBJECTS</th> 
								<th class="border p-6 w-50">TYPE</th> 
								<th class="border p-6 w-50">MARKS OBTAINED</th> 
								<th class="border p-6 w-50">MAX. MARKS</th> 
							</thead> 
							<tbody> 
							<?php  
							$count_sub = 1;
							if(!empty($subject)){ foreach($subject as $subject_result){?> 
								<tr> 
									<td class="border p-10"><?=$subject_result->subject?></td> 
									<td class="border p-10"><?=$subject_result->type?></td> 
									<td class="border p-10"><?=$subject_result->obtained?></td> 
									<td class="border p-10"><?=$subject_result->max_mark?></td>
								</tr>
							<?php $count_sub++; }}
							for($kt=1;$kt<=11-$count_sub;$kt++){
							?>  
								<tr> 
									<td class="border p-10"></td> 
									<td class="border p-10"></td> 
									<td class="border p-10"></td> 
									<td class="border p-10"></td>
								</tr>
							<?php }?>
							</tbody> 
						</table> 
					</td> 
					<?php  
						}
					$n++;
					$i++;
					if($i==3){ 
						$i=1;
					?>
				</tr> 			
				<?php }
				}
				?> 
            </tbody> 
        </table> 
        <table class="bottom_table">  
			<thead> 
				<tr class="text-center"> 
					<th class="border p-6 text-center">SEM/YEAR</th> 
					<?php  
						$th=1; 
						for($l=1;$l<=$transcript->sem;$l++){  
					?> 
					<td class="border p-6 text-center"><?=$roman[$th]?></td> 
					<?php $th++;}?> 
				</tr> 
			</thead> 
			<tbody> 
				<tr> 
					<th class="p-6 text-center border">M.M.</th> 
					<?php 
						$total_marks = 0; 
						for($l=1;$l<=$transcript->sem;$l++){ 
							$subject = $this->Students_model->get_this_transcript_subject($l,$transcript->id); 
							foreach($subject as $subject_results){ 
								$total_marks += $subject_results->max_mark; 
							} 
					?> 
					<td class="p-6 text-center border"><?php if($total_marks == '0'){ echo "L.E";}else{ echo $total_marks;}?></td> 
					<?php $total_marks=0; 
						}
					?> 
				</tr> 
				<tr> 
					<th class="p-6 text-center border">M.O.</th> 
					<?php 
						$total_obt_marks = 0; 
						for($l=1;$l<=$transcript->sem;$l++){ 
							$subject = $this->Students_model->get_this_transcript_subject($l,$transcript->id); 
							foreach($subject as $subject_results){ 
								$total_obt_marks += $subject_results->obtained; 
							} 
					?> 
					<td class="p-6 text-center border"><?php if($total_obt_marks == "0"){ echo "L.E.";}else{ echo $total_obt_marks;}?></td> 
					<?php $total_obt_marks=0;}?> 
				</tr> 
				<tr> 
					<th class="p-6 text-center border">PERCENTAGE (%)</th> 
					<?php for($l=1;$l<=$transcript->sem;$l++){ 
						$total_marks=0;$total_obt_marks=0;$percent=0; 
						$subject = $this->Students_model->get_this_transcript_subject($l,$transcript->id); 
						foreach($subject as $subject_results){ 
							$total_marks += $subject_results->max_mark; 
							$total_obt_marks += $subject_results->obtained; 
						} 
						$percent = $total_obt_marks*100/$total_marks; 
					?> 
					<td class="p-6 text-center border"><?php if($percent == "0"){ echo "L.E.";}else{ echo number_format($percent,2);}?></td> 
					<?php }?>  
					</td> 
				</tr>  
			</tbody> 
        </table> 
        <table class="border mb-10"> 
        <?php  
			$total = $this->Students_model->get_this_transcript_total($transcript->id);  
		?> 
			<tbody> 
				<tr> 
					<td> 
						<table class="top_table"> 
							<tr> 
								<td class="w-50 text-center"><span>MARKS OBTAINED</span></td> 
								<td class="w-50"><?=$total->total_obt?></td> 
							</tr> 
							<tr> 
								<td class="w-50 text-center"><span>GRAND TOTAL </span></td> 
								<td class="w-50"><?=$total->total_mk?></td> 
							</tr> 
							<tr> 
								<td></td> 
								<td></td> 
							</tr> 
							<tr> 
								<td></td> 
								<td></td> 
							</tr> 
							<tr> 
								<td class="w-50 text-center"><span>DIVISION</span></td> 
								<td class="w-50 ">   
								<?php  
									$division = $total->total_obt*100/$total->total_mk; 
									if($division >= 60){ 
										echo "First"; 
									}else if($division<60 && $division>=50){ 
										echo "Second"; 
									}else{ 
										echo "Third"; 
									} 
								?>       
								</td> 
							</tr> 
							<tr> 
								<td class="w-50 text-center"><span>DATE OF ISSUE </span></td> 
								<td class="w-50"><?php if($transcript->issue_date != "00:00:0000"){ echo date("d-m-Y",strtotime($transcript->issue_date));}?> </td> 
							</tr> 
						</table> 
					</td> 
				<td> 
					<table class="top_table"> 
						<tr> 
							<td class="w-50 text-center">   
								<?php if(date("Y-m-d",strtotime($transcript->issue_date)) <= "2022-02-19"){ ?> 
								<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/Deputy_Registrar.png')?>"> 
								<?php }else{ 
									if($transcript->course_id ==23){ 
								?>  
								<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/resurch_reg.PNG')?>"> 
								<?php }else{?> 
								<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/norm_reg.PNG')?>"> 
								<?php }}?>   
								<br><span>Registrar <br> GLOBAL UNIVERSITY</span>
							</td> 
						</tr>  
					</table> 
				</td> 
            </tr> 
        </tbody> 
    </table> 
</div> 
</body> 
</html>