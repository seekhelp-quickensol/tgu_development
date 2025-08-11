<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"> Search Globally</h4> 
							<div class="col-md-12">
								<form method="post" action="<?=base_url()?>get_global_search_result">
									<div class="row">
										<div class="col-md-6">
											<div class="search-container mb-4">
												<input type="text" name="search_keyword" class="form-control" placeholder="Search entire database..." required>
												<button type="submit" class="btn btn-primary mt-2">Search</button> 
											</div>
										</div>
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