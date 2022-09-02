<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question' => 'Siapa Itu Lila Travel ?',
            'answer' => 'Didirikan sejak 1997 oleh Subawa, I Made Gede, seorang professional muda asal Bali yang telah berpengalaman dalam berbagai bidang yang berhubungan dengan dunia kepariwisataan. Sebagai salah satu Travel Agent di Bali yang melayani berbagai jenis perjalanan Seperti Tirtayatra India, Tirtayatra Dalam Negeri, Tour Luar Negeri, Tour Dalam Negeri, Penjualan Ticket Pesawat, Reservasi Hotel, dan Pembuatan Travel Document (Passport, Visa dan Travel Insurance). Seiring dengan kemajuan teknologi, kini Lila Travel Hadir dan bisa di akses oleh semua kalangan dimana saja dan kapan saja di www.lila.co.id'
        ]);
        Faq::create([
            'question' => 'Product Apa Saja Yang Bisa Kamu Beli Di Lila Travel? ?',
            'answer' => 'Sebagai Agent dan Biro Perjalanan Wisata, Adapun produk yang bisa kamu beli di sini antara lain paket wisata dalam maupun luar negeri lengkap dengan detail perjalanan, paket wisata rohani (Tirtayatra Dalam negeri & Tirtayatra Luar Negeri). Kamu juga bisa membeli Tiket Pesawat & Hotel (Domestik & Internasional), MICE, Ticket Attraction, Sight Seeing Tour, Team Building, Pelayanan Jasa Pembuatan Visa & Passport, dan Pemberlian Asuransi Perjalanan.'
        ]);
    }
}
