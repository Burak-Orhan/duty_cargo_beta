<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\User;
use App\Models\UserInformation;
use App\Models\Cities;

class fakeSeeder extends Seeder
{
    public function run()
    {
        $user = User::factory()->create();

        $this->testUser();
        $this->Cities();
        $this->UserInformation($user);

    }

    public function testUser(){
        $isSeeded = DB::table('_settings')->where('key', 'users_seed_completed')->exists();

        if (!$isSeeded) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@test.com',
                "password" => "test"
            ]);

            DB::table('_settings')->insert([
                'key' => 'users_seed_completed',
                'value' => 'true',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    public function Cities()
    {
        $isSeeded = DB::table('_settings')->where('key', 'cities_seed_completed')->exists();

        if (!$isSeeded) {
            $cities = [
                ['city' => 'Adana', 'state' => 'Seyhan', 'district' => 'Çukurova', 'address' => 'Merkez Mah.', 'zip_code' => '01000'],
                ['city' => 'Adıyaman', 'state' => 'Merkez', 'district' => 'Kahta', 'address' => 'Atatürk Cd.', 'zip_code' => '02000'],
                ['city' => 'Afyonkarahisar', 'state' => 'Merkez', 'district' => 'Sandıklı', 'address' => 'İnönü Mah.', 'zip_code' => '03000'],
                ['city' => 'Ağrı', 'state' => 'Merkez', 'district' => 'Patnos', 'address' => 'Şehir Merkezi', 'zip_code' => '04000'],
                ['city' => 'Amasya', 'state' => 'Merkez', 'district' => 'Suluova', 'address' => 'Yeni Mahalle', 'zip_code' => '05000'],
                ['city' => 'Ankara', 'state' => 'Çankaya', 'district' => 'Kızılay', 'address' => 'Atatürk Bul.', 'zip_code' => '06000'],
                ['city' => 'Antalya', 'state' => 'Muratpaşa', 'district' => 'Lara', 'address' => 'Konyaaltı Cad.', 'zip_code' => '07000'],
                ['city' => 'Artvin', 'state' => 'Merkez', 'district' => 'Hopa', 'address' => 'Deniz Mah.', 'zip_code' => '08000'],
                ['city' => 'Aydın', 'state' => 'Efeler', 'district' => 'Söke', 'address' => 'Yeniköy Mah.', 'zip_code' => '09000'],
                ['city' => 'Balıkesir', 'state' => 'Karesi', 'district' => 'Bandırma', 'address' => 'Gazi Cd.', 'zip_code' => '10000'],
                ['city' => 'Bilecik', 'state' => 'Merkez', 'district' => 'İnönü', 'address' => 'Yeni Mah.', 'zip_code' => '11000'],
                ['city' => 'Bingöl', 'state' => 'Merkez', 'district' => 'Genç', 'address' => 'Atatürk Cd.', 'zip_code' => '12000'],
                ['city' => 'Bitlis', 'state' => 'Merkez', 'district' => 'Tatvan', 'address' => 'Huzur Mah.', 'zip_code' => '13000'],
                ['city' => 'Bolu', 'state' => 'Merkez', 'district' => 'Gerede', 'address' => 'Yeni Mah.', 'zip_code' => '14000'],
                ['city' => 'Burdur', 'state' => 'Merkez', 'district' => 'Tefenni', 'address' => 'Cumhuriyet Mah.', 'zip_code' => '15000'],
                ['city' => 'Bursa', 'state' => 'Osmangazi', 'district' => 'Nilüfer', 'address' => 'Merkez Mah.', 'zip_code' => '16000'],
                ['city' => 'Çanakkale', 'state' => 'Merkez', 'district' => 'Ayvacık', 'address' => 'Köy Mah.', 'zip_code' => '17000'],
                ['city' => 'Çankırı', 'state' => 'Merkez', 'district' => 'Kurşunlu', 'address' => 'Köprübaşı Mah.', 'zip_code' => '18000'],
                ['city' => 'Çorum', 'state' => 'Merkez', 'district' => 'Osmancık', 'address' => 'Hoca Mah.', 'zip_code' => '19000'],
                ['city' => 'Denizli', 'state' => 'Merkez', 'district' => 'Pamukkale', 'address' => 'Beylikdüzü Mah.', 'zip_code' => '20000'],
                ['city' => 'Diyarbakır', 'state' => 'Merkez', 'district' => 'Kayapınar', 'address' => 'Bağlar Mah.', 'zip_code' => '21000'],
                ['city' => 'Edirne', 'state' => 'Merkez', 'district' => 'Lalapaşa', 'address' => 'Atatürk Cd.', 'zip_code' => '22000'],
                ['city' => 'Elazığ', 'state' => 'Merkez', 'district' => 'Sivrice', 'address' => 'Yeni Mah.', 'zip_code' => '23000'],
                ['city' => 'Erzincan', 'state' => 'Merkez', 'district' => 'İliç', 'address' => 'Güzeltepe Mah.', 'zip_code' => '24000'],
                ['city' => 'Erzurum', 'state' => 'Yakutiye', 'district' => 'Palandöken', 'address' => 'Cumhuriyet Mah.', 'zip_code' => '25000'],
                ['city' => 'Eskişehir', 'state' => 'Odunpazarı', 'district' => 'Tepebaşı', 'address' => 'Güzelbahçe Mah.', 'zip_code' => '26000'],
                ['city' => 'Gaziantep', 'state' => 'Şahinbey', 'district' => 'Şehitkamil', 'address' => 'Hacıhüseyin Mah.', 'zip_code' => '27000'],
                ['city' => 'Giresun', 'state' => 'Merkez', 'district' => 'Alucra', 'address' => 'Yeni Mah.', 'zip_code' => '28000'],
                ['city' => 'Gümüşhane', 'state' => 'Merkez', 'district' => 'Torul', 'address' => 'Gazi Mah.', 'zip_code' => '29000'],
                ['city' => 'Hakkari', 'state' => 'Merkez', 'district' => 'Şemdinli', 'address' => 'İçeri Mah.', 'zip_code' => '30000'],
                ['city' => 'Hatay', 'state' => 'Antakya', 'district' => 'İskenderun', 'address' => 'Deniz Mah.', 'zip_code' => '31000'],
                ['city' => 'Isparta', 'state' => 'Merkez', 'district' => 'Gelendost', 'address' => 'Beyazıt Mah.', 'zip_code' => '32000'],
                ['city' => 'Mersin', 'state' => 'Yenişehir', 'district' => 'Akdeniz', 'address' => 'Güney Mah.', 'zip_code' => '33000'],
                ['city' => 'İstanbul', 'state' => 'Beyoğlu', 'district' => 'Kadıköy', 'address' => 'Bağdat Cd.', 'zip_code' => '34000'],
                ['city' => 'İzmir', 'state' => 'Konak', 'district' => 'Karşıyaka', 'address' => 'Cumhuriyet Mah.', 'zip_code' => '35000'],
                ['city' => 'Kars', 'state' => 'Merkez', 'district' => 'Kağızman', 'address' => 'Zeytinlik Mah.', 'zip_code' => '36000'],
                ['city' => 'Kastamonu', 'state' => 'Merkez', 'district' => 'Araç', 'address' => 'Cumhuriyet Mah.', 'zip_code' => '37000'],
                ['city' => 'Kayseri', 'state' => 'Melikgazi', 'district' => 'Kocasinan', 'address' => 'Çiftlik Mah.', 'zip_code' => '38000'],
                ['city' => 'Kırklareli', 'state' => 'Merkez', 'district' => 'Vize', 'address' => 'Akıncılar Mah.', 'zip_code' => '39000'],
                ['city' => 'Kırşehir', 'state' => 'Merkez', 'district' => 'Mucur', 'address' => 'Yenikent Mah.', 'zip_code' => '40000'],
                ['city' => 'Kocaeli', 'state' => 'İzmit', 'district' => 'Başiskele', 'address' => 'Yeni Mah.', 'zip_code' => '41000'],
                ['city' => 'Konya', 'state' => 'Meram', 'district' => 'Selçuklu', 'address' => 'Vatan Cd.', 'zip_code' => '42000'],
                ['city' => 'Kütahya', 'state' => 'Merkez', 'district' => 'Simav', 'address' => 'İsmet Paşa Cd.', 'zip_code' => '43000'],
                ['city' => 'Malatya', 'state' => 'Battalgazi', 'district' => 'Yeşilyurt', 'address' => 'Huzur Mah.', 'zip_code' => '44000'],
                ['city' => 'Manisa', 'state' => 'Şehzadeler', 'district' => 'Salihli', 'address' => 'Yeni Mah.', 'zip_code' => '45000'],
                ['city' => 'Kahramanmaraş', 'state' => 'Merkez', 'district' => 'Dulkadiroğlu', 'address' => 'Yenidoğan Mah.', 'zip_code' => '46000'],
                ['city' => 'Mardin', 'state' => 'Merkez', 'district' => 'Kızıltepe', 'address' => 'Cumhuriyet Mah.', 'zip_code' => '47000'],
                ['city' => 'Muğla', 'state' => 'Menteşe', 'district' => 'Fethiye', 'address' => 'Fethiye Cad.', 'zip_code' => '48000'],
                ['city' => 'Muş', 'state' => 'Merkez', 'district' => 'Bulanık', 'address' => 'Bağlar Mah.', 'zip_code' => '49000'],
                ['city' => 'Nevşehir', 'state' => 'Merkez', 'district' => 'Avanos', 'address' => 'Hacıbektaş Mah.', 'zip_code' => '50000'],
                ['city' => 'Niğde', 'state' => 'Merkez', 'district' => 'Ulukışla', 'address' => 'Cumhuriyet Mah.', 'zip_code' => '51000'],
                ['city' => 'Ordu', 'state' => 'Merkez', 'district' => 'Fatsa', 'address' => 'Atatürk Cd.', 'zip_code' => '52000'],
                ['city' => 'Rize', 'state' => 'Merkez', 'district' => 'Çayeli', 'address' => 'Yüksekova Mah.', 'zip_code' => '53000'],
                ['city' => 'Sakarya', 'state' => 'Serdivan', 'district' => 'Adapazarı', 'address' => 'Sakarya Cd.', 'zip_code' => '54000'],
                ['city' => 'Samsun', 'state' => 'İlkadım', 'district' => 'Atakum', 'address' => 'Deniz Mah.', 'zip_code' => '55000'],
                ['city' => 'Siirt', 'state' => 'Merkez', 'district' => 'Pervari', 'address' => 'Yenimahalle', 'zip_code' => '56000'],
                ['city' => 'Sinop', 'state' => 'Merkez', 'district' => 'Gerze', 'address' => 'Çarşı Mah.', 'zip_code' => '57000'],
                ['city' => 'Sivas', 'state' => 'Merkez', 'district' => 'Zara', 'address' => 'Bahçelievler Mah.', 'zip_code' => '58000'],
                ['city' => 'Tekirdağ', 'state' => 'Süleymanpaşa', 'district' => 'Malkara', 'address' => 'Davutpaşa Mah.', 'zip_code' => '59000'],
                ['city' => 'Tokat', 'state' => 'Merkez', 'district' => 'Niksar', 'address' => 'Cumhuriyet Mah.', 'zip_code' => '60000'],
                ['city' => 'Trabzon', 'state' => 'Merkez', 'district' => 'Ortahisar', 'address' => 'Gündoğdu Mah.', 'zip_code' => '61000'],
                ['city' => 'Tunceli', 'state' => 'Merkez', 'district' => 'Pülümür', 'address' => 'Yeni Mah.', 'zip_code' => '62000'],
                ['city' => 'Şanlıurfa', 'state' => 'Merkez', 'district' => 'Birecik', 'address' => 'Cengiz Topel Mah.', 'zip_code' => '63000'],
                ['city' => 'Uşak', 'state' => 'Merkez', 'district' => 'Banaz', 'address' => 'Zafer Mah.', 'zip_code' => '64000'],
                ['city' => 'Van', 'state' => 'İpekyolu', 'district' => 'Edremit', 'address' => 'Şabaniye Mah.', 'zip_code' => '65000'],
                ['city' => 'Yozgat', 'state' => 'Merkez', 'district' => 'Sarıkaya', 'address' => 'İnönü Mah.', 'zip_code' => '66000'],
                ['city' => 'Zonguldak', 'state' => 'Merkez', 'district' => 'Çaycuma', 'address' => 'Kışla Mah.', 'zip_code' => '67000'],
                ['city' => 'Aksaray', 'state' => 'Merkez', 'district' => 'Güzelyurt', 'address' => 'Atatürk Bulvarı', 'zip_code' => '68000'],
                ['city' => 'Bayburt', 'state' => 'Merkez', 'district' => 'Demirtaş', 'address' => 'Çarşı Mah.', 'zip_code' => '69000'],
                ['city' => 'Karaman', 'state' => 'Merkez', 'district' => 'Ermenek', 'address' => 'Köy Mah.', 'zip_code' => '70000'],
                ['city' => 'Kırıkkale', 'state' => 'Merkez', 'district' => 'Keskin', 'address' => 'Yeni Mah.', 'zip_code' => '71000'],
                ['city' => 'Batman', 'state' => 'Merkez', 'district' => 'Hasankeyf', 'address' => 'Şehir Mah.', 'zip_code' => '72000'],
                ['city' => 'Şırnak', 'state' => 'Merkez', 'district' => 'Cizre', 'address' => 'Çalışkan Mah.', 'zip_code' => '73000'],
                ['city' => 'Bartın', 'state' => 'Merkez', 'district' => 'Kurucaşile', 'address' => 'Yazı Mah.', 'zip_code' => '74000'],
                ['city' => 'Ardahan', 'state' => 'Merkez', 'district' => 'Posof', 'address' => 'Hüseyin Mah.', 'zip_code' => '75000'],
                ['city' => 'Iğdır', 'state' => 'Merkez', 'district' => 'Tuzluca', 'address' => 'Saray Mah.', 'zip_code' => '76000'],
                ['city' => 'Yalova', 'state' => 'Merkez', 'district' => 'Altınova', 'address' => 'Deniz Mah.', 'zip_code' => '77000'],
                ['city' => 'Karabük', 'state' => 'Merkez', 'district' => 'Eflani', 'address' => 'Orta Mah.', 'zip_code' => '78000'],
                ['city' => 'Kilis', 'state' => 'Merkez', 'district' => 'Polateli', 'address' => 'Bağlar Mah.', 'zip_code' => '79000'],
                ['city' => 'Osmaniye', 'state' => 'Merkez', 'district' => 'Kadirli', 'address' => 'Turan Mah.', 'zip_code' => '80000'],
                ['city' => 'Düzce', 'state' => 'Merkez', 'district' => 'Akçakoca', 'address' => 'Çavuş Mah.', 'zip_code' => '81000'],
            ];

            foreach ($cities as $city) {
                Cities::create($city);
            }

            DB::table('_settings')->insert([
                'key' => 'cities_seed_completed',
                'value' => 'true',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    public function UserInformation($user)
    {
        $randomCity = DB::table('cities')->inRandomOrder()->first();

        UserInformation::create([
            'user_id' => $user->id,
            'phone' => fake()->numerify('5## ### ## ##'),
            'country' => 'Türkiye',
            'city' => $randomCity->city,
            'state' => $randomCity->state,
            'district' => $randomCity->district,
            'address' => $randomCity->address,
            'zip_code' => $randomCity->zip_code,
        ]);
    }


}