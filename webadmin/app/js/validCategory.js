function validCategory()
{
    var myform = document.getElementById("myForm");

    if(myform.txt_title.value == "" || myform.txt_title.value == " ")
    {
        alert("Please Enter Category");
        myform.txt_title.focus();
        return;
    }

}
