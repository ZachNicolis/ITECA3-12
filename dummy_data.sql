USE ecommerce_za;

-- Admin User (password: password123)
INSERT INTO users (username, password, email, first_name, last_name, phone, role) 
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@store.co.za', 'Admin', 'User', '0821234567', 'admin');

-- Sample Products (ZAR prices)
INSERT INTO products (name, description, price, vat_rate) VALUES
('Shweshwe Dress', 'Traditional South African dress', 599.99, 15.00),
('Rooibos Tea 100g', 'Premium South African tea', 89.99, 0.00), -- Zero-rated
('Wireless Boerewors Grill', 'Braai accessory', 1299.99, 15.00);