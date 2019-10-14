<h1 class="loveTitle">
    Select Suitable Skills!
</h1>

<div class="columns">
    <div class="column">
        <button class="button is-danger is-pulled-right" name="btnBack" id="btnBack">Go Back</button>
    </div>
</div>

<div class="columns" style="border-bottom:solid 1px #333; padding-bottom:60px">
    <div class="column showData"></div>
</div>


<script>
    $(document).ready(function() {
        var mainCatName = localStorage.getItem("mainCat");
        var mainCatID = localStorage.getItem("mainCatID");
        var subCatID = localStorage.getItem("subCatID");

        $.ajax({
            url: "profilePage03Data.php",
            method: "POST",
            data: {
                mainCat: mainCatName,
                mainCatID: mainCatID,
                subCatID: subCatID
            },
            success: function(data) {
                $('.showData').html(data);
            }
        });
        return false;
    });

</script>
