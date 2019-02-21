<?php
	include("config/koneksi.php");

	if(isset($_POST['login'])){
		$sql = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$_POST[user]' and password = '$_POST[pass]'");
		$tampil = mysqli_fetch_array($sql);
		$cek = mysqli_num_rows($sql);
		if ($cek>0){
			echo "<script>alert('Selamat Datang');document.location.href='dashboard.php'</script>";
		}else{
			echo "<script>alert('Username atau Password yang anda Masukkan Salah')</script>";
		}
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	</head>
	<body>
		<div align="center" style="background-color: rgba(44, 62, 80, 1);height: 700px;">
		<form method="post">
		<br>
		<br>
		<br>
		<br>
		<br>
		<div style="width: 350px;background-color: rgba(34, 167, 240, 1);border-radius: 7px;"  class="form-group">
		<hr>
		<h2 align="center" style="font-family: Trajan Pro;color: white;">Form Login</h2>
			<hr>
			<table align="center">
				<tr>
					<td>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
					  	<span class="input-group-text" id="basic-addon1"><img src="img/logo orang.png" style="width: 20px; height: 20px;"></span>
					 	</div>
						<input type="text" name="user" style="margin-left:5px; width: 270px;" class="form-control" required placeholder="Username" >
					</div>
					</td>
				</tr>
				<tr>
					<td>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
					  		<span class="input-group-text" id="basic-addon1"><img src="img/logo kunci.png" style="width: 20px; height: 20px;"></span>
					 	</div>
						<input type = "password" name = "pass" style="margin-left:5px;" class="form-control" required placeholder="Password">
					</div></td>
				</tr>
				<tr>
					<td><input type="submit" name="login" value="LOGIN" class="btn btn-dark" style="width:330px;">
					</td>
				</tr>

			</table>
			<hr>
			<font style="color : white">Not Registered? <a href="" style="color:white;"><u>Create an Account</u></a></font>
			<hr>
			</div>
			</div>
		</form>
	</body>
</html>