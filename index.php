<!DOCTYPE html PUBLIC
        "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="tr">
<head>
    <meta http-equiv="Content-Type"
          content="text/html;charset=UTF-8">
    <title>
        Listeler</title>
    <!--Buraya Css Dosyalarınızı Dahil Etmeyi Unutmayın-->

</head>
<body>
<div class="row grid_row list_page"> // veri varsa .listpage divinin içerisine yazılacak

    <!-- Ürünleri Listeleme Alanı-->
    <?php

    $stmt = $db->prepare("SELECT COUNT(*)  FROM yazilar WHERE u_durum=?"); // yazilar sayfasını topladık koşul olarak durumu 1 olanları listeledik
    $stmt->execute(array('1'));
    $rows = $stmt->fetch();
    $lim = $ayarrow['site_sayfalama']; // ayarlar tablosundan kaç adet sayfalama yapacağımızı belirtik
    // toplam sayfa sayısını buluyoruz
    $total_pages = ceil($rows[0] / $lim);
    ?>
</div>

<div class="row text-right">
    <div aria-label="Page navigation">
        <ul class="pagination"> // sayfalama kısmı burada görünecek
        </ul>
    </div>
</div>

<!--Buraya Jquery Dosyalarınızı Dahil Etmeyi Unutmayın-->

<script type="text/javascript">
    $(document).ready(function () {
        $(".grid_row").load("veriler.php");
        $(".pagination").bootpag({
            total: <?php echo $total_pages; ?>, // Toplam sayfa sayımızı belirtik
            href: "#urunler", // dilersek sayfalama sonuna tagde ekleyebiliyoruz örn : index.php?s=1#urunler sayfa değişirken belirtiğimiz dive atlıyor
            next: null,
            page: 1,
            maxVisible: 5,
            prev: null
        }).on("page", function (e, page_num) {
            e.preventDefault();

            $(".list_page").load("veriler.php", {"page": page_num}); // veri varsa yazdıralacak yeri belirtiyoruz.
        });
    });
</script>

</body>
</html>