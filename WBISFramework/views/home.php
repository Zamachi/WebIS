<?php

use app\core\Application;

$success = Application::$app->session->getAuth('user');
// var_dump($top4); // exit;

?>

<section id="slider">
	<!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="title text-center">Newest Added</h2>
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner">
						<div class="item active">
							<div class="img">
								<a href="/productDetails?game_id=<?php echo $igre[0]['game_id']; ?>"><img src="<?php echo $igre[0]['image']; ?>" class="girl img-responsive" alt="image not found" />
									<div class="text-box">
										<p><?php echo (strlen($igre[0]['description']) > 200 ? substr_replace($igre[0]['description'], "..LEARN MORE", 200) : $igre[0]['description']); ?></p>
									</div>
								</a>
							</div>
						</div>
						<div class="item img">
							<div class="img">
								<a href="/productDetails?game_id=<?php echo $igre[1]['game_id']; ?>"><img src="<?php echo $igre[1]['image']; ?>" class="girl img-responsive" alt="image not found" />
									<div class="text-box">
										<p><?php echo (strlen($igre[1]['description']) > 200 ? substr_replace($igre[1]['description'], "..LEARN MORE", 200) : $igre[1]['description']); ?></p>
									</div>
								</a>
							</div>
						</div>

						<div class="item img">
							<div class="img">
								<a href="/productDetails?game_id=<?php echo $igre[2]['game_id']; ?>"><img src="<?php echo $igre[2]['image']; ?>" class="girl img-responsive" alt="image not found" />
									<div class="text-box">
										<p><?php echo (strlen($igre[2]['description']) > 200 ? substr_replace($igre[2]['description'], "..LEARN MORE", 200) : $igre[2]['description']); ?></p>
									</div>
								</a>
							</div>
						</div>

					</div>

					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
</section>
<!--/slider-->

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="col-sm-12">
					<div class="blog-post-area">
						<h2 class="title text-center">News</h2>
						<div class="single-blog-post" style="overflow: scroll; height: 850px;">
							<?php foreach ($novosti as $key => $value) { ?>
								<a>
									<img src="<?php echo $value['news_image'] ?>" alt="">
								</a>
								<h2 class="text-blog"><?php echo $value['news_title'] ?></h2>
								<p class="text-blog"><?php echo $value['news_content'] ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<br>
				<div class="col-sm-12 padding-right">
					<div class="category-tab">
						<!--category-tab-->
						<div class="col-sm-12">
							<h2 class="title text-center">TOP 4 GAMES</h2>
							<ul class="nav nav-tabs">
								<li class="active" style="width: 100%; text-align: center;"><a href="#games" data-toggle="tab">GAMES</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="games">
								<?php foreach ($top4 as $key => $value) { ?>
									<div class='col-sm-3'>
										<div class='product-image-wrapper'>
											<div class='single-products'>
												<div class='productinfo text-center'>
													<a href='/productDetails?game_id=<?php echo $value['game_id']; ?>'><img src='<?php echo $value['image']; ?>' alt='slika ne radi'></a>
													<p><?php echo $value['title']; ?></p>
												</div>
											</div>
											<div class='choose'>
												<ul class='nav nav-pills nav-justified'>
													<li class='text-item'><a href='/productDetails?game_id=<?php echo $value['game_id']; ?>'><?php echo (strlen($value['description'])) >= 100 ? substr_replace($value['description'], "...READ MORE", 100) : $value['description']; ?></a></li>
												</ul>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<!--/category-tab-->

				</div>
			</div>
		</div>
</section>