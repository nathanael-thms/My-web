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

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Save info to the database

  try {
    $sql = $DB_CONNECTION->prepare(
      "INSERT INTO `logins` (Username, FirstName, LastName, Email, PhoneNumber)
          VALUES (:username, :firstname, :lastname, :email, :phoneNumber)"
      );

    $sql->execute([
      ':username' => $username,
      ':firstname' => $firstname,
      ':lastname' => $lastname,
      ':email' => $email,
      ':phoneNumber' => $phoneNumber
    ]);
    
    echo "Account created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
} 

exit();


?>