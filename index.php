<?php 
    require_once 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>UAS Al-Farizi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  </head>
  <body>
  

  <div class="content">
    
    <div class="container"><?php
     if (isset($_GET['act'])) {
          if ($_GET['act']=='edit') {?>
               <h2 class="mb-5 text-center">Edit Data</h2>
               <form action="koneksi.php?act=edit&id=<?php echo $hasil_cari['id']?>" method="POST">
                    <h2 class="mt-1 mb-1">ID</h2>
                    <input type="text" class="form-control" name="id" value="<?php echo $hasil_cari['id']; ?>" readonly>
                    <h2 class="mt-3 mb-1">Nama</h2>
                    <input type="text" class="form-control" name="name" value="<?php echo $hasil_cari['name']; ?>" required>
                    <h2 class="mt-3 mb-1">Email</h2>
                    <input type="text" class="form-control" name="email" value="<?php echo $hasil_cari['email']; ?>" required>
                    <h2 class="mt-3 mb-1">No HP</h2>
                    <input type="text" class="form-control" name="phone" value="<?php echo $hasil_cari['phone']; ?>" required>
                    <h2 class="mt-3 mb-1">Alamat</h2>
                    <input type="text" class="form-control" name="address" value="<?php echo $hasil_cari['address']; ?>" required>
                    <h2 class="mt-3 mb-1">Kode Pos</h2>
                    <input type="text" class="form-control mb-5" name="postalZip" value="<?php echo $hasil_cari['postalZip']; ?>" required>
                    <div class="form-group text-center">
                    <input type="submit" class="btn btn-success btn-submit mr-4" name="simpan" value="Simpan">
                    <a href="index.php" class="btn btn-danger btn-reset">Batal</a>
               </form>
          <?php }
          if ($_GET['act']=='tambah') {?>
               <h2 class="mb-5 text-center">Tambah Data</h2>
               <form action="koneksi.php?act=tambah" method="POST">
                    <h2 class="mt-3 mb-1">Nama</h2>
                    <input type="text" class="form-control" name="name" required>
                    <h2 class="mt-3 mb-1">Email</h2>
                    <input type="text" class="form-control" name="email" required>
                    <h2 class="mt-3 mb-1">No HP</h2>
                    <input type="text" class="form-control" name="phone" required>
                    <h2 class="mt-3 mb-1">Alamat</h2>
                    <input type="text" class="form-control" name="address" required>
                    <h2 class="mt-3 mb-1">Kode Pos</h2>
                    <input type="text" class="form-control mb-5" name="postalZip" required>
                    <div class="form-group text-center">
                    <input type="submit" class="btn btn-success btn-submit mr-4" name="simpan" value="Simpan">
                    <a href="index.php" class="btn btn-danger btn-reset">Batal</a>
               </form>
          <?php }
     }
     else{?>
      <h2>Nama : Ahmad Lutfi Farizi </h2>
      <h2 class="mb-5">NIM : 202410102023</h2>
      <h2 class="mb-4 text-center" >Data Table</h2>
      <div class="text-center">
          <a href="index.php?act=tambah" class="btn btn-success">Tambah Data</a>
      </div>
      
      <div class="table-responsive" id="data"></div> 
      <?php }?>
    </div>
  </div>
  
  <script>
   $(document).ready(function(){
        load_data();
        function load_data(page){
             $.ajax({
                  url:"data.php",
                  method:"POST",
                  data:{page:page},
                  success:function(data){
                       $('#data').html(data);
                  }
             })
        }
        $(document).on('click', '.halaman', function(){
             var page = $(this).attr("id");
             load_data(page);
        });
   });
   </script>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>