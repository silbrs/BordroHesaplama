<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=sedefdeneme", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}

?>