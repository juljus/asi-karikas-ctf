<!DOCTYPE html>
<html lang="en">

<head>
    <title>CTF - Login</title>

    <style>
        body {
            background-image: url('./bg.jpg');
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .centered {
            display: grid;
            justify-content: center;
            align-content: center;
            margin-top: 10%;
        }

        .login {
            display: grid;
            justify-content: center;
        }

        form input {
            width: 100%;
            background-color: #2a2e33;
            height: 40px;
            width: 320px;
            border-color: #49525d;
            color: #949699;
            border-style: double;
        }

        form input:focus {
            border-color: #009cff;
            color: #fff;
        }

        form select {
            width: 100%;
            background-color: #2a2e33;
            height: 40px;
            border-color: #49525d;
            color: #949699;
            border-style: double;
        }

        form select:focus {
            border-color: #009cff;
            color: #fff;
        }

        form input[type="submit"] {
            width: 100%;
            background-color: #008ce6;
            color: white;
            padding: 3px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>

<body class="centered">
    <div class="login">
        <?php
        $loggedIn = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin_username = '888888';
            $admin_password = '888888';

            $restrict_username = '666666';
            $rectrict_password = '666666';

            $adminboycot = 'admin';
            $adminboycot_pass = 'admin';

            if ($username === $admin_username && $password === $admin_password) {
                echo '<p>Login successful. Welcome, Administrator!</p>';
                echo '<p>CTF: always_chang3_y0ur_default_passw0rds</p>';
                $loggedIn = true;
            } elseif ($username === $restrict_username && $password === $rectrict_password) {
                echo '<p>Login successful. Welcome, restricted user!</p>';
                $loggedIn = true;
            } elseif ($username === $adminboycot && $password === $adminboycot_pass) {
                echo '<p>This account is blocked.</p>';
            } else {
                echo '<p>Invalid username or password.</p>';
            }
        }
        ?>
        <?php if (!$loggedIn): ?>
            <img src="./web_logo.png" alt="Not official logo" width="330" height="60" style="margin-bottom: 3em"><br><br>
            <p style="color: red; text-align: center;">Not official login for Dahua!</p>
            <form method="post" action="">
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
    </div>
</body>

</html>