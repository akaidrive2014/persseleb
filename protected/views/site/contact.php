<?php 
$Contact = json_decode($this->Website->contact);
$Contact = $Contact->contact;
?>
<div id="line-page-title">
	<div class="line-wrap">
		<div id="line-page-title">
			<div class="line-wrap">
				<div class="line-page-title-inner">
					<div style="background:url('<?php if (empty($banner->banner_image)) { ?> <?php echo $this->baseTheme();?>/front/ostar/assets/img/sample/other/bg-contact.jpg <?php }else{?><?php echo $this -> baseUrl(); ?>/assets/uploads/images/thumbnail/<?php echo $banner->banner_image;?><?php } ?>') center center; padding:150px 0">
						<div data-scrollreveal="enter top over 0.5s after 0.3s" class="line-title-captions" data-sr-init="true" data-sr-complete="true">
							<h1 class="line-entry-title"><?php echo empty($banner->banner_title) ? 'Contact Us' : $banner->banner_title;?></h1>
						</div>
						<ul data-scrollreveal="enter bottom over 0.5s after 0.4s" class="line-breadcrumbs" data-sr-init="true" data-sr-complete="true">
							<li>
								<a href="<?php echo $this->baseUrl();?>">Home</a>
							</li>
							<li>
								<?php echo empty($banner->banner_title) ? 'Contact Us' : $banner->banner_title;?>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--end line-wrap-->
		</div>
	</div>
	<!--end line-wrap-->
</div>
			
<div id="line-page-body">
	<div class="line-wrap line-container line-no-sidebar">
		<div class="line-page-content">
			<div class="line-content line-page-content-inner">
				<div class="line-wrap line-row" style="margin-top:20px">
					<div class="one-fourth line-has-border">
						<span style="color:#000">Address:</span>
						<p><?php echo $Contact->address;?></p>
					</div>
					<div class="one-fourth line-has-border">
						<span style="color:#000">Email:</span>
						<p><?php echo $Contact->email;?></p>
					</div>
					<div class="one-fourth line-has-border">
						<span style="color:#000">Skype:</span>
						<p><?php echo $Contact->skype;?></p>
					</div>
					<div class="one-fourth last">
						<span style="color:#000">Mobile:</span>
						<p><?php echo $Contact->mobile;?></p>
					</div>
				</div>
				<hr>
				<div class="line-wrap line-row" style="margin-bottom:40px">
					<div class="one-half line-has-border">
                        <div class="successMessage" id="alert-success"></div>
						<div class="contact-form form">
							<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'contact-form',
									'enableClientValidation'=>true,
									/*'clientOptions'=>array(
										'validateOnSubmit'=>true,
									),*/
								)); ?>
								<p>
									<label for="contact-name"><?php echo $model->getAttributeLabel('name');?> <span class="required">*</span></label>
									<?php echo $form->textField($model,'name'); ?><br>
                                    <span id="ContactForm_name_em_" class="errorMessage" style="display:none"></span>
								</p>
								<p>
									<label for="contact-email"><?php echo $model->getAttributeLabel('email');?> <span class="required">*</span></label>
                                    <?php echo $form->textField($model,'email'); ?><br>
                                    <span id="ContactForm_email_em_" class="errorMessage" style="display:none"></span>
								</p>
                                <p>
                                    <label for="contact-email"><?php echo $model->getAttributeLabel('phone');?> <span class="required">*</span></label>
                                    <?php echo $form->textField($model,'phone'); ?><br>
                                    <span id="ContactForm_phone_em_" class="errorMessage" style="display:none"></span>
                                </p>
								<p>
									<label for="contact-subject"><?php echo $model->getAttributeLabel('subject');?> <span class="required">*</span></label>
                                    <?php
                                    echo $form->dropDownList($model,'subject',array(
                                        'Pembuatan Website'=>'Pembuatan Website',
                                        'Pembuatan Website Dengan Budget Tertentu'=>'Pembuatan Website Dengan Budget Tertentu',
                                        'Konsultan Gratis'=>'Konsultan Gratis',
                                    ),array('empty'=>'---'));
                                    ?><br>
                                    <span id="ContactForm_subject_em_" class="errorMessage" style="display:none"></span>
                                    <?php /*
                                    <select required="required" name="subject" id="contact-subject" style="width: 70%;">
										<option value=""> &nbsp;&nbsp; ---</option>
										<option value="Pembuatan Website"> &nbsp;&nbsp; Pembuatan Website</option>
										<option value="Pembuatan Website Dengan Budget Tertentu"> &nbsp;&nbsp; Pembuatan Website Dengan Budget Tertentu</option>
										<option value="Konsultan Gratis"> &nbsp;&nbsp; Konsultan Gratis</option>
									</select>	*/ ?>
								</p>
								<p>
									<label for="contact-message"><?php echo $model->getAttributeLabel('body');?> <span class="required">*</span></label>
                                    <?php
                                    echo $form->textArea($model,'body');
                                    ?><br>
                                    <span id="ContactForm_body_em_" class="errorMessage" style="display:none"></span>
								</p>

                            <div class="row">
                                <?php echo $form->labelEx($model,'verifyCode'); ?>
                                <div>
                                    <img alt="" src="/site/captcha?v=5497ca0ae5ddb" id="contact_captcha" style="width: 90px;">
                                    <a href="/site/captcha?refresh=1" id="ccaptcha_button" title="get new code">Refresh</a>
                                    <?php echo $form->textField($model,'verifyCode',array('style'=>'margin-left:30px;')); ?>
                                </div>
                                <div class="errorMessage" id="ContactForm_verifyCode_em_" style="display:none;"></div>
                                <div class="hint">Masukkan huruf seperti yang ditunjukkan pada gambar di atas.</div>
                                <div style="display:none" id="ContactForm_verifyCode_em_" class="errorMessage"></div>
                            </div>

                            <?php /*

                                <?php if(CCaptcha::checkRequirements()): ?>
                                <div class="row">
                                    <?php echo $form->labelEx($model,'verifyCode'); ?>
                                    <div>
                                        <?php $this->widget('CCaptcha'); ?>
                                        <?php echo $form->textField($model,'verifyCode',array(
                                            'captchaAction'=>'site/captcha',
                                            'showRefreshButton' => false,
                                            //'id'=>'contact_captcha',
                                            'clickableImage' => true,
                                        )); ?>
                                    </div>
                                    <div style="display:none;" id="ContactForm_verifyCode_em_" class="errorMessage"></div>
                                    <div class="hint">Masukkan huruf seperti yang ditunjukkan pada gambar di atas.</div>
                                    <?php echo $form->error($model,'verifyCode'); ?>
                                </div>
                                <?php endif; ?> */ ?>

								<p class="form-submit" style="margin-top: 40px;">
									<button type="button" id="contactButton" style="margin:0" class="line-btn small">Send Message</button>
								</p>
							<?php $this->endWidget(); ?>
						</div>
					</div>
					<div class="one-half last">
						<?php echo $Contact->description;?>
						<div class="line-gallery gallery-slide flexslider">
							<ul class="slides">
								<li>
									<a class="expand" href="<?php echo $this->baseTheme();?>/front/ostar/assets/img/sample/other/2/1.jpg" data-lightbox="nivoLightbox" data-lightbox-gallery="gallery3">
									<img alt="img" src="<?php echo $this->baseTheme();?>/front/ostar/assets/img/sample/other/2/1.jpg">
									</a>
								</li>
								<li>
									<a class="expand" href="<?php echo $this->baseTheme();?>/front/ostar/assets/img/sample/other/2/2.jpg" data-lightbox="nivoLightbox" data-lightbox-gallery="gallery3">
									<img alt="img" src="<?php echo $this->baseTheme();?>/front/ostar/assets/img/sample/other/2/2.jpg">
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--line-page-content-->
	</div>
	<!--end line-container-->
</div>
<style>
    select#ContactForm_subject option{
        padding-left: 10px;
    }
</style>
