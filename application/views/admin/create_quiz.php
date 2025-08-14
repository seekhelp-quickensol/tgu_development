<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Test Name : <?php if(!empty(!empty($test_title))){ echo $test_title->test_name;}?></h4>
                   	<input type="hidden" id="test_id" value="<?= $this->uri->segment(2)?>" />
                   	<?php
                   		$test_id = $this->uri->segment(2);
                   		for ($i=0; $i < count($test_data); $i++) {
                   			$q_no = $i + 1;
                   			?>
                   			<button class="question_number" value="<?= $test_data[$i]->id ?>"><?= $q_no ?></button>
                   			<?php
                   		}
                   	?>
                </div>
              </div>
            </div>
			<div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h3>Question Title</h3>
                   <div style="float:right;">
                  	<button type="button" class="btn btn-danger" id="delete_question" name="delete_question" onclick="deleteQuestion()">Delete Question</button>
                  	</div>
					<!--<div class="row">
						<button type="button" class="btn btn-secondary"><a href="<?= base_url().'upload_question_via_csv/'.$this->uri->segment(2)?>"> Upload Questions Via CSV</a></button>
						</div>
						<hr>-->
                   <form method="post" name="registration_form" id="registration_form" enctype="multipart/form-data" onsubmit="return submitForm()">
                  	<label for="exampleInputUsername1">Question *</label>
					<input type="text" class="form-control" rows=3 placeholder="Enter Question here" id="question" name="question">
                  	<input type="hidden" id="question_number_id" name="question_number_id" value=""/>
                  	<div class="input-group" style="display:none">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
					  </div>
					  <div class="custom-file">
					    <input type="file" name="img_file" class="custom-file-input" id="img_file"
					      aria-describedby="inputGroupFileAddon01" onchange="loadFile(event)">
					    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					  </div>
					</div>
					<img id="upload_image" src="" width=100 height=100/>
					<hr>
					<br>
                  	<div id="option_answers">
                   <table id="test_master_parameter_table" class="table table-striped table-bordered append_to">
						<tr>
							<th>Correct Answer</th>
							<th>Text</th>
							<th><a href="javascript:void()" class="btn btn-primary pull-right add">Add Option</a></th>
						</tr>
						<tbody class="optionBox">
						</tbody>
					</table>
					<input type="hidden" id="correct_ans" name="correct_ans" val=""/>
                  	</div>
                  	<button class="btn btn-primary mb-2" type="submit" id="submit_question">Save Question</button>
                </div>
            </form>
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

$(document).ready(function() {
	
	$("#upload_image").hide();
	$("#delete_question").hide();
	$(".add").click(function(){
		var add_test_parameter = '<tr><td class="col-md-3 col-sm-3 col-xs-12"><div class="form-group parameter_name"><input class="form-check-input" type="radio" name="checkans[]" ></div></td><td class="col-md-3 col-sm-3 col-xs-12"><div class="form-group"><input class="" type="text" name="ans[]"></div></td><td><span class="remove btn btn-danger">Remove</span></td></tr>';
		$('.optionBox').append(add_test_parameter);
			
	});

	$('.optionBox').on('click','.remove',function() {
		$(this).parent().parent().remove();
	});

	$(".question_number").click(function(){
		//get question data via ajax get request
		var question_id = $(this).val()
		$.ajax({
				type: "POST",
				url: "<?=base_url();?>admin/Ajax_controller/get_quiz_question_by_id",
				data: {'question_id' : question_id},
				success: function(data){
					$('.optionBox').html("");
					$("#delete_question").show();

					var all_data = JSON.parse(data);
					var options = JSON.parse(all_data.text_data);
					var IMG_NAME = options.options.img_data;
					console.log(IMG_NAME);
					var img_location =  ""+window.location.origin+"/images/phd_quiz/"+IMG_NAME+"";
					var image = document.getElementById('upload_image');
					if(IMG_NAME){
						image.src = img_location;
						$("#upload_image").show();
					}else{
						image.src = "";
						$("#upload_image").hide();
					}
					$("#question").val(options.options.question);
					var options_data = options.options.options;
					$("#question_number_id").val(all_data.id);
					var selected_ans = options.options.selected_ans;
					for(var i = 0; i < options_data.length; i++){
						console.log(options_data[i]);
						var is_checked = ""
						if (parseInt(selected_ans) -1 == i){
							is_checked = "checked";
						}
						var add_test_parameter = '<tr><td class="col-md-3 col-sm-3 col-xs-12"><div class="form-group parameter_name"><input class="form-check-input" type="radio" name="checkans[]" '+is_checked+'></div></td><td class="col-md-3 col-sm-3 col-xs-12"><div class="form-group"><input type="text" name="ans[]" value="'+ String(options_data[i])+'"></div></td><td><span class="remove btn btn-danger">Remove</span></td></tr>';
						$('.optionBox').append(add_test_parameter);
					}
										
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
	});

});


function submitForm(){
	var atLeastOneIsChecked = $('input[name="checkans[]"]:checked').length == 1;

	var numberOfAnswers = $('input[name="checkans[]"]').length;
	var question = $.trim($('#question').val());
	if(question === ""){
		alert('Please enter question');
		return false;
	}else if (numberOfAnswers < 2) {
        alert('Please add at least 2 answers.');
        // Remove the added row since the condition is not met   
        return false;
	}else if(!atLeastOneIsChecked){
    	// alert('Please select only 1 as ans for above question');
    	alert('Please select correct answer');
    	return false;
    }
    var selected_ans = "";
	var i = 1;
	  $('.optionBox tr').each(function () {
            var textval = $(this).find("td").eq(1).find(":text").val();
            var ddlval = $(this).find("td").eq(0).find(":checked").val();
            if(ddlval){
            	selected_ans = i;
            	$("#correct_ans").val(selected_ans);
            }
            i++;
       });
}

	var loadFile = function(event) {
		var image = document.getElementById('upload_image');
		image.src = URL.createObjectURL(event.target.files[0]);
		$("#upload_image").show();
	}

	function deleteQuestion(){
		//delete the question
		var question_id = $("#question_number_id").val();
		var test_id = $("#test_id").val();
		if(question_id){
			var data = {'question_id' : question_id,'test_id' : test_id,
				};
			$.ajax({
				type: "POST",
				url: "<?=base_url();?>admin/Ajax_controller/delete_quiz_question",
				data: data,
				success: function(data){
						alert('Question Deleted Successfully');
						location.reload(); 				
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});
		}

	}
</script>
