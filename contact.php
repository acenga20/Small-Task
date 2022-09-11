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
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(array_key_exists('firstName',$_POST)){
            $firstName = $_POST['firstName'];
        }else{
            $firstName = '';
        }
        if(array_key_exists('lastName',$_POST)){
            $lastName = $_POST['lastName'];
        }else{
            $lastName = '';
        }
        if(array_key_exists('email',$_POST)){
            $email = $_POST['email'];
        }else{
            $email = '';
        }
        if(array_key_exists('address',$_POST)){
            $address = $_POST['address'];
        }else{
            $address = '';
        }
        if(array_key_exists('phoneNr',$_POST)){
            $phoneNr = $_POST['phoneNr'];
        }else{
            $phoneNr = '';
        }
        if(array_key_exists('message',$_POST)){
            $message = $_POST['message'];
        }else{
            $message = '';
        }
        $messages = get_contacts();
        $newMessage = array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'address' => $address,
                'phoneNr' => $phoneNr,
                'message' => $message,
        );

        $messages[] = $newMessage;
        $result = save_contacts($messages);
        if($_SESSION['role'] == 'ADMIN'){
            header("Location: responses.php");
        }
        else{
            echo '<script>alert("Message sent successfully")</script>';
        }



    }
?>
<div class="container">
    <div class="row">
        <h1>Welcome to the Contact Page!</h1>
        <p>Feel free to leave your thoughts in the below form.</p>
        <div class="col-xs-6" >
            <form method = "POST" action="contact.php">
                <h1><b>Contact Form</b></h1>
                <div class="form-group">
                    <label>First Name:</label><input type="text" name="firstName" placeholder="First Name" class="form-control">
                </div>
                <div class="form-group">
                    <label>LastName</label><input type="text" name="lastName" placeholder="Last Name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label><input type="text" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address:</label><input type="text" name="address" placeholder="Address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone Number:</label><input type="text" name="phoneNr" placeholder="Phone Number" class="form-control">
                </div>
                <div class="form-group">
                    <label>Your message:</label><textarea  name="message" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>

    </div>
</div>
<br><br>
<?php
require 'layout/footer.php';
?>