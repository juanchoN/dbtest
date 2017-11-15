<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER");
$dbname = getenv("MYSQL_DATABASE");
$dbpwd = getenv("MYSQL_PASSWORD");
 


$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));


$query = "SELECT * from users" or die("Error in the consult.." . mysqli_error($connection));

echo "Hola qué tal. La lista de usuarios es ésta: <br>";
$rs = $connection->query($query);
$numeroUsuarios = 0;
while ($row = mysqli_fetch_assoc($rs)) {
    $numeroUsuarios++;
    echo "User Id: ".$row['user_id'] . " User Name: " . $row['username'] . "<br>";
}
if ($numeroUsuarios == 0) {
  echo "No hay usuarios<br>";
}
 
echo "End of the list <br>";

mysqli_close($connection);

?>
