<?php /* Template Name: Home */

get_header(); ?>

			<div class="content-area">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content', 'page' );
					} ?>
				</div>

				<section class="Timer">

<?php

				$target = mktime(0, 0, 0, 4, 15, 2014) ;
				$today = time () ;
				$difference =($target-$today) ;
				$days =(int) ($difference/86400) ;
				$hours =(int) ($difference/3600) ;
				print "Our event will occur in $days days $hours hours";

?>				
				</section>
			</div>
<?php get_footer(); ?>