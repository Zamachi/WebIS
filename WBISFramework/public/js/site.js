function loadMoreData(jQueryObjectLoadMore,jQueryObjectLoadMoreBtn,numberOfPage,numberOfRows,search,url,developer_id,tag_id) {
   
	var data = { "numberOfPage":numberOfPage , "developer_id":developer_id, "tag_id": tag_id, "numberOfRows":numberOfRows , "search":search};

	$.ajax({
		method: "GET",
		url: url,
		data: data,
		dataType: "json",
		success: function(result) {
			
		},
		error: function() {
			alert("Greska!");
		}
	});
	
}