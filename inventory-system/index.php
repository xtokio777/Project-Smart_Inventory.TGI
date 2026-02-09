<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <span class="logo-icon">📦</span>
                <span>Project Smart Inventory</span>
            </a>
            <ul class="navbar-menu">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php" class="btn btn-primary">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Manage Your Assets<br>With Intelligence</h1>
                <p>Track, monitor, and optimize your company's inventory with our powerful, intuitive platform designed for modern businesses.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem;">
                    <a href="login.php" class="btn btn-primary">Get Started →</a>
                    <a href="about.php" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Overview -->
    <section style="padding: 3rem 0;">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">💻</div>
                    <div class="stat-content">
                        <h3>500+</h3>
                        <p>Assets Tracked</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📊</div>
                    <div class="stat-content">
                        <h3>95%</h3>
                        <p>Efficiency Rate</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">⚡</div>
                    <div class="stat-content">
                        <h3>24/7</h3>
                        <p>Real-Time Monitoring</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🔒</div>
                    <div class="stat-content">
                        <h3>100%</h3>
                        <p>Secure & Reliable</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section style="padding: 3rem 0;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 3rem; font-weight: 800; color: white; margin-bottom: 1rem;">Powerful Features</h2>
                <p style="font-size: 1.25rem; color: var(--gray-400);">Everything you need to manage your inventory effectively</p>
            </div>
            
            <div class="card-grid">
                <div class="card">
                    <div class="card-icon">📱</div>
                    <h3>Real-Time Tracking</h3>
                    <p>Monitor all your assets in real-time with instant updates on status changes, locations, and assignments.</p>
                </div>
                
                <div class="card">
                    <div class="card-icon">🔍</div>
                    <h3>Advanced Search</h3>
                    <p>Quickly find any asset with powerful search and filter capabilities across multiple parameters.</p>
                </div>
                
                <div class="card">
                    <div class="card-icon">📊</div>
                    <h3>Detailed Reports</h3>
                    <p>Generate comprehensive reports on asset utilization, maintenance, and performance metrics.</p>
                </div>
                
                <div class="card">
                    <div class="card-icon">⚙️</div>
                    <h3>Status Management</h3>
                    <p>Track asset conditions with customizable status labels - working, defective, under repair, and more.</p>
                </div>
                
                <div class="card">
                    <div class="card-icon">📷</div>
                    <h3>QR Code Integration</h3>
                    <p>Generate and scan QR codes for quick asset identification and mobile-friendly tracking.</p>
                </div>
                
                <div class="card">
                    <div class="card-icon">🔐</div>
                    <h3>Secure Access</h3>
                    <p>Role-based permissions ensure data security with admin and staff access levels.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section style="padding: 4rem 0;">
        <div class="container">
            <div style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(16, 185, 129, 0.2) 100%); border-radius: 1.5rem; padding: 3rem; text-align: center; border: 1px solid rgba(59, 130, 246, 0.3);">
                <h2 style="font-size: 2.5rem; font-weight: 800; color: white; margin-bottom: 1rem;">Ready to Get Started?</h2>
                <p style="font-size: 1.25rem; color: var(--gray-400); margin-bottom: 2rem; max-width: 700px; margin-left: auto; margin-right: auto;">
                    Join hundreds of companies using InventoryHub to streamline their asset management and boost operational efficiency.
                </p>
                <a href="login.php" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2.5rem;">Start Managing Now →</a>
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
