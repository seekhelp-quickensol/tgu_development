<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.page {
    width: 21.01cm;
    height: auto;
    /* min-height: 29.7cm; */
    /* padding: 1.5cm; */
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.under-page {

    min-height: 25.62cm;

}


@page {
    size: A4;
    margin: 0;
}

@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }

    .logo {
        width: 100%;
        height: auto;
    }


}
</style>
<? 
// print_r($single);exit();
?>
<div class="book">
<?php 
$university_details = $this->Setting_model->get_university_details();
?>
    <div class="page">
        <div class="under-page">
            <section>
                 <header style="border-bottom: 5px #d34838 solid; padding: 0.5cm 1.0cm; font-family: sans-serif;
    font-weight: 380;">
                    <div class="row">
                        <div class="logo"   style="width: 20%; height: 160px; overflow: auto;float:left">
                            <img class="img" src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" style="width: 130px;">
                        </div>
                        <div class=" title"  style="width: 80%; height: 160px; overflow: auto;float:left;text-align:left">
                            <h1 class="title_name" style="font-size: 32px !important; font-weight: 900; font-family: fantasy; color: #db4931 !important; ">
                                THE GLOBAL UNIVERSITY</h1>
                                <span style="font-size: 12px !important;"><b>Established by the government of Manipur Act No. 9 of 2020, As per U/S 2(f) UGC Act 1956</b></span><br>
                                <span style="font-size: 10px !important;"><b>E-mail:info@birtikendtajituniversity.com, Website: www.birtikendrajituniversity.ac.in Mob.: +91 9354665946</b></span>
                        </div>
                    </div>

                </header>
            </section>
            <section style="width: 100%; height: 300px; padding: 0.5cm 1.5cm; ">
                <div class="middal" style="background-image: url('<?=base_url();?>assets/img/image89.png');font-family: sans-serif;
    font-weight: 400;
      background-size: cover;
      background-position: center center;">
                    <div class="row" style="padding-bottom:20px;">
                        <div class="col-md-6"> 
                            <span>Ref :BTU/<?=$single->id;?>/SY/<?=date("Y",strtotime($single->admission_date));?></span>
                            <span>
                                <?php if(!empty($single)){?>

                                <?php }?>
                                </span>
                        </div>
                        <div class="col-md-6" style="text-align: left;">
                            <!-- <span>No. </span> -->
                        </div>
                    </div>

                    <p>To,</p>
                    <p><?php echo $single->guide_name;?>,</p>

                    
                    <p style="margin-top: 40px;">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span><b>Subject - &nbsp; </span>Registration for Ph.D Degree</b></p>

                    <p><b>Dear Sir/Madam</b>,</p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is in reference to the proposal submitted by 
                        <?php echo $single->student_name;?>
                        regarding registration for Ph.D. degree. We are pleased to inform you that the said candidate has been registered for Ph.D. degree with the University and shall be governed by the academic regulations of the university.
                    </p>
                    <p><b>Thesis Title: <?php echo $single->thesis_title;?></b></p>
                    <p><b>Registration No: <?php echo $single->enrollment_number;?></b></p>

            </section>
            <section style="padding: 0.5cm 1.5cm; font-family: sans-serif;font-weight: 400;">
                <div style=" height: 190px; position:relative;">
					<?php if($single->signature !=""){?>
					<div>
                        <p style="text-align: end; margin-right: 23px; margin-top: 20px;">
                            With Kind Regards,
							
                        </p>
						<img style="width: 72px;float: right;position: absolute;right:47px;top: 0px;margin:1px; margin-bottom: 4px; margin-top: 16px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>">
                    </div>
                    <div>
                        <p style="text-align: end; margin-right: 23px; margin-top: 53px;">
                            <b><?=$single->dispalay_signature;?>
                            </b>
                        </p>
                    </div>
					<?php }else{?>
                    <div>
                        <p style="text-align: end; margin-right: 23px; margin-top: 20px;">
                            With Kind Regards,
							
                        </p>
						<img style="width: 72px;float: right;position: absolute;right:47px;top: 0px;margin:1px; margin-bottom: 4px; margin-top: 16px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/nehajain.png')?>">
                    </div>
                    <div>
                        <p style="text-align: end; margin-right: 23px; margin-top: 53px;">
                            <b>Authorised Signatory<br>
                                THE GLOBAL UNIVERSITY,<br>
                                Canchipur, Imphal West, <br>
                                Manipur</br></p>
                            </b>
                        </p>
                    </div>
					<?php }?>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Mr./Ms. ……………………..</p>
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
            </section>
            <section>
                <footer style="border-top: 4px #d34838 solid; padding: 0.5cm 1.5cm; font-family: sans-serif;
    font-weight: 400; ">
                    <div class="row">
                        <div class="col-md-12" >
                            <span><b>University Campus: <?php if(!empty($university_details)){ echo $university_details->address;}?></b></span>
                        </div>
                    </div>
                </footer>
            </section>

        </div>
        <!-- <button class="print_button btn btn-success" id="print-button" style="float:right;">Print</button> -->
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