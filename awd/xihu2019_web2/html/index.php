<?php include "header.php";?>
<?php session_start();
if (!isset($_SESSION['user'])&&isset($_COOKIE['auth'])){
    list($user,$pass) = explode("\t", $_COOKIE['auth']);
    if (User::check($user, $pass,1)) {
        $_SESSION['user'] = User::getIDByName($user);
        $_SESSION['role'] = User::getRoleByName($user);
        
    } 
}

?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="static/css/style.css">
<link rel="shortcut icon" href="favicon.ico">
<script src="static/js/jquery.min.js"></script>
<title>mycms</title>
</head>
<body>
<div class="nav">
    <div class="nav-in">
        <div class="title">
            <a href="/">mycms</a>
        </div>
        <div class="nav-link">
            <a href="article.php">文章</a> &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="about.php">关于我们</a> &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="down.php">下载</a>
        </div>
        <div class="login">
<?php
if (isset($_SESSION['user'])) {
    echo "<a href='admin.php?id=" . $_SESSION['user'] . "'>";
    echo User::getNameByID($_SESSION['user']) . "</a> | ";
    echo "<a href='logout.php'>退出</a>";
} else {
    echo "<a href='login.php'>登陆</a> &nbsp;|&nbsp;&nbsp;";
    echo "<a href='register.php'>注册</a>";
}
?>
        </div>

    </div>
</div>
<div class="bd">
    <center>
    <img src="static/img/logo.png"><br>
    <div class="content">
        欢迎使用mycms内容管理系统！
    </div>
    </center>
    </div>
</body>
<?php include "footer.php";?>
</html>



