<?php

use app\core\Application;
// var_dump($model['developers_and_tags']);
// exit;
// var_dump($_SESSION);
// var_dump( Application::$app->session->getAuth('user')->user_id);
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 padding-right">
				<div class="product-details">
					<!--product-details-->
					<div class="col-sm-12">
						<div class="product-information" style="background: url('<?php echo $model['codes'][0]['image'] ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
							<!--/product-information-->
							<h2><?php echo $model['codes'][0]['title'] ?></h2>
							<p>Game ID: <?php echo $model['codes'][0]['game_id'] ?></p>
							<span>

							</span>
							<p><b>Availability:</b> <?php echo count($model['codes']) > 0 ? "In stock" : "Out of stock" ?></p>
							<p><b>Publish_date:</b> <?php echo $model['codes'][0]['publish_date'] ?></p>
							<p><b>Developer:</b> <?php foreach ($developers_and_tags['developers'] as $key => $value) {
														echo "&nbsp; " . $value[0] . " &nbsp;";
													} ?></p>
							<p><b>Tags:</b> <?php foreach ($developers_and_tags['tags'] as $key => $value) {
												echo "&nbsp; " . $value[0] . " &nbsp;";
											} ?></p>
						</div>
						<!--/product-information-->
					</div>
				</div>
				<!--/product-details-->

				<div class="category-tab shop-details-tab">
					<!--category-tab-->
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
									echo "<td>Code id:</td>";
									echo "<td>Username: </td>";
									echo "<td>E-mail:</td>";
									echo "<td>Code price:</td>";
									echo "<td>Discount</td>";
									?>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($codes as $key => $value) {
									echo "<tr>";
										echo "<td> {$value['code_id']} </td>";
										echo "<td> {$value['username']} </td>";
										echo "<td> {$value['mail']} </td>";
										echo "<td> {$value['price']} </td>";
										echo "<td> ". 100* (1 - $value['price']/$value['base_price'] ). " %</td>";
										echo "<td><a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a></td>";
									echo "</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!--/category-tab-->
			</div>
		</div>
	</div>
</section>