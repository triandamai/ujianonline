-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Okt 2019 pada 16.23
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `alamat`, `no_telp`, `email`, `username`, `password`, `pass`) VALUES
(1, 'Warsito Aji', 'Kroya', '08982753337', 'apasihto@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_posting` date NOT NULL,
  `penerbit` varchar(10) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `isi`, `tgl_posting`, `penerbit`, `status`) VALUES
(5, 'Kenakalan Remaja (Pencarian Jati Diri)', 'Remaja memang identik dengan nakal, tetapi tidaklah benar jika hanya remaja yang selalu di klaim nakal.\r\n\r\nDi Indonesia ini seperti negeri sandiwara, banyak ahli hukum mencederai hukum, banyak ahli ilmu mencederai ilmu, banyak wakil rakyat yang seharusnya mengemban amanah tetapi mereka malah melakukan KKN.\r\n\r\nApakah mereka remaja ? Tentu bukan, mereka sudah dewasa.', '2018-08-01', 'admin', 'aktif'),
(7, 'SMA N 1 Juara 1', 'sekolah kita juara', '2018-07-30', '15', 'aktif'),
(8, 'Candradimuka Pers', 'Puji syukur kami panjatkan kepada Tuhan YME, karena hanya dengan perkenanNya majalah sekolah CANDRADIMUKA PERS media komunikasi keluarga besar SMA Negeri 1 Kroya dapat hadir sebagai media komunikasi sekolah.\r\n\r\nMenerbitkan suatu media massa betapapun sederhananya memerlukan berbagai persyaratan baik teknis maupun non teknis yang kadang membuat suatu penerbitan menjadi tertunda-tunda, bahkan bisa gagal ditengah jalan. Tetapi sungguh membanggakan, siswa - siswi SMA Negeri 1 Kroya mampu menerbitkan suatu majalah meskipun sederhana tetapi merupakan suatu awal yang sangat baik untuk belajar dalam kemampun menulis.\r\n\r\nSebagai sebuah majalah atau buletin, media ini merupakan wahana yang tepat untuk mengekspresikan ide, gagasan, kreativitas, yang pada gilirannya akan mampu memacu penguasaan satu kompetensi yang sungguh sangat berguna dikelak kemudian hari, kompetensi lunguistik - jurnalistik. Latihan menulis dan atau menerbitkan suatu media berarti berlatih berpikir secara runtut, logis dan ilmiah. Hal ini akan memberikan pengalaman bagi siswa untuk melatih dan menyusun langkah dalam kehidupannya untuk meraih cita-cita yang ditetapkan.\r\n\r\nMenulislah, karena kita mungkin membuka mata orang lain. Menulislah, karena karya kita mungkin memberikan pencerahan bagi pembacanya. Berlatih dan terus berlatihlah akan membuat kita bisa dan teruslah berkarya.', '2018-08-15', '15', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_file_materi`
--

CREATE TABLE `tb_file_materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_mapel` int(4) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `tgl_posting` date NOT NULL,
  `pembuat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_file_materi`
--

INSERT INTO `tb_file_materi` (`id_materi`, `judul`, `id_kelas`, `id_mapel`, `nama_file`, `tgl_posting`, `pembuat`) VALUES
(1, 'Modul Bahasa Indonesia', 5, 10, 'modul-kelas-x-semester-i1.pdf', '2018-08-15', 'admin'),
(3, 'Talking About Self', 5, 11, 'Chapter 1 Talking About Self.pdf', '2018-08-15', 'admin'),
(4, 'materi', 5, 9, 'Presentasi_KP.pptx', '2018-08-16', '15'),
(5, 'materi', 5, 12, 'test.xlsx', '2018-08-16', '20'),
(6, 'materi', 5, 10, 'Lampiran_KP.docx', '2018-08-17', '18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL,
  `id_tq` text NOT NULL,
  `id_soal` text NOT NULL,
  `id_siswa` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id`, `id_tq`, `id_soal`, `id_siswa`, `jawaban`) VALUES
(148, '68', '351', '.9.', '.E.'),
(149, '68', '352', '.9.', '..'),
(150, '68', '353', '.9.', '.D.'),
(151, '68', '354', '.9.', '..'),
(152, '68', '355', '.9.', '..'),
(153, '68', '356', '.9.', '.D.'),
(154, '68', '357', '.9.', '.C.'),
(155, '68', '358', '.9.', '.D.'),
(156, '68', '359', '.9.', '..'),
(157, '68', '360', '.9.', '.E.'),
(158, '68', '361', '.9.', '.B.'),
(159, '68', '362', '.9.', '..'),
(160, '68', '363', '.9.', '.D.'),
(161, '68', '364', '.9.', '..'),
(162, '68', '365', '.9.', '.E.'),
(163, '68', '366', '.9.', '.E.'),
(164, '68', '367', '.9.', '.E.'),
(165, '68', '368', '.9.', '.E.'),
(166, '68', '369', '.9.', '.D.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `wali_kelas` int(5) NOT NULL,
  `ketua_kelas` int(5) NOT NULL,
  `tingkatan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `ruang`, `wali_kelas`, `ketua_kelas`, `tingkatan`) VALUES
(19, 'X A', 'G 1', 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas_ajar`
--

CREATE TABLE `tb_kelas_ajar` (
  `id` int(11) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_pengajar` int(5) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas_ajar`
--

INSERT INTO `tb_kelas_ajar` (`id`, `id_kelas`, `id_pengajar`, `keterangan`) VALUES
(1, 1, 1, 'Halo'),
(2, 1, 8, 'aaa'),
(4, 3, 8, 'bbb'),
(5, 7, 0, ''),
(6, 5, 15, 'PKn'),
(10, 5, 18, ''),
(11, 6, 20, ''),
(12, 5, 20, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id`, `kode_mapel`, `mapel`) VALUES
(9, 'A1', 'PKn'),
(10, 'A2', 'Bahasa Indonesia'),
(11, 'A3', 'Bahasa Inggris'),
(12, 'A9', 'Penjaskes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel_ajar`
--

CREATE TABLE `tb_mapel_ajar` (
  `id` int(11) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_pengajar` int(5) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel_ajar`
--

INSERT INTO `tb_mapel_ajar` (`id`, `id_mapel`, `id_kelas`, `id_pengajar`, `keterangan`) VALUES
(6, 1, 2, 1, 'aaa'),
(7, 1, 1, 1, 'Kelas baik'),
(14, 10, 6, 18, ''),
(16, 12, 5, 15, ''),
(17, 12, 5, 20, ''),
(18, 10, 5, 20, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_essay`
--

CREATE TABLE `tb_nilai_essay` (
  `id` int(11) NOT NULL,
  `id_tq` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_essay`
--

INSERT INTO `tb_nilai_essay` (`id`, `id_tq`, `id_siswa`, `nilai`) VALUES
(4, 2, 2, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_pilgan`
--

CREATE TABLE `tb_nilai_pilgan` (
  `id` int(11) NOT NULL,
  `id_tq` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `benar` int(4) NOT NULL,
  `salah` int(4) NOT NULL,
  `tidak_dikerjakan` int(4) NOT NULL,
  `presentase` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_pilgan`
--

INSERT INTO `tb_nilai_pilgan` (`id`, `id_tq`, `id_siswa`, `benar`, `salah`, `tidak_dikerjakan`, `presentase`) VALUES
(48, 68, 9, 7, 11, 0, 2),
(49, 68, 10, 9, 30, 9, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text,
  `jabatan` varchar(20) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `web` varchar(60) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `nip`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `email`, `alamat`, `jabatan`, `foto`, `web`, `username`, `password`, `pass`, `status`, `mapel`) VALUES
(15, '19680831200604', 'Sutaryo, S.pd.', 'Cilacap', '1968-08-31', 'L', 'Islam', '081533423107', '', 'Maos', 'Guru ', 'anonim.png', '', 'sutaryo', 'a15efdbba79afab0986ad635f7a854ad', 'sutaryo', 'aktif', ''),
(18, '1234567899922', 'Sudarsono, M.Pd.', 'Cilacap', '1968-02-12', 'L', 'Islam', '1234567889', 'apasihlah4@gmail.com', 'krtoya', 'Wakil Kepala Sekolah', 'anonim.png', '', 'sudarsono', '25631d5374f0ecc91cd7300fa6902d9b', 'sudarsono', 'aktif', ''),
(20, '19889289998', 'dian S,pd.', 'Banyumas', '1988-03-12', 'L', 'Islam', '081533423107', 'apasihto@gmail.com', 'purwokerto', 'guru', 'amikom.png', '', 'dian', 'f97de4a9986d216a6e0fea62b0450da9', 'dian', 'aktif', ''),
(95, '3456', 'Jakarta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82128182', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'aktif', 'Bindo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text,
  `id_kelas` int(5) NOT NULL,
  `thn_masuk` int(5) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `nama_ayah`, `nama_ibu`, `no_telp`, `email`, `alamat`, `id_kelas`, `thn_masuk`, `foto`, `username`, `password`, `pass`, `status`) VALUES
(63, '3456', 'Jakarta', NULL, NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, NULL, 'damai', '123456', NULL, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_essay`
--

CREATE TABLE `tb_soal_essay` (
  `id_essay` int(11) NOT NULL,
  `id_tq` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_essay`
--

INSERT INTO `tb_soal_essay` (`id_essay`, `id_tq`, `pertanyaan`, `gambar`, `tgl_buat`) VALUES
(9, 14, 'salah', '', '2018-08-01'),
(10, 71, 'hgjkl;', 'Artboard 1.png', '2019-10-17'),
(11, 71, 'asdsfd', 'Artboard 1.png', '2019-10-17'),
(12, 71, 'sads', 'Artboard 1.png', '2019-10-17'),
(13, 71, 'sadf', 'Artboard 1.png', '2019-10-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_pilgan`
--

CREATE TABLE `tb_soal_pilgan` (
  `id_pilgan` int(11) NOT NULL,
  `id_tq` int(5) DEFAULT NULL,
  `pertanyaan` text,
  `gambar` varchar(100) DEFAULT NULL,
  `pil_a` text,
  `pil_b` text,
  `pil_c` text,
  `pil_d` text,
  `pil_e` text,
  `kunci` varchar(2) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL,
  `no_soal` int(11) DEFAULT NULL,
  `image_a` text,
  `image_b` text,
  `image_c` text,
  `image_d` text,
  `image_e` text,
  `audio_a` text,
  `audio_b` text,
  `audio_c` text,
  `audio_d` text,
  `audio_e` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_pilgan`
--

INSERT INTO `tb_soal_pilgan` (`id_pilgan`, `id_tq`, `pertanyaan`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_e`, `kunci`, `tgl_buat`, `no_soal`, `image_a`, `image_b`, `image_c`, `image_d`, `image_e`, `audio_a`, `audio_b`, `audio_c`, `audio_d`, `audio_e`) VALUES
(379, 71, 'Kehadiran kamus dwibahasa dalam pemelajaran atau pembelajaran bahasa asing sudah menjadi suatu kebutuhan. Kamus dapat membantu pemelajar bahasa untuk dapat menguasai keterampilan berbahasa, baik yang bersifat reseptif maupun produktif. Namun, ketersediaan kamus dwibahasa yang bertujuan untuk memproduksi teks lisan ataupun tulis sangat terbatas, terutama yang ditujukan untuk penutur bahasa Indonesia. Kebanyakan yang beredar adalah kamus Inggris-Indonesia. Kalau pun ada kamus Indonesia-Inggris, biasanya ditujukan untuk penutur bahasa Inggris. Oleh karena itu, kamus dwibahasa Indonesia-Inggris yang dirancang untuk keperluan penutur bahasa Indonesia tampaknya akan memberi kontribusi besar dalam dunia pengajaran atau pemelajaran bahasa. Ide pokok teks tersebut adalah ....', NULL, 'pemelajaran atau pembelajaran bahasa asing', 'kamus dapat membantu kelancaran belajar bahasa asing', 'kebutuhan kamus dwibahasa bagi penutur bahasa asing', 'keterbatasan ketersediaan kamus dwibahasa dalam pemelajaran bahasa asing', 'kebermaknaan kamus dwibahasa dalam pengajaran atau pemelajaran bahasa asing', 'A', '2019-10-17', 1, '379.png', '', '', '', '', '379.mp3', '', NULL, NULL, ''),
(380, 71, 'Kehadiran kamus dwibahasa dalam pemelajaran atau pembelajaran bahasa asing sudah menjadi suatu kebutuhan. Kamus dapat membantu pemelajar bahasa untuk dapat menguasai keterampilan berbahasa, baik yang bersifat reseptif maupun produktif. Namun, ketersediaan kamus dwibahasa yang bertujuan untuk memproduksi teks lisan ataupun tulis sangat terbatas, terutama yang ditujukan untuk penutur bahasa Indonesia. Kebanyakan yang beredar adalah kamus Inggris-Indonesia. Kalau pun ada kamus Indonesia-Inggris, biasanya ditujukan untuk penutur bahasa Inggris. Oleh karena itu, kamus dwibahasa Indonesia-Inggris yang dirancang untuk keperluan penutur bahasa Indonesia tampaknya akan memberi kontribusi besar dalam dunia pengajaran atau pemelajaran bahasa. Ide pokok teks tersebut adalah ....', NULL, 'pemelajaran atau pembelajaran bahasa asing', 'kamus dapat membantu kelancaran belajar bahasa asing', 'kebutuhan kamus dwibahasa bagi penutur bahasa asing', 'keterbatasan ketersediaan kamus dwibahasa dalam pemelajaran bahasa asing', 'kebermaknaan kamus dwibahasa dalam pengajaran atau pemelajaran bahasa asing', 'E', '2019-10-17', 2, '', '', '', '', '', '', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_topik_quiz`
--

CREATE TABLE `tb_topik_quiz` (
  `id_tq` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `tgl_buat` date NOT NULL,
  `pembuat` int(10) NOT NULL,
  `waktu_soal` int(8) NOT NULL,
  `info` varchar(250) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_akhir` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_topik_quiz`
--

INSERT INTO `tb_topik_quiz` (`id_tq`, `judul`, `id_kelas`, `id_mapel`, `tgl_buat`, `pembuat`, `waktu_soal`, `info`, `status`, `tgl_mulai`, `tgl_akhir`) VALUES
(9, 'Pre_tes', 5, 7, '2018-07-30', 16, 1200, 'latihan soal', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'ulangan 1', 5, 8, '2018-07-30', 17, 3600, '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Ulangan B indo', 11, 9, '2019-10-22', 81, 2400, 'cxcb', 'aktif', '2019-10-22 00:00:00', '2019-10-22 00:00:00'),
(70, 'Ulangan B indo', 5, 9, '2019-10-14', 81, 2400, 'sad', 'aktif', '2019-10-14 00:00:00', '2019-10-14 00:00:00'),
(71, 'Ulangan B indo', 19, 10, '2019-10-17', 0, 2400, 'adsfd', 'aktif', '2019-10-17 00:00:00', '2019-10-17 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_waktu`
--

CREATE TABLE `tb_waktu` (
  `id_waktu` int(11) NOT NULL,
  `id_tq` int(11) NOT NULL,
  `tanggal` int(2) NOT NULL,
  `bulan` varchar(3) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jam` int(2) NOT NULL,
  `menit` int(2) NOT NULL,
  `detik` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_file_materi`
--
ALTER TABLE `tb_file_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kelas_ajar`
--
ALTER TABLE `tb_kelas_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel_ajar`
--
ALTER TABLE `tb_mapel_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai_essay`
--
ALTER TABLE `tb_nilai_essay`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai_pilgan`
--
ALTER TABLE `tb_nilai_pilgan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_soal_essay`
--
ALTER TABLE `tb_soal_essay`
  ADD PRIMARY KEY (`id_essay`);

--
-- Indeks untuk tabel `tb_soal_pilgan`
--
ALTER TABLE `tb_soal_pilgan`
  ADD PRIMARY KEY (`id_pilgan`);

--
-- Indeks untuk tabel `tb_topik_quiz`
--
ALTER TABLE `tb_topik_quiz`
  ADD PRIMARY KEY (`id_tq`);

--
-- Indeks untuk tabel `tb_waktu`
--
ALTER TABLE `tb_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_file_materi`
--
ALTER TABLE `tb_file_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas_ajar`
--
ALTER TABLE `tb_kelas_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel_ajar`
--
ALTER TABLE `tb_mapel_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_essay`
--
ALTER TABLE `tb_nilai_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_pilgan`
--
ALTER TABLE `tb_nilai_pilgan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_essay`
--
ALTER TABLE `tb_soal_essay`
  MODIFY `id_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_pilgan`
--
ALTER TABLE `tb_soal_pilgan`
  MODIFY `id_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT untuk tabel `tb_topik_quiz`
--
ALTER TABLE `tb_topik_quiz`
  MODIFY `id_tq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `tb_waktu`
--
ALTER TABLE `tb_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
