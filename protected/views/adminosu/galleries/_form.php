<?php
$this->avoidDoubleLoadJS();
?>
 
<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $title; ?>
	</div>
	<div class="panel-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>$this->galleryModelName.'-form',
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
	 
	<div class="form-group">
		<?php echo $form->labelEx($model,'gallery_title'); ?>
		<?php echo $form->textField($model,'gallery_title',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'gallery_title'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'url_live'); ?>
		<?php echo $form->textField($model,'url_live',array('size'=>60,'maxlength'=>100,'class'=>'form-control','placeholder'=>'www.example.com')); ?>
		<?php echo $form->error($model,'url_live'); ?>
	</div>
	<fieldset>
		<legend>Gallery Cover</legend>
		<div class="col-sm-11 col-lg-12">
				<span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Select files...</span> <!-- The file input field used as target for the file upload widget -->
					<input id="fileupload" type="file" name="files[]" multiple style="margin-top:-72px !important;">
					<?php echo $form->hiddenField($model,'gallery_cover',array('style'=>'margin-top:-72px !important;','class'=>'form-control')); ?>
				</span>
				<span class="view-logo">
					<?php
					if(!empty($model->gallery_cover)){
					?>	
					<img width="135" src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $model->gallery_cover;?>" style="float:right;">
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
		 
	</fieldset>
	

	 
	
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
	<div class="row buttons">
		<?php echo CHtml::Button($model -> isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success','id'=>'save')); ?>
		<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

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
			//var SBNews_news_content = CKEDITOR.instances['content'].getData();
			$.post($('#<?php echo $this->galleryModelName;?>-form').attr('action'),$('#<?php echo $this->galleryModelName;?>-form').serialize(),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
					$('#<?php echo $this->galleryModelName;?>-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); 
					$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.SBGallery_gallery_title){ 
						$("#SBGallery_gallery_title.form-control").addClass('error'); 
						$('#SBGallery_gallery_title_em_').html(response.SBGallery_gallery_title).show(); 
					}else{ 
						$("#SBGallery_gallery_title").removeClass('error'); 
						$('#SBGallery_gallery_title_em_').hide(); 
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

<script>
	$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?php echo $this->baseUrl();?>/assets/upload.php?width=285&height=190&crop=true';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                $(".view-logo").html('<img style="float:right;" width="135" src="<?php echo $this->baseUrl();?>/assets/uploads/images/'+file.name+'">');
            	$("#SBGallery_gallery_cover.form-control").val(file.name) ;
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