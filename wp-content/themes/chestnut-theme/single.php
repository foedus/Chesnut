<?php
/**
 * The template for displaying all single posts.
 *
 * @package chestnut_theme
 */

get_header(); ?>
<div class="mid-content clearfix">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php 
			/** Killed post pagination. Bring this back by uncommenting.
			* $post_pagination = of_get_option('post_pagination');
			* if( $post_pagination == 1 || !isset($post_pagination)) :
			* chestnut_theme_post_nav(); 
			* endif;
			*/
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>