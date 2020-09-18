<?php

$login_status = "";


require_once('includes/header.php');
?>

    <div class="container wrapper">
        
        <div class="col-xs-6 col-xs-offset-2">
            <?php
            if( isset( $_GET['ls'] ) ) {
                $login_status = $_GET['ls'];


                if ($login_status == 1) {
                    echo "<p class='lead'>You are logged in as <span class='text-success text-uppercase'>", $_SESSION['login'], "</span></p>";
                    echo "<a class='btn btn-danger' href='logout.php'>LOG OUT</a><br>";
                    header( "Refresh:3; url=useraccount.php", true, 303);
                } elseif ($login_status == 2) {
                    echo "<h1>Login</h1>";
                    echo "<p class='lead text-danger'>Incorrect user name/password combination.</p>";
                } elseif ($login_status == 3) {
                    echo "<h1>Login</h1>";
                    echo "<p class='lead text-success'>Thank you. Your account has been created.</p>";
                    echo "<a class='btn btn-danger' href='logout.php'>LOG OUT</a><br>";
                    header( "Refresh:3; url=useraccount.php", true, 303);
                }
            }else {
                echo "<p class='lead'>You are not logged in. Please login or <a href='registrationform.php'>create</a> a new account</p>";
            }

            if ( $login_status != 1 && $login_status != 3 ) { ?>
                <form class="form-horizontal" role="form" action="login.php" method="post">
                    <div class="form-group">
                        <label for="newUserName" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="newUserName" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newPassword" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">SIGN IN</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
