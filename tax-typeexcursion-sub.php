	<?php get_header(); ?>


	<?php 

		$current_tax = get_query_var( 'typeexcursion' ); 

		$term = get_term_by( 'slug', $current_tax, 'typeexcursion');


		$args = array(
	        'child_of'                 => 0,
	        'parent'                   =>$term->parent,
	        'orderby'                  => 'name',
	        'order'                    => 'ASC',
	        'hide_empty'               => false,
	        'hierarchical'             => 1,
	        'exclude'                  => '',
	        'include'                  => '',
	        'number'                   => 0,
	        'taxonomy'                 => 'typeexcursion',
	        'pad_counts'               => false
	    );


	    $tax_subs = get_categories($args);

	?>

	<div class="main-container eks-page">
	


		<section class="section category">

			<div class="wrap-breadcrumbs">
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>

			<div class="container">
				<h2 class="title-section wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s"><?php echo get_cat_name($term->term_id); ?></h2>
				<div class="wrap-tabs line-button">
					<?php if($tax_subs){ ?>
						<div class="list-cats">
							<div class="row">
								<?php $count_delay = 0; ?>
								<?php foreach($tax_subs as $tax_sub){ ?>
									<div class="col-sm-4 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".<?php echo $count_delay++; ?>s">
										<div class="item-tab-box">
											<a href="<?php echo get_category_link($tax_sub->term_id); ?>" class="link-cat <?php if($term->term_id == $tax_sub->term_id){ echo 'current'; } ?>  cat-car cat_<?php echo $tax_sub->term_id; ?>"><?php echo get_cat_name($tax_sub->term_id) ?></a>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
					<div class="list-contents-post">
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
							<?php  endif ?>
						</div><!--end list-popular-->
					</div>
				</div><!--wrap tabs-->
				
				<div class="wrap-navigation">
					<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
				</div><!--end wrap-navigation-->


			</div>

		</section><!--end posts-->



		<?php echo get_template_part('section-animals'); ?>


	</div>

	<?php get_footer(); ?>