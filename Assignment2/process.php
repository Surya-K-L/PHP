<?php
$servername = "localhost";
$username = "root";
$password = "SuryaHr@74";
$database = "user_data_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name']; 
    $email = $_POST['email'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO users (nam, email, age, dob, gender) VALUES ('$name', '$email', '$age', '$dob', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>New record created successfully</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
    }
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Date of Birth</th><th>Gender</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nam']}</td>
                <td>{$row['email']}</td>
                <td>{$row['age']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['gender']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found</p>";
}

$conn->close();
?>
