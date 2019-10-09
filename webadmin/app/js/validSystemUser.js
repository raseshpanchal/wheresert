function validSystemUser()
{
	var myform = document.getElementById("myForm");

	if(myform.txt_fullName.value == "" || myform.txt_fullName.value == " ")
	{
		alert("Please Enter Full Name");
		myform.txt_fullName.focus();
		return;
	}
	
	if(myform.txt_email.value == "" || myform.txt_email.value == " ")
	{
		alert("Please Enter Email ID");
		myform.txt_email.focus();
		return;
	}
	
	if(myform.txt_username.value == "" || myform.txt_username.value == " ")
	{
		alert("Please Enter User Name");
		myform.txt_username.focus();
		return;
	}
}