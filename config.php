<?php
// معلومات السيرفر المحلي ثابتة ما تتغير في برنامج XAMPP
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // في السيرفر المحلي نخليه فاضي دائماً

// اسم قاعدة البيانات السحرية لشركة طيران رنا ونوت ✈️
define('DB_NAME', 'rana_nout_flights'); 

// أمر فتح الباب والاتصال بقاعدة البيانات
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// الفحص: لو المفتاح علّق أو فيه مشكلة في الاتصال يطبع لنا الخطأ عشان نعرفه
if ($conn->connect_error) {
    die("خطأ في الاتصال بقاعدة بيانات المطار: " . $conn->connect_error);
}
?>