function validAppIntro()
{
	var myform = document.getElementById("myForm");

	if(myform.contents.value == "" || myform.contents.value == " ")
	{
		alert("Please Enter Content");
		myform.contents.focus();
		return;
	}

}