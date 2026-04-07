<?php
$conn = mysqli_connect("localhost", "root", "", "hospital");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pname = $_POST['pname'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];

    $sql = "INSERT INTO appointments (pname, doctor, date) 
            VALUES ('$pname', '$doctor', '$date')";

    if (mysqli_query($conn, $sql)) {
        header("Location: appointment.html?success=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>