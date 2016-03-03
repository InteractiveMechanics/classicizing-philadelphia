<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<main class="collections-page">
<!--
<div class="jumbotron">
			<div class="jumbotron-slider">
				<?php $featuredCollection = get_random_featured_collection(); ?>
				<?php if($featuredCollection): ?>
				<?php foreach(loop('collections') as $featuredCollection): ?>
				<div class="placeholder-1">
					<div class="jumbotron-slider-img">
						 <?php if ($collectionImage = record_image('collection', 'fullsize')): ?>
                                <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
                            <?php endif; ?>
					</div>
					<section class="jumbotron-slider-text">
						<h4 class="jumbotron-slider-text-subheading">Featured Collection</h4>
						<?php $myTitle = metadata($featuredCollection, array('Dublin Core', 'Title')); ?>
						<?php if ($myTitle):  ?>
							<h2 class="jumbotron-slider-text-featured-collection"><?php echo $myTitle; ?></h2>
						<?php echo link_to_collection('<h4>View Items in this collection</h4>', array('class' => 'jumbotron-slider-text-link')); ?>
						<?php endif; ?>
					</section>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
-->
 

	<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1"> 
					<h1 class="about-page-heading"><?php echo 'Browse all Collections'; ?></h1>
				</div>
			</div>
			
			<section class="container">
		        <?php if ($total_results > 0): ?>
		            <?php foreach (loop('collections') as $collection): ?>
		            	<?php if($collection->public == true): ?>
		            	<div class="thumbnail-50">
			                <div class="thumbnail-img">
		                            <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
		                                <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
		                            <?php endif; ?>
		                    </div>
		                     <div class="thumbnail-caption">
			                    <?php $count = metadata($collection, 'total_items'); ?>
			                    <h4 class="thumbnail-caption-subheading"><?php echo("$count"); ?> Items</h4>
			                     <?php $myTitle = metadata('collection', array('Dublin Core', 'Title')); ?>
								<?php if ($myTitle):  ?>
									<h2 class="thumbnail-caption-featured-collection"><?php echo $myTitle; ?></h2>
								<?php echo link_to_collection('<h4>View Items in this collection</h4>', array('class' => 'thumbnail-link')); ?>
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
