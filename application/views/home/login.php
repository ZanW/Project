<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>member login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login_style.css">
<link
    href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
    rel="stylesheet">
<script type="text/javascript"
    src="//code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="col-md-4">
            <section class="login_member">
                <h4>Welcome To POWON</h4>
                <form method="post" action="<?php echo site_url('members/validateMemberLogin')?>" role="login">
                    <input type="text" name="name" placeholder="User Name" required class="form-control input-lg" /> 
                    <input type="password" name="password" placeholder="Password" class="form-control input-lg"  />
                    <div class="pwstrength_viewport_progress"></div>
                    <button id="login" type="submit" class="btn btn-primary btn-md"
                        name="Login">Login in</button>
                    <div>
                        <div class="form-links">
                            <a
                                href="<?php echo site_url('nonmembers/openRegistrationPage')?>">Become
                                a Member </a> or <a href="<?php echo site_url('members/forgetPassword')?>">Reset Password</a>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <!-- <script type="text/javascript"> -->
    // document.getElementById("login").onclick = function () { //
    location.href =""; // };
    <!-- </script> -->

</body>
</html>
</body>
</html>