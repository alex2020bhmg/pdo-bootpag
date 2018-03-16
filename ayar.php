<?php
/**
 * User: yucelbaba
 * Date: 16.03.2018
 * Time: 09:10
 */


<?php
$hostname = "localhost";
$username = "kullanici"; //veritabanı kullanıcı adınız
$password = "sifre"; //veri tabanı şifreniz
$database = "sallama";  // veri tabanı adınız


// veritabanı bağlantısı
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    die("HATA! " . $err->getMessage());
}

/**
 * Ayarlar Tablosundan Veri Çekme İşlemleri
 */

$ayarlar = $db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayarrow = $ayarlar->fetch(PDO::FETCH_ASSOC);
$settitle = $ayarrow['kac_adet']; // gösterilecek limit sayısı


?>