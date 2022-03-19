<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'db_crud1');

// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);

if (isset($_GET['act'])) {
    if ($_GET['act']=='tambah') {
        if (isset($_POST['simpan'])) {
            $name  = $_POST['name'];
            $email  = $_POST['email'];
            $phone  = $_POST['phone'];
            $address  = $_POST['address'];
            $postalZip  = $_POST['postalZip'];
            $query = mysqli_query($db1, "INSERT INTO mytable(name,email,phone,address,postalZip) VALUES   
                                            ('$name','$email','$phone','$address','$postalZip')");
            if ($query) {
                header("location: index.php");
            }  
        }
    }
    if ($_GET['act']=='edit') {
        $cari = mysqli_query($db1, "SELECT * FROM mytable WHERE id='$_GET[id]'");
        $hasil_cari  = mysqli_fetch_assoc($cari);
        if (isset($_POST['simpan'])) {
            $id  = $_POST['id'];
            $name  = $_POST['name'];
            $email  = $_POST['email'];
            $phone  = $_POST['phone'];
            $address  = $_POST['address'];
            $postalZip  = $_POST['postalZip'];

            $update = mysqli_query($db1, "UPDATE mytable SET id = '$id',name = '$name',email = '$email',phone = '$phone',address = '$address',postalZip = '$postalZip' WHERE id = '$id'") ; 
            if ($update) {
                header("location: index.php");
            }   
        }
    }
    if ($_GET['act']=='delete') {
        $delete = mysqli_query($db1, "DELETE FROM mytable WHERE id='$_GET[id]'");
        if ($delete) {
            header("location: index.php");
        }   
    }
}

?>
