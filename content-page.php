<?php

/**
 * Displays the actual content of a page.
 *
 * @package MiniBill
 */

?>
<article>
						<h1 class="entry-title"><?php the_title(); ?></h1>


<!-- PAGE CONTENT START -->
<?php the_content(); ?>
<!-- PAGE CONTENT END -->


					</article>

					<aside>
<?php
						$sidebarLoop = new WP_Query(array('post_type' => 'sidebar-items', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'sidebar-form-order'));

						while ($sidebarLoop->have_posts()) {

							$sidebarLoop->the_post();

							$content = get_the_content();
							$image = get_the_post_thumbnail($post->ID, 'full');
							$url = get_post_meta($post->ID, 'sidebar-meta-url', true);
?>
						<article class="sidebar-item">
<?php
							if ($url) {
?>
							<a href="<?php echo $url; ?>"><?php echo $image; ?></a>
<?php
 							} else {
?>
							<?php echo $image; ?>
<?php
							}
?>
							<?php echo $content; ?>
						</article>
<?php
						}
?>
					</aside>
