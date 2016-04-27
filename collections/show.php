<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>

<main class="collectionsshow-page">
		<div class="jumbotron jumbotron-collections-show">
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
        <?php 
            if (isset($_GET['tag']) || isset($_GET['neighborhood'])) {
                if (isset($_GET['tag'])){ $current_tags = $_GET['tag']; }
                if (isset($_GET['neighborhood'])){ $current_neighborhood = $_GET['neighborhood']; }

                $tags = '';
                if (isset($current_tags)){ $tags .= $current_tags; }
                if (isset($current_neighborhood) && isset($current_tags)){ $tags .= ','; }
                if (isset($current_neighborhood)){ $tags .= $current_neighborhood; }

                $item_records = get_records('Item', array(
                    'collection' => $collection,
                    'tags' => rawurldecode($tags)
                ), 0);
            } else {
	            if (isset($_GET['page'])) {
		            //$offset = $_GET['page']*20;
	            } else {
		            $offset = 0;
	            }
                $item_records = get_records('Item', array(
                    'collection' => $collection
                    //'offset' => $offset
                ), 0);
            }
            set_loop_records('items', $item_records);
        ?>
       
        <section class="container filter-section">
			<div class="row">
				<h2 class="item-counter">
					<?php echo count($item_records); ?> Items</h2>
					<?php 
                        $tag_records = get_records("Tag");
						$neighborhoods = [];
						$tags = [];
						foreach($tag_records as $tr) {
							if(substr($tr['name'], 0, 12) == "Neighborhood") {
								array_push($neighborhoods, $tr["name"]);
							} else {
								array_push($tags, $tr["name"]);
							}
                        }
                    ?>
					<?php echo tag_string('collection', 'collections'); ?>
					<div class="filters-container">
					<select class="form-control single-filter selectpicker" title="All Tags" onchange="location = this.options[this.selectedIndex].value;" data-size="5" data-width="165px">
						<?php foreach($tags as $tag): ?>
                            <option 
                                <?php if(isset($current_tags)){ if($current_tags == $tag){ echo "selected"; }} ?>
                                value="?tag=<?php echo rawurlencode($tag); ?><?php if (isset($current_neighborhood)): ?>&neighborhood=<?php echo $current_neighborhood; endif; ?>">
                                    <?php echo $tag; ?>
                            </option>
						<?php endforeach; ?>	
					</select>
					<select class="form-control single-filter selectpicker" title="All Neighborhoods" onchange="location = this.options[this.selectedIndex].value;" data-size="5" data-width="195px">
						<?php foreach($neighborhoods as $neighborhood):
							$name = substr($neighborhood, 14); ?>
                            <option 
                                <?php if(isset($current_neighborhood)){ if($current_neighborhood == $neighborhood){ echo "selected"; }} ?>
                                value="?neighborhood=<? echo rawurlencode($neighborhood); ?><?php if (isset($current_tags)): ?>&tag=<?php echo $current_tags; endif; ?>">
                                    <?php echo $name; ?>
                            </option>
						<?php endforeach; ?>
					</select>
                    <?php echo link_to_collection('Reset Filters', array('class' => 'btn btn-default reset-filter-btn')) ?>
				</div>
			</div>
		</section>
	
    
    
		<section class="vertical-thumbnail-container">
        <?php if (count($item_records) > 0): ?>
        	<?php $index = 0; ?>
        	<?php  if (isset($_GET['page'])) {
		            $offset = $_GET['page']-1;
	            } else {
		            $offset = 0;
	            }
			?>	
            <?php foreach (loop('items') as $item): 
	            if ($index >= $offset * 20 || $index <= $offset * 20 + 19):  
            ?>
            <div class="col-sm-3 vertical-thumbnail browse-items">
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
             <?php $index++; ?>
			 <?php endif; ?>
            <?php endforeach; ?>
		</section>
             
        <?php else: ?>
            <p class="no-results"><?php echo __("There are currently no items within this collection."); ?></p>
        <?php endif; ?>
        </div><!-- end collection-items -->
        
        
        

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
<?php echo foot(); ?>
