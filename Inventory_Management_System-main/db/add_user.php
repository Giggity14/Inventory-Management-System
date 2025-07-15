<?php
$conn = mysqli_connect("localhost", "root", "", "inventory_management_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

// Check if the form has been submitted
if (!empty($_POST)) {
    // Get the form data
    $userId = $_POST['user-id'];
    $userName = $_POST['user-name'];
    $emailAddress = $_POST['email-address'];
    $phoneNumber = $_POST['phone-number'];
    $address = $_POST['address'];
    $userRole = $_POST['user-role'];

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "INSERT INTO users (UserID, FirstName, LastName, Email, Password, UserType, PhoneNumber) VALUES (?, NULL, NULL, ?, NULL, ?, ?)");

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, "ssss", $userId, $userName, $emailAddress, $userRole, $phoneNumber);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("New record created successfully");</script>';
    } else {
        echo '<script>alert("Error: ' . $stmt . '\n' . mysqli_error($conn) . '");</script>';
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
