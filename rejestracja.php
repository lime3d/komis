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
	<input type="text" name="Model" placeholder="Model"><br>
	<input type="text" name="Rokprodukcji" placeholder="Rok produkcji "><br>
	<input type="text" name="Przebieg" placeholder="Przebieg"><br>
	<input type="text" name="Paliwo" placeholder="Paliwo"><br>
	<input type="text" name="Kolor" placeholder="Kolor"><br>
	<input type="text" name="Moc" placeholder="Moc"><br>
	<input type="submit" value="Dodaj do bazy">
</form>
</div>
<div id="stopka"><center>Wykonal: Emil Mrozik</center></div>
<?php
	require_once "db_config.php";
	$polaczenie = @mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if (mysqli_connect_errno()){
	
	echo "Coś się rypło!!! <br />";
	echo "Error".mysqli_connect_errno().""."Opis:".mysqli_connect_errno();
	
}
else{
	if (empty($_POST)){
		
	}
	else{
	
	$marka=$_POST['Marka'];
	$model=$_POST['Model'];
	$rokprodukcji=$_POST['Rokprodukcji'];
	$przebieg=$_POST['Przebieg'];
	$paliwo=$_POST['Paliwo'];
	$kolor=$_POST['Kolor'];
	$moc=$_POST['Moc'];
	
	$kwerenda="INSERT INTO komis (marka,model,rok_prod,przebieg,paliwo,kolor,moc) 
	VALUES ('$marka','$model','$rokprodukcji','$przebieg','$paliwo','$kolor','$moc') ";
	
	$wynik=$polaczenie->query($kwerenda);
	
	$kwerenda="SELECT * FROM  komis";
	
	if($wynik=$polaczenie->query($kwerenda)){
	}		

	else{
		
		echo "zapytanie nie powiodło się tworzę tabelę";
		
			$zapytanie="CREATE TABLE komis (
					Id int NOT NULL AUTO_INCREMENT,
					marka varchar(30) NOT NULL,
					model varchar(30) NOT NULL,
					rok_prod varchar(30) NOT NULL,
					przebieg int,
					paliwo varchar(30) NOT NULL,
					kolor varchar(30) NOT NULL,
					moc int,
					PRIMARY KEY (Id))";
			
			if($wynik=$polaczenie->query($zapytanie)){
				echo "zapytanie powiodło się stworzyłem tabelę jarzabek ";
			}
		else {
			echo "zapytanie nie powiodło się nie stworzyłem tabeli jarzabek";
		};	
		
	};
	
	$polaczenie->close();
	}
}
?>
</body>

</html>