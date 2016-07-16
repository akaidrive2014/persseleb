<?php
$this->avoidDoubleLoadJS();
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $title; ?>
	</div>
	<div class="panel-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>$this->modelName.'-form',
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
		<?php echo $form->labelEx($model,'banner_title'); ?>
		<?php echo $form->textField($model,'banner_title',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'banner_title'); ?>
	</div>
	<fieldset>
		<legend>Image Digital <span class="required">*</span>
			<div id="SBPageBanner_banner_image_em_" class="errorMessage"></div>
			</legend>
		<div class="col-sm-11 col-lg-12">
				<span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Select files...</span> <!-- The file input field used as target for the file upload widget -->
					<input id="fileuploadx" type="file" name="files[]" multiple style="margin-top:-72px !important;">
					<?php echo $form->hiddenField($model,'banner_image',array('style'=>'margin-top:-72px !important;','class'=>'form-control')); ?>
				</span>
				<span class="view-banner">
					<?php
					if(!empty($model->banner_image)){
					?>	
					<img width="135" src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $model->banner_image;?>" style="float:right;">
					<?php }?>
				</span>
				<div class="clearfix"></div>
				<br>
			    <br>
			    <!-- The global progress bar -->
			    <div id="progress" class="progress">
			        <div class="progress-bar progress-bar-success prgs"></div>
			    </div>
			    <!-- The container for the uploaded files -->
			    <div id="filess" class="files"></div>
			</div>
		 
	</fieldset>
	
	<div class="row buttons">
		<?php echo CHtml::Button('Save', array('class' => 'btn btn-success','id'=>'savex')); ?>
		<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- form -->
 
<script>
	$(function(){
		$("#savex").click(function(){
			//alert($('#SBPage_page_name').val());
			$("#savex").attr({
				'disabled':true,
				'value':'Saving...'
			});
			loading('show');
			//var SBNews_news_content = CKEDITOR.instances['content'].getData();
			$.post($('#<?php echo $this->modelName;?>-form').attr('action'),$('#<?php echo $this->modelName;?>-form').serialize(),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
					$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.SBPageBanner_banner_title){ 
						$("#SBModule_banner_title.form-control").addClass('error'); 
						$('#SBModule_banner_title_em_').html(response.SBModule_banner_title).show(); 
					}else{ 
						$("#SBModule_banner_title.form-control").removeClass('error'); 
						$('#SBModule_banner_title_em_').hide(); 
					}
					if(response.SBModule_banner_image){ 
						$("#SBModule_banner_image.form-control").addClass('error'); 
						$('#SBModule_banner_image_em_').html(response.SBModule_banner_image).show(); 
					}else{ 
						$("#SBModule_banner_image.form-control").removeClass('error'); 
						$('#SBModule_banner_image_em_').hide(); 
					}
				}
				$("#savex").attr({
					'disabled':false,
					'value':'Save'
				});
				loading('hide');
			},'json');
			return false;
		});
	});
</script>

<script>
	$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?php echo $this->baseUrl();?>/assets/upload.php?width=1200&height=408&crop=true';
    $('#fileuploadx').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#filess');
                $(".view-banner").html('<img style="float:right;" width="135" src="<?php echo $this->baseUrl();?>/assets/uploads/images/'+file.name+'">');
            	$("#SBModule_banner_image.form-control").val(file.name) ;
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .prgs').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>