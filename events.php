<?php /* Template Name: Events */

get_header(); ?>

			<div class="content-area">
				<div class="main"> 
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

							if ($end == "none")
								$dates = date('l F jS, g:ia', $start);
							else if (date('F j', $start) == date('F j', $end))
								$dates = date('l F jS, g:ia', $start) . " - " . date('g:ia', $end);
							else
								$dates = date('F jS, g:ia', $start) . " to " . date('F jS, g:ia', $end);
?>	
						<article class="event">
							<?php echo $image; ?>
							<h3><?php echo $title; ?></h3>
							<h4><?php echo $dates; ?></h4>
							<p><?php echo $content; ?></p>
<?php
							if ($link != "") {
?>
							<a href="<?php echo $link; ?>">Knight Connect!</a>
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

				</div>
			</div>



<?php get_footer(); ?>