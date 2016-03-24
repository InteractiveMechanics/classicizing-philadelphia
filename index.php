<?php echo head(array('bodyid'=>'home')); ?>

<?php echo get_theme_option('Homepage About'); ?>
<main class="homepage-page">
	<div class="jumbotron">
		<div class="jumbotron-slider">
			<div class="placeholder-1">
				<div class="jumbotron-slider-img">
					<?php $homepage_img = img('homepage-bg.jpg'); ?>
					<img src="<?php echo $homepage_img; ?>" alt="homepage-image"/>
				</div>
				<section class="homepage-about">
					<h3 class="homepage-about-heading">About Classicizing Philadelphia</h3>
					<p class="homepage-about-content">America's engagement with Greece and Rome constitutes a continuous thread in the conversation that has created our culture and institutions. Classicizing Philadelphia, a digital humanities project in public history at Bryn Mawr College, seeks to document, study, and continue this important conversation in its many forms throughout the history of the city of Philadelphia. <a href="" class="paragraph-link">About this project &raquo;</a></p>
				</section>
			</div>
		</div>
	</div>
	
	<!-- 2 items -->
	<section class="homepage-thumbnails-container">
		<?php echo classphila_random_featured_item(); ?>
	</section>
	
	<!-- 1 collection -->
	<section class="homepage-thumbnails-container">
		<?php echo classphila_random_featured_collection(); ?>
	</section>
	
	<!-- 1 story  -->
	<!-- 1 collection -->
	<section class="homepage-thumbnails-container">
		<?php echo classphila_exhibit_builder_display_random_featured_exhibit(); ?>
	</section>
    
    
 </div>    

<?php echo foot(); ?>
