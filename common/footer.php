      </div>
    </main>
    <footer>
	    	 <p><?php echo __('Copyright &copy; Classicizing Philadelphia, Bryn Mawr College'); ?></p>
            <p><?php echo __('Classicizing Philadelphia is based at <a href="http://www.brynmawr.edu" class="footer-link">Bryn Mawr College</a> with the generous support of the <a href="http://caas-cw.org/wp/#000000" class="footer-link">Classical Association of the Atlantic States</a>'); ?></p>
			<?php $logo = img('logo.svg'); ?>
			<img class="logo" src="<?php echo $logo; ?>" />
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
    </footer>
</body>
</html>
