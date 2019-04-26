<?php
session_start();
if(!isset($_SESSION['flag'])) $_SESSION['flag']=0;
function alert1($alert_str)
{
    echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;   </a><strong>提示:</strong><br/>'.$alert_str.'</div>';
}
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
                                <li class="active">
                                    <a href="/">主页</a>
                                </li>
                                <li>
                                    <a href="/about.php">关于CNSS</a>
                                </li>
                                <li>
                                    <a href="/admin.php">admin</a>
                                </li>
                                <li>
                                    <a href="/commitbug.php">提交反馈</a>
                                </li>

                            </ul>
                            <div class="nav pull-right" contenteditable="true">
                                 <form class="form-search">
                                   <input class="input-medium search-query" name='search' type="text">
                                   <button type="submit" class="btn" contenteditable="true">查找</button>
                                 </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <hr>



    <div class="row-fluid">
        <div class="span12">
            <h3>
                <a href="http://www.freebuf.com/articles/web/183188.html">
                通过SSTI漏洞获取服务器远程Shell
                </a>
            </h3>
            <blockquote>
                <p>
                    本文我将为大家演示，如何利用服务器端模板注入（SSTI）漏洞，来获取应用托管服务器上的shell。
                </p>
            </blockquote>
            <h4 id="h2-0">
                本文仅作为技术分享，禁止用于任何非法用途
            </h4>
            <p>
                服务器端模板注入（SSTI）漏洞将允许攻击者将注入模板指令作为用户输入，从而导致任意代码的执行。如果你查看了网页的源码，并看到了类似于以下的代码片段，则基本可以断定该应用程序可能正在使用某种模板引擎来呈现数据。
            </p> <a href="http://www.freebuf.com/articles/web/183188.html"><button class="btn" type="button">查看更多</button></a>
            <hr>
            <h3>
                <a href="http://www.freebuf.com/articles/web/182500.html">
                挖洞经验 | 看我如何发现Facebook的$5000美金漏洞</a>
            </h3>
            <h4 id="h2-0">
                写在前面的话
            </h4>
            <p>
              端倪
            </p>
            <p>
              最近，我在参与一些漏洞众测项目，本文中我就来分享一个我发现的Facebook某服务器漏洞，该漏洞获得Facebook官方$5000美金奖励。
            </p> <a href="http://www.freebuf.com/articles/web/182500.html"><button class="btn" type="button">查看更多</button></a>
        </div>
    </div>
</div>
</div>

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="/static/js/bootstrap.js"></script>
</body>
</html>
