<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>member login</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<body>
<div class="panel panel-default" style="width: 400px;margin-right: auto;margin-left: auto;display: block">
    <div class="panel-heading"> Members</div>
    <table class="table">
        <tbody>
        <tr>
        <tr style="color: #2aabd2">
            <td>FirstName</td>
            <td> Interest</td>
            <td>City</td>

        </tr>

        </tr>

        <tr>
            <?php foreach ($Fname as $Firstname) { ?>
        <tr>
            <td><?php echo $Firstname ['FirstName']; ?></td>
            <td><?php echo $Firstname ['interest_member']; ?></td>
            <td><?php echo $Firstname ['City']; ?></td>

        </tr>
        <?php } ?>
        </tr>

        </tbody>
    </table>
    <table>

    </table>
</div>


</body>
</html>