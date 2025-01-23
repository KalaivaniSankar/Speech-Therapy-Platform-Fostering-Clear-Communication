
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];


// Database connection
$conn = new mysqli('localhost', 'root', '', 'speech');
if($conn->connect_error){
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO contact (name, email, number, subject, msg) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("sssss", $name, $email, $number, $subject, $msg);
if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}

$stmt->close();
$conn->close();
header("Location:http://localhost:8012/avagado-20240219T093759Z-001/avagado/");
exit();
?>
