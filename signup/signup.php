<?php
// // Start the session
// session_start();

// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Collect and sanitize input data
//     $username = htmlspecialchars($_POST['username']);
//     $password = htmlspecialchars($_POST['password']);

//     // Save info to the database
//   $_SESSION['username'] = $username;
//     header("Location: welcome.php");
//     exit();
// }
$servername = "localhost";
$username = "nathanael";
$password = '!@F@QfLCu_p2Xhk@rgjv';
$dbname = "homepage";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `logins` (`isAdmin`, `Username`, `FirstName`)
  VALUES (0, 'natthopo', 'Natthaphon')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
} 

$conn = null;

?>