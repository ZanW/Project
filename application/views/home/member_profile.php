<?php

include "header.php";
include "member_profile_values.php";
$id=session_id();
echo $id;
if (isset($_SESSION['USER_NAME'])) {
    $id = $_SESSION['USER_NAME'];
} else {
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>member login</title>
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-md-8">
        <div class="user_information">
            <img src="Picture1.jpg" class="img-circle" alt="Cinque Terre" width="90" height="90">

            <h2 id="firstname" name="namefirst"><?php echo $firstName ?></h2>

            <h5 id="email" name="email"><?php echo $Email ?></h5>
            <div class="information" style="margin-top: 30px; margin-left:30px ">
                <hr>
                <button id="edit" class="glyphicon glyphicon-pencil"></button>

                <h5> Address</h5><br/>

                <div class="user_info">

                    <p id="address" name="aptno">
                        <?php echo $Apt_no ?>
                        <?php echo $Street ?>
                        <?php echo $Postal_code ?>
                        <?php echo $City ?>
                        <?php echo $Country ?></p><p id="editable"></p>

                </div>
                <hr>
                <h5 id="gender"> Gender</h5><br/>

                <div class="user_info">
                    <p id="gender" name="gender" contenteditable="true"><?php echo $Gender ?></p>
                    <hr>
                </div>
                <h5 id="dob"> Date of Birth</h5> <br/>

                <div class="user_info">
                    <p id="dob" name="bday" contenteditable="true"></p><?php echo $DOB ?>
                    <hr>
                </div>

                <button id="update" class="btn btn-primary btn-xs" style="display:none; float: right"> Update</button>
            </div>
        </div>

    </div>
</div>

<script>
    var edit = document.getElementById('edit');
    var address = document.getElementById('address');
    edit.onclick = myFunction;
    function myFunction() {
        document.getElementById("address").contentEditable = true;
        //address.setAttribute('contenteditable', 'true');
    }
</script>

</body>
</html>