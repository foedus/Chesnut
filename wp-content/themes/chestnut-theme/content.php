<?php

?>
<?php 
$post_date = of_get_option('post_date');
$post_footer = of_get_option('post_footer');
$post_date_class = ($post_date != 1 || has_post_thumbnail()) ? " no-date" : "";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_post_thumbnail()) : ?>
	<div class="entry-thumb">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'blog-header' ); ?>
		<a href="<?php get_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>"></a> 
	</div>
	<?php endif; ?>

	<div class="entry-content">
		<h1 class="entry-title<?php echo $post_date_class; ?>"><a href="<?php get_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i>Edit' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post-## -->