<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PEMANTAUAN TEMPAT SAMPAH PINTAR</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style2.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style3.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/script.js"></script>
</head>
<body >
    <div class="container" >
      
    <div style="color:black">
<h1 class="h1" align="center">SISTEM PEMANTAUAN TEMPAT SAMPAH PINTAR</h1>
<p class="ket" align="center">ini adalah website untuk memantau kapasitas tempat sampah</p>
</div>
<div>
<main class="container">
    
  <section class="card">
  <div class="product-info">
      <h2>VOLUME</h2>
      <p>Tempat Sampah 1</p>
      <?php
        // Ambil data ketinggian terakhir dari database
        $dataKetinggian1 = \App\Models\ketinggian::where('id_sensor', 1)->orderBy('id', 'desc')->first();
        if ($dataKetinggian1) {
            $ketinggian1 = $dataKetinggian1->ketinggian;
            $waktu1 = $dataKetinggian1->log;

        } else {
            $ketinggian1 = 0; // Jika tidak ada data ketinggian, set ketinggian menjadi 0
            $waktu1 = ""; // Jika tidak ada data ketinggian, set waktu menjadi string kosong
          
        }
        ?>
      <div class="pie animate" style="--p:<?= $ketinggian1 ?>;--c:lightgreen"><?= $ketinggian1 ?>%</div>
    </div>
    <div class>
      <!-- <img src="https://i.ibb.co/cNWqxGx/red.png" alt="OFF-white Red Edition" draggable="false" /> -->
      <p>Waktu: <?= $waktu1 ?></p>
    </div>
    
  </section>
  <section class="card card-blue">
  <div class="product-info">
      <h2>VOLUME</h2>
      <p>Tempat Sampah 2</p>

      <?php
        // Ambil data ketinggian terakhir dari database
        $dataKetinggian2 = \App\Models\ketinggian::where('id_sensor', 2)->orderBy('id', 'desc')->first();
        $waktu1 = $dataKetinggian1->log;
        if ($dataKetinggian2) {
            $ketinggian2 = $dataKetinggian2->ketinggian;
            
        } else {
            $ketinggian2 = 0; // Jika tidak ada data ketinggian, set ketinggian menjadi 0
        }
        ?>

      <div class="pie animate" style="--p:<?= $ketinggian2 ?>;--c:lightgreen"><?= $ketinggian2 ?>%</div>
      <p>Waktu: <?= \Carbon\Carbon::now()->format('Y-m-d H:i:s') ?></p>
    </div>
    <div class="product-image">
        <!-- <img src="https://i.ibb.co/cNWqxGx/red.png" alt="OFF-white Red Edition" draggable="false" /> -->
    </div>
  </section>
  
</main>

</div>

</body>
</html>
