# Sistem Informasi Pengaduan Masyarakat

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

Sistem Informasi Pengaduan Masyarakat berbasis **Laravel**. Sistem ini memungkinkan:

- Masyarakat membuat pengaduan secara online.
- Admin mengelola dan memantau pengaduan melalui dashboard.
- Tampilan responsif menggunakan **Tailwind CSS**.

---

## **Fitur Utama**

### Masyarakat
- **Beranda**: melihat daftar pengaduan (tanpa login atau dengan login).
- **Ajukan Pengaduan**: submit pengaduan baru dengan opsi upload foto.
- **Cek Status**: melihat status pengaduan mereka.
- **Detail Pengaduan**: melihat rincian setiap pengaduan.

### Admin
- **Login Admin**: akses ke dashboard.
- **Dashboard Admin**: ringkasan pengaduan.
- **Kelola Pengaduan**: ubah status pengaduan (`menunggu`, `diproses`, `selesai`).

---

## **Persyaratan Sistem**

- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Node.js & NPM
- Laravel 12.x

---

## **Struktur Folder**



sistem-informasi-pengaduan-masyarakat/
├── app/
│ ├── Http/Controllers/
│ │ ├── Auth/
│ │ ├── Admin/
│ │ └── Masyarakat/
│ └── Models/
├── database/
│ ├── migrations/
│ └── seeders/
├── public/ # file statis (CSS, JS, gambar)
├── resources/
│ ├── views/ # Blade templates (UI)
│ │ ├── admin/
│ │ └── masyarakat/
│ └── css/
├── routes/
│ └── web.php # definisi semua route
├── storage/
├── vendor/
├── artisan # command line Laravel
└── composer.json


---

## **Instalasi Lokal**

### 1. Clone Repository

```bash
git clone <URL_REPO_KAMU>
cd sistem-informasi-pengaduan-masyarakat

2. Install Dependencies
composer install
npm install
npm run dev

3. Setup Environment

Copy file .env.example menjadi .env:

cp .env.example .env


Edit .env untuk konfigurasi database:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_informasi_pengaduan_masyarakat
DB_USERNAME=root
DB_PASSWORD=  # sesuai password lokal

4. Migrasi Database
php artisan migrate
php artisan db:seed   # opsional, untuk data dummy/admin

5. Jalankan Server
php artisan serve


Halaman default masyarakat: http://127.0.0.1:8000/masyarakat

Halaman login admin: http://127.0.0.1:8000/login

Routing Utama
Masyarakat
Route	Controller / Method	Keterangan
/masyarakat	PengaduanController@index	Beranda
/masyarakat/pengaduan/create	PengaduanController@create	Form ajukan pengaduan
/masyarakat/pengaduan	PengaduanController@store	Simpan pengaduan
/masyarakat/pengaduan/status	PengaduanController@status	Cek status pengaduan
/masyarakat/pengaduan/{id}	PengaduanController@show	Detail pengaduan
Admin
Route	Controller / Method	Keterangan
/login	AuthController@showLogin	Login admin
/login (POST)	AuthController@login	Proses login
/admin/dashboard	DashboardController@index	Dashboard admin
/admin/pengaduan	AdminPengaduan@index	List pengaduan
/admin/pengaduan/{id}/status (POST)	AdminPengaduan@updateStatus	Update status pengaduan
Middleware & Keamanan

Admin Middleware: semua /admin/* harus login sebagai admin.

Masyarakat: boleh submit pengaduan tanpa login, tapi jika login bisa memantau status.

Semua form menggunakan @csrf untuk keamanan Laravel.

UI & Blade

Tailwind CSS: untuk styling responsif.

Blade Template:

resources/views/masyarakat → halaman masyarakat.

resources/views/admin → halaman admin.

Navbar dan tombol interaktif sudah disiapkan di Blade.

Kontribusi

Boleh fork project ini dan membuat pull request.

Ikuti Code of Conduct Laravel: https://laravel.com/docs/contributions#code-of-conduct
.

Lisensi

Project ini menggunakan lisensi MIT License: https://opensource.org/licenses/MIT

Dibuat menggunakan Laravel 12, PHP 8.2, MySQL/MariaDB, Tailwind CSS.