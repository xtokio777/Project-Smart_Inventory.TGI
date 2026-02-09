<?php
require_once '../includes/config.php';

// Check if user is logged in
if (!is_logged_in()) {
    header("Location: ../login.php");
    exit();
}

// Get statistics
$stats = [
    'total_assets' => 0,
    'working' => 0,
    'defective' => 0,
    'under_repair' => 0
];

// Total assets
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM assets");
$stats['total_assets'] = mysqli_fetch_assoc($result)['count'];

// Working assets
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM assets a 
                                JOIN asset_status s ON a.status_id = s.status_id 
                                WHERE s.status_name = 'Working'");
$stats['working'] = mysqli_fetch_assoc($result)['count'];

// Defective assets
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM assets a 
                                JOIN asset_status s ON a.status_id = s.status_id 
                                WHERE s.status_name = 'Defective'");
$stats['defective'] = mysqli_fetch_assoc($result)['count'];

// Under repair
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM assets a 
                                JOIN asset_status s ON a.status_id = s.status_id 
                                WHERE s.status_name = 'Under Repair'");
$stats['under_repair'] = mysqli_fetch_assoc($result)['count'];

// Recent assets
$recent_assets_query = "SELECT a.*, c.category_name, s.status_name, s.status_color 
                        FROM assets a
                        JOIN categories c ON a.category_id = c.category_id
                        JOIN asset_status s ON a.status_id = s.status_id
                        ORDER BY a.created_at DESC
                        LIMIT 5";
$recent_assets = mysqli_query($conn, $recent_assets_query);

// Recent activities
$activities_query = "SELECT al.*, u.full_name 
                     FROM activity_logs al
                     LEFT JOIN users u ON al.user_id = u.user_id
                     ORDER BY al.created_at DESC
                     LIMIT 10";
$activities = mysqli_query($conn, $activities_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - InventoryHub</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="page-title">
                    <h1>Dashboard</h1>
                    <p>Welcome back, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</p>
                </div>
                <div class="top-bar-actions">
                    <span style="color: var(--gray-400); font-size: 0.9rem;">
                        <?php echo date('l, F j, Y'); ?>
                    </span>
                </div>
            </div>

            <!-- Dashboard Stats -->
            <div class="dashboard-stats">
                <div class="stat-box">
                    <div class="stat-box-header">
                        <div>
                            <div class="stat-box-title">Total Assets</div>
                        </div>
                        <div class="stat-box-icon">📦</div>
                    </div>
                    <div class="stat-box-value"><?php echo $stats['total_assets']; ?></div>
                    <div class="stat-box-trend trend-up">
                        <span>↑</span>
                        <span>All equipment tracked</span>
                    </div>
                </div>

                <div class="stat-box">
                    <div class="stat-box-header">
                        <div>
                            <div class="stat-box-title">Working</div>
                        </div>
                        <div class="stat-box-icon">✅</div>
                    </div>
                    <div class="stat-box-value"><?php echo $stats['working']; ?></div>
                    <div class="stat-box-trend trend-up">
                        <span>↑</span>
                        <span><?php echo $stats['total_assets'] > 0 ? round(($stats['working']/$stats['total_assets'])*100, 1) : 0; ?>% operational</span>
                    </div>
                </div>

                <div class="stat-box">
                    <div class="stat-box-header">
                        <div>
                            <div class="stat-box-title">Defective</div>
                        </div>
                        <div class="stat-box-icon">⚠️</div>
                    </div>
                    <div class="stat-box-value"><?php echo $stats['defective']; ?></div>
                    <div class="stat-box-trend trend-down">
                        <span>↓</span>
                        <span>Requires attention</span>
                    </div>
                </div>

                <div class="stat-box">
                    <div class="stat-box-header">
                        <div>
                            <div class="stat-box-title">Under Repair</div>
                        </div>
                        <div class="stat-box-icon">🔧</div>
                    </div>
                    <div class="stat-box-value"><?php echo $stats['under_repair']; ?></div>
                    <div class="stat-box-trend">
                        <span>→</span>
                        <span>In maintenance</span>
                    </div>
                </div>
            </div>

            <!-- Recent Assets -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Recent Assets</h2>
                    <a href="assets.php" class="btn btn-secondary">View All</a>
                </div>

                <?php if (mysqli_num_rows($recent_assets) > 0): ?>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Asset Tag</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($asset = mysqli_fetch_assoc($recent_assets)): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($asset['asset_tag']); ?></strong></td>
                                <td><?php echo htmlspecialchars($asset['asset_name']); ?></td>
                                <td><?php echo htmlspecialchars($asset['category_name']); ?></td>
                                <td>
                                    <span class="badge" style="background: <?php echo $asset['status_color']; ?>20; color: <?php echo $asset['status_color']; ?>; border: 1px solid <?php echo $asset['status_color']; ?>;">
                                        <?php echo htmlspecialchars($asset['status_name']); ?>
                                    </span>
                                </td>
                                <td><?php echo date('M j, Y', strtotime($asset['created_at'])); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="empty-state">
                    <div class="empty-state-icon">📦</div>
                    <h3>No Assets Yet</h3>
                    <p>Start by adding your first asset to the system</p>
                    <a href="assets.php" class="btn btn-primary" style="margin-top: 1rem;">Add Asset</a>
                </div>
                <?php endif; ?>
            </div>

            <!-- Recent Activity -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Recent Activity</h2>
                </div>

                <?php if (mysqli_num_rows($activities) > 0): ?>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <?php while ($activity = mysqli_fetch_assoc($activities)): ?>
                    <div style="padding: 1rem; background: rgba(59, 130, 246, 0.05); border-radius: 0.5rem; border-left: 3px solid var(--accent);">
                        <div style="display: flex; justify-content: space-between; align-items: start;">
                            <div>
                                <strong style="color: white;"><?php echo htmlspecialchars($activity['full_name'] ?? 'System'); ?></strong>
                                <span style="color: var(--gray-400);"> - <?php echo htmlspecialchars($activity['action']); ?></span>
                                <?php if ($activity['details']): ?>
                                <p style="margin: 0.5rem 0 0 0; font-size: 0.9rem; color: var(--gray-400);">
                                    <?php echo htmlspecialchars($activity['details']); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                            <span style="font-size: 0.85rem; color: var(--gray-500); white-space: nowrap;">
                                <?php echo date('M j, g:i A', strtotime($activity['created_at'])); ?>
                            </span>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                <div class="empty-state">
                    <div class="empty-state-icon">📋</div>
                    <h3>No Activity Yet</h3>
                    <p>System activity will appear here</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="../js/dashboard.js"></script>
</body>
</html>
