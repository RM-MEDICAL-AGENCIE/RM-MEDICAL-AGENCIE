<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "LOGIN";

// Establish the database connection
$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Not connected to the database: " . mysqli_connect_error());
} else {
    echo "Connected successfully<br>";
}

// Start the process
$username = $_POST['username']; 
$password = $_POST['password'];
$Date = $_POST['Date'];

// Insert query
$sql = "INSERT INTO details (username, password, Date) VALUES ('$username', '$password', '$Date')";

// Execute the query
$result = mysqli_query($con, $sql);

if ($result) {
    echo "Data submitted successfully";
} else {
    echo "Query failed: " . mysqli_error($con); // Detailed error output
}

// Close the database connection
mysqli_close($con);

?>
