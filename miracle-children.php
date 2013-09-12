<?php /* Template Name: Miracle Children */

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
				
				
					<section class="children">
<?php
						$childrenLoop = new WP_QUERY(array('post_type' => 'children', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC'));
						while ($childrenLoop->have_posts()) {
							$childrenLoop->the_post();
							$title = get_the_title();
							$content = get_the_content();
							$image = get_the_post_thumbnail($post->ID, 'thumbnail');
?>	
						<article class="child">
							<h3><?php echo $title; ?></h3>
							<?php echo $image; ?>
							<a class = "fancybox button" href="#child-bio-<?php echo $post->post_name;?>" id="child-expand">Show Bio</a>
							<div class="fancybox" id="child-bio-<?php echo $post->post_name;?>">
								<h3><?php echo $title;?></h3>
								<?php echo $image; ?>
								<p><?php echo $content; ?></p>
							</div>
						</article>
<?php 					}
?>
					</section>

					<div class="aside-placeholder"></div>
				</div>
			</div>

<?php get_footer(); ?>