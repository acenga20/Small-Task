<?php
require 'layout/header.php';
require 'lib/functions.php';
?>
<?php


session_start();
$_SESSION;
if(isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN'){
    require 'layout/headerAdmin.php';

}elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'SIMPLE') {
    require 'layout/headerUser.php';
}else{
    require 'layout/header.php';
}
    if(isset($_POST['submit'])){
        save_person();
    }
?>
    <div class="jumbotron">
        <div class="container">
            <h1>Registration Page</h1>
        </div>
    </div>


    <div class="container">
        <div class="row" >
                <div class="col-xs-6" style="justify-content: center">
                    <h2>Registration Form</h2> <br>
                    <form method="POST" action ="index.php" style="align-content: center">
                        <div class="form-group">
                            <label>Name:</label><input type="text" placeholder="Name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>UserName:</label><input type="text" placeholder="userName" name="userName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email:</label><input type="text" name = "email" placeholder="Email" class="form-control">
                        </div>
                        <?php
                            if(isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN'){
                                echo  '<div class="form-group">
                                       <label>Role:</label><input type="text" placeholder="Role" name = "role"class="form-control">
                                       </div>';
                            }
                        ?>

                        <div class="form-group">
                            <label>Password:</label><input type="password" placeholder="Password" name = "password"class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label><input type="password" placeholder="Re-confirm" name = "confirmedPass"class="form-control">
                        </div>

                        <button name="submit" type="submit" class="btn btn-success">Sign Up</button>
                    </form>
                </div>
        </div>
    </div>

    <hr>

<?php  require 'layout/footer.php'?>