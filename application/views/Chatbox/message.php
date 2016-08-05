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
<style>
    .btn-default {

        margin-left: 25px;
        margin-bottom: 20px;

    }

</style>

<body>

<div class="card" id="card-message-send" style=" box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);width: 400px; margin-left: 50px;float: left">
    <div class="card-block">
        <h4 class="card-title">Your Messages</h4>
        <hr style="width: 100%">
        <div id="wrapper">
            <div id="menu">
                <div id="user"></div>
                <div id="chatbox" class="card-text" style="margin-left: 10px">
                    <!--                    --><?php
                    //                    if (file_exists("log.json") && filesize("log.json") > 0) {
                    //                        $handle = fopen("log.json", "r");
                    //                        $contents = fread($handle, filesize("log.json"));
                    //                        fclose($handle);
                    //
                    
                    //                        echo $contents;
                    //                    }
                    //                    ?>
                </div>
            </div>

        </div>

        <div id="chatbox"></div>

        <form name="message">
            <input name="usermsg" class="form-control" type="text" id="usermsg" size="63"
                   style="width: 300px;margin-left: 30px"/>
            <input name="submitmsg" class="btn btn-info" type="button" id="submitmsg" value="Send"
                   style="margin-top: 30px;margin-bottom: 10px;margin-left: 20px"/>
        </form>
    </div>
</div>
<div class="card" style=" box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);width: 200px;float: right;margin-right: 250px">
    <div class="card-block">
        <h4 class="card-title">Add People</h4>
        <hr style="width: 100%">
        <div class="dropdown" style="margin-left: 10px;margin-bottom: 30px">
            <?php foreach ($groups as $group_id => $name) {
                echo "<button class=\"btn btn-default dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\"> $name <span class=\"caret\"></span></button>
";
            } ?>

            <select id="multi" class="dropdown-menu" multiple onChange="OnSelectedIndexChange()">
                <?php
                foreach ($members as $ID => $FirstName) {
                    echo "<option><a>" . $FirstName . "</a></option>";
                }
                ?>

        </div>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>

</div>
</div>
</body>

<script>

    $(document).ready(function() {
        $('#multi').multiple;

          });

    function OnSelectedIndexChange()
    {
        if (document.getElementById('search').value == "3"){
            location.href="search_results.htm";
        }
    }

    var $chatBox = $('#chatbox');
    var currentDate = new Date();
    var currentTime = currentDate.getTime();
    var lastChatMessageTime = currentTime;

    setInterval(getChats, 5000);
    //    date = new Date(time);
    //    console.log(time);

    function getChats() {
        timestamp = lastChatMessageTime;
        console.log('getMessage Fired');
        var msg = $("#usermsg").val();
        var chatReq = $.get("<?php echo site_url('Chat/get_chats'); ?>", {text: msg, timestamp: timestamp});
        chatReq.done(function (data) {
            $.each(data, function (key, value) {
                if (value != 'error') {
                    if (value.timestamp > timestamp) {
                        var newChatMessage = document.createElement('p');
                        newChatMessage.innerText = value.message;
                        newChatMessage.setAttribute('class', 'card-text');
                        $chatBox.append(newChatMessage);
                    }
                }
            });
        });
    }

    //If user submits the form
    $("#submitmsg").click(function () {
        var date = new Date();
        var time = date.getTime();
        var msg = $("#usermsg").val();
        var chatReq = $.get("<?php echo site_url('Chat/send_chats'); ?>", {text: msg, userid: 1, timestamp: time});
        chatReq.done(function (data) {
            var newChatMessage = document.createElement('p');
            newChatMessage.innerText = msg;
            newChatMessage.setAttribute('class', 'card-text');
            $chatBox.append(newChatMessage);
            console.log(data.status_message);
            lastChatMessageTime = time;
        });
        $("#usermsg").attr("value", "");
        return false;
    });

    function loadLog() {
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        $.ajax({
            url: "log.json",
            cache: false,
            success: function (json) {
                $("#chatbox").json(json); //insert in div

                //Auto-scroll
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                if (newscrollHeight > oldscrollHeight) {
                    $("#chatbox").animate({scrollTop: newscrollHeight}, 'normal'); //Autoscroll to bottom of div
                }
            },
        });
    }
</script>
</html>