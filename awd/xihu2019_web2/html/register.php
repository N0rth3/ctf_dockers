<?php include "header.php";?>
<?php
session_start();

if (isset($data['name']) && isset($data['password'])) {
    $data["name"] = addslashes($data['name']);
    $data["password"] = User::encodePassword($data['password']);
    $res = User::insertuser($data);
    
    echo "<html><script>alert('" . $res['msg'] . "')</script></html>";
    if($res["code"]==0){
     echo "<script>window.location.href='login.php'</script>"; 
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
    <center>
        <h1 class="font">会员注册</h1>
        <form method="post">
            <label>
              <span class="label">账户</span>
              <input type="text" name="name" class="form" placeholder="&nbsp;">
            </label><br>
            <label>
              <span class="label">密码</span>
              <input type="password" name="password" class="form" placeholder="&nbsp;">
            </label><br><br>
            <input class="btn" type="submit" value="注册">
        </form>
    </center>
    </div>
</body>
<?php include "footer.php";?>
</html>
