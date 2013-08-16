<?php /* Template Name: Home */

get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>

				<div class="countdown_timer">
					<div id="countdown"></div>
					<div class="labels">
						<h3>Days</h3>
						<h3>Hours</h3>
						<h3>Minutes</h3>
						<h3>Seconds</h3>
					</div>
				</div>
			</div>
<?php get_footer(); ?>