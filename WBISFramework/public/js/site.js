function loadMoreData(jQueryObjectLoadMore,jQueryObjectLoadMoreBtn,jQueryObjectLoadMoreProgress,numberOfPage,numberOfRows,search,url) {
   
	var data = { "numberOfPage":numberOfPage , "numberOfRows":numberOfRows , "search":search };

			$.ajax({

				method:"GET",
				url:url,
				data:data,
				dataType:"json",
				success: function(result) {
					if (result === null || result.length === 0) {
						moreData = false;
                        jQueryObjectLoadMoreBtn.html("Ne postoji vise podataka!");
						jQueryObjectLoadMoreBtn.prop("disabled",true);
					}

					if (result !== null && result.length > 0) {
						$.each(result,function (index,item){
                            jQueryObjectLoadMore.append(
                                ""

                            );

						});
					}
				},
				error: function (error) {
					
				},
				beforeSend: function () {
					$("#progress").show();
				},
				complete:function () {
					$("#progress").hide();
				}
			});
	
}