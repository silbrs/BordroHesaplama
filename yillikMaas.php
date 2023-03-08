
<?php 
include 'baglanti.php';
include 'jsandcss.php'; 

try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sorgu = $db->query("SELECT * FROM veriler");
    $cikti = $sorgu->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<div class="container">
    <table class="table table-powder">
    <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Aylar</th>
            <th scope="col">Brüt Maaş</th>
            <th scope="col">SGK Primi</th>
            <th scope="col">SGK İşsizlik Primi</th>
            <th scope="col">SGK EKSİLMİŞ MAAŞ</th>
            <th scope="col">Damga Vergisi</th>
            <th scope="col">Gelir Vergisi</th>
            <th scope="col">Net Elde Edilecek Maaş</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        if(!empty($cikti)){
            foreach ($cikti as $key => $value) {
                if(!empty($value['brutMaas']) && $value['brutMaas']!='0'){
                    $sgkPrim = $value['brutMaas'] *14 / 100;
                    $sgkIssizPrim = $value['brutMaas'] *1 / 100;
                    $netMaas = $value['brutMaas'] - $sgkPrim - $sgkIssizPrim;
                    if($value['brutMaas'] > 5004){
                        $damgaVergisi = $value['brutMaas'] * 0.00759;
                        $damgaVergisi = $damgaVergisi - 37.98036;
                        $damgaVergisi=floor($damgaVergisi*100)/100;
                        $gelirVergisi = $netMaas * 15/100;
                        $gelirVergisi = $gelirVergisi - 638.01;
                        $eldeEdilecekMaas = $netMaas - $damgaVergisi - $gelirVergisi;
                        $eldeEdilecekMaas=floor($eldeEdilecekMaas*100)/100;
                    }
                }
                ?>
                 <?php
                    $aylar  = array('Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık');
                    
                ?>
               
            <tr class="text-center">
                <th scope="row"><?php echo $i++; ?></th>
                <td><?php echo !empty($aylar['aylar'])?$value['aylar']:''; ?></td>
                <td><?php echo !empty($value['brutMaas'])?$value['brutMaas']:''; ?></td>
                <td><?php echo !empty($sgkPrim)?$sgkPrim:''; ?></td>
                <td><?php echo !empty($sgkIssizPrim)?$sgkIssizPrim:''; ?></td>
                <td><?php echo !empty($netMaas)?$netMaas:''; ?></td>
                <td><?php echo !empty($damgaVergisi)?$damgaVergisi:'0'; ?></td>
                <td><?php echo !empty($gelirVergisi)?$gelirVergisi:'0'; ?></td>
                <td><?php echo !empty($eldeEdilecekMaas)?$eldeEdilecekMaas:'0'; ?></td>
                <td><a href="index.php?id=<?php echo $value['ID'];?>" class="btn btn-primary">Güncelle</a></td>
                <td><a href="sil.php?id=<?php echo $value['ID'];?>" class="btn btn-danger">Sil</a></td>
                
            </tr>
        <?php } } ?>
    </tbody>
    </table>
    <a href="index.php" class="btn btn-success">Kayıt Ekranına git</a>
    <a href="tablo.php" class="btn btn-success">Tabloya git</a>

</div>