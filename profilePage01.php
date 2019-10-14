<style>
    .mainCat:hover {
        border: solid 4px #acd373;
        border-radius: 100px;
        cursor: pointer;
    }

    p {
        font-size: 12pt;
        font-weight: 600;
    }

</style>

<h1 class="loveTitle">
    Select Suitable Category!
</h1>

<div class="columns" style="border-bottom:solid 1px #333; padding-bottom:60px">
    <div class="column"></div>
    <div class="column">
        <form name="myProcessForm" id="myProcessForm" method="POST">
            <div class="columns">
                <div class="column">
                    <img src="images/wizardMainIcon_001.png" class="mainCat" myCat="Skilled" />
                    <p>Skilled</p>
                </div>
                <div class="column">
                    <img src="images/wizardMainIcon_002.png" class="mainCat" myCat="Professional" />
                    <p>Professional</p>
                </div>
                <div class="column">
                    <img src="images/wizardMainIcon_003.png" class="mainCat" myCat="Handicraft" />
                    <p>Handicraft</p>
                </div>
            </div>
        </form>
    </div>
    <div class="column"></div>
</div>

<script>
    $(document).ready(function() {

        localStorage.removeItem('mainCat');
        localStorage.removeItem('mainCatID');
        localStorage.removeItem('subCatID');

        $('.mainCat').click(function() {
            var myCat = $(this).attr('myCat');
            localStorage.setItem('mainCat', myCat);
            //Page Count Number
            $('.pageCount').text('2');
            //Load Next Page
            $('.profilePages').load('profilePage02');
        });
    });

</script>
