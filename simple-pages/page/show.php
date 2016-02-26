<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<div id="primary" class="about-page">
    <?php if (!$is_home_page): ?>
<!--     <p id="simple-pages-breadcrumbs"><?php echo simple_pages_display_breadcrumbs(); ?></p>	 -->
	<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
					<h1 class="about-page-heading"><?php echo metadata('simple_pages_page', 'title'); ?></h1>
						<section class="about-page-container">
    <?php endif; ?>
    <?php
    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
    echo $this->shortcodes($text);
    ?>	
					</section>
    			</div>
			</div>
	</div>			
</div>

<?php echo foot(); ?>
