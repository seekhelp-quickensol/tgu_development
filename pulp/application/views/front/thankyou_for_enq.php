<?php include('header.php');?>
<style>
 .thank_you_wrapper{
      padding: 50px 0;
      background: #f1f1f1;
      min-height: 500px;
  }
  .thankyou_details i{
    font-size: 20px;
    color: #fff;
    background: #4caf50db;
    width: 40px;
    height: 40px;
    line-height: 2;
    border-radius: 50%;
  }
  .thankyou_details{
    border: 1px solid #ccc;
    padding: 40px 30px 15px;
    background-color: #fff;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2) !important;
    text-align: center;
    width: 850px;
    margin: 0 auto;
  }
  .thankyou_details img{
      width: 100px;
      height: 100px;
      margin:0 auto;
  }
  .thankyou_details h2{
    font-size: 34px;
    color: #082d5d;
    font-weight: 900;
    margin-top: 10px;
  }
  .thankyou_details p{
    font-size: 16px;
    color: #333;
    width: 60%;
    margin: 15px auto 0;
  }
  .chart_details{
    text-align: center;
    margin: 0px auto 0px;
    width: 170px;
}
.chart_details a{
    background: #082d5d;
    padding: 8px;
    border-radius: 4px;
    color: #fff;
    font-size: 12px;
    margin: 21px auto 30px 30px;
    display: inline-block;
    text-align: center;
    width: 125px;
    font-weight: 700;
    text-transform: uppercase;
}
</style>
    <section class="thank_you_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="thankyou_details">
						 
						<!-- <div class="cdev" data-percent="<?=$percentage?>" data-duration="1000" data-color=",<?=$color?>"></div>-->
                        <!-- <img src="front_style/images/thank_you_page.png" class="img-responsive" alt=""> -->
                        <h2>Thank You !</h2>     
							 <p>Thank You!
				You have successfully submitted your enquiry form, we will contact you within 24 hours.</p> 
						 		
                        <div class="chart_details">
							
                            <a href="<?=base_url();?>">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php');?> 
<script src="<?=base_url();?>front_style/js/circlos.js"></script>
    <script>
     $(document).ready(function(){
      // init
         $(".cdev").circlos();


     });
    </script>

