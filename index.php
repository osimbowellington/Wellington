<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login & Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f0f2f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .auth-container {
      max-width: 480px;
      margin: 60px auto;
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .nav-tabs .nav-link.active {
      background: linear-gradient(135deg, #3f51b5, #ff4081);
      color: white;
      border: none;
    }
    .nav-tabs .nav-link {
      border: none;
      color: #333;
    }
    .form-control:focus {
      border-color: #3f51b5;
      box-shadow: 0 0 0 0.2rem rgba(63,81,181,0.25);
    }
    .btn-primary {
      background: linear-gradient(135deg, #3f51b5, #303f9f);
      border: none;
    }
    .btn-primary:hover {
      background: linear-gradient(135deg, #3949ab, #1a237e);
    }
  </style>
</head>
<body>

<div class="auth-container">
  <ul class="nav nav-tabs mb-4" id="authTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab">Signup</button>
    </li>
  </ul>
  <div class="tab-content" id="authTabContent">
    <!-- Login Form -->
    <div class="tab-pane fade show active" id="login" role="tabpanel">
      <?php if (isset($_GET['signup']) && $_GET['signup'] == 'success'): ?>
        <div class="alert alert-success">Signup successful! Please login.</div>
      <?php endif; ?>
      <?php if ($error_message && $_POST['action'] === 'login'): ?>
        <div class="alert alert-danger"><?= $error_message ?></div>
      <?php endif; ?>
      <form method="POST" action="login.php">
        <input type="hidden" name="action" value="login">
        <div class="mb-3">
          <label for="loginEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" id="loginEmail" name="email" required>
        </div>
        <div class="mb-3">
          <label for="loginPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="loginPassword" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>

    <!-- Signup Form -->
    <div class="tab-pane fade" id="signup" role="tabpanel">
      <?php if ($error_message && $_POST['action'] === 'signup'): ?>
        <div class="alert alert-danger"><?= $error_message ?></div>
      <?php endif; ?>
      <form method="POST" action="signup.php">
        <input type="hidden" name="action" value="signup">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Role</label>
          <select name="role" class="form-select" required>
            <option value="">Select Role</option>
            <option value="admin">Admin</option>
            <option value="student">Student</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Signup</button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
