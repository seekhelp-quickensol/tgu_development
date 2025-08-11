<?php include('header.php');?>
<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
<style>
	.row-btns{
		height:48px !important;
		line-height:25px;
		color:#fff !important;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-description">
                  
                  </p>
                  <form method="POST" id="generate-result-excel" name="generate-result-excel"  autocomplete="off">
                    <div class="row">
                      <div class="col-3">
                        <input type="text" name="date" id="date" class="form-control datepicker" autocomplete="off" Placeholder="Please Select From Date">
                      </div>
                      <div class="col-3">
                        <input type="text" name="to_date" id="to_date" class="form-control datepicker" autocomplete="off" Placeholder="Please Select To Date">
                      </div>
					  <div class="col-3">
                        <input type="text" name="enrollment_number" id="enrollment_number" class="form-control" autocomplete="off" Placeholder="Please enter enrollment number">
                      </div>
                     
                    </div>  
					<div class="row" style="margin-top:30px;">                        

					  <div class="col-3">                        

						  <select name="month" id="month" class="form-control js-example-basic-single">

							<option value="">Select Exam Month</option>

							<option value="January" <?php if($this->input->post('month') == 'January'){ echo 'selected'; }?>>January</option>

							<option value="February" <?php if($this->input->post('month') == 'February'){ echo 'selected'; }?>>February</option>

							<option value="March" <?php if($this->input->post('month') == 'March'){ echo 'selected'; }?>>March</option>

							<option value="April" <?php if($this->input->post('month') == 'April'){ echo 'selected'; }?>>April</option>

							<option value="May" <?php if($this->input->post('month') == 'May'){ echo 'selected'; }?>>May</option>

							<option value="June" <?php if($this->input->post('month') == 'June'){ echo 'selected'; }?>>June</option>

							<option value="July" <?php if($this->input->post('month') == 'July'){ echo 'selected'; }?>>July</option>

							<option value="August" <?php if($this->input->post('month') == 'August'){ echo 'selected'; }?>>August</option>

							<option value="September" <?php if($this->input->post('month') == 'September'){ echo 'selected'; }?>>September</option>

							<option value="October" <?php if($this->input->post('month') == 'October'){ echo 'selected'; }?>>October</option>

							<option value="November" <?php if($this->input->post('month') == 'November'){ echo 'selected'; }?>>November</option>

							<option value="December" <?php if($this->input->post('month') == 'December'){ echo 'selected'; }?>>December</option>

						  </select>

					  </div>

					  <div class="col-3">

						<select name="year" id="year" class="form-control js-example-basic-single">

						  <option value="">Select Exam Year</option>

							<?php for($year=2021;$year <= date("Y");$year++){?>

							<option value="<?=$year?>" <?php if($this->input->post('year') == $year){ echo 'selected'; }?>><?=$year?></option>

							<?php }?>

						  </select>                      

					  </div>

					  <div class="col-3">

						<select name="center" id="center" class="form-control js-example-basic-single">

						  <option value="">Select Center</option>

							<?php if(!empty($center)){ foreach($center as $result){?>

							<option value="<?=$result->id?>" <?php if($this->input->post('center') == $result->id){ echo 'selected'; }?>><?=$result->center_name;?></option>

							<?php }} ?>

						  </select>                      

					  </div>

					  <div class="col-3">

						 <input type="submit" name="Submit" class="btn btn-primary row-btns ">

					  </div>

					</div> 					
                  </form>
                </div>

                



              </div>




            </div>
          </div> 
          <div class="row">

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <form method="post" name="send_to_print" id="send_to_print">
          <input type="checkbox" id="toggle-all">
		  <button type="submit" name="send_btn" class="btn btn-primary row-btns" value="send_btn" style="padding: 10px;margin: 10px;margin-top: -12px;">Send to Print</button>
      
                <h4 class="card-title">All Data</h4>
        
                <p class="card-description">
                
                </p>
                <div id="divTableDataHolder">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>

              <?php 
              $array_of_heading = array("Sr. NO","Select","Signature","Center Name","Result Create Date","Enroll No","Username","Password","Name","Father Name","Year","Semester","Course","Stream","Month And Year of Exam","Grand Total MaxMin","Grand Total Marks Secu","Percentage","Grade","Result","Date of Issue");

                for($j = 1;$j<=20;$j++){
                  $array_of_heading[] = "Paper".$j;
                  $array_of_heading[] = "Sub".$j;
                  $array_of_heading[] = "UMax Marks".$j;
                  $array_of_heading[] = "UMarks Secu".$j;
                  $array_of_heading[] = "I max marks".$j;
                  $array_of_heading[] = "I Marks Secu".$j;
                  $array_of_heading[] = "Total MaxMin Marks".$j;
                  $array_of_heading[] = "Total Marks Secu".$j;
                  $array_of_heading[] = "Remarks".$j;

                }                
                $array_of_heading[] = 'Credit Transfer Note'
                // echo count($array_of_heading);exit;

            ?>
            <tr>
              
              <?php foreach($array_of_heading as $head): ?>
                <td><?=$head;?></td>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
  
                
              <?php
              if(!empty($all_data)){
              foreach($all_data as $data){ ?>
              <tr>
              <?php for($i=0;$i<count($data);$i++){?>
                <td><?php echo $data[$i]; ?></td>
              <?php } ?>
            </tr>
              <?php }} ?>
              
              </tbody>
            </table>
        </form>
</div>
    </div>
    </div>
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
/*
	$('#generate-result-excel').validate({
      rules:{
          date:"required",
      },
      messages:{
        date:"Please enter a date"
      }
  });
  */
    $(".datepicker").datepicker({
    changeMonth: true, // if you want to change months
    changeYear: true,  // if you want to change years
    yearRange: "-50:+10",
    clickInput: true,
  });



 window.onload = function(){
   $("#example").DataTable( {
		dom: 'Bfrtip',
    paging: false, 
		buttons: [ 
			{
				extend: "excelHtml5",
				  
              exportOptions: {
                    
                    format: {
                        body: function(data, row, column, node) {
                            var ret =  column === 4 ? "\0" + data : data;
                            ret = ret.replace('&amp;', '&')
                            return ret;
                            
                        }
                    }
                },
            /*customizeData: function ( data ) {
                for (var i=0; i<data.body.length; i++){
                    for (var j=0; j<data.body[i].length; j++ ){
                        data.body[i][j] = '\u200C' + data.body[i][j];
                    }
                }
            }*/           
            
			}
		]
	});
 }
$(document).ready(function(){
  // Toggle all checkboxes
  $('#toggle-all').click(function(){
    $('.checkbox').prop('checked', $(this).prop('checked'));
  });
  
  // Toggle the "Toggle All" checkbox if all checkboxes are checked or unchecked
  $('.checkbox').click(function(){
    if($('.checkbox:checked').length == $('.checkbox').length){
      $('#toggle-all').prop('checked', true);
    } else {
      $('#toggle-all').prop('checked', false);
    }
  });
});
 
 
</script>
 