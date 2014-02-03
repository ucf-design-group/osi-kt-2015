<?php /* Template Name: Home */

get_header(); ?>

			<div class="content-area">
				<div class="main">
					<section>
<?php
						$sidebarLoop = new WP_Query(array('post_type' => 'sidebar-items', 'posts_per_page' => 4, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'sidebar-form-order'));

						while ($sidebarLoop->have_posts()) {

							$sidebarLoop->the_post();

							$content = get_the_content();
							$url = get_post_meta($post->ID, 'sidebar-form-url', true);
?>
						<article class="sidebar-item">

							<?php echo $content; ?>
						</article>
<?php
						}
?>
					</section>


					<div class="countdown-timer">
						<div id="days"></div>
						<div id="hours"></div>
						<div id="minutes"></div>
						<div id="seconds"></div>
						<h1>Until Knight-Thon</h1>
					</div>
					
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'home' );
					} ?>

				</div>
			</div>
<?php get_footer(); ?>