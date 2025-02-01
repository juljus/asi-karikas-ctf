<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Proxy</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: cadetblue;
        }

        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Youtube thumbnail proksi teenus</h2>
        <form action="" method="post">
            <label for="url">Youtube video URL:</label>
            <input type="text" id="url" name="url" required>

            <input type="submit" value="Otsi">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['url'])) {
                $url = $_POST['url'];
                if (str_contains($url, "youtube.com")) {
                    $url = str_replace("https://www.youtube.com/watch?v=", "https://img.youtube.com/vi/", $url);
                    $url .= "/sddefault.jpg";
                    if (str_starts_with($url, "http://127.0.0.1/ctf.png") or str_starts_with($url, "http://localhost/ctf.png")) {
                        echo "<img src='/ctf.png' alt='thumbnail'>";
                    } else {
                        echo "<img src='$url' alt='thumbnail'>";
                    }
                } else {
                    echo "<p>URL peab olema youtube.com</p>";
                }
            }
        }
        ?>
    </div>
</body>

</html>