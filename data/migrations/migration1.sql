ALTER TABLE `work_orders` CHANGE `accomplishement_verification_date` `accomplishement_verification_date` DATE NULL DEFAULT NULL;
ALTER TABLE `work_orders` ADD `aircraft_part_type` VARCHAR(255) NOT NULL AFTER `serial_number`;
