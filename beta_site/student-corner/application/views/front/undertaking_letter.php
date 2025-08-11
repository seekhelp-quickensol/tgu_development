<?php 
error_reporting('e_all');
$university_details = $this->Front_model->get_university_details();
if(!empty($single)){ 
    $division = $this->Front_model->get_student_division_for_degree($single->student_id);
    $session_name = $single->session_name;
    $stream_name = $single->stream_name;
    $course_name = $single->course_name;
?>
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
 
<div class="book">
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
                                GLOBAL UNIVERSITY</h1>
                                <span style="font-size: 12px !important;"><b>Established by the government of Manipur Act No. 9 of 2020, As per U/S 2(f) UGC Act 1956</b></span><br>
                                <span style="font-size: 10px !important;"><b>E-mail:info@tgu.com, Website: www.tgu.ac.in Mob.: +91 9354665946</b></span>
                        </div>
                    </div>

                </header>
            </section>
            <section style="width: 100%; padding: 0.5cm 1.5cm; ">
                <div class="middal" style="background-image: url('<?=base_url();?>assets/img/image89.png')');font-family: sans-serif;font-weight: 400;background-size: cover; background-position: center center;">
                    <div class="row" style="padding-bottom:20px;">
                        <div class="col-md-12">
						<span style="text-align:center;">
						<h4>Undertaking Form <br>(By the student)</h4>
						</span>
						</div>

                        <div class="col-md-6">
                            <span style="float:left;">To,<br>
							The Registrar,<br>
							Global University
							</span>
                            <span></span>
                        </div>
                        <div class="col-md-6">
                             <img src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$single->photo)?>"  alt="" style="border: 1px dotted #333333; float:right;" width="95" height="100"/> 
                        </div>
                       
                    </div>

                    
                     <p>Sir /Madam,</p>
                    <p>
                        This is to declare that, I <?php if($single->gender = 'Male'){?>
                            Mr.
                        <?php }else{ ?>
                            Ms.
                        <?php } ?> <b><?php echo $single->student_name;?></b>
                        <?php if($single->gender = 'Male'){?>
                            S/O
                        <?php }else{ ?>
                            D/O 
                        <?php } ?>
                          <b><?php if(!empty($single)){echo $single->father_name;}?></b> have taken admission in  <b><?php echo $course_name;?></b> course in (Winter / Summer) <?=$single->session_name?> under Bir Tikendrajit University.
						</p>
						<p> I have gone through the rules, regulations and Bachelor of  Education offered by the said University 
(Global University) and on being fully satisfied, I have applied for admission on my own. Hence 

						</p>
                    <p>
                        I am aware that the B.Ed program offered by the said university is not approved by the National Council of Teachers Education (NCTE) New Delhi and from any Regional Council. If I am unable to get advantage out of the said programme after its completion, in securing job, job promotion and / or further advancement of studies on any account and for any other reason, the said university will not be held responsible in any manner and I further also undertake not to claim and damages for the same from the University.
                    </p> 
				</section>
				<section style="padding: 0.5cm 1.5cm; font-family: sans-serif;font-weight: 400;">
                   
					<div style="width: 50%;  float:left">
						<div>
						Place:
						</div> 
						<div>
						Date: <?=date("d/m/Y",strtotime($single->enrollment_date));?>
						</div> 
					</div>
					<div style="width: 50%;margin-top: 0px; float:left">
						<div style="float: right; text-align: center;">
						
							<img style="width: 72px;" src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$single->signature)?>">
						<p style="">
							
							Signature of Candidate:
							</p>
						</div> 
					</div> 
					<div style="clear:both"></div>
				</section>	
				 <p style="margin-top: 40px;"><span style="margin-left:30%;"><b>Undertaking by the Admission and Cooperation Centers</b></p>
				<section style="padding: 0.5cm 1.5cm; font-family: sans-serif;font-weight: 400;">
					<div >
					<p>This is to certify that Mr./Ms./Mrs <b><?php echo $single->student_name;?></b> Son/ Daughter/ Wife <b><?php if(!empty($single)){echo $single->father_name;}?></b>  is a student registered from our admission and cooperation center. The photo pasted on this form depicts his/her current appearance correctly. I have personally checked all the documents enclosed herewith. I attest that all the entries are correct. I, as well as the candidate, know that if his/her result is finally not declared due to ineligibility, I and the students shall bear full responsibility for rejection and not the university.</p>
					</div>
					 <div style="width: 100%;">
						<div style="text-align: center;float: right;">
						<br>
						<br>
						<br>
							<!--<img style="width: 72px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">-->
						<p >
							
							Seal & Signature of the Centre Incharge
							</p>
						</div> 
					</div> 
					<div style="clear:both"></div>
				</section>	
            

        </div>
        <!-- <button class="print_button btn btn-success" id="print-button" style="float:right;">Print</button> -->
    </div>
</div>







<script src="http://127.0.0.1/btu-student/vendors/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#print-button').click(function() {
        $(".print_button").hide();
        window.print();
        $(".print_button").show();

    });
});
</script>


<?php }?>

