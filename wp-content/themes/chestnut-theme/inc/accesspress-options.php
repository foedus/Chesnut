<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'chestnut_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// $settings = get_option('chestnut_theme');
	// 	$count = count($settings['parallax_section']);
	// 	update_option('chestnut_theme_count', $count );

	// Test data
	$transitions = array(
		'fade' => __('Fade', 'chestnut_theme'),
		'horizontal' => __('Slide Horizontal', 'chestnut_theme'),
		'vertical' => __('Slide Vertical', 'chestnut_theme')
	);

	$overlay = array(
		'overlay1' => __('Overlay 1', 'chestnut_theme'),
		'overlay2' => __('Overlay 2', 'chestnut_theme'),
		'overlay3' => __('Overlay 3', 'chestnut_theme'),
		'overlay4'  => __( 'Overlay 4', 'options-framework')
	);

	$section_template = array(
		'default_template' => __('Default Section', 'chestnut_theme'),
		'service_template' => __('Service Section', 'chestnut_theme'),
		'team_template' => __('Team Section', 'chestnut_theme'),
		'portfolio_template' => __('Portfolio Section', 'chestnut_theme'),
		'testimonial_template' => __('Testimonial Section', 'chestnut_theme'),
		'blog_template' => __('Blog Section', 'chestnut_theme'),
		'action_template' => __('Call to Action Section', 'chestnut_theme'),
		'googlemap_template' => __('Google Map Section', 'chestnut_theme'),
		'blank_template' => __('Blank Section', 'chestnut_theme'),
	);

	$check = array(
		'yes' => __('Yes', 'chestnut_theme'),
		'no' => __('No', 'chestnut_theme')
	);

	$test_array = array(
		'one' => __('One', 'chestnut_theme'),
		'two' => __('Two', 'chestnut_theme'),
		'three' => __('Three', 'chestnut_theme'),
		'four' => __('Four', 'chestnut_theme'),
		'five' => __('Five', 'chestnut_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'chestnut_theme'),
		'two' => __('Pancake', 'chestnut_theme'),
		'three' => __('Omelette', 'chestnut_theme'),
		'four' => __('Crepe', 'chestnut_theme'),
		'five' => __('Waffle', 'chestnut_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll',
		'size' => 'cover',
		 );

	// Parallax Defaults
	$parallax_defaults = NULL;

    $about_content = "<p>".__('AccessPress Parallax is a beautiful WordPress theme with Parallax design. Parallax design has become popular and is being adopted because 3D effects are possible with it, you can add some sphere to your product, it is the best way of storytelling, you can draw your visitors in, it is interactive, engaging, makes your visitors curious, fun, surprise, effective to trigger action, invite your visitors in great Call to Action, great conversion rates and many more. This is probably the most beautiful, feature rich and complete free WordPress parallax theme with features like: fully responsive, advance theme option panel, featured slider, advance post settings, services/team/blog/portfolio/testimonial layout, Google map integration, custom logo/fav icon, call to action, CSS animation, SEO friendly, translation ready, RTL support, custom CSS/JS and more! ')."</p>"; 
    $about_content .= "<p><a target='_blank' href='".esc_url('http://www.accesspressthemes.com/')."'>AccessPress Themes</a> ".__('- A WordPress Division of Access Keys.','chestnut_theme')."</p>"; 
    
    $about_content .= "<hr/>";
    
    $about_content .= "<h4>".__('Other products by AccessPressThemes','chestnut_theme')."</h4>";
    $about_content .=  __('Our Themes - ','chestnut_ray'). __(sprintf('<a href="%s" target="_blank">https://accesspressthemes.com/themes</a>','https://accesspressthemes.com/themes'))."<br/><br />" ;
    $about_content .= __('Our Plugins - ','chestnut_ray'). __(sprintf('<a href="%s" target="_blank">https://accesspressthemes.com/plugins</a>','https://accesspressthemes.com/plugins'))."<br/><br />" ;

    $about_content .= "<hr/>";

    $about_content .= "<h4>".__('Get in touch','chestnut_theme')."</h4>";
    $about_content .= __('If you have any question/feedback, please get in touch:','chestnut_theme')."<br /><br />";
    $about_content .= __('General enquiries:','chestnut_theme')." <a href='mailto:".esc_url('info@accesspressthemes.com')."'>info@accesspressthemes.com</a><br /><br />";
    $about_content .= __('Support:','chestnut_theme')." <a href='mailto:".esc_url('support@accesspressthemes.com')."'>support@accesspressthemes.com</a><br /><br />";
    $about_content .= __('Sales:','chestnut_theme')." <a href='mailto:".esc_url('sales@accesspressthemes.com')."'>sales@accesspressthemes.com</a><br/><br />";
    
    $about_content .= "<hr />";

	$about_content .="<h4>".__('Get social','chestnut_theme')."</h4>";

	$about_content .="<p>".__('Get connected with us on social media. Facebook is the best place to find updates on our themes/plugins:','chestnut_theme')."</p>";

    $about_content .="<p>".__('Like us on facebook:','chestnut_theme')."</p>";
	$about_content .='<iframe style="border: none; overflow: hidden; width: 740px; height: 230px;" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2Fchestnut-Themes%2F1396595907277967&amp;width=740&amp;height=230&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=1411139805828592" width="740" height="230" frameborder="0" scrolling="no"></iframe>';	


	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories[''] = 'Select a Category:';
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/options-framework/images/';

	$options = array();

	$options[] = array(
		'name' => __('General Settings', 'chestnut_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Enable Parallax', 'chestnut_theme'),
		'desc' => __('Check To enable', 'chestnut_theme'),
		'id' => 'enable_parallax',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Enable Animation on scroll', 'chestnut_theme'),
		'desc' => __('Check To enable', 'chestnut_theme'),
		'id' => 'enable_animation',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Enable Responsive', 'chestnut_theme'),
		'desc' => __('Check To enable', 'chestnut_theme'),
		'id' => 'enable_responsive',
		'std' => '1',
		'type' => 'checkbox');


	$options[] = array(
		'name' => __('Upload Logo', 'chestnut_theme'),
		'desc' => '<a target="_blank" href="'.admin_url().'themes.php?page=custom-header" class="button">'.__('Upload', 'chestnut_theme').'</a>',
		'type' => 'info');

	$options[] = array(
		'name' => __('Upload Fav Icon', 'chestnut_theme'),
		'id' => 'fav_icon',
		'class' => 'sub-option',
		'type' => 'upload');

	$options[] = array(
		'name' => "Select Header Layout",
		'id' => "header_layout",
		'std' => "logo-side",
		'type' => "images",
		'options' => array(
			'logo-side' => $imagepath . 'logo-side.jpg',
			'logo-top' => $imagepath . 'logo-top.jpg')
	);

	$options[] = array(
		'name' => __('Google Map', 'chestnut_theme'),
		'desc' => sprintf(__('To get Values of Latitude and Longitude by Location name, click on <a href="%s">http://www.latlong.net</a>', 'chestnut_theme'),esc_url("http://www.latlong.net")),
		'id' => 'latlng',
		'type' => 'info');	

	$options[] = array(
		'name' => __('Enter the latitude', 'chestnut_theme'),
		'id' => 'map_latitude',
		'std' => '27.695401',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Enter the longitude', 'chestnut_theme'),
		'id' => 'map_longitude',
		'std' => '85.291604',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Parallax Settings', 'chestnut_theme'),
		'type' => 'heading');


	$options[] = array(
		'id' => 'parallax_section',
		'std' => $parallax_defaults,
		'options' => $options_pages,
		'overlay' => $overlay,
		'category' => $options_categories,
		'layout' => $section_template,
		'type' => 'parallaxsection' );


	$options[] = array(
		'id' => 'add_new_section',
		'type' => 'button' );

	/*Post Section Ends*/
	$options[] = array(
		'name' => __('Post Settings', 'chestnut_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Posted Date', 'chestnut_theme'),
		'desc' => __('Check To enable', 'chestnut_theme'),
		'id' => 'post_date',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Post Author', 'chestnut_theme'),
		'desc' => __('Check To enable', 'chestnut_theme'),
		'id' => 'post_author',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Post Footer text', 'chestnut_theme'),
		'desc' => __('Check To enable', 'chestnut_theme'),
		'id' => 'post_footer',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Prev Next Pagination', 'chestnut_theme'),
		'desc' => __('Check To enable', 'chestnut_theme'),
		'id' => 'post_pagination',
		'std' => '1',
		'type' => 'checkbox');
	
	/*Parallax Section Ends*/
	$options[] = array(
		'name' => __('Slider Settings', 'chestnut_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Slider', 'chestnut_theme'),
		'id' => 'show_slider',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Category', 'chestnut_theme'),
		'id' => 'slider_category',
		'type' => 'select',
		'options' => $options_categories);
	}

	$options[] = array(
		'name' => __('Show full window', 'chestnut_theme'),
		'id' => 'slider_full_window',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Show Pager', 'chestnut_theme'),
		'id' => 'show_pager',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Show Controls', 'chestnut_theme'),
		'id' => 'show_controls',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Auto Transition', 'chestnut_theme'),
		'id' => 'auto_transition',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Slider Transition', 'chestnut_theme'),
		'id' => 'slider_transition',
		'std' => 'fade',
		'type' => 'radio',
		'options' => $transitions);

	$options[] = array(
		'name' => __('Slider Transition Speed', 'chestnut_theme'),
		'id' => 'slider_speed',
		'std' => '5000',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slider Pause Duration', 'chestnut_theme'),
		'id' => 'slider_pause',
		'std' => '5000',
		'type' => 'text');

	$options[] = array(
		'name' => __('Show Caption', 'chestnut_theme'),
		'id' => 'show_caption',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $check);

	$options[] = array(
		'name' => __('Social Links', 'chestnut_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Social Icon', 'chestnut_theme'),
		'desc' => __('Check To enable', 'chestnut_theme'),
		'id' => 'show_social',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Facebook', 'chestnut_theme'),
		'id' => 'facebook',
		'type' => 'url');

	$options[] = array(
		'name' => __('Twitter', 'chestnut_theme'),
		'id' => 'twitter',
		'type' => 'url');

	$options[] = array(
		'name' => __('Google Plus', 'chestnut_theme'),
		'id' => 'google_plus',
		'type' => 'url');

	$options[] = array(
		'name' => __('Youtube', 'chestnut_theme'),
		'id' => 'youtube',
		'type' => 'url');

	$options[] = array(
		'name' => __('Pinterest', 'chestnut_theme'),
		'id' => 'pinterest',
		'type' => 'url');

	$options[] = array(
		'name' => __('Linkedin', 'chestnut_theme'),
		'id' => 'linkedin',
		'type' => 'url');

	$options[] = array(
		'name' => __('Fickr', 'chestnut_theme'),
		'id' => 'flickr',
		'type' => 'url');

	$options[] = array(
		'name' => __('Vimeo', 'chestnut_theme'),
		'id' => 'vimeo',
		'type' => 'url');

	$options[] = array(
		'name' => __('Instagram', 'chestnut_theme'),
		'id' => 'instagram',
		'type' => 'url');

	$options[] = array(
		'name' => __('Skype', 'chestnut_theme'),
		'id' => 'skype',
		'type' => 'text');

	$options[] = array(
		'name' => __('Tools', 'chestnut_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Custom CSS', 'chestnut_theme'),
		'id' => 'custom_css',
		'type' => 'textarea',
		'desc' => 'Put your custom CSS here');

	$options[] = array(
		'name' => __('Custom JS', 'chestnut_theme'),
		'id' => 'custom_js',
		'type' => 'textarea',
		'desc' => 'Put your analytics code/custom JS here');

	$options[] = array(
		'name' => __('About', 'chestnut_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('About AccessPress Themes', 'chestnut_theme'),
		'desc' => $about_content,
		'type' => 'info');
return $options;
}
