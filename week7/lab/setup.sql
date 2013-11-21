CREATE TABLE IF NOT EXISTS login (	
	username VARCHAR(30) NOT NULL UNIQUE KEY
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO `login` (`username`) VALUES
('demo'),
('demo1'),
('demo2'),
('demo3'),
('demo4');