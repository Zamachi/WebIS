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
					<div class="brands_products">
						<div class="brands-name">
							<!--category-productsr-->
							<ul class="nav nav-pills nav-stacked">
							<?php
							foreach ($tags as $key => $value) {
								// echo "<div class='panel panel-default'>";
								// echo "<div class='panel-heading'>";
								echo "<li class='tag'><a href='/products?tag_id=" . $value['tag_id'] . "'>" . $value['tag_name'] . "</a></li>";
								// echo "</div>";
								// echo "</div>";
							}
							?>
							</ul>
						</div>
					</div>
					<br>
					<div class="brands_products">
						<h2>Developers</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">

								<?php

								foreach ($developers as $key => $value) {
									echo "<li class='developer'><a href='/products?developer_id=" . $value['developer_id'] . "'>" . $value['developer_name'] . "</a></li>";
								}

								?>
							</ul>
						</div>
					</div>
					<br>
				</div>
				<br>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Game List</h2>
					<div id="allGamesContent">
						<?php
						foreach ($products as $key => $value) {
							echo "<div class='col-sm-4'>";
							echo "<div class='product-image-wrapper'>";
							echo "<div class='single-products'>";
							echo "<div class='productinfo text-center'>";
							echo "<a href='/productDetails?game_id=" . $value['game_id'] . "'><img src='" . $value['image'] . "' alt='slika ne radi'></a>";
							echo "<h2>" . $value['current_price'] . " $</h2>";
							echo "<p>" . $value['title'] . "</p>";
							//echo "<a href='/products?addToCart=1&game_id=".$value['game_id']."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>";
							echo "</div>";
							echo "</div>";
							echo "<div class='choose'>";
							echo "<ul class='nav nav-pills nav-justified'>";
							echo "<li class='text-item'><a href='/productDetails?game_id=" . $value['game_id'] . "'>" . (strlen($value['description']) > 100 ? substr_replace($value['description'], "...READ MORE", 100) : $value['description']) . "</a></li>";
							echo "</ul>";
							echo "</div>";
							echo "</div>";
							echo "</div>";
						}

						?>
					</div>
					<div class="col-sm-12">
						<ul class="pagination">
							<?php for ($i = 1; $i <= $model['total_pages']; $i++) : ?>
								<?php if ($i == $model['current_page']) : ?>
									<li class="active pages" data-id="<?php echo $i; ?>" id="stranica<?php echo $i; ?>"><a><?php echo $i; ?></a></li>
								<?php else : ?>
									<li class="pages"><a href="/products?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
								<?php endif; ?>
							<?php endfor; ?>
						</ul>
					</div>
				</div>
				<!--features_items-->
			</div>
		</div>
	</div>
</section>
<script src="js/site.js"></script>
<script>
	$(document).ready(function() {
		//NOTE: za stilizaciju dugmadi
		$(".tag").click(function() {
			// tag_id = $(this).attr('data-id');
			$(".tag").removeClass("activeTag");

			$(this).addClass("activeTag");
			$("#allGamesContent").empty();
		});


		$(".developer").click(function() {
			// developer_id = $(this).attr('data-id');
			$(".developer").removeClass("activeDev");

			$(this).addClass("activeDev");
			$("#allGamesContent").empty();
		});

		//NOTE: za stilizaciju dugmadi
		var url = "/productsJSON";

		//NOTE: pomeri dole za click
		// $.ajax({
		// 	method: "GET",
		// 	url: url,
		// 	data: "",
		// 	dataType: "json",
		// 	success: function(result) {
		// 		var data = { "numberOfPage":numberOfPage , "developer_id":developerId, "tag_Id": tagId, "numberOfRows":numberOfRows , "search":search };
		// 		$.each(result.products, function(idx, obj) {
					
		// 			if (result != null && result.length > 0) {
		// 				​​​​​
		// 				$.each(result, function(i, item) {
		// 					​​​​​
		// 					jQueryObjectForAppend.append(
								
		// 					);
		// 				}​​​​​);
		// 			}​​​​​

		// 		});
		// 	},
		// 	error: function() {
		// 		alert("Greska!");
		// 	}
		// });


		var numberOfPage = $(".active").attr("id");
		var tagId = $(".tags").attr("data-id");
		var numberOfRows = 9;
		var search = $("#pretraga").val();

		

		$(".pages").click(function() {
			numberOfPage = $(this).attr('data-id');
			$(".pages").removeClass("active");

			$(this).addClass("active");
			$("#allGamesContent").empty();

			var data = {
				"numberOfPage": numberOfPage,
				"tag_id": tag_id,
				"developer_id": developer_id,
				"search": search
			};
			loadMoreData($("#allGamesContent"), $("#loadMoreBtn"), url, numberOfPage, numberOfRows, search,developer_id,tag_id);
		});

		$("").change(function(param) {
			numberOfRows = $("").val();
			numberOfPage = 0;

			loadMoreData($("#tableBody"), $("#loadMoreBtn"), $("#progress"), url, numberOfPage, numberOfRows, search);


		});
		$("").change(function(param) {
			search = $("").val();
			numberOfPage = 0;

			loadMoreData($("#tableBody"), $("#loadMoreBtn"), $("#progress"), url, numberOfPage, numberOfRows, search);

			$("#").html("Ne postoji vise podataka!");
			$("#").prop("disabled", true);
		});

	});
</script>