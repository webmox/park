<?php /**
 * Template Name: Gallery
 */

get_header(); ?>
		<div class="main-container">
		


			<section class="section page">
				

				<div class="wrap-breadcrumbs">
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				</div>


				<?php 
				
					//global $wp_query;

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$wp_query = new WP_Query(array('post_type'=>'gallery', 'posts_per_page'=>12, 'paged'=>$paged)); 
				
				?>
				
				
				<div class="container">
						<h2 class="title-section"><?php the_title(); ?></h2>
						<div class="wrap-gallery line-button">
							<div class="list-images-gallery">
								<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
									<div class="item-gallery">
										<?php $url_img = get_the_post_thumbnail_url($post->ID, 'full'); ?>
										<a href="<?php echo $url_img; ?>" data-caption="test" class="fancybox" rel="fancybox-thumb" data-title="Golden Manarola (Sanjeev Deo)">
											<i class="fa fa-search-plus" aria-hidden="true"></i>
											<?php the_post_thumbnail('gallery'); ?>
										</a>
									</div>
								<?php endwhile; ?>
								<?php endif ?>
							</div>
						</div>

						<?php //wp_reset_postdata(); ?>

					<div class="wrap-navigation">
						<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
					</div>

				</div>

			</section><!--end posts-->


			<?php echo get_template_part('section-animals'); ?>

		</div>
		<?php get_footer(); ?>