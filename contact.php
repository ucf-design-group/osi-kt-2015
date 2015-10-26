<?php /* Template Name: Contact */

get_header(); ?>

			<div class="content-area">
				<div class="main">
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				
				
						<section class="contact" style="width:100%; text-align:center;">
							<h2 style="margin-bottom:20px;">Contact Knight-Thon</h2>
								<div id="container" style="display:inline-flex;">
									<div id="info1" style="float:left; height:10px;">
										<h3>Location:</h3>
										<p>Student Union Second Floor</p><p>Office of Student Involvement</p> 
										<p>Room 208</p>
									</div>
									<div id="info2" style="float:left; height:150px; margin-left:20px; margin-right:20px;">
										<h3>Phone:</h3>
										<p><a href="tel:407-823-1154">407-823-1154</a></p>
										<h3>Fax:</h3>
										<p><a href="tel:407-823-5899">407-823-5899</a></p>
									</div>
									<div id="info3">
										<h3>Email:</h3>
										<p><a href="mailto:knight-thon@ucf.edu">knight-thon@ucf.edu</a></p>
										<h3>Mail:</h3>
										<p>12715 Pegasus Drive</p> 
										<p>Student Union Room 208</p> 
										<p>Orlando, FL 32816</p>
									</div>
								</div>

						</section>	





						<section class="exec-board" style="text-align:center;">
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