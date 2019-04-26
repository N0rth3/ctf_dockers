<?php session_start();?>
<?php include "header.php";?>
<?php
if (isset($data['filename'])) { 
    if(preg_match("/^http/", $data['filename'])){
        exit();
    }
    chdir("/var/www/html/static/img/");    
    if (file_exists($data['filename'])) {
        header("Content-type: application/octet-stream");
        header('content-disposition:attachment; filename='.basename($data['filename']));
        echo file_get_contents($data['filename']);exit();
    }else{
        echo "文件不存在";
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
    <div class="content">
            <form method="get" action="down.php">
                <label>
                  <span>LOGO</span>
                  <input type="text" name="filename" value="logo.png" hidden>
                </label><br><br/>
                <input class="btn" type="submit" value="下载">
            </form>
    </div>
    </center>
    </div>
</body>
<?php include "footer.php";?>
</html>
