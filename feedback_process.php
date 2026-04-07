<?php
$conn = mysqli_connect("localhost", "root", "", "hospital");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];

    $cleanliness = $_POST['cleanliness'];
    $staff = $_POST['staff'];
    $doctor = $_POST['doctor'];
    $nursing = $_POST['nursing'];
    $waiting = $_POST['waiting'];
    $billing = $_POST['billing'];
    $overall = $_POST['overall'];

    $comments = $_POST['comments'];
    $recommend = $_POST['recommend'];

    $sql = "INSERT INTO feedback 
    (name, age, gender, contact, cleanliness, staff, doctor, nursing, waiting, billing, overall, comments, recommend)
    VALUES 
    ('$name', '$age', '$gender', '$contact', '$cleanliness', '$staff', '$doctor', '$nursing', '$waiting', '$billing', '$overall', '$comments', '$recommend')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Feedback Submitted Successfully!'); window.location.href='feedback.html';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>