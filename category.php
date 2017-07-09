<?php get_header(); ?>
		<div class="main-container news-page">
			
			<?php $cat_ID = get_query_var('cat'); ?>

			<section class="section posts">
				<div class="container">
					<h2 class="title-section"><?php echo get_cat_name($cat_ID); ?></h2>

					<div class="list-news row line-button">
						 <?php 

						 $count_delay = 0; 
						 $count = 1;

						 ?>
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						   
							<div class="col-md-3 col-sm-6">
								<div class="item-news wow wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".<?php echo $count_delay++; ?>s">
									<div class="img-box">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('news'); ?>
										</a>
									</div>
									<div class="date"><?php the_date('d/m/Y'); ?></div>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="excerpt"><?php the_excerpt(); ?></div>
								</div>
							</div>
							<?php 

							//if($count%4==0){echo '<div class="clearfix visible-md visible-lg hidden-sm"></div>'; } 
							//if($count%2==0){echo '<div class="clearfix visible-sm hidden-md hidden-lg"></div>'; }

							$count++; ?>
						<?php endwhile; ?>
						<?php endif ?>
					</div>
					
					<div class="wrap-navigation">
						<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
					</div>
				</div>
			</section><!--end posts-->




		    <?php echo get_template_part('section-animals'); ?>


			<?php echo get_template_part('section-subscribe'); ?>


		</div>
<?php get_footer(); ?>