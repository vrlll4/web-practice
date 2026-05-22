<?php
// استدعاء المفتاح السحري عشان نفتح قاعدة بيانات المطار
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الطباخ ياخذ البيانات اللي كتبها المسافر وينظفها
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    
    // تشفير كلمة المرور لحماية حساب المسافر برقم سري قوي
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // أمر الـ SQL عشان نكتب المسافر الجديد في دفتر المستخدمين
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('تم تسجيلك بنجاح في طيران رنا ونوت! ✈️'); window.location.href='login.php';</script>";
    } else {
        echo "حدث خطأ أثناء التسجيل: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل مسافر جديد | طيران رنا ونوت</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

    <div class="heart-bg" style="left: 10%; animation-delay: 0s;">❤️</div>
    <div class="heart-bg" style="left: 30%; animation-delay: 2s;">💙</div>
    <div class="heart-bg" style="left: 50%; animation-delay: 1s;">❤️</div>
    <div class="heart-bg" style="left: 70%; animation-delay: 3s;">💙</div>
    <div class="heart-bg" style="left: 90%; animation-delay: 0.5s;">❤️</div>

    <div class="form-container">
        <h2>✈️ مرحباً بك في طيران رنا ونوت ✈️</h2>
        <p style="color: #ff4d6d;">أنشئ حسابك الآن وابدأ رحلتك معنا</p>
        
        <form method="POST" action="">
            <input type="text" name="username" placeholder="اكتب اسمك بالكامل" required>
            <input type="email" name="email" placeholder="بريدك الإلكتروني" required>
            <input type="password" name="password" placeholder="اختر كلمة مرور سرية" required>
            <button type="submit">تأكيد التسجيل وانطلاق 🚀</button>
        </form>

        <div class="signature">
            بإشراف الكابتن: **رنا السعيد** والمصممة: **نوت** 💕
        </div>
    </div>

</body>
</html>