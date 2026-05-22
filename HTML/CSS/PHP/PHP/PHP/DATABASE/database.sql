-- إنشاء قاعدة البيانات
CREATE DATABASE dgwtech;

-- استخدام قاعدة البيانات
USE dgwtech;

-- إنشاء جدول العملاء
CREATE TABLE customers(

-- رقم العميل ويتزايد تلقائيًا
id INT AUTO_INCREMENT PRIMARY KEY,

-- اسم العميل
name VARCHAR(100),

-- إيميل العميل
email VARCHAR(100)

);
