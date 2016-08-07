<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <title>Pogwon</title> over write by specific view page-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
            <a class="navbar-brand" href="<?php echo base_url("index.php/home/index");?>">POWON</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url("index.php/home/index");?>">Home</a></li>
                <li><a href="<?php echo base_url("index.php/home/member_profile");?>">Profile</a></li>
                <li><a href="<?php echo base_url("index.php/members/index");?>">Members</a></li>
                <li><a href="<?php echo base_url("index.php/home/index");?>">Groups</a></li>
                            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=<?php echo site_url("membership/pay_now");?>><span class="glyphicon glyphicon-random"></span>Pay Now</a></li>
                <li><a href="<?php echo site_url('home/login')?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="side_nav" style="background-color: white" >
        <div class="card"  style=" box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);height: 400px;">
            <a href='<?php if (isset($_SESSION['ID'])) echo base_url("index.php/email/inbox/".$_SESSION['ID']);
                       else echo base_url("index.php/home/index");  ?>' style="margin-left: 20px">My Inbox</a><br>
         <a href="#" style="margin-left: 20px">Home</a></br>
        <a href="<?php echo site_url("Chat/index");?>" style="margin-left: 20px">Message</a></br>
        <a href="<?php echo site_url("group/index");?>" style="margin-left: 20px">My Groups</a></br>
        </div>
    </div>



</body>
</html>

