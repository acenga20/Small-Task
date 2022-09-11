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

require 'lib/functions.php';
?>
<?php


?>

    <div class="jumbotron">
        <div class="container">
            <h1>Task Page</h1>
            WELCOME!!
        </div>
    </div>




    <hr>

<?php  require 'layout/footer.php'?>