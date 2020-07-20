<?php require 'inc/header.php' ?>
<?php require 'inc/msg.php' ?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> About Perpus WB</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-bars"></i>Pengguna</li>
          <li><i class="fa fa-square-o"></i>About</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Tambah Admin
          </header>
          <div class="panel-body">
            <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-secondary mb-0"><b>Tentang Perpustakaan</b></h2>
      <hr style="border: 0; height: 5px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

<center>
    <div class="divider-custom-line " style="text-align: justify; text-justify: inter-word; width: 85%">
    <h3 style="font-size: 22px; color:#090b24; margin-bottom: 10px;">SMK Wira Buana 1 & SMK Wira Buana 2 adalah sekolah yang menjadikan kedisiplinan dan pengembangan karakter yang bernuansa agamis untuk menyiapkan para generasi muda indonesia yang mandiri, kreatif, santun dan agamis. Didukung sarana dan prasarana yang lengkap dan mumpuni serta tenaga pendidik yang profesional. Salah satu sarana yang diberikan adalah perpustakaan. Perpustakaan SMK Wira Buana 1 & SMK Wira Buana 2 beralamat di Jl. Camat Kanang No.13, RT.05/RW.07, Pabuaran, Kec. Bojong Gede, Bogor, Jawa Barat.</h3>
    <h3 style="font-size: 22px; color:#090b24;">Pembangunan perpustakaan ini dilakukan sekolah SMK Wira Buana 1 & SMK Wira Buana 2 untuk meningkatkan minat belajar para siswanya dengan menyediakan fasilitas perpustakaan yang memiliki koleksi buku yang cukup lengkap. Fasilitas pepustakaan ini memberikan pelayanan peminjaman, perpanjangan dan pengembalian buku untuk siswa. Kemudian pada tahun 2020 Website Perpustakaan Online SMK Wira Buana ini dikembangkan dengan maksud untuk mempermudah akses peminjaman dan perpanjangan buku siswa secara online, dengan harapan minat baca para siswa meningkat dan membuat pencarian informasi untuk pembelajaran lebih mudah. </h3>
    <h3></h3>
  </div>
 </center>
 <!-- Portfolio Section Heading --><br>
      <h2 class="page-section-heading text-center text-secondary mb-0"><b>Tutorial</b></h2>
      <hr style="border: 0; height: 5px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

<center>
    <div class="divider-custom-line " style="text-align: center;" >
    <button type="submit" class="tombolbirufooterrwb btn btn-primary btn-lg" style="margin-bottom: 2px;" onclick = "smooth1()">Mengelola Pengguna <i class="fa fa-arrow-circle-right"></i></button>
    <button type="submit" class="tombolbirufooterrwb btn btn-primary btn-lg" style="margin-bottom: 2px;" onclick = "smooth2()">Mengelola Buku <i class="fa fa-arrow-circle-right"></i></button>
    <button type="submit" class="tombolbirufooterrwb btn btn-primary btn-lg" style="margin-bottom: 2px;" onclick = "smooth3()">Mengelola Transaksi <i class="fa fa-arrow-circle-right"></i></button>
  </div>
 </center>
 <center>
    <div class="divider-custom-line " id="show1" style="display: none; text-align: justify; text-justify: inter-word; width: 85%">
      <h3 style="font-size: 22px; color:#090b24;">
        Fungsi-fungsi pada Menu Pengguna, pada menu Pengguna terdapat 2 submenu yaitu <b>Anggota dan Kunjungan</b> Berikut ini fungsi-fungsi yang ada untuk <b>Mengelola Anggota</b>: 
        <br>
        <ul style="list-style-type: circle; list-style-position: outside;">
          <li><br>1. Tombol <b>"Upload Data Siswa"</b> di halaman Anggota berfungsi untuk memudahkan admin mengimpor data siswa yang berasal dari fokumen "EXCEL" kedalam database.<img style="border-width: 20px solid black;" src="<?=ROOT_URL?>static/img/k.png"><br> Admin dapat mengupload file dengan mengklik "Tambah Data".</li><br>
          <li>2.  Tombol <b>"Tambah Anggota Baru"</b> di halaman Anggota berfungsi bagi penjaga perpustakaan yang merupakan admin saat ada siswa yang datang langsung ke perpustakaan <b>untuk meregistrasi</b> data dirinya yang sudah diupload oleh admin sebelumnya untuk membuat akun anggota agar bisa menggunakan web perpustakaan online.<br><img style="width: 60%; height: 50%;" src="<?=ROOT_URL?>static/img/l.png"><br>Admin bisa mencari nomor Normor Induk Siswa dibagian kolom input, setelah itu sistem akan langsung menampilkan nama dan kelas siswa tersebut dan admin bisa melengkapi data nya ada lalu menekan tombol "submit". Dengan begitu pendaftaran anggota baru sudah selesai. </li><br>
          <li>3. <b>Fitur search</b> yang ada dibagian atas table bisa digunakan untuk mencari data siswa berdasarkan nomor anggota/ nama/ kelas.<br><img style="width: 60%; height: 50%;" src="<?=ROOT_URL?>static/img/w.png"></li><br>
        </ul>
        <b>Manajemen Kunjungan</b> menu ini digunakan ketika ada siswa yang datang ke perpus, sebagai absensi kunjungan yang digunakan admin dengan menginputkan nama atau nomor anggota perpustakaan serta nomor loker temppat siswa yang datang berkunjung menyimpan barang.<br><img style="width: 60%; height: 50%;" src="<?=ROOT_URL?>static/img/d.png">
      </h3>
    </div>
    <div class="divider-custom-line " id="show2" style="display: none; text-align: justify; text-justify: inter-word; width: 85%">
      <h3 style="font-size: 22px; color:#090b24;">Didalam Menu Buku terdapat tiga jenis submenu, yaitu, <b>Koleksi, Klasifikasi, dan Katalog.</b> Berikut ini adalah deskripsi dan cara mengelola 3 submenu tersebut:
          <ul style="list-style-type: circle; list-style-position: outside;">
              <br><li><b>1. Koleksi</b> adalah nama dari bentuk dokumen yang ada didalam perpustakaan (Contoh: Buku Pelajaran, Jurnal, Novel, dll). Submenu "KOLEKSI" ini digunakan untuk mengelola jenis koleksi apa saja yang ada di perpustakaan.<b> Untuk bisa menghapus koleksi</b>, katalog yang berkaitan dengan koleksi tersebut harus dihapus terlebih dahulu.</li><br>
              <li><b>2. Klasifikasi</b> adalah nama dari jenis buku/ dokumen yang berupa genre (Contoh: Buku Agama, Ilmu Alam, Bahasa, dll). Submenu "KLASIFIKASI" ini digunakan untuk mengelola jenis klasifikasi apa saja yang ada di perpustakaan.<b> Untuk bisa menghapus klasifikasi</b>, katalog yang berkaitan dengan klasifikasi tersebut harus dihapus terlebih dahulu.</li><br>
              <li><b>3. Katalog</b> adalah detail sebuah buku/ dokumen yang berisi judul, nama pengarang, tahun terbit, dll. <b>Mengelola katalog</b> Untuk menambahkan katalog baru admin bisa mengklik tombol:<img src="<?=ROOT_URL?>static/img/q.png"> pada bagian atas halaman katalog. Setelah itu admin bisa memasukan informasi lengkap buku seperti biasa.<br><br>Yang membedakan hanya pada <b>kolom input "JENIS BUKU"</b> berikut ini: <br><img style="width: 60%; height: 50%;" src="<?=ROOT_URL?>static/img/z.png">
                <li><br>a. Jika <b>memilih Buku Fisik</b> maka akan ada tempat untuk mengisi posisi buku dan tidak akan ada tempat input untuk e-book,</li>
                <li><br>b. Sedangkan Jika <b>memilih E-book</b> maka tidak ada tempat untuk mengisi posisi buku tapi ada tempat upload e-book.</li>
                <li><br>c. Dan jika <b>memilih Buku Fisik dan E-book</b> maka keduanya (posisi buku dan tempat upload e-book) akan tertampil dan harap diisi.</li><br></li>
          </ul>
      </h3>
    </div>
    <div class="divider-custom-line " id="show3" style="display: none; text-align: justify; text-justify: inter-word; width: 85%">
       <h3 style="font-size: 22px; color:#090b24;">Didalam Menu Transaksi terdapat lima jenis submenu, yaitu, <b>Pemesanan, Peminjaman,Pengembalian, Info Perpanjangan, dan Info Denda.</b> Berikut ini adalah deskripsi dan cara mengelola 5 submenu tersebut:
          <ul style="list-style-type: circle; list-style-position: outside;">
              <br><li><b>1. Pemesanan</b> adalah submenu yang mengurus pemesanan/order buku siswa secara online, admin dapat melihat list siswa yang ingin <b>meminjam buku secara online</b> dan bisa langsung mencari buku tersebut agar dapat diberikan ketika siswa yang memesan datang ke perpustakaan untuk mengambil pesanan bukunya.
              <br><img style="width: 98%;" src="<?=ROOT_URL?>static/img/x.png">
               Admin bisa mencari nama peminjam dihalaman Peminjaman dan bisa mengklik tombol <b>Pinjam</b> dan mensubmit pemesanan tersebut ketika siswa sudah mengambil buku pesanannya.</li><br>
              <li><b>2. Peminjaman</b> adalah submenu untuk mengelola peminjaman buku siswa, admin dapat melihat list siswa yang sedang meminjam buku. Dan didalam submenu Peminjaman ini terdapat 4 fitur yang dapat digunakan yaitu:
              <ul>
                <li><br><b>a. Peminjaman Buku</b> fitur ini digunakan untuk merekam peminjaman buku ketika siswa langsung datang ke perpustakaan. Didalam form peminjaman admin bisa mencari nama/NIS siswa yang meminjam dan Judul/Nomer Buku yang ingin dipinjam dan kemudian mensubmitnya.</li>
                <li><br><b>b. Cetak Laporan</b> fitur ini membuat admin bisa mencetak laporan peminjaman buku per bulan/ pertanggal yang telah ditentukan.</li>
                <li><br><b>c. Perpanjangan</b>fitur ini digunakan admin untuk membuat perpanjangan waktu pinjam buku, dengan mengklik tombol "Perpanjangan" dan mensubmit nya maka secara otomatis batas peminjamnan akan diperbaharui.</li><br></li>
                <li><b>d. Pengembalian</b>fitur ini  admin untuk mengubah status buku yang "dipinjam" menjadi "dikembalikan" dan menghapus list transaksi dari table peminjaman.</li><br></li>
              </ul>
              <li><b>3. Info Perpanjangan</b> submenu ini mengatur batas berapa hari tambahan perpanjangan dan berapa kali perpanjangan dapat dilakukan.</li><br></li>
              <li><b>4. Info Denda</b> submenu ini mengatur banyaknya denda per hari dan batas denda maksimal buku yg tidak dikembalikan/rusak.</li><br></li>
          </ul>
        </h3>
    </div>
  </center>
      </section>
     </div>
    </div>
</section>
</section>
<?php require 'inc/footer.php' ?>