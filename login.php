<form method="POST">
<h2>Admin Login</h2>

<input type="text" name="user" placeholder="Username" required><br><br>
<input type="password" name="pass" placeholder="Password" required><br><br>

<button type="submit">Login</button>
</form>

<?php
session_start();

if(isset($_POST['user'])){
$user = $_POST['user'];
$pass = $_POST['pass'];

if($user=="admin" && $pass=="1234"){
$_SESSION['admin']="yes";
header("Location: admin.php");
}else{
echo "Wrong Login";
}
}
?>
