<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./css/css.css">
</head>
<body>
    <h1>Sign Up</h1>
    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" required>
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname">
        <br><br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <br><br>
        <label for="phoneNumber">Phone Number</label>
        <input type="text" name="phoneNumber" id="phoneNumber">
        <br><br>
        <button type="submit">Sign Up</button>
    </form>
<?php
require_once('../boot.php');
// Start the session
session_start();
$nameErr = $emailErr = $genderErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    if (empty($_POST["username"])) {
        $nameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }

    if (empty($_POST["firstname"])) {
        $nameErr = "First name is required";
    } else {
        $firstname = test_input($_POST["firstname"]);
    }
    // $username = test_input($_POST['username']);
    // $firstname = test_input($_POST['firstname']);
    // $lastname = test_input($_POST['lastname']);
    // $email = test_input($_POST['email']);
    // $phoneNumber = test_input($_POST['phoneNumber']);

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

</body>
</html>