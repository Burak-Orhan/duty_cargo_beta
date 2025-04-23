<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cities>
 */
class CitiesFactory extends Factory
{
    protected static $cityIndex = 0;

    public function definition(): array
    {
        $cities = [
            'Adana',
            'Adıyaman',
            'Afyonkarahisar',
            'Ağrı',
            'Amasya',
            'Ankara',
            'Antalya',
            'Artvin',
            'Aydın',
            'Balıkesir',
            'Bilecik',
            'Bingöl',
            'Bitlis',
            'Bolu',
            'Burdur',
            'Bursa',
            'Çanakkale',
            'Çankırı',
            'Çorum',
            'Denizli',
            'Diyarbakır',
            'Edirne',
            'Elazığ',
            'Erzincan',
            'Erzurum',
            'Eskişehir',
            'Gaziantep',
            'Giresun',
            'Gümüşhane',
            'Hakkari',
            'Hatay',
            'Isparta',
            'Mersin',
            'İstanbul',
            'İzmir',
            'Kars',
            'Kastamonu',
            'Kayseri',
            'Kırklareli',
            'Kırşehir',
            'Kocaeli',
            'Konya',
            'Kütahya',
            'Malatya',
            'Manisa',
            'Kahramanmaraş',
            'Mardin',
            'Muğla',
            'Muş',
            'Nevşehir',
            'Niğde',
            'Ordu',
            'Rize',
            'Sakarya',
            'Samsun',
            'Siirt',
            'Sinop',
            'Sivas',
            'Tekirdağ',
            'Tokat',
            'Trabzon',
            'Tunceli',
            'Şanlıurfa',
            'Uşak',
            'Van',
            'Yozgat',
            'Zonguldak',
            'Aksaray',
            'Bayburt',
            'Karaman',
            'Kırıkkale',
            'Batman',
            'Şırnak',
            'Bartın',
            'Ardahan',
            'Iğdır',
            'Yalova',
            'Karabük',
            'Kilis',
            'Osmaniye',
            'Düzce',
        ];

        $city = $cities[self::$cityIndex];
        self::$cityIndex = (self::$cityIndex + 1) % count($cities);

        return [
            'name' => $city,
        ];
    }
}
