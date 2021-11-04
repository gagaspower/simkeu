/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST SERVER
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : simkeu_

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 04/11/2021 14:25:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ms_jenis_trx
-- ----------------------------
DROP TABLE IF EXISTS `ms_jenis_trx`;
CREATE TABLE `ms_jenis_trx`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_kas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'pemasukan dan pengeluaran',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_jenis_trx
-- ----------------------------
INSERT INTO `ms_jenis_trx` VALUES (1, 'Kas Masuk');
INSERT INTO `ms_jenis_trx` VALUES (2, 'Kas Keluar');

-- ----------------------------
-- Table structure for ms_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `ms_karyawan`;
CREATE TABLE `ms_karyawan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_karyawan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_karyawan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `umur_karyawan` int NULL DEFAULT NULL,
  `tlp_karyawan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_karyawan
-- ----------------------------
INSERT INTO `ms_karyawan` VALUES (2, 'KRY00001', 'tes', 'test', 78, '087989');

-- ----------------------------
-- Table structure for ms_periode
-- ----------------------------
DROP TABLE IF EXISTS `ms_periode`;
CREATE TABLE `ms_periode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan_periode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_periode` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_periode
-- ----------------------------
INSERT INTO `ms_periode` VALUES (1, 'Januari', 2021);
INSERT INTO `ms_periode` VALUES (2, 'Februari', 2021);
INSERT INTO `ms_periode` VALUES (3, 'Maret', 2021);
INSERT INTO `ms_periode` VALUES (4, 'April', 2021);
INSERT INTO `ms_periode` VALUES (5, 'Mei', 2021);
INSERT INTO `ms_periode` VALUES (6, 'Juni', 2021);
INSERT INTO `ms_periode` VALUES (7, 'Juli', 2021);
INSERT INTO `ms_periode` VALUES (8, 'Agustus', 2021);
INSERT INTO `ms_periode` VALUES (9, 'September', 2021);
INSERT INTO `ms_periode` VALUES (10, 'Oktober', 2021);
INSERT INTO `ms_periode` VALUES (11, 'November', 2021);
INSERT INTO `ms_periode` VALUES (12, 'Desember', 2021);
INSERT INTO `ms_periode` VALUES (13, 'Januari', 2022);
INSERT INTO `ms_periode` VALUES (14, 'Februari', 2022);
INSERT INTO `ms_periode` VALUES (15, 'Maret', 2022);
INSERT INTO `ms_periode` VALUES (16, 'April', 2022);
INSERT INTO `ms_periode` VALUES (17, 'Mei', 2022);
INSERT INTO `ms_periode` VALUES (18, 'Juni', 2022);
INSERT INTO `ms_periode` VALUES (19, 'Juli', 2022);
INSERT INTO `ms_periode` VALUES (20, 'Agustus', 2022);
INSERT INTO `ms_periode` VALUES (21, 'September', 2022);
INSERT INTO `ms_periode` VALUES (22, 'Oktober', 2022);
INSERT INTO `ms_periode` VALUES (23, 'November', 2022);
INSERT INTO `ms_periode` VALUES (24, 'Desember', 2022);
INSERT INTO `ms_periode` VALUES (25, 'Januari', 2023);
INSERT INTO `ms_periode` VALUES (26, 'Februari', 2023);
INSERT INTO `ms_periode` VALUES (27, 'Maret', 2023);
INSERT INTO `ms_periode` VALUES (28, 'April', 2023);
INSERT INTO `ms_periode` VALUES (29, 'Mei', 2023);
INSERT INTO `ms_periode` VALUES (30, 'Juni', 2023);
INSERT INTO `ms_periode` VALUES (31, 'Juli', 2023);
INSERT INTO `ms_periode` VALUES (32, 'Agustus', 2023);
INSERT INTO `ms_periode` VALUES (33, 'September', 2023);
INSERT INTO `ms_periode` VALUES (34, 'Oktober', 2023);
INSERT INTO `ms_periode` VALUES (35, 'November', 2023);
INSERT INTO `ms_periode` VALUES (36, 'Desember', 2023);
INSERT INTO `ms_periode` VALUES (37, NULL, NULL);

-- ----------------------------
-- Table structure for ms_role
-- ----------------------------
DROP TABLE IF EXISTS `ms_role`;
CREATE TABLE `ms_role`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of ms_role
-- ----------------------------
INSERT INTO `ms_role` VALUES (1, 'admin');
INSERT INTO `ms_role` VALUES (2, 'direktur');

-- ----------------------------
-- Table structure for ms_user
-- ----------------------------
DROP TABLE IF EXISTS `ms_user`;
CREATE TABLE `ms_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NULL DEFAULT NULL,
  `nama` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of ms_user
-- ----------------------------
INSERT INTO `ms_user` VALUES (3, 1, 'user test admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `ms_user` VALUES (5, 2, 'user test direktur', 'password', '5f4dcc3b5aa765d61d8327deb882cf99');

-- ----------------------------
-- Table structure for tr_trx
-- ----------------------------
DROP TABLE IF EXISTS `tr_trx`;
CREATE TABLE `tr_trx`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_trx` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_trx` date NULL DEFAULT NULL,
  `periode_trx_id` int NULL DEFAULT NULL,
  `jenis_trx_id` int NULL DEFAULT NULL,
  `detail_trx` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `nilai_trx` bigint NULL DEFAULT NULL,
  `user_create` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tr_trx
-- ----------------------------
INSERT INTO `tr_trx` VALUES (2, 'TRX00001', '2021-07-15', 7, 1, 'penjualan pertama', 2000000, 3);
INSERT INTO `tr_trx` VALUES (3, 'TRX00002', '2021-07-15', 7, 1, 'pembayaran piutang CV.blablablabla', 200000, 3);
INSERT INTO `tr_trx` VALUES (4, 'TRX00003', '2021-07-16', 7, 2, 'Pembayaran listrik bulan juli 2021', 200000, 3);
INSERT INTO `tr_trx` VALUES (6, 'TRX00004', '2021-07-08', 7, 1, 'eta', 1000, 3);
INSERT INTO `tr_trx` VALUES (7, 'TRX00005', '2021-08-02', 8, 1, 'penjualan produk', 1500000, 3);
INSERT INTO `tr_trx` VALUES (8, 'TRX00006', '2021-09-01', 9, 2, 'TESTSDFA ', 150000, 3);
INSERT INTO `tr_trx` VALUES (10, 'TRX00007', '2021-08-12', 8, 2, 'testasdf asdf', 25000, 3);

SET FOREIGN_KEY_CHECKS = 1;
