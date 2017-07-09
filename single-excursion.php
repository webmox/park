<?php get_header(); ?>

		<div class="main-container">
		


			<section class="section page">

				<div class="wrap-breadcrumbs">
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				</div>

				<div class="container">

					<?php if(have_posts()) : while(have_posts()) : the_post(); 

						$big_photo = get_field('big_photo');
						$distance = get_field('distance');
						$time = get_field('time');
						$price = get_field('price');


						$terms = get_the_terms( $post->ID , 'typeexcursion' ); //change speaker to whatever you call your taxonomy
						//then you can use just the first term
						$term_id = $terms[0]->term_id;

						//print_array($terms);


					?>
						<article class="article">
							<h2 class="title-section wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s"><?php the_title(); ?></h2>
							
							<?php if($big_photo){ ?>
								<div class="thumbnail-box wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
									<img src="<?php echo $big_photo; ?>" alt="">
								</div>
							<?php } ?>

							<div class="info-excursion">
								<div class="info-excursion-items">
									<?php if($distance){ ?>
										<div class="item distans wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".2">
											<span class="name">Маршрут</span>
											<span class="value"><?php echo $distance; ?></span>
										</div>
									<?php } ?>
									<?php if($time){ ?>
										<div class="item time wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
											<span class="name">Время</span>
											<span class="value"><?php echo $time; ?></span>
										</div>
									<?php } ?>
									<?php if($price){ ?>
										<div class="item cost wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".4s">
											<span class="name">Стоимость</span>
											<span class="value">1280 <span>грн</span>
										</div>
									<?php } ?>
									<div class="item type type_id_<?php echo $term_id; ?> wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
										<span class="name"><?php echo $terms[0]->name; ?></span>
									</div>
								</div>
								<div class="wrap-btn wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".6s">
									<a class="order btn_style" href="#order">Заказать экскурсию</a>
								</div>
							</div>

							<div class="text wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".6s">
								<?php the_content(); ?>
							</div>


						</article>
					<?php endwhile; ?>
					<?php endif ?>
				</div><!--endcontainer-->
			</section><!--end posts-->

			
			<?php $animals = new WP_Query(array('post_type'=>'animal', 'post_per_page'=>-1)); ?>
			
			<?php if($animals->found_posts){ ?>
				<section class="section animals single-animals">
					<div class="container">
						<h2 class="title-section wow fadeIn" data-wow-duration="1.3s" data-wow-delay=".6s">Кого вы встретите</h2>
						<div class="wrap-carousel">
							<div class="list-carousel list-animals">
								 <?php $count_delay = 0; ?>
								<?php while($animals->have_posts()) : $animals->the_post(); ?>
									<div class="item wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".<?php echo $count_delay++; ?>s">
										<div class="inner-item">
											<div class="img-box"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('news'); ?></a></div>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</section><!--end animals-->
			<?php } ?>

			<div class="section-btn">
				<div class="wrap-btn wow fadeIn" data-wow-duration="1.3s" data-wow-delay=".6s">
					<a class="order btn_style" href="#order">Заказать экскурсию</a>
				</div>
			</div>

			
			


			<section class="section similar">
				<div class="container">
					<h2 class="title-section wow fadeIn" data-wow-duration="1.3s" data-wow-delay=".6s">Похожие экскурсии</h2>

					<?php $similar = new WP_Query(array('post_type'=>'excursion', 'cat'=>$term_id, 'posts_per_page'=>3)) ?>
					<div class="list-popular row">
						<?php $count_delay = 0; ?>
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
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
						<?php endwhile ?>
						<?php endif ?>
					</div><!--end list-popular-->

				</div>
			</section><!--end section popular-->


		</div><!--end main-container-->


<?php get_footer(); ?>