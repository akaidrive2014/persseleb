<?php /*
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
*/ ?>
<style>
	ul#sortable{
		list-style: none;
	}
	ul#sortable li{
		height:40px;
		margin-bottom: 5px;
		padding: 0px 0 5px 5px;
		line-height: 40px;
	}
	.ui-state-default{
		background: none repeat scroll 0 0 rgb(244, 244, 244);
		cursor: pointer;
	}
</style>
<script>
$(function() {
	sortable();
	function sortable(){
		$("#sortable").sortable({
			//handle : '.handle',
			update : function (event, ui) {
				var order = $('#sortable').sortable('serialize');
				$.post("<?php echo $url_setting;?>",order,function(response){
						if(response.success==true){
							$('#<?php echo $modelName;?>-grid').yiiGridView('update', { 
								data: $(this).serialize() 
							});
						}
				},'json'
				); 
			}    
	    });
	}
});
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $title;?>
	</div>
	<div class="panel-body form">
		<ul id="sortable" style="padding-left: 0px;">
		<?php
		foreach($model as $menu){?>
			<li id="order_<?php echo $menu->menu_id;?>" class="ui-state-default">
				<i class="ion-arrow-move"></i> <?php echo $menu->menu_name;?> 
			</li>
		<?php }
		?>
		</ul>
	</div>
</div>	

 
 