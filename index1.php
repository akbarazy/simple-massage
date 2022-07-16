<?php
include_once 'config.php';
$yourId = $_COOKIE['signin'];
$query = mysqli_query($connect, "SELECT * FROM usersignin WHERE id != $yourId");
$otherPeople = '';

if (mysqli_num_rows($query) == 0) {
    $otherPeople .= 'No users are available.';
} else if (mysqli_num_rows($query) > 0) {
    while ($user = mysqli_fetch_assoc($query)) {
        $id = $user['id'];
        $name = $user['name'];

        $otherPeople .= "<a href='chat.php?other-chat={$id}' class='other-profile nav-link text-white text-left mr-1 mb-2'>
                            <div class='other-name'>
                                <i class='fa fa-user-circle-o' aria-hidden='true'></i>
                                <span>&nbsp;{$name}</span>
                            </div>
                            <div class='other-button ml-auto'>
                                <i class='fa fa-chevron-right pr-1' aria-hidden='true'></i>
                            </div>
                         </a>";
    }
}
echo $otherPeople;
