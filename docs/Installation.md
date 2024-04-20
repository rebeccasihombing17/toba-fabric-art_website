# Installation

On this page we describe the detail steps to install the system for both in the production and development environments. Before intalling the system, make sure to comply with the required software mentioned in the [Software Requirements](Software-Requirements.md).

## Production Environment
1. PHP Runtime (^8.0.8):
    -Unduh installer PHP versi 8.0.8 atau yang lebih tinggi dari situs web resmi PHP (https://www.php.net/).
    -Ikuti instruksi pada installer untuk menginstal PHP di sistem.
    -Pastikan untuk menambahkan direktori instalasi PHP ke PATH sistem untuk mengakses PHP dari Command Prompt atau Terminal.

2. Composer PHP Package Manager (^2.6.4):
    -Unduh installer Composer versi 2.6.4 atau yang lebih tinggi dari situs web resmi Composer (https://getcomposer.org/download/).
    -Ikuti instruksi pada installer untuk menginstal Composer.
    -Setelah instalasi, pastikan untuk mengkonfigurasi PATH sehingga dapat menjalankan Composer dari Command Prompt atau Terminal.

3. MariaDB (^11.3.0):
    -Unduh installer MariaDB versi 11.3.0 atau yang lebih tinggi dari situs web resmi MariaDB (https://mariadb.org/download/).
    -Ikuti instruksi pada installer untuk menginstal MariaDB.
    -Selama instalasi, user akan diminta untuk mengatur kata sandi root untuk server MariaDB.

4. SQL Server (^15.0.2101.7) (untuk pembentukan PDM):
    -Unduh installer SQL Server versi 15.0.2101.7 atau yang lebih tinggi dari situs web resmi SQL Server (https://www.microsoft.com/en-us/sql-server/sql-server-downloads).
    -Ikuti instruksi pada installer untuk menginstal SQL Server.
    -Selama instalasi, user akan diminta untuk mengatur kata sandi untuk administrator SQL Server (sa).

## Development Environment
1. NodeJS (^20.7.0) dengan npm (^10.1.0) Package Manager:
    -Unduh installer Node.js versi 20.7.0 atau yang lebih tinggi dari situs web resmi Node.js (https://nodejs.org/).
    -Ikuti instruksi pada installer untuk menginstal Node.js. Ini akan secara otomatis menyertakan npm (Node Package Manager).

2. Laravel (4.5.1)
    -Install Laravel menggunakan Composer dengan menjalankan perintah composer global require laravel/installer.
    -Setelah instalasi selesai, User dapat membuat proyek Laravel baru dengan perintah laravel new nama_proyek.

3. XAMPP (3.3.0)
    -Unduh installer XAMPP versi 3.3.0 atau yang lebih tinggi dari situs web resmi XAMPP (https://www.apachefriends.org/index.html).
    -Ikuti instruksi pada installer untuk menginstal XAMPP.
    -Setelah instalasi selesai, user akan dapat mengaktifkan layanan Apache dan MySQL dari panel kontrol XAMPP.

4. GitHub:
    -Buat akun GitHub jika belum memiliki satu.
    -User dapat mengakses GitHub melalui web browser (https://github.com/) atau dengan menggunakan perangkat lunak desktop GitHub (https://desktop.github.com/).

## Related

+ [Table of Content](README.md).
+ [Software Requirements](Software-Requirements.md).
+ [Installation](Installation.md).