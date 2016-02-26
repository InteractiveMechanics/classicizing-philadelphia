

<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>

<main class="collectionsshow-page">
		<div class="jumbotron">
			<div class="placeholder-1">
				<div class="jumbotron-slider-img jumbotron-slider-img-collectionsshow">
					<img src="http://i.ebayimg.com/00/s/MTUyNFgxNjAw/z/MbIAAOSwu4BVxJpm/$_20.JPG">
				</div>
				<section class="collections-jumbotron-text-container">
					<h2 class="collections-jumbotron-page-heading">Architecture &amp; City Planning</h2>
					<p class="collections-jumbotron-page-summary">Officia in pug hammock, dolore velit fingerstache ennui ramps assumenda cliche quis street art exercitation consectetur. Excepteur vice tofu, neutra typewriter biodiesel iPhone adipisicing keytar +1 knausgaard. Cornhole laboris yuccie, you probably haven't heard of them vinyl readymade fixie elit.</p>
				</section>
			</div>
		</div>

   
    <section class="container filter-section">
			<div class="row">
				<h2 class="item-counter"><?php echo total_records('Item');?> Items</h2>
				<div class="filters-container">
					<select class="form-control single-filter selectpicker" data-width="165px">
						<option selected>All Tags</option>
						<option>Tag Option 1</option>
						<option>Tag Option 2</option>
						<option>Tag Option 3</option>
						<option>Tag Option 4</option>
						<option>Tag Option 5</option>	
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
    <?php echo all_element_texts('collection'); ?>
    <div id="collection-items">
        <h2><?php echo link_to_items_browse(__('Items in the %s Collection', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></h2>
        <?php if (metadata('collection', 'total_items') > 0): ?>
            <?php foreach (loop('items') as $item): ?>
            
            <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
            <div class="item hentry">
                <h3><?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?></h3>
    
                <?php if (metadata('item', 'has thumbnail')): ?>
                <div class="item-img">
                    <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
                </div>
                <?php endif; ?>
    
                <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
                <div class="item-description">
                    <p><?php echo $text; ?></p>
                </div>
                <?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                <div class="item-description">
                    <?php echo $description; ?>
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
