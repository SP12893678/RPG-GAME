<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="./css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <?php 
        session_start();
        function is_login()
        {
            if (isset($_SESSION["login_session"]))
            {
                if($_SESSION["login_session"] == true)
                    header("Location: ./RPG Game/rpg game.php");
                else
                    echo "<script>alert('還尚未登入');</script>";
            }
            else
                echo "<script>alert('還尚未登入');</script>";
        }
        if (isset($_GET["start_game"])) 
        {
            if($_GET["start_game"]==true)
            {
               is_login(); 
            }
        }
    ?>
</head>
<body>
    <div class="nav">
        <button class="option" onclick="javascript:location.href='./login/Login.php'"><img class="option-image" src="images/user.png"></button>
        <div class="information_bg"></div>
        <div class="information_title">User Login</div>
        <div class="information_text">Join our group! There are still many surprises awaiting you!</div>
    </div>
    <div class="nav1">
        <button class="option" id="game" onclick="javascript:location.href='./rpg.php?start_game=true'">
            <img class="option-image" src="images/rpg-game.png">
        </button>
        <div class="information_bg"></div>
        <div class="information_title">RPG Game</div>
        <div class="information_text">Maybe you need to login if you want to play rpg game.</div>
    </div>
    <div class="nav2">
        <button class="option" id="introduce" onclick="javascript:location.href='./introduce/introduce.html'">
            <img class="option-image" src="images/open-book.png">
        </button>
        <div class="information_bg"></div>
        <div class="information_title">Introduce</div>
        <div class="information_text">Would you want to see more information? Let's go!</div>
    </div>
</body>
</html>