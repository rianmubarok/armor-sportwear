# Armor Sportwear - E-Commerce Web Application

**Tugas Akhir Mata Kuliah Rekayasa Perangkat Lunak (RPL)**

Armor Sportwear adalah aplikasi E-Commerce berbasis web yang dirancang sebagai katalog digital untuk menampilkan dan mengelola produk pakaian serta perlengkapan olahraga. Sistem ini dibangun menggunakan _framework_ Laravel dengan fokus pada manajemen konten terpusat oleh administrator dan presentasi produk yang interaktif bagi publik.

## Anggota Kelompok

-   Muhammad Fitrian Mubarok - 231240001402
-   Genard Arya Djaya - 231240001394
-   Muhammad Yunus - 231240001410

---

## Fitur dan Fungsionalitas

Berikut adalah fungsionalitas utama yang telah diimplementasikan pada sistem saat ini:

### 1. Antarmuka Publik (Pengunjung)

-   **Halaman Beranda (Home)**: Menampilkan _Hero Image_, galeri portofolio, dan deskripsi utama bisnis.
-   **Katalog Produk**: Menyajikan daftar keseluruhan produk yang tersedia beserta ringkasan informasi.
-   **Detail Produk**: Menampilkan spesifikasi dan deskripsi terperinci dari suatu produk yang dipilih.
-   **Preview Jersey**: Menyediakan fitur visualisasi khusus untuk melihat draf desain atau maket _jersey_.

### 2. Antarmuka Administrator (Dashboard)

Akses ke _dashboard_ diamankan melalui sistem autentikasi. Administrator memiliki hak akses untuk fungsi berikut:

-   **Manajemen Produk**: Mengelola data produk melalui fungsi _Create, Read, Update, Delete_ (CRUD) serta pengelolaan aset gambar produk terkait.
-   **Manajemen Portofolio**: Mengelola galeri portofolio karya dan pencapaian bisnis.
-   **Manajemen Hero Image**: Mengontrol konten dan aset gambar pada _banner_ halaman utama.
-   **Manajemen Pesanan (Order)**: Melakukan pencatatan dan pengelolaan transaksi secara manual, mencakup input rincian pelanggan, item pesanan, total harga, dan pembaruan status pesanan.

---

## Rencana Implementasi Algoritma

Sebagai bagian dari pemenuhan spesifikasi sistem yang membutuhkan algoritma khusus, aplikasi ini direncanakan untuk mengimplementasikan algoritma **Sequential Search** pada fitur penelusuran katalog.

**Skenario Penerapan:**
Sebuah kolom pencarian (_search bar_) akan ditambahkan pada antarmuka publik. Saat pengunjung memasukkan kata kunci berupa nama produk, sistem akan menjalankan algoritma _Sequential Search_ untuk melakukan iterasi pencarian secara sekuensial pada basis data produk. Algoritma akan mengevaluasi kecocokan setiap data dengan kata kunci yang diberikan sebelum menyajikannya sebagai hasil pencarian.

---

## Dokumentasi dan Artefak Perancangan

Berikut adalah dokumen dan artefak pemodelan sistem (UML) sebagai kelengkapan tugas Rekayasa Perangkat Lunak:

1. **Dokumen Analisis Kebutuhan**
   Dokumen ini memuat deskripsi sistem, identifikasi aktor, serta spesifikasi kebutuhan fungsional dan non-fungsional.

    - [Dokumen Analisis Kebutuhan (PDF)](docs/analisis_kebutuhan.pdf)

2. **Unified Modeling Language (UML)**
    - Use Case Diagram:
      ![Use Case](docs/uml/use_case.png)
    - Activity Diagram:
      ![Activity](docs/uml/activity.png)
    - Sequence Diagram:
      ![Sequence](docs/uml/sequence.png)
    - Class Diagram:
      ![Class](docs/uml/class.png)

---

## Tangkapan Layar Aplikasi (Screenshots)

-   **Halaman Beranda & Katalog Publik:**
    ![Beranda](docs/screenshots/beranda.png)
-   **Halaman Preview Jersey:**
    ![Preview](docs/screenshots/preview.png)
-   **Dashboard Admin (Kelola Produk & Pesanan):**
    ![Dashboard](docs/screenshots/dashboard.png)

---

## Panduan Instalasi Sistem

Ikuti instruksi berikut untuk menjalankan aplikasi pada lingkungan _development_ lokal.

> **Catatan:** Aplikasi ini menggunakan **SQLite** sebagai basis data secara _default_, sehingga tidak memerlukan instalasi MySQL atau konfigurasi server basis data eksternal.

### Prasyarat

Pastikan perangkat lunak berikut sudah terinstal sebelum memulai:

-   PHP **>= 8.2**
-   Composer
-   Node.js & NPM

---

### Langkah Instalasi

1. **Kloning Repositori**

    ```bash
    git clone https://github.com/rianmubarok/armor-sportwear.git
    cd armor-sportwear
    ```

2. **Instalasi Dependensi PHP**

    ```bash
    composer install
    ```

3. **Instalasi Dependensi Node.js**

    ```bash
    npm install
    ```

4. **Konfigurasi Lingkungan (Environment)**

    Salin berkas konfigurasi _environment_:

    ```bash
    # Linux / macOS / Git Bash
    cp .env.example .env

    # Windows (Command Prompt)
    copy .env.example .env
    ```

5. **Pembuatan Kunci Aplikasi (Application Key)**

    ```bash
    php artisan key:generate
    ```

6. **Buat Berkas Basis Data SQLite**

    Karena aplikasi menggunakan SQLite, buat berkas basis datanya secara manual:

    ```bash
    # Linux / macOS / Git Bash
    touch database/database.sqlite

    # Windows (PowerShell)
    New-Item -ItemType File database/database.sqlite
    ```

7. **Migrasi Basis Data dan Seeding**

    ```bash
    php artisan migrate --seed
    ```

    Perintah ini akan membuat seluruh tabel dan mengisi data awal, termasuk akun administrator _default_.

8. **Tautkan Direktori Penyimpanan (Storage Link)**

    ```bash
    php artisan storage:link
    ```

9. **Menjalankan Server Development**

    Gunakan perintah berikut untuk menjalankan _backend_ Laravel dan _frontend_ Vite secara bersamaan dalam **satu terminal**:

    ```bash
    composer run dev
    ```

    Atau jalankan secara terpisah di dua terminal berbeda:

    **Terminal 1 (Backend):**
    ```bash
    php artisan serve
    ```

    **Terminal 2 (Frontend Assets / Vite):**
    ```bash
    npm run dev
    ```

    Setelah server berjalan, akses aplikasi melalui:
    -   **Halaman Publik:** `http://localhost:8000`
    -   **Halaman Login Admin:** `http://localhost:8000/login`
    -   **Dashboard Admin:** `http://localhost:8000/admin/dashboard`

---

### Kredensial Default Administrator

Setelah menjalankan `migrate --seed`, gunakan kredensial berikut untuk _login_:

| Field    | Value             |
|----------|-------------------|
| Email    | `admin@armor.com` |
| Password | `admin123`        |
