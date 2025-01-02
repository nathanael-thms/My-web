<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $username = htmlspecialchars($_POST['username']);
    $firstname = htmlspecialchars($_POST['firstname']);
}

// Save info to the database
  $servername = "localhost";
  $susername = "nathanael"; //This var is called susername so php can distinguish between the username for the server and the username entered
  $password = '!@F@QfLCu_p2Xhk@rgjv';
  $dbname = "homepage";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $susername, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `logins` (`Username`, `FirstName`)
    VALUES ('$username', '$firstname')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Account created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
} 

$conn = null;

exit();


?>