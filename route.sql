/*
Navicat MySQL Data Transfer

Source Server         : mysql_data
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : route

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-01-07 13:21:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lokasi`
-- ----------------------------
DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(8000) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lokasi
-- ----------------------------
INSERT INTO `lokasi` VALUES ('41', 'Putat Indah Tengah I No.2, Putat Gede, Suko Manunggal, Kota SBY, Jawa Timur 60225, Indonesia', '-7.291979', '112.699471', 'break');
INSERT INTO `lokasi` VALUES ('42', 'Jl. Tambak Mayor, Simomulyo, Suko Manunggal, Kota SBY, Jawa Timur 60281, Indonesia', '-7.257242', '112.709084', 'break');
INSERT INTO `lokasi` VALUES ('43', 'Jl. Dumar Industri No.16, Greges, Asemrowo, Kota SBY, Jawa Timur 60183, Indonesia', '-7.242257', '112.688141', 'stop');

-- ----------------------------
-- Table structure for `route_vehicle`
-- ----------------------------
DROP TABLE IF EXISTS `route_vehicle`;
CREATE TABLE `route_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vehicle` int(11) NOT NULL,
  `position` varchar(2225) NOT NULL,
  `lng` varchar(2225) NOT NULL,
  `lat` varchar(2225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of route_vehicle
-- ----------------------------
INSERT INTO `route_vehicle` VALUES ('7', '4', 'Jl. Tol Surabaya - Gempol, Kota SBY, Jawa Timur, Indonesia', '112.69912719726562', '-7.302536205367328');
INSERT INTO `route_vehicle` VALUES ('8', '4', 'Jl. Bundaran Satelit, Putat Gede, Suko Manunggal, Kota SBY, Jawa Timur 60189, Indonesia', '112.70565032958984', '-7.2875522824538725');
INSERT INTO `route_vehicle` VALUES ('9', '4', 'Jl. Simo Kalangan I No.80, Simomulyo, Suko Manunggal, Kota SBY, Jawa Timur 60281, Indonesia', '112.71045684814453', '-7.268821674212138');
INSERT INTO `route_vehicle` VALUES ('10', '4', 'Dupak Rukun No.81, Asem Rowo, Asemrowo, Kota SBY, Jawa Timur 60182, Indonesia', '112.71217346191406', '-7.246343913508165');
INSERT INTO `route_vehicle` VALUES ('11', '4', 'Jl. Tol Surabaya - Gresik, Asem Rowo, Asemrowo, Kota SBY, Jawa Timur 60182, Indonesia', '112.70462036132812', '-7.244981588907964');
INSERT INTO `route_vehicle` VALUES ('12', '4', 'Jl. Dumar Industri No.16, Greges, Asemrowo, Kota SBY, Jawa Timur 60183, Indonesia', '112.68573760986328', '-7.241575759393231');
INSERT INTO `route_vehicle` VALUES ('13', '5', 'Jln Citraraya Unesa Rd, Lidah Wetan, Lakarsantri, Surabaya City, East Java 60213, Indonesia', '112.67509460449219', '-7.298790271675287');
INSERT INTO `route_vehicle` VALUES ('14', '5', 'Jl. Mayjen Yono Suwoyo No.8 C, Pradahkalikendal, Dukuh Pakis, Kota SBY, Jawa Timur 60226, Indonesia', '112.68367767333984', '-7.282103458911777');
INSERT INTO `route_vehicle` VALUES ('15', '5', 'Jl. Satelit Indah I, Tanjungsari, Suko Manunggal, Kota SBY, Jawa Timur 60187, Indonesia', '112.6926040649414', '-7.268140546455926');
INSERT INTO `route_vehicle` VALUES ('16', '5', 'Jl. Gumukporong No.19, Simomulyo, Suko Manunggal, Kota SBY, Jawa Timur 60281, Indonesia', '112.71011352539062', '-7.263372623252126');
INSERT INTO `route_vehicle` VALUES ('17', '5', 'Jl. Simo Kwagean No.29, Petemon, Kec. Sawahan, Kota SBY, Jawa Timur 60252, Indonesia', '112.71766662597656', '-7.264734892186246');
INSERT INTO `route_vehicle` VALUES ('18', '5', 'Jl. Wonorejo IV No.145A, Wonorejo, Tegalsari, Kota SBY, Jawa Timur 60263, Indonesia', '112.72933959960938', '-7.270865051283636');
INSERT INTO `route_vehicle` VALUES ('19', '5', 'Jl. Darmo Raya No.63, Keputran, Tegalsari, Kota SBY, Jawa Timur 60265, Indonesia', '112.74032592773438', '-7.285168430305113');
INSERT INTO `route_vehicle` VALUES ('20', '6', 'Jl. Margo Mulyo Indah Blok 1A No.8, Greges, Asemrowo, Kota SBY, Jawa Timur 60186, Indonesia', '112.67681121826172', '-7.245322170444089');
INSERT INTO `route_vehicle` VALUES ('21', '6', 'Jl. Tanjungsari Baru Jl. Tanjungsari Baru V No.48, Tanjungsari, Suko Manunggal, Kota SBY, Jawa Timur 60188, Indonesia', '112.69569396972656', '-7.267459417667015');
INSERT INTO `route_vehicle` VALUES ('22', '6', 'Gg. IIA No.2, Simomulyo, Suko Manunggal, Kota SBY, Jawa Timur 60281, Indonesia', '112.71045684814453', '-7.271205613225012');
INSERT INTO `route_vehicle` VALUES ('23', '6', 'Lorong VIII Jl. Banyu Urip No.29, Kupang Krajan, Kec. Sawahan, Kota SBY, Jawa Timur 60253, Indonesia', '112.72144317626953', '-7.269502800935558');
INSERT INTO `route_vehicle` VALUES ('24', '6', 'Grand Margomulyo Centre, Jl. Margomulyo No.9, Balongsari, Tandes, Kota SBY, Jawa Timur 60186, Indonesia', '112.68058776855469', '-7.25281489910047');
INSERT INTO `route_vehicle` VALUES ('25', '6', 'Jl. Embong Malang No.75, Kedungdoro, Tegalsari, Kota SBY, Jawa Timur 60261, Indonesia', '112.73483276367188', '-7.259285791683904');
INSERT INTO `route_vehicle` VALUES ('26', '6', 'Jl. Raya Darmo Indah No.5, Tandes Kidul, Tandes, Kota SBY, Jawa Timur 60186, Indonesia', '112.68470764160156', '-7.260988642684527');
INSERT INTO `route_vehicle` VALUES ('27', '6', 'Jl. Kalianyar Wtn Sambongan IV No.1, Kapasari, Genteng, Kota SBY, Jawa Timur 60273, Indonesia', '112.74787902832031', '-7.247706233989688');
INSERT INTO `route_vehicle` VALUES ('28', '7', 'Made Utara II No.67, Made, Sambikerep, Kota SBY, Jawa Timur 60219, Indonesia', '112.64350891113281', '-7.268821674212138');
INSERT INTO `route_vehicle` VALUES ('29', '7', 'Jl. Sambikerep Indah Utara VI Blok FV No.2, Sambikerep, Kota SBY, Jawa Timur 60217, Indonesia', '112.65106201171875', '-7.2671188528853135');
INSERT INTO `route_vehicle` VALUES ('30', '7', 'Jl. Manukan Tama No.137, Manukan Kulon, Tandes, Kota SBY, Jawa Timur 60185, Indonesia', '112.66685485839844', '-7.264394325339768');
INSERT INTO `route_vehicle` VALUES ('31', '7', 'Jl. Darmo Indah Tim. IV Blok O No.2, Tandes Kidul, Tandes, Kota SBY, Jawa Timur 60187, Indonesia', '112.68505096435547', '-7.261669781279368');
INSERT INTO `route_vehicle` VALUES ('32', '7', 'Jl. Tol Surabaya - Gempol, Simomulyo, Suko Manunggal, Kota SBY, Jawa Timur 60281, Indonesia', '112.71045684814453', '-7.259285791683904');
INSERT INTO `route_vehicle` VALUES ('33', '7', 'Sawahan Baru III No.21A, Petemon, Kec. Sawahan, Kota SBY, Jawa Timur 60252, Indonesia', '112.7193832397461', '-7.257923506241751');
INSERT INTO `route_vehicle` VALUES ('34', '7', 'Jl. Simpang Dukuh No.23, Genteng, Kota SBY, Jawa Timur 60275, Indonesia', '112.7365493774414', '-7.259285791683904');
INSERT INTO `route_vehicle` VALUES ('35', '7', 'Jl. Kedung Tarukan V No.72, Pacar Kembang, Tambaksari, Kota SBY, Jawa Timur 60132, Indonesia', '112.76298522949219', '-7.2640537582352565');
INSERT INTO `route_vehicle` VALUES ('36', '3', 'Jl. Kalianak Bar. Belakang No.55 L, Asem Rowo, Asemrowo, Kota SBY, Jawa Timur 60182, Indonesia', '112.70599365234375', '-7.239872834988181');
INSERT INTO `route_vehicle` VALUES ('37', '3', 'Jl. Kebalen Tim. No.21, Krembangan Utara, Pabean Cantian, Kota SBY, Jawa Timur 60163, Indonesia', '112.73448944091797', '-7.231017524466847');
INSERT INTO `route_vehicle` VALUES ('38', '3', 'Jl. Pergudangan Margomulyo Permai, Gedangasin, Tandes, Kota SBY, Jawa Timur 60186, Indonesia', '112.68985748291016', '-7.258264077989045');
INSERT INTO `route_vehicle` VALUES ('39', '3', 'Jl. Tol Surabaya - Gempol, Simomulyo, Suko Manunggal, Kota SBY, Jawa Timur 60281, Indonesia', '112.708740234375', '-7.265416025105019');
INSERT INTO `route_vehicle` VALUES ('40', '3', 'Jl. Tidar No.13, Sawahan, Kec. Sawahan, Kota SBY, Jawa Timur 60251, Indonesia', '112.73174285888672', '-7.257923506241751');
INSERT INTO `route_vehicle` VALUES ('41', '3', 'Tempel Sukorejo V No.30, Wonorejo, Tegalsari, Kota SBY, Jawa Timur 60263, Indonesia', '112.72933959960938', '-7.274270659073288');
INSERT INTO `route_vehicle` VALUES ('42', '3', 'Jl. Raya Dukuh Kupang Barat No.16, Dukuh Kupang, Dukuh Pakis, Kota SBY, Jawa Timur 60225, Indonesia', '112.708740234375', '-7.281422351312141');
INSERT INTO `route_vehicle` VALUES ('43', '3', 'Jl. Tambak Pring Utama II A, Asem Rowo, Asemrowo, Kota SBY, Jawa Timur 60182, Indonesia', '112.7083969116211', '-7.2490685503517565');
INSERT INTO `route_vehicle` VALUES ('44', '3', 'Jl. Raya Darmo Harapan, Tanjungsari, Suko Manunggal, Kota SBY, Jawa Timur 60187, Indonesia', '112.6922607421875', '-7.272567858407578');
INSERT INTO `route_vehicle` VALUES ('45', '3', 'Jl. Bukit Darmo Golf No.56, Pradahkalikendal, Dukuh Pakis, Kota SBY, Jawa Timur 60225, Indonesia', '112.69672393798828', '-7.291979402790882');
INSERT INTO `route_vehicle` VALUES ('46', '3', 'Jl. Bumiharjo No.14, Darmo, Wonokromo, Kota SBY, Jawa Timur 60241, Indonesia', '112.7365493774414', '-7.296406479356324');
INSERT INTO `route_vehicle` VALUES ('47', '3', 'Jl. Mayor Jendral Sungkono, Pakis, Kec. Sawahan, Kota SBY, Jawa Timur 60256, Indonesia', '112.71766662597656', '-7.289936121918988');
INSERT INTO `route_vehicle` VALUES ('48', '3', 'Jl. Jajartunggal Timur III Blok A No.3, Jajar Tunggal, Wiyung, Kota SBY, Jawa Timur 60229, Indonesia', '112.7090835571289', '-7.30219566723739');

-- ----------------------------
-- Table structure for `vehicle`
-- ----------------------------
DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2226) NOT NULL,
  `color` varchar(2225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehicle
-- ----------------------------
INSERT INTO `vehicle` VALUES ('3', 'Car A', '#0000FF');
INSERT INTO `vehicle` VALUES ('4', 'Car B', '#A52A2A');
INSERT INTO `vehicle` VALUES ('5', 'Car C', '#7FFF00');
INSERT INTO `vehicle` VALUES ('6', 'Car D', '#FF7F50');
INSERT INTO `vehicle` VALUES ('7', 'Car E', '#9932CC');
