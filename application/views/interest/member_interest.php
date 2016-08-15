<?php ?>
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

<div class="container">
    <div class="col-md-6">
        <section class="login_member">

            <form method="post" action="<?php echo site_url('Member_report_con/interest') ?>">
                <input type="text" name="name" placeholder="Enter One Interest" required class="form-control"/>

                <button id="login" type="submit" class="btn btn-primary btn-md"
                        name="Login">ADD
                </button>
                <div>
                </div>
            </form>
        </section>
    </div>
</div>
</body>

<
</html>