# 🏷️ Elapor DP3A Sulut

Website Gereja Masehi Advent Hari Ketujuh (GMAHK), Kamanga, Sulawesi Utara. Dirancang khusus untuk sistem informasi gereja.

## ✨ Fitur

-   🧑‍💼 Multi-role Login (Pendeta, Admin, Operator)
-   🧑🏻‍💼 Manajemen Jemaat (CRUD Congregation)
-   📰 Manajemen Berita (CRUD Post)
-   🛐 Manajemen Ibadah (CRUD Worship)
-   🙇🏻 Pengajuan Ibadah
-   📊 Dashboard Admin dan Statistik

## ⚙️ Teknologi

-   Laravel 12
-   PHP 8.3
-   Tailwind CSS
-   Alpine.js
-   MySQL
-   Bootstrap Icon
-   LangCommon
-   Sluggable
-   TomSelect

## 🛠️ Instalasi & Setup

1. Clone repository:

    ```bash
    git clone https://github.com/theowongkar/sig-gmahk-kamanga.git
    cd sig-gmahk-kamanga
    ```

2. Install dependency:

    ```bash
    composer install
    npm install && npm run build
    ```

3. Salin file `.env`:

    ```bash
    cp .env.example .env
    ```

4. Atur konfigurasi `.env` (database, mail, dsb)

5. Generate key dan migrasi database:

    ```bash
    php artisan key:generate
    php artisan storage:link
    php artisan migrate:fresh --seed
    ```

6. Jalankan server lokal:

    ```bash
    php artisan serve
    ```

7. Buka browser dan akses http://127.0.0.1:8000

## 👥 Role & Akses

| Role     | Akses                                 |
| -------- | ------------------------------------- |
| Pendeta  | CRUD data worship                     |
| Admin    | CRUD data congregation, post, worship |
| Operator | CRUD data post, worship                |

## 📎 Catatan Tambahan

-   Pastikan folder `storage` dan `bootstrap/cache` writable.
-   Dapat dikembangkan lebih lanjut untuk integrasi Manajemen Pernikahan, dan Baptis.
