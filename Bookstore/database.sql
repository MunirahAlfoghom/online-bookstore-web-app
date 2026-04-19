-- Create database and tables
CREATE DATABASE IF NOT EXISTS bookstore;
USE bookstore;

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Sample data
INSERT INTO categories (name) VALUES
('Fiction'), ('Non-fiction'), ('Science'), ('History');

INSERT INTO books (title, author, price, category_id) VALUES
 ('Introduction to Algorithms', 'Thomas H. Cormen', 89.99, 3),
  ('Computer Networking: A Top-Down Approach', 'James F. Kurose', 74.50, 3),
  ('Artificial Intelligence: A Modern Approach', 'Stuart Russell', 99.99, 3),
  ('Operating System Concepts', 'Abraham Silberschatz', 79.95, 3),
  ('Database System Concepts', 'Abraham Silberschatz', 84.00, 3),
  ('Computer Organization and Design', 'David A. Patterson', 65.75, 3),
  ('Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 42.99, 3),
  ('The Pragmatic Programmer', 'Andrew Hunt', 39.99, 3),
  ('Design Patterns: Elements of Reusable Object-Oriented Software', 'Erich Gamma', 58.45, 3),
  ('Introduction to the Theory of Computation', 'Michael Sipser', 92.00, 3);

