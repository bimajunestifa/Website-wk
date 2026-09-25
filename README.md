# Website SMK Wikrama 1 Garut (Versi Laravel)

Landing page & Sistem Manajemen Konten (CMS) resmi **SMK Wikrama 1 Garut** yang dibangun ulang menggunakan **Laravel 11 & MySQL** dengan replikasi tampilan identik, responsif, dan panel admin terpadu.

---

## 👨‍💻 Developer & Kontak
* **Dibuat oleh:** Bima Junestifa
* **Email:** bimajunestifa85@gmail.com

---

## 🚀 Fitur Utama
* **Halaman Publik:** Beranda (Hero Slider, Jurusan/Kompetensi Keahlian, Karakter & Budaya, Pembelajar, Berita Terbaru, Rapor Mutu, Testimoni, Galeri, dan Banner PPDB).
* **Halaman SPMB / PPDB:** Formulir pendaftaran online & alur pendaftaran terintegrasi.
* **Panel Admin (Sneat CMS):**
  * Manajemen Slider Banner Hero & SPMB
  * Manajemen Jurusan (Aktif/Nonaktif & Detail Prospek Karir)
  * Manajemen 12 Kartu Karakter, Budaya, & Pembelajaran
  * Manajemen Berita, Dewan Guru, Data Alumni, & Mitra Kerja Sama
  * Manajemen Rapor Mutu Pendidikan & Profil Kontak Sekolah

---

## 📥 Panduan Clone & Instalasi

Ikuti langkah-langkah berikut agar seluruh kode, database, dan **seluruh aset foto/gambar ikut terbawa lengkap**:

### 1. Clone Repository
```bash
git clone <URL_YGK_KAMU_COPY_INI_YAAAAAAAAAAAA>
cd Website-wk
```

### 2. Install Dependensi PHP (Composer)
```bash
composer install
```

### 3. Konfigurasi Environment (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
*Di Windows PowerShell/CMD:*
```powershell
copy .env.example .env
```

Buka file `.env` lalu sesuaikan konfigurasi database MySQL Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_wikrama
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Hubungkan Storage Aset Foto
Agar semua gambar yang diupload dapat diakses publik:
```bash
php artisan storage:link
```

### 6. Migrasi Database & Seeder Data Lengkap
Jalankan perintah ini untuk membuat tabel sekaligus mengisi data awal (berita, guru, jurusan, kartu karakter, slider, dan akun admin):
```bash
php artisan migrate:fresh --seed
```

### 7. Jalankan Server Lokal
```bash
php artisan serve
```
Buka browser Anda di: `http://127.0.0.1:8000`

---

## 🔐 Akun Akses Admin Panel
* **URL Login:** `http://127.0.0.1:8000/admin/login`
* **Email:** `admin@wikrama.sch.id`
* **Password:** `anonymous`
