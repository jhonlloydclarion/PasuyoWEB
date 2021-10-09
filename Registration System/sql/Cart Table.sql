CREATE TABLE Cart(
	cart_id int NOT NULL,
  	prod_id INT,
  	cust_id INT,
  	FOREIGN KEY (prod_id) REFERENCES Product(prod_id),
  	FOREIGN KEY (cust_id) REFERENCES Customer(cust_id)
);