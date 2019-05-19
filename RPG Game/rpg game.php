<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>RPG GAME</title>
    <?php 
        session_start();
        if (!isset($_SESSION["login_session"]))
        {
            header("Location: ../rpg.php");
        }
    ?>
    <style>
        html,
        body 
        {
            height: 100%;
        }
        body 
        {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
        }
        body 
        {
            margin:0;
            padding:0;
            background: #000 url("../images/02.jpg") center center fixed no-repeat;
            -moz-background-size: cover;
            background-size: cover;
        }
        h1
        {
            padding: 50px;
            background: #dddddd;
            border-radius: 100%;
            color: #fff;
            position: absolute;
            animation-duration: 2s;
            animation-name: h1;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }
        h1:after
        {
            left: 50px;
        }
        @keyframes h1
            {
              0% 
              {
                opacity: 0;
                left: 20%;
              }
              50% 
              {
                opacity: 1;
              }
              100% 
              {
                opacity: 0;
                left: 80%;
              }
            }
    </style>
</head>
<body>
    <h1>HI</h1>
</body>
</html>