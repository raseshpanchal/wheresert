function validTechNotes()
{
	var myform = document.getElementById("myForm");

	if(myform.txt_desc.value == "" || myform.txt_desc.value == " ")
	{
		alert("Please Enter Technical Notes");
		myform.txt_desc.focus();
		return;
	}

}