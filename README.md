# 🚗 Project Aplikasi Booking Kendaraan – Installation Guide

Panduan ini akan membantu kamu men-setup dan menjalankan proyek Laravel secara lokal.

---

## 📋 Prasyarat

Sebelum memulai, pastikan kamu sudah menginstall:

-   PHP >= 8.1
-   Composer
-   Node.js & NPM
-   MySQL / MariaDB
-   Git
-   Laravel CLI (opsional)

> 💡 Gunakan [Laragon](https://laragon.org/) atau [XAMPP](https://www.apachefriends.org/index.html) jika kamu butuh development environment cepat di Windows.

---

## 📦 1. Clone Repository

```bash
git clone https://github.com/Galsans/Rental_Mobil
cd Rental_Mobil
```

## ⚙️ 2. Install Dependency PHP

```
composer install

```

## 🎨 3. Install Dependency Frontend (NPM)

```

npm install
npm run dev

```

## 🔑 4. Salin File .env

```

cp .env.example .env

# atau (Windows)

copy .env.example .env

```

## 🔐 5. Generate App Key & Storage

```

php artisan key:generate
php artisan Storage:link

```

## 🗄️ 6. Jalankan Migrasi dan Seeder

```

php artisan migrate --seed

```

## 🏃 7. Jalankan Server Lokal

```

php artisan serve

```

🛠️ Fitur Aplikasi

1. 👤 Admin Panel
   Admin memiliki akses penuh untuk mengelola data dan melakukan konfirmasi booking.

✅ CRUD Kategori Kendaraan

✅ CRUD Data Kendaraan

✅ CRUD Data Pegawai

✅ Konfirmasi Booking Tiket

2. 🧑‍💼 Pegawai
   Pegawai memiliki akses terbatas untuk membantu proses administrasi dan komunikasi.

✅ Konfirmasi Booking Tiket

✅ Administrasi Chat / Komentar dari User

3. 🙋 User Panel

User dapat melakukan pemesanan kendaraan dan membatalkan jika diperlukan.

✅ Booking Mobil / Kendaraan

✅ Membatalkan Bookingan

```

```
