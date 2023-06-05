<?php
$con=mysqli_connect("localhost","root","","elevecomax");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="Delete from utilisateurs where id=";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
echo "Compte supprimée";
header("Refresh:3; url=admin_panel.php");

mysqli_close($con);
?>