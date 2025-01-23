<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "speech";

// Connect to MySQL database
$con = mysqli_connect($host, $user, $password, $db);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Prepare SQL statement with parameters to prevent SQL injection
    $sql = "SELECT * FROM signup WHERE name = ? AND password = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $name, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // Redirect to index.html upon successful login
        header("Location:http://localhost:8012/avagado-20240219T093759Z-001/avagado/");
        exit();
    } else {
        // Display error message for invalid credentials
        echo "Invalid username or password. Please try again.";
    }
}

// Close database connection
mysqli_close($con);
?>
