<?php
// submit.php

// Define the file to store messages
$file = 'messages.txt';

// Get the message from POST data
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Basic validation (ensure message is not empty)
if (trim($message) === '') {
    die('Message cannot be empty.');
}

// Retrieve existing messages if the file exists, otherwise start with an empty array.
if (file_exists($file)) {
    $messages = json_decode(file_get_contents($file), true);
    if (!is_array($messages)) {
        $messages = [];
    }
} else {
    $messages = [];
}

// Append the new message (vulnerable: no sanitization is done)
$messages[] = $message;

// Save back to the file
file_put_contents($file, json_encode($messages));

// Redirect back to index.php
header("Location: index.php");
exit;
?>