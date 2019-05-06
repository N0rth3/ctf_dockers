<?php
	include("config/db.php");
	$flag = "only admin can get the flag";
	if(isset($_SESSION['id']))
	{
		if($_SESSION['id'] === 1)
		{
			$flag = "cnss{this_idea_h1t_me_whil3_I_am_W3rking}";
		}
	}
	echo $flag;
 ?>