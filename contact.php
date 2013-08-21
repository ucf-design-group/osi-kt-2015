<?php /* Template Name: Contact */

get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>
				
				<section class="content">
					<section class="content">
						<article class="contact">
							<h3>Location:</h3>
							<p>Knight-Thon's office is located on the second floor of the Student Union, inside The Office of Student Involvement, room 208.</p>
							<h3>Phone:</h3>
							<p><a href="tel:407-823-1154">407-823-1154</a></p>
							<h3>Fax:</h3>
							<p><a href="tel:407-823-5899">407-823-5899</a></p>
							<h3>Email:</h3>
							<p><a href="mailto:knight-thon@ucf.edu">knight-thon@ucf.edu</a></p>
							<h3>Mail:</h3>
							<p>P.O. Box 163245, Orlando, FL 32816-3254</p>
						</article>	
					</section>





					<section class="exec-board">
						<h2>Knight-Thon Executive Board</h2>
	<?php
						$leaderLoop = new WP_QUERY(array('post_type' => 'exec-board', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'leader-form-order'));
						while ($leaderLoop->have_posts()) {
							$leaderLoop->the_post();
							$title = get_the_title();
							$content = get_the_content();
							$image = get_the_post_thumbnail($post->ID, 'small');
							$position = get_post_meta($post->ID, 'leader-form-position', true);
							$email = get_post_meta($post->ID, 'leader-form-email', true);
	?>	
						<article class="leader">
							<?php echo $image; ?>
							<h3><?php echo $title; ?></h3>
							<p><?php echo $position; ?><p>
							<p><?php echo $content; ?><p>
							<a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
						</article>
	<?php 				}
	?>
					</section> 
				</section>
			
			</div>

<?php get_footer(); ?>