<!DOCTYPE html>
<html>
<head>
	<title>user center</title>
</head>
<body>
<?php
	require("config/db.php");
	if(checkLogin() == false)
	{
		echo "<script>alert('not login');location.href='index.html';</script>";
	}
?>
<h3>rank list</h3>
<a href="./game/index.html">game play</a>
<table>
	<!-- 
		flag.php
	-->
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<table class="table">
				<thead>
					<tr>
						<th>
							<a href="./user.php?order=id">No</a>
						</th>
						<th>
							<a href="./user.php?order=username">username</a>
						</th>
						<th>
						<a href="./user.php?order=sex">sex</a>
						</th>
						<th>
						<a href="./user.php?order=score">score</a>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$order = "score";
					if(isset($_GET['order']))
					{
						$order = $_GET['order'];
					}
					$data = getUserList($order, $mysqli);
					echo $data;
					 ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</table>
</body>
</html>