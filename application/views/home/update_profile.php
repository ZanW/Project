<?php

foreach ($user_info->result_array() as $value) {
    $firstName = $value['FirstName'];
    $lastName = $value['LastName'];
    $password = $value['Password'];
    $password = $value['Password'];
    $Email = $value['Email'];
    $Apt_no = $value['Apt_no'];
    $Street = $value['Street'];
    $Postal_Code = $value['Postal_Code'];
    $City = $value['City'];
    $Country = $value['Country'];
    $Male = $value['Gender'];
    $Female = $value['Gender'];
    $DOB = $value['DOB'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/login_style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

</head>
<body>

<div class="container">
    <div class="col-md-4">

    <div class="col-md-4">
        <section class="login_member2">
            <h4>Update Details </h4>
            <form id="form1" action="<?php echo site_url('profile_update_con/update_info') ?>" method="post" role="login">
                <div class="name">
                    <input type="text" name="namefirst" value="<?php echo $firstName ?>"
                           class="form-control input-lg"/>
                    <input type="text" name="namelast" value="<?php echo $lastName ?>"
                           class="form-control input-lg"/></div>
                <div class="password">
                    <input type="password" class="form-control input-lg" id="password"
                           value="<?php echo $password; ?>" name="reg_password"
                           class="form-control input-lg"/>
                    <input type="password" class="form-control" id="password_confirm"
                           value="<?php echo $password; ?>" name="reg_password_confirm"

                           class="form-control input-lg">
                    <div class="pwstrength_viewport_progress"></div>
                </div>
                <div class="form-details">
                    <input type="email" method="get" name="email" value="<?php echo $Email; ?>" id="email"
                           class="form-control input-lg" />
                    <span id="email_status"></span>
                    <input type="date" name="bday" <?php echo $DOB; ?>>
                </div>
                <div class="form-address">
                    <h4>Address</h4>
                    <input type="text" name="aptno" value="<?php echo $Apt_no; ?>"
                           class="form-control input-lg"/>
                    <input type="text" name="street" value=<?php echo $Street; ?>
                    class="form-control input-lg"/>
                    <input type="text" name="city" value=<?php echo $City; ?>
                    class="form-control input-lg"/>
                    <input type="text" name="code" value=<?php echo $Postal_Code; ?>
                    class="form-control input-lg"/>
                    <input type="text" name="country" value=<?php echo $Country; ?>
                    class="form-control input-lg"/>
                </div>
                <div class="checkbox">
                    <h4>Select Gender</h4>
                    <input type="radio" name="gender" id="male" value=<?php echo $Male; ?>
                    class="regular-checkbox big-checkbox">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="Female"
                           value=<?php echo $Female; ?>class="regular-checkbox big-checkbox">
                    <label for="Female">Female </label></div>

                <div>
                    <button type="submit" id="register" class="btn btn-primary btn-md" name="Login">Update</button>
                </div>
            </form>


        </section>
    </div>
</div>


</body>
</html>