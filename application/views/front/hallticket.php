<!DOCTYPE html>
<html>

<body onload="window.print()">

<style type="text/css">
  body {
    margin: 0;
    padding: 0;
  }

  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    padding: 3px;
  }

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }

  .Mystar {
    color: Red;
  }

  .card {
    box-shadow: 1px 4px 8px 1px rgba(0, 0, 0, 0.2);
    width: 650px;
    margin: auto;
    text-align: left;
    border: 2px solid;
  }

  button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: #000;
    background-color: #3e9dff;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
    font-weight: bold;
  }

  .title {
    color: grey;
    font-size: 18px;
  }

  .subject_table tr td {
    border: 1px solid black;
  }

</style>

<script type="text/javascript">
  function printContent(el) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>

<?php $university_details = $this->Setting_model->get_university_details();
// echo "<pre>";print_r($students);exit;
?>

<?php if (!empty($students)) { ?>
<div id="div1" class="block">
    <div class="form-body">
        <div id="div-1" class="block">
            <table class="card">
                <tr>
                    <td colspan="3" style="border-bottom: 2px solid;">
                        <table style="width:100%; text-align: center;">
                            <tr>
                                <td>
                                    <img src="<?= base_url(); ?>assets/images/global_university_logo.png" alt="Logo" style="width: 75px; height: 75px;">				
                                </td>
                                <!--<td>
                                    <div>
                                        <p>Email: Test@gmail.com</p>
                                        <p>Contact: 0000000000</p>
                                        <p>Address: 209, Goodwill Square, Dhanori, Pune, Maharashtra - 411015</p>
                                    </div>
                                </td>-->
                            </tr>
                            <tr>
                                <td>
                                    <div class="uni-details">
                                        <span style="color: #101444d1; font-size: 30px; font-weight: bold;"><?=$university_details->university_name?></span>
                                        <p style="margin:2px 0px;"><?=$university_details->slogan?></p>
                                        <p style="margin-top: 2px;margin-bottom: 5px;font-size: 18px;font-weight: 600;color: #3b3e66;"><?=$university_details->address?></p>
                                        <span style="color: #000; font-size: 20px; font-weight: bold;">Hall Ticket</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
				<tr>
    <td colspan="3" style="text-align: center;">
        <span style="color: #000; font-weight: bold;">(Information as furnished by the Candidate)</span><br />
        <span style="float: right; margin-right: 30px; font-size: 15px; font-weight: bold;">Enrollment No</span><br />
        <br />
        <div style="float: right; border: 1px solid; width: 180px; height: 35px; margin-right: 7px;">
            <span style="float: right; margin-right: 30px; font-size: 15px; font-weight: bold;margin-top: 7px;">
                <label ID="lblIdno"><?= $students->enrollment_number ?></label>
            </span>
        </div>
        <br />
        <div style="float: right; border: 1px solid; margin: 30px -135px 0 0;">
            <!-- <img id="imgpo" width="100px" height="100px" Style="margin: 5px 5px 5px 5px;" src="<?= base_url();?>images/profile_pic/<?=$students->photo ?>" /> -->
			<img id="imgpo" width="100px" height="100px" Style="margin: 5px 5px 5px 5px;" src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$students->photo)?>" />
        </div>
        <br />
        <div style="float: right; border: 1px solid; width: 180px; height: 40px; margin: 135px -184px 0 0;">
            <!-- <img id="Imagesignature" width="100px" height="30px" style="margin: 5px 5px 5px 5px;" src="<?= base_url(); ?>images/signature/<?= $students->signature ?>" /> -->
			<img id="Imagesignature" width="100px" height="30px" Style="margin: 5px 5px 5px 5px;" src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$students->signature)?>" />
        </div>
    </td>
</tr>
<tr>
    <td colspan="3">
        <table style="border: 1px solid; margin: -209px 0 0 10px; width: 415px; height: 155px; font-weight: bold;">
            <tr>
                <td style="padding-left: 10px;">Name</td>
                <td>:</td>
                <td><label class="uppercase"><?= $students->student_name ?></label></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Father name</td>
                <td>:</td>
                <td><label class="uppercase"><?= $students->father_name ?></label></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Date of birth</td>
                <td>:</td>
                <td><label class="uppercase"><?= date("d/m/Y", strtotime($students->date_of_birth)) ?></label></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Course</td>
                <td>:</td>
                <td><label class="uppercase"><?= $students->print_name ?></label></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Stream</td>
                <td>:</td>
                <td><label class="uppercase"><?= $students->stream_name ?></label></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Year/Sem</td>
                <td>:</td>
                <td><label class="uppercase"><?= $students->year_sem ?></label></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Category</td>
                <td>:</td>
                <td><label class="uppercase"><?= $students->category ?></label></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Address</td>
                <td>:</td>
                <td><label id="lbldoorno"><?= $students->address ?></label></td>
            </tr>
        </table>
    </td>
</tr>
<!--
<tr>
    <td>
        <table class="subject_table" id="customers" style="margin: 1px 0 0 10px;height: 100px;width: 65%;font-weight: bold;">
            <tr>
                <td style="font-size: 15px;">Subject Code</td>
                <td style="font-size: 15px;">Subject Name</td>
            </tr>
            <?php if (!empty($subject)) {
                foreach ($subject as $subject_result) { ?>
                    <tr>
                        <td style="font-size: 15px;"><?= $subject_result->subject_code ?></td>
                        <td style="font-size: 15px;"><?= $subject_result->subject_name ?></td>
                    </tr>
                <?php }
            } ?>
        </table>
    </td>
</tr>-->
<tr>
    <td>
        <p style="padding-left: 13px;">Declaration:-</p>
        <p style="padding-left: 13px;">I solemnly declare and confirm that I am duly qualified to take the examination in the course for which I have applied, and all the certificates and testimonials attached to my application are true and valid. I have also cleared all my University’s dues.</p>
        <p style="padding-left: 13px;">I shall always follow the rules and regulations of the University, and in case of any breach thereto, I shall be liable to be penalized for the same, which may include expulsion from the University.</p>
    </td>
</tr>
<tr>
    <td>
        <ul style="list-style: none; padding-left: 10px; display: flex;
    justify-content: space-between;">
            <li style="float: left">
                <!-- <img src="<?= base_url(); ?>images/exam_control.jpg" width="100px" height="30px" style="float: left; margin: -35px 18px -90px 22px;" alt="sigen" />
                <span style="">Controller of Examination</span> -->
                <img style="width : 100px;" src="<?=base_url();?>assets/images/asst_registrar.jpg">   
			    <p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;text-align:center;">Asst. Registrar</p>

			 

            </li>
            <li style="float: right">
            <img style="width : 100px;" height="30px" Style="margin: 5px 5px 5px 5px;" src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$students->signature)?>">
                <p style="margin-right:15px;font-weight: 600;">Signature of Student</p>
            </li>
        </ul>
    </td>
</tr>
                         
</table>
</div>
</div>
</div>
<?php } ?>
</body>
</html>

