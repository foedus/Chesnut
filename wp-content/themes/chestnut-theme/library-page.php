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
		<main id="main" class="site-main" role="main">
			<aside id="library-filters-column">
				<div id="library-filters">
					<h2>Filters</h2>
					<form id="filter-items">
						<input type="checkbox" name="option" value="1">Option 1
						<br>
						<input type="checkbox" name="option" value="2">Option 2
					</form>
				</div>
			</aside>

			<div id="course-listing-column">
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
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

</div>
<?php get_footer(); ?>