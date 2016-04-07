<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<main class="collections-page">
 

			<div class="row">
				<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1"> 
					<h1 class="collections-page-heading"><?php echo 'Browse all Collections'; ?></h1>
				</div>
			</div>
			
			<section>
		        <?php if ($total_results > 0): ?>
		            <?php foreach (loop('collections') as $collection): ?>
		            	<?php if($collection->public == true): ?>
		            	<div class="thumbnail-50">
			                <div class="thumbnail-img-container">
		                            <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
		                                <?php echo link_to_collection($collectionImage, array('class' => 'thumbnail-img')); ?>
		                            <?php endif; ?>
		                    </div>
		                     <div class="thumbnail-caption">
			                    <?php $count = metadata($collection, 'total_items'); ?>
			                    <h4 class="thumbnail-caption-subheading"><?php echo("$count"); ?> Items</h4>
			                     <?php $myTitle = metadata('collection', array('Dublin Core', 'Title')); ?>
								<?php if ($myTitle):  ?>
									<h2 class="thumbnail-caption-featured-collection"><?php echo $myTitle; ?></h2>
								<?php echo link_to_collection('<h4 class="thumbnail-caption-featured-collection-link">View Items in this collection</h4>', array('class' => 'thumbnail-link')); ?>
								<?php endif; ?>
		                     </div>
		                </div>
                                              
		              <?php endif; ?>      
		        <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'collection' => $collection)); ?>
		        <?php endforeach; ?>
		        <?php else : ?>
		            <p><?php echo 'No collections added, yet.'; ?></p>
		        <?php endif; ?>
    		</section>
    <?php echo pagination_links(); ?> 
 
		
</main>       

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
