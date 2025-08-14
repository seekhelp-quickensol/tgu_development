
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sample Marksheet Back Side</title>
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
			max-height: 295mm;
			height: 100%;
			background-size: cover;
			/*border: 2px solid transparent;*/
			background-position: 0 -16px;
			background-repeat: no-repeat;
			/*border: none;*/
			border-left: 6px solid #fff;
			border-right: 7px solid #fff;
			padding: 0;
			margin: 0;
			margin-top: 5mm;
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
			/*text-transform: capitalize;*/
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
			body{
				 
			}
			.book{
				 background-image: url(https://www.tgu.ac.in/images/tgu_bg.jpg);
					background-size: cover;
					
					
					
			}
			.subpage{
				background-image:none;
				border:none;
				margin-top:0;
			}
			.front-page{
				border:none;
				margin-top:0;
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
			/*width: 25%;*/
			width: 33.33%;
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
			padding: 0px 10px 10px;
			/* border: 1px solid #ddd; */
			margin: 5px 0 20px;
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
			padding: 3px 5px;
		}
	</style>
</head>
<body>
	<div class="book">
		<div class="page">
			<div class="subpage">
				
					<div class="print-wrapper">
						
						<div class="back-page">
							<h1>Scheme of Grading</h1>
							<p>1. The Global University follows the following Grading system:</p>
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
										<td>90 ≥ X ≤ 100</td>
										<td>10</td>
									</tr>
									<tr>
										<td>Excellent</td>
										<td>A+</td>
										<td>80 ≥ X < 90</td>
										<td>9</td>
									</tr>
									<tr>
										<td>Very Good</td>
										<td>A</td>
										<td>70 ≥ X < 80</td>
										<td>8</td>
									</tr>
									<tr>
										<td>Good</td>
										<td>B+</td>
										<td>60 ≥ X < 70</td>
										<td>7</td>
									</tr>
									<tr>
										<td>Above Average</td>
										<td>B</td>
										<td>50 ≥ X < 60</td>
										<td>6</td>
									</tr>
									<tr>
										<td>Average</td>
										<td>C</td>
										<td>41 ≥ X < 50</td>
										<td>5</td>
									</tr>
									<tr>
										<td>Pass</td>
										<td>P</td>
										<td>X = 40</td>
										<td>4</td>
									</tr>
									<tr>
										<td>Failed</td>
										<td>F</td>
										<td>X < 40</td>
										<td>0</td>
									</tr>
									<tr>
										<td>Absent</td>
										<td>AB</td>
										<td></td>
										<td>0</td>
									</tr>
									<tr>
										<td>Pass</td>
										<td>PS</td>
										<td></td>
										<td>0</td>
									</tr>
									<tr>
										<td>Not Passed</td>
										<td>NP</td>
										<td></td>
										<td>0</td>
									</tr>
								</tbody>
							</table>
							<p>2. A student’s overall academic performance shall be categorized by GRADE POINT AVERAGE to be specified as:</p>
							<ul>
								<li><strong>SGPA:</strong> Semester Grade Point Average</li>
								<li><strong>CGPA:</strong> Cumulative Grade Point Average</li>
							</ul>
							<p>3. Definition of Terms:</p>
							<ul style="margin-bottom:5px;">
								<li><strong>POINT:</strong> Integer corresponding to each letter grade.</li>
								<li><strong>CREDIT:</strong> Integer signifying the relative emphasis of a particular subject as indicated in the course structure and syllabus.</li>
								<li><strong>CREDIT POINT:</strong> CREDIT x GRADE POINT for each subject.</li>
								<li><strong>CREDIT INDEX:</strong> Σ(CREDIT POINT) of all the subjects registered by a student in a semester.</li>
								<li><strong>SGPA=</strong> (CREDIT INDEX / Σ CREDIT) for a Semester.</li>
								<li><strong>CGPA=</strong></li>
							</ul>
							<div class="formula">
								<span class="curley">{</span> Σ <sup style="position: absolute;top:11px">i=n</sup> <sub>i=1</sub>
								< (CREDIT INDEX of i<sup>th</sup> Semester)<span class="curley">}</span> <span style='position: relative;top: 7px;font-size: 37px;'>/</span><span class="curley">{</span> Σ (CREDIT of i<sup>th</sup> Semester)<span class="curley">}</span>
							</div>
							<ul>
								<li><strong>n = 4</strong> for 2-year program</li>
								<li><strong>n = 6</strong> for 3-year program</li>
								<li><strong>n = 8</strong> for 4-year program</li>
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

</body>
</html>