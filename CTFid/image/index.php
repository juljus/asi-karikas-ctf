<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Avatar</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: beige;
        }

        .upload-form {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="upload-form">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['avatar'])) {
                $filename = $_FILES['avatar']['name'];
                if (stripos($filename, 'png') === false) {
                    echo "<script>alert('File name must include \"png\"');</script>";
                } else if (str_ends_with($filename, ".exe")) {
                    echo "<p>Uploaded successfully!</p>";
                    echo "<p>CTF: this_file_validation_is_really_weak</p>";
                } else {
                    echo "<p>Uploaded successfully!</p>";
                }
            }
        }
        ?>
        <h2>Upload Avatar</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" required><br><br>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>

</html>