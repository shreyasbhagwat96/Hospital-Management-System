<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "db.php";

// DELETE (safe)
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']); // prevent injection

    $stmt = $conn->prepare("DELETE FROM appointments WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: admin.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    text-align: center;
}

h2 {
    color: teal;
}

table {
    margin: auto;
    border-collapse: collapse;
    width: 80%;
    background: white;
}

th, td {
    padding: 12px;
    border: 1px solid #ccc;
}

th {
    background: teal;
    color: white;
}

a {
    text-decoration: none;
    color: red;
    font-weight: bold;
}

.logout {
    display: inline-block;
    margin: 10px;
    padding: 8px 15px;
    background: teal;
    color: white;
    border-radius: 5px;
}
</style>
</head>

<body>

<h2>All Appointments</h2>

<a href="logout.php" class="logout">Logout</a>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Doctor</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['pname']."</td>";
echo "<td>".$row['doctor']."</td>";
echo "<td>".$row['date']."</td>";
echo "<td>
<a href='admin.php?delete=".$row['id']."' 
onclick='return confirm(\"Are you sure?\")'>Delete</a>
</td>";
echo "</tr>";
}
?>

</table>

</body>
</html>