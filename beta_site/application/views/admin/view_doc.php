<?php include('header.php');?>
<?php include('sidebar.php'); 
?> 
<section>
    <div >
        <div class="container-fuild formv">
            <div class="row">
                <div class="well col-md-12">
					<?php 
						$exp = explode(".",$_GET['naming']);
						$extension =  end($exp);
						if($extension == "pdf" || $extension == "docs"){
					?>
					<iframe src="<?=base64_decode($_GET['name'])?>#toolbar=0" style="width:100%;height:1200px"></iframe>
					<?php }else{?>
					<img src="<?=base64_decode($_GET['name'])?>" style="width:100%">
					<?php }?>
				</div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?> 