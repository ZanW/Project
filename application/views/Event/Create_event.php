<?php $user_id = $_SESSION['ID'] ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<body>
<div class="col-lg-6" style="padding: 3% ">
    <form method="post" action="<?php echo site_url('event/create_event') ?>">
        <div class="input-group" style="padding: 2%">
            <span class="input-group-addon" id="basic-addon1">Event</span>
            <input type="text" class="form-control" name='event' placeholder="Event Name"
                   aria-describedby="basic-addon1"
                   required>
        </div>

        <div class="input-group" style="padding: 2%">

            Select group:
            <select name="g_name" id="mySelect">
                <?php foreach ($groups as $group) { ?>
                    <option><?php echo $group ['group_name']; ?></option>
                <?php } ?>
            </select>
            <!--                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"-->
            <!--                        aria-expanded="false">Group<span class="caret"></span></button>-->
            <!--                <ul class="dropdown-menu">-->
            <!--                    <li>-->
            <!--                        --><?php //foreach ($groups as $group) { ?>
            <!--                        <option data-name='g_name'>-->
            <?php //echo $group ['group_name']; ?><!--</option>-->
            <!---->
            <!--                    <li>--><?php //} ?><!--  </li>-->
            <!--                </ul>-->


        </div>

        <div class="input-group" style="padding: 2%">
            <span class="input-group-addon">Event Date</span>
            <input type="date" name="date_one" placeholder="yyyy-mm-dd" required>
            <span>Option one</span>

        </div>
        <div class="input-group" style="padding: 2%">
            <span class="input-group-addon">Event Date</span>
            <input type="date" name="date_two" placeholder="yyyy-mm-dd" required>
            <span>Option two</span>

        </div>
        <button type="submit" id="event" class="btn btn-primary btn-md">Crete Event</button>
    </form>
</div>


</body>

<script>
    function myFunction() {
        document.getElementById("mySelect").value = innerHTML;
    }
</script>

</html>