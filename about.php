<?php /* Template Name: About */

get_header(); ?>

			<div class="content-area">
				<div class="main">
					<aside>

					</aside>
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>

					<a class="button children" href="<?php site_url();?>/knight-thon/miracle-children/">Visit Miracle Children</a>

					<div class="aside-placeholder"></div>
				</div>
			</div>

<?php get_footer(); ?>