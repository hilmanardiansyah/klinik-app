# KlinikApp – Sistem Informasi Klinik

Sistem informasi berbasis web untuk pengelolaan data pasien, tindakan medis, obat, pembayaran, dan laporan kunjungan di klinik.

---

## 🚀 Fitur Utama

- Login multi-role (Admin, Petugas Pendaftaran, Dokter, Kasir)
- CRUD Master: Wilayah, Pegawai, Tindakan, Obat, User
- Pendaftaran Pasien dan Kunjungan
- Pemeriksaan oleh Dokter (Tindakan & Obat)
- Pembayaran oleh Kasir
- Laporan grafik (kunjungan, tindakan, obat)
- Export PDF laporan

---

## 📦 Instalasi

```bash
git clone https://github.com/hilmanardiansyah/klinik-app.git
cd klinik-app

composer install
cp .env.example .env
php artisan key:generate

# Sesuaikan koneksi database di file .env

php artisan migrate --seed
php artisan serve
