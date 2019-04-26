<?php
    session_start();
    if(!isset($_SESSION['flag'])) $_SESSION['flag']=0;
    if(isset($_SESSION['code_nn'])){
        $_SESSION['code_o']=$_SESSION['code_nn'];

    }
    $_SESSION['code']=rand(1000000,9999999);
    $_SESSION['code_nn']=substr(md5($_SESSION['code']), 0, 6);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to my world</title>
    <link href="/static/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                         <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="#" class="brand">My World</a>
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                <li>
                                    <a href="/">主页</a>
                                </li>
                                <li>
                                    <a href="/about.php">关于CNSS</a>
                                </li>
                                <li class="active">
                                    <a href="/admin.php">admin</a>
                                </li>
                                <li>
                                    <a href="/commitbug.php">提交反馈</a>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <h3>
                北方姐姐咕掉了登陆模块，你可以畅所欲言了。
            </h3>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <form method="POST">
                <fieldset>
                     <label>发表文章：</label>
                     <textarea type="text" name="post" placeholder="hey,说点什么吧" /></textarea>
                 </br>
                     <label>substr(md5($str), 0, 6) === “<?php echo $_SESSION['code_nn'];?>”</label>
                     <input type="text" name="check">
                 </br>
                     <button type="submit" class="btn">提交</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="/static/js/bootstrap.js"></script>
</body>
</html>

<?php
function alert1($alert_str)
{
	echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;	</a><strong>警告:</strong><br/>'.$alert_str.'</div>';
}
function waf($strX){
    $strX = replace('script','',$strX);
    return $strX;

}
function savepost($str){
    $str=waf($str);
    $str='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.$str;
    $urlx="./post/".md5(rand(1000000,9999999)).".html";
    $myfile = fopen($urlx, "w");
    fwrite($myfile, $str);
    fclose($myfile);
    return $urlx;
}

if(isset($_POST['check'])){
    if(substr(md5($_POST['check']),0,6)===$_SESSION['code_o']){
        if(isset($_POST['post'])){
            alert1("你的文章发表在了 ".savepost($_POST['post']));
        }

    }else{
        alert1('验证码错误，请核实后再试！');
    }

}
?>
