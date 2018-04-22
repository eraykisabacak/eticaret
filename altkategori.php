<?php
 
header('content-type:text/html; charset=utf-8');
 
include 'nedmin/netting/baglan.php';
 
//bütün kayıtları bir kereye mahsus olmak üzere listeliyoruz; daha doğrusu, bir diziye aktarmak için verileri çekiyoruz
$query = "SELECT * FROM kategori order by kategori_id";
$goster = $db->prepare($query);
$goster->execute(); //queriyi tetikliyor
 
echo $toplamSatirSayisi = $goster->rowCount(); //malumunuz üzere sorgudan dönen satır sayısını öğreniyoruz
 
$tumSonuclar = $goster->fetchAll(); //DB'deki bütün satırları ve sutunları $tumSonuclar değişkenine dizi şeklinde aktarıyoruz
//örnek kullanımlar :
/*
  echo ($tumSonuclar[0]['kategori_ust'] . " " . $tumSonuclar[0]['kategori_ad'] . "<br>");
  echo ($tumSonuclar[1]['kategori_ust'] . " " . $tumSonuclar[1]['kategori_ad'] . "<br>");
  echo ($tumSonuclar[2]['kategori_ust'] . " " . $tumSonuclar[2]['kategori_ad'] . "<br>");
 */
 
//alt kategorisi olmayan kategoriin sayısını öğreniyoruz:
$altKategoriSayisi = 0;
for ($i = 0; $i < $toplamSatirSayisi; $i++) {
    if ($tumSonuclar[$i]['kategori_ust'] == "0") {
        $altKategoriSayisi++;
    }
}
 
echo "kategori ($altKategoriSayisi) <br />";
 
echo "\n";
echo "<ul>";
echo "\n";
 
for ($i = 0; $i < $toplamSatirSayisi; $i++) {
    if ($tumSonuclar[$i]['kategori_ust'] == "0") {
        kategori($tumSonuclar[$i]['kategori_id'], $tumSonuclar[$i]['kategori_ad'], $tumSonuclar[$i]['kategori_ust']);
    }
}
 
echo "</ul>";
 
/*
 * FONKSIYONUN OZELLIKLERI:
 * verilen kategoriyi yazar sonra, yeni bir <ul> </ul> arasina o kategorinin alt kateogirilerini yazar.
 * bu işlemi sonsuza kadar yapar, yani ne kadar alt kategoriniz varsa hepsini ekler
 */
 
function kategori($kategori_id, $kategori_ad, $kategori_ust) {
 
    global $tumSonuclar;
    global $toplamSatirSayisi;
 
    //kategorinin, alt kategori sayısını öğreniyoruz:
    $altKategoriSayisi = 0;
    for ($i = 0; $i < $toplamSatirSayisi; $i++) {
        if ($tumSonuclar[$i]['kategori_ust'] == $kategori_id) {
            $altKategoriSayisi++;
        }
    }
    ///////////////////////////////////////////
 
    echo "\n";
    echo "<li>";
    echo "\n";
 
    echo "\t";
    echo "<a href='$kategori_ad.html'>  $kategori_ad  ";
    if ($altKategoriSayisi > 0) {
        echo "( $altKategoriSayisi )";
    }
    echo "</a>";
 
    if ($altKategoriSayisi > 0) { //alt kategorisi varsa onları da listele
        echo "\n";
        echo "<ul>";
 
        for ($i = 0; $i < $toplamSatirSayisi; $i++) {
 
            if ($tumSonuclar[$i]['kategori_ust'] == $kategori_id) {
                kategori($tumSonuclar[$i]['kategori_id'], $tumSonuclar[$i]['kategori_ad'], $tumSonuclar[$i]['kategori_ust']);
            }
        }
 
        echo "</ul>";
    }
    echo "\n";
    echo "</li>";
 
    echo "\n";
}
?>