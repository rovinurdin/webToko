<?php
session_start();
    //koneksi
    $c = mysqli_connect('localhost','root','','kasir');
 
   //login
    if(isset($_POST['login'])){
    $username =  $_POST['username'];
    $password =  $_POST['password'];

    $check = mysqli_query($c,"select * from user where username='$username' and password='$password'");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){

        $_session['login'] = 'true';
        header('location:index.php');
    }else{
        echo '
        <script> alert("username atau password salah");
        window.location.href="login.php"
        </script>
        ';
      }
    }
    //stock
    if(isset($_POST['tambahbarang'])){
        $namaproduk = $_POST['namaproduk'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];
        $harga = $_POST['harga'];

        $insert = mysqli_query($c,"insert into tabelproduk (namaproduk,deskripsi,harga,stock)values ('$namaproduk','$deskripsi','$harga','$stock')");

        if($insert){
            header('location:stock.php');
        } else{
            echo '
            <script> alert("Gagal Menambahkan Barang Baru");
            window.location.href="stock.php"
            </script>
            ';
        }

    }
    //pelanggan
    if(isset($_POST['tambahpelanggan'])){
        $namapelanggan = $_POST['namapelanggan'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];

        $insert = mysqli_query($c,"insert into pelanggan (namapelanggan,notelp,alamat)values ('$namapelanggan','$notelp','$alamat')");

        if($insert){
            header('location:pelanggan.php');
        } else{
            echo '
            <script> alert("Gagal Menambahkan Pelanggan Baru");
            window.location.href="pelanggan.php"
            </script>
            ';
        }

    };
    //
    if(isset($_POST['tambahpesanan'])){
        $idpelanggan = $_POST['idpelanggan'];

        $insert = mysqli_query($c,"insert into pesanan (idpelanggan)values ('$idpelanggan')");

        if($insert){
            header('location:pesanan.php');
        } else{
            echo '
            <script> alert("Gagal Menambahkan pesanan Baru");
            window.location.href="pesanan.php"
            </script>
            ';
        }

    };
    

?>