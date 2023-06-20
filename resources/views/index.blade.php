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
                        <?php if ($dataKetinggian1) : ?>
                            <?php $ketinggian1 = $dataKetinggian1->ketinggian; ?>
                            <?php $waktu1 = $dataKetinggian1->log; ?>
                            <div class="pie animate" style="--p:<?= $ketinggian1 ?>;--c:lightgreen"><?= $ketinggian1 ?>%</div>
                        <?php else : ?>
                            <div class="pie animate" style="--p:0;--c:lightgreen">0%</div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <p>Waktu: <?= $waktu1 ?></p>
                    </div>
                </section>
                <section class="card card-blue">
                    <div class="product-info">
                        <h2>VOLUME</h2>
                        <p>Tempat Sampah 2</p>
                        <?php if ($dataKetinggian2) : ?>
                            <?php $ketinggian2 = $dataKetinggian2->ketinggian; ?>
                            <div class="pie animate" style="--p:<?= $ketinggian2 ?>;--c:lightgreen"><?= $ketinggian2 ?>%</div>
                        <?php else : ?>
                            <div class="pie animate" style="--p:0;--c:lightgreen">0%</div>
                        <?php endif; ?>
                    </div>
                    <div class="product-image">
                        <p>Waktu: <?= \Carbon\Carbon::now()->format('Y-m-d H:i:s') ?></p>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
