<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>index.php</title>
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
        background: #000 url("./images/02.jpg") center center fixed no-repeat;
        -moz-background-size: cover;
        background-size: cover;
    }
    .nav
    {
        margin: auto;
    }
    .login
    {
        padding: 10px;
        color: white;
        font-size: 16px;
        background-color: #2196F3;
        border: none;
        outline:none;
    }
    .login:hover
    {
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 3px 5px 0 rgba(0, 0, 0, 0.19);
    }
</style>
</head>
<body>
<!--iframe src="login.php" frameborder="0" scrolling="no" id="login"></iframe-->
    <div class="nav">
        <button class="login" onclick="javascript:location.href='./login/Login.php'">login page</button>
    </div>
</body>
</html>