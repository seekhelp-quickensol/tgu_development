<?php 
    $university_details = $this->Front_model->get_university_details(); 
?>
 <!DOCTYPE html>
 <html>

 <head>
     <title>Letters</title>
     <meta name="description">
     <meta name="keywords">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap"
         rel="stylesheet">
     <style>
     @import "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap";
     @import "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap";

     body {
         width: 100%;
         height: 100%;
         margin: 0;
         background-color: #FAFAFA;
         font-family: 'Abel', sans-serif;
         font-family: 'Barlow Semi Condensed', sans-serif;
         color: #444444;
         font-size: 13px;
         padding: 10px;
     }

     * {
         box-sizing: border-box;
         -moz-box-sizing: border-box;
     }

     .form-control {
         background-color: #e9ecef00 !important;
         opacity: 1;
     }

     .page {
         width: 205mm;
         min-height: 291mm;
         padding: 0mm;
         margin: 0mm auto;
         background: white;
         position: relative;
     }

     .letter_area {
         height: 291mm !important;
     }

     .head_top_logo {
         height: 219px;
         text-align: center;
     }

     .padd_wrapper {
         padding: 38px;
     }

     .head_top_logo img {
         width: 350px;
     }
     </style>
 </head>

 <body>
     <div class="page">
         <div id="letter_section">
             <div>
                 <div class="letter-padding"

                     style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>);background-position: top;background-size: cover;padding: 297px 25px;border: 2px solid #e8612b;">

                     <div class="row">
                         <div class="col-lg-12 col-md-12">
                             <p style="width: 285px;margin: 0px auto;color: #000;font-weight: 700;font-size: 17px;">
                                 PROVISIONAL REGISTRATION LETTER</p>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-6 col-md-6">
                             <p class="letter-ref"
                                 style="color: #000;font-weight: 700;font-size: 14px;margin-top: 20px;">Ref. No.:
                                 TGU/PRL/<?=date("Y",strtotime($stu_data->enrollment_date));?>/<?php print_r(array_reduce(array_slice(str_split((string)$stu_data->enrollment_number),-5),function($a,$b){return $a.$b;}))?>
                             </p>
                         </div>
                         <div class="col-lg-6 col-md-6">
                             <p class="letter-ref"
                                 style="color: #000;font-weight: 700;font-size: 14px;text-align: right;margin-top: 20px;">
                                 Dated: <?=date("d-m-Y",strtotime($stu_data->enrollment_date));?></p>
                         </div>
                         <div class="col-lg-12 col-md-12">
                             <p style="color: #000;font-size: 15px;font-weight: 600;">To,
                                 <span style="display: block;font-weight: 700;"><?=$stu_data->student_name;?></span>
                             </p>
                         </div>
                         <div class="col-lg-12 col-md-12">
                             <p
                                 style="font-size: 15px;color: #000;font-weight: 700;margin-top: 10px;margin-bottom: 10px;">
                                 Subject: Provisional Registration for Ph.D. Degree</p>
                         </div>
                         <div class="col-lg-12 col-md-12">
                             <p
                                 style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 600;margin-bottom: 0px;">
                                 Dear Student,</p>
                             <p style="color: #000;font-weight: 600;font-size: 15px;margin-bottom: 15px;">You are
                                 provisionally registered for Ph.D. <?=" ".$stu_data->stream_name;?> with The Global
                                 University and shall be governed by the academic regulations of the
                                 University.</p>
                             <p style="font-size: 16px;font-weight: 700;color: #000;margin-bottom: 2px;">Father's Name:
                                 <span style="margin-left: 112px;"><?=$stu_data->father_name;?></span></p>
                             <p style="font-size: 16px;font-weight: 700;color: #000;margin-bottom: 2px;">Date of Birth:
                                 <span
                                     style="margin-left: 125px;"><?=date("d-m-Y",strtotime($stu_data->date_of_birth));?></span>
                             </p>
                             <p style="font-size: 16px;font-weight: 700;color: #000;margin-bottom: 2px;">
                                 Registration/Enrollment No.: <span
                                     style="margin-left: 24px;"><?=$stu_data->enrollment_number?></span></p>
                             <p style="font-size: 16px;font-weight: 700;color: #000;margin-bottom: 15px;">Date of
                                 Registration: <span
                                     style="margin-left: 77px;"><?=date("d-m-Y",strtotime($stu_data->enrollment_date));?></span>
                             </p>
                             <p style="font-size: 15px;font-weight: 600;color: #000;">The candidate shall be required to
                                 complete course work within two semester from the date of registration.</p>
                         </div>
                         <div class="col-lg-12 col-md-12">
                             <div style="width: 205px;float: right;text-align: center;margin-top: 35px;">
                                 <!-- <div style="width: 205px;float: right;text-align: center;margin-top: 35px;">
                                     <?php if(date("Y-m-d",strtotime($stu_data->created_on)) <= "2022-02-19"){ ?>
                                     <img style="width: 120px;"
                                         src="<?=
										 $this->Digitalocean_model->get_photo('images/Deputy_Registrar.png')
										 ?>">
                                     <?php }else{?>
                                     <img style="width: 120px;"
                                         src="<?=
										 $this->Digitalocean_model->get_photo('images/resurch_reg.jpeg')
										 ?>"
										 >
                                     <?php }?>
                                     <p style="color: #000;font-size: 15px;font-weight: 700;margin-bottom: 0px;">
                                         Research Director</p>
                                     <p style="color: #000;font-size: 15px;font-weight: 700;margin-bottom: 0px;">The Global
                                         University</p>
                                 </div> -->


                                 <!-- <div style="width: 205px;float: right;text-align: center;margin-top: 35px;">
                                    <img style="width: 100px; height:50px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$stu_data->signature)?>">   
                                    <span style=" display:block; color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"> Research Director</span>
                                    <span style=" display:block; color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"> <?php if(!empty($university_details)){ echo $university_details->university_name; } ?></span> 
                                </div> -->
                             </div>
                             <div class="col-lg-12 col-md-12">
                                 <p style="color: #000;font-size: 14px;font-weight: 700;margin-bottom: 2px;">Copy to:
                                 </p>
                                 <p style="color: #000;font-size: 14px;font-weight: 700;margin-bottom: 2px;">1.
                                     Registrar Office, <?php if(!empty($university_details)){ echo $university_details->university_name; } ?></p>
                                 <p style="color: #000;font-size: 14px;font-weight: 700;margin-bottom: 2px;">2. Dean
                                     Research</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div style="position: absolute;top: 25px;right: 85px;">
                 <!--<button type="button" class="btn btn-primary" onclick="PrintElem('.letter_section')" id="print_btn">Print &nbsp <i class="fas fa-print"></i></button>-->

             </div>
         </div>
     </div>
     </div>
     </div>
     </div>

     <script>
     $("#print_btn").click(function() {
         //$("#letter_section").print();
         //$("#letter_section").printThis();

         var divToPrint = document.getElementById('letter_section');

         var newWin = window.open('', 'Print-Window');

         newWin.document.open();

         /*newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
         newWin.document.write('<link rel="stylesheet" href="/css/custom.css" type="text/css"/>');
         newWin.document.write('</head><body>');*/
         newWin.document.write('<html><head><title></title>');
         newWin.document.write(
             '<link rel="stylesheet" href="https://www.theglobaluniversity.ac.in/back_panel/vendors/mdi/css/materialdesignicons.min.css" type="text/css"/>'
             );
         newWin.document.write(
             '<link rel="stylesheet" href="https://www.theglobaluniversity.ac.in/back_panel/vendors/base/vendor.bundle.base.css" type="text/css"/>'
             );
         newWin.document.write(
             '<link rel="stylesheet" href="https://www.theglobaluniversity.ac.in/back_panel/css/style.css" type="text/css"/>'
             );
         newWin.document.write(
             '<link rel="stylesheet" href="https://www.theglobaluniversity.ac.in/back_panel/css/responsive.bootstrap4.min.css" type="text/css"/>'
             );
         newWin.document.write(
             '<style type="text/css">.mt-15 { margin-top: 17px; } .letter-padding{padding: 400px 50px !important;} .letter-ref{margin-bottom: 25px;} @media print { .col-lg-6 {flex: 0 0 50%;max-width: 50%;position: relative;width: 100%;padding-right: 15px;padding-left: 15px;}}</style></head><body>'
             );
         newWin.document.write(divToPrint.innerHTML);
         newWin.document.write('</body></html>');

         newWin.document.close();
         setTimeout(function() {
             newWin.print();
             //newWin.close();
         }, 25);


         //setTimeout(function(){},10);
     });
     /*function PrintElem(elem) {
     	Popup(jQuery(elem).html());
     }

     function Popup(data) {
     	//alert(data);
     	var mywindow = window.open('', 'my div', 'height=1030px,width=1030px');
     	mywindow.document.write('<html><head><title></title>');
     	mywindow.document.write('<link rel="stylesheet" href="http://127.0.0.1/btu/back_panel/vendors/mdi/css/materialdesignicons.min.css" type="text/css"/>');
     	mywindow.document.write('<link rel="stylesheet" href="http://127.0.0.1/btu/back_panel/vendors/base/vendor.bundle.base.css" type="text/css"/>');
     	mywindow.document.write('<link rel="stylesheet" href="http://127.0.0.1/btu/back_panel/css/style.css" type="text/css"/>');
     	mywindow.document.write('<link rel="stylesheet" href="http://127.0.0.1/btu/back_panel/css/responsive.bootstrap4.min.css" type="text/css"/>');
     	mywindow.document.write('</head><body>');
     	mywindow.document.write(data);
     	mywindow.document.write('</body></html>');
     	mywindow.document.close();
     	mywindow.print();                        
     }*/
     </script>


