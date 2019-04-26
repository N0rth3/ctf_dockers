
<?php session_start();?>
<?php include "header.php";?>
<?php
if (!isset($_SESSION['user'])) {
    echo "<html><script>alert('Please Login!')</script></html>";
    echo "<script>window.location.href='index.php'</script>";
    die("");
} else if ($data['action'] == 'send_article') {
    $res = Article::sendArticle($data);
    echo "<html><script>alert('" . $res['msg'] . "')</script></html>";
    echo "<script>window.location.href='admin.php'</script>";
} else if ($data['action'] == 'user_setting') {
    $res = User::setting($data);
    echo "<html><script>alert('" . $res['msg'] . "')</script></html>";
    echo "<script>window.location.href='admin.php'</script>";
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
        <?php if ($_SESSION['role'] == 1) {

    $user = new User();
    $res  = User::getAllUser();

    ?>

        <div class="setting">
            <h2>会员管理</h2>
            <div>
                <table>
                  <tr>
                    <th>账号</th>
                    <th>操作</th>
                  </tr>
                  <?php
foreach ($res as $key => $value) {
        if ($value['role'] == 0) {
            if ($value['status'] == 1) {
                $status = '禁用';
            } else {
                $status = '已禁用';
            }
            echo '
                    <tr>
                        <td>' . $value['name'] . '</td>
                        <td><a href="admin.php?action=user_setting&id=' . $value['id'] . '">' . $status . '</a></td>
                      </tr>
        ';
        }
        
    }
    ?>

                </table>
            </div>

        </div>
        <?php }?>
        <div class="setting">
            <h2>内容管理</h2>
            <form method="post" action="admin.php" enctype="multipart/form-data">
                <label>
                  <span>文章标题</span>
                  <input type="text" size="42" name="title" placeholder="">
                </label><br><br/>
                <label>
                  <span>文章内容</span>
                  <textarea rows="5" cols="40" name="content"></textarea>
                </label><br><br/>
                <label>
                  <span>上传附件</span>
                  <input type="file" name="files" id="files" placeholder="">
                </label>
                <input type="hidden" name="action" value='send_article'>
                <input class="btn" type="submit" value="发布">
            </form>
        </div>
    </center>
    </div>
</body>
<?php include "footer.php";?>
</html>
