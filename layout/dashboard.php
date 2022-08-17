<!DOCTYPE html>
<?php 

require 'koneksi.php';
?>

<?php 
      $result = mysqli_query($conn,"SELECT SUM(Harga) FROM `tabel_penjualan`");
      $row = mysqli_fetch_assoc($result);
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="css/bootstrap.css" rel="stylesheet"/>
  <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
  <div class="body-cream">
    <div class="header-dashboard">
      <div class="logo-text">DEALERKU</div>
      <div class="box-user">
        <span>Username</span>
        <a href="#">Logout</a>
      </div>
    </div>
    <div class="body-dashboard">
      <div class="sidebar-dashboard">
        <div class="sidebar-menu">
          <a href="dashboard.PHP" class="active">Dashboard</a>
          <a href="input-data.PHP">Input Data</a>
          <a href="#">Cek Stok</a>
        </div>
        <div class="sidebar-image">
          <img src="img/vespa.svg"/>
        </div>
      </div>
      <div class="content-dashboard">
        <div class="card-white">
          <div class="title text-left">DASHBOARD</div>
          <div class="row">
            <div class="col-md-5">
              <div class="card-cream">
                <div class="sub-title">TOTAL PENDAPATAN</div>
                <!-- <div class="text-nominal">RP 300.000.000.000</div> -->
                <?php                
                 $i = 0;
                 $sql = mysqli_query($conn, "SELECT * FROM tabel_penjualan ");
                 while($data = mysqli_fetch_array($sql))
                 {
                 $i++;
                 $hargatotal[$i] = $data['Harga'];
                 }
                 echo "Total: ".array_sum($hargatotal);
                ?>



              </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
              <div class="card-cream">
                <div class="sub-title">MERK PALING LAKU</div>
                <!--
                <div class="list-recommend">
                  <a href="#">Yamaha Motor 12</a>
                  <a href="#">Suzuki Motor 177</a>
                  <a href="#">Honda Motor 126</a>
                  <a href="#">Vespa Motor 1892</a>
                </div>
              -->

              
               <?php                
                 $i = 0;
                 $sql = mysqli_query($conn, "SELECT Merk_motor , COUNT(Merk_Motor)
                                      FROM tabel_penjualan
                                      GROUP BY Merk_Motor 
                                      ORDER BY count(Merk_Motor) ASC LIMIT 3;");
                 while($data = mysqli_fetch_array($sql))
                 
                 $Merk_Motor = $data['Merk_motor'];
                 echo ($Merk_Motor);
                ?>
                <?php $i++; ?>
            


              </div>
            </div>
            <div class="col-md-12">
              <div class="card-cream">
                <div class="sub-title">PENJUALAN PER MINGGU</div>
                <div class="cart">
                  <div class="bars-wrap">
                    <div class="bars">
                      <div class="bars-active" style="height: 100px;"></div>
                    </div>
                    <div class="bars-label"> MINGGU 1</div>
                  </div>
                  <div class="bars-wrap">
                    <div class="bars">
                      <div class="bars-active" style="height: 150px;"></div>
                    </div>
                    <div class="bars-label"> MINGGU 2</div>
                  </div>
                  <div class="bars-wrap">
                    <div class="bars">
                      <div class="bars-active" style="height: 50px;"></div>
                    </div>
                    <div class="bars-label"> MINGGU 3</div>
                  </div>
                  <div class="bars-wrap">
                    <div class="bars">
                      <div class="bars-active" style="height: 200px;"></div>
                    </div>
                    <div class="bars-label"> MINGGU 4</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <script
      crossorigin="anonymous"
      src="js/bootstrap.js"
    ></script>
</body>
</html>