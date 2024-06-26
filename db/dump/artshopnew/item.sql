-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.34 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table artshopnew.item: ~2 rows (approximately)
REPLACE INTO `item` (`id`, `Name`, `Description`, `itemCategories_id`, `whomade_id`, `RenewalOption_id`, `price`, `quantity`, `status_id`, `personalizationInstructions`, `defaultInstructions`, `weight`, `length`, `width`, `height`, `returnPolicy_id`, `shippingServices_id`, `handlingFee`, `itemType_id`, `shippingOpType_id`, `language_id`, `currency_id`, `Section_id`, `Ship_to_where_id`, `Processing_time_id`, `shop_id`, `video`, `origin_ZIP`, `seller_id`) VALUES
	(3, 'dgsdg', 'fsafaf', 1, 1, 1, 564456, '6456', 1, '65464564', '654645', 654, 6456, 456, 456, 2, 2, 25, 1, 2, 1, 1, 27, 2, 8, 4, 'C:fakepath20231122_150809.mp4', '6546', 2),
	(7, 'agdg', '645646', 2, 2, 1, 65466546, '6456', 1, '6456', '45646', 6456, 6546, 645645, 6456, 1, 2, 25, 1, 2, 2, 1, 31, 1, 1, 10, 'C:fakepath20231122_104454.mp4', '6546', 6);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
