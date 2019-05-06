<?php
error_reporting(E_ALL);
header("Content-type:text/html;charset=utf-8");
$host="127.0.0.1";
$sqluser="admin";
$sqlpassword="godsadasodakso#!@ds";
session_start();
$mysqli = new mysqli($host, $sqluser, $sqlpassword, "ctf", 3306);
// $mysqli->set_charset("utf8mb4");
if ( $mysqli->connect_error ) {
  $rc = 175;
  $msg = $mysqli->connect_error . ' (' . $mysqli->connect_errno . ')' . " (rc=$rc).";
  var_dump($msg);
  return array($rc, null);
}

function checkLogin()
{
	if(isset($_SESSION['username']) && (!empty($_SESSION['username'])))
	{
		return true;
	}
	else{
		die("not login");
		return false;
	}
}

function getUserList($order, $mysqli)
{
	if(!preg_match('/^[a-zA-Z0-9]*$/', $order))
	{
		exit("hacker!");
	}
	$query = "select id, username, sex, score from user order by ".$order." desc";
	$result = $mysqli->prepare($query);
	#$result->bind_param("i", $order);
	$result->bind_result($cid, $cusername, $csex, $cscore);
	$result->execute(); 
	$result->store_result();
	$html = "";
	if($result->num_rows > 0)
	{
		while($result->fetch())
		{
			$html = $html."<tr>
						<td>
							".$cid."
						</td>
						<td>
							".htmlspecialchars($cusername)."
						</td>
						<td>
							".$csex."
						</td>
						<td>
							".$cscore."
						</td>
					</tr>";
		}
	}
	return $html;
}

?>
