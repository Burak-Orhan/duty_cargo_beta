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
| Services Yükleyicisi             | Herd    |
| PHP Sunucusu                     | Nginx   |
| Veri Tabanı                      | DBNgin  |
| Veri Tabanı Türü                 | MySql   |
| SSL Sertifikası                  | Caddy   |


## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).


## Dosya Yapısı
[Git Tree Document](https://gitdocs1.s3.amazonaws.com/digests/burak-orhan-duty_cargo/61696bce-85cb-4711-ab1e-fc01f8d2399b.txt)

```bash
Directory structure:
└── burak-orhan-duty_cargo/
    ├── README.md
    ├── artisan
    ├── composer.json
    ├── composer.lock
    ├── LICENSE
    ├── package.json
    ├── phpunit.xml
    ├── vite.config.js
    ├── .editorconfig
    ├── .env.example
    ├── app/
    │   ├── Http/
    │   │   └── Controllers/
    │   │       ├── AuthController.php
    │   │       ├── Controller.php
    │   │       ├── DashboardController.php
    │   │       └── TrackingController.php
    │   ├── Models/
    │   │   ├── Cargos.php
    │   │   ├── Cities.php
    │   │   ├── Company.php
    │   │   ├── Customer.php
    │   │   ├── User.php
    │   │   └── UserInformation.php
    │   └── Providers/
    │       └── AppServiceProvider.php
    ├── bootstrap/
    │   ├── app.php
    │   ├── providers.php
    │   └── cache/
    │       └── .gitignore
    ├── config/
    │   ├── app.php
    │   ├── auth.php
    │   ├── cache.php
    │   ├── database.php
    │   ├── filesystems.php
    │   ├── logging.php
    │   ├── mail.php
    │   ├── queue.php
    │   ├── services.php
    │   └── session.php
    ├── database/
    │   ├── .gitignore
    │   ├── factories/
    │   │   ├── CargosFactory.php
    │   │   ├── CitiesFactory.php
    │   │   ├── CompanyFactory.php
    │   │   ├── CustomerFactory.php
    │   │   ├── UserFactory.php
    │   │   └── UserInformationFactory.php
    │   ├── migrations/
    │   │   ├── 0001_01_01_000000_create_users_table.php
    │   │   ├── 0001_01_01_000001_create_cache_table.php
    │   │   ├── 0001_01_01_000002_create_jobs_table.php
    │   │   └── 2025_04_20_175404_create_cargos_table.php
    │   └── seeders/
    │       ├── DatabaseSeeder.php
    │       └── fakeSeeder.php
    ├── public/
    │   ├── index.php
    │   ├── robots.txt
    │   ├── .htaccess
    │   └── assets/
    │       ├── css/
    │       │   ├── dashboard.css
    │       │   ├── tracking.css
    │       │   └── trackingResult.css
    │       ├── img/
    │       │   ├── cmp.webp
    │       │   └── DutyCARGO.webp
    │       └── js/
    │           ├── dashboardStyle.js
    │           ├── toastFire.js
    │           └── trackingResult.js
    ├── resources/
    │   ├── css/
    │   │   └── app.css
    │   ├── js/
    │   │   ├── app.js
    │   │   └── bootstrap.js
    │   └── views/
    │       ├── defaultDashboardView.blade.php
    │       ├── defaultView.blade.php
    │       ├── welcome.blade.php
    │       ├── auth/
    │       │   ├── forgetPassword.blade.php
    │       │   ├── login.blade.php
    │       │   └── register.blade.php
    │       ├── dashboard/
    │       │   ├── dashboard.blade.php
    │       │   └── settings.blade.php
    │       └── tracking/
    │           ├── tracking.blade.php
    │           └── trackingResult.blade.php
    ├── routes/
    │   ├── auth.php
    │   ├── console.php
    │   ├── dashboard.php
    │   ├── tracking.php
    │   └── web.php
    ├── storage/
    │   ├── app/
    │   │   ├── .gitignore
    │   │   ├── private/
    │   │   │   └── .gitignore
    │   │   └── public/
    │   │       └── .gitignore
    │   ├── framework/
    │   │   ├── .gitignore
    │   │   ├── cache/
    │   │   │   ├── .gitignore
    │   │   │   └── data/
    │   │   │       └── .gitignore
    │   │   ├── sessions/
    │   │   │   └── .gitignore
    │   │   ├── testing/
    │   │   │   └── .gitignore
    │   │   └── views/
    │   │       └── .gitignore
    │   └── logs/
    │       └── .gitignore
    └── tests/
        ├── Pest.php
        ├── TestCase.php
        ├── Feature/
        │   └── ExampleTest.php
        └── Unit/
            └── ExampleTest.php
```