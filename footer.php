 		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-2 wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".6s">
						<!--<div class="footer-widget">
							<div class="footer-menu">
								<ul class="menu">
									<li><a href="#">Главная</a></li>
									<li><a href="#">О нас</a></li>
									<li><a href="#">Цели</a></li>
									<li><a href="#">О парке</a></li>
								</ul>
							</div>
						</div>-->
						<?php dynamic_sidebar('footer1')?>
					</div>
					<div class="col-sm-3 wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".6s">
						<?php dynamic_sidebar('footer2')?>
					</div>
					<div class="col-sm-3 wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".6s">
						<?php dynamic_sidebar('footer3') ?>
					</div>
					<div class="col-sm-4 wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".6s">
						<div class="footer-widget">

							<div class="social-btns wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".6s">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>

							<p class="copyright">&copy;  Все права защищены!  2016</p> 
						</div>
					</div>
				</div>
			</div>
		</footer><!--end footer-->
	</div>

	<div id="order" class="white-popup-block zoom-anim-dialog  mfp-hide standart-form">
		<?php echo do_shortcode('[contact-form-7 id="88" title="Заказ экскурсии"]'); ?>
	</div>

	<?php wp_footer(); ?>
</body>
</html>