<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie List</title>
    <link rel="stylesheet" href="./css/lists.css" />
  </head>
  <body>
    <section>
      <div class="textbox">
        <h1>Favorite Movie Lists</h1>
      </div>
      <a href="../index.html" class="btn">Add more movie</a>
    </section>

    <script src="./js/main.js"></script>
  </body>
</html>
<?php
//require db connection 
require_once "_includes/db_connect.php";

//result array and counter of inserted data
$results = [];
$insertedData = 0;

//add sql query
$query = "INSERT INTO demo (name, email, tvshow) VALUES (?, ?, ?);";

//binding inserted param to the sql query
if($stmt = mysqli_prepare($link, $query)){
  //get the param either from post of get request
  mysqli_stmt_bind_param($stmt,"sss", $_REQUEST["full_name"], $_REQUEST["email"], $_REQUEST["tvshow"]);

  //execute the statement
  mysqli_stmt_execute($stmt);
  //if succesfull it will show how many rows that inserted
  $insertedData = mysqli_stmt_affected_rows($stmt);

  //see if there is rows, and give back message
  if($insertedData > 0){
    $results[] = [
      "insertedData" => $insertedData,
      "id" => $link->insert_id,
      "full_name" => $_REQUEST["full_name"],
      "message" => "You add more data to your records"
    ];
  }

  header("https://fransiskus42.web582.com/dynamic/movie_db/list.html" );

}

//https://fransiskus42.web582.com/dynamic/movie_db/app/insert.php?full_name=Robin&email=robin@email.com&tvshow=Spiderman
//https://fransiskus42.web582.com/dynamic/movie_db/app/insert.php?full_name=Jason Born&email=jason_born@email.com&tvshow=Jason Borne Part 1

?>