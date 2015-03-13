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
					<span id="clip-title"></span>
				</header>
				<div class="entry-content">
					<div id="video-player" style="width:100%;float:left;">
						<div id="player" style="width:800px;height:450px;background-color:lightgrey;border:1px solid grey;">
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
var player;

console.time("playerLoad");
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubeIframeAPIReady() {
	player = new YT.Player('player', {
		height: '450',
		width: '800',
		videoId: '',
		playerVars: {
			showinfo: '0',
			origin: 'chestnut-learning.com'
		},
		events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
		}
	});
}

function onPlayerReady(event) {
	console.timeEnd("playerLoad");
	player.playVideo();
}

var done = false;
function onPlayerStateChange(event) {
	if (event.data == YT.PlayerState.PLAYING && !done) {
		setTimeout(stopVideo, 6000);
		done = true;
	}
}

function stopVideo() {
	player.stopVideo();
}

(function() {
	console.time("dataLoad");
	var myRequest = new XMLHttpRequest();
	myRequest.onreadystatechange = function() {
		if (myRequest.readyState === 4 && myRequest.status === 200) {
			console.timeEnd("dataLoad");
			postJSON = JSON.parse(myRequest.responseText);
			postJSON.sort(function(a,b) { 
				return parseInt(a["terms"]["post_tag"][0]["name"]) - parseInt(b["terms"]["post_tag"][0]["name"]); 
			});
			document.getElementById("course-title").innerHTML = postJSON[0]["CourseID"];
			document.getElementById("clip-title").innerHTML = postJSON[0]["title"];
			player.loadVideoById(postJSON[0]["embedCode"]).playVideo();
		}
	}
	myRequest.open("GET", "http://www.chestnut-learning.com/wp-json/posts?filter[post_per_page]=99&filter[category_name]="+category, true);
	myRequest.send();
})();

</script>

<?php get_footer(); ?>