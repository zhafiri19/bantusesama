# 🤝 Bantu Sesama  
**Donasi Platform (Midtrans Integration)**

Bantu Sesama adalah sebuah website donasi sederhana yang dibuat sebagai **clone platform donasi**, dengan fokus utama pada **integrasi payment gateway Midtrans**.  
Project ini dibangun menggunakan **Laravel 12** dan ditujukan sebagai **project pembelajaran maupun portofolio**.

---

## ✨ Fitur Utama
- 💳 Integrasi Payment Gateway **Midtrans (Snap)**
- 💰 Donasi dengan nominal bebas
- 📄 Halaman donasi sederhana & clean
- 🔐 Konfigurasi environment aman menggunakan `.env`
- 🧱 Struktur backend rapi berbasis Laravel 12

---

## 🛠️ Teknologi yang Digunakan
- **Laravel 12**
- **PHP 8.2+**
- **Midtrans Snap API**
- **MySQL / MariaDB**
- **Composer**
- **Blade Template (default Laravel)**

---
⚙️ Instalasi & Setup Project
1️⃣ Clone Repository
```bash
git clone https://github.com/username/bantu-sesama.git
cd bantu-sesama
```

2️⃣ Install Dependency
```bash
composer install
```

3️⃣ Copy File Environment
```bash
cp .env.example .env
```

4️⃣ Generate App Key
```bash
php artisan key:generate
```

5️⃣ Konfigurasi Database

Edit file .env:
```bash
DB_DATABASE=donasi
DB_USERNAME=root
DB_PASSWORD=
```

Lalu jalankan:
```bash
php artisan migrate
```

💳 Konfigurasi Midtrans

Tambahkan konfigurasi Midtrans di file .env:
```bash
MIDTRANS_SERVER_KEY=your_server_key
MIDTRANS_CLIENT_KEY=your_client_key
MIDTRANS_IS_PRODUCTION=false
```

▶️ Menjalankan Project
```bash
php artisan serve
```
Akses di browser:
```bash
http://127.0.0.1:8000
```

```bash
Project ini tidak menggunakan sistem autentikasi

Fokus utama adalah alur donasi & integrasi payment

Cocok untuk:

Project belajar Laravel

Portofolio backend

Contoh integrasi Midtrans

📸 Preview (Opsional)

Tambahkan screenshot UI di sini jika sudah ada

🧑‍💻 Author

Bantu Sesama
Dibuat dengan ❤️ menggunakan Laravel 12

📄 License

Project ini bersifat open-source dan bebas digunakan untuk keperluan pembelajaran.
```
