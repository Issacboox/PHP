CREATE USER 'bamboo'@'localhost' IDENTIFIED BY 'bamboo001';

GRANT USAGE ON * . * TO 'bamboo'@'localhost'  IDENTIFIED BY 'bamboo001' 
WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

CREATE DATABASE  bamboo   DEFAULT CHARSET=utf8 ;

GRANT ALL PRIVILEGES ON  bamboo  . * TO 'bamboo'@'localhost' WITH GRANT OPTION ;

use bamboo  ;

CREATE TABLE `buy` (
  `buy_id` varchar(8) NOT NULL,
  `sup_id` varchar(5) NOT NULL,
  `buy_date` date DEFAULT NULL,
  `buy_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `buy` (`buy_id`, `sup_id`, `buy_date`, `buy_status`) VALUES
('BY00001', 'S0001', '2018-03-01', 'C'),
('BY00002', 'S0002', '2018-03-02', 'C');

CREATE TABLE `buy_detail` (
  `buy_id` varchar(8) NOT NULL,
  `item` int(10) UNSIGNED NOT NULL,
  `buy_cost` decimal(10,2) NOT NULL,
  `buy_amount` int(11) DEFAULT NULL,
  `raw_id` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `buy_detail` (`buy_id`, `item`, `buy_cost`, `buy_amount`, `raw_id`) VALUES
('BY00001', 1, '8.00', 40, 'R01'),
('BY00001', 2, '20.00', 60, 'R02'),
('BY00002', 1, '8.00', 40, 'R01'),
('BY00002', 2, '20.00', 70, 'R02');

CREATE TABLE `customer` (
  `cus_id` varchar(5) NOT NULL,
  `cus_name` varchar(40) DEFAULT NULL,
  `cus_phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_phone`) VALUES
('cs001', 'อิทธิกร มานะดี', '0817725683'),
('cs002', 'อิทธิพล สำเนียงเสนาะ', '0865452166'),
('cs003', 'อิทธิพันธ์ คูเจริญวัฒนะ', '0884542563');

CREATE TABLE `product` (
  `prod_id` varchar(5) NOT NULL,
  `prod_desc` varchar(20) DEFAULT NULL,
  `prod_amount` int(10) UNSIGNED DEFAULT NULL,
  `prod_cost` decimal(10,2) DEFAULT NULL,
  `prod_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`prod_id`, `prod_desc`, `prod_amount`, `prod_cost`, `prod_price`) VALUES
('PD001', 'เก้าอี้ไม้ไผ่', 0, '120.00', '250.00'),
('PD002', 'โต๊ะไม้ไผ่', 0, '250.00', '500.00'),
('PD003', 'แคร่ไม้ไผ่', 0, '300.00', '800.00');

CREATE TABLE `raw_material` (
  `raw_id` varchar(3) NOT NULL,
  `raw_desc` varchar(20) DEFAULT NULL,
  `raw_amount` int(11) DEFAULT NULL,
  `raw_min_amount` int(11) DEFAULT NULL,
  `raw_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `raw_material` (`raw_id`, `raw_desc`, `raw_amount`, `raw_min_amount`, `raw_cost`) VALUES
('R01', 'ไผ่ตง', 54, 50, '8.00'),
('R02', 'ไผ่สีสุก', 94, 75, '20.00');

CREATE TABLE `rule` (
  `raw_id` varchar(3) NOT NULL,
  `prod_id` varchar(5) NOT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `rule` (`raw_id`, `prod_id`, `amount`) VALUES
('R01', 'PD001', 1),
('R01', 'PD002', 4),
('R01', 'PD003', 8),
('R02', 'PD001', 4),
('R02', 'PD002', 8),
('R02', 'PD003', 12);

CREATE TABLE `sale` (
  `sale_id` varchar(8) NOT NULL,
  `cus_id` varchar(5) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `recieve_date` date DEFAULT NULL,
  `sale_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sale` (`sale_id`, `cus_id`, `sale_date`, `recieve_date`, `sale_status`) VALUES
('SL000001', 'cs001', '2019-07-31', '2019-08-02', 'C'),
('SL000002', 'cs002', '2019-07-31', '2019-08-03', 'C'),
('SL000003', 'cs001', '2019-08-01', NULL, 'N'),
('SL000004', 'cs003', '2019-08-01', NULL, 'N');

-- --------------------------------------------------------

CREATE TABLE `sale_use_material` (
  `raw_id` varchar(3) NOT NULL,
  `sale_id` varchar(8) NOT NULL,
  `use_amount` int(11) DEFAULT NULL,
  `raw_cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sale_use_material` (`raw_id`, `sale_id`, `use_amount`, `raw_cost`) VALUES
('R01', 'SL000001', 2, '8.00'),
('R01', 'SL000002', 8, '8.00'),
('R01', 'SL000003', 8, '8.00'),
('R01', 'SL000004', 8, '8.00'),
('R02', 'SL000001', 8, '20.00'),
('R02', 'SL000002', 24, '20.00'),
('R02', 'SL000003', 12, '20.00'),
('R02', 'SL000004', 12, '20.00');

CREATE TABLE `supplier` (
  `sup_id` varchar(5) NOT NULL,
  `sub_desc` varchar(30) DEFAULT NULL,
  `sub_phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `supplier` (`sup_id`, `sub_desc`, `sub_phone`) VALUES
('S0001', 'ธนธร', '0895152436'),
('S0002', 'ธนวิน', '0864112413'),
('S0003', 'อุดม', '0875542435');