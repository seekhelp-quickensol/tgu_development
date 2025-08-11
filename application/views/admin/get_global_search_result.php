<?php include('header.php');?>

<style>
    .table-bordered th, .table-bordered td{
        border: 1px solid #4b0605;
    }
    .table thead th {
        color: #495057;
        background-color: #e9ecef;
        border-color: #4b0605;
        font-weight: bold;
    }
    .table.table-bordered {
        border-top: 1px solid #4b0605;
    }
</style>
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"> Search Results for: "<?= htmlspecialchars($keyword) ?>"</h4> 
							<div class="col-md-12" style="overflow: scroll;"> 
								<?php if (!empty($results)){ 
									$remov_col = array('is_deleted','updated_on','status');
								?>
									<?php foreach ($results as $table => $rows){ ?>
										<h4 style="margin-top: 25px;font-weight: bold;">Collection: <?php $tabe_name = str_replace("_"," ",$table); echo str_replace("tbl","",$tabe_name); ?> (<?= count($rows) ?> match<?= count($rows) > 1 ? 'es' : '' ?>)</h4>
										<table class="table table-bordered">
											<thead>
												<tr>
													<?php foreach (array_keys($rows[0]) as $col){ 
														if(!in_array($col,$remov_col)){
													?>
														<th><?= $col ?></th>
													<?php }} ?>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($rows as $row){ ?>
													<tr>
														<?php foreach ($row as  $col => $val){
															if(!in_array($col,$remov_col)){
														?>
															<td><?= htmlspecialchars($val) ?></td>
															<?php }} ?>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									<?php } ?>
								<?php }else{ ?>
										<p>No matches found for "<strong><?= htmlspecialchars($keyword) ?></strong>".</p>
								<?php } ?> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
<?php include('footer.php');?>
<script>
$(function() {
    // Autocomplete
    $('.search-input').autocomplete({
        source: "<?= site_url('admin/search/ajax_search') ?>",
        minLength: 2,
        select: function(event, ui) {
            if(ui.item.url) {
                window.location.href = ui.item.url;
            }
        }
    }).data('ui-autocomplete')._renderItem = function(ul, item) {
        return $('<li>')
            .append('<div><strong>'+item.label+'</strong></div>')
            .appendTo(ul);
    };
    
    // Focus on search field when '/' is pressed
    $(document).on('keyup', function(e) {
        if(e.key === '/' && !$(e.target).is('input,textarea,select')) {
            e.preventDefault();
            $('.search-input').focus();
        }
    });
});
</script>