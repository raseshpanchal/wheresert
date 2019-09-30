<!--Nav for Desktop-->
<nav class="navbar is-fixed-top is-hidden-mobile" role="navigation" aria-label="main navigation" style="padding-left:80px; padding-right:80px; padding-top:10px; padding-bottom:10px; border-bottom:solid 1px #ccc">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://www.wheresert.com">
            <img src="images/wheresert-logo.png" />
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarDesktop">
            <img src="images/burger-menu.png" style="margin-left:15px; margin-top:15px" />
        </a>
    </div>

    <div id="navbarDesktop" class="navbar-menu">

        <div class="navbar-end">
            <div class="navbar-item">
                <h3>Search profile</h3>
                &nbsp;&nbsp;&nbsp;
                <form name="myForm" id="myForm" method="POST">
                    <div class="field has-addons">
                        <div class="control">
                            <input class="input myInput" name="txt_search" id="txt_search" type="text" placeholder="eg. Driver">
                        </div>
                        <div class="control">
                            <button class="button myButton" id="btnFind">Find Now</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="navbar-item">
                <div class="buttons">
                    <a href="wheresert-sign-up" class="button is-dark is-outlined">
                        Join Now
                    </a>
                    <a href="wheresert-sign-in" class="button is-primary is-outlined">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!--Nav for Desktop-->

<!--Nav for Mobile-->
<nav class="navbar is-fixed-top is-hidden-desktop" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://www.wheresert.com">
            <img src="images/wheresert-logo.png" />
        </a>

        <a role="button" class="navbar-burger burgerMobile" aria-label="menu" aria-expanded="false" data-target="navbarMobile">
            <img src="images/burger-menu.png" style="margin-left:15px; margin-top:15px" />
        </a>
    </div>

    <div id="navbarMobile" class="navbar-menu">

        <div class="navbar-end">
            <div class="navbar-item">
                <h3>Search profile</h3>
                &nbsp;&nbsp;&nbsp;
                <form name="myFormMobile" id="myFormMobile" method="POST">
                    <div class="field has-addons">
                        <div class="control">
                            <input class="input myInput" name="txt_search" id="txt_search" type="text" placeholder="eg. Driver">
                        </div>
                        <div class="control">
                            <button class="button myButton" id="btnFindMobile">Find Now</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-dark is-outlined">
                        Join Now
                    </a>
                    <a class="button is-primary is-outlined" href="wheresert-sign-up">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!--Nav for Mobile-->
