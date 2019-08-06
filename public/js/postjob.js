$(document).on('click', '.cbSalary', function () {
    var target = $(this).data('target');    
    if ($(this).is(':checked')) {
        $('#' + target).addClass('disabled').css('pointerEvents','none');
    }
    else {
        $('#' + target).removeClass('disabled').css('pointerEvents','auto');;
    }
});

$(document).on('click', '.cbProbperiod', function () {
    var target = $(this).data('target');    
    if ($(this).is(':checked')) {
       	$('#' + target).removeClass('disabled').css('pointerEvents','auto');
    }
    else {
    	$('#' + target).addClass('disabled').css('pointerEvents','none');
    }
});

$(document).on('click', '.cbAplicantfilter', function () {
    var target = $(this).data('target');    
    if ($(this).is(':checked')) {
        $('#' + target).removeClass('disabled').css('pointerEvents','auto');
    }
    else {
        $('#' + target).addClass('disabled').css('pointerEvents','none');
    }
});

$(document).on('click', '.cbClosejob', function () {
    var target = $(this).data('target');    
    if ($(this).is(':checked')) {
        $('#' + target).removeClass('disabled').css('pointerEvents','auto');
    }
    else {
        $('#' + target).addClass('disabled').css('pointerEvents','none');
    }
});

$(document).on('click', '.cbShiftsalary', function () {
    var target = $(this).data('target');    
    if ($(this).is(':checked')) {
        $('#' + target).addClass('disabled').css('pointerEvents','none');
    }
    else {
        $('#' + target).removeClass('disabled').css('pointerEvents','auto');;
    }
});

$(document).ready(function()
{
	var ctr = 0;
	var number=0;
	var arrayOfWord = [];
	var inputElement = document.getElementById('benefits');
	$('#benefits').on('keydown', function(e)
	{
		if(e.which == 13)
		{
			number++;
			arrayOfWord.push(document.getElementById("benefits").value);
				inputElement.value = "";  
				console.log(arrayOfWord);
			
			let html = "<div class='row rowremovebenefits' value='ctr'><label class='form-control text content2' id='ctr'>" + number+"."+" "+arrayOfWord[ctr]+"<button class='btn btn-remove' value='haha'>Remove</button></label></div>";

			console.log($('.lstBenefit'));
			console.log($('ctr'));

			$('.lstBenefit').append(html);

		/*	$(this).val("");*/
			ctr++;
		}
	});	

	$('.lstBenefit').on('click', '.btn-remove', function(e)
	{
		$(this).parent().parent().remove()
	});
	
});

$(document).ready(function()
{
	var ctr = 0;
	var number=0;
	var arrayOfWord = [];
	var inputElement = document.getElementById('jobrequirement');
	$('#jobrequirement').on('keydown', function(e)
	{
		if(e.which == 13)
		{
			number++;
			arrayOfWord.push(document.getElementById("jobrequirement").value);
				inputElement.value = "";  
				console.log(arrayOfWord);
			
			let html = "<div class='row rowremovejobrequirement' value='ctr'><label class='form-control text content2' id='ctr'>" + number+"."+" "+arrayOfWord[ctr]+"<button class='btn btn-remove' value='haha'>Remove</button></label></div>";

			console.log($('.lstJobRequirement'));
			console.log($('ctr'));

			$('.lstJobRequirement').append(html);

		/*	$(this).val("");*/
			ctr++;
		}
	});	

	$('.lstJobRequirement').on('click', '.btn-remove', function(e)
	{
		$(this).parent().parent().remove()
	});
	
});

$(document).ready(function()
{
	/*var ctr = 0;
	var number=0;
	var arrayOfWord = [];*/
	$('#jobdescription').on('keydown', function(e)
	{
		if(e.which == 13)
		{
			let inputElement = $(this).val();
			/*number++;
			arrayOfWord.push(document.getElementById("jobrequirement").value);
				inputElement.value = "";  
				console.log(arrayOfWord);*/
			
			let html = "<div class='row rowremovejobdescription' maxlength='55' value='ctr'><label class='form-control desc content2' id='ctr'>" +inputElement+ "</label></div>";

			console.log($('.lstJobDescription'));

			$('.lstJobDescription').append(html);

			$(this).val("");
			/*ctr++;*/
		}
	});	

	$('.lstJobRequirement').on('click', '.btn-remove', function(e)
	{
		$(this).parent().parent().remove()
	});
	
});

$(document).ready(function(){
	 $(".btninfo").mouseover(function(e){
	 	$('.labelscs').css('opacity', 1);
	 });

	 $(".btninfo").mouseleave(function(e){
	 	$('.labelscs').css('opacity', 0);
	 });
})

$(document).ready(function(){

	$('#jobtitle').click(function(){
		$('.space-jobtitle').css('opacity',1);
	});
	$("#jobtitle").mouseout(function(){
	 	$('.space-jobtitle').css('opacity',0);
	});

	$('#jobfunction').click(function(){
		$('.space-jobfunction').css('opacity',1);
	});
	$("#jobfunction").mouseout(function(){
	 	$('.space-jobfunction').css('opacity',0);
	});

	$('#jobindustry').click(function(){
		$('.space-jobindustry').css('opacity',1);
	});
	$("#jobindustry").mouseout(function(){
	 	$('.space-jobindustry').css('opacity',0);
	});

	$('#employmentstatus').click(function(){
		$('.space-employmentstatus').css('opacity',1);
	});
	$("#employmentstatus").mouseout(function(){
	 	$('.space-employmentstatus').css('opacity',0);
	});

	$('#careerpath').click(function(){
		$('.space-careerpath').css('opacity',1);
	});
	$("#careerpath").mouseout(function(){
	 	$('.space-careerpath').css('opacity',0);
	});

	$('#talentsneeded').click(function(){
		$('.space-talentsneeded').css('opacity',1);
	});
	$("#talentsneeded").mouseout(function(){
	 	$('.space-talentsneeded').css('opacity',0);
	});

	$('#jobdescription').click(function(){
		$('.space-jobdescription').css('opacity',1);
	});
	$("#jobdescription").mouseout(function(){
	 	$('.space-jobdescription').css('opacity',0);
	});

	$('#jobrequirement').click(function(){
		$('.space-jobrequirement').css('opacity',1);
	});
	$("#jobrequirement").mouseout(function(){
	 	$('.space-jobrequirement').css('opacity',0);
	});

	$('#benefits').click(function(){
		$('.space-benefits').css('opacity',1);
	});
	$("#benefits").mouseout(function(){
	 	$('.space-benefits').css('opacity',0);
	});

	$('#skillneeded').click(function(){
		$('.space-skillneeded').css('opacity',1);
	});
	$("#skillneeded").mouseout(function(){
	 	$('.space-skillneeded').css('opacity',0);
	});

	$('#day').click(function(){
		$('.space-day').css('opacity',1);
	});
	$("#day").mouseout(function(){
	 	$('.space-day').css('opacity',0);
	});

	$('#shiftactive').click(function(){
		$('.space-workinghour').css('opacity',1);
	});
	$("#shiftactive").mouseout(function(){
	 	$('.space-workinghour').css('opacity',0);
	});

	$('#location').click(function(){
		$('.space-location').css('opacity',1);
	});
	$("#location").mouseout(function(){
	 	$('.space-location').css('opacity',0);
	});

	$('#companyaddress').click(function(){
		$('.space-address').css('opacity',1);
	});
	$("#companyaddress").mouseout(function(){
	 	$('.space-address').css('opacity',0);
	});

	$('#salaryactive').click(function(){
		$('.space-salary').css('opacity',1);
	});
	$("#salaryactive").mouseout(function(){
	 	$('.space-salary').css('opacity',0);
	});

	$('#probperiodactive').click(function(){
		$('.space-probation').css('opacity',1);
	});
	$("#probperiodactive").mouseout(function(){
	 	$('.space-probation').css('opacity',0);
	});

	$('#education').click(function(){
		$('.space-education').css('opacity',1);
	});
	$("#education").mouseout(function(){
	 	$('.space-education').css('opacity',0);
	});

	$('#experience').click(function(){
		$('.space-experience').css('opacity',1);
	});
	$("#experience").mouseout(function(){
	 	$('.space-experience').css('opacity',0);
	});

	$('#jobcategory').click(function(){
		$('.space-jobcategory').css('opacity',1);
	});
	$("#jobcategory").mouseout(function(){
	 	$('.space-jobcategory').css('opacity',0);
	});

	$('#jdescription').click(function(){
		$('.space-jdescription').css('opacity',1);
	});
	$("#jdescription").mouseout(function(){
	 	$('.space-jdescription').css('opacity',0);
	});

	$('#closejobactive').click(function(){
		$('.space-jobpost').css('opacity',1);
	});
	$("#closejobactive").mouseout(function(){
	 	$('.space-jobpost').css('opacity',0);
	});

});
