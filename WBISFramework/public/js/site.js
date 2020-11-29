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

function loadMoreDataProductDetails(jQueryObjectLoadMore, jQueryObjectPagination, numberPage, url, game_id) {
   
	var data = { "page": numberPage, "game_id":game_id};
	
	$.ajax({
		method: "GET",
		url: url,
		data: data,
		dataType: "json",
		success: function(result) {
			// alert(result);
			$.each(result.codes, function(idx, obj) {
				jQueryObjectLoadMore.append(
					"<tr>"+
					"<td class='code_id' value="+obj.code_id+"> "+ obj.code_id +" </td>"+
					"<td> " + obj.username + " </td>"+
					"<td> " + obj.mail + "</td>"+
					"<td class='price' value='"+obj.price+"'> " + obj.price + " </td>"+
					"<td> " + 100 * (1 - obj.price / obj.base_price ) + " %</td>"+
					"<td><a class='btn btn-default add-to-cart korpaDodaj'><i class='fa fa-shopping-cart'></i>Add to cart</a></td>"+
					"</tr>"
				);
			});

			var start = startFrom(result.current_page);
			var end = goTo(result.current_page, result.total_pages);

			jQueryObjectPagination.append(
				"<li class=' pages' data-id=" + 1 + "><a href='javascript:;'> << FIRST PAGE </a></li>"
			);
			for (let index = start; index <= end; index++) {
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
			jQueryObjectPagination.append(
				"<li class=' pages' data-id=" + result.total_pages + "><a href='javascript:;'> >> LAST PAGE </a></li>"
			);
		},
		error: function(e){
			
			console.log(e);
		}
	});
}

function dodajUKorpu(data){
	$.ajax({
		method: "POST",
		url: "addToCart",
		data: data,
		dataType: "json"
	});
}


function startFrom(currentPage){
	return (currentPage - 3) >= 1 ? (currentPage - 3) : 1;
}

function goTo(currentPage, totalPage){
	return (+currentPage + 3) <= totalPage ? (+currentPage + 3) : totalPage;
}
