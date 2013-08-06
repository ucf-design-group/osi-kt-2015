<?php /* Template Name: Miracle Children */

 get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>
				
				<section class ="children">
<?php
					$childrenLoop = new WP_QUERY(array('post_type' => 'children', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'child-form-order'));
					while ($childrenLoop->have_posts()) {
						$childrenLoop->the_post();
						$title = get_the_title();
						$content = get_the_content();
						$image = get_the_post_thumbnail($post->ID, 'small');
?>	
					<article class="child">
						<?php echo $image; ?>
						<h3><?php echo $title; ?></h3>
						<p><?php echo $content; ?><p>
					</article>
<?php 				}
?>
				</section>

			</div>

<?php get_footer(); ?>