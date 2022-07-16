<?php
include_once 'config.php';
$yourId = $_COOKIE['signin'];
$otherId = $_POST['other-id'];
$time = date('d M Y', time());
$message = mysqli_real_escape_string($connect, $_POST['chat-text']);

if (!empty($message)) {
    $query = mysqli_query($connect, "INSERT INTO usersmessage VALUES (
        '', $yourId, $otherId, '$message', '$time'
    )") or die();
}
