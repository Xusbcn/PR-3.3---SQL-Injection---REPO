<html>
 <head>
 	<title>SQL INJECTION</title>
 	<style>
 		body{
 		}
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
 </head>
 
 <body>
 	<h1>SQL INJECTION</h1>
 
 	<?php
 		# (1.1) Connectem a MySQL (host,usuari,contrassenya)
 		$conn = mysqli_connect('localhost','xus','xus123');
 
 		# (1.2) Triem la base de dades amb la que treballarem
 		mysqli_select_db($conn, 'DatosAlumnos');
 	?>
 	
	<form action="login.php" method="post">
    Nombre: <input type="text" name="Nombre"><br>
    contrassenya: <input type="text" name="pass"><br>
    <input type="submit" value="Enviar">
	</form>

<?php
	$nombre = $_POST["Nombre"]; 
	$password = $_POST["pass"]; 

	$consulta = "SELECT * FROM logeo WHERE nom= '".$nombre."' AND contrasenya=SHA('".$password."')";



	$resultat = mysqli_query($conn, $consulta);

	//$row=mysql_fetch_row($resultat);

	$num=mysqli_num_rows($resultat);


	if($num>0){
		while( $registre = mysqli_fetch_assoc($resultat) )
 		{
 			
 			echo "<p= style='background-color:green;'> Hola: ".$registre["nom"]." <br>";
 			
 		}
 	}
	else
	{
		echo "<p= style='background-color:red;'> No entro";
	}
	unset($resultat);
	unset($conn)
	
	?>
</body>
</html>
 </body>
</html>