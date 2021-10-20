-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2019 pada 16.48
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekammedis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ceklab`
--

CREATE TABLE `ceklab` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `poli` varchar(10) NOT NULL,
  `nakes` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `hb` varchar(3) NOT NULL,
  `leukosit` varchar(9) NOT NULL,
  `trombosit` varchar(10) NOT NULL,
  `haematokrit` varchar(12) NOT NULL,
  `hcgtest` varchar(8) NOT NULL,
  `golongandarah` varchar(14) NOT NULL,
  `dengue` varchar(15) NOT NULL,
  `antihiv` varchar(8) NOT NULL,
  `urinerutin` varchar(11) NOT NULL,
  `urinelengkap` varchar(13) NOT NULL,
  `cholesterol` varchar(12) NOT NULL,
  `asamurat` varchar(9) NOT NULL,
  `guladarahsewaktu` varchar(18) NOT NULL,
  `guladarahpuasa` varchar(16) NOT NULL,
  `guladarahpostprandia` varchar(22) NOT NULL,
  `malaria` varchar(8) NOT NULL,
  `sewaktu` varchar(8) NOT NULL,
  `pagi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ceklab`
--

INSERT INTO `ceklab` (`nik`, `nama`, `poli`, `nakes`, `tanggal`, `hb`, `leukosit`, `trombosit`, `haematokrit`, `hcgtest`, `golongandarah`, `dengue`, `antihiv`, `urinerutin`, `urinelengkap`, `cholesterol`, `asamurat`, `guladarahsewaktu`, `guladarahpuasa`, `guladarahpostprandia`, `malaria`, `sewaktu`, `pagi`) VALUES
('8515651671', 'sandewati siregar', 'POLI UMUM', 'dr. Ameri Yahya', '2019-11-04', 'Hb', '', '', '', '', 'Golongan Darah', '', '', '', '', '', '', 'Gula Darah Sewaktu', '', '', '', '', ''),
('123456', 'edi kusnadi sutejo', 'POLI GIGI', 'drg. Teuku Agus Surya', '2019-11-04', '', '', '', '', '', '', '', '', '', '', '', '', 'Gula Darah Sewaktu', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftardiagnosa`
--

CREATE TABLE `daftardiagnosa` (
  `diagnosa` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftardiagnosa`
--

INSERT INTO `daftardiagnosa` (`diagnosa`) VALUES
('Abses Kulit (Cutaneous abscess, furuncle and carbuncle)'),
('Acute sinusitis'),
('Acute tonsillitis'),
('ARTRITIS, OSTEOARTRITIS'),
('Asthma'),
('Cedera dada dangkal'),
('cephalgia /Headache/sakit kepala'),
('Corpus alienum telinga'),
('CVA'),
('Cystitis / infeksi saluran kemih'),
('Dental caries'),
('DERMATITIS KONTAK ALERGI'),
('Dermatitis kontak alergika, unspecified cause'),
('Diare and gastroentritis non spesifik'),
('DM II (non-insulin-dependen diabetes mellitus)'),
('DM tipe II (NIDDM komplikasi perifer circulatory/gangrene)'),
('Dyspepsia'),
('FARINGITIS'),
('Febris tanpa sebab yg jelas'),
('Fraktur Tulang Lengan Atas,Pengupil Dan Hasta'),
('Gagal Jantung (Heart failure)'),
('Gas Gangrene'),
('Gastritis, unspecified'),
('Gastroenteritis & Colitis Lainnya Yg Bukan Krn Infeksi'),
('GIGITAN SERANGGA'),
('Gingivitis akut'),
('Haemorrhoids'),
('Haid tidak teratur / Menometrorhagi'),
('HIPERCHOLESTEROMELIA'),
('Hipertensi dg peny. jantung (kongestif) '),
('Hipertensi esensial'),
('Hipotiroidisme lain'),
('Hypotension'),
('INFEKSI SALURAN KEMIH'),
('Inpeksi Pernapasan Atas Akut (ISPA)'),
('Irritant Contact Dermatitis'),
('Jamur kulit lain'),
('Kecelakaan Kerja'),
('Kecelakaan lalu lintas'),
('KEHAMILAN NORMAL'),
('Kelainan pada kuku (Nail disorders)'),
('Keratitis'),
('Konstipasi '),
('Kontrasepsi'),
('Low Back Pain'),
('LUKA BAKAR DERJAT I DAN II'),
('Luka Terbuka Lain Dan Yang Tanpa Keterangan'),
('Malaise and fatigue'),
('Malaria Dengan Pemeriksaan Lab'),
('Myalgia'),
('Nasofaringitis Akut [common cold]'),
('Nausea and vomiting/mual muntah'),
('Neuralgia and neuritis, unspecified'),
('Osteo Atritis / Gout, unspecified'),
('Otitis externa / infeksi telinga luar'),
('penyakit paru  obstruktif kronik '),
('Perdarahan Abnormal Rahim Dan Vagina'),
('Persalinan Normal'),
('Pruritus'),
('Pulpitis '),
('Pyoderma'),
('REAKSI GIGITAN SERANGGA'),
('Residural schizophrenia'),
('Scabies'),
('Stomatitis and related lesions (sariawan)'),
('Suscpek Typoid'),
('TBC paru BTA(+) tanpa biakan'),
('Tinea corporis (jamur Badan)'),
('Tinea cruris (jamur di selangkangan)'),
('TINEA UNGUM'),
('TONSILITIS'),
('Tumor jinak dada( FAM, FCD, dll)'),
('Urticaria'),
('Varises Tungkai'),
('Vertigo'),
('Viral warts/caplak/verucca/kutil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapasien`
--

CREATE TABLE `datapasien` (
  `norm` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kk` varchar(20) NOT NULL,
  `kepalakeluarga` varchar(20) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tgllahir` date NOT NULL,
  `jeniskelamin` varchar(12) NOT NULL,
  `status` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `desakelurahan` varchar(25) NOT NULL,
  `nohape` varchar(12) NOT NULL,
  `katpas` varchar(15) NOT NULL,
  `nokartu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datapasien`
--

INSERT INTO `datapasien` (`norm`, `nik`, `nama`, `kk`, `kepalakeluarga`, `tempatlahir`, `tgllahir`, `jeniskelamin`, `status`, `agama`, `pendidikan`, `pekerjaan`, `alamat`, `rt`, `rw`, `desakelurahan`, `nohape`, `katpas`, `nokartu`) VALUES
(16010001, '123456', 'edi kusnadi sutejo', '76351721', 'edi kusnadi', 'limau manis', '1995-12-12', 'Laki - laki', 'MENIKAH', 'Islam', 'SEKOLAH DASAR', 'PEGAWAI KONTRAK', 'jl m nuh no brp aj', '002', '003', 'Desa Kelarik', '51654651693', 'PASIEN KIS/BPJS', '685341'),
(16010003, '137137', 'agus', '7777777', 'agus', 'medan', '1986-08-26', 'Laki - laki', 'MENIKAH', 'ISLAM', 'Diploma IV/S1', 'PEGAWAI NEGERI SIPIL', 'jl. m. nuh', '003', '003', 'Desa Kelarik', '085264659191', 'PASIEN KIS/BPJS', '41564651'),
(16050001, '15463179', 'Franky Leo', '454545', 'Franky Leo', 'Medan', '1987-08-03', 'Laki - laki', 'MENIKAH', 'ISLAM', 'Diploma IV/S1', 'PEGAWAI NEGERI SIPIL', 'Jl Helvetia', '001', '001', 'Desa Gunung Durian', '08510007665', 'Pasien KIS/BPJS', '65367586817'),
(16010002, '1645175', 'sri munirawati mince', '767676', 'suami munira', 'aceh', '1986-11-12', 'Perempuan', 'MENIKAH', 'Islam', 'SEKOLAH DASAR', 'PEGAWAI NEGERI SIPIL', 'jalan besar kelarik', '003', '002', 'Desa Kelarik', '713664517515', 'PASIEN KIS/BPJS', '761517'),
(16010003, '250619', 'arya', '7777777', 'agus', 'ranai', '2019-06-25', 'Laki - laki', 'BELUM MENIKAH', 'ISLAM', 'Belum/Tidak Tamat SD/Sederajat', 'LAIN-LAIN', 'jl. m. nuh', '003', '003', 'Desa Kelarik', '085264659191', 'PASIEN KIS/BPJS', '53764576'),
(16020001, '5263916', 'Mega', '868686', 'Muhammad Adlin, S.Ke', 'Dumai', '1994-04-04', 'Perempuan', 'MENIKAH', 'ISLAM', 'Diploma III/Sarjana Muda', 'PEGAWAI KONTRAK', 'Jl Ranai Darat', '001', '001', 'Desa Kelarik Utara', '08137682983', 'Pasien KIS/BPJS', '9265475'),
(16010001, '6145731', 'istri edi', '76351721', 'edi kusnadi', 'kelarik', '1997-12-12', 'Perempuan', 'MENIKAH', 'ISLAM', 'SLTA/SMK/MA/Sederajat', 'IBU RUMAH TANGGA', 'jl. m. nuh', '002', '003', 'Desa Kelarik', '76651751', 'PASIEN KIS/BPJS', '651755521'),
(16020001, '7617768', 'Muhammad Adlin, S.Kep. NE', '868686', 'Muhammad Adlin, S.Ke', 'Baganbatu', '1991-01-01', 'Laki - laki', 'MENIKAH', 'ISLAM', 'Diploma IV/S1', 'PEGAWAI NEGERI SIPIL', 'Jl Ranai Darat', '001', '001', 'Desa Kelarik Utara', '081376768', 'Pasien KIS/BPJS', '98714641'),
(16060001, '8515651671', 'sandewati siregar', '18567165752', 'sandeman', 'batubi', '1969-09-06', 'Laki - laki', 'MENIKAH', 'KRISTEN', 'SEKOLAH DASAR', 'PEGAWAI NEGERI SIPIL', 'jl. pramuka gang gudep 99', '001', '001', 'Desa Teluk Buton', '0853764526', 'PASIEN KIS/BPJS', '6575445'),
(16050001, '8675156', 'Ramadhani', '454545', 'Franky Leo', 'Tembung', '1993-02-14', 'Perempuan', 'MENIKAH', 'ISLAM', 'SLTA/SMK/MA/Sederajat', 'PEGAWAI SWASTA', 'Jl Helvetia', '001', '001', 'Desa Gunung Durian', '081265735', 'Pasien KIS/BPJS', '627515'),
(16070001, '872876753', 'Fatmawati', '101010', 'Jufrizon', 'batubi', '1987-07-07', 'Perempuan', 'MENIKAH', 'ISLAM', 'Diploma IV/S1', 'PEGAWAI NEGERI SIPIL', 'Jl kelarik raya', '002', '003', 'Desa Belakang Gunung', '087346657', 'Pasien KIS/BPJS', '766531'),
(16010003, '8888', 'yusfadia', '7777777', 'agus', 'petaling jaya', '1990-05-12', 'Perempuan', 'MENIKAH', 'ISLAM', 'Diploma III/Sarjana Muda', 'PEGAWAI KONTRAK', 'jl. m. nuh', '003', '003', 'Desa Kelarik', '082386838586', 'PASIEN KIS/BPJS', '852367527'),
(16070001, '9716165671', 'Jufrizon', '101010', 'Jufrizon', 'Midai', '1979-09-09', 'Laki - laki', 'MENIKAH', 'ISLAM', 'Diploma IV/S1', 'PEGAWAI NEGERI SIPIL', 'Jl kelarik raya', '002', '003', 'Desa Belakang Gunung', '08117665', 'Pasien KIS/BPJS', '654348');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasillab`
--

CREATE TABLE `hasillab` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `poli` varchar(10) NOT NULL,
  `nakes` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `hb` varchar(4) NOT NULL,
  `leukosit` varchar(6) NOT NULL,
  `trombosit` varchar(6) NOT NULL,
  `haematokrit` varchar(4) NOT NULL,
  `hcgtest` varchar(8) NOT NULL,
  `golongandarah` varchar(4) NOT NULL,
  `dengue` varchar(8) NOT NULL,
  `antihiv` varchar(8) NOT NULL,
  `urinerutin` varchar(25) NOT NULL,
  `urinelengkap` varchar(25) NOT NULL,
  `cholesterol` varchar(4) NOT NULL,
  `asamurat` varchar(4) NOT NULL,
  `guladarahsewaktu` varchar(4) NOT NULL,
  `guladarahpuasa` varchar(4) NOT NULL,
  `guladarahpostprandia` varchar(4) NOT NULL,
  `malaria` varchar(8) NOT NULL,
  `sewaktu` varchar(8) NOT NULL,
  `pagi` varchar(8) NOT NULL,
  `ankes` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasillab`
--

INSERT INTO `hasillab` (`nik`, `nama`, `poli`, `nakes`, `tanggal`, `hb`, `leukosit`, `trombosit`, `haematokrit`, `hcgtest`, `golongandarah`, `dengue`, `antihiv`, `urinerutin`, `urinelengkap`, `cholesterol`, `asamurat`, `guladarahsewaktu`, `guladarahpuasa`, `guladarahpostprandia`, `malaria`, `sewaktu`, `pagi`, `ankes`) VALUES
('8515651671', 'sandewati siregar', 'POLI UMUM', 'dr. Ameri Yahya', '2019-11-04', '12', '', '', '', '', 'AB+', '', '', '', '', '', '', '200', '', '', '', '', '', 'Yusfadia Amd.AK'),
('123456', 'edi kusnadi sutejo', 'POLI GIGI', 'drg. Teuku Agus Surya', '2019-11-04', '', '', '', '', '', '', '', '', '', '', '', '', '230', '', '', '', '', '', 'Yusfadia Amd.AK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartuibu`
--

CREATE TABLE `kartuibu` (
  `nik` bigint(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `kontrasepsi` varchar(35) NOT NULL,
  `ankiumur` varchar(2) NOT NULL,
  `ankiberat` varchar(4) NOT NULL,
  `ankipesalin` varchar(25) NOT NULL,
  `ankicasalin` varchar(10) NOT NULL,
  `ankikeadaan` varchar(12) NOT NULL,
  `ankikomplikasi` varchar(20) NOT NULL,
  `ankiiumur` varchar(2) NOT NULL,
  `ankiiberat` varchar(4) NOT NULL,
  `ankiipesalin` varchar(25) NOT NULL,
  `ankiicasalin` varchar(10) NOT NULL,
  `ankiikeadaan` varchar(12) NOT NULL,
  `ankiikomplikasi` varchar(20) NOT NULL,
  `ankiiiumur` varchar(2) NOT NULL,
  `ankiiiberat` varchar(4) NOT NULL,
  `ankiiipesalin` varchar(25) NOT NULL,
  `ankiiicasalin` varchar(10) NOT NULL,
  `ankiiikeadaan` varchar(12) NOT NULL,
  `ankiiikomplikasi` varchar(20) NOT NULL,
  `tglhaid` date NOT NULL,
  `tglpartus` date NOT NULL,
  `keluhanutama` varchar(50) NOT NULL,
  `nafsumakan` varchar(10) NOT NULL,
  `muntah` varchar(25) NOT NULL,
  `pusing` varchar(25) NOT NULL,
  `nyeriperut` varchar(10) NOT NULL,
  `oedema` varchar(5) NOT NULL,
  `penyakit` varchar(15) NOT NULL,
  `riwayatkeluarga` varchar(15) NOT NULL,
  `kebiasaan` varchar(20) NOT NULL,
  `pucat` varchar(5) NOT NULL,
  `kesadaran` varchar(15) NOT NULL,
  `bentuktubuh` varchar(25) NOT NULL,
  `suhubadan` varchar(10) NOT NULL,
  `kuning` varchar(5) NOT NULL,
  `lila` varchar(3) NOT NULL,
  `tinggibadan` varchar(3) NOT NULL,
  `beratbadan` varchar(3) NOT NULL,
  `tekanandarah` varchar(7) NOT NULL,
  `nadi` varchar(3) NOT NULL,
  `pernafasan` varchar(3) NOT NULL,
  `muka` varchar(20) NOT NULL,
  `mulut` varchar(10) NOT NULL,
  `gigi` varchar(10) NOT NULL,
  `paru` varchar(10) NOT NULL,
  `jantung` varchar(10) NOT NULL,
  `payudara` varchar(10) NOT NULL,
  `hati` varchar(10) NOT NULL,
  `abdomen` varchar(25) NOT NULL,
  `tangantungkai` varchar(7) NOT NULL,
  `tinggifundus` varchar(3) NOT NULL,
  `bentukfundus` varchar(20) NOT NULL,
  `bentukuterus` varchar(10) NOT NULL,
  `letakjanin` varchar(10) NOT NULL,
  `gerakjanin` varchar(12) NOT NULL,
  `detakjantungjanin` varchar(3) NOT NULL,
  `inspekulo` varchar(15) NOT NULL,
  `perdarahan` varchar(5) NOT NULL,
  `pemeriksaanindikasi` varchar(15) NOT NULL,
  `hb` varchar(4) NOT NULL,
  `albumine` varchar(15) NOT NULL,
  `reduksi` varchar(15) NOT NULL,
  `faeces` varchar(10) NOT NULL,
  `malaria` varchar(10) NOT NULL,
  `golda` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kartuibu`
--

INSERT INTO `kartuibu` (`nik`, `nama`, `tanggal`, `kontrasepsi`, `ankiumur`, `ankiberat`, `ankipesalin`, `ankicasalin`, `ankikeadaan`, `ankikomplikasi`, `ankiiumur`, `ankiiberat`, `ankiipesalin`, `ankiicasalin`, `ankiikeadaan`, `ankiikomplikasi`, `ankiiiumur`, `ankiiiberat`, `ankiiipesalin`, `ankiiicasalin`, `ankiiikeadaan`, `ankiiikomplikasi`, `tglhaid`, `tglpartus`, `keluhanutama`, `nafsumakan`, `muntah`, `pusing`, `nyeriperut`, `oedema`, `penyakit`, `riwayatkeluarga`, `kebiasaan`, `pucat`, `kesadaran`, `bentuktubuh`, `suhubadan`, `kuning`, `lila`, `tinggibadan`, `beratbadan`, `tekanandarah`, `nadi`, `pernafasan`, `muka`, `mulut`, `gigi`, `paru`, `jantung`, `payudara`, `hati`, `abdomen`, `tangantungkai`, `tinggifundus`, `bentukfundus`, `bentukuterus`, `letakjanin`, `gerakjanin`, `detakjantungjanin`, `inspekulo`, `perdarahan`, `pemeriksaanindikasi`, `hb`, `albumine`, `reduksi`, `faeces`, `malaria`, `golda`) VALUES
(1645175, 'sri munirawati mince', '2019-11-04', 'suntikan', '5', '3000', 'Dokter', 'Normal', 'Sehat', '-', '2', '2800', 'Dokter', 'Normal', 'Sehat', '-', '', '', '-', '-', '-', '-', '2019-10-22', '2020-08-17', 'sering mual mual', 'baik', 'biasa,gejala hamil muda', 'biasa,gejala hamil muda', 'tidak ada', 'tidak', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak', 'baik', 'normal', 'normal', 'tidak', '123', '165', '45', '120/80', '74', '17', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'pebesaran normal', 'normal', '45', 'sesuai kurva', 'normal', 'kelapa', 'aktif', '102', 'normal', 'tidak', 'panggul normal', '12', '', '', '', 'negatif', 'AB+');

-- --------------------------------------------------------

--
-- Struktur dari tabel `norekammedis`
--

CREATE TABLE `norekammedis` (
  `norm` int(8) NOT NULL,
  `kk` varchar(20) NOT NULL,
  `kepalakeluarga` varchar(25) NOT NULL,
  `desakelurahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `norekammedis`
--

INSERT INTO `norekammedis` (`norm`, `kk`, `kepalakeluarga`, `desakelurahan`) VALUES
(16010001, '76351721', 'edi kusnadi', 'Desa Kelarik'),
(16010002, '767676', 'suami munira', 'Desa Kelarik'),
(16010003, '7777777', 'agus', 'Desa Kelarik'),
(16020001, '868686', 'Muhammad Adlin, S.Kep. NE', 'Desa Kelarik Utara'),
(16050001, '454545', 'Franky Leo', 'Desa Gunung Durian'),
(16060001, '18567165752', 'sandeman', 'Desa Teluk Buton'),
(16070001, '101010', 'Jufrizon', 'Desa Belakang Gunung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `odontogram`
--

CREATE TABLE `odontogram` (
  `nik` bigint(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `gigi11` varchar(1) NOT NULL,
  `gigi12` varchar(1) NOT NULL,
  `gigi13` varchar(1) NOT NULL,
  `gigi14` varchar(1) NOT NULL,
  `gigi15` varchar(1) NOT NULL,
  `gigi16` varchar(1) NOT NULL,
  `gigi17` varchar(1) NOT NULL,
  `gigi18` varchar(1) NOT NULL,
  `gigi21` varchar(1) NOT NULL,
  `gigi22` varchar(1) NOT NULL,
  `gigi23` varchar(1) NOT NULL,
  `gigi24` varchar(1) NOT NULL,
  `gigi25` varchar(1) NOT NULL,
  `gigi26` varchar(1) NOT NULL,
  `gigi27` varchar(1) NOT NULL,
  `gigi28` varchar(1) NOT NULL,
  `gigi31` varchar(1) NOT NULL,
  `gigi32` varchar(1) NOT NULL,
  `gigi33` varchar(1) NOT NULL,
  `gigi34` varchar(1) NOT NULL,
  `gigi35` varchar(1) NOT NULL,
  `gigi36` varchar(1) NOT NULL,
  `gigi37` varchar(1) NOT NULL,
  `gigi38` varchar(1) NOT NULL,
  `gigi41` varchar(1) NOT NULL,
  `gigi42` varchar(1) NOT NULL,
  `gigi43` varchar(1) NOT NULL,
  `gigi44` varchar(1) NOT NULL,
  `gigi45` varchar(1) NOT NULL,
  `gigi46` varchar(1) NOT NULL,
  `gigi47` varchar(1) NOT NULL,
  `gigi48` varchar(1) NOT NULL,
  `periodontal` varchar(10) NOT NULL,
  `karanggigi` varchar(10) NOT NULL,
  `sikatgigi` varchar(15) NOT NULL,
  `ohis` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `odontogram`
--

INSERT INTO `odontogram` (`nik`, `nama`, `gigi11`, `gigi12`, `gigi13`, `gigi14`, `gigi15`, `gigi16`, `gigi17`, `gigi18`, `gigi21`, `gigi22`, `gigi23`, `gigi24`, `gigi25`, `gigi26`, `gigi27`, `gigi28`, `gigi31`, `gigi32`, `gigi33`, `gigi34`, `gigi35`, `gigi36`, `gigi37`, `gigi38`, `gigi41`, `gigi42`, `gigi43`, `gigi44`, `gigi45`, `gigi46`, `gigi47`, `gigi48`, `periodontal`, `karanggigi`, `sikatgigi`, `ohis`) VALUES
(123456, 'edi kusnadi sutejo', '1', '2', '3', '4', '5', '6', '7', 'x', '1', '2', '3', '4', '5', '6', '7', 'x', '1', '2', '3', '4', '5', 'x', '7', 'x', '1', '2', '3', '4', '5', '6', '7', 'x', 'SEHAT', 'TIDAK ADA', 'tidak tentu', 2),
(15463179, 'Franky Leo', '1', '2', '3', '4', '5', '6', '7', 'x', '1', '2', '3', '4', '5', '6', '7', 'x', '1', '2', '3', '4', 'x', '6', '7', 'x', '1', '2', '3', '4', '5', '6', '7', 'x', 'SEHAT', 'TIDAK ADA', '2x sehari', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasienhariini`
--

CREATE TABLE `pasienhariini` (
  `noantri` smallint(5) NOT NULL,
  `norm` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasienhariini`
--

INSERT INTO `pasienhariini` (`noantri`, `norm`, `nik`, `nama`) VALUES
(2, 16010001, '123456', 'edi kusnadi sutejo'),
(1, 16010002, '1645175', 'sri munirawati mince');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaanawal`
--

CREATE TABLE `pemeriksaanawal` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `pemeriksaanawal` varchar(200) NOT NULL,
  `tb` varchar(3) NOT NULL,
  `bb` varchar(3) NOT NULL,
  `lp` varchar(3) NOT NULL,
  `td` varchar(7) NOT NULL,
  `rr` varchar(2) NOT NULL,
  `hr` varchar(2) NOT NULL,
  `temp` varchar(2) NOT NULL,
  `poli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaanawal`
--

INSERT INTO `pemeriksaanawal` (`nik`, `nama`, `tanggal`, `keluhan`, `pemeriksaanawal`, `tb`, `bb`, `lp`, `td`, `rr`, `hr`, `temp`, `poli`) VALUES
('1645175', 'sri munirawati mince', '2019-11-10', 'sakit perut, sakit gigi', 'perut sakit melilit', '158', '58', '58', '120/90', '17', '71', '37', 'POLI UMUM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaranobat`
--

CREATE TABLE `pengeluaranobat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `poli` varchar(12) NOT NULL,
  `nakes` varchar(30) NOT NULL,
  `obat1` varchar(30) NOT NULL,
  `jumlah1` tinyint(3) NOT NULL,
  `obat2` varchar(25) NOT NULL,
  `jumlah2` smallint(3) NOT NULL,
  `obat3` varchar(25) NOT NULL,
  `jumlah3` smallint(3) NOT NULL,
  `obat4` varchar(25) NOT NULL,
  `jumlah4` smallint(3) NOT NULL,
  `obat5` varchar(25) NOT NULL,
  `jumlah5` smallint(3) NOT NULL,
  `apoteker` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaranobat`
--

INSERT INTO `pengeluaranobat` (`nik`, `nama`, `tanggal`, `poli`, `nakes`, `obat1`, `jumlah1`, `obat2`, `jumlah2`, `obat3`, `jumlah3`, `obat4`, `jumlah4`, `obat5`, `jumlah5`, `apoteker`) VALUES
('9716165671', 'Jufrizon', '2019-11-04', 'POLI UMUM', 'dr. Ameri Yahya', 'parasetamol 500mg', 12, '', 0, '', 0, '', 0, '', 0, 'Munirawati, Amd.Farm'),
('8515651671', 'sandewati siregar', '2019-11-04', 'POLI UMUM', 'dr. Ameri Yahya', 'asam mefenamat 500mg', 20, '', 0, '', 0, '', 0, '', 0, 'Munirawati, Amd.Farm'),
('123456', 'edi kusnadi sutejo', '2019-11-04', 'POLI GIGI', 'drg. Teuku Agus Surya', 'asam mefenamat 500mg', 10, 'amoxicilin 500mg', 15, '', 0, '', 0, '', 0, 'Munirawati, Amd.Farm'),
('15463179', 'Franky Leo', '2019-11-04', 'POLI GIGI', 'drg. Teuku Agus Surya', 'amoxicilin 500mg', 10, 'Natrium Diclofenac 50mg', 10, '', 0, '', 0, '', 0, 'Munirawati, Amd.Farm'),
('1645175', 'sri munirawati mince', '2019-11-04', 'POLI KIA', 'Nurbaiti, Am.Keb', '', 0, '', 0, '', 0, '', 0, '', 0, 'Munirawati, Amd.Farm'),
('8675156', 'Ramadhani', '2019-11-05', 'UGD', 'dr. Cut Azni Zahara', 'antasida', 10, '', 0, '', 0, '', 0, '', 0, 'Munirawati, Amd.Farm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan`
--

CREATE TABLE `perawatan` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `pemeriksaanawal` varchar(200) NOT NULL,
  `tb` varchar(3) NOT NULL,
  `bb` varchar(3) NOT NULL,
  `lp` varchar(3) NOT NULL,
  `td` varchar(7) NOT NULL,
  `rr` varchar(2) NOT NULL,
  `hr` varchar(2) NOT NULL,
  `temp` varchar(2) NOT NULL,
  `pemeriksaanlanjutan` varchar(200) NOT NULL,
  `diagnosa` varchar(30) NOT NULL,
  `perawatan` varchar(50) NOT NULL,
  `pengobatan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `poli` varchar(30) NOT NULL,
  `nakes` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perawatan`
--

INSERT INTO `perawatan` (`nik`, `nama`, `tanggal`, `keluhan`, `pemeriksaanawal`, `tb`, `bb`, `lp`, `td`, `rr`, `hr`, `temp`, `pemeriksaanlanjutan`, `diagnosa`, `perawatan`, `pengobatan`, `keterangan`, `poli`, `nakes`) VALUES
('9716165671', 'Jufrizon', '2019-11-04', 'pusing kepala', 'sering pusing kepala ketika lama bekerja di depan komputer.\r\nada rasa mual juga.', '167', '70', '67', '120/86', '18', '72', '37', 'sakit kepala sebelah. timbul kadang kadang.\r\n', 'Vertigo', 'premedikasi.\r\njangan terlalu lama di depan kompute', 'Parasetamol 3x1 12', 'kontrol jika sakit tidak berkurang', 'POLI UMUM', 'dr. Ameri Yahya'),
('8515651671', 'sandewati siregar', '2019-11-04', 'sakit tulang belakang', 'sering sakit tulang belakang.\r\napalagi ketika pagi hari.', '178', '70', '65', '130/92', '19', '74', '37', 'adanya saraf tulang belakang yang mengalami inflamasi', 'Low Back Pain', 'premedikasi', 'Asam mefenamat 3x1 20', 'Kontrol ketika obat sudah habis', 'POLI UMUM', 'dr. Ameri Yahya'),
('123456', 'edi kusnadi sutejo', '2019-11-04', 'sakit gigi', 'gigi geraham bawah kanan berlubang.\r\nsakit sudah 2hari.\r\nbelum ada makan obat.', '172', '56', '45', '110/70', '15', '72', '37', 'Gigi 46 karies pulpa.\r\nadanya polip pulpa.', 'Pulpitis ', 'premedikasi', 'asam mefenamat 3x1 10\r\namoxicilin 3x1 15', 'datng 3hr lagi untuk diexo', 'POLI GIGI', 'drg. Teuku Agus Surya'),
('15463179', 'Franky Leo', '2019-11-04', 'sakit gigi', 'gusi bengkak disertai rasa sakit.\r\ngigi tidak berlubang.', '169', '70', '56', '120/86', '17', '71', '37', 'gigi molar tiga bawah mau tumbuh', 'Pulpitis ', 'premedikasi', 'amoxicilin 3x1 10\r\nnadic 2x1 10', 'gigi 46 erupsi.', 'POLI GIGI', 'drg. Teuku Agus Surya'),
('1645175', 'sri munirawati mince', '2019-11-04', 'sering muntah muntah', 'sering muntah muntah. terlambat haid 2minggu.', '150', '50', '52', '120/86', '18', '73', '37', 'mual karena hamil muda', 'KEHAMILAN NORMAL', 'premedikasi', 'tidak ada', 'kontrol', 'POLI KIA', 'Nurbaiti, Am.Keb'),
('8675156', 'Ramadhani', '2019-11-05', 'sakit perut', 'sakit perut karena telat makan', '', '', '', '120/86', '15', '73', '37', 'asam lambung meningkat karena terlambat makan', 'Gastritis, unspecified', 'premedikasi', 'antasida 3x1 sebelum makan 10', '', 'UGD', 'dr. Cut Azni Zahara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangtunggu`
--

CREATE TABLE `ruangtunggu` (
  `noantri` smallint(5) NOT NULL,
  `norm` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangtunggu`
--

INSERT INTO `ruangtunggu` (`noantri`, `norm`, `nik`, `nama`) VALUES
(2, 16010001, '123456', 'edi kusnadi sutejo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangtungguapotek`
--

CREATE TABLE `ruangtungguapotek` (
  `norm` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `poli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangtungguapotek`
--

INSERT INTO `ruangtungguapotek` (`norm`, `nik`, `nama`, `poli`) VALUES
(16010002, '1645175', 'sri munirawati mince', 'POLI UMUM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangtunggulab`
--

CREATE TABLE `ruangtunggulab` (
  `noantri` int(3) NOT NULL,
  `norm` varchar(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `poli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangtunggupoli`
--

CREATE TABLE `ruangtunggupoli` (
  `noantri` int(5) NOT NULL,
  `norm` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `poli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rujukaninternal`
--

CREATE TABLE `rujukaninternal` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alasanrujuk` varchar(100) NOT NULL,
  `poliasal` varchar(15) NOT NULL,
  `politujuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockobat`
--

CREATE TABLE `stockobat` (
  `namaobat` varchar(70) NOT NULL,
  `stock` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stockobat`
--

INSERT INTO `stockobat` (`namaobat`, `stock`) VALUES
('Ambroxol 30 tab', 200),
('Ambroxol tablet 30 mg', 300),
('Aminofilin tablet 200 mg', 100),
('Amlodipin tablet 10 mg', 200),
('Amlodipin tablet 5 mg', 200),
('Amoksisilin tablet scored 500 mg', 210),
('Amplodipin 5 mg', 200),
('Antasida DOEN', 205),
('Asam askorbat (Vitamin C) tab 50 mg', 230),
('Asam Folat  1 mg', 150),
('Asam Mefenamat Tablet 500 mg', 240),
('Asiklovir Tablet 200 mg', 100),
('Asiklovir tablet 400 mg', 100),
('Betahistin tablet 5 mg', 130),
('Captopril Tablet 25 mg', 240),
('Cefadroxil 500 mg', 200),
('Cetirizine hydrochloride (HCl)/Cetirizine tablet 10 mg', 210),
('Ciprofloxacin hydrochloride (HCl) 500 mg', 200),
('Cotrimoksazole Dewasa Tablet 480 mg', 210),
('Cycloserine 250 mg capsule USP', 140),
('Deksametason tablet 0,5 mg', 110),
('Diclofenac sodium/ Natrium diklofenak tablet 25 mg', 170),
('Digoksin 0,25 mg', 120),
('Diltiazem Hcl Tablet 30 mg', 120),
('Dimenhidrinat tablet  50 mg', 125),
('Dopamet Metildopan tablet 250 mg', 100),
('Eritromisin kaplet 500 mg', 240),
('Eritromisin Tablet 500 mg', 150),
('Etambutol 500 mg', 120),
('Fenitoin 100 mg', 130),
('Fitomenadion / Phytomenadion (Vit.K1) tablet/kaplet salut gula 10 mg', 110),
('Furosemid tab 40 mg', 200),
('Glibenclamide Tablet 5 mg', 320),
('Glibenclamide Tablet 5 mg (Renabatic)', 100),
('Gliceril Guaikolat tab', 120),
('Ibuprofen tablet  200 mg', 300),
('Kalsium laktat (Kalk) tablet 500 mg', 140),
('Kaptopril 25 mg', 360),
('Ketoconazole', 50),
('ketokonazol tablet 200 mg', 140),
('Ketoprofen Tablet 100 mg', 230),
('Klindamisin tablet  300 mg', 50),
('Kloramfenicol Kapsul 250 mg', 50),
('Levofloksacin tablet 250 mg', 100),
('Loratadin tablet 10 mg', 190),
('Metformin 500 mg', 120),
('Metoklopramide tablet 10 mg', 100),
('Metronidazole 250 mg', 100),
('Natrium Diklofenac 25 mg', 100),
('Nifedipin 10 mg', 140),
('Nystatin vagtab 100.000 UI', 50),
('Omeprazol tablet 20 mg', 100),
('Paracetamol tablet  500 mg', 500),
('Piridoksin (vitamin B6) tab 10 mg (HCl)', 300),
('Piroxicam 20mg', 50),
('Propanolol 10 mg', 130),
('Ranitidin 150 mg', 250),
('Salbutamol sulfate / Salbutamol tablet 4 mg', 200),
('Simvastastin tablet 10 mg', 130),
('Simvastastin tablet 20 mg', 100),
('Vitamin B Komplek tablet', 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ugd`
--

CREATE TABLE `ugd` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tanggalkejadian` date NOT NULL,
  `jamkejadian` time NOT NULL,
  `alasan` varchar(11) NOT NULL,
  `mekanisme` varchar(50) NOT NULL,
  `gejalapenyerta` varchar(8) NOT NULL,
  `pengantar` varchar(9) NOT NULL,
  `katpas` varchar(15) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `pemeriksaanawal` varchar(200) NOT NULL,
  `gcs` varchar(20) NOT NULL,
  `td` varchar(7) NOT NULL,
  `rr` varchar(3) NOT NULL,
  `hr` varchar(3) NOT NULL,
  `temp` varchar(3) NOT NULL,
  `pemeriksaanlanjutan` varchar(200) NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `perawatan` varchar(200) NOT NULL,
  `pengobatan` varchar(200) NOT NULL,
  `pemeriksaantambahan` varchar(200) NOT NULL,
  `hasillab` varchar(200) NOT NULL,
  `monitoring` varchar(200) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `poli` varchar(15) NOT NULL,
  `nakes` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `userpass`
--

CREATE TABLE `userpass` (
  `posisi` varchar(25) NOT NULL,
  `nakes` varchar(30) NOT NULL,
  `pengguna` varchar(15) NOT NULL,
  `katasandi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `userpass`
--

INSERT INTO `userpass` (`posisi`, `nakes`, `pengguna`, `katasandi`) VALUES
('dokterugd', 'dr. Cut Azni Zahara', 'agya', '$2y$10$trrs.J2AXGDaDvBAzzJX0ux9nxx5XmvRWim4esVVULlO..ojcxmEy'),
('analiskesehatan', 'Yusfadia Amd.AK', 'beat', '$2y$10$YX4Kgjk72i9OC9UOc2XMS.laqFwYJuH7mM/NqjTF/t141D.9/LaEK'),
('drgpython', 'Admin e-rekamMedik', 'fkgusu', '$2y$10$7pKYnslOLPHnSZGpdBl.QuAr.OLzstosvKFqgemHjUJiKaO.q2mwG'),
('nurse', 'Muhammad Adlin, S.Kep. NERS', 'kawasaki', '$2y$10$.v13rty9.P0BOd6jd9I6P.JALnIRTwr6koSo8yEbq7.bUL/5p650m'),
('apoteker', 'Munirawati, Amd.Farm', 'mio', '$2y$10$qy8bj1Q.busxiYpFcjPpre3dpj3pmyzsjvqBUvZ4.fyu92yrYFAuu'),
('bidan', 'Nurbaiti, Am.Keb', 'revo', '$2y$10$fhutIhYzGQYd/5UcnqDZ/Oo08BranHb.21s.MR8/PHygVk7CloKb2'),
('doktergigi', 'drg. Teuku Agus Surya', 'supra', '$2y$10$Tp7DPIryBBCH7krKjgrSzOwVy49AC4Yd2JHagdPJG6QPKamIo8ml6'),
('dokterumum', 'dr. Ameri Yahya', 'tiger', '$2y$10$nmUheiRmGrK0ze17dqQxK.y3KhmVUGbXC4QZUc51P0oI0aQCIXj/2'),
('pendaftaran', 'Susilawati', 'yamaha', '$2y$10$XSUNN7MCF5D6O871Qc6PluE7ePl.8OoU4PYe12QME9qhtfwzZfLTa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftardiagnosa`
--
ALTER TABLE `daftardiagnosa`
  ADD PRIMARY KEY (`diagnosa`),
  ADD UNIQUE KEY `diagnosa` (`diagnosa`);

--
-- Indeks untuk tabel `datapasien`
--
ALTER TABLE `datapasien`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `kartuibu`
--
ALTER TABLE `kartuibu`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `norekammedis`
--
ALTER TABLE `norekammedis`
  ADD PRIMARY KEY (`norm`),
  ADD UNIQUE KEY `norm` (`norm`);

--
-- Indeks untuk tabel `odontogram`
--
ALTER TABLE `odontogram`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pasienhariini`
--
ALTER TABLE `pasienhariini`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pemeriksaanawal`
--
ALTER TABLE `pemeriksaanawal`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `ruangtunggu`
--
ALTER TABLE `ruangtunggu`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `ruangtungguapotek`
--
ALTER TABLE `ruangtungguapotek`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `ruangtunggulab`
--
ALTER TABLE `ruangtunggulab`
  ADD PRIMARY KEY (`noantri`);

--
-- Indeks untuk tabel `ruangtunggupoli`
--
ALTER TABLE `ruangtunggupoli`
  ADD PRIMARY KEY (`noantri`);

--
-- Indeks untuk tabel `rujukaninternal`
--
ALTER TABLE `rujukaninternal`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `stockobat`
--
ALTER TABLE `stockobat`
  ADD PRIMARY KEY (`namaobat`),
  ADD UNIQUE KEY `namaobat` (`namaobat`);

--
-- Indeks untuk tabel `userpass`
--
ALTER TABLE `userpass`
  ADD PRIMARY KEY (`pengguna`),
  ADD UNIQUE KEY `pengguna` (`pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ruangtunggulab`
--
ALTER TABLE `ruangtunggulab`
  MODIFY `noantri` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruangtunggupoli`
--
ALTER TABLE `ruangtunggupoli`
  MODIFY `noantri` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
