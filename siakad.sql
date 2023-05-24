CREATE TABLE `mahasiswa` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nim` char(10) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mahasiswa_UN` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `dosen` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nidn` char(8) NOT NULL,
  `jenjang_pendidikan` enum('S2','S3') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dosen_UN` (`nidn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `matakuliah` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kode_matakuliah` char(5) NOT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matakuliah_UN` (`kode_matakuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

