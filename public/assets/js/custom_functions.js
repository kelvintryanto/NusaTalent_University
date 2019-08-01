$(document).ready(function(){

	let jobDescriptions  = $("#txtAllJobDescription").val();
	let jobRequirements  = $("#txtAllJobRequirement").val();
	let employeeBenefits = $("#txtAllEmployeeBenefit").val();
	let employeeSkills   = $("#txtAllEmployeeSkill").val();

	$(".txtSalaryMin").mask('0.000.000.000', {
		reverse: true
	});

	$(".txtSalaryMax").mask('0.000.000.000', {
		reverse: true
	});

	if(jobRequirements.startsWith(";"))
		jobRequirements = jobRequirements.substring(1, jobRequirements.length);

	$("#txtAllJobRequirement").val(jobRequirements);

	$("#txtJobDesc").on("keydown paste", function(e){
	
		if(e.which == 13 )
		{

			e.preventDefault();
			var value = $(this).val();
			if(value !== "")
			{
				var array = value.split("\n");

				for(var i = 0; i < array.length; i++)
				{
					var text = "<li class='list-group-item'>• " + array[i] + "<span style='float: right;color: red;cursor: pointer;' class='clsDesc'><i class='icon-cross2'></i></span></li>";
					$('#lstJobDescription').append(text);
					jobDescriptions += array[i]+";";
				}
				$("#txtAllJobDescription").val(jobDescriptions);
				$(this).val("");
			}
			else
			{
				// Do nothing
			}
		}
	});

	//Delete list of job desc
	$("#lstJobDescription").on("click", ".clsDesc", function(i, e){
		var value = $(this).parent().contents().filter(function(){
			return this.nodeType == 3;
		})[0].nodeValue;
		value = value.replace(/[^a-zA-Z]/, "");
		value = value.replace(" ", "");
		value = value.trimRight();
		jobDescriptions = $("#txtAllJobDescription").val();
		if(jobDescriptions.startsWith(";"))
			jobDescriptions = jobDescriptions.substring(1, jobDescriptions.length);
		jobDescriptions = jobDescriptions.replace(" ;", ";");
		jobDescriptions = jobDescriptions.replace(value+";", "");
		if(jobDescriptions.indexOf(value+";") !== -1)
			jobDescriptions = jobDescriptions.replace(value+";", "");
		else
			jobDescriptions = jobDescriptions.replace(value, "");
		$("#txtAllJobDescription").val(jobDescriptions);
		$(this).parent().remove();
	})

	$("#txtJobReq").on("keydown", function(e){
		if(e.which == 13)
		{
			e.preventDefault();
			var value = $(this).val();
			if(value !== "")
			{
				var array = value.split("\n");

				for(var i = 0; i < array.length; i++)
				{
					var text = "<li class='list-group-item'>• " + array[i] + "<span style='float: right;color: red;cursor: pointer;' class='clsRequirement'><i class='icon-cross2'></i></span></li>";
					$('#lstJobRequirement').append(text);
					jobRequirements += array[i]+";";
					
				}	
				$("#txtAllJobRequirement").val(jobRequirements);
				$(this).val("");
			}
			else
			{
				//Do nothing
			}
		}
	});

	//Delete List of Job Requirement
	$("#lstJobRequirement").on("click", ".clsRequirement", function(){

		var value = $(this).parent().contents().filter(function(){
			return this.nodeType == 3;
		})[0].nodeValue;

		value = value.replace(/[^a-zA-Z]/, "");
		value = value.replace(" ", "");
		value = value.trimRight();
		jobRequirements = $("#txtAllJobRequirement").val();
		if(jobRequirements.startsWith(";"))
			jobRequirements = jobRequirements.substring(1, jobRequirements.length);
		jobRequirements = jobRequirements.replace(" ;", ";");
		if(jobRequirements.indexOf(value+";") !== -1)
			jobRequirements = jobRequirements.replace(value+";", "");
		else
			jobRequirements = jobRequirements.replace(value, "");
		$("#txtAllJobRequirement").val(jobRequirements);
		$(this).parent().remove();
	});

	$("#txtEmployeeSkill").on("keydown", function(e){
		if(e.which == 13)
		{
			e.preventDefault();
			var value = $(this).val();

			if(value !== "")
			{
				var array = value.split("\n");

				for(var i = 0; i < array.length; i++)
				{
					var text = "<li class='list-group-item'>• " + array[i] + "<span style='float: right;color: red;cursor: pointer;' class='clsEmployee'><i class='icon-cross2'></i></span></li>";
					$('#lstEmployeeSkill').append(text);
					employeeSkills += array[i]+";";
				}	
				$("#txtAllEmployeeSkill").val(employeeSkills);
				$(this).val("");
			}
			else
			{
				// Do nothing
			}
		}
	});

	//Delete List of Employee Skills
	$("#lstEmployeeSkill").on("click", ".clsEmployee", function(){

		var value = $(this).parent().contents().filter(function(){
			return this.nodeType == 3;
		})[0].nodeValue;

		value = value.replace(/[^a-zA-Z]/, "");
		value = value.replace(" ", "");
		value = value.trimRight();

		employeeSkills = $("#txtAllEmployeeSkill").val();

		if(employeeSkills.startsWith(";"))
			employeeSkills = employeeSkills.substring(1, employeeSkills.length);
		employeeSkills = employeeSkills.replace(" ;", ";");

		if(employeeSkills.indexOf(value+";") !== -1)
			employeeSkills = employeeSkills.replace(value+";", "");
		else
			employeeSkills = employeeSkills.replace(value, "");
		$("#txtAllEmployeeSkill").val(employeeSkills);
		$(this).parent().remove();
	});

	$("#txtEmployeeBenefit").on("keydown", function(e){
		if(e.which == 13)
		{
			e.preventDefault();
			var value = $(this).val();
			if(value !== "")
			{
				var array = value.split("\n");

				for(var i = 0; i < array.length; i++)
				{
					var text = "<li class='list-group-item'>• " + array[i] + "<span style='float: right;color: red;cursor: pointer;' class='clsBenefit'><i class='icon-cross2'></i></span></li>";
					$('#lstEmployeeBenefit').append(text);
					employeeBenefits += array[i]+";";
				}	
				$("#txtAllEmployeeBenefit").val(employeeBenefits);
				$(this).val("");
			}
		}
	});

	//Delete List Of Employee Benefits
	$("#lstEmployeeBenefit").on("click", ".clsBenefit", function(){

		var value = $(this).parent().contents().filter(function(){
			return this.nodeType == 3;
		})[0].nodeValue;

		value = value.replace(/[^a-zA-Z]/, "");
		value = value.replace(" ", "");
		value = value.trimRight();

		employeeBenefits = $("#txtAllEmployeeBenefit").val();

		if(employeeBenefits.startsWith(";"))
			employeeBenefits = employeeBenefits.substring(1, employeeBenefits.length);
		employeeBenefits = employeeBenefits.replace(" ;", ";");

		if(employeeBenefits.indexOf(value+";") !== -1)
			employeeBenefits = employeeBenefits.replace(value+";", "");
		else
			employeeBenefits = employeeBenefits.replace(value, "");
		$("#txtAllEmployeeBenefit").val(employeeBenefits);
		$(this).parent().remove();
	});

});