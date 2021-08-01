<?php
function strtolower_turkce($metin)
{
    $bul     = array("I", "Ğ", "Ü", "Ş", "İ", "Ö", "Ç");
    $degis  = array("ı", "ğ", "ü", "ş", "i", "ö", "ç");
    $metin    = str_replace($bul, $degis, $metin);
    $metin    = strtolower($metin);
    return $metin;
}
function seo($text)
{
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '-', $text);

    return $text;
}

// Veritabanından istenilen parametreler doğrultusunda sorgu oluşturan ve bu sorgu ile veriçeken fonksiyon.
// Parametre 'all' veya boş  olarak geldi ise sorguya dahil etmiyoruz.
function filtreSorgu($kategori = "all",$sehir = "all")

{
    $sorguParametreler = array();
    $sql = "Select * from ilanlar i inner join kategori k on i.ilan_kategori = k.kategori_id 
                                inner join sehirler s on s.sehir_id = i.ilan_sehir";
    if ($kategori != "all" and $kategori!="")
        $sorguParametreler[] = "k.kategori_sef = '" . $kategori . "'";
    if ($sehir != "all" and $sehir!="")
        $sorguParametreler[] = "s.sehir_ad = '" . $sehir . "'";
    if (count($sorguParametreler) > 0)
        $sql .= ' where ' . implode(" and ", $sorguParametreler);

   return $ilanlar = queryAllDondur($sql);
}
