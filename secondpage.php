<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testingdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the form data to database columns
$stmt = $conn->prepare("INSERT INTO form_data (name, email, issue, comment) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $issue, $comment);

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$issue = $_POST['issue'];
$comment = $_POST['comment'];

// Execute the statement
if ($stmt->execute()) {
    echo "Form submitted successfully<br><br>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Issue: " . $issue . "<br>";
    echo "Comment: " . $comment . "<br>";
  } else {
    echo "Error submitting the form";
  }
  

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
