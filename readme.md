# Hướng dẫn

Sau khi pull github về cần làm 1 số việc như sau

Copy file .env.example thành .env

Chạy lệnh command
```
php artisan key:generate
```

Cấu hình DB phù hợp

Set quyền ghi cho thư mục storage/ và bootstrap/
```
chmod -R 777 storage/ bootstrap/
```
