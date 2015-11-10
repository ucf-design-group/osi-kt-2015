<?php /* Template Name: Events */

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

					<section class="events">

<?php
						$counter = 0;
						$eventLoop = new WP_QUERY(array('post_type' => 'osi-events', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'oe-form-start', 'meta_value' => time(), 'meta_compare' => '>='));
						while ($eventLoop->have_posts()) {
							$eventLoop->the_post();
							$title = get_the_title();
							$start = get_post_meta($post->ID, 'oe-form-start', true);
							$end = get_post_meta($post->ID, 'oe-form-end', true);
							$content = get_the_content();
							$link = get_post_meta($post->ID, 'oe-form-url', true);
							$image = get_the_post_thumbnail($post->ID, 'medium');
							$image_url = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full');

							if ($end == "none")
								$dates = date('l F jS, g:ia', $start);
							else if (date('F j', $start) == date('F j', $end))
								$dates = date('l F jS, g:ia', $start) . " - " . date('g:ia', $end);
							else
								$dates = date('F jS, g:ia', $start) . " to " . date('F jS, g:ia', $end);
?>	
						<article class="event">
							<a class="img fancybox" href="<?php echo $image_url[0]; ?>"><?php echo $image; ?></a>
							<h3><?php echo $title; ?></h3>
							<h4><?php echo $dates; ?></h4>
							<p><?php echo $content; ?></p>
<?php
							if ($link != "") {
?>
							<p><a href="<?php echo $link; ?>" target="_blank">See more on Knight Connect!</a></p>
<?php				}
?>
						</article>
<?php
						$counter++;
					}

					if ($counter == 0) {
?>
						<p>There are no events to display... yet.</p>
	<?php
					}
	?>

					</section>

					<div class="aside-placeholder"></div>
				</div>
			</div>



<?php get_footer(); ?>