-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jul 2019 pada 04.51
-- Versi server: 10.3.14-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10211818_db_elearning`
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
(1, 'Rilas Agung Pambudi', 'Banjarnegara', '081390492606', 'rilasagungpambudi@gmail.com', '248653', '21232f297a57a5a743894a0e4a801fc3', 'admin');

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
(5, 'Kenakalan Remaja (Pencarian Jati Diri)', 'Remaja memang identik dengan nakal, tetapi tidaklah benar jika hanya remaja yang selalu di klaim nakal.\r\n\r\nDi Indonesia ini seperti negeri sandiwara, banyak ahli hukum mencederai hukum, banyak ahli ilmu mencederai ilmu, banyak wakil rakyat yang seharusnya mengemban amanah tetapi mereka malah melakukan KKN.\r\n\r\nApakah mereka remaja ? Tentu bukan, mereka sudah dewasa.', '2015-08-16', 'admin', 'aktif'),
(6, 'The Power of Life', 'The Power of Life jsndjsd sdsdsd sdsyftsas arsduywge rtposfh0a9hqwreb eeuheirer.\r\n\r\ndfdfdfhidf wuuwgyuwwo dsiuhsduishdsds', '2015-08-16', '8', 'aktif');

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
  `pembuat` varchar(10) NOT NULL,
  `hits` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_file_materi`
--

INSERT INTO `tb_file_materi` (`id_materi`, `judul`, `id_kelas`, `id_mapel`, `nama_file`, `tgl_posting`, `pembuat`, `hits`) VALUES
(3, 'Modul Latihan', 3, 2, 'Cetak Soal Tryout P1.pdf', '2015-08-15', 'admin', 0),
(4, 'Modul 1', 1, 1, 'kumpulan_soal_20152.pdf', '2015-08-15', '1', 7),
(5, 'Modul 2', 1, 1, '2072-P1-SPK-Rekayasa Perangkat Lunak.doc', '2015-08-15', '1', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL,
  `id_tq` int(4) NOT NULL,
  `id_soal` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id`, `id_tq`, `id_soal`, `id_siswa`, `jawaban`) VALUES
(70, 17, 35, 9, 'minum daging kuda'),
(71, 17, 35, 12, 'makan minum berenergi'),
(72, 17, 35, 13, 'makan daging'),
(83, 20, 42, 16, 'World Wide Web'),
(84, 20, 44, 16, 'lAN WAn Man'),
(85, 20, 45, 16, 'asdad asdasd Pysical Netwok'),
(86, 20, 44, 15, 'lan wan man'),
(87, 20, 42, 15, 'wide web wolrd'),
(88, 20, 45, 15, 'Network Layer'),
(89, 18, 46, 19, 'world wide web'),
(90, 18, 48, 19, 'phsycal'),
(91, 18, 47, 19, 'WAN, MAN, LAN'),
(92, 18, 48, 21, 'aplication, presentation, session, transport, network, data link, physical layer'),
(93, 18, 46, 21, 'world wide web'),
(94, 18, 47, 21, 'LAN, MAN, WAN'),
(95, 18, 48, 31, 'Physical,Data Link,Network,Transport,Session,Presentation,Application'),
(96, 18, 47, 31, 'LAN,MAN,WAN'),
(97, 18, 46, 31, 'Word Wide Website'),
(98, 18, 47, 29, 'LAN, MAN,WAN'),
(99, 18, 46, 29, 'world wide web'),
(100, 18, 48, 29, 'pisical,data,network,transport.,session,presentation ,aplication'),
(101, 18, 48, 31, 'Physical,Data Link,Network,Transport,Session,Presentation,Application'),
(102, 18, 47, 31, 'LAN,MAN,WAN'),
(103, 18, 46, 31, 'Word Wide Website'),
(104, 18, 47, 36, 'LAN MAN WAN'),
(105, 18, 48, 36, 'application,physical,sesion,transmision,network,data link,presentation'),
(106, 18, 46, 36, 'word wide web'),
(107, 18, 47, 26, 'LAN(LOCAL AREA NETWORK),MAN,WAN'),
(108, 18, 46, 26, 'world wide wibe '),
(109, 18, 48, 26, 'presentation,data link,network,transportation,sesion,psycal,aplication'),
(110, 18, 46, 34, 'word wide web'),
(111, 18, 48, 34, 'physical\r\nnetwork\r\ndata link\r\ntransportation\r\npreparation\r\naplikation\r\n'),
(112, 18, 47, 34, 'man \r\nwan\r\nlan'),
(113, 18, 46, 22, 'World Wide Web'),
(114, 18, 47, 22, 'WAN, WAN, LAN'),
(115, 18, 48, 22, 'phyisical layer,data link layer,network layer,transportion layer,sesion layer,presentation,layer,apllication layer'),
(116, 18, 47, 27, 'LAN, MAN, WAN'),
(117, 18, 46, 27, 'word wai web '),
(118, 18, 48, 27, 'data link, internet, physical, transport, apresiasion, network, '),
(119, 18, 48, 25, 'psychal,network,transport,protocol,'),
(120, 18, 47, 25, 'LAN MAN dan WAN'),
(121, 18, 46, 25, 'world  web web'),
(122, 18, 48, 35, 'Lapisan physical,lapisan data link,lapisan network,lapisan transport,lapisan session,lapisan presentation,lapisan aplication'),
(123, 18, 46, 35, 'word wide web'),
(124, 18, 47, 35, 'LAN,MAN,WAN'),
(125, 18, 47, 33, 'LAN MAN WAN'),
(126, 18, 46, 33, 'word web whole'),
(127, 18, 48, 33, 'phisical layer, data link, network, transport ,sesion, presentation, application'),
(128, 18, 48, 23, 'Physical Data-link Network Transport Session Presentation Application'),
(129, 18, 46, 23, 'World Wide Web'),
(130, 18, 47, 23, 'LAN MAN WAN'),
(131, 18, 46, 17, 'word wai web'),
(132, 18, 48, 17, 'application,physical,data link,network,transport,session,presentation'),
(133, 18, 47, 17, 'lan,man,wan'),
(134, 18, 48, 24, 'phcy,data, ,transport,sesyen,prasentasion,aplikasion'),
(135, 18, 47, 24, 'Lan manual'),
(136, 18, 46, 24, 'word wait web'),
(137, 18, 47, 30, 'lan,man,wan,'),
(138, 18, 46, 30, 'world wide web'),
(139, 18, 48, 30, 'physcal,data link,sesion,presentation,aplication,transision,network\r\n'),
(140, 18, 46, 20, 'word write website'),
(141, 18, 47, 20, 'LAN,MAN,WAN'),
(142, 18, 48, 20, 'physical,datalink,network,transport,session,presentation,aplication'),
(143, 18, 48, 28, 'pyshical,data link,transisi data,transisi,network,transport,aplication,session'),
(144, 18, 46, 28, 'world wide web'),
(145, 18, 47, 28, 'LAN(Local Area Network) MAN(metropolitan area network) WAN'),
(146, 18, 46, 32, 'word wai web'),
(147, 18, 47, 32, 'lan,wan,man'),
(148, 18, 48, 32, 'apresiation,phsycal, session    trapotaision,network,down'),
(149, 18, 47, 18, 'LAN(LocalAreaNetwork),MAN(MideAreaNetwork),WAN(WideAreaNetwork)'),
(150, 18, 46, 18, 'WordWideWeb'),
(151, 18, 48, 18, 'phsical,datalink,network,transport,session,pressentation,application aplication'),
(152, 18, 48, 39, 'physical,data link,network,transport,session,presentation,aplication'),
(153, 18, 47, 39, 'lan,man,wan'),
(154, 18, 46, 39, 'world wibe web'),
(155, 18, 46, 40, 'world, wide, web'),
(156, 18, 47, 40, 'LAN, MAN, WAN'),
(157, 18, 48, 40, 'phisycal, data link, network, transport, sesion, presentation, aplication'),
(158, 18, 47, 43, 'lan,man,wan'),
(159, 18, 46, 43, 'word wide wibe'),
(160, 18, 48, 43, 'physical,network,transport,session,presentation,data link,aplication                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             '),
(161, 18, 46, 44, 'world web web'),
(162, 18, 48, 44, 'phisycal,data link,network,transport,,section,presentation,application'),
(163, 18, 47, 44, 'LAN,MAN,WAN'),
(164, 18, 46, 41, 'WORD WIDE WEB'),
(165, 18, 47, 41, 'LAN,MAN,WAN'),
(166, 18, 48, 41, 'PHISYCAL,DATA LINK,NETWORK,TRANSPORT,SESSION,PRESNTATION,APPLICATION'),
(167, 18, 48, 38, 'Phisycal,presentation,network'),
(168, 18, 46, 38, 'Word wide web'),
(169, 18, 47, 38, 'HUB,LAN,MAN,WAN'),
(170, 18, 46, 48, 'Word Wib Web'),
(171, 18, 48, 48, 'Pisikal, Presentasi, Network'),
(172, 18, 47, 48, 'LAN, MAN, WAN'),
(173, 18, 46, 46, 'WORD,WID,WEB'),
(174, 18, 47, 46, 'JARINGAN LAN, NETWORK, \r\n'),
(175, 18, 48, 46, 'APLIKASIEN,SEASEN,PRESENYESEN,NETWORK,'),
(176, 18, 46, 45, 'WORD WIDE WEB'),
(177, 18, 48, 45, 'PHYSICAL  SESSION TRANSPORT LAYER DATA LINK APPLICATION  PRESENTATION \r\n'),
(178, 18, 47, 45, 'LAN MAN WAN'),
(179, 18, 48, 42, 'pysical layer, network layer,session layer, aplikassion layer, presentasion layer'),
(180, 18, 47, 42, 'OSI LAN MAN WAN'),
(181, 18, 46, 42, 'alamat'),
(182, 18, 47, 47, 'LAN MAN WAN'),
(183, 18, 48, 47, 'physical layer datalink layer network layer transport layer sesion layer presentation layer aplication layer\r\n'),
(184, 18, 46, 47, 'world wide web'),
(185, 20, 42, 49, 'WORLD WIDE WEB'),
(186, 20, 44, 49, 'LAN, MAN, WAN, WIRELLESS, INTERNET'),
(187, 20, 45, 49, 'PHYSICAL LAYER\r\nDATA LINK LAYER\r\nNETWORK LAYER\r\nTRANSPORT LAYER\r\nSESSION LAYER\r\nPRESENTATION LAYER\r\nAPPLICATION LAYER\r\n'),
(188, 20, 45, 51, '1.aplication\r\n2.presentation\r\n3.session\r\n4.transport\r\n5.network\r\n6.datalink\r\n7.physical'),
(189, 20, 44, 51, '1.LAN\r\n2.MAN\r\n3.WAN'),
(190, 20, 42, 51, 'World Wide Web'),
(191, 20, 45, 52, 'Physical\r\nData Link\r\nNetwork\r\nTransport\r\nSession\r\nPresentation\r\nApplication'),
(192, 20, 42, 52, 'World Wide Web'),
(193, 20, 44, 52, 'LAN(Local Area Network)\r\nMAN(Metropolitan Area Network)\r\nWAN(Wide Area Network)'),
(194, 20, 45, 55, 'physical layer, data-link layer, network layer, transport layer, session layer, presentation layer, aplication layer'),
(195, 20, 44, 55, 'LAN , MAN , WAN'),
(196, 20, 42, 55, 'world wide web'),
(197, 20, 44, 58, 'LAN,MAN,WAN'),
(198, 20, 42, 58, 'world wide web'),
(199, 20, 45, 58, 'phsycal layer, data link layer, network layer, transport layer, session layer, presentation layer, application layer'),
(200, 20, 44, 50, 'Jaringan LAN\r\nJaringan MAN\r\nJaringan WAN'),
(201, 20, 42, 50, 'WORLD WIDE WEB'),
(202, 20, 45, 50, '1. Aplication layer\r\n2. presentation layer\r\n3. session layer\r\n4. transport layer\r\n5. network layer\r\n6. data link layer\r\n7. pysical layer\r\n'),
(203, 20, 42, 68, 'world wide web'),
(204, 20, 45, 68, 'application,presentation,sesion,transport,network,data link,physical'),
(205, 20, 44, 68, 'LAN,MAN,WAN'),
(206, 20, 42, 54, 'world wide web'),
(207, 20, 45, 54, 'application layer, presentation layer, session layer, transport layer, network layer, data-link layer, physical layer '),
(208, 20, 44, 54, 'lan, man, wan'),
(209, 20, 42, 72, 'world wide web'),
(210, 20, 45, 72, 'Physical Layer,Data link,Network Layer,Transport Layer,Session Layer,Presentation Layer,Aplication Layer '),
(211, 20, 44, 72, 'LAN\r\nMAN \r\nWAN'),
(212, 20, 45, 65, 'application layer,presentation layer,session layer,transport layer,network layer,data link,phisical layer'),
(213, 20, 44, 65, 'LAN,MAN,WAN'),
(214, 20, 42, 65, 'WORLD WIDE WEB'),
(215, 20, 42, 59, 'Worldwide Web'),
(216, 20, 45, 59, 'Application Layer, Presentation layer, Session layer, Transport layer, Network layer, Data link layer, Physical layer'),
(217, 20, 44, 59, 'LAN, MAN, WAN'),
(218, 20, 45, 66, 'application layer, presentation layer, session layer, transport layer, network layer, data link layer, pisical layer.'),
(219, 20, 42, 66, 'world  wide web.'),
(220, 20, 44, 66, 'LAN, MAN, WAN.'),
(221, 20, 44, 57, 'LAN, MAN, WAN'),
(222, 20, 42, 57, 'word wide web'),
(223, 20, 45, 57, 'physical, data link, network, transport, sesion, presentation, application'),
(224, 20, 45, 53, 'Physical Layer,Data Link Layer,Network Layer,Transport Layer,Session Layer,Presentation Layer,Application Layer'),
(225, 20, 44, 53, 'LAN,MAN,WAN'),
(226, 20, 42, 53, 'World Wide Web'),
(227, 20, 44, 71, 'LAN, MAN, dan WAN.'),
(228, 20, 45, 71, 'application layer, presentation layer, sassion layer, transport  layer, nerwork layer , datalink layer, phiysical layer.'),
(229, 20, 42, 71, 'world wide web'),
(230, 20, 42, 67, 'world wide web'),
(231, 20, 45, 67, 'application layer, presentation layer, session layer, transport layer, network layer, data link layer, dan phisycal layer'),
(232, 20, 44, 67, 'LAN, MAN dan WAN'),
(233, 20, 45, 77, '1.physical\r\n2.data link\r\n3.network\r\n4.transport\r\n5. session\r\n6.presentation\r\n7. application'),
(234, 20, 42, 77, 'World Wide Web'),
(235, 20, 44, 77, '1. LAN\r\n2. MAN\r\n3. WAN'),
(236, 20, 42, 69, 'wold.wide.web.'),
(237, 20, 45, 69, 'physical,data link,network,transport,session,presentation,application'),
(238, 20, 44, 69, 'LAN,MAN,WAN'),
(239, 20, 45, 75, 'Application Layer,Persentation Layer,Session Layer,Transport Layer,Network Layer,Datalink Layer,Dan Phisycal Layer'),
(240, 20, 44, 75, 'LAN,MAN,Dan WAN'),
(241, 20, 42, 75, 'world wide web'),
(242, 20, 45, 61, 'application layer,physical layer,transport layer,session layer,network layer,presentation layer dan data link layer\r\n'),
(243, 20, 44, 61, 'model osi'),
(244, 20, 42, 61, 'web wide work'),
(245, 20, 42, 70, 'world.wide.web'),
(246, 20, 45, 70, 'aplication layer,phisical layer,sesion layer,transport layer,network layer,data link layer,presentation layer'),
(247, 20, 44, 70, 'topologi bus, topologi ring, topologi mess,topologi star'),
(248, 20, 44, 76, 'lan,man,wan'),
(249, 20, 42, 76, 'world wide web'),
(250, 20, 45, 76, 'aplikasi layer, presentation layer ,session layer,transport layer,  network layer, dataling layer, pisical layer'),
(251, 20, 44, 56, 'topologi star, topologi pohon, topologi bus, topologi cincin'),
(252, 20, 42, 56, 'World wide web'),
(253, 20, 45, 56, '1. aplication layer; 2. presentasion layer; 3. session layer; 4. transport layer; 5. network layer; 6. data link layer; 7. physical layer '),
(254, 20, 45, 62, 'application layer,physical layer,session layer,transport layer,network layer,data link layer,presentation layer.'),
(255, 20, 44, 62, 'topologi bus, topologi tree, topologi star,topologi ring'),
(256, 20, 42, 62, 'World Wide Web '),
(257, 20, 42, 63, 'world wide web'),
(258, 20, 45, 63, 'aplication layer, phycikal layer, sesion layer, transport layer, network layer, data link layer, presentation layer'),
(259, 20, 44, 63, 'topologi star, topologi pohon, topologi bus, topologi cincin'),
(260, 20, 42, 64, 'word wide web'),
(261, 20, 45, 64, 'phisical layer, data link layer,network layer, transport layer,sesion layer, presentation layer, aplication layer'),
(262, 20, 44, 64, 'Model OSI'),
(263, 20, 45, 60, '1.physical layer,2.data link layer,3.network layer,4.transportation layer,5.session layer,6.presentation layer,7.aplication layer.'),
(264, 20, 44, 60, 'LAN,WAN,MAN'),
(265, 20, 42, 60, 'World Wide Web'),
(266, 20, 45, 73, '1. Pisichal layer,2. Data link layer,3. Network layer, 4. Sesion layer,5. Presentation layer 6.Aplications layer.'),
(267, 20, 42, 73, 'Wolrd Wide Web'),
(268, 20, 44, 73, 'LAN,WAN,MAN'),
(269, 20, 42, 74, 'word wide web'),
(270, 20, 44, 74, 'star, tree, bus, ring'),
(271, 20, 45, 74, 'pysical layer, datalink layer,network layer,session layer, trasport layer, presesentation, aplikation'),
(272, 18, 47, 97, 'LAN, MAN, WAN'),
(273, 18, 48, 97, 'physical, data link, network, transport, session, presentation, application'),
(274, 18, 46, 97, 'world wide web'),
(275, 19, 50, 114, '1. LAN (Local Area Netowrk). MAN (Metropolitan Area Network). WAN (Wide Area Network)'),
(276, 19, 51, 114, 'Aplication Layer :Presentation Layer Session layer: Transport layer : Network layer : Data-link layerPhysical layer : '),
(277, 19, 49, 114, 'world wide web'),
(278, 19, 50, 113, 'MAN, WAN, LAN'),
(279, 19, 49, 113, 'World Wide Web'),
(280, 19, 51, 113, 'physical layer, data link layer, network layer, transport layer, session layer, presentation layer, application layer'),
(281, 19, 50, 118, 'LAN, MAN, WAN'),
(282, 19, 49, 118, 'Waring Wera Wenua'),
(283, 19, 51, 118, 'physical layer, data-link layer, network layer, transport layer, session layer, presentation layer, application layer'),
(284, 19, 51, 106, 'application layer,presentation layer,session layer,transport layer,network layer,data link layer,physical layer'),
(285, 19, 50, 106, 'LAN,MAN,WAN'),
(286, 19, 49, 106, 'word wide web'),
(287, 19, 49, 120, 'worldwideweb'),
(288, 19, 51, 120, 'Aplication Layer,Presentation Layer,Session layer,Transport layer,Network layer ,Data-link layer,Physical layer'),
(289, 19, 50, 120, 'LAN,MAN,WAN'),
(290, 19, 50, 119, 'PAN, LAN, MAN, WAN'),
(291, 19, 51, 119, 'Physical, Datalink, Network, Transport, Session, Presentation, Application'),
(292, 19, 49, 119, 'World Wide Web'),
(293, 19, 50, 123, 'LAN MAN WAN'),
(294, 19, 51, 123, 'PHYSICAL APLIKASI '),
(295, 19, 49, 123, 'WORD WIDE WEB'),
(296, 19, 49, 112, 'World Wide Web'),
(297, 19, 51, 112, 'Physical, Data Link, Network, Transport, Session, Presentasion, Application'),
(298, 19, 50, 112, 'LAN, MAN, WAN, PAN'),
(299, 19, 50, 122, 'LAN (Local Area Network),MAN (Metropolitan Area Network),WAN (Wide Area Network).'),
(300, 19, 51, 122, 'Phisical,Data link,Network,Transport,Session,Presentation,Application'),
(301, 19, 49, 122, 'World wide web'),
(302, 19, 49, 116, 'world wide web'),
(303, 19, 50, 116, 'LAN\r\nMAN\r\nWAN\r\nPON'),
(304, 19, 51, 116, 'a. physical\r\nb. network\r\nc. datalink\r\nd. transport\r\ne. session\r\nf. application'),
(305, 19, 51, 127, 'Physical, Data link, Network, Transport, Session, Presentation, Application'),
(306, 19, 50, 127, 'LAN, MAN, WAN'),
(307, 19, 49, 127, 'Word Wide Web'),
(308, 19, 49, 125, 'World Wide Web'),
(309, 19, 51, 125, 'physical,data link,network,transport,sesion,presentation, aplication'),
(310, 19, 50, 125, 'LAN ,MAN, WAN, PAN'),
(311, 19, 51, 126, 'Physical Layer, Data-Link Layer, Network Layer, Transport Layer, Session Layer, Presentation Layer, dan Application Layer'),
(312, 19, 50, 126, 'LAN, MAN, WAN. Internet, Wired, Wireless'),
(313, 19, 49, 126, 'World Wide Web'),
(314, 19, 51, 117, 'physical,data link, network,session, tranport, presentation, application'),
(315, 19, 50, 117, 'MAN, LAN, WAN, PAN, wirelles'),
(316, 19, 49, 117, 'world wide web'),
(317, 19, 51, 115, 'Physical layer, Datalink layer, Network layer, sesion layer, transpost layer, presentation layer, aplikasion layer.'),
(318, 19, 50, 115, 'LAN, MAN, WAN, PAN'),
(319, 19, 49, 115, 'WORD WIDE WEB'),
(320, 19, 50, 121, 'LAN,MAN,WAN,PAN'),
(321, 19, 49, 121, 'Wide World Web'),
(322, 19, 51, 121, 'physical layer,presentasion layer,network layer,presentasion layer,transport layer,session layer,application layer'),
(323, 19, 49, 132, 'wide word wep'),
(324, 19, 51, 132, 'application,session,network,trasport,physical'),
(325, 19, 50, 132, 'LAN MAN WAN P'),
(326, 19, 50, 131, 'LAN,MAN,WAN'),
(327, 19, 49, 131, 'World Wide Web'),
(328, 19, 51, 131, 'Physical,DataLink,NETWORK,TRANSPORT,SESSION,PRESENTATION,APLICATION'),
(329, 19, 49, 130, 'world wide web'),
(330, 19, 51, 130, 'application layer,sesion layer,transport layer,network layer,data link,phisycal layer,presentation layer'),
(331, 19, 50, 130, 'lan, man , wan'),
(332, 19, 49, 130, 'world wide web'),
(333, 19, 51, 130, 'application layer,sesion layer,transport layer,network layer,data link,phisycal layer,presentation layer'),
(334, 19, 50, 130, 'lan, man , wan'),
(335, 19, 49, 129, 'World Wide Web'),
(336, 19, 50, 129, 'Lan,Wan,Man'),
(337, 19, 51, 129, 'Pysycal,Data link,network,transport,session,presentation,aplication'),
(338, 19, 49, 128, 'world wide web'),
(339, 19, 51, 128, 'physical,network,data link,internet,session,presentasi,aplikasi'),
(340, 19, 50, 128, 'Lan,Man'),
(341, 19, 51, 136, 'physical layer,data link layer,network layer,transport layer,session layer,presentation layer,aplicaton layer.'),
(342, 19, 49, 136, 'world wide web'),
(343, 19, 50, 136, 'LAN,MAN,WAN'),
(344, 19, 49, 134, 'World Wide Web'),
(345, 19, 51, 134, 'Physical layer, Data-link layer, Network layer, Transport layer,  Session layer, Presentation Layer , Aplication Layer'),
(346, 19, 50, 134, 'LAN, MAN, WAN'),
(347, 19, 49, 133, 'WORLD WIDE WED'),
(348, 19, 51, 133, 'Physical layer, Data-link layer,  Network layer, Transport layer, Session layer, Presentation Layer dan Aplication Layer'),
(349, 19, 50, 133, 'LAN, MAN DAN WAN'),
(350, 19, 50, 137, 'LAN,MAN,WAN'),
(351, 19, 49, 137, 'WORLD,WIDE,WEB'),
(352, 19, 51, 137, 'APLICATION LAYER 7\r\nPRESENTATION LAYER 6\r\nSESION LAYER 5\r\nTRANSPORT LAYER 4\r\nNETWORK LAYER 3\r\nDATA LINK LAYER 2\r\nPYSICAL LAYER 1'),
(353, 19, 49, 138, 'Word Wide Web'),
(354, 19, 50, 138, 'LAN\r\nMAN\r\nWAN'),
(355, 19, 51, 138, 'Physical layer\r\nData-link layer\r\nNetwork layer\r\nTransport layer\r\nSession layer\r\nPresentation layer\r\nAplication layer'),
(356, 19, 50, 135, '1. LAN (Local Area Netowrk)\r\n2. MAN (Metropolitan Area Network)\r\n3. WAN (Wide Area Network)'),
(357, 19, 51, 135, 'aplication,presentation,session.transport,network,datalink,physical'),
(358, 19, 49, 135, ' World Wide Web'),
(359, 19, 51, 139, '1. Application\r\n2. Presentasion\r\n3. Session\r\n4. Transport\r\n5. Network\r\n6. Data link \r\n7. Physical'),
(360, 19, 49, 139, 'World Wide Web'),
(361, 19, 50, 139, 'LAN\r\nMAN\r\nWAN'),
(362, 19, 49, 143, 'Word Wide Web'),
(363, 19, 50, 143, 'LAN,MAN,WAN'),
(364, 19, 51, 143, 'PHYSICAL LAYER,DATA LINK,APLICATION LAYER,TRANSPORT LAYER,SESSION'),
(365, 19, 49, 142, 'WORLD WIDE WEB'),
(366, 19, 50, 142, 'LAN,MAN,WAN'),
(367, 19, 51, 142, 'PHYSICAL,DATA LINK,APLICATION,TRANSPORT,SESION');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `wali_kelas` int(5) DEFAULT NULL,
  `ketua_kelas` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `ruang`, `wali_kelas`, `ketua_kelas`) VALUES
(1, 'X-TKJ1', 'G-1', 1, 1),
(2, 'X-TKJ2', 'G-2', 2, 2),
(3, 'X-TKJ3', 'G-3', 3, 3),
(6, 'XI-TKJ1', 'B-1', NULL, NULL),
(7, '  XI-TKJ2', 'B-2', NULL, NULL),
(8, '  XI-TKJ3', 'B-3', NULL, NULL);

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
(5, 'A5', 'TIK'),
(6, 'SI', 'Sistem Komputer'),
(7, 'AL', 'Administrasi LAN');

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
(16, 17, 9, 57.735026918963),
(17, 17, 12, 57.735026918963),
(18, 17, 13, 81.649658092773),
(20, 20, 15, 38.327663808702);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `web` varchar(60) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `nip`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `email`, `alamat`, `jabatan`, `foto`, `web`, `username`, `password`, `pass`, `status`) VALUES
(16, '12345', 'Pak Farkhan', 'Banjarnegara', '1993-02-22', 'L', 'Islam', '06132165', 'asd@asd.asd', 'Banjarnegara', 'Bahasa Indonesia', 'anonim.png', '', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'aktif'),
(17, '15110284', 'Pak Kurnia', 'Banjarnegara', '1998-11-11', 'L', 'Islam', '06132165', 'l@gmail.com', 'Banjarnegara', 'Wali Kelas', 'anonim.png', '', '15110284', '48871a149f6a5a5ed716ebd2931c33b6', '15110284', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `thn_masuk` int(5) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `nama_ayah`, `nama_ibu`, `no_telp`, `email`, `alamat`, `id_kelas`, `thn_masuk`, `foto`, `username`, `password`, `pass`, `status`) VALUES
(9, '123', 'Dzaki', 'purbalingga', '1997-06-22', 'L', 'Islam', 'He', 'Ho', '090890798787', 'islakhun@gmail.com', 'iii', '1', 2020, 'anonim.png', '0217', '6e4d97fcf372625b900dbef16915d429', '0217', 'aktif'),
(10, '0987', 'Rilas Agung Pambudi', 'Banjarnegara', '1995-02-22', 'L', 'Islam', 'He', 'Ho', '090890798787', 'admin@gmail.com', 'sadsad', '1', 2010, 'anonim.png', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'aktif'),
(14, '123423', 'Darma Jati', 'Banjarnegara', '2000-02-22', 'L', 'Islam', 'Sawer', 'Wise', '06132165', 'l@gmail.com', 'sdas', '6', 2002, 'anonim.png', '000000', '670b14728ad9902aecba32e22fa4f6bd', '000000', 'aktif'),
(15, '909090', 'Agung Pambudi', 'B', '2000-02-20', 'L', 'Islam', 'Carl', 'Wise', '06132165', 'l@gmail.com', 'Banajrnea', '6', 2006, 'anonim.png', '909090', 'df780a97b7d6a8f779f14728bccd3c4c', '909090', 'aktif'),
(16, '787878', 'Jati Prastyo', 'Banjarnegara', '2000-02-20', 'L', 'Islam', 'Carl', 'WIse', 'o08797', 'l@gmail.com', 'jhgb', '6', 2000, 'anonim.png', '727272', 'ce22c27f9cf67f58d458bb6bd002282c', '727272', 'aktif'),
(17, '5752', 'herni astuti', 'banjarnegara', '2001-02-06', 'P', 'Islam', 'siswo', 'saliem', '083865884163', 'herniastuti6570@gmail.com', 'jalatunda,mandiraja', '7', 2018, 'anonim.png', '*5752', '898436c11a177dee62f7211bc09120d0', '*5752', 'aktif'),
(18, '5749', 'Galang Arsandy Noverdan Putra', 'Banjarnegara', '2003-11-04', 'L', 'Islam', 'Robin Panjaitan', 'Fajri Naryati', '085325995552', 'verdangalang@gmail.com', 'Ds.LemahJaya RT 03/RW 01, Wanadadi ,Banjarnegara', '7', 2018, 'anonim.png', '5749', '0e98aeeb54acf612b9eb4e48a269814c', '5749', 'aktif'),
(19, '5751', 'Helma Tria Sari', 'Banjarnegara', '2003-06-18', 'P', 'Islam', 'Sudiyo', 'Arti', '08978047165', 'Helmatriasari18@gmail.com', 'Mandirja Kulon Rt03/04', '7', 2018, 'anonim.png', 'Helma Tria Sari', '2b89e0e9f6ad06d2e988701bdc2590fb', 'helmatriasari*', 'aktif'),
(20, '5741', 'Descham ilyasa otmar', 'Banjarnegara', '2003-12-25', 'L', 'Islam', 'Budi sumarwan', 'Khotimah', '089665504439', 'deskamaja@gmail.com', 'ds.Kalipelus kec.Purwanegara kab.Banjarnegara', '7', 2018, 'anonim.png', '5741', 'edea298442a67de045e88dfb6e5ea4a2', '5741', 'aktif'),
(21, '5755', 'Jyeming Rangga Henryansyah', 'Banjarnegara', '2003-04-11', 'L', 'Islam', 'Henry', 'Nurhayati', '085842934148', 'jyemingrangga007@gmail.com', 'kebondalem 03/01', '7', 2018, 'anonim.png', '5755', '840d68cbbbfa627cd4635408a6c82009', '5755', 'aktif'),
(22, '5746', 'ELA TRIANA', 'BANJARNEGARA', '2002-07-19', 'P', 'Islam', 'WAGIYO HADIYANTO', 'SALIMAH', '083109563878', 'elatriana0@gmail.com', 'SOMAWANGI, MANDIRAJA', '7', 2018, 'anonim.png', '5746', 'dc676f9256c5aeb98c9d2b8bf2158e95', '*576', 'aktif'),
(23, '5750', 'Harun Al Rasyid', 'Banjarnegara', '2003-02-06', 'L', 'Islam', 'Sugeng Haryanto', 'Susi Eka Raharti', '+6287734074260', 'harunar246@gmail.com', 'Blambangan RT 05 RW 04, Bawang, Banjarnegara', '7', 2018, 'anonim.png', '5750', 'ceacd3c697da3046352040ee63bcff24', 'harun4554', 'aktif'),
(24, '5743', 'Dimas Rizki Setyawan', 'Banjarnegara', '2001-06-30', 'L', 'Islam', 'Muhammad Anis Ma\'ruf', 'Kasmi', '0895384914292', 'dimasrizki743@gmail.com', 'Karang Tengah RT 06 RW 03', '7', 2018, 'anonim.png', '5743', '31f81674a348511b990af268ca3a8391', '5743', 'aktif'),
(25, '5761', 'Nur Hidayattulloh', 'Banjarnegara', '2003-03-31', 'L', 'Islam', 'Slamet Riyadi', 'Friyanti', '082242096084', 'ndayattt@gmail.com', 'Banjarnegara, Kec.Purwanegara, Desa.MERTASARI RT 03/01', '7', 2018, 'anonim.png', '5761', '264114e7be207a990e11819661437146', 'NURHIDAYATTULLOH', 'aktif'),
(26, '5740', 'BANGKIT RIZKI SAEFUDIN', 'BANJARNEGARA', '2002-12-22', 'L', 'Islam', 'TAUFIK ADIS SAPUTRA', 'SRI WAHYUNI', '085730946410', 'bangkitrizki35@gmail.com', 'JEMBANGAN RT03/RW04, PUNGGELAN, BANJARNEGARA', '7', 2018, 'anonim.png', '5740', '9be681ea06f52111e4c1ef99d3763770', '5740', 'aktif'),
(27, '5736', 'Adinda rizqi pratiwi', 'Banjarnegara', '2001-12-28', 'P', 'Islam', 'suwarno', 'puji winarti', '085346233398', 'adindariskip9@gmail.com', 'Banjarnegara mantrianom rt 02 rw 01', '7', 2017, 'anonim.png', 'adindariskip', 'a7e1f812054a418866c0308446d24789', 'dimasbagas', 'aktif'),
(28, '5758', 'Muhammad Rizki Adi Ardana', 'Banjarnegara', '2003-05-28', 'L', 'Islam', 'Muhammad Supriyanto', 'Farida Hariyani', '089655228435', 'rizkiardana23@gmail.com', 'Bandingan RT0/5 RW0/1,Kecamatan Bawang,Kabupaten Banjarnegara', '7', 2018, 'anonim.png', '5758', '588e343066cf54ec3db5132231df7d68', '5758', 'aktif'),
(29, '5742', 'didit aryadi saputra', 'Banjarnegara', '2003-04-06', 'L', 'Islam', 'adman prasetyo', 'supriyati', '081236051361', 'diditaryadi855@gmail.com', 'Kalilunjar rt 2 rw 2,Banjarmangu,Banjarnegara', '7', 2018, 'anonim.png', '5742', 'c7be03f5d811ed29c328526ca8ab0d61', '5742', 'aktif'),
(30, '5738', 'arjuna mahardika whi whi pamungkas ', 'banjarnegara', '2003-07-11', 'L', 'Islam', 'whiwhi suwignyo', 'umi winarni', '085712643799', 'arjunapeter11@gmail.com', 'banjarnegara,purwanegara,merden, rt4/5', '7', 2018, 'anonim.png', 'arjunamahardika', 'abde187ead63f19c6d493f2f788fdae4', 'arjuna123', 'aktif'),
(31, '5770', 'Yoga Sena Zahid Al Abid', 'Banjarnegara', '2003-03-19', 'L', 'Islam', 'Fajar Supriyono', 'Misdah', '', 'zenajagapati@gmail.com', 'Krandegan RT 01 RW 02', '7', 2018, 'anonim.png', '5770', '4b7a55505729b7f664e7222960e9c2d5', '5770', 'aktif'),
(32, '5759', 'nabil ishmatulloh', 'banjarnegara', '2003-05-19', 'L', 'Islam', 'misngadiono', 'siti masliah', '085869507325', 'nabilishmatulloh@gmail.com', 'purwanegara,merden rt 7 rw1', '7', 2018, 'anonim.png', '*5759', '0bac128248ab56f13a5c146d17bb9568', '*5759', 'aktif'),
(33, '5747', 'FEBI OKTA ARYANI', 'BANJARNEGARA', '2002-10-19', 'P', 'Islam', 'CIPTO WALUYO', ' SUHARTI', '089669657012', '', 'WANAKARSA RT05 RW01 WANADADI BANJARNEGARA', '7', 2018, 'anonim.png', '5747', '56d326d8139f904b679084778f1b3285', '5747', 'aktif'),
(34, '5748', 'Friska Bella Utami ', 'Banjarnegara', '2003-10-29', 'P', 'Islam', 'Sabarudin', 'Sulis Tiyah', '083844436746', 'friskabella29@gmail.com', 'Lemah Jaya rt 04 rw 01 kec.Wanadadi kab.Banjarnegara ', '7', 2018, 'anonim.png', '5748', '1db3fa8e5bbd04882892f478a301a311', '5748', 'aktif'),
(35, '5753', 'Indriyani', 'Banjarnegara', '2003-06-15', 'P', 'Islam', 'Mudiarjo Al Karman', 'Rukiyem', '085643295394', 'indri5012@gmail.com', 'Mandiraja Kulon,Banjarnegara', '7', 2018, 'anonim.png', '5753*', 'd7a817890c2257aaee9e2a0de7228ba2', '5753*', 'aktif'),
(36, '5739', 'Asri karisma ramadhani', 'banjarnegara', '2004-10-31', 'P', 'Islam', 'Tusino', 'Khotijah', '085643105659', 'asrikharisma123@gmail.com', 'karanganyar rt 6 rw 3 kec.Purwanegara kab.Banjarnegara*', '7', 2018, 'anonim.png', '5739*', 'd1c64c35a69a38bbbf6a2eedc9421c4a', '5739*', 'aktif'),
(38, '5764', 'raikhan putra pratama', 'jakarta', '2003-06-10', 'L', 'Islam', 'hadi priyanto', 'nasem', '082116343263', 'raikhanputrapratama4@gmail.com', 'danaraja rt03/08\r\n', '7', 2018, 'anonim.png', '5764', '9715d04413f296eaf3c30c47cec3daa6', '5764', 'aktif'),
(39, '5762', 'puput apriliani', 'banjarnegara', '2003-04-04', 'P', 'Islam', 'sakhirin wahyudianto', 'adhmirah', '085325753722', 'puputtapriliani@gmail.com', 'parakan gadog rt 03 rw 01', '7', 2018, 'anonim.png', '5762', 'd384dec9f5f7a64a36b5c8f03b8a6d92', '5762', 'aktif'),
(40, '5756', 'mezzaluna aprilia', 'Banjarnegara', '2003-06-04', 'P', 'Islam', 'slamet pujiarto', 'winarni', '083862023373', 'mzlnaa@gmail.com', 'kasilib rt 01rw 01', '7', 2018, 'anonim.png', '5756', '7ecd070e606afbf07a07c32e7267051f', '5756', 'aktif'),
(41, '5760', 'Ngaziz Ryan Hidayat', 'Banjarnegara', '2003-04-24', 'L', 'Islam', 'Alm.Sohad', 'Sulasmi', '085799145114', 'ngazizryan35@gmail.com', 'karanganyar rt2/rw1,madukara,banjarnegara', '7', 2018, 'anonim.png', '5760', 'c69f55e159f0f93abbfc48f94ad7f46e', '5760*', 'aktif'),
(42, '5768', 'Umu lutfiatur rohmah', 'Banjarnegara', '2003-12-04', 'P', 'Islam', 'Moch.Aminudin', 'Adriyah', '085726255763', 'umulutfiatur@gmail.com', 'kincang rt02 rw03', '7', 2018, 'anonim.png', '5768', '4feb2371a1843d099b28dd419dbab1ef', '5768', 'aktif'),
(43, '5767', 'Umi dwi oktaviyani', 'Banjarnegara ', '2002-10-09', 'P', 'Islam', 'Achmad pursanto sudakir', 'Saniyah', '081282707547', 'umidwioktafiani@gmail.com', 'tapen rt 03/rw 03', '7', 2018, 'anonim.png', '5767', 'b8b12f949378552c21f28deff8ba8eb6', '5767', 'aktif'),
(44, '5766', 'SUKMA RAHMAWATI', 'BANJARNEGARA', '2019-05-31', 'P', 'Islam', 'JARKOSI', 'ASIAH', '082324117166', 'sukmarahmawati561@gmail.com', 'SIDARATA 03/01', '7', 2018, 'anonim.png', '5766', '3465ab6e0c21086020e382f09a482ced', '5766', 'aktif'),
(45, '5757', 'MUHAMAD ZULFA MUHYIDIN', 'BANJARNEGARA', '2002-03-13', 'L', 'Islam', 'RATMO', 'PARWATI', '083861749815', 'muhamadzulfa5009@gmail.com', 'LINGGASARI RT 03 RW 01', '7', 2018, 'anonim.png', '5757', '25f9e794323b453885f5181f1b624d0b', '123456789', 'aktif'),
(46, '5763', 'RAHMAN HAKIM', 'RAKIT,BANJARNEGARA', '2002-02-05', 'L', 'Islam', 'PASUN', 'MUTINGAH', '', 'rahmanhkm89@gmail.com', 'RAKIT BANJARNEGARA', '7', 2018, 'anonim.png', '5763', '1819020b02e926785cf3be594d957696', '5763', 'aktif'),
(47, '5765', 'SATRIA ADHI NUGRAHA', 'Banjarnegara', '2002-12-26', 'L', 'Islam', 'NURKHARIS', 'MARDIYAH', '097757913548', 'Satriafreedom00@gmail.com', 'BLAMBANGAN RT 2/8', '7', 2018, 'anonim.png', '5765', '8b10a9280bd46b8874af9b5cadec91d5', '5765', 'aktif'),
(48, '5737', 'Andi Alif Atthoriq', 'Banjarnegara', '2002-09-20', 'L', 'Islam', 'Andi Yanto', 'Sulastri', '', '', 'Kasilib rt 04 rw 01', '7', 2018, 'anonim.png', '5737', 'e6e9099e59636a015536fbb07f979201', '5737', 'aktif'),
(49, '5716', 'Ika San Syabila', 'Banjarnegara', '2003-01-11', 'P', 'Islam', 'Salim Nurhadi', 'Suswati', '082224018040', 'ikasansyabila01@gmail.com', 'Kutayasa RT 03 RW 02', '6', 2018, 'anonim.png', '5716', 'fd4771e85e1f916f239624486bff502d', '5716', 'aktif'),
(50, '5719', 'LIONITA SARI', 'BANJARNEGARA', '2003-04-01', 'P', 'Islam', 'SLAMET', 'TASMIYAH', '082314842037', 'lionitasari543@gmail.com', 'Kutayasa RT 04 RW 02', '6', 2018, 'anonim.png', '5719', '0b33f2e8843e8b440dd8caf7086995b0', '5719', 'aktif'),
(51, '5702', 'Anwarru Romadon', 'Banjarnegara', '2003-11-15', 'L', 'Islam', 'Mundirin', 'Munjariah', '081215421468', 'anwaruromadon@gmail.com', 'Wiramastra RT 01/RW 01', '6', 2018, 'anonim.png', '5702', 'ba500f04049a8eece1e23e36ea7bbab0', '5702', 'aktif'),
(52, '5704', 'Delia Khilma Sofia', 'Banjarnegara', '2003-08-22', 'P', 'Islam', 'Khamid Abdulloh', 'Sumarni', '085747986266', 'deliakhilmasofia22@gmail.com', 'Pucungbedug RT 01 RW 03,Purwanegara,Banjarnegara', '6', 2018, 'anonim.png', '5704', 'ce11641e056f7b59aef8e9a42eaeb65b', '5704', 'aktif'),
(53, '5731', 'Rijal Mubarok', 'Banjarnegara', '2003-02-01', 'L', 'Islam', 'Samsudin', 'Riswati', '0895421917588', 'rijalten10@gmail.com', 'Mandiraja Kulon,Mandiraja,Banjarnegara', '6', 2018, 'anonim.png', 'rijal', '771ae64b2445bf709eb04c64a65e4ac2', 'kalisat1', 'aktif'),
(54, '5700', 'Pandu Darul Salam', 'Banjarnegara', '2003-02-07', 'L', 'Islam', 'Ali Sucipto', 'Mahyati', '', '', 'Badamita, RT/RW=O4/03', '6', 2018, 'anonim.png', 'Pandu Darussalam', 'a591024321c5e2bdbd23ed35f0574dde', '2003', 'aktif'),
(55, '5705', 'Dhuta Dhafit Farenza', 'Banjarnegara', '2002-08-12', 'L', 'Islam', 'Hadi Suripno', 'Eni Hartati', '08818506626', 'dhafidfz@gmail.com', 'Kaliwinasuh RT 02 RW 04\r\nKecamatan Purwareja Klampok\r\nKabupaten Banjarnegara', '6', 2018, 'anonim.png', 'Dhafit', 'fb7b6d9fe412c59a3a5e2aaa81629469', 'dhafidfzdevz', 'aktif'),
(56, '5711', 'FIKA NANDA MELIA NINGRUM', 'BANJARNEGARA', '2003-05-24', 'P', 'Islam', 'RUSMONO', 'SAMINAH', '085840309199', 'fikanandamn@gmail.com', 'Serang RT 03 RW 01, Kec. Bawang', '6', 2018, 'anonim.png', 'Fika Nanda MN', 'e002ba8d318869d843ffa38dd9dae70b', '240503', 'aktif'),
(57, '5718', 'Kefri ilalang', 'Banjarnegara', '2002-01-12', 'L', 'Islam', 'Subandi', 'Muslimah', '08996563032', 'KEFRI2002ILALANG@gmail.com', 'Gumiwang, Purwanegara, Banjarnegara RT 02 RW 09', '6', 2018, 'anonim.png', 'Kefri ', '74809654a20805d5a6cf934b7f813a26', 'dnxikey081', 'aktif'),
(58, '5720', 'Ma\'ruf Hermawan', 'Banjarnegara', '2003-08-08', 'L', 'Islam', 'Masrun', 'Ginah Irwanti', '082332057837', 'marufhermawan73@gmail.com', 'Kab. Banjarnegara , Kec. Bawang, Desa Blambangan RT03 RW04', '6', 2018, 'anonim.png', 'maruf', '4ded72bbf2ceca61da618d83c194dfe8', 'marufher73', 'aktif'),
(59, '5717', 'Juliani Nurkhasanah', 'Banjarnegara', '2002-07-05', 'P', 'Islam', 'Miswan', 'Marsini', '0895381368235', 'julianinurkhasanah57@gmail.com', 'Mandiraja Kulon RT 04/04\r\nKec. Mandiraja\r\nKab. Banjarnegara', '6', 2018, 'anonim.png', '5717', '2201fe9df5c0025ed553c6840807791d', 'julianink', 'aktif'),
(60, '5723', 'Muhammad Raphael Ariefriansyah', 'BEKASI', '2003-03-17', 'L', 'Islam', 'Sugiarto', 'Mimi Nurul Hitami', '0859144794657', 'raphaelast1703@gmail.com', 'desa gumingsir rt06 rw04 kelurahan sokanandi kecamatan banjarnegara kabupaten banjarnegara jawa tengah', '6', 2018, 'anonim.png', '5723', 'd94fd74dcde1aa553be72c1006578b23', '5723', 'aktif'),
(61, '5701', 'alfina gunawan', 'banjarnegara', '2003-07-08', 'P', 'Islam', 'nardi gunawan', 'khaliyem', '081228958597', '', 'adipasir,RT 07/02 kecamatan rakit', '6', 2018, 'anonim.png', '5701', 'bac49b876d5dfc9cd169c22ef5178ca7', '5701', 'aktif'),
(62, '5710', 'Febistia Wulandari', 'Banjarnegara', '2003-02-15', 'P', 'Islam', 'Nasirin', 'Sumiyati', '', '', 'Adipasir RT 01/02\r\nKecamatan Rakit\r\nKabupaten Banjarnegara', '6', 2018, 'anonim.png', '5710', '810462d01f318bd13e628a77fc3f92c0', '5710', 'aktif'),
(63, '5721', 'mega wandari', 'banjarnegara', '2003-07-27', 'P', 'Islam', 'manislam', 'mahsinem', '083820775000', 'megawandari@gmail.com', 'Gentansari RT 05 RW 01 kecamatan pagedongan kabupaten banjarnegara', '6', 2018, 'anonim.png', '5721', '5a66b9200f29ac3fa0ae244cc2a51b39', '5721', 'aktif'),
(64, '5706', 'Dwi Nurhayati', 'Banjarnegara', '2003-12-05', 'P', 'Islam', 'Suparjo Achmad Nur Sarjono', 'Sarinah', '081215713550', 'dwinur1205@gmail.com', 'Winong RT1 RW4 Kec. Bawang Kab. Banjarnegara', '6', 2018, 'anonim.png', '5706', '99607461cdb9c26e2bd5f31b12dcf27a', '5706', 'aktif'),
(65, '5700', 'AJI SUSILO', 'BANJARNEGARA', '2003-01-29', 'L', 'Islam', 'SUWARDI', 'SITI HOMSIAH', '082241269692', 'AJIDS2003@GMAIL.COM', 'BANJARNEGAR,BAWANG,MAJALENGKA RT02/RW08', '6', 2018, 'anonim.png', '5700', '84f5ddd735176becc72c3b1ff424149e', '5700', 'aktif'),
(66, '5732', 'Septiana Wulandari', 'Banjarnegara', '2002-02-02', 'P', 'Islam', 'Sarwono', 'Eni Maisaroh', '', '', 'Wanakarsa RT 02/ RW 02, Kec.Wanadadi, Kab. Banjarnegara', '6', 2018, 'anonim.png', '5732', 'c19af480c40e343bbac3e2c01967b09f', '5732', 'aktif'),
(67, '5729', 'Rifa Afifah', 'Banjarnegara', '2003-10-01', 'P', 'Islam', 'Suyitno', 'Sukimah', '', '', 'Mantrianom RT 01 RW 04 Kec.Bawang Kab.Banjarnegara', '6', 2018, 'anonim.png', '5729', '024677efb8e4aee2eaeef17b54695bbe', '5729', 'aktif'),
(68, '5727', 'Rendi Aprilisnto', 'Banjarnegara ', '2004-04-10', 'L', 'Islam', 'Suhono', 'Sunarsih', '082338057242', 'rendiapr485@gmail.com', 'SOMAWANGI RT 03 RW 01 KECAMATAN MANDIRAJA', '6', 2018, 'anonim.png', '5727', 'dc363817786ff182b7bc59565d864523', '5727', 'aktif'),
(69, '5703', 'asziza el alis', 'banjarnegara', '0002-09-09', 'P', 'Islam', 'riswoyo', 'risah', '085879733387', '', 'kalipelus rt01 rw0 4 kec.purwanegara', '6', 2018, 'anonim.png', '5703', 'f7dd39d47c6f28f7877155ccffad0192', '5703', 'aktif'),
(70, '5724', 'Noviana Ayu Amalia', 'Banjarnegara', '2003-11-20', 'P', 'Islam', 'Agus Supriyatno', 'Sunestri', '', '', 'Merden RT 07/RW 01 Kec. Purwanegara', '6', 2018, 'anonim.png', '5724', 'e49eb6523da9e1c347bc148ea8ac55d3', '5724', 'aktif'),
(71, '5714', 'gita oritsa saputri', 'banjarnegara', '2002-11-30', 'P', 'Islam', 'kasan', 'rokyati', '', 'gitasaputri9f@gmail.com', 'danaraja rt 03 rw 06, kec purwanegara', '6', 2018, 'anonim.png', '5714', '0fe6a94848e5c68a54010b61b3e94b0e', '5714', 'aktif'),
(72, '5733', 'Shidqi Naufal Ramadhan', 'Banjarnegara', '2003-11-15', 'L', 'Islam', 'Kartika Chandra Kirana', 'Nuri Handayani', '08112665077', 'shidqinaufal456@gmail.com', 'Gumiwang Rt 03 Rw 07\r\nKecamatan Purwanegara\r\nKabupaten Banjarnegara', '6', 2018, 'anonim.png', '5733', '0a988fc2992add2d3233e19c7aadfdea', '5733', 'aktif'),
(73, '5728', 'Reza Anang Nur Yaya', 'Banjarnegara', '2004-02-08', 'L', 'Islam', 'Lungguh Wahyudi', 'Suryati', '081212659593', 'rezaanang08@gmail.com', 'Desa Depok RT03 RW02 Kecamatan Bawang Kabupaten Banjarnegara', '6', 2018, 'anonim.png', '5728', '80b618ebcac7aa97a6dac2ba65cb7e36', '5728', 'aktif'),
(74, '5734', 'sulastri', 'banjarnegara,', '2002-03-09', 'P', 'Islam', 'suparno', 'tumiati', '', '', 'desa mertasari dukuh karangcengis  rt 05 rw 02, kec.purwanegara', '6', 2018, 'anonim.png', '5734', '860052df4915de4d6c3deac9f7ebf5cc', '5734', 'aktif'),
(75, '5730', 'Rifki Tegar Prasetya', 'Banjarnegara', '2004-02-06', 'L', 'Islam', 'Kusworo', 'Carni', '081392849288', 'rifkitegarp@gmail.com', 'Desa depok RT 2 RW 2 Kecamatan Bawang Kabupaten Banjarnegara ', '6', 2018, 'anonim.png', '5730', '3ce257b311e5acf849992f5a675188e8', '5730', 'aktif'),
(76, '5726', 'Qotrunada Yulia Puspa', 'Banjarnegara', '2003-09-07', 'P', 'Islam', 'Adman', 'Ngamidah', '', 'qotrunadayulipuspa@gmail.com', 'Bawang RT 05 RW 05 Kec.Bawang Kab.Banjarnegara', '6', 2018, 'anonim.png', '5726', '2c8ed8587468aec2462a3914f154e570', '5726', 'aktif'),
(77, '5707', 'EVI RATNASARI', 'BANJARNEGARA', '2003-08-28', 'P', 'Budha', 'SALIM', 'DWI SUHARWATI', '', 'eviratnasari9f@gmail.com', 'mandiraja wetan', '6', 2018, 'anonim.png', '5707', '18903e4430783a191b0cfab439daaef8', '5707', 'aktif'),
(106, '5206', 'Anggit Saputra', 'Banjarnegara', '2001-03-08', 'L', 'Islam', 'iswanto', 'suswati', '082220796432', 'anggitsaputra53@gmail.com', 'desa pucang,banjarnegara', '3', 2017, 'anonim.png', '5206', '261437f8c1faee9da932104581c4644e', '5206*', 'aktif'),
(107, '5251', 'GAYUH', 'BANJARNEGARA', '2002-02-22', 'L', 'Islam', 'KHADIRUN', 'KHOTIMAH', '082', 'gayuhrizki22@gmail.com', 'BANJARNEGARA WANADADI KARANGJAMBE RT 02 RW 01', '8', 2017, 'anonim.png', 'GAYUH', '6cafb35dca8d1f03970d76ac7e76ac30', 'GAYUH22', 'aktif'),
(112, '5212', 'Cindy Nova Syalsadila', 'Banjarnegara', '2001-11-30', 'P', 'Islam', 'Wahyu Utomo', 'Warni', '0895606496647', 'cindynova30@gmail.com', 'Gotong -  Royong Rt 04/04 Kutabanjarnegara, Banjarnegara', '3', 2017, 'anonim.png', '5212', 'c5d215777c229704a7862de577d40a73', '5212', 'aktif'),
(113, '5209', 'Azkiyyah Azizatun Nisa', 'banjarnegara', '2002-11-12', 'P', 'Islam', 'kisno', 'susanti', '085640180', 'azkiyyah123@gmail.com', 'mandiraja wetan', '3', 2017, 'anonim.png', '5209', '7b670d553471ad0fd7491c75bad587ff', '5209', 'aktif'),
(114, '5205', 'ANANDA YUNITA', 'BANJARNEGARA', '2001-10-29', 'P', 'Islam', 'SAHUDIN', 'SARTI', '081392613201', 'Ynita@gmail.com', 'Banjarnegara pagedongan gunungjati', '3', 2017, 'anonim.png', '5205', 'fea16e782bc1b1240e4b3c797012e289', '5205', 'aktif'),
(115, '5207', 'ASTRIANA EVI RAHAYU', 'BANJARNEGARA', '2002-08-16', 'P', 'Islam', 'MISWANTO', 'MISKIYAH', '085329316291', 'astrianaevirahayu16@gmail.com', 'kab. Banjarnegara. kec. wanadadi. Desa Lemahjaya', '3', 2017, 'anonim.png', '5207', '246a3c5544feb054f3ea718f61adfa16', '5207', 'aktif'),
(116, '5238', 'Zahra Fira Nurmalia', 'Banjarnegara ', '2001-03-07', 'P', 'Islam', 'Sutomo', 'Waunah', '081328705719', 'zahrafira28@gmail.com', 'Purwanegara tr02/rw04', '3', 2017, 'anonim.png', '5238', 'c5ab6cebaca97f7171139e4d414ff5a6', '5238', 'aktif'),
(117, '5225', 'NOFA TRI WAHYUNI', 'BANJARNEGARA', '2001-11-06', 'P', 'Islam', 'KHADI AHMAD MAHMUDIN', 'WALINEM', '085848234463', 'nofatriwahyuni76@gmail.com', 'Banjarnegara, Bondolharjo', '3', 2017, 'anonim.png', '5225', '169582a799e5b6c46fdfd432379f60d8', '5225', 'aktif'),
(118, '5237', 'YUSTY AGUSTYN', 'banjarnegara ', '2002-03-08', 'P', 'Islam', 'sirun', 'musrichayati', '085600433402', 'yustyagustyn@gmail.com', 'banjarnegara, mandiraja, mandiraja wetan', '3', 2017, 'anonim.png', '5237', '2adcefe38fbcd3dcd45908fbab1bf628', '5237', 'aktif'),
(119, '5217', 'Endah Setyarini', 'Wonogiri', '2002-06-13', 'P', 'Islam', 'Misar', 'Giyatmi', '08978052830', 'endahsetya362@gmail.com', 'Bawang, Bawang, Banjarnegara', '3', 2017, 'anonim.png', '5217', '5a7b238ba0f6502e5d6be14424b20ded', '5217', 'aktif'),
(120, '5216', 'Ega Diadara', 'Banjarnegara', '2001-11-30', 'P', 'Islam', 'Bambang S.P', 'Luwiyah', '082324108330', 'egadiadara@gmail.com', 'Sipedang,Banjarmangu,Banjarnegara', '3', 2017, 'anonim.png', '5216', '808e53023ea4a8a9d6ecbc1290580f72', '5216', 'aktif'),
(121, '5222', 'Muliana', 'Banjarnegara', '2002-07-06', 'P', 'Islam', 'Ahmad ari sumanto', 'misem', '085799635643', 'muliannaviking1933@gmail.com', 'kutabanjarnegara RT 07 RW 05, Banjarnegara, Jawa tengah', '3', 2017, 'anonim.png', '5222', '23e846638607adcbc730817a77581220', '5222', 'aktif'),
(122, '5269', 'Stevani Marita Triyani', 'Banjarnegara', '2002-03-23', 'P', 'Islam', 'Suliyanto', 'Sarmini', '081390121347', 'stevanimarita@gmail.com', 'Twelagiri rt 02/01\r\nkec.pagedongan\r\nkab.banjarnegara', '3', 2017, 'anonim.png', '5269', '1dc3a89d0d440ba31729b0ba74b93a33', '5269', 'aktif'),
(123, '5236', 'Yuda Candra Mey Dholandho', 'banjarnegara', '2002-11-05', 'L', 'Islam', 'Nintarso', 'Riris  Septi Wahyuningsih', '081227988998', 'yudacandramd@gmail.com', 'BANJARNEGARA PURWAREJA KLAMPOK KALIWINASUH', '3', 2017, 'anonim.png', '5236', '78289d91e9c4adcf4e97d6b3d4df6ae0', '5236', 'aktif'),
(125, '5234', 'Tommy irawan', 'banjarnegara', '2002-04-04', 'L', 'Islam', 'sukarno', 'miharti', '', '', 'somawangi', '3', 2017, 'anonim.png', '5234', '5d78d182fd5f5510588695863d22ac27', '5234', 'aktif'),
(126, '5208', 'Avisha Diaz Adisti', 'Banjarnegara', '2002-06-21', 'P', 'Islam', 'Soebedjo', 'Siti Haryatun', '085226363361', 'avishada2162@gmail.com', 'Mantrianom, Banagara RT 03/02', '3', 2017, 'anonim.png', '5208', '59b1deff341edb0b76ace57820cef237', '5208', 'aktif'),
(127, '5223', 'nanda riki permadi', 'Banjarnegara ', '2001-09-16', 'L', 'Islam', 'Sutaryo', 'Siti nasihatin', '082234429656', 'rikipermadi@gmail.com', 'Adipasir RT 01 RW 04 Rakit Banjarnegara', '3', 2017, 'anonim.png', 'nanda riki permadi', 'a15efdbba79afab0986ad635f7a854ad', 'sutaryo', 'aktif'),
(128, '5233', 'Suprianto', 'Banjarnegara', '2002-05-04', 'L', 'Islam', 'Sunaryo', 'Turiyem', '085826633989', 'sants9000@gmail.com', 'Pucungbedug Purwanegara Banjarnegara', '3', 2017, 'anonim.png', '5233', '26b58a41da329e0cbde0cbf956640a58', '5233', 'aktif'),
(129, '5231', 'Rozan Arya Pujangga', 'Banjarnegara', '2001-08-07', 'L', 'Islam', 'Sunaryo', 'Uswatun khasanah', '087878514252', 'rozanarya7@gmail.com', 'mandiraja wetan rt07/03', '3', 2017, 'anonim.png', '5231', 'a24281a03c28fa405eb29b54ebfe5d9b', '5231', 'aktif'),
(130, '5251', 'GAYUH RIZKI', 'BANJARNEGARA', '2002-02-22', 'L', 'Islam', 'KHADIRUN', 'KHOTIMAH', '082112967903', 'gayuhrizki22@gmail.com', 'wanadadi,karangjambe rt 02 rw 01', '3', 2017, 'anonim.png', '5251', '6fe43269967adbb64ec6149852b5cc3e', '5251', 'aktif'),
(131, '5204', 'Afida tri susanti', 'Banjarnegara', '2003-08-26', 'P', 'Islam', 'misto', 'suhartati', '085848234387', 'afida.trisusanti@gmail.com', 'desa purwonegoro', '3', 2017, 'anonim.png', '5204', '2e6d9c6052e99fcdfa61d9b9da273ca2', '5204', 'aktif'),
(132, '5235', 'Vica Amalia', 'Banjarnegara', '2002-04-27', 'P', 'Islam', 'suparno', 'Sartini', '083195412087', 'vicaamalia@gmail.com', 'blitar banjarnegara', '3', 2017, 'anonim.png', '5235', '923e325e16617477e457f6a468a2d6df', '5235', 'aktif'),
(133, '5259', 'PUPUT ADI SAPUTRA', 'BAJARNEGARA', '2001-12-06', 'L', 'Islam', 'ADIMIN', 'RISEM', '082225277561', 'PADIS1404@GMAIL.COM', 'PARAKAN RT 04/03', '3', 2017, 'anonim.png', '5259', 'f968fdc88852a4a3a27a81fe3f57bfc5', '5259', 'aktif'),
(134, '5257', 'Muhamad ZAhid Zidan', 'banjarnegara', '2002-05-17', 'L', 'Islam', 'Suselo', 'Andri Wulandari', '081228956063', 'zahidzidan2210@gmail.com', 'Kenteng rt 02/03, Kec.Madukara, Kab.Banjarnegara', '3', 2017, 'anonim.png', 'Muhamad Zahid Zidan', 'c5b08e3ddda539389e2c2fe96e70c283', 'zahidzidan', 'aktif'),
(135, '5214', 'Dewi Safitri', 'Banjarnegara', '2002-04-23', 'P', 'Islam', 'Sudaryo', 'sartini', '089635916259', 'dewilmaulana16@gmail.com', 'Banjarnegara\r\nPurwanegara\r\nParakan\r\n03/01', '3', 2017, 'anonim.png', '5214', '7417744a2bac776fabe5a09b21c707a2', '5214', 'aktif'),
(136, '5224', 'Nela lutfiyana sari', 'Banjarnegara', '2002-12-24', 'P', 'Islam', 'purnomo', 'badriyah', '082146950346', 'lutfiyanan@gmail.com', 'Banjarnegara\r\nWanadadi\r\nKandangwangi Rt 04/03', '3', 2017, 'anonim.png', '5224', 'cc384c68ad503482fb24e6d1e3b512ae', '5224', 'aktif'),
(137, '5203', 'adam wahyu mahardika', 'purbalingga', '2002-06-16', 'L', 'Islam', 'siswanto ', 'ekawati', '081228990460', 'dika@gmail.com', 'kab.purbalingga,kec.kejobong,timbang rt20 rw06', '3', 2017, 'anonim.png', '5203', '94130ea17023c4837f0dcdda95034b65', '5203', 'aktif'),
(138, '5254', 'Khoirun Satria Arifin', 'Banjarnegara', '2003-12-01', 'L', 'Islam', 'Pamuji', 'Napsiah', '081229782766', 'irunsatria78@gmail.com', 'Banjarnegara\r\nBawang\r\nMajalengka', '3', 2017, 'anonim.png', 'Khoirun S A', 'fd6e535f0b01810af32a292c44438371', 'khoirunsa', 'aktif'),
(139, '5232', 'SHINDY ADILLIA KUSUMA WARDHANI', 'MOJOKERTO', '2002-06-07', 'P', 'Islam', 'IMAM NURHADI', 'SRI HARTATI', '088227669968', 'shindywardari@gmail.com', 'Petambakan\r\nMadukara\r\nBanjarnegara', '3', 2017, 'anonim.png', '5232', '067ee197a2aa979778923af77b40dd89', '5232', 'aktif'),
(142, '5218', 'ERLIN NUR RISKY', 'BANJARNEGARA', '2002-10-20', 'P', 'Islam', 'SUDIRO', 'MANISAH', '087760102298', 'erlinnurrisky@gmail.com', 'MANDIRAJA WETAN\r\nMANDIRAJA\r\nBANJARNEGARA', '3', 2017, 'anonim.png', '5218', '12780ea688a71dabc284b064add459a4', '5218', 'aktif'),
(143, '5230', 'Rengga Tatra Timur', 'Banjarnegara', '2001-11-06', 'L', 'Islam', 'Riyadi', 'Sugiyanti', '085777525302', 'rengga.patimura@gmail.com', 'Banjarnegara\r\nBanjarnegara\r\nKrandegan', '3', 2017, 'anonim.png', '5230', '28b9f8aa9f07db88404721af4a5b6c11', '5230', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_essay`
--

CREATE TABLE `tb_soal_essay` (
  `id_essay` int(11) NOT NULL,
  `id_tq` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` date NOT NULL,
  `jawaban_guru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_essay`
--

INSERT INTO `tb_soal_essay` (`id_essay`, `id_tq`, `pertanyaan`, `gambar`, `tgl_buat`, `jawaban_guru`) VALUES
(35, 17, 'karnivora?', '', '2019-07-17', 'makan daging rumput'),
(42, 20, 'Apa kepanjangan dari WWW?', '', '2019-07-18', 'world wide web'),
(44, 20, 'Sebutkan model-model jaringan komputer?', '', '2019-07-18', 'LAN MAN WAN'),
(45, 20, 'Sebutkan dan urutkan model lapisan Komunikasi Data dari bawah!', '', '2019-07-18', 'physical, data Link, network, transport, session, presentation, dan aplication Layer'),
(46, 18, 'Apa kepanjangan dari WWW?', '', '2019-07-18', 'world wide web'),
(47, 18, 'Sebutkan model-model jaringan komputer? ', '', '2019-07-18', 'LAN MAN WAN'),
(48, 18, 'Sebutkan dan urutkan model lapisan Komunikasi Data dari bawah!', '', '2019-07-18', 'physical, data Link, network, transport, session, presentation, dan aplication layer'),
(49, 19, 'Apa kepanjangan dari WWW?', '', '2019-07-18', 'world wide web'),
(50, 19, 'Sebutkan model-model jaringan komputer? ', '', '2019-07-18', 'LAN MAN WAN'),
(51, 19, 'Sebutkan dan urutkan model lapisan Komunikasi Data dari bawah!', '', '2019-07-18', 'physical, data Link, network, transport, session, presentation, dan aplication layer.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_pilgan`
--

CREATE TABLE `tb_soal_pilgan` (
  `id_pilgan` int(11) NOT NULL,
  `id_tq` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `pil_a` text NOT NULL,
  `pil_b` text NOT NULL,
  `pil_c` text NOT NULL,
  `pil_d` text NOT NULL,
  `pil_e` text NOT NULL,
  `kunci` varchar(2) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `pembuat` varchar(10) NOT NULL,
  `waktu_soal` int(8) NOT NULL,
  `info` varchar(250) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_topik_quiz`
--

INSERT INTO `tb_topik_quiz` (`id_tq`, `judul`, `id_kelas`, `id_mapel`, `tgl_buat`, `pembuat`, `waktu_soal`, `info`, `status`) VALUES
(17, 'Ulangan Harian', 1, 4, '2019-07-17', 'admin', 1800, '', 'aktif'),
(18, 'Ulangan Harian', 7, 6, '2019-07-18', 'admin', 1800, 'Kerjakan dan jawab dengan benar', 'aktif'),
(19, 'Ulangan Harian', 3, 6, '2019-07-18', 'admin', 1800, 'Kerjakan dan jawab dengan benar', 'aktif'),
(20, 'Ulangan Harian', 6, 6, '2019-07-18', 'admin', 1800, 'Kerjakan dan jawab dengan benar', 'aktif');

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
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_file_materi`
--
ALTER TABLE `tb_file_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas_ajar`
--
ALTER TABLE `tb_kelas_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel_ajar`
--
ALTER TABLE `tb_mapel_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_essay`
--
ALTER TABLE `tb_nilai_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_pilgan`
--
ALTER TABLE `tb_nilai_pilgan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_essay`
--
ALTER TABLE `tb_soal_essay`
  MODIFY `id_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_pilgan`
--
ALTER TABLE `tb_soal_pilgan`
  MODIFY `id_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_topik_quiz`
--
ALTER TABLE `tb_topik_quiz`
  MODIFY `id_tq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
