<!DOCTYPE html>
<html>
<head>
    <title>WHERESERT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/website.css">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<body>

    <!--Nav Starts-->
    <?php include_once('top.php'); ?>
    <!--Nav Ends-->


    <section class="section">
        <div class="container">
            <div class="columns is-tablet">
                <div class="column is-one-third-tablet">
                    <h1 class="subtitle">
                        Welcome to the world of skilled, professionals, and handicraft users.
                    </h1>

                    <div class="field has-addons">
                        <div class="control">
                            <input class="input myInput" type="text" placeholder="I am looking for...">
                        </div>
                        <div class="control">
                            <a class="button myButton">
                                Find Now
                            </a>
                        </div>
                    </div>

                    <div class="is-hidden-desktop">
                        <img src="images/wheresert-search.png" />
                    </div>

                    <div>
                        <h2 class="subtitle">
                            Popular Searches
                        </h2>

                        <div class="tags">
                            <span class="tag is-success">One</span>
                            <span class="tag is-success">Two</span>
                            <span class="tag is-success">Three</span>
                            <span class="tag is-success">Four</span>
                            <span class="tag is-success">Five</span>
                            <span class="tag is-success">Six</span>
                            <span class="tag is-success">Seven</span>
                            <span class="tag is-success">Eight</span>
                            <span class="tag is-success">Nine</span>
                            <span class="tag is-success">Ten</span>
                            <span class="tag is-success">Eleven</span>
                        </div>

                    </div>

                    <div class="colums" style="margin-top:30px">
                        <div class="column is-square is-pulled-left">
                            <img src="images/wheresert-community.png" />
                        </div>
                        <div class="column">
                            <h2 class="subtitle">
                                Join Comminuty
                            </h2>
                            <a href="#" class="button is-primary is-outlined">
                                Join Now
                            </a>
                        </div>
                    </div>

                </div>
                <div class="column is-square is-pulled-right is-hidden-mobile">
                    <img src="images/wheresert-search.png" />
                </div>
            </div>
        </div>
    </section>

    <!--Explore Professionals Start-->
    <?php include_once('exploreProfessionals.php'); ?>
    <!--Explore Professionals End-->

    <!--Visibile Only Desktop-->
    <section class="section is-hidden-mobile" style="margin-bottom:50px;">
        <div class="container">
            <div class="columns">
                <div class="column is-5">
                    <!--Left Columns Starts-->
                    <div class="columns">
                        <div class="column is-6">
                            <h2 class="halfTitle">
                                If you are <b>thinking</b> why do you want <b>WHERE</b><span>SERT</span>
                            </h2>
                            <a href="#" class="button is-danger is-outlined">
                                Know More
                            </a>
                        </div>

                        <div class="column is-6">
                            <img src="images/manHead.png" />
                        </div>
                    </div>
                    <!--Left Columns Ends-->
                </div>
                <div class="column">
                    &nbsp;
                </div>
                <div class="column is-5">
                    <!--Right Columns Starts-->
                    <div class="columns">
                        <div class="column is-6" style="text-align:right">
                            <h2 class="halfTitle">
                                Get connected and find people you know
                            </h2>
                            <a href="#" class="button is-danger is-outlined">
                                Know More
                            </a>
                        </div>

                        <div class="column is-6">
                            <img src="images/wheresert-people.png" />
                        </div>
                    </div>
                    <!--Right Columns Ends-->
                </div>
            </div>
        </div>
    </section>
    <!--Visibile Only Desktop-->

    <!--Visibile Only Mobile-->
    <section class="section is-hidden-desktop">
        <div class="container">
            <div class="columns is-mobile">
                <div class="column is-7 is-pulled-left">
                    <h2 class="halfTitle">
                        If you are <b>thinking</b> why do you want <b>WHERE</b><span>SERT</span>
                    </h2>
                </div>
                <div class="column is-5 is-pulled-right">
                    <img src="images/manHead.png" />
                </div>
            </div>
            <div class="columns is-mobile">
                <div class="column is-12" style="text-align:center">
                    <a href="#" class="button is-medium is-danger is-outlined">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--Visibile Only Mobile-->

    <!--Visibile Only Mobile-->
    <section class="section is-hidden-desktop" style="margin-bottom:50px;">
        <div class="container">
            <div class="columns is-mobile">
                <div class="column is-6 is-pulled-left">
                    <img src="images/wheresert-people.png" />
                </div>
                <div class="column is-6 is-pulled-right">
                    <h2 class="halfTitle">
                        Get connected and find people you know
                    </h2>
                </div>
            </div>
            <div class="columns is-mobile">
                <div class="column is-12" style="text-align:center">
                    <a href="#" class="button is-medium is-danger is-outlined">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--Visibile Only Mobile-->

    <!--Express Love Starts-->
    <img src="images/expressLove.png" class="expressLove is-hidden-mobile" />
    <img src="images/expressLove.png" class="expressLoveMobile is-hidden-desktop" />
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container" style="text-align:center">
                <h1 class="loveTitle">
                    If you <span>love</span> us then don’t forget to <span>express</span> it!
                </h1>
                <a href="#" class="button is-medium is-danger is-outlined">
                    Motivate Us
                </a>
            </div>
        </div>
    </section>
    <!--Express Love Ends-->

    <!--Testimonial Starts-->
    <?php include_once('testimonials.php'); ?>
    <!--Testimonial Ends-->

    <!--Footer Starts-->
    <?php include_once('footer.php'); ?>
    <!--Footer Ends-->

    <!--Copyrights Start-->
    <?php include_once('copyrights.php'); ?>
    <!--Copyrights End-->


    <script defer src="js/all.js"></script>

    <script>
    (function(){
        var burger=document.querySelector('.burger');
        var nav=document.querySelector('#'+burger.dataset.target);

        burger.addEventListener('click', function(){
            burger.classList.toggle('is-active');
            nav.classList.toggle('is-active');
        });
    })();
    </script>

</body>
</html>
