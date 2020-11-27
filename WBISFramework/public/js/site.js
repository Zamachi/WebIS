function loadMoreData(jQueryObjectLoadMore, jQueryObjectPagination, numberPage, search, url, devId, tagId) {
   
	var data = { "page": numberPage, "developer_id": devId, "tag_id": tagId, "search": search };
	
	$.ajax({
		method: "GET",
		url: url,
		data: data,
		dataType: "json",
		success: function(result) {
			$.each(result.products, function(idx, obj) {
				jQueryObjectLoadMore.append(
					"<div class='col-sm-4'>"+
					"<div class='product-image-wrapper'>"+
					"<div class='single-products'>"+
					"<div class='productinfo text-center'>"+
					"<a href='/productDetails?game_id=" + obj.game_id + "'><img src='" + obj.image + "' alt='slika ne radi'></a>"+
					"<p>" + obj.title + "</p>"+
					// "<a href='/products?addToCart=1&game_id="+ obj.game_id +"' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>"+
					"</div>"+
					"</div>"+
					"<div class='choose'>"+
					"<ul class='nav nav-pills nav-justified'>"+
					"<li class='text-item'><a href='/productDetails?game_id=" + obj.game_id + "'>" + obj.description + "</a></li>"+
					"</ul>"+
					"</div>"+
					"</div>"+
					"</div>"
					
				);
			});

			for (let index = 1; index <= result.total_pages; index++) {
				if(index == result.current_page){
					jQueryObjectPagination.append(
						"<li class='active pages' data-id=" + index + "><a href='javascript:;'>"+ index +"</a></li>"
					);
				}else{
					jQueryObjectPagination.append(
						"<li class='pages' data-id=" + index + "><a href='javascript:;'>"+ index +"</a></li>"					
					);
				}			
			}
		},
		error: function(){
			alert("Greska!");
		}
	});
}