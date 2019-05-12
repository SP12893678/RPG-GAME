<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosanstc.css">
    <script language="javascript">
        function Pressed_Option(select,cancel) 
        {
            document.getElementById(select).classList.remove("hidden");
            document.getElementById(cancel).classList.add("hidden");
            document.getElementById(select+" label").classList.add("border");
            document.getElementById(cancel+" label").classList.remove("border");
        }
        function message_alert(string)
        {
            alert(string);
        }
    </script>
    <?php
        //error_reporting(0);
        $username = "";  $password = ""; $email = ""; $submit = false; $type = "none";
        // 取得表單欄位值
        if (isset($_POST["Username"]))
        {
           $username = $_POST["Username"];
           $submit = true;
           $type= "sign in"; 
        } 
        if (isset($_POST["Password"]))
        {
           $password = $_POST["Password"];
           $submit = true;
           $type= "sign in"; 
        }
        if (isset($_POST["EmailAddress"]))
        {
           $email = $_POST["EmailAddress"];
           $submit = true;
           $type= "sign up";
        }
        // 檢查是否輸入使用者名稱和密碼
        if($submit)
        {
            // 建立MySQL的資料庫連接
            $link = mysqli_connect("localhost","root","","rpg game")
                    or die("無法開啟MySQL資料庫連接!<br/>");
            mysqli_query($link, 'SET NAMES utf8'); //送出UTF8編碼的MySQL指令
            if($type == "sign in")
            {
               // 建立SQL指令字串
               $sql = "SELECT * FROM players WHERE password='";
               $sql.= $password."' AND username='".$username."'";
               // 執行SQL查詢
               $result = mysqli_query($link, $sql);
               $total_records = mysqli_num_rows($result);
               // 是否有查詢到使用者記錄
               if ( $total_records > 0 ) 
               {
                  header("Location: ../RPG Game/rpg game.html");
               } 
               else 
               {  
                   echo "<script>message_alert('使用者名稱或密碼錯誤!');</script>"; // 登入失敗
               }
               mysqli_close($link);  // 關閉資料庫連接 
            }
            else if($type == "sign up")
            {
                // 建立SQL指令字串
                $user_sql = "SELECT * FROM players WHERE username='".$username."'";
                $email_sql = "SELECT * FROM players WHERE email='".$email."'";
                // 執行SQL查詢
                $result = mysqli_query($link, $user_sql);
                $user_records = mysqli_num_rows($result);
                $result = mysqli_query($link, $email_sql);
                $email_records = mysqli_num_rows($result);
                if($user_records>0)
                {
                    echo "<script>message_alert('使用者名稱已被使用!');</script>";
                }
                if($email_records>0)
                {
                    echo "<script>message_alert('信箱已被使用!');</script>";
                }
                else
                {
                    $sqlStr="insert into players (username,email,password) ";
                    $sqlStr.="values('$username', '$email','$password')";
                    mysqli_query($link, $sqlStr) or die("寫入失敗");
                    echo "<script>message_alert('資料寫入成功!');</script>";
                }
            }
        }
        else
        {

        }
    ?>
</head>
<body class="text-center">
    <div class="align-center">
        <div>
            <button class="option border" onclick="Pressed_Option('sign in','sign up')" id="sign in label">Sign in</button>
            <button class="option" onclick="Pressed_Option('sign up','sign in')" id="sign up label">Sign up</button>
        </div>
        <form class="login-form" id="sign in" action="Login.php" method="post">
            <label class="label" id="username"><a class="text">名稱</a></label>
            <input class="input" type="username" name="Username" size="15" maxlength="12" placeholder="UserName" required="required"/>
            <label class="label" id="password"><a class="text">密碼</a></label>
            <input class="input" type="password" name="Password" size="15" maxlength="12" placeholder="Password" required="required"/>
            <div><button class="submit" type="submit">Login</button></div>
        </form>
        <form class="login-form hidden" id="sign up" action="Login.php" method="post">
            <label class="label" id="username"><a class="text">名稱</a></label>
            <input class="input" type="username" name="Username" size="15" maxlength="12" placeholder="UserName" required="required"/>
            <label class="label" id="account"><a class="text">Email</a></label>
            <input class="input" type="email" name="EmailAddress" size="15" maxlength="30" placeholder="Email Address" required="required"/>
            <label class="label" id="password"><a class="text">密碼</a></label>
            <input class="input" type="password" name="Password" size="15" maxlength="12" placeholder="Password" required="required"/>
            <div><button class="submit" type="submit">Sign up</button></div>
        </form>
    </div>
</body>
</html>