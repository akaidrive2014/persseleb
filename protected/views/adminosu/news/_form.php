<style>
	.delete-button{
		/*float:right !important;*/
		cursor:pointer !important;
		margin-right:10px !important;
	}
	.image-position{
		float:right !important; 
		margin-right:5px !important;
	}
	.image-title{
		float: right !important; 
		margin-right: 5px !important; 
		width: 30% !important;
	}
</style>
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
	<div class="form-group">
		<fieldset>
			<legend>Choose Position<span class="required">*</span>
				<div id="SBNews_category_em_" class="errorMessage"></div>
			</legend>
			<div class="col-md-3">
				<?php echo $form->checkBox($model,'issliding',array('style'=>'float:left;')); ?>
				&nbsp;
				<?php echo $form->label($model,'issliding',array('style'=>'float:left;')); ?>
				Dimensions 586px × 490px
			</div>
			<div class="col-md-3">
				<?php echo $form->checkBox($model,'topnewsbanner',array('style'=>'float:left;')); ?>
				&nbsp;
				<?php echo $form->label($model,'topnewsbanner',array('style'=>'float:left;')); ?>
				Dimensions 293px × 245px
			</div>
			<div class="col-md-3">
				<?php echo $form->checkBox($model,'isfeatured',array('style'=>'float:left;')); ?>
				&nbsp;
				<?php echo $form->label($model,'isfeatured',array('style'=>'float:left;')); ?>
				Dimensions 293px × 245px
			</div>
		</fieldset>

	</div>
	<div class="row">
		<fieldset>
			<legend>Choose Categories<span class="required">*</span>
				<div id="SBNews_category_em_" class="errorMessage"></div>
			</legend>
		
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
				<?php echo $form->textField($model,'news_date',array('class'=>'form-control datepicker','value'=>$model->isNewRecord ? '' : date('d/m/Y',strtotime($model->news_date)))); ?>
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
					<input id="fileupload" type="file" name="files[]" multiple style="margin-top:-72px !important;">
					<?php echo $form->hiddenField($model,'news_thumb_image',array('style'=>'margin-top:-72px !important;','class'=>'form-control')); ?>
				</span>
				<span class="view-logo">
					<?php
					if(!empty($model->news_thumb_image)){
					?>	
					<img width="135" src="<?php echo $this->baseUrl();?>/media/uploads/images/<?php echo $model->news_thumb_image;?>" style="float:right;">
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
	
	<fieldset>
		<legend>Gallery</legend>
		<div class="col-sm-11 col-lg-12">
				<span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Select files...</span> <!-- The file input field used as target for the file upload widget -->
					<input id="fileupload2" type="file" name="files[]" multiple style="margin-top:-72px !important;">
				</span>
				<p>&nbsp;</p>
				<div class="view-logo2 col-md-12">
					<?php
					if(!$model->isNewRecord){
						$IMAGES = $this->getAllImageByNewsID($model->news_id);	
						if(!empty($IMAGES)){
							foreach($IMAGES as $index=>$image){?>
								<div id="data_<?php echo $index;?>" style="float:right;">          
									<input type="hidden" value="<?php echo $image->image;?>" name="SBNews[gallery][image][]">                 
									<img width="135" src="<?php echo $this->baseUrl();?>/media/uploads/images/thumbnail/<?php echo $image->image;?>" class="image-position">
									<?php /*<input placeholder="Image Title" class="form-control image-title" type="text" name="SBNews[gallery][title][]">*/ ?> <div class="clearfix"></div>                              
									<span title="remove image" def="<?php echo $index;?>" class="delete_image delete-button"> <i class="glyphicon glyphicon-trash"></i> Remove </span>                
									<div class="clearfix"> </div><br>
								</div>
					
					<?php	}
						}
					}
					?>
				</div>
				<div class="clearfix"></div>
				<br>
			    <br>
			    <!-- The global progress bar -->
			    <div id="progress" class="progress">
			        <div class="progress-bar progress-bar-success prgs"></div>
			    </div>
			    <!-- The container for the uploaded files -->
			    <div id="files2" class="files"></div>
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
	$(function(){
		$("#save").click(function(){
			//alert($('#SBPage_page_name').val());
			$("#save").attr({
				'disabled':true,
				'value':'<?php echo $model -> isNewRecord ? 'Create...' : 'Save...';?>'
			});
			loading('show');
			var SBNews_news_content = CKEDITOR.instances['content'].getData();
			$.post($('#<?php echo $this->IDname;?>-form').attr('action'),$('#<?php echo $this->IDname;?>-form').serialize()+'&SBNews%5Bnews_content%5D='+encodeURIComponent(SBNews_news_content),function(response){
				if(response.success==true){
					success('show');
					setTimeout(function(){
						success('hide');
					},1000);
					$('#<?php echo $this->IDname;?>-grid').yiiGridView('update', { 
						data: $(this).serialize() 
					}); 
					$("#myModal").modal('hide'); 
				}else{
					error('show');
					setTimeout(function(){
						error('hide');
					},1000);
					if(response.SBNews_news_title){ 
						$("#SBNews_news_title.form-control").addClass('error'); 
						$('#SBNews_news_title_em_').html(response.SBNews_news_title).show(); 
					}else{ 
						$("#SBNews_news_title").removeClass('error'); 
						$('#SBNews_news_title_em_').hide(); 
					}
					if(response.SBPage_page_slug){ 
						$("#SBPage_page_slug.form-control").addClass('error'); 
						$('#SBPage_page_slug_em_').html(response.SBPage_page_slug).show(); 
					}else{ 
						$("#SBPage_page_slug").removeClass('error'); 
						$('#SBPage_page_slug_em_').hide(); 
					} 
					if(response.SBNews_news_date){ 
						$("#SBNews_news_date.form-control").addClass('error'); 
						$('#SBNews_news_date_em_').html(response.SBNews_news_date).show(); 
					}else{ 
						$("#SBNews_news_date.form-control").removeClass('error'); 
						$('#SBNews_news_date_em_').hide(); 
					}
					if(response.SBNews_categories){ 
						 
						$('#SBNews_category_em_').html(response.SBNews_categories).show(); 
					}else{ 
						 
						$('#SBNews_category_em_').empty(); 
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
$(document).ready(function(){
	$('.datepicker').datepicker({ 
		format:'dd/mm/yyyy', 
		todayHighlight: true 
	});
	var editor = CKEDITOR.replace( 'content', {
		filebrowserBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=files',
		filebrowserImageBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=images',
		filebrowserFlashBrowseUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=flash',
		filebrowserUploadUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=files',
		filebrowserImageUploadUrl :  '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=images',
		filebrowserFlashUploadUrl : '<?php echo $this->baseUrl();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=flash',
	});
	//loading('show');
	CKEDITOR.on( 'instanceReady', function( evt ) {
    	loading('hide');
	} );
});
//CKEDITOR.config.contentsCss = '<?=$this->baseUrl();?>/themes/website3/front/gps/styles/style2.css';
</script>

<script>
	$(function () {
	
	<?php if(!$model->isNewRecord){?>deleteImage();<?php } ?>	
		
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
            	$("#SBNews_news_thumb_image.form-control").val(file.name) ;
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
        
    //gallery
    var url2 = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?php echo $this->baseUrl();?>/media/upload.php?width=162&height=162&crop=true';
    var i = 50000000;
    $('#fileupload2').fileupload({
        url: url2,
        dataType: 'json',
        done: function (e, data) {
        	i++;
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files2');
                $(".view-logo2").append('<div id="data_'+i+'" style="float:right;"> \
                <input type="hidden" name="SBNews[gallery][image][]" value="'+file.name+'"> \
                <img width="135" class="image-position" src="<?php echo $this->baseUrl();?>/media/uploads/images/thumbnail/'+file.name+'"> \
                <!--<input placeholder="Image Title" class="form-control image-title" type="text" name="SBNews[gallery][title][]">-->\
                \
                <div class="clearfix"></div><span class="delete_image delete-button" def="'+i+'"> <i class="glyphicon glyphicon-trash"></i> Remove </span>\
                <div class="clearfix"> </div><br></div>');
            });
            deleteImage();
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
    
    function deleteImage(){
    	$(".delete_image").click(function(){
    		var item = $(this).attr('def');
    		$("#data_"+item).remove();
    	});
    }
        
});
</script>