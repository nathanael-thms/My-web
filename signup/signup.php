<!-- <?php
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
$password = getenv('DB_PASSWORD');

try {
  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>  -->