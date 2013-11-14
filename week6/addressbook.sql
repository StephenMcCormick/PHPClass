--
-- Database: `phplab`
--
CREATE TABLE IF NOT EXISTS `addressbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

INSERT INTO `addressbook` (`id`, `address`, `city`, `state`, `zip`, `name`) VALUES
(1, '123 main st', 'providence', 'RI', '02990', 'James Doe'),
(2, '123 fake ave', 'warwick', 'RI', '02890', 'Amy Kay'),
(3, '334 bold mill', 'cranston', 'RI', '89009', 'Jimmy Gane'),
(4, '1000 Grand Concourse', 'Bronx', 'NY', '10453', 'Slick Rick'),
(5, '923 Fall Hill rd', 'Boston', 'MA', '12405', 'Linda Kryll');