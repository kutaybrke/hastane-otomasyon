<?php
// Veritabanı bağlantısını sağlayan baglan.php dosyasını dahil edin
include 'baglan.php';

// Silinecek randevunun ID'sini alın
$randevu_id = $_GET['id']; // Silme işlemini gerçekleştirmek için ID'yi bu şekilde alıyorum, siz form ile de alabilirsiniz

// Veritabanında ilgili randevuyu silmek için SQL sorgusu
$sql = "DELETE FROM randevu WHERE randevu_id = :randevu_id";

// SQL sorgusunu hazırlayın ve çalıştırın
$query = $db->prepare($sql);
$query->bindParam(':randevu_id', $randevu_id, PDO::PARAM_INT);
$query->execute();

// İşlem tamamlandıktan sonra kullanıcıyı yönlendirin
header("Location: anasayfa.php"); // Silme işlemi tamamlandıktan sonra anasayfa ya da istediğiniz bir sayfaya yönlendirebilirsiniz
exit;
?>