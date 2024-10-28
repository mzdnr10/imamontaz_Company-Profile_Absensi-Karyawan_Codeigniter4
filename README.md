Langkah-langkah Instalasi

Langkah 1: Persiapan Lingkungan
Pastikan server atau komputer kamu sudah memiliki:
   - PHP 7.4 atau lebih baru
   - Composer (untuk manajemen dependensi)

Langkah 2: Clone Repository CodeIgniter dari GitHub
1. Buka terminal atau command prompt.
2. Masukkan perintah berikut untuk mengunduh dari GitHub:

```bash
git clone https://github.com/mzdnr10/imamontaz_Company-Profile_Absensi-Karyawan_Codeigniter4
```

Langkah 3: Masuk ke Direktori Project
Setelah selesai di-*clone*, pindah ke direktori project yang baru dibuat:

```bash
cd imamontaz_Company-Profile_Absensi-Karyawan_Codeigniter4
```
Langkah 4: Install Dependensi Menggunakan Composer
Jalankan perintah berikut untuk menginstal semua dependensi CodeIgniter 4:

```bash
composer install
```

Jika composer berhasil, semua paket yang dibutuhkan akan terpasang di folder `vendor`.
Langkah 5: Konfigurasi File Lingkungan (Environment)
1. Copy file `.env.example` menjadi `.env` di dalam root direktori project:

```bash
cp env.example .env
```

2. Buka file `.env` dan pastikan pengaturan database, base URL, dan environment sudah sesuai.

Misalnya, untuk pengaturan database, kamu bisa menambahkan:

```env
database.default.hostname = localhost
database.default.database = nama_database
database.default.username = nama_user
database.default.password = password
database.default.DBDriver = MySQLi
```
Langkah 6: Setel Enkripsi Kunci
CodeIgniter 4 memerlukan enkripsi kunci untuk keamanan, buka file `.env` dan cari baris:

```env
app.encryptionKey =
```

Lalu tambahkan kunci unik yang panjang, misalnya dengan menggunakan perintah berikut di terminal:

```bash
php spark key:generate
```

Salin hasilnya dan masukkan ke dalam `app.encryptionKey`.
Langkah 7: Jalankan Server CodeIgniter
Untuk menjalankan project CodeIgniter 4 di *development mode*, gunakan perintah berikut:

```bash
php spark serve
```

Server akan berjalan pada alamat `http://localhost:8080` secara default.
Langkah 8: Menguji Project
Buka browser dan akses `http://localhost:8080`. Jika instalasi berhasil, kamu akan melihat halaman default CodeIgniter 4.
