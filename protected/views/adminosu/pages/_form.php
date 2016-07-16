<?php
$this->avoidDoubleLoadJS(); 
/* @var $this PagesController */
/* @var $model SBPage */
/* @var $form CActiveForm */
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $title; ?>
	</div>
	<div class="panel-body form">
		<?php $form = $this -> beginWidget(
		'CActiveForm', array(
			'id' => 'sbpage-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			//'enableClientValidation'=>true,
			'enableAjaxValidation' => true, 
		));
		?>

		<p class="note">
			Fields with <span class="required">*</span> are required.
		</p>

		<div class="row">
			<?php echo $form -> labelEx($model, 'page_name'); ?>
			<?php echo $form -> textField($model, 'page_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'page_name'); ?>
		</div>
		
		<?php if(!$model->isNewRecord){?>

		<div class="row">
			<?php echo $form -> labelEx($model, 'page_slug'); ?>
			<?php echo $form -> textField($model, 'page_slug', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'page_slug'); ?>
		</div>
		
		<?php } ?>
		
		

		<div class="row">
			<?php echo $form -> labelEx($model, 'page_content'); ?>
			<?php echo $form -> textArea($model, 'page_content', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'page_content'); ?>
		</div>

		<div class="row">
			<?php echo $form -> labelEx($model, 'seo_title'); ?>
			<?php echo $form -> textField($model, 'seo_title', array('size' => 60, 'maxlength' => 3000, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'seo_title'); ?>
		</div>

		<div class="row">
			<?php echo $form -> labelEx($model, 'seo_keywords'); ?>
			<?php echo $form -> textField($model, 'seo_keywords', array('size' => 60, 'maxlength' => 3000, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'seo_keywords'); ?>
		</div>

		<div class="row">
			<?php echo $form -> labelEx($model, 'seo_description'); ?>
			<?php echo $form -> textArea($model, 'seo_description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
			<?php echo $form -> error($model, 'seo_description'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::Button($model -> isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success','id'=>'save')); ?>
			<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
		</div>

		<?php $this -> endWidget(); ?>
	</div>
</div><!-- form -->
<script>
	$(function(){
		$("#save").click(function(){
			//alert($('#SBPage_page_name').val());
			$("#save").attr({
				'disabled':true,
				'value':'<?php echo $model -> isNewRecord ? 'Create...' : 'Save...';?>'
			});
			loading('show');
			var SBPage_page_content = CKEDITOR.instances['SBPage_page_content'].getData();
			$.post($('#<?php echo $modelName;?>-form').attr('action'),$('#<?php echo $modelName;?>-form').serialize()+'&SBPage%5Bpage_content%5D='+encodeURIComponent(SBPage_page_content),function(response){
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
					if(response.SBPage_page_name){ 
						$("#SBPage_page_name.form-control").addClass('error'); 
						$('#SBPage_page_name_em_').html(response.SBPage_page_name).show(); 
					}else{ 
						$("#SBPage_page_name").removeClass('error'); 
						$('#SBPage_page_name_em_').hide(); 
					}
					if(response.SBPage_page_slug){ 
						$("#SBPage_page_slug.form-control").addClass('error'); 
						$('#SBPage_page_slug_em_').html(response.SBPage_page_slug).show(); 
					}else{ 
						$("#SBPage_page_slug").removeClass('error'); 
						$('#SBPage_page_slug_em_').hide(); 
					} 
					if(response.SBPage_page_content){ 
						$("#SBPage_page_content.form-control").addClass('error'); 
						$('#SBPage_page_content_em_').html(response.SBPage_page_slug).show(); 
					}else{ 
						$("#SBPage_page_content").removeClass('error'); 
						$('#SBPage_page_content_em_').hide(); 
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

var editor = CKEDITOR.replace( 'SBPage_page_content', {
	 
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