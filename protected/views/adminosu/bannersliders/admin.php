<table id="mail_outbox" class="mail_table table table-hover toggle-arrow-tiny" data-filter="#mailbox_search" data-page-size="20">
	<thead>
		<tr>
			<th>Image </th>

			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody data-link="row" class="rowlink">
		<?php foreach($this->getAllBannersliders() as $slider){
		?>
		<tr>
			<td><img width="300" class="img-thumbnail" alt="" src="<?php echo $this -> baseUrl(); ?>/assets/uploads/images/thumbnail/<?php echo $slider -> banner_image; ?>" style="float: left;"></td>
			<td class="col_sm"><a class="btn btn-default btn-sm btn-edit" href="<?php echo $this -> baseUrl() . '/' . $this -> admin; ?>/bannersliders/update/id/<?php echo $slider -> banner_id; ?>"> <span class="fa fa-pencil-square-o fa-lg"></span> Edit </a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
	$(function(){
		$(".btn-edit").click(function(){
			var href = $(this).attr('href');
			$('.view-x').load(href,function(){
				$("#myModal").modal('show');
			});
			return false;
		});
	});
</script>