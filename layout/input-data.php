<?php 
  require 'koneksi.php';

  if( isset($_POST["tambah"]) ) {
  
      if( inputt($_POST) > 0) {
          echo "<script>     
              alert('data berhasil ditambahkan!');
            </script>";
      } else {
          echo mysqli_error($conn);
      }
  }
  
  function inputt($data) {
      global $conn;
  
      $Hari = htmlspecialchars($data["hari"]);
      $Tanggal = htmlspecialchars($data["tanggal"]);
      $Merk_Motor = htmlspecialchars($data["merk_motor"]);
      $Type_Motor = htmlspecialchars($data["type_motor"]);
      $Seri_Motor = htmlspecialchars($data["seri_motor"]);
      $Nama_Pembeli = htmlspecialchars($data["nama_pembeli"]);
      $No_Handphone = htmlspecialchars($data["no_handphone"]);
      $Alamat = htmlspecialchars($data["alamat"]);
      $Harga = ($data["harga"]);
  
      // tambahkan user baru ke database
      mysqli_query($conn, "INSERT INTO tabel_penjualan VALUES('$Hari', '$Tanggal', '$Merk_Motor', '$Type_Motor', '$Seri_Motor', '$Nama_Pembeli', '$No_Handphone','$Alamat', '$Harga')");
  
      return mysqli_affected_rows($conn);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Data</title>
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
          <a href="dashboard.PHP">Dashboard</a>
          <a href="#" class="active">Input Data</a>
          <a href="#">Cek Stok</a>
        </div>
        <div class="sidebar-image">
          <img src="img/vespa.svg"/>
        </div>
      </div>
      <div class="content-dashboard">
        <div class="card-cream mb-0">
          <div class="title text-center">PENJUALAN MOTOR</div>
          <form action= "" method="POST">
            <div class="card-content">
              <div class=subtitle>INPUT DATA</div>
              <div class="row mt-5">
                <div class="col-md-6">
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">Hari:</label>
                    <div class="col-sm-8">
                      <input type="text" name="hari" id="hari" class="form-control-plaintext">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">Tanggal:</label>
                    <div class="col-sm-8">
                      <input type="date" name="tanggal" id="tanggal" class="form-control-plaintext">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">Merk Motor:</label>
                    <div class="col-sm-8">
                      <input type="text" name="merk_motor" id="merk_motor" class="form-control-plaintext">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">Type Motor:</label>
                    <div class="col-sm-8">
                      <input type="text" name="type_motor" id="type_motor" class="form-control-plaintext">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">Seri Motor:</label>
                    <div class="col-sm-8">
                      <input type="text" name="seri_motor" id="seri_motor" class="form-control-plaintext">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">Nama Pembeli:</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control-plaintext">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">No Handphone:</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_handphone" id="no_handphone" class="form-control-plaintext">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">Alamat:</label>
                    <div class="col-sm-8">
                      <input type="text" name="alamat" id="alamat" class="form-control-plaintext">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-4 col-form-label">Harga:</label>
                    <div class="col-sm-8">
                      <input type="number" name="harga" id="harga" class="form-control-plaintext">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button class="button-cream" type="submit" name="tambah">SUBMIT</button>
            </div>
          </form>
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