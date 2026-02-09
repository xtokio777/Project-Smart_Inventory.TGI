<?php
require_once 'includes/config.php';

// Redirect if already logged in
if (is_logged_in()) {
    header("Location: php/dashboard.php");
    exit();
}

$error = '';
$success = '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize_input($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password";
    } else {
        // Query user
        $query = "SELECT * FROM users WHERE username = ? AND status = 'active'";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($user = mysqli_fetch_assoc($result)) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['email'] = $user['email'];
                
                // Log activity
                $log_query = "INSERT INTO activity_logs (user_id, action, details, ip_address) VALUES (?, 'Login', 'User logged in successfully', ?)";
                $log_stmt = mysqli_prepare($conn, $log_query);
                $ip = $_SERVER['REMOTE_ADDR'];
                mysqli_stmt_bind_param($log_stmt, "is", $user['user_id'], $ip);
                mysqli_stmt_execute($log_stmt);
                
                header("Location: php/dashboard.php");
                exit();
            } else {
                $error = "Invalid username or password";
            }
        } else {
            $error = "Invalid username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <div class="login-logo">📦</div>
                <h2>Welcome Back</h2>
                <p>Sign in to access InventoryHub</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <span>⚠️</span>
                    <span><?php echo $error; ?></span>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    <span>✓</span>
                    <span><?php echo $success; ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" class="login-form" id="loginForm">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="username" 
                        class="form-control" 
                        placeholder="Username"
                        required
                        autocomplete="username"
                    >
                    <span class="input-icon">👤</span>
                </div>

                <div class="input-group">
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="form-control" 
                        placeholder="Password"
                        required
                        autocomplete="current-password"
                    >
                    <span class="input-icon">🔒</span>
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <span id="toggleIcon">👁️</span>
                    </button>
                </div>

                <div class="remember-forgot">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-primary login-btn">
                    <span>Sign In</span>
                </button>
            </form>

            <div class="login-footer">
                <p>Default Admin: <strong>admin</strong> / <strong>admin123</strong></p>
                <p style="margin-top: 0.5rem;">
                    <a href="index.php" style="color: var(--accent);">← Back to Home</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.classList.add('btn-loading');
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.animation = 'slideUp 0.3s ease-out';
                setTimeout(() => alert.remove(), 300);
            });
        }, 5000);
    </script>
</body>
</html>
