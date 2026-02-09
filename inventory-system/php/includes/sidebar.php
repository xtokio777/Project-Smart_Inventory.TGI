<aside class="sidebar">
    <div class="sidebar-header">
        <a href="dashboard.php" class="sidebar-brand">
            <span class="sidebar-brand-icon">📦</span>
            <span>InventoryHub</span>
        </a>
    </div>

    <div class="sidebar-menu">
        <div class="menu-section">
            <div class="menu-section-title">Main</div>
            <a href="dashboard.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                <span class="menu-icon">🏠</span>
                <span>Dashboard</span>
            </a>
            <a href="assets.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'assets.php' ? 'active' : ''; ?>">
                <span class="menu-icon">📦</span>
                <span>Assets</span>
            </a>
            <a href="categories.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'categories.php' ? 'active' : ''; ?>">
                <span class="menu-icon">📂</span>
                <span>Categories</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Management</div>
            <a href="reports.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'reports.php' ? 'active' : ''; ?>">
                <span class="menu-icon">📊</span>
                <span>Reports</span>
            </a>
            <a href="history.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'history.php' ? 'active' : ''; ?>">
                <span class="menu-icon">📜</span>
                <span>History</span>
            </a>
            <a href="activity.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'activity.php' ? 'active' : ''; ?>">
                <span class="menu-icon">📋</span>
                <span>Activity Logs</span>
            </a>
        </div>

        <?php if ($_SESSION['role'] === 'admin'): ?>
        <div class="menu-section">
            <div class="menu-section-title">Admin</div>
            <a href="users.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : ''; ?>">
                <span class="menu-icon">👥</span>
                <span>Users</span>
            </a>
            <a href="settings.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>">
                <span class="menu-icon">⚙️</span>
                <span>Settings</span>
            </a>
        </div>
        <?php endif; ?>

        <div class="menu-section">
            <div class="menu-section-title">Account</div>
            <a href="profile.php" class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>">
                <span class="menu-icon">👤</span>
                <span>Profile</span>
            </a>
            <a href="logout.php" class="menu-item">
                <span class="menu-icon">🚪</span>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">
                <?php echo strtoupper(substr($_SESSION['full_name'], 0, 1)); ?>
            </div>
            <div class="user-details">
                <h4><?php echo htmlspecialchars($_SESSION['full_name']); ?></h4>
                <p><?php echo ucfirst($_SESSION['role']); ?></p>
            </div>
        </div>
    </div>
</aside>
