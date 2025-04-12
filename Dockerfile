# ใช้ PHP เวอร์ชัน 8.2 กับ Apache
FROM php:8.2-apache

# คัดลอกทุกไฟล์ในโฟลเดอร์ public ไปยัง /var/www/html
COPY public/ /var/www/html/

# เปิด mod_rewrite (ในกรณีใช้ .htaccess)
RUN a2enmod rewrite

# เปิดพอร์ต 80 สำหรับเว็บเซิร์ฟเวอร์
EXPOSE 80
