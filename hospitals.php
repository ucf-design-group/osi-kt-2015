<?php /* Template Name: Hospitals */

 get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				
					<section class ="network_hospitals">
<?php
						$hospitalLoop = new WP_QUERY(array('post_type' => 'hospitals', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'hospital-form-order'));
						while ($hospitalLoop->have_posts()) {
							$hospitalLoop->the_post();
							$title = get_the_title();
							$content = get_the_content();
							$image = get_the_post_thumbnail($post->ID, 'large');
?>	
						<article class="hospital">
							<?php echo $image; ?>
							<h3><?php echo $title; ?></h3>
							<p><?php echo $content; ?><p>
						</article>
<?php 					}
?>
					</section>

					<div class="aside-placeholder"></div>
				</div>

			</div>

<?php get_footer(); ?>