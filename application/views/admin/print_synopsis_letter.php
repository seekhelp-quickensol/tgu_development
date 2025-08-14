<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<style>
  @import "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap";
    @import "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap";
    @import "https://db.onlinewebfonts.com/c/ee2b5c4f2d364f4ecf1d16cfa190eb78?family=Windsor+W01+Antique+Bold";
    @import "https://db.onlinewebfonts.com/c/da9c60d0202fc2ae82fb432982369f0e?family=Ascender+Serif+W02+Italic";

    @font-face {
        font-family: "Windsor W01 Antique Bold";
        src: url("https://db.onlinewebfonts.com/t/ee2b5c4f2d364f4ecf1d16cfa190eb78.eot");
        src: url("https://db.onlinewebfonts.com/t/ee2b5c4f2d364f4ecf1d16cfa190eb78.eot?#iefix")format("embedded-opentype"), url("https://db.onlinewebfonts.com/t/ee2b5c4f2d364f4ecf1d16cfa190eb78.woff2")format("woff2"), url("https://db.onlinewebfonts.com/t/ee2b5c4f2d364f4ecf1d16cfa190eb78.woff")format("woff"), url("https://db.onlinewebfonts.com/t/ee2b5c4f2d364f4ecf1d16cfa190eb78.ttf")format("truetype"), url("https://db.onlinewebfonts.com/t/ee2b5c4f2d364f4ecf1d16cfa190eb78.svg#Windsor W01 Antique Bold")format("svg");
    }

    @font-face {
        font-family: "Ascender Serif W02 Italic";
        src: url("https://db.onlinewebfonts.com/t/da9c60d0202fc2ae82fb432982369f0e.eot");
        src: url("https://db.onlinewebfonts.com/t/da9c60d0202fc2ae82fb432982369f0e.eot?#iefix")format("embedded-opentype"), url("https://db.onlinewebfonts.com/t/da9c60d0202fc2ae82fb432982369f0e.woff2")format("woff2"), url("https://db.onlinewebfonts.com/t/da9c60d0202fc2ae82fb432982369f0e.woff")format("woff"), url("https://db.onlinewebfonts.com/t/da9c60d0202fc2ae82fb432982369f0e.ttf")format("truetype"), url("https://db.onlinewebfonts.com/t/da9c60d0202fc2ae82fb432982369f0e.svg#Ascender Serif W02 Italic")format("svg");
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    body {
        width: 230mm;
        /* height: 100%; */
        /* height: 304.8mm; */
        padding: 0;
        margin: 0px auto;
    }

    .page {
        /* width: 210mm; */
        /* min-height: 304mm; */
        margin: 0;
        padding: 0px;
        /* margin: 0px auto; */
        /* background: none; */
        position: relative;
    }

    .letter_area {
        height: auto !important;
    }

    .head_top_logo {
        /*height: 200px;*/
        text-align: center;
    }

    .padd_wrapper {
        /* height:100%; */
        padding: 255px 38px 38px;
    }

    .head_top_logo img {
        width: 350px;
        margin-top:-58px !important;
    }

    @page {
        size: 9in 12.1in;
        margin: 0cm 0.2cm;
    }

    @media print {

        html,
        body {
            width: 228.6mm;
            /* height: 304.8mm; */
            /* padding: 0px;   */
        }

        .page {
            height: auto;
            margin: 0px;
            /* padding: 10px; */
            width: initial;
            /* height: 304.8mm;  */
        }
    }
</style>
<? 
// print_r($single);exit();
?>
<div class="book">
<?php 
$university_details = $this->Setting_model->get_university_details();

// echo "<pre>";print_r($university_details);exit;
?>
   



<div class="page"
    style=" background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>);background-position: top; background-size: contain;background-repeat:no-repeat;">
        <div id="letter_section" >
            <div
                style="border: 1px solid #e8612b; width: 100%; height: 306.50mm;  margin:0px auto;padding:2px;border-radius:4px">
                <div
                    style="border: 2px solid #e8612b; width: 100%; height: 304.8mm;  margin:0px auto;padding:2px;border-radius:2px">
                    <div style="border: 1px solid #e8612b; width: 100%; height: 302.65mm;  margin:0px auto;">
                        <div id="letter_section">
                            <div>
                                <div class="letter_area">
                                    <!-- <div class="head_row"
                                        style="display:flex; justify-content: space-between; align-items: center;">
                                        <div style="padding-left: 20px;">
                                            <p style="font-family: sans-serif;font-size: 15px;">Sr No.:
                                                <?=$degree->sr_no?></p>
                                        </div>
                                        <div style="padding-left: 20px; padding-top: 15px;">
                                            <?php $smart = $degree->id."-".$degree->student_id."-".$degree->enrollment_number."-".$degree->student_name."-".$degree->father_name."-".$degree->created_on;							$course_year = $this->Student_certificate_model->get_year_duration($degree->course_id,$degree->stream_id);							 						?>
                                            <img style="width: 75px;"
                                                src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$smart?>&choe=UTF-8"
                                                alt=""> </div>
                                     
                                    </div> -->
                                    <div class="padd_wrapper">
                                    <div class="row" style="padding-bottom:20px;">
                        <div class="col-md-6">
                            <span>Ref Date : <?=date("d-m-Y");?></span>
                            <spna>
                                <?php if(!empty($single)){?>

                                <?php }?>
                                </span>
                        </div>
                        <div class="col-md-6" style="text-align: left;">
                            <!-- <span>No. </span> -->
                        </div>
                    </div>

                    <p>To,</p>
                    <!-- <p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $single->guide_name;?>,</p> -->
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo !empty($single->guide_name) ? $single->guide_name : ''; ?></p>


                   
                    <p style="margin-top: 40px;">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span><b>Subject - &nbsp; </span>Registration for Ph.D Degree</b></p>

                    <p><b>Dear Sir/Madam</b>,</p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is in reference to the proposal submitted by 
                        <!-- <?php echo $single->student_name;?> -->
                        <?php echo !empty($single->student_name) ? $single->student_name : ''; ?>
                        regarding registration for Ph.D. degree. We are pleased to inform you that the said candidate has been registered for Ph.D. degree with the University and shall be governed by the academic regulations of the university.
                    </p>
                    <!-- <p><b>Thesis Title: <?php echo $single->thesis_title;?></b></p> -->
                    <p><b>Thesis Title: <?php echo !empty($single->thesis_title) ? $single->thesis_title : ''; ?></b></p>

                    <!-- <p><b>Registration No: <?php echo $single->enrollment_number;?></b></p> -->
                    <p><b>Registration No: <?php echo !empty($single->enrollment_number) ? $single->enrollment_number : ''; ?></b></p>


                    <div style="width: 100%; height: 190px;  margin-right: 0px;">
                    <div>
                        <p style="text-align: end; margin-right: 23px; margin-top: 20px;">
                            With Kind Regards,
                        </p>
                    </div>
                    <div style="float: right;text-align: center;margin-top: 125px;">
                        <img style="width: 100px; height:50px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>">   
                        <span style=" display:block; color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$single->dispalay_signature;?></span>
                    </div>
                    <div>
                        <p style="text-align: end; margin-right: 23px; margin-top: 20px;">
                            <b>Authorised Signatory<br>
                               THE GLOBAL UNIVERSITY
                                <!-- Naharlagun, Itanagar, <br>
                                Manipur</br> -->
                            </p>
                            </b>
                        </p>
                    </div>

                    <img style="width: 130px;margin-top: 90px;" src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->stamp)?>">   

                </div>

                <div>
                    <div>
                        <p>
                            CC: 
                        </p>
                        <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Registrar office
                        </p>
                        <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Ms ……………………..</p>
                    </div>
                    <div>
                        <p><b>Note:</b></p>
                        <p>
                        The Candidate is Required to Submit the following at the time of submission of the thesis:<br>
                        &nbsp;&nbsp;&nbsp;&nbsp; •	Five Typed or printed copies of the thesis along with the soft copy in CD <br>
                        &nbsp;&nbsp;&nbsp;&nbsp; •	Five Copies of approved synopsis along with the soft copy in CD <br>
                        &nbsp;&nbsp;&nbsp;&nbsp; •	Seven printed copies of abstract of the thesis in the form of an article <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; not exceeding 5000 words for publication. <br>
                        &nbsp;&nbsp;&nbsp;&nbsp; •	Two papers to be published compulsorily in reputed International Journals, copy needs to be enclosed. <br>
                        &nbsp;&nbsp;&nbsp;&nbsp; •	A Certificate from the supervisor stating that the candidate has put in the required attendance and the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;thesis is based on the candidate’s own work. <br>
                        &nbsp;&nbsp;&nbsp;&nbsp; •	Seminar Certificate
                        </p>
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




<script src="<?=base_url();?>vendors/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#print-button').click(function() {
        $(".print_button").hide();
        window.print();
        $(".print_button").show();

    });
});
</script>