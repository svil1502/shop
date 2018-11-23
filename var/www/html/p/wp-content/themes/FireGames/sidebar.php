<div class="sidecont rightsector">
	
	<div class="sidebar">
<?php echo do_shortcode('[supsystic-gallery id=1]') ?>
    <?php if(get_theme_option('video') != '') {
    		?>
    		<div class="sidebarvideo">
    			
    		</div>
    	<?php
    	}
    	?>
  
		<ul>
			

<?php 
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

			
			
				<?php wp_list_categories('hide_empty=0&show_count=1&depth=1&title_li=<h2>Categories</h2>'); ?>
				
				
					
			<?php endif; ?>
		</ul>

        
        
		
	</div>
</div>
