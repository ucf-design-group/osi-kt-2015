<?php /* Template Name: Sponsors */

 get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<aside>
<?php
						$sidebarLoop = new WP_Query(array('post_type' => 'sidebar-items', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'sidebar-form-order'));

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
					</aside>
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				
					<section class="sponsors">
<?php
						$sponsorsLoop = new WP_QUERY(array('post_type' => 'sponsors', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'sponsor-form-order'));
						while ($sponsorsLoop->have_posts()) {
							$sponsorsLoop->the_post();
							$title = get_the_title();
							$content = get_the_content();
							$image = get_the_post_thumbnail($post->ID, 'medium');
?>	
						<article class="sponsor">
							<h3><?php echo $title; ?></h3>
							<?php echo $image; ?>
							<p><?php echo $content; ?><p>
						</article>
<?php 				}
?>
					</section>

					<div class="aside-placeholder"></div>
				</div>
			</div>


<?php get_footer(); ?>