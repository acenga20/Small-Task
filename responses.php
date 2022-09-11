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

    $messages = get_contacts();

?>
<div class="container">
    <h1><b>Responses submitted through the form.</b></h1>
    <br>
    <div class="row">
        <?php
        foreach($messages as $message){ ?>
            <div class="col-md-4 pet-list-item">
                <h2><?php echo $message['firstName']." ". $message['lastName'];?></h2>
                <p>
                    Email: <?php echo $message['email']; ?> <br>
                    Address: <?php echo $message['address']; ?><br>
                    Phone Number: <?php echo $message['phoneNr']; ?><br>

                </p>
                <p>
                    Message: <i><?php echo $message['message'];?></i>
                </p>
            </div>
        <?php } ?>

    </div>
</div>
<hr>

<?php
    require 'layout/footer.php';
?>