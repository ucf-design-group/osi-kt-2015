<?php /* Template Name: Hospitals */

 get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>
				
				<section class ="hospitals">
<?php
					$hospitalLoop = new WP_QUERY(array('post_type' => 'hospitals', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'hospital-form-order'));
					while ($hospitalLoop->have_posts()) {
						$hospitalLoop->the_post();
						$title = get_the_title();
						$content = get_the_content();
						$url = get_post_meta($post->ID, 'hospital-form-url' true);
						$image = get_the_post_thumbnail($post->ID, 'small');
?>	
					<article class="hospital">
						<?php echo $image; ?>
						<h3><?php echo $title; ?></h3>
						<p><?php echo $content; ?><p>
<?php
						if ($url != "") {
?>
						<a href="<?php echo $url; ?>">Visit Hospital Site</a>
<?php
						}
?>
					</article>
<?php 				}
?>
				</section>

			</div>

<?php get_footer(); ?>