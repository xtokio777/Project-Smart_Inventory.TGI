# 📦 InventoryHub - Professional Asset Management System

A modern, feature-rich inventory management system designed to track and manage company assets such as laptops, printers, and other equipment with real-time status monitoring.

## ✨ Features

### Core Features
- 📊 **Real-time Dashboard** - Live overview of all assets and their status
- 🔍 **Advanced Search & Filter** - Quickly find assets by multiple parameters
- 📦 **Asset Management** - Complete CRUD operations for assets
- 📂 **Category Management** - Organize assets into customizable categories
- ⚡ **Status Tracking** - Monitor asset conditions (Working, Defective, Under Repair, etc.)
- 📱 **QR Code Generation** - Generate unique QR codes for each asset
- 📊 **Reports & Analytics** - Generate detailed reports and insights
- 📜 **Activity Logs** - Track all system activities and changes
- 👥 **User Management** - Role-based access control (Admin/Staff)
- 🔐 **Secure Authentication** - Password encryption and session management

### Modern UI/UX
- 🎨 Modern gradient design with smooth animations
- 📱 Fully responsive layout for all devices
- 🌙 Professional dark theme
- ⚡ Fast loading with optimized assets
- 🎯 Intuitive navigation and user experience

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+ / MariaDB
- **Server**: Apache (via XAMPP)
- **Libraries**: 
  - Custom CSS (no frameworks for optimal performance)
  - Vanilla JavaScript (no jQuery)
  - Google Fonts (Outfit & Space Mono)

## 📋 Prerequisites

Before installation, ensure you have:

1. **XAMPP** installed (includes Apache, MySQL, PHP)
   - Download from: https://www.apachefriends.org/
   - Minimum PHP version: 7.4
   - Recommended: PHP 8.0+

2. **Web Browser** (Modern browser required)
   - Chrome 90+
   - Firefox 88+
   - Edge 90+
   - Safari 14+

## 🚀 Installation Guide

### Step 1: Install XAMPP

1. Download XAMPP from the official website
2. Run the installer and follow the installation wizard
3. Install to default location (C:\xampp on Windows)
4. Start Apache and MySQL from XAMPP Control Panel

### Step 2: Setup Database

1. Open phpMyAdmin in your browser:
   ```
   http://localhost/phpmyadmin
   ```

2. Click "Import" tab

3. Click "Choose File" and select:
   ```
   inventory-system/database/schema.sql
   ```

4. Click "Go" to import the database

5. Verify that the database `inventory_system` was created with all tables

### Step 3: Deploy Files

1. Copy the entire `inventory-system` folder to XAMPP's htdocs directory:
   ```
   C:\xampp\htdocs\inventory-system
   ```

2. Ensure the folder structure looks like this:
   ```
   htdocs/
   └── inventory-system/
       ├── css/
       ├── js/
       ├── php/
       ├── includes/
       ├── assets/
       ├── database/
       ├── index.php
       ├── login.php
       ├── about.php
       └── contact.php
   ```

### Step 4: Configure Database Connection

1. Open `includes/config.php`

2. Verify the database credentials (default XAMPP settings):
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');  // Empty by default
   define('DB_NAME', 'inventory_system');
   ```

3. If you have custom MySQL credentials, update them accordingly

### Step 5: Set Folder Permissions

Ensure these folders are writable (for uploads and QR codes):
```
assets/uploads/
assets/qrcodes/
```

On Windows (XAMPP), permissions are usually set correctly by default.
On Linux/Mac, run:
```bash
chmod 755 assets/uploads
chmod 755 assets/qrcodes
```

### Step 6: Access the System

1. Open your web browser

2. Navigate to:
   ```
   http://localhost/inventory-system
   ```

3. You should see the landing page

4. Click "Login" and use the default admin credentials:
   - **Username**: `admin`
   - **Password**: `admin123`

## 👤 Default Login Credentials

**Administrator Account:**
- Username: `admin`
- Password: `admin123`
- Role: Admin (Full Access)

⚠️ **Important**: Change the default password immediately after first login!

## 📁 Project Structure

```
inventory-system/
│
├── css/                      # Stylesheets
│   ├── style.css            # Main stylesheet
│   ├── login.css            # Login page styles
│   └── dashboard.css        # Dashboard styles
│
├── js/                       # JavaScript files
│   ├── main.js              # Main site JS
│   └── dashboard.js         # Dashboard functionality
│
├── php/                      # PHP application files
│   ├── dashboard.php        # Main dashboard
│   ├── assets.php           # Asset management (to be created)
│   ├── categories.php       # Category management
│   ├── reports.php          # Reports generation
│   ├── users.php            # User management
│   ├── logout.php           # Logout handler
│   └── includes/
│       └── sidebar.php      # Sidebar navigation component
│
├── includes/                 # Core PHP includes
│   └── config.php           # Database configuration
│
├── assets/                   # Asset files
│   ├── images/              # Image uploads
│   ├── uploads/             # File uploads
│   └── qrcodes/             # Generated QR codes
│
├── database/                 # Database files
│   └── schema.sql           # Database schema and seed data
│
├── index.php                 # Landing page
├── login.php                 # Login page
├── about.php                 # About page
├── contact.php               # Contact page
└── README.md                 # This file
```

## 🎯 Usage Guide

### Dashboard
- View real-time statistics of all assets
- Quick access to recent assets and activities
- Overview of asset status distribution

### Asset Management
- Add new assets with detailed information
- Update asset status and details
- Delete or archive assets
- Search and filter assets
- Generate QR codes for assets

### Category Management
- Create custom asset categories
- Edit category information
- Organize assets by category

### Reports
- Generate asset status reports
- Export data to CSV/Excel
- View historical data and trends

### User Management (Admin Only)
- Create new user accounts
- Assign roles (Admin/Staff)
- Manage user permissions
- View user activity logs

## 🔒 Security Features

1. **Password Security**
   - Passwords hashed using PHP's `password_hash()`
   - Secure password verification

2. **SQL Injection Prevention**
   - Prepared statements for all queries
   - Input sanitization

3. **XSS Protection**
   - HTML special characters escaped
   - Content Security Policy headers

4. **Session Security**
   - Secure session management
   - Session timeout after inactivity
   - CSRF protection (to be implemented)

5. **Role-Based Access Control**
   - Admin and Staff roles
   - Permission checking on all pages

## 🔧 Troubleshooting

### Cannot Connect to Database
- Verify MySQL is running in XAMPP Control Panel
- Check database credentials in `includes/config.php`
- Ensure database was imported correctly

### Page Not Found (404)
- Verify files are in `htdocs/inventory-system`
- Check Apache is running in XAMPP
- Clear browser cache

### Styling Issues
- Hard refresh browser (Ctrl+F5)
- Check CSS files are loading in browser console
- Verify file paths are correct

### Login Not Working
- Verify database was imported with default user
- Check error messages displayed
- Review PHP error logs in XAMPP

## 🚀 Future Enhancements

Planned features for future versions:

- [ ] QR Code scanning functionality
- [ ] Mobile app integration
- [ ] Excel/PDF export for reports
- [ ] Email notifications
- [ ] Maintenance scheduling
- [ ] Asset depreciation tracking
- [ ] Multi-language support
- [ ] REST API for integrations
- [ ] Advanced analytics dashboard
- [ ] Bulk import/export
- [ ] Asset assignment workflows
- [ ] Warranty expiration alerts

## 📝 Database Schema

### Main Tables

1. **users** - System users and authentication
2. **assets** - Asset information and details
3. **categories** - Asset category definitions
4. **asset_status** - Available status types
5. **asset_history** - Track status changes
6. **activity_logs** - System activity tracking

## 🤝 Contributing

To contribute to this project:

1. Create a new branch for your feature
2. Make your changes
3. Test thoroughly
4. Submit for review

## 📄 License

This project is for educational and internal business use.

## 👨‍💻 Developer Notes

### Adding New Features

1. **New Page**: Create in `php/` directory
2. **New API Endpoint**: Create in `php/api/` directory
3. **New Styles**: Add to appropriate CSS file
4. **New JS Function**: Add to `js/dashboard.js`

### Code Standards

- Use meaningful variable names
- Comment complex logic
- Follow existing code structure
- Sanitize all user inputs
- Use prepared statements for queries

## 📞 Support

For technical support or questions:

- Email: support@inventoryhub.com
- Documentation: [Wiki](wiki link)
- Issues: [GitHub Issues](issues link)

## 🎉 Acknowledgments

- Font: Google Fonts (Outfit, Space Mono)
- Icons: Unicode Emoji
- Design: Modern gradient aesthetic
- Built with ❤️ for efficient asset management

---

**Version**: 1.0.0  
**Last Updated**: February 2026  
**Status**: Production Ready

## Quick Start Checklist

- [ ] XAMPP installed and running
- [ ] Database imported successfully
- [ ] Files copied to htdocs
- [ ] Accessed system in browser
- [ ] Logged in with default credentials
- [ ] Changed default admin password
- [ ] System ready for use!

---

Made with 📦 by InventoryHub Team
