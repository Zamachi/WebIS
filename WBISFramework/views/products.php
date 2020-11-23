<?php

// var_dump($products);
// var_dump($tags);
// var_dump($developers);


?>

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Tags</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<!-- TODO: ovde for petljom ispisati elemennte liste -->
							<?php

							foreach ($tags as $key=>$value) { 
								echo "<div class='panel panel-default'>";
									echo "<div class='panel-heading'>";
										echo "<h4 class='panel-title'><a href='/products?tag_id=".$value['tag_id']."'>".$value['tag_name']."</a></h	4>";
									echo "</div>";
								echo "</div>";
							}
								
							?>
						</div>
					
						<div class="brands_products">
							<h2>Developers</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<!-- TODO: ovde for petljom ispisati elemennte liste -->
									<?php

										foreach ($developers as $key=>$value) { 
											echo "<li><a href='/products?developer_id=".$value['developer_id']."'> <span class='pull-right'>(0)</span>".$value['developer_name']."</a></li>";
										}
								
									?>
								</ul>
							</div>
						</div>
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <div class="slider slider-horizontal" style="width: 166px;"><div class="slider-track"><div class="slider-selection" style="left: 41.6667%; width: 33.3333%;"></div><div class="slider-handle round left-round" style="left: 41.6667%;"></div><div class="slider-handle round" style="left: 75%;"></div></div><div class="tooltip top" style="top: -29px; left: 63.75px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">250 : 450</div></div><input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" style=""></div><br>
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Game List</h2>
						<?php
							foreach ($products as $key=>$value) { 
								echo "<div class='col-sm-4'>";
									echo "<div class='product-image-wrapper'>";
										echo "<div class='single-products'>";
											echo "<div class='productinfo text-center'>";
												echo "<a href='/productDetails?game_id=".$value['game_id']."'><img src='".$value['image']."' alt='slika ne radi'></a>";
												echo "<h2>".$value['current_price']." $</h2>";
												echo "<p>".$value['title']."</p>";
												echo "<a href='/products?addToCart=1&game_id=".$value['game_id']."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
											echo "</div>";
										echo "</div>";
										echo "<div class='choose'>";
											echo "<ul class='nav nav-pills nav-justified'>";
												echo "<li class='text-item'>".$value['description']."</li>";
											echo "</ul>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							}
					
						?>
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">»</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>