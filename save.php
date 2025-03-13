<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "rmmedicalwebdata";

// Establish the database connection
$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    echo "Not connected to the database";
    die(); // Stop the script if the connection fails
} else {
    echo "Connected successfully";
}


// Start the process
// Get form data using the correct method $_POST
$name = $_POST['name'];
$phone = $_POST['email'];  // Corrected this line
$email = $_POST['phone'];  // Corrected this line
$city = $_POST['city'];
$password = $_POST['password'];



// Prepare the SQL query
$sql = "INSERT INTO `table` (`name`, `email`, `phone`, `city`, `password`) 
        VALUES ('$name', '$email', '$phone', '$city', '$password')";
 

// Execute the query
$result = mysqli_query($con, $sql);


if ($result) {
    echo "Data submitted successfully";
} else {
    echo "Query failed: " . mysqli_error($con); // Detailed error output
}

?>
