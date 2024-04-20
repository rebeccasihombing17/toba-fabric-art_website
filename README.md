# Pengembangan Sistem Informasi Toba Fabric Art 

Daerah Toba di Indonesia dikenal dengan budaya dan kerajinan tekstilnya, khususnya kain ulos yang indah. Meskipun memiliki potensi besar, toko-toko yang menjual kerajian tekstil ini sering menghadapi kesulitan dalam memasarkan produk mereka. Pengembangan sistem informasi website ini bertujuan untuk membantu mereka mempromosikan produk ulos, meningkatkan profit, dan memperkenalkan budaya Batak. Sistem ini memiliki user yang terdiri atas pembeli dan admin yang merupakan pemilik toko. website ini memungkinkan pembeli melihat, dan membeli berbagai produk ulos yang tersedia sesuai keinginan mereka. Platform daring ini akan memasarkan berbagai produk ulos yang disediakan oleh pemilik toko.

Read the [detailed documentation](/docs/README.md) for futher information.

Find the [codebase here](/webapp).

## Contributors

+ 12S21027 [Rebecca Yulyartha Bulawan Sihombing](https://github.com/rebeccasihombing17)
+ 12S21037 [Immanuella Eklesia Lumbantobing](https://github.com/ImmanuellaEL793)
+ 12S21053 [Chesya Ivana J. M. Sitorus](https://github.com/chesyaivana)
+ 12S21058 [Grace Christina Yohanna Situmorang](https://github.com/gracesitumorang/gracesitumorang)


## Panduan Penggunaan 
Cara mengclone Website dari Repository : 
1. Buka link Repository project pada branch tempt --> "https://github.com/itdel-ppw/23-10-toba-fabric-art/tree/temp".
3. Click tombol hijau bertuliskan <>Code.
4. Pastikan anda telah memiliki Github Desktop.
5. Pada tab local yang mengarah ke Https, pilih tombol yang bertuliskan "Open with Github Desktop".
6. Anda akan diarahkan langsung ke Github Desktop.
7. Silahkan pilih lokasi penyimpanan dimana anda ingin menyimpan file code Toba Fabric Art.
8. Jika lokasi penyimpanan telah ditentukan, click tombol clone.
9. Sekarang anda dapat mengakses file code melalui visual studio code yang terintegrasi langsung ke Github
    
Cara migrate dan Seeder database : 
1. Sebelum melakukan migrasi, pastikan Anda telah mengatur koneksi database di file .env. Parameter seperti DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, dan DB_PASSWORD harus disetel dengan benar.
   Dengan ketentuan sebagai berikut :
   Host: localhost
   Driver: MySQL
   Credential: ppwuser/ppwuser
   Pastikan juga untuk membuat akun pada mysql -> phpmyadmin anda.
3. Untuk membuat file migrasi baru, Anda bisa menggunakan perintah:
   php artisan make:migration nama_tabel --create=nama_tabel
   Perintah di atas akan membuat file migrasi baru di direktori database/migrations
5. Buka file migrasi yang telah dibuat di database/migrations. Di dalamnya, Anda akan menemukan dua metode:
   up() untuk mendefinisikan struktur tabel saat migrasi
   down() untuk mendefinisikan pembatalan migrasi.
7. Setelah mendefinisikan struktur tabel, Anda dapat menjalankan migrasi dengan perintah:
8. php artisan migrate
9. Untuk membuat seeder baru, gunakan perintah:
   php artisan make:seeder NamaTabelSeeder
   Perintah di atas akan membuat file seeder baru di direktori database/seeds.
11. Buka file seeder yang telah dibuat di database/seeds. Di dalamnya, Anda akan mendefinisikan data yang akan diisi ke dalam tabel.
12. Untuk menjalankan seeder, Anda bisa menggunakan perintah:
    php artisan db:seed --class=NamaTabelSeeder
13. Jika Anda ingin menjalankan semua seeder, gunakan perintah:
    php artisan db:seed

Cara menampilkan gambar : 
1. Buka link Repository project pada branch tempt --> "https://github.com/itdel-ppw/23-10-toba-fabric-art/tree/temp"
2. click code ![Uploading image.png…]()
3. Pilih "Open With Github Desktop"
4. buka github desktop
5. pilih "show in folder" untuk mengakses file di repository
6. buka folder image
7. copy gambar yang ada pada folder image
8. buka folder webapp --> tobaFabricArt --> storage --> app --> public
9. paste gambar yang sudah di copy dari folder image
10. buka kembali github desktop
11. Pilih "Open in visual studio code" untuk mengakses file code toba fabric art
12. jalankan file dengan mengklik "new terminal"
13. ketik syntax create directory yang untuk merujuk ke halaman website yang ingin di jalankan "cd webapp" --> " cd tobaFabricArt"
14. ketik "php artisan serve" untuk mendapatkan link dalam menjalankan website ke server
15. Gambar yang dimasukkan akan tampil di website.
