<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyNewsSeeder extends Seeder
{
    public function run(): void
    {
        // Create users
        $admin = User::firstOrCreate(
            ['email' => 'admin@eepis.ac.id'],
            ['name' => 'Admin EEPIS', 'password' => bcrypt('password'), 'role' => 'admin']
        );

        $penulis1 = User::firstOrCreate(
            ['email' => 'redaksi@eepis.ac.id'],
            ['name' => 'Redaksi EEPIS', 'password' => bcrypt('password'), 'role' => 'penulis']
        );

        $penulis2 = User::firstOrCreate(
            ['email' => 'humas@eepis.ac.id'],
            ['name' => 'Humas PENS', 'password' => bcrypt('password'), 'role' => 'penulis']
        );

        // Create categories
        $categories = [];
        foreach ([
            'Akademik', 'Non-Akademik', 'Prestasi', 'Unik', 'Pengumuman'
        ] as $name) {
            $categories[$name] = Category::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }

        $users = [$admin, $penulis1, $penulis2];

        // News articles
        $articles = [
            [
                'category' => 'Akademik',
                'title' => 'PENS Raih Peringkat 1 Politeknik Terbaik Indonesia Versi Webometrics 2026',
                'content' => '<p>Politeknik Elektronika Negeri Surabaya (PENS) kembali mengukir sejarah di kancah pendidikan nasional. Dalam rilis terbaru lembaga pemeringkatan internasional Webometrics edisi Juli 2026, PENS berhasil mempertahankan posisinya sebagai politeknik terbaik nomor satu di Indonesia.</p><p>Prestasi ini bukan sekadar angka, melainkan refleksi dari dedikasi seluruh sivitas akademika dalam meningkatkan kualitas riset, publikasi ilmiah, dan keterbukaan informasi digital. Webometrics menggunakan empat indikator utama: <strong>Presence</strong>, <strong>Visibility</strong>, <strong>Transparency</strong>, dan <strong>Excellence</strong>.</p><h2>Inovasi dan Kolaborasi Global</h2><p>Salah satu faktor pendukung kuat adalah implementasi kurikulum berbasis proyek <em>(Project-Based Learning)</em> yang mewajibkan mahasiswa untuk menghasilkan produk nyata yang bermanfaat bagi masyarakat.</p><p>Selain itu, PENS juga terus memperluas jaringan kerjasama dengan industri global. Beberapa waktu lalu, PENS meresmikan laboratorium 5G pertama di tingkat politeknik bekerjasama dengan perusahaan teknologi terkemuka dari Jepang dan Korea Selatan.</p>',
            ],
            [
                'category' => 'Prestasi',
                'title' => 'Tim Robotika PENS Juara 1 Kompetisi Robot Indonesia 2026',
                'content' => '<p>Tim robotika PENS berhasil meraih juara pertama dalam Kompetisi Robot Indonesia (KRI) 2026 yang diselenggarakan di Jakarta Convention Center. Tim yang terdiri dari 5 mahasiswa ini berhasil mengalahkan 120 tim dari berbagai perguruan tinggi di Indonesia.</p><p>Robot yang mereka kembangkan, bernama <strong>PENS-BOT X3</strong>, mampu menyelesaikan misi penyelamatan korban bencana dengan tingkat akurasi 98.7%. Robot ini dilengkapi dengan sensor LiDAR, kamera thermal, dan sistem navigasi otonom berbasis AI.</p><h2>Persiapan Menuju Kompetisi Internasional</h2><p>Setelah meraih juara nasional, tim robotika PENS kini mempersiapkan diri untuk mengikuti kompetisi robotika internasional RoboCup 2026 yang akan diselenggarakan di Eindhoven, Belanda.</p>',
            ],
            [
                'category' => 'Akademik',
                'title' => 'Kurikulum Baru 2026: PENS Integrasikan AI dan Machine Learning di Seluruh Prodi',
                'content' => '<p>Mulai semester ganjil 2026/2027, PENS resmi mengintegrasikan mata kuliah Artificial Intelligence dan Machine Learning ke seluruh program studi. Langkah inovatif ini merupakan respons terhadap kebutuhan industri yang semakin mengandalkan teknologi kecerdasan buatan.</p><p>Direktur PENS menjelaskan bahwa kurikulum baru ini dirancang bersama lebih dari 20 perusahaan teknologi terkemuka, termasuk Google, Microsoft, dan Telkom Indonesia.</p><h2>Laboratorium AI Baru</h2><p>Untuk mendukung kurikulum baru, PENS juga meresmikan Laboratorium AI Center yang dilengkapi dengan GPU cluster untuk pelatihan model deep learning dan fasilitas computing terdepan.</p>',
            ],
            [
                'category' => 'Non-Akademik',
                'title' => 'PENS Tech Festival 2026: 50+ Startup dan 200 Inovasi Mahasiswa',
                'content' => '<p>Festival teknologi tahunan PENS kembali digelar dengan skala lebih besar dari tahun-tahun sebelumnya. PENS Tech Festival 2026 menghadirkan lebih dari 50 startup teknologi dan menampilkan 200 inovasi terbaru dari mahasiswa.</p><p>Acara ini berlangsung selama 3 hari di area kampus PENS dan terbuka untuk umum. Highlight acara termasuk hackathon 24 jam, workshop IoT, demo produk startup, dan career fair dengan lebih dari 30 perusahaan teknologi.</p><p>Menteri Pendidikan yang hadir sebagai keynote speaker memberikan apresiasi tinggi terhadap kreativitas mahasiswa PENS dalam mengembangkan solusi teknologi untuk permasalahan nyata di masyarakat.</p>',
            ],
            [
                'category' => 'Prestasi',
                'title' => 'Delegasi PENS Sabet 3 Medali Emas di ASEAN Engineering Olympics',
                'content' => '<p>Tiga tim mahasiswa PENS meraih medali emas pada kompetisi teknik bergengsi tingkat Asia Tenggara, ASEAN Engineering Olympics 2026, yang diselenggarakan di Singapura pada 15-18 April 2026.</p><p>Medali emas diraih di kategori Embedded Systems, IoT Innovation, dan Renewable Energy. Tim PENS bersaing dengan lebih dari 200 tim dari 10 negara ASEAN.</p><h2>Kunci Keberhasilan</h2><p>Pembimbing tim menjelaskan bahwa kunci keberhasilan terletak pada pendekatan problem-solving yang diajarkan sejak semester awal, serta budaya kolaborasi yang kuat antar mahasiswa lintas program studi.</p>',
            ],
            [
                'category' => 'Akademik',
                'title' => 'Pendaftaran Mahasiswa Baru Jalur Mandiri 2026/2027 Resmi Dibuka',
                'content' => '<p>PENS membuka jalur penerimaan mahasiswa baru jalur mandiri untuk tahun ajaran 2026/2027 dengan kuota 500 mahasiswa baru di berbagai program studi. Pendaftaran dibuka mulai 1 Mei hingga 30 Juni 2026.</p><p>Program studi yang tersedia meliputi Teknik Elektronika, Teknik Informatika, Teknik Telekomunikasi, Teknik Komputer, dan program studi baru Teknik Kecerdasan Buatan yang akan dimulai tahun ini.</p><h2>Beasiswa</h2><p>PENS juga menyediakan berbagai program beasiswa bagi calon mahasiswa berprestasi, termasuk beasiswa penuh yang mencakup biaya kuliah, tempat tinggal, dan uang saku bulanan.</p>',
            ],
            [
                'category' => 'Non-Akademik',
                'title' => 'Wisuda Periode April 2026: 1.200 Lulusan Siap Berkontribusi untuk Bangsa',
                'content' => '<p>Prosesi wisuda PENS periode April 2026 berlangsung khidmat di Gedung Serbaguna kampus dengan meluluskan 1.200 wisudawan dari berbagai program studi diploma dan sarjana terapan.</p><p>Data dari Career Development Center PENS menunjukkan bahwa 89% lulusan sudah mendapatkan pekerjaan sebelum wisuda. Rata-rata gaji pertama lulusan PENS mencapai Rp 7.5 juta per bulan, tertinggi di antara politeknik se-Indonesia.</p><p>Direktur PENS dalam sambutannya menekankan pentingnya lifelong learning dan kemampuan beradaptasi di era yang terus berubah.</p>',
            ],
            [
                'category' => 'Prestasi',
                'title' => 'Dosen PENS Raih Hibah Penelitian Internasional Senilai Rp 2.5 Miliar',
                'content' => '<p>Dr. Budi Setiawan, dosen program studi Teknik Informatika PENS, berhasil meraih hibah penelitian dari ASEAN Research Fund senilai Rp 2.5 miliar untuk proyek Smart City berbasis IoT dan AI.</p><p>Proyek ini merupakan kolaborasi antara PENS dengan National University of Singapore (NUS) dan Chulalongkorn University, Thailand. Penelitian akan berfokus pada pengembangan sistem monitoring kualitas udara dan lalu lintas perkotaan menggunakan jaringan sensor cerdas.</p><p>Hasil penelitian diharapkan dapat diimplementasikan di kota Surabaya sebagai pilot project pada tahun 2027.</p>',
            ],
            [
                'category' => 'Unik',
                'title' => 'Mahasiswa PENS Ciptakan Robot Pelayan Kantin yang Viral di Media Sosial',
                'content' => '<p>Sebuah video yang menampilkan robot pelayan di kantin PENS menjadi viral di media sosial dengan lebih dari 5 juta views di TikTok dan Instagram. Robot bernama "KantinBot" ini dikembangkan oleh tim mahasiswa semester 6 sebagai proyek akhir mata kuliah Robotika.</p><p>KantinBot mampu menerima pesanan melalui aplikasi mobile, mengantarkan makanan ke meja pelanggan, dan bahkan memberikan rekomendasi menu berdasarkan preferensi pengguna menggunakan algoritma machine learning.</p><h2>Rencana Pengembangan</h2><p>Melihat antusiasme publik, tim pengembang berencana untuk memproduksi KantinBot secara komersial dan telah mendapatkan pendanaan awal dari sebuah angel investor lokal.</p>',
            ],
            [
                'category' => 'Pengumuman',
                'title' => 'Jadwal UTS Semester Genap 2025/2026: Panduan Lengkap untuk Mahasiswa',
                'content' => '<p>Bagian Akademik PENS mengumumkan jadwal Ujian Tengah Semester (UTS) semester genap 2025/2026 yang akan dilaksanakan pada tanggal 12-23 Mei 2026. Berikut adalah panduan lengkap yang perlu diperhatikan mahasiswa.</p><h2>Ketentuan Umum</h2><p>Mahasiswa wajib membawa Kartu Tanda Mahasiswa (KTM) dan Kartu Ujian yang dapat diunduh melalui portal akademik. Ujian akan dilaksanakan secara hybrid: ujian teori dilakukan secara online melalui platform e-learning, sementara ujian praktikum dilakukan secara luring di laboratorium.</p><p>Mahasiswa yang berhalangan mengikuti ujian wajib mengajukan surat izin ke bagian akademik maksimal 3 hari sebelum jadwal ujian.</p>',
            ],
            [
                'category' => 'Akademik',
                'title' => 'Program Double Degree PENS-Kumamoto University Angkatan Ketiga Diluncurkan',
                'content' => '<p>Kerjasama akademik antara PENS dan Kumamoto University, Jepang, memasuki babak baru dengan peluncuran program double degree angkatan ketiga. Program ini memungkinkan mahasiswa untuk mendapatkan gelar dari kedua institusi dalam waktu 4 tahun.</p><p>Pada angkatan ketiga ini, kuota diperluas menjadi 20 mahasiswa dari sebelumnya hanya 10. Mahasiswa terpilih akan menghabiskan 2 tahun pertama di PENS dan 2 tahun berikutnya di Kumamoto University.</p><p>Seluruh biaya pendidikan di Jepang ditanggung oleh beasiswa JASSO (Japan Student Services Organization).</p>',
            ],
            [
                'category' => 'Unik',
                'title' => 'Dosen PENS Kembangkan Aplikasi Penerjemah Bahasa Isyarat Real-Time',
                'content' => '<p>Dr. Siti Rahma, dosen Teknik Komputer PENS, mengembangkan aplikasi mobile yang mampu menerjemahkan bahasa isyarat Indonesia (BISINDO) ke teks dan suara secara real-time menggunakan teknologi computer vision.</p><p>Aplikasi bernama "IsyaratKu" ini menggunakan kamera smartphone untuk mendeteksi gerakan tangan dan menerjemahkannya dengan akurasi mencapai 95%. Aplikasi ini sudah tersedia secara gratis di Google Play Store.</p><p>Pengembangan aplikasi ini mendapat dukungan dari Kementerian Sosial dan beberapa organisasi disabilitas nasional.</p>',
            ],
            [
                'category' => 'Non-Akademik',
                'title' => 'Alumni PENS di Silicon Valley: Kisah Sukses Anak Bangsa di Perusahaan Top Dunia',
                'content' => '<p>Tidak kurang dari 15 alumni PENS saat ini bekerja di perusahaan-perusahaan teknologi terkemuka di Silicon Valley, termasuk Google, Apple, Meta, dan Tesla. Artikel ini mengulas perjalanan karier mereka dari kampus di Surabaya hingga lembah silikon.</p><p>Salah satunya adalah Ahmad Rizky, lulusan Teknik Informatika angkatan 2015, yang kini menjabat sebagai Senior Machine Learning Engineer di Google Brain. "PENS memberikan fondasi teknis yang sangat kuat, terutama dalam hal pemrograman dan problem-solving," ujarnya.</p><p>Alumni-alumni ini juga aktif memberikan mentoring kepada mahasiswa PENS melalui program PENS Global Alumni Network.</p>',
            ],
            [
                'category' => 'Pengumuman',
                'title' => 'Beasiswa KIP Kuliah 2026: Kuota 200 Mahasiswa, Segera Daftarkan Diri',
                'content' => '<p>PENS mengalokasikan kuota 200 mahasiswa untuk program Kartu Indonesia Pintar (KIP) Kuliah tahun 2026. Program ini menyasar calon mahasiswa dari keluarga kurang mampu yang memiliki potensi akademik tinggi.</p><h2>Persyaratan</h2><p>Calon penerima harus memenuhi kriteria ekonomi yang ditetapkan oleh Kemendikbudristek dan lolos seleksi akademik PENS. Beasiswa mencakup biaya pendidikan penuh, biaya hidup Rp 700.000/bulan, dan bantuan buku Rp 1.000.000/semester.</p><p>Pendaftaran dibuka melalui website kip-kuliah.kemdikbud.go.id mulai 1 Mei 2026.</p>',
            ],
            [
                'category' => 'Prestasi',
                'title' => 'Mahasiswa PENS Raih Best Paper Award di Konferensi IEEE Asia Pacific',
                'content' => '<p>Paper penelitian berjudul "Edge Computing-Based Real-Time Traffic Monitoring System" karya tim mahasiswa PENS meraih Best Paper Award pada konferensi IEEE Asia Pacific Conference on Communications (APCC) 2026 di Seoul, Korea Selatan.</p><p>Penelitian ini mengusulkan arsitektur edge computing yang mampu memproses data lalu lintas dari kamera CCTV secara real-time tanpa perlu mengirim data ke cloud server, sehingga menghemat bandwidth dan mengurangi latency hingga 80%.</p><p>Tim peneliti mendapatkan undangan untuk mempresentasikan hasil riset mereka di IEEE Global Communications Conference (GLOBECOM) 2026 di Washington DC.</p>',
            ],
        ];

        foreach ($articles as $i => $article) {
            Post::firstOrCreate(
                ['slug' => Str::slug($article['title'])],
                [
                    'user_id' => $users[array_rand($users)]->id,
                    'category_id' => $categories[$article['category']]->id,
                    'title' => $article['title'],
                    'content' => $article['content'],
                    'created_at' => now()->subDays(count($articles) - $i)->addHours(rand(8, 20)),
                    'updated_at' => now()->subDays(count($articles) - $i)->addHours(rand(8, 20)),
                ]
            );
        }

        $this->command->info('✅ Seeded ' . count($articles) . ' articles across ' . count($categories) . ' categories');
    }
}
