<?php /* Template Name: Home */

get_header(); ?>
			<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
		<script type="text/javascript">
			sourceArray = [
			{
				source:'<?php echo get_stylesheet_directory_uri(); ?>/resources/kt15.webm',
				type: 'video/webm'
			},
			{
				source: '<?php echo get_stylesheet_directory_uri(); ?>/resources/kt15.mp4',
				type: 'video/mp4'
			}]

		</script>
			<div class="content-area">
				<div class="splash-background">
				<video controls muted id="bgvid" class="bgvid" autoplay loop poster="<?php echo get_stylesheet_directory_uri(); ?>/resources/banner2.jpg">
				</video>
			</div>
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
<!-- 					<div class="amount-raised">
						<div id="dollar">$</div>
						<div id="hundreds">392,</div>
						<div id="ones">831</div>
						<div id="cents">.65</div>
						<h1>Raised by Knight-Thon!</h1>
					</div> -->
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'home' );
					} ?>
					<!-- Complete credit for the beautiful timer: http://codepen.io/mel/details/nleBw -->
					<div class="countdown-timer">
						<div id="days"></div>
						<div id="hours"></div>
						<div id="minutes"></div>
						<div id="seconds"></div>
						<h1>Until Knight-Thon</h1>
					</div>
					<div class="social">
						<a href="http://twitter.com/KnightThonUCF"><img title="Twitter" src="https://exhalefans.com/images/white-twitter-icon.png" alt="Twitter" width="35" height="35" /></a>
						<a href="http://www.facebook.com/KnightThon"><img title="Facebook" src="http://jenkahn.com/wp-content/uploads/2014/07/facebook-icon-wht-e1406212908751.png" alt="Facebook" width="35" height="35" /></a>
						<a href="http://instagram.com/knightthonucf#"><img title="Instagram" src="http://www.fireandwinecatering.com/images/Instagram%20Logo%20White.png" alt="Instagram" width="35" height="35" /></a>
					</div>
				</div>
			</div>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
<?php get_footer(); ?>