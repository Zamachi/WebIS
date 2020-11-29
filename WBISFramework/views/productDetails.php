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
						<div class="product-information" id="slikaIgre" style="background-image: url('<?php echo $model['codes'][0]['image'] ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
							<!--/product-information-->
							<h2 id="naslovIgre"><?php echo $model['codes'][0]['title'] ?></h2>
							<p id="game_id" game-id='<?php echo $model['codes'][0]['game_id'] ?>' >Game ID: <?php echo $model['codes'][0]['game_id'] ?></p>
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
									echo "<th>Code id:</td>";
									echo "<th>Username: </td>";
									echo "<th>E-mail:</td>";
									echo "<th>Code price:</td>";
									echo "<th>Discount</td>";
									?>
								</tr>
							</thead>
							<tbody id="kodoviContent">
								
							</tbody>

							<tr>
								<td colspan="5">
									<ul class="pagination" id="pagination">

									</ul>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<!--/category-tab-->
			</div>
		</div>
	</div>
</section>

<script src="js/site.js"></script>
<script>
	var numberPage = 1;
	var url = "/productDetailsJSON";
	var game_id = $("#game_id").attr("game-id");

	$(document).ready(function() {
		loadMoreDataProductDetails($("#kodoviContent"), $("#pagination"), numberPage, url, game_id);

	});

	$(document).on("click", ".pages", function() {
		numberPage = $(this).attr('data-id');
		$(".pages").removeClass("active");
		$("#pretraga").val('');
		search = '';

		$(this).addClass("active");
		$("#kodoviContent").empty();
		$("#pagination").empty();
		loadMoreDataProductDetails($("#kodoviContent"), $("#pagination"), numberPage, url, game_id);
	});

	$(document).on("click", ".korpaDodaj", function(event) {
		var red = $(this).parent().parent();
		var data = { 
			"image": $("#slikaIgre").css("background-image").replace('url(','').replace(')','').replace(/\"/gi, ""),
			"title": $("#naslovIgre").text(),
			"code_id": red.find('td.code_id').attr('value'),
			"price": red.find('td.price').attr('value')
		
		};
		console.log(data);
		dodajUKorpu(data);
	});

</script>