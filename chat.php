<?php
include_once 'config.php';
if (!isset($_COOKIE['signin'])) {
    header('location: signin.php');
    exit;
}

$otherId = $_GET['other-chat'];
$query = mysqli_query($connect, "SELECT * FROM usersignin WHERE id = $otherId");
$other = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akbarazy | Message</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Comfortaa:wght@300;400;600;700&family=Mulish:wght@300;400;600;700&family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,700&family=Questrial&family=Quicksand:wght@300;400;600;700&family=Rajdhani:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="static/css/chat-style.css">
    <link rel="stylesheet" href="static/css/home-style.css">
</head>

<body style="background-color: #e3e3e3 !important;">
    <!-- section chatting -->

    <div class="container">
        <div class="chat-area pt-4 pb-5 px-4 regist text-center text-white" id="chat-area" style="border-radius: 5px;">
            <div class="other-profile-chat text-left">
                <a href="index.php" class="nav-link back pl-0 pb-0 pr-2">
                    <i class="fa fa-chevron-left mr-2" aria-hidden="true"></i>
                </a>

                <div class="other-name-chat">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span>&nbsp;<?php echo $other['name']; ?></span>
                </div>
            </div>
            <hr>

            <div class="all-chat mt-4"></div>

            <hr class="mt-4">
            <div class="chat-type">
                <form action="" method="post" class="display-flex text-left">
                    <input type="hidden" name="other-id" value="<?php echo $otherId; ?>">
                    <input type="text" name="chat-text" id="chat-text" class="input-chat" placeholder="Type your massage" maxlength="70" autocomplete="off" required>
                    <button type="submit" name="chat-submit" class="chat-submit">
                        <i class="fa fa-caret-right text-white" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- end chatting -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="static/ajax/chat-ajax.js"></script>
</body>

</html>