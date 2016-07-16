<?php
$this -> avoidDoubleLoadJS();
/* @var $this MenusController */
/* @var $model SBMenu */
/* @var $form CActiveForm */
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $title; ?>
	</div>
	<div class="panel-body form">

		<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'sbmenu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => TRUE, 
	));
 ?>

		<p class="note">
			Fields with <span class="required">*</span> are required.
		</p>

		<?php echo $form -> errorSummary($model); ?>

		<div class="row">
			<?php echo $form -> labelEx($model, 'parent_id'); ?>
			<?php echo $form -> dropDownList($model, 'parent_id', CHtml::listData(SBMenu::model() -> findAll(array('order' => 'menu_name ASC')), 'menu_id', 'menu_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'parent_id'); ?>
		</div>

		<div class="row">
			<?php echo $form -> labelEx($model, 'menu_name'); ?>
			<?php echo $form -> textField($model, 'menu_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'menu_name'); ?>
		</div>

		<div class="row">
			<?php echo $form -> labelEx($model, 'action'); ?>
			<?php echo $form -> dropDownList($model, 'action', $model -> action_menu, array('empty' => '--Select--', 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'action'); ?>
		</div>
		
		<div class="row page-action" style="display: none;">
			<?php echo $form -> labelEx($model, 'page_action'); ?>
			<?php echo $form -> dropDownList($model, 'page_action', array('existing-page'=>'Existing Page','new-page'=>'New Page'),array('class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'page_action'); ?>
		</div>

		<div class="row page" style="display: none;">
			<?php echo $form -> labelEx($model, 'page_id'); ?>
			<?php echo $form -> dropDownList($model, 'page_id', CHtml::listData(SBPage::model()->findAll(array('order'=>'page_name ASC')),'page_name','page_name'),
			array('empty'=>'---','class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'page_id'); ?>
		</div>
		
		<div class="row page-name" style="display: none;">
			<?php echo $form -> labelEx($model, 'page_name'); ?>
			<?php echo $form -> textField($model, 'page_name', array('class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'page_name'); ?>
		</div>
		
		<div class="row page-content" style="display: none;">
			<?php echo $form -> labelEx($model, 'page_content'); ?>
			<?php echo $form -> textArea($model, 'page_content', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'page_content'); ?>
		</div>

		<div class="row category-news" style="display: none;">
			<?php echo $form -> labelEx($model, 'category_news_id'); ?>
			<?php echo $form -> dropDownList($model, 'category_news_id', CHtml::listData(SBNewsCategory::model()->findAll(array('order'=>'category_name ASC')),'category_id','category_name'),
			array('empty'=>'---','class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'category_news_id'); ?>
		</div>

		<div class="row url-link" style="display: none;">
			<?php echo $form -> labelEx($model, 'url_link'); ?>
			<?php echo $form -> textField($model, 'url_link', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'url_link'); ?>
		</div>

		<div class="row module" style="display: none;">
			<?php echo $form -> labelEx($model, 'module'); ?>
			<?php echo $form -> textField($model, 'module', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'module'); ?>
		</div>

		<div class="row">
			<?php echo $form -> checkbox($model, 'target'); ?> &nbsp;<?php echo $model -> getAttributeLabel('target'); ?>
			<?php echo $form -> error($model, 'target'); ?>
		</div>
		<?php /*
			 <div class="row">
			 <?php echo $form->labelEx($model,'positions');
			 ?>
			 <?php echo $form->textField($model,'positions',array('class' => 'form-control'));
			 ?>
			 <?php echo $form->error($model,'positions');
			 ?>
			 </div>
			 */
		?>

		<div class="row buttons">

			<?php echo CHtml::Button($model -> isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success', 'id' => 'save')); ?>
			<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
		</div>

		<?php $this -> endWidget(); ?>
	</div>
</div><!-- form -->
<script>
	$(function(){
		var action =$("#SBMenu_action.form-control option:selected").val();
		if(action=='link-to-page'){
			$('.page-action').find('select').val(''); 
			$(".page-action,.page").show();
		}else{
			$(".page-action,.page").hide();
		}
		
		if(action=='link-to-module'){
			$(".module").show();
			$(".page-content,.page-name").hide();
		}else{
			$(".module").hide();
		}
		if(action=='link-to-category-news'){
			$(".category-news").show();
			$(".page-content,.page-name").hide();
		}else{
			$(".category-news").hide();
		}
		if(action=='link-to-url'){
			$(".url-link").show();
			$(".page-content,.page-name").hide();
		}else{
			$(".url-link").hide();
		}
		$("#SBMenu_page_action.form-control").change(function(){
			var page_action = $(this).val();
			if(page_action=='existing-page'){
				$(".page").show();
				$('.page-name').hide();
			}else{
				$(".page").hide();
			}
			if(page_action=='new-page'){
				$(".page-content,.page-name").show();
			}else{
				$(".page-content").hide();
			}
		});
		$("#SBMenu_action.form-control").change(function(){
			var action = $(this).val();
			if(action=='link-to-page'){
				$('.page-action').find('select').val(''); 
				$(".page-action,.page").show();
			}else{
				$(".page-action,.page").hide();
			}
			
			if(action=='link-to-module'){
				$(".module").show();
				$(".page-content,.page-name").hide();
			}else{
				$(".module").hide();
			}
			if(action=='link-to-category-news'){
				$(".category-news").show();
				$(".page-content,.page-name").hide();
			}else{
				$(".category-news").hide();
			}
			if(action=='link-to-url'){
				$(".url-link").show();
				$(".page-content,.page-name").hide();
			}else{
				$(".url-link").hide();
			}
		});
		
		$("#save").click(function(){
			//alert($('#SBPage_page_name').val());
			$("#save").attr({
				'disabled':true,
				'value':'<?php echo $model -> isNewRecord ? 'Create...' : 'Save...';?>'
			});
			loading('show');
			var SBMenu_page_content = CKEDITOR.instances['SBMenu_page_content'].getData();
			$.post($('#<?php echo $modelName;?>-form').attr('action'),$('#<?php echo $modelName;?>-form').serialize()+'&SBMenu%5Bpage_content%5D='+encodeURIComponent(SBMenu_page_content),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
					$('#<?php echo $modelName;?>-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); 
					$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.SBMenu_menu_name){ 
						$("#SBMenu_menu_name.form-control").addClass('error'); 
						$('#SBMenu_menu_name_em_').html(response.SBMenu_menu_name).show(); 
					}else{ 
						$("#SBMenu_menu_name").removeClass('error'); 
						$('#SBMenu_menu_name_em_').hide(); 
					}
					if(response.SBMenu_action){ 
						$("#SBMenu_action.form-control").addClass('error'); 
						$('#SBMenu_action_em_').html(response.SBMenu_action).show(); 
					}else{ 
						$("#SBMenu_action").removeClass('error'); 
						$('#SBMenu_action_em_').hide(); 
					} 
					if(response.SBMenu_page_id){ 
						$("#SBMenu_page_id.form-control").addClass('error'); 
						$('#SBMenu_page_id_em_').html(response.SBMenu_page_id).show(); 
					}else{ 
						$("#SBMenu_page_id").removeClass('error'); 
						$('#SBMenu_page_id_em_').hide(); 
					}
					if(response.SBMenu_page_name){ 
						$("#SBMenu_page_name.form-control").addClass('error'); 
						$('#SBMenu_page_name_em_').html(response.SBMenu_page_name).show(); 
					}else{ 
						$("#SBMenu_page_name").removeClass('error'); 
						$('#SBMenu_page_name_em_').hide(); 
					}
					if(response.SBMenu_page_content){ 
						$("#SBMenu_page_content.form-control").addClass('error'); 
						$('#SBMenu_page_content_em_').html(response.SBMenu_page_content).show(); 
					}else{ 
						$("#SBMenu_page_content").removeClass('error'); 
						$('#SBMenu_page_content_em_').hide(); 
					}
					if(response.SBMenu_module){ 
						$("#SBMenu_module.form-control").addClass('error'); 
						$('#SBMenu_module_em_').html(response.SBMenu_module).show(); 
					}else{ 
						$("#SBMenu_module").removeClass('error'); 
						$('#SBMenu_module_em_').hide(); 
					}
					if(response.SBMenu_category_news_id){ 
						$("#SBMenu_category_news_id.form-control").addClass('error'); 
						$('#SBMenu_category_news_id_em_').html(response.SBMenu_category_news_id).show(); 
					}else{ 
						$("#SBMenu_category_news_id").removeClass('error'); 
						$('#SBMenu_category_news_id_em_').hide(); 
					}
					
					/*
					 {"SBPage_page_name":["Page Name cannot be blank."],"SBPage_page_slug":["Page Slug cannot be blank."],"SBPage_page_content":["Page Content cannot be blank."]}
					 * */
				}
				$("#save").attr({
					'disabled':false,
					'value':'<?php echo $model -> isNewRecord ? 'Create' : 'Save';?>'
				});
				loading('hide');
			},'json');
			
		});
		
	});
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'SBMenu_page_content', {
	 
	filebrowserBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=files',
	filebrowserImageBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=images',
	filebrowserFlashBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=flash',
	filebrowserUploadUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=files',
	filebrowserImageUploadUrl :  '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=images',
	filebrowserFlashUploadUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=flash',
});
CKEDITOR.on( 'instanceReady', function( evt ) {
   	loading('hide');
} );
//CKEDITOR.config.contentsCss = '<?=$this->baseUrl();?>/themes/website3/front/gps/styles/style2.css';
</script>
