<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  <img src="/public/assets/img/DutyCARGO.webp" width="300" alt="DutyCARGO Logo">
</p>

<p align="center">Made With Laravel & Hand Craft</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<img src="/public/assets/img/DutyCARGOBanner.png">

## Laravel Projesi Kurulum ve Hazırlık Adımları

Bir Laravel projesini başarıyla çalıştırmak ve geliştirmeye başlamak için belirli kurulum adımlarını izlemek gerekmektedir. Aşağıda, projeyi ayağa kaldırmak için kullanılan terminal komutları açıklanmıştır;

### 1. Gerekli Paketlerin Yüklenmesi
```bash 
npm install 
```
```bash 
composer install
```

### 2. Ortam Dosyasının Oluşturulması
```bash 
cp .env.example .env
```

### 3. Uygulama Anahtarının Oluşturulması
```bash 
php artisan key:generate
```

### 4. Önbellek ve Görünüm Temizliği
```bash 
php artisan view:clear
```
```bash 
php artisan config:clear
```

### 5. Uygulama Performansı İçin Optimize
```bash 
php artisan optimize 
```

### 6. Veritabanı İçeriğinin Eklenmesi
```bash 
php artisan db:seed
```

### 7. Geliştirme Sunucusunun Başlatılması
```bash 
php artisan serve 
``` 

### 
```bash 
Seeder Fake Bilgileri;
  Mail : test@test.com
  Pasword : test
``` 


## Projenin İçeriği

3. Parti bir site olup, yetkili kişi; 
Hesap oluşturabilir, kargo gönderimi yapabilir, gönderilen kargoları ve kargo bilgilerini görüntüleyebilir, hesap ayarlarını güncelleyebilir. 


| Kullanılan Teknolojiler          |  Oran   |
|----------------------------------|---------|
| (Laravel) Blade                  | %54.86  |
| PHP                              | %30.58  |
| (CSS) Tailwind                   | %4.58   |
| (JS) Flowbite, Ajax, SweetAlert2 | %2.23   |

| Kullanılan Teknolojiler          |         |
|----------------------------------|---------|
| Sunucu                           | Nginx   |
| Veri Tabanı                      | DBNgin  |
| Veri Tabanı Türü                 | MySql   |


## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
