<?php
session_start(); // تفعيل الجلسة في أول السطر دائماً عشان السيرفر يفتكر المسافر
include 'config.php'; // استدعاء المفتاح السحري لقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // البحث في دفتر المسافرين (users) عن الشخص اللي كاتب اسمه
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // تحويل بيانات المسافر لمصفوفة نقرأها
        
        // فحص الباسورد: هل الباسورد اللي كتبه الحين يطابق المشفر اللي عندنا بالقاعدة؟
        if (password_verify($password, $user['password'])) {
            
            // نجح! نعطيه بطاقة صعود الطائرة السحرية ونخزن اسمه بالـ Session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // نطير به فوراً لشاشة الرحلات المتاحة (dashboard.php)
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('كلمة المرور غير صحيحة يا كابتن!');</script>";
        }
    } else {
        echo "<script>alert('اسم المسافر هذا غير مسجل لدينا!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>بوابة صعود الطائرة | تسجيل الدخول</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

    <div class="heart-bg" style="left: 15%; animation-delay: 1s;">💙</div>
    <div class="heart-bg" style="left: 40%; animation-delay: 0s;">❤️</div>
    <div class="heart-bg" style="left: 65%; animation-delay: 2.5s;">💙</div>
    <div class="heart-bg" style="left: 85%; animation-delay: 1.5s;">❤️</div>

    <div class="form-container">
        <h2>بوابة صعود الطائرة 🎫</h2>
        <p style="color: #ff4d6d;">سجل دخولك لتتمكن من استعراض وحجز رحلاتك</p>
        
        <form method="POST" action="">
            <input type="text" name="username" placeholder="اسم المستخدم" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit">تسجيل الدخول وصعود الطائرة 🛫</button>
        </form>

        <div class="signature">
            طيران **رنا** & **نوت** يتمنى لكم رحلة سعيدة وممتعة 💕
        </div>
    </div>

</body>
</html>