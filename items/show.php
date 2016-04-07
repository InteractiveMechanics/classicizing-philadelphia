<?php 
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>

<main class="single-item-page">
            <div class="col-sm-6 item-image">
                <?php $images = $item->Files; $imagesCount = 1; ?>
                <?php if ($images): ?>
                <div class="clearfix">
                    <?php foreach ($images as $image): ?>
                        <?php if ($imagesCount === 1): ?>
                            <img src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" />
                        <?php endif; ?>
                    <?php $imagesCount++; endforeach; ?>
                </div>
                <?php else: ?>
                    <div class="no-image">No photos available.</div>
                <?php endif; ?>
        </div>
        <div class="col-sm-6 item-description-container">
              
              <!-- Item name -->
              <h1 class="item-name"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
              
              <!-- Item date -->
              <h3 class="item-year"><?php echo metadata('item', array('Dublin Core', 'Date')); ?></h3>
              
              
              <!-- Item description -->
             <p class="item-description"><?php echo metadata('item', array('Dublin Core', 'Description')); ?></p>
              
             <!-- Item Source -->
			 <h3 class="item-source-heading"><?php echo __('Source'); ?></h3>
			 <p class="item-source-description"><?php echo metadata('item', array('Dublin Core', 'Source')); ?></p>
             
             <!-- Item Rights -->
             <h3 class="item-rights-heading"><?php echo __('Rights'); ?></h3>
			 <p class="item-rights-owner"><?php echo metadata('item', array('Dublin Core', 'Rights')); ?></p>
              
              
              <!-- Item Coverage -->
              <h3 class="item-rights-heading"><?php echo __('Coverage'); ?></h3>
			 <p class="item-rights-owner"><?php echo metadata('item', array('Dublin Core', 'Coverage')); ?></p>
			 
			 <!-- Item Format -->
			 <h3 class="item-format-heading">Format</h3>
		<p class="item-format-description"><?php echo metadata('item', array('Dublin Core', 'Format')); ?></p>

			<!-- Item Citation -->
			<div class="item-tombstone-card">
			<p class="item-tombstone-card-description"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></p>
		</div>


            <!-- The following prints a list of all tags associated with the item -->
            <?php if (metadata('item', 'has tags')): ?>
                <div id="item-tags" class="element">
                    <h3><?php echo __('Tags'); ?></h3>
                    <div class="element-text"><?php echo tag_string('item'); ?></div>
                </div>
            <?php endif;?>
            
            
            
        </div>
    </div>
    
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
   
<?php echo foot(); ?>
