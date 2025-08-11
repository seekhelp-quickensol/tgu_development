<?php include('header.php');?>

<style>
    
.thank-you-container {
    margin: 100px auto;
    width: 430px;
    background: #fff;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(118, 119, 118, 0.05) 0px 8px 32px;
    padding: 20px;
    border: 1px solid #ccc;
}

.thank-you-head {
    text-align: center;
    font-size: 42px;
    color: #00a088;
    margin: 20px 0px;
}

.thank-you-btn {
    display: block;
    width: 60%;
    border: none;
    outline: none;
    text-align: center;
    color: #fff !important;
    text-decoration: none !important;
    background-color: #00a088;
    outline: none;
    font-size: 16px;
    text-transform: capitalize;
    padding: 5px;
    border-radius: 30px;
    margin-top: 20px;
    margin: 20px auto 0px;
    font-weight: 500;
}

.thank-you-content {
    margin-bottom: 15px;
}

.thank-you-container img {
    width: 64px;
}
</style>
<div class="jumbotron text-center thank-you-container animate animated fadeInDown">
    <img src="<?=$this->Digitalocean_model->get_photo('images/tick-mark.png')?>">
    <h1 class="thank-you-head">Thank You!</h1>
    <p class="thank-you-content"><strong>You have accepted our terms and conditions to apply for </strong>Transcript Certificate!</p>
    <hr> 
    <p class="lead">
        <a class="thank-you-btn" href="<?=base_url();?>dashboard" role="button">Continue to Dashboard</a>
    </p>
</div>

<!-- <section class="thank_you_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="thankyou_details">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <h2>Thank you for your registration!</h2>   
                        <p>Thanks for the registration, Now You can login in your account.</p> 
                        <div class="chart_details">
                            <a href="<?=base_url();?>">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<?php include('footer.php');?> 
