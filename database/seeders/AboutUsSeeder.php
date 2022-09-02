<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'text' => '<h2>OUR STORY</h2><br/><p class="ql-align-justify">Didirikan sejak 1997 oleh Subawa, I Made Gede, seorang professional muda asal Bali yang telah berpengalaman dalam berbagai bidang yang berhubungan dengan dunia kepariwisataan, termasuk didalamnya sebagai executive di salah satu Hotel bertaraf Internasional seperti The Ritz-Carlton, Bali. Sebagai putra kelahiran Bali, beliau sangat bangga dengan kultur dan budaya Bali dan memiliki motivasi kuat untuk memajukan perkembangan Indonesia khususnya Bali sebagai sebuah destinasi terkenal di dunia.</p><br/><p class="ql-align-justify">Di tahun 1999, PT. Lila Buana Wisata mempersiapkan diri guna mengantisipasi pesatnya pertumbuhan dan permintaan pasar akan kebutuhan layanan yang professional dan oleh karenanya diupayakanlah agar menjadi Accredited Agent dari IATA (International Air Transport Association) dan dijadikan cikal-bakal sebuah divisi baru yaitu "Lila Travel" yang khusus melayani kebutuhan travel outbound mulai dari ticket issue hingga mengelola program-program komprehensive dari para klien setia pengguna jasa travel kami.</p><br/><p>Simply service!</p>',
            'img_url' => 'public/AboutUs/AboutUs_1.jpg'
        ]);
        AboutUs::create([
            'text' => '<h2>OUR MISSION</h2><br/><p class="ql-align-justify">Menjadi penyedia jasa wisata dan perjalanan terpercaya di Indonesia yang mengutamakan kualitas pelayanan dan dapat memberikan pengalaman yang tak terlupakan.</p>',
            'img_url' => 'public/AboutUs/AboutUs_2.jpg'
        ]);
    }
}
