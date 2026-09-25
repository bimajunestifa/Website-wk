<?php

namespace Database\Seeders;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::truncate();

        $articles = [
            [
                'slug' => 'smk-wikrama-1-garut-terima-kunjungan-studi-tiru-dari-min-17-kepulauan-seribu-jakarta',
                'title' => 'SMK Wikrama 1 Garut Terima Kunjungan Studi Tiru dari MIN 17 Kepulauan Seribu Jakarta',
                'excerpt' => 'SMK Wikrama 1 Garut kembali menunjukkan komitmennya sebagai Sekolah Pusat Keunggulan dengan menerima kunjungan studi tiru dari MIN 17 Kepulauan Seribu Jakarta.',
                'content' => '<p><strong>Garut, 9–10 Januari 2026</strong> — SMK Wikrama 1 Garut kembali menunjukkan komitmennya sebagai Sekolah Pusat Keunggulan dengan menerima kunjungan studi tiru dari MIN 17 Kepulauan Seribu Jakarta. Kegiatan ini berlangsung selama dua hari, yaitu pada Jumat dan Sabtu, 9–10 Januari 2026, bertempat di lingkungan kampus SMK Wikrama 1 Garut.</p>

<p>Kunjungan ini bertujuan untuk melakukan <em>benchmarking</em> terhadap praktik pengelolaan sekolah kejuruan unggulan, khususnya dalam aspek:</p>
<ul>
    <li>Pengembangan kurikulum berbasis karakter dan kepedulian lingkungan hidup.</li>
    <li>Strategi mencetak lulusan yang berakhlak mulia serta siap bersaing di era Global &amp; Industri 4.0.</li>
    <li>Implementasi program pembiasaan budaya sekolah ramah lingkungan (Sekolah Adiwiyata).</li>
</ul>

<p>Selama rangkaian kunjungan studi tiru berlangsung, para peserta mengikuti berbagai agenda kegiatan, antara lain:</p>
<ul>
    <li>Tur keliling sekolah untuk melihat langsung sarana prasarana, ruang praktik modern, dan lingkungan belajar di SMK Wikrama 1 Garut.</li>
    <li>Pemaparan program unggulan dan manajemen tata kelola sekolah oleh jajaran pimpinan SMK Wikrama.</li>
    <li>Sesi diskusi interaktif dan tanya jawab bersama guru, staf, serta perwakilan siswa mengenai praktik baik (<em>best practices</em>) di sekolah.</li>
</ul>

<p>Sebagai sekolah yang telah berstatus <strong>Sekolah Pusat Keunggulan (SMK PK)</strong>, SMK Wikrama 1 Garut dikenal luas atas konsistensinya dalam menumbuhkan budaya disiplin, akhlak terpuji, dan cinta lingkungan. Keberhasilan mencetak lulusan yang kompeten secara akademik maupun berkarakter kuat menjadi daya tarik tersendiri bagi berbagai institusi pendidikan untuk menjalin kemitraan dan studi banding.</p>

<h3>Rombongan Tamu Studi Tiru</h3>
<p>Rombongan tamu dari Kepulauan Seribu terdiri dari berbagai unsur penting, di antaranya:</p>
<ul>
    <li><strong>Ibu Riza Lestari Ningsih</strong> — Kepala Seksi Peran Serta Masyarakat dan Penegakan Hukum, Sudin Lingkungan Hidup Kepulauan Seribu.</li>
    <li><strong>Bapak Abdul Halim</strong> — Koordinator Kampus B MIN 17 Kepulauan Seribu.</li>
    <li><strong>Ibu Mahariah</strong> — Ketua Yayasan Rumah Literasi Hijau dan Bidang Kurikulum MIN 17 Kepulauan Seribu.</li>
    <li>Jajaran dewan guru dan tenaga kependidikan MIN 17, serta pegiat lingkungan dari berbagai lembaga mitra seperti SKB 36 dan SMA 69 Kepulauan Seribu.</li>
</ul>

<blockquote>
    "Pihak rombongan tamu menyampaikan apresiasi setinggi-tingginya atas sambutan hangat dan keterbukaan SMK Wikrama 1 Garut dalam berbagi ilmu dan wawasan tata kelola. Diharapkan sinergi dan silaturahmi ini terus berlanjut guna kemajuan pendidikan Indonesia."
</blockquote>

<p>Bagi calon peserta didik baru yang ingin bergabung dengan SMK Wikrama 1 Garut, pendaftaran <strong>Gelombang 2 Tahun Pelajaran 2026/2027</strong> telah resmi dibuka. Mari bergabung menjadi bagian dari keluarga besar Wikrama — sekolah vokasi terdepan yang siap mencetak generasi unggul, berakhlak, dan adaptif di era digital.</p>

<div class="article-cta-box">
    <h4>Informasi Pendaftaran Siswa Baru (PPDB / SPMB):</h4>
    <p>📲 <strong>Hotline WhatsApp:</strong> 0811-2232-880</p>
    <p>📍 <strong>Alamat Kampus:</strong> Jl. Otto Iskandardinata, Kp. Tanjung, Desa Pasawahan, Kec. Tarogong Kaler, Kab. Garut</p>
</div>',
                'category' => 'Berita',
                'image_url' => '/assets/images/IMG_5026-1-520x650.png',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2026-01-14 10:00:00'),
            ],
            [
                'slug' => 'lulusan-smk-wikrama-1-garut-siap-kerja-di-industri-perhotelan-dalam-dan-luar-negeri',
                'title' => 'Lulusan SMK Wikrama 1 Garut Siap Kerja di Industri Perhotelan Dalam dan Luar Negeri',
                'excerpt' => 'Kesiapan lulusan SMK Wikrama 1 Garut untuk terjun langsung ke dunia kerja di industri perhotelan didukung kolaborasi erat bersama praktisi industri profesional.',
                'content' => '<p><strong>Garut</strong> — Kesiapan lulusan SMK Wikrama 1 Garut untuk terjun langsung ke dunia kerja, khususnya di industri perhotelan dalam dan luar negeri, bukanlah suatu kebetulan. Salah satu kuncinya terletak pada kuatnya kolaborasi antara sekolah dengan pelaku industri profesional.</p>

<p>Hal tersebut tercermin nyata dalam kegiatan <strong>Guru Tamu Program Keahlian Perhotelan</strong> yang baru-baru ini diselenggarakan di kampus SMK Wikrama 1 Garut. Dalam kesempatan tersebut, sekolah menghadirkan praktisi berpengalaman, yaitu <strong>Bapak Miraz Ramadhan</strong>, selaku <em>Food &amp; Beverage Manager</em> di <strong>Mercure Garut City Center</strong>, untuk berbagi wawasan dan standar kerja perhotelan berbintang kepada para siswa.</p>

<h3>Belajar Langsung dari Praktisi Industri Berbintang</h3>
<p>Dalam sesi pembelajaran tersebut, Bapak Miraz Ramadhan menyampaikan materi komprehensif seputar:</p>
<ul>
    <li>Standar operasional dan etika pelayanan industri perhotelan internasional.</li>
    <li>Budaya kerja profesional, ketepatan waktu, dan integritas kerja.</li>
    <li>Keterampilan komunikasi dan keramahan (<em>hospitality mindset</em>) yang menjadi nilai jual utama seorang hotelier.</li>
</ul>
<p>Kehadiran praktisi industri memberikan gambaran nyata kepada siswa mengenai tuntutan dunia kerja sesungguhnya di hotel berbintang taraf internasional.</p>

<h3>Fasilitas Sekolah Sesuai Standar Industri</h3>
<p>Tidak hanya dari sisi materi kurikulum, fasilitas ruang praktik perhotelan di SMK Wikrama 1 Garut juga mendapat apresiasi tinggi. Laboratorium perhotelan dan peralatan praktik siswa dirancang menyerupai suasana hotel nyata, sehingga siswa terbiasa dengan ritme kerja profesional sejak dini.</p>

<blockquote>
    "Fasilitas yang dimiliki SMK Wikrama 1 Garut sudah sangat representatif dan mendukung siswa untuk melaksanakan Praktik Kerja Lapangan (PKL) sesuai kebutuhan industri perhotelan modern saat ini." — <strong>Bapak Miraz Ramadhan</strong>
</blockquote>

<h3>Komitmen Link and Match dengan DUDI</h3>
<p>Kolaborasi antara SMK Wikrama 1 Garut dan Mercure Garut City Center merupakan wujud nyata penerapan prinsip <em>Link and Match</em> antara dunia pendidikan vokasi dengan Dunia Usaha dan Dunia Industri (DUDI). Kerja sama ini juga membuka jalan lebar bagi siswa untuk magang, sertifikasi profesi, hingga rekrutmen kerja langsung pasca-kelulusan.</p>',
                'category' => 'Berita',
                'image_url' => '/assets/images/599876085_18400529680130368_3130144425626853537_n-366x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-12-13 10:00:00'),
            ],
            [
                'slug' => 'smk-wikrama-1-garut-raih-medali-emas-perak-di-olimpiade-sains-siswa-nasional-2-0',
                'title' => 'SMK Wikrama 1 Garut Raih Medali Emas & Perak di Olimpiade Sains Siswa Nasional 2.0',
                'excerpt' => 'Dua peserta didik SMK Wikrama 1 Garut berhasil meraih medali emas dan perak tingkat nasional pada ajang Olimpiade Sains Siswa Nasional (OSSN) 2.0.',
                'content' => '<p><strong>Garut</strong> — Semboyan <em>"Tiada Hari Tanpa Prestasi"</em> kembali dibuktikan secara nyata oleh siswa-siswi SMK Wikrama 1 Garut. Pada ajang bergengsi <strong>Olimpiade Sains Siswa Nasional (OSSN) 2.0 Tahun 2025</strong> tingkat nasional, dua peserta didik Wikrama sukses mempersembahkan medali emas dan perak setelah bersaing ketat dengan ratusan peserta dari berbagai sekolah ternama di Indonesia.</p>

<p>Pencapaian ini menjadi bukti kokohnya pembinaan akademik, bimbingan intensif para guru, serta budaya belajar mandiri yang ditanamkan secara berkelanjutan di SMK Wikrama 1 Garut.</p>

<h3>Medali Emas Bidang Bahasa Inggris</h3>
<p>Prestasi gemilang ditorehkan oleh <strong>Ghaida Aqila Amirah</strong> yang berhasil merebut <strong>Medali Emas Tingkat Nasional</strong> pada cabang kompetisi Bahasa Inggris. Penguasaan tata bahasa, kemampuan analisis teks global, serta ketepatan dalam menyelesaikan soal-soal berstandar internasional membawanya ke puncak podium juara.</p>

<h3>Medali Perak Bidang Bahasa Indonesia</h3>
<p>Prestasi membanggakan berikutnya diraih oleh <strong>Aylin Azura Welcy Masengie</strong> yang berhasil membawa pulang <strong>Medali Perak Tingkat Nasional</strong> pada cabang kompetisi Bahasa Indonesia. Pemahaman literasi kritis dan wawasan kebahasaan yang mendalam menjadi kunci keberhasilannya meraih peringkat terbaik nasional.</p>

<blockquote>
    "Keberhasilan para siswa ini membuktikan bahwa siswa sekolah kejuruan tidak hanya unggul dalam keterampilan teknis vokasi, tetapi juga mampu menjadi yang terdepan dalam kompetisi sains dan literasi akademik di tingkat nasional."
</blockquote>

<p>Pihak pimpinan sekolah dan keluarga besar SMK Wikrama 1 Garut menyampaikan apresiasi setinggi-tingginya kepada para juara dan guru pembimbing. Prestasi ini diharapkan menjadi pemacu inspirasi bagi seluruh siswa Wikrama untuk senantiasa berprestasi dan mengharumkan nama sekolah di kancah nasional maupun internasional.</p>',
                'category' => 'Prestasi',
                'image_url' => '/assets/images/downloadgram.org_590573023_18400070119130368_5646484177552236084_n-520x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-12-10 10:00:00'),
            ],
            [
                'slug' => 'apa-kata-mereka-tentang-smk-wikrama-1-garut',
                'title' => 'Apa kata mereka tentang SMK Wikrama 1 Garut',
                'excerpt' => 'Tingginya kepercayaan masyarakat terhadap kualitas pendidikan vokasi menjadi motivasi utama bagi SMK Wikrama 1 Garut untuk terus mencetak generasi berkarakter.',
                'content' => '<p><strong>Garut</strong> — Tingginya antusiasme dan kepercayaan masyarakat terhadap kualitas pendidikan kejuruan menjadi motivasi utama bagi SMK Wikrama 1 Garut untuk terus berinovasi dan menjaga mutu pembelajaran. Manajemen sekolah menyampaikan terima kasih dan apresiasi yang mendalam kepada seluruh orang tua, alumni, dan mitra industri atas amanah besar yang dipercayakan kepada sekolah.</p>

<h3>Komitmen Terhadap Mutu dan Inovasi</h3>
<p>Sebagai institusi pendidikan vokasi berprestasi, SMK Wikrama 1 Garut memegang teguh komitmen untuk menyediakan lingkungan belajar yang asri, berteknologi modern, dan adaptif terhadap perkembangan Industri 4.0. Sarana prasarana yang lengkap serta kurikulum terintegrasi industri memastikan setiap lulusan memiliki daya saing tinggi.</p>

<h3>Mencetak Generasi Unggul dan Berakhlak Mulia</h3>
<p>Slogan <em>"Tempat lahirnya generasi unggul, berakhlak, dan siap mendunia"</em> bukan sekadar untaian kata indah, melainkan komitmen nyata yang diwujudkan melalui tiga pilar pembinaan lulusan:</p>

<ul>
    <li><strong>Unggul:</strong> Menguasai keahlian teknis (<em>hard skills</em>) yang teruji dan tersertifikasi secara nasional maupun industri.</li>
    <li><strong>Berakhlak:</strong> Menjunjung tinggi budi pekerti, kejujuran, disiplin, dan pembiasaan ibadah harian.</li>
    <li><strong>Siap Mendunia:</strong> Berwawasan global, adaptif terhadap kemajuan teknologi, serta memiliki etos kerja prima.</li>
</ul>

<blockquote>
    "Sinergi yang harmonis antara sekolah, orang tua siswa, dan dunia kerja adalah fondasi kesuksesan para alumni SMK Wikrama 1 Garut dalam meniti karir profesional maupun melanjutkan ke jenjang perguruan tinggi."
</blockquote>',
                'category' => 'Berita',
                'image_url' => '/assets/images/591159997_2707082836311063_3975242320751435201_n-366x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-12-08 10:00:00'),
            ],
            [
                'slug' => 'smk-wikrama-1-garut-buka-donasi-untuk-korban-bencana-di-sumatera',
                'title' => 'SMK Wikrama 1 Garut Buka Donasi untuk Korban Bencana di Sumatera',
                'excerpt' => 'Sebagai bentuk kepedulian kemanusiaan, SMK Wikrama 1 Garut bekerja sama dengan YBM BRILiaN membuka posko donasi bantuan bagi korban bencana di Sumatera.',
                'content' => '<p><strong>Garut</strong> — Bencana alam yang melanda wilayah Sumatera baru-baru ini telah meninggalkan duka mendalam bagi banyak keluarga. Tidak sedikit saudara-saudari kita yang kehilangan tempat tinggal, sarana kehidupan, dan mata pencaharian. Dalam situasi tanggap darurat ini, uluran tangan dan kepedulian dari berbagai pihak sangat dibutuhkan untuk membantu meringankan beban mereka.</p>

<p>Sebagai bentuk kepedulian dan solidaritas kemanusiaan, <strong>SMK Wikrama 1 Garut bekerja sama dengan YBM BRILiaN</strong> membuka program <em>Open Donasi</em> bagi seluruh warga sekolah, alumni, orang tua siswa, serta masyarakat umum yang ingin berpartisipasi menyalurkan bantuan.</p>

<h3>Penyaluran Bantuan yang Tepat Sasaran</h3>
<p>Program donasi ini bertujuan menghimpun dukungan dana yang nantinya akan disalurkan secara langsung untuk kebutuhan mendesak para korban, seperti bahan pangan pokok, perlengkapan sanitasi, pakaian layak, serta bantuan pemulihan sarana ibadah dan pendidikan.</p>

<div class="article-cta-box">
    <h4>Rekening Resmi Donasi Kemanusiaan:</h4>
    <p>🏦 <strong>Bank:</strong> Bank Syariah Indonesia (BSI)</p>
    <p>💳 <strong>Nomor Rekening:</strong> 1043827169</p>
    <p>👤 <strong>Atas Nama:</strong> ZIS SMK Wikrama 1 Garut</p>
</div>

<blockquote>
    "Setiap kebaikan dan kontribusi yang kita berikan, sekecil apa pun itu, memiliki arti yang sangat besar bagi saudara-saudara kita yang tengah berjuang memulihkan kehidupan. Mari satukan kepedulian untuk meringankan duka Sumatera."
</blockquote>',
                'category' => 'Sosial',
                'image_url' => '/assets/images/downloadgram.org_587847424_18399488929130368_8984991772053974734_n-1-520x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-12-08 10:00:00'),
            ],
            [
                'slug' => 'satu-langkah-menuju-prestasi-nasional-siswa-wikrama-lolos-kualifikasi-panahan-porprov-xv-2025',
                'title' => 'Satu Langkah Menuju Prestasi Nasional: Siswa Wikrama Lolos Kualifikasi Panahan PORPROV XV 2025',
                'excerpt' => 'Rahadian Maheswara Zulhan dari kelas XI TJKT berhasil menorehkan prestasi gemilang dengan lolos kualifikasi cabor Panahan pada ajang bergengsi PORPROV XV.',
                'content' => '<p><strong>Garut</strong> — SMK Wikrama 1 Garut kembali mengukir prestasi membanggakan di bidang olahraga. Salah satu atlet muda andalan sekolah, <strong>Rahadian Maheswara Zulhan</strong> dari kelas XI Teknik Jaringan Komputer dan Telekomunikasi (TJKT), berhasil menunjukkan kehebatannya dengan dinyatakan lolos babak kualifikasi cabang olahraga Panahan untuk ajang bergengsi <strong>Pekan Olahraga Provinsi (PORPROV) XV Tahun 2025</strong>.</p>

<p>Keberhasilan Rahadian ini merupakan satu langkah penting yang mendekatkannya pada panggung kompetisi tingkat provinsi dan menjadi tumpuan harapan sekolah untuk merebut medali juara di kancah PORPROV mendatang.</p>

<h3>Disiplin, Fokus, dan Kerja Keras</h3>
<p>Kepala SMK Wikrama 1 Garut menyambut gembira kabar membanggakan ini. Prestasi yang diraih Rahadian dinilai sebagai buah manis dari konsistensi latihan yang ia jalani selama ini:</p>
<ul>
    <li><strong>Disiplin Tinggi:</strong> Manajemen waktu yang baik antara kegiatan akademik di kelas dan porsi latihan fisik di lapangan.</li>
    <li><strong>Fokus Mental:</strong> Olahraga panahan menuntut konsentrasi prima, ketenangan emosional, serta presisi bidikan.</li>
    <li><strong>Dukungan Terpadu:</strong> Bimbingan intensif dari pelatih serta pendampingan fasilitas dari pihak sekolah.</li>
</ul>

<blockquote>
    "Alhamdulillah, ini adalah capaian yang sangat membanggakan. Hal ini membuktikan bahwa peserta didik SMK Wikrama 1 Garut tidak hanya unggul di bidang IT dan teknologi, tetapi juga mampu menorehkan prestasi gemilang di bidang olahraga profesional."
</blockquote>

<p>Pihak sekolah berkomitmen memberikan dukungan penuh selama proses pemusatan latihan menjelang PORPROV XV 2025. Terus melaju dan bidik prestasi tertinggi, Rahadian!</p>',
                'category' => 'Prestasi',
                'image_url' => '/assets/images/downloadgram.org_587717055_18399357466130368_6047315281308947554_n-1-520x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-12-04 10:00:00'),
            ],
            [
                'slug' => 'smk-wikrama-1-garut-raih-juara-1-di-uin-taekwondo-championship-7-tingkat-nasional',
                'title' => 'SMK Wikrama 1 Garut Raih Juara 1 di UIN Taekwondo Championship 7 Tingkat Nasional',
                'excerpt' => 'Tiga atlet taekwondo SMK Wikrama 1 Garut berhasil meraih Medali Emas dan menyabet Juara 1 pada ajang UIN Taekwondo Championship 7 Tingkat Nasional.',
                'content' => '<p><strong>Garut</strong> — Prestasi membanggakan kembali dipersembahkan oleh para atlet beladiri SMK Wikrama 1 Garut. Pada ajang bergengsi <strong>UIN Taekwondo Championship 7 Tingkat Nasional</strong>, tiga peserta didik berhasil mengharumkan nama sekolah dengan menyabet <strong>Juara 1</strong> dan membawa pulang medali emas.</p>

<p>Turnamen nasional ini diikuti oleh ratusan atlet taekwondo berbakat dari berbagai kontingen daerah di seluruh Indonesia, menjadikan torehan medali emas ini terasa semakin istimewa.</p>

<h3>Daftar Siswa Peraih Medali Emas:</h3>
<ul>
    <li><strong>Rauf Mulky</strong> — Kelas XI Teknik Jaringan Komputer dan Telekomunikasi (TJKT) — <em>Medali Emas</em></li>
    <li><strong>Alfin Al Bukhori</strong> — Kelas XI Teknik Jaringan Komputer dan Telekomunikasi (TJKT) — <em>Medali Emas</em></li>
    <li><strong>Basiran</strong> — Kelas XI Pengembangan Perangkat Lunak dan Gim (PPLG) — <em>Medali Emas</em></li>
</ul>

<blockquote>
    "Keberhasilan ini merupakan buah dari latihan disiplin tanpa lelah, bimbingan pelatih yang berdedikasi, serta doa dan dukungan penuh dari orang tua dan seluruh civitas akademika SMK Wikrama 1 Garut."
</blockquote>

<p>Prestasi ini membuktikan secara nyata bahwa siswa SMK Wikrama tidak hanya cerdas dalam pemrograman dan rekayasa jaringan IT, tetapi juga tangguh dan berjiwa ksatria dalam gelanggang olahraga prestasi.</p>',
                'category' => 'Prestasi',
                'image_url' => '/assets/images/article_7_taekwondo.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-12-03 10:00:00'),
            ],
            [
                'slug' => 'smk-wikrama-1-garut-gelar-upacara-spesial-peringati-hari-guru-nasional-2025',
                'title' => 'SMK Wikrama 1 Garut Gelar Upacara Spesial Peringati Hari Guru Nasional 2025',
                'excerpt' => 'Mengusung tema “Guru Hebat, Indonesia Kuat”, SMK Wikrama 1 Garut menggelar upacara bendera spesial dan pemberian apresiasi guru berdedikasi.',
                'content' => '<p><strong>Garut</strong> — Mengusung semangat <em>"Guru Hebat, Indonesia Kuat"</em>, SMK Wikrama 1 Garut menyelenggarakan Upacara Bendera Spesial dalam rangka memperingati <strong>Hari Guru Nasional (HGN) 2025</strong>. Acara ini berlangsung dengan khidmat dan penuh rasa hormat, dihadiri oleh seluruh dewan guru, staf tata usaha, serta peserta didik dari semua tingkatan kelas.</p>

<p>Upacara ini menjadi momentum bermakna untuk mengapresiasi pengabdian tulus para pendidik yang tak kenal lelah membimbing, mendidik, dan membangun karakter generasi penerus bangsa.</p>

<h3>Penghormatan untuk Pahlawan Tanpa Tanda Jasa</h3>
<p>Dalam amanat pembina upacara, pihak pimpinan sekolah menyampaikan apresiasi mendalam atas dedikasi para guru Wikrama yang senantiasa beradaptasi menghadirkan pembelajaran modern berbasis teknologi dan akhlak mulia. Guru di SMK Wikrama bukan hanya pengajar ilmu kejuruan, melainkan teladan kehidupan yang menanamkan kejujuran, sopan santun, dan disiplin.</p>

<blockquote>
    "Dari ketulusan dan keikhlasan para gurulah lahir lulusan-lulusan yang tidak hanya menguasai keahlian industri, tetapi juga memiliki nurani dan akhlak terpuji untuk memajukan Indonesia."
</blockquote>

<p>Rangkaian peringatan Hari Guru Nasional diakhiri dengan persembahan puisi, ucapan terima kasih dari perwakilan siswa OSIS, serta ramah tamah keluarga besar SMK Wikrama 1 Garut.</p>',
                'category' => 'Berita',
                'image_url' => '/assets/images/588036294_18399260434130368_900624943590979876_n-366x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-12-01 10:00:00'),
            ],
            [
                'slug' => 'smk-wikrama-1-garut-raih-penghargaan-internasional-di-hangzhou-tiongkok',
                'title' => 'SMK Wikrama 1 Garut Raih Penghargaan Internasional di Hangzhou, Tiongkok',
                'excerpt' => 'SMK Wikrama 1 Garut meraih penghargaan internasional dalam ajang Indonesia–China Education Service Innovation & Technology Award 2025 di Hangzhou.',
                'content' => '<p><strong>Hangzhou, Tiongkok</strong> — SMK Wikrama 1 Garut kembali menorehkan prestasi monumental di kancah global. Pada 28 November 2025, sekolah ini sukses meraih penghargaan bergengsi dalam ajang <strong>Indonesia–China Education Service Innovation &amp; Technology Award 2025</strong> untuk kategori <em>"Innovation in Digital Education Development"</em> yang berlangsung di Hangzhou, Tiongkok.</p>

<p>Penghargaan bergengsi tersebut diterima langsung oleh jajaran pimpinan SMK Wikrama 1 Garut bersama perwakilan Yayasan Prawitama dalam rangkaian konferensi pendidikan dunia <strong>Worlddidac Asia 2025</strong> — forum terkemuka yang mempertemukan inovator teknologi pendidikan dari puluhan negara.</p>

<h3>Pengakuan Dunia atas Ekosistem Pembelajaran Digital</h3>
<p>Penghargaan internasional ini diberikan atas keberhasilan SMK Wikrama 1 Garut dalam membangun ekosistem pendidikan kejuruan yang modern dan berbasis teknologi digital, antara lain mencakup:</p>
<ul>
    <li>Integrasi sistem <em>Learning Management System (LMS)</em> mandiri yang fleksibel dan interaktif.</li>
    <li>Pengembangan <em>Teaching Factory</em> berbasis industri perangkat lunak dan jaringan telekomunikasi.</li>
    <li>Peningkatan kompetensi literasi digital guru dan siswa sesuai standar industri internasional.</li>
</ul>

<blockquote>
    "Penghargaan internasional di Hangzhou ini membuktikan bahwa inovasi pendidikan yang dikembangkan di SMK Wikrama 1 Garut telah memenuhi standar mutu global dan diakui oleh komunitas pendidikan internasional."
</blockquote>',
                'category' => 'Prestasi',
                'image_url' => '/assets/images/downloadgram.org_589905210_18398821681130368_8315210067668513360_n-2-520x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-11-28 10:00:00'),
            ],
            [
                'slug' => 'siapkan-teknisi-masa-depan-smk-wikrama-1-garut-hadirkan-direktur-pt-agiaga-jaya-perkasa-dalam-sesi-eksklusif-electric-vehicle',
                'title' => 'Siapkan Teknisi Masa Depan, SMK Wikrama 1 Garut Hadirkan Direktur PT Agiaga Jaya Perkasa dalam Sesi Eksklusif Electric Vehicle',
                'excerpt' => 'Menjawab tren kendaraan listrik global, SMK Wikrama 1 Garut menggelar sesi eksklusif bersama Direktur PT Agiaga Jaya Perkasa untuk menyiapkan teknisi EV generasi baru.',
                'content' => '<p><strong>Garut</strong> — Industri otomotif global sedang bertransformasi pesat menuju era elektrifikasi ramah lingkungan. Menjawab tantangan tersebut, SMK Wikrama 1 Garut mengambil langkah proaktif dengan menyelenggarakan kuliah pakar eksklusif bertajuk <strong>"Perkembangan Teknologi &amp; Electric Vehicle (EV)"</strong> yang menghadirkan langsung <strong>Bapak Kurnia Lesandri Adnan</strong>, Direktur PT Agiaga Jaya Perkasa.</p>

<h3>Menjembatani Teori Kampus dengan Kebutuhan Industri EV</h3>
<p>Sesi ini dirancang khusus untuk membekali siswa kejuruan dengan wawasan praktis seputar ekosistem kendaraan listrik masa depan, meliputi:</p>
<ul>
    <li>Arsitektur dan sistem manajemen baterai kendaraan listrik (BMS).</li>
    <li>Kebutuhan infrastruktur stasiun pengisian daya (EV Charging Station).</li>
    <li>Standar keselamatan kerja dan kompetensi teknisi kendaraan listrik bersertifikasi.</li>
</ul>

<blockquote>
    "Ini bukan sekadar seminar umum, melainkan investasi strategis untuk menyiapkan teknisi Electric Vehicle generasi baru. Kami memastikan lulusan Wikrama tidak hanya siap kerja, tetapi juga memimpin di garis depan teknologi masa depan." — <strong>Kepala SMK Wikrama 1 Garut</strong>
</blockquote>

<div class="article-cta-box">
    <h4>Informasi Pendaftaran Gelombang 1:</h4>
    <p>🗓️ <strong>Periode Pendaftaran:</strong> 3 Oktober – 31 Desember 2025</p>
    <p>🎁 <strong>Benefit Khusus:</strong> Beasiswa potongan senilai Rp 3.000.000,- bagi pendaftar Gelombang 1</p>
    <p>🌐 <strong>Portal Pendaftaran Online:</strong> https://spmb.smkwikrama1garut.sch.id</p>
</div>',
                'category' => 'Berita',
                'image_url' => '/assets/images/490823972_18368458660130368_788727697402995788_n-520x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-11-27 10:00:00'),
            ],
            [
                'slug' => 'sesi-eksklusif-perkembangan-teknologi-electric-vehicle-hadir-di-smk-wikrama-1-garut',
                'title' => 'Sesi Eksklusif “Perkembangan Teknologi & Electric Vehicle” Hadir di SMK Wikrama 1 Garut',
                'excerpt' => 'Siswa SMK Wikrama 1 Garut antusias mengikuti diskusi interaktif seputar masa depan teknologi motor dan mobil listrik bersama praktisi industri.',
                'content' => '<p><strong>Garut</strong> — Komitmen SMK Wikrama 1 Garut dalam menyelaraskan pembelajaran vokasi dengan inovasi industri kembali diperkuat melalui sesi eksklusif bertema <strong>"Perkembangan Teknologi &amp; Electric Vehicle"</strong>. Acara ini dipandu langsung oleh praktisi terkemuka, <strong>Bapak Kurnia Lesandri Adnan</strong>, Direktur PT Agiaga Jaya Perkasa.</p>

<h3>Peluang Karir Nyata di Sektor Kendaraan Listrik</h3>
<p>Dalam paparannya, Bapak Kurnia menguraikan akselerasi konversi energi di Indonesia dan pesatnya pertumbuhan industri baterai kendaraan listrik nasional. Siswa diberikan gambaran nyata mengenai tingginya kebutuhan tenaga terampil yang memahami kelistrikan modern dan sistem digital kendaraan cerdas.</p>

<p>Diskusi berlangsung sangat dinamis. Para siswa antusias mengajukan pertanyaan teknis mengenai konversi motor konvensional menjadi motor listrik, perawatan modul baterai lithium, serta peluang wirausaha bengkel motor listrik modern.</p>

<blockquote>
    "Teknologi kendaraan listrik bukan lagi sekadar tren masa depan, melainkan realitas industri hari ini. Generasi muda vokasi harus menguasai keahlian ini sejak di bangku sekolah agar menjadi pemain kunci di industri tanah air."
</blockquote>',
                'category' => 'Berita',
                'image_url' => '/assets/images/590569515_18398812675130368_414262558705050412_n-366x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-11-26 10:00:00'),
            ],
            [
                'slug' => 'smk-wikrama-1-garut-peringati-hari-guru-nasional-2025-mengapresiasi-peran-pendidik-sebagai-pilar-kemajuan-bangsa',
                'title' => 'SMK Wikrama 1 Garut Peringati Hari Guru Nasional 2025: Mengapresiasi Peran Pendidik sebagai Pilar Kemajuan Bangsa',
                'excerpt' => 'Refleksi mendalam atas dedikasi dan ketulusan guru dalam membentuk generasi berakhlak mulia dan berdaya saing global di SMK Wikrama 1 Garut.',
                'content' => '<p><strong>Garut, 25 November 2025</strong> — Dalam rangka memperingati Hari Guru Nasional 2025, SMK Wikrama 1 Garut menyampaikan penghormatan dan apresiasi setinggi-tingginya kepada seluruh dewan pendidik yang telah mendedikasikan waktu, tenaga, dan ilmunya demi kemajuan tunas-tunas muda bangsa.</p>

<p>Peringatan tahun ini menjadi ruang refleksi bersama mengenai peran sentral guru sebagai agen perubahan, inspirator moral, dan fasilitator pembelajaran modern di era digitalisasi pendidikan.</p>

<h3>Pendidik Berkarakter Menghasilkan Lulusan Berakhlak</h3>
<p>Guru di SMK Wikrama 1 Garut memegang teguh filosofi bahwa keberhasilan pendidikan tidak hanya diukur dari angka-angka raport, melainkan dari kedalaman budi pekerti, integritas, dan kepedulian sosial yang melekat pada kepribadian siswa.</p>

<blockquote>
    "Guru adalah pelita yang menerangi jalan masa depan. Melalui ketulusan bimbingan dan doa para guru, SMK Wikrama 1 Garut terus melahirkan generasi yang tidak hanya unggul secara keahlian teknologi, tetapi juga kokoh dalam akhlak mulia."
</blockquote>',
                'category' => 'Berita',
                'image_url' => '/assets/images/downloadgram.org_587713993_18398527732130368_790226893017878980_n-520x650.jpg',
                'author' => 'Humas Wikrama',
                'is_published' => true,
                'published_at' => Carbon::parse('2025-11-25 10:00:00'),
            ],
        ];

        foreach ($articles as $art) {
            News::create($art);
        }
    }
}
