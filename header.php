<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!--<div class="load_block"></div>-->
	<div class="layout">
		<header class="header">

			<div class="top-header">
				<div class="container">
					<div class="logo  wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".6s">
						<figure>
						    <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
						    <figcaption>
						    	<p class="min-text-logo"><a href="<?php bloginfo('url'); ?>">Парк природы</a></p>
						    	<p><a href="<?php bloginfo('url'); ?>">Беремицкое</a></p>
						    </figcaption>
						</figure>
					</div><!-- /.logo -->

					<div class="header-phones wow fadeInDown" data-wow-duration="1.3s" data-wow-delay=".6s">
						<?php if(get_option('phone1')){ ?>
							<span class="phone"><a href="tel:<?php echo  get_option('phone1'); ?>"><?php echo  get_option('phone1'); ?></a></span>
						<?php } ?>
						<?php if(get_option('phone2')){ ?>
							<span class="phone"><a href="tel:<?php echo  get_option('phone2'); ?>"><?php echo  get_option('phone2'); ?></a></span>
						<?php } ?>
					</div><!-- /.header-phones -->

					<div class="wrap-btn wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".6s">
						<a href="#order" class="btn_style order btn-header">Заказать экскурсию</a>
					</div>
				</div>
			</div><!-- /.top-header -->

			<?php $slider = new WP_Query(array('post_type'=>'slider', 'posts_per_page'=>-1)); ?>
	

			<div class="middle-header">
				<?php if($slider->found_posts){ ?>
				<div class="slider-header">
				    <div id="owl-demo" class="owl-carousel main-slider owl-theme">

				    	<?php while($slider->have_posts()){  $slider->the_post();

				    	 $link_slide = get_field('link_slide'); ?>

					    <div class="item">
					    	<div class="inner-item">
					    		
					    		<?php the_post_thumbnail('img-slide'); ?>
					    		
						    	<div class="inner-slide">
						    		<div class="container">
						    			<div class="description">
						    				<?php if(!$link_slide){ ?>
						    					<h2><?php the_title(); ?></h2>
						    				<?php }else{ ?>
												<h2><a href="<?php echo $link_slide; ?>"><?php the_title(); ?></a></h2>
						    				<?php } ?>
						    				<div><?php the_excerpt(); ?></div>
						    			</div>
						    		</div>
						    	</div>

					    	</div>
					    </div>
					    <?php } //end while ?>
					    <?php wp_reset_query(); ?>

				    </div>
				</div>
				<?php } ?>

			</div>

			<div class="header-menu">
				<div class="container">
					<div class="wrap-mobile-btn">
						<a href="" class="mobile-btn">
							<i class="fa fa-bars" aria-hidden="true"></i>
							<span>Меню</span>
						</a>
					</div>
					
                    <?php 

                        $args =  array(
                                'theme_location'  => 'header-top-menu',
                                'menu'            => '', 
                                'container'       => 'nav', 
                                'container_class' => 'menu', 
                                'container_id'    => '',
                                'menu_class'      => '', 
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => '',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                                'walker'          => '',
                            );
                            
                           wp_nav_menu( $args ); 
                    ?>

				</div>
			</div>
			<!-- /.middle-header -->

		</header><!--end header-->