

<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>

<main class="collectionsshow-page">
		<div class="jumbotron">
			<div class="placeholder-1">
				<div class="jumbotron-slider-img jumbotron-slider-img-collectionsshow">
					<?php if ($collectionImage = record_image('collection', 'fullsize')): ?>
                    <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
                            <?php endif; ?>
				</div>
				<section class="collections-jumbotron-text-container">
					<h2 class="collections-jumbotron-page-heading"><?php echo metadata('collection', array('Dublin Core', 'Title')); ?></h2>
					<p class="collections-jumbotron-page-summary"><?php echo metadata('collection', array('Dublin Core', 'Description')); ?></p>
				</section>
			</div>
		</div>
		   
    <section class="container filter-section">
			<div class="row">
				<h2 class="item-counter">
					 <?php $count = metadata($collection, 'total_items'); ?>
					<?php echo("$count"); ?> Items</h2>
					<?php echo get_recent_tags(3); ?>
			
					<?php echo tag_string('collection', 'collections'); ?>
					<div class="filters-container">
					<select class="form-control single-filter selectpicker" data-width="165px">
						<option selected>All Tags</option>
						<?php foreach($tags as $tag): ?>
								<option><?php echo tag_strings($tag); ?></option>
						<?php endforeach; ?>	
					</select>
					<select class="form-control single-filter selectpicker" data-width="195px">
						<option selected>All Neighborhoods</option>
						<option>Neighborhood 1</option>
						<option>Neighborhood 2</option>
						<option>Neighborhood 3</option>
						<option>Neighborhood 4</option>
						<option>Neighborhood 5</option>	
					</select>
				</div>		
			</div>
		</section>
    
    
		<section class="vertical-thumbnail-container">
        <?php if (metadata('collection', 'total_items') > 0): ?>
            <?php foreach (loop('items') as $item): ?>
            <div class="col-sm-3 vertical-thumbnail">
                <?php if (metadata('item', 'has thumbnail')): ?>
                <div class="vertical-thumbnail-img">
                    <?php echo link_to_item(item_image('square_thumbnail', array())); ?>
                </div>
                <div class="vertical-thumbnail-caption-container">
	                <?php $itemDate = strip_formatting(metadata('item', array('Dublin Core', 'Date'))); ?>
	                <h5 class="vertical-thumbnail-caption-year"><?php echo ($itemDate); ?></h5>
	                <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
	                <h4 class="vertical-thumbnail-caption-title"><?php echo ($itemTitle); ?></h4>    
                </div>
                <?php endif; ?>
             </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p><?php echo __("There are currently no items within this collection."); ?></p>
        <?php endif; ?>
    </div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
<?php echo foot(); ?>
