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
								
									<?php

										foreach ($developers as $key=>$value) { 
											echo "<li><a href='/products?developer_id=".$value['developer_id']."'> <span class='pull-right'>(0)</span>".$value['developer_name']."</a></li>";
										}
								
									?>
								</ul>
							</div>
						</div>
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
												//echo "<a href='/products?addToCart=1&game_id=".$value['game_id']."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
											echo "</div>";
										echo "</div>";
										echo "<div class='choose'>";
											echo "<ul class='nav nav-pills nav-justified'>";
												echo "<li class='text-item'><a href='/productDetails?game_id=".$value['game_id']."'>".( strlen($value['description']) > 100 ? substr_replace($value['description'],"...READ MORE",100):$value['description'] )."</a></li>";
											echo "</ul>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							}
					
						?>
						<div class="col-sm-12">
							<ul class="pagination">
								<?php for($i = 1 ; $i <= $model['total_pages']; $i++): ?>
									<?php if ($i == $model['current_page']): ?>
										<li class="active"><a><?php echo $i; ?></a></li>
									<?php else: ?>
										<li><a href="/products?page=<?php echo $i?>"><?php echo $i; ?></a></li>
									<?php endif; ?>
								<?php endfor; ?>
							</ul>
						</div>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>