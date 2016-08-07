<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

</head>
<body>

<div class="container">
    <div class="col-md-4" />

    <div class="col-md-4">
        <section class = "login_member2">
            <h4>Register To POWON </h4>
            <form method="post" action="text" role="login">
                <div class="name">
                <input type="text" name="name" placeholder="First Name" required class="form-control input-lg" />
                <input type="text" name="name" placeholder="Last Name"  required class="form-control input-lg" /> </div>
                <div class ="password">
                <input type="password" class="form-control input-lg" id="password" placeholder="Password" required class="form-control input-lg" />
                <input type="password" class="form-control" id="password_confirm" name="reg_password_confirm" placeholder="confirm password" required class="form-control input-lg">
                <div class="pwstrength_viewport_progress"></div>
                </div>
                <div class="form-details">
                <input type="email" name="name" placeholder="Email" required class="form-control input-lg" />
                <input type="date" name="bday" placeholder="yyyy-mm-dd">
                </div>
                <div class="form-address">
                    <h4>Address</h4>
                    <input type="text" name="adress" placeholder="Apartment No." required class="form-control input-lg" />
                    <input type="text" name="adress" placeholder="Street" required class="form-control input-lg"/>
                    <input type="text" name="adress" placeholder="City" required class="form-control input-lg"/>
                    <input type="text" name="adress" placeholder="postal Code" required class="form-control input-lg"/>
                    <input type="text" name="adress" placeholder="Country" required class="form-control input-lg"/>
                </div>
                <div class="checkbox">
                    <h4>Select Gender</h4>
                <input type="radio"  name="reg_gender" id="male" placeholder="Male" class="regular-checkbox big-checkbox">
                <label for="male">Male</label>
                <input type="radio"  name="reg_gender" id="Female" placeholder="Female" class="regular-checkbox big-checkbox"  >
                <label for="Female">Female </label></div>

                <button type="submit" id="register" class="btn btn-primary btn-md" name="Login">Register</button>
                

                <div>
                    <div class="form-links">
                        <a href="login.php">Already a Member </a> or <a href="#">Reset Password</a>
                    </div>

                </div>
            </form>
        </section>
    </div>
</div>

<script type="text/javascript">
    document.getElementById("register").onclick = function () {
        location.href = "member_profile.php";
    };
</script>

</body>
</html>