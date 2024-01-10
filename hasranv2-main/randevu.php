<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hastane Otomasyonu</title>
</head>

<body>
    <table>
        <tr>
            <th>Hastane</th>
            <th>Klinik</th>
            <th>Doktor</th>
            <th>İl</th>
            <th>Tarih</th>
            <th>Saat</th>
        </tr>

        <?php
        $randevu_sor = $db->prepare("SELECT * FROM randevu
        INNER JOIN kullanici ON randevu.randevu_hasta_id = kullanici.kullanici_id WHERE kullanici_tc=:kullanici_tc");
        $randevu_sor->execute([
            'kullanici_tc' => $_SESSION['userkullanici_tc']
        ]);
        while ($randevu_cek = $randevu_sor->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $randevu_cek['randevu_hastane']; ?></td>
                <td><?php echo $randevu_cek['randevu_klinik']; ?></td>
                <td><?php echo $randevu_cek['randevu_doktor']; ?></td>
                <td><?php echo $randevu_cek['randevu_sehir']; ?></td>
                <td><?php echo $randevu_cek['randevu_tarih']; ?></td>
                <td><?php echo $randevu_cek['randevu_saat']; ?></td>
                <!-- Sil butonunu ekleyin -->
                <td>
                    <form action="sil.php" method="get">
                        <!-- Silinecek randevunun ID'sini gizli input ile gönderin -->
                        <input type="hidden" name="id" value="<?php echo $randevu_cek['randevu_id']; ?>">
                        <!-- Silme butonu -->
                        <button type="submit" name="sil" onclick="return confirm('Bu randevuyu silmek istediğinizden emin misiniz?')">Sil</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
