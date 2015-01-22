<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package accesspress_parallax
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<aside class="table-of-contents widget">
		<h2 class="widget-title">
			<span>Course Contents</span>
		</h2>
		<div class="contents-list">
			<?php generate_contents(); ?>
		</div>
	</aside>
</div><!-- #secondary -->