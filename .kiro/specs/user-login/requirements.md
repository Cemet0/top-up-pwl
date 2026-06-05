# Requirements Document

## Introduction

Fitur ini menambahkan sistem autentikasi berbasis session untuk Dante Store, sebuah aplikasi top up game yang dibangun dengan CodeIgniter 4. Tujuannya adalah memproteksi area dashboard (admin/operator) agar hanya dapat diakses oleh pengguna yang sudah login. Fitur mencakup halaman login dengan desain glassmorphism sesuai identitas visual Dante Store, proses autentikasi menggunakan tabel `users` di MySQL, manajemen session CI4, dan fungsi logout.

## Glossary

- **Auth_Controller**: Controller CodeIgniter 4 yang menangani proses login, logout, dan validasi session.
- **Auth_Filter**: Filter CodeIgniter 4 yang memproteksi route dashboard dari akses tanpa autentikasi.
- **Session**: Mekanisme session bawaan CodeIgniter 4 berbasis file yang menyimpan status login pengguna.
- **User**: Entitas admin atau operator yang memiliki akun di tabel `users` untuk mengakses dashboard.
- **Dashboard**: Area halaman `/dashboard` dan seluruh sub-route di bawahnya yang hanya boleh diakses oleh User yang sudah login.
- **Login_Page**: Halaman publik di route `/login` tempat User memasukkan kredensial.
- **Password_Hash**: Representasi password yang dienkripsi menggunakan algoritma bcrypt via fungsi `password_hash()` PHP.
- **CSRF_Token**: Token keamanan yang disertakan pada form untuk mencegah serangan Cross-Site Request Forgery.

---

## Requirements

### Requirement 1: Halaman Login

**User Story:** Sebagai admin/operator, saya ingin memiliki halaman login yang sesuai dengan desain Dante Store, sehingga saya dapat masuk ke dashboard dengan tampilan yang konsisten.

#### Acceptance Criteria

1. THE Auth_Controller SHALL menyediakan route `GET /login` yang menampilkan halaman login.
2. WHEN User mengakses `/login` dalam kondisi sudah login, THE Auth_Controller SHALL melakukan redirect ke `/dashboard`.
3. THE Login_Page SHALL menampilkan form dengan field `username` dan `password` beserta tombol submit.
4. THE Login_Page SHALL menggunakan desain Bootstrap 5.3 dengan gaya glassmorphism yang konsisten dengan layout Dante Store (variabel CSS `--brand`, `--surface`, `--shadow`, font Manrope dan Space Grotesk).
5. THE Login_Page SHALL menyertakan CSRF_Token tersembunyi di dalam form untuk keamanan.
6. THE Login_Page SHALL menampilkan pesan error dari session flashdata apabila login gagal.

---

### Requirement 2: Proses Autentikasi Login

**User Story:** Sebagai admin/operator, saya ingin dapat login menggunakan username dan password, sehingga saya dapat mengakses dashboard secara aman.

#### Acceptance Criteria

1. THE Auth_Controller SHALL menyediakan route `POST /login` untuk memproses data form login.
2. WHEN form login dikirim, THE Auth_Controller SHALL memvalidasi bahwa field `username` dan `password` tidak kosong.
3. IF field `username` atau `password` kosong, THEN THE Auth_Controller SHALL mengembalikan User ke halaman login dengan pesan error "Username dan password wajib diisi."
4. WHEN validasi form berhasil, THE Auth_Controller SHALL mencari User di tabel `users` berdasarkan kolom `username`.
5. IF `username` tidak ditemukan di tabel `users`, THEN THE Auth_Controller SHALL mengembalikan User ke halaman login dengan pesan error "Username atau password salah."
6. WHEN `username` ditemukan, THE Auth_Controller SHALL memverifikasi `password` yang diinput menggunakan fungsi `password_verify()` terhadap Password_Hash yang tersimpan.
7. IF verifikasi password gagal, THEN THE Auth_Controller SHALL mengembalikan User ke halaman login dengan pesan error "Username atau password salah."
8. WHEN autentikasi berhasil, THE Auth_Controller SHALL menyimpan data `user_id`, `username`, dan `role` ke dalam Session.
9. WHEN autentikasi berhasil, THE Auth_Controller SHALL melakukan redirect ke `/dashboard`.

---

### Requirement 3: Proteksi Halaman Dashboard

**User Story:** Sebagai pemilik sistem, saya ingin halaman dashboard tidak dapat diakses tanpa login, sehingga data operasional terlindungi dari akses tidak sah.

#### Acceptance Criteria

1. THE Auth_Filter SHALL memeriksa keberadaan data `user_id` di dalam Session pada setiap request ke route `/dashboard` dan seluruh sub-route-nya.
2. IF Session tidak mengandung `user_id` yang valid, THEN THE Auth_Filter SHALL menghentikan request dan melakukan redirect ke `/login`.
3. WHILE User sudah login, THE Auth_Filter SHALL mengizinkan request ke `/dashboard` untuk dilanjutkan ke controller.
4. THE Auth_Filter SHALL terdaftar di `app/Config/Filters.php` dengan alias `auth` dan diterapkan pada route `dashboard*`.

---

### Requirement 4: Fungsi Logout

**User Story:** Sebagai admin/operator, saya ingin dapat logout dari dashboard, sehingga sesi saya berakhir dengan aman dan akun tidak dapat diakses oleh orang lain.

#### Acceptance Criteria

1. THE Auth_Controller SHALL menyediakan route `GET /logout` untuk memproses permintaan logout.
2. WHEN User mengakses `/logout`, THE Auth_Controller SHALL menghapus seluruh data Session yang aktif.
3. WHEN proses logout selesai, THE Auth_Controller SHALL melakukan redirect ke `/login` dengan pesan flashdata "Anda telah berhasil logout."
4. WHEN User yang sudah logout mencoba mengakses `/dashboard`, THE Auth_Filter SHALL melakukan redirect ke `/login`.

---

### Requirement 5: Migrasi Database Tabel Users

**User Story:** Sebagai developer, saya ingin ada migrasi database untuk tabel `users`, sehingga struktur tabel dapat dibuat secara konsisten di semua environment.

#### Acceptance Criteria

1. THE System SHALL menyediakan file migrasi CodeIgniter 4 yang membuat tabel `users` dengan kolom: `id` (INT, primary key, auto increment), `username` (VARCHAR 100, unique, not null), `password` (VARCHAR 255, not null), `role` (ENUM `admin`, `operator`, default `operator`), `created_at` (DATETIME), `updated_at` (DATETIME).
2. THE System SHALL menyediakan file seeder yang membuat satu akun default dengan `username` = `admin`, `role` = `admin`, dan password yang di-hash menggunakan `password_hash()` dengan algoritma `PASSWORD_BCRYPT`.
3. WHEN migrasi dijalankan, THE System SHALL membuat tabel `users` tanpa error di database MySQL.

---

### Requirement 6: Keamanan Autentikasi

**User Story:** Sebagai pemilik sistem, saya ingin proses autentikasi mengikuti praktik keamanan yang baik, sehingga akun admin terlindungi dari serangan umum.

#### Acceptance Criteria

1. THE System SHALL menyimpan password User dalam bentuk Password_Hash menggunakan `password_hash()` dengan algoritma `PASSWORD_BCRYPT`, bukan plaintext.
2. THE Auth_Controller SHALL menggunakan `password_verify()` untuk membandingkan password input dengan Password_Hash, bukan perbandingan string langsung.
3. THE Login_Page SHALL menyertakan CSRF_Token pada form POST untuk mencegah serangan CSRF.
4. IF terjadi kegagalan login, THEN THE Auth_Controller SHALL menampilkan pesan error yang generik ("Username atau password salah") tanpa mengungkapkan apakah username atau password yang salah.
5. WHEN autentikasi berhasil, THE Auth_Controller SHALL meregenerasi Session ID untuk mencegah session fixation attack.
