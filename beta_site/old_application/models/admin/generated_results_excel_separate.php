<?php include('header.php');?>
<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">

    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-description"></p>
                  
                  <form method="POST" id="generate-result-excel" autocomplete="off">
                    <div class="row">
                      <div class="col-4">
                        <input type="text" name="date" id="date" class="form-control" autocomplete="off" Placeholder="Please Select Result Create Date">
                      </div>
                      <div class="col-3">
                        <input type="submit" name="Submit" class="btn btn-success">
                      </div>
                    </div>    
                  </form>
                </div>

                



              </div>




            </div>
          </div>

          <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
				 <form method="post" name="send_to_print" id="send_to_print">
						<input type="checkbox" id="toggle-all">
						<button type="submit" name="send_btn" class="btn btn-primary" value="send_btn" style="padding: 10px;margin: 10px;margin-top: -12px;">Send to Print</button>
						
                  <h4 class="card-title">All Data</h4>
                  <p class="card-description">
                  
                  </p>
                  <!-- <div id="divTableDataHolder"> -->
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>

              <?php 
              $array_of_heading = array("Sr.NO","Check All","Signature","Center Name","Result Create Date","Enroll No","Username","Password","Name","Father Name","Year","Semester","Course","Stream","Month And Year of Exam","Grand Total MaxMin","Grand Total Marks Secu","Percentage","Grade","Result","Date of Issue");

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
              
              
            <?php foreach($all_data as $data): ?>
            <tr>
            <?php for($i=0;$i<count($data);$i++){?>
               <td><?php echo $data[$i]; ?></td>
            <?php } ?>
          </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
		  </form>
        <!-- </div> -->
                </div>
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
 


	$('#generate-result-excel').validate({
      rules:{
          date:"required",
      },
      messages:{
        date:"Please enter a date"
      }
  });
  
    $("#date").datepicker({
    changeMonth: true, // if you want to change months
    changeYear: true,  // if you want to change years
    yearRange: "-50:+10",
    clickInput: true,
  });



 window.onload = function(){
   $("#example").DataTable( {
		dom: 'Bfrtip',
    //paging: false, 
		buttons: [ 
			{
				extend: "excelHtml5",
        title:"Generate Result",
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
 