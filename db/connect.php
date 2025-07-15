<?php

//Database connection
$conn = mysqli_connect("localhost", "root", "", "roshan");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "Connected successfully";
}
?>
