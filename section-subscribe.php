	<section class="section subscribe">
		<div class="container">
			<div class="subscribe-block">
				<div class="row">
					<div class="col-md-4 wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".6s">
						<h5 class="title-subscribe">Подпишитесь на наши новости</h5>
					</div>
					<div class="col-md-8 wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".6s">
						<!--<div class="subscibe-form">
							<form action="">
								<div class="wrap-imput"><input type="text" name="sub" placeholder="Укажите ваш e-mail"></div>
								<div class="wrap-imput"><input type="submit" value="Подписаться"></div>
							</form>
						</div>-->
						<?php if(dynamic_sidebar('subscribe')){} ?>
					</div>
				</div>
			</div>
		</div>
	</section>