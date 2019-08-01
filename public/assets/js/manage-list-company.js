$(function(){

	$("#search-job-post").on("keyup", function() {
		var g = $(this).val().toLowerCase();
		console.log(g)
		$(".panel-list-company p.text-company-name").each(function(index) {
				var s = $(this).text().toLowerCase();
				$(this).closest('.panel-list-company')[ s.indexOf(g) !== -1 ? 'show' : 'hide' ]();
		});

		if (g != "")
			countTotalJob("filter");
		else
			countTotalJob("all");
	});

	const countTotalJob = (search) => {
		let totalCompany = 0;

		switch (search) {
			case "all": 
				totalCompany = $('.panel-list-company').length;
				break;
			case "filter":
				totalCompany = $('.panel-list-company[style="display: block"]').length;
				break;
		}

		$('#total-job-post').text(totalCompany);
	}

	$("#cbSortBy").on('change', function(e)
	{
		var val = $(this).val();
		$('.loader-container').fadeIn('slow');
        $('.page-container').addClass('blur');
		if(val != "")
		{
			$.ajax(
			{
				url: '/Company/sort-list-company',
				type: 'POST',
				data: {_token: $('meta[name="csrf-token"]').attr('content'), 
						sortBy: val},
				success: function(e)
				{
					$('.loader-container').fadeOut('slow');
            		$('.page-container').removeClass('blur');
					$(".panel-list-company").remove();
					$.each(e, function(idx, el)
					{
						var totalViewed = (el.totalViewed == null) ? 0 : el.totalViewed;
						var totalApplied = (el.totalApplied == null) ? 0 : el.totalApplied;
						var totalFavorite = (el.totalFavorite == null) ? 0 : el.totalFavorite;
						var boothNumber = (el.boothNumber == null) ? "has'nt assigned yet" : el.boothNumber;
						var totalJobPost = (el.totalJobPost == null) ? 0 : el.totalJobPost;
						var updatedAt = (el.updated_at != "0000-00-00 00:00:00") ? moment(el.created_at).format('LLLL') : "no signing yet";

						let append = '<div class="panel panel-white panel-container panel-list-company"><div class="panel-body" id="company-'+el.companyID+'"><div class="row"><div class="col-lg-12"><div class="row"><div class="col-lg-2"><p class="text-company-name">'+ el.companyName + '</p></div><div class="col-lg-offset-7 col-lg-3"><p> Booth number: <span class="job-post-work-location"> <b> #'+boothNumber+' </b> </span> </p></div></div><div class="row"><div class="col-lg-2"><p class="job-post-work-location" style="color: #00BFFF;opacity: 0.5;"> '+ el.companyLocation +' </p></div><div class="col-lg-offset-7 col-lg-3"><p> Total job post: <span class="job-post-work-location"> <b> '+totalJobPost+'</b> </span> </p></div></div><div class="row"><div class="col-lg-2"><p class="job-post-work-location"> '+ el.companyIndustry+ '</p></div><div class="col-lg-offset-7 col-lg-3"><p> Last Login: <span style="color: #C7C7C7;"> <b> '+ updatedAt +' </b> </span> </p></div></div><div class="row"><div class="col-lg-2 text-grey"><i class="icon-eye position-left"></i> '+totalViewed+'</div><div class="col-lg-2 text-grey"><i class="icon-star-full2 position-left"></i> '+totalFavorite+'</div><div class="col-lg-2 text-grey"><i class="icon-profile position-left"></i> '+totalApplied+'</div><div class="col-lg-2"><a href="/Company/edit-profile/cID='+el.companyID+'"><button type="button" class="btn job-post-action-button"><i class="material-icons">edit</i></button></a><button type="button" class="btn job-post-action-button delete-job-post" data-name="'+el.companyName+'" data-id="'+el.companyID+'" style="background-color: red;"><i class="material-icons">delete</i></button></div></div></div></div></div></div>';

						$(".content").append(append);
					});
				},
				error: function(e)
				{
					console.log(e);
				}
			});
		}
		else
		{
			$('.loader-container').fadeOut('slow');
            $('.page-container').removeClass('blur');
		}
	});

	$(".content ").on("click", ".delete-job-post", function(e)
	{
		e.preventDefault();

		var companyID = $(this).data('id');
		var companyName = $(this).data('name');

		swal(
	        {
	            title: "Are you sure to delete <br><b class='bold-red'>" + companyName + "</b> ? ",
	            type: "warning",
	            showCancelButton: true,
	            html: true,
	            confirmButtonColor: "#F44336",
	            confirmButtonText: "Submit !",
	            closeOnConfirm: false,
	            showLoaderOnConfirm: true
	        },
	        function(isConfirm){
	        	if(!isConfirm) return;
	        	$.ajax(
				{
					url: '/Company/delete-company',
					type: 'POST',
					data: {_token: $('meta[name="csrf-token"]').attr('content'), 
							companyID: companyID},
					success: function(e)
					{
						if(e)
						{
							setTimeout(function()
							{
								swal({
									title: "Successfully delete company",
									showCancelButton: false,
									type: "success",
									html: true,
						            confirmButtonColor: "#66BB6A"
								});
								$("#company-"+companyID).remove();
							}, 1000);
						}
					},
					error: function(e)
					{

					}
				});
	        }
  	 	);
	});
});