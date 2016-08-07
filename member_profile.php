<?php?>
/**
 * Created by PhpStorm.
 * User: jaya1
 * Date: 2016-06-22
 * Time: 6:44 PM
 */
<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <title>Member Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="member_profile.php">POWON</a>
        </div>
        <div class="collapse navbar-collapse" id="Navbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Profile</a></li>
                 <li><a href="#">Home</a></li>
                <li><a href="#">Group</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Settings</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
<div class="side_nav" >

    <a href="#">Home</a></br>
    <a href="#">Message</a></br>
    <a href="#">Group Member</a></br>

</div>

    <div class="Profile"  align="center">
        <h1>User Name<small> </small></h1>
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#Info">Personal Information</button>
        <div id="Info" class="collapse">
           <h5> Address</h5>
        </div>
    </div>
    </div>



</div>

</body>
</html>