<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>


<main class="stories-page">
		<div class="jumbotron stories-jumbotron">
			<div class="placeholder-1">
				<?php foreach (loop('exhibits') as $exhibit): ?>
				<?php if($exhibit->featured == true): ?>
				<div class="jumbotron-slider-img jumbotron-img-stories">
					<?php $featuredExhibitImage = sckls_exhibit_builder_get_first_image_html($exhibit); ?>
					<?php echo '<img src="'. $featuredExhibitImage . '">'; ?>
				</div>
				<section class="stories-jumbotron-slider-text">
					<h4 class="stories-jumbotron-slider-text-subheading">Featured Story</h4>
					<h2 class="jumbotron-slider-text-featured-story">
						<?php $featuredExhibitTitle = metadata($exhibit, 'title'); ?>
						<?php echo($featuredExhibitTitle); ?>
					</h2>
					<p class="stories-jumbotron-summary">
						<?php $featuredExhibitDescription = metadata($exhibit, 'description'); ?>
						<?php echo ($featuredExhibitDescription); ?>
					</p>
					<?php echo link_to_exhibit('<h4>View the Story</h4>', array('class' => 'jumbotron-slider-text-link')); ?>	
					</section>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div> <!-- /jumbotron -->
		
		<div class="container">
			<?php foreach (loop('exhibit') as $exhibit): ?>
			<div class="col-sm-6 stories-thumbnail">
				<div class="thumbnail">
					<?php $exhibitImage = sckls_exhibit_builder_get_first_image_html($exhibit); ?>
					<?php echo '<div class="thumbnail-img-container" style="background-image: url(' . $exhibitImage . ');"></div>'; ?>					
					<div class="thumbnail-caption">
						<?php $featuredExhibitTitle = metadata($exhibit, 'title'); ?>
						<h2 class="thumbnail-caption-featured-collection"><?php echo link_to_exhibit($featuredExhibitTitle); ?></h2>
					</div>	
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		



<?php echo pagination_links(); ?>


<?php echo foot(); ?>
