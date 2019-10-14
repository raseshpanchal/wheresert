<h1 class="loveTitle">
    Your profile in short!
</h1>

<div class="columns">
    <div class="column"></div>
    <div class="column">

        <form name="myProcessForm" id="myProcessForm" method="POST">

            <div class="columns">
                <div class="column">
                    <textarea class="textarea customInput has-fixed-size" name="txt_info" id="txt_info" rows="6" cols="50" placeholder="Your short profile*"></textarea>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <button class="button is-danger is-pulled-right" name="btnSubmit" id="btnSubmit">Next</button>
                </div>
            </div>

            <div class="columns">
                <div class="column" style="text-align:left; color:red;">
                    <span id="alert"></span>
                </div>
            </div>
        </form>

    </div>
    <div class="column"></div>
</div>


<script>
    $(document).ready(function() {


        $('#btnSubmit').click(function() {

            $('#alert').html('<span style="color:#333">Please wait...</span>');

            $('#btnSubmit').attr("disabled", true);

            var newInfo = $('#txt_info').val();

            if (newInfo == '') {
                $('#alert').html('<span style="color:red">Mandatory field!</span>');
            } else {
                $('#alert').html('<span style="color:#333">Please wait...</span> Processing...');

                $.post("app/profilePage05Entry",
                    $("#myProcessForm").serialize(),
                    function(data) {

                        if (data == 'fieldsErr') {
                            $('#alert').html('<span style="color:red">Mandatory field!</span>');
                            $('.btnLogin').attr("disabled", false);
                        } else if (data == '0') {
                            $('#alert').html('<span style="color:red">Please check connection!</span>');
                            $('.btnLogin').attr("disabled", false);
                        } else if (data == '1') {
                            $('#alert').html('<span style="color:blue">Submitted successfully!</span>');
                            //Page Count Number
                            $('.pageCount').text('6');
                            //Load Next Page
                            $('.profilePages').load('profilePage06');
                        }
                    });



            }

            return false;
        });



    });

</script>
