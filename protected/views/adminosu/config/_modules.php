<style>
	.panel-heading{
		cursor:pointer;
	}
</style>
<script>
	$(function(){
		$('.module').click(function(){
			$('.module-list').toggle();
		});
		$('.page').click(function(){
			$('.page-banner').toggle();
		});
		$('.contact').click(function(){
			$('.contact-us').toggle();
		});
		$('.home').click(function(){
			$('.home-banner').toggle();
		});
	});
</script>
<?php 
if(!empty($modules)){
?>
<div class="panel panel-default">
	<div class="panel-heading module">
		<i class="ion-gear-a"></i> Modul List <i class="ion-android-system-windows" style="float: right;"></i>
	</div>
	<div class="panel-body grid_visual module-list" style="display: none;">
		<div class="panel panel-default">
			<table id="mail_outbox" class="mail_table table table-hover toggle-arrow-tiny" data-filter="#mailbox_search" data-page-size="20">
				<thead>
					<tr>
						<th>Module</th>
						<th>Url</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody data-link="row" class="rowlink">
					<?php foreach($modules as $module){?>
					<tr>
						<td><?php echo $module->module_name;?></td>
						<td><?php echo $module->url_link;?></td>
						<td class="col_sm">
							<a class="btn btn-default btn-sm btn-edit" href="<?php echo $this->baseUrl().'/'.$this->admin;?>/modules/update/id/<?php echo $module->module_id;?>">
								<span class="fa fa-pencil-square-o fa-lg"></span>
								Edit
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php } ?>
<?php
if(!empty($pages)){
?>
<div class="panel panel-default">
	<div class="panel-heading page">
		<i class="ion-gear-a"></i> Page Banners <i class="ion-android-system-windows" style="float: right;"></i>
	</div>
	<div class="panel-body grid_visual page-banner" style="display: none;">
		<div class="panel panel-default">
			<table id="mail_outbox" class="mail_table table table-hover toggle-arrow-tiny" data-filter="#mailbox_search" data-page-size="20">
				<thead>
					<tr>
						<th>Page</th>
						<th>Url</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody data-link="row" class="rowlink">
					<?php foreach($pages as $page){ ?>
					<tr>
						<td><?php echo $page->page_name;?></td>
						<td><?php echo $page->url_link;?></td>
						<td class="col_sm">
							<a class="btn btn-default btn-sm btn-edit" href="<?php echo $this->baseUrl().'/'.$this->admin;?>/pagebanners/update/id/<?php echo $page->page_id;?>">
								<span class="fa fa-pencil-square-o fa-lg"></span>
								Edit
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
?>
<div class="panel panel-default">
	<div class="panel-heading contact">
		<i class="ion-gear-a"></i> Contact Us <i class="ion-android-system-windows" style="float: right;"></i>
	</div>
	<div class="panel-body contact-us" style="display: none;">
		<div class="row form">
			<div class="col-md-12">
			<form method="post" action="<?php echo $this->baseUrl().'/'.$this->id;?>" id="contact-form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Contact_description">Description </label>
					<textarea name="Contact[description]" id="Contact_description" class="form-control"><?php echo $contact->description;?></textarea>	
					<div style="display:none" id="Contact_description_em_" class="errorMessage"></div>		
				</div>
				<div class="form-group">
					<label for="Contact_address">Address </label>
					<input type="text" value="<?php echo $contact->address;?>" id="Contact_address" name="Contact[address]" class="form-control">			
					<div style="display:none" id="Contact_address_em_" class="errorMessage"></div>		
				</div>
				<div class="form-group">
					<label for="Contact_email">Email </label>
					<input type="text" value="<?php echo $contact->email;?>" id="Contact_email" name="Contact[email]" class="form-control">			
					<div style="display:none" id="Contact_email_em_" class="errorMessage"></div>		
				</div> 
				<div class="form-group">
					<label class="required" for="Contact_skype">Skype </label>
					<input type="text" value="<?php echo $contact->skype;?>" id="Contact_skype" name="Contact[skype]" class="form-control" maxlength="100" size="60">			
					<div style="display:none" id="Contact_skype_em_" class="errorMessage"></div>		
				</div>
				<div class="form-group">
					<label for="Contact_mobile">Mobile </label>
					<input type="text" value="<?php echo $contact->mobile;?>" id="Contact_mobile" name="Contact[mobile]" class="form-control" maxlength="100" size="60">			
					<div style="display:none" id="Contact_mobile_em_" class="errorMessage"></div>
				</div>
				<div class="form-group">
					<input type="button" value="Save" id="save-contact" class="btn btn-success">
					<input type="button" value="Cancel" class="btn btn-info" data-dismiss="modal">
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php
if(!empty($this->getAllBannersliders())){
?>
<div class="panel panel-default">
	<div class="panel-heading home">
		<i class="ion-gear-a"></i> Home Banner Sliding <i class="ion-android-system-windows" style="float: right;"></i>
	</div>
	
	<div class="panel-body grid_visual home-banner" style="display: none;">
		<div class="col-md-2 pull-right">
		<?php echo CHtml::ajaxLink(
			' <i class="glyphicon glyphicon-plus"></i> Add New ', 
			array($this->admin.'/bannersliders/create'), 
			array('update' => ".view-x",//".content-data-x",
			'beforeSend' => 'function(){
				loading("show");
			}',
			'complete' => 'function(){
				/*$(".loading-x").fadeOut("slow",function(){
					$(".modal-dialog").css({"width":"90%"});
				});*/
				//loading("hide");
				$(".loading-x").fadeOut("slow",function(){
					//$(".modal-dialog").css({"width":"90%"});
				});
				return false;
				 
			}',
			),
			array('class'=>'btn btn-success btn-x pull-right')
		);?>
		</div>
		<div class="panel panel-default home-baners">
			<table id="mail_outbox" class="mail_table table table-hover toggle-arrow-tiny" data-filter="#mailbox_search" data-page-size="20">
				<thead>
					<tr>
						<th>Image </th>
						 
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody data-link="row" class="rowlink">
					<?php foreach($this->getAllBannersliders() as $slider){?>
					<tr>
						<td>
							<img width="300" class="img-thumbnail" alt="" src="<?php echo $this->baseUrl();?>/assets/uploads/images/thumbnail/<?php echo $slider->banner_image;?>" style="float: left;">
						</td>
						<td class="col_sm">
							<a class="btn btn-default btn-sm btn-edit" href="<?php echo $this->baseUrl().'/'.$this->admin;?>/bannersliders/update/id/<?php echo $slider->banner_id;?>">
								<span class="fa fa-pencil-square-o fa-lg"></span>
								Edit
							</a>
						</td>
					</tr>
					<?php } ?> 
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php } ?>
<script>
	$(function(){
		$('#save-contact').click(function(){
			$('#save-contact').attr({
				'value':'Saving...',
				'disabled':true,
			});
			loading('show');
			var form = $("#contact-form");
			$.post(form.attr('action'),form.serialize(),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
				}
				loading('hide');
				$('#save-contact').attr({
					'value':'Save',
					'disabled':false,
				});
			},'json');
		});
		$(".btn-edit").click(function(){
			var href = $(this).attr('href');
			$('.view-x').load(href,function(){
				$("#myModal").modal('show');
			});
			return false;
		});
	});
</script>