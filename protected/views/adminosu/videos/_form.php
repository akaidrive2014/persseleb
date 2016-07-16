<?php
$this->avoidDoubleLoadJS();
?>
 
<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo $title; ?>
	</div>
	<div class="panel-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>$this->videoModelName.'-form',
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
		<?php echo $form->labelEx($model,'gallery_id'); ?>
		<?php echo $form->dropDownList($model,'gallery_id',CHtml::listData(SBGallery::model()->findAll(array(
			'order'=>'gallery_title ASC'
		)),'gallery_id','gallery_title'),array('empty'=>'---','class'=>'form-control')); ?>
		<?php echo $form->error($model,'gallery_id'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'video_title'); ?>
		<?php echo $form->textField($model,'video_title',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'video_title'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'video_key'); ?>
		<?php echo $form->textField($model,'video_key',array('class'=>'form-control','placeholder'=>'nnHptBqSpwg')); ?>
		<?php echo $form->error($model,'video_key'); ?>
		<small style="color:#7F7F7F">
			Example video link : http://www.youtube.com/watch?v=<b>nnHptBqSpwg</b>
			<br>
			Type it seem like in watermark.
		</small>
	</div> 
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
			$.post($('#<?php echo $this->videoModelName;?>-form').attr('action'),$('#<?php echo $this->videoModelName;?>-form').serialize(),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
					$('#<?php echo $this->videoModelName;?>-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); 
					$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.SBVideo_video_title){ 
						$("#SBVideo_video_title.form-control").addClass('error'); 
						$('#SBVideo_video_title_em_').html(response.SBVideo_video_title).show(); 
					}else{ 
						$("#SBVideo_video_title.form-control").removeClass('error'); 
						$('#SBVideo_video_title_em_').hide(); 
					}
					if(response.SBVideo_gallery_id){ 
						$("#SBVideo_gallery_id.form-control").addClass('error'); 
						$('#SBVideo_gallery_id_em_').html(response.SBVideo_gallery_id).show(); 
					}else{ 
						$("#SBVideo_gallery_id.form-control").removeClass('error'); 
						$('#SBVideo_gallery_id_em_').hide(); 
					}
					if(response.SBVideo_video_key){ 
						$("#SBVideo_video_key.form-control").addClass('error'); 
						$('#SBVideo_video_key_em_').html(response.SBVideo_video_key).show(); 
					}else{ 
						$("#SBVideo_video_key.form-control").removeClass('error'); 
						$('#SBVideo_video_key_em_').hide(); 
					}
					 
					
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
                '//jquery-file-upload.appspot.com/' : '<?php echo $this->baseUrl();?>/assets/upload.php';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                $(".view-logo").html('<img style="float:right;" width="135" src="<?php echo $this->baseUrl();?>/assets/uploads/images/'+file.name+'">');
            	$("#SBImage_image.form-control").val(file.name) ;
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