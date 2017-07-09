	<?php get_header(); ?>
		<div class="main-container">
			
			<?php $cat_ID = get_query_var('cat'); ?>

			<section class="section">
				<div class="container">
					<h2 class="title-section wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s"><?php echo get_cat_name($cat_ID); ?></h2>
					<?php $count_delay = 0; ?>
					<div class="list-post-animals line-button">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<div class="item-animal wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".<?php echo $count_delay++; ?>s">
								<div class="left-box">
									<div class="img-box">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									</div>
								</div>
								<div class="excerpt-animal right-box">
									<h2 class="title-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="excrpt-animal-text text">					
										<?php the_excerpt(); ?>
									</div>
									<a href="<?php the_permalink(); ?>" class="excerpt-animal-read">подробнее</a>
								</div>
							</div>
						<?php endwhile; ?>
						<?php endif ?>
						<?php wp_reset_query();  ?>
					</div>
					
					<div class="wrap-navigation">
						<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
					</div><!--end wrap-navigation-->


				</div>
			</section><!--end posts-->


			<?php echo get_template_part('section-donation'); ?>


			<?php echo get_template_part('section-subscribe'); ?>


		</div><!--end main-container-->

<?php get_footer(); ?>