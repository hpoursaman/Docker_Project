<?php
$address = "http://172.17.0.2:3306";

if(isset($_POST['send']))
{
		$user = $_POST['userName'];
		$pass = $_POST['password'];
		$address .= "?studentNumber=". $user . "&password=" . $pass ;
var_dump($address);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $address,

		));
		$resp = curl_exec($curl);
		curl_close($curl);
		$data = (json_decode($resp, true));
var_dump($data);		
		if($data['status'] == 200){
			//ok
		}else{
			//problem
		}


	}
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input name="userName" type="text" placeholder="user"> <br>
		<input name="password" type="password" placeholder="password"> <br>
		<input name="send" type="submit">
	</form>
</body>
</html>