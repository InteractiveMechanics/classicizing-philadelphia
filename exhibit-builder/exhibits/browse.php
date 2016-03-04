<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>




<h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
<?php if (count($exhibits) > 0): ?>

<main class="stories-page">
		<div class="jumbotron stories-jumbotron">
			<div class="placeholder-1">
				<div class="jumbotron-slider-img jumbotron-img-stories">
					<img src="http://i.ebayimg.com/00/s/MTUyNFgxNjAw/z/MbIAAOSwu4BVxJpm/$_20.JPG">
				</div>
				<section class="stories-jumbotron-slider-text">
					<h4 class="stories-jumbotron-slider-text-subheading">Featured Story</h4>
					<h2 class="jumbotron-slider-text-featured-story">The Berwind Mausoleum</h2>
					<p class="stories-jumbotron-summary">Hidden in West Laurel Hill Cemetary just outside Philadelphia, an octagonal mausoleum recalls the Tower of the Winds in Athens, and creates an architectural pun on the name of its occupants.</p>
					<a href="" class="jumbotron-slider-text-link"><h4>View the Story</h4></a>
				</section>
			</div>
		</div> <!-- /jumbotron -->



<?php echo pagination_links(); ?>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
        <h2><?php echo link_to_exhibit(); ?></h2>
        <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail')): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
        <?php endif; ?>
        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
        <div class="description"><?php echo $exhibitDescription; ?></div>
        <?php endif; ?>
        <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
        <p class="tags"><?php echo $exhibitTags; ?></p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
