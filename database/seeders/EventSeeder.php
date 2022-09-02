<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'Kumbh Mela Haridwar',
            'slug' => 'kumbh-mela-haridwar-2',
            'country' => 'India',
            'thumbnail_desc' => 'Here is a man with great respect for wood and handcrafted sculptures that tell a story and testify to the richness of one of our most precious resources. His website is light, easy to read, and filled with inspiring quotes and photos of his labors of love. Here is a man with great respect for wood and handcrafted sculptures that tell a story and testify to the richness of one of our most precious resources. His website is light, easy to read, and filled with inspiring quotes and photos of his labors of love.',
            'header_img_url' => "public/Event/header_img_1.jpg",
            'description' => 'Here is a man with great respect for wood and handcrafted sculptures that tell a story and testify to the richness of one of our most precious resources. His website is light, easy to read, and filled with inspiring quotes and photos of his labors of love. Here is a man with great respect for wood and handcrafted sculptures that tell a story and testify to the richness of one of our most precious resources. His website is light, easy to read, and filled with inspiring quotes and photos of his labors of love.',
            'tags' => '1',
            'created_at' => '2021-01-14',
        ]);
        Event::create([
            'name' => 'Kumbh Mela Haridwar',
            'slug' => 'kumbh-mela-haridwar-1',
            'country' => 'India',
            'thumbnail_desc' => 'Dikisahkan dalam perebutan Tirta Kamandalu oleh para Dewa dan Raksasa yang mengakibatkan terjatuhnya nehtar di empat tempat dan di tempat itulah kemudian dilaksanakan Kumbh Mela setiap 12 tahun sekali. adapun tempat dimaksud adalah Haridwar, Nasik, Ujain dan Allahabad. Pada saat acara kumbh mela ini Anda akan melihat dari dekat ribuan pertapa yang dikenal dengan nagababa (pertapa tanpa busana) yang melakukan ritual mandi suci dan dikesempatan ini biasanya dihadiri oleh Jutaan umat manusia dari seluruh penjuru dunia dengan tujuan dapat melakukan ritual pembebasan diri dari segala mala dan papa dengan cara mandi suci di sungai suci dimana ritual Kumbh mela dilaksanakan.',
            'header_img_url' => "public/Event/header_img_2.jpg",
            'description' => 'Dikisahkan dalam perebutan Tirta Kamandalu oleh para Dewa dan Raksasa yang mengakibatkan terjatuhnya nehtar di empat tempat dan di tempat itulah kemudian dilaksanakan Kumbh Mela setiap 12 tahun sekali. adapun tempat dimaksud adalah Haridwar, Nasik, Ujain dan Allahabad. Pada saat acara kumbh mela ini Anda akan melihat dari dekat ribuan pertapa yang dikenal dengan nagababa (pertapa tanpa busana) yang melakukan ritual mandi suci dan dikesempatan ini biasanya dihadiri oleh Jutaan umat manusia dari seluruh penjuru dunia dengan tujuan dapat melakukan ritual pembebasan diri dari segala mala dan papa dengan cara mandi suci di sungai suci dimana ritual Kumbh mela dilaksanakan.',
            'tags' => '2',
            'created_at' => '2021-01-14',
        ]);
        Event::create([
            'name' => 'Kumbh Mela Haridwar',
            'slug' => 'kumbh-mela-haridwar',
            'country' => 'India',
            'thumbnail_desc' => 'Festival di situs suci India, yang disebut "Mela" adalah bagian penting dari tradisi ziarah Hindu. Merayakan peristiwa mitologis dalam kehidupan dewa atau periode astrologi yang menguntungkan, mela menarik banyak peziarah dari seluruh dunia. Yang terbesar adalah festival tepi sungai yang diadakan empat kali setiap dua belas tahun, berputar antara Allahabad di pertemuan sungai Gangga, Yamuna dan Saraswati; Nasik di Sungai Godavari; Ujjain di Sungai Shipra dan Haridwar di Sungai Gangga. Mandi di sungai-sungai ini selama Kumbha Mela dianggap sebagai upaya pahala yang besar, membersihkan tubuh dan jiwa. Festival Allahabad dan Haridwar secara rutin dihadiri oleh lima juta atau lebih peziarah (13 juta mengunjungi Allahabad pada tahun 1977, 18 juta pada tahun 1989, dan hampir 24 juta pada tahun 2001) sehingga Kumbha Mela adalah pertemuan keagamaan terbesar dan tertua di dunia.',
            'header_img_url' => "public/Event/header_img_3.jpg",
            'description' => 'Festival di situs suci India, yang disebut "Mela" adalah bagian penting dari tradisi ziarah Hindu. Merayakan peristiwa mitologis dalam kehidupan dewa atau periode astrologi yang menguntungkan, mela menarik banyak peziarah dari seluruh dunia. Yang terbesar adalah festival tepi sungai yang diadakan empat kali setiap dua belas tahun, berputar antara Allahabad di pertemuan sungai Gangga, Yamuna dan Saraswati; Nasik di Sungai Godavari; Ujjain di Sungai Shipra dan Haridwar di Sungai Gangga. Mandi di sungai-sungai ini selama Kumbha Mela dianggap sebagai upaya pahala yang besar, membersihkan tubuh dan jiwa. Festival Allahabad dan Haridwar secara rutin dihadiri oleh lima juta atau lebih peziarah (13 juta mengunjungi Allahabad pada tahun 1977, 18 juta pada tahun 1989, dan hampir 24 juta pada tahun 2001) sehingga Kumbha Mela adalah pertemuan keagamaan terbesar dan tertua di dunia.',
            'tags' => '1,2',
            'created_at' => '2021-03-01',
        ]);
    }
}
