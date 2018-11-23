</div>
<div id="footer-widgets-outer" class="clearfix">
<div class="footer-widgets-inner">
<?php
        /**
        * Footer Widget Areas. Manage the widgets from: wp-admin > Appearance > Widgets > Footer Left (Just add your own widgest and default widgets will go away)
        */
        ?>
<ul class="footer-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ) : ?>
				<li><h2><?php _e('Recent Posts'); ?></h2>
			               <ul>
					<?php wp_get_archives('type=postbypost&limit=5'); ?>  
			               </ul>
				</li>				
		<?php endif; ?>
</ul><!-- end footer left -->
<?php
        /**
        * Footer  Widget Areas. Manage the widgets from: wp-admin > Appearance > Widgets > Footer Center (Just add your own widgest and default widgets will go away)
        */
        ?>
<ul class="footer-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Center') ) : ?>
				<li id="tag_cloud"><h2>Tags Cloud</h2>
					<?php wp_tag_cloud('largest=18&format=flat&number=20'); ?>
				</li>
<?php endif; ?>
</ul><!-- end footer central -->
<?php
        /**
        * Footer  Widget Areas. Manage the widgets from: wp-admin -> Appearance -> Widgets Footer Right (Just add your own widgest and default widgets will go away)
        */
        ?>
	<ul class="footer-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ) : ?>
				<li><h2>About Us</h2>
		Those are default Wordpress widgets, just add your own Appearance > Widgets and they will go away.<br /><br />

<strong>Our Company Address</strong><br />
New York Plaza<br />
NY 10004 <br />
Phone: (212) 543 -4322 <br />
Fax: (800) 343-2365<br />

</li>
		<?php endif; ?>
</ul><!-- end footer right -->
</div>
</div>


<div id="footer-outer">
<div id="footer">Copyright &copy; <a href="<?php bloginfo('home'); ?>"> <?php bloginfo('name'); ?> </a></div>

   <?php 
   // All links in the footer should remain intact, until you buy links free theme.
   // Warning! Your site may stop working if these links are edited or deleted  
   
   // You can buy this theme without footer links online at http://themepix.com/buy/?theme=supergames 
            
            ?>
  <div id="info">This theme is sponsored by <a href="http://www.y8.net/" rel="nofollow">Y8</a> games, as sponsored on <a href="http://www.cnbc.com/id/100435218" rel="nofollow">CNBC</a> and <a href="http://www.onlineprnews.com/news/336325-1360005215-y8-games-reaches-25000-likes-milestone-on-facebook-serves-1000-gamers-at-any-given-second.html" rel="nofollow">OnlinePRNews</a>. Follow Y8 on <a href="https://twitter.com/Y8_Net" rel="nofollow">Twitter</a>.</div>
  <div class="clear"></div>
</div></div></div>

<?php
	 wp_footer();
	echo get_theme_option("footer")  . "\n";
?>
</body>
</html>