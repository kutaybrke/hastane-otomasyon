<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=hastane_otomasyon;charset=utf8", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'veritabanı bağlantısı başarılı'; 
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
    // Hata durumunda gerekli aksiyonları alabilirsiniz, örneğin scripti durdurabilir veya bir log dosyasına hata kaydı ekleyebilirsiniz.
    // exit();
}

?>
