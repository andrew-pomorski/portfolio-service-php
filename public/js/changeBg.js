$(window).on('load', function(){
	
	$('.nav-buttons:first').addClass("active");
        $("#overall_btn").click(function(){
		$("#side_navbar").css('background-image', 'url(' + '/img/sidebar_bgs/img1.jpg' + ')');
		console.log("DFSADFASDa");
	});
	
	$("#allocation_btn").click(function(){
		$("#side_navbar").css('background-image', 'url(' + '/img/sidebar_bgs/img2.jpg' + ')');
		console.log("DFSADFASDa");
	});
	
	$("#investments_btn").click(function(){
		$("#side_navbar").css('background-image', 'url(' + '/img/sidebar_bgs/img3.jpg' + ')');
		console.log("DFSADFASDa");
	});
	
	$("#historical_btn").click(function(){
		$("#side_navbar").css('background-image', 'url(' + '/img/sidebar_bgs/img4.jpg' + ')');
		console.log("DFSADFASDa");
	});

	$('.nav-buttons').click(function(){
		$('.nav-buttons').removeClass("active");
		$(this).addClass("active");
	})
});
