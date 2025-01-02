<?php
require_once('../boot.php');
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $username = htmlspecialchars($_POST['username']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);

}

// Save info to the database

  try {
    $sql = $DB_CONNECTION->prepare(
      "INSERT INTO `logins` (`Username`, `FirstName`)
      VALUES (:username, :firstname)");

    $sql->exec([
      ':username' => $username,
      ':firstname' => $firstname,
    ]);
    
    echo "Account created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
} 

exit();


?>