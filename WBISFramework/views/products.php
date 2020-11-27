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
								echo "<li class='tags' data-id='" . $value['tag_id'] . "'><a href='javascript:;'>" . $value['tag_name'] . "</a></li>";
							}
							echo "<li class='tags activeTag' id='tagEmpty' data-id='0'><a href='javascript:;'>Empty</a></li>";
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
									echo "<li  class='developers' data-id='" . $value['developer_id'] . "' '><a href='javascript:;'>" . $value['developer_name'] . "</a></li>";
								}
								echo "<li  class='developers activeDev' id='devEmpty' data-id='0'><a href='javascript:;'>Empty</a></li>";

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
					</div>
					<div class="col-sm-12">
						<ul class="pagination" id="pagination">
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
	var tagId = '0';
	var devId = '0';
	var numberPage = 1;
	var search = '';
	var url = "/productsJSON";

	$(document).ready(function() {
		loadMoreData($("#allGamesContent"), $("#pagination"), numberPage, search, url, devId, tagId);

		$(".tags").click(function() {
			tagId = $(this).attr('data-id');
			$(".tags").removeClass("activeTag");
			$("#pretraga").val('');
			search = '';

			$(this).addClass("activeTag");
			$("#allGamesContent").empty();
			$("#pagination").empty();
			
			loadMoreData($("#allGamesContent"), $("#pagination"), numberPage, search, url, devId, tagId);
		});

		$(".developers").click(function() {
			devId = $(this).attr('data-id');
			$(".developers").removeClass("activeDev");
			$("#pretraga").val('');
			search = '';

			$(this).addClass("activeDev");
			$("#allGamesContent").empty();
			$("#pagination").empty();

			loadMoreData($("#allGamesContent"), $("#pagination"), numberPage, search, url, devId, tagId);
		});
		
		$("#pretraga").change(function(param) {
			search = $(this).val();
			numberPage = 1;
			tagId = 0;
			devId = 0;
			$(".developers").removeClass("activeDev");
			$(".tags").removeClass("activeTag");
			$(".pages").removeClass("active");
			$("#allGamesContent").empty();
			$("#pagination").empty();
			$("#devEmpty").addClass("activeDev");
			$("#tagEmpty").addClass("activeTag");

			loadMoreData($("#allGamesContent"), $("#pagination"), numberPage, search, url, devId, tagId);
		});
	});

	$(document).on("click", ".pages", function(){
		numberPage = $(this).attr('data-id');
		$(".pages").removeClass("active");
		$("#pretraga").val('');
		search = '';

		$(this).addClass("active");
		$("#allGamesContent").empty();
		$("#pagination").empty();
		
		loadMoreData($("#allGamesContent"), $("#pagination"), numberPage, search, url, devId, tagId);
	});
</script>