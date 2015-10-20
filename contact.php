<?php /* Template Name: Contact */

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
				
				
						<section class="contact">
							<h2>Contact Knight-Thon</h2>
								<h3>Location:</h3>
								<p>Knight-Thon's office is located on the second floor of the Student Union, inside The Office of Student Involvement, room 208.</p>
								<h3>Phone:</h3>
								<p><a href="tel:407-823-1154">407-823-1154</a></p>
								<h3>Fax:</h3>
								<p><a href="tel:407-823-5899">407-823-5899</a></p>
								<h3>Email:</h3>
								<p><a href="mailto:knight-thon@ucf.edu">knight-thon@ucf.edu</a></p>
								<h3>Mail:</h3>
								<p>12715 Pegasus Drive, Student Union Room 208, Orlando, FL 32816</p>
						</section>	





						<section class="exec-board">
							<h2>Knight-Thon Executive Board</h2>
<?php
							$leaderLoop = new WP_QUERY(array('post_type' => 'exec-board', 'posts_per_page' => -1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'leader-form-order'));
							while ($leaderLoop->have_posts()) {
								$leaderLoop->the_post();
								$title = get_the_title();
								$content = get_the_content();
								$image = get_the_post_thumbnail($post->ID, 'thumbnail');
								$position = get_post_meta($post->ID, 'leader-form-position', true);
								$email = get_post_meta($post->ID, 'leader-form-email', true);
?>	
							<article class="leader">
								<h3><?php echo $title; ?></h3>
								<?php echo $image; ?>
								<p><?php echo $position; ?></p>
								<a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
								<a class = "fancybox button" href="#exec-bio-<?php echo $post->post_name;?>" id="exec-expand">Show Bio</a>
								<div class="fancybox" id="exec-bio-<?php echo $post->post_name;?>">
									<h3><?php echo $title;?></h3>
									<?php echo $image; ?>
									<p><?php echo $content; ?></p>
								</div>
							</article>
<?php 				}
?>
						</section>

					<div class="aside-placeholder"></div>
				</div>
			</div>

<?php get_footer(); ?>