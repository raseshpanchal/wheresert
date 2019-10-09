//COMMON FUNCTIONS GOES HERE
function closeForm()
{
	$('#formPanel').removeClass('open');
	$('#formPanel').addClass('hidden');
	
	$('#dataPanel').removeClass('col-sm-3');
	$('#dataPanel').addClass('col-sm-9');
	
	$('#dataPanel').removeClass('col-md-5');
	$('#dataPanel').addClass('col-md-10');
	
	$('#formPanel').removeClass('col-sm-6');
	$('#formPanel').removeClass('col-md-5');
	
	//Button Enable
	$('#btnAdd').removeClass('disabled');
	$('#btnRefresh').removeClass('disabled');
	$('#btnExport').removeClass('disabled');
	$('#btnSearch').removeClass('disabled');
	$('#searchArea').show();
	$('.hideRow').show();
}

function closeFormDelete()
{
	$('#formPanel').removeClass('open');
	$('#formPanel').addClass('hidden').delay(1500);
	
	$('#dataPanel').removeClass('col-sm-3');
	$('#dataPanel').addClass('col-sm-9');
	
	$('#dataPanel').removeClass('col-md-5');
	$('#dataPanel').addClass('col-md-10');
	
	$('#formPanel').removeClass('col-sm-6');
	$('#formPanel').removeClass('col-md-5');
	
	//Button Enable
	$('#btnAdd').removeClass('disabled');
	$('#btnRefresh').removeClass('disabled');
	$('#btnExport').removeClass('disabled');
	$('#btnSearch').removeClass('disabled');
	$('#searchArea').show();
	$('.hideRow').show();
}

//Add Form Function
function addForm(formName)
{
	$('#formPanel').removeClass('hidden');
	$('#formPanel').addClass('open');
	
	$('#formPanel').html('<div style="margin-top:25px; margin-left:25px; max-height:100%">Loading Form...<br/><br/><img src="images/preloader_clock.gif" /></div>');
	$('#formPanel').load(formName);
	
	$('#dataPanel').removeClass('col-sm-9');
	$('#dataPanel').addClass('col-sm-3');
	
	$('#dataPanel').removeClass('col-md-10');
	$('#dataPanel').addClass('col-md-5');
	
	$('#formPanel').addClass('col-sm-6');
	$('#formPanel').addClass('col-md-5');
	
	//Disable Buttons
	$('#btnAdd').addClass('disabled');
	$('#btnRefresh').addClass('disabled');
	$('#btnExport').addClass('disabled');
	$('#btnSearch').addClass('disabled');///
	$('#searchArea').hide();
	$('.hideRow').hide();
	return false;
}


//Brochure Uploading Function
function prodBrochure()
{
	//Function for Counting Table Rows
	var i=$('#middleArea .table tbody tr').length;
	if ($('#chk_publish').is(":checked"))
	{
		var myShow = '<img src="images/bullet_green.png" border="0" />';
	}
	else
	{
		var myShow = '<img src="images/bullet_red.png" border="0" />';
	}
	var myProd = $( "#select_prodID option:selected" ).text();
	var myCode = $( "#select_prodID option:selected" ).attr("title");
	// function from the jquery form plugin
	 $('#myFormImage').ajaxForm({
		beforeSend:function(){
			 $(".progress").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%'); //dynamicaly change the progress bar width
			$(".sr-only").html(percentComplete+'%'); // show the percentage number
		},
		success:function(){
			$(".progress").hide(); //hide progress bar on success of upload
		},
		complete:function(response){
			if(response.responseText=='0')
			{
				$(".image").html("Error"); //display error if response is 0
			}
			else
			{
				//Show Added Table Row
				html = '<tr>';
				html += '<td align="center" bgcolor="#96bed4"><img src="images/mark-yes.png" width="16" height="16" /></td>';
				html += '<td>'+myProd+'</td>';
				html += '<td align="center">'+myCode+'</td>';
				html += '<td>'+myShow+' '+$('#txt_title').val()+'</td>';
				html += '<td align="center"><img src="images/doc.png" width="16" height="16" /></td>';
				html += '<td align="center"><img src="images/delete.gif" width="16" height="16" /></td>';
				html += '</tr>';
				$('.table tbody').prepend(html);
				i++;
				//Other Actions
				$('.success_alert').fadeIn(300);
				$(".success_alert").delay(1500).fadeOut(300);
				closeFormDelete();
			}
		}
	 });
	 //set the progress bar to be hidden on loading
	 $(".progress").hide();
}


//Image Uploading Function
function prodImage(prodID)
{
	// function from the jquery form plugin
	 $('#myFormImage').ajaxForm({
		beforeSend:function(){
			 $(".progress").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%'); //dynamicaly change the progress bar width
			$(".sr-only").html(percentComplete+'%'); // show the percentage number
		},
		success:function(){
			$(".progress").hide(); //hide progress bar on success of upload
		},
		complete:function(response){
			if(response.responseText=='0')
			{
				$(".image").html("Error"); //display error if response is 0
			}
			else
			{
				//Other Actions
				$('#1_'+prodID).css('background-color','#a3d3d1');
				$('.success_alert').fadeIn(300);
				$(".success_alert").delay(1500).fadeOut(300);
				closeFormDelete();
			}
		}
	 });
	 //set the progress bar to be hidden on loading
	 $(".progress").hide();
}

//Store Logo Uploading Function
function storeLogo()
{
	// function from the jquery form plugin
	 $('#myFormImage').ajaxForm({
		beforeSend:function(){
			 $(".progress").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%'); //dynamicaly change the progress bar width
			$(".sr-only").html(percentComplete+'%'); // show the percentage number
		},
		success:function(){
			$(".progress").hide(); //hide progress bar on success of upload
		},
		complete:function(response){
			if(response.responseText=='0')
			{
				$(".image").html("Error"); //display error if response is 0
			}
			else
			{
				$("#1_GismoBucket").css('background-color','#a3d3d1');
				$("#2_GismoBucket").css('background-color','#a3d3d1');
				$("#2_GismoBucket").html('New Store Logo Has Been Updated');
				//Other Actions
				$('.success_alert').fadeIn(300);
				$(".success_alert").delay(1500).fadeOut(300);
				closeFormDelete();
			}
		}
	 });
	 //set the progress bar to be hidden on loading
	 $(".progress").hide();
}


//Slider Image Uploading Function
function sliderImage()
{
	//Function for Counting Table Rows
	var i=$('#middleArea .table tbody tr').length;
	if ($('#chk_publish').is(":checked"))
	{
		var myShow = '<img src="images/bullet_green.png" border="0" />';
	}
	else
	{
		var myShow = '<img src="images/bullet_red.png" border="0" />';
	}
	var mySubCat = $( "#select_subCat option:selected" ).text();
	// function from the jquery form plugin
	 $('#myFormImage').ajaxForm({
		beforeSend:function(){
			 $(".progress").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%'); //dynamicaly change the progress bar width
			$(".sr-only").html(percentComplete+'%'); // show the percentage number
		},
		success:function(){
			$(".progress").hide(); //hide progress bar on success of upload
		},
		complete:function(response){
			if(response.responseText=='0')
			{
				$(".image").html("Error"); //display error if response is 0
			}
			else
			{
				//Show Added Table Row
				html = '<tr>';
				html += '<td align="center" bgcolor="#96bed4"><img src="images/mark-yes.png" width="16" height="16" /></td>';
				html += '<td>'+myShow+' '+$('#txt_title').val()+'</td>';
				html += '<td>'+mySubCat+'</td>';
				html += '<td align="center"><img src="images/edit.gif" width="16" height="16" /></td>';
				html += '<td align="center"><img src="images/delete.gif" width="16" height="16" /></td>';
				html += '</tr>';
				$('.table tbody').prepend(html);
				i++;
				//Other Actions
				$('.success_alert').fadeIn(300);
				$(".success_alert").delay(1500).fadeOut(300);
				closeFormDelete();
			}
		}
	 });
	 //set the progress bar to be hidden on loading
	 $(".progress").hide();
}


//Static Banner Image Uploading Function
function bannerImage()
{
	//Function for Counting Table Rows
	var i=$('#middleArea .table tbody tr').length;
	if ($('#chk_publish').is(":checked"))
	{
		var myShow = '<img src="images/bullet_green.png" border="0" />';
	}
	else
	{
		var myShow = '<img src="images/bullet_red.png" border="0" />';
	}
	var mySubCat = $( "#select_subCat option:selected" ).text();
	// function from the jquery form plugin
	 $('#myFormImage').ajaxForm({
		beforeSend:function(){
			 $(".progress").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%'); //dynamicaly change the progress bar width
			$(".sr-only").html(percentComplete+'%'); // show the percentage number
		},
		success:function(){
			$(".progress").hide(); //hide progress bar on success of upload
		},
		complete:function(response){
			if(response.responseText=='0')
			{
				$(".image").html("Error"); //display error if response is 0
			}
			else
			{
				//Show Added Table Row
				html = '<tr>';
				html += '<td align="center" bgcolor="#96bed4"><img src="images/mark-yes.png" width="16" height="16" /></td>';
				html += '<td>'+myShow+' '+$('#txt_title').val()+'</td>';
				html += '<td>'+mySubCat+'</td>';
				html += '<td align="center">'+$('input[name=radio_level]:checked').val();+'</td>';
				html += '<td align="center"><img src="images/edit.gif" width="16" height="16" /></td>';
				html += '<td align="center"><img src="images/delete.gif" width="16" height="16" /></td>';
				html += '</tr>';
				$('.table tbody').prepend(html);
				i++;
				//Other Actions
				$('.success_alert').fadeIn(300);
				$(".success_alert").delay(1500).fadeOut(300);
				closeFormDelete();
			}
		}
	 });
	 //set the progress bar to be hidden on loading
	 $(".progress").hide();
}