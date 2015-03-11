<?php
/**
 * Template Name: Course Page
 * The template for displaying a Chestnut course.
 *
 * @package chestnut_theme
 */

get_header(); ?>

<div class="mid-content">
	<div id="page-primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article class="page type-page status-publish hentry">
				<header class="entry-header">
					<h1 id="course-title" class="entry-title"></h1>
					<span class="clip-title"></span>
				</header>
				<div class="entry-content">
					<div id="video-player" style="width:100%;float:left;">
						<div id="player" style="width:800px;height:450px;background-color:lightgrey;border:1px solid grey;">
							<iframe width="800" height="450" src="https://www.youtube.com/embed/videoseries?list='<?php echo $playlistCode ?>'" frameborder="0" allowfullscreen>
							</iframe>
						</div>
					</div>
					<div id="course-info" style="width:600px;border:1px solid grey;float:left;">
						<div><h2>About the Course</h2></div>
						<div><h2>Transcript</h2></div>
					</div>
					<div id="outline-column" style="width:200px;border:1px solid grey;float:left;">
						<div id="course-outline">
							<h2>Outline</h2>
						</div>
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
var category = "<?php echo $pagename ?>".slice(0,5);
console.log(category);
(function() {
	var myRequest = new XMLHttpRequest();
	myRequest.onreadystatechange = function() {
		if (myRequest.readyState === 4 && myRequest.status === 200) {
			postJSON = JSON.parse(myRequest.responseText);
			postJSON.sort(function(a,b) { 
				return parseInt(a["terms"]["post_tag"][0]["name"]) - parseInt(b["terms"]["post_tag"][0]["name"]); 
			})
			console.dir(postJSON);
			document.getElementById("course-title").innerHTML = postJSON[0]["title"];
		}
	}
	myRequest.open("GET", "http://www.chestnut-learning.com/wp-json/posts?filter[post_per_page]=99&filter[category_name]="+category, true);
	myRequest.send();
})();
</script>

<?php get_footer(); ?>