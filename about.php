<?php /* Template Name: About */

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

					<a class="button children" href="<?php site_url();?>/knight-thon/miracle-children/">Visit Miracle Children</a>

					<div class="aside-placeholder"></div>
				</div>
			</div>

<?php get_footer(); ?>