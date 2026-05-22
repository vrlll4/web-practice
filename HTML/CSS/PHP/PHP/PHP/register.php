<?php

include 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO customers(name,email)

VALUES('$name','$email')";

mysqli_query($conn,$sql);

echo "Data inserted successfully";

?>
