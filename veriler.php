<?php

require_once('ayar.php'); // ayar dosyamızı dahil ediyoruz.


// Ufak bir sayfa var mı yok mu kontrolü yapıyoruz eğer yoksa hata vericek.
if (isset($_POST["page"])) {
    $page_no = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if (!is_numeric($page_no))
        die("Dikkat! Böyle Bir Sayfa Yok!!!");
} else {
    $page_no = 1;
}

// burada anasayfada gösterilenden hariç geriye kalan tüm içerikleri alıyoruz
$start = (($page_no - 1) * $lim);

$results = $db->prepare("SELECT * FROM urunler WHERE u_durum=? ORDER BY u_id LIMIT $start, $lim");
$results->execute(array(1));

while ($row = $results->fetch(PDO::FETCH_ASSOC)) { // geriye kalan veri var ise
    ?>
// bu kısım index sayfasında belirtiğim listpage sınıfının tam altına gidicek
    <div class="col-sm-6 grid_col">
        <div class="grid_div">
            <div class="grid_img">
                <a href="<?php echo $ayarrow['site_url']; ?>/oku.php?urun_bilgi=<?php echo $row['u_sef']; ?>"><img
                        src="<?php echo $row["u_resim"]; ?>"
                        alt="<?php echo $row['u_sef']; ?>"></a>
            </div>
            <div class="grid_detail">
                <a href="<?php echo $ayarrow['site_url']; ?>/oku.php ?></a>

            </div>
        </div>
    </div>

    <?php
}
?>