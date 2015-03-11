<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package chestnut_theme
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function chestnut_theme_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'chestnut_theme_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function chestnut_theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'chestnut_theme_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function chestnut_theme_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'chestnut_theme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'chestnut_theme_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function chestnut_theme_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'chestnut_theme_setup_author' );

//bxSlider Callback for do action
function chestnut_bxslidercb(){
		global $post;
		$chestnut_theme = of_get_option('parallax_section');
		if(!empty($chestnut_theme)) :
			$chestnut_theme_first_page_array = array_slice($chestnut_theme, 0, 1);
			$chestnut_theme_first_page = sanitize_title(get_the_title($chestnut_theme_first_page_array[0]['page']));
		endif;
		$chestnut_slider_category = of_get_option('slider_category');
		$chestnut_slider_full_window = of_get_option('slider_full_window') ;
		$chestnut_show_slider = of_get_option('show_slider') ;
		$chestnut_show_pager = (!of_get_option('show_pager') || of_get_option('show_pager') == "yes") ? "true" : "false";
		$chestnut_show_controls = (!of_get_option('show_controls') || of_get_option('show_controls') == "yes") ? "true" : "false";
		$chestnut_auto_transition = (!of_get_option('auto_transition') || of_get_option('auto_transition') == "yes") ? "true" : "false";
		$chestnut_slider_transition = (!of_get_option('slider_transition')) ? "fade" : of_get_option('slider_transition');
		$chestnut_slider_speed = (!of_get_option('slider_speed')) ? "5000" : of_get_option('slider_speed');
		$chestnut_slider_pause = (!of_get_option('slider_pause')) ? "5000" : of_get_option('slider_pause');
		$chestnut_show_caption = of_get_option('show_caption') ;
		$chestnut_enable_parallax = of_get_option('enable_parallax');
		?>

		<?php if( $chestnut_show_slider == "yes" || empty($chestnut_show_slider)) : ?>
		<section id="main-slider" class="full-screen-<?php echo $chestnut_slider_full_window; ?>">
		
		<div class="overlay"></div>

		<?php if(!empty($chestnut_theme_first_page)): ?>
		<div class="next-page"><a href="#<?php echo $chestnut_theme_first_page; ?>"></a></div>
		<?php endif; ?>

 		<script type="text/javascript">
            jQuery(function($){
				$('#main-slider .bx-slider').bxSlider({
					adaptiveHeight: true,
					pager: <?php echo $chestnut_show_pager; ?>,
					controls: <?php echo $chestnut_show_controls; ?>,
					mode: '<?php echo $chestnut_slider_transition; ?>',
					auto : '<?php echo $chestnut_auto_transition; ?>',
					pause: '<?php echo $chestnut_slider_pause; ?>',
					speed: '<?php echo $chestnut_slider_speed; ?>'
				});

				<?php if($chestnut_slider_full_window == "yes" && !empty($chestnut_slider_category)) : ?>
				$(window).resize(function(){
					var winHeight = $(window).height();
					var headerHeight = $('#masthead').outerHeight();
					$('#main-slider .bx-viewport , #main-slider .slides').height(winHeight-headerHeight);
				}).resize();
				<?php endif; ?>
				
			});
        </script>
        <?php
		if( !empty($chestnut_slider_category)) :

				$loop = new WP_Query(array(
						'cat' => $chestnut_slider_category,
						'posts_per_page' => -1
					));
					if($loop->have_posts()) : ?>

					<div class="bx-slider">
					<?php
					while($loop->have_posts()) : $loop-> the_post(); 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); 
					$image_url = "";
					if($chestnut_slider_full_window == "yes") : 
						$image_url =  "style = 'background-image:url(".$image[0].");'";
				    endif;
					?>
					<div class="slides" <?php echo $image_url; ?>>
					
					<?php if($chestnut_slider_full_window == "no") : ?>		
						<img src="<?php echo $image[0]; ?>">
					<?php endif; ?>
								
						<?php if($chestnut_show_caption == 'yes'): ?>
						<div class="slider-caption">
							<div class="mid-content">
								<h1 class="caption-title"><?php the_title();?></h1>
								<h2 class="caption-description"><?php the_content();?></h2>
							</div>
						</div>
						<?php endif; ?>
				
			        </div>
					<?php endwhile; ?>
					</div>
					<?php endif; ?>	

        <?php else: ?>

            <div class="bx-slider">
				<div class="slides">
					<img src="<?php echo get_template_directory_uri(); ?>/images/demo/slider1.jpg" alt="slider1">
					<div class="slider-caption">
						<div class="mid-content">
							<h1 class="caption-title">Welcome to AccessPress Parallax!</h1>
							<h2 class="caption-description">
							<p>A full featured parallax theme – and its absolutely free!</p>
							<p><a href="#">Read More</a></p>
							</h2>
						</div>
					</div>
				</div>
						
				<div class="slides">
					<img src="<?php echo get_template_directory_uri(); ?>/images/demo/slider2.jpg" alt="slider2">
					<div class="slider-caption">
						<div class="ak-container">
							<h1 class="caption-title">Amazing multi-purpose parallax theme</h1>
							<h2 class="caption-description">
							<p>Travel, corporate, small biz, portfolio, agencies, photography, health, creative – useful for anyone and everyone</p>
							<p><a href="#">Read More</a></p>
							</h2>
							</div>
					</div>
				</div>
			</div>
			<?php  endif; ?>
		</section>
		<?php endif; ?>
<?php
}

add_action('chestnut_bxslider','chestnut_bxslidercb', 10);

//add class for parallax
function chestnut_is_parallax($class){
	$is_parallax = of_get_option('enable_parallax');
	if($is_parallax=='1'):
		$class[] = "parallax-on"; 
	endif;
	return $class;
}

add_filter('body_class','chestnut_is_parallax');


//Dynamic styles on header
function chestnut_header_styles_scripts(){
	$favicon = of_get_option('fav_icon');
	$custom_css = of_get_option('custom_css');
	$custom_js = of_get_option('custom_js');
	$image_url = get_template_directory_uri()."/images/";
	echo "<link type='image/png' rel='icon' href='".$favicon."'/>\n";
	echo "<style type='text/css' media='all'>"; 
	echo $custom_css;

	echo "</style>\n"; 

	echo "<script>\n";
	if(of_get_option('enable_animation') == '1' && is_front_page()) : ?>
    jQuery(document).ready(function($){
       wow = new WOW(
        {
          offset:  200 
        }
      )
      wow.init();
    });
    <?php endif;
	echo $custom_js;
	echo "</script>\n";
}

add_action('wp_head','chestnut_header_styles_scripts');

function chestnut_footer_count(){
	$count = 0;
	if(is_active_sidebar('footer-1'))
	$count++;

	if(is_active_sidebar('footer-2'))
	$count++;

	if(is_active_sidebar('footer-3'))
	$count++;

	if(is_active_sidebar('footer-4'))
	$count++;

	return $count;
}


function chestnut_social_cb(){
	$facebooklink = of_get_option('facebook');
	$twitterlink = of_get_option('twitter');
	$google_pluslink = of_get_option('google_plus');
	$youtubelink = of_get_option('youtube');
	$pinterestlink = of_get_option('pinterest');
	$linkedinlink = of_get_option('linkedin');
	$flickrlink = of_get_option('flickr');
	$vimeolink = of_get_option('vimeo');
	$instagramlink = of_get_option('instagram');
	$skypelink = of_get_option('skype');
	?>
	<div class="social-icons">
		<?php if(!empty($facebooklink)){ ?>
		<a href="<?php echo of_get_option('facebook'); ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($twitterlink)){ ?>
		<a href="<?php echo of_get_option('twitter'); ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($google_pluslink)){ ?>
		<a href="<?php echo of_get_option('google_plus'); ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($youtubelink)){ ?>
		<a href="<?php echo of_get_option('youtube'); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($pinterestlink)){ ?>
		<a href="<?php echo of_get_option('pinterest'); ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($linkedinlink)){ ?>
		<a href="<?php echo of_get_option('linkedin'); ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($flickrlink)){ ?>
		<a href="<?php echo of_get_option('flickr'); ?>" class="flickr" data-title="Flickr" target="_blank"><i class="fa fa-flickr"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($vimeolink)){ ?>
		<a href="<?php echo of_get_option('vimeo'); ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($instagramlink)){ ?>
		<a href="<?php echo of_get_option('instagram'); ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($skypelink)){ ?>
		<a href="<?php echo "skype:".of_get_option('skype') ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i><span></span></a>
		<?php } ?>
	</div>

	<script>
	jQuery(document).ready(function($){
		$(window).resize(function(){
			 var socialHeight = $('.social-icons').outerHeight();
			 $('.social-icons').css('margin-top',-(socialHeight/2));
		}).resize();
	});
	</script>
<?php
}
add_action('chestnut_social','chestnut_social_cb', 10);

function chestnut_remove_page_menu_div( $menu ){
    return preg_replace( array( '#^<div[^>]*>#', '#</div>$#' ), '', $menu );
}
add_filter( 'wp_page_menu', 'chestnut_remove_page_menu_div' );

function chestnut_customize_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'chestnut_customize_excerpt_more');

function chestnut_word_count($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

function chestnut_letter_count($content, $limit) {
	$striped_content = strip_tags($content);
	$striped_content = strip_shortcodes($striped_content);
	$limit_content = mb_substr($striped_content, 0 , $limit );

	if($limit_content < $content){
		$limit_content .= "..."; 
	}
	return $limit_content;
}
add_filter('widget_text', 'do_shortcode');

/********************
*                   *
* CONTENT FUNCTIONS *
*                   *
*********************/

//create table of contents
function generate_contents(){

	function pa_category_top_parent_id( $catid ) {
    	while( $catid ) {
       		$cat = get_category( $catid ); // get the object for the catid
        	$catid = $cat->category_parent; // assign parent ID (if exists) to $catid
       		// the while loop will continue whilst there is a $catid
        	// when there is no longer a parent $catid will be NULL so we can assign our $catParent
        	$catParent = $cat->cat_ID;
    	}
    	return $catParent;
	}

	//get the parent id (chapter name)
 	$categories = get_the_category();
	$parent_id = $categories[0]->category_parent;

	//get the grandparent id (course name)
	$grandparent_id = pa_category_top_parent_id( $parent_id );

	$args = array(
		'orderby'            => 'slug',
		'order'              => 'ASC',
		'style'              => 'list',
		'show_count'         => 0,
		'hide_empty'         => 0,
		'use_desc_for_title' => 1,
		'child_of'           => $grandparent_id,
		'hierarchical'       => 1,
		'title_li'           => '',
		'show_option_none'   => __( 'This course is empty.' ),
		'number'             => null,
		'echo'               => 1,
    );
    wp_list_categories( $args ); 
}

// create course list
function list_courses(){

	$args = array(
		'orderby'            => 'name',
		'order'              => 'ASC',
		'style'              => 'list',
		'show_count'         => 0,
		'hide_empty'         => 1,
		'use_desc_for_title' => 1,
		'child_of'           => '',
		'hierarchical'       => 0,
		'depth'				 => 1,
		'title_li'           => '',
		'show_option_none'   => __( 'This course is empty.' ),
		'number'             => null,
		'echo'               => 1,
    );
    wp_list_categories( $args ); 
}

// loads portfolio of course thumnails on landing page
function create_portfolio(){

	// query to get posts
	$the_query = new WP_Query( 'category_name=Library' );

	// loop to create portfolio
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$post_id = get_the_id();
			$theauthor = get_post_meta($post_id, 'Presenter', true);
			$theID = get_post_meta($post_id, 'CourseID', true);
			echo "<a href=/".$theID." class='portfolio-list'>";
			echo "<div class='portfolio-list center-this'>";
				echo "<div class='portfolio-overlay'><span>+</span></div>";
				echo "<div class='portfolio-image'>";
					echo the_post_thumbnail();
				echo "</div>";
				echo "<h3>".get_the_title()."</h3>";
			echo "</div>";
			echo "</a>";
		}
	} else {
		echo "";
		// no posts found
	}
	wp_reset_postdata();
}

function force_login() {
	global $post;
	if (!is_single()) return;
	if (in_category( 'courseItem' )) {
		auth_redirect();
	}
}


/***************************
*                          *
* END OF CONTENT FUNCTIONS *
*                          *
****************************/