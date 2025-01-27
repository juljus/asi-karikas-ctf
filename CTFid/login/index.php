<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
    body {
        background-image: url('/bg.jpg');
    }
    centered {
        display: grid;
        justify-content: center;
        align-content: center;
    }
    </style>
</head>
<body>
    <div class="centered">
    <?php
    $loggedIn = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $admin_username = 'admin';
        $admin_password = 'admin123';

        if ($username === $admin_username && $password === $admin_password) {
            echo '<p>Login successful. Welcome, admin!</p>';
            $loggedIn = true;
        } else {
            echo '<p>Invalid username or password.</p>';
        }
    }
    ?>
    <?php if (!$loggedIn): ?>
    <h2>Login Form</h2>
    <img src="/web_logo.png" alt="Logo" width="330" height="60"><br><br>
    <form method="post" action="" class="login">
        <input type="text" id="username" name="username" placeholder="Username" required><br><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br><br>
        <select id="protocol" name="protocol">
            <option value="tcp">TCP</option>
            <option value="udp">UDP</option>
            <option value="multicast">Multicast</option>
        </select><br><br>
        <input type="submit" value="Login">
    </form>
    <?php endif; ?>

    <?php if ($loggedIn): ?>
        <p>Flag: CTF{always_change_your_default_passwords}</p>
    <?php endif; ?>
    </div>
</body>
</html>