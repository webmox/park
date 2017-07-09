<?php get_header(); ?>

		<div class="main-container">
		


			<section class="section page">

				<div class="wrap-breadcrumbs">

					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

				</div>

				<div class="container">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<article class="article">
							<h2 class="title-section wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s"><?php the_title(); ?></h2>
							<div class="text wow fadeIn" data-wow-duration="1.3s" data-wow-delay=".6s">
								
								<?php the_content(); ?>

							</div>
						</article>
					<?php endwhile; ?>
					<?php  endif ?>
				</div>
					
			</section><!--end posts-->

			<?php echo get_template_part('section-animals'); ?>


			<?php echo get_template_part('section-donation'); ?>


			<?php echo get_template_part('section-subscribe'); ?>


		</div><!--end main-container-->


<?php get_footer(); ?>