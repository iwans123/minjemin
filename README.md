<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Pertama-tama, kita perlu membuat file .env berdasarkan dari file env.example, caranya jalankan perintah:

```
copy .env.example .env
```

Berikutnya, kita instal package-package yang diinstal dalam composer di mana package tersebut akan disimpan dalam folder vendor. Jalankan perintah berikut di dalam command prompt atau terminal:

```
composer install
```

Perintah ini akan meng-generate keyuntuk dimasukkan ke APP_KEY di file .env

Kemudian, jika aplikasi Laravel tersebut memiliki database, buatlah nama database baru. Lalu sesuaikan nama database, username, dan password database di file .env.

Berikutnya jalankan perintah berikut:

```
php artisan migrate
```

Berikutnya jalankan perintah berikut:

```
php artisan db:seed
```

Terakhir, untuk membukanya di web browser, jalankan perintah:

```
php artisan serve
```

Lalu jalankan http://localhost:8000

role admin :
email : admin@gmail.com
pass : admin123

role user 1 :
email : sumanto@gmail.com
pass : sumanto123

role user 2:
email : selamet@gmail.com
pass : selamet123

Web Server Information
Apache/2.4.54 (Win64) OpenSSL/1.1.1q PHP/8.1.10
Database client version: libmysql - mysqlnd 8.1.10
PHP extension: mysqli Documentation curl Documentation mbstring Documentation
PHP version: 8.1.10

phpMyadmin
Version information: 5.2.0, latest stable version: 5.2.1
