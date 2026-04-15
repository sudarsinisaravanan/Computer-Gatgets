<html>
	<?php include "head.php";
	session_start();?>
	<?php include "config.php";?>
	<body>
		<?php include "Navigation_bar.php";?>
		<?php
		if(isset($_GET["mes"]))
		{
			echo "<h1>{$_GET["mes"]}</h1>";
		}
		?>
		<?php
			//print_r($_POST);
			if(isset($_POST["submit"]))
			{
				$sql="select * from user where email='{$_POST["email"]}' and pass='{$_POST["pass"]}'";
				echo $sql;
				$res=$con->query($sql);
				//print_r($res);
				if($res->num_rows>0)
				{
					$rec=$res->fetch_assoc();
					$_SESSION["uid"]=$rec["uid"];
					$_SESSION["uname"]=$rec["uname"];
					$_SESSION["age"]=$rec["age"];
					header("location:user.php");
					echo "<h1>Login</h1>";
				}
				else
				{
					echo"<h1>Incorrect Password</h1>";
				}
			}
		?>
		<div class=" col-md-offset-3 col-md-6">
		<h1>Login form</h1>
		<div class="bg bg-info">
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" required name="email">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" required name="pass">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" required name="submit" value="Login">
				<input type="reset" class="btn btn-danger pull-right" required name="cancel">
			</div>
		</form>
		</div>
		</div>
	</body>
	<?php include "foot.php"?>
</html>
