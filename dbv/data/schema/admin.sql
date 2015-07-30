CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(150) NOT NULL,
  `s_name` varchar(150) NOT NULL,
  `phone_no` varchar(150) NOT NULL,
  `physical_address` varchar(150) NOT NULL,
  `postal_address` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1