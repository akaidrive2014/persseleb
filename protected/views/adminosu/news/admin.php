<?php
/* @var $this NewsController */
/* @var $model SBNews */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#".$this->IDname."-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="container-fluid"> 
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<?php echo $title;?> 
					<?php echo CHtml::ajaxLink(
						' <i class="glyphicon glyphicon-plus"></i> Add New ', 
						array($this->id.'/create'), 
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
								$(".modal-dialog").css({"width":"90%"});
							});
							return false;
							 
						}',
						),
						array('class'=>'btn btn-success btn-x pull-right')
					);?>
					<div class="clearfix"></div>
				</div>
					<div class="table-responsive">
						<br>
						<?php echo CHtml::link('<i class="glyphicon glyphicon-search"></i> Search','#',array('class'=>'search-button btn btn-default')); ?>
						<div class="search-form" style="display:none">
						<?php $this->renderPartial('_search',array(
							'model'=>$model,
						)); ?>
						</div><!-- search-form -->
						

						<?php $this->widget('zii.widgets.grid.CGridView', array(
							'pagerCssClass'=>'text-center',
							'pager' => array(
								'class' => 'CLinkPager', 
								'header' => '',
								'selectedPageCssClass'=>'active',
								'nextPageLabel'=>'<i class="fa fa-angle-right"></i>',
								'prevPageLabel'=>'<i class="fa fa-angle-left"></i>',
								'lastPageLabel'=>'<i class="fa fa-angle-double-right"></i>',
								'firstPageLabel'=>'<i class="fa fa-angle-double-left"></i>',		
								'htmlOptions'=>array(
									'class'=>'pagination pagination-sm',
									'id'=>FALSE,
								),
							),
							'id'=>$this->IDname.'-grid',
							'dataProvider'=>$model->search(),
							//'filter'=>$model,
							'itemsCssClass'=>'table table-bordered',
							'afterAjaxUpdate'=>'modal',
							'columns'=>array(
								'news_id',
								array(
									'name'=>'news_title',
									'value'=>function($data){
										return "<a href=\"{$data->url_link}\">{$data->news_title}</a>";
									},
									'type'=>'HTML',

								),
								array(
									'name'=>'source',
									'value'=>function($data){
										return "<a target='_blank' href=\"{$data->url}\">{$data->source}</a>";
									},
									'type'=>'HTML',

								),

								array(
									'name'=>'news_date',
									'value'=>'$data->display_date_admin'
								),
								/*
								'original_url',
								*/
								array(
									'class'=>'CButtonColumn',
									'template'=>'{update} {delete}',
									'buttons'=>array(
										  'update' => array(
										  		'options' => array('data-toggle'=>'tooltip','title' => 'Edit', 'class' => 'btn btn-x btn-default btn-xs'),
						                		'label' => "<i class='fa fa-pencil-square-o'></i>",
						                		'imageUrl' => false,
												'click'=>"function(){
													loading('show');
						                           	$('.view-x').load($(this).attr('href'),function(){
						                           		//loading('hide')	
						                           		$('.modal-dialog').css({'width':'90%'});
						                         	});
														
						                         return false;
						                         }",
											   ),
								           'delete' => array(
						                		'options' => array('data-toggle'=>'tooltip','title' => 'Delete', 'class' => 'btn btn-danger btn-xs'),
						                		'label' => '<i class="glyphicon glyphicon-remove"></i>',
						                		'imageUrl' => false,
								           ),
									),
									
							   ),
							),
						)); ?>
					</div>
				</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$('.datepicker23').datepicker({ 
			format:'dd/mm/yyyy', 
			todayHighlight: true 
		});
	})
</script>