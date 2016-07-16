
<?php
$this->avoidDoubleLoadJS();
/* @var $this NewsController */
/* @var $model SBNews */
/* @var $form CActiveForm */
?>
 
<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $title; ?>
	</div>
	<div class="panel-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>$this->IDname.'-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>TRUE,
	'htmlOptions'=>array(
		"enctype"=>"multipart/form-data"
	)
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<fieldset>
			<legend>Choose Categories<span class="required">*</span></legend>
		
		<?php
		 
			$CategoryNews = Tools::getAllParentsCategoryNews();
			if(!empty($CategoryNews)){
				$i=1;
				foreach($CategoryNews as $index=>$category){
					
					if(in_array($category->category_id,explode(',',$model->category_id))){
						 
						$checked = 'checked=checked';
						
					}else{$checked= '';}
					echo "<div class=col-md-3>";	
					echo "<input name='SBNews[categories][]' $checked type='checkbox' value='{$category->category_id}'> {$category->category_name}";
					$Childs = Tools::getAllChildsCategoryNews($category->category_id);
					if(!empty($Childs)){
						foreach($Childs as $child){
							if(in_array($child->category_id,explode(',',$model->category_id))){
								$checkedChild = 'checked=checked';
							}else{$checkedChild = '';}
							echo "<div class='col-md-0' style='margin-left: 15px;'>";
								echo "<input name='SBNews[categories][]' $checkedChild type=checkbox value={$child->category_id}> {$child->category_name}";
							echo "</div>";
						}
					}
					echo "</div>";
					if($i%4==0){
						echo "<div class=clearfix><p>&nbsp;</p></div>";
					}
					$i++;
				}
			} 
		?>
		</fieldset> 
	</div>
	<div>&nbsp;</div>	
	<div class="form-group">
		<?php echo $form->labelEx($model,'news_title'); ?>
		<?php echo $form->textField($model,'news_title',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'news_title'); ?>
	</div>
	<div class="row">
		<div class="col-md-3" style="padding-left: 0px;">
			<?php echo $form->labelEx($model,'news_date'); ?>
			<div class="input-group date ts_datepicker" data-date-format="dd-mm-yyyy" >
				<?php echo $form->textField($model,'news_date',array('class'=>'form-control datepicker')); ?>
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			</div>
			<span class="help-block">dd-mm-yyyy</span>
			<?php echo $form->error($model,'news_date'); ?>
		</div>
		<div class="clearfix"></div>
		<br>
	</div>
	<fieldset>
		<legend>News Thumbs</legend>
		<div class="col-sm-11 col-lg-12">
				<span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Select files...</span> <!-- The file input field used as target for the file upload widget -->
					<!--<input id="fileupload" type="file" name="files[]" multiple>-->
					<?php echo $form->fileField($model,'news_thumb_image',array('name'=>'files[]','multiple'=>'','id'=>'fileupload','style'=>'margin-top:-72px !important;')); ?>
				</span>
				<span class="view-logo">
					<?php
					if(!empty($model->news_thumb_image)){
					?>	
					<img width="135" height="90" src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $model->news_thumb_image;?>" style="float:right;">
					<?php }?>
				</span>
				<div class="clearfix"></div>
				<br>
			    <br>
			    <!-- The global progress bar -->
			    <div id="progress" class="progress">
			        <div class="progress-bar progress-bar-success"></div>
			    </div>
			    <!-- The container for the uploaded files -->
			    <div id="files" class="files"></div>
			</div>
		<!--<div class="row fileupload-buttonbar">
			<span class="btn btn-success fileinput-button">
				<i class="glyphicon glyphicon-plus"></i>
				<span>Add files...</span>
				<?php echo $form->fileField($model,'news_thumb_image',array('style'=>'margin-top:-72px !important;')); ?>
			</span>
			<?php echo $form->error($model,'news_thumb_image'); ?>
		</div>-->	
	</fieldset>
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'news_content'); ?>
		<?php echo $form->textArea($model,'news_content',array('rows'=>6, 'cols'=>50,'class'=>'form-control','id'=>'content')); ?>
		<?php echo $form->error($model,'news_content'); ?>
	</div>
	
	<fieldset>
		<legend>Seo Pack</legend>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seo_title'); ?>
			<?php echo $form->textField($model,'seo_title',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'seo_title'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seo_keywords'); ?>
			<?php echo $form->textField($model,'seo_keywords',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'seo_keywords'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seo_description'); ?>
			<?php echo $form->textArea($model,'seo_description',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'seo_description'); ?>
		</div>
	</fieldset>
	
	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'original_url'); ?>
		<?php echo $form->textField($model,'original_url',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'original_url'); ?>
	</div>
	 */?>

	<div class="row buttons">
		<?php echo CHtml::Button($model -> isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success','id'=>'save')); ?>
		<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->
 
 

<script>
	$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?php echo $this->baseUrl();?>/ext/j-file-upload/server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                $(".view-logo").html('<img style="float:right;" width="135" height="90" src="<?php echo $this->baseUrl();?>/assets/uploads/images/'+file.name+'">');
            	 
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>