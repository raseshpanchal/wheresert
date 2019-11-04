<h1 class="loveTitle">
    Your Contact Information
</h1>

<div class="columns">
    <div class="column"></div>
    <div class="column">

        <form name="myProcessForm" id="myProcessForm" method="POST">

            <div class="columns">
                <div class="column">
                    <input type="text" class="input customInput" name="txt_profile" id="txt_profile" placeholder="Profile Name* (eg. Your Name OR Business)">
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <input type="text" class="input customInput" name="txt_designation" id="txt_designation" placeholder="Designation* (eg. Designer)">
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <input type="text" class="input customInput" name="txt_mobile" id="txt_mobile" placeholder="Contact Number*">
                </div>
                <div class="column">
                    <input type="text" class="input customInput" name="txt_email" id="txt_email" placeholder="Email ID*">
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <input type="text" class="input customInput" name="txt_address" id="txt_address" placeholder="Address*">
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <input type="text" class="input customInput" name="txt_city" id="txt_city" placeholder="City Name*">
                </div>
                <div class="column">
                    <input type="text" class="input customInput" name="txt_state" id="txt_state" placeholder="State Name">
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

            var newDesignation = $('#txt_designation').val();
            var newMobile = $('#txt_mobile').val();
            var newEmail = $('#txt_email').val();
            var newCity = $('#txt_city').val();

            if (newDesignation == '' || newMobile == '' || newEmail == '' || newCity == '') {
                $('#alert').html('<span style="color:red">All fields are mandatory!</span>');
            } else {
                $('#alert').html('<span style="color:#333">Please wait...</span> Processing...');

                $.post("app/profilePage04Entry",
                    $("#myProcessForm").serialize(),
                    function(data) {

                        if (data == 'fieldsErr') {
                            $('#alert').html('<span style="color:red">All fields are mandatory!</span>');
                            $('.btnLogin').attr("disabled", false);
                        } else if (data == '0') {
                            $('#alert').html('<span style="color:red">Please check connection!</span>');
                            $('.btnLogin').attr("disabled", false);
                        } else if (data == '1') {
                            $('#alert').html('<span style="color:blue">Submitted successfully!</span>');
                            //Page Count Number
                            $('.pageCount').text('5');
                            //Load Next Page
                            $('.profilePages').load('profilePage05');
                        }
                    });



            }

            return false;
        });



    });

</script>
