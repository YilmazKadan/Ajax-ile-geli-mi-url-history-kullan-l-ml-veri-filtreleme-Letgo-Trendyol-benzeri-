<?php

require("baglanti.php");
require("function.php");


# HERŞEY TAMAM SADECE VERİLERİ ÖN PANELE ÇEKME KALDI

if (isset($_POST)) {

    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : "";
    $sehir = isset($_POST['sehir']) ? $_POST['sehir'] : "";


    $dizi = filtreSorgu($kategori, $sehir);
    $cikti = "";
    $cikti.='<img src="load.gif" id="load-gif"  alt="">';
    if(count($dizi)>0){

        foreach ($dizi as $veriler) {
            $cikti .= '
        <div class="col col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="'.$veriler['ilan_gorsel'].'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$veriler['ilan_baslik'].'</h5>
                        <p class="card-text">'.$veriler['ilan_icerik'].'</p>
                        <a href="#" class="btn btn-primary">Devamını oku</a>
                    </div>
                </div>
        </div>';
        }
    }
    else{
        $cikti .= "<div class='alert alert-danger'>Aradığınız kriterlerde ilan bulunamadı!!";
    }



    echo json_encode($cikti);
}
