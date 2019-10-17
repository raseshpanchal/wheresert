//PHOTO Uploading Function
function profilePhoto() {
    // function from the jquery form plugin
    $('#myFormPhoto').ajaxForm({
        beforeSend: function () {
            $('#fileStatus').html('Please wait...');
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $('#fileStatus').html('File transfer is going on. Please wait...');
        },
        success: function () {
            $('#btnUpload').hide();
            $('#btnNext').show();
            $('#fileStatus').html('Picture uploaded successfully!');
        },
        complete: function (response) {
            if (response.responseText == '0') {
                $('#fileStatus').html('Please check connection! An error occured.');
            } else if (response.responseText == '1') {
                $('#fileStatus').html('Picture uploaded successfully!');
                window.location.href = 'myAccount';
            } else if (response.responseText == '2') {
                $('#fileStatus').html('File size should be less than 2MB');
            }
        }
    });
}


//IMAGE Uploading Function
function profileImage() {

    // function from the jquery form plugin
    $('#myFormPhoto').ajaxForm({
        beforeSend: function () {
            $('#fileStatus').html('Please wait...');
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $('#fileStatus').html('File transfer is going on. Please wait...');
        },
        success: function () {
            $('#btnUpload').hide();
            $('#btnNext').show();
            $('#fileStatus').html('Picture uploaded successfully!');
        },
        complete: function (response) {

            if (response.responseText == '0') {
                $('#fileStatus').html('Please check connection! An error occured.');
            } else if (response.responseText == '1') {
                $('#fileStatus').html('Picture uploaded successfully!');
                window.location.href = 'myAccount';
            } else if (response.responseText == '2') {
                $('#fileStatus').html('File size should be less than 2MB');
            }
        }
    });

}


//PDF Uploading Function
function profilePDF() {
    // function from the jquery form plugin
    $('#myFormPdf').ajaxForm({
        beforeSend: function () {
            $('#fileStatus').html('Please wait...');
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $('#fileStatus').html('File transfer is going on. Please wait...');
        },
        success: function () {
            $('#fileStatus').html('File uploaded successfully!');
        },
        complete: function (response) {
            if (response.responseText == '0') {
                $('#fileStatus').html('Please check connection! An error occured.');
            } else if (response.responseText == '1') {
                $('#fileStatus').html('File uploaded successfully!');
            }
        }
    });
}





//AUDIO Uploading Function
function profileAudio() {
    // function from the jquery form plugin
    $('#myFormAudio').ajaxForm({
        beforeSend: function () {
            $('#fileStatus').html('Please wait...');
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $('#fileStatus').html('File transfer is going on. Please wait...');
        },
        success: function () {
            $('#fileStatus').html('File uploaded successfully!');
        },
        complete: function (response) {
            if (response.responseText == '0') {
                $('#fileStatus').html('Please check connection! An error occured.');
            } else if (response.responseText == '1') {
                $('#fileStatus').html('File uploaded successfully!');
            }
        }
    });
}



//VIDEO Uploading Function
function profileVideo() {
    // function from the jquery form plugin
    $('#myFormVideo').ajaxForm({
        beforeSend: function () {
            $('#fileStatus').html('Please wait...');
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $('#fileStatus').html('File transfer is going on. Please wait...');
        },
        success: function () {
            $('#fileStatus').html('File uploaded successfully!');
        },
        complete: function (response) {
            if (response.responseText == '0') {
                $('#fileStatus').html('Please check connection! An error occured.');
            } else if (response.responseText == '1') {
                $('#fileStatus').html('File uploaded successfully!');
            }
        }
    });
}
