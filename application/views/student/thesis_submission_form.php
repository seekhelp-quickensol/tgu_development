<?php include('header.php')?>
<style>
    .logo_heading{
        display: flex;
    align-items: center;
    text-align: center;
    position: relative;
    display: flex;
    align-items: center;
    text-decoration: none;
}
.logo{
    width: 100px;
    position: absolute;
    top: 0px;
    padding: 10px 30px 0;
    left: -12px;
}
.univercity_text {
    flex: 1;
    text-align: center;
}
.univercity_text h4{
    font-size: 40px;
    color: #255bab;
    text-decoration: none;
    text-align: center;
    margin: 30px 0 25px;
    line-height: 30px;
}
.univercity_text p {
     font-family: sans-serif;
    font-size: 16px;
    color: #255bab;
    text-align: center;
    margin-bottom: 6px;
    letter-spacing: 2px;
}
</style>
    <div class="row wrapper border-bottom white-bg page-heading">
        
    </div>
    <div class="mt_20"></div>
        <div class="card-body animated fadeInUp">
            <div class="row">
                
                <?php if(!empty($single_thesis) && ($single_thesis->thesis_status == 1) || empty($single_thesis)){?>
                    <div class="col-lg-4 form-align-center">
                    <div class="card">
                        <?php 
                            if(!empty($single_thesis) && $single_thesis->thesis_status == 1){?>
                                 <div class="col-lg-8" style="margin:0px auto">
                                <p style="color:red">There are following deficiency</p>
                                <p><?=$single_thesis->remarks?></p>
                            </div>
                    <?php }?>
                        <div class="card-body">
                            <form id="thesis_form" id="thesis_form" method="POST"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="" class="lable_style">Thesis title<span style="color:red" > *</span></label>
                                    <input type="text" id="thesis_title" name="thesis_title" value="<?php if(!empty($single_thesis)){ echo $single_thesis->thesis_title;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Thesis title name">
                                </div>
                                <div class="form-group">
                                     <label for="" class="lable_style">Upload Thesis:<span style="color:red" > *</span></label>
                                   <input type="file" name="userfile2" class="form-control" id="userfile2">
                                   <input type="hidden" name="softcopy" id="softcopy"  value="<?php if(!empty($single_thesis)){ echo $single_thesis->softcopy; } ?>">
                                </div>
                                <div class="form-group">
                                     <label for="" class="lable_style">Paper Journal<span style="color:red" > *</span></label>
                                    <input type="text" id="paper_journal1" name="paper_journal1" value="<?php if(!empty($single_thesis)){ echo $single_thesis->paper_journal1;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Paper journal">
                                   
                                </div>

                                <div class="form-group">
                                    <input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(!empty($single_thesis)){ echo $single_thesis->id;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="lable_style">Guide name<span style="color:red" > *</span></label>
                                    <select class="form-control" name="name" id="name">
                                         <option value="">Please select Guide Name</option>
                                       <?php 
                                            if(!empty($guide_data)){foreach ($guide_data as $guide_data_res){?>
                                             <option value="<?=$guide_data_res->id;?>" <?php if(!empty($single_thesis) && $single_thesis->guide_id == $guide_data_res->id){ ?>selected="selected"<?php }?>><?=$guide_data_res->name;?></option>

                                            <?php } } ?>
                                    </select>
                                </div>
                                <div class="font-weight-600">
                                    <button type="submit" class="btn btn-danger btn-block"> <i class="fa fa-plus"></i>Submit</button>                            
                                </div>
                            </form>
                        </div>
                    </div>
                        <?php }
                        if(!empty($single_thesis) && $single_thesis->thesis_status == 2){ ?>
                           <div class="col-lg-4 form-align-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                             <label for="" class="lable_style">Waiting from Campus!</label>
                            </div>
                        </div>
                    </div>
                        <?php } 
                        if(!empty($single_thesis) && $single_thesis->thesis_status == 0){ ?>
                          <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                             <div id="container">
       
        <div id="page_heading">
            <!-- <p>Thesis Submission (For Hindi title please install Kruti Dev 010 font) </p> -->
        </div>
        <div id="detaildiv">
            <p align="right" style="padding-right: 20px;"><a href="javascript:printCard();"><img src="<?=base_url();?>images/sprint.png" border="0" /></a></p>
                <div id="printDiv">
<?php       
                
    $valid=false;
    $scholarName=$submissionDate=$fatherName=$enrollNo=$enrollDate=$streamName=$title=$guideName=$remark=$registrationId="";
    $status=2;
    $vivaStatus=0;
    $titleLan=0;
    $spanId="";
    
    
        if(!empty($single_thesis)){
            $scholarName=$single_thesis->student_name;
            $regKey=$single_thesis->student_id;
            $fatherName=$single_thesis->father_name;
            $enrollNo=$single_thesis->enrollment_number;
            $enrollDate=date("d-m-Y",strtotime($single_thesis->admission_date));    
            $streamName=$single_thesis->stream_name;             
        }
        

            $status=$single_thesis->thesis_status;
            $vivaStatus=$single_thesis->viva_status;
            $titleLan=$single_thesis->title_language;
            if($status==1){
                $valid=false;
                $remark=$single_thesis->remarks;
            }
            else{
                $valid=true;
                $submissionDate=date("d-m-Y",strtotime($single_thesis->submission_date));
                $title=$single_thesis->thesis_title;
                $guideName=$single_thesis->guide_name;
            }
         
        if($valid==true and $status==0 and $vivaStatus==0){
            if($titleLan==0){
                $spanId="titleEng";
                $title=strtoupper($title);
            }
            else
                $spanId="titleHin";
?>
       <div class="header_details">
           <!--  <div class="logo_details">
                    <img src="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo !=""){ echo $university_details->logo;}else{ echo "demolog.png";}?>">
            </div> -->
                <div class="logo_heading">
                    <div class="logo">
                        <img src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>">
                    </div>
                    <div class="univercity_text">
                        <h4>THE GLOBAL UNIVERSITY</h4>
                        <p>Complete Learning Management Solution Process</p>
                    </div>
                </div>
           <!--  <div class="univercity_text">
              <h2>THE GLOBAL UNIVERSITY</h2>
              <p>Complete Learning Management Solution Process</p>
            </div> -->
        </div>
        <h2 class="text-center">THESIS LETTER</h2>
        <table class="detailTable2" width="670px" cellpadding="2" align="center">   
                <tr><td class="data" colspan="2">&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>     
                <tr><td>&nbsp;</td></tr>          
                <tr><td align="center" colspan="2"><span class="form">THESIS SUBMISSION LETTER</span></td></tr>
                <tr><td>&nbsp;</td></tr>     
                <tr><td>&nbsp;</td></tr>     
                <tr><td>&nbsp;</td></tr>
                <tr><td>Ref. No.:&nbsp;&nbsp;&nbsp;SU/SOR/<?=date("Y",strtotime($single_thesis->created_on))?>/<?php echo $regKey ?></td>
                    <td align="right">Dated:&nbsp;&nbsp;&nbsp;<?php echo $submissionDate ?></td>
                </tr>
                <tr><td>&nbsp;</td></tr>     
                <tr><td>&nbsp;</td></tr>
            </tbody>
        </table>
        <table class="detailTable2" width="670px" cellpadding="3" align="center">   
                <tr><td>&nbsp;</td></tr>     
                <tr><td align="center"><p class="matter1" align="center"><b>Subject:&nbsp;&nbsp;Thesis Submission for Ph.D. Degree</b></p></td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td><p class="matter">This is to certify that Mr./Ms. <b><?php echo strtoupper($scholarName) ?></b> son/daughter of <b><?php echo strtoupper($fatherName) ?></b> having
                                         Enrollment/Registration No. <b><?php echo strtoupper($enrollNo) ?></b> Dated <b><?php echo strtoupper($enrollDate) ?></b> has submitted 
                                         his/her thesis in partial fulfillment of the requirement for the degree of Doctor of Philosophy in <b><?php echo strtoupper($streamName) ?></b>. 
                            His/her research topic is <b>"<span class="<?php echo $spanId ?>"><?php echo $title ?></span>"</b> done under the supervision of <b>Dr. <?php echo strtoupper($guideName) ?></b>.
                        </p></td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td align="right"><img src="<?=$this->Digitalocean_model->get_photo('images/resurch_reg.jpeg');?>" width="92" height="50" /></td>
                <tr><td align="right"><p>Dean (Research)<br />Global University</p></td>
                <tr><td>Copy to:</td>
                <tr><td>
                    <table>
                        <tr><td>1.</td><td><p class="matter">Registrar Office, Global University</p></td></tr>
                        <tr><td>2.</td><td><p class="matter">Dean Research</p></td></tr>                        
                    </table>
                </td></tr>
            </tbody>
        </table>
       
<?php
        }
          
?>
         
                </div>
                        <?php }?>
                        </div>
                    </div>
                </div>

<?php include('footer.php');?>
    <script>
        $(document).ready(function () {     
            jQuery.validator.addMethod("validate_email", function(value, element) {
                if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
                    return true;
                }else {
                    return false;
                }
            }, "Please enter a valid Email.");  
            $('#thesis_form').validate({

                rules: {
                    thesis_title:{
                        required: true,
                    },
                    paper_journal1:{
                        required: true,
                    },
                    userfile2:{
                        required:true
                    },
                    name:{
                        required:true
                    },                    
                    
                },
                messages: {
                    thesis_title: {
                        required: "Please enter synopsis title",
                    },
                    paper_journal1: {
                        required: "Please enter paper journal",
                    },
                    userfile2:{
                        required:"Please upload thesis"
                    },
                    name: {
                        required: "Please select guide name",
                    },
                   
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>               