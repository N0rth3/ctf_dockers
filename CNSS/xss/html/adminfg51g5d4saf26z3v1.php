<?php 

session_start();
setcookie('flag','cnss{oh_y0u_ar#_g0od_at_xss}');
$_SESSION['flag']=1;