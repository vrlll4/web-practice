<?php
// 1. تحديد معلومات السيرفر
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // في السيرفر المحلي XAMPP نخليه فارغ دائماً

// 2. اسم قاعدة البيانات (هنا مربط الفرس!)
define('DB_NAME', 'mystyle_clothing'); 

// 3. أمر فتح الاتصال
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// 4. فحص هل الجسر اشتغل تمام؟ لو فيه غلط يطبع لنا السبب
if ($conn->connect_error) {
    die("خطأ في الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
