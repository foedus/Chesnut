<?php
/**
 * Template Name: Library Page
 * The template for displaying the Chestnut course library.
 *
 * @package chestnut_theme
 */


get_header(); ?>
<div class="mid-content">
	<div id="page-primary" class="content-area">
		<div id="library-filters" class="content-area">
			<h1>Filters</h1>
		</div>
		<main id="main" class="site-main" role="main">

			<?php
				$args = array( 'posts_per_page' => 10, 'order'=> 'ASC', 'orderby' => 'title', 'category_name' => 'Library' );
				$postslist = get_posts( $args );
				foreach ( $postslist as $post ) :
			  		setup_postdata( $post ); ?> 			
					<div class="course-info">
						<div id="course-image"><?php the_post_thumbnail(); ?></div>
						<div id="course-text">
							<h2 id="course-title"><?php the_title(); ?></h2>
							</br>
							<?php the_excerpt(); ?>
						</div>
					</div>
			<?php endforeach; 
			wp_reset_postdata(); 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div>
<?php get_footer(); ?>