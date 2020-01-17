<?php
//connect to mysql database
//$connection = mysqli_connect("HOSTNAME","DBNAME","PASSWORD","USER") or die("Error " . mysqli_error($connection));
//$connection = mysqli_connect('localhost','IRFCDB2','Irfc@2018dl2c6656','root') or die("Connection fail... " . mysqli_error($connection));

/* check connection 
if (!$connection) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
*/
?>
<?php
$dbname = 'ncrtc';
$dbuser = 'root';
$dbpass = 'bJdHRPpPK1vn';
$dbhost = '146.148.95.31';
$connection = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connection, $dbname) or die("Could not open the db '$dbname'");
?>
