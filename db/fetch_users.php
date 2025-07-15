<?php
$conn = mysqli_connect("localhost", "root", "", "inventory_management_system");

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo "Connected successfully";
}

// fetch data from database
$sql = "SELECT * FROM users"; // Adjusted table name
$result = $conn->query($sql);

// display data in HTML table format
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr>";
  echo "<th>User ID</th>";
  echo "<th>First Name</th>";
  echo "<th>Last Name</th>";
  echo "<th>Email</th>";
  echo "<th>Password</th>";
  echo "<th>User Type</th>";
  echo "<th>Phone Number</th>";
  echo "</tr>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['UserID'] . "</td>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['Password'] . "</td>";
    echo "<td>" . $row['UserType'] . "</td>";
    echo "<td>" . $row['PhoneNumber'] . "</td>";
    echo "</tr>";
  }

  echo "</table>";
} else {
  echo "0 results";
}

// close connection
$conn->close();
?>
