<?php
@$a = $_POST['angka1'];
@$b = $_POST['angka2'];
if(isset($_POST['tambah'])){
$c = $a+$b;
}
if(isset($_POST['kurang'])){
$c=$a-$c;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Aritmatika</title>
</head>
<body>
	<form method="post">
		<div style="width:80%;margin : 0 auto; position: fixed;">
		<div style="width :70%; float:left;">
			<table>
				<tr>
					<td>Angka1</td>
					<td>:</td>
					<td><input type="text" name="angka1"></td>
				</tr>
				<tr>
					<td>Angka2</td>
					<td>:</td>
					<td><input type="text" name="angka2"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="tambah" value="+"></td>
				</tr>
				<tr>
					<td>Hasilnya</td>
					<td>:</td>
					<td><?php echo @$c ?></td>
				</tr>
			</table>
		</div>
		<div style="width :30%;float:left;">
			<table>
				<tr>
					<td>Angka1</td>
					<td>:</td>
					<td><input type="text" name="angka1"></td>
				</tr>
				<tr>
					<td>Angka2</td>
					<td>:</td>
					<td><input type="text" name="angka2"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="kurang" value="-"></td>
				</tr>
				<tr>
					<td>Hasilnya</td>
					<td>:</td>
					<td><?php echo @$c ?></td>
				</tr>
			</table>
		</div>
		</div>
	</form>
</body>
</html>