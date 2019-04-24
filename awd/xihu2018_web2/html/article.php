<?php session_start();?>
<?php include "header.php";?>
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
$article = new Article();
$res     = $article->getData();
?>
        </div>

    </div>
</div>
<div class="bd">
    <center>
    <div class="content">
        <?php
if (isset($res['data']) && $res['data']) {
    if (file_exists(dirname(__FILE__).'/'.explode('.', $res['data']['files'])[0].$res['data']['title'].'.jpg')) {
    echo '
        <div>
            <h2>' . $res['data']['title'] . '</h2>
            发布时间:' . $res['data']['create_time'] . ' &nbsp;
            作者:未知 &nbsp;
            <div>
            ' . $res['data']['content'] . 
            '<br><img src=./'.explode('.', $res['data']['files'])[0].$res['data']['title'].'.jpg>'.
            '
            </div>
        </div>

    ';}else{
    echo '
        <div>
            <h2>' . $res['data']['title'] . '</h2>
            发布时间:' . $res['data']['create_time'] . ' &nbsp;
            作者:未知 &nbsp;
            <div>
            ' . $res['data']['content'] .'
            </div>
        </div>

    ';}
    if ($res['data']['files']) {
        echo '<div><a href="' . $res['data']['files'] . '">附件</div>';
    }
} else {
    echo '暂无文章!';
}
?>

    </div>
    </center>
    </div>
</body>
<?php include "footer.php";?>
</html>
