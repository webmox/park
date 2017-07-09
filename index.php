<?php get_header(); ?>
		<div class="main-container">

			<?php $about = new WP_Query(array('post_type'=>'page', 'page_id'=>12)); ?>
			
			<?php if($about->found_posts){ ?>

				<section class="about section">	
					<div class="container">
						<?php while($about->have_posts()) : $about->the_post();  ?>
						<h2 class="title-section wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s"><?php the_title(); ?></h2>

						<div class="description-center wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
							<div><?php the_excerpt(); ?></div>
							<div class="wrap-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
								<a href="<?php the_permalink(); ?>" class="read-more">Подробнее о нас</a>
							</div>
						</div>

						<?php endwhile ?>
					</div>
				</section><!-- end about-->

			<?php } ?>

			<?php $excursion = new WP_Query(array('post_type'=>'excursion', 'posts_per_page'=>3)); ?>	

			<?php if($excursion->found_posts){ ?>
				<section class="section popular">
					<div class="container">
						<h2 class="title-section  wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">Популярные экскурсии</h2>
						<div class="list-popular row">
							<?php $count_delay = 0; ?>
							<?php while($excursion->have_posts()) : $excursion->the_post(); 
				
							$popular = get_field('popular');

							?>
							<?php if($popular[0] == 'yes'){ ?>
								<div class="col-sm-4 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".<?php echo $count_delay++; ?>s">
									<div class="item-excursion">
										<div class="img-box">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('excursion'); ?></a>
										</div>
										<div class="title-sectioin tr">
											<div class="icon-block td">
												<?php 


												    $terms = get_the_terms( $post->ID, 'typeexcursion');


													if( $terms ){
														$term = array_shift( $terms );

														// теперь можно можно вывести название термина
														$term->term_id;

													}

													$img_info = get_the_category_data($term->term_id);
													$img_cat =   wp_get_attachment_image($img_info->id, 'icon-cat');

													echo $img_cat;

												?>
											</div>
											<div class="text-block td">
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<a href="<?php the_permalink(); ?>" class="read">подробнее</a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php endwhile; ?>

						</div><!--end list-popular-->

						<div class="read-more-box wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
							<a href="<?php echo get_term_link(10); ?>" class="read-more">Смотреть все экскурсии</a>
						</div>
					</div>
				</section><!--end section popular-->
			<?php } ?>

			<?php echo get_template_part('section-animals'); ?>


			<?php echo get_template_part('section-donation'); ?>

			<?php $news = new WP_Query(array('post_type'=>'post', 'cat'=>array(6, 7), 'posts_per_page'=>4)); ?>

			<?php if($news->found_posts){ ?>
			<section class="section posts">
				<div class="container">
					<h2 class="title-section wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">Это интересно</h2>

					<div class="list-news row line-button">
						<?php $count_delay = 0; ?>
						<?php while($news->have_posts()) : $news->the_post(); ?>
							<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".<?php echo $count_delay++; ?>s">
								<div class="item-news">
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
						<?php endwhile; ?>

					</div>

				</div>
			</section><!--end posts-->
			<?php } ?>



			<section class="section map wow fadeIn" data-wow-duration="1.3s" data-wow-delay=".6s">
				<h2 class="title-section wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">Карта парку</h2>

				<div class="map-img">
					<?php echo do_shortcode('[map-park]'); ?>
				</div>

			</section>
			<!-- /.section -->


			<?php echo get_template_part('section-subscribe'); ?>


		</div>
<?php 

get_footer();

?>