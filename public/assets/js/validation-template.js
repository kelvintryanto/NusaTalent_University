$(function(){
	setTimeout(function(){
		$('#alert').fadeOut('slow');
	}, 2000);

	let emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
  	let contactPattern = /^(([0-9]*)|(([0-9]*)\.([0-9]*)))$/i;
  	let invalidEmail = true;

  	$(".form-area").on('change', function(e)
	{
		var val = $(this).val();

		if(val != ""){
			$(this).parent().find('.invalid').css('display', 'none');
			$(this).removeClass("border-red");
			$(this).addClass("border-green");
		}else{
			$(this).parent().find('.invalid').css('display', 'block');
			$(this).removeClass("border-green");
			$(this).addClass("border-red");
		}
	})

	$("select").on('change', function(e)
	{
		var val = $(this).val();

		if(val !== "")
		{
			$(this).parent().find('.invalid').css('display', 'none');
			$(this).next("span").children().children().removeClass("border-red");
			$(this).next("span").children().children().addClass("border-green");
		}
		else{
			$(this).parent().find('.invalid').css('display', 'block');
			$(this).next("span").children().children().addClass("border-red");
			$(this).next("span").children().children().removeClass("border-green");
		}
	});

	$(".form-input").on('change', function(e)
	{
		var val = $(this).val();

		if(val != ""){
			$(this).parent().find('.invalid').css('display', 'none');
			$(this).removeClass("border-red");
			$(this).addClass("border-green");
		}else{
			$(this).parent().find('.invalid').css('display', 'block');
			$(this).removeClass("border-green");
			$(this).addClass("border-red");
		}
	});

	$("input[type='email']").on('change', function(e)
	{
		var val = $(this).val();
        
        if(emailPattern.test(val) && val != "")
		{
			invalidEmail = false;
			$(this).removeClass("border-red");
			$(this).addClass("border-green");
			$(this).parent().find('.invalid').css('display', 'none');
		}
		else
		{
			invalidEmail = true;
			$(this).removeClass("border-green");
			$(this).addClass("border-red");
			$(this).parent().find('.invalid').text('Invalid email pattern !').css('display', 'block');
		}
		
	});

	$('.contact').on('keyup', function(e){
		let val = $(this).val();
		if(!contactPattern.test(val)){	
			$(this).removeClass("border-green");
			$(this).addClass("border-red");
			$(this).parent().find('.invalid').text('Only number allowed').css('display', 'block');
			$(this).val('');
		}
	});
});