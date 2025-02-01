<?php
// admin.php

// Define the file to store messages
$file = 'messages.txt';

// Read messages from file
$messages = [];
if (file_exists($file)) {
    $messages = json_decode(file_get_contents($file), true);
    if (!is_array($messages)) {
        $messages = [];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Inbox</title>
</head>

<body>
    <h1>Admin Inbox</h1>
    <div id="messages"></div>

    <script>
        // The secret flag only available to the admin view.
        const flag = "FLAG{this_is_the_secret_flag}";

        // Function that leaks the flag (e.g., by showing an alert)
        function leakFlag() {
            alert("Flag: " + flag);
        }

        // Load messages from the server (vulnerable: inserted into the DOM without sanitization)
        const messages = <?php echo json_encode($messages); ?>;
        const messagesDiv = document.getElementById('messages');

        // Vulnerable rendering: user messages are inserted directly with innerHTML.
        messages.forEach(msg => {
            messagesDiv.innerHTML += '<p>' + msg + '</p>';
        });
    </script>

    <p>Note: The admin page uses unsanitized user input when rendering messages. If a message contains a payload like
        <code>&lt;script&gt;leakFlag();&lt;/script&gt;</code>, it will execute in the admin context.</p>
</body>

</html>