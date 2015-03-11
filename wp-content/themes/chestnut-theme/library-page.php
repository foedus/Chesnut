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
			<article class="page type-page status-publish hentry">
				<header class="entry-header">
					<h1 class="entry-title">Course Library</h1>
				</header>
				<div class="entry-content">
					<div id="search-bar">
						<input id="search" type="text" placeholder="Search...">
						<div id="pagination">
						</div>
					</div>
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
							$args = array( 'posts_per_page' => 5, 'order'=> 'ASC', 'orderby' => 'title', 'category_name' => 'Library' );
							$postslist = get_posts( $args );

							foreach ( $postslist as $post ) :
						  		setup_postdata( $post );
						  		$post_id = get_the_id();
						  		$theID = get_post_meta($post_id, 'CourseID', true);
						  		$theauthor = get_post_meta($post_id, 'Presenter', true); ?>		
								<div class="course-info">
									<a href=/<?php echo $theID ?>><div class='course-image-overlay'><span>+</span></div></a>
									<div class="course-image"><?php the_post_thumbnail(); ?></div>
									<div class="course-text">
										<a href=/<?php echo $theID ?>><h2 class="course-title"><?php the_title(); ?></h2></a>
										by <?php echo $theauthor ?>
										<?php the_excerpt(); ?>
									</div>
								</div>
						<?php endforeach; 
						wp_reset_postdata(); 
						?>
					</div>
				</div>
				<footer class="entry-footer">
				</footer>

			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

</div>

<script type="text/javascript">

"use strict";
var postJSON;
(function() {
	var myRequest = new XMLHttpRequest();
	myRequest.onreadystatechange = function() {
		if (myRequest.readyState === 4 && myRequest.status === 200) {
			postJSON = JSON.parse(myRequest.responseText);
			console.dir(postJSON);
			document.getElementById("pagination").innerHTML = "Showing 5 of " + postJSON.length + " courses.";
		}
	}
	myRequest.open("GET", "http://www.chestnut-learning.com/wp-json/posts?filter[category_name]=library", true);
	myRequest.send();
})();
</script>

<?php get_footer(); ?>