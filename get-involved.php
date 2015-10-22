<?php /* Template Name: Get Involved */

get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>

					<div class="aside-placeholder"></div>
				</div>
			</div>

<?php get_footer(); ?>