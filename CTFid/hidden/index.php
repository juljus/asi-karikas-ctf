<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Item Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
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

        .form-container input[type="text"],
        .form-container input[type="number"] {
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
    <?php
    $purchased = false;
    $hind = 10;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pakkumine = $_POST['pakkumine'];
        $kogus = $_POST['kogus'];
        $hind = $_POST['hind'] == null ? 10 : $_POST['hind'];

        if ($pakkumine >= $hind - 3 && $kogus > 0) {
            $purchased = true;
            $paris = $hind * $kogus;
            echo "<h2>Ost edukas! Ostsite hinnaga: $paris</h2>";
        } else if ($hind == "0") {
            echo "<h2>Ost edukas! Ostsite hinnaga: $paris</h2>";
            echo "<h2>CTF: said_tasuta_s4rgi!</h2>";
        } else {
            echo "<h2>Paku rohkem!</h2>";
        }
    }
    ?>
    <?php if (!$purchased): ?>
        <div class="form-container">
            <h2>Osta kohe!</h2>
            <form action="submit_item.php" method="post">
                <h2>Valge t-särk</h2>

                <label for="hind">Hind:</label>
                <input type="number" id="hind" name="hind" value="<?php $hind ?>" readonly>

                <label for="pakkumine">Paku hind:</label>
                <input type="number" id="pakkumine" placeholder="<?php $hind ?>" name="pakkumine">

                <label for="kogus">Kogus:</label>
                <input type="number" id="kogus" name="kogus" required>

                <input type="submit" value="Osta">
            </form>
        </div>
    <?php endif ?>
</body>

</html>