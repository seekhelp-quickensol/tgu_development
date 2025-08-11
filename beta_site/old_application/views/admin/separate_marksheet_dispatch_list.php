<?php include('header.php');?>
<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- <div class="row">
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
            </div> -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
				                    <form method="post" name="remove_from_dispatch" id="remove_from_dispatch">
						                <input type="checkbox" id="toggle-all">
						                <button type="submit" name="send_btn" class="btn btn-primary" value="send_btn" style="padding: 10px;margin: 10px;margin-top: -12px;">Remove From Dispatch</button>
						                <h4 class="card-title">All Data</h4>
                                        <p class="card-description"></p>
                                        <div id="divTableDataHolder">
                                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <td>Sr. No.</td>
                                                        <td>Check Box</td>
                                                        <td>Center Name</td>
                                                        <td>Enrollment No.</td>
                                                        <td>Student Name</td>
                                                        <td>Exam Month and Year</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1;if(!empty($dispatched_marksheets)){ foreach($dispatched_marksheets as $dispatched_marksheets_result){ 
                                                        // echo "<pre>";
                                                        // print_r($dispatched_marksheets_result);exit();?>
                                                    <tr>
                                                        <td><?=$i++?></td>
                                                        <td><input class="checkbox" type="checkbox" name="ids[]" value="<?php if(!empty($dispatched_marksheets_result)){ echo $dispatched_marksheets_result->id;}?>"></td>
                                                        <td><?=$dispatched_marksheets_result->center_name?></td>
                                                        <td><?=$dispatched_marksheets_result->enrollment_number?></td>
                                                        <td><?=$dispatched_marksheets_result->student_name?></td>
                                                        <td><?=$dispatched_marksheets_result->examination_month?> <?=$dispatched_marksheets_result->examination_year?></td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>
                                            </table>
		                                </div>
                                    </form>
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
 