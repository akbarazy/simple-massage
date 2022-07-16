<?php
include_once "config.php";
$name = mysqli_real_escape_string($connect, $_POST['name']);

if (!empty($name)) {
    $result = mysqli_query($connect, "SELECT * FROM usersignin WHERE name = '$name'");

    if (mysqli_num_rows($result) > 0) {
        echo "This username is already exist.";
        return;
    } else {
        $query = mysqli_query($connect, "INSERT INTO usersignin VALUES (
            '', '$name'
        )");

        if ($query) {
            $query1 = mysqli_query($connect, "SELECT * FROM usersignin WHERE name = '$name'");
            $yourProfile = mysqli_fetch_assoc($query1);

            setcookie('signin', $yourProfile['id'], time() + 999999999);
            echo "You have successfully sign in.";
            return;
        } else {
            echo "Something went wrong.";
            return;
        }
    }
} else {
    echo "Your username is empty.";
    return;
}
