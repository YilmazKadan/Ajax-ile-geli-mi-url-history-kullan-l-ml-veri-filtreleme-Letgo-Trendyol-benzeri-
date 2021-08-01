
$(document).ready(function(){
    const filterElement = document.querySelectorAll("#filter-element select");
    
    
    filterElement.forEach((element) => {
        element.addEventListener("change", () => {
    
            var url = serializeYap(filterElement);
            veriGuncelle(url);
            // Parametre değilkenimiz boş değil ise dizeyi güncelliyoruz
            if (url != "") {
    
                var pageUrl = '?' + url;
                window.history.pushState("", "", pageUrl);
            }// Eğer dizi boş ise adresi dosya yolu ile güncelliyoruz(Yani boşaltıyoruz).   
            else {
                window.history.pushState("", "", location.pathname);
            }
        })
    })
    
    // Backspace tuşuna basıldığında bir önceki filtreler gelsin diye gerekli fonksiyonlarımızı çağırıyoruz.
    window.onpopstate = function () {
        var urlParemeters = window.location.href.split('?')[1];
        veriGuncelle(urlParemeters);
        selectSelectedUpdate();
    }
    
    // Select elemanlarının değerlerini güncelleme fonksiyonu
    function selectSelectedUpdate() {
        // Urlmizde ' ? ' işaretinden sonra gelen veriyi text  olarak alıyoruz.
        var urlParemeters = window.location.href.split('?')[1];
        // Gelen veriyi kendi yazdığımız dizi oluşturma fonksiyonuna atıyoruz.
        var dizi = serializeToArray(urlParemeters);
    
        filterElement.forEach(element => {
            for (var key in dizi) {
                var value = dizi[key];
                if (key == element.getAttribute("name")) {
                    element.querySelectorAll("option").forEach(option => {
                        if (option.value.toLowerCase() == value.toLowerCase())
                            element.value = value;
                    })
                }
            }
        })
    }
    
    // Serialize şeklinde gelen dizgeyi array'a çevirme fonksiyonu
    function serializeToArray(string) {
        var array = [];
        string = string.split('&');
        string.forEach(element => {
            element = element.split('=');
            array[element[0]] = element[1];
        })
        return array;
    
    }
    
    // Ajax ile anlık verileri çekme fonksiyonumuz.
    function veriGuncelle(url) {
        $.ajax({
            url: "islem.php",
            type: "POST",
            dataType: "json",
            data: url,
            beforeSend: function () {
                $("#load-gif").show();
            },
            success: function (data) {
                document.getElementById("ilanlar").innerHTML = data;
            },
            error: function (data) {
                console.log(data);
            },
            complete: function(){
                $("#load-gif").hide();
            }
        })
    }
    
    // Url dizgesi olutşturma fonksiyonu. Örnek: (?renk=kırmızı&araba=wolswogen)
    function serializeYap(dizi) {
        var parameteres = [];
        // Burada  valuesi 'all' olmayan tüm select elemanlarının name değerini ve value değerini alıyoruz ve 'parameters' dizisine atıyoruz.
        filterElement.forEach((element) => {
            var name = element.getAttribute("name");
            var value = element.value;
            if (value != "all")
                parameteres.push(name + "=" + value);
        })
    
        // Burada parametre dizimizi join metodu ile '&' ayracları ile birleştiriyoruz ki düzenli yani 'Serialize' bir dizgemiz oluşssun.
        parameteres = parameteres.join("&");
        return parameteres;
    }
})
   
