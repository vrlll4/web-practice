<?php

// هذا الملف مسؤول عن الاتصال بقاعدة البيانات

// localhost يعني السيرفر المحلي داخل XAMPP
$servername = "localhost";

// اسم المستخدم الافتراضي في XAMPP
$username = "root";

// كلمة المرور فارغة افتراضيًا
$password = "";

// اسم قاعدة البيانات
$database = "dgwtech";

// إنشاء الاتصال بقاعدة البيانات
$conn = mysqli_connect($servername, $username, $password, $database);

// التحقق من نجاح الاتصال
if(!$conn){

    // إذا فشل الاتصال يظهر Error
    die("Connection Failed");

}

?>
