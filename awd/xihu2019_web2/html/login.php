<?php include "header.php";?>
<?php
session_start();

if (isset($data['user']) && isset($data['pass'])) {
    $user = $data['user'];
    $pass = $data['pass'];
if (User::check($user, $pass)) {
        setcookie("auth",$user."\t".User::encodePassword($pass));
        $_SESSION['user'] = User::getIDByName($user);
        $_SESSION['role'] = User::getRoleByName($user);
        $wrong            = false;
        header("Location: index.php");
    } else {
        $wrong = true;
    }
}
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="static/css/style.css">
<link rel="shortcut icon" href="favicon.ico">
<title>mycms</title>
</head>
<body>
<div class="nav">
    <div class="nav-in">
        <div class="title">
            <a href="/">mycms</a>
        </div>
    </div>
</div>
<div class="bd">
    <?php
showWrongPass($wrong);
?>
    <center>
        <h1 class="font">登陆</h1>
        <form method="post">
            <label>
              <span>账号</span>
              <input type="text" class="form" name="user" placeholder="&nbsp;">
            </label><br>
            <label>
              <span>密码</span>
              <input type="password" class="form" name="pass" placeholder="&nbsp;">
            </label><br><br>
            <input class="btn" type="submit" value="登陆">
        </form>
    </center>
    </div>
</body>
<?php include "footer.php";?>
</html>

