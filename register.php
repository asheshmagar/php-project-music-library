<?php
include "includes/config.php";
include "includes/classes/Account.php";
include "includes/classes/Constants.php";
$account = new Account($con);

include "includes/handlers/login.handler.php" ;
include  "includes/handlers/register.handler.php" ;

function getInputValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to Spotify</title>
        <link rel="stylesheet" href="./style/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="assets/js/register.js"></script>
    </head>

    <body>
    <?php
        if(isset($_POST['registerButton'])){
            echo '<script>
                    $(document).ready(function () {
                        $("#loginForm").hide();
                        $("#registerForm").show();
                    });
                   </script>';
        }else{
            echo '<script>
                    $(document).ready(function () {
                        $("#loginForm").show();
                        $("#registerForm").hide();
                    });
                   </script>';
        }
    ?>

        <header class="main-header">
            <section class="header-title">
                <h1>Music For Life</h1>
            </section>
            <section class="header-subtitle">
                <p>access free unlimited high quality music FOREVER!</p>

            </section>
        </header>
        <div id="inputContainer" class="container">
            <div class="form-text">
                <h1>Get quality music for free!!</h1>
                <ul>
                    <li>Explore and find the music that calms your Soul !!</li>
                    <li>Listen to your favourite music anywhere & anytime!!</li>
                    <li>Create your own playlist.</li>
                </ul>


            </div>
            <form id="loginForm" action="register.php" method="POST" class="form-login">
                <h2>Login to your account</h2>
                <?php
                echo $account -> getError ( Constants::$loginFailed );
                ?>
                <br />

                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="loginUsername" placeholder="Enter your username." value="<?php getInputValue('loginUsername') ?>" required>
                <br />
                <label for="loginPassword">Password</label>

                <input type="password" id="loginPassword" name="loginPassword" placeholder="Enter your password."
                    required>
                <br />
                <button type="submit" name="loginButton">Login</button>
                <div class="hasAccountText">
                    <span id="hideLogin">
                        Don't have an account yet?
                        <br/>
                        Click here to Sign Up.
                    </span>
                </div>
            </form>
            <form id="registerForm" action="register.php" method="POST" class="form-register">
                <h2>Create account</h2>
                <br />
                <?php
                echo $account -> getError ( Constants::$userNameCharacter );
                ?><?php
                echo $account -> getError ( Constants::$usernameTaken );
                ?>
                <label for="registerUsername">Username</label>
                <input type="text" id="registerUsername" name="registerUsername" placeholder="Enter your username."
                    required value="<?php getInputValue('registerUsername') ?>">
                <br />
                <?php
                echo $account -> getError ( Constants::$firstNameCharacter );
                ?>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" value="<?php getInputValue('firstName') ?>" required>
                <br />
                <?php
                echo $account -> getError ( Constants::$lastNameCharacter );
                ?>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" value="<?php getInputValue('lastName') ?>" required>

                <?php
                echo $account -> getError ( Constants::$emailDoNotMatch );
                ?>
                <?php
                echo $account -> getError ( Constants::$emailInvalid );
                ?>
                <?php
                echo $account -> getError ( Constants::$emailTaken );
                ?>
                <br />
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="abc@email.com" value="<?php getInputValue('email') ?>" required>
                <br />
                <label for="email2">Confirm Email</label>
                <input type="email" id="email2" name="email2" placeholder="abc@email.com" value="<?php getInputValue('email2') ?>" required>
                <br />
                <?php
                echo $account -> getError ( Constants::$passwordsDoNotMatch );
                ?>
                <?php
                echo $account -> getError ( Constants::$passwordsNotAlphanumeric );
                ?>
                <?php
                echo $account -> getError ( Constants::$passwordsCharacter );
                ?>
                <label for="registerPassword">Password</label>
                <input type="password" id="registerPassword" name="registerPassword" placeholder="Enter your password." value="<?php getInputValue('registerPassword') ?>"
                    required>
                <br />
                <label for="registerPassword2">Confirm Password</label>
                <input type="password" id="registerPassword2" name="registerPassword2" value="<?php getInputValue('registerPassword2') ?>"
                    placeholder="Re-Enter your password." required>
                <br />
                <button type="submit" name="registerButton">Sign Up</button>
                <div class="hasAccountText">
                    <span id="hideRegister">
                        Already have an account?
                        <br/>
                        Click here to Login In
                    </span>
                </div>
            </form>


        </div>
    </body>

    </html>