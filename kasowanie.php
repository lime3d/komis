<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="naglowek"><h1>DAS AUTO<img src="auto.png" height="100" width="250"></div>
<div id="menu">
<input type="button" value="Strona glowna" onclick="location.href='index.php';"> <br />
<input type="button" value="Rejestracja" onclick="location.href='rejestracja.php';"> <br />
<input type="button" value="Przegladaj" onclick="location.href='przegladaj.php';"> <br />
<input type="button" value="Kasowanie" onclick="location.href='kasowanie.php';">
</div>
<div id="tresc">
<form method="post">
<input type="text" name="Marka" placeholder="Marka"><br>
<input type="text" name="Przebieg" placeholder="Przebieg"><br>
<input type="submit" value="Usun"> <br />
<?php
if (!empty($_POST)){
	require_once "db_config.php";
	$polaczenie = @mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if (mysqli_connect_errno()){
	
	echo "Coś się rypło!!! <br />";
	echo "Error".mysqli_connect_errno().""."Opis:".mysqli_connect_errno();
	
}
else{
	$marka=$_POST['Marka'];
	$przebieg=$_POST['Przebieg'];
	echo "Połączenie nawiązane poprawnie <br />";
	$kwerenda="DELETE FROM `komis` WHERE marka='$marka' AND przebieg='$przebieg'";
	
	if($wynik=$polaczenie->query($kwerenda)){
		echo"Usunieto auto z bazy <br />";
			}
			

	else{
		
		echo "zapytanie nie powiodło";
		
	};
	
	$polaczenie->close();
	}
}
?>
</form>
</div>
<div id="stopka"><center>Wykonal: Emil Mrozik</center></div>
</body>

</html>