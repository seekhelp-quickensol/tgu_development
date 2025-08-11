
<?php 

// echo "<pre>";print_r($single);exit;
$university_details = $this->Setting_model->get_university_details();

// error_reporting('e_all');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree</title>
    <meta name="description">
    <meta name="keywords">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/ee2b5c4f2d364f4ecf1d16cfa190eb78?family=Windsor+W01+Antique+Bold"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/da9c60d0202fc2ae82fb432982369f0e?family=Ascender+Serif+W02+Italic"
        rel="stylesheet">
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
        background: none;
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
        padding: 215px 38px 38px;
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
</head>

<body>
    <div class="page"
    style=" background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>);background-position: center top; background-size: cover;height: 100%;">
        <div id="letter_section" >
            <div
                style="border: 1px solid #e8612b; width: 100%; height: 306.50mm;  margin:0px auto;padding:2px;border-radius:4px">
                <div
                    style="border: 2px solid #e8612b; width: 100%; height: 304.8mm;  margin:0px auto;padding:2px;border-radius:2px">
                    <div style="border: 1px solid #e8612b; width: 100%; height: 302.65mm;  margin:0px auto;">
                        <div id="letter_section">
                            <div>
                                <div class="letter_area">
                                    <div class="head_row"
                                        style="display:flex; justify-content: space-between; align-items: center;">
                                        <div style="padding-left: 20px;">
                                            <!-- <p style="font-family: sans-serif;font-size: 15px;">Sr No.: -->
                                                <!-- <?=$degree->sr_no?></p> -->
                                                <!-- <?=$degree->id?></p> -->
                                                <p style="float: left;padding-left: 30px; margin-bottom:0px;font:bold; font-weight: 700">Sr No. : <?=date('Y',strtotime($single->created_on));?><?=substr($single->enrollment_number,-6);?></p>	


                                        </div>
                                        <div style="padding-left: 20px; padding-top: 15px;">
                                            <?php $smart = $single->id."-".$single->student_id."-".$single->enrollment_number."-".$single->student_name."-".$single->father_name."-".$single->created_on;							
                                            $course_year = $this->Student_certificate_model->get_year_duration($single->course_id,$single->stream_id);							 						?>
                                            <img style="width: 75px;margin-right:59px;"
                                                src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?=$smart?>&choe=UTF-8"
                                                alt=""> </div>
                                    </div>
                                    <div class="padd_wrapper">
                                        <!-- <div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>">
                                             <?php 
                                          
                                            ?> 
                                           
                                        </div> -->
                                        <!--<div style="text-align:center;">-->
                                        <!--	<img style="height: 20px;margin-top: 21px;" src="<?=base_url();?>images/img/Picture2.png" alt="">-->
                                        <!--</div>-->
                                        <h1
                                            style="font-family: sans-serif-400; color: #000; text-align: center; font-size: 30px; margin-bottom: 0px; margin-top:-64px; text-transform:uppercase; padding-top:55px;">
                                            <?=$single->print_name; ?></h1>
                                        <h3
                                            style="font-family: sans-serif; color: #000; text-align: center; font-size: 22px; font-style: italic; margin-top: 0px;">
                                            (<?php if($course_year->year_duration == "1"){ echo "One";}else if($course_year->year_duration == "2"){ echo "Two";}else if($course_year->year_duration == "3"){ echo "Three";}else if($course_year->year_duration == "4"){ echo "Four";}?>
                                            Year Course)</h3>
                                        <p
                                            style="font-family: sans-serif; color: #000; text-align: center; font-size: 22px;  margin-top: 50px;margin-bottom: 0px;">
                                            This Certifies that </p>
                                        <p
                                            style="font-family: Windsor W01 Antique Bold; color: #000; text-align: center; font-size: 24px;  margin-top: 10px;margin-bottom: 10px;">
                                            <b><?=$single->student_name; ?></b></p>
                                        <p
                                            style="font-family: sans-serif; color: #000; text-align: center; font-size: 22px;  margin-top: 10px;margin-bottom: 10px;">
                                            has qualified for the single of </p>
                                        <p
                                            style="font-family: Windsor W01 Antique Bold; color: #000; text-align: center; font-size: 24px;  margin-top: 10px;margin-bottom: 10px;">
                                            <?=$single->print_name; ?> <b>(<?=$single->stream_name;?>)</b></p>
                                        <p
                                            style="font-family: sans-serif; color: #000; text-align: center; font-size: 22px; line-height: 38px;  margin-top: 10px;margin-bottom: 10px;">
                                            of this University in the examination held in the year <span
                                                style="font-family: Windsor W01 Antique Bold; color: #000;"><?=$division_degree['date']?></span>
                                            and he/she has secured with <span
                                                style="font-family: Windsor W01 Antique Bold; color: #000;"><b><?=$division_degree["division"]?></b></span><b>Division</b>.
                                        </p>
                                        <p
                                            style="font-family: Ascender Serif W02 Italic; color: #000; text-align: center; font-size: 20px; padding-top: 5px;padding-bottom: 5px;">
                                            Given under the seal of the University</p>
                                        <div
                                            style="display:flex; justify-content: space-between; align-items: center; padding-top: 30px;gap: 60px;">
                                            <!-- <div style="text-align: center;"> <img style="width: 115px;margin-top:15px;"
                                                    src="<?=base_url();?>images/img/registrar-sign.png" alt="">
                                                <p
                                                    style="font-family: sans-serif; color: #000; text-align: center;font-size: 15px;">
                                                    Registrar <br> Global University</p>
                                            </div> -->


                                            <div style="width: 205px;float: right;text-align: center;margin-top: 125px;">
                                                <img style="width: 170px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>">   
                                                <p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$single->dispalay_signature;?></p>
                                            </div>

                                            <div style="text-align: center;"> 
                                            <!-- <img style="width: 115px;"  src="<?=base_url();?>images/img/stamp.png" alt=""> -->
                                                <img style="width: 170px;" src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->stamp)?>">   
                                                    
                                                <p style="font-family: sans-serif; color: #000; text-align: center;font-size: 14px;">
                                                    Arunachal Pradesh, Dated <?=date('jS F Y',strtotime($single->issue_date)); ?>
                                                </p>
                                            </div>
                                            <!-- <div style="text-align: center;"> <img style="width: 90px;"
                                                    src="<?=base_url();?>images/img/vc-sign.png" alt="">
                                                <p
                                                    style="font-family: sans-serif; color: #000; text-align: center;font-size: 15px;">
                                                    Vice Chancellor<br>Global University</p>
                                            </div> -->

                                            <div style="width: 205px;float: right;text-align: center;margin-top: 125px;">
                                                <img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->chancellor_signature)?>">   
                                                <p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$single->display_chacellor_signature;?></p>
                                            </div>
                                        </div>
                                        <div style="position: absolute; bottom: 30px;">
                                            <p style="font-family: sans-serif;font-size: 13px;">Enrol. No.
                                                <?=$single->enrollment_number;?></p>
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
</body>

										
</body></html>