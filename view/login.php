<?php include("view/header.php") ?>

    <secion id="login_or_signup" class="section-p1">
        <div>
            <form action="." method="post" id="login_form" class="login_form">
                <input type="hidden" name="action" value="loggedin_home_page">
                <h1>Login</h1>
                <?php if(($loggin_failed == true)) { ?> <h2 style="color:red;"> The username or password you entered in incorrect. </h2> <?php } ?>
                <div class="container">
                    <div>
                        <label for="Username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>
                    </div>
                    
                    <div>
                        <label for="psd"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psd" required>
                    </div>  

                    <input type="submit" name="" value="Login">
                </div>
                <div>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
                </form>

            <form action="." method="post" id="signup_form" class="signup_form">
                <input type="hidden" name="action" value="account_created_page">
                <div class="container">
                    <h1>Sign Up</h1>
                    <p>Please fill in this form to create an account.</p>
                    <?php if(($signup_failed == true)) { ?> <h2 style="color:red;"> The username you entered has already been taken. </h2> <?php } ?>
                    <?php if(($match_failed == true)) { ?> <h2 style="color:red;"> Password and Repeat Password did not match. </h2> <?php } ?>
                    <hr>

                    <div>
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>
                        <abbr data-title='Will be used to log in, and must be unique.'>?</abbr>
                    </div>

                    <div>
                        <label for="fname"><b>First Name</b></label>
                        <input type="text" placeholder="Enter First Name" name="fname" required autocomplete="on" >
                    </div>

                    <div>
                        <label for="lname"><b>Last Name</b></label>
                        <input type="text" placeholder="Enter Last Name" name="lname" required autocomplete="on" >
                    </div>

                    <div>
                        <label for="email"><b>Email</b></label>
                        <input type="email" placeholder="Enter Email" name="email" required>
                        <abbr data-title='Only used if necissary guidance is needed with your purchases.'>?</abbr>
                    </div>

                    <div>
                        <label for="phone"><b>Phone Number</b></label>
                        <input type="text" placeholder="Enter Phone Number" name="phone" placeholder="123-456-7890"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                        <abbr data-title='Must be formatted as 123-456-7890 (with dashes). Only used if necissary guidance is needed with your purchases.'>?</abbr>

                    </div>
                    
                    <div>
                        <label for="psd"><b>Password</b>
                        <input type="password" onkeyup='check();' placeholder="Enter Password" name="psd" id="psd" required maxlength="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                        <abbr data-title='Must contain at least one number, one uppercase letter, one lowercase letter, and at least 8 or more total characters.'>?</abbr>
                        </label>
                    </div>
                    
                    <div>
                        <label for="psd-repeat"><b>Repeat Password</b>
                        <input type="password" onkeyup='check();' placeholder="Repeat Password" name="psd-repeat" id="psd-repeat" required maxlength="50"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                        <span id='message'></span>
                        </label>
                    </div>

                        

                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                    <button type="submit" class="signupbtn" onclick='signup();'>Sign Up</button>
                </div>
            </form>
        </div>
    <section>
<!--
     <section id="newsletter" class="section-p1">
            <div class="newstext">
                <h4>Sign Up For Newsletters</h4>
                <p>Get E-mail updates about our latest show and <span>special offers.</span></p>
            </div>
            <div class="form">
                <input type="text" placeholder="Your email address">
                <button class="normal">Sign Up</button>
            </div>
        </div>
    </section>
-->
    <?php include("view/footer.php") ?>