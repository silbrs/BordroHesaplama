<?php
include 'baglanti.php';

print_r($_GET);

$id =  $_GET['id'];

$stmt = $db->prepare( "DELETE FROM veriler WHERE id =:id" );
$stmt->bindParam(':id', $id);
$stmt->execute();
if(!$stmt->rowCount()) {
    echo "Su";
}else{
    header('Location: http://localhost/sedef/tablo.php');
}


?>