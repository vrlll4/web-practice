<?php
session_start();
include 'config.php'; // استدعاء المفتاح السحري

// حماية الصفحة: لو المسافر ما عنده بطاقة الجلسة (Session)، يطرده البواب فوراً لصفحة اللوجن
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم | رحلات طيران رنا ونوت</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

    <div class="heart-bg" style="left: 5%; animation-delay: 0.5s;">❤️</div>
    <div class="heart-bg" style="left: 25%; animation-delay: 2s;">💙</div>
    <div class="heart-bg" style="left: 55%; animation-delay: 1.2s;">❤️</div>
    <div class="heart-bg" style="left: 80%; animation-delay: 3s;">💙</div>

    <div class="container" style="max-width: 700px;"> <h2>👋 أهلاً بك يا كابتن <?php echo $_SESSION['username']; ?> في طيران رنا ونوت!</h2>
        <p>مرحباً بك في لوحة الحجوزات الخاصة بك.</p>
        
        <a href="logout.php" class="btn" style="background-color: #415a77; text-decoration: none; display: inline-block; width: auto; padding: 8px 15px; font-size: 14px; margin-bottom: 20px;">تسجيل الخروج 🚪</a>
        
        <h3 style="color: #ff4d6d; margin-top: 20px;">✈️ جدول الرحلات الدولية المتاحة اليوم:</h3>
        
        <table>
            <tr>
                <th>رقم الرحلة (ID)</th>
                <th>وجهة الطيران (Destination)</th>
                <th>سعر التذكرة (Price)</th>
            </tr>
            
            <?php
            // استعلام الـ SQL: روح جيب البيانات من دفتر الرحلات (flights)
            $sql = "SELECT * FROM flights"; 
            $result = $conn->query($sql);
            
            // لو لقى رحلات مخزنة في قاعدة البيانات يعرضها داخل الجدول
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['destination']; ?></td>
                        <td><?php echo $row['price']; ?> SAR</td>
                    </tr>
                    <?php
                }
            } else {
                // لو قاعدة البيانات لسه ما حطينا فيها طيارات، يطلع هذا السطر الكشخة
                ?>
                <tr>
                    <td>101</td>
                    <td>الرياض 🇸🇦 ⬅️ باريس 🇫🇷</td>
                    <td>2500 SAR</td>
                </tr>
                <tr>
                    <td>202</td>
                    <td>جدة 🇸🇦 ⬅️ لندن 🇬🇧</td>
                    <td>2900 SAR</td>
                </tr>
                <tr>
                    <td colspan="3" style="color: #8196b0; font-size: 14px; padding-top: 15px;">
                        💡 ملاحظة: هذه رحلات تجريبية مسجلة من الكابتن رنا ونوت لحين ربط الـ Database بالكامل.
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <div class="signature">
            شكرًا لاختياركم طيران **رنا** & **نوت** الفخم 💕
        </div>
    </div>

</body>
</html>