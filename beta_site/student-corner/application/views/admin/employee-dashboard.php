<?php include('header.php');?>
<?php include('sidebar.php');?>
<section>
    <div class="container-fluid">
        <div class="container">
		
            <div class="row chart">
			<h2 class="htitle">Welcome To E-Document Verification Portal</h2>	
                <div class="well col-md-offset-3 col-md-12">
				<div id="chartContainer" style="height: 475px; width: 100%; text-align: left !important;"></div>
                 </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Verification Chart",
		horizontalAlign: "center"
		

		// text-align: center;
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: <?=count($student)?>, label: "New Students" },
			{ y: <?=count($verified_student)?>, label: "Verified Students" }, 
		]
	}]
});
chart.render();

}
</script>