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
	<input type="submit" value="Wyswietl baze"> <br />
<?php
	require_once "db_config.php";
	$polaczenie = @mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if (mysqli_connect_errno()){
	
	echo "Coś się rypło!!! <br />";
	echo "Error".mysqli_connect_errno().""."Opis:".mysqli_connect_errno();
	
}
else{
	$kwerenda="SELECT * FROM  komis";
	
	if($wynik=$polaczenie->query($kwerenda)){
		$tablica=array();
			if($wynik->num_rows){	
			
			while ($wiersz= mysqli_fetch_assoc($wynik)){
				$tablica[] = $wiersz;
				
			}
			echo "<table border='1'><tr><td>id</td><td>nazwa</td><td>cena</td><td>ilosc</td></tr>";
			for($i=0;$i<sizeof($tablica);$i++){
				echo "<tr>";
				echo "<td>".$tablica[$i]['Id']."</td>";
				echo "<td>".$tablica[$i]['marka']."</td>";
				echo "<td>".$tablica[$i]['model']."</td>";
				echo "<td>".$tablica[$i]['przebieg']."</td>";
				echo "</tr>";
			}
			echo "</table>";
			}
	
	}		

	else{
		
		echo "zapytanie nie powiodło";
		
	};
	
	$polaczenie->close();
	}
?>
</form>
</div>
<div id="stopka"><center>Wykonal: Emil Mrozik</center></div>
</body>

</html>