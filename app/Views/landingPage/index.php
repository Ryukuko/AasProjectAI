<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKARPAR WEBSITE MASSSE</title>
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <link rel="stylesheet" href="<?php echo base_url('asset/dist'); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/plugins'); ?>/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <script type="text/javascript" id="debugbar_loader" data-time="1585277113" src="<?php echo base_url('asset/plugins/'); ?>/index.php?debugbar"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Serif:opsz@12..24&family=Poppins&family=Varela&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/7f732dc1b2.js" crossorigin="anonymous"></script>
    <script src=""></script>
    <style>
      .custom-btn{
        width:100%;
      }
      *{
          font-family: Poppins;
      }
    </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="position: fixed; width: 100%">
    <div class="container">
      <a href="#apa" class="navbar-brand">
      <img src="<?php echo base_url('asset/dist');?>/img/sikarpar.svg" alt=" Sirkapar Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIKARPAR</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item" style="display: flex;">
              <a href="#apa2" class="nav-link">Organ Paru-paru</a>
            <a href="#apa3" class="nav-link">Penyakit Paru-paru</a>
              <a href="#apa4" class="nav-link">Mulai Diagnosa</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Selamat datang di SIKARPAR</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content" id="apa">
          <div class="container">
              <!-- Penjelasan Sistem -->
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card card-primary card-outline">
                          <div class="card-header">
                              <h5 class="card-title m-0"><b>Apa itu SIKARPAR?</b></h5>
                          </div>
                          <div class="card-body">
                              <p class="card-text">SIKARPAR adalah sistem pakar yang dirancang untuk membantu
                                  mendiagnosis penyakit pada organ paru-paru. Sistem ini memberikan informasi
                                  tentang pengertian paru-paru dan beberapa penyakit yang dapat menyerangnya.
                                  Jika Anda mengalami gejala tertentu, SIKARPAR dapat membantu Anda menentukan
                                  seberapa besar kemungkinan Anda terkena penyakit pada organ paru-paru.</p>
                          </div>
                      </div>
                  </div>
              </div>
      </div>
    <!-- Main content -->
    <div class="content" id="apa2">
      <div class="container">
        <div class="row">
        <div class="col-lg-12" >
            <div class="card card-primary card-outline">
              <div class="card-header"  >
                <h5 class="card-title m-0"><b>Organ Paru - Paru</b></h5>
              </div>
              <div class="card-body">
                <h6 class="card-title"><b><i></i></b></h6>
                <p class="card-text"> Paru-paru adalah salah satu organ vital dalam tubuh manusia. Tepatnya merupakan organ
                 respirasi (pernapasan) yang berhubungan dengan sistem pernapasan dan sirkulasi peredaran darah. </p>
                 <p class="card-text">Fungsi utama dari organ ini adalah menukar oksigen dari udara dengan karbon dioksida dari darah.
                  Jika organ ini terganggu fungsinnya, maka kesehatan tubuh manusia bisa menimbulkan masalah serius pada sistem pernapasa.
                 </p>
                 <p class="card-text">Paru-paru merupakan organ yang jumlahnya sepasang, kanan dan kiri. Namun, masing-masing
                  punya ciri yang berbeda, salah satu perbedaanya adalah bobot atau berat. Paru - paru kiri orang dewasa umumnya memiliki
                  berat sekitar <b>325 - 550 gram</b>, sedangkan bagian kanan memiliki berat sekitar <b>375 - 600 gram</b>. Contoh lainnya, paru - paru kanan memiliki tiga bagian (lobus),
                  sedangkan paru - paru bagian kiri hanya memiliki dua bagian saja.
                 </p>
                <!-- <a href="https://www.halodoc.com/kesehatan/paru-paru" class="btn btn-primary">Lebih detail</a> -->
              </div>
            </div> 
          </div>

        <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header"  id="apa3">
                <h5 class="card-title m-0"><b>Penyakit yang Menyerang Paru - Paru</b></h5>
              </div>
              <div class="card-body">
                <h6 class="card-title"><b><i></i></b></h6>
                <p class="card-text">Sebagaimana halnya dengan organ tubuh lainnya, organ paru-paru juga rentan terhadap berbagai jenis penyakit yang dapat mempengaruhi fungsinya. Berikut ini merupakan lima penyakit yang menyerang organ paru-paru:
                </p>
                  <ol type="1" >
                    <li><h6 class="card-title"><b>Bronkitis</b></h6></li>
                    <ul>
                      <li>Pengertian Penyakit <i>Bronkitis</i></li>
                      <p class="text-card">Bronkitis adalah iritasi atau peradangan di dinding saluran bronkus, yaitu penyakit
                        yang menyalurkan udara dari tenggorokan ke paru - paru. Bronkitis bisa terjadi dalam perhitungan hari,
                        minggu, bahkan bulan.
                      </p>
                      <li>Gejala umum yang di tumbulkan Penyakit <i>Bronkitis</i></li>
                      <ol type="a">
                        <li>Mengalami Batuk</li>
                        <li>Mengalami Sesak Napas</li>
                        <li>Mengalami Sakit Tenggorokan</li>
                      </ol>
                      <li>Solusi Mengatasi Penyakit <i>Bronkitis</i></li>
                      <ol type="a">
                        <li>Memberikan tubuh istirahat yang cukup memungkinkan sistem kekebalan tubuh <br> untuk bekerja dengan optimal.</li>
                        <li>Penggunaan obat penghilang gejala, seperti <i>bronkodilator</i> dan <i>ekspektoran</i><br>yang membantu saluran udara dan mengurangi lendir yang berlebihan.</li>
                        <li>Inhasi Uap air dapat memberikan kelegaan pada saluran pernapasan.</li>
                        <li>Hindari lingkungan yang tidak sehat, seperti asap rokok dan tempat yang berdebu.</li>
                      </ol>
                    </ul>
                    <li><h6 class="card-title"><b>Laringitis</b></h6></li>
                    <ul>
                      <li>Pengertian Penyakit <i>Laringitis</i></li>
                      <p class="text-card">Laringitis adalah peradangan pada laring yang mengakibatkan pembengkakan pada pita suara serta perubahan suara menjadi parau atau serak.</p>
                      <li>Gejala umum yang di timbulkan Penyakit <i>Laringitis</i></li>
                      <ol type="a">
                        <li>Mengalami suhu tinggi dan Demam.</li>
                        <li>Suara Serak ataupun menjadi kurang jelas.</li>
                        <li>Merasakan nyeri saat menelan.</li>
                        <li>Mengalami sulit berbicara atau kurang lancar saat berbicara.</li>
                      </ol>
                      <li>Solusi Mengatasi Penyakit <i>Laringitis</i></li>
                      <ol type="a">
                        <li>Istirahat secara teratur, minum banyak cariran hangat, dan menghindari pemicu iritasi</li>
                        <li>Menggunakan Pelembab udara dan gula - gula hisap untuk meredakan gejala</li>
                        <li>Jika disebabkan oleh bakteri, maka pergi ke dokter untuk meresepkan antibiotik</li>
                      </ol>
                    </ul>
                    <li><h6 class="card-text"><b>Tonsilitis</b></h6></li>
                    <ul>
                      <li>Pengertian Penyakit <i>Tonsilitis</i></li>
                      <p class="text-card"> Tonsilitis atau yang sering kita sebut radang amandel adalah peradangan pada tonsil palatina (amandel) yang sering disebakan oleh bakteri atau virus</p>
                      <li>Gejala umum yang ditimbulkan Penyakit <i>Tonsilitis</i></li>
                      <ol type="a">
                        <li>Kepala merasakan pusing</li>
                        <li>Merasakan sakit dibagian tenggorokan</li>
                        <li>Merasakan kurangnya indra pengecap dan bau</li>
                        <li>Merasa kurang nafsu dengan makanan</li>
                      </ol>
                      <li>Solusi Mengatasi Penyakit <i>Tonsilitis</i></li>
                      <ol type="a">
                        <li>Jika disebabkan oleh bakteri maka menggunakan antibiotik yang diresepkan oleh dokter</li>
                        <li>Jika disebabkan oleh virus maka istirahat dengan cukup, meminum minuman hangat, konsumsi analgesik atau antipiretik <br> 
                        untuk meredakan nyeri dan demam,serta berkumur dengan air garam hangat</li>
                        <li>Jika tonsilitis berulang atau menjadi kronis, atau jika terdapat komplikasi, seperti abses pada amandel, dokter mungkin merujuk untuk pengangkatan amandel (tonsilektomi). </li>
                      </ol>
                    </ul>
                    <li><h6 class="card-text"><b>Tuberkulosis</b></h6></li>
                    <ul>
                      <li>Pengertian Penyakit <i>Tuberkulosis</i></li>
                      <p class="text-card">Tuberkulosis adalah penyakit menular yang penyebabnya adalah bakteri Mycobacterium tuberculosis. Kondisi ini dapat menyerang otak, kelenjar getah bening, sistem saraf pusat, jantung dan tulang belakang.</p>
                      <li>Gejala umum yang ditimbulkan Penyakit <i>Tuberkulosis</i></li>
                      <ol type="a">
                        <li>Mengalami Batuk</li>
                        <li>Mengalami kenaikan suhu badan dan Demam</li>
                        <li>Merasa kurang nafsu denan Makanan</li>
                        <li>Mengalami Diare</li>
                      </ol>
                      <li>Solusi Mengatasi Penyakit <i>Tuberkulosis</i></li>
                      <ol type="a">
                        <li>Pemberian terapi antibiotik yang tepat dan tepat waktu selama periode yang dianjurkan oleh profesional kesehatan, seringkali berkisar antara 6 hingga 9 bulan.
                        Penting untuk menjaga kepatuhan terhadap pengobatan untuk mencegah resistensi obat dan kekambuhan.
                        </li>
                        <li>Praktik isolasi selama fase infeksi menular dan kebersihan yang baik membantu mencegah penularan Tuberkulosis</li>
                        <li>Menjaga asupan nutrisi yang baik dan memberikan istirahat yang cukup.</li>
                        <li>Monitoring secara teratur oleh tenaga medis adalah kunci untuk menilai respons terhadap pengobatan.</li>
                      </ol>
                    </ul>
                    <li><h6 class="text-card"><b>Pneumonia</b></h6></li>
                    <ul>
                      <li>Pengertian Penyakit <i>Pneumonia</i></li>
                      <p class="text-card">Pneumonia juga dikenal dengan istilah paru-paru basah. Pada kondisi ini, infeksi menyebabkan peradangan pada kantong-kantong udara (alveoli) di salah satu atau kedua paru.</p>
                      <li>Gejala umum yang ditimbulkan Penyakit <i>Pneumonia</i></li>
                      <ol type="a">
                        <li>Mengalami Batuk</li>
                        <li>Mengalmi Demam dan suhu tinggi pada badan</li>
                        <li>Mengalami Sesak Bernapas</li>
                        <li>Mengalami hidung tersumbat</li>
                      </ol>
                      <li>Solusi Mengatasi Penyakit <i>Pneumonia</i></li>
                      <ol type="a">
                        <li>Jika disebabkan oleh bakteri maka gunakan antibiotik yang telah diresepkan oleh dokter.</li>
                        <li>Jika disebabkan oleh virus menggunakan antiviral yang telah diresepkan oleh dokter</li>
                        <li>Penting untuk istirahat yang cukup, mengonsumsi minum secara teratur, mengonsumsi obat-obatan yang diresepkan sesuai petunjuk dokter.</li>
                        <li>Pneumonia dapat dicegah dengan vaksinasi, terutama pada kelompok rentan seperti anak-anak, orang tua, dan individu dengan kondisi medis yang melemahkan sistem kekebalan.
                        Pemantauan medis dan perawatan yang tepat waktu sangat penting untuk menghindari komplikasi serius dan memastikan pemulihan yang optimal. 
                        </li>                       
                      </ol>
                    </ul>
                  </ol>
                </p>
                <!-- <a href="https://www.halodoc.com/kesehatan/paru-paru" class="btn btn-primary">Lebih detail</a> -->
              </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header"  id="apa4">
                    <h5 class="card-title m-0"><b>Mulai Diagnosa</b></h5>
                </div>
              <div class="card-body">
                <p class="card-text">Setelah membaca tentang penyakit - penyakit yang ada pada organ paru-paru. Apakah ada gejala yang anda alami yang sesuai dengan penjelasan diatas?
                  Jika ada Apakah anda ingin mengecheck seberapa besar anda terkena Penyakit pada Organ paru-paru? Jika iya, kami telah membuat sistem untuk menghitung presentase penyakit 
                  yang sedang anda alami. Tertarik untuk mencobanya? Klik Tombol dibawah untuk melakukan percobaan Pada Sistem.
                </p>
                <a href="<?= base_url().'user/Auth/login';?>" class="btn btn-primary custom-btn">Mulai Diagnosa Yuk !!</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
          <div class="p-3">
              <h5>Title</h5>
              <p>Sidebar content</p>
          </div>
      </aside>
      <footer class="main-footer">
          <div class="float-right d-none d-sm-inline">
              Sistem Pakar Diagnosa Penyakit Paru - Paru
          </div>
          <strong>Copyright © 2023-2099 <a href="#"> SIKARPAR</a>.</strong> All rights reserved.
      </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('asset/plugins');?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asset/dist');?>/js/adminlte.min.js"></script>
</body>

    
    

</html>