-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 03:50 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_jawaban`
--

CREATE TABLE `berkas_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `nama_file` varchar(1000) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_pelajar` int(11) NOT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `pemateri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas_jawaban`
--

INSERT INTO `berkas_jawaban` (`id_jawaban`, `nama_file`, `id_tugas`, `id_pelajar`, `nilai_tugas`, `pemateri`) VALUES
(11, 'tugas_akhir.sql', 4, 2, 100, 'Dimas Adam Saputra'),
(12, 'SK KKP Teknik Informatika TA 2021-2022.pdf', 7, 9, 80, 'Faiz Fachrudin');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'guru', 'guru', 'Dimas Adam Saputra'),
(2, 'Faiz', 'Faiz', 'Faiz Fachrudin');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_soal_latihan`
--

CREATE TABLE `jawaban_soal_latihan` (
  `id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_pelajar` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `jawaban_pelajar` text NOT NULL,
  `poin_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban_soal_latihan`
--

INSERT INTO `jawaban_soal_latihan` (`id`, `id_soal`, `id_pelajar`, `id_materi`, `jawaban_pelajar`, `poin_soal`) VALUES
(8, 10, 9, 8, 'saumu', 0),
(9, 11, 9, 8, 'menahan diri dari segala sesuatu, seperti: menahan makan, minum, hawa nafsu, dan menahan dari bicara yang tidak bermanfaat.', 0),
(10, 4, 7, 5, 'hidup', 0),
(11, 5, 7, 5, 'ilmu', 0),
(12, 12, 7, 6, 'cipocok', 0),
(13, 13, 7, 6, 'pulau seribu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pemateri` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul`, `pemateri`, `isi`, `kelas`) VALUES
(5, 'Biologi', 'Dimas Adam Saputra', 'Biologi Sebagai Ilmu\r\n\r\nIstilah biologi berasal dari bahasa Yunani, yaitu bios yang artinya hidup dan logos yang artinya ilmu. Jadi, biologi adalah ilmu yang mempelajari tentang kehidupan. \r\nSuatu pengetahuan dapat disebut sebagai ilmu jika memenuhi syarat sebagai berikut:\r\n1. Memiliki objek kajian, yaitu makhluk hidup yang ada maupun yang pernah ada di dunia ini\r\n2. Memiliki metode, dalam mempelajari objek kajian biologi digunaan metode ilmiah untuk menemukan kebenaran\r\n3. Bersifat sistematis, ilmu pengetahuan harus tersusun dari hal sederhana menuju ke yang lebih kompleks agar mudah dikaji\r\n4. Bersifat universal, kebenaran yang disajikan dalam ilmu pengetahuan harus berlaku secara umum\r\n5. Bersifat objektif, pernyataan dalam suatu ilmu pengetahuan harus bersifat jujur\r\n6. Bersifat analitis, kajian dari sebuah ilmu akan menuju hal-hal yang lebih khusus\r\n8. Bersifat verifikatif, kebenaran ilmiah dalam sebuah ilmu tidak bersifat mutlak, namun bersifat terbuka atau verifikatif yang dikenal dengan kebenaran ilmiah.', 1),
(6, 'Sejarah', 'Faiz Fachrudin', 'Situs Manusia Purba Sangiran\r\nSangiran telah menjadi sentral bagi kehidupan manusia purba. Berbagai penelitian dari para ahli juga dilakukan di sekitar Sangiran.\r\nBeberapa temuan fosil di Sangiran telah mendorong para ahli untuk terus melakukan penelitian termasuk di luar Sangiran.\r\nDari Sangiran kita mengenal beberapa jenis manusia purba di Indonesia.\r\nSetelah ditetapkan sebagai warisan dunia, Situs Manusia Purba Sangiran dikembangkan sebagai pusat penelitian dalam negeri dan luar negeri, serta sebagai tempat wisata.\r\nSelain itu Sangiran juga memberi manfaat kepada masyarakat di sekitarnya, karena pariwisata di daerah tersebut.\r\nUntuk memahami jenis dan ciri-ciri manusia purba di Indonesia mari kita telaah bacaan berikut ini.\r\nPeninggalan manusia purba untuk sementara ini yang paling banyak ditemukan berada di Pulau Jawa.\r\nMeskipun di daerah lain juga ada, para peneliti belum berhasil menemukan tinggalan tersebut atau masih sedikit yang berhasil ditemukan, misalnya di Flores.', 1),
(7, 'PAI', 'Faiz Fachrudin', 'Amanah artinya terpercaya (dapat dipercaya), Amanah juga berarti pesan yang dititipkan dapat disampaikan kepada orang yang berhak.\r\nAmanah yang wajib ditunaikan oleh setiap orang adalah hak-hak Allah Swt, seperti salat, zakat, puasa, berbuat baik kepada sesama, dan yang lainnya.\r\nAmahan berkaitan erat dengan tanggungjawab.\r\nOrang yang menjaga amanah biasanya dsebut orang yang bertanggung jawab. Sebaliknya orang yang tidak menjaga amanah disebut orang yang tidak bertanggung jawab.\r\nDengan demikian, dapat disimpulkan bahwa menjaga amanah itu penting. Kalau kalian setuju dengan pernyataan ini, mulai sekarang kalian harus berlatih menjaga amanah.', 1),
(8, 'PAI', 'Faiz Fachrudin', 'Puasa berasal dari kata \"saumu\" yang artinya menahan diri dari segala sesuatu, seperti: menahan makan, minum, hawa nafsu, dan menahan dari bicara yang tidak bermanfaat.\r\nSedangkan arti puasa menurut istilah adalah menahan diri dari segala sesuatu yang membatalkannya, mulai dari terbit fajar sampai terbenamnya matahari dengan niat dan beberapa syarat tertentu, sesuai dengan fiman Allah sebagai berikut:\r\n\"Makan dan minumlah hingga jelas bagimu (perbedaan) antara benang putih dan benang hitam, yaitu fajar...\"(Q.S. al Baqarah/2:187)\r\nSetiap orang yang percaya kepada Allah Swt diwajibkan untuk berpuasa di bulan Ramadan sebagaimana firman Allah sebagai berikut:\r\n\"Wahai orang-orang yang beriman! Diwajibkan atas kamu berpuasa sebagaimana diwajibkan atas orang sebelum kamu agar kamu bertakwa.\" (Q.S. al Baqarah/2:183)', 2),
(9, 'Sejarah', 'Faiz Fachrudin', 'Awal abad ke-20, politik kolonial memasuki babak baru. Dimulailah era Politik Etis yang dipimpin oleh Menteri Jajahan Alexander W.F. Idenburg yang kemudian menjadi Gubernur Jenderal Hindia Belanda (1909-1916).\r\n\r\nAda tiga program Politik Etis, yaitu irigasi, edukasi, dan trasmigrasi.\r\n\r\nAdanya Politik Etis membawa pengaruh besar terhadap perubahan arah kebijakan politik negeri Belanda atas negeri jajahan. Pada era itu pula muncul simbol baru yaitu “kemajuan”.\r\n\r\nDunia mulai bergerak dan berbagai kehidupan pun mulai mengalami perubahan. Pembangunan infrastruktur mulai diperhatikan dengan adanya jalur kereta api Jawa-Madura.\r\n\r\nDi Batavia lambang kemajuan ditunjukkan dengan adanya trem listrik yang mulai beroperasi pada awal masa itu.\r\n\r\nDalam bidang pertanian pemerintah kolonial memberikan perhatiannya pada bidang pemenuhan kebutuhan pangan dengan membangun irigasi.\r\n\r\nDi samping itu, pemerintah juga melakukan emigrasi sebagai tenaga kerja murah di perkebunan-perkebunan daerah di Sumatera.\r\n\r\nHal yang sangat penting untuk mendukung simbol kemajuan itu maka dalam era Politik Etis ini dikembangkan program pendidikan.\r\n\r\nPendidikan ini ternyata tidak hanya untuk orang-orang Belanda tetapi juga diperuntukkan kepada kaum pribumi, tetapi dengan persyaratan-persyaratan tertentu.\r\n\r\nSuasana dan simbol kemajuan melalui program pendidikan ini juga didukung oleh adanya surat-surat R.A. Kartini kepada sahabatnya Ny. R.M. Abendanon di Belanda, yang merupakan inspirasi bagi kaum etis pada saat itu.\r\n\r\nSemangat era etis adalah kemajuan menuju modernitas. Perluasan pendidikan gaya Barat adalah tanda resmi dari bentuk Politik Etis itu.\r\n\r\nPendidikan itu tidak saja menghasilkan tenaga kerja yang diperlukan oleh negara, tetapi juga pada sektor swasta Belanda.\r\n\r\nDalam bidang pendidikan meskipun dampaknya sangat kecil kepada penduduk pribumi, tetapi membawa dampak pada tumbuhnya sekolahsekolah.\r\n\r\nPada tahun 1900, tercatat sebanyak 169 Eurepese Lagree School (ELS) di seluruh Hindia Belanda.\r\n\r\nDari sekolah ini murid-murid dapat melanjutkan pelajaran ke STOVIA (School tot Opleiding van Indische Artsen) ke Batavia atau Hoogeree Burgelijk School (HBS).\r\n\r\nDi samping itu juga dikenal sekolah OSVIA (sekolah calon pegawai) yang berjumlah enam buah\r\n\r\nUntuk memperluas program pendidikan maka keberadaan sekolah guru sangat diperlukan. Dikembangkan sekolah guru.\r\n\r\nSebenarnya Sekolah Guru atau Kweekkschool sudah dibuka pada tahun 1852 di Solo.\r\n\r\nBerkembanglah pendidikan di Indonesia sejak jenjang pendidikan dasar seperti Hollands Inlandse School (HIS) kemudian Meer Uitgebreid Lager Onderwijs (MULO).\r\n\r\nUntuk kelanjutan pendidikannya kemudian dibuka sekolah menengah yang disebut Algemene Middelbare School (AMS), juga ada sekolah Hogere Burger School (HBS).\r\n\r\nKemudian khusus untuk kaum pribumi disediakan “Sekolah Kelas Satu” yang murid-muridnya berasal dari anak-anak golongan atas yang nanti akan menjadi pegawai, dan kemudian rakyat pada umumnya disediakan “Sekolah Kelas Dua” yang di Jawa dikenal dengan “Sekolah Ongko Loro”.\r\n\r\nBagi para pemuda aktifis banyak yang bersekolah di School tot Opleiding van Indische Artsen (STOVIA) yang berpusat di Batavia.\r\n\r\nSekolah ini sering disebut dengan “Sekolah Dokter Jawa” Dari sekolah ini lahir beberapa tokoh pergerakan kebangsaan.\r\n\r\nMemang harus diakui, meskipun penduduk pribumi yang dapat bersekolah sangat sedikit, namun keberadaan sekolah itu telah menumbuhkan kesadaran di kalangan pribumi akan pentingnya pendidikan.\r\n\r\nHal ini mempercepat proses modernisasi dan munculnya kaum terpelajar yang akan membawa pada kesadaran nasionalisme.\r\n\r\nMunculnya kaum terpelajar itu mendorong munculnya surat kabar, seperti, Pewarta Priyayi yang dikelola oleh R.M Tjokroadikoesoemo.\r\n\r\nJuga koran-koran lain, seperti Surat kabar De Preanger Bode (1885) di Bandung, Deli Courant (1884) di Sumatera Timur, Makassarsche Courant (1902) di Sulawesi, Bromartani (1855) di Surakarta, Bintang Hindia (1902) yang dikelola oleh Abdul Rivai, membawa pencerahan di kalangan pribumi.\r\n\r\nDari berbagai informasi yang ada di surat kabar inilah lambat laun kesadaran akan pentingnya persamaan, kemerdekaan terus menyebar ke kalangan terpelajar di seluruh wilayah Hindia Belanda.\r\n\r\nBerkat informasi yang berkembang inilah kaum terpelajar terus melakukan dialog dan berdebat tentang masa depan tanah kelahirannya sehingga kesadaran pentingnya kemerdekaan terus berkembang dari waktu ke waktu yang puncaknya adalah adanya kesadaran untuk menjadi satu tanah air, satu bangsa, dan satu bahasa adalah Indonesia pada 28 Oktober 1928.', 2),
(10, 'Biologi', 'Dimas Adam Saputra', '\r\n\r\nUpaya pelestarian keanekaragaman hayati bertujuan untuk menjaga populasi suatu spesies. Beberapa upaya yang dapat dilakukan untuk melestarikan keanekaragaman hayati sebagai berikut:\r\n1. Penghijauan (Reboisasi)\r\nPenghijauan merupakan kegiatan mmenanam kembali hutan atau lahan yang telah gundul akibat penebangan. Dengan adanya penghijauan, diharapkan dapat memperbaiki kondisi lingkungan yang terganggu. Kegiatan penghijauan tidak hanya menanam, tetapi yang lebih penting adalah merawat tanaman yang telah ditanam.\r\n\r\n2. Pemuliaan Tanaman\r\nPemuliaan adalah usaha membuat varietas unggul tetapi bukan berarti menghilangkan varietas yang tidak unggul. Pemuliaan dapat dilakukan dengan perkawinan silang yang akan menghasilkan varian baru. Varian yang dihasilkan berbeda dengan induknya karena meerupakan varietas baru. Oleh karena itu, pemuliaan hewan maupun tumbuhan dapat meningkatkan keanekaragaman gen dan jenis\r\n\r\n3. Penangkaran\r\nPenangkaran adalah upaya pengembangbiakan dan pembesaran tumbuhan dan satwa liar dengan tetap mempertahankan kemurnian jenisnya. Hasil penangkaran akan dilepas ke habitat asalnya agar populasi dapat meningkat\r\n4. Perlindungan Alam\r\nPerlindungan alam merupakan usaha untuk menjaga kelestarian hewan, tumbuhan, tanah dan air. Perlindungan alam juga meliputi usaha pelestarian alam. Tujuan pelestarian alam adalah mempertahankan ekosistem dan menjaga kelesatarian sumber daya alam. Usaha pelestarian alam dapat dilakukan dengan in-situ dan ex-situ.\r\n\r\n*Pelestarian in-situ adalah usaha pelestarian makhluk hidup di habitat aslinya, misalnya taman nasional, cagar alam, suaka marga satwa, hutan wisata, taman hutan raya dan taman laut.\r\n*Pelestarian ex-situ adalah usaha pelestarian makhluk hidup dengan cara memindahkan hewan atau tumbuhan dari habitat aslinya ke tempat lain. Contohnya pelestarian makhluk hidup di penangkaran dan kebun botani (kebun raya).', 2),
(11, 'Biologi', 'Dimas Adam Saputra', 'Pemanfaatan Bioteknologi Dalam Bidang Pangan\r\n\r\nPemanfaatan mikroorganisme dalam bidang pangan telah dikenal masyarakat luas. Makanan hasil fermentasi mikroorganisme dapat ditemui dengan mudah. Berikut beberapa contoh produk bioteknologi dalam bidang pangan:\r\n1. Keju\r\nKeju dibuat dari air susu yang diasamkan menggunakan bakteri Lactobacillus bulgacillus dan Streptococcus thermophillus. Bakteri Lactobacillus mengubah laktosa menjadi asam laktat dan menyebabkan susu menggumpal\r\n2. Yoghurt\r\nYoghurt merupakan minuman hasil fermentasi susu menggunakan bakteri Lactobacillus substilis atau Lactobacillus bulgaricus. Bakteri yang dimanfaatkan mampu menderadasi protein dalam susu menjadi asam laktat. Proses degradasi ini disebut fermentasi asam laktat dan hasil akhirnya dinamakan yoghurt.\r\n3. Roti\r\nRoti dibuat dengan cara fermentasi oleh ragi atau yeast. Adonan roti terdiri atas campuran tepung terigu, garam, lemak, air, gula dan yeast. \r\nYeast tidak memiliki enzim untuk memcahkan alumunium. Akan tetapi, adanya air dapat mengaktifkan enzim amilase yang ada pada tepung terigu. Selanjutnya, enzim amilase akan memecah alumunium menjadi gula, kemudian gula difermentasi menjadi alkohol serta karbon dioksida oleh yeast.\r\n4. Tapai Ketan\r\nTapai ketan dibuat melalui proses fermentasi. Proses fermentasi ini menggunakan jamur Saccharomyces cerevisiae (jamur ragi). Jamur jenis ini mampu mengubah karbohidrat yang terkandung dalam ketan menjadi alkohol dan karbon dioksida.\r\n5. Tempe\r\nTempe merupakan salah satu sumber protein nabati. Tempe terbuat dari kedelai dengan bantuan jamur Rhizopus sp.. Rhizopus sp, akan mengubah protein kompleks pada kacang kedelai yang sukar dicerna menjadi protein sederhana yang mudah dicerna. Selama proses produksi tempe juga dihasilkan antibiotik yang dapat mencegah penyakit perut, seperti diare.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `id_pelajar` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`id_pelajar`, `nama_depan`, `nama_belakang`, `username`, `password`, `email`, `kelas`) VALUES
(1, 'Dimas ', 'Adam', 'dimmascools', 'makasihd123', '', '3'),
(2, 'Samid', 'Mada', 'samid', 'samid', '', '1'),
(3, 'jihad', 'dudin', 'jihad', 'jihad123', '', '3'),
(4, 'Udin', 'Udin', 'Udin', 'Udin', '', '1'),
(5, 'cilto', 'cilto', 'cilto', 'cilto', '', '3'),
(6, 'Andi', 'Odang', 'Andi', 'Andi', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `soal_latihan`
--

CREATE TABLE `soal_latihan` (
  `id_soal` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawaban_benar` text NOT NULL,
  `jawaban1` text NOT NULL,
  `jawaban2` text NOT NULL,
  `jawaban3` text NOT NULL,
  `jawaban4` text NOT NULL,
  `poin_soal` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `pemateri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_latihan`
--

INSERT INTO `soal_latihan` (`id_soal`, `id_materi`, `soal`, `jawaban_benar`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `poin_soal`, `kelas`, `pemateri`) VALUES
(2, 1, 'Siapa pembuat PHP', 'Rasmus Lerdorf', 'Rasmus Lerdorf', 'Dimas Adam', 'Samid Mada', 'Samid', 50, 3, 'Dimas Adam Saputra'),
(4, 5, 'apa arti dari bios ?', 'hidup', 'hidup', 'kekal', 'abadi', 'tidak ada', 50, 1, 'Dimas Adam Saputra'),
(5, 5, 'apa arti dari logos ?', 'ilmu', 'nihil', 'makanan', 'ilmu', 'tidak ada', 50, 1, 'Dimas Adam Saputra'),
(6, 10, 'apa tujuan upaya pelestarian keanekaragaman hayati ?', 'Penghijauan (Reboisasi)', 'Penghijauan (Reboisasi)', 'pansos', 'hanya iseng saja', 'mengisi waktu luang', 50, 2, 'Dimas Adam Saputra'),
(7, 10, 'apa itu reboisasi', 'menanam kembali hutan atau lahan yang telah gundul akibat penebangan', 'daur ulang', 'berenang', 'menanam kembali hutan atau lahan yang telah gundul akibat penebangan', 'menebangii pohon sesuka hati', 50, 2, 'Dimas Adam Saputra'),
(8, 7, 'apa arti dari amanah', 'terpercaya (dapat dipercaya)', 'terpercaya (dapat dipercaya)', 'pembohong', 'ahli mekanik', 'tiada duanya', 50, 1, 'Faiz Fachrudin'),
(9, 7, 'disebut apakah orang yang bisa menjaga amanah ?', 'bertanggung jawab', 'orang benar', 'pendusta', 'ahli mekanik', 'bertanggung jawab', 50, 1, 'Faiz Fachrudin'),
(10, 8, 'Puasa berasal dari kata  ?', 'saumu', 'saimi', 'saimu', 'saumu', 'suamu', 50, 2, 'Faiz Fachrudin'),
(11, 8, 'apa arti puasa ?', 'menahan diri dari segala sesuatu, seperti: menahan makan, minum, hawa nafsu, dan menahan dari bicara yang tidak bermanfaat.', 'menahan diri dari segala sesuatu, seperti: menahan makan, minum, hawa nafsu, dan menahan dari bicara yang tidak bermanfaat.', 'mengisi kekosongan', 'tidak berbuat apa-apa', 'bersantai dan diam', 50, 2, 'Faiz Fachrudin'),
(12, 6, 'dimana penelitian manusia purba sangiran dilakukan ?', 'sangiran', 'sangiran', 'cipocok', 'ciruas', 'legok', 50, 1, 'Faiz Fachrudin'),
(13, 6, 'dimana peninggalan manusia purba untuk sementara ini yang paling banyak ditemukan ?', 'pulau jawa', 'pulau sulawesi', 'pulau jawa', 'pulau nias', 'pulau seribu', 50, 1, 'Faiz Fachrudin'),
(14, 9, 'apa program Politik Etis ?', 'irigasi, edukasi, dan trasmigrasi', 'politik sehat', 'panen kopi', 'diam-diam saja', 'irigasi, edukasi, dan trasmigrasi', 50, 2, 'Faiz Fachrudin'),
(15, 9, 'apa singkatan dari HBS ?', ' Hoogeree Burgelijk School', 'Hoogeree Burgelijk School', ' Hoogereeeee Burgelijk School', ' Hooogeree Burgelijk Schooool', ' Hoogereee Burgeeelijk Schooll', 50, 2, 'Faiz Fachrudin'),
(16, 11, 'apa contoh pemanfaatan mikroorganisme dalam bidang pangan ?', 'Yoghurt', 'Yoghurt', 'bakwan', 'BBQ', 'Fried Chicken ', 50, 3, 'Dimas Adam Saputra'),
(17, 11, 'terbuat dari apakah keju', 'Keju dibuat dari air susu yang diasamkan menggunakan bakteri Lactobacillus bulgacillus dan Streptococcus thermophillus.', 'air keringat', 'fermentasi kopi kapal api', 'Keju dibuat dari air susu yang diasamkan menggunakan bakteri Lactobacillus bulgacillus dan Streptococcus thermophillus.', 'sisa kuah baso', 50, 3, 'Dimas Adam Saputra'),
(18, 1, 'apa itu PHP ?', 'Hypertext Preprocessor', 'Hypertext Preprocessor', 'Hyper X Prrocessor', 'Hyper Laser Pro', 'Pro Hyper Protext', 50, 3, 'Dimas Adam Saputra');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `tugas` text NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_materi`, `tugas`, `kelas`) VALUES
(2, 4, 'Buatlah program dengan menggunakan bahasa pemrogamman JavaScript !', 3),
(4, 1, 'Buatlah sebuah program dengan menggunakan bahasa pemrogramman PHP!', 3),
(5, 6, 'silahkan rangkum apa yang sudah dibaca', 1),
(6, 7, 'silahkan rangkum apa yang sudah dibaca', 1),
(7, 8, 'silahkan rangkum apa yang sudah dibaca', 2),
(8, 9, 'silahkan rangkum apa yang sudah dibaca', 2),
(9, 5, 'Silahkan buat rangkuman 2 paragraf', 1),
(10, 10, 'buat lah artikel dari materi tersebut', 2),
(11, 11, 'tugas untuk minggu depan adalah merangkum semua materi yang ada', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_jawaban`
--
ALTER TABLE `berkas_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jawaban_soal_latihan`
--
ALTER TABLE `jawaban_soal_latihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`id_pelajar`);

--
-- Indexes for table `soal_latihan`
--
ALTER TABLE `soal_latihan`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_jawaban`
--
ALTER TABLE `berkas_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawaban_soal_latihan`
--
ALTER TABLE `jawaban_soal_latihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `id_pelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soal_latihan`
--
ALTER TABLE `soal_latihan`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
