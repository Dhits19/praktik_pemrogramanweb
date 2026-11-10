<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login - Web Programming 1</title>
 <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<main class="auth-page">
 <section class="login-card">
 <h1>Login</h1>
 <p>Masuk untuk membuka project Web Programming 1.</p>
 <?php if (isset($_GET["error"])): ?>
 <p class="message error">Username atau password salah.</p>
 <?php endif; ?>
 <?php if (isset($_GET["logout"])): ?>
 <p class="message">Anda sudah logout.</p>
 <?php endif; ?>
<form action="../proses/proses_login.php" method="POST">
 <div class="form-group">
 <label for="username">Username</label>
 <input type="text" id="username" name="username" required autocomplete="username">
 </div>
 <div class="form-group">
 <label for="password">Password</label>
 <input type="password" id="password" name="password" required autocomplete="current-password">
 </div>
 <button type="submit">Login</button>
 </form>
 </section>
</main>
</body>
</html>
