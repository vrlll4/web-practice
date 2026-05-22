<?php

// استدعاء ملف الاتصال بالداتابيس
include 'connect.php';

// أخذ البيانات القادمة من الفورم
$name = $_POST['name'];
$email = $_POST['email'];

/*
INSERT INTO
تستخدم لإضافة بيانات داخل الجدول
*/

$sql = "INSERT INTO customers(name,email)

VALUES('$name','$email')";

// تنفيذ الاستعلام
mysqli_query($conn,$sql);

// رسالة نجاح
echo "Data inserted successfully";

?>
