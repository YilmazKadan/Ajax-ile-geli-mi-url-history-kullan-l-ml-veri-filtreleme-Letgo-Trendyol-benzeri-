# Bizi ne bekliyor ?

Bu proje Trendyol ve Letgo benzeri e-ticaret sitelerinde bulunan anlık  ürün veya içerik listeleme sistemini içerir. Önemli kısım filtreleme yapıldığında veriler anlık olarak güncellendiği gibi adres çubuğundaki 'Get' parametreleri de güncellenmektedir.

### Amaç tam olarak nedir ?

Yazılımın amacı internet sitelerinde bulunan anlık Ajax ile veri listeleme sırasında verileri basit bir şekilde listeleyebiliyoruz ancak listeleme sonrası sayfayı yenilememiz gerektiğinde
bu filtreler sıfırlanmış oluyordu , ben de burada Trendyol ve Letgo tarzı firmaların  sistemlerinde olduğu gibi anlık veri çekildikten sonra senkron bir şekilde url satırında bulunan
filtreleme parametrelerinin aşağıda bulunan 'select' elementlerie göre güncellenmesi ve sayfa yenilendiğinde bile filtrelerin kaybolmamasını sağladım. 
Aşağıda gif görüntüsünü izleyebilirsiniz **( Filtreleme yaparken değerleri 'select' etiketinden değiştiriyorum kayıt yaparken option'lar gözükmemiş)**.
![CPT2108020041-1536x447-min](https://user-images.githubusercontent.com/44698680/127786295-b9e4b2f7-b393-4dfb-8748-186cdcc0a927.gif)


## Nasıl kullanacağım ?

Yazılımı ve algoritmaları anlamak için orta düzey programlama bilgisine sahip olmanız yeterli olacaktır. Aşağıdaki adımları izleyerek çalışır hale getirebilirsiniz.

1. Dosyalar arasında bulunan filter_product dosyasını phpmyadmin'e yükleyin.
2. Dosyalar arasındaki baglanti.php dosyasına gidip veritabanı bilgilerinizi kendinize göre uyarlayınız.

Aktaracaklarım bu kadar yardımcı olması dileği ile .
