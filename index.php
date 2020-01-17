<?php include("DB.php"); ?>
<?php 
$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	header('Content-Type: application/json');
	$requestBody = file_get_contents("php://input");
	$json = json_decode($requestBody, true);
	$Empname = $json["queryResult"]["parameters"]["Empname"];
	$NumberType = $json["queryResult"]["parameters"]["Numbertype"];
	if(($Empname != "" && $Empname != null) && ($NumberType != "" && $NumberType != null))
	{
		$sql="Select * from emp where Empname LIKE '%$Empname%' ";
		$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $Mobile = $row['Mobile'];
		$Intercome = $row['Intercome'];
		$telephone = $row['telephone'];
		$speech = "Mobile Number is ".$Mobile." , Intercome Number is ".$Intercome." , Telephone Number is ".$telephone;
	}
	else 
	{
		if(($Empname != "" && $Empname != null) && ($NumberType == "" || $NumberType == null)
		{
			$speech = "which type of number you want intercom number , telephone number or mobile number";
		}		
		else
		{
			if(($Empname == "" || $Empname == null) && ($NumberType != "" && $NumberType != null)
			{
				$speech = "which type of number you want intercom number , telephone number or mobile number";
			}
			else
			{
				$speech = "May i have the employee name please";
			}
		}
	}

	$response = new \stdClass();
	$response->fulfillmentText = $speech;
	$response->displayText = $speech;
	$response->source = "General";
	echo json_encode($response);
}
else
{
	echo "method not allowed";
}
?>
