<?php

error_reporting(0);
$nik            = $_POST['nik'];
$nama_lengkap   = $_POST['nama_lengkap'];

//apakah nik sudah terdaftar apa belum
$data = file("config.txt", FILE_IGNORE_NEW_LINES);
foreach($data as $value){
    $pecah = explode("|", $value);
    if($nik==$pecah['0']){
        $cek = true;
    }
}

if($cek) { //jika nik sudah terdaftar ?>
<script type="text/javaScript">
    alert('!! Maaf NIK Yang anda gunakan sudah terdaftar.');
    window.location.assign('register.php');
</script>

<?php }else{ //jika data tidak ditemukan
            // buat format penyimpanan ke txt
        $format ="\n$nik|$nama_lengkap";

        // buka dulu file config.txt
        $file = fopen('config.txt', 'a');
        fwrite($file, $format);

        //tutup file
        fclose($file);

        ?>
        <script type="text/javaScript">
         alert('PENDAFATARAN BERHASIL DILAKUKAN');
        window.location.assign('index.php');
        </script>
        
        <?php }
