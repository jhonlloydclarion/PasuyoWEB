CREATE TABLE Product(
  	prod_id int NOT NULL,
	prod_name varchar(45) NOT NULL,
  	prod_price int NOT NULL,
  	prod_img varchar(45) NOT NULL,
  	prod_category varchar(45) NOT NULL,
	prod_qty int,
  	PRIMARY KEY (prod_id)
);

CREATE TABLE Customer(
  	cust_id int NOT NULL,
	cust_name varchar(45) NOT NULL,
 	cust_mobile int NOT NULL,
  	cust_username varchar(45) NOT NULL,
  	cust_password varchar(45) NOT NULL,
  	PRIMARY KEY (cust_id)
);

CREATE TABLE Cart(
	cart_id int NOT NULL,
  	prod_id INT,
  	cust_id INT,
  	FOREIGN KEY (prod_id) REFERENCES Product(prod_id),
  	FOREIGN KEY (cust_id) REFERENCES Customer(cust_id)
);

CREATE TABLE Orders(
	order_id int NOT NULL,
  	cart_id int,
  	PRIMARY KEY (order_id),
  	FOREIGN KEY (cart_id) REFERENCES Cart(cart_id)
);