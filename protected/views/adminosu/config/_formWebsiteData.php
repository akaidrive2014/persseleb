<div class="panel panel-default">

	<div class="panel-body form">

		<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation' => TRUE, 'htmlOptions' => array("enctype" => "multipart/form-data")));
 ?>

		<p class="note">
			Fields with <span class="required">*</span> are required.
		</p>

		<?php echo $form -> errorSummary($config); ?>

		<div class="form-group">
			<?php echo $form -> labelEx($config, 'name'); ?>
			<?php echo $form -> textField($config, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($config, 'name'); ?>
		</div>
		
		<div class="form-group">
			<?php echo $form -> labelEx($config, 'tagline'); ?>
			<?php echo $form -> textField($config, 'tagline', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($config, 'tagline'); ?>
		</div>
		
		<div class="form-group">
			<?php echo $form -> labelEx($config, 'phone'); ?>
			<?php echo $form -> textField($config, 'phone', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($config, 'phone'); ?>
		</div>
		
		<div class="form-group">
			<?php echo $form -> labelEx($config, 'facebook'); ?>
			<?php echo $form -> textField($config, 'facebook', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($config, 'facebook'); ?>
		</div>
		
		<div class="form-group">
			<?php echo $form -> labelEx($config, 'twitter'); ?>
			<?php echo $form -> textField($config, 'twitter', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
			<?php echo $form -> error($config, 'twitter'); ?>
		</div>

		<fieldset>
			<legend>
				Logo & Favicon<span class="required">*</span>
			</legend>
			<div class="clearfix">
				<div class="panel-heading"> Logo </div>
			</div>
			<div class="col-sm-11 col-lg-12">
				<span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Select files...</span> <!-- The file input field used as target for the file upload widget -->
					<input id="fileupload" type="file" name="files[]" multiple style="margin-top:-72px !important;">
					<?php echo $form -> hiddenField($config, 'logo', array('style' => 'margin-top:-72px !important;', 'class' => 'form-control')); ?> </span>
				<span class="view-logo">
					<?php
					if(!empty($config->logo)){
					?><img width="135" src="<?php echo $this -> baseUrl(); ?>/media/uploads/images/<?php echo $config -> logo; ?>" style="float:right;">
					<?php } ?></span>
				<?php echo $form -> error($config, 'logo'); ?>
			</div>
			<p>&nbsp;</p>
			<div class="clearfix">
				<div class="panel-heading"> Favicon </div>
			</div>
			<div class="col-sm-11 col-lg-12">
				<span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Select files...</span> <!-- The file input field used as target for the file upload widget -->
					<input id="favicon_upload" type="file" name="files[]" multiple style="margin-top:-72px !important;">
					<?php echo $form -> hiddenField($config, 'favicon', array('style' => 'margin-top:-72px !important;', 'class' => 'form-control')); ?> </span>
				<span class="view-favicon">
					<?php
					if(!empty($config->favicon)){
					?><img width="35" src="<?php echo $this -> baseUrl(); ?>/media/uploads/images/<?php echo $config -> favicon; ?>" style="float:right;">
					<?php } ?></span>
				<div class="clearfix"></div>
				<br>
				<br>
				<!-- The global progress bar -->
				<div id="progress" class="progress">
					<div class="progress-bar progress-bar-success"></div>
				</div>
				<!-- The container for the uploaded files -->
				<div id="files" class="files"></div>
				<?php echo $form -> error($config, 'favicon'); ?>
			</div>

		</fieldset>
		
		

		<div class="form-group">
			<?php echo $form -> labelEx($config, 'google_analytic'); ?>
			<?php echo $form -> textArea($config, 'google_analytic', array('rows' => 6, 'cols' => 50, 'class' => 'form-control', 'id' => 'content')); ?>
			<?php echo $form -> error($config, 'google_analytic'); ?>
		</div>
		
		<div class="form-group">
			<?php echo $form -> labelEx($config, 'copyright'); ?>
			<?php echo $form -> textField($config, 'copyright', array('class' => 'form-control')); ?>
			<?php echo $form -> error($config, 'copyright'); ?>
		</div>

		<fieldset>
			<legend>
				Seo Pack
			</legend>
			<div class="form-group">
				<?php echo $form -> labelEx($config, 'title'); ?>
				<?php echo $form -> textField($config, 'title', array('class' => 'form-control')); ?>
				<?php echo $form -> error($config, 'title'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($config, 'keywords'); ?>
				<?php echo $form -> textField($config, 'keywords', array('class' => 'form-control')); ?>
				<?php echo $form -> error($config, 'keywords'); ?>
			</div>
			<div class="form-group">
				<?php echo $form -> labelEx($config, 'description'); ?>
				<?php echo $form -> textArea($config, 'description', array('class' => 'form-control')); ?>
				<?php echo $form -> error($config, 'description'); ?>
			</div>
		</fieldset>

		<div class="row buttons">
			<?php echo CHtml::Button('Save', array('class' => 'btn btn-success', 'id' => 'save')); ?>
			<?php echo CHtml::Button('Cancel', array('data-dismiss' => 'modal', 'class' => 'btn btn-info')); ?>
		</div>

		<?php $this -> endWidget(); ?>

	</div>
</div><!-- form -->
<script>
	$(function(){
		$("#save").click(function(){
			 
			$("#save").attr({
				'disabled':true,
				'value':'Save...'
			});
			loading('show');
			 
			$.post($('#config-form').attr('action'),$('#config-form').serialize(),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);/*
					$('#config-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); */
					//$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.Config_name){ 
						$("#Config_name.form-control").addClass('error'); 
						$('#Config_name_em_').html(response.Config_name).show(); 
					}else{ 
						$("#Config_name.form-control").removeClass('error'); 
						$('#Config_name_em_').hide(); 
					}
					
					if(response.Config_title){ 
						$("#Config_title.form-control").addClass('error'); 
						$('#Config_title_em_').html(response.Config_title).show(); 
					}else{ 
						$("#Config_title.form-control").removeClass('error'); 
						$('#Config_title_em_').hide(); 
					}
					
					if(response.Config_logo){ 
						$("#Config_logo.form-control").addClass('error'); 
						$('#Config_logo_em_').html(response.Config_logo).show(); 
					}else{ 
						$("#Config_logo.form-control").removeClass('error'); 
						$('#Config_logo_em_').hide(); 
					}
					 
					
					 
				}
				$("#save").attr({
					'disabled':false,
					'value':'Save'
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
                '//jquery-file-upload.appspot.com/' : '<?php echo $this->baseUrl();?>/media/upload.php';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                $(".view-logo").html('<img style="float:right;" width="135" src="<?php echo $this->baseUrl();?>/media/uploads/images/'+file.name+'">');
            	$("#Config_logo.form-control").val(file.name) ;
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
   
   
    $('#favicon_upload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                $(".view-favicon").html('<img style="float:right;" width="35" src="<?php echo $this->baseUrl();?>/media/uploads/images/'+file.name+'">');
            	$("#Config_favicon.form-control").val(file.name) ;
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