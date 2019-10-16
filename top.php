<div class="container">
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://www.wheresert.com">
                <img src="images/wheresert-logo.png" />
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarHome">
                <img src="images/burger-menu.png" style="margin-left:15px; margin-top:15px" />
            </a>
        </div>

        <div id="navbarHome" class="navbar-menu">

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <?php
                    error_reporting(0);
                    if($myEmail)
                    {
                    ?>
                        <a href="myAccount" class="button is-primary is-outlined">
                            My Account
                        </a>
                        <a href="wheresert-sign-out" class="button is-dark is-outlined">
                            Sign Out
                        </a>
                        <?php
                    }
                    else
                    {
                    ?>
                        <a href="wheresert-sign-up" class="button is-dark is-outlined">
                            Join Now
                        </a>
                        <a href="wheresert-sign-in" class="button is-primary is-outlined">
                            Sign In
                        </a>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
