<?php
$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";

try {
    $db = new PDO("mysql:host=$mysqlsunucu;dbname=filter_product;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    function queryAllDondur($query)
    {
        global $db;
        $sorgu = $db->prepare($query);
        $sorgu->execute();

        return $sorgu->fetchAll(PDO::FETCH_ASSOC);
    }
    function queryDondur($query)
    {
        global $db;
        $sorgu = $db->prepare($query);
        $sorgu->execute();

        return $sorgu->fetch(PDO::FETCH_ASSOC);
    }


    
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}

function base_url()
{
    return "http://localhost/MultipleFilter/";
}
