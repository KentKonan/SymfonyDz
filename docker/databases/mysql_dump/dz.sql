CREATE TABLE php_pro.shortener (
                                   id INT NOT NULL AUTO_INCREMENT,
                                   code VARCHAR(10) NOT NULL,
                                   url VARCHAR(255) NOT NULL,
                                   PRIMARY KEY (id));