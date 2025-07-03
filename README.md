# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, dan sistem transaksi.

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)

## Fitur

- Katalog Produk
  - Tampilan produk dengan gambar
  - Pencarian produk
- Keranjang Belanja
  - Tambah/hapus produk
  - Update jumlah produk
- Sistem Transaksi
  - Proses checkout
  - Riwayat transaksi
- Panel Admin
  - Manajemen produk (CRUD)
  - Manajemen kategori
  - Laporan transaksi
  - Export data ke PDF
- Sistem Autentikasi
  - Login/Register pengguna
  - Manajemen akun
- UI Responsif dengan NiceAdmin template
- Diskon Harian
  - Sistem mengecek diskon berdasarkan tanggal saat login
  - Diskon ditampilkan di header dan disimpan di session
  - Diskon otomatis mengurangi harga produk saat ditambahkan ke keranjang dan disimpan dalam detail transaksi
- Webservice API
  - Endpoint REST API untuk mengakses data transaksi pembelian
  - Digunakan oleh dashboard client (HTML statis)
- Webservice Client (Dashboard)
  - Mengambil data dari API menggunakan CURL
  - Menampilkan jumlah item yang dibeli dan data transaksi
- Integrasi Ongkir (RajaOngkir)
  - Menggunakan endpoint pihak ketiga untuk mendapatkan ongkos kirim berdasarkan kota tujuan
  - Otomatis menambahkan biaya ongkir ke total belanja

## Persyaratan Sistem

- PHP >= 7.4
- Composer
- Web server (XAMPP, Laragon, dll)
- MySQL/MariaDB

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone https://github.com/khafidhasukma/pwl_web_toko.git
   cd pwl_web_toko
   ```
2. **Install dependensi**
   ```bash
   composer install
   ```
3. **Konfigurasi database**

   - Start module Apache dan MySQL pada XAMPP
   - Buat database **db_ci4** di phpmyadmin.
   - copy file .env dari tutorial https://www.notion.so/april-ns/Codeigniter4-Migration-dan-Seeding-045ffe5f44904e5c88633b2deae724d2

4. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
5. **Seeder data**
   ```bash
   php spark db:seed ProductSeeder
   ```
   ```bash
   php spark db:seed UserSeeder
   ```
   ```bash
   php spark db:seed DiskonSeeder
   ```
6. **Jalankan server**
   ```bash
   php spark serve
   ```
7. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi.

## Struktur Proyek

Proyek menggunakan struktur MVC CodeIgniter 4:

```├── app/
│ ├── Config/ # Konfigurasi framework
│ ├── Controllers/ # Controller utama
│ │ ├── ApiController.php # REST API untuk dashboard eksternal
│ │ ├── AuthController.php # Autentikasi pengguna
│ │ ├── DiscountController.php # Manajemen diskon
│ │ ├── ProductCategoryController.php# Kategori produk
│ │ ├── ProdukController.php # Menampilkan produk
│ │ └── TransaksiController.php # Keranjang & transaksi
│ ├── Database/
│ │ ├── Migrations/ # Struktur tabel DB
│ │ └── Seeds/ # Seeder data awal
│ │ ├── ProductSeeder.php
│ │ ├── UserSeeder.php
│ │ ├── DiskonSeeder.php
│ │ └── ProductCategorySeeder.php
│ ├── Filters/ # Filter middleware
│ │ ├── Auth.php
│ │ ├── DiskonCheckFilter.php
│ │ └── Redirect.php
│ ├── Models/ # Model untuk query DB
│ │ ├── UserModel.php
│ │ ├── ProductModel.php
│ │ ├── TransactionModel.php
│ │ ├── TransactionDetailModel.php
│ │ └── DiscountModel.php
│ ├── Views/ # View dan UI
│ │ ├── components/ # Komponen UI
│ │ ├── v_produk.php # Daftar produk
│ │ ├── v_keranjang.php # Halaman keranjang
│ │ ├── v_checkout.php # Halaman checkout
│ │ ├── v_profile.php # Riwayat transaksi
│ │ ├── v_discount.php # CRUD diskon (admin)
│ │ ├── v_produkPDF.php # Export transaksi ke PDF
│ │ └── layout.php / layout_clear.php# Template layout
├── public/
│ ├── img/ # Gambar produk
│ ├── NiceAdmin/ # Template admin
│ └── dashboard.html # Web dashboard statis (client API)
├── .env # Konfigurasi environment
├── composer.json # Dependensi project
├── spark # CLI tool CI4
├── README.md
```
