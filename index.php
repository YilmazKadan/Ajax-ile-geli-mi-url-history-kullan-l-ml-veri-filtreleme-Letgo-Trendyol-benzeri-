<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>PHP multiple filter</title>
    <style>
        select{
            cursor:pointer;
        }
        #ilanlar{
           position: relative;
        }
        #load-gif{
            position: absolute;
            z-index: 99;
            top:50%;
            right: 50%;
            transform: translate(50%,-50%);
            width: 300px;
            height: 300px; 
            display: none; 
        }
    </style>
</head>

<body>
    <?php
    require('baglanti.php');
    require('function.php');
    $kategoriCek = queryAllDondur("Select * from kategori order by kategori_ad asc");
    $sehirCek = queryAllDondur("select * from sehirler order by sehir_ad asc");

    // Burada get ile gelen filtreleme parametresi var mı yok mu diye kontrol ediyoruz eğer yok ise all'a eşitliyoruz .
    $kategori =  isset($_GET['kategori']) ?  $_GET['kategori'] : "all";
    $sehir = isset($_GET['sehir']) ? $_GET['sehir'] : "all";


    $ilanlar = filtreSorgu($kategori, $sehir);
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="GET">
                    <div class="form-group" id="filter-element">
                        <label for="category">Kategori</label>
                        <select name="kategori" id="category">
                            <?php
                            echo $kategori == "all" ?  '<option selected value="all">Tüm Kategoriler</option>' : '<option  value="all">Tüm Kategoriler</option>';
                            foreach ($kategoriCek as $key) {
                                $kategoriSef = $key['kategori_sef'];
                                if ($kategoriSef == $kategori and $kategori != "all") {
                                    echo '<option  selected value="' . $kategoriSef . '"> ' . $key["kategori_ad"] . '</option>';
                                } else {
                                    echo '<option value="' . $kategoriSef . '"> ' . $key["kategori_ad"] . '</option>';
                                }
                            } ?>
                        </select>
                        <select name="sehir" id="sehir">
                            <?php
                            echo $sehir == "all" ?  '<option selected value="all">Tüm Şehirler</option>' : '<option  value="all">Tüm Şehirler</option>';
                            
                            foreach ($sehirCek as $key) {
                                $sehirAd = strtolower_turkce($key['sehir_ad']);
                                
                                if ($sehirAd == $sehir and $sehir != "all") {
                                    echo '<option selected value="' . $sehirAd . '"> ' . $key["sehir_ad"] . '</option>';
                                } else {
                                    echo '<option style="color:blue"     value="' . $sehirAd . '"> ' . $key["sehir_ad"] . '</option>';
                                }
                            } ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" id="ilanlar">
            <img src="load.gif" id="load-gif"  alt="">
            <?php if (count($ilanlar) > 0) {
                foreach ($ilanlar as $ilan) { ?>
                    <div class="col col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?= $ilan['ilan_gorsel'];  ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $ilan['ilan_baslik'] ?></h5>
                                <p class="card-text"><?= $ilan['ilan_icerik'] ?></p>
                                <a href="#" class="btn btn-primary">Devamını oku</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } else {
                echo "<div class='alert alert-danger'>Aradığınız kriterlerde ilan bulunamadı!!";
            } ?>
        </div>
    </div>
</body>

</html>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>