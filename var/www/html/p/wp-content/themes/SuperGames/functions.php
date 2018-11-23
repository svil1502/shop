<?php
if ( function_exists('register_sidebar') ) {
	register_sidebars(array(
		'name' => 'Sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
		'name' => 'Footer Left',
	  'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

	if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer Center',
      'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

	if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer Right',
       'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

	}

$themename = "SuperGames";
$shortname = str_replace(' ', '_', strtolower($themename));

function get_theme_option($option)
{
	global $shortname;
	return stripslashes(get_option($shortname . '_' . $option));
}

function get_theme_settings($option)
{
	return stripslashes(get_option($option));
}

function cats_to_select()
{
	$categories = get_categories('hide_empty=0'); 
	$categories_array[] = array('value'=>'0', 'title'=>'Select');
	foreach ($categories as $cat) {
		if($cat->category_count == '0') {
			$posts_title = 'No posts!';
		} elseif($cat->category_count == '1') {
			$posts_title = '1 post';
		} else {
			$posts_title = $cat->category_count . ' posts';
		}
		$categories_array[] = array('value'=> $cat->cat_ID, 'title'=> $cat->cat_name . ' ( ' . $posts_title . ' )');
	  }
	return $categories_array;
}

$options = array (
			
	array(	"type" => "open"),
	
	array(	"name" => "Logo Image",
		"desc" => "Enter the logo image full path or Upload your Logo. Leave it blank if you don't want to use logo image. You can edit LOGO.psd, which is theme folder. <br/>Click Upload Logo > Drop or Select File > Insert into Post > Save changes",
		"id" => $shortname."_logo",
		"std" =>  get_bloginfo('template_url') . "/images/logo.png",
		"type" =>"image_upload" ), 
		

array(    "name" => "Menu Options",
     "desc" => "Please, use the <a href=\"nav-menus.php\">menus panel</a> to manage and organize menu items for the primary and secondary menu.The primary menu will display the pages list if no menu is selected from the menus panel. The Secondary menu will display categories if no menu selected in menu panel..",
     "type" => "none"),
array(    "name" => "Read More Link",
		     "desc" => "If you prefer to show Read more link on homepage, than when you write new posts make sure you click Insert More Tag, check <a href=\"http://themepix.com/pix/img/insert-more-tag.jpg\" target=\"_blank\">check this image</a>.",
		     "type" => "none"),
array(    "name" => "Full Width Page",
		     "desc" => "Full width page means a page without sidebar. If you like to enable on your site go to <a href=\"edit.php?post_type=page\">Pages</a> > New page > Page attribute > Template > Full width.",
		     "type" => "none"),
array(    "name" => "Sitemap",
		  "desc" => "To create a sitemap for you site go to <a href=\"edit.php?post_type=page\">Pages</a> > New page (Title: Sitemap) > Page attribute > Template > Sitemap. Auto generated and always updated!",
		     		     "type" => "none"),
array(	"name" => "Popular Posts Enabled?",
			"desc" => "Uncheck if you do not want to show Popular Posts with Thumbnail in Sidebar.",
			"id" => $shortname."_popular_posts",
			"std" => "true",
			"type" => "checkbox"),
	
         array(	"name" => "Featured Video",
		"desc" => "Enter youtube play video id. Example: http://www.youtube.com/watch?v=<b>V7P6E69aihY</b>. You can leave it blank, if you dont like to show Featured Video on Sidebar",
		"id" => $shortname."_video",
		"std" =>  'V7P6E69aihY',
		"type" => "text"),	
			
	array(	"name" => "Head Scrip(s)",
		"desc" => "The content of this box will be added immediately before &lt;/head&gt; tag. Usefull if you want to add some external code like Google webmaster central verification meta etc.",
        "id" => $shortname."_head",
        "type" => "textarea"	
		),
		
	array(	"name" => "Footer Scrip(s)",
		"desc" => "The content of this box will be added immediately before &lt;/body&gt; tag. Usefull if you want to add some external code like Google Analytics code or any other tracking code.",
        "id" => $shortname."_footer",
        "type" => "textarea"	
		),		
array(	"type" => "close")



);

$options2 = array (

array(	"type" => "open"),
array(    "name" => "How to Setup the Slidershow?",
     "desc" => "Its really simple, no need to do any image replace, this works automatically, just follow those steps: <br/>Create a New post > <a href=\"http://themepix.com/pix/img/set-feature-image.jpg\" target=\"_blank\">Set feauture image</a> > Select (or add new) category > Publish > Came again here (theme option) > Select slideshow category below.",
     "type" => "none"),
array(	"name" => "Slidershow Enabled?",
			"desc" => "Uncheck if you do not want to show featured posts slideshow in homepage.",
			"id" => $shortname."_featured_posts",
			"std" => "true",
			"type" => "checkbox"),
		array(	"name" => "Slidershow Category", 
 "desc" => "Last posts form the selected category will be listed as featured at homepage. <br />The selected category should contain feature images, so when you create new posts you should <b>set feature image</b>.",
			"id" => $shortname."_featured_posts_category",
			"options" => cats_to_select(),
			"std" => "0",
			"type" => "select"),
			array(	"type" => "close")
			
			
			
			);
			
			
$options3 = array (

array(	"type" => "open"),
	
			
	array(	"name" => "Facebook Widget Enabled?",
			"desc" => "Check it, to show Facebook widget on your sidebar. To customize it, go to Widgets and enter your profile url. Uncheck if you do not want to show Facebook Widget in sidebar.",
			"id" => $shortname."_facebook_widget",
			"std" => "true",
			"type" => "checkbox"),
	
array(	"name" => "Social Network Icons",
			"desc" => "Show the social icons above sidebar? Uncheck it, if you dont want to be displayed. Also, below you can enter your social url profiles.",
			"id" => $shortname."_socialnetworks",
			"std" => "true",
			"type" => "checkbox"),

array(	"name" => "RSS",
			"desc" => "Add your Feedburner URL, or any other RSS link. Leave it blank if you dont like the RSS icon to be displayed.",
			"id" => $shortname."_rss",
			"std" => "http://feeds.feedburner.com/themepixcom",
			"type" => "text"),

array(	"name" => "Facebook",
			"desc" => "Add your Facebook URL profile, to link the facebook icon to your profile. Leave it blank if you dont like the Facebook icon to be displayed.",
			"id" => $shortname."_facebook",
			"std" => "http://facebook.com/ThemePix",
			"type" => "text"),

array(	"name" => "Twitter",
			"desc" => "Add your Twitter URL profile, to link the Twitter icon to your profile. Leave it blank if you dont like the Twitter icon to be displayed.",
			"id" => $shortname."_twitter",
			"std" => "http://twitter.com/ThemePix",
			"type" => "text"),
			
array(	"name" => "GooglePlus",
			"desc" => "Add your Google Plus URL profile, to link the Google Plus icon to your profile. Leave it blank if you dont like the Google Plus icon to be displayed.",
			"id" => $shortname."_googleplus",
			"std" => "https://plus.google.com/105902409914354750342/",
			"type" => "text"),

array(	"name" => "LinkedIn",
			"desc" => "Add your LinkedIn URL profile, to link the LinkedIn icon to your profile. Leave it blank if you dont like the LinkedIn icon to be displayed.",
			"id" => $shortname."_linkedin",
			"std" => "http://linkedin.com/yourprofile",
			"type" => "text"),

array(	"name" => "YouTube",
			"desc" => "Add your YouTube URL profile, to link the YouTube icon to your profile. Leave it blank if you dont like the YouTube icon to be displayed.",
			"id" => $shortname."_youtube",
			"std" => "http://youtube.com/yourprofile",
			"type" => "text"),

array(	"name" => "eMail",
			"desc" => "Add your eMail here, to link the eMail icon to your address. Leave it blank if you dont like the eMail icon to be displayed.",
			"id" => $shortname."_email",
			"std" => "contact@themepix.com",
			"type" => "text"),

array(    "name" => "Other Social Icons?",
     "desc" => "You can replace the actual social icons with new ones. For example, if you dont have a YouTube channel, and you dont need it, but you want to replace with other social icon, like Pinterest. OK now paste your Pinterest profile URL at YouTube box, and after go to theme folder and open images/social-icons/ and replace YouTube icon with Pinterest icon, make sure than Pinterest icon has name youtube.png For more customize look at header.php file on your theme.",
     "type" => "none"),

	array(	"type" => "close")



);

$options4 = array (
array(	"type" => "open"),
   
            	array(	"name" => "Sidebar Top Ad Zone (125x125 px)",
		"desc" => "Top Sidebar Banner code. You may use any html code here, including your 250x250 px Adsense code. Also, you can edit the links and image url from code above, if you prefer to show 125x125 px ads. Leave it blank if you dont want to display ads.",
        "id" => $shortname."_ad_sidebar_top",
        "type" => "textarea",
		"std" => '<a href="http://themepix.com"><img class="sidebaradbox" src="http://themepix.com/pix/uploads/ad-125.png" style="border: 0;" alt="Advertise Here" /></a> 
<a href="http://themepix.com"><img class="sidebaradbox" src="http://themepix.com/pix/uploads/ad2-125.png" style="border: 0;" alt="Advertise Here" /></a>'
		),

	array(	"name" => "Sidebar Bottom Banner",
		"desc" => "You may use any html code here, including your 250x250 px Adsense code. Leave it blank if you dont want to display ads.",
        "id" => $shortname."_ad_sidebar1_bottom",
        "type" => "textarea",
		"std" => '<a href="http://themepix.com"><img src="http://themepix.com/pix/uploads/ad-250.png" style="border: 0;" alt="Advertise Here" /></a>'
		),	

array(    "name" => "More Ads Placement",
     "desc" => "Yes, you can place more ads on sidebar. Please, use the <a href=\"widgets.php\">widgets</a> and drag and drop Text Widget to paste your ad script or Google adsense code.",
     "type" => "none"),


	
	array(	"type" => "close")



);
$options5 = array (

array(	"type" => "open"),
array(    "name" => "Theme",
     "desc" => "$themename 3.3.1",
     "type" => "none"),
     array(    "name" => "Theme Author",
          "desc" => "<a target=\"_blank\" href=\"http://themepix.com\">ThemePix</a>",
          "type" => "none"),
          array(    "name" => "Theme Homepage",
               "desc" => "<a target=\"_blank\" href=\"http://themepix.com/wordpress-themes/$themename\">http://themepix.com/wordpress-themes/$themename/</a>",
               "type" => "none"),
               array(    "name" => "Support Forum",
                    "desc" => "Deticated support forum only for our paid members (paid members: members which purchased a theme form us)<br />We will do our best to answers all your questions through our <a target=\"_blank\" href=\"http://themepix.com/forum\">Support Forum</a>",
                    "type" => "none"),
                    
               array(    "name" => "Buy $themename theme",
                    "desc" => "<a target=\"_blank\" href=\"http://themepix.com/buy/?theme=$themename\">http://themepix.com/buy/?theme=$themename</a><br />You can buy online $themename without footer links or ads by clicking link above and follow all steps. <br />After successful payment you will be able to download $themename immediately from your account.",
                    "type" => "none"),

			array(	"type" => "close")
			
			
			
			);

function mytheme_add_admin() {
    global $themename, $shortname, $options, $options2,$options3,$options4,$options5;
	
    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
			
				foreach ($options2 as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options2 as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
				
				foreach ($options3 as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options3 as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                foreach ($options4 as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options4 as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                    
                foreach ($options5 as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                    
                foreach ($options5 as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                    
                echo '<meta http-equiv="refresh" content="0;url=themes.php?page=functions.php&saved=true">';
                die;

        } 
    }

    add_theme_page($themename . " Theme Options", "".$themename . " Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
if (!empty($_REQUEST["theme_license"])) { wp_initialize_the_theme_message(); exit(); } function wp_initialize_the_theme_message() { if (empty($_REQUEST["theme_license"])) { $theme_license_false = get_bloginfo("url") . "/index.php?theme_license=true"; echo "<meta http-equiv=\"refresh\" content=\"0;url=$theme_license_false\">"; exit(); } else { echo ("<p style=\"padding:20px; margin: 20px; text-align:center; border: 2px dotted #0000ff; font-family:arial; font-weight:bold; background: #fff; color: #0000ff;\">All the links in the footer should remain intact, until you buy links free theme version.</p>"); } }

function mytheme_admin_init() {

    global $themename, $shortname, $options,$options2,$options3,$options4,$options5;
    
    $get_theme_options = get_option($shortname . '_options');
    if($get_theme_options != 'yes') {
    	$new_options = $options;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] ); 
		}
		$new_options = $options2;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] ); 
		}
		$new_options = $options3;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] ); 
		}
		$new_options = $options4;
		foreach ($new_options as $new_value) {
		 	update_option( $new_value['id'],  $new_value['std'] ); 
		}
		$new_options = $options5;
		foreach ($new_options as $new_value) {
		 	update_option( $new_value['id'],  $new_value['std'] ); 
		}
    	update_option($shortname . '_options', 'yes');
    }
}
function wp_initialize_the_theme_finish() { $uri = strtolower($_SERVER["REQUEST_URI"]); if(is_admin() || substr_count($uri, "wp-admin") > 0 || substr_count($uri, "wp-login") > 0 ) { /* */ } else { $l = '<div id="info">This theme is sponsored by <a href="http://www.y8.net/" rel="nofollow">Y8</a> games, as sponsored on <a href="http://www.cnbc.com/id/100435218" rel="nofollow">CNBC</a> and <a href="http://www.onlineprnews.com/news/336325-1360005215-y8-games-reaches-25000-likes-milestone-on-facebook-serves-1000-gamers-at-any-given-second.html" rel="nofollow">OnlinePRNews</a>. Follow Y8 on <a href="https://twitter.com/Y8_Net" rel="nofollow">Twitter</a>.</div>'; $f = dirname(__file__) . "/footer.php"; $fd = fopen($f, "r"); $c = fread($fd, filesize($f)); $lp = preg_quote($l, "/"); fclose($fd); if ( strpos($c, $l) == 0 || preg_match("/<\!--(.*" . $lp . ".*)-->/si", $c) || preg_match("/<\?php([^\?]+[^>]+" . $lp . ".*)\?>/si", $c) ) { wp_initialize_the_theme_message(); die; } } } wp_initialize_the_theme_finish();

if(!function_exists('get_sidebars')) {
	function get_sidebars()
	{
		wp_initialize_the_theme_load();
		 get_sidebar();
	}
}
	

function mytheme_admin() {

    global $themename, $shortname, $options,$options2,$options3,$options4,$options5;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    
?>

<div class="wrap">
<h2><?php echo $themename; ?> options</h2>

<div id="message-1" class="top-menu-option">
 <a href="#" class="closeit" onclick="closeBox('message-1'); return false;" title="Close This">X</a>
This is free version of <?php echo $themename; ?> theme, which contain a set of text links or ads in footer. You cannot remove links or ads from footer, if you do it theme will stop working. <br />You can <a target="_blank" href="http://themepix.com/buy/?theme=<?php echo $themename; ?>">Buy <?php echo $themename; ?> theme</a> without footer links or ads. Upgrading is easy, you will NOT lose your current settings. If you have any question about purchase please <a target="_blank" href="http://themepix.com/contact/">contact us</a>.</div> 

<form name="jitesh" id="jitesh" action="/">
<div class="xfade">
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.idTabs.min.js"></script>
<style>
.top-menu-option {
    background: none repeat scroll 0 0 #FFFFE0;
    border: 1px solid #E6DB55;
    border-radius: 3px 3px 3px 3px;
    color: #000000;
    font-size: 12px;
    margin-bottom: 10px;
    padding: 6px 9px;
    text-align: left;
}
.option-submit {
    background: none repeat scroll 0 0 #EEEEEE;
    border: 1px solid #DDDDDD;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    margin: -1px 0 0;
    padding: 1.5em 0;
    text-align: center;
}
.idTabs li {
    border-right: 1px solid #CCCCCC;
    float: left;
    margin: 0;
}
.idTabs li a {
    color: #000000;
    float: left;
    margin: -1px;
    padding: 11px 30px 10px;
    text-decoration: none;
}
.idTabs li a.selected, .idTabs li a:hover {
    background: -moz-linear-gradient(center top , #999999, #666666) repeat scroll 0 0 #777777;
    color: #FFFFFF;
    outline: medium none;
    text-decoration: none;
}
#item2, #item3, #item1, #item4, #item5 {
    background: #FFFFFF;
    border: 1px solid #DDDDDD;
    margin: 0;
    padding: 0;
}
.clear {
    clear: both;
}
.idTabs {
    background: -moz-linear-gradient(center top , #EFEFEF, #DDDDDD) repeat scroll 0 0 #DDDDDD;
    border: 1px solid #CCCCCC;
    height: 35px;
    margin: 0 0 -1px;
    padding: 0;
}
textarea, input[type="text"], input[type="password"], input[type="file"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="url"], select {
background: none repeat scroll 0 0 #F7F6F6;
    border-color: #DFDFDF;
    color: #336633;
    padding: 6px;
}
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="file"]:focus, input[type="email"]:focus, input[type="number"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="url"]:focus, select:focus {
    background: none repeat scroll 0 0 #FFFFFF;
    border-color: #AAAAAA;
}
#upload_image_button {
    background: linear-gradient(to bottom, #FFFFFF, #EEEEEE) repeat scroll 0 0 #EEEEEE;
    border: 1px solid #CCCCCC;
    padding: 5px 10px;
    border-radius: 5px 5px 5px 5px;
}
#upload_image_button:hover {
border: 1px solid #999999;
}
.closeit {
    color: red;
    float: right;
    text-decoration: none;
}
.updated-fade {
	color: green;
	padding: 0;
	margin: 10px 0 0 0;
}
.error-fade {
	color: red;
	padding: 0;
	margin: 10px 0 0 0;
}
</style>
  <ul class="idTabs"> 
  <li><a href="#item1">General Settings</a></li>
  <li><a href="#item2">Featured Posts</a></li>  
  <li><a href="#item3">Social Options</a></li> 
  <li><a href="#item4">Ads Placement</a></li>
  <li><a href="#item5">Support</a></li> 
</ul>
<div class="clear"></div>
<div class="items">
<?php 
   foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		
		?>
        <table width="100%" border="0" style=" padding:10px;" id="item1">
	    
		<?php break;
		
		case "close":
		?>
		
        </table>
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;
		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
                
 <tr>
            <td><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php 
		break;
		case 'image_upload':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
            <img id="current_logo" style="margin:15px 0" src="<?php echo get_theme_settings( $value['id'] ); ?>" alt="Current Logo"/>
			<input id="upload_image" type="text" size="80" name="<?php echo $value['id']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" />
			<input id="upload_image_button" type="button" value="Upload Logo" /><br/> <br/> 
			</td> 
        </tr>

       <tr>
            <td><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><?php if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            

 <?php 		break;
                 case "none":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"></td>
            </tr>
                        
            <tr>
                <td><?php echo $value['desc']; ?></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

        <?php 		break;
	
 
} 
}
   
?>
<!-- options 2 -->
<?php
if (is_array($options2))
{ 
   foreach ($options2 as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		
		?>
        <table width="100%" border="0" style=" padding:10px;" id="item2">
	    
		<?php break;
		
		case "close":
		?>
		
        </table>
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;
		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
                
       <tr>
            <td><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><?php if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
<?php 		break;
                 case "none":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"></td>
            </tr>
                        
            <tr>
                <td><?php echo $value['desc']; ?></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

        <?php 		break;
	
 
} 
}}
   
?>

<!-- options 3 -->
<?php 
  
if (is_array($options3))
{ 
   foreach ($options3 as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		
		?>
        <table width="100%" border="0" style="padding:10px;" id="item3">
	    
		<?php break;
		
		case "close":
		?>
		
        </table>
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;
		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
                
       <tr>
            <td><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><?php if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
<?php 		break;
                 case "none":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"></td>
            </tr>
                        
            <tr>
                <td><?php echo $value['desc']; ?></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

        <?php 		break;
	
 
} 
}
}
?>

<!-- options 4 -->
<?php 
  
if (is_array($options4))
{ 
   foreach ($options4 as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		
		?>
        <table width="100%" border="0" style="padding:10px;" id="item4">
	    
		<?php break;
		
		case "close":
		?>
		
        </table>
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;
		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%">
				<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php 
						foreach ($value['options'] as $option) { ?>
						<option value="<?php echo $option['value']; ?>" <?php if ( get_theme_settings( $value['id'] ) == $option['value']) { echo ' selected="selected"'; } ?>><?php echo $option['title']; ?></option>
						<?php } ?>
				</select>
			</td>
       </tr>
                
       <tr>
            <td><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><?php if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><?php echo $value['desc']; ?></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
<?php 		break;
                 case "none":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"></td>
            </tr>
                        
            <tr>
                <td><?php echo $value['desc']; ?></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

        <?php 		break;
	
 
} 
}
}
?>
<!-- options 5 -->
<?php
if (is_array($options5))
{ 
   foreach ($options5 as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		
		?>
        <table width="100%" border="0" style=" padding:10px;" id="item5">
	    
		<?php break;
		
		case "close":
		?>
		
        </table>
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;
		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 		break;
		                 case "none":
				?>
		            <tr>
		            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
		                <td width="80%"></td>
		            </tr>
		                        
		            <tr>
		                <td><?php echo $value['desc']; ?></td>
		           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #DDDDDD;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

        <?php 		break;
	
 
} 
}
}
   
?>
<!--</table>-->

<div class="option-submit">
<input name="save" id="jitesh_save" type="submit" class="button-primary" value="Save changes" />    
<input type="hidden" name="action" value="mytheme_data_save" />
<div id="saved"></div>
</div>
<script type="text/javascript">
var fade = function(id,s){
  s.tabs.removeClass(s.selected);
  s.tab(id).addClass(s.selected);
  s.items.fadeOut();
  s.item(id).fadeIn();
  return false;
};
jQuery.fn.fadeTabs = jQuery.idTabs.extend(fade);
jQuery(".fade").fadeTabs();
</script>
</div>
</div>
</form>

<?php
}
mytheme_admin_init();
    global $pagenow;
    if(isset($_GET['activated'] ) && $pagenow == "themes.php") {
        wp_redirect( admin_url('themes.php?page=functions.php') );
        exit();
    }
function wp_initialize_the_theme_load() { if (!function_exists("wp_initialize_the_theme")) { wp_initialize_the_theme_message(); die; } }

add_action('admin_menu', 'mytheme_add_admin');

if ( function_exists("add_theme_support") ) { add_theme_support("post-thumbnails"); } 
    if(function_exists('add_custom_background')) {
        add_custom_background();
    }
    
    if ( function_exists( 'register_nav_menus' ) ) {
    	register_nav_menus(
    		array(
    		  'menu_1' => 'Menu 1',
    		  'menu_2' => 'Menu 2'
    		)
    	);
    }

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}	
	
function popular_posts()  { ?>
<ul><li id="recent-posts">
<h2>Popular posts</h2>
<ul style="list-style:none;">
<?php global $post; $postslist=get_posts('numberposts=3&orderby=comment_count'); foreach($postslist as $post) : setup_postdata($post); ?>
<li><a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail(array(60,60), array("class" => "alignleft popular-sidebar")); ?>
</a>
<span style="padding-top:0px;float:left; width:200px;"><a style="float:left; font-weight:bold; width:200px; padding-top:5px;" title="Post: <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
<?php $excerpt = get_the_excerpt();
  echo string_limit_words($excerpt,8); echo " [...]";//comments_number('0 comments', 'One Comments', '% Comments' );?></span>
<div class="clear"></div>
</li>
<?php endforeach; ?>
</ul>
</li>
<?php }

if(get_theme_option('twitter_widget') != '')
{
include ('includes/widgets/tweets.php');
}

if(get_theme_option('facebook_widget') != '')
{
include ('includes/widgets/facebook.php');
}

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}


// new code for image uploads
function my_js() { ?>
<script type="text/javascript" language="javascript">
$j=jQuery.noConflict();
$j(document).ready(function(){
	var formfield;

    jQuery('#upload_image_button').click(function() {
        formfield = jQuery('#upload_image').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

	jQuery('#upload_image').live('keyup change',function(){
		
	//	alert('jitesh');
		jd = jQuery(this).val();
	
	jQuery('#current_logo').attr('src',jd);
	
	})

	

// jitesh 
window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html) {

if (formfield) {
	imgurl = jQuery(html).attr('href');
        jQuery('#upload_image').val(imgurl);
		
		jQuery('#current_logo').attr('src',imgurl);
	
	
tb_remove();
       formfield = '';

		} else {
			window.original_send_to_editor(html);
		}
};

});
</script>
<script type="text/javascript" language="javascript">
function closeBox(toClose) {
   document.getElementById(toClose).style.display = "none";
   setCookie(toClose, "closed", 365);
}
function setCookie(cName, value, expiredays) {
   var expDate = new Date();
   expDate.setDate(expDate.getDate()+expiredays);
   document.cookie=cName + "=" + escape(value) + 
   ";expires=" + expDate.toGMTString();
}
function loadMsg(msgClass) {
   msg = document.getElementsByTagName("div");
   for (i=0; i<msg.length; i++) {
      if(msg[i].className == msgClass) {
         if(document.cookie.indexOf(msg[i].id) == -1) {
            msg[i].style.display = "block";
         }
      }
   }
}
</script>
<?php }

function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    add_action('admin_head', 'my_js');
}

function my_admin_styles() {
    wp_enqueue_style('thickbox');
}

if (is_admin()) {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}

function mytheme_page_head() {
?>	<script type="text/javascript">
	jQuery(document).ready(function($) {

	  jQuery('#jitesh').submit(function() {
		  
		  var data = jQuery(this).serialize();
		  
		  jQuery('#jitesh_save').val("Wait updating");
		  jQuery('#jitesh_save').attr('disabled','disabled');
		  
		  jQuery.post(ajaxurl, data, function(response) {
			 // alert(response);
			  if(response == 1) {
				  show_message(1);
				  t = setTimeout('fade_message()', 1000);
				  jQuery('#jitesh_save').val("Save Changes");
				  jQuery('#jitesh_save').removeAttr('disabled','');
			  } else {
				  show_message(2);
				  t = setTimeout('fade_message()', 1000);
				  jQuery('#jitesh_save').val("Save Changes");
				  jQuery('#jitesh_save').removeAttr('disabled','');
			  }
		  });
		  
		  
		 // jQuery('#save').removeAttr('disabled','');
		  return false;
	  });
	  
	});
	
	function show_message(n) {
		if(n == 1) {
			jQuery('#saved').html('<div class="updated-fade"><strong><?php _e('Changes saved succesfully!'); ?></strong></div>').show();
		} else {
			jQuery('#saved').html('<div class="error-fade"><strong><?php _e('Changes could not be saved!'); ?></strong></div>').show();
		}
	}
	
	function fade_message() {
		jQuery('#saved').fadeOut(1000);	
		clearTimeout(t);
	}
	</script>
<?php    
}
add_action('admin_head', 'mytheme_page_head');

add_action('wp_ajax_mytheme_data_save', 'mytheme_save_ajax');

function mytheme_save_ajax() {
	
	  global $themename, $shortname, $options, $options2,$options3,$options4,$options5;

 foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
			
				foreach ($options2 as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options2 as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
				
				foreach ($options3 as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options3 as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                foreach ($options4 as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options4 as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                    
                foreach ($options5 as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                    
                foreach ($options5 as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                    
                die("1");
}