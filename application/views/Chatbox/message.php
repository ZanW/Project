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

<div id="group-card" class="card" style=" box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);width: 200px;float: right;margin-right: 250px">
    <div class="card-block">
        <h4 class="card-title">Select Group</h4>
        <hr style="width: 100%">
        <div class="groups">

            <?php foreach ($groups as $group_id => $name) {
                echo "<a  id='link'><li id='groups_name' style='list-style-type: none' data-id='$group_id' data-name='$name' onclick='showDiv(this)'>  $name </li></a>";
            } ?>

        </div>
    </div>
</div>

<div class="card" id="card-message-send" style=" box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);width: 400px; margin-left: 50px;float: left" hidden="hidden">
    <div class="card-block">
        <div id="group-member-box">
            <h4 id="title_group" class="card-title">Select Members</h4>
            <hr width="100%">
            <div id="members_relevant">

            </div>
            <button class="btn btn-info" id="start-chat-button">Start Chat</button>
        </div>
        <div id="chat-box" hidden="hidden">
            <div id="chat-messages">
            </div>
            <input id="message" class="form-control" type="text" title="send">
            <button class="btn btn-info" id="send">Send Message</button>
        </div>
    </div>
</div>

</body>

<script>

    var chatMessage = document.getElementById('message');
    var sendMessage = document.getElementById('send');
    var messageBlock = document.getElementById('chat-messages');
    var chatBox = document.getElementById('chat-box');
    var startChatButton = document.getElementById('start-chat-button');
    var groupMemberBox = document.getElementById('group-member-box');
    var selectedMembersID = [];
    var selectedGroupID = '';
    var userID = <?php echo $user_id; ?>;

    sendMessage.addEventListener('click', sendChatMessage);
    startChatButton.addEventListener('click', openChatBox);

    function sendChatMessage() {
        var message = chatMessage.value;
        messageBlock.innerHTML += '<p>' + message + '</p>';

        $.ajax({
            method: "GET",
            url: "<?php echo site_url('Chat/send_chats') ?>",
            data: {message: message, userid: userID, membersids: selectedMembersID, groupid: selectedGroupID}
        }).done(function (data) {
            console.log(data);
        }).fail(function () {
            console.log('Unable to send message');
        });
    }

    function getChatMessages() {
        $.ajax({
            method: "GET",
            url: "<?php echo site_url('Chat/get_chats') ?>",
            data: {userid: userID, groupid: selectedGroupID}
        }).done(function (data) {
            var newChatsCount = data.length;
            if (newChatsCount > 0) {
                for (var i = 0; i < data.length; i++) {
                    messageBlock.innerHTML += '<p>' + data[i]['item']['message'] + '</p>';
                    console.log(data[i]['item']['message']);
                }
            } else {
                console.log('No new messages');
            }
        });
    }

    function getGroupMembers() {
        var groupMembers = document.getElementById('members_relevant');
        $.ajax({
            method: "GET",
            url: "<?php echo site_url('Chat/get_group_members') ?>",
            data: {groupid: 4}
        }).done(function (data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i]['item']['member_id'] != userID) {
                        var newLabel = document.createElement('label');
                        newLabel.setAttribute('class', 'checkbox-inline');
                        var newInput = document.createElement('input');
                        newInput.setAttribute('type', 'checkbox');
                        newInput.setAttribute('value', data[i]['item']['member_id']);
                        newLabel.appendChild(newInput);
                        var newPTag = document.createElement('p');
                        newPTag.innerText = data[i]['item']['first_name'];
                        newLabel.appendChild(newPTag);
                        groupMembers.appendChild(newLabel);
                    }
                }
            }
        );
    }

    function openChatBox() {
        groupMemberBox.setAttribute('hidden', 'hidden');
        selectedMembersID = [];
        $(":checkbox").each(function () {
            if (this.checked) {
                selectedMembersID.push(this.value);
            }
        });
        chatBox.removeAttribute('hidden');
        setInterval(getChatMessages, 5000);
    }

    function showDiv(event) {
        getGroupMembers();
        document.getElementById('group-card').setAttribute('hidden', 'hidden');
        var group_names = event.getAttribute('data-name').toString();
        selectedGroupID = event.getAttribute('data-id').toString();
        document.getElementById('card-message-send').removeAttribute('hidden');
    }

</script>
</html>