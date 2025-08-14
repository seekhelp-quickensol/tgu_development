<?php include('header.php');?>

<style type="text/css">

	

	.select2-container .select2-selection--single {

    border-radius: 0px;

    height: 47px;

    

}

.select2-container--default .select2-selection--single .select2-selection__rendered {

    /* padding-top: 10px; */

}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 35px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {

    height: 50px;

    

}

</style>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  

                  <form class="forms-sample" name="bank_form" id="bank_form"  >

				  <div class="row">

				  <div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputUsername1">Student : </label>

                      <select class="form-control js-example-basic-single" id="student" name="student" >

						<option value="">Select</option>

						<?php foreach($students as $stu): ?>

							<option value="<?=$stu->id;?>" <?php if(!empty($_GET["student"])){if($_GET["student"]==$stu->id){echo "selected";}}?>><?=$stu->student_name;?></option>

						<?php endforeach; ?>



					  </select>

					  <div class="error" id="id_name_error"></div>

                      

                    </div>

					</div>

					

					

					<div class="col-md-3" id="session-div">

                    <div class="form-group">

                      <label for="exampleInputUsername1">Session : </label>

                      <select class="form-control js-example-basic-single" id="session" name="session">

						<option value="">Select</option>

						<?php foreach($sessions as $sess): ?>

							<option value="<?=$sess->id;?>" <?php if(!empty($_GET["session"])){if($_GET["session"]==$sess->id){echo "selected";}}?>><?=$sess->session_name;?></option>

						<?php endforeach; ?>

					  </select>

					

                    </div>

					</div>

					

					<div class="col-md-3" id="session-div">

                    <div class="form-group">

                      <label for="exampleInputUsername1">Center : </label>

                      <select class="form-control js-example-basic-single" id="center" name="center">

						<option value="">Select</option>

						<?php foreach($centers as $cen): ?>

							<option value="<?=$cen->id;?>" <?php if(!empty($_GET["center"])){if($_GET["center"]==$cen->id){echo "selected";}}?>><?=$cen->center_name;?></option>

						<?php endforeach; ?>

					  </select>

					

                    </div>

					</div>



					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputUsername1">Year : </label>

                      <select class="form-control js-example-basic-single" id="year" name="year">

						<option value="">Select</option>

						<option value="2012" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2012"){echo "selected";}}?>>2012</option>

						<option value="2013" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2013"){echo "selected";}}?>>2013</option>

						<option value="2014" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2014"){echo "selected";}}?>>2014</option>

						<option value="2015" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2015"){echo "selected";}}?>>2015</option>

						<option value="2016" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2016"){echo "selected";}}?>>2016</option>

						<option value="2017" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2017"){echo "selected";}}?>>2017</option>

						<option value="2018" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2018"){echo "selected";}}?>>2018</option>

						<option value="2019" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2019"){echo "selected";}}?>>2019</option>

						<option value="2020" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2020"){echo "selected";}}?>>2020</option>

						<option value="2021" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2021"){echo "selected";}}?>>2021</option>

						<option value="2022" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2022"){echo "selected";}}?>>2022</option>

						<option value="2023" <?php if(!empty($_GET["year"])){if($_GET["year"]=="2023"){echo "selected";}}?>>2023</option>

						

					  </select>

					

                    </div>

					</div>





					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputUsername1">Month : </label>

                      <select class="form-control js-example-basic-single" id="month" name="month">

						<option value="">Select</option>

						<option value="01" <?php if(!empty($_GET["month"])){if($_GET["month"]=="01"){echo "selected";}}?>>01</option>

						<option value="02" <?php if(!empty($_GET["month"])){if($_GET["month"]=="02"){echo "selected";}}?>>02</option>

						<option value="03" <?php if(!empty($_GET["month"])){if($_GET["month"]=="03"){echo "selected";}}?>>03</option>

						<option value="04" <?php if(!empty($_GET["month"])){if($_GET["month"]=="04"){echo "selected";}}?>>04</option>

						<option value="05" <?php if(!empty($_GET["month"])){if($_GET["month"]=="05"){echo "selected";}}?>>05</option>

						<option value="06" <?php if(!empty($_GET["month"])){if($_GET["month"]=="06"){echo "selected";}}?>>06</option>

						<option value="07" <?php if(!empty($_GET["month"])){if($_GET["month"]=="07"){echo "selected";}}?>>07</option>

						<option value="08" <?php if(!empty($_GET["month"])){if($_GET["month"]=="08"){echo "selected";}}?>>08</option>

						<option value="09" <?php if(!empty($_GET["month"])){if($_GET["month"]=="09"){echo "selected";}}?>>09</option>

						<option value="10" <?php if(!empty($_GET["month"])){if($_GET["month"]=="10"){echo "selected";}}?>>10</option>

						<option value="11" <?php if(!empty($_GET["month"])){if($_GET["month"]=="11"){echo "selected";}}?>>11</option>

						<option value="12" <?php if(!empty($_GET["month"])){if($_GET["month"]=="12"){echo "selected";}}?>>12</option>

					  </select>

					

                    </div>

					</div>



					<div class="col-md-3" id="session-div">

                    <div class="form-group">

                      <label for="exampleInputUsername1">Transaction Id : </label>

                      

						<input class="form-control " type="text" name="transaction_id" value="<?php if(!empty($_GET["transaction_id"])){echo $_GET["transaction_id"];}?>">

					  

                    </div>

					</div>





                    <div class="clearfix"></div>

					<div class="col-md-12">

					<button type="submit" id="save_btn" class="btn btn-primary mr-2 mt-0">Submit</button>

					<a href="<?=base_url("amount-filter");?>" class="btn btn-primary mr-2" >Reset</a>

                    </div>

                  </form>

                </div>

              </div>

            </div>

            </div>

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">

                  <p class="card-description">

                    

                  </p>

                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

				<thead>

					<tr>

						<th>Sr. No.</th>

						<th>Name</th>

						<th>Enrollment No.</th>

						<th>Transaction Id</th>

						<th>Center Name</th>

						<th>Session Name</th>

						<th>Payment Date</th> 

						<th>Amount</th>

						

					</tr>

				</thead>

				<tbody>

						<?php $grand_total = 0 ; $i=1; foreach($datas as $data): ?>

							<tr>

								<td><?=$i++; ?></td>

								<td><?=$data->student_name;?></td>

								<td><?=$data->enrollment_number;?></td>

								<td><?=$data->transaction_id;?></td>

								<td><?=$data->center_name;?></td>

								<td><?=$data->session_name;?></td>

								<td><?=$data->payment_date;?></td>



								<td><?=$data->total_fees;?></td>



							</tr>

						<?php $grand_total+=$data->total_fees; endforeach; ?>



				</tbody>

					<tfoot>

						<tr>

								<td>GRAND TOTAL</td>

								<td><?=$grand_total;?></td>

								<td></td>

								<td></td>

								<td></td>

								<td></td>

								<td></td>



								<td></td>



							</tr>

					</tfoot>

			</table>

                </div>

              </div>

            </div>

          </div>

        </div>

      

<?php include('footer.php');

$id = 0;

if($this->uri->segment(2) !=""){

	$id = $this->uri->segment(2);

}

?>

 <script>

 $(document).ready(function () {



	

	$('#example').DataTable({

		bFilter: false,

		 // bInfo: false,

		 dom: 'Bfrtip',

		buttons: [ 

			'excel', 

		],

    }); 



   

});

</script>