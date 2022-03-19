<?php 
    include 'koneksi.php';
?>

<div class="content">
    <div class="container">

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            <tr>  
              <th scope="col">ID</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Nomor HP</th>
              <th scope="col">Alamat</th>
              <th scope="col">Kode Pos</th>
              <th scope="col" class="text-center">Set</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $page = (isset($_POST['page']))? $_POST['page'] : 1;
              $batas = 25; 
              $batas_mulai = ($page - 1) * $batas;
              $no = $batas_mulai + 1;

              $query = "SELECT * FROM mytable ORDER BY id ASC LIMIT $batas_mulai, $batas";
              $execute = $db1->prepare($query);
              $execute->execute();
              $res1 = $execute->get_result();
              while ($data = $res1->fetch_assoc()) {
            ?>
            <tr scope="row">
                <td><?php echo $no++; ?></td>
                <td><?php echo $data["name"]; ?></td>
                <td><?php echo $data["email"]; ?></td>
                <td><?php echo $data["phone"]; ?></td>
                <td><?php echo $data["address"]; ?></td>
                <td><?php echo $data["postalZip"]; ?></td>
                <td class="text-center"><a class='btn btn-dark btn-sm' href="index.php?act=edit&id=<?php echo $data['id']?>">Edit</a>
                    <a class='btn btn-dark btn-sm' href="koneksi.php?act=delete&id=<?php echo $data['id']?>">Delete</a></td>
            </tr>
            <tr class="spacer"><td colspan="100"></td></tr>
            <?php } ?>
          </tbody>
        </table>

        <?php
          $query_jumlah = "SELECT count(*) AS jumlah FROM mytable";
          $execute = $db1->prepare($query_jumlah);
          $execute->execute();
          $res1 = $execute->get_result();
          $data = $res1->fetch_assoc();
          $total_records = $data['jumlah'];?>
        <nav class="mb-5">
          <ul class="pagination justify-content-center">
            <?php
              $jumlah_page = ceil($total_records / $batas);
              $jumlah_number = 5; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        
              

              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              }

              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }

              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
              }
            ?>
          </ul>
        </nav>