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
                                <li>
                                    <a href="/admin.php">admin</a>
                                </li>
                                <li class="active">
                                    <a href="/commitbug.php">提交反馈</a>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <h3>
                感谢您对本网站的喜爱，我们会努力做得更好。谢谢反馈！
            </h3>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <form method="POST">
                <fieldset>
                     <label>反馈内容：</label>
                     <textarea type="text" name="bug" placeholder="请输入有问题的网址。我会亲自查看。" /></textarea>
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
function savebug($str){
    $myfile = fopen("./submit_fdasfh2jfka/".md5($_SESSION['code_o']).".txt", "w");
    fwrite($myfile, $str);
    fclose($myfile);
}

if(isset($_POST['check'])){
    if(substr(md5($_POST['check']),0,6)===$_SESSION['code_o']){
        if(isset($_POST['bug'])){
            $url=$_POST['bug'];
            $pa="/^http:\/\/[a-zA-Z0-9\.\?\/=:]+$/";
            if($test = preg_match($pa, $url, $arr)){
                savebug($_POST['bug']);
                alert1('成功发送，我稍后将会阅读您的反馈！');
            }else{
                alert1('您的输入有误，请重新输入地址！');
            }


        }

    }else{
        alert1('验证码错误，请核实后再试！');
    }

}
?>
