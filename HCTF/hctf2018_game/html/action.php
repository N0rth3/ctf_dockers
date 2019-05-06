<?php
require("config/db.php");
if( isset($_GET['action']) && (!empty($_GET['action'])) ){
	if($_GET['action'] == "login" && isset($_POST['username']) && (!empty($_POST['username'])) && isset($_POST['password']) && (!empty($_POST['password']))){

		$username = str_replace(" ", "", $_POST['username']);
		$password = $_POST['password'];

		$query = "SELECT id, username, sex, score from user where username = ? and password = ?";
		$result = $mysqli->prepare($query);
		$result->bind_param("ss", $username, $password);
		$result->bind_result($cid, $cusername, $csex, $cscore);
		$result->execute();
		$result->store_result();
		if($result->num_rows > 0)
		{
			$result->fetch();
			$_SESSION['username'] = $cusername;
			$_SESSION['score'] = $cscore;
			$_SESSION['sex'] = $csex;
			$_SESSION['id'] = $cid;

			die("<script>alert('success');location.href='user.php';</script>");
		}
		else{
			die("<script>alert('username or password wrong');location.href='index.html';</script>");
		}
		$result->close();
		$mysqli->close();
	}
	else if( $_GET['action'] == "reg" && isset($_POST['username']) && (!empty($_POST['username'])) && isset($_POST['password']) && (!empty($_POST['password'])) && isset($_POST['sex']) ){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sex = intval($_POST['sex']);
		$sex = $sex == 1?1:0;

		$query = "SELECT id, username, sex, score from user where username = ? and password = ?";
		$result = $mysqli->prepare($query);
		$result->bind_param("ss", $username, $password);
		$result->bind_result($id, $cusername, $csex, $cscore);
		$result->execute();
		$result->store_result();
		#var_dump($cusername);
		// var_dump($result->num_rows);
		if($result->num_rows === 0)
		{
			$query = "insert into user(username, password, sex) values(?, ?, ?)";
			$result = $mysqli->prepare($query);
			$result->bind_param("ssi", $username, $password, $sex);	
			$res = $result->execute();
			if($res == true){
				echo "<script>alert('success');location.href='index.html';</script>";
			}
			else{
				echo "<script>alert('fail');location.href='reg.html';</script>";
			}
		}
		else{
			die("<script>alert('username is used already!');location.href='reg.html';</script>");
		}
	}
	else if($_GET['action'] == "score" && isset($_GET['score'])){
		checkLogin();
		$score = intval($_GET['score']);
		$query = "update user set score = ? where username = ?";
		$result = $mysqli->prepare($query);
		$result->bind_param("is", $score, $_SESSION['username']);
		$result = $result->execute();

		}
}
else{

}
?>