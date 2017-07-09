<?php $animals = new WP_Query(array('post_type'=>'animal', 'post_per_page'=>-1)); ?>

<?php if($animals->found_posts){ ?>
	<section class="section animals">
		<div class="container">
			<h2 class="title-section wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">Наши питомцы</h2>
			<div class="wrap-carousel">
				<div class="list-carousel list-animals">
					<?php $count_delay = 0; ?>
					<?php while($animals->have_posts()) : $animals->the_post(); ?>
						<div class="item  wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".<?php echo $count_delay++; ?>s">
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