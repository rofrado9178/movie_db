<?php
//import db connect 
require_once "_includes/db_connect.php";

//prepare the statement passing the db $link and SQL

$stmt = mysqli_prepare($link, "SELECT name, email, tvshow, timestamp FROM demo ORDER BY timestamp DESC");

//execute statement /query
mysqli_stmt_execute($stmt);

//get result
$result = mysqli_stmt_get_result($stmt);

//loop through
while($row = mysqli_fetch_assoc($result)){
  $results[] = $row;
}

echo json_encode($results);

mysqli_close($link);





?>