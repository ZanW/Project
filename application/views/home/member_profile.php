<?php
foreach ($user_values->result_array() as $value) {
    $firstName = $value['FirstName'];
    $Email = $value['Email'];
    $Apt_no = $value['Apt_no'];
    $Street = $value['Street'];
    $Postal_Code = $value['Postal_Code'];
    $City = $value['City'];
    $Country = $value['Country'];
    $Gender = $value['Gender'];
    $DOB = $value['DOB'];
}
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>member login</title>
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>

</head>
<body>
<div class="col-md-8">
    <div class="card" style="box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
         transition: all 0.3s cubic-bezier(.25,.8,.25,1);">

        <a href="<?php echo site_url('Event/index') ?>" style="margin-right: 20px;margin-top: 20px">Ctreate
            Event</a>
        <a href="<?php echo site_url('profile_update_con/inactive_account') ?>"
           style="margin-right: 20px;margin-top: 20px">inactive</a>

        <a href="<?php echo site_url('profile_update_con/edit_profile') ?>"
           style="margin-right: 20px;margin-top: 20px">Edit Profile</a>

    
        <h2 id="firstname" name="namefirst" style="margin-left: 20px"><?php echo $firstName; ?></h2>

        <h5 id="email" name="email" style="margin-left: 20px"><?php echo $Email ?></h5>
        <div class="information" style="margin-top: 30px; margin-left:30px ">
            <hr>

            <h5 style="margin-left: 20px"> Address</h5><br/>

            <div class="user_info">

                <p id="address" name="aptno" style="margin-left: 20px">
                    <?php echo $Apt_no ?>
                    <?php echo $Street ?>
                    <?php echo $Postal_Code ?>
                    <?php echo $City ?>
                    <?php echo $Country ?></p>

            </div>
            <hr>
            <h5 id="gender"> Gender</h5><br/>

            <div class="user_info" style="margin-left: 20px">
                <p id="gender" name="gender"><?php echo $Gender ?></p>
                <hr>
            </div>
            <h5 id="dob"> Date of Birth</h5> <br/>

            <div class="user_info" style="margin-left: 20px">
                <p id="dob" name="bday"></p><?php echo $DOB ?>
                <hr>
            </div>
            <p>My Interests</p><br/>
            <div class="user_info" style="margin-left: 20px">
                <?php foreach ($interest as $interest_item): ?>
                    <?php echo $interest_item['interest_member']; ?><br/>
                <?php endforeach; ?>

            </div>


            <div class="user_info" style="margin-left: 20px">
                <a id="link" href="<?php echo site_url('Member_report_con/index') ?>">Add Interest</a>
            </div>


        </div>
        <p>Recent Activity in your group</p>
        <br/>
        <div class="user_info" style="margin-left: 20px">
            <?php foreach ($content_data as $content): ?>
                <?php echo $content['post_message']; ?><br/>
                <img src="<?php echo base_url() . 'uploads/' . $content['file_path'] ?>"
                     class="img-responsive"><br/>
                <?php echo "posted by  " . $content['FirstName']; ?><br/>
                <?php echo "on  " . $content['dop']; ?><br/>
                <?php echo "in group " . $content['group_name']; ?><br/>
            <?php endforeach; ?>
            <hr>
        </div>

        <div class="events" style="margin-left: 20px">
            <?php foreach ($events as $event_log): ?>
                <?php
                if (!isset($event_log['date_final'])) {
                    echo $event_log['event_name'];
                    ?>
                    <form method="post" action="<?php echo site_url('Event/after_voting') ?>">
                        <input type="hidden" name="eventID" value="<?php echo $event_log['event_id']; ?>">
                        <input type="hidden" name="dateOne" value="<?php echo $event_log['date_option_one']; ?>">
                        <input type="hidden" name="dateTwo" value="<?php echo $event_log['date_option_two']; ?>">
                        <label class="radio-inline">
                            <input type="radio" name="selectedDate"
                                   value="<?php echo $event_log['date_option_one']; ?>">
                            <?php echo $event_log['date_option_one']; ?>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="selectedDate"
                                   value="<?php echo $event_log['date_option_two']; ?>">
                            <?php echo $event_log['date_option_two']; ?>
                        </label>
                        <input type="submit" value="Vote" name="vote">
                    </form>
                    <?php
                    if ($_SESSION['ID'] == $event_log['created_by_memid']) {
                        ?>
                        <form method="post" action="<?php echo site_url('Event/after_voting') ?>">
                            <input type="hidden" name="eventID" value="<?php echo $event_log['event_id']; ?>">
                            <input type="hidden" name="dateOne" value="<?php echo $event_log['date_option_one']; ?>">
                            <input type="hidden" name="dateTwo" value="<?php echo $event_log['date_option_two']; ?>">
                            <input type="submit" value="Close Voting" name="vote">
                        </form>
                        <?php
                    }
                    ?><br/>
                    <?php
                }
                ?>
            <?php endforeach; ?>
        </div>


    </div>

</div>

<script>
</script>

</body>
</html>