<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisaDocument;

class VisaDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'country_id' => 70,
                'text' => '<div class="col-xs-12"><h3>Processing Requirements</h3><ol><li>Paspor dengan masa berlaku min. 9 bln ( fotocopy paspor hal 1-3 &amp; 48 ) + paspor lama</li><li>Pas foto berwarna <strong>terbaru</strong> 3,5cm x 4,5cm = 2 lembar (wajah <strong>80%</strong> &amp; background hrs <strong>putih</strong>)</li><li>Surat Sponsor ( In English ) dr Perusahaan / kedua orang tua</li><li>Surat Ijin Suami (jika tidak ikut bepergian, serta lampirkan copy KTP Suami)</li><li>Print Out Tiket</li><li>Konfirmasi Hotel selama perjalanan ke Eropa (harus diatas KOP SURAT Hotel dan di tanda tangan pihak hotel)</li><li>Surat Referensi Bank</li><li>Fotocopy Bukti Keuangan min. 3 bln terakhir (Rekening Koran / Tabungan)</li><li>Travel Insurance (masa pertanggungan min. EURO 30.000 atau USD 50.000)</li><li>Fotocopy Akte Nikah dan KK</li><li>Fotocopy Surat Ganti Nama</li><li>Fotocopy Akte Lahir</li><li>Fotocopy Kartu Pelajar / Surat Keterangan Sekolah</li><li>Fotocopy SIUP</li><li>Fotocopy KTP</li><li>Surat Undangan dari Perusahaan di Jerman (untuk tujuan bisnis)</li><li>Surat undangan yg dilegalisir oleh walikota setempat di Jerman (apabila tinggal di tempat teman / saudara)</li></ol><h3>Notes</h3></div>'
            ],
            [
                'country_id' => 2,
                'text' => '<div class="col-xs-12"><h3>Processing Requirements</h3><p>Untuk ke Rep.Albania, Visa diperlukan bagi WNI. Berhubung belum adanya perwakilan/konsulat Albania di Indonesia, visa bisa diapply di perwakilan Rep.Albania terdekat dengan Indonesia, dalam hal ini di Malaysia. Syarat visa:&nbsp;<br>1. Surat undangan resmi dari pihak yg mengundang anda ke Albania&nbsp;<br>2. Passport yg msh valid setidaknya 6 bulan&nbsp;<br>3. 2 pas foto (ukuran utk pasport)&nbsp;<br>4. Isian form aplikasi (bisa di download di website )&nbsp;<br>5. Visa fee utk Indonesia: 33 Euro&nbsp;<br>6. Kopi pasport&nbsp;<br>7. Contact e-mail address/ telephone&nbsp;<br><br>Saran Kami&nbsp;kirim saja email terlebih dahulu ke pihak kedutaan Albania di Malaysia agar bisa memperoleh informasi persyaratan yg lebih jelas.&nbsp;</p><h3>Notes</h3><p>Sementara untuk Macedonia, begitu juga. Perlu urus visa terlebih dahulu (ke Macedonia bisa dgn Schengen visa), jd bila punya visa schengen (multiple entry) yg kamu peroleh dr kedutaan besar Belanda atau Belgia misalnya (apply schengen visa multiple entry di salah satu negara EU yg perwakilannya ada di Indonesia) , kamu bisa juga ke Macedonia. Info visa Macedonia lebih lanjut bisa dilihat dalam website kementrian luar negeri Macedonia di http://www.mfa.gov.mk.&nbsp;&nbsp;</p></div>'
            ]
        ];
        foreach ($data as $key ) {
            VisaDocument::create($key);
        }
    }
}
