<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login_style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <script>
        function checkemail()
        {

            var email=document.getElementById( "email" ).value;

            if(email)
            {
                $.ajax({
                    type: 'post',
                    url: 'register_session.php',
                    data: {
                        user_email:email,
                    },
                    success: function (response) {
                        $( '#email_status' ).html(response);
                        if(response=="OK")
                        {
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                });


            }
            else
            {
                $( '#email_status' ).html("");
                return false;
            }

        }

    </script>
</head>
<body>

<div class="container">
    <div class="col-md-4" />

    <div class="col-md-4">
        <section class = "login_member2">
            <h4>Register To POWON </h4>
            <form id="form1" method="post" action="<?=site_url('nonmembers/register_session');?>" role="login">
                <div class="name">
                <input type="text" name="namefirst" placeholder="First Name" required class="form-control input-lg" />
                <input type="text" name="namelast" placeholder="Last Name"  required class="form-control input-lg" /> </div>
                <div class ="password">
                <input type="password" class="form-control input-lg" id="password" name="reg_password" placeholder="Password" required class="form-control input-lg" />
                <input type="password" class="form-control" id="password_confirm" name="reg_password_confirm" placeholder="confirm password" required class="form-control input-lg">
                <div class="pwstrength_viewport_progress"></div>
                </div>
                <div class="form-details">
                <input type="email" method="get" name="email" id="email" placeholder="Email" required class="form-control input-lg" onkeyup="checkemail()" ;/>
                    <span id="email_status"></span>
                <input type="date" name="bday" placeholder="yyyy-mm-dd">
                </div>
                <div class="form-address">
                    <h4>Address</h4>
                    <input type="text" name="aptno" placeholder="Apartment No." required class="form-control input-lg" />
                    <input type="text" name="street" placeholder="Street" required class="form-control input-lg"/>
                    <input type="text" name="city" placeholder="City" required class="form-control input-lg"/>
                    <input type="text" name="code" placeholder="postal Code" required class="form-control input-lg"/>
                    <input type="text" name="country" placeholder="Country" required class="form-control input-lg"/>
                </div>
                <div class="checkbox">
                    <h4>Select Gender</h4>
                <input type="radio" name="gender" id="male" placeholder="Male" class="regular-checkbox big-checkbox"value="male">
                <label for="male">Male</label>
                <input type="radio"  name="gender" id="Female" placeholder="Female" class="regular-checkbox big-checkbox" value="Female" >
                <label for="Female">Female </label></div>

                <button type="submit" id="register" class="btn btn-primary btn-md" name="Login">Register</button>
                <div>
                    <div class="form-links">
                        <a href="<?php echo site_url('home/login')?>">Already a Member </a> or <a href="<?php echo site_url('members/forgetpassword')?>">Reset Password</a>
                    </div>

                </div>
            </form>
        </section>
    </div>
</div>




</body>
</html>