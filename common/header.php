<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
        queue_css_file('lib/bootstrap.min');
        queue_css_file('lib/slick');
        queue_css_file('lib/slick-theme');
        queue_css_url('//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css');
        queue_css_file('main');
        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    
    <?php
	    queue_js_url('//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js');
        queue_js_file('lib/bootstrap.min');
        queue_js_file('lib/slick.min');
        queue_js_url('//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js');
        queue_js_file('main');
        echo head_js();
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header role="banner">
<!--
        <div class="container">
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            <h1 class="site-title text-center"><?php echo link_to_home_page(theme_logo()); ?></h1>

        </div>
-->

        <nav class="navbar navbar-default" role="navigation">
           <div class="clearfix">
	           <a class="navbar-brand" href="<?php echo url('/'); ?>">
		           <h1>
		    		<?php $logo = img('logo.svg'); ?>
		    		<?php $logo_text = img('logo-text.svg'); ?>
		    		<img class="logo" src="<?php echo $logo; ?>" />
		    		<img src="<?php echo $logo_text; ?>" />
	    					    			 
	    			</h1>
	           </a>
    		</div>
    		
    		<div class="container-fluid navbar-black fix-right-margin">
  			<div class="navbar-header pull-left">
  				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
	      		</button>	

  			</div>
    		<div class="navbar-header pull-right no-collapse">

      			<form class="navbar-form navbar-left search-icon" role="search" action="<?php echo public_url(''); ?>search">
	      			<?php echo search_form(array('show_advanced' => false, 'show_searchpage' => false)); ?>
      			</form>

      			<p class="navbar-text navbar-left navbar-mobile-guide"><a href="http://classicizingphiladelphia.org/mobile" class="navbar-link">Explore the Mobile Guide</a></p>

    		</div> <!-- /.navbar-header pull-right -->
    		
    		<div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
				<?php echo public_nav_main_bootstrap(); ?>
      		</div>
  		</div><!-- /.container-fluid -->		
	</nav>	
    		
    		
    </header>
    <main id="content" role="main">
<!--       <div class="container"> -->
          <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
