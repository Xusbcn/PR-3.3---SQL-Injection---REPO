<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php
/*
 * index.php
 */

if (isset($_POST['login'])) {
    $formMessage;
    $query;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $table = "logeo";
    $server = 'localhost';
    $database = 'DatosAlumnos';
    $dbUsername = 'xus';
    $dbPassword = 'xus123';

    try {
        $pdo = new PDO("mysql:host=". $server. ";dbname=". $database, $dbUsername, $dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare("SELECT * FROM ". $table. " WHERE nom = :username AND contrasenya = SHA(:password)");
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $formMessage = "Hola ". $user['nom']. "!";
        } else {
            $formMessage = "Username or Password incorrect";
        }
    } catch(PDOException $e) {
        $formMessage = "ERROR : ". $e->getMessage();
    }
}


?>
</head>
<body>
	<form action="prueba.php" method="post">
    <input name="username" placeholder="Username" type="text"></input>
    <input name="password" placeholder="Password" type="password"></input>
    <button name="login" type="submit">Submit</button>
    <div><?php if (isset($formMessage)) { echo $formMessage; } ?></div>
  
</form>
</body>
</html>


