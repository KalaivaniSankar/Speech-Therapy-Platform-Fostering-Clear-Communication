
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'speech');
if($conn->connect_error){
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO signup (name, email, password) VALUES (?, ?, ?)");
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("sss", $name, $email, $password);
if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}

$stmt->close();
$conn->close();
header("Location: Quiz Application with Timer/index.html");
exit();
?>
