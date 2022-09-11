<?php

require 'lib/functions.php';
session_start();
$_SESSION;
if(isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN'){
    require 'layout/headerAdmin.php';

}elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'SIMPLE') {
    require 'layout/headerUser.php';
}else{
    require 'layout/header.php';
}
?>
<?php

//$user_data = check_login();

if(isset($_POST['submit'])){
    log_in();
}
?>

        <div class="jumbotron">
            <h1>You can log into your account through this page</h1>
        </div>



    <div class="container">
        <div class="row" >
            <div class="col-xs-6" style="justify-content: center">
                <h1>Sign-in Form</h1> <br>
                <form method="POST" action ="signin.php" style="align-content: center">
                    <div class="form-group">
                        <label>Username:</label><input type="text" placeholder="Username" name="userName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password:</label><input type="password" placeholder="Password" name="password" class="form-control">
                    </div>

                    <button name="submit" type="submit" class="btn btn-success">Sign In</button>

                </form>

                Not registered?<a href="signup.php ">Click here!</a>
            </div>
        </div>
    </div>

    <hr>

<?php  require 'layout/footer.php'?>