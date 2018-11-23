<?php
/*
Template Name: Sitemap
*/
?><?php get_header(); ?>
<div class="outer" id="contentwrap">
	<div class="postcont">
		<div id="content">	

			<div class="sitemap-xml">
			    
			            <span>
			                <h2>Pages</h2>
			                <ul>
			                    <?php wp_list_pages('title_li='); ?>
			                </ul>
			            </span>
			            
			            <span>
			                <h2>Categories</h2>
			                <ul>
			                    <?php wp_list_categories('title_li='); ?>
			                </ul>
</span>			            
			            <span>
			                <h2>Archives</h2>
			                <ul>
			                    <?php wp_get_archives('type=monthly&show_post_count=0'); ?>
			                </ul>
</span>			        
			        
			            <span class="post-cat"><h2>Posts by Category</h2>
			            
			            <?php
				    
				            $cats = get_categories();
				            foreach ( $cats as $cat ) {
				    
				            query_posts( 'cat=' . $cat->cat_ID );
				
				        ?>
			    
			    			<h3><?php echo $cat->cat_name; ?></h3>
				        	<ul>	
				        	    <?php while ( have_posts() ) { the_post(); ?>
			    	    	    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			        		    <?php } wp_reset_query(); ?>
				        	</ul>
			
					    <?php } ?></span>
			            
			        
			    </div></div></div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>