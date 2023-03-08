<?php
include 'baglanti.php';

if(!empty($_GET)){

    $vtAd= $_GET['ad'];
    $vtSoyad = $_GET['soyad'];
    $vtbrutMaas = $_GET['brutMaas'];

    
    if (empty($vtAd) || empty($vtSoyad) || empty($vtbrutMaas)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }
    try {
        $sorgu = $db->prepare("INSERT INTO veriler(ad, soyad, brutMaas) VALUES(?, ?, ?)");
        $sorgu->bindParam(1, $vtAd, PDO::PARAM_STR);
        $sorgu->bindParam(2, $vtSoyad, PDO::PARAM_STR);
        $sorgu->bindParam(3, $vtbrutMaas, PDO::PARAM_STR);

    
        $sorgu->execute();
    
        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";
        header('Location: http://localhost/sedef/index.php');
    
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


?>