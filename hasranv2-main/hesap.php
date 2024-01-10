<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $adi_soyadi = $_POST['adi_soyadi'];
        $tc_no = $_POST['tc_no'];
        $sifre = $_POST['sifre'];

        // Kullanıcı bilgilerini güncelle
        $guncelle = $db->prepare("UPDATE kullanici SET kullanici_adsoyad = :adi_soyadi, kullanici_tc = :tc_no, kullanici_password = :sifre WHERE kullanici_id = :id");
        $guncelle->execute([
                'adi_soyadi' => !empty($adi_soyadi) ? $adi_soyadi : $kullanicicek['kullanici_adsoyad'],
                'tc_no' => !empty($tc_no) ? $tc_no : $kullanicicek['kullanici_tc'],
                'sifre' => !empty($sifre) ? $sifre : $kullanicicek['kullanici_password'],
                'id' => $kullanicicek['kullanici_id']
        ]);

        // Güncelleme işlemi tamamlandıktan sonra yönlendirme yapabilirsiniz
        header('Location: hesap.php?guncelle=success');
        exit;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hastane Otomasyonu - Hesap Bilgileri</title>
</head>

<body>
        <div class="hesabim_content">
                <form method="POST" action="">
                        <div class="label">
                                <label>ADI SOYADI</label>
                                <input type="text" name="adi_soyadi" placeholder="<?php echo $kullanicicek['kullanici_adsoyad']; ?>">
                        </div> <br>
                        <div class="label">
                                <label>TC NO</label>
                                <input type="text" name="tc_no" placeholder="<?php echo $kullanicicek['kullanici_tc']; ?>">
                        </div> <br>
                        <div class="label">
                                <label>SIFRE</label>
                                <input type="password" name="sifre" placeholder="<?php echo $kullanicicek['kullanici_password']; ?>">
                        </div> <br>
                        <button type="submit">Güncelle</button>
                </form>
        </div>
</body>

</html>