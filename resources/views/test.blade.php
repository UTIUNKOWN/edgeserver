<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>MONITORING TEMPAT SAMPAH</title>

    {{-- panggil file jquery --}}
    <script type="text/javascript" src="{{('jquery/jquery.min.js')}}"></script>

    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
    $(document).ready( function () {
        setInterval( function() {
            $("#kapasitas").load("{{url('kapasitassampah')}}");
            $("#kapasitas2").load("{{url('kapasitassampah2')}}");
            $("#waktuSekarang1").text(currentTime.format('Y-m-d H:i:s'));
             $("#waktuSekarang2").text(currentTime.format('Y-m-d H:i:s'));
        }, 1000);
    });
    </script>
  </head>
  <body>

    <div class="container" style="text-align: center; margin-top: 80 px">
        <img src="{{('images/tukangsampah.png')}}" style="width: 300px">

    <h1>MONITORING KAPASITAS</h1>
<h2> TEMPAT SAMPAH PINTAR</h2>

    <div class="container">
        <div class="row" style="text-align: center;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color:rgb(0, 225, 255); clor:white;">
                      <h4>TEMPAT SAMPAH 1</h4>
                    </div>
                    <div class="card-body" >
                        <div style="font-size: 70px; font-weight: bold; ">
                        <span id="kapasitas"></span> <span style="font-size: 24px; vertical-align:top;">%</span></div>
                    </div>
                  </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color:rgb(0, 225, 255); clor:white;">
                      <h4>TEMPAT SAMPAH 2</h4>
                    </div>
                    <div class="card-body" >
                        <div style="font-size: 70px; font-weight: bold; ">
                        <span id="kapasitas2"></span> <span style="font-size: 24px; vertical-align:top;">%</span></div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


  </body>
</html>
