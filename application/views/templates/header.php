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
            <label class="navbar-brand">POWON</label>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url("login_con/displayHomePage");?>">Home</a></li>
                <li><a href='<?php if (isset($_SESSION['ID'])) echo base_url("index.php/group/index/".$_SESSION['ID']);
                    else echo base_url("index.php/home/index");  ?>'>Groups</a></li>
                <li><a href='<?php echo base_url("index.php/memberof_c/");?>'>Group List</a> </li>
                <li><a href='<?php if (isset($_SESSION['ID'])) echo base_url("index.php/email/inbox/".$_SESSION['ID']);
                    else echo base_url("index.php/home/index");  ?>'>Inbox</a></li>
                <li><a href="<?php echo site_url("Chat/index");?>">Message</a></li>
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
            <?php if ( isset($_SESSION['privilege']) && $_SESSION['privilege'] == 1) { ?>
                <a href="<?php echo base_url("index.php/home/admin");?>" style="margin-left: 20px">Administrator</a></br>
            <?php } ?>

            <a href='<?php if (isset($_SESSION['ID'])) echo base_url("index.php/group/index/".$_SESSION['ID']);
                    else echo base_url("index.php/home/index");  ?>' style="margin-left: 20px">My Group</a><br>

            <a href='<?php echo base_url("index.php/memberof_c/");?>' style="margin-left: 20px">Group List</a> <br>

            <a href='<?php if (isset($_SESSION['ID'])) echo base_url("index.php/email/inbox/".$_SESSION['ID']);
                       else echo base_url("index.php/home/index");  ?>' style="margin-left: 20px">My Inbox</a><br>

            <a href="<?php echo base_url("index.php/Chat/index");?>" style="margin-left: 20px">Message</a></br>



        </div>
    </div>



</body>
</html>

