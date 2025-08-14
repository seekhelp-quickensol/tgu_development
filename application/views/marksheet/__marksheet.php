<?php
// echo "<pre>";print_r($marksheet);exit;

$obj = new SimpleFunctions(); ?>
<?php
if (empty($marksheet)) {
	redirect(base_url());
}
$roman_arr = array(
	'1' => 'I',
	'2' => 'II',
	'3' => 'III',
	'4' => 'IV',
	'5' => 'V',
	'6' => 'VI',
	'7' => 'VII',
	'8' => 'VIII',
	'9' => 'IX',
	'10' => 'X',
	'11' => 'XI',
	'12' => 'XII',
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Marksheet</title>
	<meta name="description" content="India's leading manufacturer of premium Aluminium Sliding Windows and Doors">
	<meta name="keywords" content="aluminium, sliding, window, section, glass, door">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">
	<style>
		@import "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap";
		@import "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap";
		@import url("https://db.onlinewebfonts.com/c/cf8e4c5e25487a784eed74806c642da2?family=Cambria+W02+Bold");
		@import url('https://db.onlinewebfonts.com/c/8d223b3ad8d4819e9dcf22757e4cc2c4?family=Arial');

		body {
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
			background-color: #FAFAFA;
			font-family: 'Abel', sans-serif;
			font-family: 'Barlow Semi Condensed', sans-serif;
			color: #444444;
			font-size: 13px;
		}

		:root{
			--primaryBlack:#242424;
		}

		.front-page {
			border: 2px solid #544134;
			margin-top: 12px;
		}

		* {
			box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		.page {
			width: 210mm;
			min-height: 297mm;
			padding: 0mm;
			margin: 0mm auto;
			border-radius: 5px;


			position: relative;
		}

		.subpage {

			position: relative;
			min-height: 295mm;
			/*border: 2px solid transparent;*/
			background-size: contain;
			background-position: 0 -16px;
			background-repeat: no-repeat;
			/*border: none;*/
			border-left: 6px solid #fff;
			border-right: 7px solid #fff;
			/* margin-top: 10px; */
			padding: 0;
			margin: 0;
		}

		.print {
			background: #ed1765;
			color: #fff;
			width: 100px;
			font-weight: 500;
			border: none;
			outline: navajowhite;
			padding: 10px;
			cursor: pointer;
			position: absolute;
			right: 10px;
			top: 10px;
			font-size: 14px;
		}

		.print-title {
			text-align: center;
			font-weight: 600;
			color: #262626;
			font-size: 32px;
		}

		.right-bar-code p {
			color: #000;
			font-size: 14px;
			text-align: center;
			padding: 0 0 0 0px;
			margin-bottom: 0;
			margin-top: 0;
			font-weight: 600;
		}

		.scan-img {
			float: right;
		}

		.right-bar-code {
			float: left;
		}

		.markshit-header {
			text-align: center;
		}

		.markshit-header {
			text-align: center;
			padding-top: 85px;
			padding-right: 15px;
		}

		.markshit-header h2 {
			font-size: 28px;
			font-weight: 700;
			text-align: center;
			color: #510000;
			text-transform: capitalize;
			margin-bottom: 15px;
			position: relative;
			margin-top: 10px;
			font-family: 'ariblk_0';
		}

		/* .statement::before {
            position: absolute;
            top: 0%;
            left: 30px;
            content: " ";
            width: 94%;
            height: 2px;
            background: #a60000;
            background-image: -webkit-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);
            background-image: -moz-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);
            background-image: -ms-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);
            background-image: -o-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);
        }
        
        .statement::after {
            position: absolute;
            top: 100%;
            left: 30px;
            content: " ";
            width: 94%;
            height: 2px;
            background: #a60000;
            background-image: -webkit-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);
            background-image: -moz-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);
            background-image: -ms-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);
            background-image: -o-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);
        } */



		.markshit-header h3 {
			color: #05549e;
			text-align: center;
			font-size: 24px;
			text-transform: uppercase;
			font-weight: 600;
			margin-bottom: 15px;
			margin-top: 10px;
			padding-left: 28px;
			padding-right: 28px;
		}

		.head_table_4 td {
			border: 1px solid #85573b;

			border-top: none;
			text-align: center;
		}

		.back-page h1 {
			color: #000;
			font-family: "Arial";
			font-size: 18px;
		}

		.back-page table th {
			text-transform: uppercase;
			color: #000;
			font-family: "Arial";
		}

		.back-page table td {
			font-weight: normal !important;
			font-family: "Arial";
			color: #000;
		}

		.back-page ul li {
			font-family: "Arial";
		}

		.head_table_4 th {
			border: 1px solid #85573b;

			border-top: none;
			text-align: center;
			padding: 10px 0px;
			text-transform: capitalize;
		}



		.head_table_4 {
			width: 92%;
			margin: 0 auto;
			border: none;
			margin-bottom: 15px;
			font-size: 14px;
		}

		.students-info.student-info-left {
			float: left;
			width: 50%;
			padding-left: 30px;
			margin-bottom: 10px;
		}

		.students-info.student-info-right {
			float: left;
			width: 50%;
			padding-left: 30px;
			margin-bottom: 10px;
		}

		.students-info p {
			font-size: 13px;
			font-weight: 500;
			color: #000;
			line-height: 1;
		}

		.students-exam-details th {
			color: var(--primaryBlack);
			border: 1px solid #85573b;
		}

		table {
			border-collapse: collapse;
			border: 1px solid #85573b !;
			font-family: 'ariblk_0';
			color: var(--primaryBlack);
			font-weight: 700;
			text-align: center;
		}

		.students-exam-details th,
		td {
			font-size: 14px;
			/* font-weight: 500; */
			border-collapse: collapse !important;
			/*background: #ffffffa3 !important;*/
			/* border-color: #8a6eaf; */
			border-left: 1px solid #85573b;
			border-collapse: collapse;
			padding: 8px;
			color: var(--primaryBlack);
			font-weight: 700;

		}

		.front-page th {
			color: #4a190e;
		}

		tbody tr {
			border-image-source: linear-gradient(to left, #743ad5, #d53a9d) !important;
			border-collapse: collapse !important;
		}

		.student-marks-total {
			text-align: center;
			border: 1px solid var(--primaryBlack);
		}

		.remark-info {
			font-size: 12px;
			color: #000;
			font-weight: 500;
		}

		.result-date span {
			font-size: 12px;
			color: #000;
			font-weight: 500;
		}

		.result-date {
			font-size: 15px;
			color: #000000ba;
		}

		.result-date span {
			display: inline-block;
		}

		.result-date p {
			display: inline;
			padding: 0 5px;
		}

		.first-row {
			display: block;
			height: 80px;
			padding: 35px 15px 0px;
		}

		.left-remark {
			float: left;
			width: 32.5%;
			position: relative;
			top: 55px;
		}

		.barcode-middle {

			float: left;
			width: 32.5%;
		}

		.bottom-sign-section {
			/*height: 90px;*/
			position: absolute;
			width: 20.4cm;
			bottom: 60px;
			width: 100%;
			padding: 0px 15px;
		}

		.barcode-img {
			max-width: 85%;
			height: 33px;
			position: relative;
			top: 50px;
		}

		.right-controller {
			float: left;
			width: 32.5%;
		}

		.marks-center {
			text-align: center;
		}

		.students-exam-details {
			margin-bottom: 15px;
			width: 92%;
			margin: 0px auto;
		}

		.bottom_strip {
			position: absolute;
			bottom: 0px;
		}

		.bottom_strip img {
			width: 100%;
		}

		.scan-img img {
			width: 75%;
		}

		.total_marks {
			width: 92%;
			margin: 15px auto;
		}

		@page {
			size: A4;
			margin: 0;

		}

		@media print {

			html,
			body {
				width: 210mm;
				height: 297mm;
			}

			.print {
				display: none;
			}

		}

		.head_table_1 {
			width: 92%;
			margin: 0 auto;
			border: none;
			margin-bottom: 0px;
			font-size: 14px;
		}

		.head_table_1 td {
			border: 1px solid #85573b;

			border-top: 0;
			border-bottom: 0;
			text-align: center;
		}

		.head_table_1 th {
			border: 1px solid #85573b;
			border-bottom: 0;
			text-align: center;
			width: 50%;
			padding: 8px 0px;
		}

		.row {
			display: flex;
			width: 100%;
			padding: 0px 35px;
			/* padding-top: 8px; */


		}

		.col {
			width: 25%;
		}
		

		.head_table_2 {
			width: 92%;
			margin: 0px auto;
			border: none;
			font-size: 14px;
			margin-bottom: 4px;
		}

		.head_table_2 td {
			border: 1px solid #85573b;

			border-top: none;
			text-align: center;
		}



		.head_table_2 th {
			border: 1px solid #85573b;
			border-bottom: none;
			text-align: center;
			/* width:calc(100% / 3); */
			padding: 5px 0px;
		}

		.head_table_3 {
			width: 92%;
			margin: 0 auto;
			border: none;
			margin-bottom: 15px;
			font-size: 14px;
		}

		.head_table_3 th {
			border: 1px solid #85573b;

			text-align: center;
			padding: 10px 0px;
			text-transform: uppercase;
		}

		.td-left-text {
			text-align: left;
			padding-left: 25px;
		}

		.no_border {
			border: none;
		}
	</style>
	<style>
		.back-page {}

		.head_table_1,
		.head_table_2,
		.head_table_3,
		.head_table_4 {
			font-family: "Cambria W02 Bold";

		}

		.front-page table th {
			font-family: "Cambria W02 Bold";
			border-color: #85573b;

		}

		.front-page table td {
			font-family: "Arial";
			border-color: #85573b;

		}



		.col p {
    font-family: "Arial";
    font-size: 14px;
    font-weight: 500;
    color: var(--primaryBlack);
    letter-spacing: 0.4px;
}

		.col p span {
			color: #85573b;
		}

		.grade-table {
			width: 100%;
			border-collapse: collapse;
			margin: 20px 0;
		}

		.grade-table th,
		.grade-table td {
			border: 1px solid #000;
			padding: 10px;
			text-align: center;
		}

		.grade-table th {
			/* background-color: #f4f4f4; */
		}

		.curley {
			font-size: 40px;
			vertical-align: sub;
		}

		.formula {
			/* font-family: "Courier New", Courier, monospace; */
			/* background-color: #f9f9f9; */
			padding: 10px;
			/* border: 1px solid #ddd; */
			margin: 20px 0;
			text-align: center;
			font-size: 16px;
			position: relative;
		}

		ul {
			margin: 20px;
		}

		.back-page {
			font-family: "Arial";
			letter-spacing: 0.5px;
			background: white;
			/* border: 1px solid black; */
			padding: 30px;
			margin: 10px 0;
			color: black;


		}

		.back-page strong {
			color: #000;
			letter-spacing: 0.7px;
		}



		li {
			margin-bottom: 10px;
		}

		.students-exam-details td {
			padding: 5px 5px;
		}
	</style>
</head>

<body>
	<div class="book">
		<div class="page">
			<!-- <div class="subpage"  style="background-image:url(<?= $this->Digitalocean_model->get_photo('images/new_marksheet-background.png') ?>)"> -->
			<!-- <div class="subpage" style="background-image:url(<?= $this->Digitalocean_model->get_photo('images/marksheet_background.png') ?>)"> -->
			<div class="subpage" style="background-image:url(<?= base_url() ?>images/tgu_bg.jpg)">
				<?php
				$courses = array(262, 263, 261, 228, 278);

				if (!empty($marksheet) && in_array($marksheet->course_id, $courses)) {

				?>

					<div class="print-wrapper">
						<div class="front-page">
							<?php
							$smart = $marksheet->id . "-" . $marksheet->student_id . "-" . $marksheet->enrollment_number . "-" . $marksheet->marksheet_number . "-" . $marksheet->student_name . "-" . $marksheet->father_name . "-" . $marksheet->examination_month . "-" . $marksheet->examination_year . "-" . $marksheet->created_on;
							$barcode = $marksheet->id . "-" . $marksheet->student_id . "-" . $marksheet->enrollment_number . "-" . $marksheet->marksheet_number;
							?>
							<div class="first-row">
								<div class="scan-img">
									<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?= $smart ?>&choe=UTF-8" />
									<img src="<?= base_url() ?>images/qrcode.png" alt="" srcset="">
								</div>
								<div class="right-bar-code">
									<p> Sr No:<?= $marksheet->sr_number ?></p>
								</div>
							</div>
							<div style="clear:both"></div>
							<!-- <div class="markshit-header ">
        <h2 style="font-size:14px;color: #335c9e;margin-bottom: 40px;margin-top:66px;"></h2>
			<h2 class="statement"> Statements of marks</h2>
			<h3><?= $marksheet->course_name ?> <?php if ($marksheet->print_stream == 1) {
													echo $marksheet->stream_name;
												} ?></h3>
		</div>
		<div class="students-info student-info-left">
			<p>Name: <?= $marksheet->student_name ?></p>
			<p> Father's Name: <?= $marksheet->father_name ?></p>
			<p> Enrollment .No. : <?= $marksheet->enrollment_number ?></p>
		</div>
		<div class="students-info student-info-right">
			<p>Seat No.: <?= $marksheet->marksheet_number ?></p>
	<p>  <?php if ($marksheet->display_mode == "1") {
			?>Year/Sem<?php
					} else { ?>Year/Sem<?php } ?></strong>: 
                <?= $roman_arr[$marksheet->year_sem]
				?>
            </p> 
            <p>Year/Sem : <?= $roman_arr[$marksheet->year_sem] ?>
                    <?php
					if ($marksheet->display_mode == "1") {
						echo "Year";
					} else {
						echo "Semester";
					}
					?>
            </p>

			<p> Month &amp; Year Of Exam : <?= $marksheet->examination_month ?> <?= $marksheet->examination_year ?></p>
		</div> -->
							<div class="markshit-header">
								<h2 style="font-size:14px;color: #335c9e;margin-bottom: 40px;margin-top:46px;"></h2>
								<h2 class="statement">Annual Statements of marks</h2>
								<!-- <h3><?= $marksheet->course_name ?> <?php if ($marksheet->print_stream == 1) {
																			echo "(" . $marksheet->stream_name . ")";
																		} ?></h3> -->
							</div>
							<table class="head_table_1">
								<tr>
									<th>CANDIDATE’S NAME</th>

									<th>MONTH & YEAR OF EXAMINATION</th>
								</tr>
								<tr>
									<td><?= $marksheet->student_name ?></td>
									<td><?= $marksheet->examination_month ?> <?= $marksheet->examination_year ?></td>
								</tr>
							</table>

							<table class="head_table_2">
								<tr>
									<th>ENROLLMENT NO.</th>
									<th>MOTHER’S NAME</th>
									<th>FATHER’S NAME</th>
								</tr>
								<tr>
									<td><?= $marksheet->enrollment_number ?></td>
									<td><?= $marksheet->mother_name ?></td>
									<td><?= $marksheet->father_name ?></td>
								</tr>
							</table>

							<table class="head_table_3">
								<tr>
									<th>COURSE NAME</th>
									<th><?= $marksheet->course_name ?> <?php if ($marksheet->print_stream == 1) {
																			echo "(" . $marksheet->stream_name . ")";
																		} ?></th>
								</tr>
							</table>

							<!-- <div style="clear:both"></div>
                    <div class="markshit-header ">
                        <h2 style="font-size:14px;color: #335c9e;margin-bottom: 6px; margin-top: 66px;">Itanagar Arunachal Pradesh, INDIA</h2>
                        <h2 class="statement"> Marksheet</h2>
                        <h3><?= $marksheet->course_name ?> <?php if ($marksheet->print_stream == 1) {
																echo "(" . $marksheet->stream_name . ")";
															} ?></h3>
                    </div>
                    <div class="students-info student-info-left" style="margin-bottom: 0px;">
                        <p>Name of Student: <?= $marksheet->student_name ?></p>
                        <p>Father's Name: <?= $marksheet->father_name ?></p>
                        <p>Session: <?= $marksheet->pre_session ?></p>
                    </div>
                    <div class="students-info student-info-right;" style="height:95px;">
                      <p>Mother Name : <?= $marksheet->mother_name ?></p>
                      <p>Enrollment .No. : <?= $marksheet->enrollment_number ?></p>
                      <?php if ($marksheet->course_id == 278) { ?>
                      <p>Date of Birth : <?= date("d/m/Y", strtotime($marksheet->date_of_birth)) ?></p>
						<?php } ?>
                       
                         
                    </div>
					<div style="clearboth"></div>
					<div style="text-align:center;color:#05549e"><h2 style="margin-top: 0px;">Annual Examination<h2></div> -->
							<table class="students-exam-details">
								<thead>
									<tr>
										<th style="width: 42%;" rowspan="2" colspan="1">Subject Name</th>
										<th style="width: 10%;" rowspan="2" colspan="1">Max. Marks</th>
										<th rowspan="1" colspan="3">Marks Obtained </th>
										<th rowspan="2" colspan="1">Total In <br> Words</th>
									</tr>
									<tr>
										<th style="width: 10%;" rowspan="2">UE</th>
										<th style="width: 10%;" rowspan="2">IA</th>
										<th style="width: 10%;" rowspan="2">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$subject = $this->Exam_model->get_selected_subject_for_result($marksheet->result_id);

									$total_internal_mark_obtained = 0;
									$total_external_max_marks = 0;
									$total_external_marks_obtained = 0;
									$total = 0;
									$total_internal_mark = 0;
									$subjectcount = 0;
									$total_rows = 0;
									if (!empty($subject)) {
										foreach ($subject as $subject_result) {
											$subjectcount++;

											$total_internal_marks_obtained1 = $subject_result->internal_marks_obtained;
											$total_external_marks_obtained1 = $subject_result->external_marks_obtained;
											$total_obtained = $total_internal_marks_obtained1 + $total_external_marks_obtained1;

											$total += $total_obtained;

											//  echo "<pre>";print_r($total);exit;

											$total_internal_max_mark1 = $subject_result->internal_max_marks;
											$total_external_max_mark1 = $subject_result->external_max_marks;
											$total_max_marks = $total_internal_max_mark1 + $total_external_max_mark1;
											//  $total_max += $total_max_marks;
											$fourty_percente = ($total_max_marks * 40) / 100;
											$total_ = $subject_result->external_max_marks;

											$total_internal_mark += $subject_result->internal_max_marks;
											$total_internal_mark_obtained += $subject_result->internal_marks_obtained;
											$total_external_max_marks += $subject_result->external_max_marks;
											$total_external_marks_obtained += $subject_result->external_marks_obtained;


											// $grand_total =intval($total/$subjectcount);

									?>

											<tr>
												<td class="td-left-text"><?= $subject_result->subject_name ?></td>
												<td><?= $total_max_marks ?></td>
												<td><?= $total_internal_marks_obtained1 ?></td>
												<td class="no_border"><?= $total_external_marks_obtained1 ?></td>
												<td class="no_border"><?= $total_obtained ?></td>
												<td><?= $obj->toText($total_obtained); ?></td>
											</tr>

										<?php
											$total_rows++;
										}
									}
									$extra = 11 - $total_rows;
									for ($e = 1; $e <= $extra; $e++) {

										?>
										<tr>
											<td class="td-left-text"> </td>
											<td></td>
											<td></td>
											<td class="no_border"></td>
											<td class="no_border"></td>
											<td></td>
										</tr>
									<?php
									}
									$total_int_mark = $total_internal_mark + $total_external_max_marks;
									$total_obt = $total_internal_mark_obtained + $total_external_marks_obtained;
									// echo "<pre>";print_r($total_int_mark);exit;

									$percent = ($total_obt * 100) / $total_int_mark;
									if ($percent >= 60) {
										$division = "First";
									} else if ($percent < 60 && $percent >= 45) {
										$division = "Second";
									} else {
										$division = "Third";
									}
									if ($percent >= 90) {
										$grade = "A+";
									} else if ($percent >= 80 && $percent < 90) {
										$grade = "A";
									} else if ($percent >= 70 && $percent < 80) {
										$grade = "B+";
									} else if ($percent >= 60 && $percent < 70) {
										$grade = "B";
									} else if ($percent >= 50 && $percent < 60) {
										$grade = "C";
									} else if ($percent >= 45 && $percent < 50) {
										$grade = "D";
									} else if ($percent >= 40 && $percent < 45) {
										$grade = "E";
									} else if ($percent < 40) {
										$grade = "F";
									}


									?>
									<tr style="border:1px solid #85573b">
										<td class="td-left-text">GRAND TOTAL: <?= $total ?></td>
										<td>Result <?php if ($marksheet->result == "0") {
														echo "PASS";
													} else if ($marksheet->result == "1") {
														echo "FAIL";
													} else if ($marksheet->result == "2") {
														echo "REAPPEAR";
													} else if ($marksheet->result == "3") {
														echo "ABSENT";
													} ?></td>
										<td colspan="3" style="padding:0px;">
											<div style="display:flex; align-items: center;">
												<div style="width:50%; border-right: 1px solid; height: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
													Percentage <br>
													<?= number_format($percent, 2) ?>%
												</div>
												<div style="width:50%;">
													Grade <br>
													<?= $grade ?>
												</div>

											</div>
										</td>
										<td>
											CGPA <br>
											<?php
											// $percent =($cgpa_total_marks*100)/$total;
											$cgpa = $percent / 9.5;
											echo number_format($cgpa, 2);
											?>
										</td>
									</tr>
									<tr>
										<td class="td-left-text" colspan="5">IN WORDS: <?= $obj->toText($total); ?></td>
									</tr>

								</tbody>

							</table>
							<!-- <table class="students-exam-details">
                    <tr>
                        <th></th>
                        <th>Annual</th>
                        <th>Grand Total</th>
                        <th>Division</th>
                        
                    </tr>
                    <tr>
                        <th>Maximum Mark</th>
                        <th><?= $total_max ?></th>
                        <th rowspan="2"><?= $total ?></th>
                        <th rowspan="2"><?= $division ?></th>
                        
							 
                    </tr>
                    <tr>
                        <th>Total Mark Obtained</th>
                        <th><?= $total ?></th>
                    </tr>
                </table> -->
							<!-- <h3 class="total_marks" style="color:#05549e">Marks in words : <span><?= $obj->toText($total); ?></span> </h3> -->
							<table class="students-exam-details" style="border:none; margin-top:50px;">

								<tr>
									<td style="border:none; text-align:left;">
										Date: <?= date("d-M-Y", strtotime($marksheet->marksheet_issue_date)) ?>
									</td>
									<td style="border:none;  padding-left:20px; padding-top: 30px;">

										<img style="width: 80px;margin-right: -138px;margin-bottom: 13px;" src="<?= $this->Digitalocean_model->get_photo('certificate_signature/' . $marksheet->signature) ?>">
										<p><?= $marksheet->dispalay_signature; ?></p>
										<!-- COE/ DY. REGISTRAR <br>
							Auth. Sign. -->
									</td>
								</tr>
							</table>
						</div>

						<!-- <div class="bottom-sign-section" style="bottom:50px">

				 <div class="left-remark" style="top:60px;">
                        <div class="remark-info">
                            <span>Remarks:P- Pass; F- Fail; A- Absent Gm Grace Marks</span>
                        </div>
                        <div class="result-date">
                           <span>Date of issue: <p class="date-text"> <strong><?= date("d-M-Y", strtotime($marksheet->marksheet_issue_date)) ?></p></strong></span>
                        </div>
                    </div>
					<div class="barcode-middle" style="text-align:center;">
					<img class="barcode-img" style="top:54px; height: 35px;" alt="<?= $barcode ?>" src="<?= base_url(); ?>barcode.php?codetype=Code39&size=40&text=<?= $barcode ?>&print=true" />
					</div>
				<div class="right-controller">
                        <div style="text-align:center;">
			
			 <?php if ($marksheet->examination_month == "August"  && $marksheet->examination_year == "2021") { ?>
			<img style="width: 80px;" src="<?= $this->Digitalocean_model->get_photo('images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png') ?>">
			<?php } else if ($marksheet->examination_month == "January"  && $marksheet->examination_year == "2021") { ?>
			<img style="width: 80px;" src="<?= $this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png') ?>"> 
			<?php } else if ($marksheet->examination_month == "January"  && $marksheet->examination_year == "2022") { ?>
				<img style="width: 80px;" src="<?= $this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png') ?>"> 
			<?php } else if ($marksheet->examination_month == "July"  && $marksheet->examination_year == "2023") { ?>
            <img style="width: 80px;margin-right: -138px;margin-bottom: 13px;" src="<?= $this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png') ?>"> 									
            <?php } ?>
		            <strong class="marksheet_sign">Registrar / Controller of Examination</strong> -->


						<!-- <img style="width: 170px;" src="<?= $this->Digitalocean_model->get_photo('certificate_signature/' . $single->signature) ?>">   
            <p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?= $single->dispalay_signature; ?></p> -->

						<!-- </div>


		</div>
            <div class="signature_marksheet"></div>
        </div> -->

					</div>
					<!-- <div class="bottom_strip">
			<img src="<?= $this->Digitalocean_model->get_photo('images/marksheet_footer_strip.png') ?>">
		</div> -->

				<?php
				} else {
				?>
					<div class="print-wrapper">
						<?php
						$smart = $marksheet->id . "-" . $marksheet->student_id . "-" . $marksheet->enrollment_number . "-" . $marksheet->marksheet_number . "-" . $marksheet->student_name . "-" . $marksheet->father_name . "-" . $marksheet->examination_month . "-" . $marksheet->examination_year . "-" . $marksheet->created_on;
						$generated_qr = $this->Common_model->generate_qrcode_data($smart);
						// $smart = $marksheet->enrollment_number."-".$marksheet->student_name."-".$marksheet->course_name."-".$marksheet->stream_name;
						$barcode = $marksheet->id . "-" . $marksheet->student_id . "-" . $marksheet->enrollment_number . "-" . $marksheet->marksheet_number;
						?>
						<div class="front-page">
							<div class="first-row">
								<div class="scan-img">
									<!-- <img src="https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=<?= $smart ?>&choe=UTF-8"/> -->
									 <img style="width:70px !important;" src="<?= $generated_qr; ?>" /> 
									<!--<img style="width:70px !important;" src="<?= base_url() ?>images/qrcode.png" alt="">-->
								</div>
								<div class="right-bar-code">
									<p> Sr No:<?= $marksheet->sr_number ?></p>
								</div>
							</div>
							<div style="clear:both"></div>
							<!-- <div class="markshit-header ">
        <h2 style="font-size:14px;color: #335c9e;margin-bottom: 40px;margin-top:66px;"></h2>
			<h2 class="statement"> Statements of marks</h2>
			<h3><?= $marksheet->course_name ?> <?php if ($marksheet->print_stream == 1) {
													echo $marksheet->stream_name;
												} ?></h3>
		</div>
		<div class="students-info student-info-left">
			<p>Name: <?= $marksheet->student_name ?></p>
			<p> Father's Name: <?= $marksheet->father_name ?></p>
			<p> Enrollment .No. : <?= $marksheet->enrollment_number ?></p>
		</div>
		<div class="students-info student-info-right">
			<p>Seat No.: <?= $marksheet->marksheet_number ?></p>
	<p>  <?php if ($marksheet->display_mode == "1") {
			?>Year/Sem<?php
					} else { ?>Year/Sem<?php } ?></strong>: 
                <?= $roman_arr[$marksheet->year_sem]
				?>
            </p> 
            <p>Year/Sem : <?= $roman_arr[$marksheet->year_sem] ?>
                    <?php
					if ($marksheet->display_mode == "1") {
						echo "Year";
					} else {
						echo "Semester";
					}
					?>
            </p>

			<p> Month &amp; Year Of Exam : <?= $marksheet->examination_month ?> <?= $marksheet->examination_year ?></p>
		</div> -->
							<div class="markshit-header ">
								<h2 style="font-size: 15px;
    color: var(--primaryBlack);
    margin-bottom: 15px;
    margin-top: 35px;
	font-family: 'Arial';">Established by Act No. 12/2022 of Govt. of Arunachal Pradesh u/s 2(f) of UGC Act 1956</h2>
								<h2 class="statement">Statements of marks</h2>
								<!-- <h3><?= $marksheet->course_name ?> <?php if ($marksheet->print_stream == 1) {
																			echo "(" . $marksheet->stream_name . ")";
																		} ?></h3> -->
							</div>
							<table class="head_table_1">
								<tr>
									<th>Name Of Candidate</th>

									<th style="text-align:left;padding-left:15px">Father's Name</th>

								</tr>
								<tr>
									<td><?= $marksheet->student_name ?></td>
									<td style="text-align:left;padding-left:15px"><?= $marksheet->father_name ?></td>

								</tr>
							</table>
							<table class="head_table_2">
								<tr>
									<th style="width: 50%;">Course Name</th>
									<th style="text-align:left;padding-left:15px" colspan="50%">Mother's Name &ensp; <span style="color: var(--primaryBlack);"> <?= $marksheet->mother_name ?></span></th>

								</tr>

								<tr>

									<td rowspan="2"><?= $marksheet->course_name ?> <?php if ($marksheet->print_stream == 1) {
																						echo "(" . $marksheet->stream_name . ")";
																					} ?></td>
									<th style="color:var(--primaryBlack);font-family:'Arial';">Semester/Year</th>
									<th>Enrollment No.</th>

								</tr>

								<tr>
									<td><?= $marksheet->examination_month ?> <?= $marksheet->examination_year ?></td>
									<td><?= $marksheet->enrollment_number ?></td>


								</tr>
							</table>

							<!-- <table class="head_table_2">
						<tr>
							<th>ENROLLMENT NO.</th>
							<th>MOTHER’S NAME</th>
							<th>MONTH & YEAR OF EXAMINATION</th>
							
					
						</tr>
						<tr>
							<td><?= $marksheet->enrollment_number ?></td>
							<td><?= $marksheet->mother_name ?></td>
							
							<td><?= $marksheet->examination_month ?> <?= $marksheet->examination_year ?></td>
						</tr>
					</table>
				
					<table class="head_table_3">
						<tr>
							<th>COURSE NAME</th>
							<th><?= $marksheet->course_name ?> <?php if ($marksheet->print_stream == 1) {
																	echo "(" . $marksheet->stream_name . ")";
																} ?></th>
						</tr>
					</table> -->
							<table class="students-exam-details">
								<thead>
									<tr>
										<th rowspan="2">SN</th>
										<th style="width: 20%;" rowspan="2">Subject Code</th>
										<th rowspan="2" style="width: 42%;" rowspan="2" colspan="1">Subject Name</th>
										<th rowspan="2" style="width: 10%;" rowspan="2" colspan="1">Max. Marks</th>
										<th rowspan="1" colspan="3">Marks Obtained </th>

										<th rowspan="2">Credits</th>
										<th rowspan="2">Grade</th>

									</tr>
									<tr>
										<th style="width: 10%;" rowspan="2">UE</th>
										<th style="width: 10%;" rowspan="2">IA</th>
										<th style="width: 10%;" rowspan="2">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$subject = $this->Exam_model->get_selected_subject_for_result($marksheet->result_id);

									$total_internal_mark_obtained = 0;
									$total_external_max_marks = 0;
									$total_external_marks_obtained = 0;
									$total = 0;
									$total_internal_mark = 0;
									$subjectcount = 0;
									$total_rows = 0;
									if (!empty($subject)) {
										foreach ($subject as $subject_result) {
											$subjectcount++;

											$total_internal_marks_obtained1 = $subject_result->internal_marks_obtained;
											$total_external_marks_obtained1 = $subject_result->external_marks_obtained;
											$total_obtained = $total_internal_marks_obtained1 + $total_external_marks_obtained1;

											$total += $total_obtained;

											//  echo "<pre>";print_r($total);exit;

											$total_internal_max_mark1 = $subject_result->internal_max_marks;
											$total_external_max_mark1 = $subject_result->external_max_marks;
											$total_max_marks = $total_internal_max_mark1 + $total_external_max_mark1;
											//  $total_max += $total_max_marks;
											$fourty_percente = ($total_max_marks * 40) / 100;
											$total_ = $subject_result->external_max_marks;

											$total_internal_mark += $subject_result->internal_max_marks;
											$total_internal_mark_obtained += $subject_result->internal_marks_obtained;
											$total_external_max_marks += $subject_result->external_max_marks;
											$total_external_marks_obtained += $subject_result->external_marks_obtained;


											// $grand_total =intval($total/$subjectcount);

									?>



											<tr>
												<td><?= $subjectcount ?></td>
												<td><?= $subject_result->subject_code ?> </td>
												<td class="td-left-text"><?= $subject_result->subject_name ?></td>
												<td><?= $total_max_marks ?></td>
												<td><?= $total_internal_marks_obtained1 ?></td>
												<td class="no_border"><?= $total_external_marks_obtained1 ?></td>
												<td class="no_border"><?= $total_obtained ?></td>
												<td></td>
												<td style="border-right:1px solid #85573b;"></td>
												<!-- <td><?= $obj->toText($total_obtained); ?></td> -->
											</tr>

										<?php
											$total_rows++;
										}
									}
									$extra = 11 - $total_rows;
									for ($e = 1; $e <= $extra; $e++) {

										?>
										<tr>
											<td></td>
											<td></td>
											<td class="td-left-text"></td>
											<td></td>
											<td></td>
											<td class="no_border"></td>
											<td class="no_border"></td>
											<td></td>
											<td style="border-right:1px solid #85573b;"></td>
										</tr>
									<?php
									}
									$total_int_mark = $total_internal_mark + $total_external_max_marks;
									$total_obt = $total_internal_mark_obtained + $total_external_marks_obtained;
									// echo "<pre>";print_r($total_int_mark);exit;

									$percent = ($total_obt * 100) / $total_int_mark;
									if ($percent >= 60) {
										$division = "First";
									} else if ($percent < 60 && $percent >= 45) {
										$division = "Second";
									} else {
										$division = "Third";
									}
									if ($percent >= 90) {
										$grade = "A+";
									} else if ($percent >= 80 && $percent < 90) {
										$grade = "A";
									} else if ($percent >= 70 && $percent < 80) {
										$grade = "B+";
									} else if ($percent >= 60 && $percent < 70) {
										$grade = "B";
									} else if ($percent >= 50 && $percent < 60) {
										$grade = "C";
									} else if ($percent >= 45 && $percent < 50) {
										$grade = "D";
									} else if ($percent >= 40 && $percent < 45) {
										$grade = "E";
									} else if ($percent < 40) {
										$grade = "F";
									}
									?>
									<tr>
										<th style="text-align: left;border-bottom:0px;padding:2px 10px;" rowspan="1" colspan="100%">GRAND TOTAL: <span style="color: var(--primaryBlack);"><?= $total ?></span></th>
									</tr>

									<tr>
										<th style="text-align: left;border-top:0px;padding:2px 10px;" rowspan="1" colspan="100%"> IN WORDS &ensp; <span style="color: var(--primaryBlack);"><?= $obj->toText($total); ?></span></th>
										<!-- <th></th> -->
									</tr>
								</tbody>
							</table>
							<table class="head_table_4">
								<tr>
									<th style="width: 50%;" class="td-left-text">Month and Year Of Examination</th>
									<th style="width: 20%;">Result </td>
									<th style="width: 20%;">SGPA</th>
									<th style="width: 20%;">CGPA </th>
								</tr>
								<tbody>

									<tr>
										<td>
											<?= $marksheet->examination_month ?> <?= $marksheet->examination_year ?>
										</td>
										<td><?php if ($marksheet->result == "0") {
												echo "PASS";
											} else if ($marksheet->result == "1") {
												echo "FAIL";
											} else if ($marksheet->result == "2") {
												echo "REAPPEAR";
											} else if ($marksheet->result == "3") {
												echo "ABSENT";
											} ?></td>
										<td> <?= number_format($percent, 2) ?>%</td>
										<td><?= $cgpa = $percent / 9.5;
											echo number_format($cgpa, 2); ?>%</td>
									</tr>
									<!-- <tr style="border:1px solid #000000;">
							<td class="td-left-text">Month and Year Of Examination <?= $marksheet->examination_month ?> <?= $marksheet->examination_year ?></td>
							<td>Result <?php if ($marksheet->result == "0") {
											echo "PASS";
										} else if ($marksheet->result == "1") {
											echo "FAIL";
										} else if ($marksheet->result == "2") {
											echo "REAPPEAR";
										} else if ($marksheet->result == "3") {
											echo "ABSENT";
										} ?></td>
							<td colspan="3" style="padding:0px;">
								<div style="display:flex; align-items: center;">
									<div style="width:50%; border-right: 1px solid; height: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
										Percentage <br>
										<?= number_format($percent, 2) ?>%
									</div>
									<div style="width:50%;">
										Grade <br>
										<?= $grade ?>
									</div>
								</div>
							</td>
							<td>
								CGPA <br>
								<?php
								// $percent =($cgpa_total_marks*100)/$total;
								$cgpa = $percent / 9.5;
								echo number_format($cgpa, 2);
								?>
							</td>
						</tr> -->
									<!-- <tr>
							<td class="td-left-text" colspan="5">IN WORDS: <?= $obj->toText($total); ?></td>
						</tr> -->
								</tbody>
							</table>

							<!-- <table class="students-exam-details" style="border:none;margin-top:30px">
								
								<tr>
									<td style="border:none;color:#4a190e; text-align:left;position:relative;">
										<span style="color: black;font-weight:300;position: absolute;
    top: -5px;font-family:'Arial';">Prepared By </span>

										Date:<span style="color: #000;"> <?= date("d-M-Y", strtotime($marksheet->marksheet_issue_date)) ?></span>
									</td>
									<td style="border:none;text-align:left;position:relative;">
										<img style=" width:70px;   position: absolute;
    left: -140px;
    top: 0;" src="<?= base_url() ?>images/stamp.png" alt=""><span style="color: black;font-weight:300;font-family:'Arial'">Checked by</span>

									</td>
									<td style="border:none;  padding-left:20px; padding-top: 30px;">

										<img style="width: 80px;margin-bottom: 13px;" src="<?= $this->Digitalocean_model->get_photo('certificate_signature/' . $marksheet->signature) ?>">
										<p><?= $marksheet->dispalay_signature; ?></p>
										
									</td>
								</tr>
							</table> -->

							<div class="footer-section">
								<div class="row">
									<div class="col" style="padding-top:35px">										<img style="width: 80px;margin-bottom: -9px;" src="<?= $this->Digitalocean_model->get_photo('certificate_signature/' . $marksheet->prepared_signature) ?>">										<p><?= $marksheet->prepared_dispalay_signature; ?></p> 									
										<p style="font-weight: bold;"><span>Date: </span><?= date("d-M-Y", strtotime($marksheet->marksheet_issue_date)) ?></p>
									</div>
									<div style="text-align:center" class="col"><img style=" width:138px;" src="<?= base_url() ?>images/stamp.png" alt=""></div>
									<div style="padding-top:35px" class="col">
									<img style="width: 80px;margin-bottom:-9px;" src="<?= $this->Digitalocean_model->get_photo('certificate_signature/' . $marksheet->checked_signature) ?>">
									<p><?= $marksheet->checked_dispalay_signature?></p>
									</div>
									 <div style="text-align:right;padding-top:35px" class="col">									 										<img style="width: 80px;margin-bottom:-9px;" src="<?= $this->Digitalocean_model->get_photo('certificate_signature/' . $marksheet->signature) ?>">																			<p><?= $marksheet->dispalay_signature; ?></p>
										<!--
										<div style="text-align:right;" class="col"><img style="width: 80px;margin-bottom: 13px;" src="<?=base_url()?>/images/sign.png" alt=""></div>
										-->
									</div>
								</div>

							</div>
						</div>
						<div class="back-page">



							<h1>Scheme of Grading</h1>

							<p>1. The Global University follows the following grading system:</p>

							<table class="grade-table">
								<thead>
									<tr>
										<th>Performance</th>
										<th>Letter Grade</th>
										<th>Percentage Score</th>
										<th>Grade Point</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Outstanding</td>
										<td>O</td>
										<td>90 - 100</td>
										<td>10</td>
									</tr>
									<tr>
										<td>Excellent</td>
										<td>E</td>
										<td>80 - 89</td>
										<td>9</td>
									</tr>
									<tr>
										<td>Very Good</td>
										<td>A</td>
										<td>70 - 79</td>
										<td>8</td>
									</tr>
									<tr>
										<td>Good</td>
										<td>B</td>
										<td>60 - 69</td>
										<td>7</td>
									</tr>
									<tr>
										<td>Fair</td>
										<td>C</td>
										<td>50 - 59</td>
										<td>6</td>
									</tr>
									<tr>
										<td>Below Average</td>
										<td>D</td>
										<td>40 - 49</td>
										<td>5</td>
									</tr>
									<tr>
										<td>Failed</td>
										<td>F</td>
										<td>&lt;40</td>
										<td>2</td>
									</tr>
									<tr>
										<td>Malpractice</td>
										<td>M</td>
										<td>-</td>
										<td>0</td>
									</tr>
									<tr>
										<td>Absent</td>
										<td>S</td>
										<td>-</td>
										<td>0</td>
									</tr>
								</tbody>
							</table>

							<p>2. A student’s overall academic performance shall be categorized by a GRADE POINT AVERAGE to be specified as:</p>
							<ul>
								<li><strong>SGPA:</strong> Semester Grade Point Average</li>
								<li><strong>CGPA:</strong> Cumulative Grade Point Average</li>
							</ul>

							<p>3. Definition of Terms:</p>
							<ul>
								<li><strong>POINT:</strong> Integer corresponding to each letter grade.</li>
								<li><strong>CREDIT:</strong> Integer signifying the relative emphasis of a particular course as indicated in the course structure and syllabus.</li>
								<li><strong>CREDIT POINT:</strong> CREDIT x GRADE POINT for each course.</li>
								<li><strong>CREDIT INDEX:</strong> Σ(CREDIT POINT) of all the courses registered by a student in a semester.</li>
								<li><strong>SGPA=</strong> (CREDIT INDEX / CREDIT) for a Semester.</li>
								<li><strong>CGPA=</strong></li>
							</ul>

							<div class="formula">
								<span class="curley">{</span> Σ <sup style="position: absolute;top:17px">i=n</sup> <sub>i=1</sub>
								< (CREDIT INDEX of i<sup>th</sup> Semester)<span class="curley">}</span> <span style='position: relative;top: 7px;font-size: 37px;'>/</span><span class="curley">{</span> Σ (CREDIT of i<sup>th</sup> Semester)<span class="curley">}</span>
							</div>

							<ul>
								<li><strong>n = 4</strong> for 2-year programs</li>
								<li><strong>n = 6</strong> for 3-year programs</li>
								<li><strong>n = 8</strong> for 4-year programs</li>
							</ul>



						</div>
					</div>









			</div>
		</div><!--row end-->


	</div>
	</div>
	</div>
	</div>
	</section>

<?php } ?>

<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>css/marksheet/main.js"></script>
</body>

</html>