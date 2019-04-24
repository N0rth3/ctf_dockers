<?php
session_start();
unset($_SESSION['user']); 
unset($_SESSION['role']);
setcookie("auth","",0);
header("Location: index.php");
