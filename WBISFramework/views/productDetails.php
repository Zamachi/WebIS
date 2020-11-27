<?php
// var_dump($model['developers_and_tags']);
// exit;
//foreach($model['developers_and_tags']['developers'] as $dev) echo "$dev &nbsp;";
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-3">
							<div class="view-product">
								<img src="<?php echo $model['codes'][0]['image']?>" alt="slika ne radi">
							</div>

						</div>
						<div class="col-sm-9">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $model['codes'][0]['title']?></h2>
								<p>Game ID: 1089772</p>
								<span>

								</span>
								<p><b>Availability:</b> <?php echo count($model['codes'])>0 ? "In stock":"Out of stock"?></p>
								<p><b>Publish_date:</b> <?php echo $model['codes'][0]['publish_date']?></p>
								<p><b>Developer:</b> <?php var_dump($model['developers_and_tags'])?></p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li style="width: 100%; text-align: center;"><a data-toggle="tab">Details</a></li>
							</ul>
						</div>
						<div class="tab-content">
						<table class="table table-striped">
  						  <thead>
  						    <tr>
								<?php
									$kodovi = array_keys($model['codes'][0]);
									// var_dump($kodovi);
									echo "<td>$kodovi[7]</td>";
									echo "<td>$kodovi[12]</td>";
									echo "<td>$kodovi[11]</td>";
								?>
  						    </tr>
  						  </thead>
  						  <tbody>
  						    <tr>
  						      <td>John</td>
  						      <td>Doe</td>
  						      <td>john@example.com</td>
  						    </tr>
  						    <tr>
  						      <td>Mary</td>
  						      <td>Moe</td>
  						      <td>mary@example.com</td>
  						    </tr>
  						    <tr>
  						      <td>July</td>
  						      <td>Dooley</td>
  						      <td>july@example.com</td>
  						    </tr>
  						  </tbody>
  						</table>
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>