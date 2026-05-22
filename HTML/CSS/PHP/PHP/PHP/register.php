<?php
// استدعاء ملف الجسر عشان نقدر نكلم قاعدة البيانات
include 'config.php';

// التحقق: هل المستخدم ضغط على زر التسجيل وأرسل الفورم؟
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // استقبال البيانات المدخلة وتنظيفها لحماية الموقع من الاختراق
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    
    // تشفير كلمة المرور عشان ما تظهر واضحة في قاعدة البيانات
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // استعلام الـ SQL: "يا قاعدة البيانات أدخلي هذه القيم في جدول الـ users"
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    // تنفيذ الأمر وفحص النتيجة
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('تم التسجيل بنجاح!'); window.location.href='login.php';</script>";
    } else {
        echo "حدث خطأ أثناء التسجيل: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب جديد</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>تسجيل حساب جديد</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="اسم المستخدم" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit">تسجيل</button>
        </form>
    </div>
</body>
</html>
