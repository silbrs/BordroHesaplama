<?php
include 'baglanti.php';
include 'jsandcss.php';

if(!empty($_GET['id'])){

    $stmt = $db->prepare("SELECT * FROM veriler WHERE id=:id");
    $stmt->execute(['id' => $_GET['id']]); 
    $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedef</title>
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <div class="row"> 
            <form action="<?php echo !empty($userInfo)?'update.php':'ekleme.php'; ?>" method="get">
                <div class="form-group" hidden>
                    <label>id</label>
                    <input type="text" name="id" class="form-control"  placeholder="id" value="<?php echo !empty($userInfo)?$userInfo['ID']:''; ?>">
                </div>
                <div class="form-group">
                    <label>Ad</label>
                    <input type="text" name="ad" class="form-control"  placeholder="Ad" value="<?php echo !empty($userInfo)?$userInfo['ad']:''; ?>">
                </div>
                <div class="form-group">
                    <label>Soyad</label>
                    <input type="text" name="soyad" class="form-control" placeholder="Soyad" value="<?php echo !empty($userInfo)?$userInfo['soyad']:''; ?>">
                </div>
                <div class="form-group">
                    <label>Brüt Maaş</label>
                    <input type="text" name="brutMaas" class="form-control" placeholder="Brüt Maaş" value="<?php echo !empty($userInfo)?$userInfo['brutMaas']:''; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>


        </div>
        <div class="row">
            <a href="tablo.php" class="btn btn-success">Tabloya git</a>
        </div>
    </div>

</div>

</body>
</html>

