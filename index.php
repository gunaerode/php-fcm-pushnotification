<?php 

	require ('SendNotification.php');
	
    // FCM Token 	
	$token = "dV6vR3hLAbA:APA91bExZjR_TMeWG8EFk23J8ZkuGvQ_u6PWjkar5HYSXzD3_NM5cSnpEc0B_jYLHD7-a2doTAueICOLYCaI-x6d6lpmnj7Gp7FRduK0KzmQvY2laQz8WC7oS0roUqN_LnzhNK6MgSE6";
	$message = "Hi, Testing from PEXit demo";
	
	$serverObject = new SendNotification(); 
	$jsonString = $serverObject->sendPushNotificationToFCMSever($token, $message);
	
	echo "<pre>";
	print_r ($jsonString);exit;
	
	$jsonObject = json_decode($jsonString);
	
	return $jsonObject;
?>