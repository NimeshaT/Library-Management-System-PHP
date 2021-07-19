CREATE DATABASE library;

USE library;

CREATE TABLE user(
    uid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    address VARCHAR(255),
    email VARCHAR(100),
    mobile VARCHAR(20),
    password VARCHAR(255),
    active BOOLEAN,
    role VARCHAR(1),
    join_date date,
    photo VARCHAR(45)
);

DESC user;

CREATE TABLE category(
    cid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);

DESC category;

CREATE TABLE author(
    oid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);

DESC author;

CREATE TABLE book(
    bid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    availability BOOLEAN,
    view_count INT(11),
    photo VARCHAR(255),
    oid INT NOT NULL,
    cid INT NOT NULL,
    FOREIGN KEY(oid) REFERENCES author(oid),
    FOREIGN KEY(cid) REFERENCES category(cid)
);

DESC book;

CREATE TABLE lending(
    lid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dueDate DATE,
    returnDate DATE,
    bid INT NOT NULL,
    uid INT NOT NULL,
    FOREIGN KEY(bid) REFERENCES book(bid),
    FOREIGN KEY(uid) REFERENCES user(uid)
);

DESC lending;

-- //CREATE VIEW car_daily_count AS (SELECT DATE(date) AS date, COUNT(id) AS car_aount FROM car GROUP BY DATE(date));
-- CREATE VIEW car_brand_count AS (SELECT COUNT(car.id) AS car_count,model.brand_id,brand.name AS brand_name FROM car INNER JOIN model ON model.id=car.model_id INNER JOIN brand ON brand.id=model.brand_id GROUP BY model.brand_id);


CREATE VIEW book_category_count AS(SELECT cid,SUM(availability) AS book_count FROM book GROUP BY cid);

SELECT DISTINCT  category.name from category  INNER JOIN book ON book.cid=category.cid;

CREATE VIEW book_category_count AS(SELECT DISTINCT  category.name from category  INNER JOIN book ON book.cid=category.cid AND SUM(availability) AS book_count FROM book GROUP BY cid);