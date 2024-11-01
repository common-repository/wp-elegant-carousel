<?php
/*
Plugin Name: WP-Elegant Carousel
Plugin URI: http://nonstopit.pl
Description: This plugin is based on a Elegant Carousel
Version: 1.0
Author: Wojciech Radzioch
Author URI: http://nonstopit.pl, wojtkuju@o2.pl
License: This plugin is licensed under the GNU General Public License.
*/

function elegant_carousel_head() {

	$delay = get_option('delay');
	$fade = get_option('fade');
	$slide = get_option('slide');
	$effect = get_option('effect');
	$captionFade = get_option('captionFade');
	$loop = get_option('loop');
	$autoplay = get_option('autoplay');
	$time = get_option('time');
	$stopAutoplay = get_option('stopAutoplay');
 ?>

<script type="text/javascript">
		jQuery.noConflict();
		jQuery(document).ready(function() {
			
			jQuery('.carousel').elegantcarousel({
					delay: <?php echo $delay; ?>,
					fade: <?php echo $fade; ?>,
					slide: <?php echo $slide; ?>,
					effect:'<?php echo $effect; ?>',		  			//  fade, slide			  
					orientation:'horizontal',		//	horizontal, vertical
					captionFade: <?php echo $captionFade; ?>,
					loop: <?php echo $loop; ?>,					//	false, true
					autoplay: <?php echo $autoplay; ?>,					// 	false, true
					time: <?php echo $time; ?>,
					stopAutoplay: <?php echo $stopAutoplay; ?>
			});
		});
		
		
	</script>

<?php }

add_action('wp_head', 'elegant_carousel_head');

function add_elegant_scripts() {
$scripturl = WP_PLUGIN_URL .'/wp-elegant-carousel/js/';



wp_register_script('easing', $scripturl.'jquery.easing.1.3.js', '', '1.3');
wp_enqueue_script('easing');
wp_register_script('elegant', $scripturl.'jquery.elegantcarousel.min.js', '', '1.0');
wp_enqueue_script('elegant');

}

function add_elegant_styles() {
$elegant_style = WP_PLUGIN_URL .'/wp-elegant-carousel/css/default.css';

wp_register_style('elegant_style', $elegant_style, '', '1.0');
wp_enqueue_style('elegant_style');

}

add_action('wp_print_styles','add_elegant_styles');
add_action('wp_print_scripts','add_elegant_scripts');

function register_custom_menu_page() {
add_menu_page('Elegant Carousel', 'Elegant Carousel', 0, 'elegant', 'images_elegant');
add_submenu_page('elegant', 'Settings', 'Settings', 9, 'settings', 'settings_elegant');

}

add_action('admin_menu', 'register_custom_menu_page');








function elegant_carousel() {
$activation = get_option('activation');
$featcat = get_option('featcat');

	$sImg1 = get_option('sImg1');
	$sImg2 = get_option('sImg2');
	$sImg3 = get_option('sImg3');
	$sImg4 = get_option('sImg4');
	$sImg5 = get_option('sImg5');
	$sImg6 = get_option('sImg6');
	$sImg7 = get_option('sImg7');
	$sImg8 = get_option('sImg8');
	$sImg9 = get_option('sImg9');
	$sImg10 = get_option('sImg10');
	
	$sImglink1 = get_option('sImglink1');
	$sImglink2 = get_option('sImglink2');
	$sImglink3 = get_option('sImglink3');
	$sImglink4 = get_option('sImglink4');
	$sImglink5 = get_option('sImglink5');
	$sImglink6 = get_option('sImglink6');
	$sImglink7 = get_option('sImglink7');
	$sImglink8 = get_option('sImglink8');
	$sImglink9 = get_option('sImglink9');
	$sImglink10 = get_option('sImglink10');



if ($activation == 'enable') {

 
  ?>
<div id="main">
    	<div class="inner">
        	<div class="example horizontal">
            	<div id="carousel-1" class="carousel">
                	<a class="carousel_prev carousel_left" href="" rel="carousel-1">prev</a>
                	<div class="carousel_container">
                        <ul class="portfolio_items">
						<?php if (get_option('source') == 'featured') {
						query_posts('showposts=6&cat='.$featcat.'&orderby=date');
						while (have_posts()) : the_post(); ?>
                            <li><div class="inner"><div style="float:left;height:140px;width:220px"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( array(220,140) ); ?></a></div>
							<div style="float:left;width:200px"><a href="<?php the_permalink() ?>"><h5 style="text-align: center;background:transparent">Title</h5></a></div>
							
							<?php endwhile;?>
							
							</div>
							</li>
							
                        <?php
						
						} 
						if (get_option('source') == 'custom') {
  
	?>
		<li><div class="inner"><?php echo '<a href="'. $sImglink1 .'">'; ?><img src="<?php echo $sImg1; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink2 .'">'; ?><img src="<?php echo $sImg2; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink3 .'">'; ?><img src="<?php echo $sImg3; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink4 .'">'; ?><img src="<?php echo $sImg4; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink5 .'">'; ?><img src="<?php echo $sImg5; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink6 .'">'; ?><img src="<?php echo $sImg6; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink7 .'">'; ?><img src="<?php echo $sImg7; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink8 .'">'; ?><img src="<?php echo $sImg8; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink9 .'">'; ?><img src="<?php echo $sImg9; ?>" /></a></div></li>
		<li><div class="inner"><?php echo '<a href="'. $sImglink10 .'">'; ?><img src="<?php echo $sImg10; ?>" /></a></div></li>
									
			<?php } ?>	                                 
                                    
                        </ul>
                	</div>
                    <a class="carousel_next carousel_right" href="" rel="carousel-1">next</a>
                </div>
            </div>
        </div>
</div>


<?php 




}}

function set_elegant_options() {
  add_option('sImg1','','');
	add_option('sImg2','','');
	add_option('sImg3','','');
	add_option('sImg4','','');
	add_option('sImg5','','');
	add_option('sImg6','','');
	add_option('sImg7','','');
	add_option('sImg8','','');
	add_option('sImg9','','');
	add_option('sImg10','','');
	add_option('sImglink1','','');
	add_option('sImglink2','','');
	add_option('sImglink3','','');
	add_option('sImglink4','','');
	add_option('sImglink5','','');
	add_option('sImglink6','','');
	add_option('sImglink7','','');
	add_option('sImglink8','','');
	add_option('sImglink9','','');
	add_option('sImglink10','','');
	add_option('activation','enable','');
	add_option('jquery','true','');
	add_option('source','custom','');
	add_option('featcat','','');
	add_option('delay','150','');
	add_option('fade','300','');
	add_option('slide','500','');
	add_option('effect','slide','');
	add_option('captionFade','150','');
	add_option('loop','true','');
	add_option('autoplay','true','');
	add_option('time','4000','');
	add_option('stopAutoplay','false','');
	}

function unset_elegant_options() {
	delete_option('sImg1');
	delete_option('sImg2');
	delete_option('sImg3');
	delete_option('sImg4');
	delete_option('sImg5');
	delete_option('sImg6');
	delete_option('sImg7');
	delete_option('sImg8');
	delete_option('sImg9');
	delete_option('sImg10');
	delete_option('sImglink1');
	delete_option('sImglink2');
	delete_option('sImglink3');
	delete_option('sImglink4');
	delete_option('sImglink5');
	delete_option('sImglink6');
	delete_option('sImglink7');
	delete_option('sImglink8');
	delete_option('sImglink9');
	delete_option('sImglink10');
	delete_option('activation');
	delete_option('jquery');
	delete_option('source');
	delete_option('featcat');
	delete_option('delay');
	delete_option('fade');
	delete_option('slide');
	delete_option('effect');
	delete_option('captionFade');
	delete_option('loop');
	delete_option('autoplay');
	delete_option('time');
	delete_option('stopAutoplay');
}

register_activation_hook(__FILE__,'set_elegant_options');
register_uninstall_hook(__FILE__,'unset_elegant_options');






function images_elegant() {
	if ('process' == $_POST['options']) {
	
	update_option('sImg1',$_POST['sImg1']);
	update_option('sImg2',$_POST['sImg2']);
	update_option('sImg3',$_POST['sImg3']);
	update_option('sImg4',$_POST['sImg4']);
	update_option('sImg5',$_POST['sImg5']);
	update_option('sImg6',$_POST['sImg6']);
	update_option('sImg7',$_POST['sImg7']);
	update_option('sImg8',$_POST['sImg8']);
	update_option('sImg9',$_POST['sImg9']);
	update_option('sImg10',$_POST['sImg10']);
	
	update_option('sImglink1',$_POST['sImglink1']);
	update_option('sImglink2',$_POST['sImglink2']);
	update_option('sImglink3',$_POST['sImglink3']);
	update_option('sImglink4',$_POST['sImglink4']);
	update_option('sImglink5',$_POST['sImglink5']);
	update_option('sImglink6',$_POST['sImglink6']);
	update_option('sImglink7',$_POST['sImglink7']);
	update_option('sImglink8',$_POST['sImglink8']);
	update_option('sImglink9',$_POST['sImglink9']);
	update_option('sImglink10',$_POST['sImglink10']);
	
	echo '<div id="message" class="updated" style="width:750px;"><p><strong>Elegant Carousel images Updated.</strong></p></div>';
}

	$sImg1 = get_option('sImg1');
	$sImg2 = get_option('sImg2');
	$sImg3 = get_option('sImg3');
	$sImg4 = get_option('sImg4');
	$sImg5 = get_option('sImg5');
	$sImg6 = get_option('sImg6');
	$sImg7 = get_option('sImg7');
	$sImg8 = get_option('sImg8');
	$sImg9 = get_option('sImg9');
	$sImg10 = get_option('sImg10');
	
	$sImglink1 = get_option('sImglink1');
	$sImglink2 = get_option('sImglink2');
	$sImglink3 = get_option('sImglink3');
	$sImglink4 = get_option('sImglink4');
	$sImglink5 = get_option('sImglink5');
	$sImglink6 = get_option('sImglink6');
	$sImglink7 = get_option('sImglink7');
	$sImglink8 = get_option('sImglink8');
	$sImglink9 = get_option('sImglink9');
	$sImglink10 = get_option('sImglink10'); ?>
	<div class="wrap"><div id="icon-edit" class="icon32"></div><h2>Elegant Carousel</h2>
	
	
	<div class="metabox-holder" style="width:810px;margin-bottom:10px">
	
	<form method="post" action="">
	<input type="hidden" name="options" value="process" />
	<input type="submit" class="button-primary" name="submit" value="Save Changes" style="" />
	<div style="display:inline;font-style:italic;font-size:11px;padding-left:10px;"><b>Important:</b> Click 'save changes' after every image you 'insert into post'. </div>
	</div>
	
	
	<div class="metabox-holder" style="width:402px;float:left;"><div class="postbox"><h3><span>Image 1:</span></h3>
	<?php if($sImg1) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg1.'" style="margin:0 10px;width:380px;height:200px" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" name="sImg1" value="<?php echo stripslashes($sImg1); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
	<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink1" value="<?php echo stripslashes($sImglink1); ?>" style="width: 380px;margin:10px;margin-top:0px;"/>
	</div>
	
		<div class="postbox"><h3><span>Image 2:</span></h3>
		<?php if($sImg2) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg2.'" style="width:380px;margin:0 10px;"  />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" name="sImg2" value="<?php echo stripslashes($sImg2); ?>" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink2" value="<?php echo stripslashes($sImglink2); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
    </div>
	
		<div class="postbox"><h3><span>Image 3:</span></h3>
		<?php if($sImg3) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg3.'" style="width:380px;margin:0 10px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" name="sImg3" value="<?php echo stripslashes($sImg3); ?>" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink3" value="<?php echo stripslashes($sImglink3); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
    </div>
	
		<div class="postbox"><h3><span>Image 4:</span></h3>
		<?php if($sImg4) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg4.'" style="width:380px;margin:0 10px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text"  name="sImg4" value="<?php echo stripslashes($sImg4); ?>" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink4" value="<?php echo stripslashes($sImglink4); ?>" style="width: 380px;margin:10px;margin-top:0px;"/>
    </div>

		<div class="postbox"><h3><span>Image 5:</span></h3>
		<?php if($sImg5) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg5.'" style="width:380px;margin:0 10px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text"  name="sImg5" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink5" value="<?php echo stripslashes($sImglink5); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
    </div></div>

		<div class="metabox-holder" style="width:402px;float:left;margin-left:10px;">
		<div class="postbox"><h3><span>Image 6:</span></h3>
		<?php if($sImg6) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg6.'" style="width:380px;margin:0 10px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text"  name="sImg6" value="<?php echo stripslashes($sImg6); ?>" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink6" value="<?php echo stripslashes($sImglink6); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
    </div>

		<div class="postbox"><h3><span>Image 7:</span></h3>
		<?php if($sImg7) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg7.'" style="width:380px;margin:0 10px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text"  name="sImg7" value="<?php echo stripslashes($sImg7); ?>" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink7" value="<?php echo stripslashes($sImglink7); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
    </div>

		<div class="postbox"><h3><span>Image 8:</span></h3>
		<?php if($sImg8) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg8.'" style="width:380px;margin:0 10px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text"  name="sImg8" value="<?php echo stripslashes($sImg8); ?>" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink8" value="<?php echo stripslashes($sImglink8); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
    </div>

		<div class="postbox"><h3><span>Image 9:</span></h3>
		<?php if($sImg9) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg9.'" style="width:380px;margin:0 10px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text"  name="sImg9" value="<?php echo stripslashes($sImg9); ?>" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink9" value="<?php echo stripslashes($sImglink9); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
    </div>
	
		<div class="postbox"><h3><span>Image 10:</span></h3>
		<?php if($sImg10) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$sImg10.'" style="width:380px;margin:0 10px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text"  name="sImg10" value="<?php echo stripslashes($sImg10); ?>" style="width: 380px;margin:10px;margin-top:0px;" />
		<h4 style="margin:10px;">Image Link:</h4><input type="text" name="sImglink10" value="<?php echo stripslashes($sImglink10); ?>"  style="width: 380px;margin:10px;margin-top:0px;"/>
    </div></div>
	</form>
	
	</div>

<?php } 






function settings_elegant(){ 
	
	if ('process' == $_POST['options']) {
	update_option('activation',$_POST['activation']);
	update_option('jquery',$_POST['jquery']);
	update_option('source',$_POST['source']);
	update_option('featcat',$_POST['featcat']);
	update_option('delay',$_POST['delay']);
	update_option('fade',$_POST['fade']);
	update_option('slide',$_POST['slide']);
	update_option('effect',$_POST['effect']);
	update_option('captionFade',$_POST['captionFade']);
	update_option('loop',$_POST['loop']);
	update_option('autoplay',$_POST['autoplay']);
	update_option('time',$_POST['time']);
	update_option('stopAutoplay',$_POST['stopAutoplay']);
	echo '<div id="message" class="updated" style="width:750px;"><p><strong>Slider Options Updated.</strong></p></div>';
	
	}
	
	$activation = get_option('activation');
	$jquery = get_option('jquery');
	$source = get_option('source');
	$featcat = get_option('featcat');
	$delay = get_option('delay');
	$fade = get_option('fade');
	$slide = get_option('slide');
	$effect = get_option('effect');
	$captionFade = get_option('captionFade');
	$loop = get_option('loop');
	$autoplay = get_option('autoplay');
	$time = get_option('time');
	$stopAutoplay = get_option('stopAutoplay');

 ?>
	<div class="wrap"><div id="icon-options-general" class="icon32"></div><h2>Elegant Carousel</h2>
	
	
	<div class="metabox-holder" style="width:810px;margin-bottom:10px">
	
	<form method="post" action="">
	<input type="hidden" name="options" value="process" />
	<input type="submit" class="button-primary" name="submit" value="Save Changes" style="margin-bottom:20px" />
	<div style="display:inline;font-style:italic;font-size:11px;padding-left:10px;"><b>Important:</b> Click 'save changes' after every image you 'insert into post'. </div>
	
	<div class="postbox">

		<table class="form-table" style="margin:0;">
		<tr valign="top"><td style="padding:0;width:180px;"><h3>Name</h3></td><td style="padding:0;width:130px;"><h3>Value</h3></td><td style="padding:0;"><h3>Description</h3></td></tr>


		<tr valign="top" style="border-bottom:1px solid #ccc;">
		<td  style="padding:5px 0;">
		<label for="activation" style="padding:10px;font-weight:bold;">Activate Plugin</label>
		</td>
		<td style="padding:5px 0;">
				<?php if($activation == 'enable') { ?>
				<input type="radio" checked="checked" value="enable" name="activation">Enable
				<br />
				<input type="radio" value="disable" name="activation">Disable
				<?php } else { ?>
				<input type="radio" value="enable" name="activation">Enable
				<br />
				<input type="radio" checked="checked" value="disable" name="activation">Disable
				<?php } ?>
		</td>
		<td  style="margin:5px 0;">
		 <p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">
		Enable or disable the elegant carousel.
		</p>
		</td>
		</tr>
		
		

	  
	  <tr valign="top" style="border-bottom:1px solid #ccc;"><td  style="padding:5px 0;"><label for="source" style="padding:10px;font-weight:bold;">Get Images From?</label>      </td>
      <td  style="padding:5px 0;margin-left:5px;"><select name="source" style="width:235px;">
          <option value="featured" <?php selected('featured', get_option('source')); ?>>Custom Fields (Selected Category)</option>
          <option value="custom" <?php selected('custom', get_option('source')); ?>>Custom Images</option>
        </select>
      </td>	
      <td  style="padding:5px 0;">
      <p style="margin:0;margin-left:20px;font-style:italic;font-size:11px;">
      Here you can select the source from which the images are displayed. </p><p style="margin:0;margin-left:20px;font-style:italic;font-size:11px;">Select 'Custom Fields' if you wish to get the images from custom fields. To do so, enter 'easing' under name field & and the URL of the chosen image under the value field. </p><p style="margin:0;margin-left:20px;font-style:italic;font-size:11px;"> Otherwise, you can choose to display 'custom' images. These images can be uploaded in the 'Custom Images' section where you can specify links to images from the Media Library or elsewhere. </p><p style="margin:0;margin-left:20px;font-style:italic;font-size:11px;">By default, this option is set to 'Custom Fields (Selected Category)'.
      </p>
      </td>
      </tr>
	  
	  
	   <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="featcat" style="padding:10px;font-weight:bold;">Selected Category:</label></td>
      <td  style="padding:5px 0;"><style type="text/css">.cat_select{width:235px;};</style>
        <?php wp_dropdown_categories(array('hide_empty' => 0, 'class' => 'cat_select', 'name' => 'featcat', 'orderby' => 'name', 'selected' => get_option('featcat'), 'hierarchical' => true,));?>
      </td>
      <td style="padding:5px 0;">
      <p style="margin:0;margin-left:20px;font-style:italic;font-size:11px;">
      Here you can select which categorie's post thumbnails you wish to display if you have selected the 'Post thumbnails (Selected Category)' option above.
      </p>
      </tr>
	  
	  
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="delay" style="padding:10px;font-weight:bold;">Delay</label></td>
		<td style="padding:5px 0;margin-left:5px;"><input type="text" name="delay" value="<?php echo ($delay); ?>" style="width: 50px;" />ms</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">Set the delay of images.</p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="fade" style="padding:10px;font-weight:bold;">Fade</label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="fade" value="<?php echo ($fade); ?>" style="width: 50px;" />ms</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">Set the fade of images.</p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="slide" style="padding:10px;font-weight:bold;">Slide</label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="slide" value="<?php echo ($slide); ?>" style="width: 50px;" />ms</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">Set the slide of images.</p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="effect" style="padding:10px;font-weight:bold;">Animation style:
		<td style="padding:5px 0;margin-left:5px;"><select name="effect" style="width:110px;">
			<option style="padding-right:10px;" value="slide" <?php selected('slide', get_option('effect')); ?>>Slide</option>
			<option style="padding-right:10px;" value="fade" <?php selected('fade', get_option('effect')); ?>>Fade</option>
		</select></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">Easing effect used to transition from each image. Choose effect: slide, fade.</p></td></tr>

		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="captionFade" style="padding:10px;font-weight:bold;">captionFade</label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="captionFade" value="<?php echo ($captionFade); ?>" style="width: 50px;" />ms</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">Set the captionFade of images.</p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="loop" style="padding:10px;font-weight:bold;">Loop:
		<td style="padding:5px 0;margin-left:5px;"><select name="loop" style="width:110px;">
			<option style="padding-right:10px;" value="true" <?php selected('true', get_option('loop')); ?>>Yes</option>
			<option style="padding-right:10px;" value="false" <?php selected('false', get_option('loop')); ?>>No</option>
		</select></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">Loop carousel?</p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="autoplay" style="padding:10px;font-weight:bold;">Autoplay:
		<td style="padding:5px 0;margin-left:5px;"><select name="autoplay" style="width:110px;">
			<option style="padding-right:10px;" value="true" <?php selected('true', get_option('autoplay')); ?>>Yes</option>
			<option style="padding-right:10px;" value="false" <?php selected('false', get_option('autoplay')); ?>>No</option>
		</select></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">Autoplay carousel?</p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="time" style="padding:10px;font-weight:bold;">Time</label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="time" value="<?php echo ($time); ?>" style="width: 50px;" />ms</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">Set the time of images.</p></td></tr>
				
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="stopAutoplay" style="padding:10px;font-weight:bold;">stopAutoplay:
		<td style="padding:5px 0;margin-left:5px;"><select name="stopAutoplay" style="width:110px;">
			<option style="padding-right:10px;" value="true" <?php selected('true', get_option('stopAutoplay')); ?>>Yes</option>
			<option style="padding-right:10px;" value="false" <?php selected('false', get_option('stopAutoplay')); ?>>No</option>
		</select></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;">stopAutoplay carousel?</p></td></tr>
		
		
		
		
		</table></form></div></div>

</div>
		<?php 
		}


?>