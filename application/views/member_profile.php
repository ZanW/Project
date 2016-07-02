<?php include "header.php";?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>member login</title>
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-md-8" >
        <div class="user_information">
       <img src="Picture1.jpg" class="img-circle" alt="Cinque Terre" width="90" height="90">
        <h2>User Name</h2>
        <h5>xyz@xyz.com</h5>
        </div>
        <div class="button">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Information</button>
            <div id="demo" class="collapse" style="margin-top: 10px">
              <p class="edit_text">Fname </br> Lname  </p></br>
            </div>
        </div>
        </div>
    </div>
    
    
</div>
<script>

$('.edit_text').click(function(){
var name = $(this).text();
$(this).html('');
$('<input>')
.attr({
'type': 'text',
'name': 'fname',
'size': '30',
'value': "name",
})
.appendTo('.edit_text');
$('.edit_text').focus();
});
</script>

</body>
</html>