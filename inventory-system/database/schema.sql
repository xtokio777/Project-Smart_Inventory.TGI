-- Create Database
CREATE DATABASE IF NOT EXISTS inventory_system;
USE inventory_system;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'staff') DEFAULT 'staff',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Categories Table
CREATE TABLE IF NOT EXISTS categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) UNIQUE NOT NULL,
    description TEXT,
    icon VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Asset Status Table
CREATE TABLE IF NOT EXISTS asset_status (
    status_id INT AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(30) UNIQUE NOT NULL,
    status_color VARCHAR(7),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Assets Table
CREATE TABLE IF NOT EXISTS assets (
    asset_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_tag VARCHAR(50) UNIQUE NOT NULL,
    asset_name VARCHAR(100) NOT NULL,
    category_id INT NOT NULL,
    brand VARCHAR(50),
    model VARCHAR(50),
    serial_number VARCHAR(100),
    purchase_date DATE,
    purchase_price DECIMAL(10, 2),
    warranty_expiry DATE,
    status_id INT NOT NULL,
    location VARCHAR(100),
    assigned_to VARCHAR(100),
    notes TEXT,
    qr_code VARCHAR(255),
    image VARCHAR(255),
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE,
    FOREIGN KEY (status_id) REFERENCES asset_status(status_id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(user_id) ON DELETE SET NULL
);

-- Asset History Table (for tracking status changes)
CREATE TABLE IF NOT EXISTS asset_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    previous_status INT,
    new_status INT NOT NULL,
    changed_by INT,
    change_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT,
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id) ON DELETE CASCADE,
    FOREIGN KEY (previous_status) REFERENCES asset_status(status_id) ON DELETE SET NULL,
    FOREIGN KEY (new_status) REFERENCES asset_status(status_id) ON DELETE CASCADE,
    FOREIGN KEY (changed_by) REFERENCES users(user_id) ON DELETE SET NULL
);

-- Activity Logs Table
CREATE TABLE IF NOT EXISTS activity_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action VARCHAR(100) NOT NULL,
    table_name VARCHAR(50),
    record_id INT,
    details TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE SET NULL
);

-- Insert Default Admin User (password: admin123)
INSERT INTO users (username, email, password, full_name, role) VALUES 
('admin', 'admin@inventory.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'admin');

-- Insert Default Categories
INSERT INTO categories (category_name, description, icon) VALUES 
('Laptop', 'Portable computers and notebooks', '💻'),
('Printer', 'Printing devices and scanners', '🖨️'),
('Desktop', 'Desktop computers and workstations', '🖥️'),
('Monitor', 'Display screens and monitors', '📺'),
('Network Equipment', 'Routers, switches, and network devices', '🌐'),
('Mobile Device', 'Smartphones and tablets', '📱'),
('Peripheral', 'Keyboards, mice, and accessories', '⌨️'),
('Other', 'Miscellaneous equipment', '📦');

-- Insert Default Status
INSERT INTO asset_status (status_name, status_color) VALUES 
('Working', '#10b981'),
('Defective', '#ef4444'),
('Under Repair', '#f59e0b'),
('Retired', '#6b7280'),
('In Storage', '#3b82f6'),
('Assigned', '#8b5cf6');
