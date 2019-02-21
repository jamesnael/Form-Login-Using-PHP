<?php
	include "config/koneksi.php";
	if(isset($_POST['simpan'])){
		$sql = mysqli_query($con, "INSERT INTO tb_user VALUES ('$_POST[user]','$_POST[pass]')");
		if($sql){
			echo "<script>alert('Input data Sukses');document.location.href = 'dashboard.php'</script>";
		}else{
			echo "<script>alert('Input data Gagal, Username sudah diinput');document.location.href = 'dashboard.php'</script>";
		}

	}
	if(isset($_GET['edit'])){
		$sql = mysqli_query($con,"SELECT * FROM tb_user WHERE username = '$_GET[nama]'");
		$tampil = mysqli_fetch_array($sql);

	}
	if(isset($_GET['hapus'])){
		$sql = mysqli_query($con, "DELETE FROM tb_user WHERE username = '$_GET[nama]'");
		if($sql){
			echo "<script>alert('Delete data Sukses');document.location.href = 'dashboard.php'</script>";
		}else{
			echo printf("Error: %s\n", mysqli_error($con));
  			exit();
		}
	}
	if(isset($_POST['update'])){
		$sql = mysqli_query($con, "UPDATE tb_user SET username = '$_POST[user]',password = '$_POST[pass]' WHERE username = '$_GET[nama]'");
		if($sql){
			echo "<script>alert('Update data Sukses');document.location.href = 'dashboard.php'</script>";
		}else{
			echo "<script>alert('Update data gagal')</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
</head>
<body >
	<form method="post">
		<div align="center" style="background-color: rgba(44, 62, 80, 1);height: 930px;">
		<br>
		<div align="right">
		<a href="index.php" style="color:white; margin-right:15px;"><u>Logout?</u></a>
		</div>
		<div align="center" style="width: 600px; " class="form-group">
		<br>
		<hr color="white">
		<h1 style="color:white">Welcome</h1>
		<hr color="white">
		<h4 style="color:white">Berikut untuk Menambahkan User</h2>
		<br>
		<table align="center" style="color:white">
			<tr>
				<td>Username</td>
				<td align="center" style="margin-left:5px;"><b>:</b></td>
				<td><input type="text" name="user" style="margin-left:5px;" class="form-control"  value="<?php echo @$tampil['username']; ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td align="center" style="margin-left:5px;"><b>:</td>
				<td><input type="text" name="pass" style="margin-left:5px;" class="form-control"  value="<?php echo @$tampil['password']; ?>"></td>
			</tr>
			<tr>
				<td><br></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-success" type="submit" name="simpan" value="SIMPAN" style="margin-left:5px;"><input type="submit" class="btn btn-info" name="update" value="UPDATE" style="margin-left:5px;"></td>
			</tr>
		</table>
		<br>
		<br>
		<hr color="white">
		<br>
		<br>
			<div class="input-group mb-3">
                <input placeholder="Search" type="search" name="tcari" class="form-control"  value="<?= @$_POST['tcari']; ?>" >
                <div class = "input-group-append">
                <input type="submit" name="cari" value="Cari" class="btn btn-success">
            	</div>
            </div>
                <br>
		<table border="1"  cellpadding="11" cellspacing="0" style="color:white;border-color : white;" >

			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Password</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
			<?php
				$sql = mysqli_query($con,"SELECT * FROM tb_user");
				if(isset($_POST['cari'])){
                    $sql = mysqli_query($con,"SELECT * FROM tb_user WHERE username LIKE '%$_POST[tcari]%'");
                }else{
                	$sql = mysqli_query($con,"SELECT * FROM tb_user");
                }
				$no = 0;
				while($data = mysqli_fetch_array($sql)) {
					$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data[0]; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td><a style="color:rgba(25, 181, 254, 1)" href="dashboard.php?edit&nama=<?php echo $data[0]; ?>"><u>Edit</a></td>
				<td><a style="color:rgba(242, 38, 19, 1)" href="dashboard.php?hapus&nama=<?php echo $data[0]; ?>"><u>Hapus</a></td>
			</tr>
			<?php } ?>
		</table>
		<br>
		<br>
		<hr color="white">
		<br>
	</div>
	</div>
	</form>
</body>
</html>