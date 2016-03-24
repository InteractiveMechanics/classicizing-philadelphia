<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>



<div id="primary" class="about-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
				<h1 class="about-page-heading"><?php echo metadata('exhibit', 'title'); ?></h1>
				<?php echo exhibit_builder_page_nav(); ?>
				
				<section class="about-page-container">
				<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
				<div class="exhibit-description">
				<?php echo $exhibitDescription; ?>
				</div>
				<?php endif; ?>

				<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
				<div class="exhibit-credits">
					<h3><?php echo __('Credits'); ?></h3>
					<p><?php echo $exhibitCredits; ?></p>
				</div>
				<?php endif; ?>


				<?php
				$pageTree = exhibit_builder_page_tree();
				if ($pageTree):
				?>
				<nav id="exhibit-pages">
				<?php echo $pageTree; ?>
				</nav>
				<?php endif; ?>
				
				</section>
			</div> <!-- / col-md-8 -->
		</div> <!-- /row -->
	</div> <!-- /container -->
</div> <!-- /#primary -->

<?php echo foot(); ?>
