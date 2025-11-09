CREATE DATABASE db_hotel;
USE db_hotel;

-- Table: rooms
CREATE TABLE rooms (
  id INT AUTO_INCREMENT PRIMARY KEY,
  room_number VARCHAR(10) NOT NULL,
  type VARCHAR(50) NOT NULL,
  price DOUBLE NOT NULL,
  status ENUM('Available', 'Booked') DEFAULT 'Available'
);

-- Table: guests
CREATE TABLE guests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20)
);

-- Table: reservations
CREATE TABLE reservations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  guest_id INT NOT NULL,
  room_id INT NOT NULL,
  checkin_date DATE NOT NULL,
  checkout_date DATE,
  FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE CASCADE,
  FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
);

-- Sample data
INSERT INTO rooms (room_number, type, price, status) VALUES
('101', 'Deluxe', 750000, 'Available'),
('102', 'Suite', 1200000, 'Available'),
('103', 'Standard', 500000, 'Available');

INSERT INTO guests (name, email, phone) VALUES
('John Doe', 'john@example.com', '08123456789'),
('Jane Smith', 'jane@example.com', '08129876543');