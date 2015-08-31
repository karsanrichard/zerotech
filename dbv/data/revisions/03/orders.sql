ALTER TABLE `orders` ADD `status` INT NOT NULL DEFAULT '0' ;
ALTER TABLE `orders` CHANGE `order_date` `order_date` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
INSERT INTO `zerocorp`.`users` (`user_id`, `email`, `hashed_password`, `user_type_id`, `status`) VALUES (NULL, 'karsanrichard@gmail.com', '123456', '1', '1'), (NULL, 'richardkarsan@gmail.com', '123456', '1', '1');
INSERT INTO `zerocorp`.`customer` (`customer_id`, `f_name`, `s_name`, `phone_no`, `physical_address`, `postal_address`, `user_id`) VALUES (NULL, 'Richard', 'Karsan', '707463571', 'Ngumo', 'P.O Box 1201', '1'), (NULL, 'Karsan', 'Seth', '720129525', 'Kigoma babu', 'P.O. Box 1738 DEEZNUTS', '2');
INSERT INTO `zerocorp`.`orders` (`order_id`, `customer_id`, `order_date`, `total`, `status`) VALUES (NULL, '1', CURRENT_TIMESTAMP, '10000', '1'), (NULL, '2', CURRENT_TIMESTAMP, '2000', '1');
INSERT INTO `zerocorp`.`order_details` (`order_id`, `product_id`, `quantity`, `price`, `order_date`) VALUES ('2', '8', '2', '1400', CURRENT_TIMESTAMP), ('2', '3', '1', '45000', CURRENT_TIMESTAMP);
UPDATE `zerocorp`.`orders` SET `total` = '46400' WHERE `orders`.`order_id` = 2;
