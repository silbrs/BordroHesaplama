<?php
include 'baglanti.php';

print_r($_GET);

$id =  $_GET['id'];
$ad =  $_GET['ad'];
$soyad =  $_GET['soyad'];
$brutMaas =  $_GET['brutMaas'];

    // $sonuc = $db->exec("UPDATE veriler SET ad = 'bok', soyad = 'sedef' WHERE id = ".$id);
    $data = [
        'ad' => $ad,
        'soyad' => $soyad,
        'brutMaas' => $brutMaas,

    ];
    $sql = "UPDATE veriler SET ad=:ad, soyad=:soyad , brutMaas=:brutMaas  WHERE id = ".$id;
    $stmt= $db->prepare($sql);
    $stmt->execute($data);
    print_r($stmt);

    header('Location: http://localhost/sedef/tablo.php');


?>