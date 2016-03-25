<?php echo $this->form('search-form', $options['form_attributes']); ?>
    
    <?php if ($options['show_searchpage']): ?>
	    <div class="form-group input-group">
	        <?php echo $this->formText('query', $filters['query'], array('class'=>'form-control search-form-inputs', 'placeholder'=>'Search term')); ?>
	        <span class="input-group-btn">
				<button type="submit" class="btn btn-default search-form-submit-btn">Submit</button>
			</span>
	    </div>
	    <?php else: ?>
	    		
				<button type="submit" class="btn btn-default search-btn">
      				<svg version="1.1" id="search-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 				viewBox="0 0 24.9 24.9" enable-background="new 0 0 24.9 24.9" xml:space="preserve">
					<path fill="" d="M19.5,9.9c0-5.3-4.6-9.9-9.9-9.9S0,4.3,0,9.6s4.6,9.9,9.9,9.9c1.7,0,3.4-0.5,4.8-1.3l0.5-0.3l6.8,6.8
					c0.3,0.3,0.9,0.3,1.2,0l1.6-1.6c0.2-0.2,0.2-0.3,0.1-0.4c0-0.2-0.2-0.4-0.4-0.6l-6.7-6.7l0.3-0.5C19,13.4,19.5,11.7,19.5,9.9z
	 				M9.9,17.8c-4.4,0-8.2-3.8-8.2-8.2s3.5-7.9,7.9-7.9s8.2,3.8,8.2,8.2S14.3,17.8,9.9,17.8z"/>
					</svg>
				</button>
				<div class="form-group search-input-container">
					 <?php echo $this->formText('query', $filters['query'], array('class'=>'form-control search-input', 'placeholder'=>'Search')); ?>
	          		   <button type="reset" class="btn btn-default reset-btn">
	          			<svg version="1.1" id="reset-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 					viewBox="0 0 21.3 21.3" enable-background="new 0 0 21.3 21.3" xml:space="preserve">
							<g opacity="0.5">
							<path fill="" d="M10.7,0C4.8,0,0,4.8,0,10.7s4.8,10.7,10.7,10.7s10.7-4.8,10.7-10.7C21.3,4.8,16.5,0,10.7,0z M12.9,10.7
							l3.9,3.9l-2.2,2.2l-3.9-3.9l-3.9,3.9l-2.2-2.2l3.9-3.9L4.6,6.8l2.2-2.2l3.9,3.9l3.9-3.9l2.2,2.2L12.9,10.7z"/>
							</g>
						</svg>
					</button>
        		</div>
    <?php endif; ?>
    
    <?php if ($options['show_advanced']): ?>
        <fieldset id="advanced-form">
            <fieldset id="query-types">
                <p><?php echo __('Search using this query type:'); ?></p>
                <?php echo $this->formRadio('query_type', $filters['query_type'], null, $query_types); ?>
            </fieldset>
            <?php if ($record_types): ?>
            <fieldset id="record-types">
                <p><?php echo __('Search only these record types:'); ?></p>
                <?php foreach ($record_types as $key => $value): ?>
                    <?php echo $this->formCheckbox('record_types[]', $key, in_array($key, $filters['record_types']) ? array('checked' => true, 'id' => 'record_types-' . $key) : null); ?> <?php echo $value; ?><br>
                <?php endforeach; ?>
            </fieldset>
            <?php elseif (is_admin_theme()): ?>
                <p><a href="<?php echo url('settings/edit-search'); ?>"><?php echo __('Go to search settings to select record types to use.'); ?></a></p>
            <?php endif; ?>
            <p><?php echo link_to_item_search(__('Advanced Search (Items only)')); ?></p>
        </fieldset>
    <?php endif; ?>
</form>
