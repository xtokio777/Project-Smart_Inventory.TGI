<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Inventory Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <span class="logo-icon">📦</span>
                <span>Smart</span>
            </a>
            <ul class="navbar-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php" class="active">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php" class="btn btn-primary">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="hero" style="padding: 2rem 0;">
        <div class="container">
            <div class="hero-content">
                <h1 style="font-size: 3rem;">About InventoryHub</h1>
                <p style="font-size: 1.2rem;">Transforming asset management for modern enterprises</p>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section style="padding: 3rem 0;">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto;">
                <!-- Mission Section -->
                <div class="card" style="margin-bottom: 2rem;">
                    <div class="card-icon">🎯</div>
                    <h3>Our Mission</h3>
                    <p>InventoryHub is designed to revolutionize how organizations manage their physical assets. We provide a comprehensive, user-friendly platform that enables IT departments, asset managers, and administrators to efficiently track, monitor, and maintain company equipment from laptops and printers to network devices and peripherals.</p>
                </div>

                <!-- What We Do -->
                <div class="card" style="margin-bottom: 2rem;">
                    <div class="card-icon">💼</div>
                    <h3>What We Do</h3>
                    <p>Our system offers complete visibility into your asset lifecycle. From acquisition to retirement, track every piece of equipment with detailed information including purchase history, warranty status, maintenance records, and current condition. Real-time status updates keep you informed about working assets, items under repair, and defective equipment requiring attention.</p>
                </div>

                <!-- Key Benefits -->
                <div class="card" style="margin-bottom: 2rem;">
                    <div class="card-icon">✨</div>
                    <h3>Key Benefits</h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
                        <div>
                            <h4 style="color: var(--accent); margin-bottom: 0.5rem;">Efficiency</h4>
                            <p style="font-size: 0.95rem;">Reduce time spent searching for assets and managing paperwork with digital tracking.</p>
                        </div>
                        <div>
                            <h4 style="color: var(--accent); margin-bottom: 0.5rem;">Accuracy</h4>
                            <p style="font-size: 0.95rem;">Eliminate manual errors with automated data capture and QR code scanning.</p>
                        </div>
                        <div>
                            <h4 style="color: var(--accent); margin-bottom: 0.5rem;">Visibility</h4>
                            <p style="font-size: 0.95rem;">Gain complete oversight of all company assets from a single dashboard.</p>
                        </div>
                        <div>
                            <h4 style="color: var(--accent); margin-bottom: 0.5rem;">Cost Savings</h4>
                            <p style="font-size: 0.95rem;">Optimize asset utilization and reduce unnecessary purchases through better tracking.</p>
                        </div>
                    </div>
                </div>

                <!-- Target Users -->
                <div class="card" style="margin-bottom: 2rem;">
                    <div class="card-icon">👥</div>
                    <h3>Who Uses InventoryHub</h3>
                    <div style="margin-top: 1.5rem;">
                        <div style="margin-bottom: 1rem; padding: 1rem; background: rgba(59, 130, 246, 0.1); border-radius: 0.5rem; border-left: 4px solid var(--accent);">
                            <h4 style="color: white; margin-bottom: 0.5rem;">IT Departments</h4>
                            <p style="font-size: 0.95rem; margin: 0;">Track computers, servers, and technology equipment across multiple locations.</p>
                        </div>
                        <div style="margin-bottom: 1rem; padding: 1rem; background: rgba(16, 185, 129, 0.1); border-radius: 0.5rem; border-left: 4px solid var(--success);">
                            <h4 style="color: white; margin-bottom: 0.5rem;">Asset Managers</h4>
                            <p style="font-size: 0.95rem; margin: 0;">Maintain comprehensive records and generate detailed reports for auditing.</p>
                        </div>
                        <div style="padding: 1rem; background: rgba(245, 158, 11, 0.1); border-radius: 0.5rem; border-left: 4px solid var(--warning);">
                            <h4 style="color: white; margin-bottom: 0.5rem;">Administrators</h4>
                            <p style="font-size: 0.95rem; margin: 0;">Control access, manage users, and oversee system-wide asset operations.</p>
                        </div>
                    </div>
                </div>

                <!-- Technology Stack -->
                <div class="card">
                    <div class="card-icon">⚙️</div>
                    <h3>Built With Modern Technology</h3>
                    <p>InventoryHub is built on a robust technology stack ensuring reliability, security, and performance:</p>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; margin-top: 1.5rem;">
                        <span class="badge badge-info">PHP Backend</span>
                        <span class="badge badge-info">MySQL Database</span>
                        <span class="badge badge-info">JavaScript</span>
                        <span class="badge badge-info">AJAX</span>
                        <span class="badge badge-info">Responsive Design</span>
                        <span class="badge badge-info">QR Code Integration</span>
                        <span class="badge badge-info">Secure Authentication</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>&copy; 2026 InventoryHub. All rights reserved.</p>
                <p style="font-size: 0.9rem;">Professional Asset Management Solution</p>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
