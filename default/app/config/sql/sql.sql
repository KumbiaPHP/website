
SET NAMES 'utf8';
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categoria`
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'CMS', '1');
INSERT INTO `categoria` VALUES ('2', 'Personal', '1');
INSERT INTO `categoria` VALUES ('3', 'Educación', '1');

-- ----------------------------
-- Table structure for `escaparate`
-- ----------------------------
DROP TABLE IF EXISTS `escaparate`;
CREATE TABLE `escaparate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pais_id` int(11) unsigned NOT NULL,
  `categoria_id` int(11) unsigned NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `thumbnail` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `tags` varchar(250) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of escaparate
-- ----------------------------

-- ----------------------------
-- Table structure for `pais`
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `isonum` smallint(6) DEFAULT NULL,
  `iso2` char(2) DEFAULT NULL,
  `iso3` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pais
-- ----------------------------
INSERT INTO `pais` VALUES ('1', 'Afganistán', '4', 'AF', 'AFG');
INSERT INTO `pais` VALUES ('2', 'Islas Gland', '248', 'AX', 'ALA');
INSERT INTO `pais` VALUES ('3', 'Albania', '8', 'AL', 'ALB');
INSERT INTO `pais` VALUES ('4', 'Alemania', '276', 'DE', 'DEU');
INSERT INTO `pais` VALUES ('5', 'Andorra', '20', 'AD', 'AND');
INSERT INTO `pais` VALUES ('6', 'Angola', '24', 'AO', 'AGO');
INSERT INTO `pais` VALUES ('7', 'Anguilla', '660', 'AI', 'AIA');
INSERT INTO `pais` VALUES ('8', 'Antártida', '10', 'AQ', 'ATA');
INSERT INTO `pais` VALUES ('9', 'Antigua y Barbuda', '28', 'AG', 'ATG');
INSERT INTO `pais` VALUES ('10', 'Antillas Holandesas', '530', 'AN', 'ANT');
INSERT INTO `pais` VALUES ('11', 'Arabia Saudí', '682', 'SA', 'SAU');
INSERT INTO `pais` VALUES ('12', 'Argelia', '12', 'DZ', 'DZA');
INSERT INTO `pais` VALUES ('13', 'Argentina', '32', 'AR', 'ARG');
INSERT INTO `pais` VALUES ('14', 'Armenia', '51', 'AM', 'ARM');
INSERT INTO `pais` VALUES ('15', 'Aruba', '533', 'AW', 'ABW');
INSERT INTO `pais` VALUES ('16', 'Australia', '36', 'AU', 'AUS');
INSERT INTO `pais` VALUES ('17', 'Austria', '40', 'AT', 'AUT');
INSERT INTO `pais` VALUES ('18', 'Azerbaiyán', '31', 'AZ', 'AZE');
INSERT INTO `pais` VALUES ('19', 'Bahamas', '44', 'BS', 'BHS');
INSERT INTO `pais` VALUES ('20', 'Bahréin', '48', 'BH', 'BHR');
INSERT INTO `pais` VALUES ('21', 'Bangladesh', '50', 'BD', 'BGD');
INSERT INTO `pais` VALUES ('22', 'Barbados', '52', 'BB', 'BRB');
INSERT INTO `pais` VALUES ('23', 'Bielorrusia', '112', 'BY', 'BLR');
INSERT INTO `pais` VALUES ('24', 'Bélgica', '56', 'BE', 'BEL');
INSERT INTO `pais` VALUES ('25', 'Belice', '84', 'BZ', 'BLZ');
INSERT INTO `pais` VALUES ('26', 'Benin', '204', 'BJ', 'BEN');
INSERT INTO `pais` VALUES ('27', 'Bermudas', '60', 'BM', 'BMU');
INSERT INTO `pais` VALUES ('28', 'Bhután', '64', 'BT', 'BTN');
INSERT INTO `pais` VALUES ('29', 'Bolivia', '68', 'BO', 'BOL');
INSERT INTO `pais` VALUES ('30', 'Bosnia y Herzegovina', '70', 'BA', 'BIH');
INSERT INTO `pais` VALUES ('31', 'Botsuana', '72', 'BW', 'BWA');
INSERT INTO `pais` VALUES ('32', 'Isla Bouvet', '74', 'BV', 'BVT');
INSERT INTO `pais` VALUES ('33', 'Brasil', '76', 'BR', 'BRA');
INSERT INTO `pais` VALUES ('34', 'Brunéi', '96', 'BN', 'BRN');
INSERT INTO `pais` VALUES ('35', 'Bulgaria', '100', 'BG', 'BGR');
INSERT INTO `pais` VALUES ('36', 'Burkina Faso', '854', 'BF', 'BFA');
INSERT INTO `pais` VALUES ('37', 'Burundi', '108', 'BI', 'BDI');
INSERT INTO `pais` VALUES ('38', 'Cabo Verde', '132', 'CV', 'CPV');
INSERT INTO `pais` VALUES ('39', 'Islas Caimán', '136', 'KY', 'CYM');
INSERT INTO `pais` VALUES ('40', 'Camboya', '116', 'KH', 'KHM');
INSERT INTO `pais` VALUES ('41', 'Camerún', '120', 'CM', 'CMR');
INSERT INTO `pais` VALUES ('42', 'Canadá', '124', 'CA', 'CAN');
INSERT INTO `pais` VALUES ('43', 'República Centroafricana', '140', 'CF', 'CAF');
INSERT INTO `pais` VALUES ('44', 'Chad', '148', 'TD', 'TCD');
INSERT INTO `pais` VALUES ('45', 'República Checa', '203', 'CZ', 'CZE');
INSERT INTO `pais` VALUES ('46', 'Chile', '152', 'CL', 'CHL');
INSERT INTO `pais` VALUES ('47', 'China', '156', 'CN', 'CHN');
INSERT INTO `pais` VALUES ('48', 'Chipre', '196', 'CY', 'CYP');
INSERT INTO `pais` VALUES ('49', 'Isla de Navidad', '162', 'CX', 'CXR');
INSERT INTO `pais` VALUES ('50', 'Ciudad del Vaticano', '336', 'VA', 'VAT');
INSERT INTO `pais` VALUES ('51', 'Islas Cocos', '166', 'CC', 'CCK');
INSERT INTO `pais` VALUES ('52', 'Colombia', '170', 'CO', 'COL');
INSERT INTO `pais` VALUES ('53', 'Comoras', '174', 'KM', 'COM');
INSERT INTO `pais` VALUES ('54', 'República Democrática del Congo', '180', 'CD', 'COD');
INSERT INTO `pais` VALUES ('55', 'Congo', '178', 'CG', 'COG');
INSERT INTO `pais` VALUES ('56', 'Islas Cook', '184', 'CK', 'COK');
INSERT INTO `pais` VALUES ('57', 'Corea del Norte', '408', 'KP', 'PRK');
INSERT INTO `pais` VALUES ('58', 'Corea del Sur', '410', 'KR', 'KOR');
INSERT INTO `pais` VALUES ('59', 'Costa de Marfil', '384', 'CI', 'CIV');
INSERT INTO `pais` VALUES ('60', 'Costa Rica', '188', 'CR', 'CRI');
INSERT INTO `pais` VALUES ('61', 'Croacia', '191', 'HR', 'HRV');
INSERT INTO `pais` VALUES ('62', 'Cuba', '192', 'CU', 'CUB');
INSERT INTO `pais` VALUES ('63', 'Dinamarca', '208', 'DK', 'DNK');
INSERT INTO `pais` VALUES ('64', 'Dominica', '212', 'DM', 'DMA');
INSERT INTO `pais` VALUES ('65', 'República Dominicana', '214', 'DO', 'DOM');
INSERT INTO `pais` VALUES ('66', 'Ecuador', '218', 'EC', 'ECU');
INSERT INTO `pais` VALUES ('67', 'Egipto', '818', 'EG', 'EGY');
INSERT INTO `pais` VALUES ('68', 'El Salvador', '222', 'SV', 'SLV');
INSERT INTO `pais` VALUES ('69', 'Emiratos Árabes Unidos', '784', 'AE', 'ARE');
INSERT INTO `pais` VALUES ('70', 'Eritrea', '232', 'ER', 'ERI');
INSERT INTO `pais` VALUES ('71', 'Eslovaquia', '703', 'SK', 'SVK');
INSERT INTO `pais` VALUES ('72', 'Eslovenia', '705', 'SI', 'SVN');
INSERT INTO `pais` VALUES ('73', 'España', '724', 'ES', 'ESP');
INSERT INTO `pais` VALUES ('74', 'Islas ultramarinas de Estados Unidos', '581', 'UM', 'UMI');
INSERT INTO `pais` VALUES ('75', 'Estados Unidos', '840', 'US', 'USA');
INSERT INTO `pais` VALUES ('76', 'Estonia', '233', 'EE', 'EST');
INSERT INTO `pais` VALUES ('77', 'Etiopía', '231', 'ET', 'ETH');
INSERT INTO `pais` VALUES ('78', 'Islas Feroe', '234', 'FO', 'FRO');
INSERT INTO `pais` VALUES ('79', 'Filipinas', '608', 'PH', 'PHL');
INSERT INTO `pais` VALUES ('80', 'Finlandia', '246', 'FI', 'FIN');
INSERT INTO `pais` VALUES ('81', 'Fiyi', '242', 'FJ', 'FJI');
INSERT INTO `pais` VALUES ('82', 'Francia', '250', 'FR', 'FRA');
INSERT INTO `pais` VALUES ('83', 'Gabón', '266', 'GA', 'GAB');
INSERT INTO `pais` VALUES ('84', 'Gambia', '270', 'GM', 'GMB');
INSERT INTO `pais` VALUES ('85', 'Georgia', '268', 'GE', 'GEO');
INSERT INTO `pais` VALUES ('86', 'Islas Georgias del Sur y Sandwich del Sur', '239', 'GS', 'SGS');
INSERT INTO `pais` VALUES ('87', 'Ghana', '288', 'GH', 'GHA');
INSERT INTO `pais` VALUES ('88', 'Gibraltar', '292', 'GI', 'GIB');
INSERT INTO `pais` VALUES ('89', 'Granada', '308', 'GD', 'GRD');
INSERT INTO `pais` VALUES ('90', 'Grecia', '300', 'GR', 'GRC');
INSERT INTO `pais` VALUES ('91', 'Groenlandia', '304', 'GL', 'GRL');
INSERT INTO `pais` VALUES ('92', 'Guadalupe', '312', 'GP', 'GLP');
INSERT INTO `pais` VALUES ('93', 'Guam', '316', 'GU', 'GUM');
INSERT INTO `pais` VALUES ('94', 'Guatemala', '320', 'GT', 'GTM');
INSERT INTO `pais` VALUES ('95', 'Guayana Francesa', '254', 'GF', 'GUF');
INSERT INTO `pais` VALUES ('96', 'Guinea', '324', 'GN', 'GIN');
INSERT INTO `pais` VALUES ('97', 'Guinea Ecuatorial', '226', 'GQ', 'GNQ');
INSERT INTO `pais` VALUES ('98', 'Guinea-Bissau', '624', 'GW', 'GNB');
INSERT INTO `pais` VALUES ('99', 'Guyana', '328', 'GY', 'GUY');
INSERT INTO `pais` VALUES ('100', 'Haití', '332', 'HT', 'HTI');
INSERT INTO `pais` VALUES ('101', 'Islas Heard y McDonald', '334', 'HM', 'HMD');
INSERT INTO `pais` VALUES ('102', 'Honduras', '340', 'HN', 'HND');
INSERT INTO `pais` VALUES ('103', 'Hong Kong', '344', 'HK', 'HKG');
INSERT INTO `pais` VALUES ('104', 'Hungría', '348', 'HU', 'HUN');
INSERT INTO `pais` VALUES ('105', 'India', '356', 'IN', 'IND');
INSERT INTO `pais` VALUES ('106', 'Indonesia', '360', 'ID', 'IDN');
INSERT INTO `pais` VALUES ('107', 'Irán', '364', 'IR', 'IRN');
INSERT INTO `pais` VALUES ('108', 'Iraq', '368', 'IQ', 'IRQ');
INSERT INTO `pais` VALUES ('109', 'Irlanda', '372', 'IE', 'IRL');
INSERT INTO `pais` VALUES ('110', 'Islandia', '352', 'IS', 'ISL');
INSERT INTO `pais` VALUES ('111', 'Israel', '376', 'IL', 'ISR');
INSERT INTO `pais` VALUES ('112', 'Italia', '380', 'IT', 'ITA');
INSERT INTO `pais` VALUES ('113', 'Jamaica', '388', 'JM', 'JAM');
INSERT INTO `pais` VALUES ('114', 'Japón', '392', 'JP', 'JPN');
INSERT INTO `pais` VALUES ('115', 'Jordania', '400', 'JO', 'JOR');
INSERT INTO `pais` VALUES ('116', 'Kazajstán', '398', 'KZ', 'KAZ');
INSERT INTO `pais` VALUES ('117', 'Kenia', '404', 'KE', 'KEN');
INSERT INTO `pais` VALUES ('118', 'Kirguistán', '417', 'KG', 'KGZ');
INSERT INTO `pais` VALUES ('119', 'Kiribati', '296', 'KI', 'KIR');
INSERT INTO `pais` VALUES ('120', 'Kuwait', '414', 'KW', 'KWT');
INSERT INTO `pais` VALUES ('121', 'Laos', '418', 'LA', 'LAO');
INSERT INTO `pais` VALUES ('122', 'Lesotho', '426', 'LS', 'LSO');
INSERT INTO `pais` VALUES ('123', 'Letonia', '428', 'LV', 'LVA');
INSERT INTO `pais` VALUES ('124', 'Líbano', '422', 'LB', 'LBN');
INSERT INTO `pais` VALUES ('125', 'Liberia', '430', 'LR', 'LBR');
INSERT INTO `pais` VALUES ('126', 'Libia', '434', 'LY', 'LBY');
INSERT INTO `pais` VALUES ('127', 'Liechtenstein', '438', 'LI', 'LIE');
INSERT INTO `pais` VALUES ('128', 'Lituania', '440', 'LT', 'LTU');
INSERT INTO `pais` VALUES ('129', 'Luxemburgo', '442', 'LU', 'LUX');
INSERT INTO `pais` VALUES ('130', 'Macao', '446', 'MO', 'MAC');
INSERT INTO `pais` VALUES ('131', 'ARY Macedonia', '807', 'MK', 'MKD');
INSERT INTO `pais` VALUES ('132', 'Madagascar', '450', 'MG', 'MDG');
INSERT INTO `pais` VALUES ('133', 'Malasia', '458', 'MY', 'MYS');
INSERT INTO `pais` VALUES ('134', 'Malawi', '454', 'MW', 'MWI');
INSERT INTO `pais` VALUES ('135', 'Maldivas', '462', 'MV', 'MDV');
INSERT INTO `pais` VALUES ('136', 'Malí', '466', 'ML', 'MLI');
INSERT INTO `pais` VALUES ('137', 'Malta', '470', 'MT', 'MLT');
INSERT INTO `pais` VALUES ('138', 'Islas Malvinas', '238', 'FK', 'FLK');
INSERT INTO `pais` VALUES ('139', 'Islas Marianas del Norte', '580', 'MP', 'MNP');
INSERT INTO `pais` VALUES ('140', 'Marruecos', '504', 'MA', 'MAR');
INSERT INTO `pais` VALUES ('141', 'Islas Marshall', '584', 'MH', 'MHL');
INSERT INTO `pais` VALUES ('142', 'Martinica', '474', 'MQ', 'MTQ');
INSERT INTO `pais` VALUES ('143', 'Mauricio', '480', 'MU', 'MUS');
INSERT INTO `pais` VALUES ('144', 'Mauritania', '478', 'MR', 'MRT');
INSERT INTO `pais` VALUES ('145', 'Mayotte', '175', 'YT', 'MYT');
INSERT INTO `pais` VALUES ('146', 'México', '484', 'MX', 'MEX');
INSERT INTO `pais` VALUES ('147', 'Micronesia', '583', 'FM', 'FSM');
INSERT INTO `pais` VALUES ('148', 'Moldavia', '498', 'MD', 'MDA');
INSERT INTO `pais` VALUES ('149', 'Mónaco', '492', 'MC', 'MCO');
INSERT INTO `pais` VALUES ('150', 'Mongolia', '496', 'MN', 'MNG');
INSERT INTO `pais` VALUES ('151', 'Montserrat', '500', 'MS', 'MSR');
INSERT INTO `pais` VALUES ('152', 'Mozambique', '508', 'MZ', 'MOZ');
INSERT INTO `pais` VALUES ('153', 'Myanmar', '104', 'MM', 'MMR');
INSERT INTO `pais` VALUES ('154', 'Namibia', '516', 'NA', 'NAM');
INSERT INTO `pais` VALUES ('155', 'Nauru', '520', 'NR', 'NRU');
INSERT INTO `pais` VALUES ('156', 'Nepal', '524', 'NP', 'NPL');
INSERT INTO `pais` VALUES ('157', 'Nicaragua', '558', 'NI', 'NIC');
INSERT INTO `pais` VALUES ('158', 'Níger', '562', 'NE', 'NER');
INSERT INTO `pais` VALUES ('159', 'Nigeria', '566', 'NG', 'NGA');
INSERT INTO `pais` VALUES ('160', 'Niue', '570', 'NU', 'NIU');
INSERT INTO `pais` VALUES ('161', 'Isla Norfolk', '574', 'NF', 'NFK');
INSERT INTO `pais` VALUES ('162', 'Noruega', '578', 'NO', 'NOR');
INSERT INTO `pais` VALUES ('163', 'Nueva Caledonia', '540', 'NC', 'NCL');
INSERT INTO `pais` VALUES ('164', 'Nueva Zelanda', '554', 'NZ', 'NZL');
INSERT INTO `pais` VALUES ('165', 'Omán', '512', 'OM', 'OMN');
INSERT INTO `pais` VALUES ('166', 'Países Bajos', '528', 'NL', 'NLD');
INSERT INTO `pais` VALUES ('167', 'Pakistán', '586', 'PK', 'PAK');
INSERT INTO `pais` VALUES ('168', 'Palau', '585', 'PW', 'PLW');
INSERT INTO `pais` VALUES ('169', 'Palestina', '275', 'PS', 'PSE');
INSERT INTO `pais` VALUES ('170', 'Panamá', '591', 'PA', 'PAN');
INSERT INTO `pais` VALUES ('171', 'Papúa Nueva Guinea', '598', 'PG', 'PNG');
INSERT INTO `pais` VALUES ('172', 'Paraguay', '600', 'PY', 'PRY');
INSERT INTO `pais` VALUES ('173', 'Perú', '604', 'PE', 'PER');
INSERT INTO `pais` VALUES ('174', 'Islas Pitcairn', '612', 'PN', 'PCN');
INSERT INTO `pais` VALUES ('175', 'Polinesia Francesa', '258', 'PF', 'PYF');
INSERT INTO `pais` VALUES ('176', 'Polonia', '616', 'PL', 'POL');
INSERT INTO `pais` VALUES ('177', 'Portugal', '620', 'PT', 'PRT');
INSERT INTO `pais` VALUES ('178', 'Puerto Rico', '630', 'PR', 'PRI');
INSERT INTO `pais` VALUES ('179', 'Qatar', '634', 'QA', 'QAT');
INSERT INTO `pais` VALUES ('180', 'Reino Unido', '826', 'GB', 'GBR');
INSERT INTO `pais` VALUES ('181', 'Reunión', '638', 'RE', 'REU');
INSERT INTO `pais` VALUES ('182', 'Ruanda', '646', 'RW', 'RWA');
INSERT INTO `pais` VALUES ('183', 'Rumania', '642', 'RO', 'ROU');
INSERT INTO `pais` VALUES ('184', 'Rusia', '643', 'RU', 'RUS');
INSERT INTO `pais` VALUES ('185', 'Sahara Occidental', '732', 'EH', 'ESH');
INSERT INTO `pais` VALUES ('186', 'Islas Salomón', '90', 'SB', 'SLB');
INSERT INTO `pais` VALUES ('187', 'Samoa', '882', 'WS', 'WSM');
INSERT INTO `pais` VALUES ('188', 'Samoa Americana', '16', 'AS', 'ASM');
INSERT INTO `pais` VALUES ('189', 'San Cristóbal y Nevis', '659', 'KN', 'KNA');
INSERT INTO `pais` VALUES ('190', 'San Marino', '674', 'SM', 'SMR');
INSERT INTO `pais` VALUES ('191', 'San Pedro y Miquelón', '666', 'PM', 'SPM');
INSERT INTO `pais` VALUES ('192', 'San Vicente y las Granadinas', '670', 'VC', 'VCT');
INSERT INTO `pais` VALUES ('193', 'Santa Helena', '654', 'SH', 'SHN');
INSERT INTO `pais` VALUES ('194', 'Santa Lucía', '662', 'LC', 'LCA');
INSERT INTO `pais` VALUES ('195', 'Santo Tomé y Príncipe', '678', 'ST', 'STP');
INSERT INTO `pais` VALUES ('196', 'Senegal', '686', 'SN', 'SEN');
INSERT INTO `pais` VALUES ('197', 'Serbia y Montenegro', '891', 'CS', 'SCG');
INSERT INTO `pais` VALUES ('198', 'Seychelles', '690', 'SC', 'SYC');
INSERT INTO `pais` VALUES ('199', 'Sierra Leona', '694', 'SL', 'SLE');
INSERT INTO `pais` VALUES ('200', 'Singapur', '702', 'SG', 'SGP');
INSERT INTO `pais` VALUES ('201', 'Siria', '760', 'SY', 'SYR');
INSERT INTO `pais` VALUES ('202', 'Somalia', '706', 'SO', 'SOM');
INSERT INTO `pais` VALUES ('203', 'Sri Lanka', '144', 'LK', 'LKA');
INSERT INTO `pais` VALUES ('204', 'Suazilandia', '748', 'SZ', 'SWZ');
INSERT INTO `pais` VALUES ('205', 'Sudáfrica', '710', 'ZA', 'ZAF');
INSERT INTO `pais` VALUES ('206', 'Sudán', '736', 'SD', 'SDN');
INSERT INTO `pais` VALUES ('207', 'Suecia', '752', 'SE', 'SWE');
INSERT INTO `pais` VALUES ('208', 'Suiza', '756', 'CH', 'CHE');
INSERT INTO `pais` VALUES ('209', 'Surinam', '740', 'SR', 'SUR');
INSERT INTO `pais` VALUES ('210', 'Svalbard y Jan Mayen', '744', 'SJ', 'SJM');
INSERT INTO `pais` VALUES ('211', 'Tailandia', '764', 'TH', 'THA');
INSERT INTO `pais` VALUES ('212', 'Taiwán', '158', 'TW', 'TWN');
INSERT INTO `pais` VALUES ('213', 'Tanzania', '834', 'TZ', 'TZA');
INSERT INTO `pais` VALUES ('214', 'Tayikistán', '762', 'TJ', 'TJK');
INSERT INTO `pais` VALUES ('215', 'Territorio Británico del Océano Índico', '86', 'IO', 'IOT');
INSERT INTO `pais` VALUES ('216', 'Territorios Australes Franceses', '260', 'TF', 'ATF');
INSERT INTO `pais` VALUES ('217', 'Timor Oriental', '626', 'TL', 'TLS');
INSERT INTO `pais` VALUES ('218', 'Togo', '768', 'TG', 'TGO');
INSERT INTO `pais` VALUES ('219', 'Tokelau', '772', 'TK', 'TKL');
INSERT INTO `pais` VALUES ('220', 'Tonga', '776', 'TO', 'TON');
INSERT INTO `pais` VALUES ('221', 'Trinidad y Tobago', '780', 'TT', 'TTO');
INSERT INTO `pais` VALUES ('222', 'Túnez', '788', 'TN', 'TUN');
INSERT INTO `pais` VALUES ('223', 'Islas Turcas y Caicos', '796', 'TC', 'TCA');
INSERT INTO `pais` VALUES ('224', 'Turkmenistán', '795', 'TM', 'TKM');
INSERT INTO `pais` VALUES ('225', 'Turquía', '792', 'TR', 'TUR');
INSERT INTO `pais` VALUES ('226', 'Tuvalu', '798', 'TV', 'TUV');
INSERT INTO `pais` VALUES ('227', 'Ucrania', '804', 'UA', 'UKR');
INSERT INTO `pais` VALUES ('228', 'Uganda', '800', 'UG', 'UGA');
INSERT INTO `pais` VALUES ('229', 'Uruguay', '858', 'UY', 'URY');
INSERT INTO `pais` VALUES ('230', 'Uzbekistán', '860', 'UZ', 'UZB');
INSERT INTO `pais` VALUES ('231', 'Vanuatu', '548', 'VU', 'VUT');
INSERT INTO `pais` VALUES ('232', 'Venezuela', '862', 'VE', 'VEN');
INSERT INTO `pais` VALUES ('233', 'Vietnam', '704', 'VN', 'VNM');
INSERT INTO `pais` VALUES ('234', 'Islas Vírgenes Británicas', '92', 'VG', 'VGB');
INSERT INTO `pais` VALUES ('235', 'Islas Vírgenes de los Estados Unidos', '850', 'VI', 'VIR');
INSERT INTO `pais` VALUES ('236', 'Wallis y Futuna', '876', 'WF', 'WLF');
INSERT INTO `pais` VALUES ('237', 'Yemen', '887', 'YE', 'YEM');
INSERT INTO `pais` VALUES ('238', 'Yibuti', '262', 'DJ', 'DJI');
INSERT INTO `pais` VALUES ('239', 'Zambia', '894', 'ZM', 'ZMB');
INSERT INTO `pais` VALUES ('240', 'Zimbabue', '716', 'ZW', 'ZWE');
