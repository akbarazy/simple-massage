<?php
include_once 'config.php';
$yourId = $_COOKIE['signin'];
$otherId = $_POST['other-id'];
$showChat = '';

$otherQuery = mysqli_query($connect, "SELECT * FROM usersignin WHERE id = {$otherId}");
$other = mysqli_fetch_assoc($otherQuery);

$sql = "SELECT * FROM usersmessage WHERE (
    yourid = $yourId AND otherid = $otherId
) OR (
    yourid = $otherId AND otherid = $yourId
) ORDER BY messageid ASC";
$query = mysqli_query($connect, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($chat = mysqli_fetch_assoc($query)) {
        if ($chat['yourid'] === $yourId) {
            $showChat .= '<div class="your-chat text-left mb-2" style="border-radius: 5px 0px 5px 5px;">
                            <h6 class="your-chat-name">You</h6>
                            <p class="mb-0">' . $chat['message'] . '</p>
                            <p class="your-chat-date mt-2 mb-0 text-right">' . $chat['time'] . '</p>
                          </div>';
        } else {
            $showChat .= '<div class="other-chat text-left mb-2" style="border-radius: 0px 5px 5px 5px;">
                            <h6>' . $other['name'] . '</h6>
                            <p class="mb-0">' . $chat['message'] . '</p>
                            <p class="other-chat-date mt-2 mb-0 text-right">' . $chat['time'] . '</p>
                          </div>';
        }
    }
    echo $showChat;
}
