<?php include('header.php');?>
<style>
    .uni_mainWrapper{
        position: relative;
    }
    .messege-card{
        width: 45%;
    margin: 0 auto;
    text-align: center;
    position: absolute;
    top: 20%;
    left: 30%;
    background-color: #057ac733;
    border: 1px solid #05549e;
    border-radius: 8px;
    padding: 20px;
    }
    .messege-card img{
        width: 100px;
    margin: 0 auto;
    }
    .messege-card h3{
        font-weight: 600;
    color: #05549e;
    }
    .messege-card p{
        font-weight: 500;
    }
</style>

	<div class="clearfix"></div>

	<div class="uni_mainWrapper" style="min-height:500px;">

		<div class="container">
					<div class=" messege-card">
                        <?php 
                            if ($details->last_email_sent_on != "" && $details->last_email_sent_on != null) {
                                $sevenDaysLater = date('Y-m-d', strtotime($details->last_email_sent_on . ' + 7 days'));                               
                                if (date('Y-m-d') <= $sevenDaysLater) {
                        ?>
                        <img class="img-responsive" src="<?=base_url();?>assets/images/global_university_logo.png" alt="">
                            <h3>Dear <?=$details->student_name;?>,</h3>
                            <p>Your Ph.D Entrance Exam Results are Out.</p>
                            <p>Congratulations. You have cleared the entrance exam.</p>
                            <p>Please follow the further process for admission.</p>
                        <?php 
                            }else{
                        ?>
                            <p>This link is expired now. Please contact administrator.</p>
                        <?php 
                            } }
                        ?>
					</div>	

		</div>

	</div>

<?php include('footer.php');?>

