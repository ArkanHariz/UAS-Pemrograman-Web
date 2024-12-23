# UAS-Pemrograman-Web

<ul>
  <li>Nama  : Arkan Hariz Chandrawinata Liem</li>
  <li>NIM   : 122140038</li>
  <li>Kelas : Pemrograman Web RA</li>
</ul>
<hr>
<h2>Bagian 1: Client-side Programming</h2>
<h3>1.1 Manipulasi DOM dengan JavaScript</h3>
<ul><li>Membuat form input dengan minimal 4 elemen input (teks, checkbox, radio, dll.)</li></ul>
<img src="Read.me assets/1.jpg" width="600" height="auto" />
<ul><li>Menampilkan data dari server ke dalam sebuah tabel HTML.</li></ul>
<img src="Read.me assets/2.jpg" width="600" height="auto" />
<img src="Read.me assets/3.jpg" width="600" height="auto" />
<h3>1.2 Event Handling</h3>
<ul><li>Menambahkan minimal 3 event yang berbeda untuk meng-handle form pada 1.1.</li></ul>
<ul><li>Memvalidasi setiap input dengan JavaScript sebelum diproses oleh PHP.</li></ul>
<img src="Read.me assets/4.gif" width="600" height="auto" />
<img src="Read.me assets/6.jpg" width="600" height="auto" />
<hr>

<h2>Bagian 2: Server-side Programming</h2>
<h3>2.1 Pengelolaan Data dengan PHP</h3>
<ul><li>Menggunakan metode POST atau GET pada formulir.</li></ul>
<ul><li>Menggunakan method POST.</li></ul>
<img src="Read.me assets/5.jpg" width="600" height="auto" />
<ul><li>Parsing data dari variabel global dan lakukan validasi di sisi server.</li></ul>
<ul><li>Menyimpan ke basis data termasuk jenis browser dan alamat IP pengguna.</li></ul>
<img src="Read.me assets/7.1.gif" width="600" height="auto" />
<img src="Read.me assets/7.2.gif" width="600" height="auto" />
<p>Bagian ini terdapat form dan tabel yang memperlihatkan stok barang dari database. Disini menerapkan CRUD, yaitu membuat data baru kemudian disimpan ke database, menampilkan database ke tabel,
mengedit/update data yang ada pada database, dan menghapus data. Ketika menginput barang jenis browser dan IP Address akan tersimpan ke database tetapi tidak ditampilkan di tabel nya.</p>
<ul><li>Query Database stok</li></ul>
<img src="Read.me assets/8-new.jpg" width="600" height="auto" />
<img src="Read.me assets/9.jpg" width="600" height="auto" />
<h3>2.2 Objek PHP Berbasis OOP</h3>
<ul><li>Membuat sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu.</li></ul>
<img src="Read.me assets/10.1.jpg" width="600" height="auto" />
<img src="Read.me assets/10.2.jpg" width="600" height="auto" />
<ul><li>Inisialisasi Objek</li></ul>
<img src="Read.me assets/10.3.jpg" width="600" height="auto" />
<hr>

<h2>Bagian 3: Database Management</h2>
<h3>3.1 Membuat Tabel Database</h3>
<img src="Read.me assets/8-new.jpg" width="600" height="auto" />
<h3>3.2 Konfigurasi Koneksi Database</h3>
<img src="Read.me assets/11.jpg" width="600" height="auto" />
<h3>3.3 Memanipulasi Data pada Database</h3>
<img src="Read.me assets/12.jpg" width="600" height="auto" />
<hr>

<h2>Bagian 4: State Management</h2>
<h3>4.1 State Management dengan Session</h3>
<ul><li>Menggunakan session_start() untuk memulai session.</li></ul>
<ul><li>Menyimpan informasi pengguna ke dalam session.</li></ul>
<img src="Read.me assets/13.gif" width="600" height="auto" />
<h3>4.2 Pengelolaan State dengan Cookie dan Browser Storage</h3>
<ul><li>Membuat fungsi untuk menetapkan, mendapatkan, dan menghapus cookie.</li></ul>
<img src="Read.me assets/14.gif" width="600" height="auto" />
<ul><li>Menggunakan browser storage untuk menyimpan informasi secara lokal.</li></ul>
<img src="Read.me assets/15.gif" width="600" height="auto" />
<hr>

<h1>Bagian Bonus</h1>
<h2>1. Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?</h2>
<ul><li>Persiapan Aplikasi: Pastikan aplikasi telah selesai dikembangkan dan diuji. Aplikasi juga harus dioptimalkan untuk performa.</li></ul>
<ul><li>Pemilihan Platform Hosting: Pilih layanan hosting seperti VPS (DigitalOcean, AWS, GCP), shared hosting, atau platform khusus seperti Heroku.</li></ul>
<ul><li>Menyiapkan Server: Konfigurasikan server dengan sistem operasi yang sesuai, seperti Linux (Ubuntu atau CentOS). Instal software server seperti Apache, Nginx, atau Node.js, sesuai kebutuhan aplikasi.</li></ul>
<ul><li>Deployment Aplikasi: Upload aplikasi ke server menggunakan alat seperti FTP, SCP, atau Git. Konfigurasi domain melalui DNS untuk mengarahkan ke server hosting.</li></ul>
<ul><li>Tes dan Validasi: Tes aplikasi setelah di-deploy untuk memastikan tidak ada masalah dengan konfigurasi.</li></ul>
<h2>2. Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda.</h2>
<p>Hosting web menurut saya yang cocok untuk web saya menggunakan Heroku, karena:</p>
<ul><li>Kemudahan Penggunaan: Heroku menawarkan proses deployment yang sangat sederhana, biasanya hanya memerlukan perintah seperti git push heroku main, sehingga sangat cocok untuk pengembang yang ingin fokus pada pengembangan aplikasi daripada konfigurasi server.</li></ul>
<ul><li>Dukungan untuk Banyak Bahasa Pemrograman: Heroku mendukung berbagai bahasa pemrograman populer seperti Ruby, Python, Node.js, Java, PHP, dan Go, sehingga fleksibel untuk berbagai jenis proyek.</li></ul>
<ul><li>Model Pembayaran yang Fleksibel: Heroku menawarkan model bayar sesuai penggunaan, termasuk opsi gratis untuk aplikasi kecil atau proyek pengujian, sehingga sangat cocok untuk pengembang individu, startup, atau proyek sampingan.</li></ul>
<h2>3. Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?</h2>
<ul><li>Keamanan Server: Gunakan SSH dengan autentikasi kunci untuk akses server. Pastikan firewall diaktifkan dan hanya port yang diperlukan yang dibuka. Rutin update sistem operasi dan perangkat lunak untuk menambal kerentanan.</li></ul>
<ul><li>Keamanan Aplikasi: Terapkan enkripsi HTTPS dengan sertifikat SSL. Validasi input untuk mencegah serangan seperti SQL Injection dan Cross-Site Scripting (XSS). Gunakan alat seperti OWASP ZAP untuk mengidentifikasi potensi kerentanan.</li></ul>
<ul><li>Keamanan Data: Enkripsi data sensitif saat disimpan (data at rest) dan saat ditransmisikan (data in transit). Implementasikan mekanisme autentikasi dan otorisasi yang kuat, seperti OAuth atau JWT.</li></ul>
<ul><li>Pemantauan: Gunakan layanan monitoring (seperti Cloudflare atau Datadog) untuk mendeteksi aktivitas mencurigakan.</li></ul>
<h2>4. Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.</h2>
<p align="justify">Untuk mendukung aplikasi web, server harus dikonfigurasi dengan cermat. Pertama, instal dan konfigurasikan web server seperti Apache atau Nginx untuk mengelola permintaan pengguna. Konfigurasikan virtual host jika diperlukan untuk menangani beberapa domain pada server yang sama. Selanjutnya, instal dan atur database server seperti MySQL, PostgreSQL, atau MongoDB, dengan memastikan pengaturan izin akses database yang ketat untuk keamanan. Untuk meningkatkan performa, terapkan caching menggunakan Redis atau Memcached agar waktu respon aplikasi lebih cepat. Jika aplikasi diharapkan memiliki trafik tinggi, tambahkan load balancer seperti HAProxy atau Nginx untuk mendistribusikan beban secara merata. Selain itu, keamanan harus menjadi prioritas utama dengan menginstal alat seperti fail2ban untuk mencegah serangan brute force dan menggunakan firewall seperti ufw (Uncomplicated Firewall) untuk membatasi akses ke server. Terakhir, pastikan sistem backup otomatis diatur untuk melindungi data dan konfigurasi server dari kehilangan atau kerusakan. Semua langkah ini akan memastikan server dapat menjalankan aplikasi web dengan efisien dan aman.</p>
