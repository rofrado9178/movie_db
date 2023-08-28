<?php

$host = "localhost:3306";
$db = "fransiskus42_demo_db";
$user = "fransiskus42_demo_db";
$pass = "PleskDB1234";

$link = mysqli_connect($host, $user , $pass, $db);

$db_response = [];
$db_response["success"] = "not set";

if(!$link){
  $db_response["success"] = false;
}
else{
  $db_response["success"] = true;
}

// echo json_encode($db_response);



?>