<?php echo head(); ?>
<div id="primary" class="involved-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
			    <h1 class="involved-page-heading"><?php echo html_escape(get_option('simple_contact_form_contact_page_title')); ?></h1>
			    <section class="involved-page-container">
					<div id="simple-contact">
						<div id="form-instructions">
						<?php echo get_option('simple_contact_form_contact_page_instructions'); // HTML ?>
			    		</div>
						<?php echo flash(); ?>
					    <form name="contact_form" id="contact-form"  method="post" enctype="multipart/form-data" accept-charset="utf-8" class="involved-form">
							<div class="form-group">
						        <fieldset>
						        <div class="field">
						        <?php echo $this->formLabel('name', 'Name ', array('class'=> 'involved-form-labels')); ?>
						            <div class='inputs'>
						            <?php echo $this->formText('name', $name, array('class'=>'textinput form-control involved-form-inputs')); ?>
						            </div>
						        </div>
						        
						        <div class="field">
						            <?php echo $this->formLabel('email', 'Email ', array('class'=> 'involved-form-labels')); ?>
						            <div class='inputs'>
						                <?php echo $this->formText('email', $email, array('class'=>'textinput form-control involved-form-inputs'));  ?>
						            </div>
						        </div>
						        
						        <div class="field">
						          <?php echo $this->formLabel('message', 'Message ', array('class'=> 'involved-form-labels')); ?>
						          <div class='inputs'>
						          <?php echo $this->formTextarea('message', $message, array('class'=>'textinput form-control involved-form-textarea', 'rows' => '3')); ?>
						          </div>
						        </div>
						        
						        </fieldset>
				
					
						        <fieldset>
						        <?php if ($captcha): ?>
						        <div class="field">
						            <?php echo $captcha; ?>
						        </div>
						        <?php endif; ?>
						
								<div class="involved-form-buttons-container">
									<div class="field">
										<?php echo $this->formSubmit('cancel', 'Cancel', array('class' => 'involved-form-cancel')); ?>
									</div>
							        <div class="field">
							          <?php echo $this->formSubmit('send', 'Send Message', array('class' => 'involved-form-submit')); ?>
							        </div>
								</div>
						        
						        </fieldset>
							</div>
			    		</form>
			
					</div>
			    </section>
			</div>
		</div>
	</div>
</div>
	
<?php echo foot();
