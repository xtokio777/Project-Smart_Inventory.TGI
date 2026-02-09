# 📦 InventoryHub - Complete Installation Guide

## Table of Contents
1. [System Requirements](#system-requirements)
2. [XAMPP Installation](#xampp-installation)
3. [Database Setup](#database-setup)
4. [Project Deployment](#project-deployment)
5. [Configuration](#configuration)
6. [First Login](#first-login)
7. [Verification](#verification)
8. [Troubleshooting](#troubleshooting)

---

## System Requirements

### Minimum Requirements
- **Operating System**: Windows 7/8/10/11, macOS 10.12+, or Linux (Ubuntu 18.04+)
- **RAM**: 2 GB minimum (4 GB recommended)
- **Disk Space**: 500 MB free space
- **Processor**: 1 GHz or faster
- **Browser**: Chrome 90+, Firefox 88+, Edge 90+, Safari 14+

### Software Requirements
- XAMPP 7.4+ (includes Apache, MySQL, PHP)
- Modern web browser
- Text editor (optional, for configuration)

---

## XAMPP Installation

### Windows Installation

1. **Download XAMPP**
   - Visit: https://www.apachefriends.org/
   - Download: XAMPP for Windows (PHP 7.4+ or 8.0+)
   - File size: ~150 MB

2. **Run Installer**
   ```
   - Double-click the downloaded .exe file
   - Click "Yes" if User Account Control prompts
   - Select components (keep default):
     ✓ Apache
     ✓ MySQL
     ✓ PHP
     ✓ phpMyAdmin
   ```

3. **Installation Path**
   ```
   Default: C:\xampp
   (Recommended to keep default)
   ```

4. **Complete Installation**
   - Click "Next" through all prompts
   - Uncheck "Learn more about Bitnami" (optional)
   - Click "Finish"

5. **Start XAMPP Control Panel**
   - Launch XAMPP Control Panel
   - Click "Start" for Apache
   - Click "Start" for MySQL
   - Both should show "Running" in green

### macOS Installation

1. **Download XAMPP**
   - Visit: https://www.apachefriends.org/
   - Download: XAMPP for OS X

2. **Install**
   ```bash
   - Open the .dmg file
   - Drag XAMPP to Applications
   - Open XAMPP from Applications
   - Click "Start" for Apache and MySQL
   ```

### Linux Installation

1. **Download**
   ```bash
   wget https://www.apachefriends.org/xampp-files/[version]/xampp-linux-x64-[version]-installer.run
   ```

2. **Make Executable**
   ```bash
   chmod +x xampp-linux-x64-[version]-installer.run
   ```

3. **Run Installer**
   ```bash
   sudo ./xampp-linux-x64-[version]-installer.run
   ```

4. **Start Services**
   ```bash
   sudo /opt/lampp/lampp start
   ```

---

## Database Setup

### Step 1: Access phpMyAdmin

1. **Open Browser**
   ```
   Navigate to: http://localhost/phpmyadmin
   ```

2. **Default Credentials**
   ```
   Username: root
   Password: (leave empty)
   ```

### Step 2: Create Database (Automatic Method)

1. **Import SQL File**
   - Click "Import" tab in phpMyAdmin
   - Click "Choose File"
   - Navigate to: `inventory-system/database/schema.sql`
   - Click "Go"
   - Wait for "Import has been successfully finished"

### Step 3: Verify Database Creation

1. **Check Database**
   - Click "Databases" in top menu
   - Verify `inventory_system` appears in list
   - Click on `inventory_system`

2. **Verify Tables**
   Should see these tables:
   ```
   ✓ users
   ✓ assets
   ✓ categories
   ✓ asset_status
   ✓ asset_history
   ✓ activity_logs
   ```

3. **Verify Default Data**
   - Click on `users` table
   - Click "Browse"
   - Should see default admin user

### Step 4: Manual Database Creation (if needed)

If automatic import fails:

1. **Create Database**
   ```sql
   CREATE DATABASE inventory_system;
   ```

2. **Run SQL File**
   - Copy contents of `schema.sql`
   - Paste into SQL tab
   - Click "Go"

---

## Project Deployment

### Step 1: Locate htdocs Folder

**Windows:**
```
C:\xampp\htdocs\
```

**macOS:**
```
/Applications/XAMPP/htdocs/
```

**Linux:**
```
/opt/lampp/htdocs/
```

### Step 2: Copy Project Files

1. **Copy the entire `inventory-system` folder** to htdocs

2. **Final structure should be:**
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
       ├── contact.php
       └── README.md
   ```

### Step 3: Set Permissions (Linux/Mac only)

```bash
cd /opt/lampp/htdocs/inventory-system
chmod -R 755 .
chmod -R 777 assets/uploads
chmod -R 777 assets/qrcodes
```

---

## Configuration

### Step 1: Database Configuration

1. **Open config file**
   ```
   File: includes/config.php
   ```

2. **Verify settings** (default XAMPP):
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'inventory_system');
   ```

3. **If you changed MySQL password**, update `DB_PASS`:
   ```php
   define('DB_PASS', 'your_password_here');
   ```

### Step 2: PHP Configuration (Optional)

For file uploads and larger operations:

1. **Open php.ini**
   ```
   XAMPP Control Panel > Config > PHP (php.ini)
   ```

2. **Update these values** (if needed):
   ```ini
   upload_max_filesize = 10M
   post_max_size = 10M
   max_execution_time = 300
   memory_limit = 256M
   ```

3. **Restart Apache** after changes

---

## First Login

### Step 1: Access the System

1. **Open browser and navigate to:**
   ```
   http://localhost/inventory-system
   ```

2. **You should see:**
   - Modern landing page with gradient background
   - Navigation menu
   - "Get Started" button

### Step 2: Login

1. **Click "Login" or "Get Started"**

2. **Enter default credentials:**
   ```
   Username: admin
   Password: admin123
   ```

3. **Click "Sign In"**

### Step 3: Explore Dashboard

After successful login, you should see:
- Dashboard with statistics (all zeros initially)
- Sidebar navigation menu
- User profile in sidebar
- Modern dark theme interface

### Step 4: Change Default Password (IMPORTANT!)

1. Click on "Profile" in sidebar
2. Update your password
3. Use a strong password
4. Save changes

---

## Verification

### Check List

Complete this checklist to verify successful installation:

- [ ] XAMPP Control Panel shows Apache as "Running"
- [ ] XAMPP Control Panel shows MySQL as "Running"
- [ ] phpMyAdmin accessible at http://localhost/phpmyadmin
- [ ] Database `inventory_system` exists
- [ ] All 6 tables present in database
- [ ] Landing page loads at http://localhost/inventory-system
- [ ] Login page loads correctly
- [ ] Can login with default credentials
- [ ] Dashboard displays after login
- [ ] No PHP errors visible
- [ ] Sidebar navigation works
- [ ] User profile shows in sidebar

### Test Basic Functions

1. **Dashboard Access**
   - Navigate to all sidebar menu items
   - Verify each page loads

2. **Add Test Asset** (once assets.php is created)
   - Go to Assets page
   - Click "Add Asset"
   - Fill in basic information
   - Save successfully

3. **Logout and Login**
   - Logout from system
   - Login again
   - Verify session works

---

## Troubleshooting

### Issue: Cannot access localhost

**Solution:**
```
1. Check Apache is running in XAMPP
2. Try http://127.0.0.1/inventory-system instead
3. Check firewall isn't blocking port 80
4. Restart XAMPP services
```

### Issue: Database connection error

**Solution:**
```
1. Verify MySQL is running in XAMPP
2. Check credentials in includes/config.php
3. Test phpMyAdmin access
4. Verify database name is correct
5. Check for typos in config.php
```

### Issue: White screen or blank page

**Solution:**
```
1. Check PHP error logs:
   XAMPP > Logs > PHP Error Log
2. Enable error display:
   Add to top of index.php:
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
3. Check file permissions
4. Verify all files were copied correctly
```

### Issue: 404 Not Found

**Solution:**
```
1. Verify files in htdocs/inventory-system
2. Check Apache is running
3. Verify .htaccess if present
4. Try full path: http://localhost/inventory-system/index.php
```

### Issue: Login doesn't work

**Solution:**
```
1. Verify database was imported correctly
2. Check users table has admin account
3. Password must be: admin123
4. Clear browser cache
5. Try different browser
6. Check browser console for errors
```

### Issue: Styles not loading

**Solution:**
```
1. Hard refresh: Ctrl+F5 (Cmd+Shift+R on Mac)
2. Check CSS files exist in css/ folder
3. Verify file paths in HTML
4. Check browser console for 404 errors
5. Clear browser cache
```

### Issue: XAMPP ports already in use

**Solution:**
```
1. Click "Config" in XAMPP Control Panel
2. Change Apache port from 80 to 8080
3. Change MySQL port if needed
4. Access as: http://localhost:8080/inventory-system
```

### Issue: Permission denied errors (Linux/Mac)

**Solution:**
```bash
sudo chmod -R 755 /opt/lampp/htdocs/inventory-system
sudo chmod -R 777 /opt/lampp/htdocs/inventory-system/assets
```

---

## Common Commands

### Start XAMPP (Linux)
```bash
sudo /opt/lampp/lampp start
```

### Stop XAMPP (Linux)
```bash
sudo /opt/lampp/lampp stop
```

### Restart Apache (All platforms)
```
XAMPP Control Panel > Apache > Stop > Start
```

### View Error Logs
```
XAMPP Control Panel > Apache > Logs > Error Log
```

---

## Next Steps

After successful installation:

1. ✅ **Change default admin password**
2. ✅ **Create additional user accounts**
3. ✅ **Add asset categories**
4. ✅ **Start adding assets**
5. ✅ **Customize system settings**
6. ✅ **Train staff on system usage**

---

## Need Help?

If you encounter issues not covered here:

1. **Check error logs** - XAMPP provides detailed logs
2. **Browser console** - F12 to see JavaScript errors
3. **Database logs** - Check MySQL error logs
4. **PHP errors** - Enable display_errors temporarily

---

## System URLs Reference

```
Landing Page:     http://localhost/inventory-system
Login Page:       http://localhost/inventory-system/login.php
Dashboard:        http://localhost/inventory-system/php/dashboard.php
phpMyAdmin:       http://localhost/phpmyadmin
XAMPP Dashboard:  http://localhost
```

---

**Installation Complete! 🎉**

Your InventoryHub system is now ready to use.

For usage instructions, see the main README.md file.
