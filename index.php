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

	$speech = "Mobile Number is ".$Empname." , Intercome Number is ".$NumberType.";


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
